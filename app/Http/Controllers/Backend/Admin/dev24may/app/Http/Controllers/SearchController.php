<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Search;
use App\Models\Product;
use App\Models\Category;
use App\Models\FlashDeal;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Shop;
use App\Models\Attribute;
use App\Models\AttributeCategory;
use App\Utility\CategoryUtility;
class SearchController extends Controller
{
    public function index(Request $request, $category_id = null, $brand_id = null)
    {
        $feature = $request->feature;
        $query = $request->keyword;
        $sort_by = $request->sort_by;
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        $seller_id = $request->seller_id;
        $attributes = Attribute::all();
        $selected_attribute_values = array();
        $colors = Color::all();
        $selected_color = null;
        $conditions = ['published' => 1];
        if($brand_id != null){
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }elseif ($request->brand != null) {
            $brand_id = (Brand::where('slug', $request->brand)->first() != null) ? Brand::where('slug', $request->brand)->first()->id : null;
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }
        if($seller_id != null){
            $conditions = array_merge($conditions, ['user_id' => Seller::findOrFail($seller_id)->user->id]);
        }
        $products = Product::where($conditions);
        $category='';
        if($category_id != null){
            $category_ids = CategoryUtility::children_ids($category_id);
            $category_ids[] = $category_id;
            $category = Category::findOrFail($category_id);
            $products->whereIn('category_id', $category_ids);
            $attribute_ids = AttributeCategory::whereIn('category_id', $category_ids)->pluck('attribute_id')->toArray();
            $attributes = Attribute::whereIn('id', $attribute_ids)->get();
        }
        else {
            // if ($query != null) {
            //     foreach (explode(' ', trim($query)) as $word) {
            //         $ids = Category::where('name', 'like', '%'.$word.'%')->pluck('id')->toArray();
            //         if (count($ids) > 0) {
            //             foreach ($ids as $id) {
            //                 $category_ids[] = $id;
            //                 array_merge($category_ids, CategoryUtility::children_ids($id));
            //             }
            //         }
            //     }
            //     $attribute_ids = AttributeCategory::whereIn('category_id', $category_ids)->pluck('attribute_id')->toArray();
            //     $attributes = Attribute::whereIn('id', $attribute_ids)->get();
            // }
        }
        if($min_price != null && $max_price != null){
            $products->where('unit_price', '>=', $min_price)->where('unit_price', '<=', $max_price);
        }
        if($query != null){
            $searchController = new SearchController;
            $searchController->store($request);
            $products->where(function ($q) use ($query){
                foreach (explode(' ', trim($query)) as $word) {
                    /*$q->where('name', 'like', '%'.$word.'%')->orWhere('tags', 'like', '%'.$word.'%')->orWhereHas('product_translations', function($q) use ($word){
                        $q->where('name', 'like', '%'.$word.'%');
                    });*/
                    $q->where('name', 'like', '%'.$word.'%')->orWhere('tags', 'like', '%'.$word.'%');
                }
            });
        }
        switch ($sort_by) {
            case 'newest':
                $products->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $products->orderBy('created_at', 'asc');
                break;
            case 'price-asc':
                $products->orderBy('unit_price', 'asc');
                break;
            case 'price-desc':
                $products->orderBy('unit_price', 'desc');
                break;
              default:
                $products->orderBy('category_id', 'desc');
                break; 
        }
        if($request->has('color')){
            $str = '"'.$request->color.'"';
            $products->where('colors', 'like', '%'.$str.'%');
            $selected_color = $request->color;
        }
         if($request->has('feature')){
             if($feature!=''){$products->where($feature, 1);}            
        } 
        if($request->has('selected_attribute_values')){
            $selected_attribute_values = $request->selected_attribute_values;
            foreach ($selected_attribute_values as $key => $value) {
                $str = '"'.$value.'"';
                $products->where('choice_options', 'like', '%'.$str.'%');
            }
        }
        //added
        $products_brand_id = array();
        $products_brand_id = array();
		$temp=Product::groupBy('brand_id')->get();
        foreach($temp as $product){
            array_push($products_brand_id, $product->brand_id);
        }
        /*foreach($products->get() as $product){
            array_push($products_brand_id, $product->brand_id);
        }*/
        /*$brands = new Brand;
        if($feature==''){
            $brands = $brands->get();
        }else{
            $brands = $brands->whereIn('id', $products_brand_id)->get();
        }*/
        $brands =  Brand::whereIn('id',$products->distinct()->pluck('brand_id'))->get();


                //added
				/*if($query){
                $p_marks=array();
                $query = preg_replace('!\s+!', ' ', $query);
                foreach($products->get() as $single_pro){  //visit each products
                    foreach (explode(' ', trim($query)) as $word) { //searching words
                        //contains word count--------(1)
                        if(count(explode(strtolower($word),strtolower($single_pro->name)))>1){ if(empty($p_marks[$single_pro->id])){$p_marks[$single_pro->id]=0;}   $p_marks[$single_pro->id]=$p_marks[$single_pro->id]+5;}
                    }
                    //similarity
                    if(empty($p_marks[$single_pro->id])){$p_marks[$single_pro->id]=0;}
                    $sim = similar_text($single_pro->name, $query, $perc);  //sort by name only   
                    $p_marks[$single_pro->id]=($p_marks[$single_pro->id]*10)+round($perc);
                } 
                arsort($p_marks);


                foreach($p_marks as $keys=>$p_marks_single){ if(empty($dta)){$dta=$keys;}else{$dta=$dta.','.$keys;} }
                
                if(!empty($dta)){$products=$products->orderByRaw("FIELD(id , ".$dta.") ASC");}
				}*/


        $products = filter_products($products)->with('taxes')->paginate(24)->appends(request()->query());
        return view('frontend.product_listing', compact('brands','category','products', 'query', 'category_id', 'brand_id', 'sort_by', 'seller_id','min_price', 'max_price', 'attributes', 'selected_attribute_values', 'colors', 'selected_color','feature'));
    }
    public function listing(Request $request)
    {
        return $this->index($request);
    }
    public function listingByCategory(Request $request, $category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category != null) {
            return $this->index($request, $category->id);
        }
        abort(404);
    }
    public function listingByBrand(Request $request, $brand_slug)
    {
        $brand = Brand::where('slug', $brand_slug)->first();
        if ($brand != null) {
            return $this->index($request, null, $brand->id);
        }
        abort(404);
    }
    //Suggestional Search
    public function ajax_search(Request $request)
    {
        $keywords = array();
        $query = $request->search;
        $products = Product::where('published', 1)->where('tags', 'like', '%'.$query.'%')->get();
        foreach ($products as $key => $product) {
            foreach (explode(',',$product->tags) as $key => $tag) {
                if(stripos($tag, $query) !== false){
                    if(sizeof($keywords) > 5){
                        break;
                    }
                    else{
                        if(!in_array(strtolower($tag), $keywords)){
                            array_push($keywords, strtolower($tag));
                        }
                    }
                }
            }
        }
        $products = filter_products(Product::query());
        $products = $products->where('published', 1)
                        ->where(function ($q) use ($query){
                            foreach (explode(' ', trim($query)) as $word) {
                                /*$q->where('name', 'like', '%'.$word.'%')->orWhere('tags', 'like', '%'.$word.'%')->orWhereHas('product_translations', function($q) use ($word){
                                    $q->where('name', 'like', '%'.$word.'%');
                                });*/
                                 $q->where('name', 'like', '%'.$word.'%')->orWhere('tags', 'like', '%'.$word.'%');
                            }
                        })
                        ->limit(3)
                        ->get();
        $categories = Category::where('name', 'like', '%'.$query.'%')->get()->take(3);
        $shops = Shop::whereIn('user_id', verified_sellers_id())->where('name', 'like', '%'.$query.'%')->get()->take(3);
        if(sizeof($keywords)>0 || sizeof($categories)>0 || sizeof($products)>0 || sizeof($shops) >0){
            return view('frontend.partials.search_content', compact('products', 'categories', 'keywords', 'shops'));
        }
        return '0';
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $search = Search::where('query', $request->keyword)->first();
        if($search != null){
            $search->count = $search->count + 1;
            $search->save();
        }
        else{
            $search = new Search;
            $search->query = $request->keyword;
            $search->save();
        }
    }
}
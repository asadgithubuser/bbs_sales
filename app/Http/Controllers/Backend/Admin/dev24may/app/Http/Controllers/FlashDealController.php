<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FlashDeal;
use App\Models\FlashDealTranslation;
use App\Models\FlashDealProduct;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\CampaignCategory;
use DB;

class FlashDealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_search =null;
        $flash_deals = FlashDeal::orderBy('created_at', 'desc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $flash_deals = $flash_deals->where('title', 'like', '%'.$sort_search.'%');
        }
        $flash_deals = $flash_deals->paginate(15);
        return view('backend.marketing.flash_deals.index', compact('flash_deals', 'sort_search'));
    }    
	
	
	//added
	    public function get_products_by_category(Request $request)
    {

				$data='<select name="products[]" id="products_"  onchange="load_products(this.value)"  class="form-control aiz-selectpicker this_product_load" multiple required data-placeholder="Choose Products" data-live-search="true" data-selected-text-format="count">'; 
				
				$products = Product::select('id','name')->where('published',1);			
				 if(!empty($request->selected_id_collection)){

					 if($request->selected_id_collection[0]=='['){
						$selected_products=explode(',',substr(substr($request->selected_id_collection, 1),0, -1));     
					 }else{
						 $selected_products=explode(',',$request->selected_id_collection);    
					 }     
					foreach($selected_products as $each_selected){
						$selected_product_data=DB::table('products')->where('id',$each_selected)->first();
						$data=$data.'<option  selected value="'.$selected_product_data->id.'">'.$selected_product_data->name.'</option>';	
					   $products = $products->where('id','!=',$selected_product_data->id);	
					}  				
				} 
				
				$cat1 = DB::table('categories')->where('parent_id',$request->category_id)->get();
				$cat_string='';
				foreach($cat1 as $cat1_){
					$cat_string=$cat_string.','.$cat1_->id; //all subchild of parents 
					$cat2 = DB::table('categories')->where('parent_id',$cat1_->id)->get();
						foreach($cat2 as $cat2_){
							$cat_string=$cat_string.','.$cat2_->id; //all subchild of   
						}
				}
				$cat_string=$cat_string.','.$request->category_id;
 
				
			    $cat_array=explode (",", $cat_string);
				$products = $products->whereIn('category_id',$cat_array);
				$all_products = $products->get(); 

                
				foreach($all_products as $each){
					$data=$data.'<option  value="'.$each->id.'">'.$each->name.'</option>';	
				}
				
				return $data.'</select>';
         
     }
	
	
	
	public function products_by_category(Request $request)
    {
        $sort_search =null;
        $flash_deals = FlashDeal::orderBy('created_at', 'desc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $flash_deals = $flash_deals->where('title', 'like', '%'.$sort_search.'%');
        }
        $flash_deals = $flash_deals->paginate(15);
        return view('backend.marketing.flash_deals.index', compact('flash_deals', 'sort_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.marketing.flash_deals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flash_deal = new FlashDeal;
        $flash_deal->title = $request->title;
        $flash_deal->text_color = $request->text_color;

        $date_var               = explode(" to ", $request->date_range);
        $flash_deal->start_date = strtotime($date_var[0]);
        $flash_deal->end_date   = strtotime( $date_var[1]);

        $flash_deal->background_color = $request->background_color;
        $flash_deal->slug = strtolower(str_replace(' ', '-', $request->title).'-'.Str::random(5));
        $flash_deal->banner = $request->banner;
        
        /*Flash deal category */
        $flash_deal->category= $request->flashdeal_category;
        //end mostak addition
        $tbl_products=$request->table_products;
        if($flash_deal->save()){
            foreach ($tbl_products as $key => $product) {
                $flash_deal_product = new FlashDealProduct;
                $flash_deal_product->flash_deal_id = $flash_deal->id;
                $flash_deal_product->product_id = $product; 
	            $flash_deal_product->discount = $request['discount_'.$product];
                $flash_deal_product->discount_type = $request['discount_type_'.$product];
                $flash_deal_product->save();

            }

            $flash_deal_translation = FlashDealTranslation::firstOrNew(['lang' => env('DEFAULT_LANGUAGE'), 'flash_deal_id' => $flash_deal->id]);
            $flash_deal_translation->title = $request->title;
            $flash_deal_translation->save();

            flash(translate('Flash Deal has been inserted successfully'))->success();
            return redirect()->route('flash_deals.index');
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $lang           = $request->lang;
        $excel_data     = $request->data;
        $flash_deal = FlashDeal::findOrFail($id);
		//return $products = DB::table('products')->where('published', 1)->take(1000)->get();
        return view('backend.marketing.flash_deals.edit', compact('flash_deal','lang','excel_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $flash_deal = FlashDeal::findOrFail($id);

        $flash_deal->text_color = $request->text_color;

        $date_var               = explode(" to ", $request->date_range);
        $flash_deal->start_date = strtotime($date_var[0]);
        $flash_deal->end_date   = strtotime( $date_var[1]);

        $flash_deal->background_color = $request->background_color;

        if($request->lang == env("DEFAULT_LANGUAGE")){
          $flash_deal->title = $request->title;
          if (($flash_deal->slug == null) || ($flash_deal->title != $request->title)) {
              $flash_deal->slug = strtolower(str_replace(' ', '-', $request->title) . '-' . Str::random(5));
          }
        }

        $flash_deal->banner = $request->banner;
        
        /*Flash deal Category*/
        $flash_deal->category= $request->flashdeal_category;
        //end mostak addition
        
        foreach ($flash_deal->flash_deal_products as $key => $flash_deal_product) {
            $flash_deal_product->delete();
        }
		$tbl_products=$request->table_products;
        if($flash_deal->save()){
            foreach ($tbl_products as $key => $product) {
                $flash_deal_product = new FlashDealProduct;
                $flash_deal_product->flash_deal_id = $flash_deal->id;
                $flash_deal_product->product_id = $product;
				$flash_deal_product->discount = $request['discount_'.$product];
                $flash_deal_product->discount_type = $request['discount_type_'.$product];
                $flash_deal_product->save();

                /*$root_product = Product::findOrFail($product);
                $root_product->discount = $request['discount_'.$product];
                $root_product->discount_type = $request['discount_type_'.$product];
                $root_product->discount_start_date = strtotime($date_var[0]);
                $root_product->discount_end_date   = strtotime( $date_var[1]);
                $root_product->save();*/
            }

            $sub_category_translation = FlashDealTranslation::firstOrNew(['lang' => $request->lang, 'flash_deal_id' => $flash_deal->id]);
            $sub_category_translation->title = $request->title;
            $sub_category_translation->save();

            flash(translate('Flash Deal has been updated successfully'))->success();
            return back();
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flash_deal = FlashDeal::findOrFail($id);
        foreach ($flash_deal->flash_deal_products as $key => $flash_deal_product) {
            $flash_deal_product->delete();
        }

        foreach ($flash_deal->flash_deal_translations as $key => $flash_deal_translation) {
            $flash_deal_translation->delete();
        }

        FlashDeal::destroy($id);
        flash(translate('FlashDeal has been deleted successfully'))->success();
        return redirect()->route('flash_deals.index');
    }

    public function update_status(Request $request)
    {
        $flash_deal = FlashDeal::findOrFail($request->id);
        $flash_deal->status = $request->status;
        if($flash_deal->save()){
            flash(translate('Flash deal status updated successfully'))->success();
            return 1;
        }
        return 0;
    }

    public function update_featured(Request $request)
    {
        foreach (FlashDeal::all() as $key => $flash_deal) {
            $flash_deal->featured = 0;
            $flash_deal->save();
        }
        $flash_deal = FlashDeal::findOrFail($request->id);
        $flash_deal->featured = $request->featured;
        if($flash_deal->save()){
            flash(translate('Flash deal status updated successfully'))->success();
            return 1;
        }
        return 0;
    }

    public function product_discount(Request $request){
          $product_ids = $request->product_ids;
		  if(!empty($product_ids[0])){
		        return view('backend.marketing.flash_deals.flash_deal_discount', compact('product_ids'));
		  }else{
				return '';
		  }			 
    }
	

    public function product_discount_edit(Request $request){
      $product_ids = $request->product_ids;
      $flash_deal_id = $request->flash_deal_id;
	  
		  if(!empty($product_ids[0])){
		        return view('backend.marketing.flash_deals.flash_deal_discount_edit', compact('product_ids', 'flash_deal_id'));
		  }else{
			    return '';
		  }		  
 
    }
    
    /*
     * campaign category functions
     * added by mustakim
     * April 22
     * */

    public function CampaignCategory(Request $request){
        $search_key = null;

        $category = CampaignCategory::orderBy('created_at','desc');
        if($request->has('search')){
            $search_key = $request->search;
            $category   = $category->where('category_name', 'like', '%'.$search_key.'%');
        }
        $categories = $category->paginate(15);
        return view('backend.marketing.flash_deals.flashdeal_category.campaign_category',compact('categories','search_key'));
    }

    public function CampaignCategoryStatus(Request $request){
        if($request->has('id')){
            $category = CampaignCategory::findOrFail($request->id);
            $category->status = $request->status;
            if($category->save()){
                flash(translate('Flash deal category status updated successfully'))->success();
                return 1;
            }
            return 0;
        }
        return 0;
    }

    public function AddCampaignCategoryView(){
        return view('backend.marketing.flash_deals.flashdeal_category.create');
    }

    public function StoreCampaignCategory(Request $request){
        $validated = $request->validate([
            'name' => 'bail|required|string|min:5',
        ]);


        $result = CampaignCategory::create([
            'category_name'=>$request->name,
            'banner'=>$request->banner,
            'status'=>1
        ]);

        if($result){
            flash(translate('Flash Deal category has been inserted successfully'))->success();
            return redirect()->route('flash-category');
        }
        flash(translate('Something went wrong'))->error();
        return redirect()->back();
    }

    public function CampaignCategoryEditView($id){
        $category = CampaignCategory::where('id',$id)->first();
        return view('backend.marketing.flash_deals.flashdeal_category.edit',compact('category'));
    }

    public function CampaignCategoryUpdate(Request $request){
        $validated = $request->validate([
            'id'=>'bail|required|numeric|min:1',
            'name' => 'bail|required|string|min:5',
        ]);

        $exists = CampaignCategory::findOrFail($request->id);
        if($exists){
            $result = CampaignCategory::where('id',$request->id)->update([
                'category_name'=>$request->name,
                'banner'=>$request->banner,
            ]);

            if($result){
                flash(translate('Flash Deal category has been updated successfully'))->success();
                return redirect()->back();
            }
            flash(translate('Something went wrong'))->error();
            return redirect()->back();
        }
        flash(translate('Something went wrong'))->error();
        return redirect()->back();
    }

    public function CampaignCategoryDestroy($id){
        if(!empty($id)){
            $result = CampaignCategory::where('id',$id)->delete();
            if($result){
                flash(translate('Flash deal category has been deleted successfully'))->success();
                return redirect()->back();
            }
            flash(translate('Flash deal category delete failed'))->error();
            return redirect()->back();
        }
    }
}

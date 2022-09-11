<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\User;
use App\Models\Category;
use App\Models\ShippingCategories;
use DB;
class ShippingConfigureController extends Controller
{
 public function index(Request $request){
        $seller_id = $request->seller_id;
        $brand_id = $request->brand_id;
        $category_id = $request->category_id;
        $shipping_type = $request->shipping_type;
        $product_limit = $request->product_limit;

        // for top summery 
        $total_db_products = Product::where('published', 1)->count();
        $total_flat_rate_products = Product::where('published', 1)->where('shipping_type', 'flat_rate')->count();
        $total_free_products = Product::where('published', 1)->where('shipping_type', 'free')->count();
        $weight_based_free_products = Product::where('published', 1)->where('shipping_type', 'weight_based')->count();
        $total_category_wise_products = Product::where('published', 1)->where('shipping_type', 'category_wise')->count();


        $products = Product::orderBy('id','asc')->where('published', 1);
        $paginate = '';

        if($seller_id == null && $brand_id == null && $category_id == null && $shipping_type == null && $product_limit == null){
            $products = $products->paginate(15)->appends(request()->query());
            $total_products = null;
            $brands = Brand::get();
            $categories = Category::get();
            $sellers = User::where('user_type', '=', 'seller')->get();

        }else{

            if($seller_id != null){
                $brandIds = array();
                $catsIds = array();

                $products = $products->where('user_id', $seller_id);
                $bc_ids = Product::where('user_id', $seller_id)->select('category_id', 'brand_id')->get();


                foreach($bc_ids as $data){
                    array_push($brandIds, $data->brand_id);
                    array_push($catsIds, $data->category_id);
                }

                $brands = Brand::whereIn('id', $brandIds)->get();//
                $sellers = User::where('user_type', '=', 'seller')->get();
                $categories = Category::whereIn('id', $catsIds)->get();//
 
            }

            if($brand_id != null){
                $userIds = array();
                $catIds = array();

                $products = $products->where('brand_id', $brand_id);
                $bu_ids = Product::where('brand_id', $brand_id)->select('category_id', 'user_id')->get();

                foreach($bu_ids as $data){
                    array_push($userIds, $data->user_id);
                    array_push($catIds, $data->category_id);
                }

                $sellers = User::whereIn('id', $userIds)->get();
                $brands = Brand::get();
                $categories = Category::whereIn('id', $catIds)->get();
            }

            if($category_id != null){
                $usercIds = array();
                $brandcIds = array();

				//have children?
				$cat_array=array();
				$cat_string='';	 
				$cat_string=$category_id;				
				$cat1 = DB::table('categories')->where('parent_id',$category_id)->get();
			 
				foreach($cat1 as $cat1_){
					$cat_string=$cat_string.','.$cat1_->id; //all subchild of parents 
					$cat2 = DB::table('categories')->where('parent_id',$cat1_->id)->get();
						foreach($cat2 as $cat2_){
							$cat_string=$cat_string.','.$cat2_->id; //all subchild of   
						}
				}
				
 
				
			    $cat_array=explode (",", $cat_string);
				$products = $products->whereIn('category_id',$cat_array);
 
				
                $bs_ids = Product::where('category_id', $category_id)->select('brand_id', 'user_id')->get();

                foreach($bs_ids as $data){
                    array_push($usercIds, $data->user_id);
                    array_push($brandcIds, $data->brand_id);
                }

                $categories = Category::get();
                $sellers = User::whereIn('id', $usercIds)->get();
                $brands = Brand::whereIn('id', $brandcIds)->get();
            }

            if($shipping_type != null){
                $categorysIds = array();
                $brandsIds = array();
                $sellersIds = array();

                $products = $products->where('shipping_type', $shipping_type);

                $cbs_ids = Product::where('shipping_type', $shipping_type)->select('category_id', 'brand_id', 'user_id')->get();

                foreach($cbs_ids as $data){
                    array_push($categorysIds, $data->category_id);
                    array_push($brandsIds, $data->brand_id);
                    array_push($sellersIds, $data->user_id);
                }

                $categories = Category::whereIn('id', $categorysIds)->get();
                $sellers = User::whereIn('id', $sellersIds)->get();
                $brands = Brand::whereIn('id', $brandsIds)->get();

              
            }
                
        
            $total_products = $products->get();

            if($product_limit != null){
                $categories = Category::get();
                $sellers = User::where('user_type', '=', 'seller')->get();
                $brands = Brand::get();
                
                /*if($product_limit == 'all_products'){
                    $products = $products->get();
                }else{*/
                    $products = $products->paginate($product_limit)->appends(request()->query());
                //}
            }else{
                $paginate = 'paginate';
                // $products = $products->take(40)->get();
                $products = $products->paginate(15)->appends(request()->query());
            }
 
    }
        return view('backend.setup_configurations.shipping_cost.index', compact(['total_db_products', 'total_flat_rate_products', 'weight_based_free_products','total_free_products', 'total_category_wise_products','seller_id','paginate', 'brand_id', 'category_id', 'shipping_type', 'product_limit', 'brands','categories','total_products', 'products', 'sellers']));
    }







    public function costAssignToProducts(Request $request){
        $productids = $request->products_id;
        $catId = $request->catId;
        $shipping_type = $request->shipping_type;
        $flat_rate_cost = $request->flat_rate_cost;
        $weight_based_cost = $request->weight_based_cost;

        foreach($productids as $id){
            if($shipping_type == 'free'){
                $product = Product::find($id);
                $product->shipping_type = 'free';
                $product->shipping_cost = 0.00;
                $product->save();
            }else if($shipping_type == 0){
                $product = Product::find($id);
                $product->shipping_type = 'flat_rate';
                $product->shipping_cost = $flat_rate_cost;
                $product->save();
            }else if($shipping_type == 'weight_based'){
                $product = Product::find($id);
                $product->shipping_type = 'weight_based';
                $product->shipping_cost = $weight_based_cost;
                $product->save();
            }else if($catId != null ){
                $shipCat = ShippingCategories::where('id', $catId)->get();

                $product = Product::find($id);
                $product->shipping_type = 'category_wise';
                $product->shipping_cost = $shipCat[0]->id;
                $product->save();
            }
            
        }
        return json_encode([
            'status'=> 'success',
            'catId'=> $catId,
            'shipping_type'=> $shipping_type,
            'flat_rate_cost'=> $flat_rate_cost,
            'weight_based_cost'=> $weight_based_cost,
        ]);
    }



}

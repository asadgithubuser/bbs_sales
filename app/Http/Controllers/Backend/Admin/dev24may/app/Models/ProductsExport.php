<?php

namespace App\Models;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class ProductsExport implements FromCollection, WithMapping, WithHeadings
{   

	public $category_id;
	public $seller_id;
	
	function __construct($id) {
		
	  $this->category_id = explode('&',$id)[0];
	  $this->seller_id = explode('&',$id)[1];
	}
	
    public function collection()
    {
		
		//have children?
		$cat_array=array();
		$cat_string='';	 
		$cat_string=$this->category_id;				
		$cat1 = DB::table('categories')->where('parent_id',$this->category_id)->get();
	 
		foreach($cat1 as $cat1_){
			$cat_string=$cat_string.','.$cat1_->id; //all subchild of parents 
			$cat2 = DB::table('categories')->where('parent_id',$cat1_->id)->get();
				foreach($cat2 as $cat2_){
					$cat_string=$cat_string.','.$cat2_->id; //all subchild of   
				}
		}
		
		$cat_array=explode (",", $cat_string);
				 
				
				
				
		
		if($this->category_id>0 && empty($this->seller_id)){
			return Product::whereIn('category_id',$cat_array)->get();
		}
		if($this->category_id>0 && $this->seller_id>0){
			return Product::whereIn('category_id',$cat_array)->where('user_id',$this->seller_id)->get();
		}
		if(empty($this->category_id) && $this->seller_id>0){
			return Product::where('user_id',$this->seller_id)->get();
		}
		 
        return false;
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'description',
            'category_id',
            '#category_name',
            'brand_id',
            '#brand_name',
            'seller_id',
			'#seller_name',		
            'unit',
            'tags',
            'sku',
            'current_stock',
            'min_qty',
            'max_qty',
            'refundable',
            'published',
            'approved',
            'unit_price',
            'purchase_price',
            'discount',
            'discount_type',	
            'shipping_type',
            'shipping_cost',
            'est_shipping_days',
            'video_provider',
            'video_link',
            'meta_title',
            'meta_description',
            '#link',
        ];
    }

    /**
    * @var Product $product
    */
    public function map($product): array
    {
		if(DB::table('categories')->where('id','=', $product->category_id)->count()>0){$cat_name=DB::table('categories')->where('id','=', $product->category_id)->first()->name;}else{$cat_name='';}
        if(DB::table('brands')->where('id','=', $product->brand_id)->count()>0){$brand_name=DB::table('brands')->where('id','=', $product->brand_id)->first()->name;}else{$brand_name='';}

        /*$qty = 0;
        foreach ($product->stocks as $key => $stock) {
            $qty += $stock->qty;
        }*/
		$p_published=$product->published; if(empty($p_published)){$p_published='0';}
		$p_approved=$product->approved; if(empty($p_approved)){$p_approved='0';}
		
		$max_qty=$product->max_qty; if(empty($max_qty)){$max_qty='0';}
		
		
		
 
		$qry=DB::table('product_stocks')->where('product_id','=', $product->id)->first();
        return [
            $product->id,
            $product->name,
            $product->description,
			$product->category_id,
			$cat_name,
			$product->brand_id,
			$brand_name,
			$product->user_id,
			user_by_id($product->user_id)->name??'',
			$product->unit,
			$product->tags,
			$qry->sku??'',
			$qry->qty??'0',
			$product->min_qty??'1',
			$max_qty,
			$product->refundable,
            $p_published,
            $p_approved,
            $product->unit_price,
            $product->purchase_price,
            $product->discount,
            $product->discount_type,			
            $product->shipping_type,
            $product->shipping_cost,	
            $product->est_shipping_days,	
            $product->video_provider,	
            $product->video_link,
			$product->meta_title,		
            $product->meta_description,	
            'https://'.request()->getHttpHost().'/product/'.$product->slug,
        ];
    }
}

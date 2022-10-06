<?php
namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
//use App\ShippingCities; 
use App\Models\ShippingCategories; 
use App\Models\Country;
use App\Models\CityTranslation;
use App\Models\BusinessSetting;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;

class ShippingController extends Controller
{






/*Start- Shipping Cost Category Manage*/
    public function shipping_cost_area(){
        $shipping_cost_area=json_decode(BusinessSetting::select('value')->where('type','=','shipping_cost_area')->first()['value'], true);
        return $shipping_cost_area;
    }

 

    public function shippingcat()
    {
        $shipping_categories = ShippingCategories::where('parent_id','!=',Null)->orderBy('parent_id', 'ASC')->orderBy('id', 'ASC')->where('is_active','=','1')->get();
        $shipping_categories_parent = ShippingCategories::where('parent_id','=',Null)->get();

        foreach ($shipping_categories_parent as $key => $value){
            $cat_byid[$value['id']]=$value['name'];
            $total_child_ofparent[$value['id']]=count(ShippingCategories::where('parent_id','=',$value['id'])->where('is_active','=','1')->get());
        }
       $shipping_cost_area=$this->shipping_cost_area();
       return view('backend.setup_configurations.ShippingCategories.index', compact('shipping_categories','cat_byid','total_child_ofparent','shipping_cost_area'));
    }
    public function cost_increment_value($cat_id){
        $shippingCategories = ShippingCategories::where('id','=', $cat_id)->get();
        return ($shippingCategories['0']['cost_increment']);
    }


    public function shipping_category_update(Request $request){
        $error=0;
        $current_user=Auth::user()->id;
        $vatidation_error=0; $position=0; $cost_val_array=array(); $cost_id_array=array();
        $cat_data = $request['shipcat'];$cost_array_ind1=0; $cost_array_ind2=0;
        $total_area_id=$request->total_area_id;

        $max=($total_area_id*2)+4;
        foreach($cat_data as $cat_data_each){ $position++;  if($cat_data_each==''){ return back(); }
            if($position==1){$id=$cat_data_each;}
            if($position==2){$parent=$cat_data_each;}
            if($position==3){$name=$cat_data_each;}
            if($position==4){$is_active=$cat_data_each;}
            if($position>=5 && $position%2==1){$cost_id_array[$cost_array_ind1++]=$cat_data_each; }
            if($position>=6 && $position%2==0){ $cost_val_array[$cost_array_ind2++]=$cat_data_each;  $vals=string_validate('','number',$cat_data_each); if($vals==0){return back();}}


            if($position==$max){
                $position=0; $cost_array_ind1=0; $cost_array_ind2=0; $str1=json_encode($cost_id_array); $str2=json_encode($cost_val_array);
                $final_cost='{"area_id":'.$str1.',"cost":'.$str2.'}';


               //category is used?
               if($is_active==0){
                    $duplicateCount = DB::table('products')->where('shipping_type','=','category_wise')->where('shipping_cost','=', $id)->count();
                    if($duplicateCount>0){$error++;}
               }



               if($error>0){ }else{
                if (ShippingCategories::where('id', '=', $id)->count() > 0) {//update
                    $qry=DB::table('shipping_categories')
                    ->where('id', $id)
                    ->update([
                        'name'     => $name,
                        'cost'     => $final_cost,
                        'is_active'     => $is_active
                    ]);


                    if($qry==1){
                        $qry=DB::table('shipping_categories')
                        ->where('id', $id)
                        ->update([
                            'updated_by' => $current_user
                        ]);
                    }


                 }else{
                     $qry=DB::table('shipping_categories')->insert(
                        array(
                               'name'   =>   $name,
                               'parent_id'   =>   $parent,
                               'cost'   =>   $final_cost,
                               'created_by' => $current_user,
                               'updated_by' => $current_user
                        )
                   );
                 }
                }


            }
        }
        if($error>0){error("Some Data Can not be deleted"); }
         return back();
    }
/*End- Shipping Cost Category Manage*/



public function shippingCategoriesAll(){
   return $shippingCategories = ShippingCategories::where('is_active','=', '1')->get();  
}

public function shippingCategories($parents){
    $shippingCategories = ShippingCategories::where('is_active','=', '1')->where('parent_id','=', $parents)->get();
    return ($shippingCategories);
}

public function costbyArea($shipsubcat){
	$c=0;
    foreach ($this->shippingCategories($shipsubcat) as $shippingSubCategoriesSingle){
        $cost_array = json_decode($shippingSubCategoriesSingle['cost'], true);
        $subcat_id = $shippingSubCategoriesSingle['id'];

        foreach($cost_array['cost'] as $key=> $single_cost){
            $cost_by_area[$subcat_id][$cost_array['area_id'][$key]]=$single_cost;
        }$c++;
    }
	
    return ($cost_by_area);
}

public function costbyArea2(){
	$cost_by_area=array();
	foreach ($this->shippingCategories(null)  as $shipcat){
		foreach ($this->shippingCategories($shipcat->id) as $shippingSubCategoriesSingle){ 
			$cost_array = json_decode($shippingSubCategoriesSingle['cost'], true);
			$subcat_id = $shippingSubCategoriesSingle['id'];

			foreach($cost_array['cost'] as $key=> $single_cost){
				$cost_by_area[$shipcat->id][$subcat_id][$cost_array['area_id'][$key]]=$single_cost;  
			}
		}		
	}
    return ($cost_by_area);	
}


public function shippingCatPath($subcategoryid){
    $sub_cat=ShippingCategories::where('id','=', $subcategoryid)->get();
    $parent_id=$sub_cat['0']['parent_id'];
    $sub_cat_name=$sub_cat['0']['name'];
    $parent=ShippingCategories::where('id','=', $parent_id)->get();
    $parent_name=$parent['0']['name'];
    return (addslashes($parent_name).'<x class="text-dark"> » </x> '.addslashes($sub_cat_name).' <span onclick="clearShipCat()"  class="badge badge-inline badge-danger text-center">✘</span>');
 }
 
 
 
 public function get_shipping_cost_weight_based($weight,$city_id){
	 
	$zones=\App\Models\Zone::all(); 
	
	foreach ($zones as $zones_each){
		$cities=$zones_each['cities'];
		$json = json_decode($cities);
		 
		if (in_array($city_id,$json))
		{
		   $f_cost=$zones_each['standard_delivery_cost'];
		   $f_additional_cost=$zones_each['express_delivery_cost'];
		   if($weight<1){$weight=1;}
		   
		   if(($weight - floor($weight))>0){$int=(int)$weight+1;  }else{ $int=$weight; }
		   
		   $int=$int-app('App\Http\Controllers\BusinessSettingsController')->BusinessSettings('shipping_cost_kg');
		   if($int<0){$int=0;}
			
		   $final_cost=$f_cost+($f_additional_cost*$int);
		   return ($final_cost);		   
		}	
	}
}




   // DB::insert('insert into 1test (value) values (?)', [$city_id]);
 

    //shipping category cost calculate
    public function get_shipping_area_id($city_id){

        $zones=\App\Models\Zone::all(); 
        foreach ($zones as $zones_each){
            $cities=$zones_each['cities'];
            $json = json_decode($cities);
 
            if (in_array($city_id,$json))
            {
            return   $zones_each->id;
            }
        }   
    }


    public function get_shipping_cost_category_wise($cat_id,$city_id){

        $area_id = $this->get_shipping_area_id($city_id);
        $shipping_categories = json_decode(ShippingCategories::where('id','=',$cat_id)->first()['cost'], true);

        $area_id_col=$shipping_categories['area_id'];
        $area_cost_col=$shipping_categories['cost'];

        $x=0;
        foreach($area_cost_col as $area_cost){
            $cost_by_areaid[$area_id_col[$x++]]=$area_cost;
        }

        $f_cost=$cost_by_areaid[$area_id];
        return ($f_cost);
    }


    //special shipping
    public function check_category_special($cat_id,$subamnt){
        $shipping_categories = ShippingCategories::where('id','=',$cat_id)->get();
        $parent_id=$shipping_categories['0']['parent_id'];

        $cost_inc=ShippingCategories::where('id','=',$parent_id)->get();
        $data=$cost_inc['0']['cost_increment'];

        $arr=explode('flat_seller',$data);
        if(count($arr)>1){return 1;}else{return 0;}
    }



    public function get_shipping_cost_category_special($carts,$seller,$cat_id,$subamnt){
 
        $shipping_categories = ShippingCategories::where('id','=',$cat_id)->get();
        $parent_id=$shipping_categories['0']['parent_id'];

        $cost_inc=ShippingCategories::where('id','=',$parent_id)->get();
        $data=$cost_inc['0']['cost_increment'];

        $arr=explode('flat_seller',$data);

        //my total
        $subtotal = 0;
        foreach ($carts as $key => $cartItem) {
            $product = \App\Models\Product::find($cartItem['product_id']);
            if($product->user_id==$seller){
                $subtotal += $cartItem['price'] * $cartItem['quantity'];
            }
        }

        //DB::insert('insert into 1test (value,value2) values (?,?)', [$cat_id,$subtotal]);

        //have amount shipping discount?
        $max_amount=0;
        $max_discount_=0;

        $arr2=explode('[',$data);
        if($arr2['1']!=''){
            $arr3=explode(']',$arr2['1']);
            if($arr3['0']!=''){
                $get_data_array=explode(',',$arr3['0']);
                foreach ($get_data_array as $get_data_array_single){
                    $amnt=explode('=',$get_data_array_single)['0'];
                    $amntdis=explode('%',explode('=',$get_data_array_single)['1'])['0'];
                    if($subtotal>=$amnt){   $max_discount_=$amntdis;  }
                }
            }
        }

        if(count($arr)>1){
            $special_cat_cost=0;
            $special_category_flag=Session::get('special_category_flag');
			
			//for app purpose
			if($special_category_flag==''){ $special_category_flag_initialize=Session::put('special_category_flag','initialize'); $special_category_flag=='initialize'; }
			
            if($special_category_flag=='initialize' || $special_category_flag=='re-initialize'){
                if($max_discount_!=0){
                    $temp1=$max_discount_/100;
                    $temp2=$subamnt*$temp1;

                    $special_cat_cost=$temp2;
                    if($special_cat_cost==0){return '-0';}
                }else{$special_cat_cost=0; }
            }  //used
            $special_category_flag_initialize=Session::put('special_category_flag','used');
            return $special_cat_cost;
        }else {
            return ('-1');
        }
    }

 




    public function get_inc_cost_category_wise($shipping_cost_cal,$cat_id,$qty){
        $shipping_categories = ShippingCategories::where('id','=',$cat_id)->get();
        $parent_id=$shipping_categories['0']['parent_id'];

        $cost_inc=ShippingCategories::where('id','=',$parent_id)->get();
        $data=$cost_inc['0']['cost_increment'];

        if($data!=''){
            $newline = explode("\n", $data);
            $ind=0;
            foreach($newline as $newline_each) {
                $equal=explode("=", $newline_each);
                $qty_range=$equal['0'];

                $qty_range_start=trim(explode("-", $qty_range)['0']);
                $qty_range_end=trim(explode("-", $qty_range)['1']);
                if($qty_range_end=='*'){ $qty_range_end=999; }
                $inc_val=trim(explode("%", $equal['1'])['0']);

                if($qty>=$qty_range_start && $qty<=$qty_range_end){

                    if($inc_val=='-1'){
                        return 0;
                    }
                    if($inc_val=='0'){
                        return ($shipping_cost_cal);
                    }else{
                        if($qty_range_end==999){$qty=$qty_range_start;}
                        $res=$shipping_cost_cal+(($shipping_cost_cal*($inc_val/100))*$qty);
                        if($res<0){$res=0;}
                        return ($res);
                    }

                }
            }
        }else{
            return ($shipping_cost_cal+$shipping_cost_cal*$qty);
        }
    }




















//Shipping Cost Category
public function updateCostIncrement(Request $request){
    $data=$request->ci;
    $cat_id=$request->id;
    if($data==''){  DB::update('update shipping_categories set cost_increment = ? where id = ?',['',$cat_id]); return ("Update Successful");}

    ////////Start Validate Cost Inc//////////
    $newline = explode("\n", $data);
    $error=0;
    $min_range=999;
    $max_range=0;
    $count_qty=0;
    $store_qty=array();
    $ind=0;
    foreach($newline as $newline_each) {
        $equal=explode("=", $newline_each);
        $qty_range=$equal['0'];

        $qty_range_start=trim(explode("-", $qty_range)['0']);
        $qty_range_end=trim(explode("-", $qty_range)['1']);
        $inc_val=trim(explode("%", $equal['1'])['0']);

        //numeric validate
        if(is_numeric($qty_range_start)!=1){$error++; return ('Quantity range start: '.$qty_range_start.' Should be Numeric');}
        if(is_numeric($qty_range_end)!=1 && $qty_range_end!='*'){$error++; return ('Quantity range end: '.$qty_range_end.' Should be Numeric or *');}
        if(is_numeric($inc_val)!=1){$error++; return ('Increment %: '.$inc_val.' Should be Numeric');}
        if($inc_val<101){}else{$error++;  return ('Increment %: '.$inc_val.' Should be less than 100 or equal to 100');}

        if($qty_range_start!=''){$count_qty++;}
        if($qty_range_end!=''){$count_qty++;}

        if($min_range>$qty_range_start){$min_range=$qty_range_start; }
        if($min_range>$qty_range_end){$min_range=$qty_range_end;}

        if($max_range<$qty_range_start){$max_range=$qty_range_start; }
        if($max_range<$qty_range_end){$max_range=$qty_range_end;}


        $store_qty[$ind++]=$qty_range_start;
        $store_qty[$ind++]=$qty_range_end;

    }

     //index validate
    if($store_qty['0']!='0'){
        $error++;
        return ('First Quantity range start value Should be 0');
    }

    //last index validate
    if(end($store_qty)!='*'){
        $error++;
        return ('Last Quantity range end value Should be *');
    }

    //duplicate validate
    $unique = array_unique($store_qty);
    $duplicates = array_diff_assoc($store_qty, $unique);
    if(count($duplicates)>0){$error++;  return ('Duplicate Quantity range value found');}

 
    //sequence validate
    $flag=0;
    foreach($store_qty as $key=>$store_qty_single){
     if($key==0 || $key==1){}
     else{
        if($flag==0){
            if($store_qty_single-$store_qty[$key-1]==1){}else{$error++;  return ('Invalid Quantity range Sequence found');}
           $flag=1;
        }else{
         $flag=0;
        }
     }
    }
    /////////End Validate Cost Inc/////////
if($error==0){
    DB::update('update shipping_categories set cost_increment = ? where id = ?',[$data,$cat_id]);
    return ("Update Successful");
}else{
    return ($error);
}



}






/*
//Shipping Region
public function shipping_cost_area(){
    $shipping_cost_area=json_decode(BusinessSetting::select('value')->where('type','=','shipping_cost_area')->first()['value'], true);
    return $shipping_cost_area;
}

public function area(){
    $shipping_cost_area=$this->shipping_cost_area();
    $area_id_col=$shipping_cost_area['id'];
    return ($area_id_col);
}


public function get_shipping_cost_weight_based($weight,$city_id){
   $area_id = $this->get_shipping_area_id($city_id);
   $shipping_cost_area=$this->shipping_cost_area();

   $area_id_col=$shipping_cost_area['id'];
   $area_additional_cost_col=$shipping_cost_area['additional_cost'];
   $area_cost_col=$shipping_cost_area['cost'];

   $x=0;
   foreach($area_cost_col as $area_cost){
       $cost_by_areaid[$area_id_col[$x]]=$area_cost;
       $additional_cost_by_areaid[$area_id_col[$x]]=$area_additional_cost_col[$x++];
   }

   $f_cost=$cost_by_areaid[$area_id];
   $f_additional_cost=$additional_cost_by_areaid[$area_id];

   if($weight<1){$weight=1;}
   //$weight=$weight-1;

   //$final_cost=$f_cost+($f_additional_cost*$weight);
   if(($weight - floor($weight))>0){$int=(int)$weight+1;  }else{ $int=$weight; }
   $int=$int-1;

   $final_cost=$f_cost+($f_additional_cost*$int);
   return ($final_cost);
}


//Shipping Cost Category
public function updateCostIncrement(Request $request){
    $data=$request->ci;
    $cat_id=$request->id;
    if($data==''){  DB::update('update shipping_categories set cost_increment = ? where id = ?',['',$cat_id]); return ("Update Successful");}

    ////////Start Validate Cost Inc//////////
    $newline = explode("\n", $data);
    $error=0;
    $min_range=999;
    $max_range=0;
    $count_qty=0;
    $store_qty=array();
    $ind=0;
    foreach($newline as $newline_each) {
        $equal=explode("=", $newline_each);
        $qty_range=$equal['0'];

        $qty_range_start=trim(explode("-", $qty_range)['0']);
        $qty_range_end=trim(explode("-", $qty_range)['1']);
        $inc_val=trim(explode("%", $equal['1'])['0']);

        //numeric validate
        if(is_numeric($qty_range_start)!=1){$error++; return ('Quantity range start: '.$qty_range_start.' Should be Numeric');}
        if(is_numeric($qty_range_end)!=1 && $qty_range_end!='*'){$error++; return ('Quantity range end: '.$qty_range_end.' Should be Numeric or *');}
        if(is_numeric($inc_val)!=1){$error++; return ('Increment %: '.$inc_val.' Should be Numeric');}
        if($inc_val<101){}else{$error++;  return ('Increment %: '.$inc_val.' Should be less than 100 or equal to 100');}

        if($qty_range_start!=''){$count_qty++;}
        if($qty_range_end!=''){$count_qty++;}

        if($min_range>$qty_range_start){$min_range=$qty_range_start; }
        if($min_range>$qty_range_end){$min_range=$qty_range_end;}

        if($max_range<$qty_range_start){$max_range=$qty_range_start; }
        if($max_range<$qty_range_end){$max_range=$qty_range_end;}


        $store_qty[$ind++]=$qty_range_start;
        $store_qty[$ind++]=$qty_range_end;

    }

     //index validate
    if($store_qty['0']!='0'){
        $error++;
        return ('First Quantity range start value Should be 0');
    }

    //last index validate
    if(end($store_qty)!='*'){
        $error++;
        return ('Last Quantity range end value Should be *');
    }

    //duplicate validate
    $unique = array_unique($store_qty);
    $duplicates = array_diff_assoc($store_qty, $unique);
    if(count($duplicates)>0){$error++;  return ('Duplicate Quantity range value found');}

 
    //sequence validate
    $flag=0;
    foreach($store_qty as $key=>$store_qty_single){
     if($key==0 || $key==1){}
     else{
        if($flag==0){
            if($store_qty_single-$store_qty[$key-1]==1){}else{$error++;  return ('Invalid Quantity range Sequence found');}
           $flag=1;
        }else{
         $flag=0;
        }
     }
    }
    /////////End Validate Cost Inc/////////
if($error==0){
    DB::update('update shipping_categories set cost_increment = ? where id = ?',[$data,$cat_id]);
    return ("Update Successful");
}else{
    return ($error);
}



}

public function cost_increment_value($cat_id){
    $shippingCategories = ShippingCategories::where('id','=', $cat_id)->get();
    return ($shippingCategories['0']['cost_increment']);
}
    public function shippingCategories($parents){
        $shippingCategories = ShippingCategories::where('is_active','=', '1')->where('parent_id','=', $parents)->get();
        return ($shippingCategories);
    }

    public function costbyArea($shipsubcat){
        foreach ($this->shippingCategories($shipsubcat) as $shippingSubCategoriesSingle){
            $cost_array = json_decode($shippingSubCategoriesSingle['cost'], true);
            $subcat_id = $shippingSubCategoriesSingle['id'];

            foreach($cost_array['cost'] as $key=> $single_cost){
                $cost_by_area[$subcat_id][$cost_array['area_id'][$key]]=$single_cost;
            }
        }
        return ($cost_by_area);
    }



    public function get_shipping_area_id($shipping_info_city_id){
        $area = ShippingCities::where('id','=', $shipping_info_city_id)->get();
        $area_id=$area['0']['area_id'];
        return ($area_id);
    }


    public function area_exist($area_id){
		$areaCount = DB::table('shipping_cities')->where('area_id', $area_id)->count();
        if($areaCount>0){$areaCount=1;}else{$areaCount=0;}
        return ($areaCount);
    }




    public function get_shipping_cost_category_wise($cat_id,$city_id){
        $area_id = $this->get_shipping_area_id($city_id);
        $shipping_categories = json_decode(ShippingCategories::where('id','=',$cat_id)->first()['cost'], true);

        $area_id_col=$shipping_categories['area_id'];
        $area_cost_col=$shipping_categories['cost'];

        $x=0;
        foreach($area_cost_col as $area_cost){
            $cost_by_areaid[$area_id_col[$x++]]=$area_cost;
        }

        $f_cost=$cost_by_areaid[$area_id];
        return ($f_cost);
    }
public function get_inc_cost_category_wise($shipping_cost_cal,$cat_id,$qty){
        $shipping_categories = ShippingCategories::where('id','=',$cat_id)->get();
        $parent_id=$shipping_categories['0']['parent_id'];

        $cost_inc=ShippingCategories::where('id','=',$parent_id)->get();
        $data=$cost_inc['0']['cost_increment'];

        if($data!=''){
            $newline = explode("\n", $data);
            $ind=0;
            foreach($newline as $newline_each) {
                $equal=explode("=", $newline_each);
                $qty_range=$equal['0'];

                $qty_range_start=trim(explode("-", $qty_range)['0']);
                $qty_range_end=trim(explode("-", $qty_range)['1']);
                if($qty_range_end=='*'){ $qty_range_end=999; }
                $inc_val=trim(explode("%", $equal['1'])['0']);

                if($qty>=$qty_range_start && $qty<=$qty_range_end){

                    if($inc_val=='-1'){
                        return 0;
                    }
                    if($inc_val=='0'){
                        return ($shipping_cost_cal);
                    }else{
                        if($qty_range_end==999){$qty=$qty_range_start;}
                        $res=$shipping_cost_cal+(($shipping_cost_cal*($inc_val/100))*$qty);
                        if($res<0){$res=0;}
                        return ($res);
                    }

                }
            }
        }else{
            return ($shipping_cost_cal+$shipping_cost_cal*$qty);
        }




    }



    public function shippingcat()
    {
        $shipping_categories = ShippingCategories::where('parent_id','!=',Null)->orderBy('parent_id', 'ASC')->orderBy('id', 'ASC')->where('is_active','=','1')->get();
        $shipping_categories_parent = ShippingCategories::where('parent_id','=',Null)->get();

        foreach ($shipping_categories_parent as $key => $value){
            $cat_byid[$value['id']]=$value['name'];
            $total_child_ofparent[$value['id']]=count(ShippingCategories::where('parent_id','=',$value['id'])->where('is_active','=','1')->get());
        }
        $shipping_cost_area=$this->shipping_cost_area();
        return view('backend.setup_configurations.ShippingCategories.index', compact('shipping_categories','cat_byid','total_child_ofparent','shipping_cost_area'));
    }




    public function shipping_category_update(Request $request){
        $error=0;
        $current_user=Auth::user()->id;
        $vatidation_error=0; $position=0; $cost_val_array=array(); $cost_id_array=array();
        $cat_data = $request['shipcat'];$cost_array_ind1=0; $cost_array_ind2=0;
        $total_area_id=$request->total_area_id;

        $max=($total_area_id*2)+4;
        foreach($cat_data as $cat_data_each){ $position++;  if($cat_data_each==''){ return back(); }
            if($position==1){$id=$cat_data_each;}
            if($position==2){$parent=$cat_data_each;}
            if($position==3){$name=$cat_data_each;}
            if($position==4){$is_active=$cat_data_each;}
            if($position>=5 && $position%2==1){$cost_id_array[$cost_array_ind1++]=$cat_data_each; }
            if($position>=6 && $position%2==0){ $cost_val_array[$cost_array_ind2++]=$cat_data_each;  $vals=string_validate('','number',$cat_data_each); if($vals==0){return back();}}


            if($position==$max){
                $position=0; $cost_array_ind1=0; $cost_array_ind2=0; $str1=json_encode($cost_id_array); $str2=json_encode($cost_val_array);
                $final_cost='{"area_id":'.$str1.',"cost":'.$str2.'}';


               //category is used?
               if($is_active==0){
                    $duplicateCount = DB::table('products')->where('shipping_type','=','category_wise')->where('shipping_cost','=', $id)->count();
                    if($duplicateCount>0){$error++;}
               }



               if($error>0){ }else{
                if (ShippingCategories::where('id', '=', $id)->count() > 0) {//update
                    $qry=DB::table('shipping_categories')
                    ->where('id', $id)
                    ->update([
                        'name'     => $name,
                        'cost'     => $final_cost,
                        'is_active'     => $is_active
                    ]);


                    if($qry==1){
                        $qry=DB::table('shipping_categories')
                        ->where('id', $id)
                        ->update([
                            'updated_by' => $current_user
                        ]);
                    }


                 }else{
                     $qry=DB::table('shipping_categories')->insert(
                        array(
                               'name'   =>   $name,
                               'parent_id'   =>   $parent,
                               'cost'   =>   $final_cost,
                               'created_by' => $current_user,
                               'updated_by' => $current_user
                        )
                   );
                 }
                }


            }
        }
        if($error>0){error("Some Data Can not be deleted"); }
         return back();
    }






//Shipping Cities

    public function region_group($level){
        $region = (ShippingCities::where('parent_id', $level)->get());
        return ($region);
    }


    public function region_select(Request $request){
        $region = (ShippingCities::where('parent_id', $request->val)->get());

        $cities_data='';
        $cities_path=$this->region_path($request->val);

        $temp1=explode('»',$cities_path);
        $level="";$level2=""; $child="";
        if(count($temp1)==2){ $level="Select District"; $level2="District"; } elseif(count($temp1)==3){ $level="Select Area"; $level2="Area";

        }else{

        }

        $childCount = DB::table('shipping_cities')->where('parent_id', $request->val)->count();
        if($childCount==0){$child=$request->val; $level="";}

        $cities_data=' <ul id="myUL">';
        $sl=1;
        foreach  ($region as $region_each){
                $cities_data=$cities_data.'
                <li style="list-style-type: none;"  onclick="region_select('.$region_each->id.')" >
                <a class="  list-group-item list-group-item-action" id="'.$region_each->id.'" data-toggle="list"   role="tab" aria-controls="'.$region_each->name.'" aria-selected="true"> '.$region_each->name.'</a></li>';
        }

        if(count($region)==0){$d_none='d-none';} else {$d_none='';}

        $cities_data= '<span id="region_path" class="fw-600 ml-2">'.$cities_path.' '.$level.'</span> <span onclick="clearCities()" class="badge badge-inline badge-danger text-center"> ✘ </span> <input  autocomplete="off" id="myInput" placeholder=" Search '.$level2.'..." onkeyup="search_shipping_city()" type="text" class="form-control '.$d_none.'">'.$cities_data.'</ul><script>$("#city").val("'.$cities_path.'"); $("#city_id").val("'.$child.'"); </script>';
        return ($cities_data);
    }



    public function region_path($parents){   $parent='';   $passing_link='';
        if (is_numeric($parents)){
        $shipping_cities = ShippingCities::all();
        foreach($shipping_cities as $shipping_cities_single){
            $citybyid[$shipping_cities_single['id']]=$shipping_cities_single['name'];
            $this_id=$shipping_cities_single['id'];
        }

             $parent_ids[0]=$parents;
             $shippingcity_parent_id=(ShippingCities::where('id', $parents)->get())['0']['parent_id'];
             $shippingcity_name=$parents;

             $k=1;
            while (true){
                    $found_flag=0;
                    foreach($shipping_cities as $shipping_cities_single){
                        $this_id=$shipping_cities_single['id'];

                        if($shippingcity_parent_id==$this_id){  //this is a parent
                            $parent_ids[$k++]=$this_id;
                            $shippingcity_parent_id=$shipping_cities_single['parent_id'];
                            $found_flag=1;
                            break 1;
                        }
                    }
                    if($found_flag==0){break; }
             }
             krsort($parent_ids);

              foreach($parent_ids as $parent_ids_single){
                $passing_link=$passing_link.$citybyid[$parent_ids_single].'  » ';
             }
        return ($passing_link);
        }
        else {
            return ($parents);
        }

    }




    public function citylist($parents){   $parent='';  $form_title=''; $search=''; $child_byid=array();
        $previous=url()->full();
        $lp=explode('?search=',$previous);


        $city_edit  =array();
        $city_edit['id']='0';

            $array=explode('&',$parents);
            if(count($array)>1){
                $last_id=explode('&',$parents)[1];
                $parents=explode('&',$parents)[0];
                if($last_id>0){
                    $city_edit  = ShippingCities::findOrFail($last_id);
                }
            }

        $passing_link='<a href="'.url("/admin/shipping/divisions").'">Divisions</a>  » ';
        $shipping_cities = ShippingCities::all();
        foreach($shipping_cities as $shipping_cities_single){
            $citybyid[$shipping_cities_single['id']]=$shipping_cities_single['name'];
            $this_id=$shipping_cities_single['id'];

            $childCount = DB::table('shipping_cities')->where('parent_id', $this_id)->count();
            $child_byid[$this_id]=$childCount;
        }


        if($parents=='divisions'){    //all divisions
            $form_title='Division';
            $cities = ShippingCities::where('parent_id','=',Null)->paginate(15);
            $parent='';
        }else {    //all districts under a divisions

            //this city
            $parent_ids[0]=$shippingcity_id=(ShippingCities::where('name', $parents)->get())['0']['id'];
            $shippingcity_parent_id=(ShippingCities::where('name', $parents)->get())['0']['parent_id'];
            $shippingcity_name=$parents;

            $k=1;
            while (true){
                    $found_flag=0;
                    foreach($shipping_cities as $shipping_cities_single){
                        $this_id=$shipping_cities_single['id'];

                        if($shippingcity_parent_id==$this_id){  //this is a parent
                            $parent_ids[$k++]=$this_id;
                            $shippingcity_parent_id=$shipping_cities_single['parent_id'];
                            $found_flag=1;
                            break 1;
                        }
                    }
                    if($found_flag==0){break; }
             }
             krsort($parent_ids);

             foreach($parent_ids as $parent_ids_single){
                $passing_link=$passing_link.'<a href="'.url("/admin/shipping/".$citybyid[$parent_ids_single]."").'">'.$citybyid[$parent_ids_single].'</a>  » ';
             }


        $temp1=explode('»',$passing_link);
        $level="";$level2=""; $child="";
        if(count($temp1)==3){ $level2="District/City"; } elseif(count($temp1)==4){   $level2="Area";

        }else{
             $level2="Area";
        }



            $form_title=$level2.' of '.$parents;
            $parent=$parents;
            $cities = ShippingCities::where('parent_id', $shippingcity_id)->paginate(15);

        }


        $shipping_cities = ShippingCities::all();
        $countries = Country::where('status', 1)->get();
        $shipping_cost_area=$this->shipping_cost_area();
        return view('backend.setup_configurations.ShippingCities.index', compact('city_edit','cities', 'countries','shipping_cost_area','shipping_cities','passing_link','parent','form_title','child_byid'));
    }



    public function store(Request $request)
    {
        $shippingcities = new ShippingCities;


        if(string_validate('/^[a-zA-Z0-9\s\-\/]+$/','',$request->name)==0){error("Please Input Valid City Name");
        }else {

        $shippingcities->name = $request->name;
        $shippingcities->country_id = $request->country_id;
        $shippingcities->area_id = $request->area_id;
        $shippingcities->parent_id = $request->parent_id;

		$duplicate = DB::table('shipping_cities')->where('name', $request->name)->count();

		if($duplicate==0){
			 $shippingcities->save();
			 flash(translate('ShippingCity has been inserted successfully'))->success();
		} else {
			error("Name will be Unique only");
		}

        }return back();
    }



    public function edit(Request $request, $id)
    {
        $city  = ShippingCities::findOrFail($id);
        $countries = Country::where('status', 1)->get();
        $shipping_cost_area=$this->shipping_cost_area();
        return view('backend.setup_configurations.ShippingCities.edit', compact('city', 'countries','shipping_cost_area'));
    }

    public function update(Request $request, $id)
    {
		//$duplicate = DB::table('shipping_cities')->where('name', $request->name)->count();
        $duplicate = DB::table('shipping_cities')->where('name', $request->name)->where('area_id', $request->area_id)->count();
		if(string_validate('','alphabet',$request->name)==0){error("Name will be  Alphabetic only"); }else {
			$shippingcities = ShippingCities::findOrFail($id);
			$shippingcities->name = $request->name;
			$shippingcities->country_id = $request->country_id;
			$shippingcities->area_id = $request->area_id;

			if($duplicate==0){
				 $shippingcities->save();
				 flash(translate('ShippingCity has been inserted successfully'))->success();
			} else {
				error("Name will be Unique only");
			}

		}return back();
    }


    public function destroy($id)
    {
        $error=0;
        //city is used?
        $is_used = DB::table('addresses')->where('city_id','=',$id)->count();
        if($is_used>0){$error++;}

        if($error>0){error("This city already used"); }else{
            $childCount = DB::table('shipping_cities')->where('parent_id', $id)->count();

            if($childCount>0){
                flash(translate('Error! This ShippingCity is already used by another '.$childCount.' city'))->error();
                return redirect()->away(explode('&',url()->previous())['0']);
            }else{
            $shippingcities = ShippingCities::findOrFail($id);
                ShippingCities::destroy($id);
                flash(translate('ShippingCity has been deleted successfully'))->success();
                return redirect()->away(explode('&',url()->previous())['0']);
            }
        }
    }

    //special shipping
    public function check_category_special($cat_id,$subamnt){
        $shipping_categories = ShippingCategories::where('id','=',$cat_id)->get();
        $parent_id=$shipping_categories['0']['parent_id'];

        $cost_inc=ShippingCategories::where('id','=',$parent_id)->get();
        $data=$cost_inc['0']['cost_increment'];

        $arr=explode('flat_seller',$data);
        if(count($arr)>1){return 1;}else{return 0;}
    }

    public function get_shipping_cost_category_special($cat_id,$subamnt){

        $shipping_categories = ShippingCategories::where('id','=',$cat_id)->get();
        $parent_id=$shipping_categories['0']['parent_id'];

        $cost_inc=ShippingCategories::where('id','=',$parent_id)->get();
        $data=$cost_inc['0']['cost_increment'];

        $arr=explode('flat_seller',$data);

        //my total
        $subtotal = 0;
        foreach (Session::get('cart') as $key => $cartItem) {
            $subtotal += $cartItem['price'] * $cartItem['quantity'];
        }

        //have amount shipping discount?
        $max_amount=0;
        $max_discount_=0;

        $arr2=explode('[',$data);
        if($arr2['1']!=''){
            $arr3=explode(']',$arr2['1']);
            if($arr3['0']!=''){
                $get_data_array=explode(',',$arr3['0']);
                foreach ($get_data_array as $get_data_array_single){
                    $amnt=explode('=',$get_data_array_single)['0'];
                    $amntdis=explode('%',explode('=',$get_data_array_single)['1'])['0'];
                    if($subtotal>=$amnt){   $max_discount_=$amntdis;  }
                }
            }
        }

        if(count($arr)>1){
            $special_cat_cost=0;
            $special_category_flag=Session::get('special_category_flag');
            if($special_category_flag=='initialize' || $special_category_flag=='re-initialize'){
                if($max_discount_!=0){
                    $temp1=$max_discount_/100;
                    $temp2=$subamnt*$temp1;

                    $special_cat_cost=$temp2;
                    if($special_cat_cost==0){return '-0';}
                }else{$special_cat_cost=0; }
            }  //used
            $special_category_flag_initialize=Session::put('special_category_flag','used');
            return $special_cat_cost;
        }else {
            return ('-1');
        }
    }*/




}
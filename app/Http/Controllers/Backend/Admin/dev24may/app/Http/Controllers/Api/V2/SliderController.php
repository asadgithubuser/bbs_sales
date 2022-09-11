<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Resources\V2\SliderCollection;
use Cache;

class SliderController extends Controller
{
    public function index()
    {
		

 
		
        return Cache::remember('app.home_slider_images', 86400, function(){
			
                            $slider_images = json_decode(get_setting('home_slider_images'), true);    
                            $slider_orders = json_decode(get_setting('home_slider_order'), true);     
                            $slider_orders_bc=$slider_orders;
                            rsort($slider_orders);  
 

							  $new_sl='';	
                             foreach ($slider_orders as $key => $value){
								 $place_key = array_search($value, $slider_orders_bc);
								 if($new_sl==''){ $new_sl=$slider_images[$place_key]; }else{ $new_sl=$new_sl.','.$slider_images[$place_key];  }
							 }			
			
            return new SliderCollection(explode(',',$new_sl));
        });
    }
}

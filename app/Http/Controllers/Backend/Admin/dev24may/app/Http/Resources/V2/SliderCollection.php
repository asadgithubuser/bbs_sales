<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\DB;
class SliderCollection extends ResourceCollection
{
	
	public function stringEndsWith($haystack,$needle,$case=true) {
    $expectedPosition = strlen($haystack) - strlen($needle);
    if ($case){
        return strrpos($haystack, $needle, 0) === $expectedPosition;
    }
    return strripos($haystack, $needle, 0) === $expectedPosition;
	}
	
	
	
	public function title($id,$needs)
    {
        
		 
		$home_slider_links=json_decode(get_setting('home_slider_links'), true);
		$home_slider_images=json_decode(get_setting('home_slider_images'), true);
		
 
				$key=array_search($id, $home_slider_images);
 
				//check individual product
				$fd_array=explode('product/',$home_slider_links[$key]);
				if(!empty($fd_array[1])){
					$ff = DB::table('products')->where('slug', $fd_array[1])->first();
					$title=$ff->name;
					$id_of=$ff->id;
 
					if($needs=='title'){return $title; }
					if($needs=='id'){return strval($id_of); }	 
					if($needs=='type'){return 'product'; }	
				}	
				
				//check flash deal
				$fd_array=explode('flash-deal/',$home_slider_links[$key]);
				if(!empty($fd_array[1])){
					$ff = DB::table('flash_deals')->where('slug', $fd_array[1])->first();
					$title=$ff->title;
					$id_of=$ff->id;
 
					if($needs=='title'){return $title; }
					if($needs=='id'){return strval($id_of); }	 
					if($needs=='type'){return 'flash_deal'; }	
				}	

				
				//check category  
				$fd_array=explode('category/',$home_slider_links[$key]);
				if(!empty($fd_array[1])){
					$ff = DB::table('categories')->where('slug', $fd_array[1])->first();
					$title=$ff->name;
					$id_of=$ff->id;
					
 
					if($needs=='title'){return $title; }
					if($needs=='id'){return strval($id_of); }	 
					if($needs=='type'){return 'category'; }	
				}
				
				
				//check shop  
				 $fd_array=explode('shop/',$home_slider_links[$key]);
				if(!empty($fd_array[1])){
 
					$ff = DB::table('shops')->where('slug', explode('/',$fd_array[1])[0])->first();
					$title=$ff->name;
					$id_of=$ff->id;
					
 
					if($needs=='title'){return $title; }
					if($needs=='id'){return strval($id_of); }	 
					if($needs=='type'){return 'seller'; }	
				} 
				
				//check todays deal
				if(!empty($this->stringEndsWith($home_slider_links[$key],"todays_deal"))){
					if($needs=='type'){return 'todays_deal'; }	else{
						return '1';
					} 
				}

				if($needs=='id'){return strval('1'); }
				if($needs=='title'){return 'none'; }
				if($needs=='type'){return 'none'; }

 
    }
	
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function($data) {
                return [
                    'photo' => api_asset($data),
					'id' => $this->title($data,'id'),
					'title' => $this->title($data,'title'),
					'type' => $this->title($data,'type'),  
                ];
            })
        ];
    }

    public function with($request)
    {
        return [
            'success' => true,
            'status' => 200
        ];
    }
}

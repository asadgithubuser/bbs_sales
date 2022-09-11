<?php

namespace App\Models;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\ProductTranslation;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;
use Auth;
use Storage;
use Illuminate\Support\Facades\DB;

//bulk 
use App\Utility\NotificationUtility;
use App\Utility\SmsUtility;
use App\Models\SmsTemplate;
use App\OtpConfiguration;
use App\Http\Controllers\OTPVerificationController;
use App\Notifications\OrderNotification;
use App\Models\Notification;

//class ProductsImport implements ToModel, WithHeadingRow, WithValidation
class ProductsImport implements ToCollection, WithHeadingRow,SkipsEmptyRows, ToModel
{
    private $rows = 0;
    public $mode;
	
	function __construct($mode) {
	 $this->mode = $mode;
	}
	
    public function collection(Collection $rows) {
        $canImport = true;
        if (addon_is_activated('seller_subscription')){
            if(Auth::user()->user_type == 'seller' && Auth::user()->seller->seller_package && (count($rows) + Auth::user()->seller->user->products()->count()) > Auth::user()->seller->seller_package->product_upload_limit) {
                $canImport = false;
                flash(translate('Upload limit has been reached. Please upgrade your package.'))->warning();
            }
        } 
		$counter=0; //test('',$this->mode);
		
		$upload_count=0;
		
		if($this->mode=='pro_upload'){
				//bulk insert
				if($canImport) {
					foreach ($rows as $row) {
						$approved = 1;
						if(Auth::user()->user_type == 'seller' && get_setting('product_approve_by_admin') == 1) {
							$approved = 0;
						}
						
						
						
						$valid=1;
						if(empty($row['current_stock']) || empty($row['gallery1']) || empty($row['thumbnail_img']) || empty($row['category_id']) || empty($row['name']) || empty($row['unit_price']) || empty($row['purchase_price'])){$valid=0;}
						if($valid==1){
							
						$all='';
						if(empty($row['gallery1'])){}else{$all=$row['gallery1'];}
						if(empty($row['gallery2'])){}else{$all=$all.','.$row['gallery2'];}
						if(empty($row['gallery3'])){}else{$all=$all.','.$row['gallery3'];}
						
						$dam=0;
						
						$dis=$row['discount'];
						
						if($row['discount_type']=='percent' || $row['discount_type']=='amount'){
							if($row['discount_type']=='percent'){
								$dam=$row['unit_price']-(($dis*$row['unit_price'])/100);
							} else { 
								$dam=$row['unit_price']-$dis;
							}				    
						}else{
							$row['discount']=0.00;
							$row['discount_type']='';
						}

						
					 
						$slug=preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($row['slug']??$row['name']))) . '-' . Str::random(5);
						
						
						if($row['seller_id']==''){
							$user_ids=Auth::user()->user_type == 'seller' ? Auth::user()->id : User::where('user_type', 'admin')->first()->id;
							$user_types='admin';
						}else{
							$user_ids=$row['seller_id'];
							$user_types='seller';
							$approved=$row['approved']??'0';
						}							
							
							
							
						$dis_type=$row['discount_type'];
						$dis_=$row['discount'];
						
						
						
						 if($dis_type=='amount' || $dis_type=='percent'){}else{$dis_type=''; $dis_='';}
						
					 
						if($row['shipping_type']=='weight_based' || $row['shipping_type']=='free' || $row['shipping_type']=='category_wise' || $row['shipping_type']=='flat_rate'){ $shipping_type=$row['shipping_type']; $ship_cost=$row['shipping_cost']; }
						else{
							$shipping_type='flat_rate'; $ship_cost='0';
						}
						
						if(!is_numeric($ship_cost)){   $ship_cost='0';	}
						
						$productId =DB::table('products')->insertGetId([
									'name' => $row['name'],
									'description' => $row['description'],
									'tags' => $row['tags'],
									'added_by' => $user_types,
									'user_id' => $user_ids,
									'approved' => $approved,
									'category_id' => $row['category_id'],
									'min_qty' => $row['min_qty']??'1',
									'max_qty' => $row['max_qty']??'0',
									'brand_id' => $row['brand_id'],
									'video_provider' => $row['video_provider']??'youtube',
									'video_link' => $row['video_link'],
									'unit_price' => $row['unit_price'],
									'purchase_price' => $row['purchase_price'] == null ? $row['unit_price'] : $row['purchase_price'],
									'unit' => $row['unit'],
									'meta_title' => $row['meta_title'],
									'discount' => $dis_,
									'discount_type' => $dis_type,
									
									'meta_description' => $row['meta_description'],
									'colors' => json_encode(array()),
									'choice_options' => json_encode(array()),
									'variations' => json_encode(array()),
									'slug' =>$slug ,
									'thumbnail_img' => $this->downloadThumbnail2($row['thumbnail_img']),
									'photos' => $this->downloadGalleryImages2($all),
									'shipping_type' => $shipping_type ,
									'shipping_cost' => $ship_cost,
									'est_shipping_days' => $row['est_shipping_days'],
									'refundable' => $row['refundable'],
									'published' => $row['published']??'0',
							 
						]);
						
							ProductStock::create([
								'product_id' => $productId,
								'qty' => $row['current_stock'],
								'price' => $row['unit_price'],
								'variant' => '',
							]);
						
						
							$ProductTranslationId =DB::table('product_translations')->insertGetId([
								'product_id' => $productId,
								'name' => $row['name'],
								'unit' => $row['unit'],
								'description' => $row['description'],
								'lang' => 'en',
							]);
								
 
						    DB::table('product_stocks')
							->where('product_id', $productId)
							->update(['sku' => $row['sku']]);
								
								$upload_count++;
						}
					}
					
					flash(translate($upload_count.' Products imported successfully'))->success();
				}			
			
		}else{
			if($canImport) {
				foreach ($rows as $row) {




				if(!empty($row['id'])){
										if($row['id']!=''){
						$product                    = Product::findOrFail($row['id']);



						
						if($this->mode=='shipping_related'){
							//all shipping related
							 if($row['shipping_type']=='weight_based' || $row['shipping_type']=='free' || $row['shipping_type']=='category_wise' || $row['shipping_type']=='flat_rate')
								{ 
			 
									if($row['shipping_type']=='free'){
										$product->shipping_type  = $row['shipping_type'];
										$product->shipping_cost = 0;
										$product->est_shipping_days  =$row['est_shipping_days'];
										$product->save();
										$counter++;	
									}						
									
									else if($row['shipping_cost']!=''){
										if(is_numeric($row['shipping_cost'])==1){}else{ flash(translate(' Invalid Shipping Value of product '.$row['id']))->warning(); return null; } 
										$product->shipping_type  = $row['shipping_type'];
										$product->shipping_cost = $row['shipping_cost'];
										if($product->shipping_cost<0){  flash(translate(' Shipping cost can not be Negative of product '.$row['id']))->warning(); return null;   }
										$product->est_shipping_days  =$row['est_shipping_days'];
										$product->save();
										$counter++;								
									} 
						
						
						
						
								}else{
									 flash(translate(' Invalid Shipping Type of product '.$row['id']))->warning(); return null; 
								} 
						 }
						 
						 
						 
							if($this->mode=='price'){
								//validation
								if(is_numeric($row['unit_price'])==1 && is_numeric($row['purchase_price'])==1 && (is_numeric($row['discount'])==1 || $row['discount']=='') ){}else{ flash(translate(' Invalid Price Value of product '.$row['id']))->warning(); return null; } 
								if($row['discount_type']=='amount' || $row['discount_type']=='percent'){}else{ flash(translate(' Invalid discount type of product '.$row['id']))->warning(); return null; } 
								
								if($row['discount'] > $row['unit_price']){  flash(translate('discount can not be  greater than unit_price of product '.$row['id']))->warning(); return null;  }
								
								if($row['discount']<0 && !empty($row['discount'])){  flash(translate('discount can not be  less than 0 '.$row['id']))->warning(); return null;  }else{
									$product->discount  =$row['discount'];
								}
								
										$product->unit_price  = $row['unit_price'];
										$product->purchase_price = $row['purchase_price'];
										
										$product->discount_type  =$row['discount_type'];
										$product->save();
										$counter++;	

										//price update of product_stocks
										$stock                    = ProductStock::where('product_id', $product->id)->firstOrFail();  
										
										/*if($row['discount_type']=='amount'){
											$gen_price=$row['unit_price']-$row['discount'];
										}else{
											$gen_price=$row['unit_price']-(($row['unit_price']*$row['discount'])/100);
										}
										
										$gen_price=round($gen_price,2);*/
										
										$gen_price=$row['unit_price'];
										$stock->price = $gen_price;
										$stock->save();
										 
		
							}		 				
							
							if($this->mode=='pro_info'){
						 
								//validation

								
								if(is_numeric($row['refundable'])==1 ||  $row['refundable']==''){}else{ flash(translate(' Invalid Refundable Value of product '.$row['id']))->warning(); return null; } 
								if($row['published']=='1' || $row['published']=='0' || $row['published']==''){}else{ flash(translate(' Invalid published of product '.$row['id']))->warning(); return null; } 
								if($row['approved']=='1' || $row['approved']=='0' || $row['approved']==''){}else{ flash(translate(' Invalid approved of product '.$row['id']))->warning(); return null; } 
										
								
								if(!empty($row['refundable'])){ $product->refundable = $row['refundable']; }
								if(!empty($row['published'])){ $product->approved  =$row['approved']??'0';}
								if(!empty($row['approved'])){ $product->published  =$row['published']??'0';}
										
																		
                                if(is_numeric($row['current_stock'])==1 ||  $row['current_stock']==''){}else{ flash(translate(' Invalid current stock Value of product '.$row['id']))->warning(); return null; } 
								if(!empty($row['current_stock'])){$product->current_stock = $row['current_stock'];}
								if(!empty($row['name'])){$product->name  = $row['name'];}
								if(!empty($row['description'])){$product->description  = $row['description'];}
								if(!empty($row['unit'])){$product->unit  = $row['unit'];}
								if(!empty($row['tags'])){$product->tags  = $row['tags'];}
								
								

								$product->min_qty = $row['min_qty']??'1';
								$product->max_qty = $row['max_qty']??'0';
									
						 
								if(($product->min_qty>$product->max_qty) && ($product->max_qty!='0')){  flash(translate('min_qty can not be  greater than max_qty of product '.$row['id']))->warning(); return null;  }
								if(($product->current_stock<0 && !empty($product->current_stock))){  flash(translate('current_stock can not be  negative of product '.$row['id']))->warning(); return null;  }
 								
								
                                $product->save();
								
										$counter++;	

										//quantity update of product_stocks
	 
										$stock                    = ProductStock::where('product_id', $product->id)->firstOrFail();  
										if(!empty($row['current_stock'])){$stock->qty = $row['current_stock'];}
										if(!empty($row['sku'])){$stock->sku = $row['sku'];}
										$stock->save();	

										
										//translation
										$pro_trans                    = ProductTranslation::where('product_id', $product->id)->where('lang', 'en')->firstOrFail(); 
										if(!empty($row['description'])){$pro_trans->description  = $row['description'];}
										if(!empty($row['unit'])){$pro_trans->unit  =$row['unit'];}
										if(!empty($row['name'])){$pro_trans->name  =$row['name'];}
										$pro_trans->save(); 										
										
							}								
							if($this->mode=='cat_update'){
								if(is_numeric($row['category_id'])==1){}else{ flash(translate(' Invalid category_id Value of product '.$row['id']))->warning(); return null; } 
										$product->category_id  = $row['category_id'];
										$product->save();
										$counter++;										
										
							}							
							if($this->mode=='seller_update'){
								if(is_numeric($row['seller_id'])==1){}else{ flash(translate(' Invalid seller_id Value of product '.$row['id']))->warning(); return null; } 
										if(user_by_id($row['seller_id'])->user_type=='admin'){
											$product->added_by  ='admin';
										}else{
											$product->added_by  ='seller';
										}
										$product->user_id  = $row['seller_id'];
										$product->save();
										$counter++;										
										
							}							
							if($this->mode=='brand_update'){
								if(!empty($row['brand_id'])){
																	if(is_numeric($row['brand_id'])==1){}else{ flash(translate(' Invalid brand_id Value of product '.$row['id']))->warning(); return null; }
								}
								
										$product->brand_id  = $row['brand_id'];
										$product->save();
										$counter++;										
										
							}		




							
	
							
							
							
					}
				}else{
					
					
 
							if($this->mode=='order_update'){
										//validation
										 if(!empty($row['invoice_no'])){
											        $get_order_id='';
												    //$get_order=DB::table('orders')->where('code', $row['invoice_no'])->first();
													$get_order = Order::where('code', $row['invoice_no'])->first();
													if(!empty($get_order)){ $get_order_id=$get_order->id;  $get_user_id=$get_order->user_id;  }
										}else{
											flash(translate(' Invalid invoice_no '.$row['invoice_no']))->warning(); return null;
										} 
										
										
										
										
										//update delivery _status
										if(!empty($row['delivery_status'])){
										   if($row['delivery_status']=='pending' || $row['delivery_status']=='confirmed' || $row['delivery_status']=='picked_up' || $row['delivery_status']=='on_the_way' || $row['delivery_status']=='delivered' || $row['delivery_status']=='cancelled'){
												$affected1 =DB::table('orders')
												->where('code', $row['invoice_no'])
												->where('delivery_status','!=', 'cancelled')
												->where('delivery_status','!=', 'delivered')
												->update(['delivery_status' => $row['delivery_status']]);		
												
												DB::table('order_details')
												->where('order_id', $get_order_id)
												->where('delivery_status','!=', 'cancelled')
												->where('delivery_status','!=', 'delivered')
												->update(['delivery_status' => $row['delivery_status']]);


 
												/////////////////Noti. Start //////////////////////
												 if($affected1){
													 
													 $device=(object)[
														 'device_token'=>user_by_id($get_user_id)->device_token,
														 'title'=>"Order updated !",
														 'status'=> str_replace("_", "", $get_order->delivery_status),
														 'text' => " Your order {$get_order->code} has been {$row['delivery_status']}",
														 'type'  => "order",
														 'id'  => $get_order->id,
														 'user_id'  => $get_user_id														 
													 ];
 
													NotificationUtility::sendNotification($get_order, $row['delivery_status']);															
													NotificationUtility::sendFirebaseNotification($device);													
												 }
												///////////////// End //////////////////////
										   }else{
											   flash(translate(' Invalid delivery_status Value of invoice_no '.$row['invoice_no']))->warning(); return null;
										   }
										}	
										
										
										
										
										
										if(!empty($row['payment_status'])){
										   if($row['payment_status']=='unpaid' || $row['payment_status']=='paid'){
												$affected2=DB::table('orders')
												->where('code', $row['invoice_no'])
												->update(['payment_status' => $row['payment_status']]);	   
												DB::table('order_details')
												->where('order_id', $get_order_id)
												->update(['payment_status' => $row['payment_status']]);	   
										   
										   
										   
												/////////////////Noti. Start //////////////////////
												 if($affected2){
												   $device=(object)[
														 'device_token'=>user_by_id($get_user_id)->device_token,
														 'title'=>"Order updated !",
														 'status'=> str_replace("_", "", $get_order->payment_status),
														 'text' => " Your order {$get_order->code} has been {$row['delivery_status']}",
														 'type'  => "order",
														 'id'  => $get_order->id,
														 'user_id'  => $get_user_id														 
													 ]; 

													NotificationUtility::sendNotification($get_order, $row['payment_status']);															
													NotificationUtility::sendFirebaseNotification($device);
 												
												} 
												///////////////// End //////////////////////										   

										   }else{
											   flash(translate(' Invalid payment_status Value of invoice_no '.$row['invoice_no']))->warning(); return null;
										   }
										}										
										
										
										
										
										
										
										
										if(!empty($row['order_comments'])){
										   
												$already=DB::table('order_comments')
												->where('order_id', $get_order_id)
												->where('comment', $row['order_comments'])->first();	
												
												if(empty($already)){
														$order_comments =DB::table('order_comments')->insertGetId([
																	'comment' => $row['order_comments'],
																	'order_id' => $get_order_id,
																	'user_id' => Auth::user()->id,

														]);												
												}
												 
										}
										
							}				
				}


					
					
					
					
					
					
					
					
					
				}
						if($this->mode=='order_update'){flash(translate(' Orders Updated successfully'))->success();   }else{flash(translate($counter.' Products Updated successfully'))->success();} 
			}			
		}		
		
		

        
        
		
		
		
		
		
		
		
		
    }
    
    public function model(array $row)
    {
        ++$this->rows;
    }
    
    public function getRowCount(): int
    {
        return $this->rows;
    }

    public function rules(): array
    {
        return [
             // Can also use callback validation rules
             'unit_price' => function($attribute, $value, $onFailure) {
                  if (!is_numeric($value)) {
                       $onFailure('Unit price is not numeric');
                  }
              }
        ];
    }

    public function downloadThumbnail($url){
        try {
            $extension = pathinfo($url, PATHINFO_EXTENSION);
            $filename = 'uploads/all/'.Str::random(5).'.'.$extension;
            $fullpath = 'public/'.$filename;
            $file = file_get_contents($url);
            file_put_contents($fullpath, $file);

            $upload = new Upload;
            $upload->extension = strtolower($extension);

            $upload->file_original_name = $filename;
            $upload->file_name = $filename;
            $upload->user_id = Auth::user()->id;
            $upload->type = "image";
            $upload->file_size = filesize(base_path($fullpath));
            $upload->save();

            if(env('FILESYSTEM_DRIVER') == 's3'){
                $s3 = Storage::disk('s3');
                $s3->put($filename, file_get_contents(base_path($fullpath)));
                unlink(base_path($fullpath));
            }

            return $upload->id;
        } catch (\Exception $e) {
            //dd($e);
        }
        return null;
    }
	
	
	
	
	
	public function downloadThumbnail2($url){
         $url=explode('public/',$url)[1];
		 if(!empty($url)){
			return $ids=DB::table('uploads')->where('file_name','=', $url)->first()->id ?? null;
			
		 }
		 return null;
    }

    public function downloadGalleryImages2($urls){
 
	   $stri='';
        foreach(explode(',', str_replace(' ', '', $urls)) as $url){
            //$data[] = $this->downloadThumbnail2($url);
				 $url=explode('public/',$url)[1];
				 if(!empty($url)){
					$ids=DB::table('uploads')->where('file_name','=', $url)->first()->id ?? null;
					if($ids!=''){ if($stri==''){$stri=$ids;}else{$stri=$stri.','.$ids;} }
				 }
		 
        }
        return $stri;
    }
	
	
}

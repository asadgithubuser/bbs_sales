<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Resources\V2\ReviewCollection;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Upload;
use Hash;
use Illuminate\Support\Facades\File;
use Storage;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index($id)
    {
        return new ReviewCollection(Review::where('product_id', $id)->where('status', 1)->orderBy('updated_at', 'desc')->paginate(10));
    }

    public function submit(Request $request)
    {
        $product = Product::find($request->product_id);
        $user = User::find($request->user_id);

        /*
         @foreach ($detailedProduct->orderDetails as $key => $orderDetail)
                                            @if($orderDetail->order != null && $orderDetail->order->user_id == Auth::user()->id && $orderDetail->delivery_status == 'delivered' && \App\Models\Review::where('user_id', Auth::user()->id)->where('product_id', $detailedProduct->id)->first() == null)
                                                @php
                                                    $commentable = true;
                                                @endphp
                                            @endif
                                        @endforeach
        */

        $reviewable = false;

        foreach ($product->orderDetails as $key => $orderDetail) {
            if($orderDetail->order != null && $orderDetail->order->user_id == $request->user_id && $orderDetail->delivery_status == 'delivered' && \App\Models\Review::where('user_id', $request->user_id)->where('product_id', $product->id)->first() == null){
                $reviewable = true;
            }
        }

        if(!$reviewable){
            return response()->json([
                'result' => false,
                'message' => translate('You cannot review this product')
            ]);
        }

        $review = new \App\Models\Review;
        $review->product_id = $request->product_id;
        $review->user_id = $request->user_id;
		
		
					$reviews_ids=array();
					$i=0; //find order id
					$reviews_id = DB::table('reviews')->where('product_id', $request->product_id)->where('user_id', $request->user_id)->get();
					foreach($reviews_id as $reviews_id_each){
						$reviews_ids[$i++]=$reviews_id_each->order_id; 
					} 
 
		
		            $order_id = DB::table('orders')
                    ->join('order_details', 'order_details.order_id', '=', 'orders.id')
                    ->where('orders.user_id', $request->user_id)
                    ->where('order_details.product_id', $request->product_id)
					->whereNotIn('orders.id', $reviews_ids)  
                    ->select('orders.id as order_id')->first()->order_id;
       
					
		$review->order_code = $order_id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
		$review->photos = $request->upload_images;
        $review->viewed = 0;
        $review->save();

        $count = Review::where('product_id', $product->id)->where('status', 1)->count();
        if($count > 0){
            $product->rating = Review::where('product_id', $product->id)->where('status', 1)->sum('rating')/$count;
        }
        else {
            $product->rating = 0;
        }
        $product->save();

        if($product->added_by == 'seller'){
            $seller = $product->user->seller;
            $seller->rating = (($seller->rating*$seller->num_of_reviews)+$review->rating)/($seller->num_of_reviews + 1);
            $seller->num_of_reviews += 1;
            $seller->save();
        }

        return response()->json([
            'result' => true,
            'message' => translate('Review  Submitted')
        ]);
    }
	
	
	
	//added
	    public function uploadImage(Request $request)
    {

//test('1',$request->filename);

        $type = array(
            "jpg" => "image",
            "jpeg" => "image",
            "png" => "image",
            "svg" => "image",
            "webp" => "image",
            "gif" => "image",
        );

        try {
            $image = $request->image;
            $request->filename;
            $realImage = base64_decode($image);

            $dir = public_path('uploads/all');
            $full_path = "$dir/$request->filename";

            $file_put = file_put_contents($full_path, $realImage); // int or false

            if ($file_put == false) {
                return response()->json([
                    'result' => false,
                    'message' => "File uploading error",
                    'path' => "",
					'uploadId' => ""
                ]);
            }


            $upload = new Upload;
            $extension = strtolower(File::extension($full_path));
            $size = File::size($full_path);

            if (!isset($type[$extension])) {
                unlink($full_path);
                return response()->json([
                    'result' => false,
                    'message' => "Only image can be uploaded",
                    'path' => "",
					'uploadId' => ""
                ]);
            }


            $upload->file_original_name = null;
            $arr = explode('.', File::name($full_path));
            for ($i = 0; $i < count($arr) - 1; $i++) {
                if ($i == 0) {
                    $upload->file_original_name .= $arr[$i];
                } else {
                    $upload->file_original_name .= "." . $arr[$i];
                }
            }

            //unlink and upload again with new name
            unlink($full_path);
            $newFileName = rand(10000000000, 9999999999) . date("YmdHis") . "." . $extension;
            $newFullPath = "$dir/$newFileName";

            $file_put = file_put_contents($newFullPath, $realImage);

            if ($file_put == false) {
                return response()->json([
                    'result' => false,
                    'message' => "Uploading error",
                    'path' => "",
					'uploadId' => ""
                ]);
            }

            $newPath = "uploads/all/$newFileName";

            if (env('FILESYSTEM_DRIVER') == 's3') {
                Storage::disk('s3')->put($newPath, file_get_contents(base_path('public/') . $newPath));
                unlink(base_path('public/') . $newPath);
            }

            $upload->extension = $extension;
            $upload->file_name = $newPath;
            $upload->user_id = $request->id;
            $upload->type = $type[$upload->extension];
            $upload->file_size = $size;
            $upload->save();

           /* $user  = User::find($request->id);
            $user->avatar_original = $upload->id;
            $user->save();*/



            return response()->json([
                'result' => true,
                'message' => $request->filename.' '.translate("Image Added"),
                'path' => api_asset($upload->id),
			    'uploadId' => $upload->id.' '
            ]);
			
 		
			
        } catch (\Exception $e) {
            return response()->json([
                'result' => false,
                'message' => $e->getMessage(),
                'path' => "",
                'uploadId' => ""
            ]);
        }
    }
	
	
	
	
}

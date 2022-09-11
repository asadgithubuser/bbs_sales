<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Utility\NotificationUtility;


class NotificationController extends Controller
{
    public function index() {
        $notifications = auth()->user()->notifications()->paginate(15);
        
        auth()->user()->unreadNotifications->markAsRead();
        
        if(Auth::user()->user_type == 'admin') {
            return view('backend.notification.index', compact('notifications'));
        }
        
        if(Auth::user()->user_type == 'seller') {
            return view('frontend.user.seller.notification.index', compact('notifications'));
        }
        
        if(Auth::user()->user_type == 'customer') {
            return view('frontend.user.customer.notification.index', compact('notifications'));
        }
        
    }
	
	
	
	
	    public function main(Request $request)
    {
		$notifications = DB::table('notification_promos')->orderBy('id', 'desc')->paginate(15);
        return view('backend.marketing.notification.index', compact('notifications'));
    }
	
	
    public function send_notofocation($device,$body,$title,$image,$link)
    {
		$url = 'https://fcm.googleapis.com/fcm/send';
		
		$title_more='home';
		$id_of=0;
		$type='home';
		
		if($link){
				//check individual product
				$fd_array=explode('product/',$link);
				if(!empty($fd_array[1])){
					$ff = DB::table('products')->where('slug', $fd_array[1])->first();
					$title_more=$ff->name;
					$id_of=$ff->id;
					$type='product';	
				}


				//check flash deal
				$fd_array=explode('flash-deal/',$link);
				if(!empty($fd_array[1])){
					$ff = DB::table('flash_deals')->where('slug', $fd_array[1])->first();
					$title_more=$ff->title;
					$id_of=$ff->id;
					$type='flash_deal';	 
				}	

				
				//check category  
				$fd_array=explode('category/',$link);
				if(!empty($fd_array[1])){
					$ff = DB::table('categories')->where('slug', $fd_array[1])->first();
					$title_more=$ff->name;
					$id_of=$ff->id;
					$type='category';	  	
				}
				
				
				//check shop  
				$fd_array=explode('shop/',$link);
				if(!empty($fd_array[1])){
					$ff = DB::table('shops')->where('slug', explode('/',$fd_array[1])[0])->first();
					$title_more=$ff->name;
					$id_of=$ff->id;
					$type='seller'; 	
				} 

				
		}



        $fields = array
        (
            'to' => $device,
            'notification' => [
                'body' => $body,
                'title' => $title,
                'sound' => 'default', /*Default sound*/
				'image' =>$image
            ],
			'data' => [
				'title' => $title_more,
                'item_type' => $type,
                'item_type_id' => $id_of,
                'click_action' => 'FLUTTER_NOTIFICATION_CLICK'
            ]
        );

        //$fields = json_encode($arrayToSend);
        $headers = array(
            'Authorization: key=' . env('FCM_SERVER_KEY'),
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        $result = curl_exec($ch);
        curl_close($ch);		
	}		
	
	
	
    public function store_promos(Request $request)
    {

		$name=$request->name;
		$title=$request->title;
		$text=$request->text;
		$image=$request->image;
		$link=$request->link;
		$sound_disable=$request->sound_disable??1;
		
		$type=$request->noti_type;
		$status=$request->status??1;

		$counts=0;
		if($status=='1'){ //send

				if($request->user_select=='specific'){
					$users=$request->users;
					if(empty($users)){flash(translate('Please Select Specific Users'))->error(); return back(); }
					foreach($users as $users_each){
						//send all device_token
						$device=explode('<!-separated-!>',$users_each)[1];
						if(!empty($device)){  $counts++;  $this->send_notofocation($device,$text,$title,$image,$link);	

							if($type=='Default'){
								$id_=uniqid().rand();
								$data=$request->title.'<!-separated-!>'.$request->text;
								$spec_user=explode('<!-separated-!>',$users_each)[0];								
								DB::insert('insert into notifications (created_by, id, type, data, notifiable_type, notifiable_id) values (?, ?, ?, ?, ?, ?)', [auth()->user()->id, $id_, 'Others', $data, 'App\Models\User', $spec_user]);    }
						}				
					}
				}else{
					$users = DB::table('users')->where('device_token','!=','' )->get();	
					foreach($users as $users_each){
						//send all device_token
						$device=$users_each->device_token;
						if(!empty($device)){   $counts++; $this->send_notofocation($device,$text,$title,$image,$link);	

							if($type=='Default'){							
								$id_=uniqid().rand();
								$data=$request->title.'<!-separated-!>'.$request->text;
								$spec_user=$users_each->id;
								DB::insert('insert into notifications (created_by, id, type, data, notifiable_type, notifiable_id) values (?, ?, ?, ?, ?, ?)', [auth()->user()->id, $id_, 'Others', $data, 'App\Models\User', $spec_user]);    }
						}	
					}
				}

		}
		
		$id = DB::table('notification_promos')->insertGetId(
			array('link' => $link,'created_by' => auth()->user()->id,'counts' => $counts,'name' => $name,'title' => $title,'text' => $text,'image' => $image,'sound_disable' => $sound_disable,'type' => $type,'sound_disable' => $sound_disable,'status' => $status)
		);			
		
        flash(translate('Notification has been stored successfully'))->success();  
		
		if(!empty($request->notifi_id)){
			if($status=='1'){
				DB::delete('delete from notification_promos where id = ? and status =0',[$request->notifi_id]);
			}
		}
		
		$notifications = DB::table('notification_promos')->orderBy('id', 'desc')->paginate(15);
        return view('backend.marketing.notification.index', compact('notifications'));
    }
	
	
	    public function destroy($id)
    {
 
		DB::delete('delete from notification_promos where id = ?',[$id]);
 
        flash(translate('Notification has been deleted successfully'))->success();
        return back();
    }
	
	
	     public function edit_promos($id)
     {   
		 $notifications = DB::table('notification_promos')->orderBy('id', 'desc')->paginate(15);
		 $edited_notifications = DB::table('notification_promos')->WHERE('id',$id)->first();
		 return view('backend.marketing.notification.index', compact('notifications','edited_notifications'));
     }	
	 
	     public function filter(Request $request)
     {   
		 $sort_notification=$request->sort_notification;
		 $notifications = DB::table('notification_promos')->WHERE('name','like','%'.$sort_notification.'%')->orWHERE('title','like','%'.$sort_notification.'%')->orderBy('id', 'desc')->paginate(15);
		 return view('backend.marketing.notification.index', compact('notifications','sort_notification'));
     }

}

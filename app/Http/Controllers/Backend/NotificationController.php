<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\GenerateSurveyNotification;

class NotificationController extends Controller
{
    public function markAsRead(Request $request)
    {
        
        $id = $request->id;
        
        $value = DB::table('notifications')->where('id', $id)->update([
            'read_at' => now(),
        ]);
        $notifications = DB::table('notifications');
        $page = View('backend.layout.notification',[
            'notifications' => $notifications
        ])->render();
        if($request->ajax())
        {
            return Response()->json(array(
                'success' => true,
                'page' => $page,
            ));
        }
    }

    // Notification goto url 
    public function gotoNotification($notiID)
    {
        $notification = DB::table('notifications')->where('id', $notiID)->first();
        $notificationArray = (array) json_decode($notification->data);
        $gotoURL = $notificationArray['gotoURL'];
        $now = now();

        $updated = DB::table('notifications')->where('id', $notiID)->update(['read_at' => $now]);

        if ($updated)
        {
            return redirect($gotoURL);
        } else {
            return back()->with('error', 'Something went wrong, Please try again...!');
        }
        
    }

    // Agricultural notification
    public function gotoAgriNotification($notiId)
    {
        $notiInfo = GenerateSurveyNotification::where('id', $notiId)->first();
        $notiInfo->read_status = 1;
        $notiInfo->save();
        return redirect($notiInfo->goto_url);
    }
}

<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;

// Included Models
use App\Models\AgricultureSurveyNotification;


class AgricultureSurveyNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if (Gate::allows('agri_survey_notification', $user)) 
        {
            menuSubmenu('agriSurveyNoti','allAgriSurveyNoti');
            $notifications = AgricultureSurveyNotification::where('receiver_user_id', $user->id)
                            ->with('receiverUser', 'senderUser', 'surveyForm')
                            ->latest()->paginate(15);
            
            return view('backend.admin.agriculture.agriSurveyNoti.index', compact('notifications'));

        }else{

            abort(403);
        }
    }

    // Date range filter
    public function dateFilter(Request $request)
    {
        $user = Auth::user();

        if (Gate::allows('agri_survey_notification', $user)) 
        {
            menuSubmenu('agriSurveyNoti','allAgriSurveyNoti');
            // Prepare from date
            if(empty($request->fromDate))
            {
                $from = '1970-01-01 00:00:00'; //date format 'Y-m-d' date('Y-m-d'.' 00:00:00')
            }else{
                $from = $request->fromDate.' 00:00:00';
            }

            // Prepare to date
            if(empty($request->toDate))
            {
                $to = date('Y-m-d'. ' 23:59:59');
            }else{
                $to = $request->toDate.' 23:59:59';
            }

            $notifications = AgricultureSurveyNotification::with('receiverUser', 'senderUser', 'surveyForm')
                            ->where('receiver_user_id', $user->id)
                            ->where('created_at', '>=', $from)
                            ->where('created_at', '<=', $to)
                            ->latest()->paginate(15);

            return view('backend.admin.agriculture.agriSurveyNoti.index', compact('notifications'));

        }else{

            abort(403);
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Notification;
use App\Models\User;
use App\Models\Union;
use App\Models\Mouza;
use App\Models\Cluster;
use App\Models\SurveyForm;
use App\Models\GenerateSurveyNotification;
use Validator;
use App\Models\SurveyProcessList;
use App\Models\SurveyNotification;
use App\Notifications\SurveyProcessListNotifications;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function shankalanForm($id, Request $request)
    {
        $notification = $request->notification;
        
        $form = SurveyForm::find($id);       

        $me = Auth::user();
       
        $officersLists = User::where('division_id',$me->division_id)
                                ->where('district_id',$me->district_id)
                                ->where('upazila_id',$me->upazila_id)->where('role_id',9)->where('id','<>',$me->id)->get();
        
        $unions = Union::where('division_id',$me->division_id)
                        ->where('district_id',$me->district_id)
                        ->where('upazila_id',$me->upazila_id)->where('status',1)->get();
                     
        $survey_noti = SurveyNotification::where('id', $notification)->first();

        $cluster = Cluster::where('upazila_id', $me->upazila_id)
                            ->where('status',1)
                            ->first();
        
        return view('backend.admin.form.shankalanForm',[
            'officersLists' => $officersLists,
            'unions' => $unions,
            'form'=>$form,
            'notification' => $notification,
            'survey_noti' => $survey_noti,
            'cluster' => $cluster
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        // dd($request->all());
        $validation = Validator::make($request->all(),
        [ 
            'form_id' => ['required'],
            'officer' => ['required'],
        ]);

        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        }

        $me = Auth::user();
        
        if($request->union_id)
        {   
            $mouzas = [];
            if($request->mouza_id)
            {
               
                
        
                foreach($request->mouza_id as $mouza)
                {                    
                    $data = array_push($mouzas,$mouza);
                }
            }
            $unions = [];
            foreach($request->union_id as $union)
            {
                
                $data = array_push($unions,$union);
            }

            $officers = [];
            foreach($request->officer as $officer)
            {   
                $data = array_push($officers,$officer);
            }
            
            for($i = 0 ; $i<sizeof($unions) ; $i++)
            {
                
                $surveyProcessList = new SurveyProcessList;
    
                $surveyProcessList->survey_form_id = $request->form_id;
                $surveyProcessList->survey_notification_id = $request->notification_id; 
                $surveyProcessList->division_id = $me->division_id;
                $surveyProcessList->district_id = $me->district_id;
                $surveyProcessList->upazila_id = $me->upazila_id;
                $surveyProcessList->union_id = $unions[$i];
                if($mouzas)
                {
                    $surveyProcessList->mouja_id = $mouzas[$i];

                }
                // $surveyProcessList->bunch_stains_id = $request->cluster_id ? $request->cluster_id : null;
                
                // $surveyProcessList->survey_by = $request->officer;
                $surveyProcessList->survey_by = $officers[$i];
                $surveyProcessList->year = date('Y');
                
                $surveyProcessList->status = 1;
    
                $surveyProcessList->created_by = Auth::user()->id;
                $surveyProcessList->save();

                // for field user notification
                $receiver_user_id = $surveyProcessList->surveyBy;
                
                $value = $surveyProcessList->surveyForm ? $surveyProcessList->surveyForm->display_name : '';
                $data = "Please collect the survey data of $value from your area";

                if($surveyProcessList->survey_form_id == 1)
                {
                    $gotoURL = route('admin.farmersForm.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 2)
                {
                    $gotoURL = route('admin.clusterForm.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 3)
                {
                    $gotoURL = route('admin.temporaryCropForm.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 4)
                {
                    $gotoURL = route('admin.perennialCropForm.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 5)
                {
                    $gotoURL = route('admin.cropCuttingProductionForm.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 6)
                {
                    $gotoURL = route('admin.surveyTofsilForm3Maize.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 7)
                {
                    $gotoURL = route('admin.potatoCropCutting.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 8)
                {
                    $gotoURL = route('admin.surveyTofsilForm8.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 10)
                {
                    $gotoURL = route('admin.surveyTofsilForm10.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 11)
                {
                    $gotoURL = route('admin.surveyTofsilForm11.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 12)
                {
                    $gotoURL = route('admin.surveyTofsilForm7.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 13)
                {
                    $gotoURL = route('admin.surveyTofsilForm9.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                
                // Notification::send($receiver_user_id, new SurveyProcessListNotifications($data, $surveyProcessList->created_by, $gotoURL, $surveyProcessList->survey_form_id));

                $generateSurveyNotification = new GenerateSurveyNotification;

                $generateSurveyNotification->receiver_id = $receiver_user_id->id;
                $generateSurveyNotification->receiver_designation_id = $receiver_user_id->designation_id;
                $generateSurveyNotification->survey_notification_id = $request->notification_id;
                $generateSurveyNotification->data = $data;
                $generateSurveyNotification->sender_id = $me->id;
                $generateSurveyNotification->goto_url = $gotoURL;
                $generateSurveyNotification->survey_form_id = $surveyProcessList->survey_form_id;
                $generateSurveyNotification->read_status = 0;
                $generateSurveyNotification->status = 1;

                $generateSurveyNotification->save();
            }
        }
        elseif($request->mouza_id) {
            
            $mouzas = [];
        
            foreach($request->mouza_id as $mouza)
            {
                
                $data = array_push($mouzas,$mouza);
            }

            $officers = [];
            foreach($request->officer as $officer)
            {   
                $data = array_push($officers,$officer);
            }
            
            for($i = 0 ; $i<sizeof($mouzas) ; $i++)
            {
                $surveyProcessList = new SurveyProcessList;
    
                $surveyProcessList->survey_form_id = $request->form_id;
                $surveyProcessList->survey_notification_id = $request->notification_id; 
                $surveyProcessList->division_id = $me->division_id;
                $surveyProcessList->district_id = $me->district_id;
                $surveyProcessList->upazila_id = $me->upazila_id;
                $surveyProcessList->union_id = $unions[$i];        
                $surveyProcessList->mouja_id = $mouzas[$i];
                // $surveyProcessList->bunch_stains_id = $request->cluster_id ? $request->cluster_id : null;
                
                // $surveyProcessList->survey_by = $request->officer;
                $surveyProcessList->survey_by = $officers[$i];
                $surveyProcessList->year = date('Y');
                
                $surveyProcessList->status = 1;
    
                $surveyProcessList->created_by = Auth::user()->id;
                $surveyProcessList->save();

                // for field user notification
                $receiver_user_id = $surveyProcessList->surveyBy;
                
                $value = $surveyProcessList->surveyForm ? $surveyProcessList->surveyForm->display_name : '';
                $data = "Please collect the survey data of $value from your area";

                if($surveyProcessList->survey_form_id == 1)
                {
                    $gotoURL = route('admin.farmersForm.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 2)
                {
                    $gotoURL = route('admin.clusterForm.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 3)
                {
                    $gotoURL = route('admin.temporaryCropForm.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 4)
                {
                    $gotoURL = route('admin.perennialCropForm.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 5)
                {
                    $gotoURL = route('admin.cropCuttingProductionForm.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 6)
                {
                    $gotoURL = route('admin.surveyTofsilForm3Maize.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 7)
                {
                    $gotoURL = route('admin.potatoCropCutting.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 8)
                {
                    $gotoURL = route('admin.surveyTofsilForm8.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 10)
                {
                    $gotoURL = route('admin.surveyTofsilForm10.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 11)
                {
                    $gotoURL = route('admin.surveyTofsilForm11.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 12)
                {
                    $gotoURL = route('admin.surveyTofsilForm7.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 13)
                {
                    $gotoURL = route('admin.surveyTofsilForm9.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                
                // Notification::send($receiver_user_id, new SurveyProcessListNotifications($data, $surveyProcessList->created_by, $gotoURL, $surveyProcessList->survey_form_id));

                $generateSurveyNotification = new GenerateSurveyNotification;

                $generateSurveyNotification->receiver_id = $receiver_user_id->id;
                $generateSurveyNotification->receiver_designation_id = $receiver_user_id->designation_id;
                $generateSurveyNotification->survey_notification_id = $request->notification_id;
                $generateSurveyNotification->data = $data;
                $generateSurveyNotification->sender_id = $me->id;
                $generateSurveyNotification->goto_url = $gotoURL;
                $generateSurveyNotification->survey_form_id = $surveyProcessList->survey_form_id;
                $generateSurveyNotification->read_status = 0;
                $generateSurveyNotification->status = 1;

                $generateSurveyNotification->save();
            }
        }
        elseif($request->cluster_id)
        {   
            $clusters = [];
            foreach($request->cluster_id as $cluster)
            {
                
                $data = array_push($clusters,$cluster);
            }

            $officers = [];
            foreach($request->officer as $officer)
            {   
                $data = array_push($officers,$officer);
            }
            
            for($i = 0 ; $i<sizeof($clusters) ; $i++)
            {
                $surveyProcessList = new SurveyProcessList;
    
                $surveyProcessList->survey_form_id = $request->form_id;
                $surveyProcessList->survey_notification_id = $request->notification_id; 
                $surveyProcessList->division_id = $me->division_id;
                $surveyProcessList->district_id = $me->district_id;
                $surveyProcessList->upazila_id = $me->upazila_id;
                
                $surveyProcessList->bunch_stains_id = $clusters[$i];
                
                $surveyProcessList->survey_by = $officers[$i];
                $surveyProcessList->year = date('Y');
                
                $surveyProcessList->status = 1;
    
                $surveyProcessList->created_by = Auth::user()->id;
                $surveyProcessList->save();

                // for field user notification
                $receiver_user_id = $surveyProcessList->surveyBy;
                
                $value = $surveyProcessList->surveyForm ? $surveyProcessList->surveyForm->display_name : '';
                $data = "Please collect the survey data of $value from your area";

                if($surveyProcessList->survey_form_id == 1)
                {
                    $gotoURL = route('admin.farmersForm.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 2)
                {
                    $gotoURL = route('admin.clusterForm.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 3)
                {
                    $gotoURL = route('admin.temporaryCropForm.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 4)
                {
                    $gotoURL = route('admin.perennialCropForm.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 5)
                {
                    $gotoURL = route('admin.cropCuttingProductionForm.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 6)
                {
                    $gotoURL = route('admin.surveyTofsilForm3Maize.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 7)
                {
                    $gotoURL = route('admin.potatoCropCutting.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 8)
                {
                    $gotoURL = route('admin.surveyTofsilForm8.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 10)
                {
                    $gotoURL = route('admin.surveyTofsilForm10.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 11)
                {
                    $gotoURL = route('admin.surveyTofsilForm11.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 12)
                {
                    $gotoURL = route('admin.surveyTofsilForm7.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 13)
                {
                    $gotoURL = route('admin.surveyTofsilForm9.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                
                // Notification::send($receiver_user_id, new SurveyProcessListNotifications($data, $surveyProcessList->created_by, $gotoURL, $surveyProcessList->survey_form_id));

                $generateSurveyNotification = new GenerateSurveyNotification;

                $generateSurveyNotification->receiver_id = $receiver_user_id->id;
                $generateSurveyNotification->receiver_designation_id = $receiver_user_id->designation_id;
                $generateSurveyNotification->survey_notification_id = $request->notification_id;
                $generateSurveyNotification->data = $data;
                $generateSurveyNotification->sender_id = $me->id;
                $generateSurveyNotification->goto_url = $gotoURL;
                $generateSurveyNotification->survey_form_id = $surveyProcessList->survey_form_id;
                $generateSurveyNotification->read_status = 0;
                $generateSurveyNotification->status = 1;

                $generateSurveyNotification->save();
            }
        } else {
            $officers = [];

            foreach($request->officer as $officer)
            {   
                $data = array_push($officers, $officer);
            }
            
            for($i = 0 ; $i<sizeof($officers) ; $i++)
            {
                $surveyProcessList = new SurveyProcessList;
    
                $surveyProcessList->survey_form_id = $request->form_id;
                $surveyProcessList->survey_notification_id = $request->notification_id; 
                $surveyProcessList->division_id = $me->division_id;
                $surveyProcessList->district_id = $me->district_id;
                $surveyProcessList->upazila_id = $me->upazila_id;
                
                $surveyProcessList->survey_by = $officers[$i];
                $surveyProcessList->year = date('Y');
                
                $surveyProcessList->status = 1;
    
                $surveyProcessList->created_by = Auth::user()->id;
                $surveyProcessList->save();

                // for field user notification
                $receiver_user_id = $surveyProcessList->surveyBy;
                
                $value = $surveyProcessList->surveyForm ? $surveyProcessList->surveyForm->display_name : '';
                $data = "Please collect the survey data of $value from your area";

                if($surveyProcessList->survey_form_id == 1)
                {
                    $gotoURL = route('admin.farmersForm.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 2)
                {
                    $gotoURL = route('admin.clusterForm.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 3)
                {
                    $gotoURL = route('admin.temporaryCropForm.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 4)
                {
                    $gotoURL = route('admin.perennialCropForm.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 5)
                {
                    $gotoURL = route('admin.cropCuttingProductionForm.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 6)
                {
                    $gotoURL = route('admin.surveyTofsilForm3Maize.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 7)
                {
                    $gotoURL = route('admin.potatoCropCutting.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 8)
                {
                    $gotoURL = route('admin.surveyTofsilForm8.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 10)
                {
                    $gotoURL = route('admin.surveyTofsilForm10.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 11)
                {
                    $gotoURL = route('admin.surveyTofsilForm11.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 12)
                {
                    $gotoURL = route('admin.surveyTofsilForm7.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                else if($surveyProcessList->survey_form_id == 13)
                {
                    $gotoURL = route('admin.surveyTofsilForm9.create', ['suerveyProList'=>$surveyProcessList->id]);
                }
                
                // Notification::send($receiver_user_id, new SurveyProcessListNotifications($data, $surveyProcessList->created_by, $gotoURL, $surveyProcessList->survey_form_id));

                $generateSurveyNotification = new GenerateSurveyNotification;

                $generateSurveyNotification->receiver_id = $receiver_user_id->id;
                $generateSurveyNotification->receiver_designation_id = $receiver_user_id->designation_id;
                $generateSurveyNotification->survey_notification_id = $request->notification_id;
                $generateSurveyNotification->data = $data;
                $generateSurveyNotification->sender_id = $me->id;
                $generateSurveyNotification->goto_url = $gotoURL;
                $generateSurveyNotification->survey_form_id = $surveyProcessList->survey_form_id;
                $generateSurveyNotification->read_status = 0;
                $generateSurveyNotification->status = 1;

                $generateSurveyNotification->save();
            }
        }
        
        // return redirect()->route('admin.surveyList.index')->with('success', 'Field Officer Assigned Update Successfully.');
        return back()->with('success','Field Officer Assigned Successfully.');
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
    public function edit(SurveyProcessList $id)
    {
        $me = Auth::user();
        $form = SurveyForm::find($id->survey_form_id);
        $officersLists = User::where('division_id',$me->division_id)
        ->where('district_id',$me->district_id)
        ->where('upazila_id',$me->upazila_id)->where('role_id',9)->where('id','<>',$me->id)->get();
        
        $unions = Union::where('division_id',$me->division_id)
        ->where('district_id',$me->district_id)
        ->where('upazila_id',$me->upazila_id)->where('status',1)->get();
        $list = $id;
        
        $mouzas = Mouza::where('union_id',$list->union_id)->get();
        // dd($mouzas);

        return view('backend.admin.form.edit',[
            'officersLists' => $officersLists,
            'unions' => $unions,
            'form'=>$form,
            'list' => $list,
            'mouzas'=>$mouzas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SurveyProcessList $surveyProcessList)
    {
        $me = Auth::user();

        
        $surveyProcessList->survey_form_id = $request->form_id;
        // $surveyProcessList->survey_notification_id = 
        $surveyProcessList->division_id =$me->division_id;
        $surveyProcessList->district_id = $me->district_id;
        $surveyProcessList->upazila_id = $me->upazila_id;
        $surveyProcessList->union_id = $request->union_id;        

        $surveyProcessList->mouja_id =  $request->mouza_id;
        
        $surveyProcessList->survey_by = $request->officer;
        
        $surveyProcessList->status = 1; // Field

        $surveyProcessList->save();

        return redirect()->route('admin.surveyList.index')->with('success', 'Field Officer Assigned Update Successfully.');
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

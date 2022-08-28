<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Validator;
use Auth;
use App\Models\User;
use App\Models\SurveyForm;
use Notification;
use App\Notifications\SurveyNotifications;
use App\Models\SurveyNotification;
use App\Models\Crop;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\AgricultureSurveyNotification;
use App\Models\GenerateSurveyNotification;

class SuveryNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if (Gate::allows('manage_agriculture', $user))
        {
            if(Gate::allows('all_surveyNotification',$user))
            {            
                
                menuSubmenuSubsubmeny('agriculture', 'surveyNotification', 'allsurveyNotification');     

                $surveyNoti = SurveyNotification::where('is_published',1)->latest()->paginate(25);
                return view('backend.admin.agriculture.surveyNotification.index',[
                    'surveyNoti' => $surveyNoti
                ]);
                
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        if (Gate::allows('manage_agriculture', $user))
        {
            if(Gate::allows('add_surveyNotification',$user))
            {          
                menuSubmenuSubsubmeny('agriculture', 'surveyNotification', 'addsurveyNotification');
        
                $surveyNotification = SurveyNotification::where('is_published',0)->where('created_by',Auth::user()->id)->first();
                $crops = Crop::where('status',1)->where('is_published',1)->get();
                
                $surveyForms = SurveyForm::where('status',1)->where('is_published',1)->get();
                if(!$surveyNotification)
                {
                    $surveyNotification = new SurveyNotification;
                    $surveyNotification->is_published = false;
                    $surveyNotification->status = false;
                    $surveyNotification->created_by = Auth::user()->id;
                    $surveyNotification->save();
                }

                $divisions = Division::where('status',1)->get();
                $districts = District::where('status',1)->get();
                $upazilas = Upazila::where('status',1)->get();

                return view('backend.admin.agriculture.surveyNotification.create',[
                    'surveyNotification' => $surveyNotification,
                    'crops'=>$crops,
                    'surveyForms'=>$surveyForms,
                    'divisions'=>$divisions,
                    'districts'=>$districts,
                    'upazilas'=>$upazilas,
                ]);
                
            }
            else
            {
                abort(403);
            }
        }
        else
        {
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
    public function show(SurveyNotification $surveyNotification)
    {
        
        $user = Auth::user();

        if (Gate::allows('manage_agriculture', $user))
        {
            if(Gate::allows('details_surveyNotification',$user))
            {            

                return view('backend.admin.agriculture.surveyNotification.show',[
                    'surveyNotification' => $surveyNotification,
                    
                ]);
                
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SurveyNotification $surveyNotification)
    {
        
        $user = Auth::user();

        if (Gate::allows('manage_agriculture', $user))
        {
            if(Gate::allows('edit_surveyNotification',$user))
            {            
                $divisions = Division::where('status',1)->get();
                $districts = District::where('status',1)->get();
                $upazilas = Upazila::where('status',1)->get();

                $crops = Crop::where('status',1)->where('is_published',1)->get();
                $surveyForms = SurveyForm::where('status',1)->where('is_published',1)->get();
                
                return view('backend.admin.agriculture.surveyNotification.create',[
                    'surveyNotification' => $surveyNotification,
                    'crops'=>$crops,
                    'surveyForms'=>$surveyForms,
                    'divisions'=>$divisions,
                    'districts'=>$districts,
                    'upazilas'=>$upazilas,
                ]);
                
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SurveyNotification $surveyNotification)
    {
        
        $type = $request->type;

        $validation = Validator::make($request->all(),
        [ 
            'survey_form_id' => ['required'],
            // 'crop_id' => ['required'],
            // 'scope_of_action_number' => ['required'],
            'start_date_of_collection' => ['required'],
            "start_date_of_collection" => ["required"],
            "end_date_of_collection" => ["required"],
            "notification_start_data_head_office" => ["required"],
            "notification_end_data_head_office" => ["required"],
            "notification_start_data_division" => ["required"],
            "notification_end_data_division" => ["required"],
            "notification_start_data_zila" => ["required"],
            "notification_end_data_zila" => ["required"],
            "notification_start_data_upazila" => ["required"],
            "notification_end_data_upazila" => ["required"],
            "notification_start_data_field" => ["required"],
            "notification_end_data_field" => ["required"],
        ]);

        if($validation->fails())
        {
            return back()
            ->withInput()
            ->withErrors($validation);
        }

        if($type == 'add'){
            $surveyNotification->survey_for = $request->survey_for;
            if($request->survey_for == "specific")
            {
                // Tauhid
                $divisionIds = $request->division_id;
                $surveyNotification->division_id = implode(',', $divisionIds);
                $districtIds = $request->district_id;
                $surveyNotification->district_id = implode(',', $districtIds);
                $upazilaIds = $request->upazila_id;
                $surveyNotification->upazila_id = implode(',', $upazilaIds);

                // Atiq
                // $surveyNotification->division_id = $request->division_id;
                // $surveyNotification->district_id = $request->district_id;
                // $surveyNotification->upazila_id = $request->upazila_id;
            }

            $surveyNotification->survey_form_id = $request->survey_form_id;
            $surveyNotification->survey_episode = $request->survey_episode;
            $surveyNotification->crop_id = $request->crop_id;
            $surveyNotification->crop_type = $request->crop_type;
            $surveyNotification->scope_of_action_number = $request->scope_of_action_number;
            $surveyNotification->start_date_of_collection = $request->start_date_of_collection;
            $surveyNotification->start_date_of_collection = $request->start_date_of_collection;
            $surveyNotification->end_date_of_collection = $request->end_date_of_collection;
            $surveyNotification->notification_start_data_head_office = $request->notification_start_data_head_office;
            $surveyNotification->notification_end_data_head_office = $request->notification_end_data_head_office;
            $surveyNotification->notification_start_data_division = $request->notification_start_data_division;
            $surveyNotification->notification_end_data_division = $request->notification_end_data_division;
            $surveyNotification->notification_start_data_zila = $request->notification_start_data_zila;
            $surveyNotification->notification_end_data_zila = $request->notification_end_data_zila;
            $surveyNotification->notification_start_data_upazila = $request->notification_start_data_upazila;
            $surveyNotification->notification_end_data_upazila = $request->notification_end_data_upazila;
            $surveyNotification->notification_start_data_field = $request->notification_start_data_field;
            $surveyNotification->notification_end_data_field = $request->notification_end_data_field;
            
            $surveyNotification->status = $request->status == 'on' ? 1 : 0;
            $surveyNotification->is_published = true;
            $surveyNotification->created_by = Auth::user()->id;
            $surveyNotification->save();
            
            $value = $surveyNotification->surveyForm ? $surveyNotification->surveyForm->display_name : '';
            $data = "Please collect the survey data of $value from your area";
            
            $gotoURL = url('bbs/agriculture-form/shankalanForm',['id'=>$surveyNotification->survey_form_id,'notification'=>$surveyNotification]);
            
            // notificaion
            if($request->survey_for == "specific")
            {
                $divisions = explode(',', $surveyNotification->division_id);
                $districts = explode(',', $surveyNotification->district_id);
                $upazilas = explode(',', $surveyNotification->upazila_id);
                
                $receiver_user_ids = User::where('role_id', 9)
                                    ->where('designation_id', 9)
                                    ->whereIn('division_id', $divisions)
                                    ->whereIn('district_id', $districts)
                                    ->whereIn('upazila_id', $upazilas)
                                    ->get();

                foreach($receiver_user_ids as $receiver_user_id)
                {
                    
                    $agriSurvey = new AgricultureSurveyNotification;
                    // $agriSurvey->survey_notification_id = $surveyNotification->id; 
                    $agriSurvey->receiver_user_id = $receiver_user_id->id;
                    $agriSurvey->sender_user_id = $surveyNotification->created_by;
                    $agriSurvey->survey_form_id = $surveyNotification->survey_form_id;
                    $agriSurvey->survey_form = $surveyNotification->surveyForm ? $surveyNotification->surveyForm->display_name : '';
                    $agriSurvey->save();
                    
                    // Notification::send($receiver_user_id, new SurveyNotifications($data, $surveyNotification->created_by, $gotoURL, $surveyNotification->survey_form_id));

                    $generateSurveyNotification = new GenerateSurveyNotification;
                    
                    $generateSurveyNotification->receiver_id = $receiver_user_id->id;
                    $generateSurveyNotification->receiver_designation_id = $receiver_user_id->designation_id;
                    $generateSurveyNotification->survey_notification_id = $surveyNotification->id;
                    $generateSurveyNotification->data = $data;
                    $generateSurveyNotification->sender_id = $surveyNotification->created_by;
                    $generateSurveyNotification->goto_url = $gotoURL;
                    $generateSurveyNotification->survey_form_id = $surveyNotification->survey_form_id;
                    $generateSurveyNotification->read_status = 0;
                    $generateSurveyNotification->status = 1;
                    $generateSurveyNotification->save();
                
                }
            }
            elseif($request->survey_for =="all")
            {

                $receiver_user_ids = User::where('role_id',9)
                                        ->where('designation_id', 9)
                                        ->where('division_id','<>',null)
                                        ->where('district_id','<>',null)
                                        ->where('upazila_id','<>',null)
                                        ->get();

                foreach($receiver_user_ids as $receiver_user_id)
                {
                    $agriSurvey = new AgricultureSurveyNotification;
                    // $agriSurvey->survey_notification_id = $surveyNotification->id; 
                    $agriSurvey->receiver_user_id = $receiver_user_id->id;
                    $agriSurvey->sender_user_id = $surveyNotification->created_by;
                    $agriSurvey->survey_form_id = $surveyNotification->survey_form_id;
                    $agriSurvey->survey_form = $surveyNotification->surveyForm ? $surveyNotification->surveyForm->display_name : '';
                    $agriSurvey->save();
                    
                    // Notification::send($receiver_user_id, new SurveyNotifications($data, $surveyNotification->created_by, $gotoURL, $surveyNotification->survey_form_id));

                    $generateSurveyNotification = new GenerateSurveyNotification;
                    $generateSurveyNotification->receiver_id = $receiver_user_id->id;
                    $generateSurveyNotification->receiver_designation_id = $receiver_user_id->designation_id;
                    $generateSurveyNotification->survey_notification_id = $surveyNotification->id;
                    $generateSurveyNotification->data = $data;
                    $generateSurveyNotification->sender_id = $surveyNotification->created_by;
                    $generateSurveyNotification->goto_url = $gotoURL;
                    $generateSurveyNotification->survey_form_id = $surveyNotification->survey_form_id;
                    $generateSurveyNotification->read_status = 0;
                    $generateSurveyNotification->status = 1;
                    $generateSurveyNotification->save();
                }
            }

            // end notification

            return redirect()->route('admin.surveyNotification.index')->with('success','Survey Notification Added Successfully.');
            
        }
        elseif($type == 'edit'){
            $surveyNotification->survey_for = $request->survey_for;
            if($request->survey_for == "specific")
            {
                // Tauhid
                $divisionIds = $request->division_id;
                $surveyNotification->division_id = implode(',', $divisionIds);
                $districtIds = $request->district_id;
                $surveyNotification->district_id = implode(',', $districtIds);
                $upazilaIds = $request->upazila_id;
                $surveyNotification->upazila_id = implode(',', $upazilaIds);

                // Atiq
                // $surveyNotification->division_id = $request->division_id;
                // $surveyNotification->district_id = $request->district_id;
                // $surveyNotification->upazila_id = $request->upazila_id;
            }

            $surveyNotification->survey_form_id = $request->survey_form_id;
            $surveyNotification->survey_episode = $request->survey_episode;
            $surveyNotification->crop_id = $request->crop_id;
            $surveyNotification->crop_type = $request->crop_type;
            $surveyNotification->scope_of_action_number = $request->scope_of_action_number;
            $surveyNotification->start_date_of_collection = $request->start_date_of_collection;
            $surveyNotification->start_date_of_collection = $request->start_date_of_collection;
            $surveyNotification->end_date_of_collection = $request->end_date_of_collection;
            $surveyNotification->notification_start_data_head_office = $request->notification_start_data_head_office;
            $surveyNotification->notification_end_data_head_office = $request->notification_end_data_head_office;
            $surveyNotification->notification_start_data_division = $request->notification_start_data_division;
            $surveyNotification->notification_end_data_division = $request->notification_end_data_division;
            $surveyNotification->notification_start_data_zila = $request->notification_start_data_zila;
            $surveyNotification->notification_end_data_zila = $request->notification_end_data_zila;
            $surveyNotification->notification_start_data_upazila = $request->notification_start_data_upazila;
            $surveyNotification->notification_end_data_upazila = $request->notification_end_data_upazila;
            $surveyNotification->notification_start_data_field = $request->notification_start_data_field;
            $surveyNotification->notification_end_data_field = $request->notification_end_data_field;
            
            $surveyNotification->status = $request->status == 'on' ? 1 : 0;
            $surveyNotification->is_published = true;
            $surveyNotification->created_by = Auth::user()->id;
            $surveyNotification->save();

            return redirect()->route('admin.surveyNotification.index')->with('success','Survey Notification Updated Successfully.');

        }
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

    public function delete(SurveyNotification $surveyNotification)
    {
        $user = Auth::user();

        if (Gate::allows('manage_agriculture', $user))
        {
            if(Gate::allows('delete_surveyNotification',$user))
            {            
                
                if($surveyNotification->status == true){
                    $surveyNotification->status = false;
                    $surveyNotification->save();
                }
                elseif($surveyNotification->status == false){
                    $surveyNotification->status = true;
                    $surveyNotification->save();
                }
        
                // return redirect()->route('admin.crop.index')->with('success','Crop Category Updated Successfully.');
                return redirect()->back();
                
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            abort(403);
        }

        
    }
}

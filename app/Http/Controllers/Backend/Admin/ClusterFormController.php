<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Support\Facades\Gate;
use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/* included models */
use App\Models\Union;
use App\Models\Crop;
use App\Models\SurveyProcessList;
use App\Models\SurveyNotification;
use App\Models\SurveyTofsilForm1;
use App\Models\SurveyCompilationCollectForm1;
use App\Models\SurveyProcessForwardingLog;
use App\Models\GenerateSurveyNotification;

class ClusterFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if (Gate::allows('farmers_data', $user)) 
        {
            menuSubmenu('farmersData', 'clustersData');

            $clustersData = SurveyTofsilForm1::with('division', 'district', 'upazila', 'cluster')->where('created_by', $user->id)->where('status', false)->latest()->paginate(15);
            
            return view('backend.admin.surveyForms.clusterForm.index', compact('clustersData'));

        }else{
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        
        if (Gate::allows('survey_forms', $user)) 
        {
            if(Gate::allows('farmers_form', $user))
            {
                // get last value from url
                $url = $request->url();
                $url = basename($url);
                $number = is_numeric($url);

                menuSubmenu('surveyForms', 'clusterForm');

                $processListId = $request->surveyProListId;
               
                if(empty($processListId))
                {
                    $processList = SurveyProcessList::with('cluster', 'mouza', 'union')->where('status',1)->where('survey_form_id', 2)->where('survey_by', $user->id)->get();
                    
                    $crops = Crop::where('status', 1)->get();
                    
                    if($processList->count() > 0)
                    {    
                        return view('backend.admin.surveyForms.clusterForm.surveyProcessList', [
                            'processLists' => $processList
                        ]);
                    }
                    else
                    { 
                        return view('backend.admin.surveyForms.clusterForm.clusterForm', compact('crops', 'number'));
                    }

                }else{
                    
                    $processList = SurveyProcessList::with('cluster', 'union', 'mouza')->where('id', $processListId)->first();

                    $unions = Union::where('upazila_id', $user->upazila_id)
                                    ->where('status', 1)
                                    ->get();

                    $crops = Crop::where('status', 1)->get();
                    
                    $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 1)->first();
                    
                    $surveyNotification = SurveyNotification::where('id', $processList->survey_notification_id)->first();
                    
                    return view('backend.admin.surveyForms.clusterForm.clusterForm', compact('processListId', 'processList', 'unions', 'crops', 'surveyNotification', 'surveyList', 'number'));
                }
               
            }else{
                abort(403);
            }

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
        $request->validate([
            'farmers_name'                      => 'required',
            'farmers_father_name'               => 'required',
            'farmers_mobile'                    => 'required',
            'land_identification_no'            => 'required',
            'land_amount'                       => 'required',
            'use_land_type'                     => 'required',
            // 'irrigation_system'                 => 'required',
        ]);

        $clusterForm = new SurveyTofsilForm1;

        $clusterForm->survey_process_list_id            = $request->survey_process_list_id;
        $clusterForm->survey_notification_id            = $request->survey_notification_id;
        $clusterForm->division_id                       = $request->division_id;
        $clusterForm->district_id                       = $request->district_id;
        $clusterForm->upazila_id                        = $request->upazila_id;
        $clusterForm->bunch_stains_id                   = $request->bunch_stains_id;
        $clusterForm->survey_episode                    = $request->survey_episode;
        $clusterForm->farmers_name                      = $request->farmers_name;
        $clusterForm->farmers_father_name               = $request->farmers_father_name;
        $clusterForm->farmers_mobile                    = $request->farmers_mobile;
        $clusterForm->crops_id                          = $request->crops_id;
        $clusterForm->land_identification_no            = $request->land_identification_no;
        $clusterForm->land_amount                       = $request->land_amount;
        $clusterForm->use_land_type                     = $request->use_land_type;
        $clusterForm->cultivated_method                 = $request->cultivated_method;
        $clusterForm->irrigation_system                 = $request->irrigation_system;
        $clusterForm->how_many_irrigation_time          = $request->how_many_irrigation_time;
        $clusterForm->how_many_cultivated_time_yearly   = $request->how_many_cultivated_time_yearly;
        $clusterForm->created_by                        = Auth::user()->id;

        $done = $clusterForm->save();

        if($done)
        {
            return redirect()->route('admin.clusterForm.create')->with('success', 'Form submitted successfully.');
        } else {
            return redirect()->route('admin.clusterForm.create')->with('error', 'Something went wrong, Try again later...!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();

        if (Gate::allows('farmers_data', $user)) 
        {
            menuSubmenu('farmersData', 'clustersData');

            $clusterData = SurveyTofsilForm1::with('user', 'division', 'district', 'upazila', 'cluster', 'crop')->where('id', $id)->first();

            $surveyNotification = SurveyNotification::where('id', $clusterData->survey_notification_id)->first();

            return view('backend.admin.surveyForms.clusterForm.show', compact('clusterData', 'surveyNotification'));
        }else{
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();

        if (Gate::allows('farmers_data', $user)) 
        {
            menuSubmenu('farmersData', 'clustersData');

            $clusterData = SurveyTofsilForm1::with('user', 'division', 'district', 'upazila', 'cluster')->where('id', $id)->first();


            $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 1)->first();

            $crops = Crop::where('status', 1)->get();
  

            return view('backend.admin.surveyForms.clusterForm.edit', compact('clusterData', 'surveyList', 'crops'));
        }else{
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
    public function update(Request $request, SurveyTofsilForm1 $cluster)
    {
        $request->validate([
            'farmers_name'                      => 'required',
            'farmers_mobile'                    => 'required',
            'crops_id'                          => 'required',
            'land_identification_no'            => 'required',
            'land_amount'                       => 'required',
            'use_land_type'                     => 'required',
            'cultivated_method'                 => 'required',
            'irrigation_system'                 => 'required',
            'how_many_irrigation_time'          => 'required',
            'how_many_cultivated_time_yearly'   => 'required',
        ]);

        $cluster->land_identification_no            = $request->land_identification_no;
        $cluster->farmers_name                      = $request->farmers_name;
        $cluster->farmers_mobile                    = $request->farmers_mobile;
        $cluster->use_land_type                     = $request->use_land_type;
        $cluster->crops_id                          = $request->crops_id;
        $cluster->land_amount                       = $request->land_amount;
        $cluster->cultivated_method                 = $request->cultivated_method;
        $cluster->irrigation_system                 = $request->irrigation_system;
        $cluster->how_many_irrigation_time          = $request->how_many_irrigation_time;
        $cluster->how_many_cultivated_time_yearly   = $request->how_many_cultivated_time_yearly;
        $cluster->modified_by                       = Auth::user()->id;

        $cluster->save();

        return redirect()->route('admin.clusterForm.index')->with('success', 'Cluster Data Upadated Successfully.');
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

    public function submitForForward(Request $request)
    {
        $survey_notification_id = $request->notification;

        $clusterDatas = SurveyTofsilForm1::where('survey_notification_id', $survey_notification_id)->where('created_by',Auth::user()->id)->get();
        
        foreach($clusterDatas as $data)
        {
            $data->status = true;
            $data->save();
        }

        $list = SurveyProcessList::find($request->survey_process_list_id);

        $list->status = 2;
        $list->save();

        $log = new SurveyProcessForwardingLog;

        $log->survey_process_list_id = $request->survey_process_list_id;
        $log->forward_by = Auth::id();
        $log->forward_to = $list->created_by;
        $log->forward_date = date('d-m-Y');
        $log->office_level = 4;

        $log->save();

        $AgriSurNotis = GenerateSurveyNotification::where('survey_notification_id', $survey_notification_id)->get();

        foreach($AgriSurNotis as $AgriSurNoti)
        {
            $AgriSurNoti->status = 0;
            $AgriSurNoti->save();
        }

        return redirect()->route('admin.clusterForm.index')->with('success', 'Form Forwarded Successfully!!!');
    }
}

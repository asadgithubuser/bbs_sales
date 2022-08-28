<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Gate;

// Used Models
use App\Models\Crop;
use App\Models\Cluster;
use App\Models\SurveyProcessList;
use App\Models\SurveyNotification;
use App\Models\SurveyProcessForwardingLog;
use App\Models\SurveyCompilationCollectForm1;
use App\Models\GenerateSurveyNotification;

class FarmersFormController extends Controller
{
    // Show farmers submitted data
    public function index()
    {
        $user = Auth::user();
        if (Gate::allows('farmers_data', $user)) 
        {
            menuSubmenu('farmersData','allFarmersData');

            $farmersData = SurveyCompilationCollectForm1::with('division', 'district', 'upazila', 'union', 'mouza', 'cluster')
                            ->where('created_by',$user->id)->where('status',false)->latest()->paginate(15);
            
  
            return view('backend.admin.surveyForms.farmersForm.index', compact('farmersData'));

        }else{
            abort(403);
        }
    }

    // Show farmers form
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

                menuSubmenu('surveyForms', 'farmersForm');

                $processListId = $request->surveyProListId;
                
                if(empty($processListId))
                {
                   
                    $processList = SurveyProcessList::with('union', 'mouza')->where('status',1)->where('survey_form_id', 1)->where('survey_by', $user->id)->get();
                    
                    if($processList->count() > 0)
                    {    
                        return view('backend.admin.surveyForms.farmersForm.surveyProcessList', [
                            'processLists' => $processList,
                        ]);
                    }
                    else
                    {
                        $crops = Crop::where('status', 1)->get();

                        return view('backend.admin.surveyForms.farmersForm.farmersForm', compact('number','crops'));
                    }

                }else{
                    
                    $processList = SurveyProcessList::with('union', 'mouza')->where('id', $processListId)->first();

                    $crops = Crop::where('status', 1)->get();

                    $clusters = Cluster::where('division_id', $processList->division_id)
                                        ->where('district_id', $processList->district_id)
                                        ->where('upazila_id', $processList->upazila_id)
                                        ->get();

                    $surveyNotification = SurveyNotification::where('id', $processList->survey_notification_id)->first();
                    
                    return view('backend.admin.surveyForms.farmersForm.farmersForm', compact('processListId', 'processList', 'clusters', 'surveyNotification', 'number', 'crops'));
                }
               
            }else{
                abort(403);
            }

        }else{
            abort(403);
        }
    }

    // Farmers form store method
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            // 'cluster_id'                    => 'required',
            'food_type'                     => 'required',
            'farmers_name'                  => 'required',
            // 'farmers_mobile'                => 'required',
            // 'farmers_class_division_type'   => 'required',
            'father_name'                   => 'required',
            'village_name'                  => 'required',
            // 'permanent_crop_ids'            => 'required',
            // 'temporary_crop_ids'                       => 'required',
        ]);

        $farmersForm = new SurveyCompilationCollectForm1;

        $farmersForm->survey_process_list_id        = $request->survey_process_list_id;
        $farmersForm->survey_notification_id        = $request->survey_notification_id;
        $farmersForm->division_id                   = $request->division_id;
        $farmersForm->district_id                   = $request->district_id;
        $farmersForm->upazila_id                    = $request->upazila_id;
        $farmersForm->union_id                      = $request->union_id;
        $farmersForm->mouja_id                      = $request->mouza_id;
        $farmersForm->cluster_id                    = $request->cluster_id;
        $farmersForm->cluster_indentity_no          = $request->cluster_indentity_no;
        $farmersForm->year                          = $request->year;
        $farmersForm->food_type                     = $request->food_type;
        $farmersForm->farmers_name                  = $request->farmers_name;
        $farmersForm->farmers_mobile                = $request->farmers_mobile;
        $farmersForm->farmers_class_division_type   = $request->farmers_class_division_type;
        $farmersForm->land_amount                   = $request->land_amount;
        $farmersForm->father_name                   = $request->father_name;
        $farmersForm->village_name                  = $request->village_name;
        if($request->permanent_crop_ids)
        {
            $farmersForm->permanent_crop_ids            = implode(',', $request->permanent_crop_ids);
        }
        if($request->temporary_crop_ids)
        {
            $farmersForm->temporary_crop_ids            = implode(',', $request->temporary_crop_ids);
        }
        // $farmersForm->sample_farmer_no = $request->sample_farmer_no;
        $farmersForm->created_by                    = Auth::user()->id;

        $done = $farmersForm->save();

        if($done)
        {
            return redirect()->route('admin.farmersForm.create')->with('success', 'Form submitted successfully.');
        }else{
            return redirect()->route('admin.farmersForm.create')->with('error', 'Something went wrong, Try again later...!');
        }
    }


    public function submitForForward(Request $request)
    {
        $user = Auth::user();
        
        $survey_notification_id = $request->notification;
        $farmerDatas = SurveyCompilationCollectForm1::where('survey_notification_id',$survey_notification_id)->where('created_by',$user->id)->get();
        
        foreach($farmerDatas as $data)
        {
            $data->status = true;
            $data->save();
        }

        foreach($request->survey_process_list_id as $data){

            $list = SurveyProcessList::find($data);
            $list->status = 2 ;// upzila filed
            $list->save();

            $log = new SurveyProcessForwardingLog;
            $log->survey_process_list_id = $data;
            $log->forward_by = Auth::id();
            $log->forward_to = $list->created_by;
            $log->forward_date = date('d-m-Y');
            $log->office_level = 4;
            $log->save();
        }

        $AgriSurNotis = GenerateSurveyNotification::where('survey_notification_id', $survey_notification_id)
                    ->where('receiver_id', $user->id)->get();

        foreach($AgriSurNotis as $AgriSurNoti)
        {
            $AgriSurNoti->status = 0;
            $AgriSurNoti->save();
        }

        return redirect()->route('admin.farmersForm.index')->with('success', 'Form forwarded.');

    }
    
    // Farmer data detail
    public function detail($id)
    {
        menuSubmenu('farmersData','allFarmersData');
        
        $farmerData = SurveyCompilationCollectForm1::with('user', 'division', 'district', 'upazila', 'union', 'mouza', 'cluster')
                    ->where('id', $id)->first();

        $surveyNotification = SurveyNotification::where('id', $farmerData->survey_notification_id)->first();

        $temporary_crops = [];
        $temporary_crops = explode(',', $farmerData->temporary_crop_ids);
        $permanent_crops = [];
        $permanent_crops = explode(',', $farmerData->permanent_crop_ids);

        $croplist = Crop::where('status', 1)->get();

        return view('backend.admin.surveyForms.farmersForm.detail', compact('farmerData', 'surveyNotification', 'temporary_crops', 'permanent_crops', 'croplist'));
    }

    // Farmer data listing
    public function listing()
    {
        return view('backend.admin.surveyForms.farmersForm.listing');
    }

    public function edit(SurveyCompilationCollectForm1 $id)
    {
        
        $temporary_crops = [];
        $temporary_crops = explode(',', $id->temporary_crop_ids);
        $permanent_crops = [];
        $permanent_crops = explode(',', $id->permanent_crop_ids);

        $croplist = Crop::where('status', 1)->get();
        $clusters = Cluster::where('division_id', $id)
                                        ->where('district_id', $id)
                                        ->where('upazila_id', $id)
                                        ->get();
        return view('backend.admin.surveyForms.farmersForm.edit', [
            'farmerData'        => $id,
            'temporary_crops'   => $temporary_crops,
            'permanent_crops'   => $permanent_crops,
            'croplist'          => $croplist,
            'clusters' => $clusters
        ]);
    }

    public function update(SurveyCompilationCollectForm1 $list, Request $request)
    {
        $request->validate([
            'food_type'                     => 'required',
            'farmers_name'                  => 'required',
            // 'farmers_mobile'                => 'required',
            // 'farmers_class_division_type'   => 'required',
            // 'land_amount'                   => 'required',
            'father_name'                   => 'required',
            'village_name'                  => 'required',
            // 'permanent_crop_ids'            => 'required',
            // 'temporary_crop_ids'            => 'required',
        ]);

        $list->food_type                    = $request->food_type;
        $list->farmers_name                 = $request->farmers_name;
        $list->farmers_mobile               = $request->farmers_mobile;
        $list->farmers_class_division_type  = $request->farmers_class_division_type;
        $list->land_amount                  = $request->land_amount;
        $list->father_name                  = $request->father_name;
        $list->village_name                 = $request->village_name;

        if ($request->permanent_crop_ids) {
            $list->permanent_crop_ids       = implode(',', $request->permanent_crop_ids);
        }
        else
        {
            $list->permanent_crop_ids='';
        }
        if ($request->temporary_crop_ids) {
            $list->temporary_crop_ids       = implode(',', $request->temporary_crop_ids);
        }
        else
        {
            $list->temporary_crop_ids='';
        }
        
        $list->modified_by                  = Auth::user()->id;

        $list->save();

        return redirect()->route('admin.farmersForm.index')->with('success', 'Farmer Info Upadated Successfully.');
    }
}

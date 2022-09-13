<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\SurveyProcessList;
use App\Models\GenerateSurveyNotification;
use App\Models\SurveyCompilationCollectForm1;
use App\Models\SurveyTofsilForm1;
use App\Models\SurveyTofsilForm2;
use App\Models\SurveyTofsilForm3;
use App\Models\SurveyTofsilForm4;
use App\Models\SurveyProcessForwardingLog;
use App\Models\SurveyTofsilForm2AllFarmer;
use App\Models\SurveyTofsilForm3Maize;
use App\Models\SurveyTofsilForm8;
use App\Models\SurveyTofsilForm10;
use App\Models\SurveyTofsilForm10Production;
use App\Models\SurveyTofsilForm5;
use App\Models\SurveyTofsilForm5AllFarmer;
use App\Models\Crop;
use Illuminate\Support\Facades\Auth;
use Validator;

class AgricultureController extends BaseController
{
    // process List
    public function index()
    {
        $user = Auth::user();

        $surveyProcessList = SurveyProcessList::where('division_id', $user->division_id)
                                ->where('district_id', $user->district_id)
                                ->where('upazila_id', $user->upazila_id)
                                ->where('survey_by', $user->id)
                                ->where('status', 1)
                                ->orderBy('survey_form_id','ASC')->get();
        $i=0;
        foreach($surveyProcessList as $data){
            $surveyProcessList[$i]->division_name=$data->division->name_bn;
            $surveyProcessList[$i]->district_name=$data->district->name_bn;
            $surveyProcessList[$i]->union_name=!empty($data->union->name_bn)?$data->union->name_bn:null;
            $surveyProcessList[$i]->mouja_name=!empty($data->mouza->name_bn)?$data->mouza->name_bn:null;
            $surveyProcessList[$i]->cluster_name=!empty($data->cluster->name_bn)?$data->cluster->name_bn:null;
            $surveyProcessList[$i]->crop_id=!empty($data->surveyNotification->crop_id)?$data->surveyNotification->crop_id:null;
            $i++;
        }          
            
        return $this->sendResponse($surveyProcessList, 'Data Available');
         
    }

    public function allSurveyList()
    {
        $user = Auth::user();

        $surveyProcessList = SurveyProcessList::where('division_id', $user->division_id)
                                                ->where('district_id', $user->district_id)
                                                ->where('upazila_id', $user->upazila_id)
                                                ->where('survey_by', $user->id)
                                                ->where('status','!=', 1)
                                                ->orderBy('survey_form_id','ASC')->get();
        $i=0;
        foreach($surveyProcessList as $data){
            $surveyProcessList[$i]->division_name=$data->division->name_bn;
            $surveyProcessList[$i]->district_name=$data->district->name_bn;
            $surveyProcessList[$i]->union_name=!empty($data->union->name_bn)?$data->union->name_bn:null;
            $surveyProcessList[$i]->mouja_name=!empty($data->mouza->name_bn)?$data->mouza->name_bn:null;
            $surveyProcessList[$i]->cluster_name=!empty($data->cluster->name_bn)?$data->cluster->name_bn:null;
            $surveyProcessList[$i]->crop_id=!empty($data->surveyNotification->crop_id)?$data->surveyNotification->crop_id:null;
            $i++;
        }          
            
        return $this->sendResponse($surveyProcessList, 'Data Available');
         
    }

    // dashboard
    public function dashbaord()
    {
        $user = Auth::user();

        $surveyProcessList = SurveyProcessList::where('division_id', $user->division_id)->where('district_id', $user->district_id)->where('upazila_id', $user->upazila_id)->where('survey_by', $user->id)->where('status', 1)->orderBy('survey_form_id','ASC')->get();

        $data['processlist']=count($surveyProcessList);
        
        foreach($surveyProcessList as $key=>$item){

            if($item->survey_form_id==1 ){

                $data['farmersForm'] = SurveyCompilationCollectForm1::where('created_by',$user->id)->where('status',false)->latest()->count();

            }elseif($item->survey_form_id==2){

                $data['tofsli_1'] = SurveyTofsilForm1::where('created_by',$user->id)->where('status',false)->latest()->count();

            }elseif($item->survey_form_id==3){

                $data['tofsli_3'] = SurveyTofsilForm3::where('created_by',$user->id)->where('status',false)->latest()->count();

            }elseif($item->survey_form_id==4){

                $data['tofsli_4'] = SurveyTofsilForm4::where('created_by',$user->id)->where('status',false)->latest()->count();

            }elseif($item->survey_form_id==5){
                $data['tofsli_2'] = SurveyTofsilForm2::where('created_by',$user->id)->where('status',false)->latest()->count();
            }elseif($item->survey_form_id==6){
                $data['tofsli_6'] = SurveyTofsilForm3Maize::where('created_by',$user->id)->where('status',false)->latest()->count();
            }elseif($item->survey_form_id==7){
                $data['tofsli_6'] = SurveyTofsilForm5::where('created_by',$user->id)->where('status',false)->latest()->count();
            }elseif($item->survey_form_id==8){
                $data['tofsli_8'] = SurveyTofsilForm8::where('created_by',$user->id)->where('status',false)->latest()->count();
            }elseif($item->survey_form_id==10){
                $data['tofsli_10'] = SurveyTofsilForm10::where('created_by',$user->id)->where('status',false)->latest()->count();
            }
        }          
            
        return $this->sendResponse($data, 'Data Available');
         
    }

    // crops list
    // public function cropsList()
    // {
    //     $list=$crops = Crop::select(['id', 'name_en', 'name_bn','code','crop_category_id'])->where('status', 1)->get();
    //     return $this->sendResponse($list, 'All Crops List');
    // }

    public function cropsList()
    {
        $list=$crops = Crop::select(['id', 'name_en', 'name_bn','code','crop_category_id'])->where('status', 1)->get();
        return $this->sendResponse($list, 'All Crops List');
    }

    //Survey List
    public function farmerList()
    {
        $user = Auth::user();
        $farmersData = SurveyCompilationCollectForm1::select(['id', 'farmers_name', 'farmers_mobile'])->where('mouja_id',@$_GET['mouja_id'])->where('year',@$_GET['year'])->latest()->get();
        
        return $this->sendResponse($farmersData, 'Data Available');

    }

    //Survey List
    public function surveyData()
    {
        $user = Auth::user();
        $list = SurveyProcessList::find($_GET['id']);
        if($list->survey_form_id==1){
            $SurveyData = SurveyCompilationCollectForm1::where('created_by',$user->id)->where('survey_process_list_id',$_GET['id'])->latest()->get();
        }elseif($list->survey_form_id==2){
            $SurveyData = SurveyTofsilForm1::where('created_by',$user->id)->where('survey_process_list_id',$_GET['id'])->latest()->get();
        }elseif($list->survey_form_id==3){
            $SurveyData = SurveyTofsilForm3::where('created_by',$user->id)->where('survey_process_list_id',$_GET['id'])->latest()->get();
            foreach($SurveyData as $key=>$value){
                $SurveyData[$key]->crop_name=$value->crop->name_bn."(".$value->crop->code.")";
                $SurveyData[$key]->farmers_name=$value->farmer->farmers_name;
                $SurveyData[$key]->farmers_mobile=$value->farmer->farmers_mobile;
            }
        }elseif($list->survey_form_id==4){
            $SurveyData = SurveyTofsilForm4::where('created_by',$user->id)->where('survey_process_list_id',$_GET['id'])->latest()->get();
            foreach($SurveyData as $key=>$value){
                $SurveyData[$key]->crop_name=$value->crop->name_bn."(".$value->crop->code.")";
                $SurveyData[$key]->farmers_name=$value->farmer->farmers_name;
                $SurveyData[$key]->farmers_mobile=$value->farmer->farmers_mobile;
            }
        }elseif($list->survey_form_id==5){
            $SurveyData = SurveyTofsilForm2::where('created_by',$user->id)->where('survey_process_list_id',$_GET['id'])->latest()->get();
        }elseif($list->survey_form_id==6){
            $SurveyData = SurveyTofsilForm3Maize::where('created_by',$user->id)->where('survey_process_list_id',$_GET['id'])->latest()->get();
        }elseif($list->survey_form_id==7){
            $SurveyData = SurveyTofsilForm5::where('created_by',$user->id)->where('survey_process_list_id',$_GET['id'])->latest()->get();
        }elseif($list->survey_form_id==8){
            $SurveyData = SurveyTofsilForm8::where('created_by',$user->id)->where('survey_process_list_id',$_GET['id'])->latest()->get();
        }elseif($list->survey_form_id==10){
            $SurveyData = SurveyTofsilForm10::where('created_by',$user->id)->where('survey_process_list_id',$_GET['id'])->latest()->get();
        }else{
            $SurveyData =[];
        }

        $i=0;
        foreach($SurveyData as $data){
            $SurveyData[$i]->division_name=$data->division->name_bn;
            $SurveyData[$i]->district_name=$data->district->name_bn;
            if($list->survey_form_id==2 || $list->survey_form_id==8){
                $SurveyData[$i]->cluster_name=!empty($data->cluster->name_bn)?$data->cluster->name_bn:null;
            }else{
                $SurveyData[$i]->union_name=$data->union->name_bn;
                $SurveyData[$i]->mouja_name=!empty($data->mouza->name_bn)?$data->mouza->name_bn:null;
            }
            
            $i++;
        }

        return $this->sendResponse($SurveyData, 'Data Available');

    }

    // forward
    public function submitForForward(Request $request)
    {
        $user = Auth::user();
        $survey_notification_id = $request->notification;

        $list = SurveyProcessList::find($request->survey_process_list_id);

        if($list->survey_form_id==1){
            $surveyData = SurveyCompilationCollectForm1::where('survey_notification_id',$survey_notification_id)->get();
        }elseif($list->survey_form_id==2){
            $surveyData = SurveyTofsilForm1::where('survey_notification_id',$survey_notification_id)->get();
        }elseif($list->survey_form_id==3){
            $surveyData = SurveyTofsilForm3::where('survey_notification_id',$survey_notification_id)->get();
        }elseif($list->survey_form_id==4){
            $surveyData = SurveyTofsilForm4::where('survey_notification_id',$survey_notification_id)->get();
        }elseif($list->survey_form_id==5){
            $surveyData = SurveyTofsilForm2::where('survey_notification_id',$survey_notification_id)->get();
        }elseif($list->survey_form_id==6){
            $surveyData = SurveyTofsilForm3Maize::where('survey_notification_id',$survey_notification_id)->get();
        }elseif($list->survey_form_id==8){
            $surveyData = SurveyTofsilForm8::where('survey_notification_id',$survey_notification_id)->get();
        }elseif($list->survey_form_id==10){
            $surveyData = SurveyTofsilForm10::where('survey_notification_id',$survey_notification_id)->get();
        }else{
            $surveyData =[];
        }
        
        foreach($surveyData as $data)
        {
            $data->status = true;
            $data->save();
        }

        $list = SurveyProcessList::find($request->survey_process_list_id);
        $list->status = 2 ;// upzila filed
        $list->save();

        $log = new SurveyProcessForwardingLog;
        $log->survey_process_list_id = $request->survey_process_list_id;
        $log->forward_by = Auth::id();
        $log->forward_to = $list->created_by;
        $log->forward_date = date('d-m-Y');
        $log->office_level = 4;
        $log->save();

        $AgriSurNotis = GenerateSurveyNotification::where('survey_notification_id', $survey_notification_id)
                    ->where('receiver_id', $user->id)->get();

        foreach($AgriSurNotis as $AgriSurNoti)
        {
            $AgriSurNoti->status = 0;
            $AgriSurNoti->save();
        }

        return $this->sendResponse(null, 'Notification forward  successfully.');

    }

    public function list(){
        return response()->json(SurveyCompilationCollectForm1::all(),200);
    }

    // Start farmers form
    public function storefarmersData(Request $request)
    {
        $validation = Validator::make($request->all(),
        [ 
            'survey_process_list_id'        => ['required'],
            'food_type'                     => ['required'],
            'farmers_name'                  => ['required'],
            'farmers_mobile'                => ['required'],
            'farmers_class_division_type'   => ['required'],
            'land_amount'                   => ['required'],
        ]);

        if($validation->fails())
        {
            return $this->sendError('error', 'All field is required',400);
        }

        $user = Auth::user();

        $surveyProcessList = SurveyProcessList::where('id', $request->survey_process_list_id)->latest()->first();

        $farmersForm = new SurveyCompilationCollectForm1;
        $farmersForm->survey_process_list_id        = $request->survey_process_list_id;
        $farmersForm->survey_notification_id        = $surveyProcessList->survey_notification_id;
        $farmersForm->division_id                   = $surveyProcessList->division_id;
        $farmersForm->district_id                   = $surveyProcessList->district_id;
        $farmersForm->upazila_id                    = $surveyProcessList->upazila_id;
        $farmersForm->union_id                      = $surveyProcessList->union_id;
        $farmersForm->mouja_id                      = $surveyProcessList->mouja_id;
        $farmersForm->cluster_id                    = $surveyProcessList->cluster_id;
        $farmersForm->year                          = $surveyProcessList->year;
        $farmersForm->food_type                     = $request->food_type;
        $farmersForm->farmers_name                  = $request->farmers_name;
        $farmersForm->farmers_mobile                = $request->farmers_mobile;
        $farmersForm->farmers_class_division_type   = $request->farmers_class_division_type;
        $farmersForm->land_amount                   = $request->land_amount;
        // $farmersForm->sample_farmer_no = $request->sample_farmer_no;
        $farmersForm->created_by = Auth::user()->id;
        $done = $farmersForm->save();

        if($done)
        {
            return $this->sendResponse(null, 'Form submitted successfully.');
        }else{
            return $this->sendError('error', 'Something went wrong, Try again later...!',401);
        }
    }

    public function updateFarmersData( Request $request)
    {

        $validation = Validator::make($request->all(),
        [ 
            'id'                            => 'required',
            'food_type'                     => 'required',
            'farmers_name'                  => 'required',
            'farmers_mobile'                => 'required',
            'farmers_class_division_type'   => 'required',
            'land_amount'                   => 'required',
        ]);

        if($validation->fails())
        {
            return $this->sendError('error', 'All field is required',400);
        }

        $list = SurveyCompilationCollectForm1::findOrFail($request->id);

        $list->food_type                    = $request->food_type;
        $list->farmers_name                 = $request->farmers_name;
        $list->farmers_mobile               = $request->farmers_mobile;
        $list->farmers_class_division_type  = $request->farmers_class_division_type;
        $list->land_amount                  = $request->land_amount;
        $list->modified_by                  = Auth::user()->id;

        $done=$list->save();

        if($done)
        {
            return $this->sendResponse(null, 'Form updated successfully.');
        }else{
            return $this->sendError('error', 'Something went wrong, Try again later...!',401);
        }
    }
    // End farmers form

    //Start Cluster Form (Tofsil-1)
    public function storeTofsil1Data(Request $request)
    {
        $validation = Validator::make($request->all(),
        [ 
            'survey_process_list_id'            => 'required',
            'survey_episode'                    => 'required',
            'farmers_name'                      => 'required',
            // 'farmers_mobile'                    => 'required',
            'crops_id'                          => 'required',
            'land_identification_no'            => 'required',
            'land_amount'                       => 'required',
            'use_land_type'                     => 'required',
            'cultivated_method'                 => 'required',
            'irrigation_system'                 => 'required',
            'how_many_irrigation_time'          => 'required',
            'how_many_cultivated_time_yearly'   => 'required',
        ]);

        if($validation->fails())
        {
            return $this->sendError('error', 'All field is required',400);
        }

        $user = Auth::user();

        $surveyProcessList = SurveyProcessList::where('id', $request->survey_process_list_id)->latest()->first();

        $clusterForm = new SurveyTofsilForm1;

        $clusterForm->survey_process_list_id            = $request->survey_process_list_id;
        $clusterForm->survey_notification_id            = $surveyProcessList->survey_notification_id;
        $clusterForm->division_id                       = $surveyProcessList->division_id;
        $clusterForm->district_id                       = $surveyProcessList->district_id;
        $clusterForm->upazila_id                        = $surveyProcessList->upazila_id;
        $clusterForm->bunch_stains_id                   = $surveyProcessList->bunch_stains_id;
        $clusterForm->survey_episode                    = $request->survey_episode;
        $clusterForm->farmers_name                      = $request->farmers_name;
        // $clusterForm->farmers_mobile                    = $request->farmers_mobile;
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
            return $this->sendResponse(null, 'Form submitted successfully.');
        }else{
            return $this->sendError('error', 'Something went wrong, Try again later...!',401);
        }
    } 
    
    public function updateTofsil1Data(Request $request)
    {
        $validation = Validator::make($request->all(),
        [ 
            'survey_process_list_id'            => 'required',
            'survey_episode'                    => 'required',
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

        if($validation->fails())
        {
            return $this->sendError('error', 'All field is required',400);
        }

        $user = Auth::user();

        $surveyProcessList = SurveyProcessList::where('id', $request->survey_process_list_id)->latest()->first();

        $clusterForm = SurveyTofsilForm1::findOrFail($request->id);

        $clusterForm->survey_process_list_id            = $request->survey_process_list_id;
        $clusterForm->survey_notification_id            = $surveyProcessList->survey_notification_id;
        $clusterForm->division_id                       = $surveyProcessList->division_id;
        $clusterForm->district_id                       = $surveyProcessList->district_id;
        $clusterForm->upazila_id                        = $surveyProcessList->upazila_id;
        $clusterForm->bunch_stains_id                   = $surveyProcessList->bunch_stains_id;
        $clusterForm->survey_episode                    = $request->survey_episode;
        $clusterForm->farmers_name                      = $request->farmers_name;
        // $clusterForm->farmers_mobile                    = $request->farmers_mobile;
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
            return $this->sendResponse(null, 'Form Updated Successfully.');
        }else{
            return $this->sendError('error', 'Something Went Wrong, Try Again Later...!',401);
        }
            return resposne()->json();
    }
    //End Cluster Form (Tofsil-1)



    //Start Crops Cutting & Production Form (Tofsil-2)
    public function storeTofsil2Data(Request $request)
    {
        
        $validation = Validator::make($request->all(),
        [ 
            'survey_process_list_id'    => 'required',
            'farmer_id'                 => 'required',
            'crop_cutting_date'         => 'required',
            'in_cluster'                => 'required',
            'plot_corner_point_1'       => 'required',
            'point_1_number'            => 'required',
            'point_1_random'            => 'required',
            'plot_corner_point_2'       => 'required',
            'point_2_number'            => 'required',
            'point_2_random'            => 'required',
            'type_of_cultivation'       => 'required',
            'crop_id'                   => 'required',
            'crop_type_code'            => 'required',
            'amount_of_land'            => 'required',
            'water_irrigation'          => 'required',
            'has_used_fertilizer'       => 'required',
            'is_used_pesticide'         => 'required',
        ]);

        if($validation->fails())
        {
            return $this->sendError('error', 'All field is required',400);
        }

        $user = Auth::user();

        $surveyProcessList = SurveyProcessList::where('id', $request->survey_process_list_id)->latest()->first();

        $cropCuttingProductionForm = new SurveyTofsilForm2;

        $cropCuttingProductionForm->survey_process_list_id          = $request->survey_process_list_id;
        $cropCuttingProductionForm->survey_notification_id          = $surveyProcessList->survey_notification_id;
        $cropCuttingProductionForm->division_id                     = $surveyProcessList->division_id;
        $cropCuttingProductionForm->district_id                     = $surveyProcessList->district_id;
        $cropCuttingProductionForm->upazila_id                      = $surveyProcessList->upazila_id;
        $cropCuttingProductionForm->cluster_id                      = $surveyProcessList->cluster_id;
        $cropCuttingProductionForm->union_id                        = $surveyProcessList->union_id;
        $cropCuttingProductionForm->mouza_id                        = $surveyProcessList->mouja_id;
        $cropCuttingProductionForm->farmer_id                       = $request->farmer_id;
        $cropCuttingProductionForm->crop_cutting_date               = $request->crop_cutting_date;
        $cropCuttingProductionForm->land_segment_signal             = $request->land_segment_signal;
        $cropCuttingProductionForm->cluster_area_acre               = $request->cluster_area_acre;
        $cropCuttingProductionForm->in_cluster                      = $request->in_cluster;
        $cropCuttingProductionForm->plot_corner_point_1             = $request->plot_corner_point_1;
        $cropCuttingProductionForm->point_1_number                  = $request->point_1_number;
        $cropCuttingProductionForm->point_1_random                  = $request->point_1_random;
        $cropCuttingProductionForm->plot_corner_point_2             = $request->plot_corner_point_2;
        $cropCuttingProductionForm->point_2_number                  = $request->point_2_number;
        $cropCuttingProductionForm->point_2_random                  = $request->point_2_random;
        $cropCuttingProductionForm->type_of_cultivation             = $request->type_of_cultivation;
        $cropCuttingProductionForm->crop_id                         = $request->crop_id;
        $cropCuttingProductionForm->crop_type_code                  = $request->crop_type_code;
        $cropCuttingProductionForm->amount_of_land                  = $request->amount_of_land;
        $cropCuttingProductionForm->after_harvesting_paddy_kg       = $request->after_harvesting_paddy_kg;
        $cropCuttingProductionForm->after_harvesting_wheat_kg       = $request->after_harvesting_wheat_kg;
        $cropCuttingProductionForm->after_harvesting_jute_kg        = $request->after_harvesting_jute_kg;
        $cropCuttingProductionForm->paddy_moisture                  = $request->paddy_moisture;
        $cropCuttingProductionForm->water_irrigation                = $request->water_irrigation;
        $cropCuttingProductionForm->source_of_water                 = $request->source_of_water;
        $cropCuttingProductionForm->is_water_irrigation_both        = $request->is_water_irrigation_both;
        $cropCuttingProductionForm->has_used_fertilizer             = $request->has_used_fertilizer;
        $cropCuttingProductionForm->what_type_fertilizer            = $request->what_type_fertilizer;
        
        if ($request->what_used_fertilizer) {
            $cropCuttingProductionForm->what_used_fertilizer        = implode(',', $request->what_used_fertilizer);
        }

        $cropCuttingProductionForm->fertilizer_amound               = $request->fertilizer_amound;
        $cropCuttingProductionForm->is_used_pesticide               = $request->is_used_pesticide;
        $cropCuttingProductionForm->what_type_pesticide             = $request->what_type_pesticide;
        $cropCuttingProductionForm->pesticide_amound                = $request->pesticide_amound;
        // $cropCuttingProductionForm->agricultural_officer_info       = $request->agricultural_officer_info;
        $cropCuttingProductionForm->created_by                      = Auth::user()->id;

        $done = $cropCuttingProductionForm->save();

        $results = [];

        foreach ($request->nearby_farmer_info_obj as $key => $farmers) {

            $results[] = [
                    "survey_process_list_id"        => $request->survey_process_list_id,
                    "survey_tofsil_form2_id"        => $cropCuttingProductionForm->id,
                    "farmer_int_id"                 => $farmers['farmer_int_id'],
                    "fathers_name"                  => $farmers['fathers_name'],
                    "last_year_land_amount"         => $farmers['last_year_land_amount'],
                    "last_year_land_producttion"    => $farmers['last_year_land_producttion'],
                    "current_year_land_amount"      => $farmers['current_year_land_amount'],
                    "current_year_land_producttion" => $farmers['current_year_land_producttion'],
                    "comments"                      => $farmers['comments'],
                    "created_by"                    => Auth::user()->id,
                    "created_at"                    => now(),
                ];
            
        }

        SurveyTofsilForm2AllFarmer::insert($results);

        if($done)
        {
            return $this->sendResponse(null, 'Form submitted successfully.');
        }else{
            return $this->sendError('error', 'Something went wrong, Try again later...!',401);
        }
    }    
    
    // update Crops cutting & Production Form (Tofsil-2)
   public function updateTofsil2Data(Request $request) 
   {

        $validation = Validator::make($request->all(),
        [ 
            'survey_process_list_id'    => 'required',
            'farmer_id'                 => 'required',
            'crop_cutting_date'         => 'required',
            'land_segment_signal'       => 'required',
            'in_cluster'                => 'required',
            'plot_corner_point_1'       => 'required',
            'point_1_number'            => 'required',
            'point_1_random'            => 'required',
            'plot_corner_point_2'       => 'required',
            'point_2_number'            => 'required',
            'point_2_random'            => 'required',
            'type_of_cultivation'       => 'required',
            'crop_id'                   => 'required',
            'crop_type_code'            => 'required',
            'amount_of_land'            => 'required',
            'water_irrigation'          => 'required',
            'has_used_fertilizer'       => 'required',
            'is_used_pesticide'         => 'required',
        ]);

        if($validation->fails())
        {
            return $this->sendError('error', 'All field is required',400);
        }

        $user = Auth::user();

        $surveyProcessList = SurveyProcessList::where('id', $request->survey_process_list_id)->latest()->first();

    $cropCuttingProductionForm = SurveyTofsilForm2::findOrFail($request->id);
        

        $cropCuttingProductionForm->survey_process_list_id          = $request->survey_process_list_id;
        $cropCuttingProductionForm->survey_notification_id          = $surveyProcessList->survey_notification_id;
        $cropCuttingProductionForm->division_id                     = $surveyProcessList->division_id;
        $cropCuttingProductionForm->district_id                     = $surveyProcessList->district_id;
        $cropCuttingProductionForm->upazila_id                      = $surveyProcessList->upazila_id;
        $cropCuttingProductionForm->cluster_id                      = $surveyProcessList->cluster_id;
        $cropCuttingProductionForm->union_id                        = $surveyProcessList->union_id;
        $cropCuttingProductionForm->mouza_id                        = $surveyProcessList->mouja_id;
        $cropCuttingProductionForm->farmer_id                       = $request->farmer_id;
        $cropCuttingProductionForm->crop_cutting_date               = $request->crop_cutting_date;
        $cropCuttingProductionForm->land_segment_signal             = $request->land_segment_signal;
        $cropCuttingProductionForm->cluster_area_acre               = $request->cluster_area_acre;
        $cropCuttingProductionForm->in_cluster                      = $request->in_cluster;
        $cropCuttingProductionForm->plot_corner_point_1             = $request->plot_corner_point_1;
        $cropCuttingProductionForm->point_1_number                  = $request->point_1_number;
        $cropCuttingProductionForm->point_1_random                  = $request->point_1_random;
        $cropCuttingProductionForm->plot_corner_point_2             = $request->plot_corner_point_2;
        $cropCuttingProductionForm->point_2_number                  = $request->point_2_number;
        $cropCuttingProductionForm->point_2_random                  = $request->point_2_random;
        $cropCuttingProductionForm->type_of_cultivation             = $request->type_of_cultivation;
        $cropCuttingProductionForm->crop_id                         = $request->crop_id;
        $cropCuttingProductionForm->crop_type_code                  = $request->crop_type_code;
        $cropCuttingProductionForm->amount_of_land                  = $request->amount_of_land;
        $cropCuttingProductionForm->after_harvesting_paddy_kg       = $request->after_harvesting_paddy_kg;
        $cropCuttingProductionForm->after_harvesting_wheat_kg       = $request->after_harvesting_wheat_kg;
        $cropCuttingProductionForm->after_harvesting_jute_kg        = $request->after_harvesting_jute_kg;
        $cropCuttingProductionForm->paddy_moisture                  = $request->paddy_moisture;
        $cropCuttingProductionForm->water_irrigation                = $request->water_irrigation;
        $cropCuttingProductionForm->source_of_water                 = $request->source_of_water;
        $cropCuttingProductionForm->is_water_irrigation_both        = $request->is_water_irrigation_both;
        $cropCuttingProductionForm->has_used_fertilizer             = $request->has_used_fertilizer;
        $cropCuttingProductionForm->what_type_fertilizer            = $request->what_type_fertilizer;
        
        if ($request->what_used_fertilizer) {
            $cropCuttingProductionForm->what_used_fertilizer        = implode(',', $request->what_used_fertilizer);
        }

        $cropCuttingProductionForm->fertilizer_amound               = $request->fertilizer_amound;
        $cropCuttingProductionForm->is_used_pesticide               = $request->is_used_pesticide;
        $cropCuttingProductionForm->what_type_pesticide             = $request->what_type_pesticide;
        $cropCuttingProductionForm->pesticide_amound                = $request->pesticide_amound;
        // $cropCuttingProductionForm->agricultural_officer_info       = $request->agricultural_officer_info;
        $cropCuttingProductionForm->created_by                      = Auth::user()->id;

        $done = $cropCuttingProductionForm->save();

        $results = [];

        foreach ($request->nearby_farmer_info_obj as $key => $farmers) {

            $results[] = [
                    "survey_process_list_id"        => $request->survey_process_list_id,
                    "survey_tofsil_form2_id"        => $cropCuttingProductionForm->id,
                    "farmer_int_id"                 => $farmers['farmer_int_id'],
                    "fathers_name"                  => $farmers['fathers_name'],
                    "last_year_land_amount"         => $farmers['last_year_land_amount'],
                    "last_year_land_producttion"    => $farmers['last_year_land_producttion'],
                    "current_year_land_amount"      => $farmers['current_year_land_amount'],
                    "current_year_land_producttion" => $farmers['current_year_land_producttion'],
                    "comments"                      => $farmers['comments'],
                    "created_by"                    => Auth::user()->id,
                    "created_at"                    => now(),
                ];
            
        }

        SurveyTofsilForm2AllFarmer::insert($results);

        if($done)
        {
            return $this->sendResponse(null, 'Form submitted successfully.');
        }else{
            return $this->sendError('error', 'Something went wrong, Try again later...!',401);
        }
    }    
    
    // end update


    //End Crops Cutting & Production Form (Tofsil-2)


    //Start Temporary Crop Form (Tofsil-3)
    // insert
    public function storeTofsil3Data(Request $request)
    {

        $validation = Validator::make($request->all(),
        [ 
            'survey_process_list_id'        => 'required',
            'farmer_id'                     => 'required',
            'crops_id'                      => 'required',
            'last_year_land_amount'         => 'required',
            'last_year_land_producttion'    => 'required',
            'current_year_land_amount'      => 'required',
            'current_year_land_producttion' => 'required',
            'acre_reflection_rate'          => 'required',
            'last_acre_reflection_rate'     => 'required',
        ]);

        if($validation->fails())
        {
            return $this->sendError('error', 'All field is required',400);
        }

        $user = Auth::user();

        $surveyProcessList = SurveyProcessList::where('id', $request->survey_process_list_id)->latest()->first();

        $temporaryCropForm = new SurveyTofsilForm3;

        $temporaryCropForm->survey_process_list_id          = $request->survey_process_list_id;
        $temporaryCropForm->survey_notification_id          = $surveyProcessList->survey_notification_id;
        $temporaryCropForm->division_id                     = $surveyProcessList->division_id;
        $temporaryCropForm->district_id                     = $surveyProcessList->district_id;
        $temporaryCropForm->upazila_id                      = $surveyProcessList->upazila_id;
        $temporaryCropForm->union_id                        = $surveyProcessList->union_id;
        $temporaryCropForm->mouza_id                        = $surveyProcessList->mouja_id;
        $temporaryCropForm->farmer_id                       = $request->farmer_id;
        $temporaryCropForm->crops_id                        = $request->crops_id;
        $temporaryCropForm->last_year_land_amount           = $request->last_year_land_amount;
        $temporaryCropForm->last_year_land_producttion      = $request->last_year_land_producttion;
        $temporaryCropForm->current_year_land_amount        = $request->current_year_land_amount;
        $temporaryCropForm->current_year_land_producttion   = $request->current_year_land_producttion;
        $temporaryCropForm->acre_reflection_rate            = $request->acre_reflection_rate;
        $temporaryCropForm->last_acre_reflection_rate       = $request->last_acre_reflection_rate;
        $temporaryCropForm->created_by                      = Auth::user()->id;

        $done = $temporaryCropForm->save();

        if($done)
        {
            return $this->sendResponse(null, 'Form submitted successfully.');
        }else{
            return $this->sendError('error', 'Something went wrong, Try again later...!',401);
        }
    }

 // update
 
    public function updateTofsil3Data(Request $request)
    {

        $validation = Validator::make($request->all(),
        [ 
            'survey_process_list_id'        => 'required',
            'farmer_id'                     => 'required',
            'crops_id'                      => 'required',
            'last_year_land_amount'         => 'required',
            'last_year_land_producttion'    => 'required',
            'current_year_land_amount'      => 'required',
            'current_year_land_producttion' => 'required',
            'acre_reflection_rate'          => 'required',
            'last_acre_reflection_rate'     => 'required',
        ]);

        if($validation->fails())
        {
            return $this->sendError('error', 'All field is required',400);
        }

        $user = Auth::user();

        $surveyProcessList = SurveyProcessList::where('id', $request->survey_process_list_id)->latest()->first();

        $temporaryCropForm = SurveyTofsilForm3::findOrFail($request->id);

        $temporaryCropForm->survey_process_list_id          = $request->survey_process_list_id;
        $temporaryCropForm->survey_notification_id          = $surveyProcessList->survey_notification_id;
        $temporaryCropForm->division_id                     = $surveyProcessList->division_id;
        $temporaryCropForm->district_id                     = $surveyProcessList->district_id;
        $temporaryCropForm->upazila_id                      = $surveyProcessList->upazila_id;
        $temporaryCropForm->union_id                        = $surveyProcessList->union_id;
        $temporaryCropForm->mouza_id                        = $surveyProcessList->mouja_id;
        $temporaryCropForm->farmer_id                       = $request->farmer_id;
        $temporaryCropForm->crops_id                        = $request->crops_id;
        $temporaryCropForm->last_year_land_amount           = $request->last_year_land_amount;
        $temporaryCropForm->last_year_land_producttion      = $request->last_year_land_producttion;
        $temporaryCropForm->current_year_land_amount        = $request->current_year_land_amount;
        $temporaryCropForm->current_year_land_producttion   = $request->current_year_land_producttion;
        $temporaryCropForm->acre_reflection_rate            = $request->acre_reflection_rate;
        $temporaryCropForm->last_acre_reflection_rate       = $request->last_acre_reflection_rate;
        $temporaryCropForm->created_by                      = Auth::user()->id;

        $done = $temporaryCropForm->save();

        if($done)
        {
            return $this->sendResponse(null, 'Form Updated successfully.');
        }else{
            return $this->sendError('error', 'Something went wrong, Try again later...!',401);
        }
    }
    //End Temporary Crop Form (Tofsil-3)




    //Start Perennial Crop Form (Tofsil-4)
    public function storeTofsil4Data(Request $request)
    {
        $validation = Validator::make($request->all(),
        [ 
            'survey_process_list_id'                    => 'required',
            'farmer_id'                                 => 'required',
            'crops_id'                                  => 'required',
            'total_fruity_trees_in_garden'              => 'required',
            'total_fruity_scattered_trees'              => 'required',
            'last_total_fruity_trees_in_garden'         => 'required',
            'last_total_fruity_scattered_trees'         => 'required',
            'land_amount_under_the_fruitly_trees'       => 'required',
            'last_land_amount_under_the_fruitly_trees'  => 'required',
            'total_fruitless_trees'                     => 'required',
            'total_production'                          => 'required',
            'last_total_production'                     => 'required',
            'land_amount_under_the_fruitless_trees'     => 'required',
            'total_land_amount_under_the_trees'         => 'required',
        ]);

        if($validation->fails())
        {
            return $this->sendError('error', 'All field is required',400);
        }

        $user = Auth::user();

        $surveyProcessList = SurveyProcessList::where('id', $request->survey_process_list_id)->latest()->first();

        $perennialCropForm = new SurveyTofsilForm4;

        $perennialCropForm->survey_process_list_id                      = $request->survey_process_list_id;
        $perennialCropForm->survey_notification_id                      = $surveyProcessList->survey_notification_id;
        $perennialCropForm->division_id                                 = $surveyProcessList->division_id;
        $perennialCropForm->district_id                                 = $surveyProcessList->district_id;
        $perennialCropForm->upazila_id                                  = $surveyProcessList->upazila_id;
        $perennialCropForm->union_id                                    = $surveyProcessList->union_id;
        $perennialCropForm->mouza_id                                    = $surveyProcessList->mouja_id;
        $perennialCropForm->farmer_id                                   = $request->farmer_id;
        $perennialCropForm->crops_id                                    = $request->crops_id;
        $perennialCropForm->total_fruity_trees_in_garden                = $request->total_fruity_trees_in_garden;
        $perennialCropForm->total_fruity_scattered_trees                = $request->total_fruity_scattered_trees;
        $perennialCropForm->total_fruity_trees                          = $request->total_fruity_trees;
        $perennialCropForm->last_total_fruity_trees_in_garden           = $request->last_total_fruity_trees_in_garden;
        $perennialCropForm->last_total_fruity_scattered_trees           = $request->last_total_fruity_scattered_trees;
        $perennialCropForm->last_total_fruity_trees                     = $request->last_total_fruity_trees;
        $perennialCropForm->land_amount_under_the_fruitly_trees         = $request->land_amount_under_the_fruitly_trees;
        $perennialCropForm->last_land_amount_under_the_fruitly_trees    = $request->last_land_amount_under_the_fruitly_trees;
        $perennialCropForm->total_fruitless_trees                       = $request->total_fruitless_trees;
        $perennialCropForm->total_production                            = $request->total_production;
        $perennialCropForm->last_total_production                       = $request->last_total_production;
        $perennialCropForm->average_yield_per_tree                      = $request->average_yield_per_tree;
        $perennialCropForm->total_trees                                 = $request->total_fruity_trees + $request->total_fruitless_trees;
        $perennialCropForm->land_amount_under_the_fruitless_trees       = $request->land_amount_under_the_fruitless_trees;
        $perennialCropForm->last_land_amount_under_the_fruitless_trees  = $request->last_land_amount_under_the_fruitless_trees;
        $perennialCropForm->total_land_amount_under_the_trees           = $request->total_land_amount_under_the_trees;
        $perennialCropForm->last_total_land_amount_under_the_trees      = $request->last_total_land_amount_under_the_trees;
        $perennialCropForm->created_by                                  = Auth::user()->id;

        $done = $perennialCropForm->save();

        if($done)
        {
            return $this->sendResponse(null, 'Form submitted successfully.');
        }else{
            return $this->sendError('error', 'Something went wrong, Try again later...!',401);
        }
    }

    public function updateTofsil4Data(Request $request)
    {
        $validation = Validator::make($request->all(),
        [ 
            'survey_process_list_id'                    => 'required',
            'farmer_id'                                 => 'required',
            'crops_id'                                  => 'required',
            'total_fruity_trees_in_garden'              => 'required',
            'total_fruity_scattered_trees'              => 'required',
            'last_total_fruity_trees_in_garden'         => 'required',
            'last_total_fruity_scattered_trees'         => 'required',
            'land_amount_under_the_fruitly_trees'       => 'required',
            'last_land_amount_under_the_fruitly_trees'  => 'required',
            'total_fruitless_trees'                     => 'required',
            'total_production'                          => 'required',
            'last_total_production'                     => 'required',
            'land_amount_under_the_fruitless_trees'     => 'required',
            'total_land_amount_under_the_trees'         => 'required',
        ]);

        if($validation->fails())
        {
            return $this->sendError('error', 'All field is required',400);
        }

        $user = Auth::user();

        $surveyProcessList = SurveyProcessList::where('id', $request->survey_process_list_id)->latest()->first();

        $perennialCropForm = SurveyTofsilForm4::findOrFail($request->id);

        $perennialCropForm->survey_process_list_id                      = $request->survey_process_list_id;
        $perennialCropForm->survey_notification_id                      = $surveyProcessList->survey_notification_id;
        $perennialCropForm->division_id                                 = $surveyProcessList->division_id;
        $perennialCropForm->district_id                                 = $surveyProcessList->district_id;
        $perennialCropForm->upazila_id                                  = $surveyProcessList->upazila_id;
        $perennialCropForm->union_id                                    = $surveyProcessList->union_id;
        $perennialCropForm->mouza_id                                    = $surveyProcessList->mouja_id;
        $perennialCropForm->farmer_id                                   = $request->farmer_id;
        $perennialCropForm->crops_id                                    = $request->crops_id;
        $perennialCropForm->total_fruity_trees_in_garden                = $request->total_fruity_trees_in_garden;
        $perennialCropForm->total_fruity_scattered_trees                = $request->total_fruity_scattered_trees;
        $perennialCropForm->total_fruity_trees                          = $request->total_fruity_trees;
        $perennialCropForm->last_total_fruity_trees_in_garden           = $request->last_total_fruity_trees_in_garden;
        $perennialCropForm->last_total_fruity_scattered_trees           = $request->last_total_fruity_scattered_trees;
        $perennialCropForm->last_total_fruity_trees                     = $request->last_total_fruity_trees;
        $perennialCropForm->land_amount_under_the_fruitly_trees         = $request->land_amount_under_the_fruitly_trees;
        $perennialCropForm->last_land_amount_under_the_fruitly_trees    = $request->last_land_amount_under_the_fruitly_trees;
        $perennialCropForm->total_fruitless_trees                       = $request->total_fruitless_trees;
        $perennialCropForm->total_production                            = $request->total_production;
        $perennialCropForm->last_total_production                       = $request->last_total_production;
        $perennialCropForm->average_yield_per_tree                      = $request->average_yield_per_tree;
        $perennialCropForm->total_trees                                 = $request->total_fruity_trees + $request->total_fruitless_trees;
        $perennialCropForm->land_amount_under_the_fruitless_trees       = $request->land_amount_under_the_fruitless_trees;
        $perennialCropForm->last_land_amount_under_the_fruitless_trees  = $request->last_land_amount_under_the_fruitless_trees;
        $perennialCropForm->total_land_amount_under_the_trees           = $request->total_land_amount_under_the_trees;
        $perennialCropForm->last_total_land_amount_under_the_trees      = $request->last_total_land_amount_under_the_trees;
        $perennialCropForm->created_by                                  = Auth::user()->id;

        $done = $perennialCropForm->save();

        if($done)
        {
            return $this->sendResponse(null, 'Form Updated successfully.');
        }else{
            return $this->sendError('error', 'Something went wrong, Try again later...!',401);
        }
    }
    //End Perennial Crop Form (Tofsil-4)



    //Start Crop Form (Tofsil-6)
    public function storeTofsil6Data(Request $request)
    {

        $validation = Validator::make($request->all(),
        [ 
            'survey_process_list_id'        => 'required',
            'season'                        => 'required',
            'crop_id'                       => 'required',
            'last_year_land_amount'         => 'required',
            'last_year_land_producttion'    => 'required',
            'current_year_land_amount'      => 'required',
            'current_year_land_producttion' => 'required',
        ]);

        if($validation->fails())
        {
            return $this->sendError('error', 'All field is required',400);
        }

        $user = Auth::user();

        $surveyProcessList = SurveyProcessList::where('id', $request->survey_process_list_id)->latest()->first();

        $surveyTofsilForm3Maize = new SurveyTofsilForm3Maize;

        $surveyTofsilForm3Maize->survey_process_list_id          = $request->survey_process_list_id;
        $surveyTofsilForm3Maize->survey_notification_id          = $surveyProcessList->survey_notification_id;
        $surveyTofsilForm3Maize->division_id                     = $surveyProcessList->division_id;
        $surveyTofsilForm3Maize->district_id                     = $surveyProcessList->district_id;
        $surveyTofsilForm3Maize->upazila_id                      = $surveyProcessList->upazila_id;
        $surveyTofsilForm3Maize->union_id                        = $surveyProcessList->union_id;
        $surveyTofsilForm3Maize->mouza_id                        = $surveyProcessList->mouza_id;
        $surveyTofsilForm3Maize->season                          = $request->season;
        $surveyTofsilForm3Maize->crop_id                         = $request->crop_id;
        $surveyTofsilForm3Maize->last_year_land_amount           = $request->last_year_land_amount;
        $surveyTofsilForm3Maize->last_year_land_producttion      = $request->last_year_land_producttion;
        $surveyTofsilForm3Maize->current_year_land_amount        = $request->current_year_land_amount;
        $surveyTofsilForm3Maize->current_year_land_producttion   = $request->current_year_land_producttion;
        $surveyTofsilForm3Maize->acre_reflection_rate            = $request->acre_reflection_rate;
        $surveyTofsilForm3Maize->last_acre_reflection_rate       = $request->last_acre_reflection_rate;
        $surveyTofsilForm3Maize->created_by                      = Auth::user()->id;

        $done = $surveyTofsilForm3Maize->save();

        if($done)
        {
            return $this->sendResponse(null, 'Form submitted successfully.');
        }else{
            return $this->sendError('error', 'Something went wrong, Try again later...!',401);
        }
    }

    public function updateTofsil6Data(Request $request)    {

        $validation = Validator::make($request->all(),
        [ 
            'survey_process_list_id'        => 'required',
            'season'                        => 'required',
            'crop_id'                       => 'required',
            'last_year_land_amount'         => 'required',
            'last_year_land_producttion'    => 'required',
            'current_year_land_amount'      => 'required',
            'current_year_land_producttion' => 'required',
        ]);

        if($validation->fails())
        {
            return $this->sendError('error', 'All field is required',400);
        }

        $user = Auth::user();

        $surveyProcessList = SurveyProcessList::where('id', $request->survey_process_list_id)->latest()->first();

        $surveyTofsilForm3Maize =  SurveyTofsilForm3Maize::findOrFail($request->id);

        $surveyTofsilForm3Maize->survey_process_list_id          = $request->survey_process_list_id;
        $surveyTofsilForm3Maize->survey_notification_id          = $surveyProcessList->survey_notification_id;
        $surveyTofsilForm3Maize->division_id                     = $surveyProcessList->division_id;
        $surveyTofsilForm3Maize->district_id                     = $surveyProcessList->district_id;
        $surveyTofsilForm3Maize->upazila_id                      = $surveyProcessList->upazila_id;
        $surveyTofsilForm3Maize->union_id                        = $surveyProcessList->union_id;
        $surveyTofsilForm3Maize->mouza_id                        = $surveyProcessList->mouza_id;
        $surveyTofsilForm3Maize->season                          = $request->season;
        $surveyTofsilForm3Maize->crop_id                         = $request->crop_id;
        $surveyTofsilForm3Maize->last_year_land_amount           = $request->last_year_land_amount;
        $surveyTofsilForm3Maize->last_year_land_producttion      = $request->last_year_land_producttion;
        $surveyTofsilForm3Maize->current_year_land_amount        = $request->current_year_land_amount;
        $surveyTofsilForm3Maize->current_year_land_producttion   = $request->current_year_land_producttion;
        $surveyTofsilForm3Maize->acre_reflection_rate            = $request->acre_reflection_rate;
        $surveyTofsilForm3Maize->last_acre_reflection_rate       = $request->last_acre_reflection_rate;
        $surveyTofsilForm3Maize->created_by                      = Auth::user()->id;

        $done = $surveyTofsilForm3Maize->save();

        if($done)
        {
            return $this->sendResponse(null, 'Form Updated successfully.');
        }else{
            return $this->sendError('error', 'Something went wrong, Try again later...!',401);
        }
    }

    //End Crop Form (Tofsil-6)




    //Start  Form (Tofsil-8)
    public function storeTofsil8Data(Request $request)
    {

        $validation = Validator::make($request->all(),
        [ 
            'farmers_name'      => 'required',
            'fathers_name'      => 'required',
        ]);

        if($validation->fails())
        {
            return $this->sendError('error', 'All field is required',400);
        }

        $user = Auth::user();

        $surveyProcessList = SurveyProcessList::where('id', $request->survey_process_list_id)->latest()->first();

        $tofsil8 = new SurveyTofsilForm8;

        $tofsil8->survey_process_list_id  = $request->survey_process_list_id;
        $tofsil8->survey_notification_id  = $surveyProcessList->survey_notification_id;
        $tofsil8->division_id             = $surveyProcessList->division_id;
        $tofsil8->district_id             = $surveyProcessList->district_id;
        $tofsil8->upazila_id              = $surveyProcessList->upazila_id;
        $tofsil8->cluster_id              = $surveyProcessList->cluster_id;
        $tofsil8->farmers_name            = $request->farmers_name;
        $tofsil8->fathers_name            = $request->fathers_name;
        $tofsil8->farmers_mobile          = $request->farmers_mobile;
        $tofsil8->one_meal_male           = $request->one_meal_male;
        $tofsil8->one_meal_female         = $request->one_meal_female;
        $tofsil8->two_meal_male           = $request->two_meal_male;
        $tofsil8->two_meal_female         = $request->two_meal_female;
        $tofsil8->three_meal_male         = $request->three_meal_male;
        $tofsil8->three_meal_female       = $request->three_meal_female;
        $tofsil8->without_meal_male       = $request->without_meal_male;
        $tofsil8->without_meal_female     = $request->without_meal_female;
        $tofsil8->created_by              = Auth::user()->id;

        $done = $tofsil8->save();

        if($done)
        {
            return $this->sendResponse(null, 'Form submitted successfully.');
        }else{
            return $this->sendError('error', 'Something went wrong, Try again later...!',401);
        }
    }

    public function updateTofsil8Data(Request $request)  
    {

        $validation = Validator::make($request->all(),
        [ 
            'farmers_name'      => 'required',
            'fathers_name'      => 'required',
        ]);

        if($validation->fails())
        {
            return $this->sendError('error', 'All field is required',400);
        }

        $user = Auth::user();

        $surveyProcessList = SurveyProcessList::where('id', $request->survey_process_list_id)->latest()->first();

        $tofsil8 = SurveyTofsilForm8::findOrFail($request->id);

        $tofsil8->survey_process_list_id  = $request->survey_process_list_id;
        $tofsil8->survey_notification_id  = $surveyProcessList->survey_notification_id;
        $tofsil8->division_id             = $surveyProcessList->division_id;
        $tofsil8->district_id             = $surveyProcessList->district_id;
        $tofsil8->upazila_id              = $surveyProcessList->upazila_id;
        $tofsil8->cluster_id              = $surveyProcessList->cluster_id;
        $tofsil8->farmers_name            = $request->farmers_name;
        $tofsil8->fathers_name            = $request->fathers_name;
        $tofsil8->farmers_mobile          = $request->farmers_mobile;
        $tofsil8->one_meal_male           = $request->one_meal_male;
        $tofsil8->one_meal_female         = $request->one_meal_female;
        $tofsil8->two_meal_male           = $request->two_meal_male;
        $tofsil8->two_meal_female         = $request->two_meal_female;
        $tofsil8->three_meal_male         = $request->three_meal_male;
        $tofsil8->three_meal_female       = $request->three_meal_female;
        $tofsil8->without_meal_male       = $request->without_meal_male;
        $tofsil8->without_meal_female     = $request->without_meal_female;
        $tofsil8->created_by              = Auth::user()->id;

        $done = $tofsil8->save();

        if($done)
        {
            return $this->sendResponse(null, 'Form Updated successfully.');
        }else{
            return $this->sendError('error', 'Something went wrong, Try again later...!',401);
        }
    }
    //End  Form (Tofsil-8)




    //Start  Form (Tofsil-10)
    public function storeTofsil10Data(Request $request)
    {

        $validation = Validator::make($request->all(),
        [ 
            'crop_varieties'                    => 'required',
            'collection_start_date'             => 'required',
            'collection_end_date'               => 'required',
            'temporary_crop_land_amound'        => 'required',
            'previous_year_land_amound_desi'    => 'required',
            'previous_year_land_amound_upashi'  => 'required',
            'current_year_land_amound_desi'     => 'required',
            'current_year_land_amound_upashi'   => 'required',
            'note_desi'                         => 'required',
            'note_upashi'                       => 'required',
        ]);

        if($validation->fails())
        {
            return $this->sendError('error', 'All field is required',400);
        }

        $user = Auth::user();

        $surveyProcessList = SurveyProcessList::where('id', $request->survey_process_list_id)->latest()->first();

        $surveyTofsilForm10 = new SurveyTofsilForm10;

        $surveyTofsilForm10->survey_process_list_id             = $request->survey_process_list_id;
        $surveyTofsilForm10->survey_notification_id             = $surveyProcessList->survey_notification_id;
        $surveyTofsilForm10->division_id                        = $surveyProcessList->division_id;
        $surveyTofsilForm10->district_id                        = $surveyProcessList->district_id;
        $surveyTofsilForm10->upazila_id                         = $surveyProcessList->upazila_id;
        $surveyTofsilForm10->union_id                           = $surveyProcessList->union_id;
        $surveyTofsilForm10->crops_id                           = $request->crops_id;
        $surveyTofsilForm10->crop_varieties                     = $request->crop_varieties;
        $surveyTofsilForm10->collection_start_date              = $request->collection_start_date;
        $surveyTofsilForm10->collection_end_date                = $request->collection_end_date;
        $surveyTofsilForm10->temporary_crop_land_amound         = $request->temporary_crop_land_amound;
        $surveyTofsilForm10->previous_year_land_amound_desi     = $request->previous_year_land_amound_desi;
        $surveyTofsilForm10->previous_year_land_amound_upashi   = $request->previous_year_land_amound_upashi;
        $surveyTofsilForm10->current_year_land_amound_desi      = $request->current_year_land_amound_desi;
        $surveyTofsilForm10->current_year_land_amound_upashi    = $request->current_year_land_amound_upashi;
        $surveyTofsilForm10->note_desi                          = $request->note_desi;
        $surveyTofsilForm10->note_upashi                        = $request->note_upashi;
        $surveyTofsilForm10->created_by                         = Auth::user()->id;

        $done = $surveyTofsilForm10->save();


        $results = [];

        foreach ($request->production_info as $index => $unit) {

            $results[] = [
                    "survey_process_list_id"    => $request->survey_process_list_id,
                    "survey_tofsil_form10_id"   => $surveyTofsilForm10->id,
                    "area_type"                 => $unit['area_type'],
                    "crop_id"                   => $unit['crop_id'],
                    "previous_land_amound"      => $unit['previous_land_amound'],
                    "previous_yield"            => $unit['previous_yield'],
                    "previous_total_production" => $unit['previous_total_production'],
                    "current_land_amound"       => $unit['current_land_amound'],
                    "current_yield"             => $unit['current_yield'],
                    "current_total_production"  => $unit['current_total_production'],
                    "note"                      => $unit['note'],
                    "created_by"                => Auth::user()->id,
                    "created_at"                => now(),
                ];
            
        }

        SurveyTofsilForm10Production::insert($results);

        if($done)
        {
            return $this->sendResponse(null, 'Form submitted successfully.');
        }else{
            return $this->sendError('error', 'Something went wrong, Try again later...!',401);
        }
    }

    // public function updateTofsil10Data(Request $request)
    // {

    //     $validation = Validator::make($request->all(),
    //     [ 
    //         'crop_varieties'                    => 'required',
    //         'collection_start_date'             => 'required',
    //         'collection_end_date'               => 'required',
    //         'temporary_crop_land_amound'        => 'required',
    //         'previous_year_land_amound_desi'    => 'required',
    //         'previous_year_land_amound_upashi'  => 'required',
    //         'current_year_land_amound_desi'     => 'required',
    //         'current_year_land_amound_upashi'   => 'required',
    //         'note_desi'                         => 'required',
    //         'note_upashi'                       => 'required',
    //     ]);

    //     if($validation->fails())
    //     {
    //         return $this->sendError('error', 'All field is required',400);
    //     }

    //     $user = Auth::user();

    //     $surveyProcessList = SurveyProcessList::where('id', $request->survey_process_list_id)->latest()->first();

    //     $surveyTofsilForm10 = SurveyTofsilForm10::findOrFail($request->id);

    //     $surveyTofsilForm10->survey_process_list_id             = $request->survey_process_list_id;
    //     $surveyTofsilForm10->survey_notification_id             = $surveyProcessList->survey_notification_id;
    //     $surveyTofsilForm10->division_id                        = $surveyProcessList->division_id;
    //     $surveyTofsilForm10->district_id                        = $surveyProcessList->district_id;
    //     $surveyTofsilForm10->upazila_id                         = $surveyProcessList->upazila_id;
    //     $surveyTofsilForm10->union_id                           = $surveyProcessList->union_id;
    //     $surveyTofsilForm10->crops_id                           = $request->crops_id;
    //     $surveyTofsilForm10->crop_varieties                     = $request->crop_varieties;
    //     $surveyTofsilForm10->collection_start_date              = $request->collection_start_date;
    //     $surveyTofsilForm10->collection_end_date                = $request->collection_end_date;
    //     $surveyTofsilForm10->temporary_crop_land_amound         = $request->temporary_crop_land_amound;
    //     $surveyTofsilForm10->previous_year_land_amound_desi     = $request->previous_year_land_amound_desi;
    //     $surveyTofsilForm10->previous_year_land_amound_upashi   = $request->previous_year_land_amound_upashi;
    //     $surveyTofsilForm10->current_year_land_amound_desi      = $request->current_year_land_amound_desi;
    //     $surveyTofsilForm10->current_year_land_amound_upashi    = $request->current_year_land_amound_upashi;
    //     $surveyTofsilForm10->note_desi                          = $request->note_desi;
    //     $surveyTofsilForm10->note_upashi                        = $request->note_upashi;
    //     $surveyTofsilForm10->created_by                         = Auth::user()->id;

    //     $done = $surveyTofsilForm10->save();


    //     $results = [];

    //     foreach ($request->production_infos as $index => $unit) {

    //         $results[] = [
    //                 "survey_process_list_id"    => $request->survey_process_list_id,
    //                 "survey_tofsil_form10_id"   => $surveyTofsilForm10->id,
    //                 "area_type"                 => $unit['area_type'],
    //                 "crop_id"                   => $unit['crop_id'],
    //                 "previous_land_amound"      => $unit['previous_land_amound'],
    //                 "previous_yield"            => $unit['previous_yield'],
    //                 "previous_total_production" => $unit['previous_total_production'],
    //                 "current_land_amound"       => $unit['current_land_amound'],
    //                 "current_yield"             => $unit['current_yield'],
    //                 "current_total_production"  => $unit['current_total_production'],
    //                 "note"                      => $unit['note'],
    //                 "created_by"                => Auth::user()->id,
    //                 "created_at"                => now(),
    //             ];
            
    //     }

    //     SurveyTofsilForm10Production::insert($results);

    //     if($done)
    //     {
    //         return $this->sendResponse(null, 'Form Updated successfully.');
    //     }else{
    //         return $this->sendError('error', 'Something went wrong, Try again later...!',401);
    //     }
    // }
    //End  Form (Tofsil-10)



    //Start  Form (Tofsil-5)
    public function storeTofsil5Data(Request $request)
    {

        $validation = Validator::make($request->all(),
        [ 
            'farmer_id'                         => 'required',
            'crop_cutting_date'                 => 'required',
            'land_segment_signal'               => 'required',
            'in_cluster'                        => 'required',
            'potato_varieties'                  => 'required',
            'land_amount_of_plot'               => 'required',
            'number_of_row'                     => 'required',
            'location_of_sample_row_1'          => 'required',
            'location_of_sample_row_2'          => 'required',
            'row_length_feet_1'                 => 'required',
            'row_length_feet_2'                 => 'required',
            'row_average_width_feet_1'          => 'required',
            'row_average_width_feet_2'          => 'required',
            'random_land_amount_of_plot'        => 'required',
            'random_number_of_row'              => 'required',
            'random_location_east_to_west'      => 'required',
            'random_location_north_to_south'    => 'required',
            'random_row_length_feet'            => 'required',
            'random_row_average_width_feet'     => 'required',
            'random_number_row_cut'             => 'required',
            'size_of_cut_row_squre_feet'        => 'required',
            'size_of_cut_row_acre'              => 'required',
            'amount_of_cut_potato_kg'           => 'required',
            'production_per_acre'               => 'required',
            'production_cost_per_acre'          => 'required',
        ]);

        if($validation->fails())
        {
            return $this->sendError('error', 'All field is required',400);
        }

        $user = Auth::user();

        $surveyProcessList = SurveyProcessList::where('id', $request->survey_process_list_id)->latest()->first();

        $potatoCropCuttingForm = new SurveyTofsilForm5;

        $potatoCropCuttingForm->survey_process_list_id          = $request->survey_process_list_id;
        $potatoCropCuttingForm->survey_notification_id          = $surveyProcessList->survey_notification_id;
        $potatoCropCuttingForm->division_id                     = $surveyProcessList->division_id;
        $potatoCropCuttingForm->district_id                     = $surveyProcessList->district_id;
        $potatoCropCuttingForm->upazila_id                      = $surveyProcessList->upazila_id;
        $potatoCropCuttingForm->cluster_id                      = $surveyProcessList->cluster_id;
        $potatoCropCuttingForm->union_id                        = $surveyProcessList->union_id;
        $potatoCropCuttingForm->mouza_id                        = $surveyProcessList->mouza_id;
        $potatoCropCuttingForm->farmer_id                       = $request->farmer_id;
        $potatoCropCuttingForm->crop_cutting_date               = $request->crop_cutting_date;
        $potatoCropCuttingForm->land_segment_signal             = $request->land_segment_signal;
        $potatoCropCuttingForm->in_cluster                      = $request->in_cluster;
        $potatoCropCuttingForm->potato_varieties                = $request->potato_varieties;
        $potatoCropCuttingForm->land_amount_of_plot             = $request->land_amount_of_plot;
        $potatoCropCuttingForm->number_of_row                   = $request->number_of_row;
        $potatoCropCuttingForm->location_of_sample_row_1        = $request->location_of_sample_row_1;
        $potatoCropCuttingForm->location_of_sample_row_2        = $request->location_of_sample_row_2;
        $potatoCropCuttingForm->row_length_feet_1               = $request->row_length_feet_1;
        $potatoCropCuttingForm->row_length_feet_2               = $request->row_length_feet_2;
        $potatoCropCuttingForm->row_average_width_feet_1        = $request->row_average_width_feet_1;
        $potatoCropCuttingForm->row_average_width_feet_2        = $request->row_average_width_feet_2;
        $potatoCropCuttingForm->random_land_amount_of_plot      = $request->random_land_amount_of_plot;
        $potatoCropCuttingForm->random_number_of_row            = $request->random_number_of_row;
        $potatoCropCuttingForm->random_location_east_to_west    = $request->random_location_east_to_west;
        $potatoCropCuttingForm->random_location_north_to_south  = $request->random_location_north_to_south;
        $potatoCropCuttingForm->random_row_length_feet          = $request->random_row_length_feet;
        $potatoCropCuttingForm->random_row_average_width_feet   = $request->random_row_average_width_feet;
        // $potatoCropCuttingForm->random_number_row_cut           = $request->random_number_row_cut;
        $potatoCropCuttingForm->size_of_cut_row_squre_feet      = $request->size_of_cut_row_squre_feet;
        $potatoCropCuttingForm->size_of_cut_row_acre            = $request->size_of_cut_row_acre;
        $potatoCropCuttingForm->amount_of_cut_potato_kg         = $request->amount_of_cut_potato_kg;
        $potatoCropCuttingForm->production_per_acre             = $request->production_per_acre;
        $potatoCropCuttingForm->production_cost_per_acre        = $request->production_cost_per_acre;
        $potatoCropCuttingForm->created_by                      = Auth::user()->id;

        $done = $potatoCropCuttingForm->save();


        $results = [];

        foreach ($request->potato_nearby_farmer_info as $key => $farmers) {

            $results[] = [
                "survey_process_list_id"            => $request->survey_process_list_id,
                "survey_tofsil_form5_id"            => $potatoCropCuttingForm->id,
                "farmer_id"                         => $farmers['farmer_int_id'],
                "farmers_father_name"               => $farmers['farmers_father_name'],
                "last_year_land_amount"             => $farmers['last_year_land_amount'],
                "last_year_potato_producttion"      => $farmers['last_year_potato_producttion'],
                "current_year_land_amount"          => $farmers['current_year_land_amount'],
                "current_year_potato_producttion"   => $farmers['current_year_potato_producttion'],
                "average_yield_per_acre"            => $farmers['average_yield_per_acre'],
                "created_by"                        => Auth::user()->id,
                "created_at"                        => now(),
            ];
            
        }

        SurveyTofsilForm5AllFarmer::insert($results);

        if($done)
        {
            return $this->sendResponse(null, 'Form submitted successfully.');
        }else{
            return $this->sendError('error', 'Something went wrong, Try again later...!',401);
        }
    }
 
//    public function updateTofsil5Data(Request $request) {
//         $validation = Validator::make($request->all(),
//         [ 
//             'farmer_id'                         => 'required',
//             'crop_cutting_date'                 => 'required',
//             'land_segment_signal'               => 'required',
//             'in_cluster'                        => 'required',
//             'potato_varieties'                  => 'required',
//             'land_amount_of_plot'               => 'required',
//             'number_of_row'                     => 'required',
//             'location_of_sample_row_1'          => 'required',
//             'location_of_sample_row_2'          => 'required',
//             'row_length_feet_1'                 => 'required',
//             'row_length_feet_2'                 => 'required',
//             'row_average_width_feet_1'          => 'required',
//             'row_average_width_feet_2'          => 'required',
//             'random_land_amount_of_plot'        => 'required',
//             'random_number_of_row'              => 'required',
//             'random_location_east_to_west'      => 'required',
//             'random_location_north_to_south'    => 'required',
//             'random_row_length_feet'            => 'required',
//             'random_row_average_width_feet'     => 'required',
//             'random_number_row_cut'             => 'required',
//             'size_of_cut_row_squre_feet'        => 'required',
//             'size_of_cut_row_acre'              => 'required',
//             'amount_of_cut_potato_kg'           => 'required',
//             'production_per_acre'               => 'required',
//             'production_cost_per_acre'          => 'required',
//         ]);

//         if($validation->fails())
//         {
//             return $this->sendError('error', 'All field is required',400);
//         }

//         $user = Auth::user();

//         $surveyProcessList = SurveyProcessList::where('id', $request->survey_process_list_id)->latest()->first();

//         $potatoCropCuttingForm = SurveyTofsilForm5::find($request->id);

//         $potatoCropCuttingForm->survey_process_list_id          = $request->survey_process_list_id;
//         $potatoCropCuttingForm->survey_notification_id          = $surveyProcessList->survey_notification_id;
//         $potatoCropCuttingForm->division_id                     = $surveyProcessList->division_id;
//         $potatoCropCuttingForm->district_id                     = $surveyProcessList->district_id;
//         $potatoCropCuttingForm->upazila_id                      = $surveyProcessList->upazila_id;
//         $potatoCropCuttingForm->cluster_id                      = $surveyProcessList->cluster_id;
//         $potatoCropCuttingForm->union_id                        = $surveyProcessList->union_id;
//         $potatoCropCuttingForm->mouza_id                        = $surveyProcessList->mouza_id;
//         $potatoCropCuttingForm->farmer_id                       = $request->farmer_id;
//         $potatoCropCuttingForm->crop_cutting_date               = $request->crop_cutting_date;
//         $potatoCropCuttingForm->land_segment_signal             = $request->land_segment_signal;
//         $potatoCropCuttingForm->in_cluster                      = $request->in_cluster;
//         $potatoCropCuttingForm->potato_varieties                = $request->potato_varieties;
//         $potatoCropCuttingForm->land_amount_of_plot             = $request->land_amount_of_plot;
//         $potatoCropCuttingForm->number_of_row                   = $request->number_of_row;
//         $potatoCropCuttingForm->location_of_sample_row_1        = $request->location_of_sample_row_1;
//         $potatoCropCuttingForm->location_of_sample_row_2        = $request->location_of_sample_row_2;
//         $potatoCropCuttingForm->row_length_feet_1               = $request->row_length_feet_1;
//         $potatoCropCuttingForm->row_length_feet_2               = $request->row_length_feet_2;
//         $potatoCropCuttingForm->row_average_width_feet_1        = $request->row_average_width_feet_1;
//         $potatoCropCuttingForm->row_average_width_feet_2        = $request->row_average_width_feet_2;
//         $potatoCropCuttingForm->random_land_amount_of_plot      = $request->random_land_amount_of_plot;
//         $potatoCropCuttingForm->random_number_of_row            = $request->random_number_of_row;
//         $potatoCropCuttingForm->random_location_east_to_west    = $request->random_location_east_to_west;
//         $potatoCropCuttingForm->random_location_north_to_south  = $request->random_location_north_to_south;
//         $potatoCropCuttingForm->random_row_length_feet          = $request->random_row_length_feet;
//         $potatoCropCuttingForm->random_row_average_width_feet   = $request->random_row_average_width_feet;
//         // $potatoCropCuttingForm->random_number_row_cut           = $request->random_number_row_cut;
//         $potatoCropCuttingForm->size_of_cut_row_squre_feet      = $request->size_of_cut_row_squre_feet;
//         $potatoCropCuttingForm->size_of_cut_row_acre            = $request->size_of_cut_row_acre;
//         $potatoCropCuttingForm->amount_of_cut_potato_kg         = $request->amount_of_cut_potato_kg;
//         $potatoCropCuttingForm->production_per_acre             = $request->production_per_acre;
//         $potatoCropCuttingForm->production_cost_per_acre        = $request->production_cost_per_acre;
//         $potatoCropCuttingForm->created_by                      = Auth::user()->id;

//         $done = $potatoCropCuttingForm->save();


//         $results = [];

//         foreach ($request->potato_nearby_farmer_info as $key => $farmers) {

//             $results[] = [
//                 "survey_process_list_id"            => $request->survey_process_list_id,
//                 "survey_tofsil_form5_id"            => $potatoCropCuttingForm->id,
//                 "farmer_id"                         => $farmers['farmer_int_id'],
//                 "farmers_father_name"               => $farmers['farmers_father_name'],
//                 "last_year_land_amount"             => $farmers['last_year_land_amount'],
//                 "last_year_potato_producttion"      => $farmers['last_year_potato_producttion'],
//                 "current_year_land_amount"          => $farmers['current_year_land_amount'],
//                 "current_year_potato_producttion"   => $farmers['current_year_potato_producttion'],
//                 "average_yield_per_acre"            => $farmers['average_yield_per_acre'],
//                 "created_by"                        => Auth::user()->id,
//                 "created_at"                        => now(),
//             ];
            
//         }

//         SurveyTofsilForm5AllFarmer::insert($results);

//         if($done)
//         {
//             return $this->sendResponse(null, 'Form submitted successfully.');
//         }else{
//             return $this->sendError('error', 'Something went wrong, Try again later...!',401);
//         }
//     }
    //End  Form (Tofsil-5)

}

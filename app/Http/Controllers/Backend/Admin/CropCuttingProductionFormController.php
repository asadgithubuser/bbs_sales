<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\Support\Facades\Gate;

/* included models */
use App\Models\Union;
use App\Models\Cluster;
use App\Models\Crop;
use App\Models\SurveyProcessList;
use App\Models\SurveyNotification;
use App\Models\SurveyProcessForwardingLog;
use App\Models\GenerateSurveyNotification;
use App\Models\SurveyCompilationCollectForm1;
use App\Models\SurveyTofsilForm1;
use App\Models\SurveyTofsilForm2;
use App\Models\SurveyTofsilForm2AllFarmer;

class CropCuttingProductionFormController extends Controller
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
            menuSubmenu('farmersData', 'cropCuttingProductionsData');

            $cropCuttingProductionsData = SurveyTofsilForm2::with('division', 'district', 'upazila', 'union', 'mouza', 'cluster', 'farmer')->where('created_by', $user->id)->where('status', false)->latest()->paginate(15);

            return view('backend.admin.surveyForms.cropCuttingProductionForm.index', compact('cropCuttingProductionsData'));

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
            if(Gate::allows('crop_cutting_production', $user))
            {
                // get last value from url
                $url = $request->url();
                $url = basename($url);
                $number = is_numeric($url);

                menuSubmenu('surveyForms', 'cropCuttingProduction');

                $processListId = $request->surveyProListId;
               
                if(empty($processListId))
                {
                    $processList = SurveyProcessList::with('cluster', 'union', 'mouza')->where('status',1)->where('survey_form_id', 5)->where('survey_by', $user->id)->get();

                    $crops = Crop::where('status', 1)->get();
                    
                    if($processList->count() > 0)
                    {    
                        return view('backend.admin.surveyForms.cropCuttingProductionForm.surveyProcessList', [
                            'processLists' => $processList
                        ]);
                    }
                    else
                    {
                        
                        return view('backend.admin.surveyForms.cropCuttingProductionForm.create', compact('crops', 'number'));
                    }

                }else{
                    
                    $processList = SurveyProcessList::with('mouza')->where('id', $processListId)->first();

                    $unions = Union::where('upazila_id', $user->upazila_id)
                                    ->where('status', 1)
                                    ->get();

                    $clusters = Cluster::where('union_id', $processList->union_id)->where('status', 1)->get();

                    $crops = Crop::where('status', 1)->get();
                    
                    $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 2)->first();

                    $surveyNotification = SurveyNotification::where('id', $processList->survey_notification_id)->first();
                    
                    $farmers = SurveyTofsilForm1::where('bunch_stains_id', $processList->bunch_stains_id)->where('status', 1)->get();
                                
                    return view('backend.admin.surveyForms.cropCuttingProductionForm.create', compact('processListId', 'processList', 'unions', 'crops', 'clusters', 'surveyNotification', 'surveyList', 'farmers', 'number'));
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
            // 'agricultural_officer_name' => 'required',
        ]);

        $cropCuttingProductionForm = new SurveyTofsilForm2;

        $cropCuttingProductionForm->survey_process_list_id          = $request->survey_process_list_id;
        $cropCuttingProductionForm->survey_notification_id          = $request->survey_notification_id;
        $cropCuttingProductionForm->division_id                     = $request->division_id;
        $cropCuttingProductionForm->district_id                     = $request->district_id;
        $cropCuttingProductionForm->upazila_id                      = $request->upazila_id;
        $cropCuttingProductionForm->cluster_id                      = $request->cluster_id;
        $cropCuttingProductionForm->union_id                        = $request->union_id;
        $cropCuttingProductionForm->mouza_id                        = $request->mouza_id;
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
        $cropCuttingProductionForm->pesticide_amound_lit           = $request->pesticide_amound_lit;
        
        if($request->what_type_fertilizer)
        {
            $cropCuttingProductionForm->what_type_fertilizer            = implode(',', $request->what_type_fertilizer);

        }
        if ($request->what_used_fertilizer) {
            $cropCuttingProductionForm->what_used_fertilizer        = implode(',', $request->what_used_fertilizer);
        }

        $cropCuttingProductionForm->fertilizer_amound               = $request->fertilizer_amound;
        $cropCuttingProductionForm->is_used_pesticide               = $request->is_used_pesticide;
        $cropCuttingProductionForm->what_type_pesticide             = $request->what_type_pesticide;
        $cropCuttingProductionForm->pesticide_amound                = $request->pesticide_amound;
        // $cropCuttingProductionForm->agricultural_officer_name       = $request->agricultural_officer_name;
        $cropCuttingProductionForm->created_by                      = Auth::user()->id;

        $done = $cropCuttingProductionForm->save();

        $farmer_int_id                  = $request->farmer_int_id;
        $fathers_name                   = $request->fathers_name;
        $last_year_land_amount          = $request->last_year_land_amount;
        $last_year_land_producttion     = $request->last_year_land_producttion;
        $current_year_land_amount       = $request->current_year_land_amount;
        $current_year_land_producttion  = $request->current_year_land_producttion;
        $comments                       = $request->comments;

        $results = [];

        foreach ($farmer_int_id as $index => $unit) {

            $results[] = [
                    "survey_process_list_id"        => $request->survey_process_list_id,
                    "survey_tofsil_form2_id"        => $cropCuttingProductionForm->id,
                    "farmer_int_id"                 => $farmer_int_id[$index],
                    "fathers_name"                  => $fathers_name[$index],
                    "last_year_land_amount"         => $last_year_land_amount[$index],
                    "last_year_land_producttion"    => $last_year_land_producttion[$index],
                    "current_year_land_amount"      => $current_year_land_amount[$index],
                    "current_year_land_producttion" => $current_year_land_producttion[$index],
                    "comments"                      => $comments[$index],
                    "created_by"                    => Auth::user()->id,
                    "created_at"                    => now(),
                ];
            
        }

        SurveyTofsilForm2AllFarmer::insert($results);

        if($done)
        {
            return redirect()->route('admin.cropCuttingProductionForm.create')->with('success', 'Form submitted successfully.');
        } else {
            return redirect()->route('admin.cropCuttingProductionForm.create')->with('error', 'Something went wrong, Try again later...!');
        }
    }

    public function storeData(SurveyTofsilForm2 $data, Request $request)
    {
        $data->agricultural_officer_name = $request->agricultural_officer_name;
        $data->agricultural_officer_upazila = $request->agricultural_officer_upazila;
        $data->agricultural_officer_designation = $request->agricultural_officer_designation;

        if($request->hasFile('agricultural_officer_signature'))
        {
            $cp = $request->file('agricultural_officer_signature');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = $data->id.'signature'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

            Storage::disk('public')->put('signatures/'.$randomFileName, File::get($cp));

            $data->agricultural_officer_signature = $randomFileName;
            $data->save();
      	} 

        $data->save();

        return back()->with('success','Agricultural Officer Information Updated Successfully.');
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

        // if (Gate::allows('farmers_data', $user)) 
        // {
        //     menuSubmenu('farmersData', 'cropCuttingProductionsData');

        //     $cropCuttingProductionData = SurveyTofsilForm2::with('user', 'division', 'district', 'upazila', 'cluster', 'crop')->where('id', $id)->first();
        //     $cropCuttingProductionFarmerDatas = SurveyTofsilForm2AllFarmer::where('id', $cropCuttingProductionData->id)->get();

        //     $surveyNotification = SurveyNotification::where('id', $clusterData->survey_notification_id)->first();

        //     return view('backend.admin.surveyForms.cropCuttingProductionForm.show', compact('cropCuttingProductionData', 'cropCuttingProductionFarmerDatas', 'surveyNotification'));
        // }else{
        //     abort(403);
        // }
        if (Gate::allows('farmers_data', $user)) 
        {
            menuSubmenu('farmersData', 'cropCuttingProductionsData');

            $cropCuttingProductionData = SurveyTofsilForm2::with('user', 'division', 'district', 'upazila', 'cluster', 'crop')->where('id', $id)->first();
            $cropCuttingProductionFarmerDatas = SurveyTofsilForm2AllFarmer::where('id', $cropCuttingProductionData->id)->get();
            
            $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 1)->first();
            
            $clusters = Cluster::where('status', 1)->get();
            $farmers = SurveyTofsilForm1::where('status', 1)->get();
            
            $crops = Crop::where('status', 1)->get();
            
            $surveyNotification = SurveyNotification::where('id', $cropCuttingProductionData->survey_notification_id)->first();
            // dd($surveyNotification);
            $interViews = SurveyTofsilForm2AllFarmer::where('survey_process_list_id',$cropCuttingProductionData->survey_process_list_id)->where('survey_tofsil_form2_id',$cropCuttingProductionData->id)->get();
            
            return view('backend.admin.surveyForms.cropCuttingProductionForm.show', compact('cropCuttingProductionData', 'cropCuttingProductionFarmerDatas', 'surveyList', 'clusters', 'farmers','surveyNotification','crops','interViews'));
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
            menuSubmenu('farmersData', 'cropCuttingProductionsData');

            $cropCuttingProductionData = SurveyTofsilForm2::with('user', 'division', 'district', 'upazila', 'cluster', 'crop')->where('id', $id)->first();
            $cropCuttingProductionFarmerDatas = SurveyTofsilForm2AllFarmer::where('id', $cropCuttingProductionData->id)->get();
            
            $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 1)->first();
            
            $clusters = Cluster::where('status', 1)->get();
            $farmers = SurveyTofsilForm1::where('status', 1)->get();
            
            $crops = Crop::where('status', 1)->get();
            
            $surveyNotification = SurveyNotification::where('id', $cropCuttingProductionData->survey_notification_id)->first();
            // dd($surveyNotification);
            $interViews = SurveyTofsilForm2AllFarmer::where('survey_process_list_id',$cropCuttingProductionData->survey_process_list_id)->where('survey_tofsil_form2_id',$cropCuttingProductionData->id)->get();
            
            return view('backend.admin.surveyForms.cropCuttingProductionForm.edit', compact('cropCuttingProductionData', 'cropCuttingProductionFarmerDatas', 'surveyList', 'clusters', 'farmers','surveyNotification','crops','interViews'));
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
    public function update(Request $request,SurveyTofsilForm2 $cropCuttingProductionForm)
    { 
        
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
        $cropCuttingProductionForm->fertilizer_amound_lit           = $request->fertilizer_amound_lit;
        
        if($request->what_type_fertilizer)
        {
            $cropCuttingProductionForm->what_type_fertilizer            = implode(',', $request->what_type_fertilizer);

        }
        if ($request->what_used_fertilizer) {
            $cropCuttingProductionForm->what_used_fertilizer        = implode(',', $request->what_used_fertilizer);
        }
        
        if ($request->what_used_fertilizer) {
            $cropCuttingProductionForm->what_used_fertilizer        = implode(',', $request->what_used_fertilizer);
        }

        $cropCuttingProductionForm->fertilizer_amound               = $request->fertilizer_amound;
        $cropCuttingProductionForm->is_used_pesticide               = $request->is_used_pesticide;
        $cropCuttingProductionForm->what_type_pesticide             = $request->what_type_pesticide;
        $cropCuttingProductionForm->pesticide_amound                = $request->pesticide_amound;
        // $cropCuttingProductionForm->agricultural_officer_name       = $request->agricultural_officer_name;
        $cropCuttingProductionForm->created_by                      = Auth::user()->id;
        
        $done = $cropCuttingProductionForm->save();
        $farmer_int_id                  = $request->farmer_int_id;
        $fathers_name                   = $request->fathers_name;
        $last_year_land_amount          = $request->last_year_land_amount;
        $last_year_land_producttion     = $request->last_year_land_producttion;
        $current_year_land_amount       = $request->current_year_land_amount;
        $current_year_land_producttion  = $request->current_year_land_producttion;
        $comments                       = $request->comments;

        $results = [];
       
        foreach ($farmer_int_id as $index => $unit) {
            
            $results[] = [
                    "survey_process_list_id"        => $cropCuttingProductionForm->survey_process_list_id,
                    "survey_tofsil_form2_id"        => $cropCuttingProductionForm->id,
                    "farmer_int_id"                 => $farmer_int_id[$index],
                    "fathers_name"                  => $fathers_name[$index],
                    "last_year_land_amount"         => $last_year_land_amount[$index],
                    "last_year_land_producttion"    => $last_year_land_producttion[$index],
                    "current_year_land_amount"      => $current_year_land_amount[$index],
                    "current_year_land_producttion" => $current_year_land_producttion[$index],
                    "comments"                      => $comments[$index],
                    "created_by"                    => Auth::user()->id,
                    "created_at"                    => now(),
                ];
            
        }

        SurveyTofsilForm2AllFarmer::insert($results);
        if($done)
        {
            return redirect()->route('admin.cropCuttingProductionForm.create')->with('success', 'Form submitted successfully.');
        } else {
            return redirect()->route('admin.cropCuttingProductionForm.create')->with('error', 'Something went wrong, Try again later...!');
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


    public function submitForForward(Request $request)
    {
        $survey_notification_id = $request->notification;
        
        $cropCuttingProductionDatas = SurveyTofsilForm2::where('survey_notification_id', $survey_notification_id)->where('created_by', Auth::id())->get();
        
        foreach($cropCuttingProductionDatas as $data){
            $data->status = true;
            $data->save();
        }

        foreach($request->survey_process_list_id as $data)
        {
            $list = SurveyProcessList::find($data);
            $list->status = 2;
            $list->save();

            $log = new SurveyProcessForwardingLog;

            $log->survey_process_list_id = $data;
            $log->forward_by = Auth::id();
            $log->forward_to = $list->created_by;
            $log->forward_date = date('d-m-Y');
            $log->office_level = 4;

            $log->save();
        }

        $AgriSurNotis = GenerateSurveyNotification::where('survey_notification_id', $survey_notification_id)->get();

        foreach($AgriSurNotis as $AgriSurNoti)
        {
            $AgriSurNoti->status = 0;
            $AgriSurNoti->save();
        }

        return redirect()->route('admin.cropCuttingProductionForm.index')->with('success', 'Form Forwarded Successfully!!!');

    }
}

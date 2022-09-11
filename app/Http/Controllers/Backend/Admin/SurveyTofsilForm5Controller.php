<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;
use Auth;

/* included models */
use App\Models\Union;
use App\Models\Cluster;
use App\Models\Crop;
use App\Models\SurveyProcessList;
use App\Models\SurveyNotification;
use App\Models\SurveyTofsilForm1;
use App\Models\SurveyTofsilForm5;
use App\Models\SurveyCompilationCollectForm1;
use App\Models\SurveyProcessForwardingLog;
use App\Models\GenerateSurveyNotification;
use App\Models\SurveyTofsilForm5AllFarmer;

class SurveyTofsilForm5Controller extends Controller
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
            
            menuSubmenu('farmersData', 'potatoCropCuttingData');

            $potatoCropCuttingsData = SurveyTofsilForm5::with('division', 'district', 'upazila', 'union', 'mouza', 'cluster', 'farmer')->where('created_by', $user->id)->where('status', false)->latest()->paginate(15);
            
            return view('backend.admin.surveyForms.potatoCropCuttingForm.index', compact('potatoCropCuttingsData'));

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
            if(Gate::allows('potato_crop_cutting_production', $user))
            {
                // get last value from url
                $url = $request->url();
                $url = basename($url);
                $number = is_numeric($url);

                menuSubmenu('surveyForms', 'potatoCropCutting');

                $processListId = $request->surveyProListId;
               
                if(empty($processListId))
                {
                    $processList = SurveyProcessList::with('cluster', 'union', 'mouza')->where('status', 1)->where('survey_form_id', 7)->where('survey_by', $user->id)->get();

                    $crops = Crop::where('status', 1)->get();
                    
                    if($processList->count() > 0)
                    {    
                        return view('backend.admin.surveyForms.potatoCropCuttingForm.surveyProcessList', [
                            'processLists' => $processList
                        ]);
                    }
                    else
                    {
                        return view('backend.admin.surveyForms.potatoCropCuttingForm.create', compact('crops', 'number'));
                    }

                }else{
                    
                    $processList = SurveyProcessList::with('mouza')->where('id', $processListId)->first();

                    $unions = Union::where('upazila_id', $user->upazila_id)
                                    ->where('status', 1)
                                    ->get();

                    $clusters = Cluster::where('status', 1)->get();

                    $crops = Crop::where('status', 1)->get();
                    
                    $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 2)->first();

                    $surveyNotification = SurveyNotification::where('id', $processList->survey_notification_id)->first();

                    $farmers = SurveyTofsilForm1::where('bunch_stains_id', $processList->bunch_stains_id)
                                                        ->where('status', 1)
                                                        ->get();
                    // dd(1);
                    return view('backend.admin.surveyForms.potatoCropCuttingForm.create', compact('processListId', 'processList', 'unions', 'crops', 'clusters', 'surveyNotification', 'surveyList', 'farmers', 'number'));
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

        $potatoCropCuttingForm = new SurveyTofsilForm5;

        $potatoCropCuttingForm->survey_process_list_id          = $request->survey_process_list_id;
        $potatoCropCuttingForm->survey_notification_id          = $request->survey_notification_id;
        $potatoCropCuttingForm->division_id                     = $request->division_id;
        $potatoCropCuttingForm->district_id                     = $request->district_id;
        $potatoCropCuttingForm->upazila_id                      = $request->upazila_id;
        $potatoCropCuttingForm->cluster_id                      = $request->cluster_id;
        $potatoCropCuttingForm->union_id                        = $request->union_id;
        $potatoCropCuttingForm->mouza_id                        = $request->mouza_id;
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
        $potatoCropCuttingForm->random_number_row_cut           = $request->random_number_row_cut;
        $potatoCropCuttingForm->size_of_cut_row_squre_feet      = $request->size_of_cut_row_squre_feet;
        $potatoCropCuttingForm->size_of_cut_row_acre            = $request->size_of_cut_row_acre;
        $potatoCropCuttingForm->amount_of_cut_potato_kg         = $request->amount_of_cut_potato_kg;
        $potatoCropCuttingForm->production_per_acre             = $request->production_per_acre;
        $potatoCropCuttingForm->production_cost_per_acre        = $request->production_cost_per_acre;
        $potatoCropCuttingForm->created_by                      = Auth::user()->id;

        $done = $potatoCropCuttingForm->save();

        $farmer_int_id                      = $request->farmer_int_id;
        $farmers_father_name                = $request->farmers_father_name;
        $last_year_land_amount              = $request->last_year_land_amount;
        $last_year_potato_producttion       = $request->last_year_potato_producttion;
        $current_year_land_amount           = $request->current_year_land_amount;
        $current_year_potato_producttion    = $request->current_year_potato_producttion;
        $average_yield_per_acre             = $request->average_yield_per_acre;

        $results = [];

        foreach ($farmer_int_id as $index => $unit) {

            $results[] = [
                    "survey_process_list_id"            => $request->survey_process_list_id,
                    "survey_tofsil_form5_id"            => $potatoCropCuttingForm->id,
                    "farmer_id"                         => $farmer_int_id[$index],
                    "farmers_father_name"               => $farmers_father_name[$index],
                    "last_year_land_amount"             => $last_year_land_amount[$index],
                    "last_year_potato_producttion"      => $last_year_potato_producttion[$index],
                    "current_year_land_amount"          => $current_year_land_amount[$index],
                    "current_year_potato_producttion"   => $current_year_potato_producttion[$index],
                    "average_yield_per_acre"            => $average_yield_per_acre[$index],
                    "created_by"                        => Auth::user()->id,
                    "created_at"                        => now(),
                ];
            
        }

        SurveyTofsilForm5AllFarmer::insert($results);

        if($done)
        {
            return redirect()->route('admin.potatoCropCutting.create')->with('success', 'Form submitted successfully.');
        } else {
            return redirect()->route('admin.potatoCropCutting.create')->with('error', 'Something went wrong, Try again later...!');
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
        $potatoData = SurveyTofsilForm5::where('id', $id)->first();

        $user = Auth::user();

        $processList = SurveyProcessList::with('mouza')->where('id',$potatoData->survey_process_list_id)->first();
        
        $unions = Union::where('upazila_id', $user->upazila_id)
                        ->where('status', 1)
                        ->get();

        $clusters = Cluster::where('status', 1)->get();

        $crops = Crop::where('status', 1)->get();
        
        $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 2)->first();


        
        $processListId = null;   
        $farmerInterviews = SurveyTofsilForm5AllFarmer::where('survey_tofsil_form5_id',$potatoData->id)->where('survey_process_list_id',$processList->id)->get();   
        
        return view('backend.admin.surveyForms.potatoCropCuttingForm.show',compact('processListId', 'processList', 'unions', 'crops', 'clusters', 'surveyList','potatoData','farmerInterviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SurveyTofsilForm5 $potatoData, Request $request)
    {
        $user = Auth::user();
        $url = $request->url();
        $url = basename($url);
        $number = is_numeric($url);

        $processList = SurveyProcessList::with('mouza')->where('id',$potatoData->survey_process_list_id)->first();
        
        $unions = Union::where('upazila_id', $user->upazila_id)
                        ->where('status', 1)
                        ->get();

        $clusters = Cluster::where('status', 1)->get();

        $crops = Crop::where('status', 1)->get();
        
        $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 2)->first();

        $surveyNotification = SurveyNotification::where('id', $processList->survey_notification_id)->first();

        $farmers = SurveyTofsilForm1::where('bunch_stains_id', $processList->bunch_stains_id)
                                            ->where('status', 1)
                                            ->get();
        $processListId = null;   
        $farmerInterviews = SurveyTofsilForm5AllFarmer::where('survey_tofsil_form5_id',$potatoData->id)->where('survey_process_list_id',$processList->id)->get();   
        
        return view('backend.admin.surveyForms.potatoCropCuttingForm.edit',compact('processListId', 'processList', 'unions', 'crops', 'clusters', 'surveyNotification', 'surveyList', 'farmers', 'number','potatoData','farmerInterviews'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SurveyTofsilForm5 $potatoCropCuttingForm)
    {

        $potatoCropCuttingForm->farmer_id                       = $request->farmer_id ? $request->farmer_id : $potatoCropCuttingForm->farmer_id;

        $potatoCropCuttingForm->crop_cutting_date               = $request->crop_cutting_date ? $request->crop_cutting_date : $potatoCropCuttingForm->crop_cutting_date;

        $potatoCropCuttingForm->land_segment_signal             = $request->land_segment_signal ? $request->land_segment_signal : $potatoCropCuttingForm->land_segment_signal;

        $potatoCropCuttingForm->in_cluster                      = $request->in_cluster ? $request->in_cluster : $potatoCropCuttingForm->in_cluster;

        $potatoCropCuttingForm->potato_varieties                = $request->potato_varieties ? $request->potato_varieties : $potatoCropCuttingForm->potato_varieties ;

        $potatoCropCuttingForm->land_amount_of_plot             = $request->land_amount_of_plot ? $request->land_amount_of_plot : $potatoCropCuttingForm->land_amount_of_plot ;
        $potatoCropCuttingForm->number_of_row                   = $request->number_of_row ? $request->number_of_row : $potatoCropCuttingForm->number_of_row;
        $potatoCropCuttingForm->location_of_sample_row_1        = $request->location_of_sample_row_1 ? $request->location_of_sample_row_1 : $potatoCropCuttingForm->location_of_sample_row_1;
        $potatoCropCuttingForm->location_of_sample_row_2        = $request->location_of_sample_row_2 ? $request->location_of_sample_row_2 : $potatoCropCuttingForm->location_of_sample_row_2 ;

        $potatoCropCuttingForm->row_length_feet_1               = $request->row_length_feet_1 ? $request->row_length_feet_1 :  $potatoCropCuttingForm->row_length_feet_1;

        $potatoCropCuttingForm->row_length_feet_2               = $request->row_length_feet_2 ? $request->row_length_feet_2 : $potatoCropCuttingForm->row_length_feet_2 ;

        $potatoCropCuttingForm->row_average_width_feet_1        = $request->row_average_width_feet_1 ? $request->row_average_width_feet_1 : $potatoCropCuttingForm->row_average_width_feet_1;

        $potatoCropCuttingForm->row_average_width_feet_2        = $request->row_average_width_feet_2 ? $request->row_average_width_feet_2 : $potatoCropCuttingForm->row_average_width_feet_2;

        $potatoCropCuttingForm->random_land_amount_of_plot      = $request->random_land_amount_of_plot ? $request->random_land_amount_of_plot : $potatoCropCuttingForm->random_land_amount_of_plot;

        $potatoCropCuttingForm->random_number_of_row            = $request->random_number_of_row ? $request->random_number_of_row : $potatoCropCuttingForm->random_number_of_row;

        $potatoCropCuttingForm->random_location_east_to_west    = $request->random_location_east_to_west ? $request->random_location_east_to_west : $potatoCropCuttingForm->random_location_east_to_west;

        $potatoCropCuttingForm->random_location_north_to_south  = $request->random_location_north_to_south ? $request->random_location_north_to_south : $potatoCropCuttingForm->random_location_north_to_south;

        $potatoCropCuttingForm->random_row_length_feet          = $request->random_row_length_feet ? $request->random_row_length_feet : $potatoCropCuttingForm->random_row_length_feet;

        $potatoCropCuttingForm->random_row_average_width_feet   = $request->random_row_average_width_feet ? $request->random_row_average_width_feet : $potatoCropCuttingForm->random_row_average_width_feet ;

        $potatoCropCuttingForm->random_number_row_cut           = $request->random_number_row_cut ? $request->random_number_row_cut : $potatoCropCuttingForm->random_number_row_cut;

        $potatoCropCuttingForm->size_of_cut_row_squre_feet      = $request->size_of_cut_row_squre_feet ? $request->size_of_cut_row_squre_feet : $potatoCropCuttingForm->size_of_cut_row_squre_feet;

        $potatoCropCuttingForm->size_of_cut_row_acre            = $request->size_of_cut_row_acre ? $request->size_of_cut_row_acre  : $potatoCropCuttingForm->size_of_cut_row_acre;

        $potatoCropCuttingForm->amount_of_cut_potato_kg         = $request->amount_of_cut_potato_kg ? $request->amount_of_cut_potato_kg : $potatoCropCuttingForm->amount_of_cut_potato_kg;
        $potatoCropCuttingForm->production_per_acre             = $request->production_per_acre ? $request->production_per_acre : $potatoCropCuttingForm->production_per_acre;

        $potatoCropCuttingForm->production_cost_per_acre        = $request->production_cost_per_acre ? $request->production_cost_per_acre : $potatoCropCuttingForm->production_cost_per_acre;
        $potatoCropCuttingForm->updated_by                      = Auth::user()->id;

        $done = $potatoCropCuttingForm->save();


        $farmer_int_id                      = $request->farmer_int_id;
        $farmers_father_name                = $request->farmers_father_name;
        $last_year_land_amount              = $request->last_year_land_amount;
        $last_year_potato_producttion       = $request->last_year_potato_producttion;
        $current_year_land_amount           = $request->current_year_land_amount;
        $current_year_potato_producttion    = $request->current_year_potato_producttion;
        $average_yield_per_acre             = $request->average_yield_per_acre;

        $results = [];

        foreach ($farmer_int_id as $index => $unit) {

            $results[] = [
                    "survey_process_list_id"            => $potatoCropCuttingForm->survey_process_list_id,
                    "survey_tofsil_form5_id"            => $potatoCropCuttingForm->id,
                    "farmer_id"                         => $farmer_int_id[$index],
                    "farmers_father_name"               => $farmers_father_name[$index],
                    "last_year_land_amount"             => $last_year_land_amount[$index],
                    "last_year_potato_producttion"      => $last_year_potato_producttion[$index],
                    "current_year_land_amount"          => $current_year_land_amount[$index],
                    "current_year_potato_producttion"   => $current_year_potato_producttion[$index],
                    "average_yield_per_acre"            => $average_yield_per_acre[$index],
                    "created_by"                        => Auth::user()->id,
                    "created_at"                        => now(),
                ];
            
        }

        SurveyTofsilForm5AllFarmer::insert($results);

        if($done)
        {
            return redirect()->route('admin.potatoCropCutting.create')->with('success', 'Form submitted successfully.');
        } else {
            return redirect()->route('admin.potatoCropCutting.create')->with('error', 'Something went wrong, Try again later...!');
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
        
        $potatoCropCuttingDatas = SurveyTofsilForm5::where('survey_notification_id', $survey_notification_id)->where('created_by', Auth::id())->get();
        
        foreach($potatoCropCuttingDatas as $data){
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

        return redirect()->route('admin.potatoCropCutting.index')->with('success', 'Form Forwarded Successfully!!!');

    }
}

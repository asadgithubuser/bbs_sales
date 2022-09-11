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
use App\Models\SurveyCompilationCollectForm1;
use App\Models\SurveyProcessForwardingLog;
use App\Models\GenerateSurveyNotification;
use App\Models\SurveyTofsilForm1;
use App\Models\SurveyTofsilForm7;
use App\Models\SurveyTofsilForm7FertilizerCost;
use App\Models\SurveyTofsilForm7IrrigationProcess;
use App\Models\SurveyTofsilForm7JomiChasKora;
use App\Models\SurveyTofsilForm7JomirRent;
use App\Models\SurveyTofsilForm7PesticideCost;
use App\Models\SurveyTofsilForm7Seed;
use App\Models\SurveyTofsilForm7TransportCost;
use App\Models\SurveyTofsilForm7WorkerCost;

class SurveyTofsilForm7Controller extends Controller
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
            menuSubmenu('farmersData', 'surveyTofsilForm7Data');

            $surveyTofsilForm7sData = SurveyTofsilForm7::with('division', 'district', 'upazila', 'union', 'mouza', 'crop', 'farmer')->where('created_by', $user->id)->where('status', false)->latest()->paginate(15);
            
            $data = SurveyTofsilForm7::with('division', 'district', 'upazila', 'union', 'mouza', 'crop', 'farmer')->where('created_by', $user->id)->first();
            if($data)
            {
                $list = $data->survey_process_list_id;
            }
            else
            {
                $list =[];
            }
            
            
            return view('backend.admin.surveyForms.surveyTofsilForm7.index', compact('surveyTofsilForm7sData','list'));

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
            if(Gate::allows('survey_tofsil_form7', $user))
            {
                // get last value from url
                $url = $request->url();
                $url = basename($url);
                $number = is_numeric($url);

                menuSubmenu('surveyForms', 'surveyTofsilForm7');

                $processListId = $request->surveyProListId;
               
                if(empty($processListId))
                {
                    $processList = SurveyProcessList::with('cluster', 'union', 'mouza')->where('status', 1)->where('survey_form_id', 12)->where('survey_by', $user->id)->get();

                    $crops = Crop::where('status', 1)->get();
                    
                    if($processList->count() > 0)
                    {    
                        return view('backend.admin.surveyForms.surveyTofsilForm7.surveyProcessList', [
                            'processLists' => $processList
                        ]);
                    }
                    else
                    {
                        return view('backend.admin.surveyForms.surveyTofsilForm7.create', compact('crops', 'number'));
                    }

                }else{
                    
                    $processList = SurveyProcessList::with('mouza')->where('id', $processListId)->first();

                    $unions = Union::where('upazila_id', $user->upazila_id)
                                    ->where('status', 1)
                                    ->get();

                    $clusters = Cluster::where('status', 1)->get();

                    $crops = Crop::where('status', 1)->get();
                    
                    $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 1)->first();

                    $surveyNotification = SurveyNotification::where('id', $processList->survey_notification_id)->first();
                    
                    return view('backend.admin.surveyForms.surveyTofsilForm7.create', compact('processListId', 'processList', 'unions', 'crops', 'clusters', 'surveyNotification', 'surveyList', 'number'));
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
            'farmer_id'                                             => 'required',
            'pot_of_land'                                           => 'required',
            'crop_varieties'                                        => 'required',
            'collection_start_date'                                 => 'required',
            'collection_end_date'                                   => 'required',
            'arable_land'                                           => 'required',
            'total_production'                                      => 'required',
            'crops_total_value_tk'                                  => 'required',
            'sub_varieties_crop_quantity'                           => 'required',
            'sub_varieties_crop_value'                              => 'required',
            'crop_cost_farmer'                                      => 'required',
            'crop_cost_local_market'                                => 'required',
            'crop_cost_millers'                                     => 'required',
            'amount_of_cultivable_land_cluster_or_outside_cluster'  => 'required',
        ]);

        $surveyTofsilForm7 = new SurveyTofsilForm7;

        $surveyTofsilForm7->survey_process_list_id                                  = $request->survey_process_list_id;
        $surveyTofsilForm7->survey_notification_id                                  = $request->survey_notification_id;
        $surveyTofsilForm7->division_id                                             = $request->division_id;
        $surveyTofsilForm7->district_id                                             = $request->district_id;
        $surveyTofsilForm7->upazila_id                                              = $request->upazila_id;
        $surveyTofsilForm7->union_id                                                = $request->union_id;
        $surveyTofsilForm7->mouja_id                                                = $request->mouja_id;
        $surveyTofsilForm7->farmer_id                                               = $request->farmer_id;
        $surveyTofsilForm7->pot_of_land                                             = $request->pot_of_land;
        $surveyTofsilForm7->crops_id                                                = $request->crops_id;
        $surveyTofsilForm7->crop_varieties                                          = $request->crop_varieties;
        $surveyTofsilForm7->collection_start_date                                   = $request->collection_start_date;
        $surveyTofsilForm7->collection_end_date                                     = $request->collection_end_date;
        $surveyTofsilForm7->arable_land                                             = $request->arable_land;
        $surveyTofsilForm7->total_production                                        = $request->total_production;
        $surveyTofsilForm7->crops_total_value_tk                                    = $request->crops_total_value_tk;
        $surveyTofsilForm7->sub_varieties_crop_quantity                             = $request->sub_varieties_crop_quantity;
        $surveyTofsilForm7->sub_varieties_crop_value                                = $request->sub_varieties_crop_value;
        $surveyTofsilForm7->crop_cost_farmer                                        = $request->crop_cost_farmer;
        $surveyTofsilForm7->crop_cost_local_market                                  = $request->crop_cost_local_market;
        $surveyTofsilForm7->crop_cost_millers                                       = $request->crop_cost_millers;
        $surveyTofsilForm7->amount_of_cultivable_land_cluster_or_outside_cluster    = $request->amount_of_cultivable_land_cluster_or_outside_cluster;
        $surveyTofsilForm7->created_by                                              = Auth::user()->id;

        $done = $surveyTofsilForm7->save();

        $surveyTofsilForm7JomirRent = new SurveyTofsilForm7JomirRent;

        $surveyTofsilForm7JomirRent->survey_tofsil_form7s_id                                = $surveyTofsilForm7->id;
        $surveyTofsilForm7JomirRent->amount_of_cultivable_land_cluster_or_outside_cluster   = $request->amount_of_cultivable_land_cluster_or_outside_cluster;
        $surveyTofsilForm7JomirRent->land_type                                              = $request->land_type;
        $surveyTofsilForm7JomirRent->land_rent_amount                                       = $request->land_rent_amount;
        $surveyTofsilForm7JomirRent->approximate_rent_amount                                = $request->approximate_rent_amount;
        $surveyTofsilForm7JomirRent->area_rent_amount_per_year                              = $request->area_rent_amount_per_year;
        $surveyTofsilForm7JomirRent->created_by                                             = Auth::user()->id;

        $surveyTofsilForm7JomirRent->save();

        $surveyTofsilForm7JomiChasKora = new SurveyTofsilForm7JomiChasKora;

        $surveyTofsilForm7JomiChasKora->survey_tofsil_form7s_id        = $surveyTofsilForm7->id;
        $surveyTofsilForm7JomiChasKora->own_korshon_quantity           = $request->own_korshon_quantity;
        $surveyTofsilForm7JomiChasKora->own_korshon_amount             = $request->own_korshon_amount;
        $surveyTofsilForm7JomiChasKora->rent_korshon_quantity          = $request->rent_korshon_quantity;
        $surveyTofsilForm7JomiChasKora->rent_korshon_amount            = $request->rent_korshon_amount;
        $surveyTofsilForm7JomiChasKora->power_tiler_korshon_quantity   = $request->power_tiler_korshon_quantity;
        $surveyTofsilForm7JomiChasKora->power_tiler_korshon_amount     = $request->power_tiler_korshon_amount;
        $surveyTofsilForm7JomiChasKora->sromik_mojuri_quantity         = $request->sromik_mojuri_quantity;
        $surveyTofsilForm7JomiChasKora->sromik_mojuri_amount           = $request->sromik_mojuri_amount;
        $surveyTofsilForm7JomiChasKora->paribarik_sromik_quantity      = $request->paribarik_sromik_quantity;
        $surveyTofsilForm7JomiChasKora->paribarik_sromik_amount        = $request->paribarik_sromik_amount;
        $surveyTofsilForm7JomiChasKora->created_by                     = Auth::user()->id;

        $surveyTofsilForm7JomiChasKora->save();

        $surveyTofsilForm7Seed = new SurveyTofsilForm7Seed; //4

        $surveyTofsilForm7Seed->survey_tofsil_form7s_id     = $surveyTofsilForm7->id;
        $surveyTofsilForm7Seed->seeds_own_source            = $request->seeds_own_source;
        $surveyTofsilForm7Seed->seeds_sellable_source       = $request->seeds_sellable_source;
        $surveyTofsilForm7Seed->seeds_incentive_source      = $request->seeds_incentive_source;
        $surveyTofsilForm7Seed->seeds_donated_source        = $request->seeds_donated_source;
        $surveyTofsilForm7Seed->seed_quantity               = $request->seed_quantity;
        $surveyTofsilForm7Seed->seed_value                  = $request->seed_value;
        $surveyTofsilForm7Seed->seedlings_sellable_source   = $request->seedlings_sellable_source;
        $surveyTofsilForm7Seed->seedlings_incentive_source  = $request->seedlings_incentive_source;
        $surveyTofsilForm7Seed->seedlings_donated_source    = $request->seedlings_donated_source;
        $surveyTofsilForm7Seed->seedling_quantity           = $request->seedling_quantity;
        $surveyTofsilForm7Seed->seedlings_value             = $request->seedlings_value;
        $surveyTofsilForm7Seed->when_own_seed_quantity      = $request->when_own_seed_quantity;
        $surveyTofsilForm7Seed->when_own_seed_value         = $request->when_own_seed_value;
        $surveyTofsilForm7Seed->created_by                  = Auth::user()->id;

        $surveyTofsilForm7Seed->save();

        $surveyTofsilForm7FertilizerCost = new SurveyTofsilForm7FertilizerCost; //5

        $surveyTofsilForm7FertilizerCost->survey_tofsil_form7s_id     = $surveyTofsilForm7->id;
        $surveyTofsilForm7FertilizerCost->uriya_quantity              = $request->uriya_quantity;
        $surveyTofsilForm7FertilizerCost->uriya_cost                  = $request->uriya_cost;
        $surveyTofsilForm7FertilizerCost->tsp_quantity                = $request->tsp_quantity;
        $surveyTofsilForm7FertilizerCost->tsp_cost                    = $request->tsp_cost;
        $surveyTofsilForm7FertilizerCost->mop_quantity                = $request->mop_quantity;
        $surveyTofsilForm7FertilizerCost->mop_cost                    = $request->mop_cost;
        $surveyTofsilForm7FertilizerCost->dap_quantity                = $request->dap_quantity;
        $surveyTofsilForm7FertilizerCost->dap_cost                    = $request->dap_cost;
        $surveyTofsilForm7FertilizerCost->gypsum_quantity             = $request->gypsum_quantity;
        $surveyTofsilForm7FertilizerCost->gypsum_cost                 = $request->gypsum_cost;
        $surveyTofsilForm7FertilizerCost->nixar_quantity              = $request->nixar_quantity;
        $surveyTofsilForm7FertilizerCost->nixar_cost                  = $request->nixar_cost;
        $surveyTofsilForm7FertilizerCost->other_inorganic_quantity    = $request->other_inorganic_quantity;
        $surveyTofsilForm7FertilizerCost->other_inorganic_cost        = $request->other_inorganic_cost;
        $surveyTofsilForm7FertilizerCost->gobor_quantity              = $request->gobor_quantity;
        $surveyTofsilForm7FertilizerCost->gobor_cost                  = $request->gobor_cost;
        $surveyTofsilForm7FertilizerCost->ash_quantity                = $request->ash_quantity;
        $surveyTofsilForm7FertilizerCost->ash_cost                    = $request->ash_cost;
        $surveyTofsilForm7FertilizerCost->green_quantity              = $request->green_quantity;
        $surveyTofsilForm7FertilizerCost->green_cost                  = $request->green_cost;
        $surveyTofsilForm7FertilizerCost->other_organic_quantity      = $request->other_organic_quantity;
        $surveyTofsilForm7FertilizerCost->other_organic_cost          = $request->other_organic_cost;
        $surveyTofsilForm7FertilizerCost->created_by                  = Auth::user()->id;

        $surveyTofsilForm7FertilizerCost->save();

        $surveyTofsilForm7IrrigationProcess = new SurveyTofsilForm7IrrigationProcess; //6

        $surveyTofsilForm7IrrigationProcess->survey_tofsil_form7s_id = $surveyTofsilForm7->id;
        $surveyTofsilForm7IrrigationProcess->tubewell_cost           = $request->tubewell_cost;
        $surveyTofsilForm7IrrigationProcess->chapcol_worker_list     = $request->chapcol_worker_list;
        $surveyTofsilForm7IrrigationProcess->chapcol_cost            = $request->chapcol_cost;
        $surveyTofsilForm7IrrigationProcess->jalani_cost             = $request->jalani_cost;
        $surveyTofsilForm7IrrigationProcess->created_by              = Auth::user()->id;

        $surveyTofsilForm7IrrigationProcess->save();

        $surveyTofsilForm7WorkerCost = new SurveyTofsilForm7WorkerCost; //7

        $surveyTofsilForm7WorkerCost->survey_tofsil_form7s_id        = $surveyTofsilForm7->id;
        $surveyTofsilForm7WorkerCost->seedling_family_worker_no      = $request->seedling_family_worker_no;
        $surveyTofsilForm7WorkerCost->seedling_hired_worker_no       = $request->seedling_hired_worker_no;
        $surveyTofsilForm7WorkerCost->seedling_total_worker_cost     = $request->seedling_total_worker_cost;
        $surveyTofsilForm7WorkerCost->nirani_family_worker_no        = $request->nirani_family_worker_no;
        $surveyTofsilForm7WorkerCost->nirani_hired_worker_no         = $request->nirani_hired_worker_no;
        $surveyTofsilForm7WorkerCost->nirani_total_worker_cost       = $request->nirani_total_worker_cost;
        $surveyTofsilForm7WorkerCost->crop_cutting_family_worker_no  = $request->crop_cutting_family_worker_no;
        $surveyTofsilForm7WorkerCost->crop_cutting_hired_worker_no   = $request->crop_cutting_hired_worker_no;
        $surveyTofsilForm7WorkerCost->crop_cutting_total_worker_cost = $request->crop_cutting_total_worker_cost;
        $surveyTofsilForm7WorkerCost->crop_marai_family_worker_no    = $request->crop_marai_family_worker_no;
        $surveyTofsilForm7WorkerCost->crop_marai_hired_worker_no     = $request->crop_marai_hired_worker_no;
        $surveyTofsilForm7WorkerCost->crop_marai_total_worker_cost   = $request->crop_marai_total_worker_cost;
        $surveyTofsilForm7WorkerCost->jute_family_worker_no          = $request->jute_family_worker_no;
        $surveyTofsilForm7WorkerCost->jute_hired_worker_no           = $request->jute_hired_worker_no;
        $surveyTofsilForm7WorkerCost->jute_total_worker_cost         = $request->jute_total_worker_cost;
        $surveyTofsilForm7WorkerCost->other_family_worker_no         = $request->other_family_worker_no;
        $surveyTofsilForm7WorkerCost->other_hired_worker_no          = $request->other_hired_worker_no;
        $surveyTofsilForm7WorkerCost->other_total_worker_cost        = $request->other_total_worker_cost;
        $surveyTofsilForm7WorkerCost->created_by                     = Auth::user()->id;

        $surveyTofsilForm7WorkerCost->save();

        $surveyTofsilForm7PesticideCost = new SurveyTofsilForm7PesticideCost; //8

        $surveyTofsilForm7PesticideCost->survey_tofsil_form7s_id    = $surveyTofsilForm7->id;
        $surveyTofsilForm7PesticideCost->sumithion_quantity         = $request->sumithion_quantity;
        $surveyTofsilForm7PesticideCost->sumithion_cost             = $request->sumithion_cost;
        $surveyTofsilForm7PesticideCost->malathion_quantity         = $request->malathion_quantity;
        $surveyTofsilForm7PesticideCost->malathion_cost             = $request->malathion_cost;
        $surveyTofsilForm7PesticideCost->basudin_quantity           = $request->basudin_quantity;
        $surveyTofsilForm7PesticideCost->basudin_cost               = $request->basudin_cost;
        $surveyTofsilForm7PesticideCost->furadon_quantity           = $request->furadon_quantity;
        $surveyTofsilForm7PesticideCost->furadon_cost               = $request->furadon_cost;
        $surveyTofsilForm7PesticideCost->furanol_quantity           = $request->furanol_quantity;
        $surveyTofsilForm7PesticideCost->furanol_cost               = $request->furanol_cost;
        $surveyTofsilForm7PesticideCost->other_quantity             = $request->other_quantity;
        $surveyTofsilForm7PesticideCost->other_cost                 = $request->other_cost;
        $surveyTofsilForm7PesticideCost->created_by                 = Auth::user()->id;

        $surveyTofsilForm7PesticideCost->save();

        $surveyTofsilForm7TransportCost = new SurveyTofsilForm7TransportCost; //9

        $surveyTofsilForm7TransportCost->survey_tofsil_form7s_id    = $surveyTofsilForm7->id;
        $surveyTofsilForm7TransportCost->land_things_transport_cost = $request->land_things_transport_cost;
        $surveyTofsilForm7TransportCost->seed_transport_cost        = $request->seed_transport_cost;
        $surveyTofsilForm7TransportCost->fertilizer_transport_cost  = $request->fertilizer_transport_cost;
        $surveyTofsilForm7TransportCost->irrigation_transport_cost  = $request->irrigation_transport_cost;
        $surveyTofsilForm7TransportCost->pesticide_transport_cost   = $request->pesticide_transport_cost;
        $surveyTofsilForm7TransportCost->other_transport_cost       = $request->other_transport_cost;
        $surveyTofsilForm7TransportCost->created_by                 = Auth::user()->id;

        $surveyTofsilForm7TransportCost->save();

        if($done)
        {
            return redirect()->route('admin.surveyTofsilForm7.create')->with('success', 'Form submitted successfully.');
        } else {
            return redirect()->route('admin.surveyTofsilForm7.create')->with('error', 'Something went wrong, Try again later...!');
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

        $surveyTofsilForm7Data = SurveyTofsilForm7::where('id', $id)->first();

        $processList = SurveyProcessList::with('mouza')->where('id', $surveyTofsilForm7Data->survey_process_list_id)->first();
        
        
        $surveyJomirRent = SurveyTofsilForm7JomirRent::where('survey_tofsil_form7s_id',$surveyTofsilForm7Data->id)->first();

        $surveyJomiChasKora = SurveyTofsilForm7JomiChasKora::where('survey_tofsil_form7s_id',$surveyTofsilForm7Data->id)->first();

        $surveySeed = SurveyTofsilForm7Seed::where('survey_tofsil_form7s_id',$surveyTofsilForm7Data->id)->first();

        $surveyFertilizerCost = SurveyTofsilForm7FertilizerCost::where('survey_tofsil_form7s_id',$surveyTofsilForm7Data->id)->first();

        $surveyIrrigationProcess = SurveyTofsilForm7IrrigationProcess::where('survey_tofsil_form7s_id',$surveyTofsilForm7Data->id)->first();

        $surveyWorkerCost = SurveyTofsilForm7WorkerCost::where('survey_tofsil_form7s_id',$surveyTofsilForm7Data->id)->first();

        $surveyPesticideCost = SurveyTofsilForm7PesticideCost::where('survey_tofsil_form7s_id',$surveyTofsilForm7Data->id)->first();

        $surveyTransportCost = SurveyTofsilForm7TransportCost::where('survey_tofsil_form7s_id',$surveyTofsilForm7Data->id)->first();
        
        $unions = Union::where('upazila_id', $user->upazila_id)->where('status', 1)->get();

        $clusters = Cluster::where('status', 1)->get();

        $crops = Crop::where('status', 1)->get();
        
        $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 1)->first();

        $surveyNotification = SurveyNotification::where('id', $surveyTofsilForm7Data->survey_notification_id)->first();
        $processListId = null;

        return view('backend.admin.surveyForms.surveyTofsilForm7.show', compact('surveyTofsilForm7Data','surveyJomirRent','surveyJomiChasKora','surveySeed','surveyFertilizerCost','surveyIrrigationProcess','surveyWorkerCost','surveyPesticideCost','surveyTransportCost','processListId', 'processList', 'unions', 'crops', 'clusters', 'surveyNotification', 'surveyList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SurveyTofsilForm7 $surveyTofsilForm7Data, Request $request)
    {
        
        $user = Auth::user();
        // get last value from url
        $url = $request->url();
        $url = basename($url);
        $number = is_numeric($url);

        $processList = SurveyProcessList::with('mouza')->where('id', $surveyTofsilForm7Data->survey_process_list_id)->first();
        
        
        $surveyJomirRent = SurveyTofsilForm7JomirRent::where('survey_tofsil_form7s_id',$surveyTofsilForm7Data->id)->first();

        $surveyJomiChasKora = SurveyTofsilForm7JomiChasKora::where('survey_tofsil_form7s_id',$surveyTofsilForm7Data->id)->first();

        $surveySeed = SurveyTofsilForm7Seed::where('survey_tofsil_form7s_id',$surveyTofsilForm7Data->id)->first();

        $surveyFertilizerCost = SurveyTofsilForm7FertilizerCost::where('survey_tofsil_form7s_id',$surveyTofsilForm7Data->id)->first();

        $surveyIrrigationProcess = SurveyTofsilForm7IrrigationProcess::where('survey_tofsil_form7s_id',$surveyTofsilForm7Data->id)->first();

        $surveyWorkerCost = SurveyTofsilForm7WorkerCost::where('survey_tofsil_form7s_id',$surveyTofsilForm7Data->id)->first();

        $surveyPesticideCost = SurveyTofsilForm7PesticideCost::where('survey_tofsil_form7s_id',$surveyTofsilForm7Data->id)->first();

        $surveyTransportCost = SurveyTofsilForm7TransportCost::where('survey_tofsil_form7s_id',$surveyTofsilForm7Data->id)->first();
        
        $unions = Union::where('upazila_id', $user->upazila_id)->where('status', 1)->get();

        $clusters = Cluster::where('status', 1)->get();

        $crops = Crop::where('status', 1)->get();
        
        $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 1)->first();

        $surveyNotification = SurveyNotification::where('id', $surveyTofsilForm7Data->survey_notification_id)->first();
        $processListId = null;

        return view('backend.admin.surveyForms.surveyTofsilForm7.edit', compact('surveyTofsilForm7Data','surveyJomirRent','surveyJomiChasKora','surveySeed','surveyFertilizerCost','surveyIrrigationProcess','surveyWorkerCost','surveyPesticideCost','surveyTransportCost','processListId', 'processList', 'unions', 'crops', 'clusters', 'surveyNotification', 'surveyList', 'number'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SurveyTofsilForm7 $surveyTofsilForm7)
    {
        
        $surveyTofsilForm7->survey_process_list_id                                  = $request->survey_process_list_id;
        $surveyTofsilForm7->survey_notification_id                                  = $request->survey_notification_id;
        // $surveyTofsilForm7->division_id                                             = $request->division_id;
        // $surveyTofsilForm7->district_id                                             = $request->district_id;
        // $surveyTofsilForm7->upazila_id                                              = $request->upazila_id;
        // $surveyTofsilForm7->union_id                                                = $request->union_id;
        // $surveyTofsilForm7->mouja_id                                                = $request->mouja_id;
        $surveyTofsilForm7->farmer_id                                               = $request->farmer_id;
        $surveyTofsilForm7->pot_of_land                                             = $request->pot_of_land;
        $surveyTofsilForm7->crops_id                                                = $request->crops_id;
        $surveyTofsilForm7->crop_varieties                                          = $request->crop_varieties;
        $surveyTofsilForm7->collection_start_date                                   = $request->collection_start_date;
        $surveyTofsilForm7->collection_end_date                                     = $request->collection_end_date;
        $surveyTofsilForm7->arable_land                                             = $request->arable_land;
        $surveyTofsilForm7->total_production                                        = $request->total_production;
        $surveyTofsilForm7->crops_total_value_tk                                    = $request->crops_total_value_tk;
        $surveyTofsilForm7->sub_varieties_crop_quantity                             = $request->sub_varieties_crop_quantity;
        $surveyTofsilForm7->sub_varieties_crop_value                                = $request->sub_varieties_crop_value;
        $surveyTofsilForm7->crop_cost_farmer                                        = $request->crop_cost_farmer;
        $surveyTofsilForm7->crop_cost_local_market                                  = $request->crop_cost_local_market;
        $surveyTofsilForm7->crop_cost_millers                                       = $request->crop_cost_millers;
        $surveyTofsilForm7->amount_of_cultivable_land_cluster_or_outside_cluster    = $request->amount_of_cultivable_land_cluster_or_outside_cluster;
        $surveyTofsilForm7->updated_by                                              = Auth::user()->id;

        $done = $surveyTofsilForm7->save();

        $surveyTofsilForm7JomirRent = SurveyTofsilForm7JomirRent::where('survey_tofsil_form7s_id',$surveyTofsilForm7->id)->first();

        $surveyTofsilForm7JomirRent->amount_of_cultivable_land_cluster_or_outside_cluster   = $request->amount_of_cultivable_land_cluster_or_outside_cluster;
        $surveyTofsilForm7JomirRent->land_type                                              = $request->land_type;
        $surveyTofsilForm7JomirRent->land_rent_amount                                       = $request->land_rent_amount;
        $surveyTofsilForm7JomirRent->approximate_rent_amount                                = $request->approximate_rent_amount;
        $surveyTofsilForm7JomirRent->area_rent_amount_per_year                              = $request->area_rent_amount_per_year;
        $surveyTofsilForm7JomirRent->updated_by                                             = Auth::user()->id;

        $surveyTofsilForm7JomirRent->save();


        $surveyTofsilForm7JomiChasKora = SurveyTofsilForm7JomiChasKora::where('survey_tofsil_form7s_id',$surveyTofsilForm7->id)->first();

        $surveyTofsilForm7JomiChasKora->own_korshon_quantity           = $request->own_korshon_quantity;
        $surveyTofsilForm7JomiChasKora->own_korshon_amount             = $request->own_korshon_amount;
        $surveyTofsilForm7JomiChasKora->rent_korshon_quantity          = $request->rent_korshon_quantity;
        $surveyTofsilForm7JomiChasKora->rent_korshon_amount            = $request->rent_korshon_amount;
        $surveyTofsilForm7JomiChasKora->power_tiler_korshon_quantity   = $request->power_tiler_korshon_quantity;
        $surveyTofsilForm7JomiChasKora->power_tiler_korshon_amount     = $request->power_tiler_korshon_amount;
        $surveyTofsilForm7JomiChasKora->sromik_mojuri_quantity         = $request->sromik_mojuri_quantity;
        $surveyTofsilForm7JomiChasKora->sromik_mojuri_amount           = $request->sromik_mojuri_amount;
        $surveyTofsilForm7JomiChasKora->paribarik_sromik_quantity      = $request->paribarik_sromik_quantity;
        $surveyTofsilForm7JomiChasKora->paribarik_sromik_amount        = $request->paribarik_sromik_amount;
        $surveyTofsilForm7JomiChasKora->created_by                     = Auth::user()->id;

        $surveyTofsilForm7JomiChasKora->save();



        $surveyTofsilForm7Seed =  SurveyTofsilForm7Seed::where('survey_tofsil_form7s_id',$surveyTofsilForm7->id)->first();

        
        $surveyTofsilForm7Seed->seeds_own_source            = $request->seeds_own_source;
        $surveyTofsilForm7Seed->seeds_sellable_source       = $request->seeds_sellable_source;
        $surveyTofsilForm7Seed->seeds_incentive_source      = $request->seeds_incentive_source;
        $surveyTofsilForm7Seed->seeds_donated_source        = $request->seeds_donated_source;
        $surveyTofsilForm7Seed->seed_quantity               = $request->seed_quantity;
        $surveyTofsilForm7Seed->seed_value                  = $request->seed_value;
        $surveyTofsilForm7Seed->seedlings_sellable_source   = $request->seedlings_sellable_source;
        $surveyTofsilForm7Seed->seedlings_incentive_source  = $request->seedlings_incentive_source;
        $surveyTofsilForm7Seed->seedlings_donated_source    = $request->seedlings_donated_source;
        $surveyTofsilForm7Seed->seedling_quantity           = $request->seedling_quantity;
        $surveyTofsilForm7Seed->seedlings_value             = $request->seedlings_value;
        $surveyTofsilForm7Seed->when_own_seed_quantity      = $request->when_own_seed_quantity;
        $surveyTofsilForm7Seed->when_own_seed_value         = $request->when_own_seed_value;
        $surveyTofsilForm7Seed->created_by                  = Auth::user()->id;

        $surveyTofsilForm7Seed->save();

        $surveyTofsilForm7FertilizerCost = SurveyTofsilForm7FertilizerCost::where('survey_tofsil_form7s_id',$surveyTofsilForm7->id)->first();

        $surveyTofsilForm7FertilizerCost->survey_tofsil_form7s_id     = $surveyTofsilForm7->id;
        $surveyTofsilForm7FertilizerCost->uriya_quantity              = $request->uriya_quantity;
        $surveyTofsilForm7FertilizerCost->uriya_cost                  = $request->uriya_cost;
        $surveyTofsilForm7FertilizerCost->tsp_quantity                = $request->tsp_quantity;
        $surveyTofsilForm7FertilizerCost->tsp_cost                    = $request->tsp_cost;
        $surveyTofsilForm7FertilizerCost->mop_quantity                = $request->mop_quantity;
        $surveyTofsilForm7FertilizerCost->mop_cost                    = $request->mop_cost;
        $surveyTofsilForm7FertilizerCost->dap_quantity                = $request->dap_quantity;
        $surveyTofsilForm7FertilizerCost->dap_cost                    = $request->dap_cost;
        $surveyTofsilForm7FertilizerCost->gypsum_quantity             = $request->gypsum_quantity;
        $surveyTofsilForm7FertilizerCost->gypsum_cost                 = $request->gypsum_cost;
        $surveyTofsilForm7FertilizerCost->nixar_quantity              = $request->nixar_quantity;
        $surveyTofsilForm7FertilizerCost->nixar_cost                  = $request->nixar_cost;
        $surveyTofsilForm7FertilizerCost->other_inorganic_quantity    = $request->other_inorganic_quantity;
        $surveyTofsilForm7FertilizerCost->other_inorganic_cost        = $request->other_inorganic_cost;
        $surveyTofsilForm7FertilizerCost->gobor_quantity              = $request->gobor_quantity;
        $surveyTofsilForm7FertilizerCost->gobor_cost                  = $request->gobor_cost;
        $surveyTofsilForm7FertilizerCost->ash_quantity                = $request->ash_quantity;
        $surveyTofsilForm7FertilizerCost->ash_cost                    = $request->ash_cost;
        $surveyTofsilForm7FertilizerCost->green_quantity              = $request->green_quantity;
        $surveyTofsilForm7FertilizerCost->green_cost                  = $request->green_cost;
        $surveyTofsilForm7FertilizerCost->other_organic_quantity      = $request->other_organic_quantity;
        $surveyTofsilForm7FertilizerCost->other_organic_cost          = $request->other_organic_cost;
        $surveyTofsilForm7FertilizerCost->created_by                  = Auth::user()->id;

        $surveyTofsilForm7FertilizerCost->save();

        $surveyTofsilForm7IrrigationProcess = SurveyTofsilForm7IrrigationProcess::where('survey_tofsil_form7s_id',$surveyTofsilForm7->id)->first();

        $surveyTofsilForm7IrrigationProcess->survey_tofsil_form7s_id = $surveyTofsilForm7->id;
        $surveyTofsilForm7IrrigationProcess->tubewell_cost           = $request->tubewell_cost;
        $surveyTofsilForm7IrrigationProcess->chapcol_worker_list     = $request->chapcol_worker_list;
        $surveyTofsilForm7IrrigationProcess->chapcol_cost            = $request->chapcol_cost;
        $surveyTofsilForm7IrrigationProcess->jalani_cost             = $request->jalani_cost;
        $surveyTofsilForm7IrrigationProcess->created_by              = Auth::user()->id;

        $surveyTofsilForm7IrrigationProcess->save();

        $surveyTofsilForm7WorkerCost =  SurveyTofsilForm7WorkerCost::where('survey_tofsil_form7s_id',$surveyTofsilForm7->id)->first();

        $surveyTofsilForm7WorkerCost->survey_tofsil_form7s_id        = $surveyTofsilForm7->id;
        $surveyTofsilForm7WorkerCost->seedling_family_worker_no      = $request->seedling_family_worker_no;
        $surveyTofsilForm7WorkerCost->seedling_hired_worker_no       = $request->seedling_hired_worker_no;
        $surveyTofsilForm7WorkerCost->seedling_total_worker_cost     = $request->seedling_total_worker_cost;
        $surveyTofsilForm7WorkerCost->nirani_family_worker_no        = $request->nirani_family_worker_no;
        $surveyTofsilForm7WorkerCost->nirani_hired_worker_no         = $request->nirani_hired_worker_no;
        $surveyTofsilForm7WorkerCost->nirani_total_worker_cost       = $request->nirani_total_worker_cost;
        $surveyTofsilForm7WorkerCost->crop_cutting_family_worker_no  = $request->crop_cutting_family_worker_no;
        $surveyTofsilForm7WorkerCost->crop_cutting_hired_worker_no   = $request->crop_cutting_hired_worker_no;
        $surveyTofsilForm7WorkerCost->crop_cutting_total_worker_cost = $request->crop_cutting_total_worker_cost;
        $surveyTofsilForm7WorkerCost->crop_marai_family_worker_no    = $request->crop_marai_family_worker_no;
        $surveyTofsilForm7WorkerCost->crop_marai_hired_worker_no     = $request->crop_marai_hired_worker_no;
        $surveyTofsilForm7WorkerCost->crop_marai_total_worker_cost   = $request->crop_marai_total_worker_cost;
        $surveyTofsilForm7WorkerCost->jute_family_worker_no          = $request->jute_family_worker_no;
        $surveyTofsilForm7WorkerCost->jute_hired_worker_no           = $request->jute_hired_worker_no;
        $surveyTofsilForm7WorkerCost->jute_total_worker_cost         = $request->jute_total_worker_cost;
        $surveyTofsilForm7WorkerCost->other_family_worker_no         = $request->other_family_worker_no;
        $surveyTofsilForm7WorkerCost->other_hired_worker_no          = $request->other_hired_worker_no;
        $surveyTofsilForm7WorkerCost->other_total_worker_cost        = $request->other_total_worker_cost;
        $surveyTofsilForm7WorkerCost->created_by                     = Auth::user()->id;

        $surveyTofsilForm7WorkerCost->save();

        $surveyTofsilForm7PesticideCost = SurveyTofsilForm7PesticideCost::where('survey_tofsil_form7s_id',$surveyTofsilForm7->id)->first();

        $surveyTofsilForm7PesticideCost->survey_tofsil_form7s_id    = $surveyTofsilForm7->id;
        $surveyTofsilForm7PesticideCost->sumithion_quantity         = $request->sumithion_quantity;
        $surveyTofsilForm7PesticideCost->sumithion_cost             = $request->sumithion_cost;
        $surveyTofsilForm7PesticideCost->malathion_quantity         = $request->malathion_quantity;
        $surveyTofsilForm7PesticideCost->malathion_cost             = $request->malathion_cost;
        $surveyTofsilForm7PesticideCost->basudin_quantity           = $request->basudin_quantity;
        $surveyTofsilForm7PesticideCost->basudin_cost               = $request->basudin_cost;
        $surveyTofsilForm7PesticideCost->furadon_quantity           = $request->furadon_quantity;
        $surveyTofsilForm7PesticideCost->furadon_cost               = $request->furadon_cost;
        $surveyTofsilForm7PesticideCost->furanol_quantity           = $request->furanol_quantity;
        $surveyTofsilForm7PesticideCost->furanol_cost               = $request->furanol_cost;
        $surveyTofsilForm7PesticideCost->other_quantity             = $request->other_quantity;
        $surveyTofsilForm7PesticideCost->other_cost                 = $request->other_cost;
        $surveyTofsilForm7PesticideCost->created_by                 = Auth::user()->id;

        $surveyTofsilForm7PesticideCost->save();

        $surveyTofsilForm7TransportCost = SurveyTofsilForm7TransportCost::where('survey_tofsil_form7s_id',$surveyTofsilForm7->id)->first();

        $surveyTofsilForm7TransportCost->survey_tofsil_form7s_id    = $surveyTofsilForm7->id;
        $surveyTofsilForm7TransportCost->land_things_transport_cost = $request->land_things_transport_cost;
        $surveyTofsilForm7TransportCost->seed_transport_cost        = $request->seed_transport_cost;
        $surveyTofsilForm7TransportCost->fertilizer_transport_cost  = $request->fertilizer_transport_cost;
        $surveyTofsilForm7TransportCost->irrigation_transport_cost  = $request->irrigation_transport_cost;
        $surveyTofsilForm7TransportCost->pesticide_transport_cost   = $request->pesticide_transport_cost;
        $surveyTofsilForm7TransportCost->other_transport_cost       = $request->other_transport_cost;
        $surveyTofsilForm7TransportCost->created_by                 = Auth::user()->id;

        $surveyTofsilForm7TransportCost->save();

        if($done)
        {
            return redirect()->route('admin.surveyTofsilForm7.index')->with('success', 'Form submitted successfully.');
        } else {
            return redirect()->route('admin.surveyTofsilForm7.index')->with('error', 'Something went wrong, Try again later...!');
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
        
        $surveyTofsilForm7Datas = SurveyTofsilForm7::where('survey_notification_id', $survey_notification_id)->where('created_by', Auth::id())->get();
        
        foreach($surveyTofsilForm7Datas as $data){
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

        return redirect()->route('admin.surveyTofsilForm7.index')->with('success', 'Form Forwarded Successfully!!!');

    }
}

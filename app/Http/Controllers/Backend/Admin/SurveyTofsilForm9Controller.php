<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
use Auth;

/* included models */
use App\Models\Upazila;
use App\Models\SurveyProcessList;
use App\Models\SurveyNotification;
use App\Models\SurveyProcessForwardingLog;
use App\Models\GenerateSurveyNotification;

use App\Models\SurveyTofsilForm9;
use App\Models\SurveyTofsilForm9AgriculturalLand;
use App\Models\SurveyTofsilForm9FarmLand;
use App\Models\SurveyTofsilForm9IrrigationLand;
use App\Models\SurveyTofsilForm9IrrigationProcess;
use App\Models\SurveyTofsilForm9MainClassDivisionLand;
use App\Models\SurveyTofsilForm9MineralsAndHill;
use App\Models\SurveyTofsilForm9NonAgriculture;
use App\Models\SurveyTofsilForm9NurseryAndForest;
use App\Models\SurveyTofsilForm9River;
use App\Models\SurveyTofsilForm9TemporaryNetCrop;
use App\Models\SurveyTofsilForm9CropSeasonalLand;

class SurveyTofsilForm9Controller extends Controller
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
            menuSubmenu('farmersData', 'surveyTofsilForm9Data');

            $surveyTofsilForm9sData = SurveyTofsilForm9::with('division', 'district', 'upazilaInfo')->where('created_by', $user->id)->where('status', false)->latest()->paginate(15);
            
            return view('backend.admin.surveyForms.surveyTofsilForm9.index', compact('surveyTofsilForm9sData'));

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
            if(Gate::allows('survey_tofsil_form9', $user))
            {
                // get last value from url
                $url = $request->url();
                $url = basename($url);
                $number = is_numeric($url);

                menuSubmenu('surveyForms', 'surveyTofsilForm9');

                $processListId = $request->surveyProListId;
               
                if(empty($processListId))
                {
                    $processList = SurveyProcessList::with('upazila')->where('status', 1)->where('survey_form_id', 13)->where('survey_by', $user->id)->get();
                    
                    if($processList->count() > 0)
                    {    
                        return view('backend.admin.surveyForms.surveyTofsilForm9.surveyProcessList', [
                            'processLists' => $processList
                        ]);
                    }
                    else
                    {
                        
                        return view('backend.admin.surveyForms.surveyTofsilForm9.create', compact('number'));
                    }

                }else{
                    
                    $processList = SurveyProcessList::with('mouza')->where('id', $processListId)->first();
                    
                    $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 1)->first();

                    $surveyNotification = SurveyNotification::where('id', $processList->survey_notification_id)->first();
                    
                    return view('backend.admin.surveyForms.surveyTofsilForm9.create', compact('processListId', 'processList', 'surveyNotification', 'surveyList', 'number'));
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
            'upazila_volume_in_squre_kilometer' => 'required',
            'upazila_volume_in_acre'            => 'required',
            'information_collection_time'       => 'required',
        ]);

        $surveyTofsilForm9 = new SurveyTofsilForm9;

        $surveyTofsilForm9->survey_process_list_id              = $request->survey_process_list_id;
        $surveyTofsilForm9->survey_notification_id              = $request->survey_notification_id;
        $surveyTofsilForm9->division_id                         = $request->division_id;
        $surveyTofsilForm9->district_id                         = $request->district_id;
        $surveyTofsilForm9->upazila_id                          = $request->upazila_id;
        $surveyTofsilForm9->upazila_code                        = $request->upazila_code;
        $surveyTofsilForm9->upazila_volume_in_squre_kilometer   = $request->upazila_volume_in_squre_kilometer;
        $surveyTofsilForm9->upazila_volume_in_acre              = $request->upazila_volume_in_acre;
        $surveyTofsilForm9->information_collection_time         = $request->information_collection_time;
        $surveyTofsilForm9->year                                = $request->year;
        $surveyTofsilForm9->created_by                          = Auth::user()->id;

        $done = $surveyTofsilForm9->save();

        $surveyTofsilForm9AgriculturalLand = new SurveyTofsilForm9AgriculturalLand;

        $surveyTofsilForm9AgriculturalLand->survey_tofsil_form9_id                 = $surveyTofsilForm9->id;
        $surveyTofsilForm9AgriculturalLand->last_year_permanent_crops_land         = $request->last_year_permanent_crops_land;
        $surveyTofsilForm9AgriculturalLand->current_year_permanent_crops_land      = $request->current_year_permanent_crops_land;
        $surveyTofsilForm9AgriculturalLand->last_year_temporary_crops_land         = $request->last_year_temporary_crops_land;
        $surveyTofsilForm9AgriculturalLand->current_year_temporary_crops_land      = $request->current_year_temporary_crops_land;
        $surveyTofsilForm9AgriculturalLand->last_year_current_fallow_land          = $request->last_year_current_fallow_land;
        $surveyTofsilForm9AgriculturalLand->current_year_current_fallow_land       = $request->current_year_current_fallow_land;
        $surveyTofsilForm9AgriculturalLand->last_year_arable_uncultivated_land     = $request->last_year_arable_uncultivated_land;
        $surveyTofsilForm9AgriculturalLand->current_year_arable_uncultivated_land  = $request->current_year_arable_uncultivated_land;

        $surveyTofsilForm9AgriculturalLand->save();

        $surveyTofsilForm9FarmLand = new SurveyTofsilForm9FarmLand;

        $surveyTofsilForm9FarmLand->survey_tofsil_form9_id                              = $surveyTofsilForm9->id;
        $surveyTofsilForm9FarmLand->last_year_land_jute_research                        = $request->last_year_land_jute_research;
        $surveyTofsilForm9FarmLand->current_year_land_jute_research                     = $request->current_year_permanent_crops_land;
        $surveyTofsilForm9FarmLand->last_year_land_wheat                                = $request->last_year_land_wheat;
        $surveyTofsilForm9FarmLand->current_year_land_wheat                             = $request->current_year_land_wheat;
        $surveyTofsilForm9FarmLand->last_year_land_paddy_research                       = $request->last_year_land_paddy_research;
        $surveyTofsilForm9FarmLand->current_year_land_paddy_research                    = $request->current_year_land_paddy_research;
        $surveyTofsilForm9FarmLand->last_year_land_sugarcane_research                   = $request->last_year_land_sugarcane_research;
        $surveyTofsilForm9FarmLand->current_year_land_sugarcane_research                = $request->current_year_land_sugarcane_research;
        $surveyTofsilForm9FarmLand->last_year_land_vegetables_and_others_research       = $request->last_year_land_vegetables_and_others_research;
        $surveyTofsilForm9FarmLand->current_year_land_vegetables_and_others_research    = $request->current_year_land_vegetables_and_others_research;

        $surveyTofsilForm9FarmLand->last_year_land_cotton_research                      = $request->last_year_land_cotton_research;
        $surveyTofsilForm9FarmLand->current_year_land_cotton_research                   = $request->current_year_land_cotton_research;
        $surveyTofsilForm9FarmLand->last_year_land_fruit_research                       = $request->last_year_land_fruit_research;
        $surveyTofsilForm9FarmLand->current_year_land_fruit_research                    = $request->current_year_land_fruit_research;
        $surveyTofsilForm9FarmLand->last_year_land_others_permanent_research            = $request->last_year_land_others_permanent_research;
        $surveyTofsilForm9FarmLand->current_year_land_others_permanent_research         = $request->current_year_land_others_permanent_research;

        $surveyTofsilForm9FarmLand->last_year_land_fish                                 = $request->last_year_land_fish;
        $surveyTofsilForm9FarmLand->current_year_land_fish                              = $request->current_year_land_fish;
        $surveyTofsilForm9FarmLand->last_year_land_cattle                               = $request->last_year_land_cattle;
        $surveyTofsilForm9FarmLand->current_year_land_cattle                            = $request->current_year_land_cattle;
        $surveyTofsilForm9FarmLand->last_year_land_poultry                              = $request->last_year_land_poultry;
        $surveyTofsilForm9FarmLand->current_year_land_poultry                           = $request->current_year_land_poultry;
        $surveyTofsilForm9FarmLand->last_year_land_others                               = $request->last_year_land_others;
        $surveyTofsilForm9FarmLand->current_year_land_others                            = $request->current_year_land_others;

        $surveyTofsilForm9FarmLand->save();

        $surveyTofsilForm9NurseryAndForest = new SurveyTofsilForm9NurseryAndForest;

        $surveyTofsilForm9NurseryAndForest->survey_tofsil_form9_id              = $surveyTofsilForm9->id;
        $surveyTofsilForm9NurseryAndForest->last_year_land_govt_nursery         = $request->last_year_land_govt_nursery;
        $surveyTofsilForm9NurseryAndForest->current_year_land_govt_nursery      = $request->current_year_land_govt_nursery;
        $surveyTofsilForm9NurseryAndForest->last_year_land_private_nursery      = $request->last_year_land_private_nursery;
        $surveyTofsilForm9NurseryAndForest->current_year_land_private_nursery   = $request->current_year_land_private_nursery;

        $surveyTofsilForm9NurseryAndForest->last_year_land_govt_forest          = $request->last_year_land_govt_forest;
        $surveyTofsilForm9NurseryAndForest->current_year_land_govt_forest       = $request->current_year_land_govt_forest;
        $surveyTofsilForm9NurseryAndForest->last_year_land_private_forest       = $request->last_year_land_private_forest;
        $surveyTofsilForm9NurseryAndForest->current_year_land_private_forest    = $request->current_year_land_private_forest;

        $surveyTofsilForm9NurseryAndForest->save();

        $surveyTofsilForm9River = new SurveyTofsilForm9River;

        $surveyTofsilForm9River->survey_tofsil_form9_id      = $surveyTofsilForm9->id;
        $surveyTofsilForm9River->last_year_land_river        = $request->last_year_land_river;
        $surveyTofsilForm9River->current_year_land_river     = $request->current_year_land_river;
        $surveyTofsilForm9River->last_year_land_pond         = $request->last_year_land_pond;
        $surveyTofsilForm9River->current_year_land_pond      = $request->current_year_land_pond;
        $surveyTofsilForm9River->last_year_land_canal        = $request->last_year_land_canal;
        $surveyTofsilForm9River->current_year_land_canal     = $request->current_year_land_canal;
        $surveyTofsilForm9River->last_year_land_dive         = $request->last_year_land_dive;
        $surveyTofsilForm9River->current_year_land_dive      = $request->current_year_land_dive;
        $surveyTofsilForm9River->last_year_land_haor_baor    = $request->last_year_land_haor_baor;
        $surveyTofsilForm9River->current_year_land_haor_baor = $request->current_year_land_haor_baor;

        $surveyTofsilForm9River->save();

        $surveyTofsilForm9MineralsAndHill = new SurveyTofsilForm9MineralsAndHill;

        $surveyTofsilForm9MineralsAndHill->survey_tofsil_form9_id                     = $surveyTofsilForm9->id;
        $surveyTofsilForm9MineralsAndHill->last_year_land_hills                       = $request->last_year_land_hills;
        $surveyTofsilForm9MineralsAndHill->current_year_land_hills                    = $request->current_year_land_hills;
        $surveyTofsilForm9MineralsAndHill->last_year_land_gas_field_or_oil_field      = $request->last_year_land_gas_field_or_oil_field;
        $surveyTofsilForm9MineralsAndHill->current_year_land_gas_field_or_oil_field   = $request->current_year_land_gas_field_or_oil_field;
        $surveyTofsilForm9MineralsAndHill->last_year_land_stone_mine                  = $request->last_year_land_stone_mine;
        $surveyTofsilForm9MineralsAndHill->current_year_land_stone_mine               = $request->current_year_land_stone_mine;
        $surveyTofsilForm9MineralsAndHill->last_year_land_coil_mine                   = $request->last_year_land_coil_mine;
        $surveyTofsilForm9MineralsAndHill->current_year_land_coil_mine                = $request->current_year_land_coil_mine;
        $surveyTofsilForm9MineralsAndHill->last_year_land_others_min                  = $request->last_year_land_others_min;
        $surveyTofsilForm9MineralsAndHill->current_year_land_others_min               = $request->current_year_land_others_min;

        $surveyTofsilForm9MineralsAndHill->save();

        $surveyTofsilForm9NonAgriculture = new SurveyTofsilForm9NonAgriculture;

        $surveyTofsilForm9NonAgriculture->survey_tofsil_form9_id                       = $surveyTofsilForm9->id;
        $surveyTofsilForm9NonAgriculture->last_year_land_houses                        = $request->last_year_land_houses;
        $surveyTofsilForm9NonAgriculture->current_year_land_houses                     = $request->current_year_land_houses;
        $surveyTofsilForm9NonAgriculture->last_year_land_roads                         = $request->last_year_land_roads;
        $surveyTofsilForm9NonAgriculture->current_year_land_roads                      = $request->current_year_land_roads;
        $surveyTofsilForm9NonAgriculture->last_year_land_market                        = $request->last_year_land_market;
        $surveyTofsilForm9NonAgriculture->current_year_land_market                     = $request->current_year_land_market;
        $surveyTofsilForm9NonAgriculture->last_year_land_office_organization           = $request->last_year_land_office_organization;
        $surveyTofsilForm9NonAgriculture->current_year_land_office_organization        = $request->current_year_land_office_organization;
        $surveyTofsilForm9NonAgriculture->last_year_land_educational_organization      = $request->last_year_land_educational_organization;
        $surveyTofsilForm9NonAgriculture->current_year_land_educational_organization   = $request->current_year_land_educational_organization;
        $surveyTofsilForm9NonAgriculture->last_year_land_mill_factory                  = $request->last_year_land_mill_factory;
        $surveyTofsilForm9NonAgriculture->current_year_land_mill_factory               = $request->current_year_land_mill_factory;
        $surveyTofsilForm9NonAgriculture->last_year_land_bus_stand                     = $request->last_year_land_bus_stand;
        $surveyTofsilForm9NonAgriculture->current_year_land_bus_stand                  = $request->current_year_land_bus_stand;
        $surveyTofsilForm9NonAgriculture->last_year_land_religious_organization        = $request->last_year_land_religious_organization;
        $surveyTofsilForm9NonAgriculture->current_year_land_religious_organization     = $request->current_year_land_religious_organization;
        $surveyTofsilForm9NonAgriculture->last_year_land_cemetery                      = $request->last_year_land_cemetery;
        $surveyTofsilForm9NonAgriculture->current_year_land_cemetery                   = $request->current_year_land_cemetery;
        $surveyTofsilForm9NonAgriculture->last_year_land_social_organization           = $request->last_year_land_social_organization;
        $surveyTofsilForm9NonAgriculture->current_year_land_social_organization        = $request->current_year_land_social_organization;
        $surveyTofsilForm9NonAgriculture->last_year_land_park                          = $request->last_year_land_park;
        $surveyTofsilForm9NonAgriculture->current_year_land_park                       = $request->current_year_land_park;
        $surveyTofsilForm9NonAgriculture->last_year_land_others                        = $request->last_year_land_others;
        $surveyTofsilForm9NonAgriculture->current_year_land_others                     = $request->current_year_land_others;

        $surveyTofsilForm9NonAgriculture->save();

        $surveyTofsilForm9MainClassDivisionLand = new SurveyTofsilForm9MainClassDivisionLand;

        $surveyTofsilForm9MainClassDivisionLand->survey_tofsil_form9_id                   = $surveyTofsilForm9->id;
        $surveyTofsilForm9MainClassDivisionLand->last_year_land_forest                    = $request->last_year_land_forest;
        $surveyTofsilForm9MainClassDivisionLand->current_year_land_forest                 = $request->current_year_land_forest;
        $surveyTofsilForm9MainClassDivisionLand->reason_forest      = $request->reason_forest;
        $surveyTofsilForm9MainClassDivisionLand->last_year_land_net_temporary_crop        = $request->last_year_land_net_temporary_crop;
        $surveyTofsilForm9MainClassDivisionLand->current_year_land_net_temporary_crop     = $request->current_year_land_net_temporary_crop;
        $surveyTofsilForm9MainClassDivisionLand->reason_net_temporary_crop                = $request->reason_net_temporary_crop;
        $surveyTofsilForm9MainClassDivisionLand->last_year_land_permanent                 = $request->last_year_land_permanent;
        $surveyTofsilForm9MainClassDivisionLand->current_year_land_permanent              = $request->current_year_land_permanent;
        $surveyTofsilForm9MainClassDivisionLand->reason_permanent_crop                    = $request->reason_permanent_crop;
        $surveyTofsilForm9MainClassDivisionLand->last_year_land_nursery                   = $request->last_year_land_nursery;
        $surveyTofsilForm9MainClassDivisionLand->current_year_land_nursery                = $request->current_year_land_nursery;
        $surveyTofsilForm9MainClassDivisionLand->reason_nursery                           = $request->reason_nursery;
        $surveyTofsilForm9MainClassDivisionLand->last_year_land_fallen                    = $request->last_year_land_fallen;
        $surveyTofsilForm9MainClassDivisionLand->current_year_land_fallen                 = $request->current_year_land_fallen;
        $surveyTofsilForm9MainClassDivisionLand->reason_fallen                            = $request->reason_fallen;
        $surveyTofsilForm9MainClassDivisionLand->last_year_land_arable_uncultivable       = $request->last_year_land_arable_uncultivable;
        $surveyTofsilForm9MainClassDivisionLand->current_year_land_arable_uncultivable    = $request->current_year_land_arable_uncultivable;
        $surveyTofsilForm9MainClassDivisionLand->reason_arable_uncultivable               = $request->reason_arable_uncultivable;
        $surveyTofsilForm9MainClassDivisionLand->last_year_land_unavailable               = $request->last_year_land_unavailable;
        $surveyTofsilForm9MainClassDivisionLand->current_year_land_unavailable            = $request->current_year_land_unavailable;
        $surveyTofsilForm9MainClassDivisionLand->reason_unavailable                       = $request->reason_unavailable;

        $surveyTofsilForm9MainClassDivisionLand->save();

        $surveyTofsilForm9TemporaryNetCrop = new SurveyTofsilForm9TemporaryNetCrop;

        $surveyTofsilForm9TemporaryNetCrop->survey_tofsil_form9_id                 = $surveyTofsilForm9->id;
        $surveyTofsilForm9TemporaryNetCrop->last_year_land_one_crop                = $request->last_year_land_one_crop;
        $surveyTofsilForm9TemporaryNetCrop->current_year_land_one_crop             = $request->current_year_land_one_crop;
        $surveyTofsilForm9TemporaryNetCrop->reason_one_crop                        = $request->reason_one_crop;
        $surveyTofsilForm9TemporaryNetCrop->last_year_land_two_crop                = $request->last_year_land_two_crop;
        $surveyTofsilForm9TemporaryNetCrop->current_year_land_two_crop             = $request->current_year_land_two_crop;
        $surveyTofsilForm9TemporaryNetCrop->reason_two_crop                        = $request->reason_two_crop;
        $surveyTofsilForm9TemporaryNetCrop->last_year_land_three_crop              = $request->last_year_land_three_crop;
        $surveyTofsilForm9TemporaryNetCrop->current_year_land_three_crop           = $request->current_year_land_three_crop;
        $surveyTofsilForm9TemporaryNetCrop->reason_three_crop                      = $request->reason_three_crop;
        $surveyTofsilForm9TemporaryNetCrop->last_year_land_four_or_more_crop       = $request->last_year_land_four_or_more_crop;
        $surveyTofsilForm9TemporaryNetCrop->current_year_land_four_or_more_crop    = $request->current_year_land_four_or_more_crop;
        $surveyTofsilForm9TemporaryNetCrop->reason_four_or_more_crop               = $request->reason_four_or_more_crop;

        $surveyTofsilForm9TemporaryNetCrop->save();

        $surveyTofsilForm9CropSeasonalLand = new SurveyTofsilForm9CropSeasonalLand;

        $surveyTofsilForm9CropSeasonalLand->survey_tofsil_form9_id              = $surveyTofsilForm9->id;
        $surveyTofsilForm9CropSeasonalLand->last_year_land_robi_grain           = $request->last_year_land_robi_grain;
        $surveyTofsilForm9CropSeasonalLand->current_year_land_robi_grain        = $request->current_year_land_robi_grain;
        $surveyTofsilForm9CropSeasonalLand->reason_robi_grain                   = $request->reason_robi_grain;
        $surveyTofsilForm9CropSeasonalLand->last_year_land_kharip_grain         = $request->last_year_land_kharip_grain;
        $surveyTofsilForm9CropSeasonalLand->current_year_land_kharip_grain      = $request->current_year_land_kharip_grain;
        $surveyTofsilForm9CropSeasonalLand->reason_kharip_grain                 = $request->reason_kharip_grain;

        $surveyTofsilForm9CropSeasonalLand->last_year_land_fruit_grain          = $request->last_year_land_fruit_grain;
        $surveyTofsilForm9CropSeasonalLand->current_year_land_fruit_grain       = $request->current_year_land_fruit_grain;
        $surveyTofsilForm9CropSeasonalLand->reason_fruit_grain                  = $request->reason_fruit_grain;
        $surveyTofsilForm9CropSeasonalLand->last_year_land_fruitless_grain      = $request->last_year_land_fruitless_grain;
        $surveyTofsilForm9CropSeasonalLand->current_year_land_fruitless_grain   = $request->current_year_land_fruitless_grain;
        $surveyTofsilForm9CropSeasonalLand->reason_fruitless_grain              = $request->reason_fruitless_grain;

        $surveyTofsilForm9CropSeasonalLand->save();

        $surveyTofsilForm9IrrigationProcess = new SurveyTofsilForm9IrrigationProcess;

        $surveyTofsilForm9IrrigationProcess->survey_tofsil_form9_id                      = $surveyTofsilForm9->id;
        $surveyTofsilForm9IrrigationProcess->total_last_year_land_powered_pump           = $request->total_last_year_land_powered_pump;
        $surveyTofsilForm9IrrigationProcess->total_current_year_land_powered_pump        = $request->total_current_year_land_powered_pump;
        $surveyTofsilForm9IrrigationProcess->net_last_year_land_powered_pump             = $request->net_last_year_land_powered_pump;
        $surveyTofsilForm9IrrigationProcess->net_current_year_land_powered_pump          = $request->net_current_year_land_powered_pump;
        $surveyTofsilForm9IrrigationProcess->reason_powered_pump      = $request->current_year_land_kharip_grain;
        $surveyTofsilForm9IrrigationProcess->total_last_year_land_deep_tubewell          = $request->total_last_year_land_deep_tubewell;
        $surveyTofsilForm9IrrigationProcess->total_current_year_land_deep_tubewell       = $request->total_current_year_land_deep_tubewell;
        $surveyTofsilForm9IrrigationProcess->net_last_year_land_deep_tubewell            = $request->net_last_year_land_deep_tubewell;
        $surveyTofsilForm9IrrigationProcess->net_current_year_land_deep_tubewell         = $request->net_current_year_land_deep_tubewell;
        $surveyTofsilForm9IrrigationProcess->reason_deep_tubewell      = $request->reason_deep_tubewell;
        $surveyTofsilForm9IrrigationProcess->total_last_year_land_shallow_tubewell       = $request->total_last_year_land_shallow_tubewell;
        $surveyTofsilForm9IrrigationProcess->total_current_year_land_shallow_tubewell    = $request->total_current_year_land_shallow_tubewell;
        $surveyTofsilForm9IrrigationProcess->net_last_year_land_shallow_tubewell         = $request->net_last_year_land_shallow_tubewell;
        $surveyTofsilForm9IrrigationProcess->net_current_year_land_shallow_tubewell      = $request->net_current_year_land_shallow_tubewell;
        $surveyTofsilForm9IrrigationProcess->reason_shallow_tubewell                     = $request->reason_shallow_tubewell;
        $surveyTofsilForm9IrrigationProcess->total_last_year_land_manual_tubewell        = $request->total_last_year_land_manual_tubewell;
        $surveyTofsilForm9IrrigationProcess->total_current_year_land_manual_tubewell     = $request->total_current_year_land_manual_tubewell;
        $surveyTofsilForm9IrrigationProcess->net_last_year_land_manual_tubewell          = $request->net_last_year_land_manual_tubewell;
        $surveyTofsilForm9IrrigationProcess->net_current_year_land_manual_tubewell       = $request->net_current_year_land_manual_tubewell;
        $surveyTofsilForm9IrrigationProcess->reason_manual_tubewell                      = $request->reason_manual_tubewell;
        $surveyTofsilForm9IrrigationProcess->total_last_year_land_traditional_method     = $request->total_last_year_land_traditional_method;
        $surveyTofsilForm9IrrigationProcess->total_current_year_land_traditional_method  = $request->total_current_year_land_traditional_method;
        $surveyTofsilForm9IrrigationProcess->net_last_year_land_traditional_method       = $request->net_last_year_land_traditional_method;
        $surveyTofsilForm9IrrigationProcess->net_current_year_land_traditional_method    = $request->net_current_year_land_traditional_method;
        $surveyTofsilForm9IrrigationProcess->reason_traditional_method                   = $request->reason_traditional_method;

        $surveyTofsilForm9IrrigationProcess->save();

        $surveyTofsilForm9IrrigationLand = new SurveyTofsilForm9IrrigationLand;

        $surveyTofsilForm9IrrigationLand->survey_tofsil_form9_id          = $surveyTofsilForm9->id;
        $surveyTofsilForm9IrrigationLand->last_year_land_amon             = $request->last_year_land_amon;
        $surveyTofsilForm9IrrigationLand->current_year_land_amon          = $request->current_year_land_amon;
        $surveyTofsilForm9IrrigationLand->reason_amon                     = $request->reason_amon;
        $surveyTofsilForm9IrrigationLand->last_year_land_borough          = $request->last_year_land_borough;
        $surveyTofsilForm9IrrigationLand->current_year_land_borough       = $request->current_year_land_borough;
        $surveyTofsilForm9IrrigationLand->reason_borough                  = $request->reason_borough;
        $surveyTofsilForm9IrrigationLand->last_year_land_wheat            = $request->last_year_land_wheat;
        $surveyTofsilForm9IrrigationLand->current_year_land_wheat         = $request->current_year_land_wheat;
        $surveyTofsilForm9IrrigationLand->reason_wheat                    = $request->reason_wheat;
        $surveyTofsilForm9IrrigationLand->last_year_land_sugarcane        = $request->last_year_land_sugarcane;
        $surveyTofsilForm9IrrigationLand->current_year_land_sugarcane     = $request->current_year_land_sugarcane;
        $surveyTofsilForm9IrrigationLand->reason_sugarcane                = $request->reason_sugarcane;
        $surveyTofsilForm9IrrigationLand->last_year_land_cotton           = $request->last_year_land_cotton;
        $surveyTofsilForm9IrrigationLand->current_year_land_cotton        = $request->current_year_land_cotton;
        $surveyTofsilForm9IrrigationLand->reason_cotton                   = $request->reason_cotton;
        $surveyTofsilForm9IrrigationLand->last_year_land_potatoes         = $request->last_year_land_potatoes;
        $surveyTofsilForm9IrrigationLand->current_year_land_potatoes      = $request->current_year_land_potatoes;
        $surveyTofsilForm9IrrigationLand->reason_potatoes                 = $request->reason_potatoes;
        $surveyTofsilForm9IrrigationLand->last_year_land_vegetables       = $request->last_year_land_vegetables;
        $surveyTofsilForm9IrrigationLand->current_year_land_vegetables    = $request->current_year_land_vegetables;
        $surveyTofsilForm9IrrigationLand->reason_vegetables               = $request->reason_vegetables;
        $surveyTofsilForm9IrrigationLand->last_year_land_others           = $request->last_year_land_others;
        $surveyTofsilForm9IrrigationLand->current_year_land_others        = $request->current_year_land_others;
        $surveyTofsilForm9IrrigationLand->reason_others                   = $request->reason_others;

        $surveyTofsilForm9IrrigationLand->save();

        if($done)
        {
            return redirect()->route('admin.surveyTofsilForm9.create')->with('success', 'Form submitted successfully.');
        } else {
            return redirect()->route('admin.surveyTofsilForm9.create')->with('error', 'Something went wrong, Try again later...!');
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
        $surveyTofsilForm9Data = SurveyTofsilForm9::where('id', $id)->first();
        $processListId = $surveyTofsilForm9Data->survey_process_list_id;
        $processList = SurveyProcessList::with('mouza')->where('id', $surveyTofsilForm9Data->survey_process_list_id)->first();
                    
        $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 1)->first();

        $surveyNotification = SurveyNotification::where('id', $processList->survey_notification_id)->first();
        
        return view('backend.admin.surveyForms.surveyTofsilForm9.show', compact('processListId', 'processList', 'surveyNotification', 'surveyList', 'surveyTofsilForm9Data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SurveyTofsilForm9 $surveyTofsilForm9Data, Request $request)
    {
        $user = Auth::user();
        $url = $request->url();
        $url = basename($url);
        $number = is_numeric($url);
        
        $processListId = $surveyTofsilForm9Data->survey_process_list_id;
        $processList = SurveyProcessList::with('mouza')->where('id', $surveyTofsilForm9Data->survey_process_list_id)->first();
                    
        $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 1)->first();

        $surveyNotification = SurveyNotification::where('id', $processList->survey_notification_id)->first();
        
        return view('backend.admin.surveyForms.surveyTofsilForm9.edit', compact('processListId', 'processList', 'surveyNotification', 'surveyList', 'number','surveyTofsilForm9Data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SurveyTofsilForm9 $surveyTofsilForm9Data)
    {
        // dd($request->all());
        $surveyTofsilForm9Data->survey_process_list_id              = $request->survey_process_list_id;
        $surveyTofsilForm9Data->survey_notification_id              = $request->survey_notification_id;
        $surveyTofsilForm9Data->division_id                         = $request->division_id;
        $surveyTofsilForm9Data->district_id                         = $request->district_id;
        $surveyTofsilForm9Data->upazila_id                          = $request->upazila_id;
        $surveyTofsilForm9Data->upazila_code                        = $request->upazila_code;
        $surveyTofsilForm9Data->upazila_volume_in_squre_kilometer   = $request->upazila_volume_in_squre_kilometer;
        $surveyTofsilForm9Data->upazila_volume_in_acre              = $request->upazila_volume_in_acre;
        $surveyTofsilForm9Data->information_collection_time         = $request->information_collection_time;
        $surveyTofsilForm9Data->year                                = $request->year;
        $surveyTofsilForm9Data->updated_by                          = Auth::user()->id;

        $done = $surveyTofsilForm9Data->save();

        $surveyTofsilForm9AgriculturalLand = SurveyTofsilForm9AgriculturalLand::where('survey_tofsil_form9_id',$surveyTofsilForm9Data->id)->first();

        // $surveyTofsilForm9AgriculturalLand->survey_tofsil_form9_id                 = $surveyTofsilForm9->id;
        $surveyTofsilForm9AgriculturalLand->last_year_permanent_crops_land         = $request->last_year_permanent_crops_land;
        $surveyTofsilForm9AgriculturalLand->current_year_permanent_crops_land      = $request->current_year_permanent_crops_land;
        $surveyTofsilForm9AgriculturalLand->last_year_temporary_crops_land         = $request->last_year_temporary_crops_land;
        $surveyTofsilForm9AgriculturalLand->current_year_temporary_crops_land      = $request->current_year_temporary_crops_land;
        $surveyTofsilForm9AgriculturalLand->last_year_current_fallow_land          = $request->last_year_current_fallow_land;
        $surveyTofsilForm9AgriculturalLand->current_year_current_fallow_land       = $request->current_year_current_fallow_land;
        $surveyTofsilForm9AgriculturalLand->last_year_arable_uncultivated_land     = $request->last_year_arable_uncultivated_land;
        $surveyTofsilForm9AgriculturalLand->current_year_arable_uncultivated_land  = $request->current_year_arable_uncultivated_land;
        $surveyTofsilForm9AgriculturalLand->modified                               = Auth::user()->id;

        $surveyTofsilForm9AgriculturalLand->save();

        $surveyTofsilForm9FarmLand = SurveyTofsilForm9FarmLand::where('survey_tofsil_form9_id',$surveyTofsilForm9Data->id)->first();

        // $surveyTofsilForm9FarmLand->survey_tofsil_form9_id                              = $surveyTofsilForm9->id;
        $surveyTofsilForm9FarmLand->last_year_land_jute_research                        = $request->last_year_land_jute_research;
        $surveyTofsilForm9FarmLand->current_year_land_jute_research                     = $request->current_year_permanent_crops_land;
        $surveyTofsilForm9FarmLand->last_year_land_wheat                                = $request->last_year_land_wheat;
        $surveyTofsilForm9FarmLand->current_year_land_wheat                             = $request->current_year_land_wheat;
        $surveyTofsilForm9FarmLand->last_year_land_paddy_research                       = $request->last_year_land_paddy_research;
        $surveyTofsilForm9FarmLand->current_year_land_paddy_research                    = $request->current_year_land_paddy_research;
        $surveyTofsilForm9FarmLand->last_year_land_sugarcane_research                   = $request->last_year_land_sugarcane_research;
        $surveyTofsilForm9FarmLand->current_year_land_sugarcane_research                = $request->current_year_land_sugarcane_research;
        $surveyTofsilForm9FarmLand->last_year_land_vegetables_and_others_research       = $request->last_year_land_vegetables_and_others_research;
        $surveyTofsilForm9FarmLand->current_year_land_vegetables_and_others_research    = $request->current_year_land_vegetables_and_others_research;

        $surveyTofsilForm9FarmLand->last_year_land_cotton_research                      = $request->last_year_land_cotton_research;
        $surveyTofsilForm9FarmLand->current_year_land_cotton_research                   = $request->current_year_land_cotton_research;
        $surveyTofsilForm9FarmLand->last_year_land_fruit_research                       = $request->last_year_land_fruit_research;
        $surveyTofsilForm9FarmLand->current_year_land_fruit_research                    = $request->current_year_land_fruit_research;
        $surveyTofsilForm9FarmLand->last_year_land_others_permanent_research            = $request->last_year_land_others_permanent_research;
        $surveyTofsilForm9FarmLand->current_year_land_others_permanent_research         = $request->current_year_land_others_permanent_research;

        $surveyTofsilForm9FarmLand->last_year_land_fish                                 = $request->last_year_land_fish;
        $surveyTofsilForm9FarmLand->current_year_land_fish                              = $request->current_year_land_fish;
        $surveyTofsilForm9FarmLand->last_year_land_cattle                               = $request->last_year_land_cattle;
        $surveyTofsilForm9FarmLand->current_year_land_cattle                            = $request->current_year_land_cattle;
        $surveyTofsilForm9FarmLand->last_year_land_poultry                              = $request->last_year_land_poultry;
        $surveyTofsilForm9FarmLand->current_year_land_poultry                           = $request->current_year_land_poultry;
        $surveyTofsilForm9FarmLand->last_year_land_others                               = $request->last_year_land_others;
        $surveyTofsilForm9FarmLand->current_year_land_others                            = $request->current_year_land_others;

        $surveyTofsilForm9FarmLand->save();

        $surveyTofsilForm9NurseryAndForest = SurveyTofsilForm9NurseryAndForest::where('survey_tofsil_form9_id',$surveyTofsilForm9Data->id)->first();

        // $surveyTofsilForm9NurseryAndForest->survey_tofsil_form9_id              = $surveyTofsilForm9->id;
        $surveyTofsilForm9NurseryAndForest->last_year_land_govt_nursery         = $request->last_year_land_govt_nursery;
        $surveyTofsilForm9NurseryAndForest->current_year_land_govt_nursery      = $request->current_year_land_govt_nursery;
        $surveyTofsilForm9NurseryAndForest->last_year_land_private_nursery      = $request->last_year_land_private_nursery;
        $surveyTofsilForm9NurseryAndForest->current_year_land_private_nursery   = $request->current_year_land_private_nursery;

        $surveyTofsilForm9NurseryAndForest->last_year_land_govt_forest          = $request->last_year_land_govt_forest;
        $surveyTofsilForm9NurseryAndForest->current_year_land_govt_forest       = $request->current_year_land_govt_forest;
        $surveyTofsilForm9NurseryAndForest->last_year_land_private_forest       = $request->last_year_land_private_forest;
        $surveyTofsilForm9NurseryAndForest->current_year_land_private_forest    = $request->current_year_land_private_forest;

        $surveyTofsilForm9NurseryAndForest->save();

        $surveyTofsilForm9River = SurveyTofsilForm9River::where('survey_tofsil_form9_id',$surveyTofsilForm9Data->id)->first();

        // $surveyTofsilForm9River->survey_tofsil_form9_id      = $surveyTofsilForm9->id;
        $surveyTofsilForm9River->last_year_land_river        = $request->last_year_land_river;
        $surveyTofsilForm9River->current_year_land_river     = $request->current_year_land_river;
        $surveyTofsilForm9River->last_year_land_pond         = $request->last_year_land_pond;
        $surveyTofsilForm9River->current_year_land_pond      = $request->current_year_land_pond;
        $surveyTofsilForm9River->last_year_land_canal        = $request->last_year_land_canal;
        $surveyTofsilForm9River->current_year_land_canal     = $request->current_year_land_canal;
        $surveyTofsilForm9River->last_year_land_dive         = $request->last_year_land_dive;
        $surveyTofsilForm9River->current_year_land_dive      = $request->current_year_land_dive;
        $surveyTofsilForm9River->last_year_land_haor_baor    = $request->last_year_land_haor_baor;
        $surveyTofsilForm9River->current_year_land_haor_baor = $request->current_year_land_haor_baor;

        $surveyTofsilForm9River->save();

        $surveyTofsilForm9MineralsAndHill = SurveyTofsilForm9MineralsAndHill::where('survey_tofsil_form9_id',$surveyTofsilForm9Data->id)->first();

        // $surveyTofsilForm9MineralsAndHill->survey_tofsil_form9_id                     = $surveyTofsilForm9->id;
        $surveyTofsilForm9MineralsAndHill->last_year_land_hills                       = $request->last_year_land_hills;
        $surveyTofsilForm9MineralsAndHill->current_year_land_hills                    = $request->current_year_land_hills;
        $surveyTofsilForm9MineralsAndHill->last_year_land_gas_field_or_oil_field      = $request->last_year_land_gas_field_or_oil_field;
        $surveyTofsilForm9MineralsAndHill->current_year_land_gas_field_or_oil_field   = $request->current_year_land_gas_field_or_oil_field;
        $surveyTofsilForm9MineralsAndHill->last_year_land_stone_mine                  = $request->last_year_land_stone_mine;
        $surveyTofsilForm9MineralsAndHill->current_year_land_stone_mine               = $request->current_year_land_stone_mine;
        $surveyTofsilForm9MineralsAndHill->last_year_land_coil_mine                   = $request->last_year_land_coil_mine;
        $surveyTofsilForm9MineralsAndHill->current_year_land_coil_mine                = $request->current_year_land_coil_mine;
        $surveyTofsilForm9MineralsAndHill->last_year_land_others_min                  = $request->last_year_land_others_min;
        $surveyTofsilForm9MineralsAndHill->current_year_land_others_min               = $request->current_year_land_others_min;

        $surveyTofsilForm9MineralsAndHill->save();

        $surveyTofsilForm9NonAgriculture = SurveyTofsilForm9NonAgriculture::where('survey_tofsil_form9_id',$surveyTofsilForm9Data->id)->first();

        // $surveyTofsilForm9NonAgriculture->survey_tofsil_form9_id                       = $surveyTofsilForm9->id;
        $surveyTofsilForm9NonAgriculture->last_year_land_houses                        = $request->last_year_land_houses;
        $surveyTofsilForm9NonAgriculture->current_year_land_houses                     = $request->current_year_land_houses;
        $surveyTofsilForm9NonAgriculture->last_year_land_roads                         = $request->last_year_land_roads;
        $surveyTofsilForm9NonAgriculture->current_year_land_roads                      = $request->current_year_land_roads;
        $surveyTofsilForm9NonAgriculture->last_year_land_market                        = $request->last_year_land_market;
        $surveyTofsilForm9NonAgriculture->current_year_land_market                     = $request->current_year_land_market;
        $surveyTofsilForm9NonAgriculture->last_year_land_office_organization           = $request->last_year_land_office_organization;
        $surveyTofsilForm9NonAgriculture->current_year_land_office_organization        = $request->current_year_land_office_organization;
        $surveyTofsilForm9NonAgriculture->last_year_land_educational_organization      = $request->last_year_land_educational_organization;
        $surveyTofsilForm9NonAgriculture->current_year_land_educational_organization   = $request->current_year_land_educational_organization;
        $surveyTofsilForm9NonAgriculture->last_year_land_mill_factory                  = $request->last_year_land_mill_factory;
        $surveyTofsilForm9NonAgriculture->current_year_land_mill_factory               = $request->current_year_land_mill_factory;
        $surveyTofsilForm9NonAgriculture->last_year_land_bus_stand                     = $request->last_year_land_bus_stand;
        $surveyTofsilForm9NonAgriculture->current_year_land_bus_stand                  = $request->current_year_land_bus_stand;
        $surveyTofsilForm9NonAgriculture->last_year_land_religious_organization        = $request->last_year_land_religious_organization;
        $surveyTofsilForm9NonAgriculture->current_year_land_religious_organization     = $request->current_year_land_religious_organization;
        $surveyTofsilForm9NonAgriculture->last_year_land_cemetery                      = $request->last_year_land_cemetery;
        $surveyTofsilForm9NonAgriculture->current_year_land_cemetery                   = $request->current_year_land_cemetery;
        $surveyTofsilForm9NonAgriculture->last_year_land_social_organization           = $request->last_year_land_social_organization;
        $surveyTofsilForm9NonAgriculture->current_year_land_social_organization        = $request->current_year_land_social_organization;
        $surveyTofsilForm9NonAgriculture->last_year_land_park                          = $request->last_year_land_park;
        $surveyTofsilForm9NonAgriculture->current_year_land_park                       = $request->current_year_land_park;
        $surveyTofsilForm9NonAgriculture->last_year_land_others                        = $request->last_year_land_others;
        $surveyTofsilForm9NonAgriculture->current_year_land_others                     = $request->current_year_land_others;

        $surveyTofsilForm9NonAgriculture->save();

        $surveyTofsilForm9MainClassDivisionLand = SurveyTofsilForm9MainClassDivisionLand::where('survey_tofsil_form9_id',$surveyTofsilForm9Data->id)->first();

        // $surveyTofsilForm9MainClassDivisionLand->survey_tofsil_form9_id                   = $surveyTofsilForm9->id;
        $surveyTofsilForm9MainClassDivisionLand->last_year_land_forest                    = $request->last_year_land_forest;
        $surveyTofsilForm9MainClassDivisionLand->current_year_land_forest                 = $request->current_year_land_forest;
        $surveyTofsilForm9MainClassDivisionLand->reason_forest      = $request->reason_forest;
        $surveyTofsilForm9MainClassDivisionLand->last_year_land_net_temporary_crop        = $request->last_year_land_net_temporary_crop;
        $surveyTofsilForm9MainClassDivisionLand->current_year_land_net_temporary_crop     = $request->current_year_land_net_temporary_crop;
        $surveyTofsilForm9MainClassDivisionLand->reason_net_temporary_crop                = $request->reason_net_temporary_crop;
        $surveyTofsilForm9MainClassDivisionLand->last_year_land_permanent                 = $request->last_year_land_permanent;
        $surveyTofsilForm9MainClassDivisionLand->current_year_land_permanent              = $request->current_year_land_permanent;
        $surveyTofsilForm9MainClassDivisionLand->reason_permanent_crop                    = $request->reason_permanent_crop;
        $surveyTofsilForm9MainClassDivisionLand->last_year_land_nursery                   = $request->last_year_land_nursery;
        $surveyTofsilForm9MainClassDivisionLand->current_year_land_nursery                = $request->current_year_land_nursery;
        $surveyTofsilForm9MainClassDivisionLand->reason_nursery                           = $request->reason_nursery;
        $surveyTofsilForm9MainClassDivisionLand->last_year_land_fallen                    = $request->last_year_land_fallen;
        $surveyTofsilForm9MainClassDivisionLand->current_year_land_fallen                 = $request->current_year_land_fallen;
        $surveyTofsilForm9MainClassDivisionLand->reason_fallen                            = $request->reason_fallen;
        $surveyTofsilForm9MainClassDivisionLand->last_year_land_arable_uncultivable       = $request->last_year_land_arable_uncultivable;
        $surveyTofsilForm9MainClassDivisionLand->current_year_land_arable_uncultivable    = $request->current_year_land_arable_uncultivable;
        $surveyTofsilForm9MainClassDivisionLand->reason_arable_uncultivable               = $request->reason_arable_uncultivable;
        $surveyTofsilForm9MainClassDivisionLand->last_year_land_unavailable               = $request->last_year_land_unavailable;
        $surveyTofsilForm9MainClassDivisionLand->current_year_land_unavailable            = $request->current_year_land_unavailable;
        $surveyTofsilForm9MainClassDivisionLand->reason_unavailable                       = $request->reason_unavailable;

        $surveyTofsilForm9MainClassDivisionLand->save();

        $surveyTofsilForm9TemporaryNetCrop = SurveyTofsilForm9TemporaryNetCrop::where('survey_tofsil_form9_id',$surveyTofsilForm9Data->id)->first();

        // $surveyTofsilForm9TemporaryNetCrop->survey_tofsil_form9_id                 = $surveyTofsilForm9->id;
        $surveyTofsilForm9TemporaryNetCrop->last_year_land_one_crop                = $request->last_year_land_one_crop;
        $surveyTofsilForm9TemporaryNetCrop->current_year_land_one_crop             = $request->current_year_land_one_crop;
        $surveyTofsilForm9TemporaryNetCrop->reason_one_crop                        = $request->reason_one_crop;
        $surveyTofsilForm9TemporaryNetCrop->last_year_land_two_crop                = $request->last_year_land_two_crop;
        $surveyTofsilForm9TemporaryNetCrop->current_year_land_two_crop             = $request->current_year_land_two_crop;
        $surveyTofsilForm9TemporaryNetCrop->reason_two_crop                        = $request->reason_two_crop;
        $surveyTofsilForm9TemporaryNetCrop->last_year_land_three_crop              = $request->last_year_land_three_crop;
        $surveyTofsilForm9TemporaryNetCrop->current_year_land_three_crop           = $request->current_year_land_three_crop;
        $surveyTofsilForm9TemporaryNetCrop->reason_three_crop                      = $request->reason_three_crop;
        $surveyTofsilForm9TemporaryNetCrop->last_year_land_four_or_more_crop       = $request->last_year_land_four_or_more_crop;
        $surveyTofsilForm9TemporaryNetCrop->current_year_land_four_or_more_crop    = $request->current_year_land_four_or_more_crop;
        $surveyTofsilForm9TemporaryNetCrop->reason_four_or_more_crop               = $request->reason_four_or_more_crop;

        $surveyTofsilForm9TemporaryNetCrop->save();

        $surveyTofsilForm9CropSeasonalLand = SurveyTofsilForm9CropSeasonalLand::where('survey_tofsil_form9_id',$surveyTofsilForm9Data->id)->first();

        // $surveyTofsilForm9CropSeasonalLand->survey_tofsil_form9_id              = $surveyTofsilForm9->id;
        $surveyTofsilForm9CropSeasonalLand->last_year_land_robi_grain           = $request->last_year_land_robi_grain;
        $surveyTofsilForm9CropSeasonalLand->current_year_land_robi_grain        = $request->current_year_land_robi_grain;
        $surveyTofsilForm9CropSeasonalLand->reason_robi_grain                   = $request->reason_robi_grain;
        $surveyTofsilForm9CropSeasonalLand->last_year_land_kharip_grain         = $request->last_year_land_kharip_grain;
        $surveyTofsilForm9CropSeasonalLand->current_year_land_kharip_grain      = $request->current_year_land_kharip_grain;
        $surveyTofsilForm9CropSeasonalLand->reason_kharip_grain                 = $request->reason_kharip_grain;

        $surveyTofsilForm9CropSeasonalLand->last_year_land_fruit_grain          = $request->last_year_land_fruit_grain;
        $surveyTofsilForm9CropSeasonalLand->current_year_land_fruit_grain       = $request->current_year_land_fruit_grain;
        $surveyTofsilForm9CropSeasonalLand->reason_fruit_grain                  = $request->reason_fruit_grain;
        $surveyTofsilForm9CropSeasonalLand->last_year_land_fruitless_grain      = $request->last_year_land_fruitless_grain;
        $surveyTofsilForm9CropSeasonalLand->current_year_land_fruitless_grain   = $request->current_year_land_fruitless_grain;
        $surveyTofsilForm9CropSeasonalLand->reason_fruitless_grain              = $request->reason_fruitless_grain;

        $surveyTofsilForm9CropSeasonalLand->save();

        $surveyTofsilForm9IrrigationProcess = SurveyTofsilForm9IrrigationProcess::where('survey_tofsil_form9_id',$surveyTofsilForm9Data->id)->first();

        // $surveyTofsilForm9IrrigationProcess->survey_tofsil_form9_id                      = $surveyTofsilForm9->id;
        $surveyTofsilForm9IrrigationProcess->total_last_year_land_powered_pump           = $request->total_last_year_land_powered_pump;
        $surveyTofsilForm9IrrigationProcess->total_current_year_land_powered_pump        = $request->total_current_year_land_powered_pump;
        $surveyTofsilForm9IrrigationProcess->net_last_year_land_powered_pump             = $request->net_last_year_land_powered_pump;
        $surveyTofsilForm9IrrigationProcess->net_current_year_land_powered_pump          = $request->net_current_year_land_powered_pump;
        $surveyTofsilForm9IrrigationProcess->reason_powered_pump      = $request->current_year_land_kharip_grain;
        $surveyTofsilForm9IrrigationProcess->total_last_year_land_deep_tubewell          = $request->total_last_year_land_deep_tubewell;
        $surveyTofsilForm9IrrigationProcess->total_current_year_land_deep_tubewell       = $request->total_current_year_land_deep_tubewell;
        $surveyTofsilForm9IrrigationProcess->net_last_year_land_deep_tubewell            = $request->net_last_year_land_deep_tubewell;
        $surveyTofsilForm9IrrigationProcess->net_current_year_land_deep_tubewell         = $request->net_current_year_land_deep_tubewell;
        $surveyTofsilForm9IrrigationProcess->reason_deep_tubewell      = $request->reason_deep_tubewell;
        $surveyTofsilForm9IrrigationProcess->total_last_year_land_shallow_tubewell       = $request->total_last_year_land_shallow_tubewell;
        $surveyTofsilForm9IrrigationProcess->total_current_year_land_shallow_tubewell    = $request->total_current_year_land_shallow_tubewell;
        $surveyTofsilForm9IrrigationProcess->net_last_year_land_shallow_tubewell         = $request->net_last_year_land_shallow_tubewell;
        $surveyTofsilForm9IrrigationProcess->net_current_year_land_shallow_tubewell      = $request->net_current_year_land_shallow_tubewell;
        $surveyTofsilForm9IrrigationProcess->reason_shallow_tubewell                     = $request->reason_shallow_tubewell;
        $surveyTofsilForm9IrrigationProcess->total_last_year_land_manual_tubewell        = $request->total_last_year_land_manual_tubewell;
        $surveyTofsilForm9IrrigationProcess->total_current_year_land_manual_tubewell     = $request->total_current_year_land_manual_tubewell;
        $surveyTofsilForm9IrrigationProcess->net_last_year_land_manual_tubewell          = $request->net_last_year_land_manual_tubewell;
        $surveyTofsilForm9IrrigationProcess->net_current_year_land_manual_tubewell       = $request->net_current_year_land_manual_tubewell;
        $surveyTofsilForm9IrrigationProcess->reason_manual_tubewell                      = $request->reason_manual_tubewell;
        $surveyTofsilForm9IrrigationProcess->total_last_year_land_traditional_method     = $request->total_last_year_land_traditional_method;
        $surveyTofsilForm9IrrigationProcess->total_current_year_land_traditional_method  = $request->total_current_year_land_traditional_method;
        $surveyTofsilForm9IrrigationProcess->net_last_year_land_traditional_method       = $request->net_last_year_land_traditional_method;
        $surveyTofsilForm9IrrigationProcess->net_current_year_land_traditional_method    = $request->net_current_year_land_traditional_method;
        $surveyTofsilForm9IrrigationProcess->reason_traditional_method                   = $request->reason_traditional_method;

        $surveyTofsilForm9IrrigationProcess->save();

        $surveyTofsilForm9IrrigationLand = SurveyTofsilForm9IrrigationLand::where('survey_tofsil_form9_id',$surveyTofsilForm9Data->id)->first();

        // $surveyTofsilForm9IrrigationLand->survey_tofsil_form9_id          = $surveyTofsilForm9->id;
        $surveyTofsilForm9IrrigationLand->last_year_land_amon             = $request->last_year_land_amon;
        $surveyTofsilForm9IrrigationLand->current_year_land_amon          = $request->current_year_land_amon;
        $surveyTofsilForm9IrrigationLand->reason_amon                     = $request->reason_amon;
        $surveyTofsilForm9IrrigationLand->last_year_land_borough          = $request->last_year_land_borough;
        $surveyTofsilForm9IrrigationLand->current_year_land_borough       = $request->current_year_land_borough;
        $surveyTofsilForm9IrrigationLand->reason_borough                  = $request->reason_borough;
        $surveyTofsilForm9IrrigationLand->last_year_land_wheat            = $request->last_year_land_wheat;
        $surveyTofsilForm9IrrigationLand->current_year_land_wheat         = $request->current_year_land_wheat;
        $surveyTofsilForm9IrrigationLand->reason_wheat                    = $request->reason_wheat;
        $surveyTofsilForm9IrrigationLand->last_year_land_sugarcane        = $request->last_year_land_sugarcane;
        $surveyTofsilForm9IrrigationLand->current_year_land_sugarcane     = $request->current_year_land_sugarcane;
        $surveyTofsilForm9IrrigationLand->reason_sugarcane                = $request->reason_sugarcane;
        $surveyTofsilForm9IrrigationLand->last_year_land_cotton           = $request->last_year_land_cotton;
        $surveyTofsilForm9IrrigationLand->current_year_land_cotton        = $request->current_year_land_cotton;
        $surveyTofsilForm9IrrigationLand->reason_cotton                   = $request->reason_cotton;
        $surveyTofsilForm9IrrigationLand->last_year_land_potatoes         = $request->last_year_land_potatoes;
        $surveyTofsilForm9IrrigationLand->current_year_land_potatoes      = $request->current_year_land_potatoes;
        $surveyTofsilForm9IrrigationLand->reason_potatoes                 = $request->reason_potatoes;
        $surveyTofsilForm9IrrigationLand->last_year_land_vegetables       = $request->last_year_land_vegetables;
        $surveyTofsilForm9IrrigationLand->current_year_land_vegetables    = $request->current_year_land_vegetables;
        $surveyTofsilForm9IrrigationLand->reason_vegetables               = $request->reason_vegetables;
        $surveyTofsilForm9IrrigationLand->last_year_land_others           = $request->last_year_land_others;
        $surveyTofsilForm9IrrigationLand->current_year_land_others        = $request->current_year_land_others;
        $surveyTofsilForm9IrrigationLand->reason_others                   = $request->reason_others;

        $surveyTofsilForm9IrrigationLand->save();

        if($done)
        {
            return redirect()->route('admin.surveyTofsilForm9.index')->with('success', 'Form updated successfully.');

        } else {
            return back()->with('error', 'Something went wrong, Try again later...!');
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
        
        $surveyTofsilForm9Datas = SurveyTofsilForm9::where('survey_notification_id', $survey_notification_id)->where('created_by', Auth::id())->get();
        
        foreach($surveyTofsilForm9Datas as $data){
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

        return redirect()->route('admin.surveyTofsilForm9.index')->with('success', 'Form Forwarded Successfully!!!');

    }
}

<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Gate;

use App\Models\SurveyProcessList;
use App\Models\SurveyProcessForwardingLog;
use App\Models\User;
use App\Models\GenerateSurveyNotification;
use App\Models\Crop;
use App\Models\SurveyNotification;
use App\Models\SurveyCompilation;
use App\Models\Division;

use App\Models\SurveyCompilationCollectForm1;
use App\Models\SurveyTofsilForm1;
use App\Models\SurveyTofsilForm2;
use App\Models\SurveyTofsilForm2AllFarmer;
use App\Models\SurveyTofsilForm3;
use App\Models\SurveyTofsilForm3Maize;
use App\Models\SurveyTofsilForm4;
use App\Models\SurveyTofsilForm5;
use App\Models\SurveyTofsilForm5AllFarmer;
use App\Models\SurveyTofsilForm6;
use App\Models\SurveyTofsilForm7;
use App\Models\SurveyTofsilForm8;
use App\Models\SurveyTofsilForm9;
use App\Models\SurveyTofsilForm9AgriculturalLand;
use App\Models\SurveyTofsilForm9CropSeasonalLand;
use App\Models\SurveyTofsilForm9FarmLand;
use App\Models\SurveyTofsilForm9IrrigationLand;
use App\Models\SurveyTofsilForm9IrrigationProcess;
use App\Models\SurveyTofsilForm9MainClassDivisionLand;
use App\Models\SurveyTofsilForm9MineralsAndHill;
use App\Models\SurveyTofsilForm9NonAgriculture;
use App\Models\SurveyTofsilForm9NurseryAndForest;
use App\Models\SurveyTofsilForm9River;
use App\Models\SurveyTofsilForm9TemporaryNetCrop;
use App\Models\SurveyTofsilForm10;
use App\Models\SurveyTofsilForm11;

class ProcessingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {       
        
        $user = Auth::user();
        if (Gate::allows('survey_process_lists', $user)) 
        {
            $formId = $request->formId;
            // dd($formId);
            menuSubmenu('surveyprocesslist','allProcessingList'.$formId);
            $uso = $user->levelCheckUpazila($user->id);
            $div = $user->levelCheckDiv($user->id);
            $dd = $user->levelCheckDc($user->id);
            $dg = $user->levelCheckDg($user->id);
            
            if($dg)
            {
                $lists = SurveyProcessList::where('status',5)
                        ->where('survey_form_id',$formId)
                        ->groupBy('division_id')
                        ->latest()
                        ->paginate(15);
                if($formId == 1)
                {
                    return view('backend.admin.survey.allIndex',[
                        'lists'=>$lists
                    ]); 
                }
                elseif($formId == 2)
                {
                    return view('backend.admin.survey.allClusterIndex',[
                        'lists'=>$lists
                    ]); 
                }
                elseif($formId == 3) // fofsil 3
                {
                    return view('backend.admin.survey.allTemporaryCropIndex',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 4)
                {
                    return view('backend.admin.survey.allPermanentCropIndex', [
                        'lists' => $lists
                    ]);
                }
                elseif($formId == 5) // tofsil 2
                {
                    // dd($lists);
                    return view('backend.admin.survey.allOverCropCuttingIndex',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 6) // tofsil 6
                {
                    return view('backend.admin.survey.allMaizeCropIndex',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 7) // tofsil 5
                {
                    return view('backend.admin.survey.allPotatoIndex',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 8) // tofsil 5
                {
                    return view('backend.admin.survey.allWagesIndex',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 11) // tofsil 11
                {
                    return view('backend.admin.survey.dgTofsil11Index',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 12) // tofsil 7
                {
                    return view('backend.admin.survey.dgTofsil7Index',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 13) // tofsil 9
                {
                    return view('backend.admin.survey.dgTofsil9Index',[
                        'lists'=>$lists
                    ]);
                }
                
            }
            elseif($div)
            {
                
                $lists = SurveyProcessList::where('division_id',$user->division_id)
                        ->where('status',4)
                        ->where('survey_form_id',$formId)
                        ->groupBy('district_id')
                        ->latest()
                        ->paginate(15);
                
                if($formId == 1)
                {

                    return view('backend.admin.survey.divisionIndex',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 2)
                {
                    
                    return view('backend.admin.survey.divisionClusterIndex',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 3) // tofsil 3
                {
                    
                    return view('backend.admin.survey.divisionTemporaryCropIndex',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 4) // fofsil 4
                {                    
                    return view('backend.admin.survey.districtPerennialCropIndex',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 5) // tofsil 2
                {
                    
                    return view('backend.admin.survey.districtCropCuttingIndex',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 6) // tofsil 6
                {
                    return view('backend.admin.survey.districtMaizeCropIndex',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 7) // tofsil 5
                {
                    return view('backend.admin.survey.districtPotatoIndex',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 8) // tofsil 8
                {
                    return view('backend.admin.survey.districtMonthlyWageIndex',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId==10)
                {
                    return view('backend.admin.survey.divisionTofsil10Index',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 11) // tofsil 11
                {
                    return view('backend.admin.survey.divisionTofsil11Index',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 12) // tofsil 7
                {
                    return view('backend.admin.survey.divisionTofsil7Index',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 13) // tofsil 9
                {
                    
                    return view('backend.admin.survey.divisionTofsil9Index',[
                        'lists'=>$lists
                    ]);
                }

            }
            elseif($dd)
            {
                $lists = SurveyProcessList::where('division_id',$user->division_id)
                        ->where('district_id',$user->district_id)
                        ->where('survey_form_id',$formId)
                        ->where('status',3)
                        ->groupBy('upazila_id')
                        ->latest()
                        ->paginate(15);
                $list = SurveyProcessList::where('division_id',$user->division_id)
                        ->where('district_id',$user->district_id)
                        ->where('survey_form_id',$formId)
                        ->where('status',3)
                        ->groupBy('upazila_id')->first();
                if($formId == 1)
                {
                    
                    return view('backend.admin.survey.districtIndex',[
                        'lists'=>$lists,
                        'list'=>$list
                    ]);
                }
                elseif($formId == 2)
                {
                    
                    return view('backend.admin.survey.districtClusterIndex',[
                        'lists'=>$lists,
                        'list' => $list
                    ]);
                }
                elseif($formId == 3) // fofsil 3
                {
                    
                    return view('backend.admin.survey.districtTemporaryCropIndex',[
                        'lists'=>$lists,
                        'list' => $list
                    ]);
                }
                elseif($formId == 4) // fofsil 4
                {                    
                    return view('backend.admin.survey.upazilaPerennialCropIndex',[
                        'lists'=>$lists,
                        'list' => $list
                    ]);
                }
                elseif($formId == 5) // tofsil 2
                {
                    
                    return view('backend.admin.survey.upazilaCropCuttingIndex',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 6) // tofsil 6
                {
                    return view('backend.admin.survey.upazilaMaizeCropIndex',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 7) // tofsil 5
                {
                    return view('backend.admin.survey.upazilaPotatoIndex',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 8) // tofsil 8
                {
                    return view('backend.admin.survey.upazilaMonthlyWageIndex',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 10) // tofsil 11
                {
                    return view('backend.admin.survey.districtTofsil10Index',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 11) // tofsil 11
                {
                    return view('backend.admin.survey.districtTofsil11Index',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 12) // tofsil 7
                {
                    return view('backend.admin.survey.districtTofsil7Index',[
                        'lists'=>$lists,
                        'list' => $list

                    ]);
                }
                elseif($formId == 13) // tofsil 9
                {
                    
                    return view('backend.admin.survey.tofsil9Index',[
                        'lists' => $lists,
                        'list'  => $list
                    ]);
                }
                
            }
            elseif($uso)
            {
                
                $lists = SurveyProcessList::where('division_id',$user->division_id)
                        ->where('district_id',$user->district_id)
                        ->where('upazila_id',$user->upazila_id)
                        ->where('created_by',$user->id)
                        ->where('survey_form_id',$formId)
                        // ->where('status',2)
                        ->where('status','<>',6)
                        ->latest()->paginate(15);
                $list = SurveyProcessList::where('division_id',$user->division_id)
                        ->where('district_id',$user->district_id)
                        ->where('upazila_id',$user->upazila_id)
                        ->where('created_by',$user->id)
                        ->where('survey_form_id',$formId)
                        // ->where('status',2)
                        ->where('status','<>',6)
                        ->first();
                
                if($formId == 1) // shangkalan 1
                {
                    
                    return view('backend.admin.survey.upazilaIndex',[
                        'lists'=>$lists,
                        'list'=>$list
                    ]);
                }
                elseif($formId == 2) // tofsil 1
                {
                    
                    $crops = Crop::where('status',1)->get();
                    return view('backend.admin.survey.upazilaClusterIndex',[
                        'lists'=>$lists,
                        'crops'=>$crops,
                        'list'=>$list
                    ]); 
                }
                elseif($formId == 3) // tofsil 3
                {
                    
                    return view('backend.admin.survey.upazilaTemporaryCropIndex',[
                        'lists'=>$lists,
                        'list'=>$list
                    ]);
                }
                elseif($formId == 4) // tofsil 4
                {
                    return view('backend.admin.survey.perennialCropIndex',[
                        'lists'=>$lists,
                        'list' => $list
                    ]);
                }
                elseif($formId == 5) // tofsil 2
                {
                    return view('backend.admin.survey.cropCuttingProductionIndex',[
                        'lists'=>$lists,
                        'list' => $list
                    ]);
                }
                elseif($formId == 6) // tofsil 6
                {
                    return view('backend.admin.survey.mazeProductionIndex',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 7) // tofsil 5
                {
                    return view('backend.admin.survey.potatoProductionIndex',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 8) // tofsil 8
                {
                    return view('backend.admin.survey.tofsil8Index',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 10) // tofsil 10
                {
                    return view('backend.admin.survey.tofsil10Index',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 11) // tofsil 11
                {
                    return view('backend.admin.survey.tofsil11Index',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 12) // tofsil 7
                {
                    return view('backend.admin.survey.tofsil7Index',[
                        'lists'=>$lists
                    ]);
                }
                elseif($formId == 13) // tofsil 9
                {
                    if (Auth::user()->upazila_id == '') {
                        return view('backend.admin.survey.tofsil9Index',[
                            'lists' => $lists,
                            'list'  => $list
                        ]);
                    } else {
                        $tofsil9datas = SurveyTofsilForm9::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->latest()->paginate(15);
        
                        return view('backend.admin.survey.showUpazilaTofsil9List',[
                            'tofsil9datas'  => $tofsil9datas,
                            'lists'         => $lists,
                            'listData'      => $list
                        ]);
                    }
                }
                
            }
        }

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
        //
    }

    // District tofsil 11
    public function districtTofsil11(SurveyProcessList $list)
    {
        $tofsil11datas = SurveyTofsilForm11::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->groupBy('upazila_id')->get();
        $damageReason = SurveyTofsilForm11::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->first();
        $startDate = SurveyTofsilForm11::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->min('loss_period_start_date');
        $endDate = SurveyTofsilForm11::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->max('loss_period_end_date');

        $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();

        return view('backend.admin.survey.showDistrictTofsil11', compact('list', 'tofsil11datas', 'damageReason', 'startDate', 'endDate', 'surveyNotification'));
    }

    // Division tofsil 11
    public function divisionTofsil11(SurveyProcessList $list)
    {
        $tofsil11datas = SurveyTofsilForm11::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->groupBy('district_id')->get();

        $damageReason = SurveyTofsilForm11::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->first();

        $startDate = SurveyTofsilForm11::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->min('loss_period_start_date');

        $endDate = SurveyTofsilForm11::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->max('loss_period_end_date');
        
        $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();

        return view('backend.admin.survey.showDivisionTofsil11', compact('list', 'tofsil11datas', 'damageReason', 'startDate', 'endDate', 'surveyNotification'));
    }

    // DG tofsil 11
    public function DgTofsil11(SurveyProcessList $list)
    {
        $tofsil11datas = SurveyTofsilForm11::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->groupBy('division_id')->get();
        $damageReason = SurveyTofsilForm11::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->first();
        $startDate = SurveyTofsilForm11::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->min('loss_period_start_date');
        $endDate = SurveyTofsilForm11::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->max('loss_period_end_date');

        $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();

        return view('backend.admin.survey.DgTofsil11', compact('list', 'tofsil11datas', 'damageReason', 'startDate', 'endDate', 'surveyNotification'));
    }

    public function showDgTofsil9(SurveyProcessList $list)
    {
        $lists = SurveyTofsilForm9::where('district_id',$list->district_id)->where('survey_notification_id',$list->survey_notification_id)->latest()->paginate(15);

        return view('backend.admin.survey.showDgTofsil9', [
            'lists' =>$lists,
            'data' =>$list
        ]);

    }

    public function showDivisionTofsil9(SurveyProcessList $list)
    {
        $lists = SurveyTofsilForm9::where('upazila_id',$list->upazila_id)->where('survey_notification_id',$list->survey_notification_id)->latest()->paginate(15);
        
        return view('backend.admin.survey.showDivisionTofsil9', [
            'data'=> $list,
            'lists' =>$lists
        ]);
    }

    public function showDgShankalan7(SurveyProcessList $list)
    {
        $shankalan7datas = SurveyTofsilForm7::where('survey_notification_id', $list->survey_notification_id)->where('division_id', $list->division_id)->groupBy('district_id')->get();
        
        $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();
        
        $cropName = SurveyTofsilForm7::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', 
        
        $list->upazila_id)->first();

        return view('backend.admin.survey.showDgShankalan7', compact('list','shankalan7datas', 'surveyNotification','cropName'));

    }

    public function showDistrictShankalan7(SurveyProcessList $list)
    {
        $shankalan7datas = SurveyTofsilForm7::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->get();

        $cropName = SurveyTofsilForm7::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->first();
        
        return view('backend.admin.survey.showReportDistrictShankalan7', compact('list','shankalan7datas','cropName'));

    }
    
    public function showDistrictTofsil10(SurveyProcessList $list)
    {
        $tofsil10sdata = SurveyTofsilForm10::where('survey_notification_id', $list->survey_notification_id)->where('district_id', $list->district_id)->groupBy('upazila_id')->get();
        
        // $tofsil10sdatas = SurveyTofsilForm10::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->get();

        $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();
            
        
        return view('backend.admin.survey.showDistrictTofsil10', compact('list','tofsil10sdata', 'surveyNotification'));
    }

    public function showDivisionShankalan7(SurveyProcessList $list)
    {
        $shankalan7datas = SurveyTofsilForm7::where('survey_notification_id', $list->survey_notification_id)->where('district_id', $list->district_id)->groupBy('upazila_id')->get();
        
        $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();
        
        $cropName = SurveyTofsilForm7::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', 
        
        $list->upazila_id)->first();
        
        return view('backend.admin.survey.showDistrictTofsil7', compact('list','shankalan7datas', 'surveyNotification','cropName'));
    }

    // Comment Upazila tofsil-3
    public function commentUpazilaTofsil3(Request $request, SurveyProcessList $list)
    {
        $processList = SurveyProcessList::where('id', $list->id)->first();
        $check = SurveyCompilation::where('survey_process_list_id', $processList->id)
                                ->where('survey_notification_id', $processList->survey_notification_id)
                                ->where('division_id', $processList->division_id)
                                ->where('district_id', $processList->district_id)
                                ->where('upazila_id', $processList->upazila_id)
                                ->where('level', 1)->first();
        if($check){
            $surveyCompilation = $check;
            $surveyCompilation->updated_by = Auth::user()->id;
        }else{
            $surveyCompilation = new SurveyCompilation;
            $surveyCompilation->created_by = Auth::user()->id;
        }
        $surveyCompilation->survey_process_list_id = $processList->id;
        $surveyCompilation->survey_notification_id = $processList->survey_notification_id;
        $surveyCompilation->survey_form_id = $processList->survey_form_id;
        $surveyCompilation->level = 1;
        $surveyCompilation->division_id = $processList->division_id;
        $surveyCompilation->district_id = $processList->district_id;
        $surveyCompilation->upazila_id = $processList->upazila_id;
        $surveyCompilation->bunch_stains_id = $processList->bunch_stains_id;
        $surveyCompilation->union_id = $processList->union_id;
        $surveyCompilation->mouza_id = $processList->mouja_id;
        $surveyCompilation->field_reason = $request->field_reason;
        $surveyCompilation->production_reason = $request->production_reason;
        $surveyCompilation->yield_reason = $request->yield_reason;

        $done = $surveyCompilation->save();

        if($done){
            return redirect()->back()->with('success', 'Comment added successfully...!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong, Please refresh and try again...!');
        }

    }
    // Comment District tofsil-3
    public function commentDistrictTofsil3(Request $request, SurveyProcessList $list)
    {
        $processList = SurveyProcessList::where('id', $list->id)->first();
        $check = SurveyCompilation::where('survey_process_list_id', $processList->id)
                                ->where('survey_notification_id', $processList->survey_notification_id)
                                ->where('division_id', $processList->division_id)
                                ->where('district_id', $processList->district_id)
                                ->where('upazila_id', $processList->upazila_id)
                                ->where('level', 2)->first();
        if($check){
            $surveyCompilation = $check;
            $surveyCompilation->updated_by = Auth::user()->id;
        }else{
            $surveyCompilation = new SurveyCompilation;
            $surveyCompilation->created_by = Auth::user()->id;
        }
        $surveyCompilation->survey_process_list_id = $processList->id;
        $surveyCompilation->survey_notification_id = $processList->survey_notification_id;
        $surveyCompilation->survey_form_id = $processList->survey_form_id;
        $surveyCompilation->level = 2;
        $surveyCompilation->division_id = $processList->division_id;
        $surveyCompilation->district_id = $processList->district_id;
        $surveyCompilation->upazila_id = $processList->upazila_id;
        $surveyCompilation->bunch_stains_id = $processList->bunch_stains_id;
        $surveyCompilation->union_id = $processList->union_id;
        $surveyCompilation->mouza_id = $processList->mouja_id;
        $surveyCompilation->weather = $request->weather;
        $surveyCompilation->weather_loss_percentage = $request->weather_loss_percentage;
        $surveyCompilation->field_reason = $request->field_reason;
        $surveyCompilation->production_reason = $request->production_reason;
        $surveyCompilation->yield_reason = $request->yield_reason;

        $done = $surveyCompilation->save();

        if($done){
            return redirect()->back()->with('success', 'Comment added successfully...!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong, Please refresh and try again...!');
        }
    }
    // Comment Division tofsil-3
    public function commentDivisionTofsil3(Request $request, SurveyProcessList $list)
    {
        $processList = SurveyProcessList::where('id', $list->id)->first();
        $check = SurveyCompilation::where('survey_process_list_id', $processList->id)
                                ->where('survey_notification_id', $processList->survey_notification_id)
                                ->where('division_id', $processList->division_id)
                                ->where('district_id', $processList->district_id)
                                ->where('upazila_id', $processList->upazila_id)
                                ->where('level', 3)->first();
        if($check){
            $surveyCompilation = $check;
            $surveyCompilation->updated_by = Auth::user()->id;
        }else{
            $surveyCompilation = new SurveyCompilation;
            $surveyCompilation->created_by = Auth::user()->id;
        }
        $surveyCompilation->survey_process_list_id = $processList->id;
        $surveyCompilation->survey_notification_id = $processList->survey_notification_id;
        $surveyCompilation->survey_form_id = $processList->survey_form_id;
        $surveyCompilation->level = 3;
        $surveyCompilation->division_id = $processList->division_id;
        $surveyCompilation->district_id = $processList->district_id;
        $surveyCompilation->upazila_id = $processList->upazila_id;
        $surveyCompilation->bunch_stains_id = $processList->bunch_stains_id;
        $surveyCompilation->union_id = $processList->union_id;
        $surveyCompilation->mouza_id = $processList->mouja_id;
        $surveyCompilation->weather = $request->weather;
        $surveyCompilation->weather_loss_percentage = $request->weather_loss_percentage;
        $surveyCompilation->field_reason = $request->field_reason;
        $surveyCompilation->production_reason = $request->production_reason;
        $surveyCompilation->yield_reason = $request->yield_reason;

        $done = $surveyCompilation->save();

        if($done){
            return redirect()->back()->with('success', 'Comment added successfully...!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong, Please refresh and try again...!');
        }
    }

    // Comment Upazila tofsil-4
    public function commentUpazilaTofsil4(Request $request, SurveyProcessList $list)
    {
        $processList = SurveyProcessList::where('id', $list->id)->first();
        $check = SurveyCompilation::where('survey_process_list_id', $processList->id)
                                ->where('survey_notification_id', $processList->survey_notification_id)
                                ->where('division_id', $processList->division_id)
                                ->where('district_id', $processList->district_id)
                                ->where('upazila_id', $processList->upazila_id)
                                ->where('level', 1)->first();
        if($check){
            $surveyCompilation = $check;
            $surveyCompilation->updated_by = Auth::user()->id;
        }else{
            $surveyCompilation = new SurveyCompilation;
            $surveyCompilation->created_by = Auth::user()->id;
        }
        
        $surveyCompilation->survey_process_list_id = $processList->id;
        $surveyCompilation->survey_notification_id = $processList->survey_notification_id;
        $surveyCompilation->survey_form_id = $processList->survey_form_id;
        $surveyCompilation->level = 1;
        $surveyCompilation->division_id = $processList->division_id;
        $surveyCompilation->district_id = $processList->district_id;
        $surveyCompilation->upazila_id = $processList->upazila_id;
        $surveyCompilation->bunch_stains_id = $processList->bunch_stains_id;
        $surveyCompilation->union_id = $processList->union_id;
        $surveyCompilation->mouza_id = $processList->mouja_id;
        $surveyCompilation->production_reason = $request->production_reason;
        $surveyCompilation->yield_reason = $request->yield_reason;

        $done = $surveyCompilation->save();
        
        if($done){
            return redirect()->back()->with('success', 'Comment added successfully...!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong, Please refresh and try again...!');
        }
    }
    // Comment District tofsil-4
    public function commentDistrictTofsil4(Request $request, SurveyProcessList $list)
    {
        $processList = SurveyProcessList::where('id', $list->id)->first();
        $check = SurveyCompilation::where('survey_process_list_id', $processList->id)
                                ->where('survey_notification_id', $processList->survey_notification_id)
                                ->where('division_id', $processList->division_id)
                                ->where('district_id', $processList->district_id)
                                ->where('upazila_id', $processList->upazila_id)
                                ->where('level', 2)->first();
        if($check){
            $surveyCompilation = $check;
            $surveyCompilation->updated_by = Auth::user()->id;
        }else{
            $surveyCompilation = new SurveyCompilation;
            $surveyCompilation->created_by = Auth::user()->id;
        }
        
        $surveyCompilation->survey_process_list_id = $processList->id;
        $surveyCompilation->survey_notification_id = $processList->survey_notification_id;
        $surveyCompilation->survey_form_id = $processList->survey_form_id;
        $surveyCompilation->level = 2;
        $surveyCompilation->division_id = $processList->division_id;
        $surveyCompilation->district_id = $processList->district_id;
        $surveyCompilation->upazila_id = $processList->upazila_id;
        $surveyCompilation->bunch_stains_id = $processList->bunch_stains_id;
        $surveyCompilation->union_id = $processList->union_id;
        $surveyCompilation->mouza_id = $processList->mouja_id;
        $surveyCompilation->production_reason = $request->production_reason;
        $surveyCompilation->yield_reason = $request->yield_reason;

        $done = $surveyCompilation->save();

        if($done){
            return redirect()->back()->with('success', 'Comment added successfully...!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong, Please refresh and try again...!');
        }
    }

    // Comment Division tofsil-4
    public function commentDivisionTofsil4(Request $request, SurveyProcessList $list)
    {
        $processList = SurveyProcessList::where('id', $list->id)->first();

        $check = SurveyCompilation::where('survey_process_list_id', $processList->id)
                                    ->where('survey_notification_id', $processList->survey_notification_id)
                                    ->where('division_id', $processList->division_id)
                                    ->where('district_id', $processList->district_id)
                                    ->where('upazila_id', $processList->upazila_id)
                                    ->where('level', 3)->first();

        if($check){
            $surveyCompilation = $check;
            $surveyCompilation->updated_by = Auth::user()->id;
        }else{
            $surveyCompilation = new SurveyCompilation;
            $surveyCompilation->created_by = Auth::user()->id;
        }

        $surveyCompilation->survey_process_list_id = $processList->id;
        $surveyCompilation->survey_notification_id = $processList->survey_notification_id;
        $surveyCompilation->survey_form_id = $processList->survey_form_id;
        $surveyCompilation->level = 3;
        $surveyCompilation->division_id = $processList->division_id;
        $surveyCompilation->district_id = $processList->district_id;
        $surveyCompilation->upazila_id = $processList->upazila_id;
        $surveyCompilation->bunch_stains_id = $processList->bunch_stains_id;
        $surveyCompilation->union_id = $processList->union_id;
        $surveyCompilation->mouza_id = $processList->mouja_id;
        $surveyCompilation->production_reason = $request->production_reason;
        $surveyCompilation->yield_reason = $request->yield_reason;

        $done = $surveyCompilation->save();

        if($done){
            return redirect()->back()->with('success', 'Comment added successfully...!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong, Please refresh and try again...!');
        }
    }

    // Comment Upazila Tofsil - 6
    public function commentUpazilaTofsil6(Request $request, SurveyProcessList $list)
    {
        $processList = SurveyProcessList::where('id', $list->id)->first();

        $check = SurveyCompilation::where('survey_process_list_id', $processList->id)
                                ->where('survey_notification_id', $processList->survey_notification_id)
                                ->where('division_id', $processList->division_id)
                                ->where('district_id', $processList->district_id)
                                ->where('upazila_id', $processList->upazila_id)
                                ->where('level', 1)->first();

        if($check){
            $surveyCompilation = $check;
            $surveyCompilation->updated_by = Auth::user()->id;
        }else{
            $surveyCompilation = new SurveyCompilation;
            $surveyCompilation->created_by = Auth::user()->id;
        }
        
        $surveyCompilation->survey_process_list_id = $processList->id;
        $surveyCompilation->survey_notification_id = $processList->survey_notification_id;
        $surveyCompilation->survey_form_id = $processList->survey_form_id;
        $surveyCompilation->level = 1;
        $surveyCompilation->division_id = $processList->division_id;
        $surveyCompilation->district_id = $processList->district_id;
        $surveyCompilation->upazila_id = $processList->upazila_id;
        $surveyCompilation->bunch_stains_id = $processList->bunch_stains_id;
        $surveyCompilation->union_id = $processList->union_id;
        $surveyCompilation->mouza_id = $processList->mouja_id;
        $surveyCompilation->field_reason = $request->field_reason;
        $surveyCompilation->production_reason = $request->production_reason;
        $surveyCompilation->yield_reason = $request->yield_reason;

        $done = $surveyCompilation->save();
        
        if($done){
            return redirect()->back()->with('success', 'Comment added successfully...!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong, Please refresh and try again...!');
        }
    }

    // Comment District tofsil-6
    public function commentDistrictTofsil6(Request $request, SurveyProcessList $list)
    {
        $processList = SurveyProcessList::where('id', $list->id)->first();

        $check = SurveyCompilation::where('survey_process_list_id', $processList->id)
                                ->where('survey_notification_id', $processList->survey_notification_id)
                                ->where('division_id', $processList->division_id)
                                ->where('district_id', $processList->district_id)
                                ->where('upazila_id', $processList->upazila_id)
                                ->where('level', 2)->first();

        if($check){
            $surveyCompilation = $check;
            $surveyCompilation->updated_by = Auth::user()->id;
        }else{
            $surveyCompilation = new SurveyCompilation;
            $surveyCompilation->created_by = Auth::user()->id;
        }
        
        $surveyCompilation->survey_process_list_id = $processList->id;
        $surveyCompilation->survey_notification_id = $processList->survey_notification_id;
        $surveyCompilation->survey_form_id = $processList->survey_form_id;
        $surveyCompilation->level = 2;
        $surveyCompilation->division_id = $processList->division_id;
        $surveyCompilation->district_id = $processList->district_id;
        $surveyCompilation->upazila_id = $processList->upazila_id;
        $surveyCompilation->bunch_stains_id = $processList->bunch_stains_id;
        $surveyCompilation->union_id = $processList->union_id;
        $surveyCompilation->mouza_id = $processList->mouja_id;
        $surveyCompilation->field_reason = $request->field_reason;
        $surveyCompilation->production_reason = $request->production_reason;
        $surveyCompilation->yield_reason = $request->yield_reason;

        $done = $surveyCompilation->save();

        if($done){
            return redirect()->back()->with('success', 'Comment added successfully...!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong, Please refresh and try again...!');
        }
    }


    // Comment Division tofsil-6
    public function commentDivisionTofsil6(Request $request, SurveyProcessList $list)
    {
        $processList = SurveyProcessList::where('id', $list->id)->first();

        $check = SurveyCompilation::where('survey_process_list_id', $processList->id)
                                ->where('survey_notification_id', $processList->survey_notification_id)
                                ->where('division_id', $processList->division_id)
                                ->where('district_id', $processList->district_id)
                                ->where('upazila_id', $processList->upazila_id)
                                ->where('level', 3)->first();

        if($check){
            $surveyCompilation = $check;
            $surveyCompilation->updated_by = Auth::user()->id;
        }else{
            $surveyCompilation = new SurveyCompilation;
            $surveyCompilation->created_by = Auth::user()->id;
        }
        
        $surveyCompilation->survey_process_list_id = $processList->id;
        $surveyCompilation->survey_notification_id = $processList->survey_notification_id;
        $surveyCompilation->survey_form_id = $processList->survey_form_id;
        $surveyCompilation->level = 3;
        $surveyCompilation->division_id = $processList->division_id;
        $surveyCompilation->district_id = $processList->district_id;
        $surveyCompilation->upazila_id = $processList->upazila_id;
        $surveyCompilation->bunch_stains_id = $processList->bunch_stains_id;
        $surveyCompilation->union_id = $processList->union_id;
        $surveyCompilation->mouza_id = $processList->mouja_id;
        $surveyCompilation->field_reason = $request->field_reason;
        $surveyCompilation->production_reason = $request->production_reason;
        $surveyCompilation->yield_reason = $request->yield_reason;

        $done = $surveyCompilation->save();

        if($done){
            return redirect()->back()->with('success', 'Comment added successfully...!');
        }else{
            return redirect()->back()->with('error', 'Something went wrong, Please refresh and try again...!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SurveyProcessList $list)
    {
        $formId = $list->survey_form_id;
        
        if($list->survey_form_id == 1)
        {
            
        
            $farmersData = SurveyCompilationCollectForm1::where('survey_notification_id',$list->survey_notification_id)->where('mouja_id',$list->mouja_id)->get();
            
            
            return view('backend.admin.survey.show',[
                'farmersDatas' => $farmersData,
                'list' => $list
            ]);
        }
        elseif($list->survey_form_id == 2)
        {
            $clusters = SurveyTofsilForm1::where('survey_notification_id',$list->survey_notification_id);
            $totalclusters = SurveyTofsilForm1::where('survey_notification_id',$list->survey_notification_id)->where('bunch_stains_id',$list->bunch_stains_id)->get();

            
            return view('backend.admin.survey.clusterForm',[
                'clusters' => $clusters,
                'list' => $list,
                'totalclusters'=>$totalclusters
            ]);
        }
        elseif($list->survey_form_id == 3)
        {
            
            $temporaryCrops = SurveyTofsilForm3::where('survey_notification_id', $list->survey_notification_id)->where('mouza_id',$list->mouja_id)->groupBy('union_id')->where('upazila_id',Auth::user()->upazila_id)->get();
            
            $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();
            $comment = SurveyCompilation::where('survey_process_list_id', $list->id)->first();
           
            return view('backend.admin.survey.showTofsil3',[
                'temporaryCrops' => $temporaryCrops,
                'surveyNotification' => $surveyNotification,
                'list' => $list,
                'comment' => $comment
            ]);
        }

        elseif($list->survey_form_id == 4)
        {
            
            $peremmialCrops = SurveyTofsilForm4::where('survey_notification_id', $list->survey_notification_id)->where('mouza_id',$list->mouja_id)->groupBy('union_id')->get();
            
            $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();
            
            foreach($peremmialCrops as $cropname)
            {
                $cropData = $cropname->crop;
                break;
            }
            
            return view('backend.admin.survey.showTofsil4',[
                'peremmialCrops' => $peremmialCrops,
                'surveyNotification' => $surveyNotification,
                'list' => $list,
                'cropData'=>$cropData
            ]);
        }
        elseif($list->survey_form_id == 5)
        {
            
            $cropCuttingProducts = SurveyTofsilForm2::where('survey_notification_id',$list->survey_notification_id)->where('mouza_id',$list->mouja_id)->first();
            
            $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();
            
            $farmersData = SurveyTofsilForm2AllFarmer::where('survey_process_list_id',$list->id)->where('survey_tofsil_form2_id',$cropCuttingProducts->id)->get();
            // dd($farmersData);
            return view('backend.admin.survey.showTofsil2',[
                'cropCuttingProducts' => $cropCuttingProducts,
                'surveyNotification' => $surveyNotification,
                'list' => $list,
                'farmersData'=>$farmersData
            ]);
        }
        elseif($list->survey_form_id == 6)
        {
            $maizes = SurveyTofsilForm3Maize::where('survey_notification_id', $list->survey_notification_id)->where('mouza_id', $list->mouja_id)->groupBy('union_id')->get();
            
            foreach($maizes as $maize){
                $season = $maize->season;
                break;
            }

            $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();
            $upazilaTotalData = SurveyTofsilForm3Maize::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->get();
            $comment = SurveyCompilation::where('survey_process_list_id', $list->id)->where('level', 1)->first();
            
            return view('backend.admin.survey.showTofsil6', compact('list', 'maizes', 'surveyNotification', 'season', 'upazilaTotalData', 'comment'));
        }
        elseif($list->survey_form_id == 7)
        {
            $potatos = SurveyTofsilForm5::where('survey_notification_id', $list->survey_notification_id)->where('mouza_id', $list->mouja_id)->groupBy('union_id')->get();
            
            foreach($potatos as $potato){
                $season = $potato->season;
                break;
            }

            $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();
            
            $upazilaTotalData = SurveyTofsilForm5::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->first();
            
            $farmersDatas = SurveyTofsilForm5AllFarmer::where('survey_tofsil_form5_id',$upazilaTotalData->id)->get();
            $comment = SurveyCompilation::where('survey_process_list_id', $list->id)->where('level', 1)->first();
            
            return view('backend.admin.survey.showTofsil5', compact('list', 'potatos', 'surveyNotification', 'season', 'upazilaTotalData', 'comment','farmersDatas'));
        }
        elseif($list->survey_form_id == 8)
        {
            
            $tofsil8sdata = SurveyTofsilForm8::where('survey_notification_id', $list->survey_notification_id)->where('cluster_id', $list->bunch_stains_id)->groupBy('upazila_id')->get();
            
            
            $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();
            
            $upazilaTotalData = SurveyTofsilForm8::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->where('cluster_id',$list->bunch_stains_id)->get();
            
            $comment = SurveyCompilation::where('survey_process_list_id', $list->id)->where('level', 1)->first();
            
            return view('backend.admin.survey.showTofsil8', compact('list', 'tofsil8sdata', 'surveyNotification', 'upazilaTotalData', 'comment'));
        }
        elseif($list->survey_form_id == 10)
        {
            $tofsil10sdata = SurveyTofsilForm10::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->get();
            
            $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();
            
            // $crop = SurveyTofsilForm10::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->first();
            // dd($surveyNotification->notification_start_data_field);
            return view('backend.admin.survey.showTofsil10', compact('list', 'tofsil10sdata', 'surveyNotification'));

        }
        elseif($list->survey_form_id == 11)
        {
            $tofsil11datas = SurveyTofsilForm11::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->get();
            $damageReason = SurveyTofsilForm11::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->first();
            $startDate = SurveyTofsilForm11::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->min('loss_period_start_date');
            $endDate = SurveyTofsilForm11::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->max('loss_period_end_date');

            $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();

            return view('backend.admin.survey.showTofsil11', compact('list', 'tofsil11datas', 'damageReason', 'startDate', 'endDate', 'surveyNotification'));
        }
        
    }

    public function showUpazilaTofsil7(SurveyTofsilForm7 $data)
    {
        
        $list = SurveyProcessList::find($data->survey_process_list_id);
        // dd($data);
        return view('backend.admin.survey.showTofsil7',['list'=>$data]);
    }

    // farmers form report for district level
    public function farmerReportDistrict(SurveyProcessList $list, $district_id)
    {
        $farmersData = SurveyCompilationCollectForm1::where('district_id',$district_id)->get();

        return view('backend.admin.survey.farmerReportDistrict',[
            'farmersDatas' => $farmersData,
            'list' => $list
        ]);
    }

    public function agriclutureFarmerReportDistrict(SurveyProcessList $list, $district_id)
    {
        $farmersData = SurveyCompilationCollectForm1::where('district_id',$district_id)->where('food_type',1)->get();
        // dd($farmersData);
        return view('backend.admin.survey.farmerReportDistrict',[
            'farmersDatas' => $farmersData,
            'list' => $list
        ]);
    }

    public function districtReportShankalan8(SurveyProcessList $list, $district_id)
    {
        // atiq 007
        $upazilaDatas = SurveyTofsilForm8::where('survey_notification_id', $list->survey_notification_id)
                        ->where('district_id', $district_id)->groupBy('upazila_id')->get();
        
        return view('backend.admin.survey.districtReportShankalan8',[
            'upazilaDatas' => $upazilaDatas,
            'list'=>$list
        ]);
    }

    public function divisionReportShankalan8(SurveyProcessList $list, $division_id)
    {
        $divisionDatas = SurveyTofsilForm8::where('survey_notification_id', $list->survey_notification_id)
                        ->where('division_id', $division_id)->groupBy('district_id')->get();
        return view('backend.admin.survey.divisionReportShankalan8_ext',[
            'divisionDatas' => $divisionDatas,
            'list'=>$list
        ]);
    }

    public function allWagesData(SurveyProcessList $list)
    {
        $allDatas = SurveyTofsilForm8::where('survey_notification_id', $list->survey_notification_id)->groupBy('division_id')->get();
        
        return view('backend.admin.survey.allWagesData',[
            'allDatas' => $allDatas,
            'list'=>$list
        ]);
    }

    public function divisionWages(SurveyProcessList $list, $division_id)
    {
        $divisionDatas = SurveyTofsilForm8::where('survey_notification_id', $list->survey_notification_id)
                        ->where('district_id', $division_id)->groupBy('upazila_id')->get();
        
        return view('backend.admin.survey.divisionReportShankalan8',[
            'divisionDatas' => $divisionDatas,
            'list'=>$list
        ]);
    }

    // farmers form report for division level
    public function farmerReportDivision( SurveyProcessList $list, $district_id)
    {
        
        $farmersData = SurveyCompilationCollectForm1::where('district_id',$district_id)->get();

        return view('backend.admin.survey.farmerReportDivision',[
            'farmersDatas' => $farmersData,
            'list' => $list
        ]);
    }

    public function farmerReportOk(SurveyProcessList $list, $division_id)
    {
        $farmersData = SurveyCompilationCollectForm1::where('division_id',$division_id)->get();

        return view('backend.admin.survey.farmerReportOk',[
            'farmersDatas' => $farmersData,
            'list' => $list
        ]);
    }

    public function upazilaTemporaryData(SurveyProcessList $list)
    {
        
        if($list->survey_form_id ==8 ){
            $user = Auth::user();
            $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();
            $datas = SurveyTofsilForm8::where('upazila_id',$user->upazila_id)->groupBy('cluster_id')->get();
            
            return view('backend.admin.survey.upazilaTofsil8Report',[                
                'surveyNotification'=>$surveyNotification,
                'datas'=>$datas,              
                'list'=>$list
            ]);
        }
        else{
            
            $temporaryCrops = SurveyTofsilForm3::where('survey_notification_id', $list->survey_notification_id)->groupBy('mouza_id')->where('upazila_id',$list->upazila_id)->get();
            
            $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();

            $comment = SurveyCompilation::where('survey_process_list_id', $list->id)->where('level', 1)->first();
            
            return view('backend.admin.survey.upazilaTemporaryCropReport',[
                'temporaryCrops' => $temporaryCrops,
                'surveyNotification' => $surveyNotification,
                'list' => $list,
                'comment' => $comment
            ]);
            // return view('backend.admin.survey.upazilaTemporaryReport',[
            //     'temporaryCrops' => $temporaryCrops,
            //     'surveyNotification' => $surveyNotification,
            //     'list' => $list,
            //     'comment' => $comment
            // ]);
        }
    }

    public function upazilaPerennialData(SurveyProcessList $list)
    {
        
        $perennialDatas = SurveyTofsilForm4::where('survey_notification_id', $list->survey_notification_id)->groupBy('union_id')->where('upazila_id',$list->upazila_id)->get();
        foreach($perennialDatas as $cropname)
        {
            $cropData = $cropname->crop;
            break;
        }
        $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();

        $comment = SurveyCompilation::where('survey_process_list_id', $list->id)->where('level', 1)->first();
        
        return view('backend.admin.survey.upazilaPerennialCropData',[
            'perennialDatas' => $perennialDatas,
            'surveyNotification' => $surveyNotification,
            'list' => $list,
            'cropData'=> $cropData,
            'comment' => $comment
        ]);

        // return view('backend.admin.survey.upazilaPerennialData',[
        //     'perennialDatas' => $perennialDatas,
        //     'surveyNotification' => $surveyNotification,
        //     'list' => $list,
        //     'cropData'=> $cropData,
        //     'comment' => $comment
        // ]);
    }

    public function upazilaClusterData(SurveyProcessList $list)
    {
        $clusters = SurveyTofsilForm1::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id',$list->upazila_id);

        $totalclusters = SurveyTofsilForm1::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id',$list->upazila_id)->get();
        
        return view('backend.admin.survey.upazilaClusterData',[
            'clusters' => $clusters,
            'list' => $list,
            'totalclusters'=>$totalclusters

        ]);
        
    }

    public function districtClusterData(SurveyProcessList $list)
    {
        
        $clusters = SurveyTofsilForm1::where('survey_notification_id', $list->survey_notification_id)->where('district_id',$list->district_id);
        $totalclusters = SurveyTofsilForm1::where('survey_notification_id', $list->survey_notification_id)->where('district_id',$list->district_id)->groupBy('upazila_id')->get();
        
        
        return view('backend.admin.survey.districtClusterData',[
            'clusters' => $clusters,
            'list' => $list,
            'totalclusters'=>$totalclusters

        ]);

    }

    public function divisionClusterData(SurveyProcessList $list)
    {
        $clusters = SurveyTofsilForm1::where('survey_notification_id', $list->survey_notification_id)->where('division_id',$list->division_id);

        $totalclusters = SurveyTofsilForm1::where('survey_notification_id', $list->survey_notification_id)->where('division_id',$list->division_id)->groupBy('district_id')->get();
        
        return view('backend.admin.survey.divisionClusterData',[
            'clusters' => $clusters,
            'list' => $list,
            'totalclusters'=>$totalclusters

        ]);
    }

    public function zilaTemporaryData(SurveyProcessList $list)
    {
        
        $temporaryCrops = SurveyTofsilForm3::where('survey_notification_id', $list->survey_notification_id)->where('district_id',$list->district_id)->groupBy('upazila_id')->get();
        $comment = SurveyCompilation::where('survey_process_list_id', $list->id)->where('level', 2)->first();
        $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();
        return view('backend.admin.survey.zilaTemporaryCropReport',[
            'temporaryCrops' => $temporaryCrops,
            'surveyNotification' => $surveyNotification,
            'list' => $list,
            'comment' => $comment
        ]);
        // return view('backend.admin.survey.zilaTemporaryReport',[
        //     'temporaryCrops' => $temporaryCrops,
        //     'surveyNotification' => $surveyNotification,
        //     'list' => $list,
        //     'comment' => $comment
        // ]);
    }

    public function zilaPerennialCropData(SurveyProcessList $list)
    {
        $perennialDatas = SurveyTofsilForm4::where('survey_notification_id', $list->survey_notification_id)->groupBy('upazila_id')->where('district_id',$list->district_id)->get();

        foreach($perennialDatas as $cropname)
        {
            $cropData = $cropname->crop;
            break;
        }
        $comment = SurveyCompilation::where('survey_process_list_id', $list->id)->where('level', 2)->first();
        $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();
        
        return view('backend.admin.survey.zilaPerennialCropCuttingData',[
            'perennialDatas' => $perennialDatas,
            'surveyNotification' => $surveyNotification,
            'list' => $list,
            'cropData'=>$cropData,
            'comment' => $comment
        ]);

        // return view('backend.admin.survey.zilaPerennialCropData',[
        //     'perennialDatas' => $perennialDatas,
        //     'surveyNotification' => $surveyNotification,
        //     'list' => $list,
        //     'cropData'=>$cropData,
        //     'comment' => $comment
        // ]);
    }

    public function divisionTemporaryData(SurveyProcessList $list)
    {
        $temporaryCrops = SurveyTofsilForm3::where('survey_notification_id', $list->survey_notification_id)->groupBy('district_id')->where('division_id',$list->division_id)->get();
            
        $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();

        $comment = SurveyCompilation::where('survey_process_list_id', $list->id)->where('level', 3)->first();

        return view('backend.admin.survey.divisionTemporaryCropData',[
            'temporaryCrops' => $temporaryCrops,
            'surveyNotification' => $surveyNotification,
            'list' => $list,
            'comment' => $comment
        ]);

        // return view('backend.admin.survey.divisionTemporaryData',[
        //     'temporaryCrops' => $temporaryCrops,
        //     'surveyNotification' => $surveyNotification,
        //     'list' => $list,
        //     'comment' => $comment
        // ]);
    }
// working here sonkolon 4 on DG panel
    public function divisionPermanentData(SurveyProcessList $list)
    {
        
        $perennialDatas = SurveyTofsilForm4::where('survey_notification_id', $list->survey_notification_id)->groupBy('district_id')->where('division_id',$list->division_id)->get();
        foreach($perennialDatas as $cropname)
        {
            $cropData = $cropname->crop;
            break;
        }
            
        $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();
        $comment = SurveyCompilation::where('survey_process_list_id', $list->id)->where('level', 3)->first();
        
        return view('backend.admin.survey.divisionPermanentCropData',[
            'perennialDatas' => $perennialDatas,
            'surveyNotification' => $surveyNotification,
            'list' => $list,
            'cropData'=> $cropData,
            'comment' => $comment
        ]);

        // return view('backend.admin.survey.divisionPermanentData',[
        //     'perennialDatas' => $perennialDatas,
        //     'surveyNotification' => $surveyNotification,
        //     'list' => $list,
        //     'cropData'=> $cropData,
        //     'comment' => $comment
        // ]);
    }

    // District maize (tofsil-6) report
    public function showDistrictShonkolon6(SurveyProcessList $list)
    {
        $maizes = SurveyTofsilForm3Maize::where('survey_notification_id', $list->survey_notification_id)->groupBy('upazila_id')->where('district_id', $list->district_id)->get();

        $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();
        $comment = SurveyCompilation::where('survey_process_list_id', $list->id)->where('level', 1)->first();
        
        return view('backend.admin.survey.districtMaizeCropReport', compact('list', 'maizes', 'surveyNotification', 'comment'));
    }

    // Division maize (tofsil-6) report
    public function showDivisionShonkolon6(SurveyProcessList $list)
    {
        $maizes = SurveyTofsilForm3Maize::where('survey_notification_id', $list->survey_notification_id)->groupBy('district_id')->where('division_id', $list->division_id)->get();

        $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();
        $comment = SurveyCompilation::where('survey_process_list_id', $list->id)->where('level', 2)->first();
        
        return view('backend.admin.survey.divisionMaizeCropReport', compact('list', 'maizes', 'surveyNotification', 'comment'));
    }

    // DG maize (tofsil-6) report
    public function showDGShonkolon6(SurveyProcessList $list)
    {
        $maizes = SurveyTofsilForm3Maize::where('survey_notification_id', $list->survey_notification_id)->groupBy('division_id')->where('division_id', $list->division_id)->get();
        
        $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();
        $comment = SurveyCompilation::where('survey_process_list_id', $list->id)->where('level', 3)->first();
        
        return view('backend.admin.survey.dgMaizeCropReport', compact('list', 'maizes', 'surveyNotification', 'comment'));
    }

    public function showUpazila($list)
    {
        $role = Auth::user()->role_id;
        
        if($role == 3) //dg
        {
            $upazilas = SurveyProcessList::where('upazila_id',$list)->where('status',5)->latest()->paginate(15);

        }
        elseif($role == 17 ) // division
        {
            $upazilas = SurveyProcessList::where('upazila_id',$list)->where('status',4)->latest()->paginate(15);

        }
        elseif($role == 16 or $role == 4 ) // district
        {
            $upazilas = SurveyProcessList::where('upazila_id',$list)->where('status',3)->latest()->paginate(15);

        }
        elseif($role == 9 or $role == 4 ) // district
        {
            $upazilas = SurveyProcessList::where('upazila_id',$list)->where('status',2)->latest()->paginate(15);

        }
        
        return view('backend.admin.survey.showUpazila',[
            'lists' => $upazilas
        ]);
    }

    public function showDistrict($list,$form)
    {
        
        $role = Auth::user()->role_id;
        
        if($role == 3) //dg
        {
            $districts = SurveyProcessList::where('district_id',$list)->where('survey_form_id',$form)->where('status',5)->groupBy('upazila_id')->latest()->paginate(15);
        }
        elseif($role == 17 or $role == 4 ) // division
        {
            $districts = SurveyProcessList::where('district_id',$list)->where('survey_form_id',$form)->where('status',4)->groupBy('upazila_id')->latest()->paginate(15);

        }
        elseif($role == 16 or $role == 4 ) // district
        {
            $districts = SurveyProcessList::where('district_id',$list)->where('survey_form_id',$form)->where('status',3)->groupBy('upazila_id')->latest()->paginate(15);

        }
        elseif($role == 9 ) // district
        {
            $districts = SurveyProcessList::where('district_id',$list)->where('survey_form_id',$form)->where('status',2)->groupBy('upazila_id')->latest()->paginate(15);

        }
        
        return view('backend.admin.survey.showDistrict',[
            'lists' => $districts
        ]);
    }

    

    public function showAllDistrict($list,$form)
    {        
        $role = Auth::user()->role_id;

        if($role == 3) //dg
        {
            $districts = SurveyProcessList::where('division_id',$list)->where('survey_form_id',$form)->where('status',5)->groupBy('district_id')->latest()->paginate(15);

        }
        elseif($role == 17 or $role == 4 ) // division
        {
            $districts = SurveyProcessList::where('division_id',$list)->where('survey_form_id',$form)->where('status',4)->groupBy('district_id')->latest()->paginate(15);

        }
        elseif($role == 16 or $role == 4 ) // district
        {
            $districts = SurveyProcessList::where('division_id',$list)->where('survey_form_id',$form)->where('status',3)->groupBy('district_id')->latest()->paginate(15);

        }
        elseif($role == 9 ) // district
        {
            $districts = SurveyProcessList::where('division_id',$list)->where('survey_form_id',$form)->where('status',2)->groupBy('district_id')->latest()->paginate(15);

        }
        
        return view('backend.admin.survey.showAllDistrict',[
            'lists' => $districts
        ]);
    }

    public function showCluster($list)
    {
        $clustersData = SurveyTofsilForm1::where('upazila_id',$list)->latest()->paginate(15);
        return view('backend.admin.survey.allListOfClusters',[
            'clustersData' => $clustersData
        ]);
    }

    public function showDistrictCluster($list,$from)
    {
        
        $districts = SurveyTofsilForm1::where('district_id',$list)->groupBy('upazila_id')->latest()->paginate(15);
        
        return view('backend.admin.survey.showDistrictCluster',[
            'lists' => $districts
        ]);
    }

    public function allListOfFarmers(SurveyProcessList $list)
    {
        
        $farmersData = SurveyCompilationCollectForm1::where('survey_process_list_id',$list->id)->latest()->paginate(15);
        
        return view('backend.admin.survey.allListOfFarmers',[
            'farmersData' => $farmersData
        ]);
    }

    public function allListOfClusters(SurveyProcessList $list)
    {
        $clustersData = SurveyTofsilForm1::where('survey_process_list_id',$list->id)->latest()->paginate(15);
        
        return view('backend.admin.survey.allListOfClusters',[
            'clustersData' => $clustersData
        ]);
    }

    public function forwardToDistrict(SurveyProcessList $list)
    {
        $list->status = 3;
        $list->save();
        $currentUser = Auth::user();
        
        $receiver_user_id = User::where('role_id',4)->where('division_id','<>',null)->where('district_id',$currentUser->district_id)->first();
        
        // create log for record
        // $log = new SurveyProcessForwardingLog;
        // $log->survey_process_list_id = $list->id;
        // $log->forward_by = Auth::id();
        // $log->forward_to = $receiver_user_id->id;
        // $log->forward_date = date('d-m-Y');
        // $log->office_level = 3; // district office
        // $log->save();

        // // Generating notification for District DDG
        // $generateSurveyNotification = new GenerateSurveyNotification;
        // $generateSurveyNotification->receiver_id = $receiver_user_id->id;
        // $generateSurveyNotification->receiver_designation_id = $receiver_user_id->designation_id;
        // $generateSurveyNotification->survey_notification_id = $list->survey_notification_id;
        // $generateSurveyNotification->data = "You have received survey data. Please checkout.";
        // $generateSurveyNotification->sender_id = $currentUser->id;
        // $generateSurveyNotification->goto_url = route('admin.processingList.index', $list->survey_form_id);
        // $generateSurveyNotification->survey_form_id = $list->survey_form_id;
        // $generateSurveyNotification->read_status = 0;
        // $generateSurveyNotification->status = 1;
        // $generateSurveyNotification->save();

        return back()->with('success', 'Forward Successfully.');

        // return redirect()->route('admin.processingList.index',['formId' => $list])->with('success', 'Forward Successfully.');

    }

    public function forwardToDivision(SurveyProcessList $list)
    {
        
        $lists = SurveyProcessList::where('survey_notification_id',$list->survey_notification_id)->where('district_id',$list->district_id)->get();
        foreach($lists as $list)
        {
            $list->status = 4;
            $list->save();
        }
        $currentUser = Auth::user();
        $receiver_user_id = User::where('role_id',16)->orWhere('role_id',17)->where('division_id',$currentUser->division_id)->where('district_id',null)->first();
        
        // create log for record
        $log = new SurveyProcessForwardingLog;
        $log->survey_process_list_id = $list->id;
        $log->forward_by = Auth::id();
        $log->forward_to = $receiver_user_id->id;
        $log->forward_date = date('d-m-Y');
        $log->office_level = 2; // division office
        $log->save();

        // Generating notification for Division DDG
        $generateSurveyNotification = new GenerateSurveyNotification;
        $generateSurveyNotification->receiver_id = $receiver_user_id->id;
        $generateSurveyNotification->receiver_designation_id = $receiver_user_id->designation_id;
        $generateSurveyNotification->survey_notification_id = NULL;
        $generateSurveyNotification->data = "You have received survey data. Please checkout.";
        $generateSurveyNotification->sender_id = $currentUser->id;
        $generateSurveyNotification->goto_url = route('admin.processingList.index', $list->survey_form_id);
        $generateSurveyNotification->survey_form_id = NULL;
        $generateSurveyNotification->read_status = 0;
        $generateSurveyNotification->status = 1;
        $generateSurveyNotification->save();

        return back()->with('success', 'Forward Successfully.');

        // return redirect()->route('admin.processingList.index',['formId' => $list])->with('success', 'Forward Successfully.');
    }

    public function forwardToDg(SurveyProcessList $list)
    {
        
        $lists = SurveyProcessList::where('survey_notification_id',$list->survey_notification_id)->where('district_id',$list->district_id)->get();
        
        foreach($lists as $list)
        {
            $list->status = 5;
            $list->save();
        }
        $currentUser = Auth::user();
        $receiver_user_id = User::where('role_id',3)->first();

        // create log for record
        $log = new SurveyProcessForwardingLog;
        $log->survey_process_list_id = $list->id;
        $log->forward_by = Auth::id();
        $log->forward_to = $receiver_user_id->id;
        $log->forward_date = date('d-m-Y');
        $log->office_level = 1; // head office
        $log->save();

        // Generating notification for DG
        $generateSurveyNotification = new GenerateSurveyNotification;
        $generateSurveyNotification->receiver_id = $receiver_user_id->id;
        $generateSurveyNotification->receiver_designation_id = $receiver_user_id->designation_id;
        $generateSurveyNotification->survey_notification_id = NULL;
        $generateSurveyNotification->data = "You have received survey data. Please checkout.";
        $generateSurveyNotification->sender_id = $currentUser->id;
        $generateSurveyNotification->goto_url = route('admin.processingList.index', $list->survey_form_id);
        $generateSurveyNotification->survey_form_id = NULL;
        $generateSurveyNotification->read_status = 0;
        $generateSurveyNotification->status = 1;
        $generateSurveyNotification->save();
        return back()->with('success', 'Forward Successfully.');

        // return redirect()->route('admin.processingList.index',['formId' => $list])->with('success', 'Forward Successfully.');
    }

    public function forwardToApprove(SurveyProcessList $list)
    {
        $lists = SurveyProcessList::where('survey_notification_id',$list->survey_notification_id)->get();
        
        foreach($lists as $list)
        {
            
            $list->status = 6;
            $list->save();
        }

        $currentUser = Auth::user();
        
        // create log for record
        $log = new SurveyProcessForwardingLog;
        $log->survey_process_list_id = $list->id;
        $log->forward_by = Auth::id();
        $log->forward_to = Auth::id();
        $log->forward_date = date('d-m-Y');
        $log->office_level = 1; // head office
        $log->save();

        return back()->with('success', 'Forward Successfully.');

        // return redirect()->route('admin.processingList.index',['formId' => $list])->with('success', 'Forward Successfully.');
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

    public function backwardToDivision(SurveyProcessList $list)
    {
        
        $surveyProcessListId = $list->id;
        
        $lists = SurveyProcessList::where('survey_notification_id',$list->survey_notification_id)->get();
        
        foreach($lists as $list)
        {
            $list->status = 4;
            $list->save();
        }
        
        // $currentUser = Auth::user();
        
        // $receiver_user_id = SurveyProcessForwardingLog::where('survey_process_list_id', $list->id)
        //                     ->where('forward_to', $currentUser->id)
        //                     ->orderBy('id', 'DESC')->first();
        // // dd($receiver_user_id);
        // $receiverUser = User::where('id', $receiver_user_id->forward_by)->first();
        
        // // create log for record
        // $log = new SurveyProcessForwardingLog;
        // $log->survey_process_list_id = $list->id;
        // $log->backward_by = Auth::id();
        // $log->backward_to = $receiverUser->id;
        // $log->backward_date = date('d-m-Y');
        // $log->office_level = 2; // district office
        // $log->save();
        

        // // Generating notification for Division DDG
        // $generateSurveyNotification = new GenerateSurveyNotification;
        // $generateSurveyNotification->receiver_id = $receiverUser->id;
        // $generateSurveyNotification->receiver_designation_id = $receiverUser->designation_id;
        // $generateSurveyNotification->survey_notification_id = NULL;
        // $generateSurveyNotification->data = "Survey data returned to you, Please check.";
        // $generateSurveyNotification->sender_id = $currentUser->id;
        // $generateSurveyNotification->goto_url = route('admin.processingList.index', $list->survey_form_id);
        // $generateSurveyNotification->survey_form_id = NULL;
        // $generateSurveyNotification->read_status = 0;
        // $generateSurveyNotification->status = 1;
        // $generateSurveyNotification->save();

        return back()->with('success', 'Backward Successfully.');
        // return redirect()->route('admin.processingList.index',['formId' => $list])->with('success', 'Backward Successfully.');
    }

    public function backwardToDistrict(SurveyProcessList $list)
    {
        
        $surveyProcessListId = $list->id;
        $lists = SurveyProcessList::where('survey_notification_id',$list->survey_notification_id)->where('district_id',$list->district_id)->get();
        
        foreach($lists as $list)
        {
            
            $list->status = 3;
            $list->save();
        }
        $currentUser = Auth::user();
        // $receiver_user_id = User::where('role_id',4)->where('division_id',$currentUser->division_id)->first();
        $receiver_user_id = SurveyProcessForwardingLog::where('survey_process_list_id', $surveyProcessListId)
                            ->where('forward_to', $currentUser->id)
                            ->orderBy('id', 'DESC')->first();
        if($receiver_user_id)
        {
            $receiverUser = User::where('id', $receiver_user_id->forward_by)->first();
    
            // // create log for record
            $log = new SurveyProcessForwardingLog;
            $log->survey_process_list_id = $surveyProcessListId;
            $log->backward_by = Auth::id();
            $log->backward_to = $receiverUser->id;
            $log->backward_date = date('d-m-Y');
            $log->office_level = 2; // district office
            $log->save();
    
            // Generating notification for District DDG
            $generateSurveyNotification = new GenerateSurveyNotification;
            $generateSurveyNotification->receiver_id = $receiverUser->id;
            $generateSurveyNotification->receiver_designation_id = $receiverUser->designation_id;
            $generateSurveyNotification->survey_notification_id = NULL;
            $generateSurveyNotification->data = "Survey data returned to you, Please check.";
            $generateSurveyNotification->sender_id = $currentUser->id;
            $generateSurveyNotification->goto_url = route('admin.processingList.index', $list->survey_form_id);
            $generateSurveyNotification->survey_form_id = NULL;
            $generateSurveyNotification->read_status = 0;
            $generateSurveyNotification->status = 1;
            $generateSurveyNotification->save();
        }
        return back()->with('success', 'Backward Successfully.');

        // return redirect()->route('admin.processingList.index',['formId' => $list])->with('success', 'Backward Successfully.');
    }

    public function backwardToUpazila(SurveyProcessList $list)
    {
        $surveyProcessListId = $list->id;
        $lists = SurveyProcessList::where('survey_notification_id',$list->survey_notification_id)->where('upazila_id',$list->upazila_id)->get();
        
        // dd($surveyProcessListId);
        // dd($surveyProcessListId);
        
        foreach($lists as $list)
        {
            $list->status = 2;
            $list->save();
        }
        // $currentUser = Auth::user();
        // // $receiver_user_id = User::where('role_id',4)->where('division_id',$currentUser->division_id)->first();
        // // $receiver_user_id = SurveyProcessForwardingLog::where('survey_process_list_id', $surveyProcessListId)
        // //                     ->where('forward_to', $currentUser->id)
        // //                     ->orderBy('id', 'DESC')->first();
       
        // // $receiverUser = User::where('id', $receiver_user_id->forward_by)->first();

        // // // // create log for record
        // // $log = new SurveyProcessForwardingLog;
        // // $log->survey_process_list_id = $surveyProcessListId;
        // // $log->backward_by = Auth::id();
        // // $log->backward_to = $receiverUser->id;
        // // $log->backward_date = date('d-m-Y');
        // // $log->office_level = 2; // district office
        // // $log->save();

        // // // Generating notification for District DDG
        // // $generateSurveyNotification = new GenerateSurveyNotification;
        // // $generateSurveyNotification->receiver_id = $receiverUser->id;
        // // $generateSurveyNotification->receiver_designation_id = $receiverUser->designation_id;
        // // $generateSurveyNotification->survey_notification_id = NULL;
        // // $generateSurveyNotification->data = "Survey data returned to you, Please check.";
        // // $generateSurveyNotification->sender_id = $currentUser->id;
        // // $generateSurveyNotification->goto_url = route('admin.processingList.index', $list->survey_form_id);
        // // $generateSurveyNotification->survey_form_id = NULL;
        // // $generateSurveyNotification->read_status = 0;
        // // $generateSurveyNotification->status = 1;
        // // $generateSurveyNotification->save();

        return back()->with('success', 'Backward Successfully.');
        // return redirect()->route('admin.processingList.index',['formId' => $list])->with('success', 'Backward Successfully.');
    }

    public function backwardToUnion(SurveyProcessList $list)
    {
        $surveyProcessListId = $list->id;

        $lists = SurveyProcessList::where('survey_notification_id', $list->survey_notification_id)->get();

        $farmers = SurveyCompilationCollectForm1::where('survey_process_list_id', $list->id)->where('survey_notification_id', $list->survey_notification_id)->get();

        $clusters = SurveyTofsilForm1::where('survey_process_list_id', $list->id)->where('survey_notification_id', $list->survey_notification_id)->get();

        $temporaryCrops = SurveyTofsilForm3::where('survey_process_list_id', $list->id)->where('survey_notification_id', $list->survey_notification_id)->get();

        $perennials = SurveyTofsilForm4::where('survey_process_list_id', $list->id)->where('survey_notification_id', $list->survey_notification_id)->get();

        $cropCuttings = SurveyTofsilForm2::where('survey_process_list_id', $list->id)->where('survey_notification_id', $list->survey_notification_id)->get();

        $maizes = SurveyTofsilForm3Maize::where('survey_process_list_id', $list->id)->where('survey_notification_id', $list->survey_notification_id)->get();

        $tofsil5datas = SurveyTofsilForm5::where('survey_process_list_id', $list->id)->where('survey_notification_id', $list->survey_notification_id)->get();

        $tofsil7datas = SurveyTofsilForm7::where('survey_process_list_id', $list->id)->where('survey_notification_id', $list->survey_notification_id)->get();

        $tofsil8datas = SurveyTofsilForm8::where('survey_process_list_id', $list->id)->where('survey_notification_id', $list->survey_notification_id)->get();

        $tofsil10datas = SurveyTofsilForm10::where('survey_process_list_id', $list->id)->where('survey_notification_id', $list->survey_notification_id)->get();

        $surveyTofsilForm11Datas = SurveyTofsilForm11::where('survey_process_list_id', $list->id)->where('survey_notification_id', $list->survey_notification_id)->get();

        $tofsil7datas = SurveyTofsilForm7::where('survey_process_list_id', $list->id)->where('survey_notification_id', $list->survey_notification_id)->get();

        $tofsil9datas = SurveyTofsilForm9::where('survey_process_list_id', $list->id)->where('survey_notification_id', $list->survey_notification_id)->get();
        
        foreach($lists as $list)
        {
            $list->status = 1;
            $list->save();
        }

        if ($list->survey_form_id == 1) {
            foreach($farmers as $farmer) 
            {
                $farmer->status = 0;
                $farmer->save();
            }
        }
        if ($list->survey_form_id == 2) {
            foreach($clusters as $cluster) 
            {
                $cluster->status = 0;
                $cluster->save();
            }
        }
        if ($list->survey_form_id == 3) {
            foreach($temporaryCrops as $temporaryCrop) 
            {
                $temporaryCrop->status = 0;
                $temporaryCrop->save();
            }
        }
        if ($list->survey_form_id == 4) {
            foreach($perennials as $perennial) 
            {
                $perennial->status = 0;
                $perennial->save();
            }
        }
        if ($list->survey_form_id == 5) {
            foreach($cropCuttings as $cropCutting) 
            {
                $cropCutting->status = 0;
                $cropCutting->save();
            }
        }
        if ($list->survey_form_id == 6) {
            foreach($maizes as $maize) 
            {
                $maize->status = 0;
                $maize->save();
            }
        }
        if ($list->survey_form_id == 7) {
            foreach($tofsil5datas as $tofsil5data) 
            {
                $tofsil5data->status = 0;
                $tofsil5data->save();
            }
        }
        if ($list->survey_form_id == 8) {
            foreach($tofsil8datas as $tofsil8data) 
            {
                $tofsil8data->status = 0;
                $tofsil8data->save();
            }
        }
        if ($list->survey_form_id == 10) {
            foreach($tofsil10datas as $tofsil10data) 
            {
                $tofsil10data->status = 0;
                $tofsil10data->save();
            }
        }
        if ($list->survey_form_id == 11) {
            foreach($surveyTofsilForm11Datas as $surveyTofsilForm11Data) 
            {
                $surveyTofsilForm11Data->status = 0;
                $surveyTofsilForm11Data->save();
            }
        }
        if ($list->survey_form_id == 12) {
            foreach($tofsil7datas as $tofsil7data) 
            {
                $tofsil7data->status = 0;
                $tofsil7data->save();
            }
        }
        if ($list->survey_form_id == 13) {
            foreach($tofsil9datas as $tofsil9data) 
            {
                $tofsil9data->status = 0;
                $tofsil9data->save();
            }
        }

        return back()->with('success', 'Backward Successfully.');
    }

    // temporary methods for survey data report
    public function tofsil1report()
    {
        return view('backend.admin.survey.tofsil_1_report');
    }
    public function tofsil3report()
    {
        return view('backend.admin.survey.tofsil_3_report');
    }
    public function tofsil4report()
    {
        return view('backend.admin.survey.tofsil_4_report');
    }

    public function tofsil5()
    {
        return view('backend.admin.survey.tofsil5');
    }

    public function tofsil7()
    {
        return view('backend.admin.survey.tofsil7');
    }

    public function tofsil8()
    {
        return view('backend.admin.survey.tofsil8');
    }
    public function tofsil9()
    {
        return view('backend.admin.survey.tofsil9');
    }

    public function tofsil10()
    {
        return view('backend.admin.survey.tofsil10');
    }
    public function tofsil11()
    {
        return view('backend.admin.survey.tofsil11');
    }

    public function tofsil4reportSonkolon()
    {
        return view('backend.admin.survey.tofsil_4_report_sonkolon');
    }
    public function tofsil6()
    {
        return view('backend.admin.survey.tofsil6');
    }
    public function shonkolon6()
    {
        return view('backend.admin.survey.shonkolon6');   
    }
    public function shonkolon7()
    {
        return view('backend.admin.survey.shonkolon7');   
    }
    public function shonkolon8()
    {
        return view('backend.admin.survey.shonkolon8');   
    }
    public function doc3()
    {
        return view('backend.admin.survey.doc3');
    }
    public function doc4()
    {
        return view('backend.admin.survey.doc4');
    }
    public function wheatCrop()
    {
        return view('backend.admin.survey.wheatCrop');
    }
    public function damageReport()
    {
        return view('backend.admin.survey.damageReport');
    }

    
    // tofsil-2 union data list
    public function upazilaCropCuttingDetails(SurveyProcessList $list)
    {
        // dd($list->survey_form_id);
        if($list->survey_form_id == 5)
        {
            $upazilaCropCuttingDatas = SurveyTofsilForm2::where('upazila_id',$list->upazila_id)->where('survey_notification_id',$list->survey_notification_id)->latest()->paginate(15);
        }
        elseif($list->survey_form_id == 7)
        {
            $upazilaCropCuttingDatas = SurveyTofsilForm5::where('upazila_id',$list->upazila_id)->where('survey_notification_id',$list->survey_notification_id)->latest()->paginate(15);
        }
        
        return view('backend.admin.survey.Tofsil2UnionData',[
            'lists' => $upazilaCropCuttingDatas
        ]);
    }

    public function upazilaMonthlyWageDetails(SurveyProcessList $list)
    {
        
        
        $surveyNotification = SurveyNotification::where('id', $list->survey_notification_id)->first();
        $datas = SurveyTofsilForm8::where('upazila_id',$list->upazila_id)->groupBy('cluster_id')->get();
        
        return view('backend.admin.survey.upazilaTofsil8Report',[                
            'surveyNotification'=>$surveyNotification,
            'datas'=>$datas,              
            'list'=>$list
        ]);
    }

    public function upazilaCropCropCuttingData(SurveyProcessList $list)
    {
        if($list->survey_form_id == 5)
        {

            $upazilaCropCuttingDatas = SurveyTofsilForm2::where('district_id',$list->district_id)->where('survey_notification_id',$list->survey_notification_id)->groupBy('upazila_id')->latest()->paginate(15);
        }
        elseif($list->survey_form_id == 7)
        {
            $upazilaCropCuttingDatas = SurveyTofsilForm5::where('district_id',$list->district_id)->where('survey_notification_id',$list->survey_notification_id)->groupBy('upazila_id')->latest()->paginate(15);
        }
        
        // return view('backend.admin.survey.Tofsil2UnionData',[
        //     'lists' => $upazilaCropCuttingDatas
        // ]);
        return view('backend.admin.survey.Tofsil2UpazilaData',[
            'lists' => $upazilaCropCuttingDatas
        ]);
    }

    public function divisionCropCuttingData(SurveyProcessList $list)
    {
        if($list->survey_form_id == 5){

            $upazilaCropCuttingDatas = SurveyTofsilForm2::where('division_id',$list->division_id)->where('survey_notification_id',$list->survey_notification_id)->groupBy('district_id')->latest()->paginate(15);
        }elseif($list->survey_form_id == 7){
            $upazilaCropCuttingDatas = SurveyTofsilForm5::where('division_id',$list->division_id)->where('survey_notification_id',$list->survey_notification_id)->groupBy('district_id')->latest()->paginate(15);
        }

        
        // return view('backend.admin.survey.Tofsil2UnionData',[
        //     'lists' => $upazilaCropCuttingDatas
        // ]);
        return view('backend.admin.survey.Tofsil2DivisionData',[
            'lists' => $upazilaCropCuttingDatas
        ]);
    }

    public function daeOfficerTofsil2(SurveyProcessList $list)
    {
        $user = Auth::user();


        $data = SurveyTofsilForm2::where('survey_process_list_id',$list->id)->where('survey_notification_id',$list->survey_notification_id)->first();
        return view('backend.admin.survey.editForm.daeOfficerTofsil2',[
            'data' => $data,
        ]);
    }

    public function reportData()
    {
    
        $user = Auth::user();

        if (Gate::allows('survey_report', $user)) 
        {            
            menuSubmenu('surveyReports', 'surveyReportsShankalan3');

            $divisions = Division::get();

            return view('backend.admin.survey.report.shankalan3',[
                'divisions' => $divisions
            ]);
            
        }
        else
        {
            abort(403);
        }
    }

    public function reportData4()
    {
    
       $user = Auth::user();

        if (Gate::allows('survey_report', $user)) 
        {            
            menuSubmenu('surveyReports', 'surveyReportsShankalan4');

            $divisions = Division::get();
            
            return view('backend.admin.survey.report.shankalan4',[
                'divisions' => $divisions
            ]);
            
        }
        else
        {
            abort(403);
        }
    }

    public function tofsilReportData2(Request $request)
    {
        $user = Auth::user();

        if (Gate::allows('survey_report', $user)) 
        {            
            $sideBar = 'surveyReportstofsile2crop'.$request->type;
            menuSubmenu('surveyReports', $sideBar);

            $crop = $request->type;
            $tofsilFormDatas = SurveyTofsilForm2::groupBy('division_id')->where('crop_id',$crop)->get(); // 1 =aus, 2=amon, 3=boro, 4=jute, 5=wheat
            return view('backend.admin.survey.report.tofsilReportData2',[
                'tofsilFormDatas' => $tofsilFormDatas,
                'crop'=>$crop
            ]);
            
        }
        else
        {
            abort(403);
        }
    }

    public function showListOfFarmer(SurveyProcessList $list)
    {
        
        $tofsil7datas = SurveyTofsilForm7::where('survey_notification_id', $list->survey_notification_id)->where('union_id', $list->union_id)->latest()->paginate(15);
        
        return view('backend.admin.survey.showListOfFarmer',[
            'tofsil7datas'=>$tofsil7datas,
            'listData'=>$list
        ]);
    }

    //tofsil 9 report
    public function showUpazilaTofsil9List(SurveyProcessList $list)
    {
        $tofsil9datas = SurveyTofsilForm9::where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->latest()->paginate(15);
        
        return view('backend.admin.survey.showUpazilaTofsil9List',[
            'tofsil9datas'  => $tofsil9datas,
            'listData'      => $list
        ]);
    }

    public function showUpazilaTofsil9(SurveyTofsilForm9 $data)
    {
        
        $list = SurveyProcessList::find($data->survey_process_list_id);

        $tofsil9 = SurveyTofsilForm9::where('id', $data->id)->where('survey_notification_id', $list->survey_notification_id)->where('upazila_id', $list->upazila_id)->first();

        $agricultural_land_data = SurveyTofsilForm9AgriculturalLand::where('survey_tofsil_form9_id', $tofsil9->id)->first();
        $farm_land_data = SurveyTofsilForm9FarmLand::where('survey_tofsil_form9_id', $tofsil9->id)->first();
        $nursery_and_forest_data = SurveyTofsilForm9NurseryAndForest::where('survey_tofsil_form9_id', $tofsil9->id)->first();
        $river_data = SurveyTofsilForm9River::where('survey_tofsil_form9_id', $tofsil9->id)->first();
        $minerals_and_hill_data = SurveyTofsilForm9MineralsAndHill::where('survey_tofsil_form9_id', $tofsil9->id)->first();
        $non_agriculture_data = SurveyTofsilForm9NonAgriculture::where('survey_tofsil_form9_id', $tofsil9->id)->first();
        $main_class_division_land_data = SurveyTofsilForm9MainClassDivisionLand::where('survey_tofsil_form9_id', $tofsil9->id)->first();
        $temporary_net_crop_data = SurveyTofsilForm9TemporaryNetCrop::where('survey_tofsil_form9_id', $tofsil9->id)->first();
        $crop_seasonal_land_data = SurveyTofsilForm9CropSeasonalLand::where('survey_tofsil_form9_id', $tofsil9->id)->first();
        $irrigation_process_data = SurveyTofsilForm9IrrigationProcess::where('survey_tofsil_form9_id', $tofsil9->id)->first();
        $irrigation_land_data = SurveyTofsilForm9IrrigationLand::where('survey_tofsil_form9_id', $tofsil9->id)->first();
        
        return view('backend.admin.survey.showTofsil9', compact('tofsil9', 'list', 'agricultural_land_data', 'farm_land_data', 'nursery_and_forest_data', 'river_data', 'minerals_and_hill_data', 'non_agriculture_data', 'main_class_division_land_data', 'temporary_net_crop_data', 'crop_seasonal_land_data', 'irrigation_process_data', 'irrigation_land_data'));
    }
}
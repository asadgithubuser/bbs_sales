<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
use Auth;

/* included models */
use App\Models\Union;
use App\Models\Crop;
use App\Models\SurveyProcessList;
use App\Models\SurveyNotification;
use App\Models\SurveyTofsilForm4;
use App\Models\SurveyCompilationCollectForm1;
use App\Models\SurveyProcessForwardingLog;
use App\Models\GenerateSurveyNotification;

class PerennialCropFormController extends Controller
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
            menuSubmenu('farmersData', 'perennialCropsData');

            $perennialCropsData = SurveyTofsilForm4::with('division', 'district', 'upazila', 'union', 'mouza', 'farmer')->where('created_by', $user->id)->where('status', false)->latest()->paginate(15);
            
            return view('backend.admin.surveyForms.perennialCropForm.index', compact('perennialCropsData'));

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
            if(Gate::allows('perennialCropForm', $user))
            {
                // get last value from url
                $url = $request->url();
                $url = basename($url);
                $number = is_numeric($url);
                
                menuSubmenu('surveyForms', 'perennialCropForm');

                $processListId = $request->surveyProListId;
               
                if(empty($processListId))
                {
                    $processList = SurveyProcessList::with('mouza')->where('status',1)->where('survey_form_id', 4)->where('survey_by', $user->id)->get();

                    $crops = Crop::where('status', 1)->get();
                    
                    if($processList->count() > 0)
                    {    
                        return view('backend.admin.surveyForms.perennialCropForm.surveyProcessList', [
                            'processLists' => $processList
                        ]);
                    }
                    else
                    {
                        return view('backend.admin.surveyForms.perennialCropForm.create', compact('crops', 'number'));
                    }

                }else{
                    
                    $processList = SurveyProcessList::with('mouza')->where('id', $processListId)->first();

                    $unions = Union::where('upazila_id', $user->upazila_id)
                                    ->where('status', 1)
                                    ->get();

                    $crops = Crop::where('status', 1)->get();
                    
                    $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 1)->first();
                    
                    $surveyNotification = SurveyNotification::where('id', $processList->survey_notification_id)->first();
                    
                    return view('backend.admin.surveyForms.perennialCropForm.create', compact('processListId', 'processList', 'unions', 'crops', 'surveyNotification','surveyList', 'number'));
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
            'farmer_id'                                 => 'required',
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

        $perennialCropForm = new SurveyTofsilForm4;

        $perennialCropForm->survey_process_list_id                      = $request->survey_process_list_id;
        $perennialCropForm->survey_notification_id                      = $request->survey_notification_id;
        $perennialCropForm->division_id                                 = $request->division_id;
        $perennialCropForm->district_id                                 = $request->district_id;
        $perennialCropForm->upazila_id                                  = $request->upazila_id;
        $perennialCropForm->union_id                                    = $request->union_id;
        $perennialCropForm->mouza_id                                    = $request->mouza_id;
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
            return redirect()->route('admin.perennialCropForm.create')->with('success', 'Form submitted successfully.');
        } else {
            return redirect()->route('admin.perennialCropForm.create')->with('error', 'Something went wrong, Try again later...!');
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
            menuSubmenu('farmersData', 'perennialCropsData');

            $perennialCropData = SurveyTofsilForm4::with('user', 'division', 'district', 'upazila', 'crop', 'union', 'mouza', 'farmer')->where('id', $id)->first();

            $surveyNotification = SurveyNotification::where('id', $perennialCropData->survey_notification_id)->first();

            return view('backend.admin.surveyForms.perennialCropForm.show', compact('perennialCropData', 'surveyNotification'));
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
    public function edit($id, Request $request)
    {
        $user = Auth::user();

        if (Gate::allows('farmers_data', $user)) 
        {
            menuSubmenu('farmersData', 'perennialCropsData');

            $perennialCropData = SurveyTofsilForm4::with('user', 'division', 'district', 'upazila', 'crop', 'union', 'mouza', 'farmer')->where('id', $id)->first();
            $crops = Crop::where('status', 1)->get();
            $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 1)->first();
            $url = $request->url();

            return view('backend.admin.surveyForms.perennialCropForm.edit', compact('perennialCropData', 'surveyList','crops'));
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
    public function update(Request $request, SurveyTofsilForm4 $perennialCrop)
    {
        $request->validate([
            'farmer_id'                                 => 'required',
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
        ]);

        $perennialCrop->farmer_id                                   = $request->farmer_id;
        $perennialCrop->total_fruity_trees_in_garden                = $request->total_fruity_trees_in_garden;
        $perennialCrop->total_fruity_scattered_trees                = $request->total_fruity_scattered_trees;
        $perennialCrop->total_fruity_trees                          = $request->total_fruity_trees;
        $perennialCrop->last_total_fruity_trees_in_garden           = $request->last_total_fruity_trees_in_garden;
        $perennialCrop->last_total_fruity_scattered_trees           = $request->last_total_fruity_scattered_trees;
        $perennialCrop->last_total_fruity_trees                     = $request->last_total_fruity_trees;
        $perennialCrop->land_amount_under_the_fruitly_trees         = $request->land_amount_under_the_fruitly_trees;
        $perennialCrop->last_land_amount_under_the_fruitly_trees    = $request->last_land_amount_under_the_fruitly_trees;
        $perennialCrop->total_fruitless_trees                       = $request->total_fruitless_trees;
        $perennialCrop->total_production                            = $request->total_production;
        $perennialCrop->last_total_production                       = $request->last_total_production;
        $perennialCrop->average_yield_per_tree                      = $request->average_yield_per_tree;
        $perennialCrop->total_trees                                 = $request->total_fruity_trees + $request->total_fruitless_trees;
        $perennialCrop->land_amount_under_the_fruitless_trees       = $request->land_amount_under_the_fruitless_trees;
        $perennialCrop->last_land_amount_under_the_fruitless_trees  = $request->last_land_amount_under_the_fruitless_trees;
        $perennialCrop->total_land_amount_under_the_trees           = $request->total_land_amount_under_the_trees;
        $perennialCrop->last_total_land_amount_under_the_trees      = $request->last_total_land_amount_under_the_trees;
        $perennialCrop->updated_by                                  = Auth::user()->id;

        $perennialCrop->save();

        return redirect()->route('admin.perennialCropForm.index')->with('success', 'Perennial Crop Data Upadated Successfully.');
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

        $perennialCropDatas = SurveyTofsilForm4::where('survey_notification_id', $survey_notification_id)->where('created_by',Auth::id())->get();
        
        foreach($perennialCropDatas as $data)
        {
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

        return redirect()->route('admin.perennialCropForm.index')->with('success', 'Form Forwarded Successfully!!!');

    }
}

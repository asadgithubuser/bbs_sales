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
use App\Models\SurveyTofsilForm3Maize;
use App\Models\SurveyProcessForwardingLog;
use App\Models\GenerateSurveyNotification;

class SurveyTofsilForm3MaizeController extends Controller
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
            menuSubmenu('farmersData', 'surveyTofsilForm3MaizeData');

            $surveyTofsilForm3MaizeDatas = SurveyTofsilForm3Maize::with('division', 'district', 'upazila', 'union', 'mouza')->where('created_by', $user->id)->where('status', false)->latest()->paginate(15);
            
            return view('backend.admin.surveyForms.surveyTofsilForm3Maize.index', compact('surveyTofsilForm3MaizeDatas'));

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
            if(Gate::allows('surveyTofsilForm3Maize', $user))
            {
                // get last value from url
                $url = $request->url();
                $url = basename($url);
                $number = is_numeric($url);

                menuSubmenu('surveyForms', 'surveyTofsilForm3Maize');

                $processListId = $request->surveyProListId;
               
                if(empty($processListId))
                {
                    
                    $processList = SurveyProcessList::with('mouza')->where('status',1)->where('survey_form_id', 6)->where('survey_by', $user->id)->get();
                    
                    $crops = Crop::where('status', 1)->get();
                    
                    if($processList->count() > 0)
                    {    
                        return view('backend.admin.surveyForms.surveyTofsilForm3Maize.surveyProcessList', [
                            'processLists' => $processList
                        ]);
                    }
                    else
                    {
                        return view('backend.admin.surveyForms.surveyTofsilForm3Maize.create', compact('crops', 'number'));
                    }

                }else{
                    
                    $processList = SurveyProcessList::with('mouza')->where('id', $processListId)->first();

                    $unions = Union::where('upazila_id', $user->upazila_id)
                                    ->where('status', 1)
                                    ->get();

                    $crops = Crop::where('status', 1)->get();
                    
                    $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 1)->first();
                    
                    $surveyNotification = SurveyNotification::where('id', $processList->survey_notification_id)->first();
                    
                    return view('backend.admin.surveyForms.surveyTofsilForm3Maize.create', compact('processListId', 'processList', 'unions', 'crops', 'surveyNotification','surveyList', 'number'));
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
            'season'                        => 'required',
            'crop_id'                       => 'required',
            'last_year_land_amount'         => 'required',
            'last_year_land_producttion'    => 'required',
            'current_year_land_amount'      => 'required',
            'current_year_land_producttion' => 'required',
        ]);

        $surveyTofsilForm3Maize = new SurveyTofsilForm3Maize;

        $surveyTofsilForm3Maize->survey_process_list_id          = $request->survey_process_list_id;
        $surveyTofsilForm3Maize->survey_notification_id          = $request->survey_notification_id;
        $surveyTofsilForm3Maize->division_id                     = $request->division_id;
        $surveyTofsilForm3Maize->district_id                     = $request->district_id;
        $surveyTofsilForm3Maize->upazila_id                      = $request->upazila_id;
        $surveyTofsilForm3Maize->union_id                        = $request->union_id;
        $surveyTofsilForm3Maize->mouza_id                        = $request->mouza_id;
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
            return redirect()->route('admin.surveyTofsilForm3Maize.create')->with('success', 'Form submitted successfully.');
        } else {
            return redirect()->route('admin.surveyTofsilForm3Maize.create')->with('error', 'Something went wrong, Try again later...!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SurveyTofsilForm3Maize $surveyTofsilForm3MaizeData,Request $request)
    {
        // dd($id);
        $url = $request->url();
        $url = basename($url);
        $number = is_numeric($url);

        $user = Auth::user();

        $processList = SurveyProcessList::with('mouza')->where('id', $surveyTofsilForm3MaizeData->survey_process_list_id)->first();

        $unions = Union::where('upazila_id', $user->upazila_id)
                        ->where('status', 1)
                        ->get();

        $crops = Crop::where('status', 1)->get();
                    
        $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 1)->first();
                    
        $surveyNotification = SurveyNotification::where('id', $processList->survey_notification_id)->first();
        $processListId = null;
        return view('backend.admin.surveyForms.surveyTofsilForm3Maize.show', compact('surveyTofsilForm3MaizeData','processListId','processList', 'unions', 'crops', 'surveyNotification','surveyList', 'number'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SurveyTofsilForm3Maize $surveyTofsilForm3MaizeData, Request $request)
    {
        // get last value from url
        $url = $request->url();
        $url = basename($url);
        $number = is_numeric($url);

        $user = Auth::user();

        $processList = SurveyProcessList::with('mouza')->where('id', $surveyTofsilForm3MaizeData->survey_process_list_id)->first();

        $unions = Union::where('upazila_id', $user->upazila_id)
                        ->where('status', 1)
                        ->get();

        $crops = Crop::where('status', 1)->get();
                    
        $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 1)->first();
                    
        $surveyNotification = SurveyNotification::where('id', $processList->survey_notification_id)->first();
        $processListId = null;
        return view('backend.admin.surveyForms.surveyTofsilForm3Maize.edit', compact('surveyTofsilForm3MaizeData','processListId','processList', 'unions', 'crops', 'surveyNotification','surveyList', 'number'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SurveyTofsilForm3Maize $surveyTofsilForm3Maize)
    {

        $surveyTofsilForm3Maize->season                          = $request->season ? $request->season : $surveyTofsilForm3Maize->season;

        $surveyTofsilForm3Maize->crop_id                         = $request->crop_id ? $request->crop_id : $surveyTofsilForm3Maize->crop_id;

        $surveyTofsilForm3Maize->last_year_land_amount           = $request->last_year_land_amount ? $request->last_year_land_amount : $surveyTofsilForm3Maize->last_year_land_amount;

        $surveyTofsilForm3Maize->last_year_land_producttion      = $request->last_year_land_producttion ? $request->last_year_land_producttion : $surveyTofsilForm3Maize->last_year_land_producttion;

        $surveyTofsilForm3Maize->current_year_land_amount        = $request->current_year_land_amount ? $request->current_year_land_amount : $surveyTofsilForm3Maize->current_year_land_amount;

        $surveyTofsilForm3Maize->current_year_land_producttion   = $request->current_year_land_producttion ? $request->current_year_land_producttion : $surveyTofsilForm3Maize->current_year_land_producttion;

        $surveyTofsilForm3Maize->acre_reflection_rate            = $request->acre_reflection_rate ? $request->acre_reflection_rate : $surveyTofsilForm3Maize->acre_reflection_rate;

        $surveyTofsilForm3Maize->last_acre_reflection_rate       = $request->last_acre_reflection_rate ? $request->last_acre_reflection_rate : $surveyTofsilForm3Maize->last_acre_reflection_rate;

        $surveyTofsilForm3Maize->updated_by                      = Auth::user()->id;

        $done = $surveyTofsilForm3Maize->save();

        if($done)
        {
            return redirect()->route('admin.surveyTofsilForm3Maize.create')->with('success', 'Form submitted successfully.');
        } else {
            return redirect()->route('admin.surveyTofsilForm3Maize.create')->with('error', 'Something went wrong, Try again later...!');
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
        
        $temporaryCropDatas = SurveyTofsilForm3Maize::where('survey_notification_id', $survey_notification_id)->where('created_by', Auth::id())->get();
        
        foreach($temporaryCropDatas as $data){
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

        return redirect()->route('admin.surveyTofsilForm3Maize.index')->with('success', 'Form Forwarded Successfully!!!');
    }
}

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
use App\Models\SurveyTofsilForm3;
use App\Models\SurveyCompilationCollectForm1;
use App\Models\SurveyProcessForwardingLog;
use App\Models\GenerateSurveyNotification;

class TemporaryCropFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // dd(1);
        if (Gate::allows('farmers_data', $user)) 
        {
            menuSubmenu('farmersData', 'temporaryCropsData');

            $temporaryCropsData = SurveyTofsilForm3::with('division', 'district', 'upazila', 'union', 'mouza', 'farmer')->where('created_by', $user->id)->where('status', false)->latest()->paginate(15);
            
            return view('backend.admin.surveyForms.temporaryCropForm.index', compact('temporaryCropsData'));

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
            if(Gate::allows('temporaryCrop', $user))
            {
                // get last value from url
                $url = $request->url();
                $url = basename($url);
                $number = is_numeric($url);

                menuSubmenu('surveyForms', 'temporaryCrop');

                $processListId = $request->surveyProListId;
               
                if(empty($processListId))
                {
                    
                    $processList = SurveyProcessList::with('mouza')->where('status',1)->where('survey_form_id', 3)->where('survey_by', $user->id)->get();
                    
                    $crops = Crop::where('status', 1)->get();
                    
                    if($processList->count() > 0)
                    {    
                        return view('backend.admin.surveyForms.temporaryCropForm.surveyProcessList', [
                            'processLists' => $processList
                        ]);
                    }
                    else
                    {
                        return view('backend.admin.surveyForms.temporaryCropForm.create', compact('crops', 'number'));
                    }

                }else{
                    
                    $processList = SurveyProcessList::with('mouza')->where('id', $processListId)->first();

                    $unions = Union::where('upazila_id', $user->upazila_id)
                                    ->where('status', 1)
                                    ->get();

                    $crops = Crop::where('status', 1)->get();
                    
                    $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 1)->first();
                    
                    $surveyNotification = SurveyNotification::where('id', $processList->survey_notification_id)->first();
                    
                    return view('backend.admin.surveyForms.temporaryCropForm.create', compact('processListId', 'processList', 'unions', 'crops', 'surveyNotification','surveyList', 'number'));
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
            'farmer_id'                     => 'required',
            'last_year_land_amount'         => 'required',
            'last_year_land_producttion'    => 'required',
            'current_year_land_amount'      => 'required',
            'current_year_land_producttion' => 'required',
        ]);

        $temporaryCropForm = new SurveyTofsilForm3;

        $temporaryCropForm->survey_process_list_id          = $request->survey_process_list_id;
        $temporaryCropForm->survey_notification_id          = $request->survey_notification_id;
        $temporaryCropForm->division_id                     = $request->division_id;
        $temporaryCropForm->district_id                     = $request->district_id;
        $temporaryCropForm->upazila_id                      = $request->upazila_id;
        $temporaryCropForm->union_id                        = $request->union_id;
        $temporaryCropForm->mouza_id                        = $request->mouza_id;
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
            return redirect()->route('admin.temporaryCropForm.create')->with('success', 'Form submitted successfully.');
        } else {
            return redirect()->route('admin.temporaryCropForm.create')->with('error', 'Something went wrong, Try again later...!');
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
            menuSubmenu('farmersData', 'temporaryCropsData');

            $temporaryCropData = SurveyTofsilForm3::with('user', 'division', 'district', 'upazila', 'crop', 'union', 'mouza', 'farmer')->where('id', $id)->first();

            $surveyNotification = SurveyNotification::where('id', $temporaryCropData->survey_notification_id)->first();

            return view('backend.admin.surveyForms.temporaryCropForm.show', compact('temporaryCropData', 'surveyNotification'));
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
            menuSubmenu('farmersData', 'temporaryCropsData');

            $temporaryCropData = SurveyTofsilForm3::with('user', 'division', 'district', 'upazila', 'crop', 'union', 'mouza', 'farmer')->where('id', $id)->first();

            $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 1)->first();
            $crops = Crop::where('status', 1)->get();
            return view('backend.admin.surveyForms.temporaryCropForm.edit', compact('temporaryCropData', 'surveyList','crops'));
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
    public function update(Request $request, SurveyTofsilForm3 $temporaryCrop)
    {
        $request->validate([
            'farmer_id'                     => 'required',
            'last_year_land_amount'         => 'required',
            'last_year_land_producttion'    => 'required',
            'current_year_land_amount'      => 'required',
            'current_year_land_producttion' => 'required',
        ]);

        $temporaryCrop->farmer_id                       = $request->farmer_id;
        $temporaryCrop->last_year_land_amount           = $request->last_year_land_amount;
        $temporaryCrop->last_year_land_producttion      = $request->last_year_land_producttion;
        $temporaryCrop->current_year_land_amount        = $request->current_year_land_amount;
        $temporaryCrop->current_year_land_producttion   = $request->current_year_land_producttion;
        $temporaryCrop->acre_reflection_rate            = $request->acre_reflection_rate;
        $temporaryCrop->last_acre_reflection_rate       = $request->last_acre_reflection_rate;
        $temporaryCrop->updated_by                      = Auth::user()->id;

        $temporaryCrop->save();

        return redirect()->route('admin.temporaryCropForm.index')->with('success', 'Temporary Crop Data Upadated Successfully.');
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
        
        $temporaryCropDatas = SurveyTofsilForm3::where('survey_notification_id', $survey_notification_id)->where('created_by', Auth::id())->get();
        
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

        return redirect()->route('admin.temporaryCropForm.index')->with('success', 'Form Forwarded Successfully!!!');

    }
}

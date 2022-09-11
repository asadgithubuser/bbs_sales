<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
use Auth;

/* included models */
use App\Models\SurveyProcessList;
use App\Models\SurveyNotification;
use App\Models\SurveyTofsilForm1;
use App\Models\SurveyTofsilForm8;
use App\Models\SurveyCompilationCollectForm1;
use App\Models\SurveyProcessForwardingLog;
use App\Models\GenerateSurveyNotification;
use App\Models\Cluster;

class SurveyTofsilForm8Controller extends Controller
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
            menuSubmenu('farmersData', 'tofsil8sData');

            $tofsil8sData = SurveyTofsilForm8::with('division', 'district', 'upazila', 'cluster')->where('created_by', $user->id)->where('status', false)->latest()->paginate(15);
            
            return view('backend.admin.surveyForms.tofsil8Form.index', compact('tofsil8sData'));

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
            if(Gate::allows('tofsil8', $user))
            {
                // get last value from url
                $url = $request->url();
                $url = basename($url);
                $number = is_numeric($url);

                menuSubmenu('surveyForms', 'tofsil8');

                $processListId = $request->surveyProListId;
               
                if(empty($processListId))
                {
                    $processList = SurveyProcessList::with('mouza')->where('status', 1)->where('survey_form_id', 8)->where('survey_by', $user->id)->get();

                    // $clusters = Cluster::whereIn('union_id', $processList->union_id)->where('status', 1)->get();
                    
                    if($processList->count() > 0)
                    {    
                        return view('backend.admin.surveyForms.tofsil8Form.surveyProcessList', [
                            'processLists' => $processList
                        ]);
                    }
                    else
                    {
                        return view('backend.admin.surveyForms.tofsil8Form.create', compact('number'));
                    }

                }else{
                    
                    $processList = SurveyProcessList::with('mouza')->where('id', $processListId)->first();
                    
                    // $clusters = Cluster::whereIn('union_id', $processList->union_id)->where('status', 1)->get();
                    
                    $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 2)->first();
                    
                    $surveyNotification = SurveyNotification::where('id', $processList->survey_notification_id)->first();
                    
                    return view('backend.admin.surveyForms.tofsil8Form.create', compact('processListId', 'processList', 'surveyNotification', 'surveyList', 'number'));
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
        // dd($request->all());
        // $request->validate([
        //     'farmer_id'      => 'required',

        // ]);

        $tofsil8 = new SurveyTofsilForm8;

        $tofsil8->survey_process_list_id  = $request->survey_process_list_id;
        $tofsil8->survey_notification_id  = $request->survey_notification_id;
        $tofsil8->division_id             = $request->division_id;
        if($request->farmer_id == 'other')
        {
            $tofsil8->farmers_name        = $request->farmers_name;
        }

        $tofsil8->district_id             = $request->district_id;
        $tofsil8->upazila_id              = $request->upazila_id;
        $tofsil8->cluster_id              = $request->cluster_id;
        $tofsil8->farmer_id               = $request->farmer_id;
        $tofsil8->fathers_name               = $request->fathers_name;
        $tofsil8->farmers_mobile               = $request->farmers_mobile;
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
            return redirect()->route('admin.surveyTofsilForm8.create')->with('success', 'Form submitted successfully.');
        } else {
            return redirect()->route('admin.surveyTofsilForm8.create')->with('error', 'Something went wrong, Try again later...!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $user = Auth::user();

        // get last value from url
        $url = $request->url();
        $url = basename($url);
        $number = is_numeric($url);

        if (Gate::allows('farmers_data', $user)) 
        {
            menuSubmenu('farmersData', 'tofsil8sData');

            $tofsil8Data = SurveyTofsilForm8::with('user', 'division', 'district')->where('id', $id)->first();

            $processList = SurveyProcessList::with('mouza')->where('id', $tofsil8Data->survey_process_list_id)->first();
                    
            // $clusters = Cluster::whereIn('union_id', $processList->union_id)->where('status', 1)->get();
            
            $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 2)->first();
            
            $surveyNotification = SurveyNotification::where('id', $processList->survey_notification_id)->first();
            $processListId = null;

            return view('backend.admin.surveyForms.tofsil8Form.show', compact('tofsil8Data','processListId', 'processList', 'surveyNotification', 'surveyList', 'number'));
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

        // get last value from url
        $url = $request->url();
        $url = basename($url);
        $number = is_numeric($url);

        if (Gate::allows('farmers_data', $user)) 
        {
            menuSubmenu('farmersData', 'tofsil8sData');

            $tofsil8Data = SurveyTofsilForm8::with('user', 'division', 'district')->where('id', $id)->first();
            
            $processList = SurveyProcessList::with('mouza')->where('id', $tofsil8Data->survey_process_list_id)->first();
                    
            // $clusters = Cluster::whereIn('union_id', $processList->union_id)->where('status', 1)->get();
            
            $surveyList = SurveyProcessList::where('status', 6)->where('upazila_id', $user->upazila_id)->where('survey_form_id', 2)->first();
            
            $surveyNotification = SurveyNotification::where('id', $processList->survey_notification_id)->first();
            $processListId = null;

            return view('backend.admin.surveyForms.tofsil8Form.edit', compact('tofsil8Data','processListId', 'processList', 'surveyNotification', 'surveyList', 'number'));
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
    public function update(Request $request, SurveyTofsilForm8 $tofsil8)
    {
        
        // $request->validate([
        //     'farmer_id'      => 'required',
        // ]);

        
        $tofsil8->survey_process_list_id  = $tofsil8->survey_process_list_id;
        if($request->farmer_id == 'other')
        {
            $tofsil8->farmers_name        = $request->farmers_name;
        }
        $tofsil8->farmer_id               = $request->farmer_id ? $request->farmer_id : $tofsil8->farmer_id ;
        $tofsil8->fathers_name            = $request->fathers_name ? $request->fathers_name : $tofsil8->fathers_name;
        $tofsil8->farmers_mobile          = $request->farmers_mobile ? $request->farmers_mobile : $tofsil8->farmers_mobile ;
        $tofsil8->one_meal_male           = $request->one_meal_male ? $request->one_meal_male : $tofsil8->one_meal_male;
        $tofsil8->one_meal_female         = $request->one_meal_female ? $request->one_meal_female : $tofsil8->one_meal_female;
        $tofsil8->two_meal_male           = $request->two_meal_male ? $request->two_meal_male : $tofsil8->two_meal_male;
        $tofsil8->two_meal_female         = $request->two_meal_female ? $request->two_meal_female : $tofsil8->two_meal_female;
        $tofsil8->three_meal_male         = $request->three_meal_male ? $request->three_meal_male : $tofsil8->three_meal_male;
        $tofsil8->three_meal_female       = $request->three_meal_female ? $request->three_meal_female : $tofsil8->three_meal_female;
        $tofsil8->without_meal_male       = $request->without_meal_male ? $request->without_meal_male : $tofsil8->without_meal_male;
        $tofsil8->without_meal_female     = $request->without_meal_female ? $request->without_meal_female : $tofsil8->without_meal_female;
        $tofsil8->updated_by              = Auth::user()->id;

        $tofsil8->save();

        return redirect()->route('admin.surveyTofsilForm8.index')->with('success', 'Agricultural Day Labour Data Upadated Successfully.');
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
        
        $tofsil8Datas = SurveyTofsilForm8::where('survey_notification_id', $survey_notification_id)->where('created_by', Auth::id())->get();
        
        foreach($tofsil8Datas as $data){
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

        return redirect()->route('admin.surveyTofsilForm8.index')->with('success', 'Form Forwarded Successfully!!!');

    }
}

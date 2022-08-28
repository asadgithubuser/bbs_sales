<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
use Auth;

/* included models */
use App\Models\Crop;
use App\Models\SurveyProcessList;
use App\Models\SurveyNotification;
use App\Models\SurveyTofsilForm11;
use App\Models\SurveyProcessForwardingLog;
use App\Models\GenerateSurveyNotification;
use App\Models\Union;


class SurveyTofsilForm11Controller extends Controller
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
            menuSubmenu('farmersData', 'surveyTofsil11Data');

            $surveyTofsil11Datas = SurveyTofsilForm11::with('division', 'district', 'upazila', 'union', 'mouza')->where('created_by', $user->id)->where('status', false)->latest()->paginate(15);
            
            return view('backend.admin.surveyForms.surveyTofsil11Form.index', compact('surveyTofsil11Datas'));

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
            if(Gate::allows('survey_tofsil_form_11', $user))
            {
                // get last value from url
                $url = $request->url();
                $url = basename($url);
                $number = is_numeric($url);

                menuSubmenu('surveyForms', 'surveyTofsil11');

                $processListId = $request->surveyProListId;
               
                if(empty($processListId))
                {
                    $processList = SurveyProcessList::with('cluster', 'union', 'mouza')->where('status', 1)->where('survey_form_id', 11)->where('survey_by', $user->id)->get();

                    $crops = Crop::where('status', 1)->get();
                    
                    if($processList->count() > 0)
                    {    
                        return view('backend.admin.surveyForms.surveyTofsil11Form.surveyProcessList', [
                            'processLists' => $processList
                        ]);
                    }
                    else
                    {
                        return view('backend.admin.surveyForms.surveyTofsil11Form.create', compact('crops', 'number'));
                    }

                }else{
                    
                    $processList = SurveyProcessList::with('mouza')->where('id', $processListId)->first();

                    $unions = Union::where('upazila_id', $user->upazila_id)
                                    ->where('status', 1)
                                    ->get();

                    $crops = Crop::where('status', 1)->get();

                    $surveyNotification = SurveyNotification::where('id', $processList->survey_notification_id)->first();
                    
                    return view('backend.admin.surveyForms.surveyTofsil11Form.create', compact('processListId', 'processList', 'unions', 'crops', 'surveyNotification', 'number'));
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
            'cause_of_loss'                     => 'required',
            'loss_period_start_date'            => 'required',
            'loss_period_end_date'              => 'required',
            'land_amound'                       => 'required',
            'partial_damage'                    => 'required',
            'percentage_of_damage'              => 'required',
            'partial_damage_to_total_damage'    => 'required',
            'complete_damage'                   => 'required',
            'yield_per_desired_acre'            => 'required',
            'estimated_amount_of_crop_loss'     => 'required',
            'amount_of_crop_loss_tk'            => 'required',
        ]);

        $surveyTofsilForm11 = new SurveyTofsilForm11;

        $surveyTofsilForm11->survey_process_list_id          = $request->survey_process_list_id;
        $surveyTofsilForm11->survey_notification_id          = $request->survey_notification_id;
        $surveyTofsilForm11->division_id                     = $request->division_id;
        $surveyTofsilForm11->district_id                     = $request->district_id;
        $surveyTofsilForm11->upazila_id                      = $request->upazila_id;
        $surveyTofsilForm11->union_id                        = $request->union_id;
        $surveyTofsilForm11->crops_id                        = $request->crops_id;
        $surveyTofsilForm11->cause_of_loss                   = $request->cause_of_loss;
        $surveyTofsilForm11->loss_period_start_date          = $request->loss_period_start_date;
        $surveyTofsilForm11->loss_period_end_date            = $request->loss_period_end_date;
        $surveyTofsilForm11->land_amound                     = $request->land_amound;
        $surveyTofsilForm11->partial_damage                  = $request->partial_damage;
        $surveyTofsilForm11->percentage_of_damage            = $request->percentage_of_damage;
        $surveyTofsilForm11->partial_damage_to_total_damage  = $request->partial_damage_to_total_damage;
        $surveyTofsilForm11->complete_damage                 = $request->complete_damage;
        $surveyTofsilForm11->yield_per_desired_acre          = $request->yield_per_desired_acre;
        $surveyTofsilForm11->estimated_amount_of_crop_loss   = $request->estimated_amount_of_crop_loss;
        $surveyTofsilForm11->amount_of_crop_loss_tk          = $request->amount_of_crop_loss_tk;
        $surveyTofsilForm11->created_by                      = Auth::user()->id;

        $done = $surveyTofsilForm11->save();

        if($done)
        {
            return redirect()->route('admin.surveyTofsilForm11.create')->with('success', 'Form submitted successfully.');
        } else {
            return redirect()->route('admin.surveyTofsilForm11.create')->with('error', 'Something went wrong, Try again later...!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SurveyTofsilForm11 $surveyTofsilForm11, Request $request)
    {
        $user = Auth::user();
        
        $url = $request->url();
        $url = basename($url);
        $number = is_numeric($url);
        
        $processList = SurveyProcessList::with('mouza')->where('id', $surveyTofsilForm11->survey_process_list_id)->first();

        $unions = Union::where('upazila_id', $user->upazila_id)
                                ->where('status', 1)
                                ->get();

        $crops = Crop::where('status', 1)->get();

        $surveyNotification = SurveyNotification::where('id', $processList->survey_notification_id)->first();
                
        $processListId = null;
            
        return view('backend.admin.surveyForms.surveyTofsil11Form.show', compact('surveyTofsilForm11','processListId', 'processList', 'unions', 'crops', 'surveyNotification', 'number'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SurveyTofsilForm11 $surveyTofsilForm11, Request $request)
    {
        $user = Auth::user();
        
        $url = $request->url();
        $url = basename($url);
        $number = is_numeric($url);
        
        $processList = SurveyProcessList::with('mouza')->where('id', $surveyTofsilForm11->survey_process_list_id)->first();

        $unions = Union::where('upazila_id', $user->upazila_id)
                                ->where('status', 1)
                                ->get();

        $crops = Crop::where('status', 1)->get();

        $surveyNotification = SurveyNotification::where('id', $processList->survey_notification_id)->first();
                
        $processListId = null;
            
        return view('backend.admin.surveyForms.surveyTofsil11Form.edit', compact('surveyTofsilForm11','processListId', 'processList', 'unions', 'crops', 'surveyNotification', 'number'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SurveyTofsilForm11 $surveyTofsilForm11, Request $request)
    {
        $request->validate([
            'cause_of_loss'                     => 'required',
            'loss_period_start_date'            => 'required',
            'loss_period_end_date'              => 'required',
            'land_amound'                       => 'required',
            'partial_damage'                    => 'required',
            'percentage_of_damage'              => 'required',
            'partial_damage_to_total_damage'    => 'required',
            'complete_damage'                   => 'required',
            'yield_per_desired_acre'            => 'required',
            'estimated_amount_of_crop_loss'     => 'required',
            'amount_of_crop_loss_tk'            => 'required',
        ]);

        $surveyTofsilForm11->survey_process_list_id          = $surveyTofsilForm11->survey_process_list_id;
        $surveyTofsilForm11->survey_notification_id          = $request->survey_notification_id;
        $surveyTofsilForm11->division_id                     = $request->division_id;
        $surveyTofsilForm11->district_id                     = $request->district_id;
        $surveyTofsilForm11->upazila_id                      = $request->upazila_id;
        $surveyTofsilForm11->union_id                        = $request->union_id;
        $surveyTofsilForm11->crops_id                        = $request->crops_id;
        $surveyTofsilForm11->cause_of_loss                   = $request->cause_of_loss;
        $surveyTofsilForm11->loss_period_start_date          = $request->loss_period_start_date;
        $surveyTofsilForm11->loss_period_end_date            = $request->loss_period_end_date;
        $surveyTofsilForm11->land_amound                     = $request->land_amound;
        $surveyTofsilForm11->partial_damage                  = $request->partial_damage;
        $surveyTofsilForm11->percentage_of_damage            = $request->percentage_of_damage;
        $surveyTofsilForm11->partial_damage_to_total_damage  = $request->partial_damage_to_total_damage;
        $surveyTofsilForm11->complete_damage                 = $request->complete_damage;
        $surveyTofsilForm11->yield_per_desired_acre          = $request->yield_per_desired_acre;
        $surveyTofsilForm11->estimated_amount_of_crop_loss   = $request->estimated_amount_of_crop_loss;
        $surveyTofsilForm11->amount_of_crop_loss_tk          = $request->amount_of_crop_loss_tk;
        $surveyTofsilForm11->created_by                      = Auth::user()->id;

        $done = $surveyTofsilForm11->save();

        if($done)
        {
            return redirect()->route('admin.surveyTofsilForm11.create')->with('success', 'Form submitted successfully.');
        } else {
            return redirect()->route('admin.surveyTofsilForm11.create')->with('error', 'Something went wrong, Try again later...!');
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
        
        $surveyTofsilForm8Datas = SurveyTofsilForm11::where('survey_notification_id', $survey_notification_id)->where('created_by', Auth::id())->get();
        
        foreach($surveyTofsilForm8Datas as $data){
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

        return redirect()->route('admin.surveyTofsilForm11.index')->with('success', 'Form Forwarded Successfully!!!');

    }
}

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
use App\Models\SurveyTofsilForm10;
use App\Models\SurveyTofsilForm10Production;
use App\Models\SurveyProcessForwardingLog;
use App\Models\GenerateSurveyNotification;

class SurveyTofsilForm10Controller extends Controller
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
            menuSubmenu('farmersData', 'surveyTofsilForm10Data');

            $surveyTofsilForm10Datas = SurveyTofsilForm10::with('division', 'district', 'upazila', 'union')->where('created_by', $user->id)->where('status', false)->latest()->paginate(15);
            
            return view('backend.admin.surveyForms.surveyTofsilForm10.index', compact('surveyTofsilForm10Datas'));

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
            if(Gate::allows('survey_tofsil_10', $user))
            {
                // get last value from url
                $url = $request->url();
                $url = basename($url);
                $number = is_numeric($url);

                menuSubmenu('surveyForms', 'surveyTofsilForm10');

                $processListId = $request->surveyProListId;
               
                if(empty($processListId))
                {
                    $processList = SurveyProcessList::with('mouza')->where('status', 1)->where('survey_form_id', 10)->where('survey_by', $user->id)->get();
                    $crops = Crop::where('status', 1)->get();
                    if($processList->count() > 0)
                    {    
                        return view('backend.admin.surveyForms.surveyTofsilForm10.surveyProcessList', [
                            'processLists' => $processList
                        ]);
                    }
                    else
                    {
                        return view('backend.admin.surveyForms.surveyTofsilForm10.create', compact('crops','number'));
                    }

                }else{
                    
                    $processList = SurveyProcessList::with('mouza')->where('id', $processListId)->first();
                    
                    $surveyNotification = SurveyNotification::where('id', $processList->survey_notification_id)->first();
                    
                    return view('backend.admin.surveyForms.surveyTofsilForm10.create', compact('processListId', 'processList', 'surveyNotification', 'number'));
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
            'crop_varieties'                    => 'required',
            'collection_start_date'             => 'required',
            'collection_end_date'               => 'required',
            'temporary_crop_land_amound'        => 'required',
            'previous_year_land_amound_desi'    => 'required',
            'previous_year_land_amound_upashi'  => 'required',
            'current_year_land_amound_desi'     => 'required',
            'current_year_land_amound_upashi'   => 'required',
            'note_desi'                         => 'required',
            'note_upashi'                       => 'required',
        ]);

        $surveyTofsilForm10 = new surveyTofsilForm10;

        $surveyTofsilForm10->survey_process_list_id             = $request->survey_process_list_id;
        $surveyTofsilForm10->survey_notification_id             = $request->survey_notification_id;
        $surveyTofsilForm10->division_id                        = $request->division_id;
        $surveyTofsilForm10->district_id                        = $request->district_id;
        $surveyTofsilForm10->upazila_id                         = $request->upazila_id;
        $surveyTofsilForm10->union_id                           = $request->union_id;
        $surveyTofsilForm10->crops_id                           = $request->crops_id;
        $surveyTofsilForm10->crop_varieties                     = $request->crop_varieties;
        $surveyTofsilForm10->collection_start_date              = $request->collection_start_date;
        $surveyTofsilForm10->collection_end_date                = $request->collection_end_date;
        $surveyTofsilForm10->temporary_crop_land_amound         = $request->temporary_crop_land_amound;
        $surveyTofsilForm10->previous_year_land_amound_desi     = $request->previous_year_land_amound_desi;
        $surveyTofsilForm10->previous_year_land_amound_upashi   = $request->previous_year_land_amound_upashi;
        $surveyTofsilForm10->current_year_land_amound_desi      = $request->current_year_land_amound_desi;
        $surveyTofsilForm10->current_year_land_amound_upashi    = $request->current_year_land_amound_upashi;
        $surveyTofsilForm10->note_desi                          = $request->note_desi;
        $surveyTofsilForm10->note_upashi                        = $request->note_upashi;
        $surveyTofsilForm10->created_by                         = Auth::user()->id;

        $done = $surveyTofsilForm10->save();

        $area_type                  = $request->area_type;
        $crop_id                    = $request->crops_id;
        $previous_land_amound       = $request->previous_land_amound;
        $previous_yield             = $request->previous_yield;
        $previous_total_production  = $request->previous_total_production;
        $current_land_amound        = $request->current_land_amound;
        $current_yield              = $request->current_yield;
        $current_total_production   = $request->current_total_production;
        $note                       = $request->note;

        $results = [];

        foreach ($area_type as $index => $unit) {

            $results[] = [
                    "survey_process_list_id"    => $request->survey_process_list_id,
                    "survey_tofsil_form10_id"   => $surveyTofsilForm10->id,
                    "area_type"                 => $area_type[$index],
                    "crop_id"                   => $crop_id,
                    "previous_land_amound"      => $previous_land_amound[$index],
                    "previous_yield"            => $previous_yield[$index],
                    "previous_total_production" => $previous_total_production[$index],
                    "current_land_amound"       => $current_land_amound[$index],
                    "current_yield"             => $current_yield[$index],
                    "current_total_production"  => $current_total_production[$index],
                    "note"                      => $note[$index],
                    "created_by"                => Auth::user()->id,
                    "created_at"                => now(),
                ];
            
        }

        SurveyTofsilForm10Production::insert($results);

        if($done)
        {
            return redirect()->route('admin.surveyTofsilForm10.create')->with('success', 'Form submitted successfully.');
        } else {
            return redirect()->route('admin.surveyTofsilForm10.create')->with('error', 'Something went wrong, Try again later...!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SurveyTofsilForm10 $surveyTofsilForm10Data, Request $request)
    {
        $url = $request->url();
        $url = basename($url);
        $number = is_numeric($url);
        $user = Auth::user();

        if (Gate::allows('farmers_data', $user)) 
        {
            menuSubmenu('farmersData', 'surveyTofsilForm10Data');

            $surveyTofsilForm10Datae = SurveyTofsilForm10::with('user', 'division', 'district', 'upazila', 'union')->where('id', $surveyTofsilForm10Data->id)->first();
            
            $productions = SurveyTofsilForm10Production::where('survey_tofsil_form10_id',$surveyTofsilForm10Datae->id)->where('survey_process_list_id',$surveyTofsilForm10Datae->survey_process_list_id)->get();
           
            return view('backend.admin.surveyForms.surveyTofsilForm10.show', compact('number','surveyTofsilForm10Datae','productions'));
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
    public function edit(SurveyTofsilForm10 $surveyTofsilForm10Data, Request $request)
    {
        // dd($surveyTofsilForm10Data);
        // get last value from url
        $url = $request->url();
        $url = basename($url);
        $number = is_numeric($url);
        $user = Auth::user();

        if (Gate::allows('farmers_data', $user)) 
        {
            menuSubmenu('farmersData', 'surveyTofsilForm10Data');

            $surveyTofsilForm10Datae = SurveyTofsilForm10::with('user', 'division', 'district', 'upazila', 'union')->where('id', $surveyTofsilForm10Data->id)->first();
            
            $productions = SurveyTofsilForm10Production::where('survey_tofsil_form10_id',$surveyTofsilForm10Datae->id)->where('survey_process_list_id',$surveyTofsilForm10Datae->survey_process_list_id)->get();
           
            return view('backend.admin.surveyForms.surveyTofsilForm10.edit', compact('number','surveyTofsilForm10Datae','productions'));
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
    public function update(Request $request, SurveyTofsilForm10 $surveyTofsilForm10)
    {
        
        $request->validate([
            'crop_varieties'                    => 'required',
            'collection_start_date'             => 'required',
            'collection_end_date'               => 'required',
            'temporary_crop_land_amound'        => 'required',
            'previous_year_land_amound_desi'    => 'required',
            'previous_year_land_amound_upashi'  => 'required',
            'current_year_land_amound_desi'     => 'required',
            'current_year_land_amound_upashi'   => 'required',
            'note_desi'                         => 'required',
            'note_upashi'                       => 'required',
        ]);

        $surveyTofsilForm10->crop_varieties                     = $request->crop_varieties;
        $surveyTofsilForm10->collection_start_date              = $request->collection_start_date;
        $surveyTofsilForm10->collection_end_date                = $request->collection_end_date;
        $surveyTofsilForm10->temporary_crop_land_amound         = $request->temporary_crop_land_amound;
        $surveyTofsilForm10->previous_year_land_amound_desi     = $request->previous_year_land_amound_desi;
        $surveyTofsilForm10->previous_year_land_amound_upashi   = $request->previous_year_land_amound_upashi;
        $surveyTofsilForm10->current_year_land_amound_desi      = $request->current_year_land_amound_desi;
        $surveyTofsilForm10->current_year_land_amound_upashi    = $request->current_year_land_amound_upashi;
        $surveyTofsilForm10->note_desi                          = $request->note_desi;
        $surveyTofsilForm10->note_upashi                        = $request->note_upashi;
        $surveyTofsilForm10->modified_by                         = Auth::user()->id;

        $done = $surveyTofsilForm10->save();

        $area_type                  = $request->area_type;
        $crop_id                    = $request->crops_id;
        $previous_land_amound       = $request->previous_land_amound;
        $previous_yield             = $request->previous_yield;
        $previous_total_production  = $request->previous_total_production;
        $current_land_amound        = $request->current_land_amound;
        $current_yield              = $request->current_yield;
        $current_total_production   = $request->current_total_production;
        $note                       = $request->note;

        $results = [];
        foreach ($area_type as $index => $unit) {
            

            $results[] = [
                    "survey_process_list_id"    => $surveyTofsilForm10->survey_process_list_id,
                    "survey_tofsil_form10_id"   => $surveyTofsilForm10->id,
                    "area_type"                 => $area_type[$index],
                    "crop_id"                   => $crop_id,
                    "previous_land_amound"      => $previous_land_amound[$index],
                    "previous_yield"            => $previous_yield[$index],
                    "previous_total_production" => $previous_total_production[$index],
                    "current_land_amound"       => $current_land_amound[$index],
                    "current_yield"             => $current_yield[$index],
                    "current_total_production"  => $current_total_production[$index],
                    "note"                      => $note[$index],
                    "created_by"                => Auth::user()->id,
                    "created_at"                => now(),
                ];
            
        }
        SurveyTofsilForm10Production::insert($results);

        return redirect()->route('admin.surveyTofsilForm10.index')->with('success', 'Crop Damage Estimation Survey Data Upadated Successfully.');
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
        
        $surveyTofsilForm10Datas = SurveyTofsilForm10::where('survey_notification_id', $survey_notification_id)->where('created_by', Auth::id())->get();
        
        foreach($surveyTofsilForm10Datas as $data){
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

        return redirect()->route('admin.surveyTofsilForm10.index')->with('success', 'Form Forwarded Successfully!!!');

    }
}

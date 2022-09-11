<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;
use Auth;
use App\Models\User;
use App\Models\SurveyForm;

class SuveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if (Gate::allows('manage_agriculture', $user))
        {
            if(Gate::allows('all_survey',$user))
            {            
                
                menuSubmenuSubsubmeny('agriculture', 'survey', 'allsurvey');
                
                $surveyForms = SurveyForm::where('is_published',1)->latest()->paginate(25);
                
                return view('backend.admin.agriculture.survey.index',[
                    'surveyForms' => $surveyForms
                ]);
                
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        if (Gate::allows('manage_agriculture', $user))
        {
            if(Gate::allows('add_survey',$user))
            {            
                
                menuSubmenuSubsubmeny('agriculture', 'survey', 'addsurvey');
        
                $surveyForm = SurveyForm::where('is_published',0)->where('created_by',Auth::user()->id)->first();
                if(!$surveyForm)
                {
                    $surveyForm = new SurveyForm;
                    $surveyForm->is_published = false;
                    $surveyForm->status = false;
                    $surveyForm->created_by = Auth::user()->id;
                    $surveyForm->save();
                }

                return view('backend.admin.agriculture.survey.create',[
                    'surveyForm' => $surveyForm,
                    
                ]);
                
            }
            else
            {
                abort(403);
            }
        }
        else
        {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SurveyForm $suvery)
    {
        $user = Auth::user();

        if (Gate::allows('manage_agriculture', $user))
        {
            if(Gate::allows('edit_survey',$user))
            {       

                return view('backend.admin.agriculture.survey.create',[
                    'surveyForm' => $suvery,
                ]);
                
            }
            else
            {
                abort(403);
            }
        }
        else
        {
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
    public function update(Request $request,SurveyForm $suvery)
    {
        // dd($request->all());
        $type = $request->type;

        $validation = Validator::make($request->all(),
        [ 
            'template_name' => ['required','min:3'],
            'display_name' => ['required','min:3'],
            'table_name' => ['required'],
            
        ]);

        if($validation->fails())
        {
            return back()
            ->withInput()
            ->withErrors($validation);
        }

        if($type == 'add'){
            $suvery->template_name = $request->template_name;
            $suvery->display_name = $request->display_name;
            $suvery->table_name = $request->table_name;
            $suvery->status = $request->status == 'on' ? 1 : 0;
            $suvery->is_published = true;
            $suvery->created_by = Auth::user()->id;
            $suvery->save();

            return redirect()->route('admin.survey.index')->with('success','Survey From Added Successfully.');
            
        }
        elseif($type == 'edit'){

            $suvery->template_name = $request->template_name;
            $suvery->display_name = $request->display_name;
            $suvery->table_name = $request->table_name;
            $suvery->status = $request->status == 'on' ? 1 : 0;
            $suvery->is_published = true;
            $suvery->created_by = Auth::user()->id;
            $suvery->save();

            return redirect()->route('admin.survey.index')->with('success','Survey From Updated Successfully.');

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

    public function delete(SurveyForm $suvery)
    {
        $user = Auth::user();

        if (Gate::allows('manage_agriculture', $user))
        {
            if(Gate::allows('delete_survey',$user))
            {            
                
                if($suvery->status == true){
                    $suvery->status = false;
                    $suvery->save();
                }
                elseif($suvery->status == false){
                    $suvery->status = true;
                    $suvery->save();
                }
        
                // return redirect()->route('admin.crop.index')->with('success','Crop Category Updated Successfully.');
                return redirect()->back();
                
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            abort(403);
        }

        
    }
}

<?php

namespace App\Http\Controllers\Backend\Admin;

use Auth;
use Validator;
use App\Models\ApplicationPurpose as Purpose;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationPurposeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if (Gate::allows('manage_applications', $user)) 
        {
            if(Gate::allows('all_application_purpose',$user))
            {
                
                menuSubmenu('applicationSetting','allApplicationPurposes');

                $applicationPurposes = Purpose::latest()->paginate(25);
                
                return view('backend.admin.applicationPurpose.index',[
                    'applicationPurposes' => $applicationPurposes
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

        if (Gate::allows('manage_applications', $user)) 
        {
            if(Gate::allows('add_application_purpose',$user))
            {
                
                menuSubmenu('applicationSetting','addApplicationPurposes');

                return view('backend.admin.applicationPurpose.create');
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
        
        $validation = Validator::make($request->all(),
        [ 
            'title_bn' => ['required','min:3','string'],
            'title_en' => ['required','min:3','string'],
        ]);

        if($validation->fails())
        {
            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => false,
                    'errors' => $validation->errors()->toArray(),
                    'sessionMessage' => 'Please, fillup the form correctly and try again.'
                ));
            }

            return back()
            ->withInput()
            ->withErrors($validation);
        }

        $ap = new Purpose;
        $ap->name_en = $request->title_en;
        $ap->name_bn = $request->title_bn;
        $ap->status = true;

        $ap->save();
        
        return redirect()->route('admin.purpose.index')->with('success','Application Purpose Created Successfully.');


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
    public function edit(Purpose $purpose)
    {
        $user = Auth::user();

        if (Gate::allows('manage_applications', $user)) 
        {
            if(Gate::allows('edit_application_purpose',$user))
            {
                
                return view('backend.admin.applicationPurpose.edit',[
                    'purpose' => $purpose
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
    public function update(Request $request,Purpose $purpose)
    {
        $validation = Validator::make($request->all(),
        [ 
            'title_bn' => ['required','min:3','string'],
            'title_en' => ['required','min:3','string'],
        ]);

        if($validation->fails())
        {
            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => false,
                    'errors' => $validation->errors()->toArray(),
                    'sessionMessage' => 'Please, fillup the form correctly and try again.'
                ));
            }

            return back()
            ->withInput()
            ->withErrors($validation);
        }

        $purpose->name_en = $request->title_en;
        $purpose->name_bn = $request->title_bn;
        $purpose->status = true;

        $purpose->save();
        
        return redirect()->route('admin.purpose.index')->with('success','Application Purpose Created Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purpose $purpose)
    {
        $user = Auth::user();

        if (Gate::allows('manage_applications', $user)) 
        {
            if(Gate::allows('delete_application_purpose',$user))
            {
                
                if($purpose->status == 1)
                {
                    $purpose->status = false;
                    $purpose->save();

                    return back()->with('info','Application Purpose Disable Successfully.');
                }
                else
                {
                    $purpose->status = true;
                    $purpose->save();

                    return back()->with('info','Application Purpose Enable Successfully.');
                }
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

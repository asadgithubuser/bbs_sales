<?php

namespace App\Http\Controllers\Backend\Admin;

use Auth;
use Validator;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/* included models */
use App\Models\Office;
use App\Models\Designation;
use App\Models\Level;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('designation','allDesignation');

        $user = Auth::user();

        if (Gate::allows('manage_designation', $user)) 
        {
            if (Gate::allows('all_designations', $user)) 
            {
                $designations = Designation::latest()->paginate(25);
        
                return view('backend.admin.designation.index',[
                    'designations' => $designations
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
        menuSubmenu('designation','addDesignation');

        $user = Auth::user();

        if (Gate::allows('manage_designation', $user)) 
        {
            if (Gate::allows('add_designation', $user)) 
            {
                $offices = Office::where('status',true)->get();
                $levels = Level::all();
                
                return view('backend.admin.designation.create',[
                    'offices' => $offices,
                    'levels' => $levels
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
        $validation = Validator::make($request->all(),
        [ 
            'title_bn' => ['required','min:3','string'],
            'title_en' => ['required','min:3','string'],
            // 'office' => ['required'],
            'level' => ['required'],
            'ordering' => ['required'],
            'description' => ['required']
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

        $designation = new Designation;
        $designation->level = $request->level;
        // $designation->office_id = $request->office;
        $designation->name_en = $request->title_en;
        $designation->name_bn = $request->title_bn;
        $designation->description = $request->description;
        $designation->created_by = Auth::id();
        $designation->status = true;
        $designation->ordering = $request->ordering;
       
        $designation->save();
        return redirect()->route('admin.designation.index')->with('success','Designation created Successfully.');

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
    public function edit(Designation $designation)
    {
        $user = Auth::user();

        if (Gate::allows('manage_designation', $user)) 
        {
            if (Gate::allows('edit_designation', $user)) 
            {
                $offices = Office::where('status',true)->get();
                $levels = Level::all();
                return view('backend.admin.designation.edit',[
                    'designation' => $designation,
                    'offices' => $offices,
                    'levels' => $levels
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
    public function update(Request $request,Designation $designation)
    {
        $validation = Validator::make($request->all(),
        [ 
            'title_bn' => ['required','min:3','string'],
            'title_en' => ['required','min:3','string'],
            // 'office' => ['required'],
            'level' => ['required'],
            'ordering' => ['required'],
            'description' => ['required']
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

        $designation->level = $request->level;
        // $designation->office_id = $request->office;
        $designation->name_en = $request->title_en;
        $designation->name_bn = $request->title_bn;
        $designation->description = $request->description;
        $designation->updated_by = Auth::id();
        $designation->status = true;
        $designation->ordering = $request->ordering;
       
        $designation->save();
        return redirect()->route('admin.designation.index')->with('success','Designation Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designation $designation)
    {
        $user = Auth::user();

        if (Gate::allows('manage_designation', $user)) 
        {
            if (Gate::allows('delete_designation', $user)) 
            {
                if($designation->status == 1)
                {
                    $designation->status = false;
                    $designation->save();

                    return back()->with('info','Designation Disable Successfully.');
                }
                else
                {
                    $designation->status = true;
                    $designation->save();

                    return back()->with('info','Designation Enable Successfully.');
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

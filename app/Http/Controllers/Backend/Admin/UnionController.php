<?php

namespace App\Http\Controllers\Backend\Admin;

use Auth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Union;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Http\Controllers\Controller;


class UnionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = Auth::user();
        if (Gate::allows('manage_union', $user)) 
        {
            if (Gate::allows('all_unions', $user)) 
            {
                // menuSubmenu('upazila', 'allunions');
                menuSubmenuSubsubmeny('location','union','allunions');
        
                $unions = Union::orderBy('id','asc')->paginate(25);
                
                return view('backend.admin.union.index',['unions'=>$unions]);
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
        if (Gate::allows('manage_union', $user)) 
        {
            if (Gate::allows('add_union', $user)) 
            {
                menuSubmenuSubsubmeny('location','union','addunion');

                $divisions = Division::where('status', 1)->get();
                $districts = District::where('status', 1)->get();
                $upazilas = Upazila::where('status',1)->get();
                
                return view('backend.admin.union.create',['divisions' => $divisions,'districts' => $districts,'upazilas'=>$upazilas]);
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
        $user = Auth::user();
        if (Gate::allows('manage_union', $user)) 
        {
            if (Gate::allows('add_union', $user)) 
            {
                $validation = Validator::make($request->all(),
                [ 
                    'name_en'      => 'required|max:255',
                    'name_bn'      => 'required|max:255',
                    'division_id'   => 'required',
                    'district_id'   => 'required',
                    'upazila_id'   => 'required',
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
        
                $union = new Union;
        
                $union->union_bbs_code  = $request->union_bbs_code;
                $union->district_id       = $request->district_id;
                $union->district_bbs_code = $request->district_bbs_code;
                $union->division_id       = $request->division_id;
                $union->division_bbs_code = $request->division_bbs_code;
                $union->name_en           = $request->name_en;
                $union->name_bn           = $request->name_bn;
                $union->land_area         = $request->land_area;
                $union->river_area        = $request->river_area;
                $union->forest_area       = $request->forest_area;
                $union->upazila_id        = $request->upazila_id;
                $union->upazila_bbs_code  = $request->upazila_bbs_code;
                // dd($union);
                $union->save();
        
                return redirect()->route('admin.union.index')->with('success','Union Created Successfully.');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Union $union)
    {
        $user = Auth::user();
        if (Gate::allows('manage_union', $user)) 
        {
            if (Gate::allows('view_union', $user))
            {
                return view('backend.admin.union.show',[
                    'union'=>$union         
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Union $union)
    {
        $user = Auth::user();
        if (Gate::allows('manage_union', $user)) 
        {
            if (Gate::allows('edit_union', $user)) 
            {
                $divisions = Division::where('status', 1)->get();
                $districts = District::where('status', 1)->get();
                $upazilas = Upazila::where('status',1)->get();
                
                return view('backend.admin.union.edit',[
                    'union' => $union,
                    'divisions' =>$divisions,
                    'districts' =>$districts,
                    'upazilas' =>$upazilas,
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
    public function update(Request $request, Union $union)
    {
        $user = Auth::user();
        if (Gate::allows('manage_union', $user)) 
        {
            if (Gate::allows('edit_union', $user)) 
            {
                $validation = Validator::make($request->all(),
                [ 
                    'name_en'      => 'required|max:255',
                    'name_bn'      => 'required|max:255',
                    'division_id'   => 'required',
                    'district_id'   => 'required',
                    'upazila_id'   => 'required',
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

                $union->union_bbs_code  = $request->union_bbs_code;
                $union->district_id       = $request->district_id;
                $union->district_bbs_code = $request->district_bbs_code;
                $union->division_id       = $request->division_id;
                $union->division_bbs_code = $request->division_bbs_code;
                $union->name_en           = $request->name_en;
                $union->name_bn           = $request->name_bn;
                $union->land_area         = $request->land_area;
                $union->river_area        = $request->river_area;
                $union->forest_area       = $request->forest_area;
                $union->upazila_id        = $request->upazila_id;
                $union->upazila_bbs_code  = $request->upazila_bbs_code;
                // dd($union);
                $union->save();

                return redirect()->route('admin.union.index')->with('success','Union Created Successfully.');
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

    public function statusChange(Union $union)
    {
        $user = Auth::user();

        if (Gate::allows('manage_union', $user)) 
        {
            if (Gate::allows('delete_union', $user)) 
            {
                if ($union->status == 0) {
                    $union->status = 1;
                }
                else if ($union->status == 1) {
                    $union->status = 0;
                }
        
                $union->save();

                return redirect()->route('admin.union.index')->with('success', 'Union Status Changed Successfully.');
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

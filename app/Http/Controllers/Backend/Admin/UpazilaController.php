<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Gate;

/* included models */
use App\Models\Upazila;
use App\Models\Division;
use App\Models\District;

class UpazilaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // menuSubmenu('upazila', 'allUpazilas');
        menuSubmenuSubsubmeny('location', 'upazila', 'allUpazilas');

        $user = Auth::user();

        if (Gate::allows('manage_upazila', $user)) 
        {
            if (Gate::allows('all_upazilas', $user)) 
            {
                $upazilas = Upazila::with('division', 'district')->orderBy('id', 'asc')->paginate(25);

                return view('backend.admin.upazila.index', compact('upazilas'));
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
        // menuSubmenu('upazila', 'addUpazila');
        menuSubmenuSubsubmeny('location', 'upazila', 'addUpazila');

        $user = Auth::user();

        if (Gate::allows('manage_upazila', $user)) 
        {
            if (Gate::allows('add_upazila', $user)) 
            {
                $divisions = Division::where('status', 1)->get();
                $districts = District::where('status', 1)->get();
                
                return view('backend.admin.upazila.create', compact('divisions', 'districts'));
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
        $request->validate([
            'name_en'      => 'required|max:255',
            'name_bn'      => 'required|max:255',
            'division_id'   => 'required',
            'district_id'   => 'required',
        ]);

        $upazila = new Upazila;

        $upazila->upazila_bbs_code  = $request->upazila_bbs_code;
        $upazila->district_id       = $request->district_id;
        $upazila->district_bbs_code = $request->district_bbs_code;
        $upazila->division_id       = $request->division_id;
        $upazila->division_bbs_code = $request->division_bbs_code;
        $upazila->name_en           = $request->name_en;
        $upazila->name_bn           = $request->name_bn;
        $upazila->land_area         = $request->land_area;
        $upazila->river_area        = $request->river_area;
        $upazila->forest_area       = $request->forest_area;

        $upazila->save();

        return redirect()->route('admin.upazila.index')->with('success','Upazila Created Successfully.');
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

        if (Gate::allows('manage_upazila', $user)) 
        {
            if (Gate::allows('view_upazila', $user)) 
            {
                $upazila = Upazila::with('division', 'district')
                                    ->where('id', $id)
                                    ->first();

                return view('backend.admin.upazila.show', compact('upazila'));
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
    public function edit($id)
    {
        $user = Auth::user();

        if (Gate::allows('manage_upazila', $user)) 
        {
            if (Gate::allows('edit_upazila', $user)) 
            {
                $divisions = Division::where('status', 1)->get();
                $districts = District::where('status', 1)->get();
            
                $upazila = Upazila::with('district', 'division')
                                    ->where('id', $id)
                                    ->first();

                return view('backend.admin.upazila.edit', compact('divisions', 'districts', 'upazila'));
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
    public function update(Request $request, Upazila $upazila)
    {
        $request->validate([
            'name_en'      => 'required|max:255',
            'name_bn'      => 'required|max:255',
            'division_id'   => 'required',
            'district_id'   => 'required',
        ]);

        $upazila = new Upazila;

        $upazila->upazila_bbs_code  = $request->upazila_bbs_code;
        $upazila->district_id       = $request->district_id;
        $upazila->district_bbs_code = $request->district_bbs_code;
        $upazila->division_id       = $request->division_id;
        $upazila->division_bbs_code = $request->division_bbs_code;
        $upazila->name_en           = $request->name_en;
        $upazila->name_bn           = $request->name_bn;
        $upazila->land_area         = $request->land_area;
        $upazila->river_area        = $request->river_area;
        $upazila->forest_area       = $request->forest_area;
        $upazila->status            = $request->status;

        $upazila->save();

        return redirect()->route('admin.upazila.index')->with('success','Upazila Updated Successfully.');
    }


    /**
     * Change status of the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statusChange(Upazila $upazila)
    {
        $user = Auth::user();

        if (Gate::allows('manage_upazila', $user)) 
        {
            if (Gate::allows('delete_upazila', $user)) 
            {
                if ($upazila->status == 0) {
                    $upazila->status = 1;
                }
                else if ($upazila->status == 1) {
                    $upazila->status = 0;
                }
        
                $upazila->save();
        
                return redirect()->route('admin.upazila.index')->with('success', 'Upazila Status Changed Successfully.');
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

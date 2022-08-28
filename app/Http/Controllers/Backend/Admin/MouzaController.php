<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;

/* included models */
use App\Models\Mouza;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Union;

class MouzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenuSubsubmeny('location', 'mouza', 'allMouzas');

        $user = Auth::user();

        if (Gate::allows('manage_mouza', $user)) 
        {
            if (Gate::allows('all_mouzas', $user)) 
            {
                $mouzas = Mouza::with('division', 'district', 'upazila', 'union')->orderBy('id', 'asc')->paginate(25);

                return view('backend.admin.mouza.index', compact('mouzas'));
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
        menuSubmenuSubsubmeny('location', 'mouza', 'addMouza');

        $user = Auth::user();

        if (Gate::allows('manage_mouza', $user)) 
        {
            if (Gate::allows('add_mouza', $user)) 
            {
                $divisions = Division::where('status', 1)->get();
                $districts = District::where('status', 1)->get();
                $upazilas  = Upazila::where('status', 1)->get();
                $unions    = Union::where('status', 1)->get();
                
                return view('backend.admin.mouza.create', compact('divisions', 'districts', 'upazilas', 'unions'));
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
            'division_id'  => 'required',
            'district_id'  => 'required',
            'upazila_id'   => 'required',
            'union_id'     => 'required',
            'jl_no'        => 'required',
        ]);

        $mouza = new Mouza;

        $mouza->mouza_bbs_code          = $request->mouza_bbs_code;
        $mouza->nmouza_bbs_code         = $request->nmouza_bbs_code;
        $mouza->district_id             = $request->district_id;
        $mouza->district_bbs_code       = $request->district_bbs_code;
        $mouza->division_id             = $request->division_id;
        $mouza->division_bbs_code       = $request->division_bbs_code;
        $mouza->upazila_id              = $request->upazila_id;
        $mouza->upazila_bbs_code        = $request->upazila_bbs_code;
        $mouza->union_id                = $request->union_id;
        $mouza->union_bbs_code          = $request->union_bbs_code;
        $mouza->nunion_bbs_code         = $request->nunion_bbs_code;
        $mouza->name_en                 = $request->name_en;
        $mouza->name_bn                 = $request->name_bn;
        $mouza->jl_no                   = $request->jl_no;
        $mouza->rmo                     = $request->rmo;
        $mouza->total_part              = $request->total_part;
        $mouza->part_no                 = $request->part_no;
        $mouza->land_area               = $request->land_area;
        $mouza->river_area              = $request->river_area;
        $mouza->forest_area             = $request->forest_area;

        $mouza->save();

        return redirect()->route('admin.mouza.index')->with('success','mouza Created Successfully.');
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

        if (Gate::allows('manage_mouza', $user)) 
        {
            if (Gate::allows('view_mouza', $user)) 
            {
                $mouza = Mouza::with('division', 'district', 'upazila', 'union')
                                ->where('id', $id)
                                ->first();

                return view('backend.admin.mouza.show', compact('mouza'));
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

        if (Gate::allows('manage_mouza', $user)) 
        {
            if (Gate::allows('edit_mouza', $user)) 
            {
                $divisions = Division::where('status', 1)->get();
                $districts = District::where('status', 1)->get();
                $upazilas  = Upazila::where('status', 1)->get();
                $unions    = Union::where('status', 1)->get();
            
                $mouza = mouza::with('district', 'division', 'upazila', 'union')
                                    ->where('id', $id)
                                    ->first();

                return view('backend.admin.mouza.edit', compact('divisions', 'districts', 'upazilas', 'unions', 'mouza'));
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
    public function update(Request $request, Mouza $mouza)
    {
        $request->validate([
            'name_en'      => 'required|max:255',
            'name_bn'      => 'required|max:255',
            'division_id'  => 'required',
            'district_id'  => 'required',
            'upazila_id'   => 'required',
            'union_id'     => 'required',
            'jl_no'        => 'required',
        ]);

        $mouza = new Mouza;

        $mouza->mouza_bbs_code          = $request->mouza_bbs_code;
        $mouza->nmouza_bbs_code         = $request->nmouza_bbs_code;
        $mouza->district_id             = $request->district_id;
        $mouza->district_bbs_code       = $request->district_bbs_code;
        $mouza->division_id             = $request->division_id;
        $mouza->division_bbs_code       = $request->division_bbs_code;
        $mouza->upazila_id                = $request->upazila_id;
        $mouza->upazila_bbs_code          = $request->upazila_bbs_code;
        $mouza->union_id                = $request->union_id;
        $mouza->union_bbs_code          = $request->union_bbs_code;
        $mouza->nunion_bbs_code         = $request->nunion_bbs_code;
        $mouza->name_en                 = $request->name_en;
        $mouza->name_bn                 = $request->name_bn;
        $mouza->jl_no                   = $request->jl_no;
        $mouza->rmo                     = $request->rmo;
        $mouza->total_part              = $request->total_part;
        $mouza->part_no                 = $request->part_no;
        $mouza->land_area               = $request->land_area;
        $mouza->river_area              = $request->river_area;
        $mouza->forest_area             = $request->forest_area;
        $mouza->status                  = $request->status;

        $mouza->save();

        return redirect()->route('admin.mouza.index')->with('success','Mouza Updated Successfully.');
    }

    /**
     * Change status of the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statusChange(Mouza $mouza)
    {
        $user = Auth::user();

        if (Gate::allows('manage_mouza', $user)) 
        {
            if (Gate::allows('delete_mouza', $user)) 
            {
                if ($mouza->status == 0) {
                    $mouza->status = 1;
                }
                else if ($mouza->status == 1) {
                    $mouza->status = 0;
                }
        
                $mouza->save();
        
                return redirect()->route('admin.mouza.index')->with('success', 'Mouza Status Changed Successfully.');
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

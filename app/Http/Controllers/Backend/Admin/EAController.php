<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Gate;

/* included models */
use App\Models\EA;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Union;
use App\Models\Mouza;
use App\Models\Village;

class EAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenuSubsubmeny('location', 'manage_ea', 'all_eas');

        $user = Auth::user();

        if (Gate::allows('manage_ea', $user)) 
        {
            if (Gate::allows('all_eas', $user)) 
            {
                $eas = EA::with('division', 'district', 'upazila', 'union', 'mouza', 'village')->orderBy('id', 'asc')->paginate(15);

                return view('backend.admin.ea.index', compact('eas'));
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
        menuSubmenuSubsubmeny('location', 'manage_ea', 'add_ea');

        $user = Auth::user();

        if (Gate::allows('manage_ea', $user)) 
        {
            if (Gate::allows('add_ea', $user)) 
            {
                $divisions = Division::where('status', 1)->get();
                $districts = District::where('status', 1)->get();
                $upazilas  = Upazila::where('status', 1)->get();
                $unions    = Union::where('status', 1)->get();
                $mouzas    = Mouza::where('status', 1)->get();
                $villages  = Village::where('status', 1)->get();
                
                return view('backend.admin.ea.create', compact('divisions', 'districts', 'upazilas', 'unions', 'mouzas', 'villages'));
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
            'ea_code'      => 'required|max:255',
            'division_id'  => 'required',
            'district_id'  => 'required',
            'upazila_id'   => 'required',
            'union_id'     => 'required',
            'mouza_id'     => 'required',
            'village_id'   => 'required',
        ]);

        $ea = new EA;

        $ea->name_en        = $request->name_en;
        $ea->name_bn        = $request->name_bn;
        $ea->ea_code        = $request->ea_code;
        $ea->division_id    = $request->division_id;
        $ea->district_id    = $request->district_id;
        $ea->upazila_id     = $request->upazila_id;
        $ea->union_id       = $request->union_id;
        $ea->mouza_id       = $request->mouza_id;
        $ea->village_id     = $request->village_id;
        $ea->created_by     = Auth::id();

        $ea->save();

        return redirect()->route('admin.ea.index')->with('success','EA Created Successfully.');
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

        if (Gate::allows('manage_ea', $user)) 
        {
            if (Gate::allows('view_ea', $user)) 
            {
                $ea = EA::with('division', 'district', 'upazila', 'union', 'mouza', 'village')
                        ->where('id', $id)
                        ->first();

                return view('backend.admin.ea.show', compact('ea'));
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

        if (Gate::allows('manage_ea', $user)) 
        {
            if (Gate::allows('edit_ea', $user)) 
            {
                $divisions = Division::where('status', 1)->get();
                $districts = District::where('status', 1)->get();
                $upazilas  = Upazila::where('status', 1)->get();
                $unions    = Union::where('status', 1)->get();
                $mouzas    = Union::where('status', 1)->get();
                $villages  = Village::where('status', 1)->get();
            
                $ea = EA::with('district', 'division', 'upazila', 'union', 'mouza', 'village')
                        ->where('id', $id)
                        ->first();

                return view('backend.admin.ea.edit', compact('divisions', 'districts', 'upazilas', 'unions', 'mouzas', 'villages', 'ea'));
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
    public function update(Request $request, EA $ea)
    {
        $request->validate([
            'name_en'      => 'required|max:255',
            'name_bn'      => 'required|max:255',
            'ea_code'      => 'required|max:255',
            'division_id'  => 'required',
            'district_id'  => 'required',
            'upazila_id'   => 'required',
            'union_id'     => 'required',
            'mouza_id'     => 'required',
            'village_id'   => 'required',
        ]);

        $ea->name_en        = $request->name_en;
        $ea->name_bn        = $request->name_bn;
        $ea->ea_code        = $request->ea_code;
        $ea->division_id    = $request->division_id;
        $ea->district_id    = $request->district_id;
        $ea->upazila_id     = $request->upazila_id;
        $ea->union_id       = $request->union_id;
        $ea->mouza_id       = $request->mouza_id;
        $ea->village_id     = $request->village_id;
        $ea->status         = $request->status;
        $ea->updated_by     = Auth::id();

        $ea->save();

        return redirect()->route('admin.ea.index')->with('success','EA Updated Successfully.');
    }

    /**
     * Change status of the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statusChange(EA $ea)
    {
        $user = Auth::user();

        if (Gate::allows('manage_ea', $user)) 
        {
            if (Gate::allows('delete_ea', $user)) 
            {
                if ($ea->status == 0) {
                    $ea->status     = 1;
                    $ea->updated_by = Auth::id();
                }
                else if ($ea->status == 1) {
                    $ea->status     = 0;
                    $ea->updated_by = Auth::id();
                }
        
                $ea->save();
        
                return redirect()->route('admin.ea.index')->with('success', 'EA Status Changed Successfully.');
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

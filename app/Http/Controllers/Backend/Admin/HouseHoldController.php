<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Gate;

/* included models */
use App\Models\HouseHold;
use App\Models\EA;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Union;
use App\Models\Mouza;
use App\Models\Village;

class HouseHoldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenuSubsubmeny('location', 'manage_household', 'all_households');

        $user = Auth::user();

        if (Gate::allows('manage_household', $user)) 
        {
            if (Gate::allows('all_households', $user)) 
            {
                $households = HouseHold::with('division', 'district', 'upazila', 'union', 'mouza', 'village', 'ea')
                                        ->orderBy('id', 'asc')
                                        ->paginate(15);

                return view('backend.admin.household.index', compact('households'));
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
        menuSubmenuSubsubmeny('location', 'manage_household', 'add_household');

        $user = Auth::user();

        if (Gate::allows('manage_household', $user)) 
        {
            if (Gate::allows('add_household', $user)) 
            {
                $divisions = Division::where('status', 1)->get();
                $districts = District::where('status', 1)->get();
                $upazilas  = Upazila::where('status', 1)->get();
                $unions    = Union::where('status', 1)->get();
                $mouzas    = Mouza::where('status', 1)->get();
                $villages  = Village::where('status', 1)->get();
                $eas       = EA::where('status', 1)->get();
                
                return view('backend.admin.household.create', compact('divisions', 'districts', 'upazilas', 'unions', 'mouzas', 'villages', 'eas'));
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
            'name_en'           => 'required|max:255',
            'name_bn'           => 'required|max:255',
            'household_code'    => 'required|max:255',
            'division_id'       => 'required',
            'district_id'       => 'required',
            'upazila_id'        => 'required',
            'union_id'          => 'required',
            'mouza_id'          => 'required',
            'village_id'        => 'required',
            'ea_id'             => 'required',
        ]);

        $household = new HouseHold;

        $household->name_en        = $request->name_en;
        $household->name_bn        = $request->name_bn;
        $household->household_code = $request->household_code;
        $household->division_id    = $request->division_id;
        $household->district_id    = $request->district_id;
        $household->upazila_id     = $request->upazila_id;
        $household->union_id       = $request->union_id;
        $household->mouza_id       = $request->mouza_id;
        $household->village_id     = $request->village_id;
        $household->ea_id          = $request->ea_id;
        $household->created_by     = Auth::id();

        $household->save();

        return redirect()->route('admin.household.index')->with('success','House Hold Created Successfully.');
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

        if (Gate::allows('manage_household', $user)) 
        {
            if (Gate::allows('view_household', $user)) 
            {
                $household = HouseHold::with('division', 'district', 'upazila', 'union', 'mouza', 'village', 'ea')
                                        ->where('id', $id)
                                        ->first();

                return view('backend.admin.household.show', compact('household'));
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

        if (Gate::allows('manage_household', $user)) 
        {
            if (Gate::allows('edit_household', $user)) 
            {
                $divisions = Division::where('status', 1)->get();
                $districts = District::where('status', 1)->get();
                $upazilas  = Upazila::where('status', 1)->get();
                $unions    = Union::where('status', 1)->get();
                $mouzas    = Union::where('status', 1)->get();
                $villages  = Village::where('status', 1)->get();
                $eas       = EA::where('status', 1)->get();
            
                $household = HouseHold::with('district', 'division', 'upazila', 'union', 'mouza', 'village', 'ea')
                                        ->where('id', $id)
                                        ->first();

                return view('backend.admin.household.edit', compact('divisions', 'districts', 'upazilas', 'unions', 'mouzas', 'eas', 'household'));
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
    public function update(Request $request, HouseHold $household)
    {
        $request->validate([
            'name_en'           => 'required|max:255',
            'name_bn'           => 'required|max:255',
            'household_code'    => 'required|max:255',
            'division_id'       => 'required',
            'district_id'       => 'required',
            'upazila_id'        => 'required',
            'union_id'          => 'required',
            'mouza_id'          => 'required',
            'village_id'        => 'required',
            'ea_id'             => 'required',
        ]);

        $household->name_en        = $request->name_en;
        $household->name_bn        = $request->name_bn;
        $household->household_code = $request->household_code;
        $household->division_id    = $request->division_id;
        $household->district_id    = $request->district_id;
        $household->upazila_id     = $request->upazila_id;
        $household->union_id       = $request->union_id;
        $household->mouza_id       = $request->mouza_id;
        $household->village_id     = $request->village_id;
        $household->ea_id          = $request->ea_id;
        $household->status         = $request->status;
        $household->updated_by     = Auth::id();

        $household->save();

        return redirect()->route('admin.household.index')->with('success','House Hold Updated Successfully.');
    }

    /**
     * Change status of the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statusChange(HouseHold $household)
    {
        $user = Auth::user();

        if (Gate::allows('manage_household', $user)) 
        {
            if (Gate::allows('delete_household', $user)) 
            {
                if ($household->status == 0) {
                    $household->status      = 1;
                    $household->updated_by  = Auth::id();
                }
                else if ($household->status == 1) {
                    $household->status      = 0;
                    $household->updated_by  = Auth::id();
                }
        
                $household->save();
        
                return redirect()->route('admin.household.index')->with('success', 'House Hold Status Changed Successfully.');
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

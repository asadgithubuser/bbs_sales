<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Gate;

/* included models */
use App\Models\Population;
use App\Models\HouseHold;
use App\Models\EA;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Union;
use App\Models\Mouza;
use App\Models\Village;

class PopulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenuSubsubmeny('location', 'manage_population', 'all_populations');

        $user = Auth::user();

        if (Gate::allows('manage_population', $user)) 
        {
            if (Gate::allows('all_populations', $user)) 
            {
                $populations = population::with('division', 'district', 'upazila', 'union', 'mouza', 'village', 'ea', 'household')
                                            ->orderBy('id', 'asc')
                                            ->paginate(15);

                return view('backend.admin.population.index', compact('populations'));
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
        menuSubmenuSubsubmeny('location', 'manage_population', 'add_population');

        $user = Auth::user();

        if (Gate::allows('manage_population', $user)) 
        {
            if (Gate::allows('add_population', $user)) 
            {
                $divisions      = Division::where('status', 1)->get();
                $districts      = District::where('status', 1)->get();
                $upazilas       = Upazila::where('status', 1)->get();
                $unions         = Union::where('status', 1)->get();
                $mouzas         = Mouza::where('status', 1)->get();
                $villages       = Village::where('status', 1)->get();
                $eas            = EA::where('status', 1)->get();
                $households     = HouseHold::where('status', 1)->get();
                
                return view('backend.admin.population.create', compact('divisions', 'districts', 'upazilas', 'unions', 'mouzas', 'villages', 'eas', 'households'));
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
            'digit_en'          => 'required',
            'digit_bn'          => 'required',
            'population_code'   => 'required',
            'division_id'       => 'required',
            'district_id'       => 'required',
            'upazila_id'        => 'required',
            'union_id'          => 'required',
            'mouza_id'          => 'required',
            'village_id'        => 'required',
            'ea_id'             => 'required',
            'household_id'      => 'required',
        ]);

        $population = new Population;

        $population->name_en            = $request->name_en;
        $population->name_bn            = $request->name_bn;
        $population->digit_en           = $request->digit_en;
        $population->digit_bn           = $request->digit_bn;
        $population->population_code    = $request->population_code;
        $population->division_id        = $request->division_id;
        $population->district_id        = $request->district_id;
        $population->upazila_id         = $request->upazila_id;
        $population->union_id           = $request->union_id;
        $population->mouza_id           = $request->mouza_id;
        $population->village_id         = $request->village_id;
        $population->ea_id              = $request->ea_id;
        $population->household_id       = $request->household_id;
        $population->created_by         = Auth::id();

        $population->save();

        return redirect()->route('admin.population.index')->with('success','Population Created Successfully.');
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

        if (Gate::allows('manage_population', $user)) 
        {
            if (Gate::allows('view_population', $user)) 
            {
                $population = population::with('division', 'district', 'upazila', 'union', 'mouza', 'village', 'ea', 'household')
                                        ->where('id', $id)
                                        ->first();

                return view('backend.admin.population.show', compact('population'));
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

        if (Gate::allows('manage_population', $user)) 
        {
            if (Gate::allows('edit_population', $user)) 
            {
                $divisions  = Division::where('status', 1)->get();
                $districts  = District::where('status', 1)->get();
                $upazilas   = Upazila::where('status', 1)->get();
                $unions     = Union::where('status', 1)->get();
                $mouzas     = Union::where('status', 1)->get();
                $villages   = Village::where('status', 1)->get();
                $eas        = EA::where('status', 1)->get();
                $households = HouseHold::where('status', 1)->get();
            
                $population = population::with('district', 'division', 'upazila', 'union', 'mouza', 'village', 'ea', 'household')
                                        ->where('id', $id)
                                        ->first();

                return view('backend.admin.population.edit', compact('divisions', 'districts', 'upazilas', 'unions', 'mouzas', 'eas', 'households', 'population'));
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
    public function update(Request $request, Population $population)
    {
        $request->validate([
            'name_en'           => 'required|max:255',
            'name_bn'           => 'required|max:255',
            'digit_en'          => 'required|max:255',
            'digit_bn'          => 'required|max:255',
            'population_code'   => 'required',
            'division_id'       => 'required',
            'district_id'       => 'required',
            'upazila_id'        => 'required',
            'union_id'          => 'required',
            'mouza_id'          => 'required',
            'village_id'        => 'required',
            'ea_id'             => 'required',
            'household_id'      => 'required',
        ]);

        $population->name_en            = $request->name_en;
        $population->name_bn            = $request->name_bn;
        $population->digit_en           = $request->digit_en;
        $population->digit_bn           = $request->digit_bn;
        $population->population_code    = $request->population_code;
        $population->division_id        = $request->division_id;
        $population->district_id        = $request->district_id;
        $population->upazila_id         = $request->upazila_id;
        $population->union_id           = $request->union_id;
        $population->mouza_id           = $request->mouza_id;
        $population->village_id         = $request->village_id;
        $population->ea_id              = $request->ea_id;
        $population->household_id       = $request->household_id;
        $population->status             = $request->status;
        $population->updated_by         = Auth::id();

        $population->save();

        return redirect()->route('admin.population.index')->with('success','Population Updated Successfully.');
    }

    /**
     * Change status of the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statusChange(Population $population)
    {
        $user = Auth::user();

        if (Gate::allows('manage_population', $user)) 
        {
            if (Gate::allows('delete_population', $user)) 
            {
                if ($population->status == 0) {
                    $population->status     = 1;
                    $population->updated_by = Auth::id();

                }
                else if ($population->status == 1) {
                    $population->status     = 0;
                    $population->updated_by = Auth::id();
                }
        
                $population->save();
        
                return redirect()->route('admin.population.index')->with('success', 'Population Status Changed Successfully.');
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

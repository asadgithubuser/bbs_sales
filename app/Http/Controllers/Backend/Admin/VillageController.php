<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Gate;

/* included models */
use App\Models\Village;
use App\Models\Mouza;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Union;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenuSubsubmeny('location', 'manage_village', 'all_villages');

        $user = Auth::user();

        if (Gate::allows('manage_village', $user)) 
        {
            if (Gate::allows('all_villages', $user)) 
            {
                $villages = Village::with('division', 'district', 'upazila', 'union', 'mouza')->orderBy('id', 'asc')->paginate(25);

                return view('backend.admin.village.index', compact('villages'));
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
        menuSubmenuSubsubmeny('location', 'manage_village', 'add_village');

        $user = Auth::user();

        if (Gate::allows('manage_village', $user)) 
        {
            if (Gate::allows('add_village', $user)) 
            {
                $divisions = Division::where('status', 1)->get();
                $districts = District::where('status', 1)->get();
                $upazilas  = Upazila::where('status', 1)->get();
                $unions    = Union::where('status', 1)->get();
                $mouzas    = Mouza::where('status', 1)->get();
                
                return view('backend.admin.village.create', compact('divisions', 'districts', 'upazilas', 'unions', 'mouzas'));
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
            'village_code'      => 'required|max:255',
            'division_id'       => 'required',
            'district_id'       => 'required',
            'upazila_id'        => 'required',
            'union_id'          => 'required',
            'mouza_id'          => 'required',
        ]);

        $village = new Village;

        $village->name_en            = $request->name_en;
        $village->name_bn            = $request->name_bn;
        $village->village_code       = $request->village_code;
        $village->division_id        = $request->division_id;
        $village->district_id        = $request->district_id;
        $village->upazila_id         = $request->upazila_id;
        $village->union_id           = $request->union_id;
        $village->mouza_id           = $request->mouza_id;
        $village->created_by         = Auth::id();

        $village->save();

        return redirect()->route('admin.village.index')->with('success','Village Created Successfully.');
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

        if (Gate::allows('manage_village', $user)) 
        {
            if (Gate::allows('view_village', $user)) 
            {
                $village = Village::with('division', 'district', 'upazila', 'union', 'mouza')
                                    ->where('id', $id)
                                    ->first();

                return view('backend.admin.village.show', compact('village'));
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

        if (Gate::allows('manage_village', $user)) 
        {
            if (Gate::allows('edit_village', $user)) 
            {
                $divisions = Division::where('status', 1)->get();
                $districts = District::where('status', 1)->get();
                $upazilas  = Upazila::where('status', 1)->get();
                $unions    = Union::where('status', 1)->get();
                $mouzas    = Union::where('status', 1)->get();
            
                $village = Village::with('district', 'division', 'upazila', 'union', 'mouza')
                                    ->where('id', $id)
                                    ->first();

                return view('backend.admin.village.edit', compact('divisions', 'districts', 'upazilas', 'unions', 'village'));
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
    public function update(Request $request, Village $village)
    {
        $request->validate([
            'name_en'       => 'required|max:255',
            'name_bn'       => 'required|max:255',
            'village_code'  => 'required',
            'division_id'   => 'required',
            'district_id'   => 'required',
            'upazila_id'    => 'required',
            'union_id'      => 'required',
            'mouza_id'      => 'required',
        ]);

        $village->name_en        = $request->name_en;
        $village->name_bn        = $request->name_bn;
        $village->village_code   = $request->village_code;
        $village->division_id    = $request->division_id;
        $village->district_id    = $request->district_id;
        $village->upazila_id     = $request->upazila_id;
        $village->union_id       = $request->union_id;
        $village->mouza_id       = $request->mouza_id;
        $village->status         = $request->status;
        $village->updated_by     = Auth::id();

        $village->save();

        return redirect()->route('admin.village.index')->with('success','Village Updated Successfully.');
    }

    /**
     * Change status of the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statusChange(Village $village)
    {
        $user = Auth::user();

        if (Gate::allows('manage_village', $user)) 
        {
            if (Gate::allows('delete_village', $user)) 
            {
                if ($village->status == 0) {
                    $village->status      = 1;
                    $village->updated_by  = Auth::id();
                }
                else if ($village->status == 1) {
                    $village->status      = 0;
                    $village->updated_by  = Auth::id();
                }
        
                $village->save();
        
                return redirect()->route('admin.village.index')->with('success', 'Village Status Changed Successfully.');
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

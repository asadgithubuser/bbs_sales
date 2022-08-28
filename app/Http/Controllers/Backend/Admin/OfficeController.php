<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Gate;

/* included models */
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Office;
use App\Models\Level;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('offices', 'allOffices');

        $user = Auth::user();

        if (Gate::allows('manage_offices', $user)) 
        {
            if (Gate::allows('all_offices', $user)) 
            {
                $offices = Office::with('lev')->latest()->paginate(25);

                return view('backend.admin.office.index', compact('offices'));
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
        menuSubmenu('offices', 'addOffice');

        $user = Auth::user();

        if (Gate::allows('manage_offices', $user)) 
        {
            if (Gate::allows('add_office', $user)) 
            {
                $levels = Level::all();
                $divisions = Division::where('status', 1)->get();
                $districts = District::where('status', 1)->get();
                $upazilas = Upazila::where('status', 1)->get();
                
                return view('backend.admin.office.create', compact('divisions', 'districts', 'upazilas','levels'));
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
            'level'         => 'required',
            'office_code'   => 'required',
            'title_bn'      => 'required|max:255',
            'title_en'      => 'required|max:255',
            'division_id'   => 'required',
            'district_id'   => 'required',
            'upazila_id'    => 'required',
            'phone'         => 'required',
            'address'       => 'required',
            'ordering'      => 'required',
        ]);

        $office = new Office;

        $office->level          = $request->level;
        $office->office_code    = $request->office_code;
        $office->title_bn       = $request->title_bn;
        $office->title_en       = $request->title_en;
        $office->division_id    = $request->division_id;
        $office->district_id    = $request->district_id;
        $office->upazila_id     = $request->upazila_id;
        $office->address        = $request->address;
        $office->web_url        = $request->web_url;
        $office->about_info     = $request->about_info;
        $office->phone          = $request->phone;
        $office->email          = $request->email;
        $office->fax            = $request->fax;
        $office->ordering       = $request->ordering;
        $office->status         = 1;
        $office->created_by     = Auth::id();

        $office->save();

        return redirect()->route('admin.office.index')->with('success','Office Created Successfully.');
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

        if (Gate::allows('manage_offices', $user)) 
        {
            if (Gate::allows('view_office', $user)) 
            {
                $office = Office::with('user', 'division', 'district', 'upazila', 'user_update')
                                ->where('id', $id)
                                ->first();

                return view('backend.admin.office.show', compact('office'));
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

        if (Gate::allows('manage_offices', $user)) 
        {
            if (Gate::allows('edit_office', $user)) 
            {
                $divisions = Division::where('status', 1)->get();
                $districts = District::where('status', 1)->get();
                $upazilas = Upazila::where('status', 1)->get();
                $levels = Level::all();
            
                $office = Office::with('district', 'upazila')
                                ->where('id', $id)
                                ->first();

                return view('backend.admin.office.edit', compact('divisions', 'districts', 'upazilas', 'office','levels'));
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
    public function update(Request $request, Office $office)
    {
        $request->validate([
            'level'         => 'required',
            'office_code'   => 'required',
            'title_bn'      => 'required|max:255',
            'title_en'      => 'required|max:255',
            'division_id'   => 'required',
            'district_id'   => 'required',
            'upazila_id'    => 'required',
            'phone'         => 'required',
            'address'       => 'required',
            'ordering'      => 'required',
        ]);

        $office->level          = $request->level;
        $office->office_code    = $request->office_code;
        $office->title_bn       = $request->title_bn;
        $office->title_en       = $request->title_en;
        $office->division_id    = $request->division_id;
        $office->district_id    = $request->district_id;
        $office->upazila_id     = $request->upazila_id;
        $office->address        = $request->address;
        $office->web_url        = $request->web_url;
        $office->about_info     = $request->about_info;
        $office->phone          = $request->phone;
        $office->email          = $request->email;
        $office->fax            = $request->fax;
        $office->ordering       = $request->ordering;
        $office->status         = $request->status;
        $office->updated_by     = Auth::id();

        $office->save();

        return redirect()->route('admin.office.index')->with('success', 'Office Updated Successfully.');
    }

    /**
     * Change status of the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statusChange(Office $office)
    {
        $user = Auth::user();

        if (Gate::allows('manage_offices', $user)) 
        {
            if (Gate::allows('delete_office', $user)) 
            {
                if ($office->status == 0) {
                    $office->status       = 1;
                    $office->updated_by   = Auth::id();
                }
                else if ($office->status == 1) {
                    $office->status       = 0;
                    $office->updated_by   = Auth::id();
                }
        
                $office->save();
        
                return redirect()->route('admin.office.index')->with('success', 'Office Status Changed Successfully.');
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

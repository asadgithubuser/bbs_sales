<?php

namespace App\Http\Controllers\Backend\Admin;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

/* included models */
use App\Models\ApplicationsForwardMap;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Office;
use App\Models\Role;
use App\Models\Level;

class ApplicationForwardController extends Controller
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
            if(Gate::allows('all_application_forward_mapping',$user))
            {               
                
                menuSubmenu('applicationSetting', 'allApplicationForward');

                $applicationForwardMaps = ApplicationsForwardMap::with('division', 'district', 'upazila', 'office', 'senderRole', 'forwardRole', 'level')
                                        ->latest()
                                        ->paginate(25);

                return view('backend.admin.applicationForward.index', compact('applicationForwardMaps'));
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
            if(Gate::allows('add_application_forward_mapping',$user))
            {               
                
                
                menuSubmenu('applicationSetting', 'addApplicationForward');

                $divisions = Division::where('status', 1)->get();
                $districts = District::where('status', 1)->get();
                $upazilas = Upazila::where('status', 1)->get();
                $offices = Office::where('status', 1)->get();
                $roles = Role::where('status', 1)->get();
                $levels = Level::get();

                return view('backend.admin.applicationForward.create', compact('divisions', 'districts', 'upazilas', 'offices', 'roles', 'levels'));
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
        $appForward = new ApplicationsForwardMap;
        $appForward->division_id = $request->division_id;
        $appForward->district_id = $request->district_id;
        $appForward->upazila_id = $request->upazila_id;
        $appForward->office_id = $request->office_id;
        $appForward->level_id = $request->level_id;
        $appForward->sender_role_id = $request->sender_role_id;
        $appForward->forward_role_id = $request->forward_role_id;
        if($request->is_approved_person == 'on'){
            $appForward->is_approved_person = 1;
        }else{
            $appForward->is_approved_person = 0;
        }
        $done = $appForward->save();

        if ($done)
        {
            return redirect()->route('admin.applicationForwarding.index')->with('success', 'Application Forwarding Successfully Done.');
        } else {
            return redirect()->route('admin.applicationForwarding.index')->with('error', 'Something went wrong, Please try again...!');
        }
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
    public function edit($id)
    {

        $user = Auth::user();

        if (Gate::allows('manage_applications', $user)) 
        {
            if(Gate::allows('edit_application_forward_mapping',$user))
            {               
                
                
                menuSubmenu('applicationForward', 'addApplicationForward');

                $divisions = Division::where('status', 1)->get();
                $districts = District::where('status', 1)->get();
                $upazilas = Upazila::where('status', 1)->get();
                $offices = Office::where('status', 1)->get();
                $roles = Role::where('status', 1)->get();
                $levels = Level::get();

                $applicationForwardMaps = ApplicationsForwardMap::with('division', 'district', 'upazila', 'office', 'senderRole', 'forwardRole', 'level')
                                ->where('id', $id)
                                ->first();

                return view('backend.admin.applicationForward.edit', compact('divisions', 'districts', 'upazilas', 'offices', 'roles', 'applicationForwardMaps', 'levels'));
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
    public function update(Request $request, $id)
    {
        $applicationForwardMap = ApplicationsForwardMap::find($id)->first();
        
        $applicationForwardMap->division_id = $request->division_id;
        $applicationForwardMap->district_id = $request->district_id;
        $applicationForwardMap->upazila_id = $request->upazila_id;
        $applicationForwardMap->office_id = $request->office_id;
        $applicationForwardMap->level_id = $request->level_id;
        $applicationForwardMap->sender_role_id = $request->sender_role_id;
        $applicationForwardMap->forward_role_id = $request->forward_role_id;
        if($request->is_approved_person == 'on'){
            $applicationForwardMap->is_approved_person = 1;
        }else{
            $applicationForwardMap->is_approved_person = 0;
        }
        $done = $applicationForwardMap->save();

        if ($done)
        {
            return redirect()->route('admin.applicationForwarding.index')->with('success', 'Application Forwarding Updated Successfully.');
        } else {
            return redirect()->route('admin.applicationForwarding.index')->with('error', 'Something went wrong, Please try again...!');
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

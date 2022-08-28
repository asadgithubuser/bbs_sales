<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Gate;

/* included models */
use App\Models\Service;
use App\Models\Level;
use App\Models\Office;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('services', 'allServices');

        $user = Auth::user();

        if (Gate::allows('manage_services', $user)) 
        {
            if (Gate::allows('all_services', $user)) 
            {
                $services = Service::with('office', 'level')->latest()->paginate(15);
        
                return view('backend.admin.service.index', compact('services'));
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
        menuSubmenu('services', 'addService');

        $user = Auth::user();

        if (Gate::allows('manage_services', $user)) 
        {
            if (Gate::allows('add_service', $user)) 
            {
                $levels = Level::get();
                $offices = Office::where('status', 1)->get();

                return view('backend.admin.service.create', compact('offices', 'levels'));
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
            'name_en'   => 'required|max:255',
            'name_bn'   => 'required|max:255',
            'level_id'  => 'required',
            'office_id' => 'required',
            'ordering'  => 'required',
        ]);

        $service = new Service;

        $service->name_en       = $request->name_en;
        $service->name_bn       = $request->name_bn;
        $service->level_id      = $request->level_id;
        $service->office_id     = $request->office_id;
        $service->ordering      = $request->ordering;
        $service->status        = 1;
        $service->created_by    = Auth::id();

        $service->save();

        return redirect()->route('admin.service.index')->with('success', 'Service Created Successfully');
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

        if (Gate::allows('manage_services', $user)) 
        {
            if (Gate::allows('view_service', $user)) 
            {
                $service = Service::with('office', 'user', 'user_update', 'level')
                            ->where('id', $id)
                            ->first();

                return view('backend.admin.service.show', compact('service'));
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

        if (Gate::allows('manage_services', $user)) 
        {
            if (Gate::allows('edit_service', $user)) 
            {
                $levels = Level::get();
                $offices = Office::where('status', 1)->get();
                $service = Service::where('id', $id)->first();

                return view('backend.admin.service.edit', compact('service', 'offices', 'levels'));
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
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name_en'   => 'required|max:255',
            'name_bn'   => 'required|max:255',
            'level_id'  => 'required',
            'office_id' => 'required',
            'ordering'  => 'required',
        ]);

        $service->name_en       = $request->name_en;
        $service->name_bn       = $request->name_bn;
        $service->level_id      = $request->level_id;
        $service->office_id     = $request->office_id;
        $service->ordering      = $request->ordering;
        $service->status        = $request->status;
        $service->updated_by    = Auth::id();

        $service->save();

        return redirect()->route('admin.service.index')->with('success', 'Service Updated Successfully.');
    }

    /**
     * Change status of the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statusChange(Service $service)
    {
        $user = Auth::user();

        if (Gate::allows('manage_services', $user)) 
        {
            if (Gate::allows('delete_service', $user)) 
            {
                if ($service->status == 0) {
                    $service->status       = 1;
                    $service->updated_by   = Auth::id();
                }
                else if ($service->status == 1) {
                    $service->status       = 0;
                    $service->updated_by   = Auth::id();
                }
        
                $service->save();
        
                return redirect()->route('admin.service.index')->with('success', 'Service Status Changed Successfully.');
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
     * Remove the specified  from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

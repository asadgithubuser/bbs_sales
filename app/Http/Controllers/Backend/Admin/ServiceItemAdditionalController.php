<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Gate;

/* included models */
use App\Models\ServiceItemAdditional;
use App\Models\Service;

class ServiceItemAdditionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('services', 'allServiceItemAdditionals');

        $user = Auth::user();

        if (Gate::allows('manage_services', $user)) 
        {
            if (Gate::allows('all_service_additional_items', $user)) 
            {
                $serviceItemAdditionals = ServiceItemAdditional::with('service')->latest()->paginate(25);

                return view('backend.admin.serviceItemAdditional.index', compact('serviceItemAdditionals'));
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
        menuSubmenu('services', 'addServiceItemAdditional');

        $user = Auth::user();

        if (Gate::allows('manage_services', $user)) 
        {
            if (Gate::allows('add_service_additional_item', $user)) 
            {
                $services = Service::where('status', 1)->get();

                return view('backend.admin.serviceItemAdditional.create', compact('services'));
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
            'service_id'    => 'required',
            'item_name_bn'  => 'required|max:255',
            'item_name_en'  => 'required|max:255',
            'price'         => 'required|numeric',
            'ordering'      => 'required',
        ]);

        $serviceItemAdditional = new ServiceItemAdditional;

        $serviceItemAdditional->service_id    = $request->service_id;
        $serviceItemAdditional->item_name_bn  = $request->item_name_bn;
        $serviceItemAdditional->item_name_en  = $request->item_name_en;
        $serviceItemAdditional->price         = $request->price;
        $serviceItemAdditional->ordering      = $request->ordering;
        $serviceItemAdditional->status        = 1;
        $serviceItemAdditional->created_by    = Auth::id();

        $serviceItemAdditional->save();

        return redirect()->route('admin.serviceItemAdditional.index')->with('success', 'Service Additonal Item Created Successfully');
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
            if (Gate::allows('view_service_additional_item', $user)) 
            {
                $serviceItemAdditional = ServiceItemAdditional::with('service', 'user', 'user_update')
                                                        ->where('id', $id)
                                                        ->first();

                return view('backend.admin.serviceItemAdditional.show', compact('serviceItemAdditional'));
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
            if (Gate::allows('edit_service_additional_item', $user)) 
            {
                $services = Service::where('status', 1)->get();
    
                $serviceItemAdditional = ServiceItemAdditional::where('id', $id)->first();

                return view('backend.admin.serviceItemAdditional.edit', compact('serviceItemAdditional', 'services'));
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
    public function update(Request $request, ServiceItemAdditional $serviceItemAdditional)
    {
        $request->validate([
            'service_id'    => 'required',
            'item_name_bn'  => 'required|max:255',
            'item_name_en'  => 'required|max:255',
            'price'         => 'required|numeric',
            'ordering'      => 'required',
        ]);

        $serviceItemAdditional->service_id    = $request->service_id;
        $serviceItemAdditional->item_name_bn  = $request->item_name_bn;
        $serviceItemAdditional->item_name_en  = $request->item_name_en;
        $serviceItemAdditional->price         = $request->price;
        $serviceItemAdditional->ordering      = $request->ordering;
        $serviceItemAdditional->status        = $request->status;
        $serviceItemAdditional->updated_by    = Auth::id();

        $serviceItemAdditional->save();

        return redirect()->route('admin.serviceItemAdditional.index')->with('success', 'Service Additonal Item Updated Successfully.');
    }

    /**
     * Change status of the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statusChange(ServiceItemAdditional $serviceItemAdditional)
    {
        $user = Auth::user();

        if (Gate::allows('manage_services', $user)) 
        {
            if (Gate::allows('delete_service_additional_item', $user)) 
            {
                if ($serviceItemAdditional->status == 0) {
                    $serviceItemAdditional->status       = 1;
                    $serviceItemAdditional->updated_by   = Auth::id();
                }
                else if ($serviceItemAdditional->status == 1) {
                    $serviceItemAdditional->status       = 0;
                    $serviceItemAdditional->updated_by   = Auth::id();
                }
        
                $serviceItemAdditional->save();
        
                return redirect()->route('admin.serviceItemAdditional.index')->with('success', 'Service Additonal Item Status Changed Successfully.');
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

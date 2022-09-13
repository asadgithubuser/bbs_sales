<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Gate;

/* included models */
use App\Models\ServiceItemPrice;

class ServiceItemPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('services', 'serviceItemPrices');

        $user = Auth::user();

        if (Gate::allows('manage_services', $user)) 
        {
            if (Gate::allows('service_item_prices', $user))
            {
                $serviceItemPrices = ServiceItemPrice::orderBy('id')->paginate(15);
        
                return view('backend.admin.serviceItemPrice.index', compact('serviceItemPrices'));
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
        menuSubmenu('services', 'addServiceItemPrice');

        $user = Auth::user();

        if (Gate::allows('manage_services', $user)) 
        {
            if (Gate::allows('add_service_item_price', $user)) 
            {
                return view('backend.admin.serviceItemPrice.create');
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
            'usage_type' => 'required',
            'price_type' => 'required',
            'price'      => 'required',
        ]);

        $serviceItemPrice = new ServiceItemPrice;

        $serviceItemPrice->usage_type   = $request->usage_type;
        $serviceItemPrice->price_type   = $request->price_type;
        $serviceItemPrice->price        = $request->price;
        $serviceItemPrice->created_by   = Auth::id();

        $serviceItemPrice->save();

        return redirect()->route('admin.serviceItemPrice.index')->with('success', 'Service Item Price Set Successfully');
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

        if (Gate::allows('manage_services', $user)) 
        {
            if (Gate::allows('edit_service_item_price', $user)) 
            {
                $serviceItemPrice = ServiceItemPrice::where('id', $id)->first();

                return view('backend.admin.serviceItemPrice.edit', compact('serviceItemPrice'));
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
    public function update(Request $request, ServiceItemPrice $serviceItemPrice)
    {
        $request->validate([
            'usage_type'    => 'required',
            'price_type'    => 'required',
            'price'         => 'required',
        ]);

        $serviceItemPrice->usage_type   = $request->usage_type;
        $serviceItemPrice->price_type   = $request->price_type;
        $serviceItemPrice->price        = $request->price;
        $serviceItemPrice->updated_by   = Auth::id();

        $serviceItemPrice->save();

        return redirect()->route('admin.serviceItemPrice.index')->with('success', 'Service Item Price Updated Successfully.');
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







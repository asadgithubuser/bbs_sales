<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Gate;

/* included models */
use App\Models\Requisition;
use App\Models\Service;
use App\Models\ServiceItem;
use App\Models\ServiceInventory;
use App\Models\RequisitionItem;

class RequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('requisition', 'allRequisitions');

        $user = Auth::user();

        if (Gate::allows('manage_requisition', $user)) 
        {
            if(Gate::allows('all_requisitions', $user))
            { 
                $requisitions = Requisition::latest()->paginate(25);;

                return view('backend.admin.requisition.index', compact('requisitions'));
                
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending()
    {
        menuSubmenu('requisition', 'pendingRequisitions');

        $user = Auth::user();

        if (Gate::allows('manage_requisition', $user)) 
        {
            if(Gate::allows('pending_requisitions', $user))
            { 
                $requisitions = Requisition::where('status', 0)->latest()->paginate(25);;

                return view('backend.admin.requisition.pending', compact('requisitions'));
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approved()
    {
        menuSubmenu('requisition', 'approvedRequisitions');

        $user = Auth::user();

        if (Gate::allows('manage_requisition', $user)) 
        {
            if(Gate::allows('approved_requisitions', $user))
            { 
                $requisitions = Requisition::where('status', 1)->latest()->paginate(25);;

                return view('backend.admin.requisition.approved', compact('requisitions'));
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function declined()
    {
        menuSubmenu('requisition', 'declinedRequisitions');

        $user = Auth::user();

        if (Gate::allows('manage_requisition', $user)) 
        {
            if(Gate::allows('declined_requisitions', $user))
            { 
                $requisitions = Requisition::where('status', 2)->latest()->paginate(25);;

                return view('backend.admin.requisition.declined', compact('requisitions'));
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delivered()
    {
        menuSubmenu('requisition', 'deliveredRequisitions');

        $user = Auth::user();

        if (Gate::allows('manage_requisition', $user)) 
        {
            if(Gate::allows('delivered_requisitions', $user))
            { 
                $requisitions = Requisition::where('status', 3)->latest()->paginate(25);;

                return view('backend.admin.requisition.delivered', compact('requisitions'));
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
        menuSubmenu('requisition', 'createRequisition');

        $user = Auth::user();

        if (Gate::allows('manage_requisition', $user)) 
        {
            if(Gate::allows('create_requisition', $user))
            { 
                $services = Service::where('status', 1)->get();
                $service_items = ServiceItem::where('status', 1)->get();
                $service_inventories = ServiceInventory::where('status', 1)->get();
                
                return view('backend.admin.requisition.create', compact('services', 'service_items', 'service_inventories'));
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
            'organization_name'    => 'required',
            'name'                 => 'required',
            'designation'          => 'required|max:255',
            'address'              => 'required|max:255',
            'phone'                => 'required|max:255',
            'service_inventory_id' => 'required',
            'quantity'             => 'required',
        ]);

        $organization_name =  $request->organization_name;
        $name =  $request->name;
        $designation =  $request->designation;
        $address =  $request->address;
        $phone =  $request->phone;
        $service_inventory_id =  $request->input('service_inventory_id', []);
        $quantity =  $request->input('quantity', []);

        $requisition = new Requisition;

        $requisition->organization_name  = $organization_name;
        $requisition->name               = $name;
        $requisition->designation        = $designation;
        $requisition->phone              = $phone;
        $requisition->address            = $address;

        if (Auth::user()->role_id == 1 || Auth::user()->role_id == 3) {
            $requisition->status         = 1;
        } else {
            $requisition->status         = 0;
        }
        
        $requisition->save();
        
        $requisition->requisition_number = date('Ymd').$requisition->id;

        $requisition->save();

        $results = [];

        foreach ($service_inventory_id as $index => $unit) {
            $service_inventory = ServiceInventory::where('id', $service_inventory_id[$index])->first();

            $results[] = [
                    "requisition_id" => $requisition->id,
                    "service_id" => $service_inventory->service_id,
                    "service_item_id" => $service_inventory->service_item_id,
                    "service_inventory_id" => $service_inventory_id[$index],
                    "quantity" => $quantity[$index],
                    "created_at" => now(),
                    "updated_at" => now(),
                ];
            
        }

        RequisitionItem::insert($results);
        
        return redirect()->route('admin.requisition.index')->with('success','Requisition Sent Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requisition = Requisition::where('id', $id)->first();
        $requisition_items = RequisitionItem::where('requisition_id', $id)->get();

        return view('backend.admin.requisition.show', compact('requisition', 'requisition_items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    /**
     * Change status of the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve(Requisition $requisition)
    {      
        if ($requisition->status == 0) {
            $requisition->status = 1;
        }

        $requisition->save();

        return redirect()->route('admin.requisition.index')->with('success', 'Requisition Approved Successfully.');
    }

    /**
     * Change status of the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deliver(Requisition $requisition)
    {      
        if ($requisition->status == 1) {
            $requisition->status = 3;

            $requisition_items = RequisitionItem::where('requisition_id', $requisition->id)->get();

            foreach ($requisition_items as $requisition_item) {
                $inventory_item = ServiceInventory::where('id', $requisition_item->service_inventory_id)->first();

                $inventory_item->number_of_hard_copies = $inventory_item->number_of_hard_copies - $requisition_item->quantity;
                $inventory_item->number_of_complimentary_copies = $inventory_item->number_of_complimentary_copies - $requisition_item->quantity;

                $inventory_item->save();
            }
        }

        $requisition->save();

        return redirect()->route('admin.requisition.index')->with('success', 'Requisition Delivered Successfully.');
    }

    /**
     * Change status of the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function decline(Request $request, Requisition $requisition)
    {      
        if ($requisition->status == 0) {

            $requisition->comment = $request->comment;
            $requisition->status = 2;

        }

        $requisition->save();

        return redirect()->route('admin.requisition.index')->with('error', 'Requisition Request Declined!');
        
    }
}

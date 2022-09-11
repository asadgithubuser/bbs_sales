<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalesCenter;
use Auth;
use Illuminate\Support\Facades\Gate;

class SalesCenterController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (Gate::allows('manage_sales_center', $user)) 
        {
            menuSubmenu('storage', 'salesCenter');

            $salesCenters = SalesCenter::with('createdBy')->latest()->paginate(25);

            return view('backend.admin.salesCenter.index', compact('salesCenters'));
        }else{
            abrot(403);
        }
    }

    public function create()
    {
        $user = Auth::user();

        if (Gate::allows('manage_sales_center', $user)) 
        {
            menuSubmenu('storage', 'salesCenter');
            return view('backend.admin.salesCenter.create');

        }else{
            abrot(403);
        }
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        
        if (Gate::allows('manage_sales_center', $user)) 
        {
            menuSubmenu('storage', 'salesCenter');

            $salesCenter = new SalesCenter;
            $salesCenter->name_en = $request->name_en;
            $salesCenter->name_bn = $request->name_bn;
            $salesCenter->address = $request->address;
            $salesCenter->status = $request->status;
            $salesCenter->created_by = Auth::user()->id;
            $done = $salesCenter->save();

            if($done)
            {
                return redirect()->route('admin.salesCenter.index')->with('success', 'New sales center added successfully.');
            }else{
                return redirect()->route('admin.salesCenter.index')->with('fail', 'New sales center added successfully.');
            }
        }else{
            abrot(403);
        }
    }

    public function edit($id)
    {
        $user = Auth::user();
        
        if (Gate::allows('manage_sales_center', $user)) 
        {
            menuSubmenu('storage', 'salesCenter');
            $salesCenter = SalesCenter::where('id', $id)->first();
            return view('backend.admin.salesCenter.edit', compact('salesCenter'));

        }else{
            abrot(403);
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        if (Gate::allows('manage_sales_center', $user)) 
        {
            $salesCenter = SalesCenter::where('id', $request->id)->first();
            $salesCenter->name_en = $request->name_en;
            $salesCenter->name_bn = $request->name_bn;
            $salesCenter->address = $request->address;
            $salesCenter->status = $request->status;
            $salesCenter->updated_by = Auth::user()->id;
            $done = $salesCenter->save();

            if($done)
            {
                return redirect()->route('admin.salesCenter.index')->with('success', 'New sales center added successfully.');
            }else{
                return redirect()->route('admin.salesCenter.index')->with('fail', 'New sales center added successfully.');
            }
        }else{
            abrot(403);
        }
    }
}

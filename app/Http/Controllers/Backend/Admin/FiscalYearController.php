<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

/* included models */
use App\Models\FiscalYear;

class FiscalYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('fiscal', 'all_fiscal');

        $user = Auth::user();

        if (Gate::allows('manage_fiscal_year', $user)) 
        {
            if (Gate::allows('all_fiscal_year', $user)) 
            {
                $fiscals = FiscalYear::latest()->paginate(25);

                return view('backend.admin.fiscal.index', compact('fiscals'));
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
        menuSubmenu('fiscal', 'add_fiscal');

        $user = Auth::user();

        if (Gate::allows('manage_fiscal_year', $user)) 
        {
            if (Gate::allows('add_fiscal_year', $user)) 
            {
                return view('backend.admin.fiscal.create');
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
            'name' => 'required|max:255',
        ]);

        $fiscal = new FiscalYear;

        $fiscal->name       = $request->name;
        $fiscal->status     = $request->status=="on" ? 1 : 0;
        $fiscal->created_by = Auth::id();

        $fiscal->save();

        return redirect()->route('admin.fiscal.index')->with('success','Fiscal Created Successfully.');
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

        if (Gate::allows('manage_fiscal_year', $user)) 
        {
            if(Gate::allows('edit_fiscal_year',$user))
            {            
                $fiscal = FiscalYear::where('id', $id)->first();

                return view('backend.admin.fiscal.edit', compact('fiscal'));
                
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
    public function update(Request $request, FiscalYear $fiscal)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $fiscal->name       = $request->name;
        $fiscal->status     = $request->status=="on" ? 1 : 0;

        $fiscal->updated_by = Auth::id();

        $fiscal->save();

        return redirect()->route('admin.fiscal.index')->with('success', 'Fiscal Updated Successfully.');
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

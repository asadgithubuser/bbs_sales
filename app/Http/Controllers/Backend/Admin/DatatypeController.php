<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Gate;

/* included models */
use App\Models\Datatype;

class DatatypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('services', 'allSubDatatypes');

        $user = Auth::user();

        if (Gate::allows('manage_services', $user)) 
        {
            if (Gate::allows('all_sub_datatypes', $user)) 
            {
                $datatypes = Datatype::where('status', 1)->latest()->paginate(15);
        
                return view('backend.admin.datatype.index', compact('datatypes'));
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
        menuSubmenu('services', 'addSubDatatype');

        $user = Auth::user();

        if (Gate::allows('manage_services', $user)) 
        {
            if (Gate::allows('add_sub_datatype', $user)) 
            {
                return view('backend.admin.datatype.create');
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
            'service_item_type' => 'required',
            'name_en'           => 'required|max:255',
            'name_bn'           => 'required|max:255',
        ]);

        $datatype = new Datatype;

        $datatype->service_item_type    = $request->service_item_type;
        $datatype->name_en              = $request->name_en;
        $datatype->name_bn              = $request->name_bn;
        $datatype->status               = 1;
        $datatype->created_by           = Auth::id();

        $datatype->save();

        return redirect()->route('admin.datatype.index')->with('success', 'Data Subcategory Created Successfully');
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
            if (Gate::allows('view_sub_datatype', $user)) 
            {
                $datatype = Datatype::with('user', 'user_update')->where('id', $id)->first();

                return view('backend.admin.datatype.show', compact('datatype'));
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
            if (Gate::allows('edit_sub_datatype', $user)) 
            {
                $datatype = Datatype::where('id', $id)->first();

                return view('backend.admin.datatype.edit', compact('datatype'));
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
    public function update(Request $request, Datatype $datatype)
    {
        $request->validate([
            'service_item_type' => 'required',
            'name_en'           => 'required|max:255',
            'name_bn'           => 'required|max:255',
            'status'            => 'required',
        ]);

        $datatype->service_item_type    = $request->service_item_type;
        $datatype->name_en              = $request->name_en;
        $datatype->name_bn              = $request->name_bn;
        $datatype->status               = $request->status;
        $datatype->updated_by           = Auth::id();

        $datatype->save();

        return redirect()->route('admin.datatype.index')->with('success', 'Data Subcategory Updated Successfully.');
    }

    /**
     * Change status of the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statusChange(Datatype $datatype)
    {
        $user = Auth::user();

        if (Gate::allows('manage_services', $user)) 
        {
            if (Gate::allows('delete_sub_datatype', $user)) 
            {
                if ($datatype->status == 0) {
                    $datatype->status       = 1;
                    $datatype->updated_by   = Auth::id();
                }
                else if ($datatype->status == 1) {
                    $datatype->status       = 0;
                    $datatype->updated_by   = Auth::id();
                }
        
                $datatype->save();
        
                return redirect()->route('admin.datatype.index')->with('success', 'Data Subcategory Status Changed Successfully.');
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

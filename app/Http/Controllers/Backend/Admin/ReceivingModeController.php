<?php

namespace App\Http\Controllers\Backend\Admin;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

/* included models */
use App\Models\ReceivingMode;

class ReceivingModeController extends Controller
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
            if(Gate::allows('all_receiving_mode',$user))
            {               
               
                menuSubmenu('applicationSetting', 'allReceivingModes');

                $receivingModes = ReceivingMode::latest()->paginate(25);

                return view('backend.admin.receivingMode.index', compact('receivingModes'));
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
            if(Gate::allows('add_receiving_mode',$user))
            {               
                
                menuSubmenu('applicationSetting', 'addReceivingMode');
        
                return view('backend.admin.receivingMode.create');
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
            'name_bn'      => 'required|max:255',
            'name_en'      => 'required|max:255',
        ]);

        $receivingMode = new ReceivingMode;

        $receivingMode->name_bn       = $request->name_bn;
        $receivingMode->name_en       = $request->name_en;
        $receivingMode->description   = $request->description;
        $receivingMode->status        = 1;
        $receivingMode->created_by    = Auth::id();

        $receivingMode->save();

        return redirect()->route('admin.receivingMode.index')->with('success','Receiving Mode Created Successfully.');
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

        if (Gate::allows('manage_applications', $user)) 
        {
            if(Gate::allows('view_receiving_mode',$user))
            {               
                
                
                $receivingMode = ReceivingMode::with('user', 'user_update')
                ->where('id', $id)
                ->first();

                return view('backend.admin.receivingMode.show', compact('receivingMode'));
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

        if (Gate::allows('manage_applications', $user)) 
        {
            if(Gate::allows('view_receiving_mode',$user))
            {  
                $receivingMode = ReceivingMode::where('id', $id)->first();

                return view('backend.admin.receivingMode.edit', compact('receivingMode'));
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
    public function update(Request $request, ReceivingMode $receivingMode)
    {
        $request->validate([
            'name_bn'      => 'required|max:255',
            'name_en'      => 'required|max:255',
        ]);

        $receivingMode->name_bn       = $request->name_bn;
        $receivingMode->name_en       = $request->name_en;
        $receivingMode->description   = $request->description;
        $receivingMode->status        = $request->status;
        $receivingMode->updated_by    = Auth::id();

        $receivingMode->save();

        return redirect()->route('admin.receivingMode.index')->with('success','Receiving Mode Created Successfully.');
    }

    /**
     * Change status of the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statusChange(ReceivingMode $receivingMode)
    {
        $user = Auth::user();

        if (Gate::allows('manage_applications', $user)) 
        {
            if(Gate::allows('delete_receiving_mode',$user))
            {  
                if ($receivingMode->status == 0) {
                    $receivingMode->status       = 1;
                    $receivingMode->updated_by   = Auth::id();
                }
                else if ($receivingMode->status == 1) {
                    $receivingMode->status       = 0;
                    $receivingMode->updated_by   = Auth::id();
                }
        
                $receivingMode->save();
        
                return redirect()->route('admin.receivingMode.index')->with('success', 'Receiving Mode Status Changed Successfully.');
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

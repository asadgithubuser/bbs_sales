<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\CropType;
use App\Models\Crop;
use App\Models\User;
use Validator;
use Auth;

class CropCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if (Gate::allows('manage_agriculture', $user))
        {
            if(Gate::allows('all_agriculture',$user))
            {            
                
                menuSubmenuSubsubmeny('agriculture', 'category', 'allCategories');

                $categories = CropType::where('status', 1)->latest()->paginate(25);

                return view('backend.admin.agriculture.category.index',[
                    'categories' => $categories
                ]);
                
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

        if (Gate::allows('manage_agriculture', $user))
        {
            if(Gate::allows('add_agriculture',$user))
            {            
                
                menuSubmenuSubsubmeny('agriculture', 'category', 'addCategory');
        
                $category = CropType::where('status', 0)->first();
                $crops = Crop::where('status', 1)->get();
                
                if(!$category)
                {
                    $category = new CropType;
                    $category->status = false;
                    $category->created_by = Auth::user()->id;
                    $category->save();
                }

                return view('backend.admin.agriculture.category.create',[
                    'category' => $category,
                    'crops' => $crops,
                ]);
                
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
        //
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
    public function edit(CropType $category)
    {
        $user = Auth::user();

        if (Gate::allows('manage_agriculture', $user))
        {
            if(Gate::allows('edit_agriculture',$user))
            {            
                $crops = Crop::where('status', 1)->get();
                
                return view('backend.admin.agriculture.category.create',[
                    'category' => $category,
                    'crops' => $crops,
                ]);
                
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
    public function update(Request $request,CropType $category)
    {
        
        $type = $request->type;

        $validation = Validator::make($request->all(),
        [ 
            'crop_type_bn' => ['required','min:3'],
            'crop_type_en' => ['required','min:3'],
            'crop_id' => ['required'],
        ]);

        if($validation->fails())
        {
            return back()
            ->withInput()
            ->withErrors($validation);
        }

        if($type == 'add'){

            $category->crop_type_en = $request->crop_type_en;
            $category->crop_type_bn = $request->crop_type_bn;
            $category->crop_id = $request->crop_id;
            $category->status = $request->status == 'on' ? 1 : 0;
            $category->created_by = Auth::user()->id;
            $category->save();

            return redirect()->route('admin.cropCategory.index')->with('success', 'Crop Type Added Successfully.');
            
        }
        elseif($type == 'edit'){

            $category->crop_type_en = $request->crop_type_en;
            $category->crop_type_bn = $request->crop_type_bn;
            $category->crop_id = $request->crop_id;
            $category->status = $request->status == 'on' ? 1 : 0;
            $category->created_by = Auth::user()->id;
            $category->save();

            return redirect()->route('admin.cropCategory.index')->with('success', 'Crop Type Updated Successfully.');

        }

    }

    public function delete(CropType $category)
    {
        $user = Auth::user();

        if (Gate::allows('manage_agriculture', $user))
        {
            if(Gate::allows('delete_agriculture', $user))
            {            
                
                if($category->status == true){
                    $category->status = false;
                    $category->save();
                }
                elseif($category->status == false){
                    $category->status = true;
                    $category->save();
                }
        
                // return redirect()->route('admin.cropCategory.index')->with('success','Crop Category Updated Successfully.');
                return redirect()->back();
                
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

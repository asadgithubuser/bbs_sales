<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\CropCategory;
use App\Models\Crop;
use App\Models\SurveyForm;
use App\Models\User;
use Validator;
use Auth;

class CropController extends Controller
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
            if(Gate::allows('all_crop',$user))
            {            
                
                menuSubmenuSubsubmeny('agriculture', 'crop', 'allCrop');      
            
                $crops = Crop::where('is_published', 1)->latest()->paginate(25);
                return view('backend.admin.agriculture.crop.index',[
                    'crops' => $crops
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
            if(Gate::allows('add_crop', $user))
            {            
                menuSubmenuSubsubmeny('agriculture', 'crop', 'addCrop');
        
                $crop = Crop::where('is_published', 0)->where('created_by', Auth::user()->id)->first();
                $forms = SurveyForm::where('status', 1)->get();
                $categories = CropCategory::where('status',1)->where('is_published', 1)->get();
                $cropForms = '';

                if(!$crop)
                {
                    $crop = new Crop;
                    $crop->is_published = false;
                    $crop->status = false;
                    $crop->created_by = Auth::user()->id;
                    $crop->save();
                }
                
                return view('backend.admin.agriculture.crop.create',[
                    'crop' => $crop,
                    'categories'=>$categories,
                    'forms'=>$forms,
                    'cropForms'=>$cropForms,
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
    public function edit(Crop $crop)
    { 
        $user = Auth::user();

        if (Gate::allows('manage_agriculture', $user))
        {
            if(Gate::allows('edit_crop',$user))
            {            
                $cropForms = [];
                $cropForms = explode(',', $crop->form_id);

                $categories = CropCategory::where('status',1)->where('is_published',1)->get();
                $forms = SurveyForm::where('status', 1)->get();

                return view('backend.admin.agriculture.crop.create',[
                    'categories' => $categories,
                    'crop'=>$crop,
                    'forms'=>$forms,
                    'cropForms'=>$cropForms,
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
    public function update(Request $request,Crop $crop)
    {
        
        $type = $request->type;

        $validation = Validator::make($request->all(),
        [ 
            'name_bn'       => ['required','min:2'],
            'name_en'       => ['required','min:2'],
            'code'          => ['required'],
            'form_id'       => ['required'],
            // 'crop_category' => ['required'],
        ]);

        if($validation->fails())
        {
            return back()
            ->withInput()
            ->withErrors($validation);
        }

        if($type == 'add'){
            // $crop->crop_category_id = $request->category;
            $crop->code = $request->code;
            $crop->name_en = strtolower($request->name_en);
            $crop->name_bn = $request->name_bn;
            // $crop->crop_category = $request->crop_category;
            $crop->form_id = implode(',', $request->form_id);
            $crop->status = $request->status == 'on' ? 1 : 0;
            $crop->is_published = true;
            $crop->created_by = Auth::user()->id;
            $crop->save();

            return redirect()->route('admin.crop.index')->with('success', 'Crop Added Successfully.');
            
        }
        elseif($type == 'edit'){

            // $crop->crop_category_id = $request->category;
            $crop->name_en = strtolower($request->name_en);
            $crop->code = $request->code;
            $crop->name_bn = $request->name_bn;
            // $crop->crop_category = $request->crop_category;
            $crop->form_id = implode(',', $request->form_id);
            $crop->status = $request->status == 'on' ? 1 : 0;
            $crop->is_published = true;
            $crop->created_by = Auth::user()->id;
            $crop->save();

            return redirect()->route('admin.crop.index')->with('success','Crop Updated Successfully.');

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

    public function delete(Crop $crop)
    {
        $user = Auth::user();

        if (Gate::allows('manage_agriculture', $user))
        {
            if(Gate::allows('delete_crop',$user))
            {            
                
                if($crop->status == true){
                    $crop->status = false;
                    $crop->save();
                }
                elseif($crop->status == false){
                    $crop->status = true;
                    $crop->save();
                }
        
                // return redirect()->route('admin.crop.index')->with('success','Crop Category Updated Successfully.');
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
}

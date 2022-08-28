<?php

namespace App\Http\Controllers\Backend\Admin;

use Auth;
use Validator;
use Carbon\Carbon;
use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;


class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if (Gate::allows('manage_faqs', $user)) 
        {
            if(Gate::allows('all_faq',$user))
            {
                menuSubmenu('faq','allFAQ');

                $faqs = Faq::latest()->paginate(25);
                
                return view('backend.admin.faq.index',[
                    'faqs' => $faqs
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

        if (Gate::allows('manage_faqs', $user)) 
        {
            if(Gate::allows('add_faq',$user))
            {
                menuSubmenu('faq','addFAQ');

                return view('backend.admin.faq.create');
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
        
        $validation = Validator::make($request->all(),
        [ 
            'answer' => ['required','min:3','string'],
            'question' => ['required','min:3','string']
        ]);

        if($validation->fails())
        {
            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => false,
                    'errors' => $validation->errors()->toArray(),
                    'sessionMessage' => 'Please, fillup the form correctly and try again.'
                ));
            }

            return back()
            ->withInput()
            ->withErrors($validation);
        }
        
        $faq = new Faq;

        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->created_for = $request->created_for;
        if($request->hasFile('file'))
        {
            $cp = $request->file('file');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = $faq->id.'file'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

            Storage::disk('public')->put('faq/'.$randomFileName, File::get($cp));

            $faq->attachment = $randomFileName;
            $faq->save();
      	}    
        $faq->save();
        return redirect()->route('admin.faq.index')->with('success','FAQ created Successfully.');

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
    public function edit(Faq $faq)
    {
        

        $user = Auth::user();

        if (Gate::allows('manage_faqs', $user)) 
        {
            if(Gate::allows('edit_faq',$user))
            {
                return view('backend.admin.faq.edit',[
                    'faq' => $faq
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
    public function update(Request $request, Faq $faq)
    {
        $validation = Validator::make($request->all(),
        [ 
            'answer' => ['required','min:3','string'],
            'question' => ['required','min:3','string']
        ]);

        if($validation->fails())
        {
            if($request->ajax())
            {
                return Response()->json(array(
                    'success' => false,
                    'errors' => $validation->errors()->toArray(),
                    'sessionMessage' => 'Please, fillup the form correctly and try again.'
                ));
            }

            return back()
            ->withInput()
            ->withErrors($validation);
        }


        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->created_for = $request->created_for;  
        
        if($request->hasFile('file'))
        {
            $cp = $request->file('file');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = $faq->id.'file'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

            #delete old rows of profilepic
            Storage::disk('public')->put('faq/'.$randomFileName, File::get($cp));

            if($faq->attachment)
            {
                $f = 'faq/'.$faq->attachment;
                if(Storage::disk('public')->exists($f))
                {
                    Storage::disk('public')->delete($f);
                }
            }

            $faq->attachment = $randomFileName;
            $faq->save();
      	} 

        $faq->save();
        return redirect()->route('admin.faq.index')->with('success','FAQ Update Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $user = Auth::user();

        if (Gate::allows('manage_faqs', $user)) 
        {
            if(Gate::allows('status_faq',$user))
            {
                
                if($faq->status == 1)
                {
                    $faq->status = false;
                    $faq->save();

                    return back()->with('info','FAQ Disable Successfully.');
                }
                else
                {
                    $faq->status = true;
                    $faq->save();

                    return back()->with('info','FAQ Enable Successfully.');
                }
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

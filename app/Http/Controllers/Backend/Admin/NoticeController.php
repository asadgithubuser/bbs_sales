<?php

namespace App\Http\Controllers\Backend\Admin;

use Auth;
use Validator;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/* included models */
use App\Models\Notice;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        menuSubmenu('notices','allNotices');

        $user = Auth::user();

        if (Gate::allows('manage_notice', $user)) 
        {
            if (Gate::allows('all_notices', $user)) 
            {
                $notices = Notice::latest()->paginate(25);

                return view('backend.admin.notice.index',[
                    'notices' => $notices
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

        if (Gate::allows('manage_notice', $user)) 
        {
            if (Gate::allows('add_notice', $user)) 
            {
                return view('backend.admin.notice.create');
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
            'title' => ['required','min:3','string'],
            'detail' => ['required'],
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
        
        $notice = new Notice;
        
        $notice->title = $request->title;
        $notice->detail = $request->detail;
        $notice->exp_date = $request->date;
        $notice->status = $request->status == "on" ? true : false;
        
        $notice->save();

        return redirect()->route('admin.notice.index')->with('success','Notice Created Successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        return view('backend.admin.notice.show',[
            'notice' => $notice
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        $user = Auth::user();

        if (Gate::allows('manage_notice', $user)) 
        {
            if (Gate::allows('edit_notice', $user)) 
            {
                return view('backend.admin.notice.edit',[
                    'notice'=>$notice
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
    public function update(Request $request, Notice $notice)
    {
        $validation = Validator::make($request->all(),
        [ 
            'title' => ['required','min:3','string'],
            'detail' => ['required'],
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

        $notice->title = $request->title;
        $notice->detail = $request->detail;
        $notice->exp_date = $request->date;

        $notice->status = $request->status == "on" ? true : false;
        
        $notice->save();

        return redirect()->route('admin.notice.index')->with('success','Notice Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        $user = Auth::user();

        if (Gate::allows('manage_notice', $user)) 
        {
            if (Gate::allows('delete_notice', $user)) 
            {
                $notice->delete();
                return redirect()->route('admin.notice.index')->with('success','Notice Deleted Successfully.');
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

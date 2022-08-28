<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingCourse;
use App\Models\FiscalYear;
use App\Models\CourseCalendar;
use Notification;
use App\Notifications\CourseCalendarNotification;
use App\Models\User;
use Auth;
use Validator;
class CalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        menuSubmenu('course','createCalender');

        $courseswithoutFiscalyear = TrainingCourse::where('is_published',true)->where('fiscal_year_id',null)->latest()->get();
        $years = FiscalYear::orderBy('id','desc')->get();
        $coursesWithFiscalyear = TrainingCourse::where('is_published',true)->where('fiscal_year_id','<>',null)->latest()->get();

        return view('backend.admin.courseCalender.create',[
            'courses'=>$courseswithoutFiscalyear,
            'years'=>$years,
            'coursesWithFiscalyear' => $coursesWithFiscalyear
        ]);
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
            'year' => ['required','integer'],
        ]);
        if($validation->fails())
        {
            return back()
            ->withInput()
            ->withErrors('Please Select Year.');
        }
        
        $items = $request->items;
        foreach($items as $item){
            $course = TrainingCourse::where('id',$item)->first();
            
            $course->fiscal_year_id = $request->year;
            $course->save();
        }
        return back()->with('success','Updated Successfully.');
    }

    public function remove(TrainingCourse $course)
    {
        $course->fiscal_year_id = null;
        $course->save();
        return back()->with('success','Updated Successfully.');
    }

    public function calender(Request $request)
    {
        $type = $request->type;
        $year = FiscalYear::where('status',true)->first();

        if($type == 'pending')
        {
            menuSubmenu('calendar','pendingCalendar');

            // $courses = TrainingCourse::where('status',3)->where('is_published',true)->where('fiscal_year_id',$year->id)->latest()->paginate(25);
            $calender = CourseCalendar::where('status',0)->where('forward',3)->where('is_approved',0)->latest()->paginate(25);

        }
        elseif($type=='approved')
        {
            menuSubmenu('calendar','approvedCalendar');

            // $courses = TrainingCourse::where('status',1)->where('is_published',true)->latest()->paginate(25);
            $calender = CourseCalendar::where('status',1)->where('is_approved',1)->latest()->paginate(25);

        }
        
        return view('backend.admin.calendar.calender',[
            'type' => $type,
            'calender' => $calender
        ]);
    }

    public function approved(Request $request)
    {
        $items = $request->items;
        
        foreach($items as $item)
        {
            $calender = CourseCalendar::find($item);
            
            $calender->status = 1;//approve
            $calender->forward = 13;
            $calender->is_approved = 1;
            $course = $calender->course;
            $course->status = 1; //approved
            $course->save(); //save course status
            $calender->save(); //save calender status and change approved status
        }

        return back()->with('success','Approved Successfully.');
        
    }

    public function claimForChange(Request $request,CourseCalendar $calender)
    {
        
        $calender->comment = $request->comment;
        $calender->status = 2; // modify
        $course = $calender->course;
        $course->status = 2; //modify
        $course->save();
        $calender->save(); //save calender status and change modify status

        // Send database notification after modify course to course coordinator
        $receiver_user_id = User::where('role_id', 12)->select('id')->get();
        $data = 'Course modification notification';
        $sender_user_id = Auth::user()->id;
        $courseCalendarId = $calender->course_id;
        $gotoURL = route('admin.course.edit', $courseCalendarId);
        
        Notification::send($receiver_user_id, new CourseCalendarNotification($data, $sender_user_id, $gotoURL,  $courseCalendarId));
        
        return back()->with('info','Calendar send for modification Successfully.');

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
}

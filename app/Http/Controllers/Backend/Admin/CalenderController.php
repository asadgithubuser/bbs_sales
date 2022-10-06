<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingCourse;
use App\Models\FiscalYear;
use App\Models\Department;
use App\Models\ClaimModifyTraineeList;
use App\Models\CourseCalendar; 
use App\Models\CourseTrainingList;
use App\Models\TraineeEvaluationForm;
use Illuminate\Support\Facades\Gate;
use App\Models\TrainingCourseListDetails;
use Notification;
use App\Notifications\CourseCalendarNotification;
use App\Models\User;
use Auth;
use Elibyy\TCPDF\Facades\TCPDF;
use DB;
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
            $calender = CourseCalendar::where('status', 0)->where('is_approved', 0)->latest()->paginate(25);

            return view('backend.admin.calendar.calender',[
                'type' => $type,
                'calender' => $calender
            ]);
        }else if($type=='approved')
        {
            menuSubmenu('course','approvedCalendar');
            $depertments = Department::where('status', 1)->get();

            $fiscal_all = FiscalYear::select('id', 'name')->get();
            $current_yr = '';
            $fiscal_id = 0;
            foreach($fiscal_all as $year){
                if(explode('-', $year->name)[0] == explode('-', now())[0]){
                    $current_yr = explode('-', $year->name)[0];
                    $fiscal_id = $year->id;
                }
            }

            $allFiscal = FiscalYear::orderBy('id','desc')->select('id','name')->get();
            $calender = CourseCalendar::where(['status' => 1, 'is_approved' => 1, 'fiscal_year_id' => $fiscal_id])->latest()->paginate(25);
        
            return view('backend.admin.calendar.calender',[
                'type' => $type,
                'calender' => $calender,
                'current_fiscal' => $current_yr,
                'allFiscal' => $allFiscal,
                'depertments' => $depertments,
            ]);
        }
        elseif($type=='pending_trainee_list')
        {
            menuSubmenu('manage_training','pending_trainee_list');
            $trainingCourseListDetailsIds = TrainingCourseListDetails::pluck('course_id');
            $courses = TrainingCourse::whereIn('id', $trainingCourseListDetailsIds)->latest()->paginate(25);


            return view('backend.admin.calendar.calender',[
                'type' => $type,
                'courses' => $courses,
            ]);
        }

        elseif($type=='main_training_courses')
        {
            menuSubmenu('course','main_training_courses');
            $depertments = Department::where('status', 1)->get();

            
            $courses = TrainingCourse::where(['status'=> 3])->latest()->paginate(25);
            return view('backend.admin.calendar.calender',[
                'type' => $type,
                'courses' => $courses,
                'depertments' => $depertments
            ]);
        }
        elseif($type=='training_course_list_cd')
        {
            menuSubmenu('course','training_course_list_cd');
            $depertments = Department::where('status', 1)->get();
            $courses = TrainingCourse::where('status', 3)->where('forward', 2)->latest()->paginate(25);

            
            return view('backend.admin.calendar.calender',[
                'type' => $type,
                'courses' => $courses,
                'depertments' => $depertments
            ]);
        }

        elseif($type=='approved_trainee_list_for_cco') // next work
        {
            menuSubmenu('course','approved_trainee_list_for_cco');
            $trainingCourseListDetails = TrainingCourseListDetails::where('forward', 3)->where('approved', 1)->where('status', 2)->latest()->paginate(25);
            return view('backend.admin.calendar.calender',[
                'type' => $type,
                'trainingCourseListDetails' => $trainingCourseListDetails
            ]);
        }

        elseif($type=='approved_trainee_list')
        {
            menuSubmenu('calendar','approved_trainee_list');
           
            $trainingCourseListDetails = TrainingCourseListDetails::where('forward', 1)->where('approved', 1)->where('status', 1)->latest()->paginate(25);
        
            return view('backend.admin.calendar.calender',[
                'type' => $type,
                'trainingCourseListDetails' => $trainingCourseListDetails
            ]);
        }
        elseif($type=='final_training_courses')
        {
            menuSubmenu('course','final_training_courses');
            $trainingCourseListDetails = TrainingCourseListDetails::where('forward', 3)->where('approved', 1)->where('status', 2)->latest()->paginate(25);
            return view('backend.admin.calendar.calender',[
                'type' => $type,
                'trainingCourseListDetails' => $trainingCourseListDetails
            ]);
        }
        elseif($type=='sent_course_list')
        {
            $user = Auth::user();

        
            menuSubmenu('course','sent_course_list');
            $fiscal = FiscalYear::orderBy('created_at','desc')->select('id', 'created_at')->first();
            $current_fiscal_yr = explode('-', $fiscal->created_at)[0];
            $allFiscal = FiscalYear::orderBy('id','desc')->select('id','name')->get();
            
            $courses = TrainingCourse::where('forward', 1)->where('is_published', 0)->where('fiscal_year_id',$fiscal->id)->with('trainer', 'courseDuration', 'courseCurriculam')->latest()->paginate(25);
            

            return view('backend.admin.trainingCourse.index',[
                'type' => $type,
                'courses' => $courses,
                'allFiscal' => $allFiscal,
                'current_fiscal' => $current_fiscal_yr
            ]);
           
            
        }
        

    }

    public function courseCalendar(Request $request)
    {
        menuSubmenu('course','courseCalendar');

        $courseCalendars = CourseCalendar::where('is_approved', 1)->latest()->paginate(25);
        return view('backend.admin.calendar.ajax.course_calendar_list',[
            'courseCalendars' => $courseCalendars
        ]);
    }

    public function dowloadCalendercy(Request $request)
    {
        $courseCalendars = CourseCalendar::where('is_approved', 1)->latest()->paginate(25);
        return view('backend.admin.calendar.ajax.course_calender_pdf_view',[
            'courseCalendars' => $courseCalendars
        ]);

    }


    public function approved(Request $request)
    {
        $items = $request->items;
        if($items != null){
            foreach($items as $item)
            {
                $calender = CourseCalendar::find($item);
                $calender->status = 1; //approve
                $calender->is_approved = 1;
                
                $course = $calender->course;
                $course->status = 2; //approved
                $course->save(); 
                $calender->save(); //save calender status and change approved status
            }
            return back()->with('success','Approved Successfully.');
        }else{
            return back()->with('warning','Please select course');
        }
    }

    public function requestApprovalFromModify(Request $request)
    {
        $items = $request->items;

        foreach($items as $item)
        {
            CourseCalendar::where('id', $item)->update([
                'status' => 0,
            ]);
        }

        return back()->with('info','Calendar send for modification Successfully.');

    }

    public function claimForChange(Request $request)
    {
        $calender = CourseCalendar::where('course_id', $request->course_id)->update([
            'comment' => $request->comment,
            'status' => 1,
        ]);

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

    /**
     * store data to course-traing-list table.
     *
     * @param  Request
     * @return \Illuminate\Http\Response
     */
    public function sendCalenderList(Request $request)
    {
        $dept_ids = $request->dept_ids;
        $course_id = $request->course_id;

        CourseTrainingList::create([
            'course_id' => $course_id,
            'department_id' => json_encode($dept_ids),
            'status' => 1,
            'created_by' => Auth::user()->id
        ]);
        
        return back()->with('success','Course Sent to Departments Successfully.');

    }
}

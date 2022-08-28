<?php

namespace App\Http\Controllers\Backend\Admin;

use Auth;
use App\Models\TrainingCourse;
use App\Models\FiscalYear;
use App\Models\TrainingTrainer;
use App\Models\TrainingCourseDuration;
use App\Models\TrainingCourseCurriculumn;
use App\Models\CourseCalendar;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
class TrainingCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if (Gate::allows('manage_course', $user)) 
        {
            menuSubmenu('course','allCourse');
            $fiscal = FiscalYear::where('status',true)->first();
            
            $allFiscal = FiscalYear::orderBy('id','desc')->get();
            
            if($fiscal)
            {
                $courses = TrainingCourse::where('status',3)->where('is_published',true)->where('fiscal_year_id',$fiscal->id)->with('trainer', 'courseDuration', 'courseCurriculam')->latest()->paginate(25);
            }
            else
            {
                $courses = TrainingCourse::where('status',3)->where('is_published',true)->where('fiscal_year_id',null)->with('trainer', 'courseDuration', 'courseCurriculam')->latest()->paginate(25);

            }
            return view('backend.admin.trainingCourse.index',[
                'courses' => $courses,
                'allFiscal' => $allFiscal
            ]);
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

        if (Gate::allows('manage_course', $user)) 
        {
            menuSubmenu('course','createCourse');
            
            $exist = TrainingCourse::where('is_published',false)->where('created_by',$user->id)->first();
            $years = FiscalYear::where('status',true)->orderBy('id','desc')->get();
            $trainers = TrainingTrainer::orderBy('id','desc')->get();
            $coursedirector = User::where('role_id',13)->orderBy('id','desc')->first();
            $courseCoordinator = User::where('role_id',12)->get();
            
            if($exist)
            {
                $courseCurriculam = TrainingCourseCurriculumn::where('course_id', $exist->id)->get();

                $courseDuration = TrainingCourseDuration::where('course_id',$exist->id)->get();
                return view('backend.admin.trainingCourse.create',[
                    'course' => $exist,
                    'years' => $years,
                    'trainers' => $trainers,
                    'courseDuration'=>$courseDuration,
                    'courseCurriculam' => $courseCurriculam,
                    'coursedirector' =>$coursedirector,
                    'courseCoordinator' => $courseCoordinator
                ]);
            }
            else
            {
                $course = new TrainingCourse;
                $course->created_by = $user->id;
                $course->is_published = false;
                $course->save();
                $courseCurriculam = TrainingCourseCurriculumn::where('course_id', $course->id)->get();
                
                $courseDuration = TrainingCourseDuration::where('course_id',$course->id)->get();
                return view('backend.admin.trainingCourse.create',[
                    'course' => $course,
                    'years' => $years,
                    'trainers' => $trainers,
                    'courseDuration'=>$courseDuration,
                    'courseCurriculam' => $courseCurriculam,
                    'coursedirector' =>$coursedirector,
                    'courseCoordinator' => $courseCoordinator

                ]);
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
        $course = TrainingCourse::where('id', $id)->with('trainer', 'courseDuration', 'courseCurriculam', 'courseYear')->first();
        // dd($course);
        return view('backend.admin.trainingCourse.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainingCourse $course)
    {

        $years = FiscalYear::where('status',true)->orderBy('id','desc')->get();
        $trainers = TrainingTrainer::orderBy('id','desc')->get();
        $courseCurriculam = TrainingCourseCurriculumn::where('course_id', $course->id)->get();
        $courseDuration = TrainingCourseDuration::where('course_id',$course->id)->get();
        $coursedirector = User::where('role_id',13)->orderBy('id','desc')->first();
        $courseCoordinator = User::where('role_id',12)->get();

        return view('backend.admin.trainingCourse.edit',[
            'course'=>$course,
            'years' => $years,
            'trainers' => $trainers,
            'courseDuration'=>$courseDuration,
            'courseCurriculam' => $courseCurriculam,
            'coursedirector' => $coursedirector,
            'courseCoordinator' => $courseCoordinator
        ]);
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

    public function courseUpdate(TrainingCourse $course,Request $request)
    {
        
        if($request->type == 'title')
        {
            $course->title = $request->title;
            $course->save();
        }
        if($request->type == 'fiscal_year')
        {
            
            $course->fiscal_year_id = $request->title;
            $course->save();
        }
        if($request->type == 'trainer')
        {
            $course->trainer_id = $request->title;
            $course->save();
        }
        if($request->type=='director')
        {
            $course->course_director_id = $request->title;
            $course->save();
        }
        if($request->type=='coordinator')
        {
            $course->course_coordinator_id = $request->title;
            $course->save();
        }
        if($request->type=='purpose')
        {
            $course->course_purpose = $request->title;
            $course->save();
        }        

        $years = FiscalYear::orderBy('id','desc')->get();
        $trainers = TrainingTrainer::orderBy('id','desc')->get();

        $page = View('backend.admin.trainingCourse.form.courseDetails',['course' =>$course,'years' => $years,
        'trainers' => $trainers])->render();
        
    }

    public function addCourseDuration(TrainingCourse $course,Request $request)
    {
        $validation = Validator::make($request->all(),
        [ 
            'month' => ['required'],
            'duration' => ['required'],
            'trainee_type' => ['required'],
            'hour' => ['required'],
            'total_trainees' => ['required'],
            'training_type' => ['required'],
            'total_trainer_allowance' => ['required'],
            'total_trainees_allowance' => ['required']
        ]);

        if($validation->fails())
        {
            if($request->ajax())
            {
                $years = FiscalYear::orderBy('id','desc')->get();
                $trainers = TrainingTrainer::orderBy('id','desc')->get();
                $courseDuration = TrainingCourseDuration::where('course_id',$course->id)->get();

                $page = View('backend.admin.trainingCourse.form.courseDuration',['course' =>$course,'years' => $years,
                    'trainers' => $trainers,'courseDuration'=>$courseDuration])->render();

                return Response()->json(array(
                    'success' => false,
                    'errors' => $validation->errors()->toArray(),
                    'sessionMessage' => 'Please, fillup the form correctly and try again.',
                    'page'=>$page
                ));
            }

            return back()
            ->withInput()
            ->withErrors($validation);
        }

        if($request->ajax())
        {
            $batch = TrainingCourseDuration::where('course_id',$course->id)->orderBy('id','desc')->first();
            if($batch)
            {

                $batchNo = $batch->batch_no + 1;
            }
            else
            {
                $batchNo = 1;
            }
            $courseDuration = new TrainingCourseDuration;
            $courseDuration->course_id = $course->id;
            $courseDuration->batch_no = $batchNo;
            $courseDuration->month = $request->month;
            $courseDuration->duration = $request->duration;
            $courseDuration->trainee_type = $request->trainee_type;
            $courseDuration->course_hour = $request->hour;
            $courseDuration->total_trainees = $request->total_trainees;
            $courseDuration->training_type = $request->training_type;
            $courseDuration->total_trainer_allowance = $request->total_trainer_allowance;
            $courseDuration->total_trainee_allowance = $request->total_trainees_allowance;
            $courseDuration->created_by = Auth::user()->id;
            $courseDuration->save();

            $years = FiscalYear::orderBy('id','desc')->get();
            $trainers = TrainingTrainer::orderBy('id','desc')->get();
            $courseDuration = TrainingCourseDuration::where('course_id',$course->id)->get();

            $page = View('backend.admin.trainingCourse.form.courseDuration',['course' =>$course,'years' => $years,
            'trainers' => $trainers,'courseDuration'=>$courseDuration])->render();
            if($request->ajax())
            {
                return Response()->json(array(
                'success' => true,
                'page' => $page,
                ));
            }
        }
    }

    // Add course curriculam
    public function addCourseCurriculam(TrainingCourse $course, Request $request)
    {
        
        $validation = Validator::make($request->all(),[
            'module_no' => ['required'],
            'subject_code' => ['required'],
            'subject_title' => ['required']
        ]);

        if($validation->fails())
        {
            if($request->ajax())
            {
                $courseCurriculam = TrainingCourseCurriculumn::where('course_id', $course->id)->get();
                $years = FiscalYear::orderBy('id','desc')->get();
                $trainers = TrainingTrainer::orderBy('id','desc')->get();
                $courseDuration = TrainingCourseDuration::where('course_id',$course->id)->get();
                
                $page = View('backend.admin.trainingCourse.form.courseCurriculam', ['courseCurriculam' => $courseCurriculam, 'course'=>$course,'years' => $years, 'trainers' => $trainers, 'courseDuration'=>$courseDuration])->render();

                return Response()->json(array(
                    'success' => false,
                    'errors' => $validation->errors()->toArray(),
                    'sessionMessage' => 'Please, fillup Course Curriculam correctly and try again.',
                    'page' => $page
                ));
            }

            return back()->withInput()->withErrors($validation);
        }

        if($request->ajax())
        {
            $courseCurriculam = new TrainingCourseCurriculumn;
            $courseCurriculam->course_id = $course->id;
            $courseCurriculam->module_no = $request->module_no;
            $courseCurriculam->subject_code = $request->subject_code;
            $courseCurriculam->subject_title = $request->subject_title;
            $courseCurriculam->created_by = Auth::user()->id;
            $courseCurriculam->save();

            $years = FiscalYear::orderBy('id','desc')->get();
            $trainers = TrainingTrainer::orderBy('id','desc')->get();
            
            $courseCurriculam = TrainingCourseCurriculumn::where('course_id', $course->id)->get();

            $page = View('backend.admin.trainingCourse.form.courseCurriculam', ['courseCurriculam' => $courseCurriculam, 'course'=>$course,'years' => $years, 'trainers' => $trainers])->render();

            if($request->ajax())
            {
                return Response()->json(array(
                'success' => true,
                'page' => $page,
                ));
            }

        }

    }


    public function editCourseDuration(TrainingCourseDuration $courseDuration)
    {
        return view('backend.admin.trainingCourse.editCourseDuration',[
            'courseDuration'=>$courseDuration
        ]);
    }

    public function updateCourseDuration(TrainingCourseDuration $courseDuration,Request $request)
    {
        // dd($request->all());
        $validation = Validator::make($request->all(),
        [ 
            'month' => ['required'],
            'duration' => ['required'],
            'trainee_type' => ['required'],
            'hour' => ['required'],
            'total_trainees' => ['required'],
            'training_type' => ['required'],
            'total_trainer_allowance' => ['required'],
            'total_trainees_allowance' => ['required']
        ]);

        if($validation->fails())
        {
            return back()
            ->withInput()
            ->withErrors($validation);
        }

        $courseDuration->month = $request->month;
        $courseDuration->duration = $request->duration;
        $courseDuration->trainee_type = $request->trainee_type;
        $courseDuration->course_hour = $request->hour;
        $courseDuration->total_trainees = $request->total_trainees;
        $courseDuration->training_type = $request->training_type;
        $courseDuration->total_trainer_allowance = $request->total_trainer_allowance;
        $courseDuration->total_trainee_allowance = $request->total_trainees_allowance;
        $courseDuration->updated_by = Auth::user()->id;
        $courseDuration->save();

        return back()->with('success','Update Successfully.');
    }

    public function deleteCourseDuration(TrainingCourseDuration $courseDuration)
    {
        $courseDuration->delete();
        return back()->with('success','Course Duration Delete Successfully.');
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


    // Edit course curriculam
    public function editCourseCurriculam(TrainingCourseCurriculumn $courseCurriculam)
    {
        return view('backend.admin.trainingCourse.editCourseCurriculam', compact('courseCurriculam'));
    }

    // Update course curriculam
    public function updateCourseCurriculam(TrainingCourseCurriculumn $courseCurriculam, Request $request)
    {
        $validation = Validator::make($request->all(),
        [
            'module_no' => ['required'],
            'subject_title' => ['required'],
            'subject_code' => ['required']
        ]);

        if($validation->fails())
        {
            return back()->withInput()->withErrors($validation);
        }

        $courseCurriculam->module_no = $request->module_no;
        $courseCurriculam->subject_title = $request->subject_title;
        $courseCurriculam->subject_code = $request->subject_code;
        $courseCurriculam->save();

        return back()->with('success', 'Course curriculam updated successfully.');

    }

    // Delete course curriculam
    public function deleteCourseCurriculam(TrainingCourseCurriculumn $courseCurriculam)
    {
        $courseCurriculam->delete();
        return back()->with('success', 'Course curriculam deleted successfully');
    }

    // Submit Course
    public function submitCourse(TrainingCourse $course)
    {
        $coursedirector = User::where('role_id',13)->orderBy('id','desc')->first();
        
        $course->course_director_id =  $coursedirector->id;

        $course->is_published = 1;
        $course->status = 3;
        $course->save();
        return back()->with('success', 'Course published successfully');
    }

    // Clear course
    public function clearCourse($course_id)
    {
        TrainingCourse::where('id', $course_id)->delete();
        TrainingCourseDuration::where('course_id', $course_id)->delete();
        TrainingCourseCurriculumn::where('course_id', $course_id)->delete();
        
        return redirect()->route('admin.course.index')->with('success', 'Course data cleared successfully');
    }

    public function forwardCourse(Request $request)
    {
        
        $courses = $request->items;

        foreach($courses as $course)
        {
            $currentCourse = TrainingCourse::find($course);
            $calender = new CourseCalendar; 

            $calender->fiscal_year_id = $currentCourse->fiscal_year_id;
            $calender->course_id = $currentCourse->id;
            $calender->status = false;
            $calender->forward = 3; // forward role id
            $calender->is_approved = false;
            $calender->save();

            $currentCourse->status = false;
            $currentCourse->save();
        }
        return redirect()->back()->with('success','Submit successfully. Please wait for Director General approval.');
    }

    public function allModify()
    {
        menuSubmenu('course','allModifyCourse');

        $type = "Request for changes";
        $calender = CourseCalendar::where('status',2)->latest()->paginate(25);
        return view('backend.admin.calendar.allModify',[
            'calender' => $calender,
            'type'=>$type
        ]);
    }
}

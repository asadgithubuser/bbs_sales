<?php

namespace App\Http\Controllers\Backend\Admin;

use Auth;
use App\Models\TrainingCourse;
use App\Models\FiscalYear;
use App\Models\TrainingTrainer;
use App\Models\TrainingCourseDuration;
use App\Models\TrainingCourseCurriculumn;
use App\Models\CourseCalendar;
use App\Models\CourseTrainingList;
use App\Models\ClaimModifyTraineeList;
use App\Models\TrainingCourseListDetails;
use App\Models\TraineeEvaluationForm;
use App\Models\TemplateSetting;
use App\Models\User;
use App\Models\Department;
use App\Models\CourseTitle;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
class TrainingCourseController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        if (Gate::allows('manage_course', $user)) 
        {
            menuSubmenu('course','allCourse');

            $fiscal_all = FiscalYear::select('id', 'name')->get();
            $current_yr = '';
            $fiscal_id = 0;
            foreach($fiscal_all as $year){
                if(explode('-', $year->name)[0] == explode('-', now())[0]){
                    $current_yr = explode('-', $year->name)[0];
                    $fiscal_id = $year->id;
                }
            }

            $fiscal = FiscalYear::find($fiscal_id);
            $allFiscal = FiscalYear::select('id','name')->get();

            if($fiscal)
            {
                $courses = TrainingCourse::where('forward', 0)->where('is_published', 0)->where('fiscal_year_id', $fiscal_id)->with('trainer', 'courseDuration', 'courseCurriculam')->latest()->paginate(25);
            }else{
                $courses = TrainingCourse::where('status',3)->where('is_published',true)->where('fiscal_year_id',null)->with('trainer', 'courseDuration', 'courseCurriculam')->latest()->paginate(25);

            }
           

            return view('backend.admin.trainingCourse.index',[
                'type' => $request->type,
                'courses' => $courses,
                'fiscal' => $fiscal,
                'q'=>$fiscal_id,
                'allFiscal' => $allFiscal,
                'current_fiscal' => $current_yr
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
            $coursedirector = User::where('role_id', 3)->first();
            $courseCoordinator = User::where('role_id', Auth::user()->role_id)->first();
            $courseTitles = CourseTitle::where('status', 'Active')->get();


            return view('backend.admin.trainingCourse.create',[
                'course' => $exist,
                'years' => $years,
                'trainers' => $trainers,
                'courseTitles' => $courseTitles,
                'coursedirector' =>$coursedirector,
                'courseCoordinator' => $courseCoordinator
            ]);
            

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
        $course = new TrainingCourse;
        $course->course_title_id = $request->title_id;
        $course->fiscal_year_id = $request->fiscal_year;
        $course->trainer_id  = $request->trainer;
        $course->course_director_id = $request->director;
        $course->course_coordinator_id = $request->coordinator;
        $course->course_purpose = $request->purpose;
        $course->is_published = 0;
        $course->status = 0;
        $course->forward = 0;
        $course->created_by = Auth::user()->id;
        $course->updated_by = null;
  
        $tcd = TrainingCourseDuration::where('course_id', $request->course_id)->latest()->first();
        if($tcd != null){
            $batchNo = $tcd->batch_no;
        }else{
            $batchNo = 0;
        }

        if($course->save()){
            $courseDuration = new TrainingCourseDuration;
            $courseDuration->course_id = $course->id;
            $courseDuration->batch_no = $batchNo + 1;
            $courseDuration->month = $request->month;
            $courseDuration->duration = $request->duration;
            $courseDuration->trainee_type = $request->trainee_type;
            $courseDuration->course_hour = $request->hour;
            $courseDuration->total_trainees = $request->total_trainees;
            $courseDuration->training_type = $request->training_type;
            $courseDuration->total_trainer_allowance = $request->total_trainer_allowance;
            $courseDuration->total_trainee_allowance = $request->total_trainees_allowance;
            $courseDuration->status = 1;
            $courseDuration->created_by = Auth::user()->id;
            $courseDuration->save();
        }


        return back()->with('success','Course Has Been Ctrated Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addScheduleAndCurriculam()
    {
        $user = Auth::user();
        $exist = TrainingCourse::where('created_by',$user->id)->first();
        $courses = TrainingCourse::where('is_published', false)->get();
        $years = FiscalYear::where('status',true)->orderBy('id','desc')->get();
        $trainers = TrainingTrainer::orderBy('id','desc')->get();
        $coursedirector = User::where('role_id',13)->orderBy('id','desc')->first();
        $courseCoordinator = User::where('role_id',12)->get();
        
        $courseCurriculam = TrainingCourseCurriculumn::where('course_id', $exist->id)->get();

        $courseDuration = TrainingCourseDuration::where('course_id',$exist->id)->get();
        return view('backend.admin.trainingCourse.createForm.add_schedule_and_curriculam',[
            'course' => $exist,
            'courses' => $courses,
            'user' => $user,
            'years' => $years,
            'trainers' => $trainers,
            'courseDuration'=>$courseDuration,
            'courseCurriculam' => $courseCurriculam,
            'coursedirector' =>$coursedirector,
            'courseCoordinator' => $courseCoordinator
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $type)
    {
        $course = TrainingCourse::where('id', $id)->with('trainer', 'courseDuration', 'courseCurriculam', 'courseYear')->first();
        
        $allcourseCountStatus = traineeCourseCountStatus();
        return view('backend.admin.trainingCourse.show', compact('course', 'allcourseCountStatus', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($course_id, $type)
    {
        
        $course = TrainingCourse::find($course_id);
        $years = FiscalYear::where('status',true)->orderBy('id','desc')->get();
        $trainers = TrainingTrainer::orderBy('id','desc')->get();
        $courseCurriculam = TrainingCourseCurriculumn::where('course_id', $course->id)->get();
        $courseDuration = TrainingCourseDuration::where('course_id', $course->id)->first();
        $coursedirector = User::where('role_id', 3)->first();
        $courseCoordinator = User::where('role_id', Auth::user()->role_id)->first();
        $courseTitles = CourseTitle::where('status', 'Active')->get();

        return view('backend.admin.trainingCourse.edit',[
            'course'=>$course,
            'courseTitles' => $courseTitles,
            'type' => $type,
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
    public function update(Request $request)
    {
       
        $course = TrainingCourse::find($request->course_idd);
        $course->course_title_id = $request->title_id;
        $course->fiscal_year_id = $request->fiscal_year;
        $course->trainer_id  = $request->trainer;
        $course->course_director_id = $request->director;
        $course->course_coordinator_id = $request->coordinator;
        $course->course_purpose = $request->purpose;
        $course->updated_by = Auth::user()->id;
        $course->save();
  
        $courseDuration = TrainingCourseDuration::where('course_id', $request->course_idd)->first();
        if($courseDuration != null){
            $batchNo = $courseDuration->batch_no;
        }else{
            $batchNo = 0;
        }

        $update = $courseDuration->update([
            'course_id' => $course->id,
            'batch_no' => $batchNo + 1,
            'month' => $request->month,
            'duration' => $request->duration,
            'trainee_type' => $request->trainee_type,
            'course_hour' => $request->hour,
            'total_trainees' => $request->total_trainees,
            'training_type' => $request->training_type,
            'total_trainer_allowance' => $request->total_trainer_allowance,
            'total_trainee_allowance' => $request->total_trainees_allowance,
            'updated_by' => Auth::user()->id,
        ]);


        if($request->update_type == 'update'){
            return redirect()->route('admin.course.index', ['type' => 'allCourse'])->with('success','Course Has Been Updated Successfully.');
        }else{
            return redirect()->route('admin.course.allModify', ['type' => 'request_for_changes'])->with('success','Course Has Been Updated Successfully.');
        }
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

        $page = View('backend.admin.trainingCourse.editForm.courseDetails',['course' =>$course,'years' => $years,
        'trainers' => $trainers])->render();
        
    }

    public function addCourseDuration(TrainingCourse $course, Request $request)
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
            $courseDuration->course_hour = 4444;
            $courseDuration->total_trainees = $request->total_trainees;
            $courseDuration->training_type = $request->training_type;
            $courseDuration->total_trainer_allowance = $request->total_trainer_allowance;
            $courseDuration->total_trainee_allowance = $request->total_trainees_allowance;
            $courseDuration->created_by = Auth::user()->id;
            $courseDuration->save();

            $years = FiscalYear::orderBy('id','desc')->get();
            $trainers = TrainingTrainer::orderBy('id','desc')->get();
            $courseDuration = TrainingCourseDuration::where('course_id',$course->id)->get();

            $page = View('backend.admin.trainingCourse.createForm.courseDuration',['course' =>$course,'years' => $years, 'trainers' => $trainers,'courseDuration'=>$courseDuration])->render();
            if($request->ajax())
            {
                return Response()->json(array(
                'success' => true,
                'page' => $page,
                ));
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
                
                $page = View('backend.admin.trainingCourse.createForm.courseCurriculam', ['courseCurriculam' => $courseCurriculam, 'course'=>$course,'years' => $years, 'trainers' => $trainers, 'courseDuration'=>$courseDuration])->render();

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

            $page = View('backend.admin.trainingCourse.createForm.courseCurriculam', ['courseCurriculam' => $courseCurriculam, 'course'=>$course,'years' => $years, 'trainers' => $trainers])->render();

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
        $coursedirector = User::where('role_id', 13)->orderBy('id','desc')->first();
        
        $course->course_director_id =  $coursedirector->id;

        $course->is_published = 0;
        $course->status = 0;
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

    public function allModifiedApproval(Request $request)
    {
        $courses = $request->items;

        foreach($courses as $course)
        {
            $currentCourse = TrainingCourse::find($course);

            $cc  = CourseCalendar::where('course_id', $currentCourse->id)->first();
            if($cc == null){
                $calender = new CourseCalendar; 
                $calender->fiscal_year_id = $currentCourse->fiscal_year_id;
                $calender->course_id = $currentCourse->id;
                $calender->status = 0;
                $calender->is_approved = 0;
                $calender->save();
            }else{
                CourseCalendar::where('course_id', $currentCourse->id)->update([
                    'is_approved' => 1,
                ]);
                
            }
            $currentCourse->forward = 1;
            $currentCourse->status = 1;
            $currentCourse->save();

            $currentCourse->courseYear->status = 0;
            $currentCourse->save();
        }
        return redirect()->back()->with('success','Submit successfully. Please wait for Director General approval.');
    }

    public function sendForApproval(Request $request)
    {
       
        $courses = $request->items;
        foreach($courses as $course)
        {
            $currentCourse = TrainingCourse::find($course);

            $cc  = CourseCalendar::where('course_id', $currentCourse->id)->first();
            if($cc == null){
                $calender = new CourseCalendar; 
                $calender->fiscal_year_id = $currentCourse->fiscal_year_id;
                $calender->course_id = $currentCourse->id;
                $calender->status = 0;
                $calender->is_approved = 0;
                $calender->save();
            }else{
                CourseCalendar::where('course_id', $currentCourse->id)->update([
                    'is_approved' => 1,
                ]);
                
            }
            $currentCourse->forward = 1;
            $currentCourse->status = 1;
            $currentCourse->save();

            $currentCourse->courseYear->status = 0;
            $currentCourse->save();
        }
        return redirect()->back()->with('success','Submit successfully. Please wait for Director General approval.');
    }

    public function allModify()
    {
        menuSubmenu('course','allModifyCourse');

        $type = "request_for_changes";
        $calender = CourseCalendar::where('status', 1)->where('is_approved', 0)->latest()->paginate(25);

        return view('backend.admin.calendar.allModify',[
            'calender' => $calender,
            'type'=>$type
        ]);
    }

    public function editFinalTrainingList($id)
    {

        $type = '';
        $course = TrainingCourse::find($id);
        // dd($course->courseDuration);
        $trainingCourseListDetails = TrainingCourseListDetails::where('forward', 3)->where('approved', 1)->where('status', 2)->latest()->paginate(25);
        $trainers = TrainingTrainer::where('status', 1)->get();

        return view('backend.admin.calendar.ajax.edit_final_trainig_list',[
            'type' => $type,
            'course' => $course,
            'trainers' => $trainers,
            'trainingCourseListDetails' => $trainingCourseListDetails
        ]);
    }

    public function createTraineeList(Request $request)
    {
       $training_course_list_id = $request->id;
        $type = $request->id;

        $trainign_course_list = CourseTrainingList::find($training_course_list_id);
        $corse_item = $trainign_course_list->course;

        $trainee_list = User::select('id', 'first_name', 'designation_id', 'department_id')->where('department_id', Auth::user()->department_id)->whereBetween('role_id', ['3', '9'])->where('status', 1)->get();


        foreach($trainee_list as $trainee){
            $total_course_hour=0;
            $trainingCourseListDetails = TrainingCourseListDetails::where('user_id', $trainee->id)->where('approved', 1)->get();

            foreach($trainingCourseListDetails as $details){
                $trainingCourse = TrainingCourse::where('id', $details->course_id)->where('publish_certificate', 1)->first();

                if($trainingCourse != null){
                    $c_duration = TrainingCourseDuration::where('course_id', $details->course_id)->first();
                    $total_course_hour += $c_duration->course_hour;
                }else{
                    $total_course_hour += 0;
                }
            }
            $course_hour[$trainee->id] = $total_course_hour;
        }

        $allcourseCountStatus = traineeCourseCountStatus();

        return view('backend.admin.trainingCourse.create_trainee_course_list', compact('trainee_list', 'corse_item', 'trainign_course_list', 'type', 'course_hour', 'allcourseCountStatus'));
    }

    public function editTraineeList(Request $request, $type2)
    {
       $training_course_list_id = $request->id;
        $type = $request->id;

        $trainign_course_list = CourseTrainingList::find($training_course_list_id);
        $corse_item = $trainign_course_list->course;

        $trainee_list = User::select('id', 'first_name', 'designation_id', 'department_id')->where('department_id', Auth::user()->department_id)->whereBetween('role_id', ['3', '9'])->where('status', 1)->get();

        foreach($trainee_list as $trainee){
            $total_course_hour=0;
            $trainingCourseListDetails = TrainingCourseListDetails::where('user_id', $trainee->id)->where('approved', 1)->get();

            foreach($trainingCourseListDetails as $details){
                $trainingCourse = TrainingCourse::where('id', $details->course_id)->where('publish_certificate', 1)->first();

                if($trainingCourse != null){
                    $c_duration = TrainingCourseDuration::where('course_id', $details->course_id)->first();
                    $total_course_hour += $c_duration->course_hour;
                }else{
                    $total_course_hour += 0;
                }
            }
            $course_hour[$trainee->id] = $total_course_hour;
        }

        $allcourseCountStatus = traineeCourseCountStatus();

        return view('backend.admin.trainingCourse.edit_trainee_cl', compact('trainee_list', 'corse_item', 'trainign_course_list', 'type2', 'type', 'course_hour', 'allcourseCountStatus'));
    }




    public function addScheduleAndTrainerToCourse($id)
    {
        $type = '';
        $course = TrainingCourse::find($id);
        
        $trainingCourseListDetails = TrainingCourseListDetails::where('forward', 3)->where('approved', 1)->where('status', 2)->latest()->paginate(25);
        $trainers = TrainingTrainer::where('status', 1)->get();

        return view('backend.admin.calendar.ajax.add_shcedule_to_training_course',[
            'type' => $type,
            'course' => $course,
            'trainers' => $trainers,
            'trainingCourseListDetails' => $trainingCourseListDetails
        ]);
    }


    public function updateScheduleInfo(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'trainer_id' => 'required',
            'schedule' => 'required',
            'trainer_allowance' => 'required',
            'trainee_allowance' => 'required',
        ]);

        $course = TrainingCourse::find($request->course_id);
        $course->trainer_id  = $request->trainer_id;
        $course->save();

        $courseDuration = TrainingCourseDuration::where('course_id', $request->course_id)->update([
            'start_date' => explode(' - ', $request->schedule)[0],
            'end_date' => explode(' - ', $request->schedule)[1],
            'total_trainer_allowance' => $request->trainer_allowance,
            'total_trainee_allowance' => $request->trainee_allowance,
            'status' => 2,
            'updated_by' =>  Auth::user()->id,
        ]);

        if($validation->fails()){
            return back()->with('error','Course Info NOT Updated. Something went wrong.');
        }else{
            return redirect()->route('admin.calender.calender', ['type' => 'approved'])->with('success','Training Schedule Added Successfully.');
        }
        


    }

    public function trainneApproveForCco(Request $request)
    {
        $items = $request->items;

        foreach($items as $item)
        {
            TrainingCourseListDetails::where('id', $item)->update([
                'forward' => 2,
            ]);
        }

        return back()->with('success','Trainee List Send For Approval Successfully.');

    }

    public function trainneApprovedForWaiting(Request $request)
    {
        $courseListIds = $request->trainingCourseListIds;
        if(!empty($courseListIds)){
            foreach($courseListIds as $course_id)
            {
                TrainingCourseListDetails::where('course_id', $course_id)->update([
                    'forward' => 3, 
                    'status' => 2, 
                ]);

                TrainingCourse::where('id', $course_id)->update([
                    'status' => 3,
                ]);

            }
            return back()->with('success','Course\'s Approved Successfully.');
        }else{
            return back()->with('warning','Please Select Course.');
        }
    }



    public function traineeApprovedForFinalList(Request $request)
    {
        $items = $request->waitingTaineeIds;
        $courseDuration = TrainingCourseDuration::where('course_id', $request->course_id)->first();
        $approvedTrainees = TrainingCourseListDetails::where(['course_id' => $request->course_id, 'approved' => 1])->count();

        $requested_approve_trainees = $approvedTrainees + count($items);

        if($requested_approve_trainees > $courseDuration->total_trainees){
            return back()->with('warning','You Can\'t Add More Than Of Total Trainee '.$courseDuration->total_trainees.'.');
        }else{
            if(!empty($items)){
                foreach($items as $item)
                {
                    TrainingCourseListDetails::where('id', $item)->update([
                        'approved' => 1, //approved list
                    ]);
                }
                return back()->with('success','Trainee\'s Approved Successfully.');
            }else{
                return back()->with('warning','Please Select Trainee.');
            }
        }
    }

    public function storeTraineeList(Request $request)
    {
        $trainee_ids = $request->all();
        if(!empty($trainee_ids['trainee'])){
            foreach($trainee_ids['trainee'] as $id){
                if(isset($id['id']) && $id['id'] != null){
                    TrainingCourseListDetails::create([
                        'course_training_list_id' => $request->trainign_course_list,
                        'course_id' => $request->course_id,
                        'user_id' => $id['id'],
                        'forward' => 0,
                        'approved' => 0,
                        'status' => 1,
                    ]); 
                }
            }

            return redirect()->route('admin.course.allTrainingList', ['type' => 'training_course_list'])->with('success','Trainee List Has Been Created Successfully.');
        }else{
            return back()->with('warning','Please Select Trainee.');
        }
    }

    public function updateTraineeList(Request $request, $type2)
    {

       
       TrainingCourseListDetails::where(['course_training_list_id' => $request->trainign_course_list])->delete();
        $trainee_ids = $request->all();
        foreach($trainee_ids['trainee'] as $id){
           if(isset($id['id']) && $id['id'] != null){
                TrainingCourseListDetails::create([
                    'course_training_list_id' => $request->trainign_course_list,
                    'course_id' => $request->course_id,
                    'user_id' => $id['id'],
                    'forward' => 0,
                    'approved' => 0,
                    'status' => 1,
                ]); 
            }
        }

        return redirect()->back()->with('success','Trainee List Has Been Updated Successfully.');
    }



    public function forwardTraineeList(Request $request)
    {
        if(!empty($request->trainingCourseListIds)){
            foreach($request->trainingCourseListIds as $course_id)
            {
                TrainingCourseListDetails::where('course_id', $course_id)->update([
                    'forward' => 1,
                ]);
                // TrainingCourse::where('id', $course_id)->update([
                //     'forward' => 2,
                // ]);
            }

            return back()->with('success','Trainee List Sended For Approval Successfully.');
        }else{
            return back()->with('warning','Please Select Course.');
        }
    }
    
    public function trainneApproved(Request $request)
    {
        if(!empty($request->modifyTraineeListIds)){
            foreach($request->modifyTraineeListIds as $id)
            {
                $ctdl = TrainingCourseListDetails::find($id);
                $ctdl->approved = 1;
                $ctdl->save();
            }
            return back()->with('success','Trainee List Approve confirmed Successfully.');
        }else{
            return back()->with('warning','Please Select Trainee.');
        }
       
    }
    
    public function trainneModifyUpdate(Request $request)
    {
        if(!empty($request->modifyTraineeListIds)){
            foreach($request->modifyTraineeListIds as $id)
            {
                $ctdl = TrainingCourseListDetails::find($id);
                $ctdl->forward = 1;
                $ctdl->status = 1;
                $ctdl->approved = 0;
                $ctdl->save();
            }
            return back()->with('success','Trainee List Approve confirmed Successfully.');
        }else{
            return back()->with('warning','Please Select Trainee.');
        }
       
    }

    public function claimTraineeListForChange(Request $request)
    {

        ClaimModifyTraineeList::create([
            'user_id' => $request->user_id_val,
            'course_training_list_details_id' => $request->ctld_id_val,
            'comment' => $request->comment,
            'status' => 1,
        ]);

        return back()->with('success','claim To Trainee List Successfully.');
        
    }
        

    public function storeTraineeModifyComment(Request $request)
    {
      
       
       $cmtl = ClaimModifyTraineeList::create([
            'user_id' =>  $request->user_id_val,
            'course_training_list_details_id' => $request->ctld_id_val,
            'comment' => $request->comment,
            'status' => 1,
        ]);

        if($cmtl){
            $ctdl = TrainingCourseListDetails::find($request->ctld_id_val);
            $ctdl->forward = 2;
            $ctdl->save();
        }

        return back()->with('success','claim Modify To Trainee Successfully.');
        
    }

    public function publishTrainingCourse(Request $request)
    {
        if(!empty($request->courseIds)){
            foreach($request->courseIds as $id)
            {
                $ctdl = TrainingCourse::find($id);
                $ctdl->is_published = 1;
                $ctdl->save();
            }
            return back()->with('success','Selected courses have been successfully published.');
        }else{
            return back()->with('warning','Please Select Course.');
        }
    }

    public function finalApprovalRequestToCD(Request $request)
    {
        if(!empty($request->courseIds)){
            foreach($request->courseIds as $id)
            {
                $ctdl = TrainingCourse::find($id);
                $ctdl->forward = 2;
                $ctdl->save();

                CourseCalendar::where('course_id', $id)->update([
                    'status' => 2,
                ]);
            }
            return back()->with('success','Selected Courses Sended To Approval Successfully.');
        }else{
            return back()->with('warning','Please Select Course.');
        }
    }
        


    public function allTrainingList(Request $request)
    {
        $type = $request->type;
        menuSubmenu('manage_training','training_course_list');
        
        $trainee_list = User::select('id', 'first_name', 'designation_id', 'department_id')->where('department_id', Auth::user()->department_id)->whereBetween('role_id', ['3', '9'])->where('status', 1)->get();

        $training_course_ids = array();
        $trainingLists = CourseTrainingList::where('status', 1)->get();
        foreach($trainingLists as $trainingList){
            if(in_array(Auth::user()->department_id, json_decode($trainingList->department_id))){
                array_push($training_course_ids, $trainingList->id);
            }
        }
        $trainingCourseList = CourseTrainingList::whereIn('id', $training_course_ids)->orderBy('updated_at', 'DESC')->paginate(25);
 
        return view('backend.admin.calendar.calender',[
            'type' => $type,
            'trainingCourseList' => $trainingCourseList,
            'trainee_list' => $trainee_list,
            'allcourseCountStatus' => traineeCourseCountStatus(),
        ]);
        
    }

    public function allTraineeList(Request $request)
    {
        $type = $request->type;
        menuSubmenu('manage_training','traineeList');
            
        $trainingCourseListDetailsIds = TrainingCourseListDetails::pluck('course_id');
        $courses = TrainingCourse::whereIn('id', $trainingCourseListDetailsIds)->latest()->paginate(25);

        return view('backend.admin.calendar.calender',[
            'type' => $type,
            'courses' => $courses,
            'allcourseCountStatus' => traineeCourseCountStatus(),
        ]);
        
    }

    public function claimModifyTraineeList(Request $request)
    {
        $type = $request->type;
        menuSubmenu('manage_training','claim_modify_trainee_list');
        $trainingCourseListDetails = TrainingCourseListDetails::where('forward', 2)->where('approved', 0)->where('status', 1)->latest()->paginate(25);

        $trainee_list = User::select('id', 'first_name', 'designation_id', 'department_id')->where('department_id', Auth::user()->department_id)->whereBetween('role_id', ['3', '9'])->where('status', 1)->get();

        foreach($trainee_list as $trainee){
            $total_course_hour=0;
            $trainingCourseListDetails2 = TrainingCourseListDetails::where('user_id', $trainee->id)->where('approved', 1)->get();

            foreach($trainingCourseListDetails2 as $details){
                $trainingCourse = TrainingCourse::where('id', $details->course_id)->where('publish_certificate', 1)->first();

                if($trainingCourse != null){
                    $c_duration = TrainingCourseDuration::where('course_id', $details->course_id)->first();
                    $total_course_hour += $c_duration->course_hour;
                }else{
                    $total_course_hour += 0;
                }
            }
            $course_hour[$trainee->id] = $total_course_hour;
        }


        return view('backend.admin.calendar.calender',[
            'type' => $type,
            'trainingCourseListDetails' => $trainingCourseListDetails,
            'allcourseCountStatus' => traineeCourseCountStatus(),
            'course_hour' => $course_hour,
        ]);
        
    }

    public function getWaitingTraineeList($id)
    {

        $type = 'main_trainee_list';
        $trainingCourseListDetails = TrainingCourseListDetails::where('course_id', $id)->where('forward', 3)->where('approved', 0)->where('status', 2)->latest()->paginate(25);
        $main_trainingCourseListDetails = TrainingCourseListDetails::where('course_id', $id)->where('forward', 3)->where('approved', 1)->where('status', 2)->latest()->paginate(25);
        $trainingCourse = TrainingCourse::find($id);
        $courseMaterials = TraineeEvaluationForm::where(['course_id' => $id, 'type' => 'material'])->get();
        $calender = CourseCalendar::where('course_id', $id)->latest()->paginate(25);

        return view('backend.admin.calendar.ajax.trainee_details',[
            'type' => $type,
            'calender' => $calender,
            'courseMaterials' => $courseMaterials,
            'trainingCourse' => $trainingCourse,
            'trainingCourseListDetails' => $trainingCourseListDetails,
            'main_trainingCourseListDetails' => $main_trainingCourseListDetails,
        ]);
        
    }
   
    public function approvedTraineeList(Request $request)
    {
        $type = $request->type;
        menuSubmenu('manage_training','approved_trainee_list');
           
        $trainingCourseListDetails = TrainingCourseListDetails::where('forward', 1)->where('status', 1)->latest()->paginate(25);
    
        return view('backend.admin.calendar.calender',[
            'type' => $type,
            'trainingCourseListDetails' => $trainingCourseListDetails
        ]);
        
    }
   
    public function addTraineeFromOuteSide(Request $request)
    {
        menuSubmenu('course','add_trainer_outside');
        $exist = TrainingCourse::where('is_published',false)->where('created_by',auth()->user()->id)->first();
        $years = FiscalYear::where('status',true)->orderBy('id','desc')->get();
        $trainers = TrainingTrainer::orderBy('id','desc')->get();
        $coursedirector = User::where('role_id', 3)->orderBy('id','desc')->first();
        $courseCoordinator = User::where('role_id', Auth::user()->role_id)->first();
    
        return view('backend.admin.trainingCourse.createForm.add_trainer_from_outside',[
            'course' => $exist,
            'years' => $years,
            'trainers' => $trainers,
            'coursedirector' =>$coursedirector,
            'courseCoordinator' => $courseCoordinator
        ]);
       
        
    }
        
   
    public function maxCourseHour(Request $request)
    {
        menuSubmenu('all_course_setting','maximum_course_hourse');
        $max_hours = TemplateSetting::where('type', 'course_max_hours')->first();

        return view('backend.admin.allSettings.maximum_course_hourse', compact('max_hours'));
       
    }
    public function courseTitle(Request $request)
    {
        menuSubmenu('course','courseTitle');
        $courseTitles = CourseTitle::where('status', 'Active')->get();

        return view('backend.admin.trainingCourse.course_title', compact('courseTitles'));
    }


    public function showCourseReport(Request $request)
    {
        menuSubmenu('trainig_report','showCourseReport');
        $department_id = $request->depertment_id;
        $fiscal_id = $request->fiscal_id;
        $course_name = $request->course_name;

        $courses = new TrainingCourse;

        if($department_id != null){
            $departments = CourseTrainingList::where('status', 1)->pluck('department_id');

            dd($departments);




            $courses = $courses->where('fiscal_year_id', $fiscal_id);    
        }

        if($fiscal_id != null){
            $courses = $courses->where('fiscal_year_id', $fiscal_id);    
        }

        if($course_name != null){
            $title_id = CourseTitle::where('title', 'like', "%{$course_name}%")->first()->id;
            $courses = $courses->where('course_title_id', $title_id);    
        }



        $depertments = Department::where('status', 1)->get();
        $fiscal_all = FiscalYear::select('id', 'name')->get();
        $courses = $courses->latest()->paginate(25);
 
        return view('backend.admin.report.course_summary_report',[ 
            'courses' => $courses,
            'depertments' => $depertments,
            'fiscal_all' => $fiscal_all,
        ]);


 
    }


    public function storeCourseTitle(Request $request)
    {
         $title = CourseTitle::create([
            'title' => $request->courseTitle,
            'status' => 'Active'
         ]);

        if($title){
            return back()->with('success','Course title stored successfully.');
        }else{
            return back()->with('error','Course title NOT stored.');
        }
    }
        
    public function storeMaxHours(Request $request)
    {
        
        $max_hours = TemplateSetting::where('type', 'course_max_hours')->first();
            if($request->max_hours > 0){
                $storeHours = $max_hours->update([
                    'type' => 'course_max_hours',
                    'service_id' => $request->max_hours,
                    'service_item_id' => null,
                    'header' => null,
                    'footer' => null,
                    'body' => null,
                    'status' => 1
                ]);
            }else{
                return back()->with('error','Maximum course hours will be greater then 0.');
            }
        
        if($storeHours){
            return back()->with('success','Maximum course hours updated successfully.');
        }else{
            return back()->with('error','Maximum course hours NOT stored.');
        }
    }
        

    
}

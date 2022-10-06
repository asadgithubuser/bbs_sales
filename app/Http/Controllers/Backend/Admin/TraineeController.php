<?php

namespace App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TraineeEvaluationForm;
use App\Models\User;
use App\Models\TraineeAttendance;
use App\Models\TrainingCourseListDetails;
use App\Models\TrainingCourse;
use App\Models\CourseCertificate;
use App\Models\TrainingCourseDuration;
use Response;
use PDF;
use Auth;
class TraineeController extends Controller
{
    
    public function courseList(Request $request, $type){
        menuSubmenu('course_management','courseList');
        $trainingCourseDetails = TrainingCourseListDetails::where(['user_id' => auth()->id(), 'approved'=>1])->latest()->get();
        
        return view('backend.admin.trainee.index',[
            'type' => $type,
            'trainingCourseDetails' => $trainingCourseDetails,
        ]);
    }
    
    public function traineeDetailsShow(Request $request, $id){
        $preEvaluationForm = TraineeEvaluationForm::where(['course_id'=>$id, 'type' => 'pre-evaluation'])->first();
        $postEvaluationForm = TraineeEvaluationForm::where(['course_id'=>$id, 'type' => 'post-evaluation'])->first();
        $traineeDetails = TrainingCourseListDetails::where(['course_id'=>$id, 'user_id' => auth()->id()])->first();
        $certificate= CourseCertificate::where('status',1)->first();
        $trainingCourse= TrainingCourse::find($id);
        $courseMaterials = TraineeEvaluationForm::where(['course_id' => $id, 'type' => 'material'])->latest()->get();

        $type = 'trainee_course_details';
        return view('backend.admin.trainee.index',[
            'type' => $type,
            'preEvaluationForm' => $preEvaluationForm,
            'postEvaluationForm' => $postEvaluationForm,
            'traineeDetails' => $traineeDetails,
            'certificate' => $certificate,
            'courseMaterials' => $courseMaterials,
            'trainingCourse' => $trainingCourse
        ]);
    }
    
    public function downloadCourseMaterials($id){
        $materialForm = TraineeEvaluationForm::where(['id' => $id])->first();
       
        $file = public_path('uploads/material/'.$materialForm->form);
 
        if (file_exists($file)) {
            return Response::download($file);
        }else{
            return back()->with('error', 'File not found');
        }
    }
    
    
    public function downloadEvaluationForm($course_id, $type){
        if($type == 'pre') {
            $form_type = 'pre-evaluation';
        }else{
            $form_type = 'post-evaluation';
        }
        $traineeCourse = TraineeEvaluationForm::where(['course_id' => $course_id, 'type' => $form_type])->first();
       
        $file = public_path('uploads/'.$form_type.'/'.$traineeCourse->form);
 
        if (file_exists($file)) {
            return Response::download($file);
        }else{
            return back()->with('error', 'File not found');
        }
    }
    
    public function submitEvaluationFormTrainee(Request $request){
        $file = $request->file('evaluation_form');

        if ($request->type == 'pre_evaluation_form') {
            $dir_path = '/uploads/pre-evaluation-trainee';
            $form_col = 'trainee_pre_form';
        }else{
            $dir_path = '/uploads/post-evaluation-trainee';
            $form_col = 'trainee_post_form';
        }

        if ($file != null) {
            $destinationPath = public_path().$dir_path;
            $filename = $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $exist = TrainingCourseListDetails::where($form_col, $filename)->count();
            if (!$exist > 0) {
                TrainingCourseListDetails::where(['user_id' => auth()->id(),'course_id' => $request->course_id])->update([
                    $form_col => $filename,
                ]);
            
                return back()->with('success', 'Form successfully Submited');
            }else{
                return back()->with('error', 'File Alrady Exist. Please Change File Or Filename.');
            }
        }else{
            return back()->with('error', 'Please Attach file.');
        }
    }

    
    public function downloadSubmitedEForm($user_id, $course_id){
        $traineeCourseDetails = TrainingCourseListDetails::where(['user_id' => $user_id, 'course_id' => $course_id])->first();

        if(isset($traineeCourseDetails->trainee_pre_form) && $traineeCourseDetails->trainee_pre_form != null){
            $file = public_path('uploads/pre-evaluation-trainee/'.$traineeCourseDetails->trainee_pre_form);
           
            if(file_exists($file)){
               return response()->download($file);
            }else{
                return back()->with('error', 'File NOT Found.');
            }
        }else{
            return back()->with('error', 'Form NOT Submited Yet');
        }
        
    }

    public function trainneMoveToWaitingList(Request $request)
    {
        $traineeIds = $request->traineeIds;
        foreach($traineeIds as $userid)
        {
            TrainingCourseListDetails::where('course_id', $request->course_id)->where('user_id', $userid)->update([
                'forward' => 3, 
                'approved' => 0, 
                'status' => 2, 
            ]);
        }
        return back()->with('success','Trainee\'s Moved In waiting List.');
    }

    public function uploadcourseMaterials(Request $request, $type)
    {
        $file = $request->file('material_file');
        if($file != null){
            $destinationPath = public_path().'/uploads/'.$type;
            $filename = $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $exist = TraineeEvaluationForm::where('course_id', $request->course_id)->Where('type', $type);
           
            if(!$exist->count() > 0){
                TraineeEvaluationForm::create([
                        'course_id' => $request->course_id,
                        'form' => $filename,
                        'type' => $type,
                        'status' => 1,
                    ]);
                    if($type == 'material'){
                        return back()->with('success','Course Material Uploaded Successfully.');
                    }else{
                        return back()->with('success','Evaluation Form Uploaded Successfully.');
                    }
            }else{
                if($type == 'material'){
                    TraineeEvaluationForm::create([
                        'course_id' => $request->course_id,
                        'form' => $filename,
                        'type' => $type,
                        'status' => 1,
                    ]);
                    return back()->with('success','Course Material Uploaded Successfully.');
                }else{
                    $exist->update([
                        'form' => $filename
                    ]);
                }

                return back()->with('warning','Updated With Current File Successfully');
            }   
        }else{
            return back()->with('error','Please Attach File.');
        }
    }

    
    public function takeTraineeAttendance(Request $request){
        if(!empty($request->trainees)){
            foreach($request->trainees as $trainee)
            {
                if(isset($trainee['attendance']) && $trainee['attendance'] != null){
                    $attend = $trainee['attendance'];
                }else{
                    $attend = 0;
                }

                $evaluation = TraineeAttendance::create([
                    'user_id' => $trainee['user_id'],
                    'course_id' => $trainee['course_id'],
                    'day' => $request->day,
                    'attendance' => $attend,
                    'status' => 1,
                ]);
                
            }
            return back()->with('success','Attendance Taken Successfully.');
        }else{
            return back()->with('warning','Please Select Trainee.');
        }

    }
    
    public function downloadTraineeCertificate(Request $request){
        $traineeCourse = TraineeEvaluationForm::where('id' , 17)->first();
        $file = storage_path('app/'.$traineeCourse->form);
        
        $data = [
            'title' => 'Welcome to Tutsmake.com',
            'file' => $file,
            'font' => "{{ asset('assets/fonts/Kalpurush.ttf') }}",
        ];

        $pdf = PDF::loadView('backend.admin.trainee.partials.certificate_pdf', $data);
        return $pdf->download('tutsmake.pdf');
        
    }
    
    public function publishCertificateForTrainee(Request $request, $course_id){
        TrainingCourse::where('id', $course_id)->update([
             'publish_certificate' => 1,
        ]);
        
        return back()->with('success','Certificate Successfully Published.');
    }
    
    public function viewTraineeList(Request $request, $course_id){
        $trainingCourseListDetails = TrainingCourseListDetails::where('course_id', $course_id)->paginate(25);


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
            'type' => 'view_trainee_list',
            'trainingCourseListDetails' => $trainingCourseListDetails,
            'allcourseCountStatus' => traineeCourseCountStatus(),
            'course_hour' => $course_hour,
        ]);
    }

}


class FilterData{
        // Filter the excel data 
        public function filterData(&$str){ 
            $str = preg_replace("/\t/", "\\t", $str); 
            $str = preg_replace("/\r?\n/", "\\n", $str); 
            if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
            
        } 
}
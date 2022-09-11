<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingCourse extends Model
{
    use HasFactory;

    public function courseYear()
    {
        return $this->belongsTo(FiscalYear::class,'fiscal_year_id');
    }

    public function trainer()
    {
        return $this->belongsTo(TrainingTrainer::class,'trainer_id');
    }

    public function courseDuration()
    {
        return $this->hasOne(TrainingCourseDuration::class,'course_id', 'id');
    }

    public function courseDurations()
    {
        return $this->hasMany(TrainingCourseDuration::class,'course_id', 'id');
    }

 
    public function traineeAttendancePresent($user_id)
    {
        return $this->hasMany(TraineeAttendance::class,'course_id', 'id')->where('user_id', $user_id)->where('attendance', 1)->count();
    }
    public function traineeAttendanceAbsent($user_id)
    {
        return $this->hasMany(TraineeAttendance::class,'course_id', 'id')->where('attendance', 0)->where('user_id', $user_id)->count();
    }



    public function trainingCourseList()
    {
        return $this->hasOne(CourseTrainingList::class,'course_id', 'id');
    }


    public function courseCurriculam()
    {
        return $this->hasMany(TrainingCourseCurriculumn::class, 'course_id', 'id');
    }

    public function courseDirector()
    {
        return $this->belongsTo(User::class,'course_director_id');
    }

    public function courseCoordinator()
    {
        return $this->belongsTo(User::class,'course_coordinator_id');
    }

    public function courseListDetails()
    {
        return $this->hasOne(TrainingCourseListDetails::class,'course_id');
    }

    public function courseListDetails_auth_user()
    {
        return $this->courseListDetails()->where(['user_id' => auth()->id(), 'approved' =>1]);
    }


    public function courseListDetailsMany()
    {
        return $this->hasMany(TrainingCourseListDetails::class,'course_id');
    }
    // public function evaluation_form()
    // {
    //     return $this->hasOne(TraineeEvaluationForm::class,'course_id');
    // }

   
}

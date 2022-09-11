<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTrainingList extends Model
{
    use HasFactory;

    protected  $table = 'course_training_lists';

    protected $fillable = ['course_id', 'department_id', 'status', 'created_by'];


    public function course()
    {
        return $this->belongsTo('App\Models\TrainingCourse');
    }

    public function courseListDetails()
    {
        return $this->hasMany('App\Models\TrainingCourseListDetails', 'course_training_list_id', 'id');
    }

    public function approved_users_course_details()
    {
        return $this->courseListDetails()->where('forward', 3)->where('approved', 1)->where('status', 2);
    }



    
    // public function courseListDetails()
    // {
    //     return $this->hasManyThrough('App\Models\TrainingCourseListDetails', 'App\Models\TrainingCourse', 'course_training_list_id', 'course_id');
    // }





}

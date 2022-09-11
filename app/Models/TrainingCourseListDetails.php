<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TrainingCourseListDetails extends Model
{
    use HasFactory;

    protected $fillable = ['course_training_list_id', 'course_id', 'user_id', 'approved', 'trainee_pre_form', 'trainee_post_form', 'forward', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->hasOneThrough(TrainingCourse::class, User::class);
    }
    public function trainingCourse()
    {
        return $this->belongsTo(TrainingCourse::class, 'course_id');
    }

    public function publishedCertificate()
    {
        return $this->course()->where('publish_certificate', 1);
    }

    public function course_training_list()
    {
        return $this->belongsTo(CourseTrainingList::class);
    }

    public function course_duration()
    {
        return $this->belongsTo(TrainingCourseDuration::class, 'training_course_duration_id');
    }

    public function course_curriculam()
    {
        return $this->belongsTo(TrainingCourseCurriculumn::class, 'training_course_curriculumn_id');
    }

    public function claim_modify_trainee()
    {
        return $this->hasOne(ClaimModifyTraineeList::class, 'course_training_list_details_id');
    }
}

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
        return $this->hasMany(TrainingCourseDuration::class,'course_id', 'id');
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
}

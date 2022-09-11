<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingCourseDuration extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'batch_no', 'course_hour', 'month', 'start_date	', 'end_date', 'duration', 'trainee_type', 'total_trainees', 'training_type	', 'total_trainer_allowance', 'total_trainee_allowance', 'status','created_by', 'updated_by'];

}

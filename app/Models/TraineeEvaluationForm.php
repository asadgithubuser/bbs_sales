<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraineeEvaluationForm extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'course_id', 'form', 'submited_form', 'type', 'status'];


    public function course()
    {
        return $this->belongsTo(TrainingCourse::class, 'course_id');
    }


}

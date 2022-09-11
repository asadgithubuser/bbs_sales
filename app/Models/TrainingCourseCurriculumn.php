<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingCourseCurriculumn extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'module_no', 'subject_code', 'subject_title', 'created_by', 'updated_by'];
}

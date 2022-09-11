<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimModifyTraineeList extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'course_training_list_details_id', 'comment', 'status'];





}

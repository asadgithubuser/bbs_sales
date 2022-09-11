<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyTofsilForm10Production extends Model
{
    use HasFactory;

    public function survey_tofsil_form10()
    {
        return $this->belongsTo(SurveyTofsilForm10::class);
    }
}

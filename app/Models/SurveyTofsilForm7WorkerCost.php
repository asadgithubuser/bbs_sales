<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyTofsilForm7WorkerCost extends Model
{
    use HasFactory;

    public function survey_tofsil_form7()
    {
        return $this->belongsTo(SurveyTofsilForm7::class);
    }
}

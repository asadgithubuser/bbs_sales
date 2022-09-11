<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyTofsilForm9MainClassDivisionLand extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function survey_tofsil_form9()
    {
        return $this->belongsTo(SurveyTofsilForm9::class);
    }
}

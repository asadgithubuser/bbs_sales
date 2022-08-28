<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyTofsilForm2AllFarmer extends Model
{
    use HasFactory;

    public function survey_tofsil_form2()
    {
        return $this->belongsTo(SurveyTofsilForm2::class);
    }
    
    public function farmer()
    {
        return $this->belongsTo(SurveyCompilationCollectForm1::class, 'farmer_int_id');
    }
}

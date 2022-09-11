<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyTofsilForm5AllFarmer extends Model
{
    use HasFactory;

    public function survey_tofsil_form5()
    {
        return $this->belongsTo(SurveyTofsilForm5::class);
    }
    
    public function farmer()
    {
        return $this->belongsTo(SurveyTofsilForm1::class, 'farmer_id');
    }
}

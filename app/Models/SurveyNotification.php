<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyNotification extends Model
{
    use HasFactory;

    public function crop()
    {
        return $this->belongsTo('App\Models\Crop','crop_id','id');
    }

    public function cropType()
    {
        return $this->belongsTo('App\Models\CropType', 'crop_type', 'id');
    }

    public function surveyForm()
    {
        return $this->belongsTo('App\Models\SurveyForm','survey_form_id','id');

    }
    public function division()
    {
        return $this->belongsTo('App\Models\Division','division_id');
    }

    public function district()
    {
        return $this->belongsTo('App\Models\District','district_id');
    }

    public function upazila()
    {
        return $this->belongsTo('App\Models\Upazila','upazila_id');
    }
}

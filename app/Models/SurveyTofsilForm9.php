<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyTofsilForm9 extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function districtInfo()
    {
        return $this->belongsTo(District::class,'district_id', 'id');
    }

    public function upazila()
    {
        return $this->belongsTo(Upazila::class);
    }

    public function upazilaInfo()
    {
        return $this->belongsTo(Upazila::class, 'upazila_id', 'id');
    }

    public function notification()
    {
        return $this->belongsTo(SurveyNotification::class, 'survey_notification_id');
    }

    public function farmer()
    {
        return $this->belongsTo(SurveyCompilationCollectForm1::class, 'farmer_id');
    }

    public function processList()
    {
        return $this->belongsTo(SurveyProcessList::class, 'survey_process_list_id');
    }

    public function crop()
    {
        return $this->belongsTo(Crop::class, 'crops_id');
    }

    public function surveyUpazilaData($list)
    {
        $allSurvey = SurveyTofsilForm9::where('upazila_id', $list)->get()->count();
        return $allSurvey;
    }
    public function surveyDistrictData($list)
    {
        $allSurvey = SurveyTofsilForm9::where('district_id', $list)->get()->count();
        return $allSurvey;
    }

    // relation with other table
    
    public function agricultureLand()
    {
        return $this->belongsTo(SurveyTofsilForm9AgriculturalLand::class, 'id','survey_tofsil_form9_id');
    }

    public function farmLands()
    {
        return $this->belongsTo(SurveyTofsilForm9FarmLand::class, 'id','survey_tofsil_form9_id');
    }

    public function nurseryForestsLand()
    {
        return $this->belongsTo(SurveyTofsilForm9NurseryAndForest::class, 'id','survey_tofsil_form9_id');
    }

    public function riversLand()
    {
        return $this->belongsTo(SurveyTofsilForm9River::class, 'id','survey_tofsil_form9_id');
    }

    public function mineralHillLand()
    {
        return $this->belongsTo(SurveyTofsilForm9MineralsAndHill::class, 'id','survey_tofsil_form9_id');
    }

    public function nonAgricultureLand()
    {
        return $this->belongsTo(SurveyTofsilForm9NonAgriculture::class, 'id','survey_tofsil_form9_id');
    }

    public function mainClassDivisionLand()
    {
        return $this->belongsTo(SurveyTofsilForm9MainClassDivisionLand::class, 'id','survey_tofsil_form9_id');
    }

    public function termoraryNetLand()
    {
        return $this->belongsTo(SurveyTofsilForm9TemporaryNetCrop::class, 'id','survey_tofsil_form9_id');
    }

    public function cropSeasonalLand()
    {
        return $this->belongsTo(SurveyTofsilForm9CropSeasonalLand::class, 'id','survey_tofsil_form9_id');
    }

    public function irrigationProcessLand()
    {
        return $this->belongsTo(SurveyTofsilForm9IrrigationProcess::class, 'id','survey_tofsil_form9_id');
    }

    public function irrigationLand()
    {
        return $this->belongsTo(SurveyTofsilForm9IrrigationLand::class, 'id','survey_tofsil_form9_id');
    }
}

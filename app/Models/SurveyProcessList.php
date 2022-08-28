<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyProcessList extends Model
{
    use HasFactory;

    public function surveyBy()
    {
        return $this->belongsTo('App\Models\User','survey_by');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\Models\User','created_by');
    }

    public function cluster()
    {
        return $this->belongsTo(Cluster::class, 'bunch_stains_id');
    }

    public function mouza()
    {
        return $this->belongsTo(Mouza::class,'mouja_id');
    }

    public function union()
    {
        return $this->belongsTo(Union::class,'union_id');
    }

    public function upazila()
    {
        return $this->belongsTo(Upazila::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function surveyForm()
    {
        return $this->belongsTo('App\Models\SurveyForm','survey_form_id');
    }

    public function surveyNotification()
    {
        return $this->belongsTo('App\Models\SurveyNotification','survey_notification_id');
    }

    public function SurveyTofsilForm3()
    {
        return $this->hasMany('App\Models\SurveyTofsilForm3', 'survey_process_list_id', 'id');
    }
    public function surveyTemporaryCropCount()
    {
        return $this->SurveyTofsilForm3()->get()->count();
    }

    public function surveyCount()
    {        
        return $this->surveyCompilationCollectForms()->get()->count();
    }
    public function surveyCompilationCollectForms()
    {
        return $this->hasMany('App\Models\SurveyCompilationCollectForm1', 'survey_process_list_id', 'id');
    }
    public function surveyTofsilForm1s()
    {
        return $this->hasMany('App\Models\SurveyTofsilForm1', 'survey_process_list_id', 'id');
    }

    public function farmers($hello)
    {
        $datas = SurveyCompilationCollectForm1::where('mouja_id', $hello)->get();

        return $datas;
    }
    public function clusterfarmers($mouja)
    {
        $datas = SurveyTofsilForm1::where('status',1)->get();

        return $datas;
    }

    public function shankalanfarmers($mouja)
    {
        $datas = SurveyCompilationCollectForm1::where('mouja_id',$mouja)->where('status',1)->get();

        return $datas;
    }

    public function surveytofsilforms()
    {
        return $this->hasMany('App\Models\SurveyTofsilForm1','survey_process_list_id','id');
    }
    public function surveyClusterCount()
    {        
        return $this->surveytofsilforms()->get()->count();
    }

    public function surveyCountTemporayCrop($list)
    {
        $allSurvey = SurveyTofsilForm3::where('upazila_id', $list)->get()->count();

        return $allSurvey;
    }
    
    public function surveyCountPenerialCrop($list)
    {
        $allSurvey = SurveyTofsilForm4::where('upazila_id', $list)->get()->count();

        return $allSurvey;
    }

    public function surveyCountTemporaryCropDivision($list)
    {
        $allSurvey = SurveyTofsilForm3::where('division_id', $list)->get()->count();

        return $allSurvey;
    }

    public function surveyCountUpazila($list)
    {    
        $allSurvey = SurveyCompilationCollectForm1::where('upazila_id', $list)->get()->count();
        return $allSurvey;
    }

    public function surveyCountClusterUpazila($list)
    {    
        $allSurvey = SurveyTofsilForm1::where('upazila_id', $list)->get()->count();
        return $allSurvey;
    }

    public function surveyCountClusterDistrict($list)
    {
        $allSurvey = SurveyTofsilForm1::where('district_id', $list)->get()->count();
        return $allSurvey;
    }
    public function surveyCountPenirialDistrict($list)
    {
        $allSurvey = SurveyTofsilForm4::where('district_id', $list)->get()->count();
        return $allSurvey;
    }
    
    public function surveyCountTemporaryDistrict($list)
    {
        $allSurvey = SurveyTofsilForm3::where('district_id', $list)->get()->count();
        return $allSurvey;
    }
    public function surveyCountClusterDivi($list)
    {
        $allSurvey = SurveyTofsilForm1::where('division_id', $list)->get()->count();
        return $allSurvey;
    }
    public function surveyCountDistrict($list)
    {    
        $allSurvey = SurveyCompilationCollectForm1::where('district_id',$list)->get()->count();
        return $allSurvey;
    }

    public function surveyCountDivi($list)
    {
        $allSurvey = SurveyCompilationCollectForm1::where('division_id',$list)->get()->count();
        return $allSurvey;
    }

    public function perennialForms()
    {
        return $this->hasMany('App\Models\SurveyTofsilForm4','survey_process_list_id','id');
    }
    public function perennialCropCount()
    {
        return $this->perennialForms()->get()->count();
    }

    public function form1($data)
    {
        return SurveyTofsilForm1::where('survey_process_list_id',$data->id)->first();
    }

    public function cropCuttingForms()
    {
        return $this->hasMany('App\Models\SurveyTofsilForm2','survey_process_list_id','id');
    }
    public function cropCuttingCount()
    {
        return $this->cropCuttingForms()->get()->count();
    }

    public function mazeProductionForms()
    {
        return $this->hasMany('App\Models\SurveyTofsilForm3Maize', 'survey_process_list_id', 'id');
    }
    public function mazeProductionCount()
    {
        return $this->mazeProductionForms()->get()->count();
    }

    public function potatoProductionForms()
    {
        return $this->hasMany('App\Models\SurveyTofsilForm5', 'survey_process_list_id', 'id');
    }
    public function potatoProductionCount()
    {
        return $this->potatoProductionForms()->get()->count();
    }

    public function tofsil8Forms()
    {
        return $this->hasMany('App\Models\SurveyTofsilForm8', 'survey_process_list_id', 'id');
    }
    public function tofsil8Count()
    {
        return $this->tofsil8Forms()->get()->count();
    }

    public function tofsil10Forms()
    {
        return $this->hasMany('App\Models\SurveyTofsilForm10', 'survey_process_list_id', 'id');
    }
    public function tofsil10Count()
    {
        return $this->tofsil10Forms()->get()->count();
    }

    public function tofsil11Forms()
    {
        return $this->hasMany('App\Models\SurveyTofsilForm11', 'survey_process_list_id', 'id');
    }
    public function tofsil11Count()
    {
        return $this->tofsil11Forms()->get()->count();
    }

    public function tofsil7Forms()
    {
        return $this->hasMany('App\Models\SurveyTofsilForm7', 'survey_process_list_id', 'id');
    }
    public function tofsil7Count()
    {
        return $this->tofsil7Forms()->get()->count();
    }
    public function tofsil9Forms()
    {
        return $this->hasMany('App\Models\SurveyTofsilForm9', 'survey_process_list_id', 'id');
    }
    public function tofsil9Count()
    {
        return $this->tofsil9Forms()->get()->count();
    }

    public function surveyCountCropCropCutting($list)
    {
        $allSurvey = SurveyTofsilForm2::where('upazila_id', $list)->get()->count();
        return $allSurvey;
    }


    public function surveyCountCropCuttingDivision($list)
    {
        $allSurvey = SurveyTofsilForm2::where('division_id', $list)->get()->count();
        return $allSurvey;
    }

    public function surveyCountWageDivision($list)
    {
        $allSurvey = SurveyTofsilForm8::where('division_id', $list)->get()->count();
        return $allSurvey;
    }

    public function surveyCountMaize($list)
    {
        $allSurvey = SurveyTofsilForm3Maize::where('upazila_id', $list)->get()->count();
        return $allSurvey;
    }

    public function surveyCountWage($list)
    {
        $allSurvey = SurveyTofsilForm8::where('upazila_id', $list)->get()->count();
        return $allSurvey;
    }

    public function surveyCountWagesDistrict($list)
    {
        $allSurvey = SurveyTofsilForm8::where('district_id', $list)->get()->count();
        return $allSurvey;
    }

    public function surveyCountMaizeDataDistrict($list)
    {
        $allSurvey = SurveyTofsilForm3Maize::where('district_id', $list)->get()->count();
        return $allSurvey;
    }
    public function surveyCountMaizeDivision($list)
    {
        $allSurvey = SurveyTofsilForm3Maize::where('division_id', $list)->get()->count();
        return $allSurvey;
    }

    public function surveyCountForecastDistrict($list)
    {
        $allSurvey = SurveyTofsilForm10::where('district_id', $list)->get()->count();
        return $allSurvey;
    }
}

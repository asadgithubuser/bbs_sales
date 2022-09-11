<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyCompilationCollectForm1 extends Model
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

    public function upazila()
    {
        return $this->belongsTo(Upazila::class);
    }

    public function union()
    {
        return $this->belongsTo(Union::class);
    }

    public function mouza()
    {
        return $this->belongsTo(Mouza::class, 'mouja_id', 'id');
    }

    public function cluster()
    {
        return $this->belongsTo(Cluster::class);
    }

    public function notification()
    {
        return $this->belongsTo(SurveyNotification::class,'survey_notification_id');
    }

    public function surveyProcessList()
    {
        $allApprovedSurvey = surveyProcessList::where('status', 6)->where('survey_form_id', 1)->get();

        return $allApprovedSurvey;
    }

    public function cropName($id)
    {
        $crop = Crop::where('id',$id)->first();
        if($crop->name_en)
        {
            return ucfirst($crop->name_en);
        }
        else 
        {
            return 'Crop name not provided.';
        }
    }
}

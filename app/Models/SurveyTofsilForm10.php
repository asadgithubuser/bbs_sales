<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyTofsilForm10 extends Model
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

    public function crop()
    {
        return $this->belongsTo(Crop::class, 'crops_id');
    }

    public function notification()
    {
        return $this->belongsTo(SurveyNotification::class, 'survey_notification_id');
    }

    public function processList()
    {
        return $this->belongsTo(SurveyProcessList::class, 'survey_process_list_id');
    }

    public function survey_tofsil_form10_productions()
    {
        return $this->hasMany(SurveyTofsilForm10Production::class);
    }
    public function cropProductions()
    {
        return $this->hasMany(SurveyTofsilForm10Production::class, 'survey_tofsil_form10_id', 'id');
    }

    public function upazilaData($upazila_id,$notification)
    {
        return $this->where('survey_notification_id',$notification)->where('upazila_id',$upazila_id)->get();
    }
}

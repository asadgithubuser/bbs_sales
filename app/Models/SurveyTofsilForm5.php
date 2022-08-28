<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyTofsilForm5 extends Model
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

    public function cluster()
    {
        return $this->belongsTo(Cluster::class);
    }

    public function union()
    {
        return $this->belongsTo(Union::class);
    }

    public function mouza()
    {
        return $this->belongsTo(Mouza::class);
    }

    public function notification()
    {
        return $this->belongsTo(SurveyNotification::class, 'survey_notification_id');
    }

    public function farmer()
    {
        return $this->belongsTo(SurveyCompilationCollectForm1::class, 'farmer_id','id');
    }

    public function survey_tofsil_form5_all_farmers()
    {
        return $this->hasMany(SurveyTofsilForm5AllFarmer::class);
    }

    public function processList()
    {
        return $this->belongsTo(SurveyProcessList::class, 'survey_process_list_id');
    }
}

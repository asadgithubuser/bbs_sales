<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyTofsilForm2 extends Model
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
        return $this->belongsTo(Cluster::class, 'bunch_stains_id');
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

    public function crop()
    {
        return $this->belongsTo(Crop::class, 'crop_id');
    }

    public function farmer()
    {
        return $this->belongsTo(SurveyTofsilForm1::class, 'farmer_id');
    }

    public function survey_tofsil_form2_all_farmers()
    {
        return $this->hasMany(SurveyTofsilForm2AllFarmer::class);
    }

    public function processList()
    {
        return $this->belongsTo(SurveyProcessList::class, 'survey_process_list_id');
    }
}

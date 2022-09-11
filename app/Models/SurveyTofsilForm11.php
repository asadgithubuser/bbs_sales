<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyTofsilForm11 extends Model
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
        return $this->belongsTo(Mouza::class);
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

    public function upazilaDatas($upazilaID)
    {
        return $this->where('upazila_id', $upazilaID)->get();
    }

    public function districtDatas($districtID)
    {
        return $this->where('district_id', $districtID)->get();
    }

    public function divisionDatas($divisionID)
    {
        return $this->where('division_id', $divisionID)->get();
    }
}

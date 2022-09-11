<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyTofsilForm8 extends Model
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

    public function farmer()
    {
        return $this->belongsTo(SurveyTofsilForm1::class, 'farmer_id');
    }

    public function notification()
    {
        return $this->belongsTo(SurveyNotification::class, 'survey_notification_id');
    }

    public function getAllCluster($cluster,$list)
    {
        return $this->where('cluster_id',$cluster)->where('survey_process_list_id',$list)->get();
    }

    public function getUpazilaData($upazilaId,$total)
    {
        
        return $this->where('upazila_id',$upazilaId)->get()->sum($total);
    }

    public function getDistrictData($upazilaId,$total)
    {
        return $this->where('district_id',$upazilaId)->get()->sum($total);

    }

    public function getDivisionData($divisionId,$total)
    {
        return $this->where('division_id',$divisionId)->get()->sum($total);
    }

    
}

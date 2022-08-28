<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyTofsilForm1 extends Model
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

    public function notification()
    {
        return $this->belongsTo(SurveyNotification::class, 'survey_notification_id');
    }

    public function crop()
    {
        return $this->belongsTo(Crop::class, 'crops_id');
    }

    public function farmer()
    {
        return $this->belongsTo(SurveyCompilationCollectForm1::class, 'farmers_name');
    }

    public function union($data)
    {
        return Union::where('id', $data)->first();
    }

    public function mouza($data)
    {
        return Mouza::where('id', $data)->first();
    }

    public function districtData($data)
    {
        $datas = $this->where('district_id', $data)->get();
        
        return $datas;
    }

    public function upazilaData($data)
    {
        $datas = $this->where('upazila_id', $data)->get();
        
        return $datas;
    }
}

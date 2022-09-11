<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyTofsilForm3Maize extends Model
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

    public function notification()
    {
        return $this->belongsTo(SurveyNotification::class, 'survey_notification_id');
    }

    public function crop()
    {
        return $this->belongsTo(Crop::class, 'crop_id');
    }

    public function unionCrops($data)
    {
        $datas = $this->where('union_id', $data)->get();
        
        return $datas;
    }
    public function upazilaCrops($data)
    {
        $datas = $this->where('upazila_id', $data)->get();
        
        return $datas;
    }

    public function moujaCrops($data)
    {        
        $datas = $this->where('mouza_id', $data)->get();
        return $datas;
    }

    public function districtCrops($data)
    {        
        $datas = $this->where('district_id', $data)->get();
        return $datas;
    }

}

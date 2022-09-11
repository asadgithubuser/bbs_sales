<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class SurveyTofsilForm3 extends Model
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
        return $this->belongsTo(Crop::class, 'crops_id');
    }

    public function farmer()
    {
        return $this->belongsTo(SurveyCompilationCollectForm1::class, 'farmer_id');
    }

    public function unionCrops($data)
    {
        $datas = $this->where('union_id',$data)->get();
        
        return $datas;
    }
    public function upazilaCrops($data)
    {
        $datas = $this->where('upazila_id',$data)->get();
        
        return $datas;
    }

    public function moujaCrops($data)
    {        
        $datas = $this->where('mouza_id',$data)->get();
        return $datas;
    }

    public function moujaCropsUpazila($data)
    {        
        $datas = $this->where('mouza_id',$data)->where('upazila_id',Auth::user()->upazila_id)->get();
        return $datas;
    }

    public function districtCrops($data)
    {        
        $datas = $this->where('district_id',$data)->get();
        return $datas;
    }

    //data for all this union

    public function allDataOfUnion($notification,$union,$column)
    {
        $data = $this->where('survey_notification_id',$notification)->where('union_id',$union)->sum($column);
        return number_format((float)$data, 4, '.', '' );
    }

    //data for all this upazila

    public function allDataOfUpazila($notification,$upazila,$column)
    {
        $data = $this->where('survey_notification_id',$notification)->where('upazila_id',$upazila)->sum($column);
        return number_format((float)$data, 4, '.', '' );
    }

    //data for all this district

    public function allDataOfDistrict($notification,$district,$column)
    {
        $data = $this->where('survey_notification_id',$notification)->where('district_id',$district)->sum($column);
        return number_format((float)$data, 4, '.', '' );
    }
}

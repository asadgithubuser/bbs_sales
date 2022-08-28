<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyTofsilForm7 extends Model
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
        return $this->belongsTo(Mouza::class, 'mouja_id');
    }

    public function notification()
    {
        return $this->belongsTo(SurveyNotification::class, 'survey_notification_id');
    }

    public function farmer()
    {
        return $this->belongsTo(SurveyCompilationCollectForm1::class, 'farmer_id');
    }

    public function processList()
    {
        return $this->belongsTo(SurveyProcessList::class, 'survey_process_list_id');
    }

    public function crop()
    {
        return $this->belongsTo(Crop::class, 'crops_id');
    }
    
    public function landRent()
    {        
        return $this->belongsTo(SurveyTofsilForm7JomirRent::class, 'id','survey_tofsil_form7s_id');
    }
    public function landCultivateCost()
    {        
        return $this->belongsTo(SurveyTofsilForm7JomiChasKora::class, 'id','survey_tofsil_form7s_id');
    }
    
    public function totalKorsonCost($a,$b,$c,$d,$e)
    {
        return ($a+$b+$c+$d+$e);
    }

    public function landSeedsCost()
    {        
        return $this->belongsTo(SurveyTofsilForm7Seed::class, 'id','survey_tofsil_form7s_id');
    }
    
    public function totalSeedCost($a,$b,$c)
    {
        return ($a+$b+$c);
    }
    public function landPesticideCost()
    {        
        return $this->belongsTo(SurveyTofsilForm7PesticideCost::class, 'id','survey_tofsil_form7s_id');
    }

    public function totalPesticideCost($a,$b,$c,$d,$e,$f)
    {
        return ($a+$b+$c+$d+$e+$f);
    }

    public function landFertilizerCost()
    {        
        return $this->belongsTo(SurveyTofsilForm7FertilizerCost::class, 'id','survey_tofsil_form7s_id');
    }

    public function totalFertilizerCost($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k)
    {
        return ($a+$b+$c+$d+$e+$f+$g+$h+$i+$j+$k);
    }
    public function landIrrigationCost()
    {        
        return $this->belongsTo(SurveyTofsilForm7IrrigationProcess::class, 'id','survey_tofsil_form7s_id');
    }

    public function totalIrrigationCost($a,$b,$c)
    {
        return ($a+$b+$c);
    }
    public function landWorkerCost()
    {        
        return $this->belongsTo(SurveyTofsilForm7WorkerCost::class, 'id','survey_tofsil_form7s_id');
    }

    public function totalWorkerCost($a,$b,$c,$d,$e,$f)
    {
        return ($a+$b+$c+$d+$e+$f);
    }
    public function landtransportCost()
    {        
        return $this->belongsTo(SurveyTofsilForm7TransportCost::class, 'id','survey_tofsil_form7s_id');
    }

    public function totaltransportCost($a,$b,$c,$d,$e,$f)
    {
        return ($a+$b+$c+$d+$e+$f);
    }
    
    public function upazilaDatas($id,$notifiaction,$upazila,$column,$table)
    {
        if($table == 'main')
        {
            $total = $this->where('survey_notification_id',$notifiaction)->where('upazila_id',$upazila)->sum($column);
            return $total;
        }
        elseif($table == 'landRent')
        {
            $total = SurveyTofsilForm7JomirRent::where('survey_tofsil_form7s_id',$id)->sum($column);
            return $total;
        }
        elseif($table == 'chasKora')
        {
            $total = SurveyTofsilForm7JomiChasKora::where('survey_tofsil_form7s_id',$id)->sum($column);
            return $total;
        }
        elseif($table == 'seed')
        {
            $total = SurveyTofsilForm7Seed::where('survey_tofsil_form7s_id',$id)->sum($column);
            return $total;
        }
        elseif($table == 'fertilizer')
        {
            $total = SurveyTofsilForm7FertilizerCost::where('survey_tofsil_form7s_id',$id)->sum($column);
            return $total;
        }
        elseif($table == 'landIrrigationCost')
        {
            $total = SurveyTofsilForm7IrrigationProcess::where('survey_tofsil_form7s_id',$id)->sum($column);
            return $total;
        }
        elseif($table == 'landWorkerCost')
        {
            $total = SurveyTofsilForm7WorkerCost::where('survey_tofsil_form7s_id',$id)->sum($column);
            return $total;
        }
        elseif($table == 'landPesticideCost')
        {
            $total = SurveyTofsilForm7PesticideCost::where('survey_tofsil_form7s_id',$id)->sum($column);
            return $total;
        }
        elseif($table == 'landtransportCost')
        {
            $total = SurveyTofsilForm7TransportCost::where('survey_tofsil_form7s_id',$id)->sum($column);
            return $total;
        }
    }

    public function districtDatas($id,$notifiaction,$upazila,$column,$table)
    {
        if($table == 'main')
        {
            $total = $this->where('survey_notification_id',$notifiaction)->where('district_id',$upazila)->sum($column);
            return $total;
        }
        elseif($table == 'landRent')
        {
            $total = SurveyTofsilForm7JomirRent::where('survey_tofsil_form7s_id',$id)->sum($column);
            return $total;
        }
        elseif($table == 'chasKora')
        {
            $total = SurveyTofsilForm7JomiChasKora::where('survey_tofsil_form7s_id',$id)->sum($column);
            return $total;
        }
        elseif($table == 'seed')
        {
            $total = SurveyTofsilForm7Seed::where('survey_tofsil_form7s_id',$id)->sum($column);
            return $total;
        }
        elseif($table == 'fertilizer')
        {
            $total = SurveyTofsilForm7FertilizerCost::where('survey_tofsil_form7s_id',$id)->sum($column);
            return $total;
        }
        elseif($table == 'landIrrigationCost')
        {
            $total = SurveyTofsilForm7IrrigationProcess::where('survey_tofsil_form7s_id',$id)->sum($column);
            return $total;
        }
        elseif($table == 'landWorkerCost')
        {
            $total = SurveyTofsilForm7WorkerCost::where('survey_tofsil_form7s_id',$id)->sum($column);
            return $total;
        }
        elseif($table == 'landPesticideCost')
        {
            $total = SurveyTofsilForm7PesticideCost::where('survey_tofsil_form7s_id',$id)->sum($column);
            return $total;
        }
        elseif($table == 'landtransportCost')
        {
            $total = SurveyTofsilForm7TransportCost::where('survey_tofsil_form7s_id',$id)->sum($column);
            return $total;
        }
    }
}

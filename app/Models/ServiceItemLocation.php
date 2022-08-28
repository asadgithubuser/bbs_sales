<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceItemLocation extends Model
{
    use HasFactory;

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

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function ea()
    {
        return $this->belongsTo(EA::class);
    }

    public function household()
    {
        return $this->belongsTo(HouseHold::class);
    }

    public function population()
    {
        return $this->belongsTo(Population::class);
    }

    public function service_item()
    {
        return $this->belongsTo(ServiceItem::class);
    }
}

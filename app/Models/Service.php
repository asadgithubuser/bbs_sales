<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function user_update()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function serviceItem()
    {
        return $this->hasOneThrough(ServiceItem::class,'id','service_id');
    }

    public function serviceItems()
    {
        return $this->hasMany(ServiceItem::class, 'service_id', 'id');
    }

    public function serviceItemAdditionals()
    {
        return $this->hasMany(ServiceItemAdditional::class, 'service_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo('App\Models\ServiceCartItem','id','service_id');
    }

    public function serviceId($id)
    {
        if($this->service()->where('service_id', $id)->first())
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    public function orderItems()
    {
        return $this->hasMany('App\Models\ServiceOrderItem','order_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\User','customer_id');
    }

    public function soldBy()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

}

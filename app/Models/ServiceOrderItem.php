<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrderItem extends Model
{
    use HasFactory;
    
    public function serviceInventory()
    {
        return $this->belongsTo('App\Models\ServiceInventory','service_inventory_id');
    }

    
}

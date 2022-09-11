<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitionItem extends Model
{
    use HasFactory;

    public function requisition()
    {
        return $this->belongsTo(Requisition::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function serviceItem()
    {
        return $this->belongsTo(ServiceItem::class);
    }

    public function serviceInventory()
    {
        return $this->belongsTo(ServiceInventory::class);
    }
}

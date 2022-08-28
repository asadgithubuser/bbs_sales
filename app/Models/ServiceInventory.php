<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceInventory extends Model
{
    use HasFactory;

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function serviceItem()
    {
        return $this->belongsTo(ServiceItem::class);
    }

    public function ServiceOrderItem()
    {
        return $this->belongsTo(ServiceOrderItem::class, 'id', 'service_inventory_id');
    }

    public function ServiceOrderItems()
    {
        return $this->hasMany(ServiceOrderItem::class, 'service_inventory_id');
    }

    public function requisitionItems()
    {
        return $this->hasMany(RequisitionItem::class, 'service_inventory_id');
    }

    public function salesCenter()
    {
        return $this->belongsTo(SalesCenter::class, 'sales_center_id', 'id');
    }
}

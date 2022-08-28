<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCartItem extends Model
{
    use HasFactory;

    public function service_cart()
    {
        return $this->belongsTo(ServiceCart::class);
    }

    // Relation with service table
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    // Relation with service_items table
    public function serviceItem()
    {
        return $this->belongsTo(ServiceItem::class, 'service_item_id', 'id');
    }
}

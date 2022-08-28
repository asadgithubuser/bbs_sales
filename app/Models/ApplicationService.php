<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationService extends Model
{
    use HasFactory;

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

    public function appServiceItemDownload()
    {
        return $this->belongsTo(ApplicationServiceItemDownload::class, 'application_id', 'application_id');
    }

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id', 'id');
    }

    public function serviceItems()
    {
        return $this->hasMany(ServiceItem::class, 'id', 'service_item_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationServiceItemDownload extends Model
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

    public function itemDownloadDetail()
    {
        return $this->belongsTo(ApplicationServiceItemDownloadDetail::class, 'id', 'application_service_item_download_id');
    }

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id', 'id');
    }
}

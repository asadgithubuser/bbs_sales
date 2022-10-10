<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateSetting extends Model
{
    use HasFactory;


    protected $fillable = ['type', 'service_id', 'service_item_id', 'header', 'footer', 'body', 'status'];

    public function service()
    {
       return $this->belongsTo('App\Models\Service');
    }
}

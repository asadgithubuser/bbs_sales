<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    public function office()
    {
        return $this->belongsTo('App\Models\Office');
    }

    public function level_id()
    {
        return $this->belongsTo(Level::class, 'level', 'id');
    }

    public function offices()
    {
        return $this->hasMany('App\Models\Office','id','office_id');
    }
}

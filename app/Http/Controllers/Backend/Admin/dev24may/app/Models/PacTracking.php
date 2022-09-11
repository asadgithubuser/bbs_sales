<?php

namespace App\Models;

 
use Illuminate\Database\Eloquent\Model;

class PacTracking extends Model
{
  
    protected $fillable = ['domain_name', 'url', 'user_id'];
    public function user()
    {
    return $this->belongsTo(User::class);
    } 

}





 
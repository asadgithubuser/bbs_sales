<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationsForwardMap extends Model
{
    use HasFactory;

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function upazila()
    {
        return $this->belongsTo(Upazila::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function senderRole()
    {
        return $this->belongsTo(Role::class, 'sender_role_id','id');
    }
    
    public function forwardRole()
    {
        return $this->belongsTo(Role::class, 'forward_role_id','id');
    }

}

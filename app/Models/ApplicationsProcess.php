<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationsProcess extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function senderRole()
    {
        return $this->belongsTo(Role::class, 'sender_role_id', 'id');
    }

    public function receiverRole()
    {
        return $this->belongsTo(Role::class, 'receiver_role_id', 'id');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'sender_designation_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(ApplicationsStatus::class, 'status_id', 'id');
    }

    public function application()
    {
        return $this->belongsTo(Application::class,'application_id', 'id');
    }

    public function publicationApplication()
    {
        // return $this->where('') belongsTo(Application::class,'application_id', 'id');
    }
}

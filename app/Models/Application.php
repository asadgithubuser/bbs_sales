<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    // Relation with user table
    public function user()
    {
        return $this->belongsTo(User::class, 'sr_user_id', 'id');
    }

    // Relation with office table
    public function office()
    {
        return $this->belongsTo(Office::class, 'office_id', 'id');
    }

    // Relation with division table
    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }

    // Relation with district table
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    // Relation with district table
    public function upazila()
    {
        return $this->belongsTo(Upazila::class, 'upazila_id', 'id');
    }

    public function union()
    {
        return $this->belongsTo(Union::class, 'union_id', 'id');
    }

    public function mouza()
    {
        return $this->belongsTo(Mouza::class, 'mouza_id', 'id');
    }

    // Relation with application purpose table
    public function applicationPurpose()
    {
        return $this->belongsTo(ApplicationPurpose::class, 'purpose_id', 'id');
    }

    // Relation with receiving mode table
    public function receivingModeSoftcopy()
    {
        return $this->belongsTo(ReceivingMode::class, 'receiving_mode_softcopy', 'id');
    }

    // Relation with receiving mode table
    public function receivingModeHardcopy()
    {
        return $this->belongsTo(ReceivingMode::class, 'receiving_mode_hardcopy', 'id');
    }

    // Relation with roles table
    public function senderRole()
    {
        return $this->belongsTo(Role::class, 'current_sender_role_id', 'id');
    }

    // Relation with roles table
    public function receiverRole()
    {
        return $this->belongsTo(Role::class, 'current_receiver_role_id', 'id');
    }

    // Relation with applications_statuses
    public function applicationStatus()
    {
        return $this->belongsTo(ApplicationsStatus::class, 'current_application_status_id', 'id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id', 'application_id');
    }
    
    public function payments()
    {
        return $this->hasOne(Payment::class, 'application_id', 'id')->latest();
    }

    public function applicationServices()
    {
        return $this->belongsTo(ApplicationService::class, 'id', 'application_id');
    }

    public function allApplicationServices()
    {
        return $this->hasMany(ApplicationService::class, 'application_id', 'id');
    }

    public function applicationServiceItemDownloads()
    {
        return $this->hasMany(ApplicationServiceItemDownload::class, 'application_id', 'id');
    }
    
}

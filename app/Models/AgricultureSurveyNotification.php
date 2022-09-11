<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgricultureSurveyNotification extends Model
{
    use HasFactory;

    public function receiverUser()
    {
        return $this->belongsTo(User::class, 'receiver_user_id', 'id');
    }

    public function senderUser()
    {
        return $this->belongsTo(User::class, 'sender_user_id', 'id');
    }

    public function surveyForm()
    {
        return $this->belongsTo(SurveyForm::class, 'survey_form_id', 'id');
    }
}

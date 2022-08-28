<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationSubmitMail extends Mailable
{
    use Queueable, SerializesModels;
    public $applicationID;
    public $sender_user_email;
    public $sender_user_mobile;
    public $login_route;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($applicationID, $sender_user_email, $sender_user_mobile, $login_route)
    {
        $this->applicationID = $applicationID;
        $this->sender_user_email = $sender_user_email;
        $this->sender_user_mobile = $sender_user_mobile;
        $this->login_route = $login_route;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('backend.mails.applicationSubmit');
    }
}

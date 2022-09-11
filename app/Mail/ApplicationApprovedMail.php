<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationApprovedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $sr_user;
    public $application;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sr_user, $application)
    {
        $this->sr_user = $sr_user;
        $this->application = $application;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('backend.mails.applicationApproved');
    }
}

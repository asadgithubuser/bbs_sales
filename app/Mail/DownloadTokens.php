<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DownloadTokens extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $downloadTokens;
    public $application;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $downloadTokens, $application)
    {
        $this->user = $user;
        $this->downloadTokens = $downloadTokens;
        $this->application = $application;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('backend.mails.downloadTokens');
    }
}

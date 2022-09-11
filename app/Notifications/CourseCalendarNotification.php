<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CourseCalendarNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data, $sender_user_id, $gotoURL, $courseCalendarId)
    {
        $this->data = $data;
        $this->sender_user_id = $sender_user_id;
        $this->gotoURL = $gotoURL;
        $this->courseCalendarId = $courseCalendarId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {        
        return [
            'data' => $this->data,
            'sender_user_id' => $this->sender_user_id,
            'gotoURL' => $this->gotoURL,
            'courseCalendarId' => $this->courseCalendarId,
        ];
    }
}

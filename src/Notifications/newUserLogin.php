<?php
/*
* This notification class sends emails to a user whenever they login.
* Output: time, ip
*/
namespace Tyondo\Sms\Http\Notifications;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Carbon\Carbon;

class newUserLogin extends Notification
{
    use Queueable;
    public $ip;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($ip)
    {
      $this->ip = $ip;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
                    ->subject('New Login Detected')
                    ->line('You have logged into your account at: ' . Carbon::now() . ' from IP: ' . $this->ip)
                    ->line('Thank you for using '. config('app.name') .'!');
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
            //
        ];
    }
}

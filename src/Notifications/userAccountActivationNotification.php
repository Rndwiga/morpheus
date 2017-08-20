<?php
/*
* This notification class sends emails to a user when they register.
* Output: activation code
*/
namespace Tyondo\Sms\Http\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class userAccountActivationNotification extends Notification
{
    use Queueable;
    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
      $link = route('user.activate', $this->token);
    //  $message = sprintf('Activate account %s', $link, $link);

        return (new MailMessage)
                    ->subject('Activate your Account')
                    ->line('Welcome to ' . config('app.name'))
                    //->action('Notification Action', 'https://laravel.com')
                    ->action('Activation Link', $link)
                    ->line('We hope you will have a good experience');
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

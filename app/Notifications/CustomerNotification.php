<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomerNotification extends Notification
{
    use Queueable;
    protected $Name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($Name)
    {
        $this->Name=$Name;
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
        $subject = sprintf('Choose Your Closet-Virtual Clothing Store: Welcome');
        $greeting = sprintf('Dear %s!', $this->Name);
        return (new MailMessage)
                    ->subject($subject)
                    ->greeting($greeting)
                    ->line('We are thrilled to have you on board with us.')
                    ->line('We hope to give you an amazing online shopping experience.')
                    ->line('Thank you for using our Website! We hope you get the best out of it.')
                    ->action('Login', url('http://127.0.0.1:8000/CustomerLogin'));
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

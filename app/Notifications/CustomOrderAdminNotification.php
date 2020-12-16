<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomOrderAdminNotification extends Notification
{
    use Queueable;
    protected $Email;
    protected $customer_id;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($Email,$customer_id)
    {
        $this->Email=$Email;
        $this->customer_id=$customer_id;
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
        $subject = sprintf('New Order of Customer %s',$this->customer_id);
        $greeting = sprintf('Dear Admin');
        $line = sprintf('New order is here for Customer %s with email %s',$this->customer_id,$this->Email);
        return (new MailMessage)
                    ->subject($subject)
                    ->greeting($greeting)
                    ->line($line)
                    ->action('Login here to see order', url('http://127.0.0.1:8000/admin_login'));
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

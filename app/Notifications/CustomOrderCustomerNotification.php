<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomOrderCustomerNotification extends Notification
{
    use Queueable;

    protected $customer_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($customer_id, $customer_name)
    {
        $this->customer_id=$customer_id;
        $this->customer_name = $customer_name;
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
        $subject = sprintf('Custom Order Confirmation');
        $greeting = sprintf('Dear %s',$this->customer_name);
        $line = sprintf('We are delighted to serve you. Keep shopping with us for an astounding experience.');
        return (new MailMessage)
                    ->subject($subject)
                    ->greeting($greeting)
                    ->line($line)
                    ->action('Choose Your Closet', url('http://127.0.0.1:8000'));
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

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
    public function __construct($Email,$customer_id, $customer_name)
    {
        $this->Email=$Email;
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
        $subject = sprintf('New Order Received');
        $greeting = sprintf('Hi');
        $line1 = sprintf('New order received.');
        $line2 = sprintf('Customer Details: ');
        $line3 = sprintf('Customer ID: %s',$this->customer_id);
        $line4 = sprintf('Customer Name: %s',$this->customer_name);
        $line5 = sprintf('Customer Email: %s ',$this->Email);
        return (new MailMessage)
                    ->subject($subject)
                    ->greeting($greeting)
                    ->line($line1)
                    ->line($line2)
                    ->line($line3)
                    ->line($line4)
                    ->line($line5)
                    ->action('Login here to see order details', url('http://127.0.0.1:8000/admin_login'));
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

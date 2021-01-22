<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrdersSellNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($orderid,$customer_name, $totalQty, $discount, $final_total, $Delivery_Address, $date)
    {
        $this->orderid = $orderid;
        $this->customer_name = $customer_name;
        $this->totalQty = $totalQty;
        $this->discount = $discount;
        $this->final_total = $final_total;
        $this->Delivery_Address = $Delivery_Address;
        $this->date = $date;
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
        $subject = sprintf('Order Confirmation: Choose Your Closet');
        $greeting = sprintf('Dear %s!', $this->customer_name);
        $line1 = sprintf('Your order placed on %s has been confirmed.', $this->date);
        $line2 = sprintf('We are delighted to serve you. Keep shopping with us for an astounding experience.');
        $line3 = sprintf('Order Summary: ');
        $line4 = sprintf('Quantity of Products Ordered: %s', $this->totalQty);
        $line5 = sprintf('Discount Received: PKR %s', $this->discount);
        $line6 = sprintf('Total Price: PKR %s', $this->final_total);
        $line7 = sprintf('Delivery Address: %s', $this->Delivery_Address);

        return (new MailMessage)
                    ->subject($subject)
                    ->greeting($greeting)
                    ->line($line1)
                    ->line($line2)
                    ->line($line3)
                    ->line($line4)
                    ->line($line5)
                    ->line($line6)
                    ->line($line7);
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

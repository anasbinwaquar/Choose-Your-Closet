<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SellerNotification extends Notification
{
    use Queueable;
     protected $SellerName;
     protected $Identifier;
     protected $type;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($SellerName,$Identifier)
    {
         $this->SellerName=$SellerName;
         $this->Identifier=$Identifier;

         if($this->Identifier==0)
         {
            $this->type="Seller";
         }
         else
         {
            $this->type="Product";  
         }
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
        // if($this->Identifier=0)
        // {
        $subject = sprintf('Verification Request Sent');
        $greeting = sprintf('Dear %s!', $this->SellerName);
        $line = sprintf('Your %s request of being a part of a Choose Your Closet have been submitted to admin wait for the admin to approve it you will get the confirmation email.', $this->type);
        return (new MailMessage)
                    ->subject($subject)
                    ->greeting($greeting)
                    ->line($line);
        //}
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

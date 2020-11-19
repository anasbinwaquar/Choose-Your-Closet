<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminNotification extends Notification
{
    use Queueable;
     protected $Name;
     protected $type;
     protected $link;
     protected $Identifier;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($Name,$Identifier)
    {
         $this->Name=$Name;
         $this->Identifier=$Identifier;

         if($this->Identifier==0)
         {
            $this->type="Seller";
            $this->link="Seller_Authentication";
         }
         else
         {
            $this->type="Product";
            $this->link="Product_approval";  
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
        $subject = sprintf('New %s to Verify', $this->type);
        $line = sprintf('New %s of %s need to be verified!', $this->type,$this->Name);
        $url =sprintf('http://127.0.0.1:8000/%s',$this->link);
        return (new MailMessage)
                    ->subject($subject)
                    ->line($line)
                    ->action('Verify here', url($url));
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

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AuthenticationNotification extends Notification
{
    use Queueable;
    protected $SellerName;
    protected $Identifier;
    protected $result;
    protected $type;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($SellerName,$Identifier1,$Identifier2)
    {
         $this->SellerName=$SellerName;
         $this->Identifier1=$Identifier1;
         $this->Identifier2=$Identifier2;
         if($this->Identifier1==0)
         {
            $this->type="Sign Up";
             if($this->Identifier2==0)
             {
                $this->result="Approved";
             }
             else
             {
                $this->result="Rejected";
             }

         }
         else
         {
            $this->type="Product";  
            if($this->Identifier2==0)
             {
                $this->result="Approved";
             }
             else
             {
                $this->result="Rejected";
             }
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
        $subject = sprintf('%s Request have been %s', $this->type,$this->result);
        $greeting = sprintf('Dear %s!', $this->SellerName);
        $line = sprintf('Your %s authentication request has been %s after our verification process. In case of queries or problems, please contact us via our support portal.', $this->type,$this->result);
        return (new MailMessage)
                    ->subject($subject)
                    ->greeting($greeting)
                    ->line($line)
                    ->action('Support', url('http://127.0.0.1:8000/ContactUs'));
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

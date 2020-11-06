<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer_infos extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'customer_infos';

    protected $fillable = [
        'First_Name', 'Last_Name','Email','Phone_Number','Username'  ,'Password',
    ];

    protected $hidden = [
        'Password',
    ];
    public function routeNotificationForMail($notification)
    {
        // Return email address only...
        return $this->Email;
        
        // Return name and email address...
    }
    //  public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // } 
}

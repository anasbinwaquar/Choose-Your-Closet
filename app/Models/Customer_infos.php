<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_infos extends Model
{
    use HasFactory;
    protected $table = 'customer_infos';

    protected $fillable = [
        'First_Name', 'Last_Name','Email','Phone_Number','Username'  ,'Password',
    ];

    protected $hidden = [
        'Password',
    ];
    //  public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // } 
}

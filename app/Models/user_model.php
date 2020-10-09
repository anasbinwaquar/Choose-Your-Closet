<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class user_model extends Model
{
    use HasFactory;
    protected $table = 'posts';

      protected $fillable = [
        'username', 'password','email',
    ];

    protected $hidden = [
        'password',
    ];
    //  public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // } 
}

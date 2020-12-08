<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prints extends Model
{
    use HasFactory;

    public $table = 'prints';
    public $fillable = [
        'name',
        'image',
        'price'
    ];
}

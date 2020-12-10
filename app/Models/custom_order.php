<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class custom_order extends Model
{
    use HasFactory;
    protected $table = 'custom_orders';
    protected $guarded = [];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vouchers extends Model
{
     use HasFactory;
    protected $table = 'voucher';
public $timestamps = false;
      protected $guarded = [
    ];
}

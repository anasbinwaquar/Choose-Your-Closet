<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalProduct extends Model
{
    use HasFactory;
    protected $table = 'rental_products';
    protected $fillable = [
    	'product_id',
    	'charges',
        'quantitiy_small',
        'quantitiy_medium',
        'quantitiy_large',
        'quantitiy_extra_large',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalProduct extends Model
{
    use HasFactory;
    protected $table = 'rental_products';
    protected $fillable = [
    	'product_name',
        'seller_id',
        'description',
        'product_image',
        'clothing_type',
        'gender_type',
        'category',
        'approved',
        'charges',
        'available',
        'size'
    ];
}

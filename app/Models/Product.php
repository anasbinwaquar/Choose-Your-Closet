<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
    	'product_name',
    	'price_per_unit',
    	'seller_id',
    	'quantitiy',
    	'description',
    	'product_image',
    	'clothing_type',
    	'gender_type',
    	'category',
    	'approved',
    	'rental',
    ];

}

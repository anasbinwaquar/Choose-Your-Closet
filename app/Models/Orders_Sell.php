<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders_Sell extends Model
{
    use HasFactory;
    protected $table = 'orders_sell';

    protected $fillable = [
        'OrderID','CustomerID', 'ProductID', 'Size', 'Quantity','Delivery_Address','Total'  , 'Date',
    ];

}

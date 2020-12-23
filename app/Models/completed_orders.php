<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class completed_orders extends Model
{
    use HasFactory; 
    protected $table = 'completed_orders';
    protected $guarded = [];
    public $timestamps = false;
    protected $fillable= ['OrderID','CustomerID', 'ProductID', 'Size', 'Quantity','Delivery_Address','Total'  , 'Date',];
}

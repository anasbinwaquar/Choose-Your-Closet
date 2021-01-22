<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class vouchers extends Controller
{
    function check_voucher(Request $req,$product_id)
    {
    	printf($product_id);
    }
}

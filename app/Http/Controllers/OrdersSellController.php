<?php

namespace App\Http\Controllers;
use App\Models\cart;

use Illuminate\Http\Request;

class OrdersSellController extends Controller
{
    public function Checkout(Request $req)
    {
    	// session()->flush();
    	if(session()->has('cart'))
        {
            $oldCart = session()->get('cart');
            // print_r('rafayyy');
        }
        else
        {
        	return redirect('/');
        }
    	$OldCart = session()->get('cart');
        $CurrentCart = new cart($OldCart);
    	return view('Pages.Checkout')->with(array('product'=> $CurrentCart->items))->with('product_cart',$CurrentCart->totalPrice);
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\cart;
use App\Models\Orders_Sell;

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
        $order = Orders_Sell::latest()->first();
        if($order==NULL)
        {
            print_r('Nothing to show');
            
        }    
        DB::insert('insert into orders_sell(OrderID, ProductID, CustomerID, Quantity, Delivery_Address, Total) values (?, ?, ?, ?, ?, ?)', [$product_id, $customer_id, $quant]);
    	return view('Pages.Checkout')->with(array('product'=> $CurrentCart->items))->with('product_cart',$CurrentCart->totalPrice);
    }

}

<?php

namespace App\Http\Controllers;
use App\Models\cart;
use Illuminate\Support\Facades\DB; 
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
        $customer_id = session()->get('customer_id');
        if($order==NULL)
        {
            $order = 1;
            
        }  
        else
        {
            $order++;
        }  
        $products = $CurrentCart->items;
        foreach ($products as $products) 
        {
            DB::insert('insert into orders_sell(OrderID, ProductID, CustomerID, Quantity, Delivery_Address, Total) values (?, ?, ?, ?, ?, ?)', [$order, $products['item']['id'], $customer_id, $products['qty'], 'abcdefgh', $products['price']]);
        }
       
    	return view('Pages.Checkout')->with(array('product'=> $CurrentCart->items))->with('product_cart',$CurrentCart->totalPrice);
    }

    public function ViewCheckout(Request $req)
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

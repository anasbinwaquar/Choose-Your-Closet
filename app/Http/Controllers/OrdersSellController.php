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
        $Delivery_Address=$req->input('Delivery_Address');  
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
        $order =  DB::table('orders_sell')->orderBy('OrderID','DESC')->first();
        $customer_id =session()->get('customer_id');
        if($order==NULL)
        {
            $orderid = 1; 
        }  
        else
        {
            $orderid = $order->OrderID;
            $orderid++;
            //print_r($orderid);
        }  
        $products = $CurrentCart->items;
        //print_r($products);
        foreach ($products as $products) 
        {
            //print_r('rafayyy');
            DB::insert('insert into orders_sell(OrderID, CustomerID, ProductID, Quantity, Delivery_Address, Total) values (?, ?, ?, ?, ?, ?)', [$orderid, $customer_id, $products['item']['id'], $products['qty'], $Delivery_Address, $products['price']]);
        }
       session()->forget('cart');
    	return redirect('/');
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

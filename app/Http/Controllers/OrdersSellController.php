<?php

namespace App\Http\Controllers;
use App\Models\cart;
use Illuminate\Support\Facades\DB; 
use App\Models\Orders_Sell;

use Illuminate\Http\Request;
use Carbon\Carbon;

class OrdersSellController extends Controller
{
    public function Checkout(Request $req)
    {
    	// session()->flush();
        $date = Carbon::now();
        printf($date);
        $Delivery_Address=$req->input('Delivery_Address');  
    	if(session()->has('cart'))
        {
            $oldCart = session()->get('cart');
            
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
            foreach ($products as $products)
            {

             printf($products['siz']);
            
            DB::insert('insert into orders_sell(OrderID, CustomerID, ProductID, Size, Quantity, Delivery_Address, Total, Date) values(?, ?, ?, ?, ?, ?, ?, ?)', [$orderid, $customer_id, $products['item']['id'], $products['siz'], $products['qty'], $Delivery_Address, $products['price'], $date]);
           
            if( $products['siz'] =='S')
            {
            DB::update("products set quantity_small=quantity_small-$products['qty']");
            }
            else if( $products['siz'] =='M')
            {
            DB::update('products set quantity_medium=quantity_medium-$products['qty']') ;
            }   
            else if( $products['siz'] =='L')
            {
            DB::update('products set quantity_large=quantity_large-$products['qty']') ;
            }
            else if( $products['siz'] =='XL')
            {
            DB::update('products set quantity_extra_large=quantity_extra_large-$products['qty']') ;
            }
             }
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

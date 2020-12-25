<?php

namespace App\Http\Controllers;
use App\Models\cart;
use Illuminate\Support\Facades\DB; 
use App\Models\Orders_Sell;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;
use App\Notifications\OrdersSellNotification;

class OrdersSellController extends Controller
{
    public function Checkout(Request $req)
    {
    	// session()->flush();
        $date = Carbon::now();
        // printf($date);
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
        $tempMail = DB::select('select Email from customer_infos where id = ?', [$customer_id]);
        $Email =  $tempMail[0]->Email;
        $customer_fname = DB::select('select first_name from customer_infos where id = ?', [$customer_id]);
        $customer_lname = DB::select('select last_name from customer_infos where id = ?', [$customer_id]);
        $fname = $customer_fname[0]->first_name;
        $lname = $customer_lname[0]->last_name;
        $customer_name = $fname.' '.$lname;
        // $customer_name=$customer_fname[0]->first_name.' '.customer_lname[0]->last_name;
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
        $total_dis=0;
     foreach ($products as $products) 
        {
            foreach ($products as $products)
            {
                $total_dis += $products['sale_dis'] + $products['vouch_dis'];
            }
        } 
        $products = $CurrentCart->items;

        //print_r($products);
        foreach ($products as $products) 
        {
            foreach ($products as $products)
            {

             // printf($products['siz']);
            
            DB::insert('insert into orders_sell(OrderID, CustomerID, ProductID, Size, Quantity, Total) values(?, ?, ?, ?, ?, ?)', [$orderid, $customer_id, $products['item']['id'], $products['siz'], $products['qty'], $products['price']]);

            } 
            if($products['siz']=='S'){
                $prod=Product::where('id',$products['item']['id'])->first();
                $q=$prod->quantity_small-$products['qty'];
                Product::where('id',$products['item']['id'])->update(['quantity_small'=>$q]);
            } 
            else if($products['siz']=='M'){
                $prod=Product::where('id',$products['item']['id'])->first();
                $q=$prod->quantity_medium-$products['qty'];
                Product::where('id',$products['item']['id'])->update(['quantity_medium'=>$q]);
            } 
            else if($products['siz']=='L'){
                $prod=Product::where('id',$products['item']['id'])->first();
                $q=$prod->quantity_large-$products['qty'];
                Product::where('id',$products['item']['id'])->update(['quantity_large'=>$q]);
            } 
            else if($products['siz']=='XL'){
                $prod=Product::where('id',$products['item']['id'])->first();
                $q=$prod->quantity_extra_large-$products['qty'];
                Product::where('id',$products['item']['id'])->update(['quantity_extra_large'=>$q]);
            }
        }
        DB::insert('insert into order_calculation(OrderID, CustomerID, Total_Quantity, Total_Discount, Total_Bill, Delivery_Address, OrderDate) values(?, ?, ?, ?, ?, ?, ?)', [$orderid,$customer_id, $CurrentCart->totalQty, $total_dis, $CurrentCart->final_total, $Delivery_Address,  $date]);
        Notification::route('mail',$Email)->notify(new OrdersSellNotification($orderid,$customer_name, $CurrentCart->totalQty, $total_dis, $CurrentCart->final_total, $Delivery_Address,  $date));
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

        return view('Pages.Checkout')->with(array('product'=> $CurrentCart->items))->with('product_cart',$CurrentCart->totalPrice)->with('final_total',$CurrentCart->final_total)->with('shipping',$CurrentCart->shipping);
    }

}

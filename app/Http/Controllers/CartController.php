<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\vouchers;
use App\Models\RentalProduct;
use App\Models\cart;
use App\Models\discounts;
use Carbon\Carbon;
use App\Models\events;
use App\Models\Rental_history;
use App\Models\RentCart;
use Illuminate\Support\Facades\DB; 


class CartController extends Controller
{

    public function AddToCartRent(Request $req,$product_id)
    {
        if(!session()->has('customer_id'))
            return redirect('CustomerLogin');
            $product=RentalProduct::where('id',$product_id)->get();
            session()->put('RentCart',$product);

            return redirect('/RentCart');
        //     return redirect("/rentproduct/$product_id");
        // return view('Pages.RentCheckout')->with('product',$product);
    }
    public function ViewRentCart(){
        // dd($product);
        if(session()->has('customer_id'))
        {
                $check_nav = 1;
        }
        else
        {
           $check_nav = 0;
        }   
        $product=session()->get('RentCart');
        // dd($product);
        $today=Carbon::today()->toDateString();
        $check=Rental_history::where('current_owner_id',session()->get('customer_id'))->whereDate('End_date','>',$today)->get();
        if($check->isEmpty())
            $check=1;
        else
            $check=0;

        $product=RentalProduct::where('id',$product[0]->id)->get();
        return view('Pages.RentCheckout')->with('product',$product)->with('check',$check)->with('check_nav',$check_nav);
    }

    public function RentCartCheckout(Request $req){
        $today=Carbon::today()->toDateString();
        $start=$req->input('start_date');
        $req->validate([
            'start_date'=>'after_or_equal:today',
            'end_date'=>'after:start_date'
        ]);
        // dd($req);
        $Rental_history=new Rental_history();
        $product=RentalProduct::where('id',$req->input('product_id'))->get()->first();
        // dd($product);
        $Rental_history->current_owner_id=session()->get('customer_id');
        $Rental_history->seller_id=$product->seller_id;
        $Rental_history->product_id=$req->input('product_id');
        $Rental_history->Delivery_Address=$req->input('Delivery_Address');
        $Rental_history->Start_date=$req->input('start_date');
        $Rental_history->End_date=$req->input('end_date');
        $diff = abs(strtotime($req->input('start_date')) - strtotime($req->input('end_date')));
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        $days=intval($days);
        $charges=intval($days) * intval($req->input('charges'));
        $Rental_history->charges=$charges;
        // echo $req->input('security_deposit');
        $Rental_history->extra_charges=$req->input('security_deposit');
        $Rental_history->save();
        RentalProduct::where('id',$req->input('product_id'))->update(['available'=>0]);
        // dd($Rental_history);
        // dd($Rental_history);
        return redirect('/');
    }

     public function AddToCart(Request $req, $product_id)
    {
        $req->validate([
          'size' => 'required',
        ]);
      // session()->flush();
        $Discount = discounts::join('products','discounts.Product_id','=','products.id')->join('events','discounts.Event_id','=','events.EventID')->where('products.approved', 1)->where('products.id',$product_id)->get();
        $size=$req->input('size');
        $quantity=$req->input('quant');
       // print_r($quantity);
        $product = Product::find($product_id);
        $product_cart = Product::where('id', $product_id)->get();
        $oldCart = null;
        if(session()->has('cart'))
        {
            $oldCart = session()->get('cart');
            // print_r('rafayyy');
        }
        $_cart = new cart($oldCart);
        // dd($Discount);
        if($Discount->isEmpty())
            $_cart->add($product, $product->id,$quantity, $size, 0);
        else{
            $_cart->add($product, $product->id,$quantity, $size, $Discount[0]->Discount);
        }
        session()->put('cart',$_cart);
        //return redirec
       // $quantity=$_cart->items[$product_id]['qty'];
        //dd($_cart);
        return redirect('/');
        //return view('Homepage.homepage')->with('product_cart',$_cart->totalQty);
    }
    public function UpdateCart($product_id,$size,Request $req)
    {

        
        $product = Product::find($product_id);
        $quantity=$req->input('update_quantity');
        $code=$req->input('voucher');
        $discount=DB::select("select Discount from voucher where Product_id=? and code=?",[$product_id,$code]);
        $Discount_sale = discounts::join('products','discounts.Product_id','=','products.id')->join('events','discounts.Event_id','=','events.EventID')->where('products.approved', 1)->where('products.id',$product_id)->get();
         $OldCart = session()->get('cart');
        $CurrentCart = new cart($OldCart);
        if($discount==NULL)
        {
            if($Discount_sale->isEmpty())
            $CurrentCart->update_cart($product_id, $quantity, $size,  $product,0,0);
            else
            $CurrentCart->update_cart($product_id, $quantity, $size,  $product,0, $Discount_sale[0]->Discount); 
        }
        else
        {
         $discount=$discount[0]->Discount;
        if($Discount_sale->isEmpty())
            $CurrentCart->update_cart($product_id, $quantity, $size,  $product,$discount,0);
        else
            $CurrentCart->update_cart($product_id, $quantity, $size,  $product, $discount, $Discount_sale[0]->Discount);    
        }
        session()->put('cart',$CurrentCart);
         return redirect('CustomerCart');
    }

      public function DeleteCart($product_id,$size)
    {
        
        $product = Product::find($product_id);
        $OldCart = session()->get('cart');
        $CurrentCart = new cart($OldCart);
        $CurrentCart->delete_cart($product_id, $size,  $product);
        session()->put('cart',$CurrentCart);
      //  return view('Pages.cart')->with(array('product'=> $CurrentCart->items))->with('product_cart',$CurrentCart->totalPrice);
        return redirect('CustomerCart');
    }

    public function ViewCart()
    {
       // session()->flush();
        if(!session()->has('customer_id'))
            return redirect('CustomerLogin');

        $OldCart = session()->get('cart');
        $CurrentCart = new cart($OldCart);

       //dd($CurrentCart->sale_discount);
         return view('Pages.cart')->with(array('product'=> $CurrentCart->items))->with('product_cart',$CurrentCart->totalPrice)->with('final_total',$CurrentCart->final_total)->with('shipping',$CurrentCart->shipping);
    }
}

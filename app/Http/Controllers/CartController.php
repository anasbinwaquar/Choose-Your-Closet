<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\cart;
use Illuminate\Support\Facades\DB; 


class CartController extends Controller
{
    //
    // public function AddToCart($product_id,$quant)
    // {
    	// $customer_id=session('customer_id');  
     //   $product_id=$req->input('id');
       	// $quantity=$req->input('quantity');
        // $check=NULL;
        // $check=DB::select("select customer_infos.id, products.id  from customer_infos, products where customer_id=? and products.id=? ",[customer_id, product_id]);
        // DB::insert('insert into cart(product_id, customer_id, quantity) values (?, ?, ?)', [$product_id, $customer_id, $quant]);
        // DB::insert('insert into cart(product_id, customer_id, quantity) values (?, ?, ?)', [$product_id, $customer_id, $quant]);
        // if($check!=NULL)
        // {
        //     $req->session()->put('data',$req->input());

        //     if($req->session()->has('data'))
        //     {
        //         return redirect('UserProfile');
        //     }
        // }
    // }

     public function AddToCart($product_id)
    {
        session()->flush();
        $product = Product::find($product_id);
        // session()->flush();
        $product = Product::find($product_id);
        $product_cart = Product::where('id', $product_id)->get();
        $oldCart = null;
        if(session()->has('cart'))
        {
            $oldCart = session()->get('cart');
            print_r('rafayyy');
            // print_r('rafayyy');
        }
        $_cart = new cart($oldCart);
        $_cart->add($product, $product->id);
        session()->put('cart',$_cart);
        return redirect('/');
        print_r($_cart->items[$product_id]['qty']);
        // return redirect('/');
        return view('Pages.cart')->with('product', $product_cart);
    }
    public function ViewCart()
    {
        return view('Pages.cart');
    }
}

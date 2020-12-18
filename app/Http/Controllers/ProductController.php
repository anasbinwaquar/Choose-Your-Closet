<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\RentalProduct;
use App\Models\reviews;
use App\Providers\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Intervention\Image\Facades\Image;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SubmitReview(Request $req){
        $req->validate([
            'description' => 'required|max:255',
            'rating' => 'required',
        ]);
        $review = new reviews();
        $review->description=$req->input('description');
        $review->rating=$req->input('rating');
        $review->product_id=$req->input('product_id');
        $review->customer_id=session()->get('customer_id');
        $review->review_date=now();
        $review->save();
        $prod=$req->input('product_id');
        return redirect("/product/$prod");
    }
    public function EditReview(Request $req){
        $req->validate([
            'description' => 'required|max:255',
            'rating' => 'required',
        ]);
        $review =reviews:: where('customer_id',session()->get('customer_id'))->update(['description'=>$req->input('description'),'rating'=>$req->input('rating')]);
        $prod=$req->input('product_id');

        return redirect("/product/$prod");
    }
    public function addtocartrent(Request $request,$id)
    {
        // session()->flush();
        // $product= RentalProduct::where('product_id',$id)->first();
        // $ProductData= Product::where('id',$id)->first();
        // if(session::has('cart')){
        //     $oldCart=session::get('cart');
        // }  
        // else
        //     $oldCart=null;
        // $cart = new Cart($oldCart);
        // $cart->add($product, $product->id,$ProductData);
        // $request->session()->put('cart',$cart);
        dd($request->session()->all());
        // return back();
    }
    public function index()
    {
        //$data = session()->get('logged_in');
        if(session()->has('data'))
         return view('Product.create');
        else
        return redirect()->route('SellerLogin'); 
    }
    public function Rent_view(){

        if(session()->has('data'))
         return view('Product.Add_Rent_Products');
        else
        return redirect()->route('SellerLogin'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approval()
    {
        $product = Product::where('approved', 0)->get();
        $rent_product = RentalProduct::where('approved', 0)->get();
        return view('Product.approval')->with('product',$product)->with('rent_product',$rent_product);
    }
    public function setapproval($product_id)
      { 
        $product = Product::where('id', $product_id)->first();
        $product->approved=1;
        $product->save();
        return redirect('Product_approval');
      }
      

    public function setRentapproval($product_id)
      { 
        $product = RentalProduct::where('id', $product_id)->first();
        $product->approved=1;
        $product->save();
        return redirect('Product_approval');
      }
      public function declineapproval($product_id)
      {
        $product=Product::where('id',$product_id)->delete();
        return redirect('Product_approval');
      }
      public function declineRentapproval($product_id)
      {
        $product=RentalProduct::where('id',$product_id)->delete();
        return redirect('Product_approval');
      }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seller_id=session('seller_id');
       $request->validate([
          'product_image' => 'required|dimensions:min_width=300,min_height=300',
          'product_name' => 'required',
          'price_per_unit' => 'required|integer',
          'description'=> 'required',
          'quantity_small'=> 'integer',
          'quantity_medium' => 'integer',
          'quantity_large' => 'integer',
          'quantity_extra_large' => 'integer',
          'gender_type' => 'required',
          'clothing_type'=> 'required',
          'category' => 'required',
        ]);
        $Prod = new Product();
        $file=$request->file('product_image');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('uploads/sell/',$filename);
        $Prod->product_image = $filename;
        $Prod->product_name = $request->input('product_name');
        $Prod->price_per_unit = $request->input('price_per_unit');
        $Prod->description = $request->input('description');
        $Prod->quantity_small = $request->input('quantity_small');
        $Prod->quantity_medium = $request->input('quantity_medium');
        $Prod->quantity_large = $request->input('quantity_large');
        $Prod->quantity_extra_large = $request->input('quantity_extra_large');
        $Prod->clothing_type = $request->input('clothing_type');
        $Prod->gender_type = $request->input('gender_type');
        $Prod->category = $request->input('category');
        $Prod->seller_id=$seller_id;
        $Prod->save();
        return view('Product.success');
        }
        
        public function store_rent(Request $request)
        {
            $seller_id=session('seller_id');
           $request->validate([
          'product_image' => 'required|dimensions:min_width=300,min_height=300',
          'product_name' => 'required',
          'charges' => 'required|integer',
          'description'=> 'required',
          'size'=> 'required',
          'gender_type' => 'required',
          'clothing_type'=> 'required',
          'category' => 'required',
        ]);

            $Prod = new RentalProduct();
            $file=$request->file('product_image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/sell/',$filename);
            $Prod->product_image = $filename;
            $Prod->product_name = $request->input('product_name');
            $Prod->description = $request->input('description');
            $Prod->clothing_type = $request->input('clothing_type');
            $Prod->gender_type = $request->input('gender_type');
            $Prod->category = $request->input('category');
            $Prod->charges = $request->input('charges');
            $Prod->seller_id=$seller_id;
            $Prod->size=$request->input('size');
            $Prod->available =1;
            $Prod->save();
            return view('Product.success');
            }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = DB::select("select * from products where approved=1");
        return view('Product.list')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}

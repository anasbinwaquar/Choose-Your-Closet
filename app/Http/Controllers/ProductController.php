<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\RentalProduct;
use App\Models\reviews;
use App\Models\Rental_history;
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
    public function DeleteRentalProductsView(){

        if(!session()->has('seller_id'))
            return redirect('SellerLogin');

        $product=RentalProduct::where('seller_id',session()->get('seller_id'))->where('existence',1)->get();
        return view('Seller.DeleteRentalView')->with('product',$product);
    }
    public function DestroyRentalProduct($id){
        if(!session()->has('seller_id'))
            return redirect('SellerLogin');
          $check;
        $check=Rental_history::where('product_id',$id)->where('seller_id',session()->get('seller_id'))->first();
        if($check==NULL){
          RentalProduct::where('id',$id)->where('seller_id',session()->get('seller_id'))->delete();
        }
        else{
          RentalProduct::where('id',$id)->where('seller_id',session()->get('seller_id'))->update(['existence'=>0]);
        }
        return redirect('/DeleteRentalProduct');
    }
    public function index_rent(){
        RentalProduct::where('available',1)->where('existence',0)->delete();
        $data = RentalProduct::where('approved', 1)->where('available',1)->get();
        if(session()->has('data'))
        {
                $check = 1;
        }
        else
        {
           $check = 0;
        }   
        return view('Homepage.rentproduct_display')->with('check', $check)->with('data',$data);      
    }
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
      if(session()->has('admindata')){
        $product = Product::where('approved', 0)->get();
        $rent_product = RentalProduct::where('approved', 0)->get();
        return view('Product.approval')->with('product',$product)->with('rent_product',$rent_product);
      }
      else
        return view('Admin.AdminLogin');
    }
    public function setapproval($product_id)
      {
        if(session()->has('admindata')){
          $product = Product::where('id', $product_id)->first();
          $product->approved=1;
          $product->save();
          return redirect('Product_approval');
        }
        else
          return view('Admin.AdminLogin');
      }
      

    public function setRentapproval($product_id)
      { 

        if(session()->has('admindata')){
          $product = RentalProduct::where('id', $product_id)->first();
          $product->approved=1;
          $product->save();
          return redirect('Product_approval');
        }
        else
          return view('Admin.AdminLogin');

      }
      public function declineapproval($product_id)
      {
        if(session()->has('admindata')){
        $product=Product::where('id',$product_id)->delete();
        return redirect('Product_approval');
        }
        else
          return view('Admin.AdminLogin');

      }
      public function declineRentapproval($product_id)
      {
        if(session()->has('admindata')){
        $product=RentalProduct::where('id',$product_id)->delete();
        return redirect('Product_approval');
        }
        else
          return view('Admin.AdminLogin');      
      }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(!session()->has('seller_id'))
            return redirect('SellerLogin');

        $seller_id=session('seller_id');
       $request->validate([
          'product_image' => 'required|dimensions:min_width=1000,min_height=1000',
          'product_image2' => 'dimensions:min_width=1000,min_height=1000',
          'product_image3' => 'dimensions:min_width=1000,min_height=1000',
          'product_name' => 'required',
          'price_per_unit' => 'required|integer',
          'description'=> 'required',
          'quantity_small'=> 'integer|nullable',
          'quantity_medium' => 'integer|nullable',
          'quantity_large' => 'integer|nullable',
          'quantity_extra_large' => 'integer|nullable',
          'gender_type' => 'required',
          'clothing_type'=> 'required',
          'category' => 'required',
        ]);
       // dd($request);
        $Prod = new Product();
        $file=$request->file('product_image');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('uploads/sell/',$filename);
        $Prod->product_image = $filename;

        $file2=$request->file('product_image2');
        if($file2!=NULL){
        $extension=$file2->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file2->move('uploads/sell/',$filename);
        $Prod->product_image2 = $filename;
        }
        $file3=$request->file('product_image3');
        if($file3!=NULL){
        $extension=$file3->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file3->move('uploads/sell/',$filename);
        $Prod->product_image3 = $filename;
        }

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
        if(session()->has('customer_id'))
        {
                $check = 1;
        }
        else
        {
           $check = 0;
        }   
        return view('Product.success');
        }
        
        public function store_rent(Request $request)
        {

        if(!session()->has('seller_id'))
            return redirect('SellerLogin');

            $seller_id=session('seller_id');
           $request->validate([
          'product_image' => 'required|dimensions:min_width=1000,min_height=1000',
          'product_image2' => 'dimensions:min_width=1000,min_height=1000',
          'product_image3' => 'dimensions:min_width=1000,min_height=1000',
          'product_name' => 'required',
          'charges' => 'required|integer',
          'description'=> 'required',
          'size'=> 'required',
          'gender_type' => 'required',
          'clothing_type'=> 'required',
          'category' => 'required',
          'security_deposit'=>'required|integer'
        ]);

            $Prod = new RentalProduct();
            $file=$request->file('product_image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/sell/',$filename);

            $file2=$request->file('product_image2');
            if($file2!=NULL){
            $extension=$file2->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file2->move('uploads/sell/',$filename);
            $Prod->product_image2 = $filename;
            }
            $file3=$request->file('product_image3');
            if($file3!=NULL){
            $extension=$file3->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file3->move('uploads/sell/',$filename);
            $Prod->product_image3 = $filename;
            }
        
            $Prod->product_image = $filename;
            $Prod->product_name = $request->input('product_name');
            $Prod->description = $request->input('description');
            $Prod->clothing_type = $request->input('clothing_type');
            $Prod->gender_type = $request->input('gender_type');
            $Prod->category = $request->input('category');
            $Prod->charges = $request->input('charges');
            $Prod->seller_id=$seller_id;
            $Prod->security_deposit=$request->input('security_deposit');
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
    public function delete(){

        if(!session()->has('seller_id'))
            return redirect('SellerLogin');

        $id=session()->get('seller_id');
        $product=Product::where('seller_id',$id)->get();
        // dd($product);
        return view('Product.delete')->with('product',$product);
    }
    public function destroy($product_id)
    {

        if(!session()->has('seller_id'))
            return redirect('SellerLogin');

        $product=Product::where('id',$product_id)->where('seller_id',session()->get('seller_id'))->delete();
        return redirect('DeleteProduct');
    }
}

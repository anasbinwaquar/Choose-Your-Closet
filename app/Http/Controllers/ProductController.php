<?php

namespace App\Http\Controllers;

use App\Models\Product;
<<<<<<< Updated upstream
use App\Models\RentalProduct;
use App\Providers\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Intervention\Image\Facades\Image;
use Session;
=======
use config\session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Intervention\Image\Facades\Image;
use App\Notifications\SellerNotification;
use App\Notifications\AdminNotification;
use App\Notifications\AuthenticationNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable; 
>>>>>>> Stashed changes

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addtocartrent(Request $request,$id)
    {
        // session()->flush();
        $product= RentalProduct::where('product_id',$id)->first();
        $ProductData= Product::where('id',$id)->first();
        if(session::has('cart')){
            $oldCart=session::get('cart');
        }
        else
            $oldCart=null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id,$ProductData);
        $request->session()->put('cart',$cart);
        // dd($request->session()->all());
        return back();
    }
    public function index()
    {

        //$data = session()->get('logged_in');
        if(session()->has('data'))
         return view('Product.create');
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
        return view('Product.approval')->with('product',$product);
    }
    public function setapproval($product_id)
      { 
<<<<<<< Updated upstream
        $product = Product::where('id', $product_id)->first();
        $product->approved=1;
        $product->save();
=======
        DB::update("update products SET Approved=1 WHERE id=$product_id");
        $id = DB::select("select seller_id from products where id=$product_id");
        $id=$id[0]->seller_id;
        $data = DB::select("select * from seller_info where id=$id");
        $SellerName=$data[0]->First_Name.' '.$data[0]->Last_Name;
        $Email=$data[0]->Email;
        $Identifier1=1;
        $Identifier2=0;
        Notification::route('mail',$Email)->notify(new AuthenticationNotification($SellerName,$Identifier1, $Identifier2));
>>>>>>> Stashed changes
        return redirect('Product_approval');
      }
      public function declineapproval($product_id)
      {
<<<<<<< Updated upstream
        $product=Product::where('id',$product_id)->delete();
=======
        $id = DB::select("select seller_id from products where id=$product_id");
        $id=$id[0]->seller_id;
        $data = DB::select("select * from seller_info where id=$id");
        $SellerName=$data[0]->First_Name.' '.$data[0]->Last_Name;
        $Email=$data[0]->Email;
        $Identifier1=1;
        $Identifier2=1;
        Notification::route('mail',$Email)->notify(new AuthenticationNotification($SellerName,$Identifier1, $Identifier2));
        DB::delete("delete from products WHERE id=$product_id");
>>>>>>> Stashed changes
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
       
        $Prod = new Product();
        // Not working idk why
        // $request->validate([
        //     'product_name' => 'required',
        // 'price_per_unit' => 'required',
        // 'quantitiy' => 'required',
        // 'description' => 'required',
        // // 'product_image' =>'required|image|mimes:jpeg,png,jpg,gif,svg',
        // 'sizes' => 'required',
        // 'clothing_type' => 'required',
        // 'gender_type' => 'required',
        // 'category' => 'required',
        // 'rental' => 'required',
        // ]);

        // $file=$request->file('product_image');
        // $extension=$file->getClientOriginalExtension();
        // $filename=time().'.'.$extension;
        // $file->move('uploads/sell/',$filename);
        // $Prod->product_image = $filename;

        //Image resizing
        // $image = $request->file('product_image');
        // $input['imagename'] = time().'.'.$image->extension();
     
        // $destinationPath = public_path('/uploads/sell');
        // $img = Image::make($image->path());
        // $img->resize(300, 300, function ($constraint) {
        //     $constraint->aspectRatio();
        // })->save($destinationPath.'/'.$input['imagename']);
   
        // $destinationPath = public_path('/images');
        // $image->move($destinationPath, $input['imagename']);
        // $Prod->product_image=$input['imagename'];

        

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
        $Prod->rental =$request->input('rental');
        $Prod->save();
<<<<<<< Updated upstream
        if($request->input('rental')==1){
            $RentalProd= new RentalProduct();
            $RentalProd->product_id= $Prod->id;
            $RentalProd->charges = $request->input('charges');
            $RentalProd->quantity_small = $request->input('rquantity_small');
            $RentalProd->quantity_medium = $request->input('rquantity_medium');
            $RentalProd->quantity_large = $request->input('rquantity_large');
            $RentalProd->quantity_extra_large = $request->input('rquantity_extra_large');
            $RentalProd->save();
        }


=======
        $data = DB::select("select * from seller_info where id=$seller_id");
        $Name=$data[0]->Username;
        $SellerName=$data[0]->First_Name.' '.$data[0]->Last_Name;
        $Email=$data[0]->Email;
        $Identifier=1;
        Notification::route('mail',"abdurrafay360@gmail.com")->notify(new AdminNotification($Name,$Identifier));
        Notification::route('mail',$Email)->notify(new SellerNotification($SellerName,$Identifier));
>>>>>>> Stashed changes
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

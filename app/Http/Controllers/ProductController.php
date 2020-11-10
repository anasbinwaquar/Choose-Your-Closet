<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        //$data = session()->get('logged_in');
=======
>>>>>>> 3cb2fff9f5d9ae8f91fef27cdc77958a50b711b8
        if(session()->has('data'))
         return view('Product.create');
        else
            abort(404); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approval()
    {
        $product = DB::select("select * from products where Approved=0");
        return view('Product.approval')->with('product',$product);
    }
    public function setapproval($product_id)
      { 
        DB::update("update products SET Approved=1 WHERE id=$product_id");
        return redirect('Product_approval');
      }
      public function declineapproval($product_id)
      {
        DB::delete("delete from products WHERE id=$product_id");
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

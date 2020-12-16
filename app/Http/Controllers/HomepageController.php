<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\RentalProduct;
use App\Models\user_model;
use Illuminate\Support\Facades\DB; 
use Intervention\Image\Facades\Image;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('data'))
        {
                $check = 1;
        }
        else
        {
           $check = 0;
        }   
        $data = Product::where('approved', 1)->get();
        return view('Homepage.homepage')->with('data',$data)->with('check', $check);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ShowProduct($product_id)
    {
        $product = Product::where('id', $product_id)->get();
        // $RentalProduct= RentalProduct::where('product_id', $product_id)->first();
        // $SellerData= user_model::where('id',$product->seller_id)->first();
        return view('Homepage.product_display')->with('product',$product);
        // ->with('RentalProduct',$RentalProduct)->with('SellerData',$SellerData);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

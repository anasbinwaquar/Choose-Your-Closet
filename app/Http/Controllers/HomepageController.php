<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\RentalProduct;
use App\Models\user_model;
use App\Models\Customer_infos;
use App\Models\reviews;
use Illuminate\Support\Facades\DB; 
use Intervention\Image\Facades\Image;

use Carbon\Carbon;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(session()->has('customer_id'))
        {
                $check = 1;
        }
        else
        {
           $check = 0;
        }   
        $data = Product::where('approved', 1)->get();
        // printf("Now: %s", Carbon::now());
        return view('Homepage.homepage')->with('data',$data)->with('check', $check);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ShowProduct($product_id)
    {
        $check=0;
        $product = Product::where('id', $product_id)->get();
        if(session()->has('customer_id')){
            $check= reviews::where('customer_id',session()->get('customer_id'))->where('product_id',$product_id)->first();
            if(is_null($check))
                $check=0;
            else
                $check=1;
        }        
        $reviews= DB::table('reviews')->where('product_id',$product_id)->join('customer_infos', 'reviews.customer_id', '=', 'customer_infos.id')->get();
        if($product->isEmpty())
            return view('Homepage.product_display')->with('product',$product)->with('check',$check);
        // $RentalProduct= RentalProduct::where('product_id', $product_id)->first();
        // $SellerData= user_model::where('id',$product->seller_id)->first();
        else
            return view('Homepage.product_display')->with('product',$product)->with('reviews',$reviews)->with('check',$check);
        // ->with('RentalProduct',$RentalProduct)->with('SellerData',$SellerData);
    }
    public function ShowRentProduct($product_id)
    {
        $product = RentalProduct::where('id', $product_id)->get()->first();
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

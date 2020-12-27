<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\RentalProduct;
use App\Models\user_model;
use App\Models\Customer_infos;
use App\Models\reviews;
use App\Models\discounts;
use App\Models\events;
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
            $check_nav = 1;
        }
        else
        {
            $check_nav = 0;
        }   
        $data = Product::where('approved', 1)->get();
        // printf("Now: %s", Carbon::now());
        return view('Homepage.homepage')->with('data',$data)->with('check_nav', $check_nav);
    }
    public function sale_index()
    {
        
        if(session()->has('customer_id'))
        {
                $check_nav = 1;
        }
        else
        {
           $check_nav = 0;
        }   
        $today_date =  Carbon::now();
        $event_ID = events::where('EndingTime',$today_date)->get('EventID');
        foreach(  $event_ID as   $event_ID)
        {
            discounts::where('Event_id',$event_ID->EventID)->delete();
        }
       
        $data = discounts::join('products','discounts.Product_id','=','products.id')->join('events','discounts.Event_id','=','events.EventID')->where('products.approved', 1)->get();
        // $discount_product=$discount_product->get('Product_id');
       // printf($discount_product[0]->Discount);
        // printf("Now: %s", Carbon::now());
        return view('Homepage.homepage_product')->with('data',$data)->with('check_nav', $check_nav);
    }

    public function bride_index()
    {
        
         if(session()->has('customer_id'))
        {
                $check_nav = 1;
        }
        else
        {
           $check_nav = 0;
        }   
        $data = Product::where('approved', 1)->where('clothing_type','Bridal Wear')->get();
        // printf("Now: %s", Carbon::now());
        return view('Homepage.homepage_product')->with('data',$data)->with('check_nav', $check_nav);
    }


    public function groom_index()
    {
        
         if(session()->has('customer_id'))
        {
                $check_nav = 1;
        }
        else
        {
           $check_nav = 0;
        }   
        $data = Product::where('approved', 1)->where('clothing_type','Groom Wear')->get();
        // printf("Now: %s", Carbon::now());
        return view('Homepage.homepage_product')->with('data',$data)->with('check_nav', $check_nav);
    }

      public function kids_index()
    {
        
         if(session()->has('customer_id'))
        {
                $check_nav = 1;
        }
        else
        {
           $check_nav = 0;
        }   
        $data = Product::where('approved', 1)->where('clothing_type','Kids Wear')->get();
        // printf("Now: %s", Carbon::now());
        return view('Homepage.homepage_product')->with('data',$data)->with('check_nav', $check_nav);
    }

         public function women_home_pret()
    {
        
         if(session()->has('customer_id'))
        {
                $check_nav = 1;
        }
        else
        {
           $check_nav = 0;
        }   
        $data = Product::where('approved', 1)->where('gender_type','Female')->where('clothing_type','pret')->get();
        // printf("Now: %s", Carbon::now());
        return view('Homepage.homepage_product')->with('data',$data)->with('check_nav', $check_nav);
    }


    public function women_home_3_piece_suit()
    {
        
         if(session()->has('customer_id'))
        {
                $check = 1;
        }
        else
        {
           $check = 0;
        }   
        $data = Product::where('approved', 1)->where('gender_type','Female')->where('clothing_type','3 Piece Suit')->get();
        // printf("Now: %s", Carbon::now());
        return view('Homepage.homepage_product')->with('data',$data)->with('check_nav', $check_nav);
    }

     public function women_home_party_wear()
    {
        
         if(session()->has('customer_id'))
        {
                $check = 1;
        }
        else
        {
           $check = 0;
        }   
        $data = Product::where('approved', 1)->where('gender_type','Female')->where('clothing_type','Party Wear')->get();
        // printf("Now: %s", Carbon::now());
        return view('Homepage.homepage_product')->with('data',$data)->with('check_nav', $check_nav);
    }


     public function women_home_winter_wear()
    {
        
         if(session()->has('customer_id'))
        {
                $check_nav = 1;
        }
        else
        {
           $check_nav = 0;
        }   
        $data = Product::where('approved', 1)->where('gender_type','Female')->where('clothing_type','Winter Wear')->get();
        // printf("Now: %s", Carbon::now());
        return view('Homepage.homepage_product')->with('data',$data)->with('check_nav', $check_nav);
    }

     public function women_home_summer_wear()
    {
        
         if(session()->has('customer_id'))
        {
                $check_nav = 1;
        }
        else
        {
           $check_nav = 0;
        }   
        $data = Product::where('approved', 1)->where('gender_type','Female')->where('clothing_type','Summer Wear')->get();
        // printf("Now: %s", Carbon::now());
        return view('Homepage.homepage_product')->with('data',$data)->with('check_nav', $check_nav);
    }


     public function women_home_pants_jeans()
    {
        
         if(session()->has('customer_id'))
        {
                $check_nav = 1;
        }
        else
        {
           $check_nav = 0;
        }   
        $data = Product::where('approved', 1)->where('gender_type','Female')->where('clothing_type','Pant')->get();
        // printf("Now: %s", Carbon::now());
        return view('Homepage.homepage_product')->with('data',$data)->with('check_nav', $check_nav);
    }


     public function men_home_shirts()
    {
        
         if(session()->has('customer_id'))
        {
                $check_nav = 1;
        }
        else
        {
           $check_nav = 0;
        }   
        $data = Product::where('approved', 1)->where('gender_type','Male')->where('clothing_type','Shirt')->get();
        // printf("Now: %s", Carbon::now());
        return view('Homepage.homepage_product')->with('data',$data)->with('check_nav', $check_nav);
    }

      public function men_home_winter_wear()
    {
        
         if(session()->has('customer_id'))
        {
                $check_nav = 1;
        }
        else
        {
           $check_nav = 0;
        }   
        $data = Product::where('approved', 1)->where('gender_type','Male')->where('clothing_type','Winter Wear')->get();
        // printf("Now: %s", Carbon::now());
        return view('Homepage.homepage_product')->with('data',$data)->with('check_nav', $check_nav);
    }

          public function shoes()
    {
        
         if(session()->has('customer_id'))
        {
                $check_nav = 1;
        }
        else
        {
           $check_nav = 0;
        }   
        $data = Product::where('approved', 1)->where('clothing_type','shoes')->get();
        // printf("Now: %s", Carbon::now());
        return view('Homepage.homepage_product')->with('data',$data)->with('check_nav', $check_nav);
    }



     public function men_home_tshirts()
    {
        
         if(session()->has('customer_id'))
        {
                $check_nav = 1;
        }
        else
        {
           $check_nav = 0;
        }   
        $data = Product::where('approved', 1)->where('gender_type','Male')->where('clothing_type','T-Shirt')->get();
        // printf("Now: %s", Carbon::now());
        return view('Homepage.homepage_product')->with('data',$data)->with('check_nav', $check_nav);
    }

     public function men_home_3_piece_suit()
    {
        
         if(session()->has('customer_id'))
        {
                $check_nav = 1;
        }
        else
        {
           $check_nav = 0;
        }   
        $data = Product::where('approved', 1)->where('gender_type','Male')->where('clothing_type','3 Piece Suit')->get();
        // printf("Now: %s", Carbon::now());
        return view('Homepage.homepage_product')->with('data',$data)->with('check_nav', $check_nav);
    }


     public function men_home_kurta_shalwar()
    {
        
         if(session()->has('customer_id'))
        {
                $check_nav = 1;
        }
        else
        {
           $check_nav = 0;
        }   
        $data = Product::where('approved', 1)->where('gender_type','Male')->where('clothing_type','Kurta Shalwar')->get();
        // printf("Now: %s", Carbon::now());
        return view('Homepage.homepage_product')->with('data',$data)->with('check_nav', $check_nav);
    }



     public function pant_jeans()
    {
        
         if(session()->has('customer_id'))
        {
                $check_nav = 1;
        }
        else
        {
           $check_nav = 0;
        }   
        $data = Product::where('approved', 1)->where('gender_type','Male')->where('clothing_type','Pant & Jeans')->get();
        // printf("Now: %s", Carbon::now());
        return view('Homepage.homepage_product')->with('data',$data)->with('check_nav', $check_nav);
    }



    public function SaleShowProduct($product_id)
    {
        $check=0;
        $product =discounts::join('products','discounts.Product_id','=','products.id')->join('events','discounts.Event_id','=','events.EventID')->where('products.approved', 1)->where('products.id',$product_id)->get();
      //  dd( $product);
        if(session()->has('customer_id'))
        {
            $check= reviews::where('customer_id',session()->get('customer_id'))->where('product_id',$product_id)->first();
            if(is_null($check))
                $check=0;
            else
                $check=1;
        }

        if(session()->has('customer_id'))
        {
                $check_nav = 1;
        }
        else
        {
           $check_nav = 0;
        }                
        $reviews= DB::table('reviews')->where('product_id',$product_id)->join('customer_infos', 'reviews.customer_id', '=', 'customer_infos.id')->get();
        if($product->isEmpty())
            return view('Homepage.product_display')->with('product',$product)->with('check',$check)->with('check_nav',$check_nav);
        // $RentalProduct= RentalProduct::where('product_id', $product_id)->first();
        // $SellerData= user_model::where('id',$product->seller_id)->first();
        else
            return view('Homepage.product_display')->with('product',$product)->with('reviews',$reviews)->with('check',$check)->with('check_nav',$check_nav);
        // ->with('RentalProduct',$RentalProduct)->with('SellerData',$SellerData);
    }
        public function index_home()
    {
        
        if(session()->has('customer_id'))
        {
            $check_nav = 1;
        }
        else
        {
           $check_nav = 0;
        }   
        return view('Homepage.home')->with('check_nav', $check_nav);
    }

       public function index_women()
    {
        
        if(session()->has('customer_id'))
        {
                $check = 1;
        }
        else
        {
           $check = 0;
        }   
        return view('Homepage.women_home')->with('check', $check);
    }


       public function index_men()
    {
        
        if(session()->has('customer_id'))
        {
                $check = 1;
        }
        else
        {
           $check = 0;
        }   
        return view('Homepage.men_home')->with('check', $check);
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
         if(session()->has('customer_id'))
        {
                $check_nav = 1;
        }
        else
        {
           $check_nav = 0;
        }        
        $reviews= DB::table('reviews')->where('product_id',$product_id)->join('customer_infos', 'reviews.customer_id', '=', 'customer_infos.id')->get();
        if($product->isEmpty())
            return view('Homepage.product_display')->with('product',$product)->with('check',$check)->with('check_nav',$check_nav);
        // $RentalProduct= RentalProduct::where('product_id', $product_id)->first();
        // $SellerData= user_model::where('id',$product->seller_id)->first();
        else
            return view('Homepage.product_display')->with('product',$product)->with('reviews',$reviews)->with('check',$check)->with('check_nav',$check_nav);
        // ->with('RentalProduct',$RentalProduct)->with('SellerData',$SellerData);
    }
    public function ShowRentProduct($product_id)
    {
        if(session()->has('customer_id'))
        {
                $check_nav = 1;
        }
        else
        {
           $check_nav = 0;
        }   
        $product = RentalProduct::where('id', $product_id)->get();
        return view('Homepage.rent_display')->with('product',$product)->with('check_nav', $check_nav);
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

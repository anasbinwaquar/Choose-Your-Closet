<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\user_model;
use App\Models\completed_orders;
use Carbon\Carbon;
use App\Models\Orders_sell;
use App\Models\Product;
use App\Models\discounts;
use App\Models\events;
use Illuminate\Validation\Rule;
use App\Models\vouchers;
use App\Models\order_calculation_model;
use Illuminate\Support\Facades\DB;
use App\Notifications\SellerNotification;
use App\Notifications\AdminNotification;
use App\Notifications\AuthenticationNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable; 

class SellerController extends Controller
{
    public function ViewRentOrder(){
        
    }
    public function DestroyEvent($id){
        events::where('EventID',$id)->delete();
        discounts::where('Event_id',$id)->delete();
        return redirect('/DeleteEvent');
    }
    public function DeleteEvent(){
        $events=events::join('discounts','discounts.Event_id','=','events.EventID')->join('products','products.id','=','discounts.Product_id')->where('products.seller_id',session()->get('seller_id'))->get();

        $products=events::join('discounts','discounts.Event_id','=','events.EventID')->join('products','products.id','=','discounts.Product_id')->where('products.seller_id',session()->get('seller_id'))->get();
        // foreach ($events as $event) {
        //     echo $event;
        // }
        $events=$events->unique('EventID');
        return view('Seller.DeleteEvent')->with('events',$events)->with('products',$products);
    }   
    public function AddEvent(){
        if(!session()->has('seller_id'))
            return redirect('SellerLogin');

        $product=Product::whereNotIn('id', function($q){
            $q->select('Product_id')->from('discounts');
        })->where('seller_id',session()->get('seller_id'))->get();
        return view('Seller.AddEvent')->with('products',$product)->with('check',0);
    }
    public function StoreEvent(Request $req){
        $date1 =Carbon::parse($req->input('end_date'));
        $today = Carbon::now();
        $req->validate([
            'event_name'=>'required',
            'end_date'=>'required|after:today'
        ]);
        if(!session()->has('seller_id'))
            return redirect('SellerLogin');

        $events=new events();
        $events->EventName=$req->input('event_name');
        $events->EndingTime=$req->input('end_date');
        $events->save();
        $discounts=new discounts();
        $products=$req->input('product_id');
        foreach ($products as $products) {
            $discounts->Product_id=$products;
            $discounts->Event_id=$events->id;
            $discounts->discount=$req->input('discount');
            $discounts->save();
            $discounts=new discounts();
        }
        $product=Product::whereNotIn('id', function($q){
            $q->select('Product_id')->from('discounts');
        })->where('seller_id',session()->get('seller_id'))->get();
        return view('Seller.AddEvent')->with('products',$product)->with('check',1);

    }
    public function UpdateQuantity(){
        if(!session()->has('seller_id'))
            return redirect('SellerLogin');

        $products=Product::where('seller_id',session()->get('seller_id'))->get();
        // dd(session()->all());
        return view('Seller.UpdateQuantity')->with('products',$products);
    }
    public function UpdateQuantityForm($id){
        if(!session()->has('seller_id'))
            return redirect('SellerLogin');

        $product=Product::where('id',$id)->where('seller_id',session()->get('seller_id'))->first();
        // dd(session()->all());
        return view('Seller.UpdateQuantityForm')->with('product',$product);
    }
    public function StoreQuantity(Request $req){
        $req->validate([
            'quantity_small'=>'integer|nullable',
            'quantity_medium'=>'integer|nullable',
            'quantity_large'=>'integer|nullable',
            'quantity_extra_large'=>'integer|nullable',
        ]);
        if(!session()->has('seller_id'))
            return redirect('SellerLogin');

        if($req->input('quantity_medium')!=null){
            Product::where('id',$req->input('product_id'))->where('seller_id',session()->get('seller_id'))->update(['quantity_medium'=>$req->input('quantity_medium')]);
        }
        if($req->input('quantity_small')!=null){
            Product::where('id',$req->input('product_id'))->where('seller_id',session()->get('seller_id'))->update(['quantity_small'=>$req->input('quantity_small')]);
        }
        if($req->input('quantity_large')!=null){
            Product::where('id',$req->input('product_id'))->where('seller_id',session()->get('seller_id'))->update(['quantity_large'=>$req->input('quantity_large')]);
        }
        if($req->input('quantity_extra_large')!=null){
            Product::where('id',$req->input('product_id'))->where('seller_id',session()->get('seller_id'))->update(['quantity_extra_large'=>$req->input('quantity_extra_large')]);
        }
        return redirect('/UpdateQuantity');
    }
    public function SellerSignUpView()
    {
        // if(!session()->has('data'))
        // {
        //      return redirect('admin_login');
        // }
       return view('Seller.SellerSignUp');
    }
    public function DeleteVoucher($id){
        // echo "$id";
        vouchers::where('Voucher_id',$id)->delete();
        return redirect ('/DeleteVoucher');
    }
    public function DeleteView(){
        if(!session()->has('seller_id'))
            return redirect('SellerLogin');
        $vouchers=vouchers::join('products','products.id','=','voucher.Product_id')->where('seller_id',session()->get('seller_id'))->get();
        // dd($product);
        return view('Seller.DeleteVoucher_view')->with('vouchers',$vouchers);
    }

    public function VoucherView(){
        if(!session()->has('seller_id'))
            return redirect('SellerLogin');


        $product=Product::where('seller_id',session()->get('seller_id'))->get();
        return view('Seller.Voucher_view')->with('product',$product);
    }
    public function StoreVoucher(Request $req){
        $req->validate([
            'code' => 'required|max:255',
            'discount'=>'required|integer',
            'product_id'=>'required',
        ]);
        $voucher=new vouchers();
        $voucher->code=$req->input('code');
        $voucher->Discount=$req->input('discount');
        $voucher->Product_id=$req->input('product_id');
        $voucher->save();

        return redirect('/AddVoucher');
    }
    public function view_products(){

        if(!session()->has('seller_id'))
            return redirect('SellerLogin');
        
        $product=Product::where('seller_id',session()->get('seller_id'))->get();
        // dd($product);
        return view('Seller.view_products')->with('product',$product);
    }

    public function CompletedOrders(){

        if(!session()->has('seller_id'))
            return redirect('SellerLogin');

        $data = completed_orders::join('products','completed_orders.ProductID','=','products.id')->join('customer_infos','completed_orders.CustomerID','=','customer_infos.id')->where('products.seller_id',session()->get('seller_id'))->get();
        $data2=completed_orders::join('products','completed_orders.ProductID','=','products.id')->where('products.seller_id',session()->get('seller_id'))->get();
        $data=$data->unique('OrderID');
        
        return view('Seller.CompletedOrders')->with('data',$data)->with('data2',$data2);
    }
    public function EndOrder($orderid){

        if(!session()->has('seller_id'))
            return redirect('SellerLogin');

        $datas = Orders_sell::join('order_calculation','orders_sell.OrderID','=','order_calculation.OrderID')->where('orders_sell.OrderID',$orderid)->get();
        $record=[];
        foreach ($datas as $data) {
            if(!empty($data)){
            $date = Carbon::now();
                $record[]=[
                'OrderID'=>$data->OrderID,
                'Date'=>   $date,
                'CustomerID'=>$data->CustomerID,
                'ProductID'=>$data->ProductID,
                'Size'=>$data->Size,
                'Quantity'=>$data->Quantity,
                'Delivery_Address'=>$data->Delivery_Address,
                'Total'=>$data->Total,
                'Total_Discount'=>$data->Total_Discount,
            ];
            completed_orders::insert($record);
            $record=null;
            }
        }
            Orders_sell::where('OrderID',$orderid)->delete();
            order_calculation_model::where('OrderID',$orderid)->delete();
        return redirect('ViewOrders'); 

    }
    public function ViewOrders(){
        // dd(session()->all());
        if(!session()->has('seller_id'))
            return redirect('SellerLogin');
        $data = Orders_sell::join('order_calculation','orders_sell.OrderID','=','order_calculation.OrderID')->join('products','products.id','=','orders_sell.ProductID')->join('seller_info','seller_info.id','=','products.seller_id')->where('products.seller_id',session()->get('seller_id'))->get();
        $data2=Orders_sell::join('products','orders_sell.ProductID','=','products.id')->where('products.seller_id',session()->get('seller_id'))->get();;
        $data=$data->unique('OrderID');
        // dd($data);
        // $current=0;
        // $previous=0;
        // $current=$data[0]->OrderID;
        // foreach ($data as $data) {
        //     if($current== $data->OrderID)
        //     echo $data->OrderID;
        // }
        // dd($data);
        return view('Seller.ViewOrders')->with('data',$data)->with('data2',$data2);
    }
    public function OrderDetails($orderid){
        if(!session()->has('seller_id'))
            return redirect('SellerLogin');
        $data = Orders_sell::join('products','orders_sell.ProductID','=','products.id')->where('OrderID',$orderid)->where('products.seller_id',session()->get('seller_id'))->get();
        // dd($data);
        return view('Seller.OrderDetails')->with('data',$data);
    }

      public function Seller_Authentication()
      {
        $authentication = DB::select("select * from seller_info where Approval=0");
        return view('Admin.Authentication_Portal')->with('authentication',$authentication);
      }

      public function setapproval($id)
      { 
        DB::update("update seller_info SET Approval=1 WHERE id=$id");
        $data = DB::select("select * from seller_info where id=$id");
        $SellerName=$data[0]->First_Name.' '.$data[0]->Last_Name;
        $Email=$data[0]->Email;
        $Identifier1=0;
        $Identifier2=0;
        Notification::route('mail',$Email)->notify(new AuthenticationNotification($SellerName,$Identifier1, $Identifier2));
        return redirect('Seller_Authentication');
      }

       public function declineapproval($id)
      {
        DB::delete("delete from seller_info WHERE id=$id");
        $data = DB::select("select * from seller_info where id=$id");
        $SellerName=$data[0]->First_Name.' '.$data[0]->Last_Name;
        $Email=$data[0]->Email;
        $Identifier1=0;
        $Identifier2=1;
        Notification::route('mail',$Email)->notify(new AuthenticationNotification($SellerName,$Identifier1, $Identifier2));
        return redirect('Seller_Authentication');
      }

    public function SellerLoginView()
     {
        return view('Seller.Seller_Login');

     }


    public function SellerLogin(Request $req)
     {
        $rules= [
            'Username' => 'exists:seller_info',
            'Password'=>'required',
        ];
        $rules2= [
            'Username' => [ Rule::exists('seller_info', 'Username')->where(function ($query){
                $query->where('Approval', 1);
            })],
            'Password'=>'required',
        ];
        $messages=[
            'Username.exists'=>'The username is not registered.',
        ];
        $messages2=[
            'Username.exists'=>'The username is not yet approved by the system.'
        ];
        $this->validate($req, $rules, $messages);
        $this->validate($req, $rules2, $messages2);

        $username=$req->input('Username');  
        $password=$req->input('Password');
        $check=NULL;
        $check=DB::select("select * from seller_info where Username=? and Password=? and Approval=1",[$username,$password]);
        if($check!=NULL)
        {
            session()->flush();
            $get_id=DB::select("select id from seller_info where Username=? and Password=? and Approval=1",[$username,$password]);
            $seller_id=$get_id[0]->id;
            $req->session()->put('data',$req->input());
            // $req->session()->put('logged_in',1);
            $req->session()->put('seller_id',$seller_id);
            if($req->session()->has('data'))
            {
                return redirect('SellerProfile');
            }
        }
        else
        {
            print_r("NOT APPROVED BY ADMIN YET");
        }
     }


    // public function default()
    // {
    // 	 return view('welcome');
    // }


     public function SellerSignUp(Request $req)
    {
        $req->validate([
            'First_Name' => 'required|max:255',
            'Last_Name' => 'required|max:255',
            'Email' => 'required',
            'Phone_Number' => 'required|regex:/(0)[0-9]{10}/',
            'Website_Name' => 'nullable',
            'Username' => 'required|unique:seller_info|min:8',
            'Password' => 'required|min:8',
            'CNIC' => 'required|regex:/(42201)-[0-9]{7}-[0-9]{1}/',
        ]);
        user_model::create($req->all());
        $Name=$req->Username;
        $SellerName=$req->First_Name.' '.$req->Last_Name;
        $Identifier=0;
        Notification::route('mail','chooseyourclosetnoreply@gmail.com')->notify(new AdminNotification($Name,$Identifier));
        Notification::route('mail',$req->Email)->notify(new SellerNotification($SellerName,$Identifier));
        return redirect("SellerLogin");
       // \Mail::to($req->input('email'))->send(new Registration_success($req->username,$req->password));
    }
    public function SellerLogout()
    {
        session()->flush();
        return redirect()->route('SellerLogin');
    }

    public function SellerProfileView()
    {
        return view('Seller.Seller_Portal');
    }
    
    //  public function loging(Request $req)
    // {
    //     //$this->validate($req);
    //     $username=$req->input('username');  
    //     $password=$req->input('password');
    //     $check=NULL;
    //     $check=DB::select("select * from posts where username=? and password=?",[$username,$password]);
    //     if($check!=NULL)
    //     {
    //         $req->session()->put('data',$req->input());

    //         if($req->session()->has('data'))
    //         {
    //             return redirect('profile');
    //         }
    //     }

    //     // $user_model = new user_model;
    //     //  $user_model->username=$req->user;
    //     // $user_model->password=$req->password;
    //     // $user_model->save();
    // }
}

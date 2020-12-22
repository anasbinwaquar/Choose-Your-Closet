<?php
namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\Customer_infos;
use App\Models\completed_orders;
use App\Models\Orders_sell;
use App\Models\Product;
use Illuminate\Support\Facades\DB; 
use App\Notifications\CustomerNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;
class CustomerInfoController extends Controller
{

      public function CustomerSignUpView()
    {
         return view('Customer.CustomerSignUp');
    }

    public function CustomerLoginView()
    {
         if(session()->has('customize'))
         return view('Customer.Login_Customer_Portal')->with('customize',0);
        else
         return view('Customer.Login_Customer_Portal')->with('customize',1);

    }


    public function CustomerSignUp(Request $req)
    {
        $req->validate([
            'First_Name' => 'required|max:255',
            'Last_Name' => 'required|max:255',
            'Email' => 'required',
            'Phone_Number' => 'required|regex:/(0)[0-9]{10}/',
            'Username' => 'required|unique:customer_infos|min:8',
            'Password' => 'required|min:8',
        ]);
        //$this->validate($req);
        // print_r($req->input());
        //$user_model =new user_model;
        Customer_infos::create($req->all());
//       $customer=Customer_infos::all();
        $customer=new Customer_infos;
        $Name=$req->First_Name.' '.$req->Last_Name;
       // $customer->notify(new test('test ha'));
        Notification::route('mail',$req->Email)->notify(new CustomerNotification($Name));
        // $user_model = new user_model;
        //  $user_model->username=$req->user;
        // $user_model->password=$req->password;
        // $user_model->save();
        // \Mail::to($req->input('Email'))->send(new Registration_success($req->Username,$req->Password));
        return redirect('CustomerLogin');
    }

     public function CustomerLogin(Request $req)
    {
        //$this->validate($req);
        $check = 0;
        $username=$req->input('Username');  
        $password=$req->input('Password');
        $get_id=NULL;
        $get_id=DB::select("select id from customer_infos where Username=? and Password=?",[$username,$password]);
        if($get_id!=NULL)
        {
            $customer_id = $get_id[0]->id;
            $req->session()->put('data',$req->input());
            $req->session()->put('customer_id', $customer_id);
            if(session()->has('customize')){
                session()->forget('customize');
                return redirect('customize');
            }
            if($req->session()->has('data'))
            {
                return redirect('/');
            } 
        }
        else
        {
            return redirect()->back()->withErrors(['Wrong Login Credentials']);
        }   

        // $user_model = new user_model;
        //  $user_model->username=$req->user;
        // $user_model->password=$req->password;
        // $user_model->save();
    }   

    public function CheckOrders(){
        if(!session()->has('data'))
        {
         return redirect('Customer.CustomerLogin');
        }
        $data = Orders_sell::join('products','products.id','=','orders_sell.ProductID')->join('seller_info','seller_info.id','=','products.seller_id')->where('CustomerID',session()->get('customer_id'))->get();
        dd($data);
        $data2 = Orders_sell::where('CustomerID',session()->get('customer_id'))->get();
        $data=$data->unique('OrderID');
        return view('Customer.CheckOrders')->with('data',$data)->with('data2',$data2);
    }
    public function ProfileView()
    {
        if(!session()->has('data'))
        {
         return redirect('Customer.CustomerLogin');
        }
        return view('Customer.UserProfile');
    }


    public function UserLogout()
    {
        // session()->flush(); //Clear all session data
        session()->forget('data');
        session()->forget('customer_id');
        session()->forget('cart');
        
        return redirect('/');
        // return view('Customer.Login_Customer_Portal');

         return view('Customer.Login_Customer_Portal')->with('customize',1);

    }


}

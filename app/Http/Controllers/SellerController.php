<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\user_model;
use App\Models\Orders_sell;
use Illuminate\Support\Facades\DB;
use App\Notifications\SellerNotification;
use App\Notifications\AdminNotification;
use App\Notifications\AuthenticationNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable; 

class SellerController extends Controller
{
    public function SellerSignUpView()
    {
        // if(!session()->has('data'))
        // {
        //      return redirect('admin_login');
        // }
       return view('Seller.SellerSignUp');
    }

    public function ViewOrders(){

        $data = Orders_sell::join('products','orders_sell.ProductID','=','products.id')->get();
        // dd($data);
        return view('Seller.ViewOrders')->with('data',$data);
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
        Notification::route('mail','abdurrafay360@gmail.com')->notify(new AdminNotification($Name,$Identifier));
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

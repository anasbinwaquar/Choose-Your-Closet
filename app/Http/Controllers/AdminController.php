<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer_infos;
use App\Models\custom_order;
use App\Models\user_model;


class AdminController extends Controller
{
     public function LoginAdminView()
    {
        return view('Admin.AdminLogin');
    }

    public function image($encodedData){
        echo "string";
        // return redirect($url);
    }
    public function custom_order(){

        $orders=custom_order::all();
        // dd($orders);
        return view('Admin.Custom_orders')->with('orders',$orders);
    }

    public function Portal()
    {
         if(session()->has('data'))
            {
               $data1 = Customer_infos::all();
                $data2 = user_model::where('Approval',1)->get();
                return view('Admin.Admin_portal',compact('data1','data2'));
            }
            else
            {
                return view('Admin.AdminLogin');
            }
    }


    public function LoginAdmin(Request $req)
    {
        $usernameCheck=$req->input('Username');
        $passwordCheck=$req->input('Password');
        if($usernameCheck=='admin' && $passwordCheck=='admin')
        {
            $req->session()->put('data',$req->input());
             if($req->session()->has('data'))
            {
                $data1 = Customer_infos::all();
                $data2 = user_model::where('Approval',1)->get();

                return view('Admin.Admin_portal',compact('data1','data2'));
            }
            
        }

    }
 	
}

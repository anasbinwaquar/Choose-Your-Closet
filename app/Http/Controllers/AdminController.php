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

    public function ViewAbout()
    {
        return view('Pages.AboutUs');
    }

    public function image($encodedData){

        print_r($encodedData);
  //       $encodedData = str_replace(' ','+',$encodedData);
  // $decocedData = base64_decode($encodedData);
      //  redirect($encodedData);

        echo "string";
        // return redirect($url);
    }
    public function custom_order(){

        if(session()->has('admindata'))
            {
                $orders=custom_order::all();
                return view('Admin.Custom_orders')->with('orders',$orders);
            }
            else
            {
                return view('Admin.AdminLogin');
            }


    }

    public function Portal()
    {
         if(session()->has('admindata'))
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
            $req->session()->put('admindata',$req->input());
             if($req->session()->has('admindata'))
            {
                $data1 = Customer_infos::all();
                $data2 = user_model::where('Approval',1)->get();

                return view('Admin.Admin_portal',compact('data1','data2'));
            }
            
        }

    }
 	
}

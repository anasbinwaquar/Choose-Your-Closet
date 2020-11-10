<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function LoginAdminView()
    {
        return view('Admin.AdminLogin');
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
                return view('Admin.Admin_portal');
            }
            
        }

    }
 	
}

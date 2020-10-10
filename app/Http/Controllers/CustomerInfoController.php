<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerInfoController extends Controller
{
    public function CustomerSignUp(Request $req)
    {
    	//$this->validate($req);
    	print_r($req->input());
    	//$user_model =new user_model;
    	user_model::create($req->all());
        // $user_model = new user_model;
    	//  $user_model->username=$req->user;
    	// $user_model->password=$req->password;
    	// $user_model->save();
        \Mail::to($req->input('email'))->send(new Registration_success($req->username,$req->password);
    }
}

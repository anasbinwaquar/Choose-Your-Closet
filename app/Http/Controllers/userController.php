<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\user_model;
use Illuminate\Support\Facades\DB; 
use \App\Mail\Registration_success;
class userController extends Controller
{

     public function LoginAdminView()
    {
        return view('AdminLogin');
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
                return view('Admin_portal');
            }
            
        }

    }


      public function SellerSignUpView()
    {
        if(!session()->has('data'))
        {
             return redirect('admin_login');
        }
       return view('SellerSignUp');
    }



    public function default()
    {
    	 return view('welcome');
    }


     public function SellerSignUp(Request $req)
    {
        user_model::create($req->all());
       // \Mail::to($req->input('email'))->send(new Registration_success($req->username,$req->password));
    }


    
     public function loging(Request $req)
    {
        //$this->validate($req);
        $username=$req->input('username');  
        $password=$req->input('password');
        $check=NULL;
        $check=DB::select("select * from posts where username=? and password=?",[$username,$password]);
        if($check!=NULL)
        {
            $req->session()->put('data',$req->input());

            if($req->session()->has('data'))
            {
                return redirect('profile');
            }
        }

        // $user_model = new user_model;
        //  $user_model->username=$req->user;
        // $user_model->password=$req->password;
        // $user_model->save();
    }

}

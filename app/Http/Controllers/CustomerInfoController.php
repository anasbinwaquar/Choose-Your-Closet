<?php
namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Models\Customer_infos;
use Illuminate\Support\Facades\DB; 
use \App\Mail\Registration_success;
class CustomerInfoController extends Controller
{


      public function CustomerSignUpView()
    {
         return view('CustomerSignUp');
    }


    public function CustomerLoginView()
    {
         return view('Login_Customer_Portal');
    }


    public function CustomerSignUp(Request $req)
    {
        //$this->validate($req);
        print_r($req->input());
        //$user_model =new user_model;
        Customer_infos::create($req->all());
        // $user_model = new user_model;
        //  $user_model->username=$req->user;
        // $user_model->password=$req->password;
        // $user_model->save();
        // \Mail::to($req->input('Email'))->send(new Registration_success($req->Username,$req->Password));
    }

     public function CustomerLogin(Request $req)
    {
        //$this->validate($req);
        $username=$req->input('Username');  
        $password=$req->input('Password');
        $check=NULL;
        $check=DB::select("select * from customer_infos where Username=? and Password=?",[$username,$password]);
        if($check!=NULL)
        {
            $req->session()->put('data',$req->input());

            if($req->session()->has('data'))
            {
                return redirect('UserProfile');
            }
        }

        // $user_model = new user_model;
        //  $user_model->username=$req->user;
        // $user_model->password=$req->password;
        // $user_model->save();
    }   

    public function ProfileView()
    {
        if(!session()->has('data'))
        {
         return redirect('CustomerLogin');
        }
        return view('UserProfile');
    }


    public function UserLogout()
    {
        session()->forget('data');
        return view('Login_Customer_Portal');
    }


}

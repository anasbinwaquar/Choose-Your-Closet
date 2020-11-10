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
        // if(!session()->has('data'))
        // {
        //      return redirect('admin_login');
        // }
       return view('SellerSignUp');
    }

      public function Seller_Authentication()
      {
        $authentication = DB::select("select * from seller_info where Approval=0");
        return view('Authentication_Portal')->with('authentication',$authentication);
      }

      public function setapproval($id)
      { 
        DB::update("update seller_info SET Approval=1 WHERE id=$id");
        return redirect('Seller_Authentication');
      }

       public function declineapproval($id)
      {
        DB::delete("delete from seller_info WHERE id=$id");
        return redirect('Seller_Authentication');
      }
    public function SellerLoginView()
     {
        return view('Seller_Login');

     }


    public function SellerLogin(Request $req)
     {
        //session()->flush();
        $username=$req->input('Username');  
        $password=$req->input('Password');
        $check=NULL;
        $check=DB::select("select * from seller_info where Username=? and Password=? and Approval=1",[$username,$password]);
        if($check!=NULL)
<<<<<<< HEAD
        {
=======
        {      
>>>>>>> 3cb2fff9f5d9ae8f91fef27cdc77958a50b711b8
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


    public function default()
    {
    	 return view('welcome');
    }


     public function SellerSignUp(Request $req)
    {
        user_model::create($req->all());
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
        return view('Seller_Portal');
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

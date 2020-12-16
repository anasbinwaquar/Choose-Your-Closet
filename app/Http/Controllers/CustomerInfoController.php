<?php
namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Models\Customer_infos;
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
        //$this->validate($req);
        print_r($req->input());
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
    }

     public function CustomerLogin(Request $req)
    {
        //$this->validate($req);
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
         return redirect('Customer.CustomerLogin');
        }
        return view('Customer.UserProfile');
    }


    public function UserLogout()
    {
        // session()->flush(); //Clear all session data
        session()->forget('data');
         return view('Customer.Login_Customer_Portal')->with('customize',1);
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_model;
use Illuminate\Support\Facades\DB;  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
class userController extends Controller
{
    
    public function sign_up()
    {
    	 return view('signup');
    }
    public function login()
    {
         return view('login');
    }
    public function profile()
    {
        if(!session()->has('data'))
        {
         return redirect('login');
        }
        return view('profile');
    }
    public function logout()
    {
        session()->forget('data');
        return view('login');
    }
    public function default()
    {
    	 return view('welcome');
    }
    public function signing(Request $req)
    {
    	//$this->validate($req);
    	print_r($req->input());
    	//$user_model =new user_model;
    	user_model::create($req->all());
       $mail = new PHPMailer(true);

try {
    //Server setting
                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'clothing@closet.pk';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '';                     // SMTP username
    $mail->Password   = '';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 25;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('clothing@closet.pk', 'Mailer');
    $mail->addAddress($req->email,$req->username);     // Add a recipient
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    	// $user_model = new user_model;
    	//  $user_model->username=$req->user;
    	// $user_model->password=$req->password;
    	// $user_model->save();
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ContactUsNotification;


class ContactController extends Controller
{
    public function ContactPage()
    {
    	$check = 0;
        return view('Pages.ContactUs')->with('check',$check);
    }

	public function Contact(Request $req)
    {
        ContactUs::create($req->all());
        $Email = 'abdurrafay360@gmail.com';
        $Name = $req->name;
        $Subject = $req->subject;
        $QueryMail = $req->email;
        $Query = $req->message;
        Notification::route('mail',$Email)->notify(new ContactUsNotification($Name, $Subject, $QueryMail, $Query));
        $check = 1;
        return view('Pages.ContactUs')->with('check',$check);
    }

}
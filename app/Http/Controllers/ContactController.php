<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use Illuminate\Support\Facades\DB; 
use App\Notifications\CustomerNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;

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
        $check = 1;
        return view('Pages.ContactUs')->with('check',$check);
    }

}

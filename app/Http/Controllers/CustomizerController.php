<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomizerController extends Controller
{
   
   public function index()
    {
         return view('Customizer.view');
    }
}

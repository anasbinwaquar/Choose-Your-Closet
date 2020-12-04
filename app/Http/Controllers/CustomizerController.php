<?php

namespace App\Http\Controllers;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class CustomizerController extends Controller
{
   
   public function index()
    {
    	$path = storage_path('app/public/prints');
    	$designs=Storage::url('2.png');
    	// return "<img src='".$designs."'/>";
    	return view('Customizer.view')->with('designs',$designs);
    }
}

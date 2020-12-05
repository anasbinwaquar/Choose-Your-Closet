<?php

namespace App\Http\Controllers;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomizerController extends Controller
{
   
   public function index()
    {
    	$images = File::allFiles(public_path('templates'));
        $shirts = File::allFiles(public_path('t-shirts'));

    	// return "<img src='".$designs."'/>";
    	return view('Customizer.view')->with('images',$images)->with('shirts',$shirts);
    }
    public function store(Request $req)
    {
    	$data = $req->all();
        print_r($data);

    }
    public function addprint(){
        return view('Customizer.addprint');
    }
}

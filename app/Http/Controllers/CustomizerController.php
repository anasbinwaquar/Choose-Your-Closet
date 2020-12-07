<?php

namespace App\Http\Controllers;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageServiceProvider;

class CustomizerController extends Controller
{
   
   public function index()
    {
    	$images = File::allFiles(public_path('templates'));
        $shirts = File::allFiles(public_path('t-shirts'));
    	// return "<img src='".$designs."'/>";
    	return view('Customizer.view')->with('images',$images)->with('shirts',$shirts);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        // $name = time().'.' . explode('/', explode(':', substr($request->tshirt_front, 0, strpos($request->tshirt_front, ';')))[1])[1];

        // \Image::make($request->tshirt_front)->save(public_path('image').$name);
        // $request->merge(['photo' => $name]);

        // $userPhoto = public_path('img/profile/').$currentPhoto;
        // if(file_exists($userPhoto)){
        //     @unlink($userPhoto);
        // }


    }
    public function addprint(){
        return view('Customizer.addprint');
    }
}

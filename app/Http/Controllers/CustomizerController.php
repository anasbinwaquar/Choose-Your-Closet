<?php

namespace App\Http\Controllers;
use File;
use App\Models\prints;
use App\Models\custom_order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageServiceProvider;

class CustomizerController extends Controller
{
   
   public function index()
    {
        // echo "string";
    	$images = prints::all();
        $shirts = File::allFiles(public_path('t-shirts'));
    	// return "<img src='".$designs."'/>";
    	return view('Customizer.view')->with('images',$images)->with('shirts',$shirts);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $custom_order=new custom_order();
        $custom_order->image_front=$request->tshirt_front;
        $custom_order->image_back=$request->tshirt_back;
        $custom_order->color=$request->tshirt_color;
        $custom_order->customer_id=1;
        $custom_order->price=$request->total_price;
        $custom_order->size=$request->size;
        $custom_order->save();

    }
    public function addprint(){
        $prints= new prints();
        $prints=prints::all();
        return view("Customizer.add_prints")->with('prints',$prints);
    }
    public function store_print(Request $request){
        // dd($request->all());
        $print = new prints();
        $file=$request->file('print_image');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('templates',$filename);
        $print->name=$request->print_name;
        $print->price=$request->price;
        $print->image=$filename;
        $print->save();
        $prints= new prints();
        $prints=prints::all();
        return view("Customizer.add_prints")->with('prints',$prints);
    }
    public function delete_print_view(){

        // $print =prints::where('id', $id)->first();
        // if($print!=NULL)
        //     $print->delete();
        $prints= new prints();
        $prints=prints::all();
        return view("Customizer.delete_print")->with('prints',$prints);
    }
    public function delete_print($id){
        $print=prints::where('id',$id)->delete();
        return redirect("deleteprint");
    }
}

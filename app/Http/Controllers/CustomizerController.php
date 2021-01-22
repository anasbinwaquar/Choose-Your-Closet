<?php

namespace App\Http\Controllers;
use File;
use App\Models\prints;
use Illuminate\Support\Facades\DB; 
use App\Notifications\CustomOrderAdminNotification;
use App\Notifications\CustomOrderCustomerNotification;
use App\Models\custom_order;
use App\Models\Customer_infos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageServiceProvider;
use Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable; 
class CustomizerController extends Controller
{
   
   public function index()
    {
        // echo "string";
        if(!session()->has('customer_id')){
            session()->put('customize',0);
            return redirect('CustomerLogin');
        }
        // dd(session()->all());
    	$images = prints::all();
        $shirts = File::allFiles(public_path('t-shirts'));
    	// return "<img src='".$designs."'/>";
    	return view('Customizer.view')->with('images',$images)->with('shirts',$shirts);
    }
    public function store(Request $request)
    {
        // // dd($request->all());

       $request->validate([
          'contact' => 'required|regex:/(0)[0-9]{10}/',
          'address' => 'required',
        ]);
       $customer_id=session()->get('customer_id');
        // $customer_email=Customer_infos::where('id',session()->get('customer_id'))->select('Email')->first();
        $customer_email=DB::select("select email from customer_infos where id=?",[session()->get('customer_id')]);
        $AdminEmail="chooseyourclosetnoreply@gmail.com";
        $custom_order=new custom_order();
        $custom_order->image_front=$request->tshirt_front;
        $custom_order->image_back=$request->tshirt_back;
        $custom_order->color=$request->tshirt_color;
        $custom_order->customer_id=session()->get('customer_id');
        $custom_order->price=$request->total_price;
        $custom_order->size=$request->size;
        $custom_order->address=$request->address;
        $custom_order->contact_number=$request->contact;
        $customer_fname = DB::select('select first_name from customer_infos where id = ?', [$customer_id]);
        $customer_lname = DB::select('select last_name from customer_infos where id = ?', [$customer_id]);
        $fname = $customer_fname[0]->first_name;
        $lname = $customer_lname[0]->last_name;
        $customer_name = $fname.' '.$lname;

        Notification::route('mail',$AdminEmail)->notify(new CustomOrderAdminNotification($customer_email[0]->email,  $customer_id, $customer_name));
        Notification::route('mail',$customer_email[0]->email)->notify(new CustomOrderCustomerNotification($customer_id,$customer_name));
        $custom_order->save();
        if(session()->has('customer_id'))
        {
                $check = 1;
        }
        else
        {
           $check = 0;
        }   
        return view('Customizer.success')->with('check_nav',$check);
    }
    public function addprint(){

        if(session()->has('admindata')){
        $prints= new prints();
        $prints=prints::all();
        return view("Customizer.add_prints")->with('prints',$prints);
        }
        else
          return view('Admin.AdminLogin');
    }
    public function store_print(Request $request){
        // dd($request->all());
        $request->validate([
          'price' => 'required|integer',
          'print_name' => 'required',
          'print_image' => 'required',
        ]);

        $print = new prints();
        $file=$request->file('print_image');
        $extension=$file->getClientOriginalExtension();
        $filename=time().'.'.$extension;
        $file->move('templates',$filename);
        $print->name=$request->print_name;
        $print->price=$request->price;
        $print->image=$filename;
        $print->save();
        return view("Customizer.add_prints");
    }
    public function delete_print_view(){

        if(session()->has('admindata')){
        $prints= new prints();
        $prints=prints::all();
        return view("Customizer.delete_print")->with('prints',$prints);
        }
        else
          return view('Admin.AdminLogin');
    }
    public function delete_print($id){

        if(session()->has('admindata')){
        $print=prints::where('id',$id)->delete();
        return redirect("deleteprint");
        }
        else
          return view('Admin.AdminLogin');
    }
}

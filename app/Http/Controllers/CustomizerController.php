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
        if(!session()->has('data')){
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

        // $customer_email=Customer_infos::where('id',session()->get('customer_id'))->select('Email')->first();
        $customer_email=DB::select("select email from customer_infos where id=?",[session()->get('customer_id')]);
        $AdminEmail="abdurrafay360@gmail.com";
        echo ($customer_email[0]->email);
        $custom_order=new custom_order();
        $custom_order->image_front=$request->tshirt_front;
        $custom_order->image_back=$request->tshirt_back;
        $custom_order->color=$request->tshirt_color;
        $custom_order->customer_id=session()->get('customer_id');
        $custom_order->price=$request->total_price;
        $custom_order->size=$request->size;
        $custom_order->address=$request->address;
        $custom_order->contact_number=$request->contact;
        Notification::route('mail',$AdminEmail)->notify(new CustomOrderAdminNotification($customer_email[0]->email,session()->get('customer_id')));
        Notification::route('mail',$customer_email[0]->email)->notify(new CustomOrderCustomerNotification(session()->get('customer_id')));
        $custom_order->save();

        return view('Customizer.success');
    }
    public function addprint(){
        $prints= new prints();
        $prints=prints::all();
        return view("Customizer.add_prints")->with('prints',$prints);
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

<?php

namespace App\Http\Controllers;
use App\MajorType;
use App\Email;
use App\InventoryMajorType; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Mail;
use DB; 

class Contact extends Controller
{
    public function contact()
    {
        $menu = MajorType::with('subtype')->where('category_type', 'men')->get();
        $women_menu = MajorType::with('subtype')->where('category_type', 'women')->get();
        $product_menu = InventoryMajorType::with('prosubtype')->where('status', 'open')->get(); 
        return view('web.contact.contact')
        ->with('menu', $menu)
        ->with('women_menu', $women_menu)
        ->with('product_menu', $product_menu);
    }

    public function customer_email(Request $request)
    { 
         
        Email::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'msg' => $request->input('message'),
            'date' => now(),
            'status' => '1'
             
        ]);
        $data = array(
            'first_name'  => $request->input('first_name'),
            'phone_number' => $request->input('phone_number'),
            'subject' => $request->input('subject'),
            'bodyMessage' => $request->input('message') 
           );
      
           Mail::send('web.contact.mail', $data, function($message) use ($request){
            $message->to('info@dessangepakistan.com', 'Dessange Pakistan')->subject($request->input('subject') );
            $message->from($request->input('email'), $request->input('name'));
            $message->sender($request->input('email'), $request->input('name'));
           });
        return response()->json(['success'=>'Form is successfully submitted!']);
    }
}

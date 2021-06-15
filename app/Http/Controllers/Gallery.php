<?php

namespace App\Http\Controllers;
use App\LookBook; 
use App\MajorType; 
use App\InventoryMajorType; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use DB; 

class Gallery extends Controller
{
    public function lookbook()
    {
        $menu = MajorType::with('subtype')->where('category_type', 'men')->get();
        $women_menu = MajorType::with('subtype')->where('category_type', 'women')->get();  
        $product_menu = InventoryMajorType::with('prosubtype')->where('status', 'open')->get(); 
        $slider = \DB::table('lookbooks')->where('status', 'open')->get();  
        return view('web.lookbook.lookbook') 
        ->with('menu', $menu)
        ->with('women_menu', $women_menu) 
        ->with('product_menu', $product_menu)
        ->with('slider', $slider);
    }

    //Slider
    
    public function add_slider_lookbook()
    { 
        $role = Auth::user()->role;
        $data['page_title'] = "Add About Info";
        $data['page_description'] = "Welcome to Admin Dashboard"; 
        if($role == 'admin'){
            return view('admin.lookbook.slider')->with($data);
        }else{
            return view('social.lookbook.slider')->with($data);
        } 
    }

    public function upload_slider_lookbook(Request $request)
    {
        //dd($request);
        $role = Auth::user()->role;  
        $id = Auth::user()->id;
        $this->validate($request, [
            'image'  => 'required|mimes:doc,docx,pdf,jpeg,jpg,png|max:2048' 
           ]);
        $image_path = $request->file('image'); 
         
        $new_name = rand() . '.' . $image_path->getClientOriginalExtension();   
        $move = $image_path->move(('img/slider/'), $new_name); 

        LookBook::create([ 
            'image' =>  $new_name,
            'status' => 'open'
        ]);
        $notification = array(
            'message' => 'Slider Upload SucessFully', 
            'alert-type' => 'success'
        );
        if($role == 'admin'){
            return redirect('admin/slider_list_lookbook')->with($notification);
        }else{
            return redirect('social/slider_list_lookbook')->with($notification);
        } 
        
        
    }

    public function slider_list_lookbook()
    {
        $role = Auth::user()->role; 
        $data['page_title'] = "All Student";
        $data['page_description'] = "Welcome to Admin Dashboard";
        
        $slider_list = \DB::table('lookbooks')
        ->Select('lookbooks.image', 'lookbooks.id' )
        ->where('status', 'open')->get();
        
        $data['slider_list'] = $slider_list;
        if($role == 'admin'){
            return view('admin.lookbook.slider_list')->with($data);
        }else{
            return view('social.lookbook.slider_list')->with($data);
        } 
         
    }

    public function edit_slider_lookbook($id)
    { 
        $role = Auth::user()->role;  
        $edit_slider = LookBook::find($id); 
        
        if($role == 'admin'){
            return view('admin.lookbook.edit_slider') 
                  ->with('edit_slider', $edit_slider);
        }else{
            return view('social.lookbook.edit_slider') 
                 ->with('edit_slider', $edit_slider);
        } 
        
    }

    public function update_slider_lookbook(Request $request, $id)
    { 
         
        $role = Auth::user()->role;  
        
        if($request->file('image') != ''){  
           
            $this->validate($request, [
                'image'  => 'required|mimes:jpeg,jpg,png|max:2048', 
            ]);
            $image_path = $request->file('image'); 
            
            $new_name = rand() . '.' . $image_path->getClientOriginalExtension();    
            $move = $image_path->move(('img/slider/'), $new_name); 
            DB::table('lookbooks')->where('id', $id)
                            ->update([   'image' =>  $new_name,  ]);
 

        }
         
        
        $notification = array(
            'message' => 'Update SucessFully', 
            'alert-type' => 'success'
        );
        if($role == 'admin'){
            return redirect('admin/slider_list_lookbook')->with($notification);
        }else{
            return redirect('social/slider_list_lookbook')->with($notification);
        } 
        
        
        
    }
    
    public function delete_slider($id)
    {
        $role = Auth::user()->role;
        
        $delete_category = DB::select("update lookbooks 
                                     set status = 'close'
                                     where id = '".$id."' ");
        $notification = array('message' => 'Delete SucessFully', 
                             'alert-type' => 'success' );
        if($role == 'admin'){
            return redirect('admin/slider_list_lookbook')->with($notification);
        }else{
            return redirect('social/slider_list_lookbook')->with($notification);
        } 
    }
}

<?php

namespace App\Http\Controllers;
use App\About_About_Section;
use App\MajorType; 
use App\AboutSlider; 
use App\InventoryMajorType; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use DB; 

class AboutPage extends Controller
{
    public function about()
    {
        $menu = MajorType::with('subtype')->where('category_type', 'men')->get();
        $women_menu = MajorType::with('subtype')->where('category_type', 'women')->get(); 
        $product_menu = InventoryMajorType::with('prosubtype')->where('status', 'open')->get(); 
        $about_section = \DB::table('about_about_sections')->first(); 
        $slider = \DB::table('about_slider')->get();
        $services = \DB::table('services_service') 
                ->Select('services_service.id',  'services_service.start_date' ) 
                ->where('services_service.status', 'open')
                ->get();
        return view('web.about_us.about') 
        ->with('menu', $menu)
        ->with('women_menu', $women_menu)
        ->with('about_section', $about_section)
        ->with('slider', $slider)
        ->with('product_menu', $product_menu)
        ->with('services', $services);
    }

    public function add_about_section()
    { 
        $role = Auth::user()->role; 
        $data['page_title'] = "Add About Info";
        $data['page_description'] = "Welcome to Admin Dashboard"; 
        if($role == 'admin'){
            return view('admin.about_page.about')->with($data);
        }else{
            return view('social.about_page.about')->with($data);
        }
    }

    public function upload_about_detail(Request $request)
    {
       // dd($request);
        $role = Auth::user()->role;  
        $id = Auth::user()->id;
        $this->validate($request, [
            'img'  => 'required|mimes:doc,docx,pdf,jpeg,jpg,png|max:2048',
            'about_image'  => 'required|mimes:doc,docx,pdf,jpeg,jpg,png|max:2048'
           ]);
        $image_path = $request->file('img');
        $image_paths = $request->file('about_image');
         
        $new_name = rand() . '.' . $image_path->getClientOriginalExtension();  
        $new_names = rand() . '.' . $image_paths->getClientOriginalExtension();  
        $move = $image_path->move(('img/about/'), $new_name);
        $moves = $image_paths->move(('img/about/'), $new_names);
        About_About_Section::create([
            'about_heading' => $request->input('about_heading'),
            'about_main_heading' => $request->input('about_main_heading'), 
            'description' => $request->input('description'),  
            'img' =>  $new_name,
            'about_image' =>  $new_names,
            'user_id' => $id,
            'date_con' => now() 
        ]);
        $notification = array(
            'message' => 'About Upload SucessFully', 
            'alert-type' => 'success'
        );
        if($role == 'admin'){
            return redirect('admin/add_about_section')->with($notification);
        }else{
            return redirect('social/add_about_section')->with($notification);
        }
        
        
    }
    public function about_section_list()
    {
        $role = Auth::user()->role;  
        $data['page_title'] = "All Student";
        $data['page_description'] = "Welcome to Admin Dashboard";
        
        $about_list = \DB::table('about_about_sections')
        ->leftjoin('users', 'users.id', '=', 'about_about_sections.user_id')
        ->Select('about_about_sections.about_heading', 'about_about_sections.about_main_heading', 
                  'about_about_sections.description', 'about_about_sections.img',
                    'users.first_name', 'about_about_sections.id') 
        ->get();
        
        $data['about_list'] = $about_list;
        if($role == 'admin'){
            return view('admin.about_page.about_list')->with($data);
        }else{
            return view('social.about_page.about_list')->with($data);
        }
         
    }

    public function edit_about($id)
    { 
        $role = Auth::user()->role;  
        $edit_about = About_About_Section::find($id); 
        
        if($role == 'admin'){
            return view('admin.about_page.edit_about') 
                  ->with('edit_about', $edit_about);
        }else{
            return view('social.about_page.edit_about') 
                 ->with('edit_about', $edit_about);
        } 
        
    }

    public function update_about(Request $request, $id)
    { 
         
        $role = Auth::user()->role;  
        
        if($request->file('img') != '' or $request->file('about_image') != ''){  
           
            $this->validate($request, [
                'img'  => 'required|mimes:jpeg,jpg,png|max:2048',
                'about_image'  => 'required|mimes:doc,docx,pdf,jpeg,jpg,png|max:2048'
            ]);
            $image_path = $request->file('img');
            $image_paths = $request->file('about_image');
            
            $new_name = rand() . '.' . $image_path->getClientOriginalExtension();  
            $new_names = rand() . '.' . $image_paths->getClientOriginalExtension();  
            $move = $image_path->move(('img/about/'), $new_name);
            $moves = $image_paths->move(('img/about/'), $new_names);
            DB::table('about_about_sections')->where('id', $id)
                            ->update(['about_heading' => $request->input('about_heading'),
                            'about_main_heading' => $request->input('about_main_heading'), 
                            'description' => $request->input('description'),  
                            'img' =>  $new_name,
                            'about_image' =>  $new_names  ]);
 

        }
        else{
            
            DB::table('about_about_sections')->where('id', $id)
                            ->update(['about_heading' => $request->input('about_heading'),
                            'about_main_heading' => $request->input('about_main_heading'), 
                            'description' => $request->input('description')  ]);

        

        }
        
        $notification = array(
            'message' => 'Update SucessFully', 
            'alert-type' => 'success'
        );
        if($role == 'admin'){
            return redirect('admin/about_section_list')->with($notification);
        }else{
            return redirect('social/about_section_list')->with($notification);
        } 
        
        
        
    }

    //Slider
    
    public function add_slider()
    { 
        $role = Auth::user()->role;  
        $data['page_title'] = "Add About Info";
        $data['page_description'] = "Welcome to Admin Dashboard"; 
        if($role == 'admin'){
            return view('admin.about_page.slider')->with($data);
        }else{
            return view('social.about_page.slider')->with($data);
        } 
    }

    public function upload_slider(Request $request)
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

        AboutSlider::create([ 
            'image' =>  $new_name 
        ]);
        $notification = array(
            'message' => 'Slider Upload SucessFully', 
            'alert-type' => 'success'
        );
        if($role == 'admin'){
            return redirect('admin/slider_list')->with($notification);
        }else{
            return redirect('social/slider_list')->with($notification);
        } 
        
        
    }

    public function slider_list()
    {
        $role = Auth::user()->role;  
        $data['page_title'] = "All Student";
        $data['page_description'] = "Welcome to Admin Dashboard";
        
        $slider_list = \DB::table('about_slider')
        ->Select('about_slider.image', 'about_slider.id' )->get();
        
        $data['slider_list'] = $slider_list;
        if($role == 'admin'){
            return view('admin.about_page.slider_list')->with($data);
        }else{
            return view('social.about_page.slider_list')->with($data);
        } 
         
    }

    public function edit_slider($id)
    { 
        $role = Auth::user()->role;  
        $edit_slider = AboutSlider::find($id); 
        
        if($role == 'admin'){
            return view('admin.about_page.edit_slider') 
                  ->with('edit_slider', $edit_slider);
        }else{
            return view('social.about_page.edit_slider') 
                 ->with('edit_slider', $edit_slider);
        } 
        
    }

    public function update_slider(Request $request, $id)
    { 
         
        $role = Auth::user()->role;  
        
        if($request->file('image') != ''){  
           
            $this->validate($request, [
                'image'  => 'required|mimes:jpeg,jpg,png|max:2048', 
            ]);
            $image_path = $request->file('image'); 
            
            $new_name = rand() . '.' . $image_path->getClientOriginalExtension();    
            $move = $image_path->move(('img/slider/'), $new_name); 
            DB::table('about_slider')->where('id', $id)
                            ->update([   'image' =>  $new_name,  ]);
 

        }
         
        
        $notification = array(
            'message' => 'Update SucessFully', 
            'alert-type' => 'success'
        );
        if($role == 'admin'){
            return redirect('admin/slider_list')->with($notification);
        }else{
            return redirect('social/slider_list')->with($notification);
        } 
        
        
        
    }
}

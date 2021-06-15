<?php

namespace App\Http\Controllers;
use App\MajorType; 
use App\SubType; 
use App\Email;
use App\MainPageContent;
use App\InventoryMajorType; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use DB; 

class MainPage extends Controller
{
    

    public function index()
    {
        $data['page_title'] = "Create Student";
        $data['page_description'] = "Welcome to Admin Dashboard";
        $menu = MajorType::with('subtype')->where('category_type', 'men')->get();
        $women_menu = MajorType::with('subtype')->where('category_type', 'women')->get();
        $product_menu = InventoryMajorType::with('prosubtype')->where('status', 'open')->get(); 
        $main_content =\DB::table('main_page_contents')->where('status', 'open')->get();
        $main_meta = \DB::table('main_page_contents')->where('status', 'open')->first();    
        return view('web.index.index')->with($data) 
        ->with('menu', $menu)
        ->with('women_menu', $women_menu)
        ->with('main_meta', $main_meta)
        ->with('product_menu', $product_menu)
        ->with('main_content', $main_content); 
    }
 
 

    public function add_banner_detail()
    { 
        $data['page_title'] = "Add banner Info";
        $data['page_description'] = "Welcome to Admin Dashboard"; 
        return view('admin.front_page.add_banner')->with($data);
    }


    public function upload_banner_detail(Request $request)
    {
         
        $id = Auth::user()->id;
        $this->validate($request, [
            'banner_img'  => 'required|mimes:doc,docx,pdf,jpeg,jpg,png|max:2048'
           ]);
        $image_path = $request->file('banner_img');
         
        $new_name = rand() . '.' . $image_path->getClientOriginalExtension();  
        $move = $image_path->move(('img/'), $new_name);
        MainBanner::create([
            'heading' => $request->input('heading'),
            'button_heading' => $request->input('button_heading'), 
            'banner_img' =>  $new_name,
            'button_url' => $request->input('button_url'), 
            'user_id' => $id,
            'date_con' => now(),
            'is_delete' => '1'
        ]);
        $notification = array(
            'message' => 'Banner Upload SucessFully', 
            'alert-type' => 'success'
        );
        return redirect('admin/add_banner')->with($notification);
        
        
    }

    public function banners_list()
    {
        $data['page_title'] = "All Student";
        $data['page_description'] = "Welcome to Admin Dashboard";
        
        $banner_list = \DB::table('main_banners')
        ->leftjoin('users', 'users.id', '=', 'main_banners.user_id')
        ->Select('main_banners.heading', 'main_banners.banner_img', 'users.first_name', 'main_banners.id')
        ->where('is_delete', '1')
        ->get();
        
        $data['banner_list'] = $banner_list;
        return view('admin.front_page.banner_list')->with($data);
         
    }
    
    public function delete_banner($id)
    {
        
        $delete_banners = DB::select("update main_banners 
                                     set is_delete = '0'
                                     where id = '".$id."' ");
        $notification = array('message' => 'Banner Delete SucessFully', 
                             'alert-type' => 'success' );
        return redirect()->route('banners_list')->with($notification);
    }

    public function update_banner($id)
    { 
        $edit_banner = MainBanner::find($id); 
        return view('admin.front_page.edit_banner') 
        ->with('edit_banner', $edit_banner);
    }

    public function banner(Request $request, $id)
    {
         
        $user_id = Auth::user()->id;
        if($request->file('banner_img') != ''){  
        $this->validate($request, [
            'banner_img'  => 'required|mimes:doc,docx,pdf,jpeg,jpg,png|max:2048'
           ]);
        $image_path = $request->file('banner_img');
         
        $new_name = rand() . '.' . $image_path->getClientOriginalExtension();  
        $move = $image_path->move(('img/'), $new_name);
        DB::table('main_banners')->where('id', $id)
                            ->update(['heading'=> $request->input('heading'),
                                      'button_heading'=> $request->input('button_heading'),
                                      'banner_img'=> $new_name,
                                      'button_url' => $request->input('button_url'), 
                                      'user_id' => $user_id,
                                      'date_con' => now(),
                                       'is_delete' => '1',]);
        }
        else{
            DB::table('main_banners')->where('id', $id)
                            ->update(['heading'=> $request->input('heading'),
                                      'button_heading'=> $request->input('button_heading'), 
                                      'button_url' => $request->input('button_url'), 
                                      'user_id' => $user_id,
                                      'date_con' => now(),
                                       'is_delete' => '1',]);
        } 
        $notification = array(
            'message' => 'Banner Update SucessFully', 
            'alert-type' => 'success'
        );
        return redirect('admin/banners_list')->with($notification);
        
        
    }

    //Men and women section
    public function add_menwomen_detail()
    { 
        $data['page_title'] = "Add Men & Women Info";
        $data['page_description'] = "Welcome to Admin Dashboard"; 
        return view('admin.front_page.menwomen')->with($data);
    }

    public function menwomen_detail(Request $request)
    {
         
        $id = Auth::user()->id;
        
        Front_Page_Menwomen::create([
            'content' => $request->input('content'),  
            'user_id' => $id,
            'date_con' => now(),
            'is_delete' => '1'
        ]);
        $notification = array(
            'message' => 'Upload SucessFully', 
            'alert-type' => 'success'
        );
        return redirect('admin/add_menwomen_detail')->with($notification);
        
        
    }
    
    //Men Women Section Image
    public function men_women_image_section()
    { 
        $data['page_title'] = "Add Men & Women Info";
        $data['page_description'] = "Welcome to Admin Dashboard"; 
        return view('admin.front_page.menwomen_img')->with($data);
    }

    public function upload_men_women_img(Request $request)
    {
         
        $id = Auth::user()->id;
        $this->validate($request, [
            'img'  => 'required|mimes:jpeg,jpg,png|max:2048'
           ]);
        $image_path = $request->file('img');
         
        $new_name = rand() . '.' . $image_path->getClientOriginalExtension();  
        $move = $image_path->move(('img/team/'), $new_name);
        Men_Women_Image::create([
            'heading' => $request->input('heading'), 
            'img' =>  $new_name,
            'user_id' => $id,
            'date_con' => now(),
            'is_delete' => '1'
        ]);
        $notification = array(
            'message' => 'Upload SucessFully', 
            'alert-type' => 'success'
        );
        return redirect('admin/men_women_image_section')->with($notification);
        
        
    }

    public function men_women_list()
    {
        $data['page_title'] = "All Student";
        $data['page_description'] = "Welcome to Admin Dashboard";
        
        $men_women_list = \DB::table('men_women_images')
        ->leftjoin('users', 'users.id', '=', 'men_women_images.user_id')
        ->Select('men_women_images.heading', 'men_women_images.img', 'users.first_name', 'men_women_images.id')
        ->where('is_delete', '1')
        ->get();
        
        $data['men_women_list'] = $men_women_list;
        return view('admin.front_page.men_women_list')->with($data);
         
    }

    public function delete_men_women($id)
    {
        
        $delete_banners = DB::select("update men_women_images 
                                     set is_delete = '0'
                                     where id = '".$id."' ");
        $notification = array('message' => 'Delete SucessFully', 
                             'alert-type' => 'success' );
        return redirect()->route('men_women_list')->with($notification);
    }

    //Product Slider Front Page
    public function add_product_slider()
    { 
        $data['page_title'] = "Add Men & Women Info";
        $data['page_description'] = "Welcome to Admin Dashboard"; 
        return view('admin.front_page.product_slider')->with($data);
    }

    public function upload_product_slider(Request $request)
    {
         
        $id = Auth::user()->id;
        $this->validate($request, [
            'img'  => 'required|mimes:jpeg,jpg,png|max:2048'
           ]);
        $image_path = $request->file('img');
         
        $new_name = rand() . '.' . $image_path->getClientOriginalExtension();  
        $move = $image_path->move(('img/products/'), $new_name);
        Front_Product_Slider::create([
            'tag_heading' => $request->input('tag_heading'), 
            'img' =>  $new_name,
            'user_id' => $id,
            'date_con' => now(),
            'is_delete' => '1'
        ]);
        $notification = array(
            'message' => 'Upload SucessFully', 
            'alert-type' => 'success'
        );
        return redirect('admin/add_product_slider')->with($notification);
        
        
    }

    public function product_slider_list()
    {
        $data['page_title'] = "All Student";
        $data['page_description'] = "Welcome to Admin Dashboard";
        
        $product_slider_list = \DB::table('front_product_sliders')
        ->leftjoin('users', 'users.id', '=', 'front_product_sliders.user_id')
        ->Select('front_product_sliders.tag_heading', 'front_product_sliders.img', 'users.first_name', 'front_product_sliders.id')
        ->where('is_delete', '1')
        ->get();
        
        $data['product_slider_list'] = $product_slider_list;
        return view('admin.front_page.product_slider_list')->with($data);
         
    }

    public function delete_product_list($id)
    {
        
        $delete_banners = DB::select("update front_product_sliders 
                                     set is_delete = '0'
                                     where id = '".$id."' ");
        $notification = array('message' => 'Delete SucessFully', 
                             'alert-type' => 'success' );
        return redirect()->route('product_slider_list')->with($notification);
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
        return response()->json(['success'=>'Form is successfully submitted!']);
    }
    
    //Main Page Content
    public function add_content()
    { 
        $role = Auth::user()->role; 
        $data['page_title'] = "Add About Info";
        $data['page_description'] = "Welcome to Admin Dashboard"; 
        if($role == 'admin'){
            return view('admin.main_page.content')->with($data);
        }else{
            return view('social.main_page.content')->with($data);
        }
        
    }

    public function upload_content(Request $request)
    {
       // dd($request);
        $role = Auth::user()->role;  
        $id = Auth::user()->id;
         
        MainPageContent::create([
            'content' => $request->input('content'),  
            'user_id' => $id,
            'status' => 'open'
        ]);
        $notification = array(
            'message' => 'Upload SucessFully', 
            'alert-type' => 'success'
        );
        if($role == 'admin'){
            return redirect('admin/add_content')->with($notification);
        }else{
            return redirect('social/add_content')->with($notification);
        }
        
        
        
    }
    public function content_list()
    {
        $role = Auth::user()->role;  
        $data['page_title'] = "All Student";
        $data['page_description'] = "Welcome to Admin Dashboard";
        
        $content_list = \DB::table('main_page_contents')->where('status', 'open')->get();
        
        $data['content_list'] = $content_list;
        if($role == 'admin'){
            return view('admin.main_page.content_list')->with($data);
        }else{
            return view('social.main_page.content_list')->with($data);
        }
        
         
    }

    public function edit_content($id)
    { 
        $role = Auth::user()->role;  
        $edit_content = MainPageContent::find($id); 
        
        if($role == 'admin'){
            return view('admin.main_page.edit_content') 
                  ->with('edit_content', $edit_content);
        }else{
            return view('social.main_page.edit_content') 
                 ->with('edit_content', $edit_content);
        } 
        
    }

    public function update_content(Request $request, $id)
    { 
         
        $role = Auth::user()->role; 
        $user_id = Auth::user()->id; 
        DB::table('main_page_contents')->where('id', $id)
            ->update(['content' => $request->input('content'),
                     'meta_title' => $request->input('meta_title'), 
                     'meta_description' => $request->input('meta_description'), 
                     'meta_keywords' => $request->input('meta_keywords'), 
                      'user_id' => $user_id ]);
 
        $notification = array(
            'message' => 'Update SucessFully', 
            'alert-type' => 'success'
        );
        if($role == 'admin'){
            return redirect('admin/content_list')->with($notification);
        }else{
            return redirect('social/content_list')->with($notification);
        } 
         
    }
    public function delete_content($id)
    {
        $role = Auth::user()->role; 
        $user_id = Auth::user()->id; 
        $delete_banners = DB::select("update main_page_contents 
                                     set status = 'close', user_id = $user_id
                                     where id = '".$id."' ");
        $notification = array('message' => 'Delete SucessFully', 
                             'alert-type' => 'success' );
        if($role == 'admin'){
            return redirect('admin/content_list')->with($notification);
        }else{
            return redirect('social/content_list')->with($notification);
        } 
         
    }
}

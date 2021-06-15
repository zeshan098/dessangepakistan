<?php

namespace App\Http\Controllers;
use App\MajorType; 
use App\SubType; 
use App\InventoryMajorType; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use DB; 

class SubTypeController extends Controller
{
    public function men_sub_type($slug)
    {
        $data['page_title'] = "Create Student";
        $data['page_description'] = "Welcome to Admin Dashboard"; 
        $menu = MajorType::with('subtype')->where('category_type', 'men')->get();
        $women_menu = MajorType::with('subtype')->where('category_type', 'women')->get();
        $product_menu = InventoryMajorType::with('prosubtype')->where('status', 'open')->get(); 
        $men_sub_type = \DB::table('services_subtype') 
        ->leftjoin('services_majortype', 'services_majortype.id', '=', 'services_subtype.major_type_id')
        ->Select('services_subtype.*') 
        ->where('services_majortype.slug', $slug)->get();
        $men_sub_type_meta = \DB::table('services_majortype')->where('services_majortype.slug', $slug)->first();                       
        return view('web.sub_type.men_sub_type')->with($data) 
        ->with('men_sub_type', $men_sub_type)
        ->with('menu', $menu)
        ->with('product_menu', $product_menu)
        ->with('men_sub_type_meta', $men_sub_type_meta)
        ->with('women_menu', $women_menu); 
    }

    public function women_sub_type($slug)
    {
         
        $data['page_title'] = "Create Student";
        $data['page_description'] = "Welcome to Admin Dashboard"; 
        $menu = MajorType::with('subtype')->where('category_type', 'men')->get();
        $product_menu = InventoryMajorType::with('prosubtype')->where('status', 'open')->get(); 
        $women_menu = MajorType::with('subtype')->where('category_type', 'women')->get();
        $women_sub_type = \DB::table('services_subtype') 
        ->leftjoin('services_majortype', 'services_majortype.id', '=', 'services_subtype.major_type_id')
        ->Select('services_subtype.*') 
        ->where('services_majortype.slug', $slug)->get(); 
        $women_sub_type_meta = \DB::table('services_majortype')->where('services_majortype.slug', $slug)->first(); 
        
        return view('web.sub_type.women_sub_type')->with($data) 
        ->with('women_sub_type', $women_sub_type)
        ->with('menu', $menu)
        ->with('women_sub_type_meta', $women_sub_type_meta)
        ->with('product_menu', $product_menu)
        ->with('women_menu', $women_menu); 
    }
    
    //Sub Type
  
    public function add_sub_type()
    {
        $role = Auth::user()->role;
        $data['page_title'] = "Create Student";
        $data['page_description'] = "Welcome to Admin Dashboard";  
        $major_type = \DB::table('services_majortype')->where('status', 'open')->get(); 
        if($role == 'admin'){
            return view('admin.subtype_page.add_sub_type')->with($data)
            ->with('major_type', $major_type);
        }else{
            return view('social.subtype_page.add_sub_type')->with($data)
            ->with('major_type', $major_type);
        } 
        
    }

    public function create_sub_type(Request $request)
    { 
        
        $role = Auth::user()->role;
        $user_id = Auth::user()->id;
        $this->validate($request, [
            'image'  => 'required|mimes:jpeg,jpg,png|max:2048'
           ]);
        $image_path = $request->file('image');
         
        $new_name = rand() . '.' . $image_path->getClientOriginalExtension();  
        $move = $image_path->move(('img/sub_type/'), $new_name);
        SubType::create([
                'name' => $request->input('name'),
                'major_type_id' => $request->input('major_type_id'),  
                            'slug' => str_slug($request->input('slug')), 
                            'meta_title' => $request->input('meta_title'), 
                            'meta_description' => $request->input('meta_description'), 
                            'meta_keywords' => $request->input('meta_keywords'), 
                            'subtype_content' => $request->input('subtype_content'), 
                'image' =>  $new_name, 
                'status' => 'open' 
        ]);  
        $notification = array(
            'message' => 'Upload SucessFully', 
            'alert-type' => 'success'
        );

        if($role == 'admin'){
            return redirect('admin/add_sub_type')->with($notification);
        }else{
            return redirect('social/add_sub_type')->with($notification);
        } 
         
    }

    public function sub_type_list()
    {
        $role = Auth::user()->role;
        $data['page_title'] = "All Blog";
        $data['page_description'] = "Welcome to Admin Dashboard";
        
        $sub_type_list = \DB::table('services_subtype') 
                     ->leftjoin('services_majortype', 'services_majortype.id', '=', 'services_subtype.major_type_id')
                    ->Select('services_subtype.name',  'services_majortype.name  as mj', 'services_subtype.status',
                             'services_subtype.id')  
                    ->get();
        
        $data['sub_type_list'] = $sub_type_list;
        if($role == 'admin'){
            return view('admin.subtype_page.sub_type_list')->with($data);
        }else{
            return view('social.subtype_page.sub_type_list')->with($data);
        } 
         
    }

    public function edit_sub_type($id)
    {  
        $role = Auth::user()->role;
        $edit_sub_type = SubType::find($id); 
        $mj_type = \DB::table('services_majortype')->where('status', 'open')->get(); 

        if($role == 'admin'){
            return view('admin.subtype_page.edit_sub_type') 
                  ->with('edit_sub_type', $edit_sub_type)
                  ->with('mj_type', $mj_type);
        }else{
            return view('social.subtype_page.edit_sub_type') 
                  ->with('edit_sub_type', $edit_sub_type)
                  ->with('mj_type', $mj_type);
        } 
        
    }


    public function update_sub_type(Request $request, $id)
    { 
       
        $role = Auth::user()->role;   
        if($request->file('image') != ''){  
           
            $this->validate($request, [
                'image'  => 'required|mimes:jpeg,jpg,png|max:2048'
            ]);
            $image_path = $request->file('image');
             
            $new_name = rand() . '.' . $image_path->getClientOriginalExtension();  
            $move = $image_path->move(('img/sub_type/'), $new_name);
            DB::table('services_subtype')->where('id', $id)
                            ->update(['name' => $request->input('name'), 
                            'major_type_id' => $request->input('major_type_id'), 
                            'slug' => str_slug($request->input('slug')), 
                            'meta_title' => $request->input('meta_title'), 
                            'meta_description' => $request->input('meta_description'), 
                            'meta_keywords' => $request->input('meta_keywords'), 
                            'subtype_content' => $request->input('subtype_content'),  
                            'image' =>  $new_name, 
                            'status' => $request->input('status')  ]);
 

        }
        else{
            
            DB::table('services_subtype')->where('id', $id)
                            ->update(['name' => $request->input('name'), 
                            'major_type_id' => $request->input('major_type_id'), 
                            'slug' => str_slug($request->input('slug')), 
                            'meta_title' => $request->input('meta_title'), 
                            'meta_description' => $request->input('meta_description'), 
                            'meta_keywords' => $request->input('meta_keywords'), 
                            'subtype_content' => $request->input('subtype_content'),   
                            'status' => $request->input('status') ]);
 
        }
        
        $notification = array(
            'message' => 'Update SucessFully', 
            'alert-type' => 'success'
        );
        if($role == 'admin'){
            return redirect('admin/sub_type_list')->with($notification);
        }else{
            return redirect('social/sub_type_list')->with($notification);
        } 
        
        
        
    }
}

<?php

namespace App\Http\Controllers;
use App\MajorType; 
use App\SubType; 
use App\InventoryMajorType; 
use App\InventorySubType; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use DB; 

class InventoryMajortypesController extends Controller
{


    public function product_major_type()
    {
        $data['page_title'] = "Create Student";
        $data['page_description'] = "Welcome to Admin Dashboard";
        $menu = MajorType::with('subtype')->where('category_type', 'men')->get();
        $women_menu = MajorType::with('subtype')->where('category_type', 'women')->get();
        $product_menu = InventoryMajorType::with('prosubtype')->where('status', 'open')->get(); 
        $main_content =\DB::table('inventory_productmajortype')->where('status', 'open')->get();   
        return view('web.product.major_type')->with($data) 
        ->with('menu', $menu)
        ->with('women_menu', $women_menu) 
        ->with('product_menu', $product_menu)
        ->with('main_content', $main_content); 
    }

    public function product_major($id)
    {
        $data['page_title'] = "Create Student";
        $data['page_description'] = "Welcome to Admin Dashboard";
        $menu = MajorType::with('subtype')->where('category_type', 'men')->get();
        $women_menu = MajorType::with('subtype')->where('category_type', 'women')->get();
        $product_menu = InventoryMajorType::with('prosubtype')->where('status', 'open')->get(); 
        $main_content =\DB::table('inventory_productsubtype')->where('inventory_major_type_id', $id)->where('status', 'open')->get();
        //dd($main_content);   
        return view('web.product.sub_type')->with($data) 
        ->with('menu', $menu)
        ->with('women_menu', $women_menu) 
        ->with('product_menu', $product_menu)
        ->with('main_content', $main_content); 
    }

    //Major Type
  
    public function add_product_major_type()
    {
        $role = Auth::user()->role;
        $data['page_title'] = "Create Student";
        $data['page_description'] = "Welcome to Admin Dashboard";   
        if($role == 'admin'){
            return view('admin.inventory_page.major_type.add_product_major_type')->with($data);
        }elseif($role == 'social'){
            return view('social.inventory_page.major_type.add_product_major_type')->with($data);
        }elseif($role == 'reception'){
            return view('reception.inventory_page.major_type.add_product_major_type')->with($data);
        }else{
            return redirect()->back();
        }
        
    }


    public function create_product_major_type(Request $request)
    { 
        
        $role = Auth::user()->role;
        $user_id = Auth::user()->id;
        if($request->file('image') != ''){  
            $this->validate($request, [
                'image'  => 'required|mimes:jpeg,jpg,png|max:2048'
               ]);
            $image_path = $request->file('image');
             
            $new_name = rand() . '.' . $image_path->getClientOriginalExtension();  
            $move = $image_path->move(('img/product_major_type/'), $new_name);
            InventoryMajorType::create([
                    'name' => $request->input('name'), 
                    'slug' => str_slug($request->input('slug')), 
                    'meta_title' => $request->input('meta_title'), 
                    'meta_description' => $request->input('meta_description'), 
                    'meta_keywords' => $request->input('meta_keywords'), 
                    'major_content' => $request->input('major_content'), 
                    'image' =>  $new_name, 
                    'status' => 'open',
                    'branch_id' => '1' 
            ]);
        }else{ 
            InventoryMajorType::create([
                    'name' => $request->input('name'), 
                    'slug' => str_slug($request->input('slug')), 
                    'meta_title' => $request->input('meta_title'), 
                    'meta_description' => $request->input('meta_description'), 
                    'meta_keywords' => $request->input('meta_keywords'), 
                    'major_content' => $request->input('major_content'),  
                    'status' => 'open',
                    'branch_id' => '1' 
            ]);
        }
        
          
        $notification = array(
            'message' => 'Upload SucessFully', 
            'alert-type' => 'success'
        );

        if($role == 'admin'){
            return redirect('admin/product_major_type_list')->with($notification);
        }elseif($role == 'social'){
            return view('social/product_major_type_list')->with($data);
        }elseif($role == 'reception'){
            return view('reception/product_major_type_list')->with($data);
        }else{
            return redirect()->back();
        }
         
    }

    public function product_major_type_list()
    {
        $role = Auth::user()->role;
        $data['page_title'] = "All Blog";
        $data['page_description'] = "Welcome to Admin Dashboard";
        
        $major_type_list = \DB::table('inventory_productmajortype') 
                    ->Select('inventory_productmajortype.name', 'inventory_productmajortype.status',   'inventory_productmajortype.id')  
                    ->get();
        
        $data['major_type_list'] = $major_type_list;
        if($role == 'admin'){
            return view('admin.inventory_page.major_type.product_major_type_list')->with($data);
        }elseif($role == 'social'){
            return view('social.inventory_page.major_type.product_major_type_list')->with($data);
        }elseif($role == 'reception'){
            return view('reception.inventory_page.major_type.product_major_type_list')->with($data);
        }else{
            return redirect()->back();
        }
         
    }

    public function edit_product_major_type($id)
    {  
        $role = Auth::user()->role;
        $edit_major_type = InventoryMajorType::find($id); 
         
        if($role == 'admin'){
            return view('admin.inventory_page.major_type.edit_product_major_type') 
                  ->with('edit_major_type', $edit_major_type);
        }elseif($role == 'social'){
            return view('social.inventory_page.major_type.edit_product_major_type')->with('edit_major_type', $edit_major_type);
        }elseif($role == 'reception'){
            return view('reception.inventory_page.major_type.edit_product_major_type')->with('edit_major_type', $edit_major_type);
        }else{
            return redirect()->back();
        }
        
    }

    public function update_product_major_type(Request $request, $id)
    { 
       
        $role = Auth::user()->role;   
        if($request->file('image') != ''){  
           
            $this->validate($request, [
                'image'  => 'required|mimes:jpeg,jpg,png|max:2048'
            ]);
            $image_path = $request->file('image');
             
            $new_name = rand() . '.' . $image_path->getClientOriginalExtension();  
            $move = $image_path->move(('img/major_type/'), $new_name);
            DB::table('inventory_productmajortype')->where('id', $id)
                            ->update(['name' => $request->input('name'),  
                            'slug' => str_slug($request->input('slug')), 
                            'meta_title' => $request->input('meta_title'), 
                            'meta_description' => $request->input('meta_description'), 
                            'meta_keywords' => $request->input('meta_keywords'), 
                            'major_content' => $request->input('major_content'), 
                            'image' =>  $new_name, 
                            'status' => $request->input('status')  ]);
 

        }
        else{
            
            DB::table('inventory_productmajortype')->where('id', $id)
                            ->update(['name' => $request->input('name'),  
                            'slug' => str_slug($request->input('slug')), 
                            'meta_title' => $request->input('meta_title'), 
                            'meta_description' => $request->input('meta_description'), 
                            'meta_keywords' => $request->input('meta_keywords'), 
                            'major_content' => $request->input('major_content'), 
                            'status' => $request->input('status') ]);
 
        }
        
        $notification = array(
            'message' => 'Update SucessFully', 
            'alert-type' => 'success'
        );
        if($role == 'admin'){
            return redirect('admin/product_major_type_list')->with($notification);
        }elseif($role == 'social'){
            return redirect('social/product_major_type_list')->with($notification);
        }elseif($role == 'reception'){
            return redirect('reception/product_major_type_list')->with($notification);
        }else{
            return redirect()->back();
        }
        
        
        
    }
}

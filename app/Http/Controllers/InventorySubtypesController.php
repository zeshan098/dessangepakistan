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
 

class InventorySubtypesController extends Controller
{

    public function product_sub_type($id)
    {
        $data['page_title'] = "Create Student";
        $data['page_description'] = "Welcome to Admin Dashboard";
        $menu = MajorType::with('subtype')->where('category_type', 'men')->get();
        $women_menu = MajorType::with('subtype')->where('category_type', 'women')->get();
        $product_menu = InventoryMajorType::with('prosubtype')->where('status', 'open')->get(); 
        $main_content =\DB::table('inventory_product')->where('sub_type_id',$id)->where('status', 'open')->get();  
        //dd($main_content); 
        return view('web.product.view_products')->with($data) 
        ->with('menu', $menu)
        ->with('women_menu', $women_menu) 
        ->with('product_menu', $product_menu)
        ->with('main_content', $main_content); 
    }

    //Sub Type
  
    public function add_product_sub_type()
    {
        $role = Auth::user()->role;
        $data['page_title'] = "Create Student";
        $data['page_description'] = "Welcome to Admin Dashboard";  
        $major_type = \DB::table('inventory_productmajortype')->where('status', 'open')->get(); 
        if($role == 'admin'){
            return view('admin.inventory_page.sub_type.add_product_sub_type')->with($data)
            ->with('major_type', $major_type);
        }elseif($role == 'social'){
            return view('social.inventory_page.sub_type.add_product_sub_type')->with($data)
            ->with('major_type', $major_type);
        }elseif($role == 'reception'){
            return view('reception.inventory_page.sub_type.add_product_sub_type')->with($data)
            ->with('major_type', $major_type);
        }else{
            return redirect()->back();
        } 
        
    }

    public function create_product_sub_type(Request $request)
    { 
        
        $role = Auth::user()->role;
        $user_id = Auth::user()->id;
        if($request->file('image') != ''){  
            $this->validate($request, [
                'image'  => 'required|mimes:jpeg,jpg,png|max:2048'
               ]);
            $image_path = $request->file('image');
             
            $new_name = rand() . '.' . $image_path->getClientOriginalExtension();  
            $move = $image_path->move(('img/product_sub_type/'), $new_name);
            InventorySubType::create([
                                'name' => $request->input('name'),
                                'inventory_major_type_id' => $request->input('major_type_id'),  
                                'slug' => str_slug($request->input('slug')), 
                                'meta_title' => $request->input('meta_title'), 
                                'meta_description' => $request->input('meta_description'), 
                                'meta_keywords' => $request->input('meta_keywords'), 
                                'subtype_content' => $request->input('subtype_content'), 
                                'image' =>  $new_name, 
                                'status' => 'open' 
            ]);  
        }else{
             
            InventorySubType::create([
                                'name' => $request->input('name'),
                                'inventory_major_type_id' => $request->input('major_type_id'),  
                                'slug' => str_slug($request->input('slug')), 
                                'meta_title' => $request->input('meta_title'), 
                                'meta_description' => $request->input('meta_description'), 
                                'meta_keywords' => $request->input('meta_keywords'), 
                                'subtype_content' => $request->input('subtype_content'),  
                                'status' => 'open' 
            ]);  
        }
        
        $notification = array(
            'message' => 'Upload SucessFully', 
            'alert-type' => 'success'
        );

        if($role == 'admin'){
            return redirect('admin/product_sub_type_list')->with($notification);
        }elseif($role == 'social'){
            return redirect('social/product_sub_type_list')->with($notification);
        }elseif($role == 'reception'){
            return redirect('reception/product_sub_type_list')->with($notification);
        }else{
            return redirect()->back();
        } 
         
    }

    public function product_sub_type_list()
    {
        $role = Auth::user()->role;
        
        $data['page_title'] = "All Blog";
        $data['page_description'] = "Welcome to Admin Dashboard";
        
        $sub_type_list = \DB::table('inventory_productsubtype') 
                     ->leftjoin('inventory_productmajortype', 'inventory_productmajortype.id', '=', 'inventory_productsubtype.inventory_major_type_id')
                    ->Select('inventory_productsubtype.name',  'inventory_productmajortype.name  as mj', 'inventory_productsubtype.status',
                             'inventory_productsubtype.id')  
                    ->get();
        $data['sub_type_list'] = $sub_type_list;
        if($role == 'admin'){
            return view('admin.inventory_page.sub_type.product_sub_type_list')->with($data);
        }elseif($role == 'social'){ 
            return view('social.inventory_page.sub_type.product_sub_type_list')->with($data);
        }elseif($role == 'reception'){
            return view('reception.inventory_page.sub_type.product_sub_type_list')->with($data);
        }else{
            return redirect()->back();
        } 
         
    }

    public function edit_product_sub_type($id)
    {  
        $role = Auth::user()->role;
        $edit_sub_type = InventorySubType::find($id); 
        $mj_type = \DB::table('inventory_productmajortype')->where('status', 'open')->get(); 

        if($role == 'admin'){
            return view('admin.inventory_page.sub_type.edit_sub_type') 
                  ->with('edit_sub_type', $edit_sub_type)
                  ->with('mj_type', $mj_type);
        }elseif($role == 'social'){
            return view('social.inventory_page.sub_type.edit_sub_type') 
                  ->with('edit_sub_type', $edit_sub_type)
                  ->with('mj_type', $mj_type);
        }elseif($role == 'reception'){
            return view('reception.inventory_page.sub_type.edit_sub_type') 
                  ->with('edit_sub_type', $edit_sub_type)
                  ->with('mj_type', $mj_type);
        }else{
            return redirect()->back();
        } 
        
    }


    public function update_product_sub_type(Request $request, $id)
    { 
       
        $role = Auth::user()->role;   
        if($request->file('image') != ''){  
           
            $this->validate($request, [
                'image'  => 'required|mimes:jpeg,jpg,png|max:2048'
            ]);
            $image_path = $request->file('image');
             
            $new_name = rand() . '.' . $image_path->getClientOriginalExtension();  
            $move = $image_path->move(('img/product_sub_type/'), $new_name);
            DB::table('inventory_productsubtype')->where('id', $id)
                            ->update(['name' => $request->input('name'), 
                            'inventory_major_type_id' => $request->input('major_type_id'), 
                            'slug' => str_slug($request->input('slug')), 
                            'meta_title' => $request->input('meta_title'), 
                            'meta_description' => $request->input('meta_description'), 
                            'meta_keywords' => $request->input('meta_keywords'), 
                            'subtype_content' => $request->input('subtype_content'),  
                            'image' =>  $new_name, 
                            'status' => $request->input('status')  ]);
 

        }
        else{
            
            DB::table('inventory_productsubtype')->where('id', $id)
                            ->update(['name' => $request->input('name'), 
                            'inventory_major_type_id' => $request->input('major_type_id'), 
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
            return redirect('admin/product_sub_type_list')->with($notification);
        }elseif($role == 'social'){
            return redirect('social/product_sub_type_list')->with($notification);
        } elseif($role == 'reception'){
            return redirect('reception/product_sub_type_list')->with($notification);
        } else{
            return redirect()->back();
        } 
        
        
        
    }
}

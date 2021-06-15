<?php

namespace App\Http\Controllers;
use App\MajorType; 
use App\SubType; 
use App\InventorySubType; 
use App\InventoryProduct; 
use App\InventoryMajorType; 


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use DB; 

class InventoryController extends Controller
{
    public function product($id)
    {
        $data['page_title'] = "Create Student";
        $data['page_description'] = "Welcome to Admin Dashboard";
        $menu = MajorType::with('subtype')->where('category_type', 'men')->get();
        $women_menu = MajorType::with('subtype')->where('category_type', 'women')->get();
        $product_menu = InventoryMajorType::with('prosubtype')->where('status', 'open')->get(); 
        $main_content =\DB::table('inventory_product')->where('id',$id)->where('status', 'open')->first();  
        //dd($main_content); 
        return view('web.product.products')->with($data) 
        ->with('menu', $menu)
        ->with('women_menu', $women_menu) 
        ->with('product_menu', $product_menu)
        ->with('main_content', $main_content); 
    }

    //   Inventory backend Section
    public function add_product()
    {
        $role = Auth::user()->role;
        $data['page_title'] = "Create Student";
        $data['page_description'] = "Welcome to Admin Dashboard";  
        $mj_type = \DB::table('inventory_productmajortype')->where('status', 'open')->get(); 
        if($role == 'admin'){
            return view('admin.inventory_page.product_page.add_product')->with($data) 
            ->with('mj_type', $mj_type);
        }elseif($role == 'social'){
            return view('social.inventory_page.product_page.add_product')->with($data)
            ->with('mj_type', $mj_type);
        }elseif($role == 'reception'){
            return view('reception.inventory_page.product_page.add_product')->with($data)
            ->with('mj_type', $mj_type);
        }else{
            return redirect()->back();
        } 
        
    }

    public function get_sub_type(Request $request)
    {
        $role = Auth::user()->role; 
        $service_content = \DB::table('inventory_productsubtype')
                            ->where('inventory_productsubtype.inventory_major_type_id', $request->input('values'))->get();  
        return response()->json($service_content);
    }


    public function create_product(Request $request)
    {  
        $role = Auth::user()->role;
        if($request->file('picture') != ''){ 
            $this->validate($request, [
                'picture'  => 'required|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=1000,max_height=1000'
               ]);
            $image_path = $request->file('picture');
             
            $new_name = rand() . '.' . $image_path->getClientOriginalExtension();  
            $move = $image_path->move(('img/product/'), $new_name);
            InventoryProduct::create([
                    'product_name' => $request->input('product_name'),
                    'description' => $request->input('description'), 
                    'slug' => $request->input('slug'),
                    'meta_title' => $request->input('meta_title'),
                    'meta_description' => $request->input('meta_description'),
                    'meta_keywords' => $request->input('meta_keywords'),
                    'cost' => $request->input('cost'), 
                    'reference_number' => $request->input('reference_number'), 
                    'major_type_id' => $request->input('major_type_id'), 
                    'sub_type_id' => $request->input('sub_type_id'),   
                    'picture' =>  $new_name, 
                    'status' => 'open',   
                    'user_id' => Auth::user()->id,
                    'date' => now()
            ]);
        }else{
             
            InventoryProduct::create([
                    'product_name' => $request->input('product_name'),
                    'description' => $request->input('description'), 
                    'slug' => $request->input('slug'),
                    'meta_title' => $request->input('meta_title'),
                    'meta_description' => $request->input('meta_description'),
                    'meta_keywords' => $request->input('meta_keywords'),
                    'cost' => $request->input('cost'), 
                    'reference_number' => $request->input('reference_number'), 
                    'major_type_id' => $request->input('major_type_id'), 
                    'sub_type_id' => $request->input('sub_type_id'),    
                    'status' => 'open',   
                    'user_id' => Auth::user()->id,
                    'date' => now()
            ]);
        }
        
          
        $notification = array(
            'message' => 'Upload SucessFully', 
            'alert-type' => 'success'
        );

        if($role == 'admin'){
            return redirect('admin/product_list')->with($notification);
        }elseif($role == 'social'){
            return redirect('social/product_list')->with($notification);
        }elseif($role == 'reception'){
            return redirect('reception/product_list')->with($notification);
        }else{
            return redirect()->back();
        } 
         
    }

    public function product_list()
    {
        $role = Auth::user()->role;
        $data['page_title'] = "All Blog";
        $data['page_description'] = "Welcome to Admin Dashboard";
        
        $product_list = \DB::table('inventory_product') 
                    ->Select('inventory_product.product_name',  'inventory_product.reference_number',  'inventory_product.status',
                    'inventory_product.id')  
                    ->get();
        
        $data['product_list'] = $product_list;
        if($role == 'admin'){
            return view('admin.inventory_page.product_page.product_list')->with($data);
        }elseif($role == 'social'){
            return view('social.inventory_page.product_page.product_list')->with($data);
        }elseif($role == 'reception'){
            return view('reception.inventory_page.product_page.product_list')->with($data);
        }else{
            return redirect()->back();
        }  
         
    }


    public function edit_product($id)
    { 
        $role = Auth::user()->role;  
        $edit_product = InventoryProduct::find($id); 
       
        $select_sub_type = \DB::table('inventory_productsubtype')  
                        ->where('inventory_productsubtype.id', $edit_product->sub_type_id)
                        ->first();  
        $mj_type = \DB::table('inventory_productmajortype')->where('status', 'open')->get(); 
         
        
        if($role == 'admin'){
            return view('admin.inventory_page.product_page.edit_product') 
                  ->with('edit_product', $edit_product) 
                  ->with('mj_type', $mj_type) 
                  ->with('select_sub_type', $select_sub_type);
        }elseif($role == 'social'){
            return view('social.inventory_page.product_page.edit_product') 
            ->with('edit_product', $edit_product) 
            ->with('mj_type', $mj_type) 
            ->with('select_sub_type', $select_sub_type);
        }elseif($role == 'reception'){
            return view('reception.inventory_page.product_page.edit_product') 
            ->with('edit_product', $edit_product) 
            ->with('mj_type', $mj_type) 
            ->with('select_sub_type', $select_sub_type);
        }else{
            return redirect()->back();
        }  
        
    }

    public function update_product(Request $request, $id)
    { 
        // dd($request->file('image'));
        $role = Auth::user()->role;  
        
        if($request->file('picture') != ''){  
           
            $this->validate($request, [
                'picture'  => 'required|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=1000,max_height=1000'
            ]);
            $image_path = $request->file('picture');
             
            $new_name = rand() . '.' . $image_path->getClientOriginalExtension();  
            $move = $image_path->move(('img/product/'), $new_name);
            DB::table('inventory_product')->where('id', $id)
                            ->update(['product_name' => $request->input('product_name'),
                            'description' => $request->input('description'),
                            'reference_number' => $request->input('reference_number'),  
                            'slug' => $request->input('slug'),
                            'meta_title' => $request->input('meta_title'),
                            'meta_description' => $request->input('meta_description'),
                            'meta_keywords' => $request->input('meta_keywords'),
                            'cost' => $request->input('cost'),  
                            'major_type_id' => $request->input('major_type_id'), 
                            'sub_type_id' => $request->input('sub_type_id'), 
                            'picture' =>  $new_name, 
                            'status' => $request->input('status'),   
                            'user_id' => Auth::user()->id,
                            'date' => now() ]);
 

        }
        else{
            
            DB::table('inventory_product')->where('id', $id)
                            ->update(['product_name' => $request->input('product_name'),
                            'description' => $request->input('description'),
                            'reference_number' => $request->input('reference_number'),  
                            'slug' => $request->input('slug'),
                            'meta_title' => $request->input('meta_title'),
                            'meta_description' => $request->input('meta_description'),
                            'meta_keywords' => $request->input('meta_keywords'),
                            'cost' => $request->input('cost'),  
                            'major_type_id' => $request->input('major_type_id'), 
                            'sub_type_id' => $request->input('sub_type_id'),  
                            'status' => $request->input('status'),  
                            'user_id' => Auth::user()->id,
                            'date' => now() ]);

        

        }
        
        $notification = array(
            'message' => 'Update SucessFully', 
            'alert-type' => 'success'
        );
        if($role == 'admin'){
            return redirect('admin/product_list')->with($notification);
        }elseif($role == 'social'){
            return redirect('social/product_list')->with($notification);
        }elseif($role == 'reception'){
            return redirect('reception/product_list')->with($notification);
        }else{
            return redirect()->back();
        }  
         
        
    }
}

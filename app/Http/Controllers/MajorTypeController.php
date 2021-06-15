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

class MajorTypeController extends Controller
{
    public function mens_major_type()
    {
        $data['page_title'] = "Create Student";
        $data['page_description'] = "Welcome to Admin Dashboard"; 
        $menu = MajorType::with('subtype')->where('category_type', 'men')->get();
        $women_menu = MajorType::with('subtype')->where('category_type', 'women')->get();
        $product_menu = InventoryMajorType::with('prosubtype')->where('status', 'open')->get(); 
        $major_type = \DB::table('services_majortype')->where('category_type', '=','men')->get(); 
        return view('web.major_type.major_type')->with($data) 
        ->with('major_type', $major_type)
        ->with('menu', $menu)
        ->with('women_menu', $women_menu)
        ->with('product_menu', $product_menu); 
    }

    public function womens_major_type()
    {
        $data['page_title'] = "Create Student";
        $data['page_description'] = "Welcome to Admin Dashboard"; 
        $menu = MajorType::with('subtype')->where('category_type', 'men')->get();
        $women_menu = MajorType::with('subtype')->where('category_type', 'women')->get();
        $product_menu = InventoryMajorType::with('prosubtype')->where('status', 'open')->get(); 
        
        $major_type1 = \DB::table('services_majortype')->where('id', '=','40')->first();
        $major_type2 = \DB::table('services_majortype')->where('id', '=','41')->first();
        $major_type3 = \DB::table('services_majortype')->where('id', '=','42')->first();
        $major_type4 = \DB::table('services_majortype')->where('id', '=','43')->first();
        $major_type5 = \DB::table('services_majortype')->where('id', '=','44')->first();
        $major_type6 = \DB::table('services_majortype')->where('id', '=','45')->first();
        return view('web.major_type.womens_major_type')->with($data) 
        ->with('major_type1', $major_type1)
        ->with('major_type2', $major_type2)
        ->with('major_type3', $major_type3)
        ->with('major_type4', $major_type4)
        ->with('major_type5', $major_type5)
        ->with('major_type6', $major_type6)
        ->with('menu', $menu)
        ->with('women_menu', $women_menu)
        ->with('product_menu', $product_menu); 
    }
}

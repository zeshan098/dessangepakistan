<?php

namespace App\Http\Controllers;
use App\UserService; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class SitemapController extends Controller
{
    public function index()
    {
        $men_major_type = \DB::table('services_majortype') 
                ->Select('services_majortype.slug') 
                ->where('services_majortype.status', 'open')
                ->where('services_majortype.category_type', 'men')
                ->get(); 
        $women_major_type = \DB::table('services_majortype') 
                ->Select('services_majortype.slug') 
                ->where('services_majortype.status', 'open')
                ->where('services_majortype.category_type', 'women')
                ->get(); 
        $services = \DB::table('services_service') 
                ->Select('services_service.id',  'services_service.start_date' ) 
                ->where('services_service.status', 'open')
                ->get(); 
                
        $sub_type_women = \DB::table('services_subtype') 
                        ->leftjoin('services_majortype', 'services_majortype.id', '=', 'services_subtype.major_type_id')
                        ->Select('services_subtype.slug') 
                        ->whereNotIn('services_subtype.slug', ['female-polisher','female-sauna'])
                        ->where('services_majortype.status', 'open') 
                        ->where('services_majortype.category_type', 'women')
                        ->get();  
        return response()->view('web.sitemap.index', [
                       'services' => $services,
                       'men_major_type' => $men_major_type,
                       'women_major_type' => $women_major_type,
                       'sub_type_women' => $sub_type_women])
                       ->header('Content-Type', 'text/xml'); 
    }

 
}

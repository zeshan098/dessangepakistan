<?php

namespace App\Http\Controllers;
use App\SaveService;
use App\CustomerDetail;
use App\MajorType; 
use App\SubType; 
use App\UserService; 
use App\InventoryMajorType; 
use App\SaveProduct;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use DB; 

class Service extends Controller
{
     
    
    public function appointment_list()
    {
        $role = Auth::user()->role;
        $branch = Auth::user()->branch_id;
        $data['page_title'] = "All Student";
        $data['page_description'] = "Welcome to Admin Dashboard";
        
        $appointment_list = \DB::table('customer_details')
        ->leftjoin('save_services', 'save_services.bill_id', '=', 'customer_details.id')
        ->leftjoin('services_service', 'services_service.id', '=', 'save_services.service_id')
        ->Select('customer_details.name as cus_name', 'customer_details.phone_number', 
           'services_service.name', 'save_services.qty', 'save_services.datetime', 'customer_details.branch_id', 'save_services.id') 
         ->where('services_service.service_category', 'service')
         ->orderBy('save_services.id', 'DESC')
        ->get();
        // dd($banner_list);
        $data['appointment_list'] = $appointment_list;
        if($role == 'admin'){
            return view('admin.appointment.appointment')->with($data);
        }elseif($role == 'social'){
            return view('social.appointment.appointment')->with($data);
        }elseif($role == 'reception'){
            $appointment_list = \DB::table('customer_details')
                    ->leftjoin('save_services', 'save_services.bill_id', '=', 'customer_details.id')
                    ->leftjoin('services_service', 'services_service.id', '=', 'save_services.service_id')
                    ->leftjoin('users', 'users.branch_id', '=', 'customer_details.branch_id')
                    ->Select('customer_details.name as cus_name', 'customer_details.phone_number', 
                            'services_service.name', 'save_services.qty', 'save_services.datetime', 
                            'customer_details.branch_id', 'save_services.id') 
                    ->where('services_service.service_category', 'service')
                    ->where('users.branch_id', $branch)
                    ->orderBy('save_services.id', 'DESC')
                    ->get();
            //dd($appointment_list);
            return view('reception.appointment.appointment')->with('appointment_list', $appointment_list);
        }
        else{
            return redirect()->back();
        }
         
    }
    
    public function deal_lists()
    {
        $role = Auth::user()->role;
        $branch = Auth::user()->branch_id;
        $data['page_title'] = "All Student";
        $data['page_description'] = "Welcome to Admin Dashboard";
        
        $deal_lists = \DB::table('customer_details')
        ->leftjoin('save_services', 'save_services.bill_id', '=', 'customer_details.id')
        ->leftjoin('services_service', 'services_service.id', '=', 'save_services.service_id')
        ->Select('customer_details.name as cus_name', 'customer_details.phone_number', 
                'services_service.name', 'save_services.qty', 'save_services.datetime', 
                'customer_details.branch_id', 'save_services.id') 
         ->where('services_service.service_category', 'deal')
         ->orderBy('save_services.id', 'DESC')
        ->get(); 
        $data['deal_lists'] = $deal_lists;
        if($role == 'admin'){
            return view('admin.appointment.deal_list')->with($data);
        }elseif($role == 'social'){
            return view('social.appointment.deal_list')->with($data);
        
        }elseif($role == 'reception'){
            $deal_lists = \DB::table('customer_details')
            ->leftjoin('save_services', 'save_services.bill_id', '=', 'customer_details.id')
            ->leftjoin('services_service', 'services_service.id', '=', 'save_services.service_id')
            ->leftjoin('users', 'users.branch_id', '=', 'customer_details.branch_id')
            ->Select('customer_details.name as cus_name', 'customer_details.phone_number', 
                    'services_service.name', 'save_services.qty', 'save_services.datetime', 
                    'customer_details.branch_id','save_services.id') 
             ->where('services_service.service_category', 'deal')
             ->where('users.branch_id', $branch)
             ->orderBy('save_services.id', 'DESC')
            ->get();  
            return view('reception.appointment.deal_list')->with('deal_lists', $deal_lists);
        }
        else{
            return redirect()->back();
        }
        
         
    }

    public function men_services($id)
    {
        
        $menu = MajorType::with('subtype')->where('category_type', 'men')->get();
        $women_menu = MajorType::with('subtype')->where('category_type', 'women')->get(); 
        $product_menu = InventoryMajorType::with('prosubtype')->where('status', 'open')->get();   
        $service_detail = \DB::table('services_service')
                           ->Select('services_service.name', 'services_service.picture', 'services_service.cost', 'services_service.id')
                           ->where('services_service.sub_type_id', $id)
                           ->where('services_service.status', 'open')->get();   
        return view('web.service.men_services')
        ->with('menu', $menu)
        ->with('women_menu', $women_menu)
        ->with('product_menu', $product_menu)
        ->with('service_detail', $service_detail);
    }

    public function women_services($slug)
    {
        
        $menu = MajorType::with('subtype')->where('category_type', 'men')->get();
        $women_menu = MajorType::with('subtype')->where('category_type', 'women')->get();  
        $product_menu = InventoryMajorType::with('prosubtype')->where('status', 'open')->get();  
        $service_detail = \DB::table('services_service')
                           ->Select('services_service.name', 'services_service.picture', 'services_service.cost', 'services_service.id') 
                           ->leftjoin('services_subtype', 'services_subtype.id', '=', 'services_service.sub_type_id')
                           ->where('services_subtype.slug', $slug)
                           ->where('services_service.status', 'open')->get();  
        $women_sub_type_meta = \DB::table('services_subtype')->where('services_subtype.slug', $slug)->first(); 
        return view('web.service.women_services')
        ->with('menu', $menu)
        ->with('women_menu', $women_menu)
        ->with('product_menu', $product_menu)
        ->with('women_sub_type_meta', $women_sub_type_meta)
        ->with('service_detail', $service_detail);
    }
    
    public function search_service(Request $request){
        $menu = MajorType::with('subtype')->where('category_type', 'men')->get();
        $women_menu = MajorType::with('subtype')->where('category_type', 'women')->get();  
        $product_menu = InventoryMajorType::with('prosubtype')->where('status', 'open')->get();  

        $search = $request->input('search');  
        if($search == ''){
            $search_post = \DB::table('services_service')
                           ->Select('services_service.id','services_service.name')
                           ->where('services_service.status', 'open')->get();   
        }else{
            $search_post = \DB::table('services_service')
                           ->Select('services_service.id','services_service.name', 'services_service.description')
                           ->where('services_service.status', 'open')
                           ->where('services_service.name', 'like', '%' .$search . '%')->get();
        
        }
        
        return view('web.service.search')
        ->with('menu', $menu)
        ->with('women_menu', $women_menu)
        ->with('product_menu', $product_menu)
        ->with('search_post', $search_post);
     }
     
    public function service($id)
    {
        
        $menu = MajorType::with('subtype')->where('category_type', 'men')->get();
        $women_menu = MajorType::with('subtype')->where('category_type', 'women')->get(); 
        $product_menu = InventoryMajorType::with('prosubtype')->where('status', 'open')->get();   
        $service_detail = \DB::table('services_service')
                           ->Select('services_service.name','services_service.description', 'services_service.picture', 'services_service.cost', 'services_service.meta_title',
                           'services_service.meta_description','services_service.meta_keywords', 'services_service.id','services_service.service_content',
                           'services_service.video_link', 'services_service.duration')
                           ->where('services_service.id', $id)
                           ->where('services_service.status', 'open')->first();   
        return view('web.service.service')
        ->with('menu', $menu)
        ->with('women_menu', $women_menu)
        ->with('product_menu', $product_menu)
        ->with('service_detail', $service_detail);
    }

    public function get_service_subtype(Request $request)
    {
         
        $service_detail = \DB::table('services_service')
                           ->Select('services_service.name', 'services_service.sub_type_id', 'services_service.id')
                           ->where('services_service.sub_type_id', $request->input('values'))->get();  
        return response()->json($service_detail);
    }

    public function get_service(Request $request)
    {
         
        $service_content = \DB::table('services_service')
                           ->Select('services_service.name', 'services_service.description', 'services_service.id')
                           ->where('services_service.id', $request->input('values'))->get();  
        return response()->json($service_content);
    }

    public function get_service_detail($id)
    {
         
        $service_detail = \DB::table('services_service')->where('services_service.status', 'open')
                          ->where('services_service.id', $id)->first(); 
        $majortype_men = \DB::table('services_majortype')->where('status', 'open')
                        ->where('category_type','men')->get();  
        $majortype_women = \DB::table('services_majortype')->where('status', 'open')
                                         ->where('category_type','women')->get();
        return view('web.service.service_detail') 
                        ->with('majortype_men', $majortype_men) 
                       ->with('service_detail', $service_detail)
                       ->with('majortype_women', $majortype_women);
    }

    public function save_services(Request $request)
    {
        $telnumber= $request->input('phone_num'); 
        if(preg_match('/^((?:00|\+)92)?(0?3(?:[0-46]\d|55)\d{7})$/', $telnumber))
        {
            $dr_case_id = CustomerDetail::create([
                'name' => $request->input('cus_name'),
                'phone_number' => $request->input('phone_num'), 
                'total_amount' => $request->input('total_amount'),
                'branch_id' => $request->input('branch_id'),
            ]);
            $case_id = $dr_case_id->id;
            foreach($request->input('service_id') as $key => $service_id){
                $service= new SaveService();
                $service->bill_id = $case_id;
                $service->service_id=$request->input('service_id')[$key];
                $service->qty=$request->input('qty')[$key];  
                $service->datetime=$request->input('datetime')[$key]; 
                $service->purchase_type=$request->input('purchase_type')[$key]; 
                $service->date=now(); 
                $service->status='0'; 
                $service->save();
                 
            }
            foreach($request->input('service_id') as $key => $service_id){
                $str = ltrim($request->input('phone_num'), '0');   
                $phone = '92'.$str;
                $phone_number = $phone;
                // return $this->send_sms($phone_number, $request->input('cus_name'),$request->input('branch_id'), $request->input('datetime')[$key]);
            }
        } else 
        {
            return response()->json(['error'=>'Please Enter Correct Number(03*********)']);
        } 
         
        
    }
    
    public function send_sms($phone, $name, $branch, $datetime)
    {  

        // dd($branch);
# reception number
         error_reporting(E_ALL);
         $type = "xml";
         $id = "figure";
         $pass = "@987654321";
         $lang = "English";
         $mask = "Dessange";
         $date = date("d-m-y");
         $datetime = $datetime;
         $to = $phone;
         $branch_id = $branch;
         $message = "Dear ".$name.", Thanks For booking an appointment ".$datetime.". You will receive call for availble time slot from us soon." ;
         $message = urldecode($message);
         
         if($branch_id == '1'){
            $message1 = "".$phone.", have gotten an appointment on ".$datetime." Gulberg" ;
            $message1 = urldecode($message1);
            $to1 = "923362227908"; 
            
            $message2 = "".$phone.", have gotten an appointment on ".$datetime." Gulberg" ;
            $message2 = urldecode($message2);
            $to2 = "923084888833";

            $message3 = "".$phone.", have gotten an appointment on ".$datetime." Gulberg" ;
            $message3 = urldecode($message3);
            $to3 = "923324115117";
         }else{
            $message1 = "".$phone.", have gotten an appointment on ".$datetime." DHA" ;
            $message1 = urldecode($message1);
            $to1 = "923362227908"; 
            
            $message2 = "".$phone.", have gotten an appointment on ".$datetime." DHA" ;
            $message2 = urldecode($message2);
            $to2 = "923334840224";

            $message3 = "".$phone.", have gotten an appointment on ".$datetime." DHA" ;
            $message3 = urldecode($message3);
            $to3 = "923324115117";
         }
        
         
         $data = "id=".$id."&pass=".$pass."&msg=".$message."&to=".$to."&lang=".$lang."&mask=".$mask."&type=".$type;      
    
        
         $ch = curl_init('https://fastsmsalerts.com/quicksms');
         curl_setopt_array($ch, array(  CURLOPT_RETURNTRANSFER =>true,
                                        CURLOPT_POST => true, 
                                        CURLOPT_POSTFIELDS => $data,
                                        ));
         
         $data1 = "id=".$id."&pass=".$pass."&msg=".$message1."&to=".$to1. "&lang=".$lang."&mask=".$mask."&type=".$type;      
    
        
         $ch1 = curl_init('https://fastsmsalerts.com/quicksms');
         curl_setopt_array($ch1, array(  CURLOPT_RETURNTRANSFER =>true,
                                                                        CURLOPT_POST => true, 
                                                                        CURLOPT_POSTFIELDS => $data1,
                                                                        ));
         $data2 = "id=".$id."&pass=".$pass."&msg=".$message2."&to=".$to2. "&lang=".$lang."&mask=".$mask."&type=".$type;      
    
        
         $ch2 = curl_init('https://fastsmsalerts.com/quicksms');
         curl_setopt_array($ch2, array(  CURLOPT_RETURNTRANSFER =>true,
                                                                        CURLOPT_POST => true, 
                                                                        CURLOPT_POSTFIELDS => $data2,
                                                                        ));
        
        $data3 = "id=".$id."&pass=".$pass."&msg=".$message3."&to=".$to3. "&lang=".$lang."&mask=".$mask."&type=".$type;      
    
        
        $ch3 = curl_init('http://fastsmsalerts.com/quicksms');
        curl_setopt_array($ch3, array(  CURLOPT_RETURNTRANSFER =>true,
                                     CURLOPT_POST => true, 
                                      CURLOPT_POSTFIELDS => $data3, ));

         $output = curl_exec($ch);

         if(curl_errno($ch)){
            echo 'error :'. curl_error($ch);
         }
         curl_close($ch);

         $output1 = curl_exec($ch1);

         if(curl_errno($ch1)){
            echo 'error :'. curl_error($ch1);
         }
         curl_close($ch1);
         $output2 = curl_exec($ch2);

         if(curl_errno($ch2)){
            echo 'error :'. curl_error($ch2);
         }
         curl_close($ch2);
         $output3 = curl_exec($ch3);

         if(curl_errno($ch3)){
            echo 'error :'. curl_error($ch3);
         }
         curl_close($ch3);
         return response()->json(['success'=>'Form is successfully submitted!']);
    }

//      public function send_sms($phone, $name, $branch, $datetime)
//     {  

//         // dd($datetime);
// # reception number
//          error_reporting(E_ALL);
//          $type = "xml";
//          $id = "figure";
//          $pass = "@987654321";
//          $lang = "English";
//          $mask = "Dessange";
//          $date = date("d-m-y");
//          $datetime = $datetime;
//          $to = $phone;
//          $branch_id = $branch;
//          $message = "Dear ".$name.", Thanks For booking an appointment ".$datetime." for ".$date." You will receive call for availble time slot from us soon." ;
//          $message = urldecode($message);
         
//          $message1 = "".$phone.", have gotten an appointment on ".$date."" ;
//          $message1 = urldecode($message1);
//          $to1 = "923362227908"; 
         
//          $message2 = "".$phone.", have gotten an appointment on ".$date."" ;
//          $message2 = urldecode($message2);
//          $to2 = "923324115117";
         
//          $data = "id=".$id."&pass=".$pass."&msg=".$message."&to=".$to."&lang=".$lang."&mask=".$mask."&type=".$type;      
    
        
//          $ch = curl_init('http://fastsmsalerts.com/quicksms');
//          curl_setopt_array($ch, array(  CURLOPT_RETURNTRANSFER =>true,
//                                         CURLOPT_POST => true, 
//                                         CURLOPT_POSTFIELDS => $data,
//                                         ));
//          if($branch_id == '1'){
             
//          }
//          $data1 = "id=".$id."&pass=".$pass."&msg=".$message1."&to=".$to1. "&lang=".$lang."&mask=".$mask."&type=".$type;      
    
        
//          $ch1 = curl_init('http://fastsmsalerts.com/quicksms');
//          curl_setopt_array($ch1, array(  CURLOPT_RETURNTRANSFER =>true,
//                                                                         CURLOPT_POST => true, 
//                                                                         CURLOPT_POSTFIELDS => $data1,
//                                                                         ));
//          $data2 = "id=".$id."&pass=".$pass."&msg=".$message2."&to=".$to2. "&lang=".$lang."&mask=".$mask."&type=".$type;      
    
        
//          $ch2 = curl_init('http://fastsmsalerts.com/quicksms');
//          curl_setopt_array($ch2, array(  CURLOPT_RETURNTRANSFER =>true,
//                                                                         CURLOPT_POST => true, 
//                                                                         CURLOPT_POSTFIELDS => $data2,
//                                                                         ));
//          // curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
//          // curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);

//          $output = curl_exec($ch);

//          if(curl_errno($ch)){
//             echo 'error :'. curl_error($ch);
//          }
//          curl_close($ch);

//          $output1 = curl_exec($ch1);

//          if(curl_errno($ch1)){
//             echo 'error :'. curl_error($ch1);
//          }
         
//          $output2 = curl_exec($ch2);

//          if(curl_errno($ch2)){
//             echo 'error :'. curl_error($ch2);
//          }
//          curl_close($ch1);
//                 return response()->json(['success'=>'Form is successfully submitted!']);
//     }

    //   Service backend Section
    public function add_service()
    {
        $role = Auth::user()->role;
        $data['page_title'] = "Create Student";
        $data['page_description'] = "Welcome to Admin Dashboard";  
        $mj_type = \DB::table('services_majortype')->where('status', 'open')->get(); 
        if($role == 'admin'){
            return view('admin.service_page.add_service')->with($data) 
            ->with('mj_type', $mj_type);
        }else{
            return view('social.service_page.add_service')->with($data) 
            ->with('mj_type', $mj_type);
        } 
        
    }

    public function get_sub_type(Request $request)
    {
        $role = Auth::user()->role; 
        $service_content = \DB::table('services_subtype')
                            ->where('services_subtype.major_type_id', $request->input('values'))->get();  
        return response()->json($service_content);
    }


    public function create_service(Request $request)
    { 
        // dd($request);
        $role = Auth::user()->role;
        $this->validate($request, [
            'picture'  => 'required|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=1000,max_height=1000'
           ]);
        $image_path = $request->file('picture');
         
        $new_name = rand() . '.' . $image_path->getClientOriginalExtension();  
        $move = $image_path->move(('img/service/'), $new_name);
        UserService::create([
                'name' => $request->input('service_name'),
                'description' => $request->input('description'),
                'start_date' => $request->input('start_date'), 
                'end_date' => $request->input('end_date'), 
                'slug' => $request->input('slug'),
                'meta_title' => $request->input('meta_title'),
                'meta_description' => $request->input('meta_description'),
                'meta_keywords' => $request->input('meta_keywords'),
                'cost' => $request->input('cost'), 
                'duration' => $request->input('duration'), 
                'major_type_id' => $request->input('major_type_id'), 
                'sub_type_id' => $request->input('sub_type_id'), 
                'category' => $request->input('category'), 
                'video_link' => $request->input('video_link'),
                'service_content' => $request->input('service_content'),
                'picture' =>  $new_name, 
                'status' => 'open',  
                'branch_id' => '1',
                'service_category' => 'service'
        ]);
          
        $notification = array(
            'message' => 'Upload SucessFully', 
            'alert-type' => 'success'
        );

        if($role == 'admin'){
            return redirect('admin/service_list')->with($notification);
        }else{
            return redirect('social/service_list')->with($notification);
        } 
         
    }


    public function service_list()
    {
        $role = Auth::user()->role;
        $data['page_title'] = "All Blog";
        $data['page_description'] = "Welcome to Admin Dashboard";
        
        $service_list = \DB::table('services_service') 
                    ->Select('services_service.name',  'services_service.category', 'services_service.status',
                    'services_service.id') 
                    ->where('services_service.service_category', 'service')
                    ->get();
        
        $data['service_list'] = $service_list;
        if($role == 'admin'){
            return view('admin.service_page.service_list')->with($data);
        }else{
            return view('social.service_page.service_list')->with($data);
        }
         
    }

    public function edit_service($id)
    { 
        $role = Auth::user()->role;  
        $edit_service = UserService::find($id); 
       
        $select_sub_type = \DB::table('services_subtype')  
                    ->where('services_subtype.id', $edit_service->sub_type_id)
                    ->first();  
        $mj_type = \DB::table('services_majortype')->where('status', 'open')->get(); 
         
        
        if($role == 'admin'){
            return view('admin.service_page.edit_service') 
                  ->with('edit_service', $edit_service) 
                  ->with('mj_type', $mj_type) 
                  ->with('select_sub_type', $select_sub_type);
        }else{
            return view('social.service_page.edit_service') 
                  ->with('edit_service', $edit_service) 
                  ->with('mj_type', $mj_type) 
                  ->with('select_sub_type', $select_sub_type);
        } 
        
    }

    public function update_service(Request $request, $id)
    { 
        // dd($request->file('image'));
        $role = Auth::user()->role;  
        
        if($request->file('picture') != ''){  
           
            $this->validate($request, [
                'picture'  => 'required|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=1000,max_height=1000'
            ]);
            $image_path = $request->file('picture');
             
            $new_name = rand() . '.' . $image_path->getClientOriginalExtension();  
            $move = $image_path->move(('img/service/'), $new_name);
            DB::table('services_service')->where('id', $id)
                            ->update(['name' => $request->input('service_name'),
                            'description' => $request->input('description'),
                            'start_date' => $request->input('start_date'), 
                            'end_date' => $request->input('end_date'), 
                            'slug' => $request->input('slug'),
                            'meta_title' => $request->input('meta_title'),
                            'meta_description' => $request->input('meta_description'),
                            'meta_keywords' => $request->input('meta_keywords'),
                            'cost' => $request->input('cost'), 
                            'duration' => $request->input('duration'), 
                            'major_type_id' => $request->input('major_type_id'), 
                            'sub_type_id' => $request->input('sub_type_id'), 
                            'category' => $request->input('category'), 
                            'video_link' => $request->input('video_link'),
                            'service_content' => $request->input('service_content'),
                            'picture' =>  $new_name, 
                            'status' => $request->input('status') ]);
 

        }
        else{
            
            DB::table('services_service')->where('id', $id)
                            ->update(['name' => $request->input('service_name'),
                            'description' => $request->input('description'),
                            'start_date' => $request->input('start_date'), 
                            'end_date' => $request->input('end_date'), 
                            'slug' => $request->input('slug'),
                            'meta_title' => $request->input('meta_title'),
                            'meta_description' => $request->input('meta_description'),
                            'meta_keywords' => $request->input('meta_keywords'),
                            'cost' => $request->input('cost'), 
                            'duration' => $request->input('duration'), 
                            'major_type_id' => $request->input('major_type_id'), 
                            'sub_type_id' => $request->input('sub_type_id'), 
                            'category' => $request->input('category'), 
                            'video_link' => $request->input('video_link'), 
                            'service_content' => $request->input('service_content'),
                            'status' => $request->input('status') ]);

        

        }
        
        $notification = array(
            'message' => 'Update SucessFully', 
            'alert-type' => 'success'
        );
        if($role == 'admin'){
            return redirect('admin/service_list')->with($notification);
        }else{
            return redirect('social/service_list')->with($notification);
        } 
         
        
    }
    
    //   Deal

    public function deals()
    {
        
        $menu = MajorType::with('subtype')->where('category_type', 'men')->get();
        $women_menu = MajorType::with('subtype')->where('category_type', 'women')->get(); 
        $product_menu = InventoryMajorType::with('prosubtype')->where('status', 'open')->get();   
        $deal_list = \DB::table('services_service')
                           ->Select('services_service.name', 'services_service.picture', 'services_service.cost',
                            'services_service.id') 
                           ->where('services_service.status', 'open')
                           ->where('services_service.service_category', 'deal')
                           ->where('services_service.end_date', '>=', date("Y-m-d"))->get();   
        return view('web.deal.deal_list')
        ->with('menu', $menu)
        ->with('product_menu', $product_menu)
        ->with('women_menu', $women_menu)
        ->with('deal_list', $deal_list);
    }

    //   Deal backend Section
    public function add_deal()
    {
        $role = Auth::user()->role;
        $data['page_title'] = "Create Student";
        $data['page_description'] = "Welcome to Admin Dashboard";   
        if($role == 'admin'){
            return view('admin.deal_page.add_deal')->with($data);
        }else{
            return view('social.deal_page.add_deal')->with($data);
        } 
        
    }
 


    public function create_deal(Request $request)
    { 
        // dd($request);
        $role = Auth::user()->role;
        $user_id = Auth::user()->id;
        $this->validate($request, [
            'picture'  => 'required|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=1000,max_height=1000'
           ]);
        $image_path = $request->file('picture');
         
        $new_name = rand() . '.' . $image_path->getClientOriginalExtension();  
        $move = $image_path->move(('img/service/'), $new_name);
        UserService::create([
                'name' => $request->input('deal_name'),
                'description' => $request->input('description'),
                'start_date' => $request->input('start_date'), 
                'end_date' => $request->input('end_date'), 
                'slug' => $request->input('slug'),
                'meta_title' => $request->input('meta_title'),
                'meta_description' => $request->input('meta_description'),
                'meta_keywords' => $request->input('meta_keywords'),
                'cost' => $request->input('cost'),  
                'category' => $request->input('category'), 
                'service_content' => $request->input('service_content'),
                'picture' =>  $new_name, 
                'status' => 'open',
                'service_category' => 'deal' 
        ]);
          
        $notification = array(
            'message' => 'Upload SucessFully', 
            'alert-type' => 'success'
        );

        if($role == 'admin'){
            return redirect('admin/deal_list')->with($notification);
        }else{
            return redirect('social/deal_list')->with($notification);
        } 
         
    }


    public function deal_list()
    {
        $role = Auth::user()->role;
        $data['page_title'] = "All Blog";
        $data['page_description'] = "Welcome to Admin Dashboard";
        
        $deal_list = \DB::table('services_service') 
                    ->Select('services_service.name',  'services_service.category', 'services_service.status',
                    'services_service.id') 
                    ->where('services_service.service_category', 'deal')
                    ->get();
        
        $data['deal_list'] = $deal_list;
        if($role == 'admin'){
            return view('admin.deal_page.deal_list')->with($data);
        }else{
            return view('social.deal_page.deal_list')->with($data);
        } 
         
    }

    public function edit_deal($id)
    { 
        $role = Auth::user()->role;  
        $user_id = Auth::user()->id;
        $edit_deal = UserService::find($id); 
        
         
        
        if($role == 'admin'){
            return view('admin.deal_page.edit_deal') 
                  ->with('edit_deal', $edit_deal);
        }else{
            return view('social.deal_page.edit_deal') 
                  ->with('edit_deal', $edit_deal);
        } 
        
    }

    public function update_deal(Request $request, $id)
    { 
        // dd($request->file('image'));
        $role = Auth::user()->role;  
        $user_id = Auth::user()->id;
        if($request->file('picture') != ''){  
           
            $this->validate($request, [
                'picture'  => 'required|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=1000,max_height=1000'
            ]);
            $image_path = $request->file('picture');
             
            $new_name = rand() . '.' . $image_path->getClientOriginalExtension();  
            $move = $image_path->move(('img/service/'), $new_name);
            DB::table('services_service')->where('id', $id)
                            ->update(['name' => $request->input('deal_name'),
                            'description' => $request->input('description'),
                            'start_date' => $request->input('start_date'), 
                            'end_date' => $request->input('end_date'),
                            'slug' => $request->input('slug'),
                            'meta_title' => $request->input('meta_title'),
                            'meta_description' => $request->input('meta_description'),
                            'meta_keywords' => $request->input('meta_keywords'),
                            'cost' => $request->input('cost'),  
                            'category' => $request->input('category'), 
                             'service_content' => $request->input('service_content'),
                            'picture' =>  $new_name, 
                            'status' => $request->input('status')  ]);
 

        }
        else{
            
            DB::table('services_service')->where('id', $id)
                            ->update(['name' => $request->input('deal_name'),
                            'description' => $request->input('description'),
                            'start_date' => $request->input('start_date'), 
                            'end_date' => $request->input('end_date'),
                            'slug' => $request->input('slug'),
                            'meta_title' => $request->input('meta_title'),
                            'meta_description' => $request->input('meta_description'),
                            'meta_keywords' => $request->input('meta_keywords'),
                            'cost' => $request->input('cost'),  
                            'category' => $request->input('category'),
                            'service_content' => $request->input('service_content'),  
                            'status' => $request->input('status') ]);

        

        }
        
        $notification = array(
            'message' => 'Update SucessFully', 
            'alert-type' => 'success'
        );
        if($role == 'admin'){
            return redirect('admin/deal_list')->with($notification);
        }else{
            return redirect('social/deal_list')->with($notification);
        } 
        
        
        
    }
    
    //Major Type
  
    public function add_major_type()
    {
        $role = Auth::user()->role;
        $data['page_title'] = "Create Student";
        $data['page_description'] = "Welcome to Admin Dashboard";   
        if($role == 'admin'){
            return view('admin.majortype_page.add_major_type')->with($data);
        }else{
            return view('social.majortype_page.add_major_type')->with($data);
        } 
        
    }
 


    public function create_major_type(Request $request)
    { 
        
        $role = Auth::user()->role;
        $user_id = Auth::user()->id;
        $this->validate($request, [
            'image'  => 'required|mimes:jpeg,jpg,png|max:2048'
           ]);
        $image_path = $request->file('image');
         
        $new_name = rand() . '.' . $image_path->getClientOriginalExtension();  
        $move = $image_path->move(('img/major_type/'), $new_name);
        MajorType::create([
                'name' => $request->input('name'),
                'category_type' => $request->input('category_type'), 
                'slug' => str_slug($request->input('slug')), 
                'meta_title' => $request->input('meta_title'), 
                'meta_description' => $request->input('meta_description'), 
                'meta_keywords' => $request->input('meta_keywords'), 
                'major_content' => $request->input('major_content'), 
                'image' =>  $new_name, 
                'status' => 'open',
                'branch_id' => '1' 
        ]);
          
        $notification = array(
            'message' => 'Upload SucessFully', 
            'alert-type' => 'success'
        );

        if($role == 'admin'){
            return redirect('admin/add_major_type')->with($notification);
        }else{
            return redirect('social/add_major_type')->with($notification);
        } 
         
    }

    public function major_type_list()
    {
        $role = Auth::user()->role;
        $data['page_title'] = "All Blog";
        $data['page_description'] = "Welcome to Admin Dashboard";
        
        $major_type_list = \DB::table('services_majortype') 
                    ->Select('services_majortype.name',  'services_majortype.category_type', 'services_majortype.status',
                    'services_majortype.id')  
                    ->get();
        
        $data['major_type_list'] = $major_type_list;
        if($role == 'admin'){
            return view('admin.majortype_page.major_type_list')->with($data);
        }else{
            return view('social.majortype_page.major_type_list')->with($data);
        } 
         
    }


    public function edit_major_type($id)
    {  
        $role = Auth::user()->role;
        $edit_major_type = MajorType::find($id); 
         
        if($role == 'admin'){
            return view('admin.majortype_page.edit_major_type') 
                  ->with('edit_major_type', $edit_major_type);
        }else{
            return view('social.majortype_page.edit_major_type') 
                  ->with('edit_major_type', $edit_major_type);
        } 
        
    }


    public function update_major_type(Request $request, $id)
    { 
       
        $role = Auth::user()->role;   
        if($request->file('image') != ''){  
           
            $this->validate($request, [
                'image'  => 'required|mimes:jpeg,jpg,png|max:2048'
            ]);
            $image_path = $request->file('image');
             
            $new_name = rand() . '.' . $image_path->getClientOriginalExtension();  
            $move = $image_path->move(('img/major_type/'), $new_name);
            DB::table('services_majortype')->where('id', $id)
                            ->update(['name' => $request->input('name'), 
                            'category_type' => $request->input('category_type'), 
                            'slug' => str_slug($request->input('slug')), 
                            'meta_title' => $request->input('meta_title'), 
                            'meta_description' => $request->input('meta_description'), 
                            'meta_keywords' => $request->input('meta_keywords'), 
                            'major_content' => $request->input('major_content'), 
                            'image' =>  $new_name, 
                            'status' => $request->input('status')  ]);
 

        }
        else{
            
            DB::table('services_majortype')->where('id', $id)
                            ->update(['name' => $request->input('name'), 
                            'category_type' => $request->input('category_type'),  
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
            return redirect('admin/major_type_list')->with($notification);
        }else{
            return redirect('social/major_type_list')->with($notification);
        } 
        
        
        
    }
}

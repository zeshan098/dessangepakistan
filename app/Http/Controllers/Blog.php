<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use App\Category;
use App\Post_Category;  
use App\Massage;  
use App\MajorType; 
use App\SubType;
use App\InventoryMajorType; 

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;  

class Blog extends Controller
{
    public function blog()
    {
        $data['page_title'] = "Blog";
        $data['page_description'] = "Welcome to Admin Dashboard"; 
        $menu = MajorType::with('subtype')->where('category_type', 'men')->get();
        $women_menu = MajorType::with('subtype')->where('category_type', 'women')->get();
        $product_menu = InventoryMajorType::with('prosubtype')->where('status', 'open')->get(); 
        $blog_list = \DB::table('posts')
                    ->leftjoin('users', 'users.id', '=', 'posts.user_id')
                    ->Select('posts.title',  'posts.date', 'users.first_name',  'posts.image', 'posts.slug') 
                    ->where('posts.published', '1')
                    ->get();
         
        $posts = Post::orderBy('created_at','desc')->paginate(2);
        $article = DB::table('posts')->where('published', 1)->inRandomOrder()->limit(3)->get();
        $categories = DB::table('categories')->where('status', 'open')->get();
        return view('web.blog.blog')->with($data)
         ->with('menu', $menu)
        ->with('women_menu', $women_menu)
        ->with('product_menu', $product_menu)
        ->with('blog_list', $blog_list)
        ->with('posts', $posts)
        ->with('article', $article)
        ->with('categories', $categories);
    }
    public function single_blog($slug)
    {
        $data['page_title'] = "Blog";
        $data['page_description'] = "Welcome to Admin Dashboard"; 
        $menu = MajorType::with('subtype')->where('category_type', 'men')->get();
        $women_menu = MajorType::with('subtype')->where('category_type', 'women')->get();
        $product_menu = InventoryMajorType::with('prosubtype')->where('status', 'open')->get(); 
        $blog_meta = \DB::table('posts')->where('slug', $slug)->first();
        $article = DB::table('posts')->where('published', 1)->inRandomOrder()->limit(3)->get();
        $categories = DB::table('categories')->where('status', 'open')->get();
        $single_blog = \DB::table('posts') 
                    ->leftjoin('users', 'users.id', '=', 'posts.user_id') 
                     ->Select('posts.title', 'posts.image', 'users.first_name', 'posts.body_text', 'posts.date') 
                    ->where('posts.slug', $slug) 
                    ->get(); 
        $category_name = DB::select(" SELECT t2.category_name FROM post_categories as t1 
                            LEFT JOIN categories as t2 ON find_in_set(t2.id,  t1.category_id)
                            LEFT JOIN posts as p on p.id = t1.post_id
                            where p.slug = '".$slug."' ");
        $previous = Post::where('slug', '<', $slug)->where('published', '=', '1')->orderBy('id', 'desc')->first();
        
        $next = Post::where('slug', '>', $slug)->where('published', '=', '1')->first(); 
        $post_ids =  DB::table('posts')->where('slug', $slug)->first();
        $messages = DB::table('messages')->where('post_id', $post_ids->id)->get();
        return view('web.blog.blog_single')->with($data)
                ->with('single_blog', $single_blog)
                ->with('category_name', $category_name)
                ->with('product_menu', $product_menu)
                ->with('article', $article)
                ->with('categories', $categories)
                ->with('slug', $slug)
                ->with('previous', $previous)
                ->with('next', $next)
                ->with('messages', $messages)
                ->with('menu', $menu)
                ->with('women_menu', $women_menu)
                ->with('blog_meta', $blog_meta);
    }

    public function category()
    {
        $role = Auth::user()->role;
        $data['page_title'] = "Create Student";
        $data['page_description'] = "Welcome to Admin Dashboard";  
        $categories = \DB::table('categories')->where('status', 'open')->get();
        
        if($role == 'admin'){
            return view('admin.blog_page.category.category')->with($data)
                    ->with('categories_list', $categories);
        }else{
            return view('social.blog_page.category.category')->with($data)
              ->with('categories_list', $categories);
        }
    }

    public function create_category()
    {
        $role = Auth::user()->role;
        $data['page_title'] = "Create Student";
        $data['page_description'] = "Welcome to Admin Dashboard";   
        
        if($role == 'admin'){
            return view('admin.blog_page.category.add_category')->with($data);
        }else{
            return view('social.blog_page.category.add_category')->with($data);
        }
    }
    
    public function add_category(Request $request)
    { 
        $role = Auth::user()->role;
         
        Category::create([
                'category_name' => $request->input('category_name'),
                'status' => 'open', 
                'date' => now()
        ]);
       
        $notification = array(
            'message' => 'Create Category SucessFully', 
            'alert-type' => 'success'
        );

        if($role == 'admin'){
            return redirect('admin/category')->with($notification);
        }else{
            return redirect('social/category')->with($notification);
        }
        
        
        
    }

    public function edit_category($id)
    { 
        $role = Auth::user()->role; 
        $edit_category = Category::find($id); 
        
        if($role == 'admin'){
            return view('admin.blog_page.category.edit_category') 
            ->with('edit_category', $edit_category);
        }else{
            return view('social.blog_page.category.edit_category') 
            ->with('edit_category', $edit_category);
        }
    }

    public function update_category(Request $request, $id)
    {
         
        $role = Auth::user()->role;
         
        DB::table('categories')->where('id', $id)
                            ->update(['category_name'=> $request->input('category_name'), 
                                      'date' => now(),
                                       'status' => 'open',]);
        $notification = array(
                        'message' => 'Category Update SucessFully', 
                        'alert-type' => 'success'
        );
        if($role == 'admin'){
            return redirect('admin/category')->with($notification);
        }else{
            return redirect('social/category')->with($notification);
        } 
         
    }

    public function delete_category($id)
    {
        $role = Auth::user()->role;
        
        $delete_category = DB::select("update categories 
                                     set status = 'close'
                                     where id = '".$id."' ");
        $notification = array('message' => 'Delete SucessFully', 
                             'alert-type' => 'success' );
        if($role == 'admin'){
            return redirect('admin/category')->with($notification);
        }else{
            return redirect('social/category')->with($notification);
        } 
    }

//   Blog Section
    public function add_blog()
    {
        $role = Auth::user()->role;
        $data['page_title'] = "Create Student";
        $data['page_description'] = "Welcome to Admin Dashboard";  
        $categories = \DB::table('categories')->where('status', 'open')->get();

        if($role == 'admin'){
            return view('admin.blog_page.admin_blog')->with($data)
            ->with('categories_list', $categories);
        }else{
            return view('social.blog_page.admin_blog')->with($data)
              ->with('categories_list', $categories);
        } 
        
    }

    public function create_blog(Request $request)
    {
        // dd($request->all());
        $id = Auth::user()->id;
        $role = Auth::user()->role;
        $this->validate($request, [
            'image'  => 'required|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=770,max_height=461'
           ]);
        $image_path = $request->file('image');
         
        $new_name = rand() . '.' . $image_path->getClientOriginalExtension();  
        $move = $image_path->move(('img/blog/'), $new_name);
        $is_post = Post::create([
                'title' => $request->input('title'),
                'slug' => str_slug($request->input('title')),
                'body_text' => $request->input('body_text'), 
                'meta_title' => $request->input('meta_title'), 
                'meta_description' => $request->input('meta_description'), 
                'meta_keywords' => $request->input('meta_keywords'), 
                'image' =>  $new_name,
                'user_id' => $id,
                'date' => now(),
                'published' => $request->input('published'), 
                'created_at' => now(),
                'updated_at' => now()
        ]);
        $post_id = $is_post->id;
        Post_Category::create([
            'post_id' => $post_id,
            'category_id' => implode(',',$request->input('category_id')) ,
            'date' => now()
        ]);
        
       
        $notification = array(
            'message' => 'Upload SucessFully', 
            'alert-type' => 'success'
        );

        if($role == 'admin'){
            return redirect('admin/add_blog')->with($notification);
        }else{
            return redirect('social/add_blog')->with($notification);
        } 
        
        
        
    }

    public function blog_list()
    {
        $role = Auth::user()->role;
        $data['page_title'] = "All Blog";
        $data['page_description'] = "Welcome to Admin Dashboard";
        
        $blog_list = \DB::table('posts')
                    ->leftjoin('users', 'users.id', '=', 'posts.user_id')
                    ->Select('posts.title',  'posts.date', 'users.first_name','posts.published', 'posts.id') 
                    ->get();
        
        $data['blog_list'] = $blog_list;
        
        if($role == 'admin'){
            return view('admin.blog_page.blog_list')->with($data);
        }else{
            return view('social.blog_page.blog_list')->with($data);
        }  
    }

     

    public function update_blog($id)
    { 
        $role = Auth::user()->role; 
        $category_id = []; 
        $edit_blog = Post::find($id); 
       
        $select_cat = \DB::table('post_categories') 
                    ->Select('post_categories.category_id') 
                    ->where('post_categories.post_id', $id)
                    ->first(); 
         
        $selected = explode(",", $select_cat->category_id); 
       
         
        $category = \DB::table('categories') 
                    ->Select('categories.id', 'categories.category_name')
                    ->where('status', 'open')
                    ->get();
        
        if($role == 'admin'){
            return view('admin.blog_page.edit_blog') 
                  ->with('edit_blog', $edit_blog)
                  ->with('selected', $selected)
                  ->with('category', $category);
        }else{
            return view('social.blog_page.edit_blog') 
                  ->with('edit_blog', $edit_blog)
                  ->with('selected', $selected)
                  ->with('category', $category);
        } 
        
    }

    public function update_bloging(Request $request, $id)
    { 
        // dd($request->file('image'));
        $role = Auth::user()->role; 
        $user_id = Auth::user()->id;
        
        if($request->file('image') != ''){  
           
            $this->validate($request, [
                'image'  => 'required|mimes:jpeg,jpg,png|max:2048|dimensions:max_width=770,max_height=461'
            ]);
            $image_path = $request->file('image');
             
            $new_name = rand() . '.' . $image_path->getClientOriginalExtension();  
            $move = $image_path->move(('img/blog/'), $new_name);
            DB::table('posts')->where('id', $id)
                            ->update(['title' => $request->input('title'),
                            'slug' => str_slug($request->input('title')),
                            'body_text' => $request->input('body_text'), 
                            'meta_title' => $request->input('meta_title'), 
                            'meta_description' => $request->input('meta_description'), 
                            'meta_keywords' => $request->input('meta_keywords'), 
                            'image' =>  $new_name,
                            'user_id' => $user_id,
                            'date' => now(),
                            'published' => $request->input('published'), 
                            'updated_at' => now()]);

        DB::table('post_categories')->where('post_id', $id)
                            ->update(['category_id' => implode(',',$request->input('category_id')) ]);

        }
        else{
            
            DB::table('posts')->where('id', $id)
                            ->update(['title' => $request->input('title'),
                            'slug' => str_slug($request->input('title')),
                            'body_text' => $request->input('body_text'), 
                            'meta_title' => $request->input('meta_title'), 
                            'meta_description' => $request->input('meta_description'), 
                            'meta_keywords' => $request->input('meta_keywords'),  
                            'user_id' => $user_id,
                            'date' => now(),
                            'published' => $request->input('published'), 
                            'updated_at' => now()]);

        DB::table('post_categories')->where('post_id', $id)
                            ->update(['category_id' => implode(',',$request->input('category_id')) ]);

        }
        
        $notification = array(
            'message' => 'Update SucessFully', 
            'alert-type' => 'success'
        );
        if($role == 'admin'){
            return redirect('admin/blog_list')->with($notification);
        }else{
            return redirect('social/blog_list')->with($notification);
        } 
        
        
        
    }

    // USer Register
    public function user_register(Request $request)
    {
        $check_user = DB::table('users')->where('users.email', $request->input('email'))->first();
        if($check_user == null){
            $validator = User::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'role' => 'visitor',
                'is_approved' => 1,
                'password' => Hash::make($request->input('password'))
            ]);
            $lasted_id =  DB::table('users')->Select('users.id', 'users.role')->latest('id')->first(); 
            if ($validator->id == $lasted_id->id) {
                Auth::login($validator);
                return response()->json(['success'=>"login"]); 
            }

        }else{
            return response()->json(['error'=> "Already Signup"]);
        }
        

    }
    
    // USer Login
    public function check_login(Request $request)
    {
         
        $credentials = array(
                        "email" => $request->input('email'),
                        "password" => $request->input('password')
                    );
        if (Auth::attempt($credentials)) {
            if(Auth::user()->role == "visitor"){
                return response()->json(['success'=>"login"]); 
            }else{
                return response()->json(['error'=> "Wrong Username/Password"]);
            }
        
        }else{
            return response()->json(['error'=> "Wrong Username/Password"]);
        }
    }

    // USer Update Pasword

    public function update_user_password(Request $request)
    {
        $check_user = DB::table('users')->where('users.email', $request->input('email'))->first(); 
        if($check_user!=null){
            $update_password = DB::table('users')->where('email', $request->input('email'))
                            ->update(['password'=> Hash::make($request->input('password')) 
                            ]);
            return response()->json(['success'=>"Update Successfully"]); 
        }else{
            return response()->json(['error'=> "Wrong Email"]);
        }
        
        
    }

    // USer Update Pasword

    public function post_comments(Request $request)
    {   
         
        $user_id = Auth::user()->id;
        $check_user = DB::table('users')->where('users.id', $user_id)->first(); 
        $check_post = DB::table('posts')->where('posts.slug', $request->input('post_id'))->first(); 
        $validator = Massage::create([
            'user_id' => $user_id,
            'name' => $check_user->first_name,
            'email' => $check_user->email,
            'msg' =>  $request->input('msg'),
            'post_id' => $check_post->id,
            'datetime' => now(),
            'status' => '1',
            'is_user_read' => 'send',
            'is_admin_read' => 'pending'  
        ]);
        
        return response()->json(['success'=>"Successfully"]);
    }

    //comments
    public function user_reply()
    { 
        $data['page_title'] = "Add Men & Women Info";
        $data['page_description'] = "Welcome to Admin Dashboard"; 
        $user_chat = DB::select(" SELECT us.id as user, concat(us.first_name,' ',us.last_name) as name, 
                                   DATE_FORMAT(msg.datetime, '%d/%m/%Y %H:%i') as date, SUBSTRING(msg.msg, 1, 20) as msg FROM `messages` as msg
                                        inner join posts p on msg.post_id = p.id
                                        inner join users us on msg.user_id = us.id
                                        where us.role = 'visitor'
                                        AND datetime IN
                                            (SELECT MAX(datetime)
                                            FROM messages
                                            where name != 'admin'
                                            GROUP BY user_id) 
                                            order by msg.datetime DESC ");
        // $user_chat_replys = DB::table('messages')
        // ->Select('messages.user_id')
        // ->orderBy('datetime', 'desc')
        // ->first(); 
        // $user_chat_reply = DB::select(" SELECT  msg.name, DATE_FORMAT(msg.datetime, '%d/%m/%Y %H:%i') as date,
        //                     msg.msg FROM `messages` as msg 
        //                               where msg.user_id = '".$user_chat_replys->user_id."'
        //                               and status = '1' 
        //                               order by msg.id asc  ");

        return view('admin.blog_page.comments')
        ->with('user_chat', $user_chat) 
        ->with($data);
    }

    public function get_chat_record($id=0)
    {    
         
        if($id==0){ 
            $user_chat_replys = DB::table('messages')
                            ->Select('messages.user_id')
                            ->orderBy('datetime', 'desc')
                            ->first();  
            $user_chat_replyss = DB::select(" SELECT  msg.name, DATE_FORMAT(msg.datetime, '%d/%m/%Y %H:%i') as date,
                            msg.msg FROM `messages` as msg 
                                      where msg.user_id = '".$user_chat_replys->user_id."'
                                      and status = '1' 
                                      order by msg.id asc  ");
        }else{
            $user_chat_replyss = DB::select(" SELECT  msg.name, pp.title, DATE_FORMAT(msg.datetime, '%d/%m/%Y %H:%i') as date,
                        msg.msg, msg.post_id, msg.user_id, msg.id  FROM `messages` as msg 
                        inner join posts pp on msg.post_id = pp.id
                      where msg.user_id = '".$id."'
                      and status = '1' 
                      order by msg.id asc  ");
            
        }
        
          
        return response()->json($user_chat_replyss);
    }

    public function admin_reply(Request $request)
    { 
         
        Massage::create([
            'user_id' => $request->input('user_id'),
            'post_id' => $request->input('post_id'),
            'name' => 'admin',
            'email' => Auth::user()->email,
            'msg' => $request->input('mesgs'),
            'datetime' => now(),
            'status' => '1',
            'is_user_read' => 'pending',
            'is_admin_read' => 'send',
            'admin_id' => Auth::user()->id,
             
        ]);
        return response()->json("success");
    }

}
    
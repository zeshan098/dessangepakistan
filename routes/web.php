<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Both Cache is cleared";
}); 
Route::get('/', 'MainPage@index')->name('index');  
Route::get('/about', 'AboutPage@about')->name('about');  
Route::get('/contact', 'Contact@contact')->name('contact');
Route::Post('/customer_email', 'Contact@customer_email')->name('customer_email');
Route::get('/mens-major-type', 'MajorTypeController@mens_major_type')->name('mens-major-type');
Route::get('/womens-major-type', 'MajorTypeController@womens_major_type')->name('womens-major-type');
Route::get('/men/{slug}', 'SubTypeController@men_sub_type')->name('men');
Route::get('/women/{slug}', 'SubTypeController@women_sub_type')->name('women'); 
Route::get('/men-services/{id}', 'Service@men_services')->name('men-services');
Route::get('/women-services/{slug}', 'Service@women_services')->name('women-services');
Route::get('/service/{id}/', 'Service@service')->name('service');
Route::post('/get_service_subtype', 'Service@get_service_subtype')->name('get_service_subtype');
Route::post('/get_service', 'Service@get_service')->name('get_service');
Route::get('/service/get_service_detail/{id}', 'Service@get_service_detail')->name('get_service_detail');
Route::post('/save_services', 'Service@save_services')->name('save_services'); 
Route::get('/blog', 'Blog@blog')->name('blog');
Route::get('/blog/{slug}', 'Blog@single_blog')->name('single_blog'); 
//Deals
Route::get('/deals', 'Service@deals')->name('deals'); 
//lookbook
Route::get('/lookbook', 'Gallery@lookbook')->name('lookbook');

Route::get('/sitemap.xml', 'SitemapController@index');

//live search
Route::get('/search_service','Service@search_service')->name('search_service');

//product
Route::get('/product/product-major-type/', 'InventoryMajortypesController@product_major_type')->name('product-major-type');
Route::get('/product/product-major/{id}', 'InventoryMajortypesController@product_major')->name('product-major');
Route::get('/product/product-sub-type/{id}', 'InventorySubtypesController@product_sub_type')->name('product-sub-type');
Route::get('/product/{id}', 'InventoryController@product')->name('product');

// User registration
Route::Post('/user_register', 'Blog@user_register')->name('user_register');
Route::Post('/check_login', 'Blog@check_login')->name('check_login');
Route::Post('/update_user_password', 'Blog@update_user_password')->name('update_user_password');
Route::Post('/post_comments', 'Blog@post_comments')->name('post_comments'); 

// Login Routes...
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);
// Route::post('register', function(){
//     return "Hi";
// });

// Password Reset Routes...
Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);



Route::group(['prefix' => 'admin',  'middleware' => 'auth',  'middleware' => 'role:admin'], function() {
    //Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    
    Route::get('/', function () {
        return redirect()->route('home');
    });
    Route::get('users', 'UserController@users')->name('list_users');
    Route::get('add_user', 'UserController@add_user_view')->name('add_user');
    Route::get('delete_user/{id}', 'UserController@delete_user')->name('delete_user');
    Route::post('add_user_post', 'UserController@add_user_post')->name('add_user_post');
    Route::get('pending_user', 'UserController@pending_user')->name('pending_user');
    Route::get('update_pending_user/{id}', 'UserController@update_pending_user')->name('update_pending_user');
    
    //Update Password 
    Route::get('update_password/{id}', 'UserController@update_password')->name('update_password');
    Route::post('password/{id}', 'UserController@password')->name('password'); 

    //banner upload
    Route::get('add_banner', 'MainPage@add_banner_detail')->name('add_banner');
    Route::post('upload_banner_detail', 'MainPage@upload_banner_detail')->name('upload_banner_detail');
    Route::get('banners_list', 'MainPage@banners_list')->name('banners_list');
    Route::get('delete_banner/{id}', 'MainPage@delete_banner')->name('delete_banner');
    //Update banner 
    Route::get('update_banner/{id}', 'MainPage@update_banner')->name('update_banner');
    Route::post('banner/{id}', 'MainPage@banner')->name('banner'); 

    //Men Women Section
    Route::get('add_menwomen_detail', 'MainPage@add_menwomen_detail')->name('add_menwomen_detail');
    Route::post('menwomen_detail', 'MainPage@menwomen_detail')->name('menwomen_detail');

    //Men Women Section Image Upload
    Route::get('men_women_image_section', 'MainPage@men_women_image_section')->name('men_women_image_section');
    Route::post('upload_men_women_img', 'MainPage@upload_men_women_img')->name('upload_men_women_img');
    Route::get('men_women_list', 'MainPage@men_women_list')->name('men_women_list');
    Route::get('delete_men_women/{id}', 'MainPage@delete_men_women')->name('delete_men_women');

    //Product Slider upload Front Page
    Route::get('add_product_slider', 'MainPage@add_product_slider')->name('add_product_slider');
    Route::post('upload_product_slider', 'MainPage@upload_product_slider')->name('upload_product_slider');
    Route::get('product_slider_list', 'MainPage@product_slider_list')->name('product_slider_list');
    Route::get('delete_product_list/{id}', 'MainPage@delete_product_list')->name('delete_product_list');
    
    //Main Page URLS
    Route::get('add_content', 'MainPage@add_content')->name('add_content');
    Route::post('upload_content', 'MainPage@upload_content')->name('upload_content');
    Route::get('content_list', 'MainPage@content_list')->name('content_list');
    Route::get('edit_content/{id}', 'MainPage@edit_content')->name('edit_content');
    Route::post('update_content/{id}', 'MainPage@update_content')->name('update_content');
    Route::get('delete_content/{id}', 'MainPage@delete_content')->name('delete_content');
    
    //Main Page URLS
    Route::get('add_content', 'MainPage@add_content')->name('add_content');
    Route::post('upload_content', 'MainPage@upload_content')->name('upload_content');
    Route::get('content_list', 'MainPage@content_list')->name('content_list');
    Route::get('edit_content/{id}', 'MainPage@edit_content')->name('edit_content');
    Route::post('update_content/{id}', 'MainPage@update_content')->name('update_content');
    
    
    //About Page URLS
    Route::get('add_about_section', 'AboutPage@add_about_section')->name('add_about_section');
    Route::post('upload_about_detail', 'AboutPage@upload_about_detail')->name('upload_about_detail');
    Route::get('about_section_list', 'AboutPage@about_section_list')->name('about_section_list');
    Route::get('edit_about/{id}', 'AboutPage@edit_about')->name('edit_about');
    Route::post('update_about/{id}', 'AboutPage@update_about')->name('update_about');

    //Add slider
    Route::get('add_slider', 'AboutPage@add_slider')->name('add_slider');
    Route::post('upload_slider', 'AboutPage@upload_slider')->name('upload_slider');
    Route::get('slider_list', 'AboutPage@slider_list')->name('slider_list');
    Route::get('edit_slider/{id}', 'AboutPage@edit_slider')->name('edit_slider');
    Route::post('update_slider/{id}', 'AboutPage@update_slider')->name('update_slider');
    
    //LookBook
    Route::get('add_slider_lookbook', 'Gallery@add_slider_lookbook')->name('add_slider_lookbook');
    Route::post('upload_slider_lookbook', 'Gallery@upload_slider_lookbook')->name('upload_slider_lookbook');
    Route::get('slider_list_lookbook', 'Gallery@slider_list_lookbook')->name('slider_list_lookbook');
    Route::get('edit_slider_lookbook/{id}', 'Gallery@edit_slider_lookbook')->name('edit_slider_lookbook');
    Route::post('update_slider_lookbook/{id}', 'Gallery@update_slider_lookbook')->name('update_slider_lookbook');
    Route::get('delete_slider/{id}', 'Gallery@delete_slider')->name('delete_slider');
    
    //category Urls
    Route::get('category', 'Blog@category')->name('category');
    Route::get('create_category', 'Blog@create_category')->name('create_category');
    Route::post('add_category', 'Blog@add_category')->name('add_category');
    Route::get('edit_category/{id}', 'Blog@edit_category')->name('edit_category');
    Route::post('update_category/{id}', 'Blog@update_category')->name('update_category'); 
    Route::get('delete_category/{id}', 'Blog@delete_category')->name('delete_category');

    //Blog URLS
    Route::get('add_blog', 'Blog@add_blog')->name('add_blog');
    Route::post('create_blog', 'Blog@create_blog')->name('create_blog');
    Route::get('blog_list', 'Blog@blog_list')->name('blog_list');
    Route::get('update_blog/{id}', 'Blog@update_blog')->name('update_blog');
    Route::post('update_bloging/{id}', 'Blog@update_bloging')->name('update_bloging'); 

    //Message Reply
    Route::get('/user_reply', 'Blog@user_reply')->name('user_reply');
    Route::get('/get_chat_record/{id}', 'Blog@get_chat_record')->name('get_chat_record');
    Route::post('/admin_reply', 'Blog@admin_reply')->name('admin_reply');

    Route::get('/appointment_list', 'Service@appointment_list')->name('appointment_list');
    
    //Service backend
    Route::get('add_service', 'Service@add_service')->name('add_service');
    Route::post('create_service', 'Service@create_service')->name('create_service');
    Route::post('get_sub_type', 'Service@get_sub_type')->name('get_sub_type');
    Route::get('service_list', 'Service@service_list')->name('service_list');
    Route::get('edit_service/{id}', 'Service@edit_service')->name('edit_service');
    Route::post('update_service/{id}', 'Service@update_service')->name('update_service'); 
    
    //Deal backend
    Route::get('add_deal', 'Service@add_deal')->name('add_deal');
    Route::post('create_deal', 'Service@create_deal')->name('create_deal'); 
    Route::get('deal_list', 'Service@deal_list')->name('deal_list');
    Route::get('edit_deal/{id}', 'Service@edit_deal')->name('edit_deal');
    Route::post('update_deal/{id}', 'Service@update_deal')->name('update_deal');
    Route::get('/deal_lists', 'Service@deal_lists')->name('deal_lists');
    
    //Major Type
    Route::get('add_major_type', 'Service@add_major_type')->name('add_major_type');
    Route::post('create_major_type', 'Service@create_major_type')->name('create_major_type'); 
    Route::get('major_type_list', 'Service@major_type_list')->name('major_type_list');
    Route::get('edit_major_type/{id}', 'Service@edit_major_type')->name('edit_major_type');
    Route::post('update_major_type/{id}', 'Service@update_major_type')->name('update_major_type');
    
    //Sub Type
    Route::get('add_sub_type', 'SubTypeController@add_sub_type')->name('add_sub_type');
    Route::post('create_sub_type', 'SubTypeController@create_sub_type')->name('create_sub_type'); 
    Route::get('sub_type_list', 'SubTypeController@sub_type_list')->name('sub_type_list');
    Route::get('edit_sub_type/{id}', 'SubTypeController@edit_sub_type')->name('edit_sub_type');
    Route::post('update_sub_type/{id}', 'SubTypeController@update_sub_type')->name('update_sub_type');

    //Inventory majorType
    Route::get('add_product_major_type', 'InventoryMajortypesController@add_product_major_type')->name('add_product_major_type');
    Route::post('create_product_major_type', 'InventoryMajortypesController@create_product_major_type')->name('create_product_major_type'); 
    Route::get('product_major_type_list', 'InventoryMajortypesController@product_major_type_list')->name('product_major_type_list');
    Route::get('edit_product_major_type/{id}', 'InventoryMajortypesController@edit_product_major_type')->name('edit_product_major_type');
    Route::post('update_product_major_type/{id}', 'InventoryMajortypesController@update_product_major_type')->name('update_product_major_type');

    //Inventory SubType
    Route::get('add_product_sub_type', 'InventorySubtypesController@add_product_sub_type')->name('add_product_sub_type');
    Route::post('create_product_sub_type', 'InventorySubtypesController@create_product_sub_type')->name('create_product_sub_type'); 
    Route::get('product_sub_type_list', 'InventorySubtypesController@product_sub_type_list')->name('product_sub_type_list');
    Route::get('edit_product_sub_type/{id}', 'InventorySubtypesController@edit_product_sub_type')->name('edit_product_sub_type');
    Route::post('update_product_sub_type/{id}', 'InventorySubtypesController@update_product_sub_type')->name('update_product_sub_type');

    //Inventory backend
    Route::get('add_product', 'InventoryController@add_product')->name('add_product');
    Route::post('create_product', 'InventoryController@create_product')->name('create_product');
    Route::post('get_sub_type', 'InventoryController@get_sub_type')->name('get_sub_type');
    Route::get('product_list', 'InventoryController@product_list')->name('product_list');
    Route::get('edit_product/{id}', 'InventoryController@edit_product')->name('edit_product');
    Route::post('update_product/{id}', 'InventoryController@update_product')->name('update_product'); 

});

// Social Route
Route::group(['prefix' => 'social',  'middleware' => 'auth',  'middleware' => 'role:admin,social', 'as' => 'social.'], function(){
    
    //Main Page URLS
    Route::get('add_content', 'MainPage@add_content')->name('add_content');
    Route::post('upload_content', 'MainPage@upload_content')->name('upload_content');
    Route::get('content_list', 'MainPage@content_list')->name('content_list');
    Route::get('edit_content/{id}', 'MainPage@edit_content')->name('edit_content');
    Route::post('update_content/{id}', 'MainPage@update_content')->name('update_content');
    Route::get('delete_content/{id}', 'MainPage@delete_content')->name('delete_content');
    
    //About Page URLS
    Route::get('add_about_section', 'AboutPage@add_about_section')->name('add_about_section');
    Route::post('upload_about_detail', 'AboutPage@upload_about_detail')->name('upload_about_detail');
    Route::get('about_section_list', 'AboutPage@about_section_list')->name('about_section_list');
    Route::get('edit_about/{id}', 'AboutPage@edit_about')->name('edit_about');
    Route::post('update_about/{id}', 'AboutPage@update_about')->name('update_about');

    //Add slider
    Route::get('add_slider', 'AboutPage@add_slider')->name('add_slider');
    Route::post('upload_slider', 'AboutPage@upload_slider')->name('upload_slider');
    Route::get('slider_list', 'AboutPage@slider_list')->name('slider_list');
    Route::get('edit_slider/{id}', 'AboutPage@edit_slider')->name('edit_slider');
    Route::post('update_slider/{id}', 'AboutPage@update_slider')->name('update_slider');

    //LookBook
    Route::get('add_slider_lookbook', 'Gallery@add_slider_lookbook')->name('add_slider_lookbook');
    Route::post('upload_slider_lookbook', 'Gallery@upload_slider_lookbook')->name('upload_slider_lookbook');
    Route::get('slider_list_lookbook', 'Gallery@slider_list_lookbook')->name('slider_list_lookbook');
    Route::get('edit_slider_lookbook/{id}', 'Gallery@edit_slider_lookbook')->name('edit_slider_lookbook');
    Route::post('update_slider_lookbook/{id}', 'Gallery@update_slider_lookbook')->name('update_slider_lookbook');
    Route::get('delete_slider/{id}', 'Gallery@delete_slider')->name('delete_slider');
    
    //category Urls
    Route::get('category', 'Blog@category')->name('category');
    Route::get('create_category', 'Blog@create_category')->name('create_category');
    Route::post('add_category', 'Blog@add_category')->name('add_category');
    Route::get('edit_category/{id}', 'Blog@edit_category')->name('edit_category');
    Route::post('update_category/{id}', 'Blog@update_category')->name('update_category'); 
    Route::get('delete_category/{id}', 'Blog@delete_category')->name('delete_category');

    //Blog URLS
    Route::get('add_blog', 'Blog@add_blog')->name('add_blog');
    Route::post('create_blog', 'Blog@create_blog')->name('create_blog');
    Route::get('blog_list', 'Blog@blog_list')->name('blog_list');
    Route::get('update_blog/{id}', 'Blog@update_blog')->name('update_blog');
    Route::post('update_bloging/{id}', 'Blog@update_bloging')->name('update_bloging'); 

    //Message Reply
    Route::get('/user_reply', 'Blog@user_reply')->name('user_reply');
    Route::get('/get_chat_record/{id}', 'Blog@get_chat_record')->name('get_chat_record');
    Route::post('/admin_reply', 'Blog@admin_reply')->name('admin_reply');

    Route::get('/appointment_list', 'Service@appointment_list')->name('appointment_list');

    //Service backend
    Route::get('add_service', 'Service@add_service')->name('add_service');
    Route::post('create_service', 'Service@create_service')->name('create_service');
    Route::post('get_sub_type', 'Service@get_sub_type')->name('get_sub_type');
    Route::get('service_list', 'Service@service_list')->name('service_list');
    Route::get('edit_service/{id}', 'Service@edit_service')->name('edit_service');
    Route::post('update_service/{id}', 'Service@update_service')->name('update_service'); 

    //Deal backend
    Route::get('add_deal', 'Service@add_deal')->name('add_deal');
    Route::post('create_deal', 'Service@create_deal')->name('create_deal'); 
    Route::get('deal_list', 'Service@deal_list')->name('deal_list');
    Route::get('edit_deal/{id}', 'Service@edit_deal')->name('edit_deal');
    Route::post('update_deal/{id}', 'Service@update_deal')->name('update_deal');
    Route::get('/deal_lists', 'Service@deal_lists')->name('deal_lists');


    //Major Type
    Route::get('add_major_type', 'Service@add_major_type')->name('add_major_type');
    Route::post('create_major_type', 'Service@create_major_type')->name('create_major_type'); 
    Route::get('major_type_list', 'Service@major_type_list')->name('major_type_list');
    Route::get('edit_major_type/{id}', 'Service@edit_major_type')->name('edit_major_type');
    Route::post('update_major_type/{id}', 'Service@update_major_type')->name('update_major_type');


    //Sub Type
    Route::get('add_sub_type', 'SubTypeController@add_sub_type')->name('add_sub_type');
    Route::post('create_sub_type', 'SubTypeController@create_sub_type')->name('create_sub_type'); 
    Route::get('sub_type_list', 'SubTypeController@sub_type_list')->name('sub_type_list');
    Route::get('edit_sub_type/{id}', 'SubTypeController@edit_sub_type')->name('edit_sub_type');
    Route::post('update_sub_type/{id}', 'SubTypeController@update_sub_type')->name('update_sub_type');

    //Inventory majorType
    Route::get('add_product_major_type', 'InventoryMajortypesController@add_product_major_type')->name('add_product_major_type');
    Route::post('create_product_major_type', 'InventoryMajortypesController@create_product_major_type')->name('create_product_major_type'); 
    Route::get('product_major_type_list', 'InventoryMajortypesController@product_major_type_list')->name('product_major_type_list');
    Route::get('edit_product_major_type/{id}', 'InventoryMajortypesController@edit_product_major_type')->name('edit_product_major_type');
    Route::post('update_product_major_type/{id}', 'InventoryMajortypesController@update_product_major_type')->name('update_product_major_type');
    
    //Inventory SubType
    Route::get('add_product_sub_type', 'InventorySubtypesController@add_product_sub_type')->name('add_product_sub_type');
    Route::post('create_product_sub_type', 'InventorySubtypesController@create_product_sub_type')->name('create_product_sub_type'); 
    Route::get('product_sub_type_list', 'InventorySubtypesController@product_sub_type_list')->name('product_sub_type_list');
    Route::get('edit_product_sub_type/{id}', 'InventorySubtypesController@edit_product_sub_type')->name('edit_product_sub_type');
    Route::post('update_product_sub_type/{id}', 'InventorySubtypesController@update_product_sub_type')->name('update_product_sub_type');

    //Inventory backend
    Route::get('add_product', 'InventoryController@add_product')->name('add_product');
    Route::post('create_product', 'InventoryController@create_product')->name('create_product');
    Route::post('get_sub_type', 'InventoryController@get_sub_type')->name('get_sub_type');
    Route::get('product_list', 'InventoryController@product_list')->name('product_list');
    Route::get('edit_product/{id}', 'InventoryController@edit_product')->name('edit_product');
    Route::post('update_product/{id}', 'InventoryController@update_product')->name('update_product'); 
});

Route::group(['prefix' => 'reception',  'middleware' => 'auth',  'middleware' => 'role:admin,reception', 'as' => 'reception.'], function(){
    Route::get('/appointment_list', 'Service@appointment_list')->name('appointment_list');
    
    Route::get('/deal_lists', 'Service@deal_lists')->name('deal_lists'); 

    //Inventory majorType
    Route::get('add_product_major_type', 'InventoryMajortypesController@add_product_major_type')->name('add_product_major_type');
    Route::post('create_product_major_type', 'InventoryMajortypesController@create_product_major_type')->name('create_product_major_type'); 
    Route::get('product_major_type_list', 'InventoryMajortypesController@product_major_type_list')->name('product_major_type_list');
    Route::get('edit_product_major_type/{id}', 'InventoryMajortypesController@edit_product_major_type')->name('edit_product_major_type');
    Route::post('update_product_major_type/{id}', 'InventoryMajortypesController@update_product_major_type')->name('update_product_major_type');

    //Inventory SubType
    Route::get('add_product_sub_type', 'InventorySubtypesController@add_product_sub_type')->name('add_product_sub_type');
    Route::post('create_product_sub_type', 'InventorySubtypesController@create_product_sub_type')->name('create_product_sub_type'); 
    Route::get('product_sub_type_list', 'InventorySubtypesController@product_sub_type_list')->name('product_sub_type_list');
    Route::get('edit_product_sub_type/{id}', 'InventorySubtypesController@edit_product_sub_type')->name('edit_product_sub_type');
    Route::post('update_product_sub_type/{id}', 'InventorySubtypesController@update_product_sub_type')->name('update_product_sub_type');

    //Inventory backend
    Route::get('add_product', 'InventoryController@add_product')->name('add_product');
    Route::post('create_product', 'InventoryController@create_product')->name('create_product');
    Route::post('get_sub_type', 'InventoryController@get_sub_type')->name('get_sub_type');
    Route::get('product_list', 'InventoryController@product_list')->name('product_list');
    Route::get('edit_product/{id}', 'InventoryController@edit_product')->name('edit_product');
    Route::post('update_product/{id}', 'InventoryController@update_product')->name('update_product'); 
    
});
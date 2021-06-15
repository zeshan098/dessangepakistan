<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("bower_components/admin-lte/dist/img/user-512-160x160.png") }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->first_name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
<!--        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu</li>
            
            <li class="{{ $controller_name == "UserController" ? 'active' : '' }} treeview">
                <a href="#"><i class="fa fa-group"></i> <span>Users Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $action_name == "add_user_view" ? 'active' : '' }}"><a href="{{ url('admin/add_user') }}">Add New</a></li>
                    <li class="{{ $action_name == "users" ? 'active' : '' }}"><a href="{{ url('admin/users') }}">Approved Users</a></li>
                    <li class="{{ $action_name == "pending_user" ? 'active' : '' }}"><a href="{{ url('admin/pending_user') }}">Pending User</a></li>
                </ul>
            </li>
            <!--<li class="{{ $controller_name == "MainPage" ? 'active' : '' }} treeview">-->
            <!--    <a href="#"><i class="fa fa-group"></i> <span>Front Page</span>-->
            <!--        <span class="pull-right-container">-->
            <!--            <i class="fa fa-angle-left pull-right"></i>-->
            <!--        </span>-->
            <!--    </a>-->
            <!--    <ul class="treeview-menu">-->
            <!--        <li class="{{ $action_name == "add_useradd_banner_view" ? 'active' : '' }}"><a href="{{ url('admin/add_banner') }}">Upload Banner</a></li>-->
            <!--        <li class="{{ $action_name == "banners_list" ? 'active' : '' }}"><a href="{{ url('admin/banners_list') }}">Banner List</a></li> -->
            <!--        <li class="{{ $action_name == "add_menwomen_detail" ? 'active' : '' }}"><a href="{{ url('admin/add_menwomen_detail') }}">Men Women Content</a></li> -->
            <!--        <li class="{{ $action_name == "men_women_list" ? 'active' : '' }}"><a href="{{ url('admin/men_women_list') }}">Men Women Image List</a></li> -->
            <!--        <li class="{{ $action_name == "product_slider_list" ? 'active' : '' }}"><a href="{{ url('admin/product_slider_list') }}">Product Slider List</a></li> -->
            <!--    </ul>-->
            <!--</li>-->
            <li class="{{ $controller_name == "MainPage" ? 'active' : '' }} treeview">
                <a href="#"><i class="fa fa-group"></i> <span>Main Page</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu"> 
                    <li class="{{ $action_name == "add_content" ? 'active' : '' }}"><a href="{{ url('admin/add_content') }}">Add Content</a></li> 
                    <li class="{{ $action_name == "content_list" ? 'active' : '' }}"><a href="{{ url('admin/content_list') }}">Content List</a></li>   
                </ul>
            </li>
            <li class="{{ $controller_name == "AboutPage" ? 'active' : '' }} treeview">
                <a href="#"><i class="fa fa-group"></i> <span>About Page</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <!--<li class="{{ $action_name == "add_about_section" ? 'active' : '' }}"><a href="{{ url('admin/add_about_section') }}">Upload About</a></li>-->
                    <li class="{{ $action_name == "about_section_list" ? 'active' : '' }}"><a href="{{ url('admin/about_section_list') }}">About List</a></li> 
                    <li class="{{ $action_name == "slider_list" ? 'active' : '' }}"><a href="{{ url('admin/slider_list') }}">About Slider List</a></li>   
                </ul>
            </li>
            <li class="{{ $controller_name == "Blog" ? 'active' : '' }} treeview">
                <a href="#"><i class="fa fa-group"></i> <span>Blog Page</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $action_name == "category" ? 'active' : '' }}"><a href="{{ url('admin/category') }}">Category</a></li>
                    <li class="{{ $action_name == "add_blog" ? 'active' : '' }}"><a href="{{ url('admin/add_blog') }}">Add Post</a></li>
                    <li class="{{ $action_name == "blog_list" ? 'active' : '' }}"><a href="{{ url('admin/blog_list') }}">Blog List</a></li> 
                    <li class="{{ $action_name == "user_reply" ? 'active' : '' }}"><a href="{{ url('admin/user_reply') }}">View Comments</a></li>   
                </ul>
            </li>
            <li class="{{ $controller_name == "Gallery" ? 'active' : '' }} treeview">
                <a href="#"><i class="fa fa-group"></i> <span>LookBook Page</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">   
                    <li class="{{ $action_name == "slider_list_lookbook" ? 'active' : '' }}"><a href="{{ url('admin/slider_list_lookbook') }}">LookBook List</a></li>   
                </ul>
            </li>
            <li class="{{ $controller_name == "Service" ? 'active' : '' }} treeview">
                <a href="#"><i class="fa fa-group"></i> <span>Service Page</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $action_name == "major_type_list" ? 'active' : '' }}"><a href="{{ url('admin/major_type_list') }}">Major Type List</a></li> 
                    <li class="{{ $action_name == "sub_type_list" ? 'active' : '' }}"><a href="{{ url('admin/sub_type_list') }}">Sub Type List</a></li> 
                    <li class="{{ $action_name == "service_list" ? 'active' : '' }}"><a href="{{ url('admin/service_list') }}">Service List</a></li>  
                    <li class="{{ $action_name == "deal_list" ? 'active' : '' }}"><a href="{{ url('admin/deal_list') }}">Deal List</a></li>   
                </ul>
            </li>
            <li class="{{ $controller_name == 'InventoryController' ? 'active' : '' }} treeview">
                <a href="#"><i class="fa fa-group"></i> <span>Inventory Page</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $action_name == 'product_major_type_list' ? 'active' : '' }}"><a href="{{ url('admin/product_major_type_list') }}">Major Type List</a></li>  
                    <li class="{{ $action_name == 'product_sub_type_list' ? 'active' : '' }}"><a href="{{ url('admin/product_sub_type_list') }}">Sub Type List</a></li>  
                    <li class="{{ $action_name == 'product_list' ? 'active' : '' }}"><a href="{{ url('admin/product_list') }}">Product List</a></li> 
                </ul>
            </li>
            <li class="{{ $controller_name == "Service" ? 'active' : '' }} treeview">
                <a href="#"><i class="fa fa-group"></i> <span>Appointment Page</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $action_name == "appointment_list" ? 'active' : '' }}"><a href="{{ url('admin/appointment_list') }}">Appointment List</a></li>   
                    <li class="{{ $action_name == "deal_lists" ? 'active' : '' }}"><a href="{{ url('admin/deal_lists') }}">Deal List</a></li>
                </ul>
            </li>
             
             
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
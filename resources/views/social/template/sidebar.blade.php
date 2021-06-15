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
            
            <li class="{{ $controller_name == "MainPage" ? 'active' : '' }} treeview">
                <a href="#"><i class="fa fa-group"></i> <span>Main Page</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu"> 
                    <!--<li class="{{ $action_name == "add_content" ? 'active' : '' }}"><a href="{{ url('social/add_content') }}">Add Content</a></li> -->
                    <li class="{{ $action_name == "content_list" ? 'active' : '' }}"><a href="{{ url('social/content_list') }}">Content List</a></li>   
                </ul>
            </li> 
             
            <li class="{{ $controller_name == "AboutPage" ? 'active' : '' }} treeview">
                <a href="#"><i class="fa fa-group"></i> <span>About Page</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <!--<li class="{{ $action_name == "add_about_section" ? 'active' : '' }}"><a href="{{ url('social/add_about_section') }}">Upload About</a></li>-->
                    <li class="{{ $action_name == "about_section_list" ? 'active' : '' }}"><a href="{{ url('social/about_section_list') }}">AboutList</a></li> 
                    <li class="{{ $action_name == "slider_list" ? 'active' : '' }}"><a href="{{ url('social/slider_list') }}">About Slider List</a></li>   
                </ul>
            </li>
            <li class="{{ $controller_name == "Blog" ? 'active' : '' }} treeview">
                <a href="#"><i class="fa fa-group"></i> <span>Blog Page</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $action_name == "category" ? 'active' : '' }}"><a href="{{ url('social/category') }}">Category</a></li>
                    <li class="{{ $action_name == "add_blog" ? 'active' : '' }}"><a href="{{ url('social/add_blog') }}">Add Post</a></li>
                    <li class="{{ $action_name == "blog_list" ? 'active' : '' }}"><a href="{{ url('social/blog_list') }}">Blog List</a></li> 
                    <!--<li class="{{ $action_name == "user_reply" ? 'active' : '' }}"><a href="{{ url('social/user_reply') }}">View Comments</a></li>   -->
                </ul>
            </li>

            <li class="{{ $controller_name == "Gallery" ? 'active' : '' }} treeview">
                <a href="#"><i class="fa fa-group"></i> <span>LookBook Page</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">   
                    <li class="{{ $action_name == "slider_list_lookbook" ? 'active' : '' }}"><a href="{{ url('social/slider_list_lookbook') }}">LookBook List</a></li>   
                </ul>
            </li>
            <li class="{{ $controller_name == "Service" ? 'active' : '' }} treeview">
                <a href="#"><i class="fa fa-group"></i> <span>Service Page</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $action_name == "major_type_list" ? 'active' : '' }}"><a href="{{ url('social/major_type_list') }}">Major Type List</a></li> 
                    <li class="{{ $action_name == "sub_type_list" ? 'active' : '' }}"><a href="{{ url('social/sub_type_list') }}">Sub Type List</a></li> 
                    <li class="{{ $action_name == "service_list" ? 'active' : '' }}"><a href="{{ url('social/service_list') }}">Service List</a></li>  
                    <li class="{{ $action_name == "deal_list" ? 'active' : '' }}"><a href="{{ url('social/deal_list') }}">Deal List</a></li>   
                </ul>
            </li> 
            <li class="{{ $controller_name == 'InventoryController' ? 'active' : '' }} treeview">
                <a href="#"><i class="fa fa-group"></i> <span>Inventory Page</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $action_name == 'product_major_type_list' ? 'active' : '' }}"><a href="{{ url('social/product_major_type_list') }}">Major Type List</a></li>  
                    <li class="{{ $action_name == 'product_sub_type_list' ? 'active' : '' }}"><a href="{{ url('social/product_sub_type_list') }}">Sub Type List</a></li>  
                    <li class="{{ $action_name == 'product_list' ? 'active' : '' }}"><a href="{{ url('social/product_list') }}">Product List</a></li> 
                </ul>
            </li>
            <li class="{{ $controller_name == "Service" ? 'active' : '' }} treeview">
                <a href="#"><i class="fa fa-group"></i> <span>Appointment Page</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $action_name == "appointment_list" ? 'active' : '' }}"><a href="{{ url('social/appointment_list') }}">Appointment List</a></li>
                    <li class="{{ $action_name == "deal_lists" ? 'active' : '' }}"><a href="{{ url('social/deal_lists') }}">Deal List</a></li>      
                </ul>
            </li>
             
             
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
<!doctype html>
<html lang="en">

<head>
        <title>{{$blog_meta->meta_title}}</title> 
        <meta name="description" content="{!!$blog_meta->meta_description!!}">
        <meta name="keywords" content="{!!$blog_meta->meta_keywords!!}"> 
        <link rel="canonical" href="{{ url(Request::url()) }}" />
    @include('web.include.head')
 <style>
 .modal-header, .modal-body, .modal-footer{
		padding: 25px;
	}
	.modal-footer{
		text-align: center;
	}
	#signup-modal-content, #forgot-password-modal-content{
		display: none;
	}
			
	/** validation */
			
	input.parsley-error		{    
	    border-color:#843534;
	    box-shadow: none;
	}
	input.parsley-error:focus{    
	    border-color:#843534;
	    box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483
	}
	.parsley-errors-list.filled {
	    opacity: 1;
	    color: #a94442;
	    display: none;
	}

</style>
</head>

<body>
    @include('web.include.header')
    <!-- Breadcrumbs -->
		<!-- <div class="breadcrumbs" style="background-image:url('img/breadcrumbs-bg.jpg')">
			<div class="container">
				<div class="row">
					 
					<div class="col-lg-7 col-md-7 col-12">
						<div class="breadcrumbs-content">
							<h2>Blog Single</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>	
						</div>
					</div>
					 
					<div class="col-lg-5 col-md-5 col-12">
						<div class="breadcrumbs-menu">
							<ul>
								<li><a href="/">Home</a><i class="fa fa-angle-double-right"></i></li>
								<li class="active"><a href="/blog">Blog Single</a></li>
							</ul>
						</div>	
					</div>
				</div>
			</div>
		</div> -->
		<!-- End Breadcrumbs -->
		<!--<section class="breadcrumbs-area gray-bg ptb-100 port bread-card solid-color">-->
  <!--          <div class="container">-->
  <!--              <div class="row">-->
  <!--                  <div class="col-lg-12 text-center">-->
  <!--                      <div class="breadcrumbs">-->
  <!--                          <h2 class="page-title">Blog Details</h2>-->
  <!--                          <ul>-->
  <!--                              <li>-->
  <!--                                  <a class="active" href="#">Home</a>-->
  <!--                              </li>-->
  <!--                              <li> Blog Details</li>-->
  <!--                          </ul>-->
  <!--                      </div>-->
  <!--                  </div>-->
  <!--              </div>-->
  <!--          </div>-->
  <!--      </section>-->
		<!-- breadcrumbs end -->
        <section class="blog-details-area ptb-100">
            <div class="container">
                <div class="row">
                    @foreach($single_blog as $single_blog)
                    <div class="col-lg-8">
                        <div class="blog-details-left">
                            <div class="blog-part">
                                <div class="blog-img">
                                    <img src="{{asset('img/blog/'. $single_blog->image)}}" alt="">
                                </div>
                                <div class="blog-info">
                                    <div class="blog-meta">
                                        <span>
                                            <i class="fa fa-user"></i>
                                            {{$single_blog->first_name}}
                                        </span>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            {{$single_blog->date}}
                                        </span>
                                        <!--<span>-->
                                        <!--    <a href="#">-->
                                        <!--        <i class="fa fa-comment" aria-hidden="true"></i>-->
                                        <!--        0 Comments-->
                                        <!--    </a>-->
                                        <!--</span>-->
                                    </div>
                                    <h3>{{$single_blog->title}}</h3>
                                    <p>{!!$single_blog->body_text!!}</p>
                                </div>
                            </div>
                            <!--<div class="news-details-bottom mtb-60">-->
                            <!--    <h3 class="leave-comment-text">Comments</h3>-->
                            <!--    <div class="blog-top">-->
                            <!--        <div class="news-allreply">-->
                            <!--            <a href="#"><img src="img/blog/7.jpg" alt=""></a>-->
                            <!--            <div class="nes-icon">-->
                            <!--                <a href="#">-->
                            <!--                    <i class="fa fa-reply" aria-hidden="true"></i>-->
                            <!--                </a>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class="blog-img-details">-->
                            <!--            <div class="blog-title">-->
                            <!--                <h3>Salim Rana akter</h3>-->
                            <!--                <span>14 October, 2016 at 6 : 00 pm</span>-->
                            <!--            </div>-->
                            <!--            <p class="p-border">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore i aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo cons. Duis aute irure dolor in reprehenderit in </p>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <div class="blog-top blog-middle-mrg">-->
                            <!--        <div class="news-allreply">-->
                            <!--            <a href="#"><img src="img/blog/5.jpg" alt=""></a>-->
                            <!--            <div class="nes-icon">-->
                            <!--                <a href="#">-->
                            <!--                    <i class="fa fa-reply" aria-hidden="true"></i>-->
                            <!--                </a>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class="blog-img-details">-->
                            <!--            <div class="blog-title">-->
                            <!--                <h3>Tayeb Rayed</h3>-->
                            <!--                <span>14 October, 2016 at 6 : 00 pm</span>-->
                            <!--            </div>-->
                            <!--            <p class="p-border">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore i aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo cons. Duis aute irure dolor in reprehenderit in </p>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <div class="blog-top">-->
                            <!--        <div class="news-allreply">-->
                            <!--            <a href="#"><img src="img/blog/6.jpg" alt=""></a>-->
                            <!--            <div class="nes-icon">-->
                            <!--                <a href="#">-->
                            <!--                    <i class="fa fa-reply" aria-hidden="true"></i>-->
                            <!--                </a>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--        <div class="blog-img-details">-->
                            <!--            <div class="blog-title">-->
                            <!--                <h3>farhana shuvo</h3>-->
                            <!--                <span>14 October, 2016 at 6 : 00 pm</span>-->
                            <!--            </div>-->
                            <!--            <p class="p-border">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore i aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo cons. Duis aute irure dolor in reprehenderit in </p>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="leave-comment">-->
                            <!--    <h3 class="leave-comment-text">Write a comment</h3>-->
                            <!--    <form action="#">-->
                            <!--        <div class="row">-->
                            <!--            <div class="col-md-6">-->
                            <!--                <div class="leave-form">-->
                            <!--                    <input placeholder="Name*" type="text">-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--            <div class="col-md-6">-->
                            <!--                <div class="leave-form">-->
                            <!--                    <input placeholder="Email*" type="text">-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--            <div class="col-md-12">-->
                            <!--                <div class="text-leave">-->
                            <!--                    <textarea placeholder="Comment*"></textarea>-->
                            <!--                    <button class="submit" type="submit">Send Commant</button>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </form>-->
                            <!--</div>-->
                        </div>
                    </div>
                    @endforeach 
                    <div class="col-lg-4">
                        <div class="blog-right-sidebar">
                            <div class="blog-search mb-60">
                                <h3 class="leave-comment-text">Search</h3>
                                <form action="#">
                                    <input value="" placeholder="Search" type="text">
                                    <button class="submit" type="submit"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                </form>
                            </div>
                            <!--<div class="blog-right-sidebar-top mb-60">-->
                            <!--    <h3 class="leave-comment-text">Recent Posts</h3>-->
                            <!--    <ul>-->
                            <!--        <li><a href="#">Designer habits</a></li>-->
                            <!--        <li><a href="#">Lifestyle: eating healthy</a></li>-->
                            <!--        <li><a href="#">New project: Web design</a></li>-->
                            <!--        <li><a href="#">Industrial design</a></li>-->
                            <!--        <li><a href="#">The retro look</a></li>-->
                            <!--    </ul>-->
                            <!--</div>-->
                            <!--<div class="blog-right-sidebar-top mb-60">-->
                            <!--    <h3 class="leave-comment-text">Categories</h3>-->
                            <!--    <ul>-->
                            <!--        <li><a href="#">Web Design</a></li>-->
                            <!--        <li><a href="#">Web Development</a></li>-->
                            <!--        <li><a href="#">Clean</a></li>-->
                            <!--        <li><a href="#">Fashion</a></li>-->
                            <!--        <li><a href="#">Journal</a></li>-->
                            <!--        <li><a href="#">Photography</a></li>-->
                            <!--    </ul>-->
                            <!--</div>-->
                            <div class="blog-right-sidebar-bottom">
                                <h3 class="leave-comment-text">Tags</h3>
                                <ul>
                                    @foreach($category_name as $category_name) 
										<li><a href="#">{{$category_name->category_name}}</a></li>
									@endforeach  
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<!-- footer start -->
    

		<!--/ Login and Signup Model -->
	<!--Login, Signup, Forgot Password Modal -->
	<div id="login-signup-modal" class="modal fade" tabindex="-1" role="dialog">
  		<div class="modal-dialog" role="document">
    
    	<!-- login modal content -->
        <div class="modal-content" id="login-modal-content">
        
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="fa fa-lock"></span> Login Now!</h4>
      </div>
        
        <div class="modal-body">
		
		<div class="alert alert-danger print-error-msg1" style="display:none">
			<ul></ul>
		</div>
          <form method="post" id="login_forms" role="form">
		  <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="fa fa-envelope"></span></div>
                <input name="email_login" id="email" type="email" class="form-control input-lg" placeholder="Enter Email" required data-parsley-type="email" >
                </div>                      
            </div>
            
            
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="fa fa-lock"></span></div>
                <input name="password_login" id="login-password" type="password" class="form-control input-lg" placeholder="Enter Password" required data-parsley-length="[6, 10]" data-parsley-trigger="keyup">
                </div>                      
            </div>
            
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <button type="submit" class="btn btn-success btn-block btn-lg login_form">LOGIN</button>
          </form>
        </div>
        
        <div class="modal-footer">
          <p>
          <a id="FPModal" href="javascript:void(0)">Forgot Password?</a> | 
          <a id="signupModal" href="javascript:void(0)">Register Here!</a>
          </p>
        </div>
        
       </div>
        <!-- login modal content -->
        
        <!-- signup modal content -->
        <div class="modal-content" id="signup-modal-content">
        
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-lock"></span> Signup Now!</h4>
      </div>
                
        <div class="modal-body">
		<div class="alert alert-danger print-error-msg" style="display:none">
			<ul></ul>
		</div>
          <form method="post" id="Signin-Form" role="form">
		  <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
		   <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="fa fa-edit"></span></div>
                <input name="first_name" id="first_name" type="text" class="form-control input-lg" placeholder="Enter First Name" required data-parsley-type="text">
                </div>                     
            </div>
			<div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="fa fa-edit"></span></div>
                <input name="last_name" id="last_name" type="text" class="form-control input-lg" placeholder="Enter Last Name" required data-parsley-type="text">
                </div>                     
            </div>
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="fa fa-envelope"></span></div>
                <input name="emails" id="email" type="email" class="form-control input-lg" placeholder="Enter Email" required data-parsley-type="email">
                </div>                     
            </div>
            
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="fa fa-lock"></span></div>
                <input name="passwords" id="passwd" type="password" class="form-control input-lg" placeholder="Enter Password" required data-parsley-length="[6, 10]" data-parsley-trigger="keyup">
                </div>                      
            </div>
            
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="fa fa-lock"></span></div>
                <input name="password" id="confirm-passwd" type="password" class="form-control input-lg" placeholder="Retype Password" required data-parsley-equalto="#passwd" data-parsley-trigger="keyup">
                </div>                      
            </div>
            
            
              <button type="submit" class="btn btn-success btn-block btn-lg btn-submit">CREATE ACCOUNT!</button>
          </form>
        </div>
        
        <div class="modal-footer">
          <p>Already a Member ? <a id="loginModal" href="javascript:void(0)">Login Here!</a></p>
        </div>
        
      </div>
        <!-- signup modal content -->
        
        <!-- forgot password content -->
         <div class="modal-content" id="forgot-password-modal-content">
        
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-lock"></span> Recover Password!</h4>
      </div>
        
        <div class="modal-body">
			<div class="alert alert-danger print-error-msg2" style="display:none">
			<ul></ul>
			</div>
          <form method="post" id="Forgot-Password-Form" role="form">
           <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="fa fa-envelope"></span></div>
                <input name="email_update" id="email" type="email" class="form-control input-lg" placeholder="Enter Email" required data-parsley-type="email">
                </div>                     
            </div>
			<div class="form-group">
                <div class="input-group">
                <div class="input-group-addon"><span class="fa fa-lock"></span></div>
                <input name="password_update" id="passwd_update" type="password" class="form-control input-lg" placeholder="Enter New Password" required data-parsley-length="[6, 10]" data-parsley-trigger="keyup">
                </div>                      
            </div>
                        
            <button type="submit" class="btn btn-success btn-block btn-lg Forgot-Password-Form1">Submit</button>
          </form>
        </div>
        
        <div class="modal-footer">
          <p>Remember Password ? <a id="loginModal1" href="javascript:void(0)">Login Here!</a></p>
        </div>
        
      </div>        
        <!-- forgot password content -->

		
    
    	<!-- /.modal-content -->
  		</div><!-- /.modal-dialog -->
		</div>
        <!--Login, Signup, Forgot Password Modal -->
 
    @include('web.include.footer')
 
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5fcb7ac6491bd313"></script>
<script src="{{ asset('bower_components/web_js/parsley.min.js') }}"></script> 
<script>
    $(document).ready(function(){
    		
	  $('#Login-Form').parsley();
	  $('#Signin-Form').parsley();
	  $('#Forgot-Password-Form').parsley();
	    	
	  $('#signupModal').click(function(){			    		
	  	$('#login-modal-content').fadeOut('fast', function(){
	  	   $('#signup-modal-content').fadeIn('fast');
	    });
	  });
	    		   		
	  $('#loginModal').click(function(){			    			
	    $('#signup-modal-content').fadeOut('fast', function(){
	       $('#login-modal-content').fadeIn('fast');
	    });
	  });
	    		
	  $('#FPModal').click(function(){			   			
	    $('#login-modal-content').fadeOut('fast', function(){
	       $('#forgot-password-modal-content').fadeIn('fast');
	    });
	  });
	    		
	  $('#loginModal1').click(function(){			    			
	    $('#forgot-password-modal-content').fadeOut('fast', function(){
	       $('#login-modal-content').fadeIn('fast');
	    });
	  });
	  
	});
    </script>
<script type="text/javascript">

$(document).ready(function() {
	$(".btn-submit").click(function(e){
		e.preventDefault();


		var _token = $("input[name='_token']").val();
		var first_name = $("input[name='first_name']").val();
		var last_name = $("input[name='last_name']").val();
		var email = $("input[name='emails']").val();
		var password = $("input[name='passwords']").val();
 
		$.ajax({
			url: "/user_register",
			type:'POST',
			data: {_token:_token, first_name:first_name, last_name:last_name, email:email, password:password},
			success: function(data) {
				if($.isEmptyObject(data.error)){
					window.location.reload();
				}else{
					printErrorMsg(data.error);
				}
			}
		});


	}); 


	function printErrorMsg (msg) {
		$(".print-error-msg").find("ul").html('');
		$(".print-error-msg").css('display','block'); 
		$(".print-error-msg").find("ul").append('<li>'+msg+'</li>');
	 
	}
});

</script>

<!-- Login Form AJax -->
<script>
$(document).ready(function() {
	$(".login_form").click(function(e){
		e.preventDefault();


		var _token = $("input[name='_token']").val(); 
		var email = $("input[name='email_login']").val();
		var password = $("input[name='password_login']").val();
 
		$.ajax({
			url: "/check_login",
			type:'POST',
			data: {_token:_token, email:email, password:password},
			success: function(data) {
				if($.isEmptyObject(data.error)){
					window.location.reload();
				}else{
					printErrorMsg(data.error);
				}
			}
		});


	}); 


	function printErrorMsg (msg) {
		$(".print-error-msg1").find("ul").html('');
		$(".print-error-msg1").css('display','block'); 
		$(".print-error-msg1").find("ul").append('<li>'+msg+'</li>');
	 
	}
});

</script>

<!-- Password update Form AJax -->
<script>
$(document).ready(function() {
	$(".Forgot-Password-Form1").click(function(e){
		e.preventDefault();


		var _token = $("input[name='_token']").val(); 
		var email = $("input[name='email_update']").val();
		var password = $("input[name='password_update']").val();
 
		$.ajax({
			url: "/update_user_password",
			type:'POST',
			data: {_token:_token, email:email, password:password},
			success: function(data) {
				if($.isEmptyObject(data.error)){
					printErrorMsg(data.success);
					// $('#passwd_update').html(""); 
				}else{
					printErrorMsg(data.error);
				}
			}
		});


	}); 


	function printErrorMsg (msg) {
		$(".print-error-msg2").find("ul").html('');
		$(".print-error-msg2").css('display','block'); 
		$(".print-error-msg2").find("ul").append('<li>'+msg+'</li>');
	 
	}
});

</script>

<!-- Comments Form AJax -->
<script>
$(document).ready(function() {
	$(".comments_section").click(function(e){
		e.preventDefault();


		var _token = $("input[name='_token']").val(); 
		var post_id = $("input[name='post_id']").val(); 
		var msg = $('textarea#message').val();
 
		$.ajax({
			url: "/post_comments",
			type:'POST',
			data: {_token:_token, msg:msg, post_id:post_id},
			success: function(data) {
				if($.isEmptyObject(data.error)){
					printErrorMsg(data.success);
					window.location.reload(); 
				}else{
					printErrorMsg(data.error);
				}
			}
		});


	}); 


	function printErrorMsg (msg) {
		$(".print-error-msg2").find("ul").html('');
		$(".print-error-msg2").css('display','block'); 
		$(".print-error-msg2").find("ul").append('<li>'+msg+'</li>');
	 
	}
});

</script>

</body>

</html>
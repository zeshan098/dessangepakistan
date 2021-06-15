<!doctype html>
<html lang="en">

<head>
    <title>Contact Us | Dessange Pakistan</title> 
    <meta name="description" content="Gulberg: 11-E/3, Gulberg III, Lahore || Phone: 03084888833 || Email: info@dessangepakistan.com, DHA: 194-CCA, Block DD, Phase IV,DHA, Lahore Cantt || Phone: 03334840224">
 
    <link rel="canonical" href="{{ url(Request::url()) }}" />
    @include('web.include.head')
</head>

<body>
    @include('web.include.header')
	<section class="contact-area ptb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Google-Maps -->
		<div class="maps-area">
			<div class="main-maps">
			 
			
				<iframe id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13606.51672378665!2d74.3397491!3d31.506875!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfde7dfbfa18768ec!2sDessange%20Pakistan%20(Flagship%20Store)!5e0!3m2!1sen!2s!4v1605084964146!5m2!1sen!2s" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href=" "></a>
			</div>
		</div>
		<!-- End-Google-Maps -->
                    </div>
                    <div class="col-lg-12">
                        <div class="conract-area-bottom">
                            <h3 class="main-contact">Get In Tauch</h3>
                            <form   action="" id="contactForm" method="post">
							 <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="main-input">
                                            <input name="first_name" class="first_name" placeholder="First Name*" type="text" required="required">
                                        </div>
                                    </div>
									<div class="col-lg-6">
                                        <div class="main-input">
                                            <input name="last_name" class="last_name" placeholder="Last Name*" type="text" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="main-input mt-20 mb-20">
                                            <input name="phone_number" class="phone_number" placeholder="Phone No*" type="text" required="required">
                                        </div>
                                    </div>
									<div class="col-lg-6">
                                        <div class="main-input mt-20 mb-20">
                                            <input type="email" name="email" class="email" placeholder="Email *" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="main-input mt-20 mb-20">
                                            <input type="text" name="subject" class="subject" placeholder="Subject *" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="text-leave2">
										<textarea name="message" class="message" placeholder="Your Message *" required="required"></textarea>
                                            
                                        </div>
									</div>
									<div class="col-lg-12">
									   <button class="submit" type="submit">Send Massage</button>
									</div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @include('web.include.footer')
	<script>
	$('#contactForm').on('submit',function(event){
        event.preventDefault();
		var _token = $("input[name='_token']").val();  
		var first_name =$(".first_name").val();
		var last_name =$(".last_name").val();
		var phone_number = $(".phone_number").val();
		var email =$(".email").val();
		var subject =$(".subject").val();
		var message = $(".message").val();
 
		$.ajax({
			url: '{{ route('customer_email') }}',
			type:'POST',
			data: {_token:_token, first_name:first_name, last_name:last_name, phone_number:phone_number,
				email:email, subject:subject, message:message},
			success: function(data) {
				if($.isEmptyObject(data.error)){
                    alert("Request Receive"); 
					$(".first_name").val("");
					$(".last_name").val("");
					$(".phone_number").val("");
					$(".email").val("");
					$(".subject").val("");
					$(".message").val("");
				}else{
					alert("Something Problem"); 
				}
			}
		});

 
	});
</script>
</body>

</html>
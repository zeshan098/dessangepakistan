<!doctype html>
<html lang="en">

<head>
        <title>About Us | Dessange Pakistan</title>
        <meta name="description" content="Dessange Pakistan, Founded in 1954, DESSANGE is a brand of luxury and Excellence with a unique network of over 310 salons in 35 countries.">
        <link rel="canonical" href="{{ url(Request::url()) }}" />
    @include('web.include.head')
</head>

<body>
    @include('web.include.header')
	        <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
					</div>
					<div class="col-lg-4 col-md-4">
					   <h1>{{$about_section->about_heading}}</h1>
					</div>
					<div class="col-lg-4 col-md-4">
					</div>
				</div>
			</div> 
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12"> 
								<img src="../img/about/{{$about_section->img}}" class="img-fluid"> 
						</div>	
					</div>	
				</div> 
			<section class="about-us-area ptb-20">
           
        </section>
		    <div class="container">
                <div class="row">
			    	<div class="col-lg-2 col-md-2">
						<div class="minimal-img"> 
						</div>
					</div>
				    <div class="col-lg-4 col-md-4">
						<div class="minimal-img">
							<img src="../img/about/{{$about_section->about_image}}" alt="" />
						</div>
					</div>
                    <div class="col-lg-4 col-md-4">
						<div class="about-minimal">
							<h2>{{$about_section->about_main_heading}}</h2>
							{!!$about_section->description!!}
						</div>
                    </div>
					<div class="col-lg-2 col-md-2">
						<div class="minimal-img"> 
						</div>
					</div>
					
                </div>
            </div>
			<!-- header end -->
			<div class="container">
                <div class="row">
				  <div class="col-lg-2 col-md-2">
				  </div>
				    <div class="col-lg-8 col-md-8">
						<div class="slider-area-7">
							<div class="container-fluid">
								<div class="slider-active">
									@foreach($slider as $slider)
										<div class="single-slider" style="background-image: url({{asset('img/slider/'.$slider->image)}});">
											<div class="slider-title">
												 
											</div>
										</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-2">
					    <!--@foreach ($services as $services)-->
					    <!--<p>Disallow:https://www.dessangepakistan.com/service/{{ $services->id }}</p>-->
					    <!--@endforeach-->
				  </div>
			    </div>
            </div>
    @include('web.include.footer')
</body>

</html>
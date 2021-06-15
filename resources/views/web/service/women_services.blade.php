<!doctype html>
<html lang="en">

<head>
    <title>{{$women_sub_type_meta->meta_title}}</title> 
    <meta name="description" content="{{$women_sub_type_meta->meta_description}}">
    <meta name="keywords" content="{{$women_sub_type_meta->meta_keywords}}"> 
    <link rel="canonical" href="{{ url(Request::url()) }}" />
    @include('web.include.head')
</head>

<body>
    @include('web.include.header')
<!-- portfolio start -->
<!-- portfolio area start -->
<div class="portfolio-area ptb-30">
			<div class="container-fluid">
				 	
				<div class="portfolio-style-2">
					<div class="row grid">	
                    @foreach($service_detail as $service_detail) 				
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 grid-item">
							<div class="portfolio hover-style m-0">
								<div class="portfolio-img">
									<img src="../img/service/{{$service_detail->picture}}" alt="" />
									<div class="portfolio-view">
										<a class="img-poppu" href="/service/{{$service_detail->id}}">
											<span class="plus"></span>
										</a>								
									</div>
								</div>
								<div class="service-title">
									<h3><a href="/service/{{$service_detail->id}}">{{$service_detail->name}}</a></h3>
									<span>Starting From: {{$service_detail->cost}} RS</span>
								</div>								
							</div>						
						</div>
						 
                    @endforeach	 
					</div>		
				</div>
				 
			</div>
		</div>	
		    <div class="container">
                <div class="row">
                 <div class="col-lg-12">
                 <p>{!!$women_sub_type_meta->subtype_content!!}</p>
                 </div>
                </div>
            </div>	
		<!-- portfolio start -->
    @include('web.include.footer')
	
 
</body>

</html>
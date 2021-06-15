<!doctype html>
<html lang="en">

<head>
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
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 grid-item cat2 cat3">
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
		
		<!-- portfolio start -->
    @include('web.include.footer')
	
 
</body>

</html>
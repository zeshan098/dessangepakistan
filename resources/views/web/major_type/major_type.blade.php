<!doctype html>
<html lang="en">

<head>
    @include('web.include.head')
</head>

<body>
    @include('web.include.header') 
<!-- portfolio area start -->
<div class="portfolio-area ptb-20">
			<div class="container"> 	
				<div class="portfolio-style-2">
					<div class="grid row no-gutters">
					@foreach($major_type as $major_type) 	
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 grid-item cat1">
							<div class="portfolio hover-style m-0">
								<div class="portfolio-img">
									<img src="{{asset('img/major_type/'. $major_type->image)}}" alt="" />
									<div class="portfolio-view">
										<a class="img-poppu" href="/men/{{$major_type->slug}}">
											<span class="plus"></span>
										</a>								
									</div>
								</div>
								<div class="portfolio-title">
									<h3><a href="/men/{{$major_type->slug}}">{{$major_type->name}}</a></h3>
									<!--<span>Development</span>-->	
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
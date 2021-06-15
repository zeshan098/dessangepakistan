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
					@foreach($main_content as $main_content) 	
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 grid-item cat1">
							<div class="portfolio hover-style m-0">
								<div class="portfolio-img">
									<img src="{{asset('img/product_sub_type/'. $main_content->image)}}" alt="" />
									<div class="portfolio-view">
										<a class="img-poppu" href="/product/product-sub-type/{{$main_content->id}}">
											<span class="plus"></span>
										</a>								
									</div>
								</div>
								<div class="portfolio-title">
									<h3><a href="/product/product-sub-type/{{$main_content->id}}">{{$main_content->name}}</a></h3>
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
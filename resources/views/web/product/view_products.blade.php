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
                    @foreach($main_content as $main_content) 				
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 grid-item">
							<div class="portfolio hover-style m-0">
								<div class="portfolio-img">
									<img src="../img/product/{{$main_content->picture}}" alt="" />
									<div class="portfolio-view">
										<a class="img-poppu" href="/product/{{$main_content->id}}">
											<span class="plus"></span>
										</a>								
									</div>
								</div>
								<div class="service-title">
									<h3><a href="/product/{{$main_content->id}}">{{$main_content->product_name}}</a></h3>
									<span>{{$main_content->cost}} RS</span>
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
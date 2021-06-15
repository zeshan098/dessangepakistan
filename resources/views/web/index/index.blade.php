<!doctype html>
<html lang="en">

<head>
        <title>{{$main_meta->meta_title}}</title> 
        <meta name="description" content="{!!$main_meta->meta_description!!}">
        <meta name="keywords" content="{!!$main_meta->meta_keywords!!}"> 
        <link rel="canonical" href="{{ url(Request::url()) }}" />
    @include('web.include.head')
</head>

<body>
    @include('web.include.header')
<!-- portfolio start -->
<div class="portfolio-area ptb-20">
			<div class="container"> 	
				<div class="portfolio-style-2">
					<div class="grid row no-gutters">
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 grid-item cat1">
							<div class="portfolio hover-style m-0">
								<div class="portfolio-img">
									<img src="img/main/saloon.jpg" width="380" height="254" alt="Desange Salon" />
									<div class="portfolio-view">
										<a class="img-poppu" href="#">
											<span class="plus"></span>
										</a>								
									</div>
								</div>
								<div class="portfolio-title">
									<h3><a href="#">THE SALON</a></h3>
									<!--<span>Development</span>-->	
								</div>									
							</div>
						</div>					
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 grid-item cat2 cat3">
							<div class="portfolio hover-style m-0">
								<div class="portfolio-img">
									<img src="img/main/product.jpg" width="380" height="717" alt="product" />
									<div class="portfolio-view">
										<a class="img-poppu" href="http://shop.dessangepakistan.com/">
											<span class="plus"></span>
										</a>								
									</div>
								</div>
								<div class="portfolio-title">
									<h3><a href="http://shop.dessangepakistan.com/">PRODUCT</a></h3>
									<!--<span>Development</span>-->	
								</div>								
							</div>						
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 grid-item cat1">
							<div class="portfolio hover-style m-0">
								<div class="portfolio-img">
									<img src="img/main/men.jpg" width="380" height="382" alt="men" />
									<div class="portfolio-view">
										<a class="img-poppu" href="/mens-major-type">
											<span class="plus"></span>
										</a>								
									</div>
								</div>
								<div class="portfolio-title">
									<h3><a href="/mens-major-type">MEN</a></h3>
									<!--<span>Development</span>-->	
								</div>								
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 grid-item cat2">
							<div class="portfolio hover-style m-0">
								<div class="portfolio-img">
									<img src="img/main/women.jpg" width="380" height="382" alt="women" />
									<div class="portfolio-view">
										<a class="img-poppu" href="/womens-major-type">
											<span class="plus"></span>
										</a>								
									</div>
								</div>
								<div class="portfolio-title">
									<h3><a href="/womens-major-type">WOMEN</a></h3>
									<!--<span>Development</span>-->	
								</div>								
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 grid-item cat1">
							<div class="portfolio hover-style m-0">
								<div class="portfolio-img">
									<img src="img/main/deal.jpg" width="380" height="254" alt="deals" />
									<div class="portfolio-view">
										<a class="img-poppu" href="/deals">
											<span class="plus"></span>
										</a>								
									</div>
								</div>
								<div class="portfolio-title">
									<h3><a href="/deals">DEAL</a></h3>
									<!--<span>Development</span>-->	
								</div>							
							</div>
						</div>
						 
						 
					</div>		
				</div>
				 
			</div>
		</div>	
		<div class="container">
                <div class="row">
                 <div class="col-lg-12">
                     @foreach($main_content as $main_content) 
                     <p>{!!$main_content->content!!}</p>
                 @endforeach
                 </div>
                </div>
            </div>
		<!-- portfolio start -->
    @include('web.include.footer')
	
 
</body>

</html>
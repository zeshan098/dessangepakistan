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
							<div class="col-lg-3 col-md-6 col-sm-6 col-12 grid-item cat1">
								<div class="portfolio hover-style m-0">
									<div class="portfolio-img">
										<img src="{{asset('img/major_type/'. $major_type1->image)}}" alt="" />
										<div class="portfolio-view">
											<a class="img-poppu" href="/women/{{$major_type1->slug}}">
												<span class="plus"></span>
											</a>								
										</div>									
										<div class="portfolio-title">
											<h3><a href="/women/{{$major_type1->slug}}">{{$major_type1->name}}</a></h3>
											<!--<span>Development</span>-->	
										</div>		
									</div>							
								</div>
							</div>
							<div class="col-lg-3 col-md-6 col-sm-6 col-12 grid-item cat2 cat3">
								<div class="portfolio hover-style m-0">
									<div class="portfolio-img">
										<img src="{{asset('img/major_type/'. $major_type2->image)}}" alt="" />
										<div class="portfolio-view">
											<a class="img-poppu" href="/women/{{$major_type2->slug}}">
												<span class="plus"></span>
											</a>								
										</div>									
										<div class="portfolio-title">
											<h3><a href="/women/{{$major_type2->slug}}">{{$major_type2->name}}</a></h3>
												<!--<span>Development</span>-->	
											</div>	
									</div>	
								</div>						
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-12 grid-item cat1">
								<div class="portfolio hover-style m-0">
									<div class="portfolio-img">
										<img src="{{asset('img/major_type/'. $major_type5->image)}}" alt="" />
										<div class="portfolio-view">
											<a class="img-poppu" href="/women/{{$major_type5->slug}}">
												<span class="plus"></span>
											</a>								
										</div>									
										<div class="portfolio-title">
										<h3><a href="/women/{{$major_type5->slug}}">{{$major_type5->name}}</a></h3>
								         	<!--<span>Development3</span>-->	
										</div>	
									</div>	
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-12 grid-item cat2">
								<div class="portfolio hover-style m-0">
									<div class="portfolio-img">
										<img src="{{asset('img/major_type/'. $major_type4->image)}}" alt="" />
										<div class="portfolio-view">
											<a class="img-poppu" href="/women/{{$major_type4->slug}}">
												<span class="plus"></span>
											</a>								
										</div>									
										<div class="portfolio-title">
											<h3><a href="/women/{{$major_type4->slug}}">{{$major_type4->name}}</a></h3>
										<!--<span>Development</span>-->	
										</div>	
									</div>	
								</div>
							</div>
							<div class="col-lg-3 col-md-6 col-sm-6 col-12 grid-item cat1">
								<div class="portfolio hover-style m-0">
									<div class="portfolio-img">
										<img src="{{asset('img/major_type/'. $major_type3->image)}}" alt="" />
										<div class="portfolio-view">
											<a class="img-poppu" href="/women/{{$major_type3->slug}}">
												<span class="plus"></span>
											</a>								
										</div>									
										<div class="portfolio-title">
												<h3><a href="/women/{{$major_type3->slug}}">{{$major_type3->name}}</a></h3>
											<!--<span>Development6</span>-->	
										</div>	
									</div>	
								</div>
							</div>
							
							<div class="col-lg-3 col-md-6 col-sm-6 col-12 grid-item cat3">
								<div class="portfolio hover-style m-0">
									<div class="portfolio-img">
										<img src="{{asset('img/major_type/'. $major_type6->image)}}" alt="" />
										<div class="portfolio-view">
											<a class="img-poppu" href="/women/{{$major_type6->slug}}">
												<span class="plus"></span>
											</a>								
										</div>									
										<div class="portfolio-title">
												<h3><a href="/women/{{$major_type6->slug}}">{{$major_type6->name}}</a></h3>
											<!--<span>Development</span>-->	
										</div>	
									</div>	
								</div>
							</div>
							 
						</div>		
					</div>
				</div>	
				 
			</div>		
			<!-- portfolio area end -->
    @include('web.include.footer')
	
 
</body>

</html>
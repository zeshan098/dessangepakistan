<!doctype html>
<html lang="en">

<head>
    <title>Deals | Dessange Pakistan</title>
    <meta name="description" content="Dessange Pakistan offers the best deals in Lahore at a discounted price ( SPA, Hair, Skin, Makeup etc.) by Top Beauty Salon & Spa 11-E/3, Gulberg III, Lahore Branch, Lahore.">
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
                    @foreach($deal_list as $deal_list) 				
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 grid-item cat2 cat3">
							<div class="portfolio hover-style m-0">
								<div class="portfolio-img">
									<img src="../img/service/{{$deal_list->picture}}" alt="" />
									<div class="portfolio-view">
										<a class="img-poppu" href="/service/{{$deal_list->id}}">
											<span class="plus"></span>
										</a>								
									</div>
								</div>
								<div class="service-title">
									<h3><a href="/service/{{$deal_list->id}}">{{$deal_list->name}}</a></h3>
									<span>RS {{$deal_list->cost}} </span>
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
<!doctype html>
<html lang="en">

<head>
    <title>{{$men_sub_type_meta->meta_title}}</title> 
    <meta name="description" content="{{$men_sub_type_meta->meta_description}}">
    <meta name="keywords" content="{{$men_sub_type_meta->meta_keywords}}"> 
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
                    @foreach($men_sub_type as $men_sub_type) 				
						<div class="col-lg-3 col-md-6 col-sm-6 col-12 grid-item cat2 cat3">
							<div class="portfolio hover-style">
								<div class="portfolio-img">
									<img src="../img/sub_type/{{$men_sub_type->image}}" alt="" />
									<div class="portfolio-view">
										<a class="img-poppu" href="/men-services/{{$men_sub_type->id}}">
											<span class="plus"></span>
										</a>								
									</div>
								</div>
								<div class="portfolio-title">
									<h3><a href="/men-services/{{$men_sub_type->id}}">{{$men_sub_type->name}}</a></h3> 
								</div>								
							</div>						
						</div>
						 
                    @endforeach	 
					</div>		
				</div>
				 
			</div>
		</div>	
		<!-- portfolio start -->
		<div class="container">
                <div class="row">
                 <div class="col-lg-12">
                 <p>{!!$men_sub_type_meta->major_content!!}</p>
                 </div>
                </div>
            </div>	
    @include('web.include.footer')
	
 
</body>

</html>
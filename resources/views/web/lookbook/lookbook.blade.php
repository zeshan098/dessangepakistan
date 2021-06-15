<!doctype html>
<html lang="en">

<head>
    <title>Look Book | Dessange Pakistan</title>
    <meta name="description" content="Dessange Pakistan Lookbook. Browse hairstyle and haircolor trends, learn how to get the looks, and meet the Dessange Pakistan and trendsetters who inspire our salon professionals.">
    <link rel="canonical" href="{{ url(Request::url()) }}" />
    @include('web.include.head')
</head>

<body>
    @include('web.include.header')
 
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
				  </div>
			    </div>
            </div>
    @include('web.include.footer')
</body>

</html>
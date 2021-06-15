<!doctype html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('web.include.head')
    
</head>

<body>
    @include('web.include.header')
<!-- portfolio area start -->
<div class="portfolio-area ptb-30">
			<div class="container-fluid">
				 			
				<div class="portfolio-style-2">
					<div class="row grid">					
						 
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 grid-item cat2 cat3">
							<div class="project-desc">
								<h3>{{$deal_detail->deal_name}}</h3>
								<p>{!!$deal_detail->description!!}</p>
							 
						    </div>				
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 grid-item cat2 cat3">
							<div class="gallery-viewer">
                            <img id="zoom_10" style="max-width:100%;" src="../img/deal/{{$deal_detail->picture}}"data-zoom-image="../img/deal/{{$deal_detail->picture}}">
                             
		                 </div>				
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 grid-item cat2 cat3">
							<div class="project-desc">
								<h3> RS.{{$deal_detail->cost}}</h3>
								<br>
								<div class="price-btn">
                                <a href="#" data-id="{{$deal_detail->id}}" data-name="{{$deal_detail->deal_name}}" data-price="{{$deal_detail->cost}}" class="add-to-cart theme-btn primary">Add To Cart<span></span></a>
                                </div><br> 
								<button data-id="{{$deal_detail->id}}" data-name="{{$deal_detail->deal_name}}" data-price="{{$deal_detail->cost}}" data-toggle="modal" data-target="#cart" class="submit add-to-cart" type="submit" style="padding: 10px 107px; font-size: 17px; font-weight: 100;
									text-transform: uppercase;
									transition: all 0.3s ease 0s;
									font-family: "Avenir Next",sans-serif;">BOOK NOW</button>
							 
						    </div>					
						</div>
						 
						 
					</div>		
				</div>
				 
			</div>
		</div>			
		<!-- portfolio area end -->
         
    @include('web.include.footer') 
    <script src="{{ asset('bower_components/web_js/jquery.elevatezoom.js') }}"></script>
    <script src="{{ asset('bower_components/web_js/zoom.js') }}"></script> 
        
        <script> 
            function populate_content(id)
            {  
                var values = id;  
                $.ajax({
                        url: '{{ route('get_service') }}',
                        method: 'POST',
                        data: {values:values, _token: '{{csrf_token()}}'},
                        success: function (data) { 
                            
                            $.each(data, function(i, item) {  
                                 $(".content").append("<div class='tab-pane beautypress-tab-content' id="+item.id+"><div class='beautypress-spilit-container back"+item.id+"'><div class='beautypress-tab-image'><img src='../img/service/service-tab-img-2.jpg'><div class='beautypress-tab-image-content'><span class='beautypress-iocn-btn full-round-btn bg-color-purple'>$50</span></div></div><div class='beautypress-tab-text-content'><h3>"+item.name+"</h3><p>"+item.description+"</p><div class='beautypress-btn-wraper'><a href='get_service_detail/"+item.id+"' data-id="+item.id+"  class='theme-btn'>get appointment <span></span></a></div></div></div></div></div>"); 
                                 $(".content .tab-pane").first().addClass("active");
                                });
                              
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                        }
                    });
                    $("#content").each(function(){
                        $(this).find('div').remove();
                    }); 
            }
          
        </script> 
        
         
 
</body>

</html>
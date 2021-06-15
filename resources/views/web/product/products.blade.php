<!doctype html>
<html lang="en">

<head>
     
    @include('web.include.head')
    <style>
    
    .modal-body1{
        position:relative;
        padding:0px; 
        z-index: 1500;
    }
    .close1{
        position:absolute;
        right:1px;
        top:0;
        z-index:1000;
        font-size:2rem;
        font-weight: normal;
        color:#fff;
        opacity:1;
    }
    </style>
</head>

<body>
    @include('web.include.header')
<!-- portfolio area start -->
<div class="portfolio-area ptb-30">
			<div class="container">
				 			
				<div class="portfolio-style-2">
					<div class="row grid">					
						 
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 grid-item cat2 cat3">
							<div class="project-desc">
								<h3>{{$main_content->product_name}}</h3>
								<p>{!!$main_content->description!!}</p>
								 
							    
						    </div>				
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 grid-item cat2 cat3">
							<div class="gallery-viewer">
                            <img id="zoom_10" style="max-width:100%;" src="../img/product/{{$main_content->picture}}"data-zoom-image="../img/product/{{$main_content->picture}}">
                             
		                 </div>				
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12 grid-item cat2 cat3">
							<div class="project-desc">
								<h3> RS.{{$main_content->cost}}</h3>
								<br>
								<div class="price-btn">
                                <a href="#" data-id="{{$main_content->id}}" data-name="{{$main_content->product_name}}" data-price="{{$main_content->cost}}" data-purchase="product" class="add-to-cart theme-btn primary">Add To Cart<span></span></a>
                                </div><br> 
								<button data-id="{{$main_content->id}}" data-name="{{$main_content->product_name}}" data-price="{{$main_content->cost}}" data-purchase="product" data-toggle="modal" data-target="#cart" class="submit add-to-cart" type="submit" style="padding: 10px 107px; font-size: 17px; font-weight: 100;
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
        <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document"  style="max-width: 800px;">
                    <div class="modal-content">
    
                    
                    <div class="modal-body1">
    
                    <!--<button type="button" class="close1" data-dismiss="modal" aria-label="Close1">-->
                    <!--    <span aria-hidden="true">&times;</span>-->
                    <!--    </button>        -->
                        <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
                        
                        
                    </div>
    
                    </div>
                </div>
            </div>  
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
        
        <script>
        $(document).ready(function() {

            // Gets the video src from the data-src on each button

            var $videoSrc;  
            $('.video-btn').click(function() {
                $videoSrc = $(this).data( "src" );
            });
            console.log($videoSrc);

            
            
            // when the modal is opened autoplay it  
            $('#myModal').on('shown.bs.modal', function (e) {
                
            // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
            $("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" ); 
            })
            


            // stop playing the youtube video when I close the modal
            $('#myModal').on('hide.bs.modal', function (e) {
                // a poor man's stop video
                $("#video").attr('src',$videoSrc); 
            }) 
                
                


            
            
            // document ready  
        });



    </script> 
 
</body>

</html>
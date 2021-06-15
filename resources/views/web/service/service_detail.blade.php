<!doctype html>
<html lang="en">

<head>

    @include('web.include.head')   
    <style>
        .item-photo{display:flex;justify-content:center;align-items:center;border-right:1px solid #f6f6f6;}
.menu-items{list-style-type:none;font-size:11px;display:inline-flex;margin-bottom:0;margin-top:20px}
.btn-success{width:100%;border-radius:0;}
.section{width:100%;margin-left:-15px;padding:20px;padding-left:15px;padding-right:15px; }
.title-price{margin-top:35px;margin-bottom:0;color:black}
.title-attr{margin-top:0;margin-bottom:0;color:black;}
/* .plus-item{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-right:0;}
.minus-item{cursor:pointer;font-size:7px;display:flex;align-items:center;padding:5px;padding-left:10px;padding-right:10px;border:1px solid gray;border-radius:2px;border-left:0;} */
div.section > div {width:100%;display:inline-flex;}
div.section > div > input {margin:0;padding-left:5px;font-size:10px;padding-right:5px;max-width:18%;text-align:center;}
.attr,.attr2{cursor:pointer;margin-right:5px;height:20px;font-size:10px;padding:2px;border:1px solid gray;border-radius:2px;}
.attr.active,.attr2.active{ border:1px solid orange;}
</style> 
</head>

<body>
    @include('web.include.header')
        <section class="service-area archive">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                        <div class="gallery-viewer">
                            <img id="zoom_10" style="max-width:100%;" src="../../img/service/hair.jpg"data-zoom-image="../../img/service/hair.jpg">
                             
		                 </div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                        <h3>{{$service_detail->name}}</h3>    
                        <!-- <h5 style="color:#337ab7">vendido por <a href="#">Samsung</a> · <small style="color:#337ab7">(5054 ventas)</small></h5> -->
            
                        <!-- Precios -->
                        <h6 class="title-price"><small>Starting From</small></h6>
                        <h3 style="margin-top: -26px;margin-left: 95px;">Rs {{$service_detail->cost}}</h3>
             
                        <div class="section" style="padding-bottom:5px;">
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p>
                        </div>   
                        <!-- <div class="section" style="padding-bottom:20px;">
                            <h6 class="title-attr"><small>QUANTITY</small></h6>                    
                            <div>
                            <div class="input-group">
                                <button class="minus-item input-group-addon btn btn-primary" data-id="{{$service_detail->id}}"  >-</button>
                                <input type="number" class="item-count form-control" data-id="{{$service_detail->id}}" data-name="{{$service_detail->name}}" value=" ">
                                <button class="plus-item btn btn-primary input-group-addon" data-id="{{$service_detail->id}}" >+</button></div>
                            </div>
                        </div> --> 
            
                        <!-- Botones de compra -->
                        <div class="section" style="padding-bottom:20px;">
                            <a href="#" data-id="{{$service_detail->id}}" data-name="{{$service_detail->name}}" data-price="{{$service_detail->cost}}" data-purchase="service" class="add-to-cart theme-btn primary">Add To Cart<span></span></a>
                            <a href="#" data-id="{{$service_detail->id}}" data-name="{{$service_detail->name}}" data-price="{{$service_detail->cost}}" data-purchase="service" data-toggle="modal" data-target="#cart" class="theme-btn add-to-cart">Buy Now<span></span></a>
                        </div>       
                    </div>
                     
                </div>
             </div>
        </section>


         
    @include('web.include.footer') 
    <script src="{{ asset('bower_components/web_js/jquery.elevatezoom.js') }}"></script>
    <script src="{{ asset('bower_components/web_js/zoom.js') }}"></script> 
    <script>
    $(document).ready(function(){
             

            $(".attr,.attr2").on("click",function(){
                var clase = $(this).attr("class");

                $("." + clase).removeClass("active");
                $(this).addClass("active");
            })

            //-- Click on QUANTITY
            $(".btn-minus").on("click",function(){
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)){
                    if (parseInt(now) -1 > 0){ now--;}
                    $(".section > div > input").val(now);
                }else{
                    $(".section > div > input").val("1");
                }
            })            
            $(".btn-plus").on("click",function(){
                var now = $(".section > div > input").val();
                if ($.isNumeric(now)){
                    $(".section > div > input").val(parseInt(now)+1);
                }else{
                    $(".section > div > input").val("1");
                }
            })                        
        }) 
    </script>  
      
</body>

</html>
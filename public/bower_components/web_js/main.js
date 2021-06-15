(function ($) {
 "use strict";
 
$('.menu>li').slice(-2).addClass('last-elements'); 
 
 
  $(window).on('scroll',function() {    
   var scroll = $(window).scrollTop();
   if (scroll < 245) {
    $(".header-sticky").removeClass("sticky");
   }else{
    $(".header-sticky").addClass("sticky");
   }
  }); 

 
$('.main-menu nav').meanmenu({
	meanScreenWidth: "991",
	meanMenuContainer: '.mobile-menu'
}); 
 
$('.grid').imagesLoaded( function() {
	
// filter items on button click
$('.portfolio-menu').on( 'click', 'button', function() {
  var filterValue = $(this).attr('data-filter');
  $grid.isotope({ filter: filterValue });
});	

// init Isotope
var $grid = $('.grid').isotope({
  itemSelector: '.grid-item',
  percentPosition: true,
  masonry: {
    // use outer width of grid-sizer for columnWidth
    columnWidth: '.grid-item',
  }
});



});

$('.portfolio-menu button').on('click', function(event) {
	$(this).siblings('.active').removeClass('active');
	$(this).addClass('active');
	event.preventDefault();
});


/* slider active  */ 
$('.slider-active').owlCarousel({
    loop:true,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    items:1,
    dots:false,
    nav:true,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

/* portfolio active  */ 
$('.portfolio-slider').owlCarousel({
    loop:true,
    items:1,
    dots:false,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',	
    nav:true,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
/* testimonial active  */ 
$('.testimonial-active').owlCarousel({
    loop:true,
    items:1,
    dots:false,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

/*--
Magnific Popup
------------------------*/
// $('.img-poppu').magnificPopup({
//     type: 'image',
//     gallery:{
//         enabled:true
//     }
// });
 

	$(".img-poppu a").each(function(i, obj){
  
  	obj.setAttribute("target", "_blank");
 
  });
 
/*--
menu-toggle
------------------------*/
$('.menu-toggle').on('click', function(){
	if( $('.menu-toggle').hasClass('is-active') ){
		$('.main-menu nav').removeClass('menu-open');
	}else {
		$('.main-menu nav').addClass('menu-open');
	}
});

    
/*--
	Hamburger js
-----------------------------------*/
var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};

var hamburgers = document.querySelectorAll(".hamburger");
if (hamburgers.length > 0) {
  forEach(hamburgers, function(hamburger) {
	hamburger.addEventListener("click", function() {
	  this.classList.toggle("is-active");
	}, false);
  });
}


/*--------------------------
    scrollUp
    ---------------------------- */	
    $(window).on('scroll',function () {
        if($(window).scrollTop()>200) {
            $("#toTop").fadeIn();
        } else {
            $("#toTop").fadeOut();
        }
    });
    $('#toTop').on('click', function() {
        $("html,body").animate({
            scrollTop:0
        }, 500)
    }); 


    /*---------------------
       Circular Bars - Knob
    --------------------- */	
	  if(typeof($.fn.knob) != 'undefined') {
		$('.knob').each(function () {
		  var $this = $(this),
			  knobVal = $this.attr('data-rel');
	
		  $this.knob({
			'draw' : function () { 
			  $(this.i).val(this.cv + '%')
			}
		  });
		  
		  $this.appear(function() {
			$({
			  value: 0
			}).animate({
			  value: knobVal
			}, {
			  duration : 2000,
			  easing   : 'swing',
			  step     : function () {
				$this.val(Math.ceil(this.value)).trigger('change');
			  }
			});
		  }, {accX: 0, accY: -150});
		});
    }	


 
})(jQuery);  



// ************************************************
// Shopping Cart API
// ************************************************

var shoppingCart = (function() {
  // =============================
  // Private methods and propeties
  // =============================
  cart = [];
  
  // Constructor
  function Item(id,name, price, purchase, count,datetime) {
    this.id = id;
    this.name = name;
    this.price = price;
	  this.purchase = purchase;
	  this.count = count;
	  this.datetime = datetime;
  }
  
  // Save cart
  function saveCart() {
    sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
  }
  
    // Load cart
  function loadCart() {
    cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
  }
  if (sessionStorage.getItem("shoppingCart") != null) {
    loadCart();
  }
  

  // =============================
  // Public methods and propeties
  // =============================
  var obj = {};
  
  // Add to cart
  obj.addItemToCart = function(id,name, price, purchase, count) {
    for(var item in cart) {
      if(cart[item].id === id) {
        cart[item].count ++;
        saveCart();
        return;
      }
    }
    var item = new Item(id,name, price, purchase, count );
    cart.push(item);
    saveCart();
  }
  // Set count from item
  obj.setCountForItem = function(name, count) {
    for(var i in cart) {
      if (cart[i].name === name) {
        cart[i].count = count;
        break;
      }
    }
  };
  // Remove item from cart
  obj.removeItemFromCart = function(name) {
      for(var item in cart) {
        if(cart[item].id === name) {
          cart[item].count --;
          if(cart[item].count === 0) {
            cart.splice(item, 1);
          }
          break;
        }
    }
    saveCart();
  }

  // Remove all items from cart
  obj.removeItemFromCartAll = function(name) {
    for(var item in cart) {
      if(cart[item].id === name) {
        cart.splice(item, 1);
        break;
      }
    }
    saveCart();
  }

  // Clear cart
  obj.clearCart = function() {
    cart = [];
    saveCart();
  }

  // Count cart 
  obj.totalCount = function() {
    var totalCount = 0;
    for(var item in cart) {
      totalCount += cart[item].count;
    }
    return totalCount;
  }

  // Total cart
  obj.totalCart = function() {
    var totalCart = 0;
    for(var item in cart) {
      totalCart += cart[item].price * cart[item].count;
    }
    return Number(totalCart.toFixed(2));
  }

  // List cart
  obj.listCart = function() {
    var cartCopy = [];
    for(i in cart) {
      item = cart[i];
      itemCopy = {};
      for(p in item) {
        itemCopy[p] = item[p];

      }
      itemCopy.total = Number(item.price * item.count).toFixed(2);
      cartCopy.push(itemCopy)
    }
    return cartCopy;
  }

  // cart : Array
  // Item : Object/Class
  // addItemToCart : Function
  // removeItemFromCart : Function
  // removeItemFromCartAll : Function
  // clearCart : Function
  // countCart : Function
  // totalCart : Function
  // listCart : Function
  // saveCart : Function
  // loadCart : Function
  return obj;
})();


// *****************************************
// Triggers / Events
// ***************************************** 
// Add item
$('.add-to-cart').click(function(event) {
  event.preventDefault(); 
  var id = $(this).data('id');
  var name = $(this).data('name');
  var price = Number($(this).data('price'));
  var datetime = $(this).data('datetime');
  var purchase = $(this).data('purchase'); 
  shoppingCart.addItemToCart(id,name,price,purchase,1);
  displayCart();
});

// Clear items
$('.clear-cart').click(function() {
  shoppingCart.clearCart();
  displayCart();
});


function displayCart() {
  var cartArray = shoppingCart.listCart();
  var output = "";
  for(var i in cartArray) { 
    output += "<tr id=" + [i] + ">"
      + "<td>" + cartArray[i].name + "</td>" 
      + "<td>(" + cartArray[i].price + ")</td>"
      + "<td><div class='input-group'><button class='minus-item input-group-addon btn btn-primary' data-id='" + cartArray[i].id + "' data-name=" + cartArray[i].name + ">-</button>"
      + "<input type='number' class='item-count form-control' name='qty[]'  id='qty"+i+"' data-id='" + cartArray[i].id + "' data-name='" + cartArray[i].name + "' value='" + cartArray[i].count + "'>"
      + "<input type='hidden' class='item-count form-control' name='service_id[]' id='service_id"+i+"' data-id='" + cartArray[i].id + "' data-name='" + cartArray[i].name + "' value='" + cartArray[i].id + "'>"
      + "<input type='hidden' class='item-count form-control' name='purchase_type[]' id='purchase_type"+i+"' data-id='" + cartArray[i].id + "' data-name='" + cartArray[i].name + "' value='" + cartArray[i].purchase + "'>"
	    + "<button class='plus-item btn btn-primary input-group-addon' data-id='" + cartArray[i].id + "' data-name=" + cartArray[i].name + ">+</button></div></td>"
	    + "<td><div class='input-group date datetimepicker" + i + "  id='datetimepicker1'><input type='text'  name='datetime[]' id='cal"+i+"' class='form-control' ><span class='item-count input-group-addon'><span class='fa fa-calendar' onClick='divFunction(" + i + "); myFunction("+i+");'></span></span></div></td>"
      + "<td><button class='delete-item btn btn-danger' data-id='" + cartArray[i].id + "' data-name=" + cartArray[i].name + ">X</button></td>"
	    + " = "  
      + "<td>" + cartArray[i].total + "</td>" 
      +  "</tr>";
  }
  $('.show-cart').html(output); 
  $('.total-cart').html(shoppingCart.totalCart()); 
  $('#total_amount').val(shoppingCart.totalCart());
  $('.total-count').html(shoppingCart.totalCount());
}
 
// Delete item button

$('.show-cart').on("click", ".delete-item", function(event) {
  var name = $(this).data('id')
  shoppingCart.removeItemFromCartAll(name);
  displayCart();
})


// -1
$('.show-cart').on("click", ".minus-item", function(event) {
  var name = $(this).data('id')
  shoppingCart.removeItemFromCart(name);
  displayCart();
})
// +1
$('.show-cart').on("click", ".plus-item", function(event) {
  var name = $(this).data('id')
  shoppingCart.addItemToCart(name);
  displayCart();
})

// Item count input
$('.show-cart').on("change", ".item-count", function(event) {
   var name = $(this).data('name');
   var count = Number($(this).val());
  shoppingCart.setCountForItem(name, count);
  displayCart();
});

displayCart();


function myFunction(i) { 
    var ten = parseInt(i) + 1;
    console.log("#cal"+ten);
    var lv_input = $("#cal"+ten).val();
    console.log(lv_input);
    if(lv_input == ""){
      alert("empty datetime"); 
      return false;
    } else{
      console.log("ok"); 
    }
 
}
 

         jQuery(document).ready(function(){
            jQuery('#submitForm').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('csrf-token')
                  }
              }); 
        console.log($('#Register').serialize());
        // $("table#tbl-1 tr").each(function( i ) { 
        //       var lv_input = $(this).parent().parent().parent().parent().find("#cal"+i).val();
        //       console.log(lv_input);
        //       if(lv_input == ""){
        //         alert("empty datetime"); 
        //         return false;
        //       } 
        //   });
			  if ($('#cus_name').val() == "" || $('#phone_num').val() == "") {
                $("#invalid-feedback").html("Both Fields are required");
          $("#invalid-feedback").css('color', 'red');
          } else if($(this).parent().parent().parent().parent().find("#cal0").val() == ""){
                $("table#tbl-1 tr").each(function( i ) { 
              var lv_input = $(this).parent().parent().parent().parent().find("#cal"+i).val();
              console.log(lv_input);
              if(lv_input == ""){
                alert("empty datetime"); 
                return false;
              } 
          });
          }
        
        else{
				var formdata = $('#Register').serialize();
				jQuery.ajax({
				 async: true,
				   url: "/save_services",
				   method: 'post',
				   data: formdata,
				   dataType: "json",
				   success: function(result){
					   if(result.errors)
					   {
						   jQuery('.alert-danger').html('');
 
						   jQuery.each(result.errors, function(key, value){
							   jQuery('.alert-danger').show();
							   jQuery('.alert-danger').append('<li>'+value+'</li>');
						   });
					   }
					   else
					   {
						   jQuery('.alert-danger').hide();
							$('#open').hide();
						   $('#cart').modal('hide');
						   alert("Thank you!");
						   shoppingCart.clearCart();
						   displayCart();
						   $("#invalid-feedback").html("");
						 //   $('.clear-cart').trigger('click');
					   }
				   }});
			  }
              
               });
            });
       
  
       
 
 
 
            $(document).ready(function() {
              $(".s-icon a").click(function () {
                        $('#qnimate').addClass('popup-box-on');
                          });
                        
                          $("#removeClass").click(function () {
                        $('#qnimate').removeClass('popup-box-on');
                          });
           });


          
    

   
    
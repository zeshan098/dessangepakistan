	<!-- header start -->
	<header>
			<div class="header-area">
				<div class="container">
					<div class="row">
					    <div class="col-lg-5 col-md-4 col-12"> 
						</div>
						<div class="col-lg-2 col-md-4 col-6">
							<div class="logo">
								<a href="/"><img src="../../img/logo.png" width="165" height="30"></a>
							</div>
						</div>
						<div class="col-lg-5 col-md-4 col-12"> 
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-12">
							<div class="main-menu">
								<nav>
									<ul class="menu">
										<li><a href="/">HOME</a></li>
										<li><a href="/womens-major-type">Women <i class="fa fa-angle-down" aria-hidden="true"></i></a>
										    <ul>
											@foreach($women_menu as $menuItem) 
                                                <li><a href="/women/{{ $menuItem->slug }}">{{ $menuItem->name }}</a>
												   @if( ! $menuItem->subtype->isEmpty())
														<ul>
															@foreach($menuItem->subtype as $subMenuItem)
																<li><a href="/women-services/{{ $subMenuItem->slug }}">{{ $subMenuItem->name }}</a></li>
															@endforeach
														</ul>
													@endif
												    
												</li> 
											@endforeach
												 
											</ul>
										</li>
										<li><a href="/mens-major-type">Men <i class="fa fa-angle-down" aria-hidden="true"></i></a>
										    <ul>
											@foreach($menu as $menuItem) 
                                                <li><a href="/men/{{ $menuItem->slug }}">{{ $menuItem->name }}</a>
												   @if( ! $menuItem->subtype->isEmpty())
														<ul>
															@foreach($menuItem->subtype as $subMenuItem)
																<li><a href="/men-services/{{ $subMenuItem->id }}">{{ $subMenuItem->name }}</a></li>
															@endforeach
														</ul>
													@endif
												    
												</li> 
											@endforeach
												 
											</ul>
										</li>
										<li><a href="/deals">Deal</a></li>
										
										 
										<li><a href="/product/product-major-type/">Products <i class="fa fa-angle-down" aria-hidden="true"></i></a>
											<ul>  
											@foreach($product_menu as $menuItems) 
                                                <li><a href="/product/product-major/{{ $menuItems->id }}">{{ $menuItems->name }}</a>
												   @if( ! $menuItems->prosubtype->isEmpty())
														<ul>
															@foreach($menuItems->prosubtype as $subMenu)
																<li><a href="/product/product-sub-type/{{ $subMenu->id }}">{{ $subMenu->name }}</a></li>
															@endforeach
														</ul>
													@endif
												    
												</li> 
											@endforeach
											</ul>
										</li>
										<li><a href="/lookbook">LOOK BOOK</a></li>
										<li><a href="/about">ABOUT</a></li>
										<li><a href="/contact">ContacT</a></li>
										<li><i class="fa fa-shopping-bag" data-toggle="modal" data-target="#cart"  aria-hidden="true"></i><span class="count">(<span class="total-count"></span>)</span></li>
										<li class="s-icon">
										  <a href="#" id="addClass" rel="external"><i class="fa fa-search"></i></a>
										</li>
									</ul>
								</nav>
							</div>
							<div class="mobile-menu"></div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- header end -->
		<!-- Modal -->
		<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none; z-index: 1000000000;">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Cart</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
				<div class="modal-body">
				<form method="post" id="Register">
				   {!! csrf_field() !!}
					<table class="show-cart table responsive-table" id="tbl-1">
					
					</table>
					<div>Total price: Rs<span class="total-cart"></span></div>
					<input type="hidden" class="form-control" id="total_amount" name="total_amount" placeholder="" value="" required>
				</div>
				<div class="modal-body" style ="">
					
				<div id="invalid-feedback"></div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="firstName">Name</label>
							<input type="text" class="form-control" id="cus_name" name="cus_name" placeholder="" value="" required="required">
							<div class="invalid-feedback">
							   Valid first name is required.
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="lastName">Phone#</label>
							<input type="text" class="form-control" id="phone_num" name="phone_num"placeholder="" value="" required="required">
							<div class="invalid-feedback">
							Valid last name is required.
							</div>
						</div>
						<div class="col-md-12 mb-3 form-group">
							<label for="brnach">Select Branch</label>
							<select id="selection" class="form-control" name="branch_id">
								<option value="1">Dessange Gulberg</option>
								<option value="3">Dessange DHA</option>
							</select>
							 
						</div>
					</div>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Continue Browsing</button>
					<button type="submit" id="submitForm" class="btn btn-primary">Check Out</button>
				</div>
				</form>
			</div>
		</div>
		</div> 
		
		<div id="qnimate" class="off">
            <div id="search" class="open">
            <button data-widget="remove" id="removeClass" class="close" type="button">×</button>
            <form action="{{ route('search_service') }}" method="GET">
                    <input type="text" placeholder="Type search keywords here" name="search"   id='service_ids' autocomplete="off" required>
					 
					<button class="btn btn-lg btn-site" type="submit"><i class="fa fa-search"></i> Search</button>
				</form> 
             
            </div>
        </div>
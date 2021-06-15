<!doctype html>
<html lang="en">

<head>
    @include('web.include.head')
</head>

<body>
    @include('web.include.header')
<!-- Portfolio Area -->	
<section class="portfolio-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-12">
						<div class="section-title">
							<h6>Works</h6>
							<h3>Our Collection</h3>
							<div class="line-bot"></div>
							<!--<p>All the lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>-->
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<!-- Project Nav -->
						<ul id="portfolio-nav" class="project-nav tr-list list-inline cbp-l-filters-work">
							<li data-filter="*" class="cbp-filter-item active">All</li>
							<li data-filter=".development" class="cbp-filter-item">Hair</li>
							<li data-filter=".ui-ux" class="cbp-filter-item">Make Up</li>
							<!--<li data-filter=".branding" class="cbp-filter-item">Branding</li>-->
							<!--<li data-filter=".seo" class="cbp-filter-item">SEO</li>-->
							<!--<li data-filter=".wordpress" class="cbp-filter-item">wordpress</li>-->
						</ul>
						<!-- End-Project Nav -->
					</div>
				</div>
				<div class="row">
					<div class="col-12">	
						<div class="portfolio-main">
							<div id="portfolio-item" class="portfolio-item-active">
								<!-- Single Portfolio -->
								<div class="cbp-item ui-ux development">
									<div class="portfolio-single">
										<div class="portfolio-img">
											<img src="img/portfolio/1.jpg" alt="#">
										</div>
										<div class="portfolio-content">
											<h4><a href="#">Art & Studio</a></h4>
											<p>UI/UX, Branding</p>
										</div>
										<a class="p-button" href="img/portfolio/1.jpg" data-fancybox="photo"><i class="fa fa-image"></i></a>
									</div>
								</div>
								<!-- End Single Portfolio -->
								<!-- Single Portfolio -->
								<div class="cbp-item ui-ux development">
									<div class="portfolio-single">
										<div class="portfolio-img">
											<img src="img/portfolio/2.jpg" alt="#">
										</div>
										<div class="portfolio-content">
											<h4><a href="#">Digital Media</a></h4>
											<p>Development, Seo</p>
										</div>
										<a class="p-button" href="img/portfolio/2.jpg" data-fancybox="photo"><i class="fa fa-image"></i></a>
									</div>
								</div>
								<!-- End Single Portfolio -->
								<!-- Single Portfolio -->
								<div class=" cbp-item development ui-ux">
									<div class="portfolio-single">
										<div class="portfolio-img">
											<img src="img/portfolio/3.jpg" alt="#">
										</div>
										<div class="portfolio-content">
											<h4><a href="#">Latest Bootstrap</a></h4>
											<p>Development, Seo</p>
										</div>
										<a class="p-button" href="img/portfolio/3.jpg" data-fancybox="photo"><i class="fa fa-image"></i></a>
									</div>
								</div>
								<!-- End Single Portfolio -->
								<!-- Single Portfolio -->
								<div class="cbp-item development development">
									<div class="portfolio-single">
										<div class="portfolio-img">
											<img src="img/portfolio/4.jpg" alt="#">
										</div>
										<div class="portfolio-content">
											<h4><a href="#">Fully Responsive</a></h4>
											<p>Seo, Wordpress</p>
										</div>
										<a class="p-button" href="img/portfolio/4.jpg" data-fancybox="photo"><i class="fa fa-image"></i></a>
									</div>
								</div>
								<!-- End Single Portfolio -->
								<!-- Single Portfolio -->
								<div class="cbp-item development wordpress">
									<div class="portfolio-single">
										<div class="portfolio-img">
											<img src="img/portfolio/5.jpg" alt="#">
										</div>
										<div class="portfolio-content">
											<h4><a href="#">Quality Coding</a></h4>
											<p>Development, Wordpress</p>
										</div>
										<a class="p-button" href="img/portfolio/1.jpg" data-fancybox="photo"><i class="fa fa-image"></i></a>
									</div>
								</div>
								<!-- End Single Portfolio -->
								<!-- Single Portfolio -->
								<div class="cbp-item development ui-ux">
									<div class="portfolio-single">
										<div class="portfolio-img">
											<img src="img/portfolio/6.jpg" alt="#">
										</div>
										<div class="portfolio-content">
											<h4><a href="#">Easy to Customize</a></h4>
											<p>UI/UX, Development</p>
										</div>
										<a class="p-button" href="img/portfolio/6.jpg" data-fancybox="photo"><i class="fa fa-image"></i></a>
									</div>
								</div>
								<!-- End Single Portfolio -->
							</div>	
						</div>	
					</div>
				</div>	
			</div>
		</section>
		<!-- End Portfolio Area -->	
	
		<!-- Subscribe Area -->
		<section class="subscribe-area" style="background-image: url(img/subscribe-bg.jpg);">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-12 wow fadeInLeft" data-wow-duration="1s">
						<div class="subscribe-content">
							<h2>Subscribe & stay updated</h2>
							<p>Posuere nam natoque nec rhoncus malesuad phasel ante.</p>
						</div>
						<form class="form-main">
							<div class="form-group">
								<input type="email" name="Email" placeholder="Your email adress" required="required">
								<button type="submit" class="theme-btn">Subscribe Now</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- End Subscribe Area -->

    @include('web.include.footer')
</body>

</html>
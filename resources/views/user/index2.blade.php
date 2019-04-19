<!DOCTYPE HTML>
<html>
<head>
	<title>Nhạc của chúng tui</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Mosaic Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.css" type='text/css' />
	<!-- //lined-icons -->
	<!-- Meters graphs -->
	<link rel="stylesheet" type="text/css" href="css/index.css"
	medial="all" />


	<script src="js/jquery-2.1.4.js"></script>

</head> 
<!-- /w3layouts-agile -->
<body class="sticky-header left-side-collapsed"  onload="initMap()">
	<!-- left side start-->
	<div class="left-side sticky-left-side">
		<!--logo and iconic logo start-->
		<div class="logo">
			<h1><a href="index.html">NTCC</a></h1>
		</div>
		<div class="logo-icon text-center">
			<a href="index.html">N</a>
		</div>
		<!-- /w3l-agile -->
		<!--logo and iconic logo end-->
		<div class="left-side-inner">
			<!--sidebar nav start-->
			<ul class="nav nav-pills nav-stacked custom-nav">
				<li><a href=""><i class="lnr lnr-user"></i><span>Đăng nhập</span></a></li>
				<li class="active"><a href=""><i class="lnr lnr-home"></i><span>Trang Chủ</span></a></li>
				<li><a href="song"><i class="camera"></i> <span>Bài Hát</span></a></li>
				<li><a href="artis"><i class="lnr lnr-users"></i> <span>Nghệ Sĩ</span></a></li> 
				<li><a href="album"><i class="lnr lnr-music-note"></i> <span>Albums</span></a></li>			
				<li><a href=""><i class="lnr lnr-heart"></i><span>Nhạc Cá Nhân</span></a></li>  
			</ul>
			<!--sidebar nav end-->
		</div>
	</div>
	<div class="main-content ">
		<!-- header-starts -->
		<div class="header-section ">
			<div class="menu-righ">
				<div class="row">
					<div class="col-md-2 col-sm-2 col-xs-2">												
						<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
					</div>
					<div class="col-md-8 col-sm-10 col-xs-10">
						<div id="sb-search" class="sb-search">
							<form action="#" method="post">
								<input class="sb-search-input" placeholder="Search" type="search" name="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"></span>
							</form>
						</div>
					</div>
							<!-- search-scripts -->
					<script src="js/classie.js"></script>
					<script src="js/uisearch.js"></script>
					<script>
						new UISearch( document.getElementById( 'sb-search' ) );
					</script>
				</div>
			</div>
			<!--toggle button start-->
			<!--toggle button end-->
			<!--notification menu start -->

			<div class="clearfix"></div>
		</div>
		<div id="page-wrapper">
			<div class="inner-content">
				<div class="music-left">
					<!--banner-section-->
					<div class="banner-section">
						<div class="banner">
							<div class="callbacks_container">
								<ul class="rslides callbacks callbacks1" id="slider4">
									<li>
										<div class="banner-img">
											<img src="images/11.jpg" class="img-responsive" alt="">
										</div>
										<div class="banner-info">
											<a class="trend" href="single.html">THỊNH HÀNH</a>
											<h3>Let Your Home</h3>
											<p>Album by <span>Rock star</span></p>
										</div>

									</li>
									<li>
										<div class="banner-img">
											<img src="images/22.jpg" class="img-responsive" alt="">
										</div>
										<div class="banner-info">
											<a class="trend" href="single.html">THỊNH HÀNH</a>
											<h3>Charis Brown feet</h3>
											<p>Album by <span>Rock star</span></p>
										</div>


									</li>
									<li>
										<div class="banner-img">
											<img src="images/33.jpg" class="img-responsive" alt="">
										</div>
										<div class="banner-info"> 
											<a class="trend" href="single.html">THỊNH HÀNH</a>
											<h3>Let Your Home</h3>
											<p>Album by <span>Rock star</span></p>
										</div>

										<!-- /w3layouts-agileits -->
									</li>
								</ul>
							</div>
							<!--banner-->
							<script src="js/responsiveslides.min.js"></script>
							<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider4").responsiveSlides({
						  	auto: true,
						  	pager:true,
						  	nav:true,
						  	speed: 500,
						  	namespace: "callbacks",
						  	before: function () {
						  		$('.events').append("<li>before event fired.</li>");
						  	},
						  	after: function () {
						  		$('.events').append("<li>after event fired.</li>");
						  	}
						  });

						});
					</script>
					<div class="clearfix"> </div>
				</div>
			</div>	
			<!--//End-banner-->
			<!--albums-->
			<!-- pop-up-box --> 
			<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all">
			<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
			<script>
				$(document).ready(function() {
					$('.popup-with-zoom-anim').magnificPopup({
						type: 'inline',
						fixedContentPos: false,
						fixedBgPos: true,
						overflowY: 'auto',
						closeBtnInside: true,
						preloader: false,
						midClick: true,
						removalDelay: 300,
						mainClass: 'my-mfp-zoom-in'
					});
				});
			</script>		
			<!--//pop-up-box -->
			<div class="albums">
				<div class="tittle-head">
					<div class="row">
						<h3 class="tittle col-md-8">Mới phát hành <span class="new">New</span></h3>
						<a href="index.html" class="col-md-4"><h4 class="tittle">Xem tất cả</h4></a>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-3 content-grid">
					<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/v1.jpg" title="allbum-name"></a>
					<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Nghe</a>
				</div>
				<div id="small-dialog" class="mfp-hide">
					<iframe src="https://player.vimeo.com/video/12985622"></iframe>
					
				</div>
				<div class="col-md-3 content-grid">
					<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/v2.jpg" title="allbum-name"></a>

					<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Nghe</a>
				</div>
				<div class="col-md-3 content-grid">
					<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/v3.jpg" title="allbum-name"></a>

					<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Nghe</a>
				</div>
				<div class="col-md-3 content-grid last-grid">
					<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/v4.jpg" title="allbum-name"></a>

					<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Nghe</a>
				</div>
				<div class="col-md-3 content-grid">
					<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/v5.jpg" title="allbum-name"></a>

					<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Nghe</a>
				</div>
				<div id="small-dialog" class="mfp-hide">
					<iframe src="https://player.vimeo.com/video/12985622"></iframe>
					
				</div>
				<div class="col-md-3 content-grid">
					<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/v6.jpg" title="allbum-name"></a>

					<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Nghe</a>
				</div>
				<div class="col-md-3 content-grid">
					<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/v7.jpg" title="allbum-name"></a>

					<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Nghe</a>
				</div>
				<div class="col-md-3 content-grid last-grid">
					<a class="play-icon popup-with-zoom-anim" href="#small-dialog"><img src="images/v8.jpg" title="allbum-name"></a>
					<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">Nghe</a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!--//End-albums-->
			<!--//discover-view-->
			
			<div class="albums second">
				<div class="tittle-head">
					<h3 class="tittle">Khám phá <span class="new">View</span></h3>
					<a href="index.html"><h4 class="tittle two">Xem tất cả</h4></a>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-3 content-grid">
					<a href="single.html"><img src="images/v11.jpg" title="allbum-name"></a>
					<div class="inner-info"><a href="single.html"><h5>Pop</h5></a></div>
				</div>
				<div class="col-md-3 content-grid">
					<a href="single.html"><img src="images/v22.jpg" title="allbum-name"></a>
					<div class="inner-info"><a href="single.html"><h5>Pop</h5></a></div>
				</div>
				<div class="col-md-3 content-grid">
					<a href="single.html"><img src="images/v33.jpg" title="allbum-name"></a>
					<div class="inner-info"><a href="single.html"><h5>Pop</h5></a></div>
				</div>
				<div class="col-md-3 content-grid last-grid">
					<a href="single.html"><img src="images/v44.jpg" title="allbum-name"></a>
					<div class="inner-info"><a href="single.html"><h5>Pop</h5></a></div>
				</div>
				<div class="col-md-3 content-grid">
					<a href="single.html"><img src="images/v55.jpg" title="allbum-name"></a>
					<div class="inner-info"><a href="single.html"><h5>Pop</h5></a></div>
				</div>
				<div class="col-md-3 content-grid">
					<a href="single.html"><img src="images/v66.jpg" title="allbum-name"></a>
					<div class="inner-info"><a href="single.html"><h5>Pop</h5></a></div>
				</div>
				<div class="col-md-3 content-grid">
					<a href="single.html"><img src="images/v11.jpg" title="allbum-name"></a>
					<div class="inner-info"><a href="single.html"><h5>Pop</h5></a></div>
				</div>
				<div class="col-md-3 content-grid last-grid">
					<a href="single.html"><img src="images/v22.jpg" title="allbum-name"></a>
					<div class="inner-info"><a href="single.html"><h5>Pop</h5></a></div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!--//discover-view-->
		</div>
		<!--//music-left-->
		<!--/music-right-->
		<div class="music-right">
			<!--/video-main-->
			<div class="video-main">
				<div class="video-record-list">
					<div>
						<div class="jp-type-playlist">
							<div class="jp-playlist">
								<ul style="display: block;">
									<h1>BẢNG XẾP HẠNG BÀI HÁT</h1>
									<li class="jp-playlist-current">
										<div>
											<a href="" class="jp-playlist-item jp-playlist-current" tabindex="0">1. Ellie-Goulding</a>
										</div>
									</li>
									<li>
										<div>
											<a href="" class="jp-playlist-item" tabindex="0">2. Mark-Ronson-Uptown</a>
										</div>
									</li>
									<li>
										<div>
											<a href="" class="jp-playlist-item" tabindex="0">3. Ellie-Goulding <span class="jp-artist"></a>
											</div>
										</li>
										<li>
											<div>

												<a href="" class="jp-playlist-item" tabindex="0">4. Maroon-Sugar</a>
											</div>
										</li>
										<li>
											<div>
												<a href="" class="jp-playlist-item" tabindex="0">5. Pharrell-Williams</a>
											</div>
										</li>
										<li>
											<div>

												<a href="" class="jp-playlist-item" tabindex="0">6. Ellie-Goulding</a>
											</div>
										</li>
										<li>
											<div>
												<a href="" class="jp-playlist-item" tabindex="0">7. Pharrell-Williams></a>
											</div>
										</li>
										<li>
											<div>
												<a href="" class="jp-playlist-item" tabindex="0">8. Pharrell-Williams></a>
											</div>
										</li>
										<li>
											<div>
												<a href="" class="jp-playlist-item" tabindex="0">9. Pharrell-Williams></a>
											</div>
										</li>
										<li>
											<div>
												<a href="" class="jp-playlist-item" tabindex="0">10. Pharrell-Williams></a>
											</div>
										</li>
									</ul>
									<ul style="display: block;">
										<h1>BẢNG XẾP HẠNG ALBUMS</h1>
										<li class="jp-playlist-current">
											<div>
												<a href="" class="jp-playlist-item jp-playlist-current" tabindex="0">1. Ellie-Goulding</a>
											</div>
										</li>
										<li>
											<div>
												<a href="" class="jp-playlist-item" tabindex="0">2. Mark-Ronson-Uptown</a>
											</div>
										</li>
										<li>
											<div>
												<a href="" class="jp-playlist-item" tabindex="0">3. Ellie-Goulding <span class="jp-artist"></a>
												</div>
											</li>
											<li>
												<div>

													<a href="" class="jp-playlist-item" tabindex="0">4. Maroon-Sugar</a>
												</div>
											</li>
											<li>
												<div>
													<a href="" class="jp-playlist-item" tabindex="0">5. Pharrell-Williams</a>
												</div>
											</li>
											<li>
												<div>

													<a href="" class="jp-playlist-item" tabindex="0">6. Ellie-Goulding</a>
												</div>
											</li>
											<li>
												<div>
													<a href="" class="jp-playlist-item" tabindex="0">7. Pharrell-Williams></a>
												</div>
											</li>
											<li>
												<div>
													<a href="" class="jp-playlist-item" tabindex="0">8. Pharrell-Williams></a>
												</div>
											</li>
											<li>
												<div>
													<a href="" class="jp-playlist-item" tabindex="0">9. Pharrell-Williams></a>
												</div>
											</li>
											<li>
												<div>
													<a href="" class="jp-playlist-item" tabindex="0">10. Pharrell-Williams></a>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- script for play-list -->
					<link href="css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css">
					<script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
					<script type="text/javascript" src="js/jplayer.playlist.min.js"></script>

					<!-- //script for play-list -->

					<!--//video-main-->

					<!--/start-paricing-tables-->
				</div>

				<!--//music-right-->
				<div class="clearfix"></div>
				<!-- /w3l-agile-its -->
			</div>
			<!--body wrapper start-->

			<div class="review-slider">
				<div class="tittle-head">
					<h3 class="tittle">Albums nổi bật <span class="new"> New</span></h3>
					<div class="clearfix"></div>
				</div>
				<ul id="flexiselDemo1">
					<li>
						<a href="single.html"><img src="images/v1.jpg" alt=""/></a>
						<div class="slide-title"><h4>Adele21 </div>
							<div class="date-city">
								<h5>Jan-02-16</h5>
								<div class="buy-tickets">
									<a href="single.html">Xem thêm</a>
								</div>
							</div>
						</li>
						<li>
							<a href="single.html"><img src="images/v2.jpg" alt=""/></a>
							<div class="slide-title"><h4>Adele21</h4></div>
							<div class="date-city">
								<h5>Jan-02-16</h5>
								<div class="buy-tickets">
									<a href="single.html">Xem thêm</a>
								</div>
							</div>
						</li>
						<li>
							<a href="single.html"><img src="images/v3.jpg" alt=""/></a>
							<div class="slide-title"><h4>Shomlock</h4></div>
							<div class="date-city">
								<h5>Jan-02-16</h5>
								<div class="buy-tickets">
									<a href="single.html">Xem thêm</a>
								</div>
							</div>
						</li>
						<li>
							<a href="single.html"><img src="images/v4.jpg" alt=""/></a>
							<div class="slide-title"><h4>Stuck on a feeling</h4></div>
							<div class="date-city">
								<h5>Jan-02-16</h5>
								<div class="buy-tickets">
									<a href="single.html">Xem thêm</a>
								</div>
							</div>
						</li>
						<li>
							<a href="single.html"><img src="images/v5.jpg" alt=""/></a>
							<div class="slide-title"><h4>Ricky Martine </h4></div>
							<div class="date-city">
								<h5>Jan-02-16</h5>
								<div class="buy-tickets">
									<a href="single.html">Xem thêm</a>
								</div>
							</div>
						</li>
						<li>
							<a href="single.html"><img src="images/v6.jpg" alt=""/></a>
							<div class="slide-title"><h4>Ellie Goluding </h4></div>
							<div class="date-city">
								<h5>Jan-02-16</h5>
								<div class="buy-tickets">
									<a href="single.html">Xem thêm</a>
								</div>
							</div>
						</li>
						<li>
							<a href="single.html"><img src="images/v6.jpeg" alt=""/></a>
							<div class="slide-title"><h4>Fifty Shades </h4></div>
							<div class="date-city">
								<h5>Jan-02-16</h5>
								<div class="buy-tickets">
									<a href="single.html">Xem thêm</a>
								</div>
							</div>
						</li>
					</ul>
					<script type="text/javascript">
						$(window).load(function() {

							$("#flexiselDemo1").flexisel({
								visibleItems: 5,
								animationSpeed: 1000,
								autoPlay: true,
								autoPlaySpeed: 3000,    		
								pauseOnHover: false,
								enableResponsiveBreakpoints: true,
								responsiveBreakpoints: { 
									portrait: { 
										changePoint:480,
										visibleItems: 2
									}, 
									landscape: { 
										changePoint:640,
										visibleItems: 3
									},
									tablet: { 
										changePoint:800,
										visibleItems: 4
									}
								}
							});
						});
					</script>
					<script type="text/javascript" src="js/jquery.flexisel.js"></script>	
				</div>
			</div>
			<div class="clearfix"></div>
			<!--body wrapper end-->
			<!-- /w3l-agile -->
		</div>
		<!--body wrapper end-->
		<div class="footer">
			<div class="footer-grid">
				<h3>Navigation</h3>
				<ul class="list1">
					<li><a href="index.html">Trang Chủ</a></li>
					<li><a href="radio.html">All Songs</a></li>
					<li><a href="browse.html">Albums</a></li>
					<li><a href="radio.html">New Collections</a></li>
					<li><a href="blog.html">Blog</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
			</div>
			<div class="footer-grid">
				<h3>Our Account</h3>
				<ul class="list1">
					<li><a href="#" data-toggle="modal" data-target="#myModal5">Your Account</a></li>
					<li><a href="#">Personal information</a></li>
					<li><a href="#">Addresses</a></li>
					<li><a href="#">Discount</a></li>
					<li><a href="#">Orders history</a></li>
					<li><a href="#">Addresses</a></li>
					<li><a href="#">Search Terms</a></li>
				</ul>
			</div>
			<div class="footer-grid">
				<h3>Our Support</h3>
				<ul class="list1">
					<li><a href="contact.html">Site Map</a></li>
					<li><a href="#">Search Terms</a></li>
					<li><a href="#">Advanced Search</a></li>
					<li><a href="#">Mobile</a></li>
					<li><a href="contact.html">Contact Us</a></li>
					<li><a href="#">Mobile</a></li>
					<li><a href="#">Addresses</a></li>
				</ul>
			</div>
			<div class="footer-grid">
				<h3>Newsletter</h3>
				<p class="footer_desc">Nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat</p>
				<div class="search_footer">
					<form>
						<input type="text" placeholder="Email...." required="">
						<input type="submit" value="Submit">
					</form>
				</div>
			</div>
			<div class="footer-grid footer-grid_last">
				<h3>About Us</h3>
				<p class="footer_desc">Diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat enim ad minim veniam,.</p>
				<p class="f_text">Phone:  &nbsp;&nbsp;&nbsp;00-250-2131</p>
				<p class="email">Email : &nbsp;<span><a href="mailto:mail@example.com">info(at)mailing.com</a></span></p>	
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--footer section start-->
	<footer>
		<p>&copy 2016 Mosaic. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts.</a></p>
	</footer>
	<!--footer section end-->
	<!-- /w3l-agile -->
	<!-- main content end-->


	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"></script>
</body>
</html>
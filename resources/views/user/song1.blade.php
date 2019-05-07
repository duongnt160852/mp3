
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<title>Nhạc của chúng tui</title>
	<base href="{{asset('')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Mosaic Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.10/css/all.css'>
  	<link rel="stylesheet" type="text/css" href="css/audio2.css">
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.css" type='text/css' />
	<!-- //lined-icons -->
	<!-- Meters graphs -->
	<script src="js/jquery-2.1.4.js"></script>


</head> 
<!-- /w3layouts-agile -->
<body class="sticky-header left-side-collapsed"  onload="initMap()">
	<section>
		<!-- left side start-->
		<div class="left-side sticky-left-side">

			<!--logo and iconic logo start-->
			<div class="logo">
				<h1><a href="index.html">Mosai<span>c</span></a></h1>
			</div>
			<div class="logo-icon text-center">
				<a href="index.html">M </a>
			</div>
			<!-- /w3l-agile -->
			<!--logo and iconic logo end-->
			<div class="left-side-inner">
				<!--sidebar nav start-->
				<ul class="nav nav-pills nav-stacked custom-nav">
					<li class="active"><a href=""><i class="lnr lnr-home"></i><span>Trang Chủ</span></a></li>
					<li><a href=""><i class="lnr lnr-user"></i><span>Đăng nhập</span></a></li>
					<li><a href="song"><i class="camera"></i> <span>Bài Hát</span></a></li>
					<li><a href="artis"><i class="lnr lnr-users"></i> <span>Nghệ Sĩ</span></a></li> 
					<li><a href="album"><i class="lnr lnr-music-note"></i> <span>Albums</span></a></li>	
					<li><a href=""><i class="lnr lnr-heart"></i><span>Nhạc Cá Nhân</span></a></li>      
				</ul>
				<!--sidebar nav end-->
			</div>
		</div>
		<!-- left side end-->
		<!-- main content start-->
		<div class="main-content">
			<!-- header-starts -->
			<div class="header-section">
				<!--toggle button start-->
				<!--toggle button end-->
				<!--notification menu start -->
				<div class="menu-right">
					<div class="profile_details">		
						<div class="row">
							<div class="col-md-2 col-sm-2 col-xs-2">
								<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
							</div>
							<div class="col-md-8 col-sm-10 col-xs-10">
								<div id="sb-search" class="sb-search">
									<form action="search" method="post" autocomplete="off" id="form1">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<input class="sb-search-input" placeholder="Search" type="search" name="search" id="search" onkeyup="showResult()">
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
						<div class="clearfix"> </div>
					</div>
					<!-------->
				</div>
				<div class="clearfix"></div>
			</div>
			<!--notification menu end -->
			<!-- //header-ends -->
			<!-- /w3l-agileits -->
			<!-- //header-ends -->
			<div id="page-wrapper">
				<div class="inner-content">
					<div class="music-left">
						<div class="frame1" >
						<div id="player1">
							<div class="album1">
								<audio id="audio1"  controls="controls" style="display:none" >
								<source src="media/Dung-Nguoi-Dung-Thoi-Diem-Thanh-Hung.mp3" type="audio/mpeg"></source>
								</audio>
								<!-- <div class="heart"><i class="fas fa-heart"></i></div> -->
							</div>
							<div class="info1">
								<div class="currently-playing">
										<h2 class="song-name">{{$song->name}}</h2>
										<h3 class="artist-name">Ca sĩ: Nguyễn Tùng Dương - Sáng tác: {{$song->musician}}</h3>
									</div>
								<div class="progress-bar">
									
									<!-- <div class="fill1"> -->
										<span class="time--current">0:00</span>
										<div id="fill" class="fill"></div>
										<span class="time--total"></span> 
									<!-- </div> -->
									
								</div>
								<div style="visibility:hidden">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</div>
								<div class="controls">
								<!-- <div class="option"><i class="fas fa-bars"></i></div> -->
								<div class="shuffle"><i class="fas fa-redo-alt"></i></div>
								<div class="previous"><i class="fas fa-fast-backward"></i></div>
								<div style="border: none" class="play togglePlay" onClick="togglePlay()"><i class="fas fa-pause"></i></div>
								<!-- <div style="border: none" class="pause togglePlay" onClick="togglePlay()"><i class="fas fa-pause"></i></div> -->
								<div class="next" style="margin-right:25px"><i class="fas fa-fast-forward"></i></div>
								<div style="margin-right:10px" id="volume1"><i class="fas fa-volume-up"></i></div>
								<div class="volume1"></div>
								<div class="add" title="Thêm vào playlist"><i class="fas fa-plus"></i></div>
								</div>
							</div>
							</div>
							<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css'>
							<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
							<script>
								var link="{{$song->link}}";
							</script>
							<script  src="js/audio1.js"></script>
						</div>
						<div class="lyric">
							<!-- <div class="info">
								<div class="casi text-info">Ca sĩ:Trần Văn A</div>
								<div class="tacgia text-info">Tác giả:Trần Văn B</div>
							</div> -->
							<u>Lời bài hát:</u>
							<div class="content">{!! $song->lyric !!}</div>							 
						</div>
						<!--//End-albums-->
					</div>
					<!--//music-left-->
					<!--/music-right-->
					<div class="music-right">
						<!--/video-main-->
						<div class="video-main">
							<div class="video-record-list">
								<div id="jp_container_1" class="jp-video jp-video-270p" role="application" aria-label="media player">
									<div class="jp-type-playlist">
										<h2>ĐỀ XUẤT</h2>
										<div class="jp-playlist">
											<ul style="display: block;">
												<li class="">
													<div>
														
														<a href="">1. Ellie-Goulding</a>
													</div>
												</li>
												<li>
													<div>
														<a href="">2. Mark-Ronson-Uptown</a>
													</div>
												</li>
												<li class="">
													<div>
														
														<a href="">1. Ellie-Goulding</a>
													</div>
												</li>
												<li>
													<div>
														<a href="">2. Mark-Ronson-Uptown</a>
													</div>
												</li>
												<li class="">
													<div>
														
														<a href="">1. Ellie-Goulding</a>
													</div>
												</li>
												<li>
													<div>
														<a href="">2. Mark-Ronson-Uptown</a>
													</div>
												</li>
												<li class="">
													<div>
														
														<a href="">1. Ellie-Goulding</a>
													</div>
												</li>
												<li>
													<div>
														<a href="">2. Mark-Ronson-Uptown</a>
													</div>
												</li>
												<li class="">
													<div>
														
														<a href="">1. Ellie-Goulding</a>
													</div>
												</li>
												<li>
													<div>
														<a href="">2. Mark-Ronson-Uptown</a>
													</div>
												</li>
											</ul>
										</div>
										<div class="jp-no-solution" style="display: none;">
											<span>Update Required</span>
											To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- script for play-list -->
						<link href="css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css">
					</div>
					<!--//music-right-->
					<div class="clearfix"></div>
					<!-- /w3l-agile-its -->
				</div>
				<!--body wrapper start-->

				<div class="review-slider">
					<div class="tittle-head">
						<h3 class="tittle">Featured Albums <span class="new"> New</span></h3>
						<div class="clearfix"> </div>
					</div>
					<ul id="flexiselDemo1">
						<li>
							<a href="single.html"><img src="images/v1.jpg" alt=""/></a>
							<div class="slide-title"><h4>Adele21 </div>
								<div class="date-city">
									<h5>Jan-02-16</h5>
									<div class="buy-tickets">
										<a href="single.html">READ MORE</a>
									</div>
								</div>
							</li>
							<li>
								<a href="single.html"><img src="images/v2.jpg" alt=""/></a>
								<div class="slide-title"><h4>Adele21</h4></div>
								<div class="date-city">
									<h5>Jan-02-16</h5>
									<div class="buy-tickets">
										<a href="single.html">READ MORE</a>
									</div>
								</div>
							</li>
							<li>
								<a href="single.html"><img src="images/v3.jpg" alt=""/></a>
								<div class="slide-title"><h4>Shomlock</h4></div>
								<div class="date-city">
									<h5>Jan-02-16</h5>
									<div class="buy-tickets">
										<a href="single.html">READ MORE</a>
									</div>
								</div>
							</li>
							<li>
								<a href="single.html"><img src="images/v4.jpg" alt=""/></a>
								<div class="slide-title"><h4>Stuck on a feeling</h4></div>
								<div class="date-city">
									<h5>Jan-02-16</h5>
									<div class="buy-tickets">
										<a href="single.html">READ MORE</a>
									</div>
								</div>
							</li>
							<li>
								<a href="single.html"><img src="images/v5.jpg" alt=""/></a>
								<div class="slide-title"><h4>Ricky Martine </h4></div>
								<div class="date-city">
									<h5>Jan-02-16</h5>
									<div class="buy-tickets">
										<a href="single.html">READ MORE</a>
									</div>
								</div>
							</li>
							<li>
								<a href="single.html"><img src="images/v6.jpg" alt=""/></a>
								<div class="slide-title"><h4>Ellie Goluding </h4></div>
								<div class="date-city">
									<h5>Jan-02-16</h5>
									<div class="buy-tickets">
										<a href="single.html">READ MORE</a>
									</div>
								</div>
							</li>
							<li>
								<a href="single.html"><img src="images/v6.jpeg" alt=""/></a>
								<div class="slide-title"><h4>Fifty Shades </h4></div>
								<div class="date-city">
									<h5>Jan-02-16</h5>
									<div class="buy-tickets">
										<a href="single.html">READ MORE</a>
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
						<li><a href="index.html">Home</a></li>
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
	</section>

	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"></script>
</body>
</html>
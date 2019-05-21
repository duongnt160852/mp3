<!DOCTYPE HTML>
<html>
<head>
<title>Nhạc của chúng tui</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Mosaic Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link rel='stylesheet' href='fontawesome/css/all.css'>
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
<body class="sticky-header left-side-collapsed">
	<!-- left side start-->
	<div class="left-side sticky-left-side">
		<!--logo and iconic logo start-->
		<div class="logo">
			<h1><a href="{{Route("gethome")}}">NCCT</a></h1>
		</div>
		<div class="logo-icon text-center">
			<a href="{{Route("gethome")}}">N</a>
		</div>
		<!-- /w3l-agile -->
		<!--logo and iconic logo end-->
		<div class="left-side-inner">
			<!--sidebar nav start-->
			<ul class="nav nav-pills nav-stacked custom-nav">
				<li><a href="{{Route("gethome")}}"><i class="lnr lnr-home"></i><span>Trang Chủ</span></a></li>
				@if($user!=null)
				<li><a href="playlist"><i class="lnr lnr-heart"></i><span>Trang Cá Nhân</span></a></li> 		
				@endif
				<li><a href="bai-hat"><i class="camera"></i> <span>Bài Hát</span></a></li>
				<li><a href="nghe-si"><i class="lnr lnr-users"></i> <span>Nghệ Sĩ</span></a></li> 
				<li class="active"><a href="album"><i class="lnr lnr-music-note"></i> <span>Albums</span></a></li>			
				 @if($user!=null)
				 <li><a href="upload"><i class="lnr lnr-cloud-upload"></i> <span>Upload</span></a></li>
				<li><a href="user/logout"><i class="fas fa-sign-out-alt"></i><span>Đăng Xuất</span></a></li>
				@endif
			</ul>
			<!--sidebar nav end-->
		</div>
	</div>
			<!-- //app-->
 	 <!-- /w3l-agile -->
		<!-- signup -->
			@include("user.signup")
	<div class="main-content ">
		<!-- header-starts -->
		@include("user.header")
		<!--notification menu end -->
		<!-- //header-ends -->
	 <!-- /w3l-agile -->
	<!-- //header-ends -->
		<div id="page-wrapper">
			<div class="inner-content">
			      <div class="music-browse">
				<!--albums-->
				<!-- pop-up-box --> 
						<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all">	
				<!--//pop-up-box -->
				
					<div class="browse">
							
							<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
							  
							<div id="myTabContent" class="tab-content">
								<div class="tittle-head two">
								<h3 class="tittle" style="color: #2e9afe;">Album Mới Nhất <span class="new">New</span></h3>
								<div class="clearfix"> </div>
							</div>
							  <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
								<div class="browse-inner">
							 	 <!-- /agileits -->
								@foreach($newAlbums as $song)
									<div class="col-md-3 artist-grid">
									<a  href="album/{{$song->title}}"><img src="{{$song->image}}"></a>
									<a href="album/{{$song->title}}"><i class="glyphicon glyphicon-play-circle"></i></a>
									<a class="art" href="album/{{$song->title}}" >{{$song->name}}</a>
									</div>
								@endforeach
								
									<div class="clearfix"> </div>
									</div>
										</div>
							</div>
						</div>
					 	 <!-- /agileinfo -->
					</div>
				<!--//End-albums-->
				
					<!--//discover-view-->
							<div class="albums fourth">
									<div class="tittle-head two">
										<h3 class="tittle" style="color: #2e9afe;">Album Nghe Nhiều Nhất <span class="new">View</span></h3>
										<a href="browse.html"><h4 class="tittle third">See all</h4></a>
										<div class="clearfix"> </div>
									</div>
										@foreach($mostViewAlbums as $song)
											<div class="col-md-3 artist-grid">
											<a  href="album/{{$song->title}}"><img src="{{$song->image}}"></a>
											<a href="album/{{$song->title}}"><i class="glyphicon glyphicon-play-circle"></i></a>
											<a class="art" href="album/{{$song->title}}" >{{$song->name}}</a>
											</div>
										@endforeach
										<div class="clearfix"> </div>
									</div>
								</div>
							<!--//discover-view-->
						<!--//music-left-->
						</div>
					</div>
							</div>
						<div class="clearfix"></div>
				</div>
				 <div class="clearfix"> </div>
			</div>
		</div>
</section>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.js"></script>
</body>
</html>
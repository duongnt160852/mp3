<!DOCTYPE HTML>
<html>
<head>
	<title>Nhạc của chúng tui</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<base href="{{asset('')}}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
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
	<link rel="stylesheet" type="text/css" href="css/index.css"
	medial="all" />


	<script src="js/jquery-2.1.4.js"></script>

</head> 
<!-- /w3layouts-agile -->
<body class="sticky-header left-side-collapsed">
	<!-- left side start-->
	@include("user.leftSide")
			<!-- //app-->
 	 <!-- /w3l-agile -->
		<!-- signup -->
		@include("user.signup")	
	<div class="main-content ">
		<!-- header-starts -->
		@include("user.header")
		<div id="page-wrapper">
			<div class="inner-content">
				<div class="music-left">
					<!--banner-section-->
					<div class="banner-section">
						<div class="banner">
							
							<!--banner-->
							<script src="js/responsiveslides.min.js"></script>
					<div class="clearfix"> </div>
				</div>
			</div>	
			<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all">	
			<!--//pop-up-box -->
			<div class="albums" style="padding-top: 0px">
				<div class="tittle-head">
					<div class="row">
						<h3 class="tittle col-md-8" style="color: #2e9afe;">BÀI HÁT MỚI PHÁT HÀNH <span class="new">New</span></h3>
						<div class="clearfix"> </div>
					</div>
				</div>
				@foreach($newMusics as $song)
					<div class="col-md-3 content-grid">
						<a class="play-icon" href="bai-hat/{{$song->title}}"><img src="{{$song->image}}" title="{{$song->name}}"></a>
						<a class="button play-icon " href="bai-hat/{{$song->title}}" style="height: 50px">{{$song->name}}</a>
					</div>
				@endforeach
				<div class="clearfix"> </div>
			</div>
			<div class="albums" style="padding-top: 0px">
				<div class="tittle-head">
					<div class="row">
						<h3 class="tittle col-md-8" style="color: #2e9afe;">ALBUM MỚI PHÁT HÀNH <span class="new">New</span></h3>
						<div class="clearfix"> </div>
					</div>
				</div>
				@foreach($newAlbums as $album)
					<div class="col-md-3 content-grid">
						<a class="play-icon" href="album/{{$album->title}}"><img src="{{$album->image}}" title="{{$album->name}}"></a>
						<a class="button play-icon" href="album/{{$album->title}}" style="height: 50px">{{$album->name}}</a>
					</div>
				@endforeach
				<div class="clearfix"> </div>
			</div>
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
								<ul>
									<h1 style="color: #2e9afe;">BẢNG XẾP HẠNG BÀI HÁT</h1>
									@foreach($mostViewMusics as $song)
										<li>
										<div style="display: flex;padding:6px 20px 11px 20px;">
											<div style="margin-right: 10px">
												<a href="bai-hat/{{$song->title}}"><span><img src="{{$song->image}}" width="60px" height="60px"></span></a>
											</div>
											<div >
												<a style="font-size:1.5em!important" href="bai-hat/{{$song->title}}" class="jp-playlist-item" tabindex="0">{{$song->name}}</a>
												@for($i=0;$i<count($song->music_singer);$i++)
													@if($i+1==count($song->music_singer)) 
														<a href="nghe-si/{{$song->music_singer[$i]->singer->title}}" style="display:inline;font-size:1em!important">{{$song->music_singer[$i]->singer->name}}</a>
													@else
														<a href="nghe-si/{{$song->music_singer[$i]->singer->title}}"style="display:inline;font-size:1em!important">{{$song->music_singer[$i]->singer->name}}</a>,
													@endif
												@endfor
												<br>
												<div>
													<i class="fas fa-headphones"></i> {{$song->views}} 
												</div>
											</div>
										</div>
									</li>
									@endforeach
									</ul>
									<ul>
										<h1 style="color: #2e9afe;">BẢNG XẾP HẠNG ALBUM</h1>
										@foreach($mostViewAlbums as $album)
											<li>
												<div style="display: flex;padding:6px 20px 11px 20px;">
													<div style="margin-right: 10px">
														<a href="album/{{$album->title}}"><span><img src="{{$album->image}}" width="60px" height="60px"></span></a>
													</div>
													<div >
														<a style="font-size:1.5em!important" href="album/{{$album->title}}" class="jp-playlist-item" tabindex="0">{{$album->name}}</a>
														@for($i=0;$i<count($album->album_singer);$i++)
															@if($i+1==count($album->album_singer)) 
																<a href="nghe-si/{{$album->album_singer[$i]->singer->title}}" style="display:inline;font-size:1em!important">{{$album->album_singer[$i]->singer->name}}</a>
															@else
																<a href="nghe-si/{{$album->album_singer[$i]->singer->title}}" style="display:inline;font-size:1em!important">{{$album->album_singer[$i]->singer->name}}</a>,
															@endif
														@endfor
														<br>
														<div>
															<i class="fas fa-headphones"></i> {{$album->views}} 
														</div>
													</div>
												</div>
											</li>
										@endforeach
										</ul>
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
			</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"></script>
</body>
</html>
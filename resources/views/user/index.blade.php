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
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.10/css/all.css'>
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
				<li class="active"><a href=""><i class="lnr lnr-home"></i><span>Trang Chủ</span></a></li>
				@if($user!=null)
				<li><a href="playlist"><i class="lnr lnr-heart"></i><span>Trang Cá Nhân</span></a></li> 		
				@endif
				<li><a href="bai-hat"><i class="camera"></i> <span>Bài Hát</span></a></li>
				<li><a href="nghe-si"><i class="lnr lnr-users"></i> <span>Nghệ Sĩ</span></a></li> 
				<li><a href="album"><i class="lnr lnr-music-note"></i> <span>Albums</span></a></li>			
				 @if($user!=null)
				<li><a href="user/logout"><i class="fas fa-sign-out-alt"></i><span>Đăng Xuất</span></a></li>
				@endif
			</ul>
			<!--sidebar nav end-->
		</div>
	</div>
			<!-- //app-->
 	 <!-- /w3l-agile -->
		<!-- signup -->
			<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
							<div class="sign-grids">
								<div class="sign">
									<div class="sign-left">
										<ul>
											<li><a class="fb" href="#"><i></i>Sign in with Facebook</a></li>
											<li><a class="goog" href="#"><i></i>Sign in with Google</a></li>
											<li><a class="linkin" href="#"><i></i>Sign in with Linkedin</a></li>
										</ul>
									</div>
									<div class="sign-right">
										<form action="signup" method="post" autocomplete="off">
											<input type="hidden" name="_token" value="{{csrf_token()}}">
											<h3>Tạo tài khoản </h3>
											<input type="text" placeholder="Họ và tên" name="name1" id="name1" required="">
											<div id="errname" style="color:red;text-align: center;display:none">
												
											</div>
											<input type="text" placeholder="Tên đăng nhập" name="username1" id="username1" required="">
											<div id="errusername" style="color:red;text-align: center;display:none">
												
											</div>
											<input type="email" placeholder="Email" name="email1" id="email1" required="">
											<div id="errmail" style="color:red;text-align: center;display:none">
												
											</div>
											<input type="password" placeholder="Mật khẩu" name="password1" id="password1" required="">	
											<div id="errpassword" style="color:red;text-align: center;display:none">
												
											</div>
											<input type="password" placeholder="Xác nhận mật khẩu" name="password_confirmation1" id="password_confirmation1" required="">	
											<div id="errpassword_confirmation" style="color:red;text-align: center;display:none">
												
											</div>
											<input type="button" value="Tạo tài khoản" id="signup">
										</form>
									</div>
									<div class="clearfix"></div>								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script>
				$("#signup").click(function(e){
					$.ajaxSetup({
				        headers: {
				            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				        }
					});
					$.ajax({
							'url' : 'signup',
							'data': {
								"name":$("#name1").val(),"username":$("#username1").val(),"email":$("#email1").val(),"password_confirmation":$("#password_confirmation1").val(), "password":$("#password1").val()
							},
							'type' : 'POST',
							success: function (data) {
								if (data.error == true) {
									if (data.message.name != undefined) {
										$('#errname').css("display","block");
										$('#errname').text(data.message.name[0]);
									}
									else{
										$('#errname').css("display","none");
									}
									if (data.message.username != undefined) {
										$('#errusername').css("display","block");
										$('#errusername').text(data.message.username[0]);
									}
									else{
										$('#errusername').css("display","none");
									}
									if (data.message.email != undefined) {
										$('#errmail').css("display","block");
										$('#errmail').text(data.message.email[0]);
									}
									else{
										$('#errmail').css("display","none");
									}
									if (data.message.password != undefined) {
										$('#errpassword').css("display","block");
										$('#errpassword').text(data.message.password[0]);
									}
									else{
										$('#errpassword').css("display","none");
									}
									if (data.message.password_confirmation != undefined) {
										$('#errpassword_confirmation').css("display","block");
										$('#errpassword_confirmation').text(data.message.password_confirmation[0]);
									}
									else{
										$('#errpassword_confirmation').css("display","none");
									}
								} else {
									$("#myModal5").css("display","none");
									$(".modal-backdrop").css("display","none");
									$("#name1").val("");
									$("#username1").val("");
									$("#email1").val("");
									$("#password1").val("");
									$("#password_confirmation1").val("");
									$('#errname').val("");
									$('#errusername').val("");
									$('#errmail').val("");
									$('#errpassword').val("");
									$('#errpassword_confirmation').val("");
									alert('Tạo tài khoản thành công, hãy đăng nhập để sử dụng đầy đủ chức năng');
								}
							}
						});
				});
			</script>
	<div class="main-content ">
		<!-- header-starts -->
		<div class="header-section ">
			<div class="menu-right">
				<div class="row" style="height:64px">
					<div class="col-md-2 col-sm-2 col-xs-2">												
						<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<div id="sb-search" class="sb-search">
							<form action="search" method="post" autocomplete="off" id="form1">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<input class="sb-search-input" placeholder="Search" type="search" name="search" id="search" onkeyup="showResult()">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"></span>
							</form>
						</div>
						<div style="max-height:700px;overflow-y:auto;position:absolute;right:92px;top:66px;z-index: 999;border: 1px solid black;width: 74.7%;display:none;background-color: #fff" id="result" class="result2">
							
						</div>
					</div>
					
					@if($user==null)
					<div class="col-md-2 col-sm-2 col-xs-2 login-pop">
						<div id="loginpop"> <a href="#" id="loginButton"><span style="font-size: 0.7em!important">Đăng nhập <i class="arrow glyphicon glyphicon-chevron-right"></i></span></a><a class="top-sign" href="#" data-toggle="modal" data-target="#myModal5"><i class="fa fa-sign-in"></i></a>
									<div id="loginBox">  
							<form method="post" action="user/login" autocomplete="off" id="loginForm">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
												<fieldset id="body">
													<fieldset style="display:none" id="none">
														<label style="background-color: red;color:white;padding:2px">Đăng nhập thất bại</label>
													</fieldset>
													<fieldset>
														  <label for="email">Tên đăng nhập</label>
														  <input type="text" name="username" id="username">
													</fieldset>
													<fieldset>
															<label for="password">Mật khẩu</label>
															<input type="password" name="password" id="password">
													 </fieldset>
													 
													<input type="button" id="login" value="Đăng nhập">
													<label for="checkbox"><input type="checkbox" id="checkbox"><i>Nhớ mật khẩu?</i></label>

												</fieldset>

											<span><a href="#">Quên mật khẩu?</a></span>

									 </form>
								</div>
						</div>

					
					</div>
					@endif
					<script>
						$('#login').click(function(e) {
							$.ajaxSetup({
							        headers: {
							            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							        }
							});
							$.ajax({
									'url' : 'ajax/login',
									'data': {
										"username":$("#username").val(), "password":$("#password").val(),"checkbox":$("#checkbox").val()
									},
									'type' : 'POST',
									success: function (data) {
										if (data.error == true) {
											$("#none").css("display","block");
										} else {
											location.reload();
										}
									}
								});
						});
					</script>
										<div class="clearfix"> </div>
							<!-- search-scripts -->
					<script src="js/classie.js"></script>
					<script src="js/uisearch.js"></script>
					<script>
						new UISearch( document.getElementById( 'sb-search' ) );
					</script>
					<script>
						function showResult(){
							var str=$("#search").val();
							if(str.length!=0){
								$("#result").css("display","block");
								$.get("ajax/search/"+str,function(data){
									$("#result").html(data);
								});
							}
							else{
								$("#result").css("display","none");
							}
						}

						$(".sb-icon-search").click(function(){
							var str=$("#search").val();
							if(str.length!=0){
								$("#form1").submit();
							}
						});
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
						<h3 class="tittle col-md-8" style="color: #2e9afe;">MỚI PHÁT HÀNH <span class="new">New</span></h3>
						<a href="index.html" class="col-md-4"><h4 class="tittle">Xem tất cả</h4></a>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-3 content-grid">
					<a class="play-icon" href="bai-hat/{{$newMusics[0]->title}}"><img src="{{$newMusics[0]->image}}" title="{{$newMusics[0]->title}}"></a>
					<a class="button play-icon" href="bai-hat/{{$newMusics[0]->title}}">{{$newMusics[0]->name}}</a>
				</div>
				<div class="col-md-3 content-grid">
					<a class="play-icon" href="bai-hat/{{$newMusics[1]->title}}"><img src="{{$newMusics[1]->image}}" title="{{$newMusics[1]->title}}"></a>
					<a class="button play-icon" href="bai-hat/{{$newMusics[1]->title}}">{{$newMusics[1]->name}}</a>
				</div>
				<div class="col-md-3 content-grid">
					<a class="play-icon" href="bai-hat/{{$newMusics[2]->title}}"><img src="{{$newMusics[2]->image}}" title="{{$newMusics[2]->title}}"></a>
					<a class="button play-icon" href="bai-hat/{{$newMusics[2]->title}}">{{$newMusics[2]->name}}</a>
				</div>
				<div class="col-md-3 content-grid">
					<a class="play-icon" href="bai-hat/{{$newMusics[3]->title}}"><img src="{{$newMusics[3]->image}}" title="{{$newMusics[3]->title}}"></a>
					<a class="button play-icon" href="bai-hat/{{$newMusics[3]->title}}">{{$newMusics[3]->name}}</a>
				</div>
				<div class="col-md-3 content-grid">
					<a class="play-icon" href="bai-hat/{{$newMusics[4]->title}}"><img src="{{$newMusics[4]->image}}" title="{{$newMusics[4]->title}}"></a>
					<a class="button play-icon" href="bai-hat/{{$newMusics[4]->title}}">{{$newMusics[4]->name}}</a>
				</div>
				<div class="col-md-3 content-grid">
					<a class="play-icon" href="bai-hat/{{$newMusics[5]->title}}"><img src="{{$newMusics[5]->image}}" title="{{$newMusics[5]->title}}"></a>
					<a class="button play-icon" href="bai-hat/{{$newMusics[5]->title}}">{{$newMusics[5]->name}}</a>
				</div>
				<div class="col-md-3 content-grid">
					<a class="play-icon" href="bai-hat/{{$newMusics[6]->title}}"><img src="{{$newMusics[6]->image}}" title="{{$newMusics[6]->title}}"></a>
					<a class="button play-icon" href="bai-hat/{{$newMusics[6]->title}}">{{$newMusics[6]->name}}</a>
				</div>
				<div class="col-md-3 content-grid">
					<a class="play-icon" href="bai-hat/{{$newMusics[7]->title}}"><img src="{{$newMusics[7]->image}}" title="{{$newMusics[7]->title}}"></a>
					<a class="button play-icon" href="bai-hat/{{$newMusics[7]->title}}">{{$newMusics[7]->name}}</a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!--//End-albums-->
			<!--//discover-view-->
			
			<div class="albums second">
				<div class="tittle-head">
					<h3 class="tittle" style="color: #2e9afe;">KHÁM PHÁ <span class="new">View</span></h3>
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
								<ul>
									<h1 style="color: #2e9afe;">BẢNG XẾP HẠNG BÀI HÁT</h1>
									<li>
										<div style="display: flex;padding:6px 20px 11px 20px;">
											<div style="margin-right: 10px">
												<a href="bai-hat/{{$mostViewMusics[0]->title}}"><span><img src="{{$mostViewMusics[0]->image}}" width="60px" height="60px"></span></a>
											</div>
											<div >
												<a style="font-size:1.5em!important" href="bai-hat/{{$mostViewMusics[0]->title}}" class="jp-playlist-item" tabindex="0">{{$mostViewMusics[0]->name}}</a>
												@for($i=0;$i<count($mostViewMusics[0]->music_singer);$i++)
													@if($i==0) 
													<a style="display:inline;font-size:1em!important" href="">{{$mostViewMusics[0]->music_singer[$i]->singer->name}}</a>
													@else
													, <a style="display:inline;font-size:1em!important" href="">{{$mostViewMusics[0]->music_singer[$i]->singer->name}}</a>
													@endif
												@endfor
												<br>
												<div>
													<i class="fas fa-headphones"></i> {{$mostViewMusics[0]->views}} 
												</div>
											</div>
										</div>
									</li>
									<li>
										<div style="display: flex;padding:6px 20px 11px 20px;">
											<div style="margin-right: 10px">
												<a href="bai-hat/{{$mostViewMusics[1]->title}}"><span><img src="{{$mostViewMusics[1]->image}}" width="60px" height="60px"></span></a>
											</div>
											<div >
												<a style="font-size:1.5em!important" href="bai-hat/{{$mostViewMusics[1]->title}}" class="jp-playlist-item" tabindex="0">{{$mostViewMusics[1]->name}}</a>
												@for($i=0;$i<count($mostViewMusics[1]->music_singer);$i++)
													@if($i==0) 
													<a style="display:inline;font-size:1em!important" href="">{{$mostViewMusics[1]->music_singer[$i]->singer->name}}</a>
													@else
													, <a style="display:inline;font-size:1em!important" href="">{{$mostViewMusics[1]->music_singer[$i]->singer->name}}</a>
													@endif
												@endfor
												<br>
												<div>
													<i class="fas fa-headphones"></i> {{$mostViewMusics[1]->views}} 
												</div>
											</div>
										</div>
									</li>
									<li>
										<div style="display: flex;padding:6px 20px 11px 20px;">
											<div style="margin-right: 10px">
												<a href="bai-hat/{{$mostViewMusics[2]->title}}"><span><img src="{{$mostViewMusics[2]->image}}" width="60px" height="60px"></span></a>
											</div>
											<div >
												<a style="font-size:1.5em!important" href="bai-hat/{{$mostViewMusics[2]->title}}" class="jp-playlist-item" tabindex="0">{{$mostViewMusics[2]->name}}</a>
												@for($i=0;$i<count($mostViewMusics[2]->music_singer);$i++)
													@if($i==0) 
													<a style="display:inline;font-size:1em!important" href="">{{$mostViewMusics[2]->music_singer[$i]->singer->name}}</a>
													@else
													, <a style="display:inline;font-size:1em!important" href="">{{$mostViewMusics[2]->music_singer[$i]->singer->name}}</a>
													@endif
												@endfor
												<br>
												<div>
													<i class="fas fa-headphones"></i> {{$mostViewMusics[2]->views}} 
												</div>
											</div>
										</div>
									</li>
									<li>
										<div style="display: flex;padding:6px 20px 11px 20px;">
											<div style="margin-right: 10px">
												<a href="bai-hat/{{$mostViewMusics[3]->title}}"><span><img src="{{$mostViewMusics[3]->image}}" width="60px" height="60px"></span></a>
											</div>
											<div >
												<a style="font-size:1.5em!important" href="bai-hat/{{$mostViewMusics[3]->title}}" class="jp-playlist-item" tabindex="0">{{$mostViewMusics[3]->name}}</a>
												@for($i=0;$i<count($mostViewMusics[3]->music_singer);$i++)
													@if($i==0) 
													<a style="display:inline;font-size:1em!important" href="">{{$mostViewMusics[3]->music_singer[$i]->singer->name}}</a>
													@else
													, <a style="display:inline;font-size:1em!important" href="">{{$mostViewMusics[3]->music_singer[$i]->singer->name}}</a>
													@endif
												@endfor
												<br>
												<div>
													<i class="fas fa-headphones"></i> {{$mostViewMusics[3]->views}} 
												</div>
											</div>
										</div>
									</li>
									<li>
										<div style="display: flex;padding:6px 20px 11px 20px;">
											<div style="margin-right: 10px">
												<a href="bai-hat/{{$mostViewMusics[4]->title}}"><span><img src="{{$mostViewMusics[4]->image}}" width="60px" height="60px"></span></a>
											</div>
											<div >
												<a style="font-size:1.5em!important" href="bai-hat/{{$mostViewMusics[4]->title}}" class="jp-playlist-item" tabindex="0">{{$mostViewMusics[4]->name}}</a>
												@for($i=0;$i<count($mostViewMusics[4]->music_singer);$i++)
													@if($i==0) 
													<a style="display:inline;font-size:1em!important" href="">{{$mostViewMusics[4]->music_singer[$i]->singer->name}}</a>
													@else
													, <a style="display:inline;font-size:1em!important" href="">{{$mostViewMusics[4]->music_singer[$i]->singer->name}}</a>
													@endif
												@endfor
												<br>
												<div>
													<i class="fas fa-headphones"></i> {{$mostViewMusics[4]->views}} 
												</div>
											</div>
										</div>
									</li>
									<li>
										<div style="display: flex;padding:6px 20px 11px 20px;">
											<div style="margin-right: 10px">
												<a href="bai-hat/{{$mostViewMusics[5]->title}}"><span><img src="{{$mostViewMusics[5]->image}}" width="60px" height="60px"></span></a>
											</div>
											<div >
												<a style="font-size:1.5em!important" href="bai-hat/{{$mostViewMusics[5]->title}}" class="jp-playlist-item" tabindex="0">{{$mostViewMusics[5]->name}}</a>
												@for($i=0;$i<count($mostViewMusics[5]->music_singer);$i++)
													@if($i==0) 
													<a style="display:inline;font-size:1em!important" href="">{{$mostViewMusics[5]->music_singer[$i]->singer->name}}</a>
													@else
													, <a style="display:inline;font-size:1em!important" href="">{{$mostViewMusics[5]->music_singer[$i]->singer->name}}</a>
													@endif
												@endfor
												<br>
												<div>
													<i class="fas fa-headphones"></i> {{$mostViewMusics[5]->views}} 
												</div>
											</div>
										</div>
									</li>
									<li>
										<div style="display: flex;padding:6px 20px 11px 20px;">
											<div style="margin-right: 10px">
												<a href="bai-hat/{{$mostViewMusics[6]->title}}"><span><img src="{{$mostViewMusics[6]->image}}" width="60px" height="60px"></span></a>
											</div>
											<div >
												<a style="font-size:1.5em!important" href="bai-hat/{{$mostViewMusics[6]->title}}" class="jp-playlist-item" tabindex="0">{{$mostViewMusics[6]->name}}</a>
												@for($i=0;$i<count($mostViewMusics[6]->music_singer);$i++)
													@if($i==0) 
													<a style="display:inline;font-size:1em!important" href="">{{$mostViewMusics[6]->music_singer[$i]->singer->name}}</a>
													@else
													, <a style="display:inline;font-size:1em!important" href="">{{$mostViewMusics[6]->music_singer[$i]->singer->name}}</a>
													@endif
												@endfor
												<br>
												<div>
													<i class="fas fa-headphones"></i> {{$mostViewMusics[6]->views}} 
												</div>
											</div>
										</div>
									</li>
									<li>
										<div style="display: flex;padding:6px 20px 11px 20px;">
											<div style="margin-right: 10px">
												<a href="bai-hat/{{$mostViewMusics[7]->title}}"><span><img src="{{$mostViewMusics[7]->image}}" width="60px" height="60px"></span></a>
											</div>
											<div >
												<a style="font-size:1.5em!important" href="bai-hat/{{$mostViewMusics[7]->title}}" class="jp-playlist-item" tabindex="0">{{$mostViewMusics[7]->name}}</a>
												@for($i=0;$i<count($mostViewMusics[7]->music_singer);$i++)
													@if($i==0) 
													<a style="display:inline;font-size:1em!important" href="">{{$mostViewMusics[7]->music_singer[$i]->singer->name}}</a>
													@else
													, <a style="display:inline;font-size:1em!important" href="">{{$mostViewMusics[7]->music_singer[$i]->singer->name}}</a>
													@endif
												@endfor
												<br>
												<div>
													<i class="fas fa-headphones"></i> {{$mostViewMusics[7]->views}} 
												</div>
											</div>
										</div>
									</li>
									<li>
										<div style="display: flex;padding:6px 20px 11px 20px;">
											<div style="margin-right: 10px">
												<a href="bai-hat/{{$mostViewMusics[8]->title}}"><span><img src="{{$mostViewMusics[8]->image}}" width="60px" height="60px"></span></a>
											</div>
											<div >
												<a style="font-size:1.5em!important" href="bai-hat/{{$mostViewMusics[8]->title}}" class="jp-playlist-item" tabindex="0">{{$mostViewMusics[8]->name}}</a>
												@for($i=0;$i<count($mostViewMusics[8]->music_singer);$i++)
													@if($i==0) 
													<a style="display:inline;font-size:1em!important" href="">{{$mostViewMusics[8]->music_singer[$i]->singer->name}}</a>
													@else
													, <a style="display:inline;font-size:1em!important" href="">{{$mostViewMusics[8]->music_singer[$i]->singer->name}}</a>
													@endif
												@endfor
												<br>
												<div>
													<i class="fas fa-headphones"></i> {{$mostViewMusics[8]->views}} 
												</div>
											</div>
										</div>
									</li>
									<li>
										<div style="display: flex;padding:6px 20px 11px 20px;">
											<div style="margin-right: 10px">
												<a href="bai-hat/{{$mostViewMusics[9]->title}}"><span><img src="{{$mostViewMusics[9]->image}}" width="60px" height="60px"></span></a>
											</div>
											<div >
												<a style="font-size:1.5em!important" href="bai-hat/{{$mostViewMusics[9]->title}}" class="jp-playlist-item" tabindex="0">{{$mostViewMusics[9]->name}}</a>
												@for($i=0;$i<count($mostViewMusics[9]->music_singer);$i++)
													@if($i==0) 
													<a style="display:inline;font-size:1em!important" href="">{{$mostViewMusics[9]->music_singer[$i]->singer->name}}</a>
													@else
													, <a style="display:inline;font-size:1em!important" href="">{{$mostViewMusics[9]->music_singer[$i]->singer->name}}</a>
													@endif
												@endfor
												<br>
												<div>
													<i class="fas fa-headphones"></i> {{$mostViewMusics[9]->views}} 
												</div>
											</div>
										</div>
									</li>
									</ul>
									<ul>
										<h1 style="color: #2e9afe;">BẢNG XẾP HẠNG ALBUM</h1>
									<li>
										<div style="display: flex;padding:6px 20px 11px 20px;">
											<div style="margin-right: 10px">
												<a href="bai-hat/{{$mostViewAlbums[0]->title}}"><span><img src="{{$mostViewAlbums[0]->image}}" width="60px" height="60px"></span></a>
											</div>
											<div >
												<a style="font-size:1.5em!important" href="bai-hat/{{$mostViewAlbums[0]->title}}" class="jp-playlist-item" tabindex="0">{{$mostViewAlbums[0]->name}}</a>
												@for($i=0;$i<count($mostViewAlbums[0]->album_singer);$i++)
													@if($i==0) 
													<a style="display:inline;font-size:1em!important" href="">{{$mostViewAlbums[0]->album_singer[$i]->singer->name}}</a>
													@else
													, <a style="display:inline;font-size:1em!important" href="">{{$mostViewAlbums[0]->album_singer[$i]->singer->name}}</a>
													@endif
												@endfor
												<br>
												<div>
													<i class="fas fa-headphones"></i> {{$mostViewAlbums[0]->views}} 
												</div>
											</div>
										</div>
									</li>
									<li>
										<div style="display: flex;padding:6px 20px 11px 20px;">
											<div style="margin-right: 10px">
												<a href="album/{{$mostViewAlbums[1]->title}}"><span><img src="{{$mostViewAlbums[1]->image}}" width="60px" height="60px"></span></a>
											</div>
											<div >
												<a style="font-size:1.5em!important" href="album/{{$mostViewAlbums[1]->title}}" class="jp-playlist-item" tabindex="0">{{$mostViewAlbums[1]->name}}</a>
												@for($i=0;$i<count($mostViewAlbums[1]->album_singer);$i++)
													@if($i==0) 
													<a style="display:inline;font-size:1em!important" href="">{{$mostViewAlbums[1]->album_singer[$i]->singer->name}}</a>
													@else
													, <a style="display:inline;font-size:1em!important" href="">{{$mostViewAlbums[1]->album_singer[$i]->singer->name}}</a>
													@endif
												@endfor
												<br>
												<div>
													<i class="fas fa-headphones"></i> {{$mostViewAlbums[1]->views}} 
												</div>
											</div>
										</div>
									</li>
									<li>
										<div style="display: flex;padding:6px 20px 11px 20px;">
											<div style="margin-right: 10px">
												<a href="album/{{$mostViewAlbums[2]->title}}"><span><img src="{{$mostViewAlbums[2]->image}}" width="60px" height="60px"></span></a>
											</div>
											<div >
												<a style="font-size:1.5em!important" href="album/{{$mostViewAlbums[2]->title}}" class="jp-playlist-item" tabindex="0">{{$mostViewAlbums[2]->name}}</a>
												@for($i=0;$i<count($mostViewAlbums[2]->album_singer);$i++)
													@if($i==0) 
													<a style="display:inline;font-size:1em!important" href="">{{$mostViewAlbums[2]->album_singer[$i]->singer->name}}</a>
													@else
													, <a style="display:inline;font-size:1em!important" href="">{{$mostViewAlbums[2]->album_singer[$i]->singer->name}}</a>
													@endif
												@endfor
												<br>
												<div>
													<i class="fas fa-headphones"></i> {{$mostViewAlbums[2]->views}} 
												</div>
											</div>
										</div>
									</li>
									<li>
										<div style="display: flex;padding:6px 20px 11px 20px;">
											<div style="margin-right: 10px">
												<a href="album/{{$mostViewAlbums[3]->title}}"><span><img src="{{$mostViewAlbums[3]->image}}" width="60px" height="60px"></span></a>
											</div>
											<div >
												<a style="font-size:1.5em!important" href="album/{{$mostViewAlbums[3]->title}}" class="jp-playlist-item" tabindex="0">{{$mostViewAlbums[3]->name}}</a>
												@for($i=0;$i<count($mostViewAlbums[3]->album_singer);$i++)
													@if($i==0) 
													<a style="display:inline;font-size:1em!important" href="">{{$mostViewAlbums[3]->album_singer[$i]->singer->name}}</a>
													@else
													, <a style="display:inline;font-size:1em!important" href="">{{$mostViewAlbums[3]->album_singer[$i]->singer->name}}</a>
													@endif
												@endfor
												<br>
												<div>
													<i class="fas fa-headphones"></i> {{$mostViewAlbums[3]->views}} 
												</div>
											</div>
										</div>
									</li>
									<li>
										<div style="display: flex;padding:6px 20px 11px 20px;">
											<div style="margin-right: 10px">
												<a href="album/{{$mostViewAlbums[4]->title}}"><span><img src="{{$mostViewAlbums[4]->image}}" width="60px" height="60px"></span></a>
											</div>
											<div >
												<a style="font-size:1.5em!important" href="album/{{$mostViewAlbums[4]->title}}" class="jp-playlist-item" tabindex="0">{{$mostViewAlbums[4]->name}}</a>
												@for($i=0;$i<count($mostViewAlbums[4]->album_singer);$i++)
													@if($i==0) 
													<a style="display:inline;font-size:1em!important" href="">{{$mostViewAlbums[4]->album_singer[$i]->singer->name}}</a>
													@else
													, <a style="display:inline;font-size:1em!important" href="">{{$mostViewAlbums[4]->album_singer[$i]->singer->name}}</a>
													@endif
												@endfor
												<br>
												<div>
													<i class="fas fa-headphones"></i> {{$mostViewAlbums[4]->views}} 
												</div>
											</div>
										</div>
									</li>
									<li>
										<div style="display: flex;padding:6px 20px 11px 20px;">
											<div style="margin-right: 10px">
												<a href="album/{{$mostViewAlbums[5]->title}}"><span><img src="{{$mostViewAlbums[5]->image}}" width="60px" height="60px"></span></a>
											</div>
											<div >
												<a style="font-size:1.5em!important" href="album/{{$mostViewAlbums[5]->title}}" class="jp-playlist-item" tabindex="0">{{$mostViewAlbums[5]->name}}</a>
												@for($i=0;$i<count($mostViewAlbums[5]->album_singer);$i++)
													@if($i==0) 
													<a style="display:inline;font-size:1em!important" href="">{{$mostViewAlbums[5]->album_singer[$i]->singer->name}}</a>
													@else
													, <a style="display:inline;font-size:1em!important" href="">{{$mostViewAlbums[5]->album_singer[$i]->singer->name}}</a>
													@endif
												@endfor
												<br>
												<div>
													<i class="fas fa-headphones"></i> {{$mostViewAlbums[5]->views}} 
												</div>
											</div>
										</div>
									</li>
									<li>
										<div style="display: flex;padding:6px 20px 11px 20px;">
											<div style="margin-right: 10px">
												<a href="album/{{$mostViewAlbums[6]->title}}"><span><img src="{{$mostViewAlbums[6]->image}}" width="60px" height="60px"></span></a>
											</div>
											<div >
												<a style="font-size:1.5em!important" href="album/{{$mostViewAlbums[6]->title}}" class="jp-playlist-item" tabindex="0">{{$mostViewAlbums[6]->name}}</a>
												@for($i=0;$i<count($mostViewAlbums[6]->album_singer);$i++)
													@if($i==0) 
													<a style="display:inline;font-size:1em!important" href="">{{$mostViewAlbums[6]->album_singer[$i]->singer->name}}</a>
													@else
													, <a style="display:inline;font-size:1em!important" href="">{{$mostViewAlbums[6]->album_singer[$i]->singer->name}}</a>
													@endif
												@endfor
												<br>
												<div>
													<i class="fas fa-headphones"></i> {{$mostViewAlbums[6]->views}} 
												</div>
											</div>
										</div>
									</li>
									<li>
										<div style="display: flex;padding:6px 20px 11px 20px;">
											<div style="margin-right: 10px">
												<a href="album/{{$mostViewAlbums[7]->title}}"><span><img src="{{$mostViewAlbums[7]->image}}" width="60px" height="60px"></span></a>
											</div>
											<div >
												<a style="font-size:1.5em!important" href="album/{{$mostViewAlbums[7]->title}}" class="jp-playlist-item" tabindex="0">{{$mostViewAlbums[7]->name}}</a>
												@for($i=0;$i<count($mostViewAlbums[7]->album_singer);$i++)
													@if($i==0)												
													<a style="display:inline;font-size:1em!important" href="">{{$mostViewAlbums[7]->album_singer[$i]->singer->name}}</a>
													@else
													, <a style="display:inline;font-size:1em!important" href="">{{$mostViewAlbums[7]->album_singer[$i]->singer->name}}</a>
													@endif
												@endfor
												<br>
												<div>
													<i class="fas fa-headphones"></i> {{$mostViewAlbums[7]->views}} 
												</div>
											</div>
										</div>
									</li>
									<li>
										<div style="display: flex;padding:6px 20px 11px 20px;">
											<div style="margin-right: 10px">
												<a href="album/{{$mostViewAlbums[8]->title}}"><span><img src="{{$mostViewAlbums[8]->image}}" width="60px" height="60px"></span></a>
											</div>
											<div >
												<a style="font-size:1.5em!important" href="album/{{$mostViewAlbums[8]->title}}" class="jp-playlist-item" tabindex="0">{{$mostViewAlbums[8]->name}}</a>
												@for($i=0;$i<count($mostViewAlbums[8]->album_singer);$i++)
													@if($i==0) 
													<a style="display:inline;font-size:1em!important" href="">{{$mostViewAlbums[8]->album_singer[$i]->singer->name}}</a>
													@else
													, <a style="display:inline;font-size:1em!important" href="">{{$mostViewAlbums[8]->album_singer[$i]->singer->name}}</a>
													@endif
												@endfor
												<br>
												<div>
													<i class="fas fa-headphones"></i> {{$mostViewAlbums[8]->views}} 
												</div>
											</div>
										</div>
									</li>
									<li>
										<div style="display: flex;padding:6px 20px 11px 20px;">
											<div style="margin-right: 10px">
												<a href="album/{{$mostViewAlbums[9]->title}}"><span><img src="{{$mostViewAlbums[9]->image}}" width="60px" height="60px"></span></a>
											</div>
											<div >
												<a style="font-size:1.5em!important" href="album/{{$mostViewAlbums[9]->title}}" class="jp-playlist-item" tabindex="0">{{$mostViewAlbums[9]->name}}</a>
												@for($i=0;$i<count($mostViewAlbums[9]->album_singer);$i++)
													@if($i==0) 
													<a style="display:inline;font-size:1em!important" href="">{{$mostViewAlbums[9]->album_singer[$i]->singer->name}}</a>
													@else
													, <a style="display:inline;font-size:1em!important" href="">{{$mostViewAlbums[9]->album_singer[$i]->singer->name}}</a>
													@endif
												@endfor
												<br>
												<div>
													<i class="fas fa-headphones"></i> {{$mostViewAlbums[9]->views}} 
												</div>
											</div>
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
				<h3 class="tittle" style="color: #2e9afe;">ALBUM MỚI PHÁT HÀNH <span class="new"> New</span></h3>
				<div class="clearfix"></div>
			</div>
			<ul id="flexiselDemo1">
				<li>
					<a href="album/{{$newAlbums[0]->title}}"><img src="{{$newAlbums[0]->image}}" alt=""/></a>
					<div class="slide-title"><h4>{{$newAlbums[0]->title}} </div>
						<div class="date-city">
							<h5>{{$newAlbums[0]->created_at->format('d-m-Y')}}</h5>
							<div class="buy-tickets">
								<a href="album/{{$newAlbums[0]->title}}">Xem thêm</a>
							</div>
						</div>
					</li>
					<li>
					<a href="album/{{$newAlbums[1]->title}}"><img src="{{$newAlbums[1]->image}}" alt=""/></a>
					<div class="slide-title"><h4>{{$newAlbums[1]->title}} </div>
						<div class="date-city">
							<h5>{{$newAlbums[1]->created_at->format('d-m-Y')}}</h5>
							<div class="buy-tickets">
								<a href="album/{{$newAlbums[1]->title}}">Xem thêm</a>
							</div>
						</div>
					</li>
					<li>
					<a href="album/{{$newAlbums[3]->title}}"><img src="{{$newAlbums[2]->image}}" alt=""/></a>
					<div class="slide-title"><h4>{{$newAlbums[2]->title}} </div>
						<div class="date-city">
							<h5>{{$newAlbums[2]->created_at->format('d-m-Y')}}</h5>
							<div class="buy-tickets">
								<a href="album/{{$newAlbums[2]->title}}">Xem thêm</a>
							</div>
						</div>
					</li>
					<li>
					<a href="album/{{$newAlbums[3]->title}}"><img src="{{$newAlbums[3]->image}}" alt=""/></a>
					<div class="slide-title"><h4>{{$newAlbums[3]->title}} </div>
						<div class="date-city">
							<h5>{{$newAlbums[3]->created_at->format('d-m-Y')}}</h5>
							<div class="buy-tickets">
								<a href="album/{{$newAlbums[3]->title}}">Xem thêm</a>
							</div>
						</div>
					</li>
					<li>
					<a href="album/{{$newAlbums[4]->title}}"><img src="{{$newAlbums[4]->image}}" alt=""/></a>
					<div class="slide-title"><h4>{{$newAlbums[4]->title}} </div>
						<div class="date-city">
							<h5>{{$newAlbums[4]->created_at->format('d-m-Y')}}</h5>
							<div class="buy-tickets">
								<a href="album/{{$newAlbums[4]->title}}">Xem thêm</a>
							</div>
						</div>
					</li>
					<li>
					<a href="album/{{$newAlbums[5]->title}}"><img src="{{$newAlbums[5]->image}}" alt=""/></a>
					<div class="slide-title"><h4>{{$newAlbums[5]->title}} </div>
						<div class="date-city">
							<h5>{{$newAlbums[5]->created_at->format('d-m-Y')}}</h5>
							<div class="buy-tickets">
								<a href="album/{{$newAlbums[5]->title}}">Xem thêm</a>
							</div>
						</div>
					</li>
					<li>
					<a href="album/{{$newAlbums[6]->title}}"><img src="{{$newAlbums[6]->image}}" alt=""/></a>
					<div class="slide-title"><h4>{{$newAlbums[6]->title}} </div>
						<div class="date-city">
							<h5>{{$newAlbums[6]->created_at->format('d-m-Y')}}</h5>
							<div class="buy-tickets">
								<a href="album/{{$newAlbums[6]->title}}">Xem thêm</a>
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
		
	</div>
	
	<!--footer section end-->
	<!-- /w3l-agile -->
	<!-- main content end-->


	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"></script>
</body>
</html>
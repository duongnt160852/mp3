
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
	<meta name="csrf-token" content="{{ csrf_token() }}">
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
				<li><a href="playlist"><i class="lnr lnr-heart"></i><span>Nhạc Cá Nhân</span></a></li> 		
				@endif
				<li><a href="bai-hat"><i class="camera"></i> <span>Bài Hát</span></a></li>
				<li><a href="nghe-si"><i class="lnr lnr-users"></i> <span>Nghệ Sĩ</span></a></li> 
				<li><a href="album"><i class="lnr lnr-music-note"></i> <span>Albums</span></a></li>			
				 @if($user!=null)
				<li><a href="/info"><i class="lnr lnr-user"></i><span>Tài Khoản</span></a></li>
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
				<div class="clearfix"></div>
			</div>
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

						<div class="browse">
							<div class="row">
								<div class="col-md-2"><a><h2>NGHỆ SĨ ></a></h2></div>
								<div class="col-md-10">
									<div class="row">
										<div class="col-md-4"></div>
										<div class="col-md-8">
											<nav>
												<ul class="pagination pagination-sm">
													<li  class="active"><a href="#">HOT</a></li>	
													<li><a href="#">A</a></li>
													<li><a href="#">B</a></li>
													<li><a href="#">C</a></li>
													<li><a href="#">D</a></li>
													<li><a href="#">E</a></li>
													<li><a href="#">F</a></li>
													<li><a href="#">G</a></li>
													<li><a href="#">H</a></li>
													<li><a href="#">I</a></li>
													<li><a href="#">J</a></li>	
													<li><a href="#">K</a></li>
													<li><a href="#">L</a></li>
													<li><a href="#">M</a></li>
													<li><a href="#">N</a></li>
													<li><a href="#">O</a></li>	
													<li><a href="#">P</a></li>
													<li><a href="#">Q</a></li>
													<li><a href="#">R</a></li>
													<li><a href="#">S</a></li>
													<li><a href="#">T</a></li>	
													<li><a href="#">U</a></li>
													<li><a href="#">V</a></li>
													<li><a href="#">W</a></li>
													<li><a href="#">X</a></li>
													<li><a href="#">Y</a></li>
													<li><a href="#">Z</a></li>												
												</ul>
											</nav>
										</div>
									</div>
								</div>
							</div>	
							<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
								<ul id="myTab" class="nav nav-tabs" role="tablist">
									<li role="presentation" class="dropdown active">
										<a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDrop1-contents" aria-expanded="false">Việt Nam <span class="caret"></span></a>
										<ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
											<li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">Nhạc Trẻ</a></li>
											<li><a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">Trữ Tình</a></li>
											<li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">Remix Việt</a></li>
											<li><a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">Tiền Chiến</a></li>
											<li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">Nhạc Trịnh</a></li>
											<li><a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">Rock Việt</a></li>
											<li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">Rap Việt</a></li>
											<li><a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">Cách Mạng</a></li>
										</ul>
									</li>
									<li role="presentation" class="dropdown">
										<a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDrop1-contents" aria-expanded="false">Âu Mỹ<span class="caret"></span></a>
										<ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
											<li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">Pop</a></li>
											<li><a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">Rock</a></li>
											<li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">Electronica/Dance</a></li>
											<li><a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">R&B/Hip Hop/Rap</a></li>
											<li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">Blues/Jazz</a></li>
											<li><a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">Country</a></li>
											<li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">Latin</a></li>
											<li><a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">Indie</a></li>
											<li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">Âu Mỹ Khác</a></li>
										</ul>
									</li>
									<li role="presentation" class="dropdown">
										<a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDrop1-contents" aria-expanded="false">Châu Á <span class="caret"></span></a>
										<ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
											<li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">Nhạc Hàn</a></li>
											<li><a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">Nhạc Hoa</a></li>
											<li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">Nhạc Nhật</a></li>
											<li><a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">Nhạc Thái</a></li>
										</ul>
									</li>
									<li role="presentation" class="dropdown">
										<a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDrop1-contents" aria-expanded="false">Khác <span class="caret"></span></a>
										<ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
											<li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">Thiếu Nhi</a></li>
											<li><a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">Không Lời</a></li>
											<li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">Tui Hát</a></li>
											<li><a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">Beat</a></li>
											<li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">Thể Loại Khác</a></li>
										</ul>
									</li>
								</ul>
								<div id="myTabContent" class="tab-content">
									<div class="tittle-head two">
										<h3 class="tittle">HOT!!!<span class="new">New</span></h3>
										<div class="clearfix"> </div>
									</div>
									<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
										<div class="browse-inner">
											<!-- /agileits -->

											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a3.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Sukhwinder singh</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a6.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Shekhar Ravjiani</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a7.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Shalmali</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a4.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Sajid-Wajid</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a5.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Atif Aslam</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a1.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">A R Rahman</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a2.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Shreya Ghoshal</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a8.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Lata Mangeshkar</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a9.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Arijit Sing</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a10.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Sunidhi Chauhan</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a11.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Yo Yo Honey Singh</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a12.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Neeti Mohan</a>
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
										<div class="browse-inner">
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a9.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Arijit Sing</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a10.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Sunidhi Chauhan</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a11.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Yo Yo Honey Singh</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a12.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Neeti Mohan</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a1.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">A R Rahman</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a2.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Shreya Ghoshal</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a3.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Sukhwinder singh</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a6.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Shekhar Ravjiani</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a7.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Shalmali</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a4.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Sajid-Wajid</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a5.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Atif Aslam</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a8.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Lata Mangeshkar</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a9.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Arijit Sing</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a10.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Sunidhi Chauhan</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a11.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Yo Yo Honey Singh</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a12.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Neeti Mohan</a>
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane fade" id="dropdown1" aria-labelledby="dropdown1-tab">
										<div class="browse-inner">

											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a1.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">A R Rahman</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a2.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Shreya Ghoshal</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a3.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Sukhwinder singh</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a6.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Shekhar Ravjiani</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a7.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Shalmali</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a4.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Sajid-Wajid</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a5.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Atif Aslam</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a8.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Lata Mangeshkar</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a9.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Arijit Sing</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a10.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Sunidhi Chauhan</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a11.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Yo Yo Honey Singh</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a12.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Neeti Mohan</a>
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane fade" id="dropdown2" aria-labelledby="dropdown2-tab">
										<div class="browse-inner">

											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a1.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">A R Rahman</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a2.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Shreya Ghoshal</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a3.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Sukhwinder singh</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a6.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Shekhar Ravjiani</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a7.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Shalmali</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a4.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Sajid-Wajid</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a5.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Atif Aslam</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a8.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Lata Mangeshkar</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a9.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Arijit Sing</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a10.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Sunidhi Chauhan</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a11.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Yo Yo Honey Singh</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a12.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Neeti Mohan</a>
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
										<div class="browse-inner">


											


											<div class="clearfix"> </div>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
										<div class="browse-inner">


											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a3.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Sukhwinder singh</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a6.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Shekhar Ravjiani</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a7.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Shalmali</a>
											</div>
											<div class="col-md-3 artist-grid">
												<a  href="single.html"><img src="images/a4.jpg" title="allbum-name"></a>
												<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
												<a class="art" href="single.html">Sajid-Wajid</a>
											</div>

											<div class="clearfix"> </div>
										</div>
									</div>
								</div>
							</div>
							<!-- /agileinfo -->
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="row">
									<div class="col-md-8 col-md-offset-2">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>Việt Nam</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>

												</tr>
												<tr>
													<td>2</td>

												</tr>
												<tr>
													<td>3</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>						
							</div>
							<div class="col-md-3">
								<div class="row">
									<div class="col-md-8 col-md-offset-2">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>Âu Mỹ</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>

												</tr>
												<tr>
													<td>2</td>

												</tr>
												<tr>
													<td>3</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>						
							</div>
							<div class="col-md-3">
								<div class="row">
									<div class="col-md-8 col-md-offset-2">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>Châu Á</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
												</tr>
												<tr>
													<td>2</td>
												</tr>
												<tr>
													<td>3</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>						
							</div>
							<div class="col-md-3">
								<div class="row">
									<div class="col-md-8 col-md-offset-2">
										<table class="table table-hover">
											<thead>
												<tr>
													<th>Khác</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>

												</tr>
												<tr>
													<td>2</td>

												</tr>
												<tr>
													<td>3</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>						
							</div>
						</div>
						<!--//End-albums-->

						<!--//discover-view-->
						<div class="albums fourth">
							<div class="tittle-head two">
								<h3 class="tittle">Nghệ Sĩ Nổi Bật<span class="new">View</span></h3>
								<a href="browse.html"><h4 class="tittle third">See all</h4></a>
								<div class="clearfix"> </div>
							</div>
							<div class="col-md-3 artist-grid">
								<div>
									<a href="single.html"><img src="images/v11.jpg" title="allbum-name"></a>
								</div>
								<div>
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Châu Á</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>

											</tr>
											<tr>
												<td>2</td>

											</tr>
											<tr>
												<td>3</td>
											</tr>
										</tbody>
									</table>
								</div>									
							</div>
							<div class="col-md-3 artist-grid">
								<div>
									<a href="single.html"><img src="images/v11.jpg" title="allbum-name"></a>
								</div>
								<div>
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Châu Á</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>

											</tr>
											<tr>
												<td>2</td>

											</tr>
											<tr>
												<td>3</td>
											</tr>
										</tbody>
									</table>
								</div>									
							</div>
							<div class="col-md-3 artist-grid">
								<div>
									<a href="single.html"><img src="images/v11.jpg" title="allbum-name"></a>
								</div>
								<div>
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Châu Á</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>

											</tr>
											<tr>
												<td>2</td>

											</tr>
											<tr>
												<td>3</td>
											</tr>
										</tbody>
									</table>
								</div>									
							</div>
							<div class="col-md-3 artist-grid">
								<div>
									<a href="single.html"><img src="images/v11.jpg" title="allbum-name"></a>
								</div>
								<div>
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Châu Á</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>

											</tr>
											<tr>
												<td>2</td>

											</tr>
											<tr>
												<td>3</td>
											</tr>
										</tbody>
									</table>
								</div>									
							</div>
							<div class="col-md-3 artist-grid">
								<div>
									<a href="single.html"><img src="images/v11.jpg" title="allbum-name"></a>
								</div>
								<div>
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Châu Á</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>

											</tr>
											<tr>
												<td>2</td>

											</tr>
											<tr>
												<td>3</td>
											</tr>
										</tbody>
									</table>
								</div>									
							</div>
							<div class="col-md-3 artist-grid">
								<div>
									<a href="single.html"><img src="images/v11.jpg" title="allbum-name"></a>
								</div>
								<div>
									<table class="table table-hover">
										<thead>
											<tr>
												<th>Châu Á</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>

											</tr>
											<tr>
												<td>2</td>

											</tr>
											<tr>
												<td>3</td>
											</tr>
										</tbody>
									</table>
								</div>									
							</div>

							<div class="clearfix"> </div>
						</div>
					</div>
					<!--//discover-view-->
					<!--//music-left-->
				</div>
				<!--body wrapper start-->

				
				<!--body wrapper end-->
				<!-- /w3layouts-agile -->
			</div>
			<!--body wrapper end-->
			<div class="footer two">
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
		<!-- /w3layouts-agile -->
		<!-- main content end-->
	</section>
	<!-- /wthree-agile -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"></script>
</body>
</html>
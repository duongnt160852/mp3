<!DOCTYPE HTML>
<html>
<head>
	<title>Nhạc của chúng tui</title>
	<base href="{{asset('')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Mosaic Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link rel='stylesheet' href='fontawesome/css/all.css'>
  	<link rel="stylesheet" type="text/css" href="css/audio1.css">
	<link rel="stylesheet" href="css/normalize.css">

  
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
	<style>
		.modala-body div:hover{
			color: #000;
			background-color: #f1f1f1;
			cursor: default;
		}
		.playlist1 a{
			text-decoration: none;
			color:#000;
		}

		.playlist1 a:hover{
			color:#2e9afe;;
		}

		#x :hover{
			cursor:pointer;
		}

		.changepass:hover{
			cursor:pointer;
		}
	</style>

</head> 
<!-- /w3layouts-agile -->
<body class="sticky-header left-side-collapsed">
	<section>
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
				<li class="active"><a href="playlist"><i class="lnr lnr-heart"></i><span>Trang Cá Nhân</span></a></li> 		
				@endif
				<li><a href="bai-hat"><i class="camera"></i> <span>Bài Hát</span></a></li>
				<li><a href="nghe-si"><i class="lnr lnr-users"></i> <span>Nghệ Sĩ</span></a></li> 
				<li><a href="album"><i class="lnr lnr-music-note"></i> <span>Albums</span></a></li>			
				 @if($user!=null)
				 <li><a href="upload"><i class="lnr lnr-cloud-upload"></i> <span>Upload</span></a></li>
				<li><a href="user/logout"><i class="fas fa-sign-out-alt"></i><span>Đăng Xuất</span></a></li>
				@endif
			</ul>
			<!--sidebar nav end-->
		</div>
	</div>
	@include("user.signup")
	<div id="myModal" class="modala">

						  <!-- Modal content -->
						  <div class="modala-content">
						    <div class="modala-header">
						      <span id="close">&times;</span>
						      <div>Đổi mật khẩu</div>
						    </div>
						    <div class="modala-body">
						    	<table>
						    		<tbody>
						    			<tr>
						    				<td><div>
									      	Mật khẩu hiện tại
									      </div></td>
									      <td><input type="password" id="currentPass" class="form-control" style="width: 100%;display: inline;"></td>
						    			</tr>
						    			<tr><td></td><td><div id="errcurrent" style="color:red;text-align: center;display:none">
							  </div></td></tr>
							  <tr><td><div>
						      	Mật khẩu mới 
						      </div></td>
						      <td><input type="password" id="newPass" class="form-control" style="width: 100%;display: inline;"></td></tr>
						      <tr><td></td> <td><div id="errpass" style="color:red;text-align: center;display:none">
							  </div></td></tr>
							  <tr><td><div>
						      	Nhập lại mật khẩu mới 
						      </div></td>
						      <td><input type="password" id="newPass1" class="form-control" style="width: 100%;display: inline;"></td></tr>
						      <tr><td></td><td><div id="errpass1" style="color:red;text-align: center;display:none">
							  </div></td></tr>
						    		</tbody>
						    	</table>		      
						    </div>
						    <div class="modala-footer">
						    	<button type="button" class="btn btn-info" id="save">Lưu</button>
						    </div>
						  </div>

						</div>

						<script>
						var modal = document.getElementById('myModal');
						$("#close").click(function(){
							modal.style.display = "none";
							$("#currentPass").val("");
							$("#newPass").val("");
							$("#newPass1").val("");
							$('#errcurrent').css("display","none");
							$('#errpass').css("display","none");
							$('#errpass1').css("display","none");
						})
						window.onclick = function(event) {
						  if (event.target == modal) {
						    modal.style.display = "none";
						  }
						}
						</script>
		<!-- left side end-->
		<!-- main content start-->
		<div class="main-content">
			<!-- header-starts -->
			@include("user.header")
			<!--notification menu end -->
			<!-- //header-ends -->
			<!-- /w3l-agileits -->
			<!-- //header-ends -->
			<div id="page-wrapper">
				<div class="inner-content">
					<div class="music-left">
						
						<div>
							<h3 style="color:#2e9afe;">PLAYLIST</h3>
							
							  <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
								<div class="browse-inner">
							 	 <!-- /agileits -->
								@foreach($user->playlist as $playlist)
									<div class="col-md-3 artist-grid">
									<a  href="playlist/{{$playlist->id}}"><img src="images/icons/a.jpg"></a>
									<a class="art" href="playlist/{{$playlist->id}}" >{{$playlist->name}}</a>
									</div>
								@endforeach
								
									<div class="clearfix"> </div>
									</div>
										</div>
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
										<h3 style="color: #2e9afe;">THÔNG TIN</h3>
										<div style="display:flex">
							<div id="avatar" >
								<img src="images/icons/avatar_default.jpg" style="width: 100px;height: 100px;border-radius: 50%">
								<a style="color:#2e9afe;font-size: 0.9em;display:block" class="changepass">
									Đổi mật khẩu
								</a>
							</div>
							<div style="margin-left:15px">
								<div style="display: flex">
									<div style="font-size: 150%">
									{{$user->username}}	
									 		
								</div>	
								<button id="x" style="margin-left: 10px" class="form-control"><i class="fas fa-edit"></i> Chỉnh sửa</button>	
								</div>
								<div>
									Tên thật: <input type="text" style="border: none;display:inline-block;width: 60%" id="namea" readonly value="{{$user->name}}" autocomplete="off">		 		
								</div>		
								<div>
									Email: {{$user->email}}		 		
								</div>		
								<div style="display: flex">
									<button id="y" style="width:30%;display:none" class="form-control" >Cập nhật</button> 
									<button id="z" style="width:30%;display:none;margin-left: 5px" class="form-control">Hủy</button>
								</div>
							</div>				 
						</div>
						<script>
							var namea;
							$("#save").click(function(){
								$.ajaxSetup({
							        headers: {
							            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							        }
								});
								$.ajax({
										'url' : 'changePass',
										'data': {
											"currentpass":$("#currentPass").val(),"password":$("#newPass").val(),"password_confirmation":$("#newPass1").val()
										},
										'type' : 'POST',
										success: function (data) {

											if (data.error == true) {
												if(data.message=="loi"){
													$('#errcurrent').css("display","block");
													$('#errcurrent').text("Mật khẩu hiện tại không đúng");
												}
												else if (data.message.currentpass != undefined) {
													$('#errcurrent').css("display","block");
													$('#errcurrent').text(data.message.currentpass[0]);
												}
												else{
													$('#errcurrent').css("display","none");
												}
												if (data.message.password != undefined) {
													$('#errpass').css("display","block");
													$('#errpass').text(data.message.password[0]);
												}
												else{
													$('#errpass').css("display","none");
												}
												if (data.message.password_confirmation != undefined) {
													$('#errpass1').css("display","block");
													$('#errpass1').text(data.message.password_confirmation[0]);
												}
												else{
													$('#errpass1').css("display","none");
												}
											} else {
												alert("Đổi mật khẩu thành công");
												modal.style.display = "none";
												$(".modal-backdrop").css("display","none");
												$("#currentPass").val("");
												$("#newPass").val("");
												$("#newPass1").val("");
												$('#errcurrent').val("");
												$('#errpass').val("");
												$('#errpass1').val("");
											}
										}
									});
								});

							$(".changepass").click(function(){
								modal.style.display = "block";
							});
							$("#x").click(function(){
								namea=$("#namea").val();
								$("#namea").removeAttr("readonly");
								$("#namea").css("border","1px solid #ccc");
								$("#namea").addClass("form-control");
								$("#y").css("display","block");
								$("#z").css("display","block");
							});

							$("#z").click(function(){
								$("#namea").prop("readonly",true);
								$("#namea").css("border","none");
								$("#namea").removeClass("form-control");
								$("#y").css("display","none");
								$("#z").css("display","none");
								$("#namea").val(namea);
							});

							$("#y").click(function(){
								if($("#namea").val()=="") alert("Tên thật không được để trống");
								else{
									$.get('ajax/update/'+$("#namea").val(),function(data){
										namea=data;
										alert("Cập nhật thành công");
										$("#namea").val(data);
										$("#namea").prop("readonly",true);
										$("#namea").css("border","none");
										$("#namea").removeClass("form-control");
										$("#y").css("display","none");
										$("#z").css("display","none");
									});
								}
							});
						</script>
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

				
				<div class="clearfix"></div>
				<!--body wrapper end-->
				<!-- /w3l-agile -->
			</div>
			<!--body wrapper end-->
			
		</div>
	</section>

	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"></script>
</body>
</html>
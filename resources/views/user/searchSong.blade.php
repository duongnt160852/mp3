<!DOCTYPE HTML>
<html>
<head>
	<title>Nhạc của chúng tui</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="{{asset('')}}">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
				<li ><a href="{{Route("gethome")}}"><i class="lnr lnr-home"></i><span>Trang Chủ</span></a></li>
				@if($user!=null)
				<li><a href="playlist"><i class="lnr lnr-heart"></i><span>Trang Cá Nhân</span></a></li> 		
				@endif
				<li class="active"><a href="bai-hat"><i class="camera"></i> <span>Bài Hát</span></a></li>
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
					</script>
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
		<div id="page-wrapper" style="padding-left:48px!important">
			<div class="inner-content">
				<div class="music-left">
					<div style="margin-top:20px;margin-bottom:20px">
						<span style="font-size: 1.5em">TÌM KIẾM</span>
					</div>
					<div style="height: 40px;display:flex;background-color: #f5f5f5" class="aaa">
						<div style="width: 100px;padding:10px;text-align: center;">
							<a href="search/{{$str}}" >Tất cả</a>
						</div>
						<div style="width: 1px;background-color: #cccccc">
							
						</div>
						<div style="width: 100px;padding:10px;text-align: center;">
							<a href="search/bai-hat/{{$str}}" style="color:#2e9afe!important;">Bài hát</a>
						</div>
						<div style="width: 1px;background-color: #cccccc">
							
						</div>
						<div style="width: 100px;padding:10px;text-align: center;">
							<a href="search/album/{{$str}}">Album</a>
						</div>
						<div style="width: 1px;background-color: #cccccc">
							
						</div>
						<div style="width: 100px;padding:10px;text-align: center;">
							<a href="search/ca-si/{{$str}}">Ca sĩ</a>
						</div>
						<div style="width: 1px;background-color: #cccccc">
							
						</div>
					</div>
					<div class="result3">
						@if(count($music)>0)
                           <div>
                           	    <div style="margin-top:20px;margin-bottom:20px">
                           	    	<span style="font-size: 1.5em">BÀI HÁT</span> (có {{count($music)}} kết quả)
                           	    </div>
                           	    <table class="table table-striped" id="table">
                           	    	<thead style="display:none">
                                        <th>ID</th>
                                    </thead>
                                    <tbody id="body">
                                        @foreach($music as $song)
                                            <tr>
                                                <td><div style="display:flex;margin-top:10px;padding-bottom: 10px;">
                                   	    <div>
                                   	    	<a href="bai-hat/{{$song->title}}"><img src="{{$song->image}}" style="width: 75px"></a>
                                   	    </div>
                                   	    <div style="padding-left: 15px;width: 300px">
                                   	    	<div style="margin-top: 15px">
                                   	    		<a href="bai-hat/{{$song->title}}" style="font-size: 1em!important">{{$song->name}}</a>
                                   	    	</div>
                                   	    	<div>
                                   	    		@for($i=0;$i<count($song->music_singer);$i++)
													@if($i==0) 
													<a href="">{{$song->music_singer[$i]->singer->name}}</a>
													@else
													, <a href="">{{$song->music_singer[$i]->singer->name}}</a>
													@endif
												@endfor
                                   	    	</div>
                                   	    </div>
                                   	    <div style="margin-top: 20px;padding-left: 50px;">
                                   	    	<i class="fas fa-user"></i>
                                   	    	<span>{{$song->uploader}}</span>
                                   	    </div>
                                   	    <div style="margin-top: 20px;margin-left:auto"> 
                                   	    	<span>{{$song->views}}</span>
                                   	    	<i class="fas fa-headphones"></i>  
                                   	    	
                                   	    	<a href="{{$song->link}}" target="_self" download><i class="fas fa-download download1" style="padding-left:50px"></i></a>
                               				<i class="fas fa-plus myBtn add1" id="song{{$song->id}}" style="padding-left:50px"></i>
                                   	    </div>
                                   </div></td>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                           </div>
						@endif
						
					</div>
			<div id="myModal" class="modala">

						  <!-- Modal content -->
						  <div class="modala-content">
						    <div class="modala-header">
						      <span id="close">&times;</span>
						      <div>Thêm bài hát này vào danh sách playlist</div>
						    </div>
						    <div class="modala-body">
						      @if($user!=null)
						      	@foreach($user->playlist as $playlist)
									<div style="margin: 2px;border-radius: 2px;" class="playlist1" id="{{$playlist->id}}">
										<a><span>{{$playlist->name}}</span></a>
									</div>
							      @endforeach
						      @endif
						    </div>
						    <div class="modala-footer">
						      <form autocomplete="off">
						      	
						      	<div class="form-group">
						      		<input class="form-control" style="color:black" type="text" placeholder="Nhập tên playlist cần tạo mới" id="inp">
						      		<br>
						      		<input type="button" id="subm" value="Tạo playlist" style="background-color: #2e9afe" class="btn btn-info btn-fill btn-wd" >
						      	</div>
						      </form>
						    </div>
						  </div>

						</div>

						<script>
						// Get the modal
						var modal = document.getElementById('myModal');
						var song;
						var user= <?php if($user!=null) echo "1"; else echo "0";  ?>;
						// When the user clicks the button, open the modal 

						$(".myBtn").click(function(){
							if(user==1){
								modal.style.display = "block";
								song=$(this).attr("id").substr(4);
							}
							else alert("Bạn cần đăng nhập để thực hiện chức năng này");
						});

						// When the user clicks on <span> (x), close the modal

						$("#close").click(function(){
							modal.style.display = "none";
						})

						// When the user clicks anywhere outside of the modal, close it
						window.onclick = function(event) {
						  if (event.target == modal) {
						    modal.style.display = "none";
						  }
						}
						</script>
						<script>

							$(".playlist1").click(function(){
                                 $.get("ajax/playlist/"+$(this).attr('id')+"/"+song,function(data){
                                 	if(data=="1") alert("Thêm bài hát vào playlist thành công");
                                 	else alert(data);
                                 	modal.style.display = "none";
                                 });
							});
							$("#subm").click(function(){
								if($("#inp").val()==""){
									alert("Vui lòng nhập tên playlist");
								}
								else{
									$.get("ajax/createPlaylist/"+$("#inp").val()+"/"+song,function(data){
	                                 	if(data==1){
	                                 		alert("Tên playlist đã tồn tại");
	                                 	}
	                                 	else{
	                                 		alert("Thêm bài hát vào playlist thành công");
	                                 		modal.style.display = "none";
											$("#inp").val("");
											$.get("ajax/getPlaylist/{{$id}}",function(data){
												// $(".modal-body").val(data);
												$(".modala-body").html("");
												data=JSON.parse(data);
												for (var i = 0; i < data.length; i++) {
													$(".modala-body").append('<div style="margin: 2px;border-radius: 2px;" class="playlist1" id="'+data[i].id+'"><a><span>'+data[i].name+'</span></a></div>');
												}
											});
	                                 	}
                                 });
								}
							});
						</script>		

			<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all">
			<!--//pop-up-box -->
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
									@foreach($mostViewMusics as $song)
										<li>
										<div style="display: flex;padding:6px 20px 11px 20px;">
											<div style="margin-right: 10px">
												<a href="bai-hat/{{$song->title}}"><span><img src="{{$song->image}}" width="60px" height="60px"></span></a>
											</div>
											<div >
												<a style="font-size:1.5em!important" href="bai-hat/{{$song->title}}" class="jp-playlist-item" tabindex="0">{{$song->name}}</a>
												@for($i=0;$i<count($song->music_singer);$i++)
													@if($i==0) 
													<a style="display:inline;font-size:1em!important" href="">{{$song->music_singer[$i]->singer->name}}</a>
													@else
													, <a style="display:inline;font-size:1em!important" href="">{{$song->music_singer[$i]->singer->name}}</a>
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
														<a href="bai-hat/{{$album->title}}"><span><img src="{{$album->image}}" width="60px" height="60px"></span></a>
													</div>
													<div >
														<a style="font-size:1.5em!important" href="bai-hat/{{$album->title}}" class="jp-playlist-item" tabindex="0">{{$album->name}}</a>
														@for($i=0;$i<count($album->album_singer);$i++)
															@if($i==0) 
															<a style="display:inline;font-size:1em!important" href="">{{$album->album_singer[$i]->singer->name}}</a>
															@else
															, <a style="display:inline;font-size:1em!important" href="">{{$album->album_singer[$i]->singer->name}}</a>
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
					<script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
					<script type="text/javascript" src="js/jplayer.playlist.min.js"></script>
				</div>

				<!--//music-right-->
				<div class="clearfix"></div>
			</div>
		</div>
		
	</div>
	
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js" ></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
    <script>
        $(document).ready( function () {
            $(document).ready(function() {
                $('#table').DataTable( {
                    dom: 'Bfrtip',
                    "searching": false,
                    "pageLength": 10,
                    "ordering": false,
                    "info":false
                } );
            } );
        } );
    </script>
</body>
</html>
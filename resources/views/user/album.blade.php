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

</head> 
<!-- /w3layouts-agile -->
<body class="sticky-header left-side-collapsed">
	<section>
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
		@include("user.signup")
		<!-- left side end-->
		<!-- main content start-->
		<div class="main-content">
			<!-- header-starts -->
			@include("user.header")
			<div id="page-wrapper">
				<div class="inner-content">
					<div class="music-left">
						<h3><b>{{$album->name}}</b><span style="float:right">{{$album->views }} <i  class="fas fa-headphones"></i></span></h3>
						<div id="player1">
							<div class="album1">
								<div class="row" style="margin: 0px">
									<div class="col-md-4" id="image">
										<img id="img1" style="height: 225px;width: 225px;" src="{{$album->albumMusic[0]->image}}" alt="">
									</div>
									<div class="col-md-7">
										<div class="currently-playing">
										<h2 class="song-name">{{$album->albumMusic[0]->name}}</h2>
										<h3 class="artist-name">Ca sĩ: @for($j=0;$j<count($album->albumMusic[0]->music_singer);$j++)
											@if($j+1==count($album->albumMusic[0]->music_singer)) 
											<span>{{$album->albumMusic[0]->music_singer[$j]->singer->name}}</span>
											@else
											<span>{{$album->albumMusic[0]->music_singer[$j]->singer->name}},</span>
											@endif
										@endfor - Sáng tác: {{$album->albumMusic[0]->musician}}</h3>
									</div>
									</div>
								</div>
							</div>
							<div class="info1">
								
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
								<div class="shuffle"><i class="fas fa-random"></i></div>
								<div class="repeat" style="margin-right: 30px!important;font-size: 1em!important"><i class="fas fa-redo-alt"></i></div>
								<div class="previous"><i class="fas fa-fast-backward"></i></div>
								<div style="border: none" class="play togglePlay" onClick="togglePlay()"><i class="fas fa-pause"></i></div>
								<!-- <div style="border: none" class="pause togglePlay" onClick="togglePlay()"><i class="fas fa-pause"></i></div> -->
								<div class="next" style="margin-right:25px"><i class="fas fa-fast-forward"></i></div>
								<div style="margin-right:10px" id="volume1"><i class="fas fa-volume-up"></i></div>
								<div class="volume1"></div>
								<div class="down1" style="visibility: hidden;"><a href="{{$album->albumMusic[0]->link}}" target="_self" download><i class="fas fa-download"></i></a></div>
								<div class="add" style="visibility: hidden;" title="Thêm vào playlist"><i class="fas fa-plus"></i></div>
								</div>
							</div>
							
							</div>
							<link rel='stylesheet' href='fontawesome/css/fontawesome.min.css'>
							<script src='jqueryui/jquery-ui.min.js'></script>
						
							<script>
								var duration;
								var link="{{$album->albumMusic[0]->link}}";
								var count={{count($album->albumMusic)}};
								var arr=[];
								current=0;
								shuffle=false;
							</script>
							<div id="total" style="display:none">
								
							</div>
							<script  src="js/audio1.js"></script>
							<?php 
								foreach($album->albumMusic as $song){
									echo "<script>arr.push(".$song->id.")</script>";
								}
							?>
							<script>
								const undoRedoHandler = new UndoRedoHandler({
									  id : {{$album->albumMusic[0]->id}},
									  index: 0
									});
							</script>
							
						<div class="list1">
							@for($i=0;$i<count($album->albumMusic);$i++)
                               <div class="song1" id="song1{{$album->albumMusic[$i]->id}}">
                               	{{$i+1}}. <a style="display:inline;font-size:1em!important" id="{{$album->albumMusic[$i]->id}}">{{$album->albumMusic[$i]->name}}</a>
                               	<span>- @for($j=0;$j<count($album->albumMusic[$i]->music_singer);$j++)
											@if($j+1==count($album->albumMusic[$i]->music_singer)) 
											<a href="nghe-si/{{$album->albumMusic[$i]->music_singer[$j]->singer->title}}" style="display:inline;font-size:0.8em!important">{{$album->albumMusic[$i]->music_singer[$j]->singer->name}}</a>
											@else
											<a href="nghe-si/{{$album->albumMusic[$i]->music_singer[$j]->singer->title}}" style="display:inline;font-size:0.8em!important">{{$album->albumMusic[$i]->music_singer[$j]->singer->name}}</a>,
											@endif
										@endfor</span>
                               	<div class="control1">
                               		<span style="position: relative;right:100px;">{{$album->albumMusic[$i]->views}}</span>
                               		<i style="position: relative;right:90px;" class="fas fa-headphones"></i>                            		
                               		<i class="fas fa-play play1"></i>
                               		<a href="{{$album->albumMusic[0]->link}}" target="_self" download><i class="fas fa-download download1"></i></a>
                               		<i class="fas fa-plus myBtn add1" id="song{{$album->albumMusic[$i]->id}}"></i>
                               	</div>
                               </div>
							@endfor
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

						$("#close").click(function(){
							modal.style.display = "none";
						})

						window.onclick = function(event) {
						  if (event.target == modal) {
						    modal.style.display = "none";
						  }
						}
						</script>
						<script>

							$(".playlist1").click(function(){
                                 $.get("ajax/playlist/"+$(this).attr('id')+"/"+song,function(data){
                                 	if(data=="1") alert("Thêm thành công");
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
						<script>
							$(".song1:first").addClass("active1");
							$(".song1:first i:first").siblings(".play1").removeClass("fa-play");
							$(".song1:first i:first").siblings(".play1").addClass("fa-pause");	
						</script>
						<script>

							$(".song1 a").click(function(){
								undoRedoHandler.insert({
									id: $(this).attr('id'),
									index:(arr.indexOf(parseInt($(this).attr('id')))+arr.length)%arr.length
								});
								var a=$(this);
								$.get("ajax/album/"+$(this).attr('id'),function(data){
									data=JSON.parse(data);
									$(".song-name").html(data.name);
									$(".artist-name").html("Ca sĩ: ");
									for(i=0;i<data.singer.length;i++){
										if(i==0) $(".artist-name").append(data.singer[i]);
										else $(".artist-name").append(", "+data.singer[i]);
									}
									$(".artist-name").append("- Sáng tác: "+data.musician);
									$(".fill").slider({value:0});
									audio.src=data.link;
									audio.currentTime=0;
									percent=0;
      								clearTimeout(timer);
									$("#img1").attr("src",data.image);
									$(".lyric h3").html("Lời bài hát: "+data.name);
									$(".content").html(data.lyric);
									$(".active1 i:first").siblings(".play1").removeClass("fa-pause");
									$(".active1 i:first").siblings(".play1").addClass("fa-play");
									$(".active1").removeClass("active1");
									a.parent().addClass("active1");
									$(".active1 i:first").siblings(".play1").removeClass("fa-play");
									$(".active1 i:first").siblings(".play1").addClass("fa-pause");
									i++;
								});
								$.get("ajax/songview/"+$(this).attr('id')+"/"+$("#total").text(),function(data){
									console.log(data);
								});								
							});
						</script>
						<div class="lyric">
							<h3>Lời bài hát: {{$album->albumMusic[0]->name}}</h3>
							<div class="content">{!! $album->albumMusic[0]->lyric !!}</div>							 
						</div>
					</div>
					<!--//music-left-->
					<!--/music-right-->
					<div class="music-right">
						<!--/video-main-->
						<div class="video-main">
							<div class="video-record-list">
								<div id="jp_container_1" class="jp-video jp-video-270p" role="application" aria-label="media player">
									<div class="jp-type-playlist">
										<h3 style="color: #2e9afe;">ĐỀ XUẤT</h3>
										<div class="jp-playlist">
											<ul style="display: block;">
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
																	<a href="nghe-si/{{$song->music_singer[$i]->singer->title}}" style="display:inline;font-size:1em!important">{{$song->music_singer[$i]->singer->name}}</a>,
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
										</div>
									</div>
								</div>
							</div>
						</div>
						<link href="css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css">
					</div>
					<!--//music-right-->
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			
		</div>
	</section>

	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/bootstrap.js"></script>
</body>
</html>
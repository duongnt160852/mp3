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
							<a href="search/bai-hat/{{$str}}">Bài hát</a>
						</div>
						<div style="width: 1px;background-color: #cccccc">
							
						</div>
						<div style="width: 100px;padding:10px;text-align: center;">
							<a href="search/album/{{$str}}">Album</a>
						</div>
						<div style="width: 1px;background-color: #cccccc">
							
						</div>
						<div style="width: 100px;padding:10px;text-align: center;">
							<a href="search/ca-si/{{$str}}" style="color:#2e9afe!important;">Ca sĩ</a>
						</div>
						<div style="width: 1px;background-color: #cccccc">
							
						</div>
					</div>
					<div class="result3">
						@if(count($singer)>0)
							<div >
                           	    <div style="margin-top:20px;margin-bottom:20px">
                           	    	<span style="font-size: 1.5em">CA SĨ</span> (có {{count($singer)}} kết quả)
                           	    </div>
                           	    <table class="table table-striped" id="table">
                           	    	<thead style="display:none">
                                        <th>ID</th>
                                    </thead>
                                    <tbody id="body">
                                        @foreach($singer as $singer)
                                            <tr>
                                                <td><div style="display:flex;margin-top:10px;padding-bottom: 10px;">
                                   	    <div>
                                   	    	<img src="{{$singer->image}}" style="width: 75px">
                                   	    </div>
                                   	    <div style="padding-left: 15px;width: 300px">
                                   	    	<div style="margin-top: 15px">
                                   	    		<a href="nghe-si/{{$singer->title}}" style="font-size: 1em!important">{{$singer->name}}</a>
                                   	    	</div>
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
													<a style="display:inline;font-size:1em!important" href="nghe-si/{{$song->music_singer[$i]->singer->title}}">{{$song->music_singer[$i]->singer->name}}</a>
													@else
													, <a style="display:inline;font-size:1em!important" href="nghe-si/{{$song->music_singer[$i]->singer->title}}">{{$song->music_singer[$i]->singer->name}}</a>
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
															@if($i==0) 
															<a style="display:inline;font-size:1em!important" href="nghe-si/{{$album->album_singer[$i]->singer->title}}">{{$album->album_singer[$i]->singer->name}}</a>
															@else
															, <a style="display:inline;font-size:1em!important" href="nghe-si/{{$album->album_singer[$i]->singer->title}}">{{$album->album_singer[$i]->singer->name}}</a>
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
				<!-- /w3l-agile-its -->
			</div>
		</div>
		<!--body wrapper end-->
		
	</div>
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="datatable/datatables.css">
    <script type="text/javascript" charset="utf8" src="datatable/datatables.js"></script>
    <script>
        $(document).ready( function () {
            $(document).ready(function() {
                $('#table').DataTable( {
                    dom: 'Bfrtip',
                    "searching": false,
                    "pageLength": 15,
                    "ordering": false,
                    "info":false
                } );
            } );
        } );
    </script>
</body>
</html>
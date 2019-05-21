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
			<li class="active"><a href="{{Route("gethome")}}"><i class="lnr lnr-home"></i><span>Trang Chủ</span></a></li>
			@if($user!=null)
			<li><a href="playlist"><i class="lnr lnr-heart"></i><span>Trang Cá Nhân</span></a></li> 		
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
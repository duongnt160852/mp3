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
				<li class="active"><a href="nghe-si"><i class="lnr lnr-users"></i> <span>Nghệ Sĩ</span></a></li> 
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
								<h3 class="tittle" style="padding-left: 20px;font-family: Arial;color: #2e9afe;">NGHỆ SĨ</h3>
								<div class="clearfix"> </div>
							</div>
							  <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
								<div class="browse-inner">
							 	 <!-- /agileits -->
							 	 <?php $i=0; ?>
							 	 <table class="table" id="table">
                           	    	<thead style="display:none">
                                        <th>ID</th>
                                        <th>ID1</th>
                                        <th>ID2</th>
                                        <th>ID3</th>
                                        <th>ID4</th>
                                    </thead>
                                    <tbody id="body">
                                        @foreach($singers as $singer)
                                        	@if($i % 5==0)
												<tr >
													<td style="border: none">
	                                            	<div class="col-md-3">
														<a  href="nghe-si/{{$singer->title}}"><img src="{{$singer->image}}"></a>
														<a href="nghe-si/{{$singer->title}}" title="" style="display:block;width: 225px;text-align:center">{{$singer->name}}</a>
													</div>
												</td>
                                        	@else
												<td style="border: none">
	                                            	<div class="col-md-3">
														<a  href="nghe-si/{{$singer->title}}"><img src="{{$singer->image}}"></a>
														<a href="nghe-si/{{$singer->title}}" title="" style="display:block;width: 225px;text-align:center">{{$singer->name}}</a>
													</div>
												</td>
                                        	@endif
                                            @if($i%5==4)
												</tr>
                                            @endif
                                            <?php $i++ ?>
                                        @endforeach
                                        @if($i%5!=0)
											@for($j=1;$j<=5-($i%5);$j++)
												<td style="border: none;visibility: hidden;">
													<div class="col-md-3">
														<a  href="nghe-si/{{$singers[0]->title}}"><img src="{{$singers[0]->image}}"></a>
														<a href="nghe-si/{{$singers[0]->title}}" title="" style="display:block;width: 225px;text-align:center">{{$singers[0]->name}}</a>
													</div>
												</td>
											@endfor
											</tr>
                                        @endif
                                    </tbody>
                                </table>
								
									<div class="clearfix"> </div>
									</div>
										</div>
							</div>
						</div>
					 	 <!-- /agileinfo -->
					</div>
				<!--//End-albums-->
				
					<!--//discover-view-->
								</div>
							<!--//discover-view-->
						<!--//music-left-->
						</div>
					<!--body wrapper start-->	
					</div>
							</div>
						<div class="clearfix"></div>
				</div>
				 <div class="clearfix"> </div>
			</div>
		</div>
</section>
	<link rel="stylesheet" type="text/css" href="datatable/datatables.css">
    <script type="text/javascript" charset="utf8" src="datatable/datatables.js"></script>
    <script>
        $(document).ready( function () {
            $(document).ready(function() {
                $('#table').DataTable( {
                    dom: 'Bfrtip',
                    "searching": false,
                    "pageLength": 5,
                    "ordering": false,
                    "info":false
                } );
            } );
        } );
    </script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.js"></script>

</body>
</html>
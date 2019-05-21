<!DOCTYPE HTML>
<html>
<head>
	<title>Nhạc của chúng tui</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<base href="{{asset('')}}">
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
                <li><a href="album"><i class="lnr lnr-music-note"></i> <span>Albums</span></a></li>         
                 @if($user!=null)
                 <li class="active"><a href="upload"><i class="lnr lnr-cloud-upload"></i> <span>Upload</span></a></li>
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
						<form action="postUpload" method="post" enctype="multipart/form-data" autocomplete="off">
                                    @if(count($errors)>0)
                                        <div class="alert alert-danger" style="width: 30%">
                                           @foreach($errors->all() as $value)
                                                <p>{{$value}}</p>
                                           @endforeach
                                        </div>
                                    @endif
                                    @if(session('thongbao'))
                                        <div class="alert alert-success" style="width: 30%">
                                            Thêm thành công
                                        </div>
                                    @endif
                                    @if(session('errsong'))
                                        <div class="alert alert-danger" style="width: 30%">
                                            {{session('errsong')}}
                                        </div>
                                    @endif
                                    @if(session('errimage'))
                                        <div class="alert alert-danger" style="width: 30%">
                                            {{session('errimage')}}
                                        </div>
                                    @endif
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group" >
                                                <label>Tên bài hát</label>
                                                <input type="text" class="form-control border-input" name="name" autofocus=""  required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" >
                                                <label>Ca Sĩ</label>
                                                <div  class="form-control" style="border:1px solid #CCC5B9">
                                                    <input type="text" class="border-input" id="singer"  onkeyup="showResult1()" style="border: none;background-color: #fffcf5">                                                    
                                                </div>
                                                <div id="result1" style="padding-left: 12px;max-height: 300px;overflow-y: scroll">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                   
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Sáng tác</label>
                                                <input  type="text" class="form-control border-input" name="musician" id="musician" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Tải bài hát</label>
                                                <input type="file" name="song">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tải ảnh</label>
                                                <input type="file" name="image">
                                            </div>
                                        </div>
                                    </div>
                                     <div style="display: none" id="singera">
                                         
                                     </div>
                                     <div style="display: none" id="topica">
                                         
                                     </div>
                                    <div class="form-group" >
                                            <div class="row"> 
                                                <div class="col-xs-12 col-md-12">
                                                    <div>
                                                        <label>Lời bài hát</label>
                                                    </div>
                                                    <div>
                                                        <textarea id="demo" class="ckeditor" name="lyric" rows='10' cols='160'></textarea >
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-info btn-fill btn-wd">Thêm</button>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                </form>
					</div>
							</div>
					</div>
				</div>
				</div>
			</div>
					
			</div>
			</div>
		</div>
			</div>
		</div>
</section>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.js"></script>
<script type="text/javascript" language="javascript" src="ckeditor/ckeditor.js" ></script>
<script>  
        var ind=1;
        var arr=[];
        function showResult1(){
            str=$("#singer").val();
            if(str.length>0){
                $.get("admin/ajax/search/"+str+"/"+JSON.stringify(arr),function(data){
                    $("#result1").html(data);
                    $("#result1").css("border","1px solid #CCC5B9");
                    $("#result1").css("border-radius","4px");
                    $("#result1").css("border-top","none");
                    $(".result1").css("margin-bottom","0px");
                    $(".result1").mouseover(function(){
                        $(this).css("background-color","#DDDDDD");
                        $(this).css("cursor","pointer");
                    });
                    $(".result1").mouseout(function(){
                        $(this).css("background-color","white");
                        $(this).css("cursor","auto");
                    });

                    $(".result1").click(function(){
                        arr.push($(this).html());                      
                        $("#singera").append('<input id="singer'+ind+'" type="checkbox" name="singer[]" checked value="'+$(this).html()+'">');
                        $("#singer").before("<span style='background-color:#DDDDDD;border-radius:2px' id='"+ind+"'>"+$(this).html()+"<i class='fas fa-window-close' onclick='delete1("+ind+")'></i></span>");
                        ind++;
                        $("#singer").val("");
                        $(".result1").html("");
                    });
                });
            }    
            else{
                $("#result1").html("");
            }        
        }   

    </script>
    <script>
        function delete1(a){
            a=a.toString();
            var x=$("#"+a).html();
            x=x.substr(0,x.length-55-a.length);
            arr.splice(arr.indexOf(x),1);
            $("#"+a).remove();
            $("#singer"+a).remove();
        }
    </script>
</body>
</html>
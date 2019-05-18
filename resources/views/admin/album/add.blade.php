@extends('admin.layout.index')
@section('menu')
<div class="sidebar" data-background-color="black" data-active-color="danger" >

    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->

        <div class="sidebar-wrapper " >
            <div class="logo">
                <a href="admin/home" class="simple-text">
                Nhạc Của Chúng Tui
                </a>
            </div>
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                    <li id="home"> 
                        <a href="admin/home">
                            <i class="ti-home"></i>
                            <p>Trang Chủ</p>
                        </a>
                    </li>
                    <li id="user">
                        <a href="#subUser" data-toggle="collapse" class="collapsed"><i class="ti-music"></i> <p>QUẢN LÝ BÀI HÁT </p></a>
                        <div id="subUser" class="collapse">
                            <ul class="nav">
                                <li id="userList" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/song/list">
                                        <p>DANH SÁCH BÀI HÁT</p>
                                    </a>
                                </li>
                                <li id="userAdd" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/song/add">
                                        <p>THÊM BÀI HÁT</p>
                                    </a>
                                </li>  
                                <li id="userAdd" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/song/approve">
                                        <p>DUYỆT BÀI HÁT</p>
                                    </a>
                                </li>       
                            </ul>
                        </div>
                    </li>  
                    <li>
                        <a href="#subQuestion" data-toggle="collapse" class="collapsed"><i class="ti-user"></i> <p>QUẢN LÝ CA SĨ</p></a>
                        <div id="subQuestion" class="collapse ">
                            <ul class="nav">
                                <li id="questionList" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/singer/list">
                                        <p>DANH SÁCH CA SĨ</p>
                                    </a>
                                </li>
                                <li id="questionAdd" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/singer/add">
                                        <p>THÊM CA SĨ</p>
                                    </a>
                                </li>     
                            </ul>
                        </div>
                    </li> 
                    <li class="active">
                        <a href="#subSubject" data-toggle="collapse" class="collapsed"><i class="ti-gallery"></i> <p>QUẢN LÝ ALBUM</p></a>
                        <div id="subSubject" class="collapse ">
                            <ul class="nav">
                                <li id="subjectList" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/album/list">
                                        <p>DANH SÁCH ALBUM</p>
                                    </a>
                                </li>
                                <li id="subjectAdd" style="margin: 0px;position: relative;left: 47px;width: 212px" class="active">
                                    <a href="admin/album/add">
                                        <p>THÊM ALBUM</p>
                                    </a>
                                </li>     
                            </ul>
                        </div>
                    </li> 
                    <li>
                        <a href="#subTopic" data-toggle="collapse" class="collapsed"><i class="ti-gallery"></i> <p>QUẢN LÝ THỂ LOẠI</p></a>
                        <div id="subTopic" class="collapse ">
                            <ul class="nav">
                                <li id="topicList" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/topic/list">
                                        <p>DANH SÁCH THỂ LOẠI</p>
                                    </a>
                                </li>
                                <li id="topicAdd" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/topic/add">
                                        <p>THÊM THỂ LOẠI</p>
                                    </a>
                                </li>     
                            </ul>
                        </div>
                    </li>       
                </ul>
                </nav>
            </div>
            
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
            <div class="container-fluid">
                <div class="card">
                            <div class="header">
                                <h4 class="title">Album Mới</h4>
                            </div>
                            <div class="content">
                                <form action="admin/album/add" method="post" autocomplete="off" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
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
                                    @if(session('errimage'))
                                            <div class="alert alert-danger" style="width: 30%">
                                                {{session('errimage')}}
                                            </div>
                                        @endif
                                    <div class="form-group">
                                        <div class="row"> 
                                                <div class="col-lg-4">
                                                    <label>
                                                         Tên album
                                                     </label> 
                                                     <input class="form-control border-input" type="text" name="name" required="">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group" >
                                                        <label>Ca Sĩ</label>
                                                        <div  class="form-control" style="border:1px solid #CCC5B9">
                                                            <input type="text" class="border-input" id="singer"  onkeyup="showResult()" style="border: none;background-color: #fffcf5">                                                    
                                                        </div>
                                                        <div id="result" style="padding-left: 18px;max-height: 300px;overflow-y: scroll;">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label>
                                                         Ảnh
                                                     </label> 
                                                     <input class="form-control" type="file" name="image" value="" >
                                                </div>
                                            </div>
                                            <div style="display: none" id="singera">
                                            </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Thêm</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
			</div>
		</div>
@endsection
@section('script')
<script>  
        var ind=1;
        var arr=[];
        function showResult(){
            str=$("#singer").val();
            if(str.length>0){
                $.get("admin/ajax/search/"+str+"/"+JSON.stringify(arr),function(data){
                    $("#result").html(data);
                    $("#result").css("border","1px solid #CCC5B9");
                    $("#result").css("border-radius","4px");
                    $("#result").css("border-top","none");
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
                $("#result").html("");
            }        
        }   

    </script>
    <script>
        function delete1(a){
            a=a.toString();
            console.log(a.length);
            var x=$("#"+a).html();
            x=x.substr(0,x.length-55-a.length);
            arr.splice(arr.indexOf(x),1);
            $("#"+a).remove();
            $("#singer"+a).remove();
        }
    $(document).ready(function(){
        $("title").html("Thêm album");
    });
    </script>
@endsection


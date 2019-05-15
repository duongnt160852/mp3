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
                    <ul class="nav" >
                    <li id="home"> 
                        <a href="admin/home">
                            <i class="ti-home"></i>
                            <p>Trang Chủ</p>
                        </a>
                    </li>
                    <li id="user" class="active">
                        <a  href="#subUser" data-toggle="collapse" class="collapsed"><i class="ti-music"></i> <p>QUẢN LÝ BÀI HÁT </p></a>
                        <div id="subUser" class="collapse">
                            <ul class="nav">
                                <li id="userList" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/song/list">
                                        <p>DANH SÁCH BÀI HÁT</p>
                                    </a>
                                </li>
                                <li class="active" id="userAdd" style="margin: 0px;position: relative;left: 47px;width: 212px" >
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
                    <li>
                        <a href="#subSubject" data-toggle="collapse" class="collapsed"><i class="ti-gallery"></i> <p>QUẢN LÝ ALBUM</p></a>
                        <div id="subSubject" class="collapse ">
                            <ul class="nav">
                                <li id="subjectList" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/album/list">
                                        <p>DANH SÁCH ALBUM</p>
                                    </a>
                                </li>
                                <li id="subjectAdd" style="margin: 0px;position: relative;left: 47px;width: 212px">
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
                                <h4 class="title">Bài Hát Mới</h4>
                            </div>
                            
                            <div class="content">
                                
                                <form action="admin/song/add" method="post" enctype="multipart/form-data" autocomplete="off">
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
                                                <input type="text" class="form-control border-input" name="name" autofocus="" placeholder="Tên bài hát" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group" >
                                                <label>Ca Sĩ</label>
                                                <div  class="form-control" style="border:1px solid #CCC5B9">
                                                    <input type="text" class="border-input" id="singer"  onkeyup="showResult()" style="border: none;background-color: #fffcf5">                                                    
                                                </div>
                                                <div id="result1" style="padding-left: 18px;max-height: 300px;overflow-y: scroll;">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Album</label>
                                                <select class="form-control border-input" name="album" id="album">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group" >
                                                <label>Thể loại</label>
                                                <div  class="form-control" style="border:1px solid #CCC5B9">
                                                    <input type="text" class="border-input" id="topic"  onkeyup="showTopic()" style="border: none;background-color: #fffcf5">                                                    
                                                </div>
                                                <div id="resultTopic" style="padding-left: 18px;max-height: 300px;overflow-y: scroll;">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Sáng tác</label>
                                                <input  type="text" class="form-control border-input" name="musician" id="musician">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
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
@endsection
@section('script')
<script type="text/javascript" language="javascript" src="ckeditor/ckeditor.js" ></script>
    <script>  
        var ind=1;
        var arr=[];
        function showResult(){
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
        var ind1=1;
        var arr1=[];
        function showTopic(){
            str=$("#topic").val();
            if(str.length>0){
                $.get("admin/ajax/searchTopic/"+str+"/"+JSON.stringify(arr1),function(data){
                    $("#resultTopic").html(data);
                    $("#resultTopic").css("border","1px solid #CCC5B9");
                    $("#resultTopic").css("border-radius","4px");
                    $("#resultTopic").css("border-top","none");
                    $(".resultTopic").css("margin-bottom","0px");
                    $(".resultTopic").mouseover(function(){
                        $(this).css("background-color","#DDDDDD");
                        $(this).css("cursor","pointer");
                    });
                    $(".resultTopic").mouseout(function(){
                        $(this).css("background-color","white");
                        $(this).css("cursor","auto");
                    });

                    $(".resultTopic").click(function(){
                        arr.push($(this).html());                      
                        $("#topica").append('<input id="topic'+ind1+'" type="checkbox" name="topic[]" checked value="'+$(this).html()+'">');
                        $("#topic").before("<span style='background-color:#DDDDDD;border-radius:2px' id='a"+ind1+"'>"+$(this).html()+"<i class='fas fa-window-close' onclick='delete2("+ind1+")'></i></span>");
                        ind++;
                        $("#topic").val("");
                        $(".resultTopic").html("");
                    });
                });
            }    
            else{
                $("#resultTopic").html("");
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

        function delete2(a){
            a=a.toString();
            var x=$("#a"+a).html();
            x=x.substr(0,x.length-55-a.length);
            arr1.splice(arr1.indexOf(x),1);
            $("#a"+a).remove();
            $("#topic"+a).remove();
        }

        $.get("admin/ajax/album",function(data){
            $("#album").html(data);
        });
        $(document).ready(function(){
            $('title').html("Thêm bài hát");
            $('#password1').val($('#password').val());
        });
    </script>
@endsection
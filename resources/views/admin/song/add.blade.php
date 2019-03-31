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
                        <a  href="#subUser" data-toggle="collapse" class="collapsed"><i class="ti-user"></i> <p>QUẢN LÝ BÀI HÁT </p></a>
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
                                    <a href="admin/song/add">
                                        <p>DUYỆT BÀI HÁT</p>
                                    </a>
                                </li>       
                            </ul>
                        </div>
                    </li>  
                    <li>
                        <a href="#subQuestion" data-toggle="collapse" class="collapsed"><i class="ti-gallery"></i> <p>QUẢN LÝ CA SĨ</p></a>
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
                        <a href="#subSubject" data-toggle="collapse" class="collapsed"><i class="ti-book"></i> <p>QUẢN LÝ ALBUM</p></a>
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
                        <a href="#subTopic" data-toggle="collapse" class="collapsed"><i class="ti-book"></i> <p>QUẢN LÝ THỂ LOẠI</p></a>
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
                                <h4 class="title">Thí Sinh Mới</h4>
                            </div>
                            
                            <div class="content">
                                @if(count($errors)>0)
                                    @foreach($errors->all() as $err)
                                    <div class="alert alert-danger" style="width:30%">
                                     {{$err}}
                                    </div>
                                    @endforeach
                                @endif
                                @if(session('loi'))
                                    <div class="alert alert-danger" style="width:30%">
                                     {{session('loi')}}
                                    </div>
                                @endif
                                @if(session('thongbao'))
                                    <div class="alert alert-success" style="width:30%">
                                     {{session('thongbao')}}
                                    </div>
                                @endif
                                <form action="admin/user/add" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Tên bài hát</label>
                                                <input type="text" class="form-control border-input" name="name" autofocus="" placeholder="Tên bài hát" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Ca Sĩ</label>
                                                <input  type="text" class="form-control border-input" name="singer" id="singer" required="">
                                            </div>
                                        </div>
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
                                                <label>Tải bài hát</label><!--Tên ADMIN-->
                                                <input type="file" name="file">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tải ảnh</label> <!--Email-->
                                                <input type="file" name="file">
                                            </div>
                                        </div>
                                    </div>
                                     
                                    <div class="form-group" >
                                            <div class="row"> 
                                                <div class="col-xs-12 col-md-12">
                                                    <div>
                                                        <label>Lời bài hát</label>
                                                    </div>
                                                    <div>
                                                        <textarea name="comment" rows='10' cols='160'></textarea >
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
    <script>       
        $(document).ready(function(){
        	$.get("admin/ajax/gettopic?str="+$('#subject1').val(),function(data){
                $('#topic1').html(data);
                $.get("admin/ajax/getexam?str="+$('#topic1').val(),function(data){
                    $('#exam').html(data);
                });
            });

            $('#subject1').change(function(){
                $.get("admin/ajax/gettopic?str="+$('#subject1').val(),function(data){
                    $('#topic1').html(data);
                    $.get("admin/ajax/getexam?str="+$('#topic1').val(),function(data){
                    $('#exam').html(data);
                });
                });
            });

            $('#topic1').change(function(){
                $.get("admin/ajax/getexam?str="+$('#topic1').val(),function(data){
                    $('#exam').html(data);
                });
            });
            $.get("admin/ajax/getdate?str="+$('#month').val()+"&str1="+$('#year').val(),function(data){
                    $('#date').html(data);
                });

            $('#year').change(function(){
                $.get("admin/ajax/getdate?str="+$('#month').val()+"&str1="+$('#year').val(),function(data){
                    $('#date').html(data);
                });
            });
            $('#month').change(function(){
                $.get("admin/ajax/getdate?str="+$('#month').val()+"&str1="+$('#year').val(),function(data){
                    $('#date').html(data);
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('title').html("Thêm Thí Sinh");
            $('#password1').val($('#password').val());
        });
    </script>
@endsection
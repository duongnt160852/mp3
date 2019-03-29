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
                    Trắc Nghiệm
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
                        <a href="#subUser" data-toggle="collapse" class="collapsed"><i class="ti-user"></i> <p>QUẢN LÝ THÍ SINH</p></a>
                        <div id="subUser" class="collapse in">
                            <ul class="nav">
                                <li id="userList" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/user/list">
                                        <p>DANH SÁCH THÍ SINH</p>
                                    </a>
                                </li>
                                <li id="userAdd" class="active" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/user/add">
                                        <p>THÊM THÍ SINH</p>
                                    </a>
                                </li>      
                            </ul>
                        </div>
                    </li>  
                    <li>
                        <a href="#subQuestion" data-toggle="collapse" class="collapsed"><i class="ti-gallery"></i> <p>QUẢN LÝ CÂU HỎI</p></a>
                        <div id="subQuestion" class="collapse ">
                            <ul class="nav">
                                <li id="questionList" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/question/list">
                                        <p>DANH SÁCH CÂU HỎI</p>
                                    </a>
                                </li>
                                <li id="questionAdd" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/question/add">
                                        <p>THÊM CÂU HỎI</p>
                                    </a>
                                </li>     
                            </ul>
                        </div>
                    </li> 
                    <li>
                        <a href="#subSubject" data-toggle="collapse" class="collapsed"><i class="ti-book"></i> <p>QUẢN LÝ MÔN THI</p></a>
                        <div id="subSubject" class="collapse ">
                            <ul class="nav">
                                <li id="subjectList" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/subject/list">
                                        <p>DANH SÁCH MÔN THI</p>
                                    </a>
                                </li>
                                <li id="subjectAdd" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/subject/add">
                                        <p>THÊM MÔN THI</p>
                                    </a>
                                </li>     
                            </ul>
                        </div>
                    </li> 
                    <li>
                        <a href="#subTopic" data-toggle="collapse" class="collapsed"><i class="ti-book"></i> <p>QUẢN LÝ CHỦ ĐỀ</p></a>
                        <div id="subTopic" class="collapse ">
                            <ul class="nav">
                                <li id="topicList" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/topic/list">
                                        <p>DANH SÁCH CHỦ ĐỀ</p>
                                    </a>
                                </li>
                                <li id="topicAdd" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/topic/add">
                                        <p>THÊM CHỦ ĐỀ</p>
                                    </a>
                                </li>     
                            </ul>
                        </div>
                    </li> 
                    <li>
                        <a href="#subExam" data-toggle="collapse" class="collapsed"><i class="ti-book"></i> <p>QUẢN LÝ ĐỀ THI</p></a>
                        <div id="subExam" class="collapse ">
                            <ul class="nav">
                                <li id="examList" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/exam/list">
                                        <p>DANH SÁCH ĐỀ THI</p>
                                    </a>
                                </li>
                                <li id="examAdd" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/exam/add">
                                        <p>THÊM ĐỀ THI</p>
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
                                <form action="admin/user/add1" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <h6>Thêm bằng excel</h6>
                                    <input type="file" name="file"><br>
                                    <button type="submit">Thêm</button>
                                </form>
                                <form action="admin/user/add" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Họ tên</label>
                                                <input type="text" class="form-control border-input" name="name" autofocus="" placeholder="Họ tên" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mật khẩu</label>
                                                <input  type="text" class="form-control border-input" name="password" id="password" required="" value="{{str_random(10)}}" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="display: none">
                                            <div class="form-group">
                                                <label>Mật khẩu</label>
                                                <input  type="text" class="form-control border-input" name="password1" id="password1" required="" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mã Số Dự Thi</label><!--Tên ADMIN-->
                                                <input type="text" class="form-control border-input" name='username' placeholder="username" required="" pattern="[a-zA-Z0-9]{1,100}" title="Nhập sai MSDT">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Địa Chỉ Email</label> <!--Email-->
                                                <input type="email" class="form-control border-input" name='email' placeholder="Email" >
                                            </div>
                                        </div>
                                    </div>
                                     
                                    <div class="form-group" >
                                        <label>Ngày Sinh</label><!--Tên ADMIN-->
                                        <div class="row"> 
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                        <label>Năm</label>
                                                    </div>
                                                    <input class="form-control border-input" name="year" placeholder="Năm sinh" require=""  type="text" id="year" pattern="[0-9]{4}" title="Nhập sai năm">
                                                </div>
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                        <label>Tháng</label>
                                                    </div>
                                                    <select class="form-control border-input" name='month' id='month' required="">
                                                    @for($i=1;$i<=12;$i++)
                                                        @if ($i<10) <option value='0{{$i}}'>{{$i}}</option>
                                                        @else <option value='{{$i}}'>{{$i}}</option>
                                                        @endif
                                                    @endfor
                                                    </select> 
                                                </div> 
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                        <label>Ngày</label>
                                                    </div>
                                                    <select class="form-control border-input" name='date' id='date' required="">   
                                                    </select> 
                                                </div> 
                                            </div>
                                            <div class="row"> 
                                                <div class="col-xs-3 col-md-3">
                                                    <div>
                                                        <label>Môn thi</label>
                                                    </div>
                                                    <select class="form-control border-input" name="subject" id="subject1">
                                                        @foreach($subject as $su)
                                                            <option value='{{$su->id}}'>{{$su->name}}</option>
                                                        @endforeach
                                                    </select> 
                                                </div> 
                                                <div class="col-xs-3 col-md-3" >
                                                    <div>
                                                        <label>Chủ đề</label>
                                                    </div>
                                                    <select class="form-control border-input" id="topic1" name="topic">
                                                    </select> 
                                                </div> 
                                                <div class="col-xs-3 col-md-3">
                                                    <div>
                                                        <label>Đề Thi</label>
                                                    </div>
                                                    <select class="form-control border-input" name="exam" id="exam" >

                                                    </select> 
                                                </div> 
                                                <div class="col-xs-3 col-md-3">
                                                    <div>
                                                        <label>Mã Đề</label>
                                                    </div>
                                                    <select class="form-control border-input" name="code" id="code" >
                                                        @for($i=1;$i<=12;$i++)
                                                            <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select> 
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
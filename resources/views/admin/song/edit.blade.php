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
                                <li id="userList" class="active" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/user/list">
                                        <p>DANH SÁCH THÍ SINH</p>
                                    </a>
                                </li>
                                <li id="userAdd" style="margin: 0px;position: relative;left: 47px;width: 212px">
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
                <form action="admin/user/edit/{{$user->id}}" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        @if(count($errors)>0)
                                            <div class="alert alert-danger" style="width: 30%">
                                            {{$errors->all()[0]}} 
                                            </div>
                                        @endif
                                        @if(session('thongbao'))
                                            <div class="alert alert-success" style="width: 30%">
                                                {{session('thongbao')}}
                                            </div>
                                        @endif
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Họ tên</label>
                                                <input type="text" class="form-control border-input" name="name" required="" value="{{$user->name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label> <!--Email-->
                                                <input type="email" class="form-control border-input" name='email' value="{{$user->email}}">
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
                                                    <input class="form-control border-input" name="year" require=""  type="text" id="year" value="{{substr($user->DoB,0,4)}}">
                                                </div>
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                        <label>Tháng</label>
                                                    </div>
                                                    <select class="form-control border-input" name='month' id='month' required="" >
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
                                                    <select class="form-control border-input" name='date' id='date' required="" >   
                                                    </select> 
                                                </div> 
                                        </div>
                                    </div>
                                    <div class="text-center form-group">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Sửa</button>
                                        <a href="admin/user/list" class="btn btn-info btn-fill btn-wd">Hủy</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                </div>
            </div>
        </div>
@endsection
@section('script')
<script>       
        $(document).ready(function(){
            $.get("admin/ajax/getdate?str="+$('#month').val()+"&str1="+$('#year').val(),function(data){
                    $('#date').html(data);
                    $('#month').val(<?php echo substr($user->DoB,5,2); ?><10?"0"+<?php echo substr($user->DoB,5,2); ?>:<?php echo substr($user->DoB,5,2); ?>);
                    $('#date').val(<?php echo substr($user->DoB,8,2); ?><10?"0"+<?php echo substr($user->DoB,8,2); ?>:<?php echo substr($user->DoB,8,2); ?>);
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
    $("title").html("Sửa thí sinh");
    </script>
@endsection

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
                        <div id="subUser" class="collapse">
                            <ul class="nav">
                                <li id="userList" style="margin: 0px;position: relative;left: 47px;width: 212px">
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
                        <div id="subQuestion" class="collapse in">
                            <ul class="nav">
                                <li id="questionList" style="margin: 0px;position: relative;left: 47px;width: 212px">
                                    <a href="admin/question/list">
                                        <p>DANH SÁCH CÂU HỎI</p>
                                    </a>
                                </li>
                                <li id="questionAdd" class="active" style="margin: 0px;position: relative;left: 47px;width: 212px">
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
                                <h4 class="title">Câu Hỏi Mới</h4>
                            </div>
                            <div class="content">
                                <form action="admin/question/add" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        @if(count($errors)>0)
                                            <div class="alert alert-danger" style="width: 30%">
                                            {{$errors->all()[0]}} 
                                            </div>
                                        @endif
                                        @if(session('thongbao'))
                                            <div class="alert alert-success" style="width: 30%">
                                                Thêm thành công
                                            </div>
                                        @endif
                                        <div class="row"> 
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                        <label>Môn thi</label>
                                                    </div>
                                                    <select class="form-control border-input" id="subject1" name="subject">
                                                        @foreach($subject as $su)
                                                            <option value="{{$su->id}}">{{$su->name}}</option>}
                                                        @endforeach
                                                    </select> 
                                                </div> 
                                                <div class="col-xs-4 col-md-4" >
                                                    <div>
                                                        <label>Chủ đề</label>
                                                    </div>
                                                    <select class="form-control border-input" id="topic1" name="topic">
                                                    </select> 
                                                </div> 
                                                <div class="col-xs-4 col-md-4">
                                                    <div>
                                                       <label>Độ khó</label>
                                                    </div>
                                                    <select class="form-control border-input" name="level">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select> 
                                                </div> 
                                            </div>
                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Câu Hỏi</label>
                                                <div>
                                                        <textarea name="question" rows='5' cols='160' id="demo" class="ckeditor" required=""></textarea >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Đáp Án A</label>
                                                <div>
                                                        <textarea name="A" rows='5' cols='160' id="demo" class="ckeditor" required=""></textarea >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Đáp Án B</label>
                                                <div>
                                                        <textarea name="B" rows='5' cols='160' id="demo" class="ckeditor" required=""></textarea >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Đáp Án C</label>
                                                <div>
                                                        <textarea name="C" rows='5' cols='160' id="demo" class="ckeditor" required=""></textarea >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Đáp Án D</label>
                                                <div>
                                                        <textarea name="D" rows='5' cols='160' id="demo" class="ckeditor" required=""></textarea >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row"> 
                                                   <div class="col-xs-6 col-md-6">
                                                    <label>Đáp Án Đúng</label>
                                                    <div class="form-group">
                                                    
                                                    <div class="col-sm-2">
                                                        A <input type="radio" name="answer" value="A" required=""> 
                                                    </div>
                                                    <div class="col-sm-2">
                                                        B <input type="radio" name="answer" value="B" required=""> 
                                                    </div>
                                                    <div class="col-sm-2">
                                                        C <input type="radio" name="answer" value="C" required=""> 
                                                    </div>
                                                    <div class="col-sm-2">
                                                        D <input type="radio" name="answer" value="D" required="">  
                                                    </div>
                                                  </div><!--dap an -->
                                                </div> 
                                        </div>
                                        <div class="row"> 
                                                   <div class="col-xs-12 col-md-12">
                                                    <label>Giải thích</label>
                                                    <div>
                                                        <textarea name="comment" rows='5' cols='160' class="ckeditor" id="demo"></textarea >
                                                    </div>
                                                </div> 
                                        </div>
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
        $('#questionAdd').addClass("active");
        $("title").html("Thêm câu hỏi");
    </script>
    <script>
        $(document).ready(function(){
            $("#questionList").css("display","block");
            $("#questionAdd").css("display","block");

            $.get("admin/ajax/gettopic?str="+$('#subject1').val(),function(data){
                $('#topic1').html(data);
            });

            $('#subject1').change(function(){
                $.get("admin/ajax/gettopic?str="+$('#subject1').val(),function(data){
                    $('#topic1').html(data);
                });
                });
            });
    </script>
@endsection

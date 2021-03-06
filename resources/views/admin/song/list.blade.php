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
                        <a href="#subUser" data-toggle="collapse" class="collapsed"><i class="ti-music"></i> <p>QUẢN LÝ BÀI HÁT </p></a>
                        <div id="subUser" class="collapse">
                            <ul class="nav">
                                <li class="active" id="userList" style="margin: 0px;position: relative;left: 47px;width: 212px" >
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh Sách Bài Hát</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                @if(session('thongbao'))
                                    <div class="alert alert-success" style="width: 30%">
                                        {{session('thongbao')}}
                                    </div>
                                @endif
                                <table class="table table-striped" id="table">
                                    <thead>
                                        <th>ID</th>
                                        <th>Người Đăng</th>
                                        <th>Tên Bài Hát</th>
                                        <th>Ca Sĩ</th>
                                        <th>Lượt nghe</th>
                                        <th>Sáng Tác</th>
                                        <th>Ngày Đăng</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </thead>
                                    <tbody id="body">
                                        @foreach($songs as $song)
                                            <tr>
                                                <td>{{$song->id}}</td>
                                                <td>{{$song->uploader}}</td>
                                                <td>{{$song->name}}</td>
                                                <td>@for($i=0;$i<count($song->music_singer);$i++)
                                                    @if($i==0) {{$song->music_singer[$i]->singer->name}}
                                                    @else {{", "}}{{$song->music_singer[$i]->singer->name}}
                                                    @endif
                                                @endfor</td>
                                                <td>{{$song->views}}</td>
                                                <td>{{$song->musician}}</td>
                                                <td>{{$song->created_at->format('d-m-Y')}}</td>
                                                <td><a href="admin/song/edit/{{$song->id}}"><img src="images/icons/edit.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                                                <td><a onclick="myFunction('{{$song->id}}')" style="cursor: pointer;"><img src="images/icons/delete.png" class="img-responsive " alt="Responsive image" width="16" height="16"></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('script')
    <link rel="stylesheet" type="text/css" href="datatable/datatables.css">
    <script type="text/javascript" charset="utf8" src="datatable/datatables.js"></script>
    <script>
        $(document).ready( function () {
            $(document).ready(function() {
                $('#table').DataTable( {
                    dom: 'Bfrtip',
                    info: false
                } );
            } );
        } );
    </script>
    <script>
    $("title").html("Danh sách bài hát");
    </script>
    <script>
        function myFunction(str){
            if (confirm('Bạn có chắc chắn muốn xóa?')){
                window.location.href="admin/song/delete/"+str;
            }
        }
    </script>
@endsection
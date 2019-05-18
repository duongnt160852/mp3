<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <base href="{{asset('')}}">
	<link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="images/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title></title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="css/admin/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="fontawesome/css/all.css">

    <!-- Animation library for notifications   -->
    <link href="css/admin/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="css/admin/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="css/admin/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    
    <link href="css/themify-icons.css" rel="stylesheet">

</head>
<body>

<div class="wrapper">
        @yield('menu')
    <div class="main-panel">
        
        @include('admin.layout.header')

        @yield('content')


        @include('admin.layout.footer')

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="js/admin/jquery.min.js" type="text/javascript"></script>
	<script src="js/admin/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="js/admin/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="js/admin/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="js/admin/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="js/admin/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="js/admin/demo.js"></script>



    @yield('script')

</html>

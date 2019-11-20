<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | POS ROXZON </title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('kloro/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('kloro/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('kloro/vendor/linearicons/style.css')}}">
	<link rel="stylesheet" href="{{asset('kloro/vendor/chartist/css/chartist-custom.css')}}">
	<link rel="stylesheet" href="{{asset('kloro/vendor/toastr/toastr.min.css')}}">
	<link rel="stylesheet" href="{{asset('kloro/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('kloro/datatable/datatables.min.css')}}">
	<link rel="stylesheet" href="{{asset('kloro/css/jquery-confirm.min.css')}}">
	<link rel="stylesheet" href="{{asset('datepicker/bootstrap-datepicker3.min.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('kloro/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('kloro/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('kloro/icon_60.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('kloro/icon_60.png')}}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="{{asset('kloro/roxzon_logo.png')}}" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('kloro/img/user.png')}}" class="img-circle" alt="Avatar"> <span>{{ auth()->user()->name }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								{{-- <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li> --}}
								<li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
								<li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="{{'/penjualan'}}" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="{{'/penjualan'}}" class=""><i class="lnr lnr-cart"></i> <span>Order List</span></a></li>
						<li><a href="{{'/penjualan/create'}}" class=""><i class="lnr lnr-cart"></i> <span>Tambah Order</span></a></li>
						{{-- <li><a href="{{route('kirim.index')}}" class=""><i class="lnr lnr-cart"></i> <span>Pengiriman</span></a></li> --}}
						<li>
							<a href="#subDataJual" data-toggle="collapse" class="active" aria-expanded="true"><i class="lnr lnr-chart-bars"></i> <span>Pengiriman</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subDataJual" class="collapse ">
								<ul class="nav">
									<li><a href="{{route('kirim.index')}}" class="">Setup Pengiriman</a></li>
									@php
										$data_tools = \App\Models\Tbl_shipment_tool::all();
									@endphp

									@foreach ($data_tools as $tool)
										<li><a href="{{'/penjualan/kirim/'.$tool->id}}" class="">{{$tool->tool_name}}</a></li>
									@endforeach
								</ul>
							</div>
						</li>
						<li><a href="charts.html" class=""><i class="lnr lnr-cog"></i> <span>Pengaturan Akun</span></a></li>
						<li><a href="/logout" class=""><i class="lnr lnr-power-switch"></i> <span>Log Out</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					{{-- write your kontent here --}}
					@yield('content')

				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved. | Edited By <a href="https://www.instagram.com/mush_60/" target="blank">mush60</a></p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{asset('kloro/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('kloro/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('kloro/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('kloro/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
	<script src="{{asset('kloro/vendor/chartist/js/chartist.min.js')}}"></script>
	<script src="{{asset('kloro/vendor/toastr/toastr.min.js')}}"></script>
	<script src="{{asset('kloro/scripts/klorofil-common.js')}}"></script>
	<script src="{{asset('kloro/datatable/datatables.min.js')}}"></script>
	<script src="{{asset('kloro/js/jsFile.js')}}"></script>
	<script src="{{asset('kloro/js/jquery-confirm.min.js')}}"></script>
	<script src="{{asset('datepicker/bootstrap-datepicker.min.js')}}"></script>
</body>

</html>
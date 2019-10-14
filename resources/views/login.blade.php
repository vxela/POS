<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | POS ROXZON</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('kloro/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('kloro/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('kloro/vendor/linearicons/style.css')}}">
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
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="{{asset('kloro/roxzon_logo.png')}}" alt="Klorofil Logo"></div>
								<p class="lead">Login to your account</p>
								@if(\Session::has('alert'))
									<div class="alert alert-danger">
										<div>{{Session::get('alert')}}</div>
									</div>
								@endif
								@if(\Session::has('alert-success'))
									<div class="alert alert-success">
										<div>{{Session::get('alert-success')}}</div>
									</div>
								@endif
							</div>
							<form class="form-auth-small" action="/auth" method="POST">
								{{csrf_field()}}
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
									placeholder="Email" value="{{ old('email') }}">
									@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="signin-password" placeholder="Password">
								</div>
								{{-- <div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Remember me</span>
									</label>
								</div> --}}
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
								<div class="bottom">
									{{-- <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span> --}}
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Roxzon Point of Sale</h1>
							<p>By Mush60</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>

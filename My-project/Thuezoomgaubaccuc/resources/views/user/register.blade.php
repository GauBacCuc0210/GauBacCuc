<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Glassy Login Form A Responsive Widget Template :: w3layouts</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glassy Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="icon" href="images/pngtree-polar-bear-head-png-image_12164074.png" type="image/png">
@vite(['resources/css/app.css','resources/css/font-awesome.css', 'resources/js/app.js'])
<!-- //css files -->
<!-- web-fonts -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700" rel="stylesheet">
<!-- //web-fonts -->
</head>
<body>
		<!--header-->
		<div class="header-w3l">
			<h1>Thuê Zoom Gấu Bắc Cực</h1>
		</div>
		<!--//header-->
		<!--main-->
		<?php ?>
		<div class="main-w3layouts-agileinfo">
	           <!--form-stars-here-->
						<div class="wthree-form">
							<h2>Đăng ký</h2>
							<form action="{{ route('user.register') }}" method="POST">
								@csrf

								<div class="form-sub-w3">
									<input type="text" name="name" placeholder="Tên đăng nhập" value="{{ old('name') }}" required>
								</div>

								<div class="form-sub-w3">
									<input type="text" name="email" placeholder="Email" value="{{ old('email') }}" required>
								</div>

								<div class="form-sub-w3">
									<input type="text" name="phone" placeholder="Số điện thoại" value="{{ old('phone') }}" required>
									<input type="hidden" name="coin" value="0">
									<input type="hidden" name="avatar" value="images/pngtree-polar-bear-head-png-image_12164074.png">
								</div>

								<div class="form-sub-w3">
									<input type="password" name="password" placeholder="Mật khẩu" required>
								</div>

								<div class="form-sub-w3">
									<input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu" required>
								</div>

								@if ($errors->any())
									<div style="color: red;">{{ $errors->first() }}</div>
								@endif

								<label class="anim">
									<input type="checkbox" name="" required>
									<span>Tôi đồng ý với Điều kiện và chính sách bảo mật</span>
								</label> 

								<div class="submit-agileits">
									<input type="submit" value="Đăng ký">
								</div>
							</form>

                            <div class="" style="text-align: center; margin-top:35px;color:#fff">Bạn đã có tài khoản ? <a href="/login" style="color:blue;"> Đăng nhập ngay</a> </div>							

						</div>
				<!--//form-ends-here-->

		</div>
		<!--//main-->
		<!--footer-->
		<!-- <div class="footer">
			<p>&copy;  Glassy Login Form. All rights reserved</p>
		</div> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>
		<!--//footer-->
</body>
</html>
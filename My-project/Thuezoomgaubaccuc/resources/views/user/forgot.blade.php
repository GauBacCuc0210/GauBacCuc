<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Quên mật khẩu</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
							<h2>Quên mật khẩu</h2>
							<form action="{{ route('password.email') }}" method="POST">
    							@csrf
								<div class="form-sub-w3">
									<p style="color:#fff;text-align:center;margin-bottom:35px">Thật khó chịu khi điều đó xảy ra! Địa chỉ email của bạn là gì? Chúng tôi sẽ gửi cho bạn liên kết để thiết lập lại địa chỉ đó</p>
							
								</div>
                                <div class="form-sub-w3">
									<input type="text" name="email" placeholder="email" required>
								
								</div>

								@if ($errors->any())
									<div style="color: red;">{{ $errors->first() }}</div>
								@endif
								<div class="submit-agileits">
									<input type="submit" value="Gửi hướng dẫn đặt lại">
								</div>
                            </form>
                            <div class="" style="text-align: center; margin-top:35px;color:#fff">Trở về <a href="/login" style="color:blue;"> Đăng ký</a> </div>							

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
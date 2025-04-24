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
<style>
.icon-success {
    background-color: #28a745;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.icon-success i {
    color: #fff;
    font-size: 16px;
}


@keyframes progressBar {
	from { width: 100%; }
	to { width: 0%; }
}
	
</style>




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
						@if (session('success'))
							<div class="alert alert-success" id="success-alert" style="display:flex;justify-content: center;align-items: center;position: relative; background-color: #d4edda; padding: 20px; color: #155724; text-align: center; margin: 20px auto; width: 62%; max-width: 600px; border-radius: 5px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
								<div class="icon-success">
									<i class="fa-solid fa-check"></i>
								</div>
							
								<div style="padding-left:6px">{{ session('success') }}</div>

								<div class="countdown-wrapper">
									<div class="countdown-bar" id="countdown-bar" style="position: absolute; bottom: 0; left: 0; height: 5px; background-color: #28a745; width: 100%; animation: progressBar 5s linear forwards;"></div>
								</div>
							</div>
						@endif
						@if (session('status'))
							<div id="status-box" style="position: relative; background-color: #d4edda; padding: 20px; color: #155724; text-align: center; margin: 20px auto; width: 80%; max-width: 600px; border-radius: 5px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
								{{ session('status') }}

								<!-- Progress bar -->
								<div id="progress-bar" style="position: absolute; bottom: 0; left: 0; height: 5px; background-color: #28a745; width: 100%; animation: progressBar 5s linear forwards;"></div>
							</div>

						@endif

							<h2>Đăng nhập</h2>
							
							<form action="{{ route('login.submit') }}" method="POST">
    							@csrf
								<div class="form-sub-w3">
									<input type="text" name="phone" placeholder="Số điện thoại" required>
									<div class="icon-w3">
										<i class="fa fa-user"></i>
									</div>
								</div>
								<div class="form-sub-w3">
									<input type="password" name="password" id="password-input" placeholder="Mật khẩu" required>
									<div class="icon-w3" onclick="togglePassword()">
										<i class="fa-solid fa-unlock" id="toggle-password-icon"></i>
									</div>
								</div>

							
								@if ($errors->any())
									<div style="color: red;">{{ $errors->first() }}</div>
								@endif
								<label class="anim">
									<input type="checkbox" name="remember">
									<span>Nhớ mật khẩu</span>
									<a href="/forgot-password">Quên mật khẩu ?</a>
								</label> 
								<div class="submit-agileits">
									<input type="submit" value="Đăng nhập">
								</div>
                            </form>
                            <div class="" style="text-align: center; margin-top:35px;color:#fff">Bạn chưa có tài khoản ? <a href="/register" style="color:blue;"> Đăng ký</a> </div>							

						</div>
				<!--//form-ends-here-->

		</div>
		<!--//main-->
		<!--footer-->
		<div class="footer">
			<p>&copy;  Glassy Login Form. All rights reserved</p>
		</div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>
		<!--//footer-->
		<script>
			function togglePassword() {
				const passwordInput = document.getElementById("password-input");
				const icon = document.getElementById("toggle-password-icon");

				if (passwordInput.type === "password") {
					passwordInput.type = "text";
					icon.classList.remove("fa-unlock");
					icon.classList.add("fa-lock-open");
				} else {
					passwordInput.type = "password";
					icon.classList.remove("fa-lock-open");
					icon.classList.add("fa-unlock");
				}
			}
		</script>
		<script>
			const bar = document.getElementById('countdown-bar');
			const alertBox = document.getElementById('success-alert');
			let width = 100; // phần trăm
			const interval = setInterval(() => {
				width -= 20; // giảm 20% mỗi giây => 5 giây hết
				if (width <= 0) {
					clearInterval(interval);
					alertBox.style.display = 'none';
				} else {
					bar.style.width = width + '%';
				}
			}, 1000);
		</script>


		<script>
			
			setTimeout(() => {
				const box = document.getElementById('status-box');
				if (box) {
					box.style.transition = 'opacity 0.5s ease';
					box.style.opacity = 0;
					setTimeout(() => box.remove(), 500); 
				}
			}, 5000);
		</script>



</body>
</html>
<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Classy Login form Widget Flat Responsive Widget Template :: w3layouts</title>
<script src="{{{'public/login_register_form/js/jquery.min.js'}}}"></script>
<!-- Custom Theme files -->
<link href="{{{'public/login_register_form/css/style.css'}}}" rel="stylesheet" type="text/css" media="all"/>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Classy Login form Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<!--header start here-->
<div class="header">
		<div class="header-main">
		       <h1> ĐĂNG NHẬP</h1>
			<div class="header-bottom">
				<div class="header-right w3agile">
					
					<div class="header-left-bottom agileinfo">
						
					 <form action="{{URL::to('/checkLogin')}}" method="POST">
					 	{{ csrf_field()}}
						<input type="text"  placeholder="vui long nhap email cua ban" name="email" />
						
					<input type="password" name="password" />
						
					   <span style="font-size: 20px; color: red">
					   	@if(Session::has('note_err')!=null)
					   		{{Session::get('note_err')}}
					   	@endif
					   </span>
						<input type="submit" value="Login">
					</form>	
					
						
				</div>
				</div>
			  
			</div>
		</div>
</div>
<!--header end here-->

</body>
</html>
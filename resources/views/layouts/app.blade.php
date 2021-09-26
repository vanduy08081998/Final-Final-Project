<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from codervent.com/syndash/demo/vertical/authentication-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Sep 2021 04:30:47 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Syndash - @yield('title')</title>
	<!--favicon-->
	<link rel="icon" href="{{ URL::to('backend/images/favicon-32x32.png') }}" type="image/png" />
	<!-- loader-->
	<link href="{{ URL::to('backend/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ URL::to('backend/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ URL::to('backend/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&amp;family=Roboto&amp;display=swap" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="{{ URL::to('backend/css/icons.css') }}" />
	<!-- App CSS -->
	<link rel="stylesheet" href="{{ URL::to('backend/css/app.css') }}" />
</head>

<body class="bg-forgot">
	<!-- wrapper -->
	    @yield('content')
	<!-- end wrapper -->
</body>

<script src="{{ URL::to('backend/js/jquery.min.js')}}"></script>
    <script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});

            $("#show_hide_password2 a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password2 input').attr("type") == "text") {
					$('#show_hide_password2 input').attr('type', 'password');
					$('#show_hide_password2 i').addClass("bx-hide");
					$('#show_hide_password2 i').removeClass("bx-show");
				} else if ($('#show_hide_password2 input').attr("type") == "password") {
					$('#show_hide_password2 input').attr('type', 'text');
					$('#show_hide_password2 i').removeClass("bx-hide");
					$('#show_hide_password2 i').addClass("bx-show");
				}
			});
		});
	</script>

</html>

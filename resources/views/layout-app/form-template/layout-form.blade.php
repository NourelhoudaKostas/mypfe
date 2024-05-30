<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href=""/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{asset("assets/formtempalte/vendor/bootstrap/css/bootstrap.min.css")}}>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{asset("assets/formtempalte/fonts/font-awesome-4.7.0/css/font-awesome.min.css")}}>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{asset("assets/formtempalte/vendor/animate/animate.css")}}>
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href={{asset("assets/formtempalte/vendor/css-hamburgers/hamburgers.min.css")}}>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{asset("assets/formtempalte/vendor/select2/select2.min.css")}}>
<!--===============================================================================================-->
	<!--link rel="stylesheet" type="text/css" href={{asset("assets/formtempalte/css/util.css")}}-->
	<link rel="stylesheet" type="text/css" href={{asset("assets/formtempalte/css/login.css")}}>

	<!--link rel="stylesheet" type="text/css" href={{asset("assets/formtempalte/css/main.css")}}-->
<!--===============================================================================================-->
</head>
<body>
	
	@yield('content')
<!--===============================================================================================-->	
	<script src={{asset("assets/formtempalte/vendor/jquery/jquery-3.2.1.min.js")}}></script>
<!--===============================================================================================-->
	<script src={{asset("assets/formtempalte/vendor/bootstrap/js/popper.js")}}></script>
	<script src={{asset("assets/formtempalte/vendor/bootstrap/js/bootstrap.min.js")}}></script>
<!--===============================================================================================-->
	<script src={{asset("assets/formtempalte/vendor/select2/select2.min.js")}}></script>
<!--===============================================================================================-->
<script src={{asset("assets/formtempalte/vendor/crud/formateurCRUD.js")}}></script>
<!--===============================================================================================-->
	<script src={{asset("assets/formtempalte/vendor/tilt/tilt.jquery.min.js")}}></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src={{asset("assets/formtempalte/js/main.js")}}></script>

</body>
</html>
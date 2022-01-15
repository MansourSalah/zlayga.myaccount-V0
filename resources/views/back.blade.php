<!DOCTYPE html>
<html>

<head>
<title>Account Rancho</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Rancho Account">
<meta name="author" content="Rancho Academy">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/fonts/icomoon/style.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

@include('comun.css')
    
<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
</head>

<body class="{{App::getLocale()}}">
<div class="site-wrap">
    @yield('content')    
</div>

<script src="{{asset('assets/js/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/js/aos.js')}}"></script>

<script src="{{asset('assets/js/main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    
@include('comun.js')
</body>
</html>
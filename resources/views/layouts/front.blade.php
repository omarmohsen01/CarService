<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="HVAC Template">
    <meta name="keywords" content="HVAC, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HVAC | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/style.css')}}" type="text/css">
</head>
<body>

    <x-front.nav/>

    @yield('content')

    <x-front.footer/>

    <script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('front/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>
</body>


</html>

<!DOCTYPE html>
<!--Code By Webdevtrick ( https://webdevtrick.com )-->
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Personality Quiz</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='{{asset('css/bootstrap.min.css')}}'>
    <link rel="stylesheet" href="{{asset('css/modern-business.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
</head>

<body data-success-msg="{{session('status')}}" data-error-msg="{{session('error')}}">

    @include('frontend.layout.header')

    <style>

    </style>
    <div class="loader" id="loader" style="display: none"></div>
    @yield('content')

    @include('frontend.layout.footer')

    <script src="{{asset('js/jquery.min.js')}}"> </script>
    <script src="{{asset('js/bootstrap.min.js')}}"> </script>
    <script src="{{asset('js/jquery.form.min.js')}}"> </script>
    <script src="{{asset('backend/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('frontend/style.js')}}"> </script>
    <script src="{{asset('frontend/custom.js')}}"> </script>

    @yield('additional_scripts')

</body>

</html>

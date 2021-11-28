<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from codervent.com/syndash/demo/vertical/authentication-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Sep 2021 04:30:47 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>BigDeal - @yield('title')</title>

    <!--favicon-->
    <link rel="icon" href="{{ asset('frontend/img/logo/favicon.png') }}" type="image/png" />
    <!-- loader-->
    <link href="{{ URL::to('backend/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ URL::to('backend/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::to('backend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&amp;family=Roboto&amp;display=swap" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ URL::to('backend/css/icons.css') }}" />
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ URL::to('backend/css/app.css') }}" />

    <link rel="stylesheet" href="{{ URL::to('backend/css/stylelogin.css') }}" />
    <!-- <link rel="stylesheet" href="{{ URL::to('backend/css/material-design-iconic-font.min.css') }}" /> -->
</head>

<body class="bg-forgot">
    <!-- wrapper -->
    @yield('content')
    <!-- end wrapper -->
</body>

<script src="{{ URL::to('backend/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{ URL::to('backend/js/user.js')}}"></script>

</html>

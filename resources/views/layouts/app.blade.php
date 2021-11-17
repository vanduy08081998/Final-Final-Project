<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from codervent.com/syndash/demo/vertical/authentication-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Sep 2021 04:30:47 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Syndash - @yield('title')</title>

    <!--favicon-->
    <link rel="icon" href="{{ URL::to('backend/images/favicon-32x32.png') }}" type="image/png" />
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

<script>
$('.login').on('click', function() {
    var email = $('.email').val();
    var password = $('.password').val();
    $.ajax({
        url: 'login',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            email: email,
            password: password
        },
        success: function(data) {
            window.location.href = "/home";
        },
        error: function(jqXHR) {
            // alert(xhr.responseText);
            error = jqXHR.responseJSON;
            if (error.errors.email) {
                $('.name_error').text(error.errors.email[0]);
                $('.email').addClass('is-invalid');
            }
            else{
                $('.name_error').text('');
            }
            if (error.errors.password) {
                $('.pass_error').text(error.errors.password[0]);
                $('.password').addClass('is-invalid');
            } else{
                $('.pass_error').text('');
            }

        }
    })
})

$('.register').on('click', function() {
    var name = $('.name_regis').val()
    var email = $('.email_regis').val();
    var password = $('.pass_regis').val();
    var password_confirmation = $('.pass_conf').val();
    $.ajax({
        url: 'register',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            name: name,
            email: email,
            password: password,
            password_confirmation: password_confirmation
        },
        success: function(data) {
            window.location.href = "/home";
        },
        error: function(jqXHR) {
            // alert(xhr.responseText);
            error = jqXHR.responseJSON;
            if (error.errors.name) {
                $('.name_error_regis').text(error.errors.name[0]);
                $('.name_regis').addClass('is-invalid');
            }
            else{
                $('.name_error_regis').text('');
                $('.name_regis').removeClass('is-invalid');
                $('.name_regis').addClass('is-valid');
            }
            if (error.errors.email) {
                $('.email_error_regis').text(error.errors.email[0]);
                $('.email_regis').addClass('is-invalid');
            }
            else{
                $('.email_error_regis').text('');
                $('.email_regis').removeClass('is-invalid');
                $('.email_regis').addClass('is-valid');
            }
            if (error.errors.password) {
                $('.pass_error_regis').text(error.errors.password[0]);
                $('.pass_regis').addClass('is-invalid');
            } else{
                $('.pass_error_regis').text('');
                $('.pass_regis').removeClass('is-invalid');
            }
            if(error.errors){
                document.querySelector('.pass_regis').value = '';
                document.querySelector('.pass_conf').value = '';
            }

        }
    })
})

$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
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

    $("#show_hide_password2 a").on('click', function(event) {
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

const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    document.querySelector('.form_login').reset();
    container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});
</script>

</html>

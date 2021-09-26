<!DOCTYPE html>
<html lang="en" class="dark-sidebar">

<!-- Mirrored from codervent.com/syndash/demo/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Sep 2021 04:21:40 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Syndash - @yield('title')</title>
    <!--favicon-->
    <link rel="icon" href="{{ URL::to('backend/images/favicon-32x32.png')}}" type="image/png" />
    <!-- Vector CSS -->
    <link href="{{ URL::to('backend/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <!--plugins-->
    <link href="{{ URL::to('backend/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{ URL::to('backend/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{ URL::to('backend/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <link href="{{ URL::to('backend/plugins/Drag-And-Drop/dist/imageuploadify.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ URL::to('backend/plugins/select2/select2.min.css') }}">
    <!--Data Tables -->
    <link href="{{ URL::to('backend/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ URL::to('backend/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css">
    <!-- loader-->
    <link href="{{ URL::to('backend/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{ URL::to('backend/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="{{ URL::to('backend/css/bootstrap.min.css')}}" /> -->
    <!-- cài node,bootstrap -->
    <link rel="stylesheet" href="{{ URL::to('css/app.css')}}" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&amp;family=Roboto&amp;display=swap" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ URL::to('backend/css/icons.css')}}" />
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ URL::to('backend/css/app.css')}}" />
    <link rel="stylesheet" href="{{ URL::to('backend/css/dark-sidebar.css')}}" />
    <link rel="stylesheet" href="{{ URL::to('backend/css/dark-theme.css')}}" />
    <link rel="stylesheet" href="{{ URL::to('backend/css/tagsinput.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.4/axios.min.js"></script>

</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <!--sidebar-wrapper-->
        @include('admin.includes.sidebar')
        <!--end sidebar-wrapper-->
        <!--header-->
        @include('admin.includes.header')
        <!--end header-->
        <!--page-wrapper-->
        @yield('content')
        <!--end page-wrapper-->
        <!--start overlay-->
        <div class="overlay toggle-btn-mobile"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <!--footer -->
        <div class="footer">
            <p class="mb-0">Shop D.ark @2020 | Prod By : <a href="https://themeforest.net/user/codervent"
                    target="_blank">ZuiZui</a>
            </p>
        </div>
        <!-- end footer -->
    </div>
    <!-- end wrapper -->
    <!--start switcher-->
    <div class="switcher-wrapper">
        <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
        </div>
        <div class="switcher-body">
            <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
            <hr />
            <h6 class="mb-0">Theme Styles</h6>
            <hr />
            <div class="d-flex align-items-center justify-content-between">
                <div class="custom-control custom-radio">
                    <input type="radio" id="darkmode" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label" for="darkmode">Dark Mode</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="lightmode" name="customRadio" checked class="custom-control-input">
                    <label class="custom-control-label" for="lightmode">Light Mode</label>
                </div>
            </div>
            <hr />
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="DarkSidebar">
                <label class="custom-control-label" for="DarkSidebar">Dark Sidebar</label>
            </div>
            <hr />
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="ColorLessIcons">
                <label class="custom-control-label" for="ColorLessIcons">Color Less Icons</label>
            </div>
        </div>
    </div>
    <!--end switcher-->


    <!-- JavaScript -->
    <script src="{{ URL::to('backend/js/jquery.min.js')}}"></script>
    <script src="{{ URL::to('backend/js/popper.min.js')}}"></script>
    <script src="{{ URL::to('backend/js/bootstrap.min.js')}}"></script>

    <!--plugins-->
    <script src="{{ URL::to('backend/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{ URL::to('backend/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{ URL::to('backend/plugins/Ckeditor/ckeditor.js')}}"></script>
    <script src="{{ URL::to('backend/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <script src="{{ URL::to('backend/js/tagsinput.js') }}"></script>
    <script src="{{ URL::to('backend/js/bs-custom-file-input.min.js')}}"></script>



    <script src="Backend/js/index.js"></script>



    <script src="{{ URL::to('backend/js/index.js') }}"></script>
    <script src="{{ URL::to('backend/js/headers.js') }}"></script>

    <script src="{{ URL::to('backend/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script>
    $(document).ready(function() {
        //Default data table
        $('#example').DataTable();
        var table = $('#example2').DataTable({
            lengthChange: true,
            order: [
                [1, 'asc']
            ],
            // bSort: false,
            buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
        });
        table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
    </script>


    <script>
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
    </script>

    <!-- App JS -->
    <script src="{{ URL::to('backend/js/app.js')}}"></script>
    <script src="{{ URL::to('backend/plugins/select2/select2.min.js') }}"></script>

    @stack('script')

</body>


<!-- Mirrored from codervent.com/syndash/demo/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Sep 2021 04:23:21 GMT -->

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('backend/img/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::to('backend/css/bootstrap.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ URL::to('backend/css/font-awesome.min.css') }}">
    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{ URL::to('backend/css/line-awesome.min.css') }}">
    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{ URL::to('backend/css/dataTables.bootstrap4.min.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ URL::to('backend/css/style.css') }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ URL::to('backend/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
    <!-- Change -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}">
    <link href="{{ asset('fancybox/dist/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/css/select2.min.css') }}">
    <link rel="stylesheet" media="screen" href="{{ asset('frontend/css/toastr.min.css') }}">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link href="{{ asset('fancybox/dist/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('backend/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}">
    @livewireStyles
</head>

<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        @include('admin.inc.header')
        @include('admin.inc.sidebar')

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            @yield('content')

        </div>
        <!-- /Page Wrapper -->

    </div>
    <input type="hidden" name="__dir" id="__dir" value="{{ URL::to('/') }}">
    <!-- /Main Wrapper -->
    <!-- jQuery -->
    <script src="{{ URL::to('backend/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('fancybox/dist/jquery.fancybox.min.js') }}"></script>
    <!-- Bootstrap Core JS -->
    <script src="{{ URL::to('backend/js/popper.min.js') }}"></script>
    <script src="{{ URL::to('backend/js/bootstrap.min.js') }}"></script>
    <!-- Slimscroll JS -->
    <script src="{{ URL::to('backend/js/jquery.slimscroll.min.js') }}"></script>
    <!-- Datatable JS -->
    <script src="{{ URL::to('backend/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::to('backend/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.17.0/standard/ckeditor.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js">
    </script>
    <script script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js">
    </script>
    <script src="{{ URL::to('backend/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}">
    </script>
    <!-- Commit change -->
    <script src="{{ asset('backend/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('backend/js/fancybox.js') }}"></script>
    <script src="{{ asset('fancybox/dist/jquery.fancybox.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="{{ asset('frontend/js/toastr.min.js') }}"></script>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend/js/select2.min.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ URL::to('backend/js/app.js') }}"></script>
    {!! Toastr::message() !!}
    @include('sweetalert::alert')
    <script>
        window.addEventListener('OpenEditFeedbackModal', e => {

            $('#EditFeedbackModal').modal('show')
        })

        window.addEventListener('OpenStoreFeedbackModal', e => {

            $('#StoreFeedbackModal').modal('show')
        })

        window.addEventListener('reload', e => {
            location.reload();
        })

        window.addEventListener('CloseModal', e => {
            $('#' + e.detail.nameModal).modal('hide')
        })
    </script>

    <script>
        function feedback(id, parent_id) {
            window.livewire.emit('feedback', id, parent_id)
        }

        function editFeedback(id) {
            window.livewire.emit('editFeedback', id)
        }
    </script>
    @livewireScripts
    @stack('script')
</body>

</html>

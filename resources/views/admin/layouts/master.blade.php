<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <meta name="description" content="Smarthr - Bootstrap Admin Template">
  <title>Dashboard - @yield('title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('backend/img/favicon.png') }}">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ URL::to('backend/css/bootstrap.min.css') }}">
  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="{{ URL::to('backend/css/font-awesome.min.css') }}">
  <!-- Lineawesome CSS -->
  <link rel="stylesheet" href="{{ URL::to('backend/css/line-awesome.min.css') }}">
  <!-- Main CSS -->
  <link rel="stylesheet" href="{{ URL::to('backend/css/style.css') }}">
  <!-- Datatable CSS -->
  <link rel="stylesheet" href="{{ URL::to('Backend/css/dataTables.bootstrap4.css') }}">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <link rel="stylesheet"
        href="{{ URL::to('backend/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
  <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('Backend/plugins/daterangepicker/daterangepicker.css') }}">
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

    @include('admin.Modal.fileManagerModal')
    @include('admin.Modal.multipleFileManagerModal')
    <!-- /Page Wrapper -->

  </div>
  <!-- /Main Wrapper -->
  <!-- jQuery -->
  <script src="{{ URL::to('backend/js/jquery-3.5.1.min.js') }}"></script>
  <!-- Bootstrap Core JS -->
  <script src="{{ URL::to('backend/js/popper.min.js') }}"></script>
  <script src="{{ URL::to('backend/js/bootstrap.min.js') }}"></script>
  <!-- Slimscroll JS -->
  <script src="{{ URL::to('backend/js/jquery.slimscroll.min.js') }}"></script>
  <!-- Custom JS -->
  <script src="{{ URL::to('backend/js/app.js') }}"></script>
  <!-- Datatable JS -->
  <script src="{{ URL::to('Backend/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ URL::to('Backend/js/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js">
  </script>
  <script script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js">
  </script>
  <script src="{{ URL::to('backend/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="{{ asset('Backend/plugins/daterangepicker/moment.min.js') }}"></script>
  <script src="{{ asset('Backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
  @stack('script')
</body>

</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <meta name="csrf-token" content="{{csrf_token()}}">

        <title>@yield('title')</title>

        <!-- Custom fonts for this template-->
        <link href="{{url('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{url('template/css/fontNunito.css')}}" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{url('template/css/sb-admin-2.min.css')}}" rel="stylesheet">

        <!-- Bootstrap core JavaScript-->
        <script src="{{url('template/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{url('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{url('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{url('template/js/sb-admin-2.min.js')}}"></script>

        <script src="{{url('js/sweetalert2@9.js')}}"></script>

        <!-- self made script -->
        <script src="{{url('js/script.js')}}"></script>

        @yield('css')
    </head>  
    @yield('content')
</html>
<!DOCTYPE html>
<html lang="en">
<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

  <meta name="csrf-token" content="{{ csrf_token() }}" />
  
  <title>@yield('title')</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('dashboard/assets/css/app.min.css') }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('dashboard/assets/css/style.css')}}">
  {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
  <link rel="stylesheet" href="{{ asset('dashboard/assets/css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset('dashboard/assets/css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href='{{ asset('dashboard/assets/img/favicon.ico')}}' />
  

  
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
  <script src="{{ asset("bootstrap/js/bootstrap.js") }}"></script>

</head>
<body>

    <div class="loader"></div>
    <div id="app">
    <div class="main-wrapper main-wrapper-1">
    <div class="navbar-bg"></div>
    @include('dashboard.inc.nav')
    @yield('content')
    <footer class="main-footer">
      <div class="footer-left">
        <a href="">Chapakazi</a></a>
      </div>
      <div class="footer-right">
      </div>
    </footer>
  <!-- General JS Scripts -->
  <script src="{{ asset('dashboard/assets/js/app.min.js') }}"></script>
  <!-- JS Libraies -->
  <script src="{{ asset('dashboard/assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
  <!-- Page Specific JS File -->
  <script src="{{ asset('dashboard/assets/js/page/index.js') }}"></script>
  <!-- Template JS File -->
  <script src="{{ asset('dashboard/assets/js/scripts.js') }}"></script>
  <!-- Custom JS File -->
  <script src="{{ asset('dashboard/assets/js/custom.js') }}"></script>

  <script src="{{ asset('dashboard/assets/bundles/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
</body>
<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>
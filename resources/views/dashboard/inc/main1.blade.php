<!DOCTYPE html>
<html lang="en">
<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ secure_asset('dashboard/assets/css/app.min.css') }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ secure_asset('dashboard/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ secure_asset('dashboard/assets/css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ secure_asset('dashboard/assets/css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href='{{ secure_asset('dashboard/assets/img/favicon.ico')}}' />
</head>
<body>

    <div class="loader"></div>
    <div id="app">
    <div class="main-wrapper main-wrapper-1">
    <div class="navbar-bg"></div>
    @include('dashboard.inc.nav1')
    @yield('content')
    <footer class="main-footer">
      <div class="footer-left">
        <a href="">chapakazi.com</a></a>
      </div>
      <div class="footer-right">
      </div>
    </footer>
  <!-- General JS Scripts -->
  <script src="{{ secure_asset('dashboard/assets/js/app.min.js') }}"></script>
  <!-- JS Libraies -->
  <script src="{{ secure_asset('dashboard/assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
  <!-- Page Specific JS File -->
  <script src="{{ secure_asset('dashboard/assets/js/page/index.js') }}"></script>
  <!-- Template JS File -->
  <script src="{{ secure_asset('dashboard/assets/js/scripts.js') }}"></script>
  <!-- Custom JS File -->
  <script src="{{ secure_asset('dashboard/assets/js/custom.js') }}"></script>
</body>
<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>
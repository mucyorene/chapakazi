<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Capakazi</title>

  <!-- Bootstrap -->
  <link href="{{ secure_asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ secure_asset('assets/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ secure_asset('css/animate.css') }}">
  <link href="{{ secure_asset('css/prettyPhoto.css')}}" rel="stylesheet">
  <link href="{{ secure_asset('css/style.css')}}" rel="stylesheet" />
  {{-- <link rel="stylesheet" href="{{ secure_asset('assets/vendor/css/style.css') }}"> --}}

  
<link rel="stylesheet" href="{{ secure_asset('bootstrap/css/bootstrap.css') }}">
<script src="{{ secure_asset("bootstrap/js/bootstrap.js") }}"></script>

</head>

<body>
  @include('inc.homeNav')
  @yield('content')
  @include('inc.footer')

  
<!-- Button trigger modal -->


  <!-- Button trigger modal -->
  <!-- Modal -->


</body>
</html>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="{{ secure_asset('js/jquery-2.1.1.min.js') }}"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{ secure_asset('js/bootstrap.min.js')}}"></script>
  <script src="{{ secure_asset('js/jquery.prettyPhoto.js') }}"></script>
  <script src="{{ secure_asset('js/jquery.isotope.min.js') }}"></script>
  <script src="{{ secure_asset('js/wow.min.js')}}"></script>
  <script src="{{ secure_asset('js/functions.js') }}"></script>
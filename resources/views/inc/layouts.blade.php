<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Capakazi</title>

  <!-- Bootstrap -->
  <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
  <link href="{{ asset('css/prettyPhoto.css')}}" rel="stylesheet">
  <link href="{{ asset('css/style.css')}}" rel="stylesheet" />
  {{-- <link rel="stylesheet" href="{{ asset('assets/vendor/css/style.css') }}"> --}}

  
<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
<script src="{{ asset("bootstrap/js/bootstrap.js") }}"></script>

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
  <script src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{ asset('js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
  <script src="{{ asset('js/jquery.isotope.min.js') }}"></script>
  <script src="{{ asset('js/wow.min.js')}}"></script>
  <script src="{{ asset('js/functions.js') }}"></script>
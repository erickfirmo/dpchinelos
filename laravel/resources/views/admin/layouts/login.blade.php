<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>DP Chinelos | Admin</title>

  <link rel="stylesheet" href="{{ asset('vendor/adminlte/libs/bootstrap/dist/css/bootstrap.css') }}">

  
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/login/style.css') }}">
</head>

<body>

@yield('content')

    

<script src="{{ asset('vendor/adminlte/login/main.js') }}"></script>

    
</body>
</html>
    
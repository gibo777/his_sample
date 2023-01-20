<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('img/company/logo-favicon.png') }}">

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('/fontawesome/css/fonts-bunny.css') }}"> --}}
    {{-- <link rel='stylesheet' href="{{ asset('/css/boxicons.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('/fontawesome/boxicons/css/animation.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/fontawesome/boxicons/css/boxicons.css') }}">
    <link rel="stylesheet" href="{{ asset('/fontawesome/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/fontawesome/boxicons/css/transformations.css') }}">


    <link rel="stylesheet" href="{{ asset('/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/toastr.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-cust.css') }}" type="text/css">
    
    @livewireStyles

    @livewireScripts

    <script src="{{ asset('/js/plugins/sweetalert.js') }}"></script> 
    <script src="{{ asset('/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/js/jquery-3.6.1.js') }}"></script>
    
    
    <script src="{{ asset('/js/toastr_jquery.min.js') }}"></script>
    <script src="{{ asset('/js/toastr.min.js') }}"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
    <script src="{{ asset('/js/passwordShowHide.js') }}"></script>
    <script src="{{ asset('/js/loginValidator.js') }}"></script>
    <script src="{{ asset('/js/registerValidator.js') }}"></script>
    <script src="{{ asset('/js/modal.js') }}"></script>


    <script src="{{ asset('/js/passValidation.js') }}"></script>
    <script src="{{ asset('/js/scripts.js') }}"></script>
    {{-- <script src="{{ asset('/js/jquery.backstretch.js') }}"></script>
    <script src="{{ asset('/js/jquery.backstretch.min.js') }}"></script> --}}

   {{-- Added by CPN START--}}
    <script src="{{ asset('/js/authNotifs/sendPasswordResetEmail.js') }}"></script>
    <script src="{{ asset('/js/authNotifs/resetsPassword.js') }}"></script>
    <script src="{{ asset('/js/authNotifs/createPassword.js') }}"></script>
   {{-- Added by CPN END--}}


  <!--<title> Drop Down Sidebar Menu | CodingLab </title>-->
  {{-- <link rel="stylesheet" href="dropdown-scroll.css"> --}}
  <!-- Boxiocns CDN Link -->

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="">
  {!! Toastr::message() !!}
    <div id="app">
      <!--This blades are for guests-->
        @guest
        
        <main class="d-flex py-4 align-middle">
            @yield('content')
        </main>
        @else
        <main class="d-flex py-4 align-middle">
            @yield('content')
        </main>
        
        @endguest


  </div>
  
</body>
</html>

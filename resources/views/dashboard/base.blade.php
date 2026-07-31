<!DOCTYPE html>
<html lang="es">
  <head>
    <meta name="app-url" content="{{ url('/') }}">
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Sistema y Gestion de turnos">
    <meta name="author" content="PRONET SI">
    <meta name="keyword" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Sistema de turnos - SGT</title>
    <link rel="icon" href="assets/favicon/SGT_Icono.ico" type="image/x-icon">
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/SGT_Icono.ico">
    <meta name="theme-color" content="#ffffff">
    <!-- Icons-->
    <link href="{{ asset('css/free.min.css') }}" rel="stylesheet"> <!-- icons -->
    <link href="{{ asset('css/brand.min.css') }}" rel="stylesheet"> <!-- icons -->
    <link href="{{ asset('css/flag.min.css') }}" rel="stylesheet"> <!-- icons -->
    <!-- Main styles for this application-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/coreui-chartjs.css') }}" rel="stylesheet">

    @yield('css')

    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>

    <link href="{{ asset('css/coreui-chartjs.css') }}" rel="stylesheet">
  </head>

  <body class="c-app">
    <div id="app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
      
      
        <!-- Maneja el sidebar-->
        @include('dashboard.shared.nav-builder')

        @include('dashboard.shared.header')

        <div class="c-body">

          <!--<main class="c-main">-->

            @yield('content') 

          <!--</main>-->
          @include('dashboard.shared.footer')
        </div>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('js/coreui-utils.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('js/Chart.min.js') }}"></script>


    <script src="{{ asset('js/app.js') }}"></script>

  </body>
</html>

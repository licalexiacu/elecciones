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
    
    <title>Gestion de Datos Electorales</title>
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

    <style>
      /* Override de colores para igualar paleta corporativa SGA */
      .c-sidebar {
          background: linear-gradient(180deg, #1e3c72 0%, #2a5298 100%) !important;
          box-shadow: 4px 0 10px rgba(0,0,0,0.15) !important;
          border: none !important;
      }
      .c-sidebar-brand {
          background-color: rgba(0, 0, 0, 0.15) !important;
          border-bottom: 1px solid rgba(255,255,255,0.05) !important;
      }
      .c-sidebar-nav-link, 
      .c-sidebar-nav-dropdown-toggle,
      .c-sidebar-nav-title {
          color: rgba(255, 255, 255, 0.85) !important;
      }
      .c-sidebar-nav-icon {
          color: #ffffff !important;
          opacity: 0.9;
      }
      .c-sidebar-nav-link:hover, 
      .c-sidebar-nav-dropdown-toggle:hover {
          background-color: rgba(255, 255, 255, 0.15) !important;
          color: #ffffff !important;
      }
      .c-sidebar-nav-link.c-active {
          background-color: rgba(255, 255, 255, 0.25) !important;
          color: #ffffff !important;
          border-left: 4px solid #ffffff !important;
      }
      .c-sidebar-minimizer {
          background-color: rgba(0, 0, 0, 0.2) !important;
          border-top: 1px solid rgba(255,255,255,0.1) !important;
      }
    </style>

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
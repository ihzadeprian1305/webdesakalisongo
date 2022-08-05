<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemerintah Desa Kalisongo</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&amp;display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&amp;display=swap" media="print" onload="this.media='all'"/>
    <noscript>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&amp;display=swap"/>
    </noscript>
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/bootstrap.min.css?ver=1.2.0') }}" rel="stylesheet">
    <link href="{{ asset('user/css/bootstrap.css?ver=1.2.0') }}" rel="stylesheet">
    <link href="{{ asset('user/css/font-awesome/css/all.min.css?ver=1.2.0') }}" rel="stylesheet">
    <link href="{{ asset('user/css/aos.css?ver=1.2.0') }}" rel="stylesheet">
    <link href="{{ asset('user/css/ekko-lightbox.css?ver=1.2.0') }}" rel="stylesheet">
    <link href="{{ asset('user/css/main.css?ver=1.2.0') }}" rel="stylesheet">
    <noscript>
      <style type="text/css">
        [data-aos] {
            opacity: 1 !important;
            transform: translate(0) scale(1) !important;
        }
      </style>
    </noscript>
  </head>
  <body id="top">
    @yield('header')
    @yield('main-content')
    @yield('footer')
    <script src="{{ asset('user/scripts/script.js') }}"></script>
    <script src="{{ asset('user/scripts/jquery.min.js?ver=1.2.0') }}"></script>
    <script src="{{ asset('user/scripts/bootstrap.bundle.min.js?ver=1.2.0') }}"></script>
    <script src="{{ asset('user/scripts/aos.js?ver=1.2.0') }}"></script>
    <script src="{{ asset('user/scripts/ekko-lightbox.min.js?ver=1.2.0') }}"></script>
    <script src="{{ asset('user/scripts/main.js?ver=1.2.0') }}"></script>
  </body>
</html>
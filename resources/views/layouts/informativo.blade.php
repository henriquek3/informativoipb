<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta name="description"
          content="InformativoIPB é um micro S.A.D. desenvolvido para Igreja Presbiteriana do Brasil">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@jksistemas">
    <meta property="twitter:creator" content="@jksistemas">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="InformativoIPB">
    <meta property="og:title" content="InformativoIPB - Controle de Estatísticas da Igreja Presbiteriana do Brasil">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description"
          content="InformativoIPB é um micro S.A.D. desenvolvido para Igreja Presbiteriana do Brasil">
    <style>
        .envelope {
            cursor: pointer;
        }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('images/favicon.ico')}}">
    <!-- The javascript plugin to display page loading on top -->
    <script src="{{asset('js/app/pace-app.js')}}"></script>
    <title>InformativoIPB</title>
    <!-- Main CSS -->
@include('includes.head')
<!-- CSS specific pages -->
    @yield('css')
</head>
<body>
<!-- Navbar-->
@include('includes.header')

<!-- Sidebar menu-->
@include('includes.sidebar')

<main class="pusher">
    <!-- Header Mobile-->
    @include('includes.header-mobile')

    <div class="ui container" style="margin-top: 100px; margin-bottom: 20px; display:none;" id="windows">
        @yield('content')
    </div>
</main>

<!-- Essential javascripts for application to work-->
@include('includes.javascript')

<!-- Page specific javascripts-->
@yield('javascript')

</body>
</html>
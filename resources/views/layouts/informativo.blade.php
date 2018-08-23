<!DOCTYPE html>
<html lang="pt-BR">
<head>
@include('includes.head')
    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.min.css')}}">
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
        @include('pages.components.messages-crud')
        @yield('content')
    </div>
</main>

<!-- Essential javascripts for application to work-->
@include('includes.javascript')

<!-- Page specific javascripts-->
@yield('javascript')

</body>
</html>
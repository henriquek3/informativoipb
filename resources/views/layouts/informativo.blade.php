<!DOCTYPE html>
<html lang="pt-BR">
<head>
@include('includes.head')
    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.min.css')}}">
    <style>
        #windows {
            min-height: 768px;
        }

        .ui.footer.segment {
            bottom: 0;
            width: 100%;
            margin: 1em 0em 0em;
            padding: 0.5em 0em;
        }

        @media only screen and (min-height: 900px) {
            #windows {
                min-height: 886px;
            }
        }

        @media only screen and (min-height: 1124px) {
            #windows {
                min-height: 1000px;
            }
        }

        @media only screen and (min-height: 1200px) {
            #windows {
                min-height: 1139px;
            }
        }
    </style>

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
        @include('pages.components.messages')
        @yield('content')
    </div>
    <div class="ui inverted vertical footer segment">
        <div class="ui center aligned container">
            <div class="ui horizontal inverted small divided link list">
                <a class="item" href="/">Inicio</a>
                <a class="item" href="/cadastros/igrejas/{{auth()->user()->id_igreja}}/editar">Minha Igreja</a>
                <a class="item" href="/configuracoes/usuarios/{{auth()->user()->id_igreja}}/editar">Meu Usuário</a>
                <a class="item" href="#">Ajuda</a>
            </div>
        </div>
    </div>
</main>

<!-- Essential javascripts for application to work-->
@include('includes.javascript')

<!-- Page specific javascripts-->
@yield('javascript')
</body>
</html>
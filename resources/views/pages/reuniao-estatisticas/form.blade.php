@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <h1>Reunião Estatisticas</h1>
@endsection
@section('javascript')
    <script src="{{asset('js/app/cadastros-presbiteros.js')}}"></script>
    @if(isset($resource))
        <script type="text/javascript" async>
            try {
                window.addEventListener("load", function () {


                })
            } catch (e) {
                alert('As informações não puderam ser carregadas, por favor entre em contato com o suporte.');
            }
        </script>
    @endif
@endsection
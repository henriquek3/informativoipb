@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <div class="ui clearing"></div>
    <div class="ui raised segment">
        <h3 class="ui floated header" style="padding-top: 6px;padding-left: 10px;"><i class="bar chart icon"></i>
        </h3>
        <h1 class="ui floated header " style="margin-left: -10px;">Consulta Relatórios de Conselhos
            <div class="sub header" style="margin-left: -40px;">Visualize todos os relatórios do conselho que estão
                cadastrados.
            </div>
        </h1>
        <div class="ui clearing divider"></div>
        <p></p>
        <form id="formDelete" name="formDelete" action="{{ url()->current() }}" method="post">
            @csrf @method("delete")
        </form>
        <form id="formResource" name="formResource" action="{{ url()->current() }}"
              method="post">@csrf @isset($resource) @method('put') @endisset

            @includeWhen(auth()->user()->perfil >= 4, 'pages.consulta-conselho.supremo')
            @includeWhen(auth()->user()->perfil == 3, 'pages.consulta-conselho.sinodo')
            @includeWhen(auth()->user()->perfil == 2, 'pages.consulta-conselho.presbiterio')
            @includeWhen(auth()->user()->perfil == 1, 'pages.consulta-conselho.igreja')

            <div class="ui clearing divider"></div>
            <div style="text-align: center">
                <button class="ui green labeled icon button" type="submit"><i class="search icon"></i>Pesquisar</button>
            </div>
        </form>
    </div>
    @isset($resource) @includeWhen($resource == "",'pages.consulta-conselho.conselho-segment') @endisset

@endsection
@section('javascript')
    @if(auth()->user()->perfil == 1)
        <script src="{{asset('js/app/consulta-conselho-igrejas.js')}}"></script>
    @elseif(auth()->user()->perfil == 2)
        <script src="{{asset('js/app/consulta-conselho-presbiterio.js')}}"></script>
    @elseif(auth()->user()->perfil == 3)
        <script src="{{asset('js/app/consulta-conselho-sinodo.js')}}"></script>
    @elseif(auth()->user()->perfil >= 4)
        <script src="{{asset('js/app/consulta-conselho-supremo.js')}}"></script>
    @endif
@endsection

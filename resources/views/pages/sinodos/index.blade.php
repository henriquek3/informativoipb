@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <div class="ui clearing"></div>
    <div class="ui raised segment">
        <a class="ui right floated green tiny button" href="/cadastros/sinodos/novo"><i
                    class="plus icon"></i>Novo</a>
        <h3 class="ui floated header" style="padding-top: 6px;padding-left: 10px;"><i class="edit outline icon"></i>
        </h3>
        <h1 class="ui floated header" style="margin-left: -10px;">Cadastro de Sínodos
            <div class="sub header" style="margin-left: -40px;">Visualize todos os sínodos que estão cadastrados.
            </div>
        </h1>
        <div class="ui clearing divider"></div>
        <p></p>

        <!-- Pesquisar Recurso -->
        <div class="ui search" title="Digite o nome do sínodo">
            <div class="ui fluid right icon input">
                <input class="prompt" type="text" placeholder="Pesquisar...">
                <i class="search icon"></i>
            </div>
        </div>

        <table class="ui celled unstackable sortable green table">
            <thead>
            <tr>
                <th class="ten wide">Nome</th>
                <th class="two wide center aligned">Sigla</th>
                <th class="two wide center aligned">Região</th>
                <th class="one wide center aligned">Editar</th>
            </tr>
            </thead>
            <tbody>@forelse($resources as $sinodo)
                <tr>
                    <td>{{ $sinodo->nome }}</td>
                    <td>{{ $sinodo->sigla }}</td>
                    <td>{{ $sinodo->nome_regiao()}}</td>
                    <td class="center aligned" title="Editar Sínodo"><a class="ui icon primary button"
                                                                        href="/cadastros/sinodos/{{$sinodo->id}}/editar"><i
                                    class="pencil alternate icon"></i></a></td>
                </tr>@empty
                <tr>
                    <td colspan="4">Nenhum registro encontrado.</td>
                </tr>@endforelse
            </tbody>
            <tfoot>
            <tr>
                <th colspan="4">
                    <div class="ui right floated pagination menu">{{ $resources->links('pagination::semantic-ui') }}</div>
                </th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
@section('javascript')
    <script src="{{asset('js/app/pesquisar-sinodo.js')}}"></script>
    <script>
        window.addEventListener("load", function () {
            $('table').tablesort();
        })
    </script>
@endsection
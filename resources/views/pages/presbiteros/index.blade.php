@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <div class="ui clearing"></div>
    <div class="ui raised segment">
        <a class="ui right floated green tiny button" href="/cadastros/ministros/novo">
            <i class="plus icon"></i>Novo
        </a>
        <h3 class="ui floated header" style="padding-top: 6px;padding-left: 10px;"><i class="edit outline icon"></i>
        </h3>
        <h1 class="ui floated header" style="margin-left: -10px;">Cadastro de Ministros
            <div class="sub header" style="margin-left: -40px;">Visualize todos os ministros que estão cadastrados.
            </div>
        </h1>
        <div class="ui clearing divider"></div>
        <p></p>

        <!-- Pesquisar Recurso -->
        <div class="ui search" title="Digite o nome do presbítero">
            <div class="ui fluid right icon input">
                <input class="prompt" type="text" placeholder="Pesquisar...">
                <i class="search icon"></i>
            </div>
        </div>

        <table class="ui celled unstackable sortable green table">
            <thead>
            <tr>
                <th class="six wide">Nome</th>
                <th class="five wide">Igreja</th>
                <th class="two wide center aligned">Presbitério</th>
                <th class="two wide center aligned">Sínodo</th>
                <th class="one wide center aligned">Editar</th>
            </tr>
            </thead>
            <tbody>
            @forelse($resources as $rs)
                <tr>
                    <td>{{ $rs->nome }}</td>
                    <td>{{ $rs->igreja->nome }}</td>
                    <td>{{ strtoupper($rs->igreja->presbiterio->sigla) }}</td>
                    <td>{{ strtoupper($rs->igreja->presbiterio->sinodo->sigla) }}</td>
                    <td class="center aligned" title="Editar Ministro">
                        <a class="ui icon primary button" href="/cadastros/ministros/{{$rs->id}}/editar">
                            <i class="pencil alternate icon"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhum registro encontrado.</td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <th colspan="5">
                    <div class="ui right floated pagination menu">{{ $resources->links('pagination::semantic-ui') }}</div>
                </th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
@section('javascript')
    <script src="{{asset('js/app/pesquisar-presbitero.js')}}"></script>
    <script>
        window.addEventListener("load", function () {
            $('table').tablesort();
        })
    </script>
@endsection
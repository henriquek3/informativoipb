@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <div class="ui clearing"></div>
    <div class="ui raised segment">
        <a class="ui right floated green tiny button" href="/configuracoes/usuarios/novo"><i
                    class="plus icon"></i>Novo</a>
        <h3 class="ui floated header" style="padding-top: 6px;padding-left: 10px;"><i class="edit outline icon"></i>
        </h3>
        <h1 class="ui floated header" style="margin-left: -10px;">Cadastro de Usuários
            <div class="sub header" style="margin-left: -40px;">Visualize todos os usuários que estão cadastrados.</div>
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
                <th class="six wide">Nome</th>
                <th class="one wide">E-Mail</th>
                <th class="one wide">Igreja</th>
                <th class="one wide">Presbitério</th>
                <th class="one wide">Sínodo</th>
                <th class="one wide">Perfil</th>
                <th class="one wide">Nível</th>
                <th class="one wide" style="text-align: center;"
                    data-tooltip="Representa se o usuário esta Ativo ou Inativo">Status
                </th>
                <th class="one wide center aligned">Editar</th>
            </tr>
            </thead>
            <tbody>
            @forelse($resources as $rs)
                <tr>
                    <td>{{ $rs->nome }}</td>
                    <td>{{ $rs->email }}</td>
                    <td>{{ $rs->presbitero ? $rs->presbitero->igreja->nome : '--'}}</td>
                    <td>{{ $rs->presbitero ? $rs->presbitero->igreja->presbiterio->sigla : '--'}}</td>
                    <td>{{ $rs->presbitero ? $rs->presbitero->igreja->presbiterio->sinodo->sigla : '--'}}</td>
                    <td>{{ $rs->usuario_nivel }}</td>
                    <td>{{ $rs->usuario_perfil }}</td>
                    <td>{{ $rs->usuario_status }}</td>
                    <td class="center aligned" title="Editar Usuário">
                        <a class="ui icon primary button" href="/configuracoes/usuarios/{{$rs->id}}/editar">
                            <i class="pencil alternate icon"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">Nenhum registro encontrado.</td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <th colspan="9">
                    <div class="ui right floated pagination menu">{{ $resources->links('pagination::semantic-ui') }}</div>
                </th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
@section('javascript')
    <script src="{{asset('js/app/pesquisar-sinodo.js')}}"></script>
    <script>window.addEventListener("load", function () {
            $('table').tablesort();
        })</script>
@endsection
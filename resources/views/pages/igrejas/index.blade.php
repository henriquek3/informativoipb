@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <div class="ui clearing"></div>
    <div class="ui raised segment">
        <a class="ui right floated green tiny button" href="/cadastros/igrejas/novo">
            <i class="plus icon"></i>Novo
        </a>
        <h3 class="ui floated header" style="padding-top: 6px;padding-left: 10px;"><i class="edit outline icon"></i>
        </h3>
        <h1 class="ui floated header" style="margin-left: -10px;">Cadastro de Igrejas
            <div class="sub header" style="margin-left: -40px;">Visualize todos os igrejas que estão
                cadastrados.
            </div>
        </h1>
        <div class="ui clearing divider"></div>
        <p></p>
        <table class="ui compact selectable celled green unstackable sortable table">
            <thead>
            <tr>
                <th class="ten wide">Nome</th>
                <th class="two wide center aligned">Presbitério</th>
                <th class="two wide center aligned">Sínodo</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse($resources as $rs)
                <tr>
                    <td>{{ $rs->nome }}</td>
                    <td>{{ $rs->presbiterio->nome }}</td>
                    <td>{{ $rs->presbiterio->sinodo->nome }}</td>
                    <td class="center aligned" title="Editar Sínodo">
                        <a class="ui icon primary button" href="/cadastros/igrejas/{{$rs->id}}/editar">
                            <i class="pencil alternate icon"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhum registro encontrado.</td>
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
    <script type="text/javascript">$('table').tablesort();</script>
@endsection
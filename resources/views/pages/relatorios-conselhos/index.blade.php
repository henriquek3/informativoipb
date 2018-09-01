@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <div class="ui clearing"></div>
    <div class="ui raised segment">
        <a class="ui right floated green tiny button" href="/relatorios/conselho/novo"><i
                    class="plus icon"></i>Novo</a>
        <h3 class="ui floated header" style="padding-top: 6px;padding-left: 10px;"><i class="edit outline icon"></i>
        </h3>
        <h1 class="ui floated header" style="margin-left: -10px;">Relatório do Conselho
            <div class="sub header" style="margin-left: -40px;">Visualize todos os relatórios cadastrados.
            </div>
        </h1>
        <div class="ui clearing divider"></div>
        <p></p>
        <table class="ui celled unstackable sortable red table">
            <thead>
            <tr>
                <th class="five wide">Tipo Relatório</th>
                <th class="three wide center aligned">Data Inclusão</th>
                <th class="three wide center aligned">Ultima Alteração</th>
                <th class="two wide center aligned">Status</th>
                <th class="two wide center aligned">Ano</th>
                <th class="one wide">Editar</th>
            </tr>
            </thead>
            <tbody>@forelse($resources as $rs)
                <tr>
                    <td>{{ $rs->tipo_relatorio }}</td>
                    <td>{{ $rs->created_at }}</td>
                    <td>{{ $rs->updated_at }}</td>
                    <td>{{ $rs->status_relatorio }}</td>
                    <td>{{ $rs->ano }}</td>
                    <td class="center aligned" title="Editar Relatório"><a class="ui icon primary button"
                                                                        href="/relatorios/conselho/{{$rs->id}}/editar"><i
                                    class="pencil alternate icon"></i></a></td>
                </tr>@empty
                <tr>
                    <td colspan="6">Nenhum registro encontrado.</td>
                </tr>@endforelse
            </tbody>
            <tfoot>
            <tr>
                <th colspan="6">
                    <div class="ui right floated pagination menu">{{ $resources->links('pagination::semantic-ui') }}</div>
                </th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
@section('javascript')

@endsection
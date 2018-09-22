@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <div class="ui clearing"></div>
    <div class="ui raised segment">
        <a class="ui right floated green tiny button" href="/reunioes/presbiterio/novo">
            <i class="plus icon"></i>Novo</a>
        <h3 class="ui floated header" style="padding-top: 6px;padding-left: 10px;"><i class="edit outline icon"></i>
        </h3>
        <h1 class="ui floated header" style="margin-left: -10px;">Reuniões do Presbitério
            <div class="sub header" style="margin-left: -40px;">Utilizado para apresentar o resultado de todos os
                relatórios do presbitério.
            </div>
        </h1>
        <div class="ui clearing divider"></div>
        <p></p>
        <table class="ui compact selectable celled green unstackable sortable table">
            <thead>
            <tr>
                <th class="ten wide">Presbitério</th>
                <th class="one wide center aligned">Sigla</th>
                <th class="one wide center aligned">Sínodo</th>
                <th class="one wide center aligned">Ano</th>
                <th class="two wide center aligned">Data Reunião</th>
                <th class="two wide center aligned">Editar</th>

            </tr>
            </thead>
            <tbody>
            @forelse($resources as $rs)
                <tr>
                    <td>{{ $rs->presbiterio->nome }}</td>
                    <td class="center aligned">{{ strtoupper($rs->presbiterio->sigla) }}</td>
                    <td class="center aligned">{{ strtoupper($rs->presbiterio->sinodo->sigla) }}</td>
                    <td class="center aligned">{{ $rs->ano }}</td>
                    <td class="center aligned">{{ $rs->data_reuniao->format('d/m/Y') }}</td>
                    <td class="center aligned" title="Editar">
                        <a class="ui icon primary button" href="/reunioes/presbiterio/{{$rs->id}}/editar">
                            <i class="pencil alternate icon"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Nenhum registro encontrado.</td>
                </tr>
            @endforelse
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
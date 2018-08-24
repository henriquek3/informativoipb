<div class="ui segment">
    <a class="ui right floated green tiny button" href="/cadastros/igrejas/{{$resource->id}}/congregacoes/novo">
        <i class="plus icon"></i>Novo
    </a>
    <h1 class="ui floated header">Congregações
        <div class="sub header">Visualize todas as congregações que pertencem a esta
            igreja.
        </div>
    </h1>
    <div class="ui clearing divider"></div>
    <p></p>
    <table class="ui compact selectable celled green unstackable sortable table">
        <thead>
        <tr>
            <th class="ten wide">Nome</th>
            <th class="one wide"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($congregacoes as $rs)
            <tr>
                <td>{{ $rs->nome }}</td>
                <td class="center aligned" title="Editar Sínodo">
                    <a class="ui icon primary button" href="/cadastros/congregacoes/{{$rs->id}}/editar">
                        <i class="pencil alternate icon"></i>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2">Nenhum registro encontrado.</td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
        <tr>
            <th colspan="2">
                <div class="ui right floated pagination menu"> {{$congregacoes->links('pagination::semantic-ui')}} </div>
            </th>
        </tr>
        </tfoot>
    </table>
</div>
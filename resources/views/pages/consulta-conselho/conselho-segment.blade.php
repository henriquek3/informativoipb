<div class="ui segment">
    <table class="ui compact celled sortable red table">
        <thead>
        <tr>
            <th class="one wide center aligned">Ano</th>
            <th class="center aligned">Data Inclusão</th>
            <th class="center aligned">Ultima Alteração</th>
            <th class="center aligned">Status</th>
            <th class="one wide center aligned">Imprimir</th>
        </tr>
        </thead>
        <tbody>
        @forelse($resources as $rs)
            <tr>
                <td class="center aligned">{{$rs->ano}}</td>
                <td class="center aligned">{{$rs->created_at->format('d/m/Y')}}</td>
                <td class="center aligned">{{$rs->updated_at->format('d/m/Y')}}</td>
                <td class="center aligned">{{$rs->importado ===  1 ? 'Importado' : 'Pendente'}}</td>
                <td class="center aligned" title="Imprimir Relatório">
                    <a class="ui icon primary button" href="/relatorios/conselho/#/editar">
                        <i class="print icon"></i>
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
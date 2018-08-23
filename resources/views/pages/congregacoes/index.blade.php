<div class="ui segment">
    <a class="ui right floated green tiny button" href="/cadastros/igrejas/novo">
        <i class="plus icon"></i>Novo
    </a>
    {{--<h3 class="ui floated header" style="padding-top: 6px;padding-left: 10px;"><i class="edit outline icon"></i>
    </h3>--}}
    <h1 class="ui floated header" {{--style="margin-left: -10px;"--}}>Congregações
        <div class="sub header" {{--style="margin-left: -40px;"--}}>Visualize todas as congregações que pertencem a esta
            igreja.
        </div>
    </h1>
    <div class="ui clearing divider"></div>
    <p></p>
    <table class="ui compact selectable celled green unstackable sortable table">
        <thead>
        <tr>
            <th class="one wide">Código</th>
            <th class="ten wide">Nome</th>
            <th class="five wide">Bairro</th>
            <th class="one wide"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td colspan="3">Nenhum registro encontrado.</td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <th colspan="5">
                <div class="ui right floated pagination menu">{{-- $resources->links('pagination::semantic-ui') --}}</div>
            </th>
        </tr>
        </tfoot>
    </table>
</div>
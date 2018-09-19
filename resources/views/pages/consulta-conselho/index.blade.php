@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <div class="ui clearing"></div>
    <div class="ui raised segment">
        <h3 class="ui floated header" style="padding-top: 6px;padding-left: 10px;"><i class="bar chart icon"></i>
        </h3>
        <h1 class="ui floated header " style="margin-left: -10px;">Consulta Conselho
            <div class="sub header" style="margin-left: -40px;">Visualize todos os relatórios do conselho que estão
                cadastrados.
            </div>
        </h1>
        <div class="ui clearing divider"></div>
        <p></p>
        <form id="formDelete" name="formDelete" action="{{ url()->current() }}" method="post">
            @csrf @method("delete")
        </form>
        <form id="formResource" name="formResource" action="{{ url()->current() }}" method="post">@csrf @isset($resource) @method('put') @endisset

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

    <div class="ui raised segment" id="teste">
        <table class="ui celled unstackable sortable red table">
            <thead>
            <tr>
                <th class="two wide center aligned">Ano</th>
                <th class="four wide" >Nome do Relatório</th>
                <th class="three wide center aligned">Data Inclusão</th>
                <th class="three wide center aligned">Ultima Alteração</th>
                <th class="two wide center aligned">Status</th>
                <th class="two wide">Imprimir</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="center aligned">2018</td>
                    <td class="center aligned">Relatório do Conselho</td>
                    <td class="center aligned">14/09/2018</td>
                    <td class="center aligned">14/09/2018</td>
                    <td class="center aligned">Importado</td>
                    <td class="center aligned" title="Imprimir Relatório"><a class="ui icon primary button" href="/relatorios/conselho/#/editar"><i
                                    class="print icon"></i></a></td>
                </tr>
                {{--<tr>
                    <td colspan="6">Nenhum registro encontrado.</td>
                </tr>--}}
            </tbody>
            <tfoot>
            <tr>
                <th colspan="6">
                    <div class="ui right floated pagination menu"></div>
                </th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
@section('javascript')
    @includeIf(auth()->user()->perfil >= 4, 'js.app.consSupremo')
@endsection
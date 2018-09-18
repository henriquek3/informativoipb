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
        @includeWhen(auth()->user()->perfil > 4, 'supremo')
        <form id="formResource" name="formResource" action="{{ url()->current() }}" method="post">@csrf @isset($resource) @method('put') @endisset
            <div class="ui form">
                <div class="fields">
                    <div class="two wide field">
                        <label>Ano</label>
                        <select class="ui fluid dropdown" name="ano" required>
                            <option>2018</option>
                            <option>2017</option>
                        </select>
                    </div>
                    <div class="six wide field">
                        <label>Sínodo</label>
                        <input type="text" readonly="" value="{{auth()->user()->presbitero->igreja->presbiterio->sinodo->nome}}" :readonly="">

                        <input type="hidden" name="id_sinodo" value="{{auth()->user()->presbitero->igreja->presbiterio->sinodo->id}}">

                    </div>
                    <div class="eight wide field" id="div_presbiterio">
                        <label>Presbitério</label>
                        <input type="text" value="{{auth()->user()->presbitero->igreja->presbiterio->nome}}" readonly="">
                        <input type="hidden" name="id_presbiterio" value="{{auth()->user()->presbitero->igreja->presbiterio->id}}">
                    </div>
                </div>
                <div class="fields">
                    <div class="eight wide field">
                        <label>Nome (Igreja/Congregação)</label>
                        <input type="text" readonly="" value="{{auth()->user()->presbitero->igreja->nome}} "@isset($resource) {{$resource->perfil == 1 ? '' : ''}} @endisset>

                        <input type="hidden" name="id_igreja" value="{{auth()->user()->presbitero->igreja->id}}">
                    </div>
                    <div class="eight wide field">
                        <label>Nome do Ministro</label>
                        <input type="text" readonly="" value="{{auth()->user()->presbitero->nome}}">

                        <input type="hidden" name="id_presbitero" value="{{auth()->user()->presbitero->id}}">
                    </div>
                </div>
            </div>
            {{--<div class="ui segments">
                <div class="ui horizontal segments">
                    <div class="ui segment">
                        <span style="color: lightslategray;">
                            <strong>Usuário inclusão:</strong>
                        </span>
                        <span style="color: lightslategray;">&nbsp;{{isset($resource) === true ? $resource->usuario->nome : ''}}</span>
                        <span style="float: right;color: lightslategray;"><strong>Data:</strong>&nbsp;{{ isset($resource) === true ? $resource->updated_at->format("d/m/Y h:m") : ''}}</span>
                    </div>
                </div>
            </div>--}}
            <div class="ui clearing divider"></div>
            <div style="text-align: center">
                <button class="ui red labeled icon button" type="submit"><i class="search icon"></i>Pesquisar</button>
            </div>
        </form>
    </div>

    <div class="ui raised segment">
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
    <script>
        window.addEventListener("load", function () {
            $('.ui.dropdown').dropdown();
        });
    </script>

@endsection
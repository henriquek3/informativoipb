@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <div class="ui clearing"></div>
    <div class="ui raised segment">
        <h3 class="ui floated header" style="padding-top: 6px;padding-left: 10px;"><i class="bar chart icon"></i>
        </h3>
        <h1 class="ui floated header " style="margin-left: -10px;">Consulta Conselho Geral
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
            <div class="ui form">
                <div class="fields">
                    <div class="eight wide field">
                        <label>Sínodo</label>
                        <div class="ui search" title="Digite o nome do sínodo" id="sinodo_search"
                             @isset($resource) data-tooltip="Sigla: {{strtoupper($resource->presbitero->igreja->presbiterio->sinodo->sigla) ?? ''}}" @endisset>
                            <div class="ui left icon input">
                                <input class="prompt" type="text" placeholder="Procurar Sínodo" name="sinodo"
                                       @isset($resource)  value="{{$resource->presbitero->igreja->presbiterio->sinodo->nome ?? ''}}" @endisset>
                                <input type="hidden" name="id_sinodo" value="{{$resource->id_sinodo ?? ''}}">
                                <i class="search icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="eight wide field" id="div_presbiterio">
                        <label>Presbitério</label>
                        <div class="ui search" title="Digite o nome do presbitério" id="presbiterio_search"
                             @isset($resource) data-tooltip="Sigla: {{strtoupper($resource->presbitero->igreja->presbiterio->sigla) ?? ''}}" @endisset>
                            <div class="ui left icon input">
                                <input class="prompt" type="text" placeholder="Procurar Presbitério"
                                       name="presbiterio"
                                       @isset($resource)  value="{{$resource->presbitero->igreja->presbiterio->nome ?? ''}}" @endisset>
                                <input type="hidden" name="id_presbiterio" value="{{$resource->id_presbiterio ?? ''}}">
                                <i class="search icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fields">
                    <div class="eight wide field" id="div_igreja">
                        <label>Igreja</label>
                        <select class="ui fluid search dropdown" name="id_igreja" ></select>
                        <div class="ui active inline small loader" style="display:none" id="loader_igreja"></div>
                    </div>
                    <div class="eight wide field" id="div_presbitero">
                        <label>Presbítero</label>
                        <select class="ui fluid search dropdown" name="id_presbitero" ></select>
                        <div class="ui active inline small loader" style="display:none" id="loader_presbitero"></div>
                    </div>
                </div>
            </div>
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
    <script src="{{asset('js/plugins/jquery.mask.min.js')}}" async></script>
    <script src="{{asset('js/plugins/CPF.js')}}" async></script>
    <script src="{{asset('js/app/usuarios.js')}}"></script>
    @isset($resource)
        <script type="text/javascript">
            window.addEventListener("load", function () {
                try {
                    //Function para o select IGREJA
                    window.id_igreja = '{{$resource->id_igreja}}';
                    window.id_presbitero = '{{$resource->id_presbitero}}';
                    $('[name="id_presbiterio"]').trigger('change');
                } catch (e) {
                    alert('As informações não puderam ser carregadas, por favor entre em contato com o suporte.');
                }
            });
        </script>
    @endisset
    @if(session('email'))
        <script type="text/javascript">
            swal("Atenção!", "O usuário foi cadastrado, porém não podemos enviar o e-mail com a confirmação da senha, " +
                "por favor, peça para o usuário acessar o link de recuperação de senha a partir da tela de login.!",
                "info");
        </script>
    @endif
@endsection

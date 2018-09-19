@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <div class="ui clearing"></div>
    <div class="ui raised segment">
        <a class="ui right floated blue tiny button" href="/cadastros/igrejas">
            <i class="reply icon"></i>
            Voltar
        </a>
        <h3 class="ui floated header" style="padding-top: 6px;padding-left: 10px;"><i class="edit outline icon"></i>
        </h3>
        <h1 class="ui floated header" style="margin-left: -10px;">Cadastro de Igrejas
            <div class="sub header" style="margin-left: -40px;">Informações cadastrais de igrejas e suas congregações.
            </div>
        </h1>
        <div class="ui clearing divider"></div>
        <p></p>

        <form id="formDelete" name="formDelete" action="{{ url()->current() }}" method="post">
            @csrf
            @method("delete")
        </form>
        <form id="formResource" name="formResource" action="{{ url()->current() }}" method="post">
            @csrf
            @isset($resource) @method('put') @endisset
            <div class="ui form">
                <div class="fields">
                    <div class="six wide field">
                        <label>Sínodo</label>
                        <div class="ui search" title="Digite o nome do sínodo" id="sinodo_search"
                             @isset($resource) data-tooltip="Sigla: {{strtoupper($resource->sinodo->sigla) ?? ''}}" @endisset>
                            <div class="ui left icon input">
                                <input class="prompt" type="text" placeholder="Procurar Sínodo" name="sinodo" required
                                       value="{{$resource->sinodo->nome ?? ''}}">
                                <input type="hidden" name="id_sinodo" value="{{$resource->id_sinodo ?? ''}}">
                                <i class="search icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="six wide field">
                        <label>Presbitério</label>
                        <div class="ui search" title="Digite o nome do presbitério" id="presbiterio_search"
                             @isset($resource) data-tooltip="Sigla: {{strtoupper($resource->presbiterio->sigla) ?? ''}}" @endisset>
                            <div class="ui left icon input">
                                <input class="prompt" type="text" placeholder="Procurar Presbitério" required
                                       name="presbiterio" value="{{$resource->presbiterio->nome ?? ''}}">
                                <input type="hidden" name="id_presbiterio" value="{{$resource->id_presbiterio ?? ''}}">
                                <i class="search icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="four wide field">
                        <div class="clearfix">
                            <div class="ui checkbox"
                                 data-tooltip="{{isset($resource) ? $resource->congregacoes->count() < 1 ? 'Congregação pertencente ao presbitério' : 'Igreja não pode ter status de congregação enquanto houver congregações filhas' : 'Congregação pertencente ao presbitério'}}"
                                 style="float: left; display: flex; margin-top: 32px; margin-left: 20px;">
                                <input name="congregacao_presbiterio" type="checkbox"
                                       {{isset($resource) ? $resource->congregacoes->count() < 1 ? '' : ' disabled' : ''}}
                                       value="1" {{isset($resource) ? $resource->congregacao_presbiterio == 1 ? ' checked' : '' : ''}}>
                                <label>Congregação do Presbitério</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fields">
                    <div class="six wide field">
                        <label>Estado</label>
                        <select class="ui fluid search dropdown" name="id_estado" required>
                            <option value="">--</option>
                            @forelse($estados as $estado)
                                <option value="{{$estado->id}}" {{isset($resource) ? $estado->id == $resource->id_estado ? ' selected' : '' : ''}}>{{$estado->nome}}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="six wide field" id="div_cidade">
                        <label>Cidade</label>
                        <select class="ui fluid search dropdown" name="id_cidade" id="id_cidade" required></select>
                        <div class="ui active inline small loader" style="display:none" id="loader_cidade"></div>
                    </div>
                    <div class="four wide field">
                        <label>CNPJ</label>
                        <input type="text" name="cnpj" id="cnpj_igreja" placeholder="CNPJ" required
                               value="{{$resource->cnpj ?? ''}}">
                    </div>
                </div>
                <div class="fields">
                    <div class="thirteen wide field">
                        <label>Nome</label>
                        <input type="text" name="nome" placeholder="Digite o Nome" required
                               value="{{$resource->nome ?? ''}}">
                    </div>
                    <div class="ui calendar bottom left three wide field">
                        <label>Organização</label>
                        <input type="date" name="data_organizacao" placeholder="Data de Organização" required
                               value="{{$resource->data_organizacao ?? ''}}">
                    </div>
                </div>
                <div class="fields">
                    <div class="six wide field">
                        <label>Endereço</label>
                        <input type="text" name="endereco" placeholder="Endereço" required
                               value="{{$resource->endereco ?? ''}}">
                    </div>
                    <div class="two wide field">
                        <label>Número</label>
                        <input type="text" name="endereco_numero" placeholder="Número" required
                               value="{{$resource->endereco_numero ?? ''}}">
                    </div>
                    <div class="four wide field">
                        <label>Complemento</label>
                        <input type="text" name="endereco_complemento" placeholder="Complemento" required
                               value="{{$resource->endereco_complemento ?? ''}}">
                    </div>
                    <div class="four wide field">
                        <label>Bairro</label>
                        <input type="text" name="endereco_bairro" placeholder="Bairro" required
                               value="{{$resource->endereco_bairro ?? ''}}">
                    </div>
                </div>
                <div class="fields">
                    <div class="two wide field">
                        <label>CEP</label>
                        <input type="text" name="endereco_cep" placeholder="CEP"
                               value="{{$resource->endereco_cep ?? ''}}">
                    </div>
                    <div class="two wide field">
                        <label>Cx. Postal</label>
                        <input type="text" name="endereco_cx_postal" placeholder="Caixa Postal"
                               value="{{$resource->endereco_cx_postal ?? ''}}">
                    </div>
                    <div class="two wide field">
                        <label>CEP Cx. Postal</label>
                        <input type="text" name="endereco_cx_postal_cep" placeholder="CEP Caixa Postal"
                               value="{{$resource->endereco_cx_postal_cep ?? ''}}">
                    </div>
                    <div class="two wide field">
                        <label>Telefone</label>
                        <input type="text" name="telefone" placeholder="Telefone" value="{{$resource->telefone ?? ''}}">
                    </div>
                    <div class="four wide field">
                        <label>E-mail</label>
                        <input type="email" name="email" placeholder="E-Mail" value="{{$resource->email ?? ''}}">
                    </div>
                    <div class="four wide field">
                        <label>Homepage</label>
                        <input type="text" name="website" placeholder="Web Site" value="{{$resource->website ?? ''}}">
                    </div>
                </div>
            </div>
            <div class="ui segments">
                <div class="ui horizontal segments">
                    <div class="ui segment">
                        <span style="color: lightslategray;">
                            <strong>Usuário inclusão:</strong>
                        </span>
                        <span style="color: lightslategray;">&nbsp;{{isset($resource) === true ? $resource->usuario->nome : ''}}</span>
                        <span style="float: right;color: lightslategray;"><strong>Data:</strong>&nbsp;{{ isset($resource) === true ? $resource->updated_at->format("d/m/Y h:m") : ''}}</span>
                    </div>
                </div>
            </div>
            <div class="ui clearing divider"></div>
            <div style="text-align: center">
                <button class="ui green labeled icon button" type="submit"><i class="plus icon"></i>Salvar
                </button>
                <button class="ui reset button" type="reset"><i class="minus icon"></i>Limpar</button>
                <button class="ui red right labeled icon button" form="formDelete"
                        title="{{isset($resource) ? $resource->congregacoes->count() < 1 ? '' : 'Não é possível excluir Igrejas enquanto houver congregações vinculadas' : ''}}"
                        type="submit" {{isset($resource) ? $resource->congregacoes->count() < 1 ? '' : ' disabled' : ''}}>
                    <i class="remove icon"></i>Excluir
                </button>
            </div>
        </form>
    </div>
    @isset($resource) @includeWhen($resource->congregacao_presbiterio == null,'pages.congregacoes.index') @endisset
@endsection
@section('javascript')
    <script src="{{asset('js/app/cadastros-igrejas.js')}}"></script>
    @if(isset($resource))
        <script>
            window.addEventListener("load", function () {
                if ($(formResource.id_estado).val() > 0) {
                    $("#id_cidade").children().remove();
                    $("#div_cidade").find(".search").hide();
                    $("#loader_cidade").show();
                    $.get('/api/cidades?uf=' + $(formResource.id_estado).val())
                        .done(function (response) {
                            $.each(response, function () {
                                $(formResource.id_cidade).append(
                                    $('<option />').val(this.id).text(this.nome.toUpperCase())
                                );
                            });
                            $("#div_cidade").find(".search").show();
                            $("#loader_cidade").hide()
                            $(formResource.id_cidade).val('{{$resource->id_cidade}}')
                        })
                        .fail(function (response) {
                            iziToast.error({
                                title: 'Erro',
                                message: 'Consulta não realizada, verifique sua conexão',
                            });
                        })
                    ;
                }
            })
        </script>
    @endif
@endsection

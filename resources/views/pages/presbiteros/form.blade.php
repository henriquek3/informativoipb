@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <div class="ui clearing"></div>
    <div class="ui raised segment"><a class="ui right floated blue tiny button" href="/cadastros/ministros"><i
                    class="reply icon"></i>Voltar</a>
        <h3 class="ui floated header" style="padding-top: 6px;padding-left: 10px;"><i class="edit outline icon"></i>
        </h3>
        <h1 class="ui floated header" style="margin-left: -10px;">Cadastro de Ministros
            <div class="sub header" style="margin-left: -40px;">Visualize todos os ministros que estão cadastrados.
            </div>
        </h1>
        <div class="ui clearing divider"></div>
        <p></p>
        <form id="formDelete" name="formDelete" action="{{ url()->current() }}" method="post">
            @csrf
            @method("delete")
        </form>
        <form id="formResource" name="formResource" method="POST" action="{{url()->current()}}">
            @csrf @isset($resource) @method('put') @endisset
            <div class="ui form">
                <div class="fields">
                    <div class="six wide field">
                        <label>Sínodo</label>
                        <div class="ui search" title="Digite o nome do sínodo" id="sinodo_search">
                            <div class="ui left icon input">
                                <input class="prompt" type="text" placeholder="Procurar Sínodo" name="sinodo" required
                                       value="{{$resource->igreja->presbiterio->sinodo->nome ?? ''}}">
                                <input type="hidden" name="id_sinodo" value="{{$resource->id_sinodo ?? ''}}">
                                <i class="search icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="six wide field" id="div_presbiterio">
                        <label>Presbitério</label>
                        <div class="ui search" title="Digite o nome do presbitério" id="presbiterio_search">
                            <div class="ui left icon input">
                                <input class="prompt" type="text" placeholder="Procurar Presbitério" required
                                       name="presbiterio" value="{{$resource->igreja->presbiterio->nome ?? ''}}">
                                <input type="hidden" name="id_presbiterio" value="{{$resource->id_presbiterio ?? ''}}">
                                <i class="search icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="six wide field" id="div_igreja">
                        <label>Igreja</label>
                        <select class="ui fluid search dropdown" name="id_igreja"></select>
                        <div class="ui active inline small loader" style="display:none"
                             id="loader_igreja"></div>
                    </div>
                </div>
                <div class="fields">
                    <div class="sixteen wide field">
                        <label>Nome</label>
                        <input type="text" name="nome" placeholder="Nome" value="{{$resource->nome ?? ''}}" required>
                    </div>
                </div>
                <div class="fields">
                    <div class="eight wide field">
                        <label>Nome do Pai</label>
                        <input type="text" name="nome_pai" placeholder="Nome do Pai"
                               value="{{$resource->nome_pai ?? ''}}">
                    </div>
                    <div class="eight wide field">
                        <label>Nome da Mãe</label>
                        <input type="text" name="nome_mae" placeholder="Nome da Mãe"
                               value="{{$resource->nome_mae ?? ''}}">
                    </div>
                </div>
                <div class="fields">
                    <div class="ui calendar bottom left three wide field">
                        <label>Data de Nascimento</label>
                        <input type="date" name="nascimento_data" placeholder="Data de Nascimento" required
                               value="{{$resource->nascimento_data ?? ''}}">
                    </div>
                    <div class="four wide field" data-tooltip="Estado de nascimento">
                        <label>Estado</label>
                        <select class="ui fluid search dropdown" name="nascimento_id_estado" required>
                            <option value="">--</option>
                            @forelse($estados as $estado)
                                <option value="{{$estado->id}}" {{isset($resource) ? $estado->id == $resource->nascimento_id_estado ? ' selected' : '' : ''}}>{{$estado->nome}}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="five wide field" id="div_cidade" data-tooltip="Cidade de nascimento">
                        <label>Cidade</label>
                        <select class="ui fluid search dropdown" name="nascimento_id_cidade" required></select>
                        <div class="ui active inline small loader" style="display:none" id="loader_cidade"></div>
                    </div>
                    <div class="four wide field">
                        <label>Nacionalidade</label>
                        <input type="text" name="nacionalidade" placeholder="Nacionalidade" required
                               value="{{$resource->nacionalidade ?? ''}}">
                    </div>
                </div>
                <div class="fields">
                    <div class="four wide field">
                        <label>RG</label>
                        <input type="text" name="rg" placeholder="RG" value="{{$resource->rg ?? ''}}" required>
                    </div>
                    <div class="four wide field">
                        <label>Orgão Emissor</label>
                        <input type="text" name="rg_emissor" placeholder="Orgão Emissor" required
                               value="{{$resource->rg_emissor ?? ''}}">
                    </div>
                    <div class="four wide field">
                        <label>CPF</label>
                        <input type="text" name="cpf" placeholder="CPF" value="{{$resource->cpf ?? ''}}" required>
                    </div>
                    <div class="five wide field">
                        <label>Estado Civil</label>
                        <select class="ui fluid search dropdown" name="estado_civil" required>
                            <option value="1">Casado</option>
                            <option value="2">Solteiro</option>
                            <option value="3">Viúvo</option>
                            <option value="4">Separado</option>
                        </select>
                    </div>
                </div>
                <div class="fields">
                    <div class="twelve wide field">
                        <label>Cônjuge</label>
                        <input type="text" name="conjuge_nome" placeholder="Cônjuge"
                               value="{{$resource->conjuge_nome ?? ''}}">
                    </div>
                    <div class="ui calendar bottom left four wide field">
                        <label>Data de Nascimento</label>
                        <input type="date" name="conjuge_nascimento" value="{{$resource->conjuge_nascimento ?? ''}}"
                               placeholder="Data de Nascimento do Cônjuge">
                    </div>
                </div>
                <div class="fields">
                    <div class="sixteen wide field">
                        <label>Nome dos Dependentes</label>
                        <input type="text" name="nome_filhos" value="{{$resource->nome_filhos ?? ''}}"
                               placeholder="Nome dos Dependentes. OSB. use ; para separar os nomes">
                    </div>
                </div>
                <div class="fields">
                    <div class="six wide field">
                        <label>Endereço</label>
                        <input type="text" name="endereco" placeholder="Endereço" value="{{$resource->endereco ?? ''}}"
                               required>
                    </div>
                    <div class="two wide field">
                        <label>Número</label>
                        <input type="text" name="endereco_nr" placeholder="Número"
                               value="{{$resource->endereco_nr ?? ''}}">
                    </div>
                    <div class="four wide field">
                        <label>Complemento</label>
                        <input type="text" name="endereco_complemento" placeholder="Complemento"
                               value="{{$resource->endereco_complemento ?? ''}}">
                    </div>
                    <div class="four wide field">
                        <label>Bairro</label>
                        <input type="text" name="endereco_bairro" placeholder="Bairro"
                               value="{{$resource->endereco_bairro ?? ''}}">
                    </div>
                </div>
                <div class="fields">
                    <div class="four wide field">
                        <label>Estado</label>
                        <select class="ui fluid search dropdown" name="endereco_id_estado" required>
                            <option value="">--</option>
                            @forelse($estados as $estado)
                                <option value="{{$estado->id}}" {{isset($resource) ? $estado->id == $resource->endereco_id_estado ? ' selected' : '' : ''}}>{{$estado->nome}}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="five wide field" id="div_cidade_end">
                        <label>Cidade</label>
                        <select class="ui fluid search dropdown" name="endereco_id_cidade" required></select>
                        <div class="ui active inline small loader" style="display:none" id="loader_cidade_end"></div>
                    </div>
                    <div class="two wide field">
                        <label>CEP</label>
                        <input type="text" name="cep" placeholder="CEP" value="{{$resource->cep ?? ''}}">
                    </div>
                    <div class="two wide field">
                        <label>Cx. Postal</label>
                        <input type="text" name="cx_postal" placeholder="Caixa Postal"
                               value="{{$resource->cx_postal ?? ''}}">
                    </div>
                    <div class="three wide field">
                        <label>CEP Cx. Postal</label>
                        <input type="text" name="cx_postal_cep" placeholder="CEP Cx. Postal"
                               value="{{$resource->cx_postal_cep ?? ''}}">
                    </div>
                </div>
                <div class="fields">
                    <div class="three wide field">
                        <label>Celular</label>
                        <input type="text" name="celular" placeholder="Celular" value="{{$resource->celular ?? ''}}">
                    </div>
                    <div class="three wide field">
                        <label>Telefone Fixo</label>
                        <input type="text" name="telefone" placeholder="Telefone Fixo"
                               value="{{$resource->telefone ?? ''}}">
                    </div>
                    <div class="ten wide field">
                        <label>E-mail</label>
                        <input type="email" name="email" placeholder="E-Mail" value="{{$resource->email ?? ''}}">
                    </div>
                </div>
            </div>
            <div class="ui segments">
                <div class="ui horizontal segments">
                    <div class="ui segment"><span
                                style="color: lightslategray;"><strong>Usuário:</strong></span><span
                                style="color: lightslategray;">&nbsp; {{ isset($resource) === true ? $resource->usuario->nome : ''}}
                            <span id="user_inc"></span>&nbsp;</span><span
                                style="float: right;color: lightslategray;"><strong>Data:</strong>&nbsp; {{ isset($resource) === true ? $resource->updated_at->format("d/m/Y h:m") : ''}}
                            <span id="data_inc"></span></span></div>
                </div>
            </div>
            <div class="ui clearing divider"></div>
            <div style="text-align: center">
                <button class="ui green labeled icon button" type="submit"><i class="plus icon"></i>Gravar</button>
                <button class="ui reset button" type="reset"><i class="minus icon"></i>Limpar</button>
                <button class="ui red right labeled icon button" type="submit" form="formDelete"><i
                            class="remove icon"></i>Excluir
                </button>
            </div>
        </form>
    </div>
@endsection
@section('javascript')
    <script src="{{asset('js/app/cadastros-presbiteros.js')}}"></script>
    @isset($resource)
        <script type="text/javascript" async>
            try {
                window.addEventListener("load", function () {
                    /**
                     * Function para o select Estado de NASCIMENTO
                     */
                    if ($('[name="nascimento_id_estado"]').val() > 0) {
                        $('[name="nascimento_id_cidade"]').children().remove();
                        $("#div_cidade").find(".search").hide();
                        $("#loader_cidade").show();
                        $.get('/api/cidades?uf=' + $('[name="nascimento_id_estado"]').val())
                            .done(function (response) {
                                $.each(response, function () {
                                    $('[name="nascimento_id_cidade"]').append(
                                        $('<option />').val(this.id).text(this.nome.toUpperCase())
                                    );
                                });
                                $("#div_cidade").find(".search").show();
                                $("#loader_cidade").hide();
                                $('[name="nascimento_id_cidade"]').val('{{$resource->nascimento_id_cidade}}');
                            })
                            .fail(function () {
                                iziToast.error({
                                    title: 'Erro',
                                    message: 'Consulta não realizada, verifique sua conexão',
                                });
                            })
                        ;
                    }

                    /**
                     * Function para o select Estado ENDEREÇO
                     */
                    if ($('[name="endereco_id_estado"]').val() > 0) {
                        $('[name="endereco_id_cidade"]').children().remove();
                        $("#div_cidade_end").find(".search").hide();
                        $("#loader_cidade_end").show();
                        $.get('/api/cidades?uf=' + $('[name="endereco_id_estado"]').val())
                            .done(function (response) {
                                $.each(response, function () {
                                    $('[name="endereco_id_cidade"]').append(
                                        $('<option />').val(this.id).text(this.nome.toUpperCase())
                                    );
                                });
                                $("#div_cidade_end").find(".search").show();
                                $("#loader_cidade_end").hide();
                                $('[name="endereco_id_cidade"]').val('{{$resource->endereco_id_cidade}}');
                            })
                            .fail(function () {
                                iziToast.error({
                                    title: 'Erro',
                                    message: 'Consulta não realizada, verifique sua conexão',
                                });
                            })
                        ;
                    }


                    //Function para o select IGREJA
                    window.id_igreja = '{{$resource->id_igreja}}';
                    $('[name="id_presbiterio"]').trigger('change');

                    $('[name="estado_civil"]').val('{{$resource->estado_civil}}').trigger('change');
                })
            } catch (e) {
                alert('As informações não puderam ser carregadas, por favor entre em contato com o suporte.');
            }
        </script>
    @endisset
@endsection
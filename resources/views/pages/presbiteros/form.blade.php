@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <div class="ui clearing"></div>
    <div class="ui raised segment"><a class="ui right floated blue tiny button" href="/cadastros/sinodos"><i
                    class="reply icon"></i>Voltar</a>
        <h3 class="ui floated header" style="padding-top: 6px;padding-left: 10px;"><i class="edit outline icon"></i>
        </h3>
        <h1 class="ui floated header" style="margin-left: -10px;">Cadastro de Ministros
            <div class="sub header" style="margin-left: -40px;">Visualize todos os presbíteros que estão cadastrados.
            </div>
        </h1>
        <div class="ui clearing divider"></div>
        <p></p>
        <form id="formDelete" name="formDelete" action="{{ url()->current() }}" method="post">
            @csrf
            @method("delete")
        </form>
        <form id="formResource" name="formResource" method="POST" action="{{url()->current()}}">@csrf
            <div class="ui form">
                <div class="fields">
                    <div class="six wide field">
                        <label>Sínodo</label>
                        <select class="ui fluid search dropdown" name="id_sinodo">
                            <option></option>
                        </select>
                    </div>
                    <div class="six wide field" id="div_presbiterio">
                        <label>Presbitério</label>
                        <select class="ui fluid search dropdown" name="id_presbiterio"
                                id="id_presbiterio"></select>
                        <div class="ui active inline small loader" style="display:none"
                             id="loader_presbiterio"></div>
                    </div>
                    <div class="six wide field">
                        <label>Igreja</label>
                        <select class="ui fluid search dropdown" name="id_igreja"></select>
                        <div class="ui active inline small loader" style="display:none"
                             id="loader_igreja"></div>
                    </div>
                </div>
                <div class="fields">
                    <div class="sixteen wide field">
                        <label>Nome</label>
                        <input type="text" name="nome" placeholder="Digite seu Nome">
                    </div>
                </div>
                <div class="fields">
                    <div class="eight wide field">
                        <label>Nome do Pai</label>
                        <input type="text" name="nome_pai" placeholder="Nome do Pai">
                    </div>
                    <div class="eight wide field">
                        <label>Nome da Mãe</label>
                        <input type="text" name="nome_mae" placeholder="Nome da Mãe">
                    </div>
                </div>
                <div class="fields">
                    <div class="ui calendar bottom left three wide field">
                        <label>Data de Nascimento</label>
                        <input type="date" name="nascimento_data" placeholder="Data de Nascimento">
                    </div>
                    <div class="four wide field" data-toolip="Estado em que nasceu">
                        <label>Estado</label>
                        <select class="ui fluid search dropdown" name="nascimento_id_estado"></select>
                    </div>
                    <div class="five wide field" id="div_cidade">
                        <label>Cidade</label>
                        <select class="ui fluid search dropdown" name="nascimento_id_cidade"
                                id="nascimento_id_cidade"></select>
                        <div class="ui active inline small loader" style="display:none"
                             id="loader_cidade"></div>
                    </div>
                    <div class="four wide field">
                        <label>Nacionalidade</label>
                        <input type="text" name="nacionalidade" placeholder="Nacionalidade">
                    </div>
                </div>
                <div class="fields">
                    <div class="four wide field">
                        <label>RG</label>
                        <input type="text" name="rg" placeholder="RG">
                    </div>
                    <div class="four wide field">
                        <label>Orgão Emissor</label>
                        <input type="text" name="rg_emissor" placeholder="Orgão Emissor">
                    </div>
                    <div class="four wide field">
                        <label>CPF</label>
                        <input type="text" name="cpf" placeholder="CPF">
                    </div>
                    <div class="five wide field">
                        <label>Estado Civil</label>
                        <select class="ui fluid search dropdown" name="estado_civil">
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
                        <input type="text" name="conjuge_nome" placeholder="Cônjuge">
                    </div>
                    <div class="ui calendar bottom left four wide field">
                        <label>Data de Nascimento</label>
                        <input type="date" name="conjuge_nascimento"
                               placeholder="Data de Nascimento do Cônjuge">
                    </div>
                </div>
                <div class="fields">
                    <div class="sixteen wide field">
                        <label>Nome dos Dependentes</label>
                        <input type="text" name="nome_filhos"
                               placeholder="Nome dos Dependentes. OSB. use ; para separar os nomes">
                    </div>
                </div>
                <div class="fields">
                    <div class="six wide field">
                        <label>Endereço</label>
                        <input type="text" name="endereco" placeholder="Endereço">
                    </div>
                    <div class="two wide field">
                        <label>Número</label>
                        <input type="text" name="endereco_nr" placeholder="Número">
                    </div>
                    <div class="four wide field">
                        <label>Complemento</label>
                        <input type="text" name="endereco_complemento" placeholder="Complemento">
                    </div>
                    <div class="four wide field">
                        <label>Bairro</label>
                        <input type="text" name="endereco_bairro" placeholder="Bairro">
                    </div>
                </div>
                <div class="fields">
                    <div class="four wide field">
                        <label>Estado</label>
                        <select class="ui fluid search dropdown" name="endereco_id_estado"></select>
                    </div>
                    <div class="five wide field" id="div_cidade">
                        <label>Cidade</label>
                        <select class="ui fluid search dropdown" name="endereco_id_cidade"
                                id="endereco_id_cidade"></select>
                        <div class="ui active inline small loader" style="display:none"
                             id="loader_cidade"></div>
                    </div>
                    <div class="two wide field">
                        <label>CEP</label>
                        <input type="text" name="cep" placeholder="CEP">
                    </div>
                    <div class="two wide field">
                        <label>Cx. Postal</label>
                        <input type="text" name="cx_postal" placeholder="Caixa Postal">
                    </div>
                    <div class="three wide field">
                        <label>CEP Cx. Postal</label>
                        <input type="text" name="cx_postal_cep" placeholder="CEP Cx. Postal">
                    </div>
                </div>
                <div class="fields">
                    <div class="three wide field">
                        <label>Celular</label>
                        <input type="text" name="celular" placeholder="Celular">
                    </div>
                    <div class="three wide field">
                        <label>Telefone Fixo</label>
                        <input type="text" name="telefone" placeholder="Telefone Fixo">
                    </div>
                    <div class="ten wide field">
                        <label>E-mail</label>
                        <input type="email" name="email" placeholder="E-Mail">
                    </div>
                </div>
                <!--div.fields
                div.two.wide.field
                    label Teste
                    input(type="text", name="id_igreja", value="1")
                div.two.wide.field
                    label Teste
                    input(type="text", name="nacionalidade", value="1")
                div.two.wide.field
                    label Teste
                    input(type="text", name="tipo", value="2")

                -->
            </div>

            <div class="ui segments">
                <div class="ui horizontal segments">
                    <div class="ui segment"><span
                                style="color: lightslategray;"><strong>Usuário:</strong></span><span
                                style="color: lightslategray;">&nbsp; {{ isset($resource) === true ? $resource->user->nome : ''}}
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
    <script type="text/javascript" async>
        $(document).ready(function () {
        });
    </script>
    @isset($resource)
        <script type="text/javascript" async>
            try {
                var sinodo = JSON.parse('{!! $resource !!}');
                formResource.nome.value = sinodo.nome !== null ? sinodo.nome : '';
                formResource.sigla.value = sinodo.sigla !== null ? sinodo.sigla : '';
                formResource.regiao.value = sinodo.regiao !== null ? sinodo.regiao : '';
                $(formResource).append('<input type="hidden" name="_method" value="put">');
            } catch (e) {
                alert('As informações não puderam ser carregadas, por favor entre em contato com o suporte.');
            }
        </script>
    @endisset
@endsection
@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <div class="ui clearing"></div>
    <div class="ui raised segment"><a class="ui right floated blue tiny button" href="/cadastros/sinodos"><i
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
            @csrf @method("delete")
        </form>
        <form id="formResource" name="formResource" method="POST" action="{{url()->current()}}">
            @csrf @isset($resource) @method('put') @endisset
            <div class="ui segments">
                <div class="ui green segment" style="text-align: center; background-color: #F9FAFB">
                    <p><strong>Relatório do Ministro Presbiteriano</strong></p>
                </div>
                <div class="ui form segment">
                    <div class="fields">
                        <div class="two wide field">
                            <label>Ano</label>
                            <input type="text" name="ano" readonly="" value="{{Date('Y')}}" name="ano">
                        </div>
                        <div class="four wide field">
                            <label>Sínodo</label>
                            <input type="text" name="sinodo" disabled="" value="{{auth()->user()->presbitero->igreja->presbiterio->sinodo->nome}}">
                            <!--select.ui.fluid.search.dropdown(name="id_sinodo")
                            option

                            -->
                        </div>
                        <div class="five wide field" id="div_presbiterio">
                            <label>Presbitério</label>
                            <input type="text" name="presbiterio" value="{{auth()->user()->presbitero->igreja->presbiterio->nome}}" disabled="">
                            <!--select.ui.fluid.search.dropdown(name="id_presbiterio", id="id_presbiterio")-->
                            <!--div.ui.active.inline.small.loader(style="display:none", id="loader_presbiterio")-->
                        </div>
                        <div class="one wide field">
                            <label>ID</label>
                            <input type="text" name="id_igreja" value="{{auth()->user()->presbitero->igreja->id}}" readonly="">
                        </div>
                        <div class="five wide field">
                            <label>Igreja</label>
                            <input type="text" name="igreja"  value="{{auth()->user()->presbitero->igreja->nome}} "disabled="">
                            <!--select.ui.fluid.search.dropdown(name="id_igreja")-->
                            <!--div.ui.active.inline.small.loader(style="display:none", id="loader_igreja")-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui segments">
                <div class="ui green segment" style="text-align: center; background-color: #F9FAFB">
                    <p><strong>I - Identificação do Ministro</strong></p>
                </div>
                <div class="ui form segment">
                    <div class="fields">
                        <div class="one wide field">
                            <label>ID</label>
                            <input type="text" readonly="" name="id_presbitero" value="{{auth()->user()->presbitero->id}}">
                        </div>
                        <div class="fifteen wide field">
                            <label>Nome</label>
                            <input type="text" name="nome" value="{{auth()->user()->presbitero->nome}}" disabled="">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="eight wide field">
                            <label>Nome do Pai</label>
                            <input type="text" name="nome_pai" value="{{auth()->user()->presbitero->nome_pai}}" disabled="">
                        </div>
                        <div class="eight wide field">
                            <label>Nome da Mãe</label>
                            <input type="text" name="nome_mae" value="{{auth()->user()->presbitero->nome_mae}}" disabled="">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="ui calendar bottom left three wide field">
                            <label>Data de Nascimento</label>
                            <input class="datepicker2" type="text" name="nascimento_data" value="{{auth()->user()->presbitero->nascimento_data}}" disabled="">
                        </div>
                        <div class="five wide field">
                            <label>Estado Natal</label>
                            <input type="text" disabled="" name="nascimento_id_estado" value="{{auth()->user()->presbitero->nascimento_id_estado}}">
                        </div>
                        <div class="eight wide field">
                            <label>Cidade Natal</label>
                            <input type="text" disabled="" name="nascimento_id_cidade" value="{{auth()->user()->presbitero->nascimento_id_cidade}}">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="four wide field">
                            <label>RG</label>
                            <input type="text" name="rg" placeholder="RG" disabled="" value="{{auth()->user()->presbitero->rg}}">
                        </div>
                        <div class="four wide field">
                            <label>Orgão Emissor</label>
                            <input type="text" name="rg_emissor" placeholder="Orgão Emissor" disabled="" value="{{auth()->user()->presbitero->rg_emissor}}">
                        </div>
                        <div class="four wide field">
                            <label>CPF</label>
                            <input type="text" name="cpf" placeholder="CPF" disabled="" value="{{auth()->user()->presbitero->cpf}}">
                        </div>
                        <div class="five wide field">
                            <label>Estado Civil</label>
                            <input type="text" disabled="" name="estado_civil" value="{{auth()->user()->presbitero->estado_civil}}">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="ten wide field">
                            <label>Cônjuge</label>
                            <input type="text" name="conjuge_nome" placeholder="Cônjuge" disabled="" value="{{auth()->user()->presbitero->conjuge_nome}}">
                        </div>
                        <div class="ui calendar bottom left four wide field">
                            <label>Data de Nascimento</label>
                            <input class="datepicker2" type="text" name="conjuge_nascimento"
                                   value="{{auth()->user()->presbitero->conjuge_nascimento}}" disabled="">
                        </div>
                        <div class="two wide field">
                            <label>Nº de Dependentes</label>
                            <input type="text" name="dependentes" placeholder="Nº de Dependentes" disabled="">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label>Nome dos Dependentes</label>
                            <input type="text" name="nome_filhos"
                                   value="{{auth()->user()->presbitero->nome_filhos}}" disabled="">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="six wide field">
                            <label>Endereço</label>
                            <input type="text" name="endereco" placeholder="Endereço" disabled="" value="{{auth()->user()->presbitero->endereco}}">
                        </div>
                        <div class="two wide field">
                            <label>Número</label>
                            <input type="text" name="endereco_nr" placeholder="Número" disabled="" value="{{auth()->user()->presbitero->endereco_nr}}">
                        </div>
                        <div class="four wide field">
                            <label>Complemento</label>
                            <input type="text" name="endereco_complemento" placeholder="Complemento" disabled="" value="{{auth()->user()->presbitero->endereco_complemento}}">
                        </div>
                        <div class="four wide field">
                            <label>Bairro</label>
                            <input type="text" name="endereco_bairro" placeholder="Bairro" disabled="" value="{{auth()->user()->presbitero->endereco_bairro}}">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="four wide field">
                            <label>Estado</label>
                            <input type="text" disabled="" name="endereco_id_estado" value="{{auth()->user()->presbitero->endereco_id_estado}}">
                        </div>
                        <div class="five wide field">
                            <label>Cidade</label>
                            <input type="text" disabled="" name="endereco_id_cidade" value="{{auth()->user()->presbitero->endereco_id_cidade}}">
                        </div>
                        <div class="two wide field">
                            <label>CEP</label>
                            <input type="text" name="cep" placeholder="CEP" disabled="" value="{{auth()->user()->presbitero->cep}}">
                        </div>
                        <div class="two wide field">
                            <label>Cx. Postal</label>
                            <input type="text" name="cx_postal" placeholder="Caixa Postal" disabled="" value="{{auth()->user()->presbitero->cx_postal}}">
                        </div>
                        <div class="three wide field">
                            <label>CEP Cx. Postal</label>
                            <input type="text" name="cx_postal_cep" placeholder="CEP Cx. Postal" disabled="" value="{{auth()->user()->presbitero->cx_postal_cep}}">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="three wide field">
                            <label>Celular</label>
                            <input type="text" name="celular" placeholder="Celular" disabled="" value="{{auth()->user()->presbitero->celular}}">
                        </div>
                        <div class="three wide field">
                            <label>Telefone Fixo</label>
                            <input type="text" name="telefone" placeholder="Telefone Fixo" disabled="" value="{{auth()->user()->presbitero->telefone}}">
                        </div>
                        <div class="three wide field">
                            <label>Telefone da Igreja</label>
                            <input type="text" name="telefone_igreja" placeholder="Telefone da Igreja" disabled="" value="{{auth()->user()->presbitero->igreja->telefone}}">
                        </div>
                        <div class="seven wide field">
                            <label>E-mail</label>
                            <input type="email" name="email" placeholder="E-Mail" disabled="" value="{{auth()->user()->presbitero->email}}">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="five wide field">
                            <label>Condições de Moradia:</label>
                            <select class="ui fluid search dropdown" name="condicao_moradia">
                                <option value="0">----</option>
                                <option value="1">Casa/Apto Pastoral</option>
                                <option value="2">Moradia Própria</option>
                                <option value="3">Financiada</option>
                                <option value="4">Moradia alugada paga pela Igreja</option>
                                <option value="5">Moradia alugada e paga pelo Ministro</option>
                                <option value="6">Moradia alugada Nos limites do campo</option>
                                <option value="7">Moradia alugada Fora do campo</option>
                            </select>
                        </div>
                        <div class="three wide field">
                            <label>Data de Ordenação:</label>
                            <input type="date" name="ordenacao_data">
                        </div>
                        <div class="eight wide field"
                             data-tooltip="Digite ou Selecione o Presbitério onde foi ordenado.">
                            <label>Presbitério</label>
                            <select class="ui fluid search dropdown" name="id_presbiterio">
                                <option></option>
                                <option>Sul de Rondônia</option>
                                <option>Vale do Rio Machado</option>
                            </select>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="three wide field">
                            <label>Dedicação ao Ministério:</label>
                            <select class="ui fluid search dropdown" name="dedicacao_ministerio">
                                <option value="0">----</option>
                                <option value="1">Integral</option>
                                <option value="2">Parcial</option>
                            </select>
                        </div>
                        <div class="three wide field">
                            <label>Férias</label>
                            <select class="ui fluid search dropdown" name="ferias">
                                <option value="0">----</option>
                                <option value="1">Regulares</option>
                                <option value="2">Parciais</option>
                                <option value="3">Não teve</option>
                            </select>
                        </div>
                        <div class="five wide field">
                            <label>Côngruas</label>
                            <div class="ui labeled input">
                                <div class="ui label">R$</div>
                                <input type="text" value="1000" name="congruas">
                            </div>
                        </div>
                    </div>
                    <div class="fields inline">
                        <div class="three wide field" data-tooltip="Possui aposentadoria pública?">
                            <label>Aposentadoria pública?</label>
                        </div>
                        <div class="three wide field">
                            <div class="ui radio checkbox">
                                <input name="previdencia_publica" type="radio" value="1">
                                <label>Sim</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input name="previdencia_publica" type="radio" value="0" checked="checked">
                                <label>Não</label>
                            </div>
                        </div>
                        <div class="three wide field" data-tooltip="Possui aposentadoria privada?">
                            <label>Aposentadoria privada?</label>
                        </div>
                        <div class="three wide field">
                            <div class="ui radio checkbox">
                                <input name="previdencia_privada" type="radio" value="1">
                                <label>Sim</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input name="previdencia_privada" type="radio" value="0" checked="checked">
                                <label>Não</label>
                            </div>
                        </div>
                        <div class="two wide field" data-tooltip="Possui plano de saúde?">
                            <label>Plano de saúde?</label>
                        </div>
                        <div class="two wide field">
                            <div class="ui radio checkbox">
                                <input name="plano_saude" type="radio" value="1">
                                <label>Sim</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input name="plano_saude" type="radio" value="0" checked="checked">
                                <label>Não</label>
                            </div>
                        </div>
                    </div>
                    <div class="fields inline">
                        <div class="five wide field">
                            <label>Contribui para o INSS sobre o valor das Côngruas??</label>
                        </div>
                        <div class="two wide field">
                            <div class="ui radio checkbox">
                                <input name="congruas_contribui_inss" type="radio" value="1">
                                <label>Sim</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input name="congruas_contribui_inss" type="radio" value="0" checked="checked">
                                <label>Não</label>
                            </div>
                        </div>
                        <div class="five wide field" data-tooltip="Qual o valor da contribuição para o INSS?">
                            <label>Contribuição INSS:</label>
                            <div class="ui labeled input">
                                <div class="ui label">R$</div>
                                <input type="text" name="previdencia_publica_valor" value="1000">
                            </div>
                        </div>
                        <div class="two wide field" data-tooltip="Contribui para Previdência Privada?">
                            <label>Previdência Privada?</label>
                        </div>
                        <div class="two wide field">
                            <div class="ui radio checkbox">
                                <input name="contribui_prev_privada" type="radio" value="1">
                                <label>Sim</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input name="contribui_prev_privada" type="radio" value="0" checked="checked">
                                <label>Não</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui segments">
                <div class="ui green segment" style="text-align: center; background-color: #F9FAFB">
                    <p><strong>II - Campo de Trabalho</strong></p>
                </div>
                <div class="ui form segment">
                    <div class="fields">
                        <div class="eight wide field">
                            <label>Igreja(s):</label>
                            <textarea rows="2" value="0" name="campos_igrejas">{{$resource->campos_igrejas ?? ''}}</textarea>
                        </div>
                        <div class="eight wide field">
                            <label>Congregação(ões):</label>
                            <textarea rows="2" value="0" name="campos_congregacoes">{{$resource->campos_congregacoes ?? ''}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui segments">
                <div class="ui green segment" style="text-align: center; background-color: #F9FAFB">
                    <p><strong>III - Atuação Ministerial</strong></p>
                </div>
                <div class="ui form segment">
                    <div class="ui green ribbon label" style="font-size:0.92857143em;">1. DOUTRINAÇÃO</div>
                    <strong style="color:green;">No campo e fora do campo</strong>
                </div>
                <div class="ui form segment">
                    <div class="fields">
                        <div class="four wide field">
                            <label>Pregações</label>
                            <input type="text"  value="{{$resource->pregacoes ?? ''}}" name="pregacoes">
                        </div>
                        <div class="four wide field">
                            <label>Aulas de Escola Dominical:</label>
                            <input type="text" value="{{$resource->ebd ?? ''}}" name="ebd">
                        </div>
                        <div class="four wide field">
                            <label>Trabalhos de Evangelização:</label>
                            <input type="text" value="{{$resource->evangelizacao ?? ''}}" name="evangelizacao">
                        </div>
                        <div class="four wide field">
                            <label>Estudos Bíblicos:</label>
                            <input type="text" value="{{$resource->estudos_biblicos ?? ''}}" name="estudos_biblicos">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="four wide field">
                            <label>Palestras, preleções especiais:</label>
                            <input type="text" value="{{$resource->palestras_prelecoes ?? ''}}" name="palestras_prelecoes">
                        </div>
                        <div class="four wide field">
                            <label>Mensagens - Rádio/TV:</label>
                            <input type="text" value="{{$resource->msg_radio ?? ''}}" name="msg_radio">
                        </div>
                        <div class="four wide field">
                            <label>Artigos-jornais, boletins, revistas:</label>
                            <input type="text" value="{{$resource->artigos_boletins_revistas ?? ''}}" name="artigos_boletins_revistas">
                        </div>
                        <div class="four wide field">
                            <label>Entrevistas:</label>
                            <input type="text" value="{{$resource->entrevistas ?? ''}}" name="entrevistas">
                        </div>
                    </div>
                </div>
                <div class="ui form segment">
                    <div class="ui green ribbon label" style="font-size:0.92857143em;">2. ATOS PASTORAIS</div>
                    <strong style="color:green;">No campo e fora do campo</strong>
                </div>
                <div class="ui form segment">
                    <div class="fields">
                        <div class="five wide field">
                            <label>Santas Ceias:</label>
                            <input type="text" value="{{$resource->santa_ceia ?? ''}}" name="santa_ceia">
                        </div>
                        <div class="six wide field">
                            <label>Bênçãos Nupciais (com ou sem efeito civil):</label>
                            <input type="text" value="{{$resource->bencaos_nupciais ?? ''}}" name="bencaos_nupciais">
                        </div>
                        <div class="five wide field">
                            <label>Funerais:</label>
                            <input type="text" value="{{$resource->funerais ?? ''}}" name="funerais">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="five wide field">
                            <label>Batismos Infantis:</label>
                            <input type="text" value="{{$resource->batismos ?? ''}}" name="batismos">
                        </div>
                        <div class="six wide field">
                            <label>Profissões de Fé:</label>
                            <input type="text" value="{{$resource->profissoes_fe ?? ''}}" name="profissoes_fe">
                        </div>
                        <div class="five wide field">
                            <label>Profissões de Fé & Batismos:</label>
                            <input type="text" value="{{$resource->profissoes_batismos ?? ''}}" name="profissoes_batismos">
                        </div>
                    </div>
                </div>
                <div class="ui form segment">
                    <div class="ui green ribbon label" style="font-size:0.92857143em;">3. ASSISTÊNCIA PASTORAL</div>
                    <strong style="color:green;">No campo e fora do campo</strong>
                </div>
                <div class="ui form segment">
                    <div class="fields">
                        <div class="four wide field">
                            <label>Aconselhamentos/Orientações:</label>
                            <input type="text" value="{{$resource->aconselhamentos ?? ''}}" name="aconselhamentos">
                        </div>
                    </div>
                </div>
                <div class="ui form segment">
                    <div class="ui green ribbon label" style="font-size:0.92857143em;">3. ASSISTÊNCIA PASTORAL</div>
                    <strong style="color:green;">VISITAS</strong>
                </div>
                <div class="ui form segment">
                    <div class="fields">
                        <div class="seven wide field">
                            <label>Evangélicos ou não:(considerar as visitas feitas nos lares como uma
                                visita.)</label>
                            <!--input(type="text" value="0" name="visitas_lares")-->
                        </div>
                        <div class="six wide field">
                            <label>Pontos de Pregação, Congregações ou Campos Missionários</label>
                            <input type="text" value="{{$resource->visitas_igrejas ?? ''}}" name="visitas_igrejas">
                        </div>
                        <div class="three wide field">
                            <label>Departamentos Internos</label>
                            <input type="text" value="{{$resource->departamentos_internos ?? ''}}" name="departamentos_internos">
                        </div>
                    </div>
                </div>
                <div class="ui form segment">
                    <div class="ui green ribbon label" style="font-size:0.92857143em;">4. MINISTÉRIO DESIGNADO NOS
                        TERMOS DO ARTIGO 37 DA CI/IPB
                    </div>
                </div>
                <div class="ui form segment">
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label>Descrição das atividades:</label>
                            <textarea rows="5" name="descricao_atividades">{{$resource->descricao_atividades ?? ''}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui segments">
                <div class="ui green segment" style="text-align: center; background-color: #F9FAFB">
                    <p><strong>IV - Atuação Conciliar</strong></p>
                </div>
                <div class="ui form segment">
                    <div class="ui green ribbon label" style="font-size:0.92857143em;">1. CONCÍLIOS DA IPB</div>
                    <strong style="color:green;">No campo e fora do campo</strong>
                </div>
                <div class="ui form segment">
                    <div class="fields">
                        <div class="four wide field">
                            <label>Reuniões do Conselho:</label>
                            <input type="text" value="{{$resource->reunioes_conselho ?? ''}}" name="reunioes_conselho">
                        </div>
                        <div class="four wide field">
                            <label>Assembleias Gerais da Igreja:</label>
                            <input type="text" value="{{$resource->assembleias ?? ''}}" name="assembleias">
                        </div>
                        <div class="four wide field">
                            <label>Diáconos Ordenados e/ou Investidos:</label>
                            <input type="text" value="{{$resource->diaconos_ordenados_investidos ?? ''}}" name="diaconos_ordenados_investidos">
                        </div>
                        <div class="four wide field">
                            <label>Presbíteros Ordenados e/ou Investidos:</label>
                            <input type="text" value="{{$resource->presbiteros_ordenados_investidos ?? ''}}" name="presbiteros_ordenados_investidos">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="three wide field">
                            <label>Reuniões do Presbitério:</label>
                            <input type="text" value="{{$resource->reunioes_presbiterio ?? ''}}" name="reunioes_presbiterio">
                        </div>
                        <div class="three wide field">
                            <label>Reuniões do Sínodo:</label>
                            <input type="text" value="{{$resource->reunioes_sinodo ?? ''}}" name="reunioes_sinodo">
                        </div>
                        <div class="four wide field">
                            <label>Reuniões do Supremo Concílio da IPB:</label>
                            <input type="text" value="{{$resource->reunioes_concilio ?? ''}}" name="reunioes_concilio">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label>Comentários:</label>
                            <textarea rows="3" name="comentarios">{{ $resource->comentarios ?? "" }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="ui form segment">
                    <div class="ui green ribbon label" style="font-size:0.92857143em;">2. CARGOS EM COMISSÕES
                        EXECUTIVAS DOS CONCÍLIOS, SECRETARIAS DE CAUSAS, JUNTAS, COMISSÕES E AUTARQUIAS
                    </div>
                </div>
                <div class="ui form segment">
                    <div class="fields">
                        <div class="sixteen wide field">
                            <div class="ui tiny message">
                                <label>OBS. mencionar as funções exercidas nos diversos níveis conciliares da IPB e
                                    o número de reuniões durante o ano.</label>
                            </div>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label>No Presbitério:</label>
                            <textarea rows="3" name="cargos_presbiterio">{{ $resource->cargos_presbiterio ?? "" }}</textarea>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label>No Sínodo:</label>
                            <textarea rows="3" name="cargos_sinodo">{{ $resource->cargos_sinodo ?? "" }}</textarea>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label>No Supremo Concílio:</label>
                            <textarea rows="3" name="cargos_concilio">{{ $resource->cargos_concilio ?? "" }}</textarea>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label>Em Juntas, Comissões e Autarquias da IPB:</label>
                            <textarea rows="3" name="cargos_outros">{{ $resource->cargos_outros ?? "" }}</textarea>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label>Texto complementar::</label>
                            <textarea rows="4" name="texto_complementar">{{ $resource->texto_complementar ?? "" }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui segments">
                <div class="ui green segment" style="text-align: center; background-color: #F9FAFB">
                    <p><strong>V. Outras Atividades</strong></p>
                </div>
                <div class="ui form segment">
                    <div class="fields">
                        <div class="sixteen wide field">
                            <div class="ui tiny message">
                                <label>
                                    OBS. Mencionar, estatisticamente, realizações no ano não previstas nos campos
                                    precedentes, dadas ou recebidas (cursos, leituras, encontros de estudos,
                                    congressos, etc.), bem como outras atividadesparalelas ao ministério pastoral
                                    (ex.: advocacia, jornalismo, magistério, etc.).</label>
                            </div>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label>1. Atualização e Aperfeiçoamento:</label>
                            <textarea rows="3" name="atualizacao_aperfeicoamento">{{ $resource->atualizacao_aperfeicoamento ?? "" }}</textarea>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label>2. Atividades em entidades para-eclesiásticas:</label>
                            <textarea rows="3" name="atividades_para_eclesiasticas">{{ $resource->atividades_para_eclesiasticas ?? "" }}</textarea>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label>3. Atividades Extra Ministeriais:</label>
                            <textarea rows="3" name="atividades_extras_ministeriais">{{ $resource->atividades_extras_ministeriais ?? "" }}</textarea>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label>Outras</label>
                            <textarea rows="3" name="atividades_outros">{{ $resource->atividades_outros ?? "" }}</textarea>
                        </div>
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
    @if(isset($resource))
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
                })
            } catch (e) {
                alert('As informações não puderam ser carregadas, por favor entre em contato com o suporte.');
            }
        </script>
    @else
        <script>
            window.addEventListener("load", function () {
                /**
                 * Function para o select Estado de NASCIMENTO
                 */
                $('[name="nascimento_id_estado"]').on('change', function () {
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
                                $("#loader_cidade").hide()
                            })
                            .fail(function () {
                                iziToast.error({
                                    title: 'Erro',
                                    message: 'Consulta não realizada, verifique sua conexão',
                                });
                            })
                        ;
                    }
                });

                /**
                 * Function para o select Estado ENDEREÇO
                 */
                $('[name="endereco_id_estado"]').on('change', function () {
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
                                $("#loader_cidade_end").hide()
                            })
                            .fail(function () {
                                iziToast.error({
                                    title: 'Erro',
                                    message: 'Consulta não realizada, verifique sua conexão',
                                });
                            })
                        ;
                    }
                });
            });
        </script>
    @endif
@endsection
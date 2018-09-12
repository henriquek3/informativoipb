@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <div class="ui clearing"></div>
    <div class="ui raised segment"><a class="ui right floated blue tiny button" href="/cadastros/sinodos"><i
                    class="reply icon"></i>Voltar</a>
        <h3 class="ui floated header" style="padding-top: 6px;padding-left: 10px;"><i class="edit outline icon"></i>
        </h3>
        <h1 class="ui floated header" style="margin-left: -10px;">Relatório do Conselho

        </h1>
        <div class="ui clearing divider"></div>
        <p></p>
        <form id="formDelete" name="formDelete" action="{{ url()->current() }}" method="post">
            @csrf @method("delete")
        </form>
        <form id="formResource" name="formResource" method="POST" action="{{url()->current()}}">
            @csrf @isset($resource) @method('put') @endisset
            <div class="ui form segment">
                <div class="fields">
                    <div class="two wide field">
                        <label>Ano</label>
                        <input name="ano" type="text" readonly="" value="{{Date('Y')}}">
                    </div>
                    <div class="seven wide field">
                        <label>Sínodo</label>
                        <input type="text" readonly=""
                               @if(!is_null(auth()->user()->pastor())) value="{{auth()->user()->pastor()->igreja->presbiterio->sinodo->sigla . ' / ' . auth()->user()->pastor()->igreja->presbiterio->sinodo->nome}}" @endif>
                        <input type="hidden" name="id_sinodo"
                               @if(!is_null(auth()->user()->pastor())) value="{{auth()->user()->pastor()->igreja->presbiterio->sinodo->id}}" @endif>
                    </div>
                    <div class="seven wide field" id="div_presbiterio">
                        <label>Presbitério</label>
                        <input type="text"
                               @if(!is_null(auth()->user()->pastor())) value="{{ auth()->user()->pastor()->igreja->presbiterio->sigla . ' / ' . auth()->user()->pastor()->igreja->presbiterio->nome}}"
                               @endif readonly="">
                        <input type="hidden" name="id_presbiterio"
                               @if(!is_null(auth()->user()->pastor())) value="{{auth()->user()->pastor()->igreja->presbiterio->id}}" @endif>
                    </div>

                </div>

            </div>
            <div class="ui segments">
                <div class="ui red segment" style="text-align: center; background-color: #F9FAFB">
                    <p><strong>I - Identificação da Igreja / Congregação Presbiterial</strong></p>
                </div>
                <div class="ui form segment">
                    <div class="fields">
                        <div class="two wide field" data-tooltip="Este valor não pode ser alterado.">
                            <label>ID</label>
                            <input type="text" readonly="" name="id_igreja" value="{{auth()->user()->presbitero->id}}">
                        </div>
                        <div class="fourteen wide field">
                            <label>Nome (Igreja/Congregação)</label>
                            <input type="text" readonly="" name="nome_igreja" value="{{auth()->user()->presbitero->igreja->nome}}">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="eight wide field">
                            <label>Endereço</label>
                            <input type="text" readonly="" name="endereco" value="{{auth() ->user() ->presbitero->igreja->endereco}}">
                        </div>
                        <div class="two wide field">
                            <label>Número</label>
                            <input type="text" readonly="" name="endereco_numero" value="{{auth() ->user() ->presbitero->igreja->endereco_numero}}">
                        </div>
                        <div class="three wide field">
                            <label>Complemento</label>
                            <input type="text" readonly="" name="endereco_complemento" value="{{auth() ->user() ->presbitero->igreja->endereco_complemento}}">
                        </div>
                        <div class="three wide field">
                            <label>Bairro</label>
                            <input type="text" readonly="" name="endereco_bairro"  value="{{auth() ->user() ->presbitero->igreja->endereco_bairro}}">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="four wide field">
                            <label>Estado</label>
                            <input type="text" readonly="" name="estado"  value="{{auth() ->user() ->presbitero->igreja->cidade->estado->nome}}">
                        </div>
                        <div class="four wide field">
                            <label>Cidade</label>
                            <input type="text" readonly="" name="cidade"  value="{{auth() ->user() ->presbitero->igreja->cidade->nome}}">
                        </div>
                        <div class="three wide field">
                            <label>CEP</label>
                            <input type="text" readonly="" name="endereco_cep"  value="{{auth() ->user() ->presbitero->igreja->endereco_cep}}">
                        </div>
                        <div class="two wide field">
                            <label>Cx. P</label>
                            <input type="text" readonly="" name="endereco_cx_postal"  value="{{auth() ->user() ->presbitero->igreja->endereco_cx_postal}}">
                        </div>
                        <div class="three wide field">
                            <label>CEP Cx. P</label>
                            <input type="text" readonly="" name="endereco_cx_postal_cep"  value="{{auth() ->user() ->presbitero->igreja->endereco_cx_postal_cep}}">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="two wide field">
                            <label>Telefone</label>
                            <input type="text" readonly="" name="telefone"  value="{{auth() ->user() ->presbitero->igreja->telefone}}">
                        </div>
                        <div class="four wide field">
                            <label>E-Mail</label>
                            <input type="text" readonly="" name="email"  value="{{auth() ->user() ->presbitero->igreja->email}}">
                        </div>
                        <div class="four wide field">
                            <label>HomePage</label>
                            <input type="text" readonly="" name="homepage"  value="{{auth() ->user() ->presbitero->igreja->website}}">
                        </div>
                        <div class="three wide field">
                            <label>CNPJ</label>
                            <input type="text" readonly="" name="cnpj"  value="{{auth() ->user() ->presbitero->igreja->cnpj}}">
                        </div>
                        <div class="three wide field">
                            <label>Data Organização</label>
                            <input type="text" readonly="" name="data_organizacao"  value="{{auth() ->user() ->presbitero->igreja->data_organizacao}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui segments">
                <div class="ui red segment" style="text-align: center; background-color: #F9FAFB">
                    <p><strong>II - INFORMAÇÕES DO TRABALHO</strong></p>
                </div>
                <div class="ui form segment">
                    <div class="ui red ribbon label" style="font-size:0.92857143em;">1. ORGANIZAÇÃO</div>
                    <strong style="color:#FF695E;">1.1. ORGANIZAÇÃO</strong>
                </div>
                <div class="ui form segment">
                    <div class="inline fields">
                        <div class="eight wide field"
                             data-tooltip="Os imóveis que pertencem a igreja estão devidamente documentados?">
                            <div class="ten wide field"><span class="ui label">1.1.1</span>
                                <label>Imóveis Documentados</label>
                            </div>
                            <div class="six wide field">
                                <div class="ui radio checkbox">
                                    <input name="or_imovel_documentado" type="radio" value="1" {{isset($resource) ? $resource->or_imovel_documentado === 1 ? 'checked' : '' : ''}}>
                                    <label>Sim</label>
                                </div>
                                <div class="ui radio checkbox">
                                    <input name="or_imovel_documentado" type="radio" value="0" {{isset($resource) ? $resource->or_imovel_documentado === 0 ? 'checked' : '' : ''}}>
                                    <label>Não</label>
                                </div>
                            </div>
                        </div>
                        <div class="eight wide field"
                             data-tooltip="A igreja apresentou no ano passado quais declarações Fiscais?">
                            <div class="eight wide field"><span class="ui label">1.1.4</span>
                                <label>Declarações Anteriores</label>
                            </div>
                            <div class="eight wide field">
                                <div class="ui checkbox">
                                    <input name="or_declaracao_ano_anterior_irenda" value="1" type="checkbox">
                                    <label>IRenda</label>
                                </div>
                                <div class="ui checkbox">
                                    <input name="or_declaracao_ano_anterior_rais" value="1" type="checkbox">
                                    <label>RAIS</label>
                                </div>
                                <div class="ui checkbox">
                                    <input name="or_declaracao_ano_anterior_dirf" value="1" type="checkbox">
                                    <label>DIRF</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="inline fields">
                        <div class="eight wide field"
                             data-tooltip="A igreja organizou o inventário dos imóveis e utensílios?">
                            <div class="ten wide field"><span class="ui label">1.1.2.</span>
                                <label>Inventário patrimonial</label>
                            </div>
                            <div class="six wide field">
                                <div class="ui radio checkbox">
                                    <input name="or_inventario_existe" type="radio" value="1" {{isset($resource) ? $resource->or_inventario_existe === 1 ? 'checked' : '' : ''}}>
                                    <label>Sim</label>
                                </div>
                                <div class="ui radio checkbox">
                                    <input name="or_inventario_existe" type="radio" value="0" {{isset($resource) ? $resource->or_inventario_existe === 1 ? 'checked' : '' : ''}}>
                                    <label>Não</label>
                                </div>
                            </div>
                        </div>
                        <div class="eight wide field"
                             data-tooltip="Caso a igreja tenha inventário, ele esta devidamente atualizado?">
                            <div class="ten wide field"><span class="ui label">1.1.5.</span>
                                <label>Inventário atualizado</label>
                            </div>
                            <div class="six wide field">
                                <div class="ui radio checkbox">
                                    <input name="or_inventario_atualizado" type="radio" value="1" {{isset($resource) ? $resource->or_inventario_atualizado === 1 ? 'checked' : '' : ''}}>
                                    <label>Sim</label>
                                </div>
                                <div class="ui radio checkbox">
                                    <input name="or_inventario_atualizado" type="radio" value="0" {{isset($resource) ? $resource->or_inventario_atualizado === 0 ? 'checked' : '' : ''}}>
                                    <label>Não</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="inline fields">
                        <div class="eight wide field" data-tooltip="A igreja conta com o rol de membro atualizado?">
                            <div class="ten wide field"><span class="ui label">1.1.3.</span>
                                <label>Rol de membros Atualizado</label>
                            </div>
                            <div class="six wide field">
                                <div class="ui radio checkbox">
                                    <input name="or_rol_membros_atualizado" type="radio" value="1" {{isset($resource) ? $resource->or_rol_membros_atualizado === 1 ? 'checked' : '' : ''}}>
                                    <label>Sim</label>
                                </div>
                                <div class="ui radio checkbox">
                                    <input name="or_rol_membros_atualizado" type="radio" value="0" {{isset($resource) ? $resource->or_rol_membros_atualizado === 0 ? 'checked' : '' : ''}}>
                                    <label>Não</label>
                                </div>
                            </div>
                        </div>
                        <div class="eight wide field"
                             data-tooltip="Quantas congregações estão vinculadas a igreja?">
                            <div class="ten wide field"><span class="ui label">1.1.6.</span>
                                <label>Quantidade congregações?</label>
                            </div>
                            <div class="six wide field">
                                <input type="text" value="{{ $resource->or_nr_congregacoes ?? "" }}" name="or_nr_congregacoes">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui segment">
                    <div class="ui red ribbon label" style="font-size:0.92857143em;">2. SUPERVISÃO ESPIRITUAL</div>
                    <strong style="color:#FF695E;">2.1. ADORAÇÃO E COMUNHÃO</strong>
                </div>
                <div class="ui form segment">
                    <div class="inline fields">
                        <div class="sixteen wide field" data-tooltip="Quantidade de cerimônias realizadas">
                            <div class="four wide field"><span class="ui label">2.1.1</span>
                                <label>Santa Ceia - Grupos</label>
                            </div>
                            <div class="two wide field">
                                <input type="text" value="{{ $resource->se_santaceia_grupos ?? "" }}" name="se_santaceia_grupos">
                            </div>
                            <div class="four wide field">
                                <label>Santa Ceia - Individual</label>
                            </div>
                            <div class="two wide field">
                                <input type="text" name="se_santaceia_individual" value="{{ $resource->se_santaceia_individual ?? "" }}">
                            </div>
                            <div class="four wide field disabled">
                                <div class="ui labeled input">
                                    <div class="ui label">Total</div>
                                    <input type="text" id="somaCeia">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui segment">
                    <div class="ui red ribbon label" style="font-size:0.92857143em;">2. SUPERVISÃO ESPIRITUAL</div>
                    <strong style="color:#FF695E;">2.2. EVANGELIZAÇÃO E MISSÕES</strong>
                </div>
                <div class="ui form segment">
                    <div class="inline fields">
                        <div class="five wide field"
                             data-tooltip="Qual o número de atividades evangelísticas realizadas?">
                            <label>2.2.1. Nº de atividades evangelísticas:*</label>
                        </div>
                        <div class="two wide field">
                            <input type="text" value="{{ $resource->se_atividades_evangelisticas ?? "" }}" name="se_atividades_evangelisticas">
                        </div>
                        <div class="ui tiny message">
                            <label>* em templos e residências; recintos públicos ou ar livre; imprensa escrita,
                                rádio e TV, etc.</label>
                        </div>
                    </div>
                    <div class="inline fields">
                        <div class="five wide field" data-tooltip="Quantas literaturas foram distribuídas?">
                            <label>2.2.2. Textos distribuídos:</label>
                        </div>
                        <div class="one wide field">
                            <label>Bíblias</label>
                        </div>
                        <div class="one wide field">
                            <input type="text" value="{{ $resource->se_textos_distribuidos_biblia ?? "" }}" name="se_textos_distribuidos_biblia">
                        </div>
                        <div class="one wide field" data-tooltip="Novo Testamento">
                            <label>N.T.</label>
                        </div>
                        <div class="one wide field">
                            <input type="text" value="{{ $resource->se_textos_distribuidos_nt ?? "" }}" name="se_textos_distribuidos_nt">
                        </div>
                        <div class="one wide field">
                            <label>Folhetos</label>
                        </div>
                        <div class="one wide field">
                            <input type="text" value="{{ $resource->se_textos_distribuidos_folhetos ?? "" }}" name="se_textos_distribuidos_folhetos">
                        </div>
                        <div class="one wide field">
                            <label>Outros</label>
                        </div>
                        <div class="one wide field">
                            <input type="text" value="{{ $resource->se_textos_distribuidos_outros ?? "" }}" name="se_textos_distribuidos_outros">
                        </div>
                        <div class="one wide field">
                            <label>Total</label>
                        </div>
                        <div class="two wide field">
                            <input type="text" id="somaTextos">
                        </div>
                    </div>
                    <div class="inline fields">
                        <div class="five wide field" data-tooltip="Qual trabalho missionário realizado?">
                            <label>2.2.3. Trabalho missionário com:</label>
                        </div>
                        <div class="two wide field ui checkbox">
                            <label>JMN</label>
                            <input name="se_trabalho_missionario_jmn" type="checkbox" value="1">
                        </div>
                        <div class="two wide field ui checkbox">
                            <label>APMT</label>
                            <input name="se_trabalho_missionario_apmt" type="checkbox" value="1">
                        </div>
                        <div class="three wide field ui checkbox">
                            <label>Parceria com o PMC</label>
                            <input name="se_trabalho_missionario_pmc" type="checkbox" value="1">
                        </div>
                        <div class="three wide field ui checkbox">
                            <label>Plantação de Igrejas</label>
                            <input name="se_trabalho_missionario_plantacao" type="checkbox" value="1">
                        </div>
                    </div>
                    <div class="inline fields">
                        <div class="five wide field">
                            <label>2.2.4.Outra participação missionária:</label>
                        </div>
                        <div class="eleven wide field">
                            <input type="text" value="{{ $resource->se_trabalho_misisonario_outros ?? "" }}" name="se_trabalho_misisonario_outros">
                        </div>
                    </div>
                </div>
                <div class="ui segment">
                    <div class="ui red ribbon label" style="font-size:0.92857143em;">2. SUPERVISÃO ESPIRITUAL</div>
                    <strong style="color:#FF695E;">2.3 EDUCAÇÃO E APERFEIÇOAMENTO</strong>
                </div>
                <div class="ui form segment">
                    <div class="inline fields">
                        <div class="four wide field" data-tooltip="Houve aperfeiçoamento para Professores EBD?">
                            <label>2.3.1. Para professores de Escola Dominical:</label>
                        </div>
                        <div class="two wide field">
                            <label>Sim</label>
                            <input name="se_professores_ebd" type="radio" value="1" {{isset($resource) ? $resource->se_professores_ebd === 1 ? 'checked' : '' : ''}}>
                            <label>Não</label>
                            <input name="se_professores_ebd" type="radio" value="0" {{isset($resource) ? $resource->se_professores_ebd === 0 ? 'checked' : '' : ''}}>
                        </div>
                        <div class="three wide field"
                             data-tooltip="Houve aperfeiçoamento para Liderança da Igreja?">
                            <label>2.3.4. Para Liderança:</label>
                        </div>
                        <div class="two wide field">
                            <label>Sim</label>
                            <input name="se_lideranca" type="radio" value="1" {{isset($resource) ? $resource->se_lideranca === 1 ? 'checked' : '' : ''}}>
                            <label>Não</label>
                            <input name="se_lideranca" type="radio" value="0" {{isset($resource) ? $resource->se_lideranca === 0 ? 'checked' : '' : ''}}>
                        </div>
                    </div>
                    <div class="inline fields">
                        <div class="four wide field" data-tooltip="Houve aperfeiçoamento para Equipe Musical?">
                            <label>2.3.2. Para Equipe de Música:</label>
                        </div>
                        <div class="two wide field">
                            <label>Sim</label>
                            <input name="se_equipes_musicas" type="radio" value="1" {{isset($resource) ? $resource->se_equipes_musicas === 1 ? 'checked' : '' : ''}}>
                            <label>Não</label>
                            <input name="se_equipes_musicas" type="radio" value="0" {{isset($resource) ? $resource->se_equipes_musicas === 0 ? 'checked' : '' : ''}}>
                        </div>
                        <div class="three wide field" data-tooltip="Número de Corais na Igreja">
                            <label>2.3.5. Nº de Grupos Corais:</label>
                        </div>
                        <div class="two wide field">
                            <input type="text" value="{{ $resource->se_grupos_corais ?? "" }}" name="se_grupos_corais">
                        </div>
                    </div>
                    <div class="inline fields">
                        <div class="four wide field"
                             data-tooltip="Houve aperfeiçoamento para Presbíteros e Diáconos?">
                            <label>2.3.3. Para Oficiais (Presbíteros e Diáconos)</label>
                        </div>
                        <div class="two wide field">
                            <label>Sim</label>
                            <input name="se_oficiais" type="radio" value="1" {{isset($resource) ? $resource->se_oficiais === 1 ? 'checked' : '' : ''}}>
                            <label>Não</label>
                            <input name="se_oficiais" type="radio" value="0" {{isset($resource) ? $resource->se_oficiais === 0 ? 'checked' : '' : ''}}>
                        </div>
                        <div class="three wide field" data-tooltip="Quantas equipes musicais há na Igreja?">
                            <label>2.3.6. Nº de Conjuntos Musicais:</label>
                        </div>
                        <div class="two wide field">
                            <input type="text" value="{{ $resource->se_conjuntos_musicas ?? "" }}" name="se_conjuntos_musicas">
                        </div>
                    </div>
                </div>
                <div class="ui segment">
                    <div class="ui red ribbon label" style="font-size:0.92857143em;">2. SUPERVISÃO ESPIRITUAL</div>
                    <strong style="color:#FF695E;">2.4 AÇÃO SOCIAL E VISITAÇÃO</strong>
                </div>
                <div class="ui form segment">
                    <div class="inline fields">
                        <div class="six wide field"
                             data-tooltip="Nº de atos benificientes realizados pela Junta Diaconal.">
                            <label>2.4.1.Nº de atos beneficentes realizados pela Junta Diaconal:</label>
                        </div>
                        <div class="two wide field">
                            <input type="text" value="{{ $resource->se_beneficientes_jdiaconal ?? "" }}" name="se_beneficientes_jdiaconal">
                        </div>
                        <div class="three wide field"
                             data-tooltip="Nº de atos benificientes realizados por outro Departamento.">
                            <label>Por outros departamentos:</label>
                        </div>
                        <div class="two wide field">
                            <input type="text" value="{{ $resource->se_beneficientes_outros ?? "" }}" name="se_beneficientes_outros">
                        </div>
                        <div class="one wide field">
                            <label>Total</label>
                        </div>
                        <div class="two wide field">
                            <input type="text" id="somaBeneficientes">
                        </div>
                    </div>
                    <div class="inline fields">
                        <div class="six wide field"
                             data-tooltip="Nº de visitas realizadas por Presbíteros e Diáconos.">
                            <label>2.4.2.Nº de visitas feitas por presbíteros e diáconos:</label>
                        </div>
                        <div class="two wide field">
                            <input type="text" value="{{ $resource->se_visitas_presbiteros_diaconos ?? "" }}" name="se_visitas_presbiteros_diaconos">
                        </div>
                        <div class="three wide field"
                             data-tooltip="Nº de visitas realizadas por outro Departamento.">
                            <label>Por outros departamentos:</label>
                        </div>
                        <div class="two wide field">
                            <input type="text" value="{{ $resource->se_visitas_outros ?? "" }}" name="se_visitas_outros">
                        </div>
                        <div class="one wide field">
                            <label>Total</label>
                        </div>
                        <div class="two wide field">
                            <input type="text" id="somaVisitas">
                        </div>
                    </div>
                </div>
                <div class="ui segment">
                    <div class="ui red ribbon label" style="font-size:0.92857143em;">3. SUPERVISÃO ADMINISTRATIVA
                    </div>
                    <strong style="color:#FF695E;">3.1. SUPERVISÃO ADMINISTRATIVA</strong>
                </div>
                <div class="ui form segment">
                    <div class="inline fields">
                        <div class="eight wide field">
                            <label>3.1. A Igreja enviou fielmente os Dízimos dos Dízimos à Tesouraria IPB:</label>
                        </div>
                        <div class="one wide field">
                            <label>Sim</label>
                            <input name="sa_dizimo_fidelidade" type="radio" value="1" {{isset($resource) ? $resource->sa_dizimo_fidelidade === 1 ? 'checked' : '' : ''}}>
                        </div>
                        <div class="one wide field">
                            <label>Não</label>
                            <input name="sa_dizimo_fidelidade" type="radio" value="0" {{isset($resource) ? $resource->sa_dizimo_fidelidade === 0 ? 'checked' : '' : ''}}>
                        </div>
                    </div>
                </div>
                <div class="ui form segment">
                    <div class="ui top left attached label">REUNIÕES</div>
                    <div class="inline fields">
                        <div class="four wide field">
                            <label>3.2. Conselho:</label>
                        </div>
                        <div class="four wide field">
                            <select class="ui fluid search dropdown" name="sa_reunioes_conselho">
                                <option value="1">Igreja</option>
                                <option value="2">Congregação Presbiterial</option>
                                <option value="3">Ambas</option>
                            </select>
                        </div>
                        <div class="four wide field">
                            <label>3.5. Mesa Administrativa da Cong. Presbiterial:</label>
                        </div>
                        <div class="four wide field">
                            <select class="ui fluid search dropdown" name="sa_reunioes_mesa_administrativa">
                                <option value="1">Igreja</option>
                                <option value="2">Congregação Presbiterial</option>
                                <option value="3">Ambas</option>
                            </select>
                        </div>
                    </div>
                    <div class="inline fields">
                        <div class="four wide field">
                            <label>3.3. Junta Diaconal:</label>
                        </div>
                        <div class="four wide field">
                            <select class="ui fluid search dropdown" name="sa_reunioes_jdiaconal">
                                <option value="1">Igreja</option>
                                <option value="2">Congregação Presbiterial</option>
                                <option value="3">Ambas</option>
                            </select>
                        </div>
                        <div class="four wide field">
                            <label>3.6. Comissão de Exame de Contas da Tesouraria:</label>
                        </div>
                        <div class="four wide field">
                            <select class="ui fluid search dropdown" name="sa_reunioes_tesouraria">
                                <option value="1">Igreja</option>
                                <option value="2">Congregação Presbiterial</option>
                                <option value="3">Ambas</option>
                            </select>
                        </div>
                    </div>
                    <div class="inline fields">
                        <div class="four wide field">
                            <label>3.4. Assembléia Geral:</label>
                        </div>
                        <div class="four wide field">
                            <select class="ui fluid search dropdown" name="sa_reunioes_assembleia">
                                <option value="1">Igreja</option>
                                <option value="2">Congregação Presbiterial</option>
                                <option value="3">Ambas</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="ui form segment">
                    <div class="inline fields">
                        <div class="seven wide field">
                            <label>3.7. Houve exame/aprovação balancetes da tesouraria?</label>
                        </div>
                        <div class="one wide field">
                            <label>Sim</label>
                            <input name="sa_balancete_tesouraria" type="radio" value="1" {{isset($resource) ? $resource->sa_balancete_tesouraria === 1 ? 'checked' : '' : ''}}>
                        </div>
                        <div class="one wide field">
                            <label>Não</label>
                            <input name="sa_balancete_tesouraria" type="radio" value="0" {{isset($resource) ? $resource->sa_balancete_tesouraria === 0 ? 'checked' : '' : ''}}>
                        </div>
                    </div>
                    <div class="inline fields">
                        <div class="seven wide field">
                            <label>3.8. Há oficiais com mandato a vencer no ano a seguir?</label>
                        </div>
                        <div class="one wide field">
                            <label>Sim</label>
                            <input name="sa_officiais_venc" type="radio" value="1" {{isset($resource) ? $resource->sa_officiais_venc === 1 ? 'checked' : '' : ''}}>
                        </div>
                        <div class="one wide field">
                            <label>Não</label>
                            <input name="sa_officiais_venc" type="radio" value="0" {{isset($resource) ? $resource->sa_officiais_venc === 0 ? 'checked' : '' : ''}}>
                        </div>
                    </div>
                    <div class="inline fields">
                        <div class="two wide field"
                             data-tooltip="Nº Presbíteros com mandato a vencer no próximo ano.">
                            <label>Nº Presbíteros:</label>
                        </div>
                        <div class="two wide field">
                            <input type="text" value="{{ $resource->sa_officiais_venc_presbiteros ?? "" }}" name="sa_officiais_venc_presbiteros">
                        </div>
                        <div class="two wide field" data-tooltip="Nº Diáconos com mandato a vencer no próximo ano.">
                            <label>Nº Diáconos</label>
                        </div>
                        <div class="two wide field">
                            <input type="text" value="{{ $resource->sa_officiais_venc_diaconos ?? "" }}" name="sa_officiais_venc_diaconos">
                        </div>
                    </div>
                    <div class="inline fields">
                        <div class="three wide field">
                            <label>Quais?</label>
                        </div>
                    </div>
                    <div class="inline fields">
                        <div class="sixteen wide field">
                                <textarea rows="4" name="sa_oficiais_vencimento"
                                          placeholder="Escreva os nomes dos Presbíteros/Diáconos que estão com mandatos a vencer">{{ $resource->sa_oficiais_vencimento ?? "" }}</textarea>
                        </div>
                    </div>
                    <div class="inline fields">
                        <div class="one wide field">
                            <label>FAP?</label>
                        </div>
                        <div class="one wide field">
                            <label>Sim</label>
                            <input name="sa_fap" type="radio" value="1" {{isset($resource) ? $resource->sa_fap === 1 ? 'checked' : '' : ''}}>
                        </div>
                        <div class="one wide field">
                            <label>Não</label>
                            <input name="sa_fap" type="radio" value="0" {{isset($resource) ? $resource->sa_fap === 0 ? 'checked' : '' : ''}}>
                        </div>
                        <div class="one wide field"></div>
                        <div class="two wide field">
                            <label>IPB-PREV?</label>
                        </div>
                        <div class="one wide field">
                            <label>Sim</label>
                            <input name="sa_ipb_prev" type="radio" value="1" {{isset($resource) ? $resource->sa_ipb_prev === 1 ? 'checked' : '' : ''}}>
                        </div>
                        <div class="one wide field">
                            <label>Não</label>
                            <input name="sa_ipb_prev" type="radio" value="0" {{isset($resource) ? $resource->sa_ipb_prev === 0 ? 'checked' : '' : ''}}>
                        </div>
                    </div>
                    <div class="inline fields">
                        <div class="six wide field">
                            <label>3.9. Idem, dos livros e relatórios das sociedades?</label>
                        </div>
                        <div class="one wide field">
                            <label>Sim</label>
                            <input name="sa_idem_livros_sociedades" type="radio" value="1" {{isset($resource) ? $resource->sa_idem_livros_sociedades === 1 ? 'checked' : '' : ''}}>
                        </div>
                        <div class="one wide field">
                            <label>Não</label>
                            <input name="sa_idem_livros_sociedades" type="radio" value="0" {{isset($resource) ? $resource->sa_idem_livros_sociedades === 0 ? 'checked' : '' : ''}}>
                        </div>
                        <div class="six wide field">
                            <label>3.11. Houve contribuição para causas extra-locais?</label>
                        </div>
                        <div class="one wide field">
                            <label>Sim</label>
                            <input name="sa_contribuicao_extra" type="radio" value="1" {{isset($resource) ? $resource->sa_contribuicao_extra === 1 ? 'checked' : '' : ''}}>
                        </div>
                        <div class="one wide field">
                            <label>Não</label>
                            <input name="sa_contribuicao_extra" type="radio" value="0" {{isset($resource) ? $resource->sa_contribuicao_extra === 0 ? 'checked' : '' : ''}}>
                        </div>
                    </div>
                    <div class="inline fields">
                        <div class="six wide field">
                            <label>3.10. Houve nomeação de conselheiros às Sociedades?</label>
                        </div>
                        <div class="one wide field">
                            <label>Sim</label>
                            <input name="sa_nomeacao" type="radio" value="1" {{isset($resource) ? $resource->sa_nomeacao === 1 ? 'checked' : '' : ''}}>
                        </div>
                        <div class="one wide field">
                            <label>Não</label>
                            <input name="sa_nomeacao" type="radio" value="0" {{isset($resource) ? $resource->sa_nomeacao === 0 ? 'checked' : '' : ''}}>
                        </div>
                        <div class="six wide field">
                            <label>3.12. Contribuiu com Previdência Social pastor(es)?</label>
                        </div>
                        <div class="one wide field">
                            <label>Sim</label>
                            <input name="sa_contribuicao_previdencia" type="radio" value="1" {{isset($resource) ? $resource->sa_contribuicao_previdencia === 1 ? 'checked' : '' : ''}}>
                        </div>
                        <div class="one wide field">
                            <label>Não</label>
                            <input name="sa_contribuicao_previdencia" type="radio" value="0" {{isset($resource) ? $resource->sa_contribuicao_previdencia === 0 ? 'checked' : '' : ''}}>
                        </div>
                    </div>
                    <div class="inline fields">
                        <div class="eight wide field">
                            <label>3.13. Reforma e/ou Construção em projeto:</label>
                        </div>
                        <div class="eight wide field">
                            <label>3.14. Reforma e/ou Construção em andamento:</label>
                        </div>
                    </div>
                    <div class="inline fields">
                        <div class="eight wide field">
                                <textarea rows="4" name="sa_reforma_construcao_projeto"
                                          placeholder="Cite a(s) reforma(s) ou contrução(ões) que estão no projeto.">{{ $resource->sa_reforma_construcao_projeto ?? "" }}</textarea>
                        </div>
                        <div class="eight wide field">
                                <textarea rows="4" name="sa_reforma_construcao_andamento"
                                          placeholder="Cite a(s) reforma(s) ou contrução(ões) que estão em andamento.">{{ $resource->sa_reforma_construcao_andamento ?? "" }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="ui segment">
                    <div class="ui red ribbon label" style="font-size:0.92857143em;">4. PLANEJAMENTO ESTRATÉGICO
                    </div>
                    <strong style="color:#FF695E;">4.1. PLANEJAMENTO ESTRATÉGICO</strong>
                </div>
                <div class="ui form segment">
                    <div class="inline fields">
                        <div class="six wide field">
                            <label>4.1 A Igreja tem Planejamento Estratégico?</label>
                        </div>
                        <div class="one wide field">
                            <label>Sim</label>
                            <input name="pe_tem_planejamento_estrategico" type="radio" value="1" {{isset($resource) ? $resource->pe_tem_planejamento_estrategico === 1 ? 'checked' : '' : ''}}>
                        </div>
                        <div class="one wide field">
                            <label>Não</label>
                            <input name="pe_tem_planejamento_estrategico" type="radio" value="0" {{isset($resource) ? $resource->pe_tem_planejamento_estrategico === 0 ? 'checked' : '' : ''}}>
                        </div>
                    </div>
                    <div class="inline fields">
                        <div class="eight wide field">
                            <label>4.2. Quais os objetivos propostos e alcançados?</label>
                        </div>
                        <div class="eight wide field">
                            <label>4.3. Quais os objetivos propostos e NÃO alcançados? Identificar as
                                dificuldades.</label>
                        </div>
                    </div>
                    <div class="inline fields">
                        <div class="eight wide field">
                                <textarea rows="4" name="pe_objetivos_alcancados"
                                          placeholder="Cite os objetivos que foram propostos e alcançados.">{{ $resource->pe_objetivos_alcancados ?? "" }}</textarea>
                        </div>
                        <div class="eight wide field">
                                <textarea rows="4" name="pe_objetivos_falhos"
                                          placeholder="Cite os objetivos que foram propostos mas NÃO foram alcançados."> {{ $resource->pe_objetivos_falhos ?? "" }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="ui segment">
                    <div class="ui red ribbon label" style="font-size:0.92857143em;">5. PATRIMÔNIO</div>
                    <strong style="color:#FF695E;">5.1 PATRIMÔNIO</strong>
                </div>
                <div class="ui form segment">
                    <div class="inline fields">
                        <div class="six wide field">
                            <label>5.1. A Igreja tem Seguro do bem patrimonial?</label>
                        </div>
                        <div class="one wide field">
                            <label>Sim</label>
                            <input name="pat_seguro_patrimonial" type="radio" value="1" {{isset($resource) ? $resource->pat_seguro_patrimonial === 1 ? 'checked' : '' : ''}}>
                        </div>
                        <div class="one wide field">
                            <label>Não</label>
                            <input name="pat_seguro_patrimonial" type="radio" value="0" {{isset($resource) ? $resource->pat_seguro_patrimonial === 0 ? 'checked' : '' : ''}}>
                        </div>
                        <div class="six wide field">
                            <label>5.2. Tem Alvará de Funcionamento?</label>
                        </div>
                        <div class="one wide field">
                            <label>Sim</label>
                            <input name="pat_alvara" type="radio" value="1" {{isset($resource) ? $resource->pat_alvara === 1 ? 'checked' : '' : ''}}>
                        </div>
                        <div class="one wide field">
                            <label>Não</label>
                            <input name="pat_alvara" type="radio" value="0" {{isset($resource) ? $resource->pat_alvara === 0 ? 'checked' : '' : ''}}>
                        </div>
                    </div>
                    <div class="inline fields">
                        <div class="six wide field">
                            <label>5.3. Tem Licença do Corpo de Bombeiros em dia?</label>
                        </div>
                        <div class="one wide field">
                            <label>Sim</label>
                            <input name="pat_licenca_bombeiros" type="radio" value="1" {{isset($resource) ? $resource->pat_licenca_bombeiros === 1 ? 'checked' : '' : ''}}>
                        </div>
                        <div class="one wide field">
                            <label>Não</label>
                            <input name="pat_licenca_bombeiros" type="radio" value="0" {{isset($resource) ? $resource->pat_licenca_bombeiros === 0 ? 'checked' : '' : ''}}>
                        </div>
                        <div class="six wide field">
                            <label>5.4. Tem Certificado Digital?</label>
                        </div>
                        <div class="one wide field">
                            <label>Sim</label>
                            <input name="pat_certificado_digital" type="radio" value="1" {{isset($resource) ? $resource->pat_certificado_digital === 1 ? 'checked' : '' : ''}}>
                        </div>
                        <div class="one wide field">
                            <label>Não</label>
                            <input name="pat_certificado_digital" type="radio" value="0" {{isset($resource) ? $resource->pat_certificado_digital === 0 ? 'checked' : '' : ''}}>
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
            <div class="ui clearing divider"></div>
            <div style="text-align: center">
                <button class="ui green labeled icon button" type="submit"><i class="plus icon"></i>Salvar</button>
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
    <script src="{{asset('js/plugins/jquery.mask.min.js')}}"></script>
    <script>
        window.addEventListener("load", function () {
            $('.money').mask("#.##0,00", {reverse: true});
            $('.ui.dropdown').dropdown();
            $('[name="status_relatorio"]').change(function () {
                if (this.checked) {
                    $('input').attr('disabled', true);
                    $('select').attr('disabled', true);
                    $('textarea').attr('disabled', true);
                    $('.selection').addClass('disabled');
                    $('[type="hidden"]').attr('disabled', false);
                    this.disabled = false;
                } else {
                    $('input').attr('disabled', false);
                    $('select').attr('disabled', false);
                    $('textarea').attr('disabled', false);
                    $('.selection').removeClass('disabled');
                }
            }).trigger('change');
        });
    </script>
    @isset($resource)

    @else
        <script>
            window.addEventListener("load", function () {
                $('[type="number"]').val(0)
            });
        </script>
    @endisset
@endsection
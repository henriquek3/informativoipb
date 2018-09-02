@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <div class="ui clearing"></div>
    <div class="ui raised segment">
        <a class="ui right floated blue tiny button" href="/cadastros/sinodos">
            <i class="reply icon"></i>Voltar</a>
        <h3 class="ui floated header" style="padding-top: 6px;padding-left: 10px;"><i class="big browser icon"></i>
        </h3>
        <h1 class="ui floated header" style="margin-left: -10px;">Relatório Ministerial
            <div class="sub header" style="margin-left: -40px;">Informações referentes aos ministros presbiterianos.
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
                    <h3>Relatório do Ministro Presbiteriano</h3>
                </div>
                <div class="ui form segment">
                    <div class="fields">
                        <div class="two wide field">
                            <label>Ano</label>
                            <input name="ano" type="text" readonly="" value="{{Date('Y')}}">
                        </div>
                        <div class="four wide field">
                            <label>Sínodo</label>
                            <input type="text" readonly=""
                                   value="{{auth()->user()->presbitero->igreja->presbiterio->sinodo->sigla . ' / ' . auth()->user()->presbitero->igreja->presbiterio->sinodo->nome}}">
                        </div>
                        <div class="five wide field" id="div_presbiterio">
                            <label>Presbitério</label>
                            <input type="text"
                                   value="{{ auth()->user()->presbitero->igreja->presbiterio->sigla . ' / ' . auth()->user()->presbitero->igreja->presbiterio->nome}}"
                                   readonly="">
                        </div>
                        <div class="five wide field">
                            <label>Igreja</label>
                            <input type="text" value="{{auth()->user()->presbitero->igreja->nome}} " readonly="">
                            <input type="hidden" name="id_igreja" value="{{auth()->user()->presbitero->igreja->id}}">
                        </div>
                    </div>
                </div>
            </div> <!-- Header -->

            <div class="ui segments">
                <div class="ui green segment" style="text-align: center; background-color: #F9FAFB">
                    <h3>I - Identificação do Ministro</h3>
                </div>
                <div class="ui form segment">
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label>Nome</label>
                            <input type="text" value="{{auth()->user()->pastor()->nome}}" readonly="">
                            <input type="hidden" readonly="" name="id_presbitero"
                                   value="{{auth()->user()->pastor()->id}}">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="eight wide field">
                            <label>Nome do Pai</label>
                            <input type="text" value="{{auth()->user()->pastor()->nome_pai}}" readonly="">
                        </div>
                        <div class="eight wide field">
                            <label>Nome da Mãe</label>
                            <input type="text" value="{{auth()->user()->pastor()->nome_mae}}" readonly="">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="ui calendar bottom left three wide field">
                            <label>Data de Nascimento</label>
                            <input type="date" value="{{auth()->user()->pastor()->nascimento_data}}" readonly="">
                        </div>
                        <div class="five wide field">
                            <label>Estado Natal</label>
                            <input type="text" value="{{auth()->user()->pastor()->nascimento_estado->nome}}" readonly>
                        </div>
                        <div class="eight wide field">
                            <label>Cidade Natal</label>
                            <input type="text" readonly value="{{auth()->user()->pastor()->nascimento_cidade->nome}}">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="four wide field">
                            <label>RG</label>
                            <input type="text" readonly value="{{auth()->user()->pastor()->rg}}">
                        </div>
                        <div class="four wide field">
                            <label>Orgão Emissor</label>
                            <input type="text" readonly="" value="{{auth()->user()->pastor()->rg_emissor}}">
                        </div>
                        <div class="four wide field">
                            <label>CPF</label>
                            <input type="text" readonly value="{{auth()->user()->pastor()->cpf}}">
                        </div>
                        <div class="five wide field">
                            <label>Estado Civil</label>
                            <input type="text" readonly value="{{auth()->user()->pastor()->estado_civil}}">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="ten wide field">
                            <label>Cônjuge</label>
                            <input type="text" readonly value="{{auth()->user()->pastor()->conjuge_nome}}">
                        </div>
                        <div class="three wide field">
                            <label>Data de Nascimento</label>
                            <input type="date" readonly value="{{auth()->user()->pastor()->conjuge_nascimento}}">
                        </div>
                        <div class="three wide field required">
                            <label>Nº de Dependentes</label>
                            <input type="number" min="0" max="99" name="nr_dependentes" placeholder="Nº de Dependentes"
                                   required>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="sixteen wide field required">
                            <label>Nome dos Dependentes</label>
                            <input type="text" name="nome_filhos" placeholder="Nome dos Filhos" required>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="six wide field">
                            <label>Endereço</label>
                            <input type="text" readonly value="{{auth()->user()->pastor()->endereco}}">
                        </div>
                        <div class="two wide field">
                            <label>Número</label>
                            <input type="text" readonly value="{{auth()->user()->pastor()->endereco_nr}}">
                        </div>
                        <div class="four wide field">
                            <label>Complemento</label>
                            <input type="text" readonly value="{{auth()->user()->pastor()->endereco_complemento}}">
                        </div>
                        <div class="four wide field">
                            <label>Bairro</label>
                            <input type="text" readonly value="{{auth()->user()->pastor()->endereco_bairro}}">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="four wide field">
                            <label>Estado</label>
                            <input type="text" readonly value="{{auth()->user()->pastor()->endereco_estado->nome}}">
                        </div>
                        <div class="five wide field">
                            <label>Cidade</label>
                            <input type="text" readonly value="{{auth()->user()->pastor()->endereco_cidade->nome}}">
                        </div>
                        <div class="two wide field">
                            <label>CEP</label>
                            <input type="text" readonly value="{{auth()->user()->pastor()->cep}}">
                        </div>
                        <div class="two wide field">
                            <label>Cx. Postal</label>
                            <input type="text" readonly value="{{auth()->user()->pastor()->cx_postal}}">
                        </div>
                        <div class="three wide field">
                            <label>CEP Cx. Postal</label>
                            <input type="text" readonly value="{{auth()->user()->pastor()->cx_postal_cep}}">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="three wide field">
                            <label>Celular</label>
                            <input type="text" readonly value="{{auth()->user()->pastor()->celular}}">
                        </div>
                        <div class="three wide field">
                            <label>Telefone Fixo</label>
                            <input type="text" readonly value="{{auth()->user()->pastor()->telefone}}">
                        </div>
                        <div class="three wide field">
                            <label>Telefone da Igreja</label>
                            <input type="text" readonly value="{{auth()->user()->pastor()->igreja->telefone}}">
                        </div>
                        <div class="seven wide field">
                            <label>E-mail</label>
                            <input type="email" readonly value="{{auth()->user()->pastor()->email}}">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="five wide field required">
                            <label>Condições de Moradia:</label>
                            <select class="ui fluid dropdown" name="condicao_moradia" required>
                                <option value="">----</option>
                                <option value="1"@isset($resource) {{$resource->condicao_moradia === 1 ? ' selected' : ''}} @endisset>
                                    Casa/Apto Pastoral
                                </option>
                                <option value="2"@isset($resource) {{$resource->condicao_moradia === 2 ? ' selected' : ''}} @endisset>
                                    Própria
                                </option>
                                <option value="3"@isset($resource) {{$resource->condicao_moradia === 3 ? ' selected' : ''}} @endisset>
                                    Financiada
                                </option>
                                <option value="4"@isset($resource) {{$resource->condicao_moradia === 4 ? ' selected' : ''}} @endisset>
                                    Alugada e paga pela igreja
                                </option>
                                <option value="5"@isset($resource) {{$resource->condicao_moradia === 5 ? ' selected' : ''}} @endisset>
                                    Alugada e paga pelo ministro
                                </option>
                                <option value="6"@isset($resource) {{$resource->condicao_moradia === 6 ? ' selected' : ''}} @endisset>
                                    Alugada nos limites do campo
                                </option>
                                <option value="7"@isset($resource) {{$resource->condicao_moradia === 7 ? ' selected' : ''}} @endisset>
                                    Alugada fora do campo
                                </option>
                            </select>
                        </div>
                        <div class="three wide field">
                            <label>Data de Ordenação:</label>
                            <input type="date">
                        </div>
                        <div class="eight wide field">
                            <label>Presbitério</label>
                            <input type="text" value="{{auth()->user()->presbitero->nome}}" readonly>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="three wide field required">
                            <label>Dedicação ao Ministério:</label>
                            <select class="ui fluid dropdown" name="dedicacao_ministerio" required>
                                <option value="">----</option>
                                <option value="1"@isset($resource) {{$resource->dedicacao_ministerio === 1 ? ' selected' : ''}} @endisset>
                                    Integral
                                </option>
                                <option value="2"@isset($resource) {{$resource->dedicacao_ministerio === 2 ? ' selected' : ''}} @endisset>
                                    Parcial
                                </option>
                            </select>
                        </div>
                        <div class="three wide field required">
                            <label>Férias</label>
                            <select class="ui fluid dropdown" name="ferias" required>
                                <option value="">----</option>
                                <option value="1"@isset($resource) {{$resource->ferias === 1 ? ' selected' : ''}} @endisset>
                                    Regulares
                                </option>
                                <option value="2"@isset($resource) {{$resource->ferias === 2 ? ' selected' : ''}} @endisset>
                                    Parciais
                                </option>
                                <option value="3"@isset($resource) {{$resource->ferias === 3 ? ' selected' : ''}} @endisset>
                                    Não teve
                                </option>
                            </select>
                        </div>
                        <div class="four wide field required">
                            <label>Côngruas</label>
                            <div class="ui labeled input">
                                <div class="ui label">R$</div>
                                <input type="text" class="money" placeholder="0,00" name="congruas" required>
                            </div>
                        </div>
                        <div class="three wide field" data-tooltip="Possui aposentadoria pública?">
                            <label>Aposentadoria pública?</label>
                        </div>
                        <div class="three wide field">
                            <div class="ui radio checkbox">
                                <input name="previdencia_publica" type="radio"
                                       value="1" @isset($resource) {{$resource->previdencia_publica === 1 ? 'checked' : ''}} @endisset>
                                <label>Sim</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input name="previdencia_publica" type="radio" value="0" checked=""
                                       @isset($resource) {{$resource->previdencia_publica === 0 ? 'checked' : ''}} @else checked @endisset>
                                <label>Não</label>
                            </div>
                        </div>
                    </div>
                    <div class="fields inline">

                        <div class="three wide field" data-tooltip="Possui aposentadoria privada?">
                            <label>Aposentadoria privada?</label>
                        </div>
                        <div class="three wide field">
                            <div class="ui radio checkbox">
                                <input name="previdencia_privada" type="radio"
                                       value="1" @isset($resource) {{$resource->previdencia_privada === 1 ? 'checked' : ''}} @endisset>
                                <label>Sim</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input name="previdencia_privada" type="radio" value="0"
                                       @isset($resource) {{$resource->previdencia_privada === 0 ? 'checked' : ''}} @else checked @endisset>
                                <label>Não</label>
                            </div>
                        </div>
                        <div class="two wide field" data-tooltip="Possui plano de saúde?">
                            <label>Plano de saúde?</label>
                        </div>
                        <div class="two wide field">
                            <div class="ui radio checkbox">
                                <input name="plano_saude" type="radio"
                                       value="1" @isset($resource) {{$resource->plano_saude === 1 ? 'checked' : ''}} @endisset>
                                <label>Sim</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input name="plano_saude" type="radio" value="0"
                                       @isset($resource) {{$resource->plano_saude === 0 ? 'checked' : ''}} @else checked @endisset>
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
                                <input name="congruas_contribui_inss" type="radio"
                                       value="1" @isset($resource) {{$resource->congruas_contribui_inss === 1 ? 'checked' : ''}} @endisset>
                                <label>Sim</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input name="congruas_contribui_inss" type="radio" value="0"
                                       @isset($resource) {{$resource->congruas_contribui_inss === 0 ? 'checked' : ''}} @else checked @endisset>
                                <label>Não</label>
                            </div>
                        </div>
                        <div class="five wide field" data-tooltip="Qual o valor da contribuição para o INSS?">
                            <label>Contribuição INSS:</label>
                            <div class="ui labeled input">
                                <div class="ui label">R$</div>
                                <input type="text" class="money" name="previdencia_publica_valor" placeholder="0,00">
                            </div>
                        </div>
                        <div class="two wide field" data-tooltip="Contribui para Previdência Privada?">
                            <label>Previdência Privada?</label>
                        </div>
                        <div class="two wide field">
                            <div class="ui radio checkbox">
                                <input name="contribui_prev_privada" type="radio"
                                       value="1" @isset($resource) {{$resource->contribui_prev_privada === 1 ? 'checked' : ''}} @endisset>
                                <label>Sim</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input name="contribui_prev_privada" type="radio" value="0"
                                       @isset($resource) {{$resource->contribui_prev_privada === 0 ? 'checked' : ''}} @else checked @endisset>
                                <label>Não</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Info Ministro -->

            <div class="ui segments">
                <div class="ui green segment" style="text-align: center; background-color: #F9FAFB">
                    <h3>II - Campo de Trabalho</h3>
                </div>
                <div class="ui form segment">
                    <div class="fields">
                        <div class="eight wide field">
                            <label>Igreja(s):</label>
                            <textarea rows="2"
                                      name="campos_igrejas">{{$resource->campos_igrejas ?? trim(auth()->user()->pastor()->igreja->nome)}}</textarea>
                        </div>
                        <div class="eight wide field">
                            <label>Congregação(ões):</label>
                            <textarea rows="2"
                                      name="campos_congregacoes">@isset($resource) {{$resource->campos_congregacoes ?? ''}} @else @forelse(auth()->user()->pastor()->igreja->congregacoes as $rs){{$rs->nome}} {!! " / " !!} @empty @endforelse @endisset
                            </textarea>
                        </div>
                    </div>
                </div>
            </div> <!-- II - Campo de Trabalho -->

            <div class="ui segments">
                <div class="ui green segment" style="text-align: center; background-color: #F9FAFB">
                    <h3>III - Atuação Ministerial</h3>
                </div>
                <div class="ui form segment">
                    <div class="ui green ribbon label" style="font-size:0.92857143em;">1. DOUTRINAÇÃO</div>
                    <strong style="color:green;">No campo e fora do campo</strong>
                </div>
                <div class="ui form segment">
                    <div class="fields">
                        <div class="four wide field">
                            <label>Pregações</label>
                            <input type="text" value="{{$resource->pregacoes ?? ''}}" name="pregacoes">
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
                            <input type="text" value="{{$resource->palestras_prelecoes ?? ''}}"
                                   name="palestras_prelecoes">
                        </div>
                        <div class="four wide field">
                            <label>Mensagens - Rádio/TV:</label>
                            <input type="text" value="{{$resource->msg_radio ?? ''}}" name="msg_radio">
                        </div>
                        <div class="four wide field">
                            <label>Artigos-jornais, boletins, revistas:</label>
                            <input type="text" value="{{$resource->artigos_boletins_revistas ?? ''}}"
                                   name="artigos_boletins_revistas">
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
                            <input type="text" value="{{$resource->profissoes_batismos ?? ''}}"
                                   name="profissoes_batismos">
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
                            <input type="text" value="{{$resource->departamentos_internos ?? ''}}"
                                   name="departamentos_internos">
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
                            <textarea rows="5"
                                      name="descricao_atividades">{{$resource->descricao_atividades ?? ''}}</textarea>
                        </div>
                    </div>
                </div>
            </div> <!-- III - Atuação Ministerial -->

            <div class="ui segments">
                <div class="ui green segment" style="text-align: center; background-color: #F9FAFB">
                    <h3>IV - Atuação Conciliar</h3>
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
                            <input type="text" value="{{$resource->diaconos_ordenados_investidos ?? ''}}"
                                   name="diaconos_ordenados_investidos">
                        </div>
                        <div class="four wide field">
                            <label>Presbíteros Ordenados e/ou Investidos:</label>
                            <input type="text" value="{{$resource->presbiteros_ordenados_investidos ?? ''}}"
                                   name="presbiteros_ordenados_investidos">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="three wide field">
                            <label>Reuniões do Presbitério:</label>
                            <input type="text" value="{{$resource->reunioes_presbiterio ?? ''}}"
                                   name="reunioes_presbiterio">
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
                            <div class="ui info message">
                                <i class="close icon"></i>
                                <div class="header">
                                    Observações Importantes
                                </div>
                                <ul class="list">
                                    <li>Mencionar as funções exercidas nos diversos níveis conciliares da IPB e
                                        o número de reuniões durante o ano.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label>No Presbitério:</label>
                            <textarea rows="3"
                                      name="cargos_presbiterio">{{ $resource->cargos_presbiterio ?? "" }}</textarea>
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
                            <textarea rows="4"
                                      name="texto_complementar">{{ $resource->texto_complementar ?? "" }}</textarea>
                        </div>
                    </div>
                </div>
            </div> <!-- IV - Atuação Conciliar -->

            <div class="ui segments">
                <div class="ui green segment" style="text-align: center; background-color: #F9FAFB">
                    <h3>V - Outras Atividades</h3>
                </div>
                <div class="ui form segment">
                    <div class="fields">
                        <div class="sixteen wide field">
                            <div class="ui info message">
                                <i class="close icon"></i>
                                <div class="header">
                                    Observações Importantes
                                </div>
                                <ul class="list">
                                    <li> Mencionar quantitativamente realizações no ano não previstas nos campos
                                        precedentes, dadas ou recebidas (cursos, leituras, encontros de estudos,
                                        congressos, etc.), bem como outras atividades paralelas ao ministério pastoral
                                        (ex.: advocacia, jornalismo, magistério, etc.).
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label>1. Atualização e Aperfeiçoamento:</label>
                            <textarea rows="3"
                                      name="atualizacao_aperfeicoamento">{{ $resource->atualizacao_aperfeicoamento ?? "" }}</textarea>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label>2. Atividades em entidades para-eclesiásticas:</label>
                            <textarea rows="3"
                                      name="atividades_para_eclesiasticas">{{ $resource->atividades_para_eclesiasticas ?? "" }}</textarea>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label>3. Atividades Extra Ministeriais:</label>
                            <textarea rows="3"
                                      name="atividades_extras_ministeriais">{{ $resource->atividades_extras_ministeriais ?? "" }}</textarea>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="sixteen wide field">
                            <label>Outras</label>
                            <textarea rows="3"
                                      name="atividades_outros">{{ $resource->atividades_outros ?? "" }}</textarea>
                        </div>
                    </div>
                </div>
            </div> <!-- V - Outras Atividades -->

            <div class="ui horizontal segments">
                <div class="ui segment">
                    <span><strong>Usuário:</strong></span>
                    <span>&nbsp; {{ isset($resource) === true ? $resource->usuario->nome : ''}}</span>
                </div>
                <div class="ui segment">
                    <span><strong>Data:</strong>&nbsp; {{ isset($resource) === true ? $resource->updated_at->format("d/m/Y h:m") : ''}}</span>
                </div>
                <div class="ui right aligned segment" style="width: 30px;">
                    <span class="ui toggle checkbox"
                          data-tooltip="Bloqueia edição e altera o status para finalizado">
                    <input type="checkbox" name="status_relatorio" value="1">
                    <label>Relatório Finalizado</label>
                </span>
                </div>
            </div>
            <div class="ui clearing divider"></div>
            <div style="text-align: center">
                <button class="ui green labeled icon button" type="submit"><i class="plus icon"></i>Gravar</button>
                <button class="ui right labeled icon button" type="reset"><i class="minus icon"></i>Limpar</button>
            </div>
        </form>
    </div>
@endsection
@section('javascript')
    <script src="{{asset('js/plugins/jquery.mask.min.js')}}"></script>
    <script>
        window.addEventListener("load", function () {
            $('.money').mask("#.##0,00", {reverse: true});
            $('.ui.dropdown').dropdown();
            $('[name="relatorio_finalizado"]').change(function () {
                if (this.checked) {
                    $('input').attr('disabled', true);
                    $('select').attr('disabled', true);
                    $('textarea').attr('disabled', true);
                    $('.selection').addClass('disabled');
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
@endsection
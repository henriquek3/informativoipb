@extends('layouts.informativo')
@section('css')@endsection
@section('content')
    <div class="ui clearing"></div>
    <div class="ui raised segment">
        <a class="ui right floated blue tiny button" href="/cadastros/sinodos">
            <i class="reply icon"></i>Voltar
        </a>
        <h3 class="ui floated header" style="padding-top: 6px;padding-left: 10px;"><i class="edit outline icon"></i>
        </h3>
        <h1 class="ui floated header" style="margin-left: -10px;">Relatório de Estatísticas

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
                    <div class="four wide field">
                        <label>Sínodo</label>
                        <input type="text" readonly=""
                               @if(!is_null(auth()->user()->pastor())) value="{{auth()->user()->pastor()->igreja->presbiterio->sinodo->sigla . ' / ' . auth()->user()->pastor()->igreja->presbiterio->sinodo->nome}}" @endif>
                        <input type="hidden" name="id_sinodo"
                               @if(!is_null(auth()->user()->pastor())) value="{{auth()->user()->pastor()->igreja->presbiterio->sinodo->id}}" @endif>
                    </div>
                    <div class="five wide field" id="div_presbiterio">
                        <label>Presbitério</label>
                        <input type="text"
                               @if(!is_null(auth()->user()->pastor())) value="{{ auth()->user()->pastor()->igreja->presbiterio->sigla . ' / ' . auth()->user()->pastor()->igreja->presbiterio->nome}}"
                               @endif readonly="">
                        <input type="hidden" name="id_presbiterio"
                               @if(!is_null(auth()->user()->pastor())) value="{{auth()->user()->pastor()->igreja->presbiterio->id}}" @endif>
                    </div>
                    <div class="five wide field">
                        <label>Igreja</label>
                        <input type="text"
                               @if(!is_null(auth()->user()->pastor())) value="{{auth()->user()->pastor()->igreja->nome}} "
                               @endif readonly="">
                        <input type="hidden" name="id_igreja"
                               @if(!is_null(auth()->user()->pastor())) value="{{auth()->user()->pastor()->igreja->id}}" @endif>
                    </div>
                </div>
            </div>
            <div class="ui segments">
                <div class="ui blue segment" style="text-align: center; background-color: #F9FAFB">
                    <p><strong>I - Identificação da Igreja / Congregação Presbiterial</strong></p>
                </div>
                <div class="ui form segment">
                    <div class="fields">
                        <div class="two wide field" data-tooltip="Este valor não pode ser alterado.">
                            <label>ID</label>
                            {{--<input type="text" readonly="" name="id_igreja" value="{{auth()->user()->presbitero->id}}">--}}
                        </div>
                        <div class="fourteen wide field">
                            <label>Nome (Igreja/Congregação)</label>
                            <input type="text" readonly="" value="{{auth()->user()->presbitero->igreja->nome}}">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="eight wide field">
                            <label>Endereço</label>
                            <input type="text" readonly="" value="{{auth() ->user() ->presbitero->igreja->endereco}}">
                        </div>
                        <div class="two wide field">
                            <label>Número</label>
                            <input type="text" readonly=""
                                   value="{{auth() ->user() ->presbitero->igreja->endereco_numero}}">
                        </div>
                        <div class="three wide field">
                            <label>Complemento</label>
                            <input type="text" readonly=""
                                   value="{{auth() ->user() ->presbitero->igreja->endereco_complemento}}">
                        </div>
                        <div class="three wide field">
                            <label>Bairro</label>
                            <input type="text" readonly=""
                                   value="{{auth() ->user() ->presbitero->igreja->endereco_bairro}}">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="four wide field">
                            <label>Estado</label>
                            <input type="text" readonly=""
                                   value="{{auth() ->user() ->presbitero->igreja->cidade->estado->nome}}">
                        </div>
                        <div class="four wide field">
                            <label>Cidade</label>
                            <input type="text" readonly=""
                                   value="{{auth() ->user() ->presbitero->igreja->cidade->nome}}">
                        </div>
                        <div class="three wide field">
                            <label>CEP</label>
                            <input type="text" readonly=""
                                   value="{{auth() ->user() ->presbitero->igreja->endereco_cep}}">
                        </div>
                        <div class="two wide field">
                            <label>Cx. P</label>
                            <input type="text" readonly=""
                                   value="{{auth() ->user() ->presbitero->igreja->endereco_cx_postal}}">
                        </div>
                        <div class="three wide field">
                            <label>CEP Cx. P</label>
                            <input type="text" readonly=""
                                   value="{{auth() ->user() ->presbitero->igreja->endereco_cx_postal_cep}}">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="two wide field">
                            <label>Telefone</label>
                            <input type="text" readonly="" value="{{auth() ->user() ->presbitero->igreja->telefone}}">
                        </div>
                        <div class="four wide field">
                            <label>E-Mail</label>
                            <input type="text" readonly="" value="{{auth() ->user() ->presbitero->igreja->email}}">
                        </div>
                        <div class="four wide field">
                            <label>HomePage</label>
                            <input type="text" readonly="" value="{{auth() ->user() ->presbitero->igreja->website}}">
                        </div>
                        <div class="three wide field">
                            <label>CNPJ</label>
                            <input type="text" readonly="" value="{{auth() ->user() ->presbitero->igreja->cnpj}}">
                        </div>
                        <div class="three wide field">
                            <label>Data Organização</label>
                            <input type="text" readonly=""
                                   value="{{auth() ->user() ->presbitero->igreja->data_organizacao}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui segments">
                <div class="ui blue segment" style="text-align: center; background-color: #F9FAFB">
                    <p><strong>II - Estrutura da Comunidade Presbiteriana</strong></p>
                </div>
                <div class="ui form segment">
                    <div class="ui horizontal segments">
                        <div class="ui segment" style="width: 30%;">
                            <div class="ui top attached label blue" style="text-align: center;">LIDERANÇA FORMAL
                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Pastores</label>
                                </div>
                                <div class="six wide field">
                                    <input type="number" value="{{ $resource->ecl_pastores ?? "" }}"
                                           name="ecl_pastores">
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Licenciados</label>
                                </div>
                                <div class="six wide field">
                                    <input type="number" value="{{ $resource->ecl_licenciados ?? "" }}"
                                           name="ecl_licenciados">
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Presbíteros</label>
                                </div>
                                <div class="six wide field">
                                    <input type="number" value="{{ $resource->ecl_presbiteros ?? "" }}"
                                           name="ecl_presbiteros">
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Diáconos</label>
                                </div>
                                <div class="six wide field">
                                    <input type="number" value="{{ $resource->ecl_diaconos ?? "" }}"
                                           name="ecl_diaconos">
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Evangelistas</label>
                                </div>
                                <div class="six wide field">
                                    <input type="number" value="{{ $resource->ecl_evangelistas ?? "" }}"
                                           name="ecl_evangelistas">
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Missionários</label>
                                </div>
                                <div class="six wide field">
                                    <input type="number" value="{{ $resource->ecl_missionarios ?? "" }}"
                                           name="ecl_missionarios">
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Candidatos</label>
                                </div>
                                <div class="six wide field">
                                    <input type="number" value="{{ $resource->ecl_candidatos ?? "" }}"
                                           name="ecl_candidatos">
                                </div>
                            </div>
                        </div>
                        <div class="ui segment" style="width: 30%;">
                            <div class="ui top attached label blue" style="text-align: center;">ESTRUTURA DO
                                TRABALHO
                            </div>
                            <div class="inline fields">
                                <div class="ten wide field">
                                    <label>Congregações da Igreja</label>
                                </div>
                                <div class="six wide field">
                                    <input type="number" value="{{ $resource->ect_congregacoes ?? "" }}"
                                           name="ect_congregacoes">
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="ten wide field">
                                    <label>Pontos de Pregação</label>
                                </div>
                                <div class="six wide field">
                                    <input type="number" value="{{ $resource->ect_pontos_pregacao ?? "" }}"
                                           name="ect_pontos_pregacao">
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="ten wide field">
                                    <label>Escolas Dominicais</label>
                                </div>
                                <div class="six wide field">
                                    <input type="number" value="{{ $resource->ect_ebd ?? "" }}" name="ect_ebd">
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="ten wide field">
                                    <label>Professores da EBD</label>
                                </div>
                                <div class="six wide field">
                                    <input type="number" value="{{ $resource->ect_professores ?? "" }}"
                                           name="ect_professores">
                                </div>
                            </div>
                        </div>
                        <div class="ui segment" style="width: 40%;">
                            <div class="ui top attached label blue" style="text-align: center;">DEPARTAMENTOS
                                INTERNO
                            </div>
                            <div class="inline fields">
                                <div class="four wide field">
                                    <label>UCP</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input" data-tooltip="Nº de Departamentos">
                                        <div class="ui label">D.</div>
                                        <input type="number" value="{{ $resource->ecd_ucp ?? "" }}" name="ecd_ucp">
                                    </div>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input" data-tooltip="Nº de Membros">
                                        <div class="ui label">M.</div>
                                        <input type="number" value="{{ $resource->ecd_ucp_membros ?? "" }}"
                                               name="ecd_ucp_membros">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="four wide field">
                                    <label>UPA</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input" data-tooltip="Nº de Departamentos">
                                        <div class="ui label">D.</div>
                                        <input type="number" value="{{ $resource->ecd_upa ?? "" }}" name="ecd_upa">
                                    </div>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input" data-tooltip="Nº de Membros">
                                        <div class="ui label">M.</div>
                                        <input type="number" value="{{ $resource->ecd_upa_membros ?? "" }}"
                                               name="ecd_upa_membros">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="four wide field">
                                    <label>UMP</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input" data-tooltip="Nº de Departamentos">
                                        <div class="ui label">D.</div>
                                        <input type="number" value="{{ $resource->ecd_ump ?? "" }}" name="ecd_ump">
                                    </div>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input" data-tooltip="Nº de Membros">
                                        <div class="ui label">M.</div>
                                        <input type="number" value="{{ $resource->ecd_ump_membros ?? "" }}"
                                               name="ecd_ump_membros">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="four wide field">
                                    <label>SAF</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input" data-tooltip="Nº de Departamentos">
                                        <div class="ui label">D.</div>
                                        <input type="number" value="{{ $resource->ecd_saf ?? "" }}" name="ecd_saf">
                                    </div>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input" data-tooltip="Nº de Membros">
                                        <div class="ui label">M.</div>
                                        <input type="number" value="{{ $resource->ecd_saf_membros ?? "" }}"
                                               name="ecd_saf_membros">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="four wide field">
                                    <label>UPH</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input" data-tooltip="Nº de Departamentos">
                                        <div class="ui label">D.</div>
                                        <input type="number" value="{{ $resource->ecd_uph ?? "" }}" name="ecd_uph">
                                    </div>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input" data-tooltip="Nº de Membros">
                                        <div class="ui label">M.</div>
                                        <input type="number" value="{{ $resource->ecd_uph_membros ?? "" }}"
                                               name="ecd_uph_membros">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="four wide field">
                                    <label>Outras</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input" data-tooltip="Nº de Departamentos">
                                        <div class="ui label">D.</div>
                                        <input type="number" value="{{ $resource->ecd_outras ?? "" }}"
                                               name="ecd_outras">
                                    </div>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input" data-tooltip="Nº de Membros">
                                        <div class="ui label">M.</div>
                                        <input type="number" value="{{ $resource->ecd_outras_membros ?? "" }}"
                                               name="ecd_outras_membros">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui segments">
                <div class="ui blue segment" style="text-align: center; background-color: #F9FAFB">
                    <p><strong>IV - Rol de Membros</strong></p>
                </div>
                <div class="ui form segment">
                    <div class="ui horizontal segments">
                        <div class="ui segment">
                            <div class="ui top attached label blue" style="text-align: center;">ADMISSÃO -
                                COMUNGANTES
                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Profissão de Fé</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <input type="number" value="{{ $resource->rma_profissao_fe_masc ?? "" }}"
                                               name="rma_profissao_fe_masc" id="masc">
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <input type="number" value="{{ $resource->rma_profissao_fe_fem ?? "" }}"
                                               name="rma_profissao_fe_fem" id="fem">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Profissão de Fé e Batismo</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <input type="number" value="{{ $resource->rma_profissao_batismo_masc ?? "" }}"
                                               name="rma_profissao_batismo_masc">
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <input type="number" value="{{ $resource->rma_profissao_batismo_fem ?? "" }}"
                                               name="rma_profissao_batismo_fem">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Transferência</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <input type="number" value="{{ $resource->rma_transferencia_masc ?? "" }}"
                                               name="rma_transferencia_masc">
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <input type="number" value="{{ $resource->rma_transferencia_fem ?? "" }}"
                                               name="rma_transferencia_fem">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Jurisdição</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <input type="number" value="{{ $resource->rma_jurisdicao_masc ?? "" }}"
                                               name="rma_jurisdicao_masc">
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <input type="number" value="{{ $resource->rma_jurisdicao_fem ?? "" }}"
                                               name="rma_jurisdicao_fem">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Restauração</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <input type="number" value="{{ $resource->rma_restauracao_masc ?? "" }}"
                                               name="rma_restauracao_masc">
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <input type="number" value="{{ $resource->rma_restauracao_fem ?? "" }}"
                                               name="rma_restauracao_fem">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Designação do Presbitério</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <input type="number" value="{{ $resource->rma_designacao_masc ?? "" }}"
                                               name="rma_designacao_masc">
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <input type="number" value="{{ $resource->rma_designacao_fem ?? "" }}"
                                               name="rma_designacao_fem">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui segment">
                            <div class="ui top attached label blue" style="text-align: center;">ADMISSÃO -
                                NÃO-COMUNGANTES
                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Batismo</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <input type="number" value="{{ $resource->rma_batismo_masc_nc ?? "" }}"
                                               name="rma_batismo_masc_nc">
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <input type="number" value="{{ $resource->rma_batismo_fem_nc ?? "" }}"
                                               name="rma_batismo_fem_nc">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Transferência</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <input type="number" value="{{ $resource->rma_transferencia_masc_nc ?? "" }}"
                                               name="rma_transferencia_masc_nc">
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <input type="number" value="{{ $resource->rma_transferencia_fem_nc ?? "" }}"
                                               name="rma_transferencia_fem_nc">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Jurisdição Ex-Officio</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <input type="number" value="{{ $resource->rma_jurisdicao_ex_masc_nc ?? "" }}"
                                               name="rma_jurisdicao_ex_masc_nc">
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <input type="number" value="{{ $resource->rma_jurisdicao_ex_fem_nc ?? "" }}"
                                               name="rma_jurisdicao_ex_fem_nc">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui horizontal segments">
                        <div class="ui segment">
                            <div class="ui top attached label blue" style="text-align: center;">DEMISSÃO -
                                COMUNGANTES
                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Transferência</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <input type="number" value="{{ $resource->rmd_transferencia_masc ?? "" }}"
                                               name="rmd_transferencia_masc">
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <input type="number" value="{{ $resource->rmd_transferencia_fem ?? "" }}"
                                               name="rmd_transferencia_fem">
                                    </div>
                                </div>

                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Falecimento</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <input type="number" value="{{ $resource->rmd_falecimento_masc ?? "" }}"
                                               name="rmd_falecimento_masc">
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <input type="number" value="{{ $resource->rmd_falecimento_fem ?? "" }}"
                                               name="rmd_falecimento_fem">
                                    </div>
                                </div>

                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Exclusão</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <input type="number" value="{{ $resource->rmd_exclusao_masc ?? "" }}"
                                               name="rmd_exclusao_masc">
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <input type="number" value="{{ $resource->rmd_exclusao_fem ?? "" }}"
                                               name="rmd_exclusao_fem">
                                    </div>
                                </div>

                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Ordenação</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <input type="number" value="{{ $resource->rmd_ordenacao_masc ?? "" }}"
                                               name="rmd_ordenacao_masc">
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <input type="number" value="{{ $resource->rmd_ordenacao_fem ?? "" }}"
                                               name="rmd_ordenacao_fem">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="ui segment">
                            <div class="ui top attached label blue" style="text-align: center;">DEMISSÃO -
                                NÃO-COMUNGANTES
                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Profissão de Fé</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <input type="number" value="{{ $resource->rmd_profissao_fe_masc_nc ?? "" }}"
                                               name="rmd_profissao_fe_masc_nc">
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <input type="number" value="{{ $resource->rmd_profissao_fe_fem_nc ?? "" }}"
                                               name="rmd_profissao_fe_fem_nc">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Transferência</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <input type="number" value="{{ $resource->rmd_transferencia_masc_nc ?? "" }}"
                                               name="rmd_transferencia_masc_nc">
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <input type="number" value="{{ $resource->rmd_transferencia_fem_nc ?? "" }}"
                                               name="rmd_transferencia_fem_nc">
                                    </div>
                                </div>

                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Falecimento</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <input type="number" value="{{ $resource->rmd_falecimento_masc_nc ?? "" }}"
                                               name="rmd_falecimento_masc_nc">
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <input type="number" value="{{ $resource->rmd_falecimento_fem_nc ?? "" }}"
                                               name="rmd_falecimento_fem_nc">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Exclusão</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <input type="number" value="{{ $resource->rmd_exclusao_masc_nc ?? "" }}"
                                               name="rmd_exclusao_masc_nc">
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <input type="number" value="{{ $resource->rmd_exclusao_fem_nc ?? "" }}"
                                               name="rmd_exclusao_fem_nc">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{--<div class="ui horizontal segments">
                        <div class="ui segment">
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Rol Separado</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <!--input(type="number" value="0" name="rmd_separado_masc")-->
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <!--input(type="number" value="0" name="rmd_separado_fem")-->
                                    </div>
                                </div>

                            </div>
                            <div class="inline fields">
                                <div class="five wide field" data-tooltip="RESULTADO de (admissão - demissão)">
                                    <label>DIFERENÇA</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <!--input(type="number" value="0" name="rmd_diferenca_masc")-->
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <!--input(type="number" value="0" name="rmd_diferenca_fem")-->
                                    </div>
                                </div>

                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Comungates (Ano Anterior)</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <!--input(type="number" value="0" name="rmd_comung_anterior_masc")-->
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <!--input(type="number" value="0" name="rmd_comung_anterior_fem")-->
                                    </div>
                                </div>

                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Comungantes (Ano Atual)</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <!--input(type="number" value="0" name="rmd_comung_atual_masc")-->
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <!--input(type="number" value="0" name="rmd_comung_atual_fem")-->
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="ui segment">
                            <div class="inline fields">
                                <div class="five wide field" data-tooltip="RESULTADO de (admissão - demissão)">
                                    <label>DIFERENÇA</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <!--input(type="number" value="0" name="rmd_dif_comung_masc")-->
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <!--input(type="number" value="0" name="rmd_dif_comung_fem")-->
                                    </div>
                                </div>

                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Não Comungante (Ano Anterior)</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <!--input(type="number" value="0" name="rmd_nao_comung_anterior_masc")-->
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <!--input(type="number" value="0" name="rmd_nao_comung_anterior_fem")-->
                                    </div>
                                </div>

                            </div>
                            <div class="inline fields">
                                <div class="five wide field">
                                    <label>Não Comungante (Ano Atual)</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <!--input(type="number" value="0" name="rmd_nao_comung_atual_masc")-->
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <!--input(type="number" value="0" name="rmd_nao_comung_atual_fem")-->
                                    </div>
                                </div>

                            </div>
                            <div class="inline fields">
                                <div class="five wide field"
                                     data-tooltip="RESULTADO (Comungantes + Não Comungantes)">
                                    <label>Rol Atual</label>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">M</div>
                                        <!--input(type="number" value="0" name="rmd_rol_atual_masc")-->
                                    </div>
                                </div>
                                <div class="four wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">F</div>
                                        <!--input(type="number" value="0" name="rmd_rol_atual_fem")-->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>--}}
                </div>
            </div>
            <div class="ui segments">
                <div class="ui blue segment" style="text-align: center; background-color: #F9FAFB">
                    <p><strong>V - Informações Financeiras</strong></p>
                </div>
                <div class="ui form segment">
                    <div class="ui horizontal segments">
                        <div class="ui segment">
                            <div class="ui top attached label blue" style="text-align: center;">MOVIMENTO FINANCEIRO
                                - ANO ANTERIOR
                            </div>
                            {{--<div class="inline fields">
                                <div class="eight wide field">
                                    <label>Saldo - Ano Anterior</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <!--input(type="number" value="0" name="if_mf_saldo_anterior")-->
                                    </div>
                                </div>
                            </div>--}}
                            <div class="inline fields">
                                <div class="six wide field">
                                    <div class="ui label blue">
                                        <label>RECEITAS</label>
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="eight wide field">
                                    <label>Dízimos e Ofertas</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <input type="number" value="{{ $resource->fina_dizimos ?? "" }}"
                                               name="fina_dizimos">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="eight wide field">
                                    <label>Ofertas Especiais</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <input type="number" value="{{ $resource->fina_ofertas_especificas ?? "" }}"
                                               name="fina_ofertas_especificas">
                                    </div>
                                </div>
                            </div>
                            {{--<div class="inline fields">
                                <div class="eight wide field">
                                    <label>Total de Receita Anual</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <label>TOTAL</label>
                                    </div>
                                </div>
                            </div>--}}
                            {{--<div class="inline fields">
                                <div class="eight wide field">
                                    <label>Grande Total</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <label>TOTAL</label>
                                    </div>
                                </div>
                            </div>--}}
                            <div class="inline fields">
                                <div class="six wide field">
                                    <div class="ui label blue">
                                        <label>DESPESAS</label>
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="eight wide field">
                                    <label>Patrimônio</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <input type="number" value="{{ $resource->fina_patrimonio ?? "" }}"
                                               name="fina_patrimonio">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="eight wide field">
                                    <label>Causas Locais</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <input type="number" value="{{ $resource->fina_causas ?? "" }}"
                                               name="fina_causas">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="eight wide field">
                                    <label>Evangelismo Local</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <input type="number" value="{{ $resource->fina_evangelismo ?? "" }}"
                                               name="fina_evangelismo">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="eight wide field">
                                    <label>Missões</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <input type="number" value="{{ $resource->fina_missoes ?? "" }}"
                                               name="fina_missoes">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="eight wide field">
                                    <label>Sustento Pastoral</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <input type="number" value="{{ $resource->fina_sustento_pastoral ?? "" }}"
                                               name="fina_sustento_pastoral">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="eight wide field">
                                    <label>Verba Presbiterial</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <input type="number" value="{{ $resource->fina_verba_presbiterial ?? "" }}"
                                               name="fina_verba_presbiterial">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="eight wide field">
                                    <label>Dízimos ao Supremo Concílio</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <input type="number" value="{{ $resource->fina_dizimo_supremo ?? "" }}"
                                               name="fina_dizimo_supremo">
                                    </div>
                                </div>
                            </div>
                            {{--<div class="inline fields">
                                <div class="eight wide field">
                                    <label>Total Despesa Anual</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <label>TOTAL</label>
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="eight wide field">
                                    <label>Saldo - Ano Seguinte</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <label>TOTAL</label>
                                    </div>
                                </div>
                            </div>--}}
                            {{--<div class="inline fields">
                                <div class="eight wide field">
                                    <label>Grande Total</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <label>TOTAL</label>
                                    </div>
                                </div>
                            </div>--}}
                        </div>
                        <div class="ui segment">
                            <div class="ui top attached label blue" style="text-align: center;">PREVISÃO
                                ORÇAMENTÁRIA - PRÓXIMO EXERCÍCIO
                            </div>
                            {{--<div class="inline fields">
                                <div class="eight wide field">
                                    <label>Saldo - Ano Anterior</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <!--input(type="number" value="0" name="if_po_saldo_anterior")-->
                                    </div>
                                </div>
                            </div>--}}
                            <div class="inline fields">
                                <div class="six wide field">
                                    <div class="ui label blue">
                                        <label>RECEITAS</label>
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="eight wide field">
                                    <label>Dízimos e Ofertas</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <input type="number" value="{{ $resource->finp_dizimos ?? "" }}"
                                               name="finp_dizimos">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="eight wide field">
                                    <label>Ofertas Especiais</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <input type="number" value="{{ $resource->finp_ofertas_especificas ?? "" }}"
                                               name="finp_ofertas_especificas">
                                    </div>
                                </div>
                            </div>
                            {{--<div class="inline fields">
                                <div class="eight wide field">
                                    <label>Total de Receita Anual</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <label>TOTAL</label>
                                    </div>
                                </div>
                            </div>--}}
                            {{--<div class="inline fields">
                                <div class="eight wide field">
                                    <label>Grande Total</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <label>TOTAL</label>
                                    </div>
                                </div>
                            </div>--}}
                            <div class="inline fields">
                                <div class="six wide field">
                                    <div class="ui label blue">
                                        <label>DESPESAS</label>
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="eight wide field">
                                    <label>Patrimônio</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <input type="number" value="{{ $resource->finp_patrimonio ?? "" }}"
                                               name="finp_patrimonio">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="eight wide field">
                                    <label>Causas Locais</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <input type="number" value="{{ $resource->finp_causas ?? "" }}"
                                               name="finp_causas">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="eight wide field">
                                    <label>Evangelismo Local</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <input type="number" value="{{ $resource->finp_evangelismo ?? "" }}"
                                               name="finp_evangelismo">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="eight wide field">
                                    <label>Missões</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <input type="number" value="{{ $resource->finp_missoes ?? "" }}"
                                               name="finp_missoes">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="eight wide field">
                                    <label>Sustento Pastoral</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <input type="number" value="{{ $resource->finp_sustento_pastoral ?? "" }}"
                                               name="finp_sustento_pastoral">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="eight wide field">
                                    <label>Verba Presbiterial</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <input type="number" value="{{ $resource->finp_verba_presbiterial ?? "" }}"
                                               name="finp_verba_presbiterial">
                                    </div>
                                </div>
                            </div>
                            <div class="inline fields">
                                <div class="eight wide field">
                                    <label>Dízimos ao Supremo Concílio</label>
                                </div>
                                <div class="six wide field">
                                    <div class="ui labeled input">
                                        <div class="ui label">R$</div>
                                        <input type="number" value="{{ $resource->finp_dizimo_supremo ?? "" }}"
                                               name="finp_dizimo_supremo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui segments">
                <div class="ui blue segment" style="text-align: center; background-color: #F9FAFB">
                    <p><strong>VI - Informações Finais</strong></p>
                </div>
                <div class="ui form segment">
                    <div class="fields">
                        <div class="two wide field" data-tooltip="Este valor não pode ser alterado.">
                            <label>ID</label>
                            <input type="text" readonly="" name="id_presbitero_conselho"
                                   value="{{auth()->user()->presbitero->id}}">
                            <input type="hidden" readonly="" name="id_presbitero"
                                   value="{{auth()->user()->presbitero->id}}">
                        </div>
                        <div class="fourteen wide field">
                            <label>Secretário do Conselho</label>
                            <input type="text" readonly="" value="{{auth()->user()->presbitero->nome}}">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="eight wide field">
                            <label>Endereço</label>
                            <input type="text" readonly="" value="{{auth()->user()->presbitero->endereco}}">
                        </div>
                        <div class="two wide field">
                            <label>Número</label>
                            <input type="text" readonly="" value="{{auth()->user()->presbitero->endereco_nr}}">
                        </div>
                        <div class="three wide field">
                            <label>Complemento</label>
                            <input type="text" readonly="" value="{{auth()->user()->presbitero->endereco_complemento}}">
                        </div>
                        <div class="three wide field">
                            <label>Bairro</label>
                            <input type="text" readonly="" value="{{auth()->user()->presbitero->endereco_bairro}}">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="four wide field">
                            <label>Estado</label>
                            <input type="text" readonly="" value="{{auth()->user()->presbitero->endereco_id_estado}}">
                        </div>
                        <div class="four wide field">
                            <label>Cidade</label>
                            <input type="text" readonly="" value="{{auth()->user()->presbitero->endereco_id_cidade}}">
                        </div>
                        <div class="three wide field">
                            <label>CEP</label>
                            <input type="text" readonly="" value="{{auth()->user()->presbitero->cep}}">
                        </div>
                        <div class="two wide field">
                            <label>Cx. P</label>
                            <input type="text" readonly="" value="{{auth()->user()->presbitero->cx_postal}}">
                        </div>
                        <div class="three wide field">
                            <label>CEP Cx. P</label>
                            <input type="text" readonly="" value="{{auth()->user()->presbitero->cx_postal_cep}}">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="three wide field">
                            <label>Telefone</label>
                            <input type="text" readonly="" value="{{auth()->user()->presbitero->telefone}}">
                        </div>
                        <div class="three wide field">
                            <label>Celular</label>
                            <input type="text" readonly="" value="{{auth()->user()->presbitero->celular}}">
                        </div>
                        <div class="three wide field">
                            <label>Tel. Igreja</label>
                            <input type="text" readonly="" value="{{auth()->user()->presbitero->igreja->telefone}}">
                        </div>
                        <div class="seven wide field">
                            <label>E-mail</label>
                            <input type="text" readonly="" value="{{auth()->user()->presbitero->email}}">
                        </div>
                    </div>
                </div>
            </div>
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
                    <input type="checkbox" name="status_relatorio"
                           value="1" @isset($resource) {{$resource->status_relatorio === 1 ? ' checked' : ''}} @endisset>
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
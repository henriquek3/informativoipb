<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta name="description"
          content="InformativoIPB é um micro S.A.D. desenvolvido para Igreja Presbiteriana do Brasil">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@jksistemas">
    <meta property="twitter:creator" content="@jksistemas">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="InformativoIPB">
    <meta property="og:title" content="InformativoIPB - Controle de Estatísticas da Igreja Presbiteriana do Brasil">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description"
          content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <script src="js/app/login-validator-app.js"></script>
    <style>.envelope {
            cursor: pointer;
        }</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico">
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/app/pace-app.js"></script>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.min.css">
    <title>InformativoIPB</title>
</head>
<body>
<!-- Navbar-->
<header>
    <div class="ui column grid">
        <div class="computer only column row">
            <div class="ui top fixed six item menu">
                <!--h2(style="position: absolute;") InformativoIPB-->
                <!--i.large.home.icon(style="position: absolute;")-->
                <div class="ui container">
                    <div class="ui simple dropdown item"><i class="big edit icon"></i>Cadastros<i
                                class="dropdown icon"></i>
                        <div class="menu"><a class="item" href="cadastros-sinodos"><i class="radio icon"></i>Sinodos</a><a
                                    class="item" href="cadastros-presbiterios"><i
                                        class="radio icon"></i>Presbitérios</a><a class="item" href="cadastros-igrejas"><i
                                        class="radio icon"></i>Igrejas</a><a class="item" href="cadastros-ministros"><i
                                        class="radio icon"></i>Ministros</a></div>
                    </div>
                    <div class="ui simple dropdown item"><i class="big browser icon"></i>Relatórios<i
                                class="dropdown icon"></i>
                        <div class="menu"><a class="item" href="relatorios-conselhos"><i class="radio icon"></i>Conselho</a><a
                                    class="item" href="relatorios-ministeriais"><i
                                        class="radio icon"></i>Ministerial</a><a class="item"
                                                                                 href="relatorios-estatisticas"><i
                                        class="radio icon"></i>Estatistica</a></div>
                    </div>
                    <div class="ui simple dropdown item"><i class="big cubes icon"></i>Presbitérios<i
                                class="dropdown icon"></i>
                        <div class="menu"><a class="item in-dev" href="reuniao-presbiterio"><i class="radio icon"></i>Incluir
                                Reunião</a><a class="item in-dev" href="consultar-estatisticas-presbiterio"><i
                                        class="radio icon"></i>Consultar Estatística</a></div>
                    </div>
                    <div class="ui simple dropdown item"><i class="big sitemap icon"></i>Sínodos<i
                                class="dropdown icon"></i>
                        <div class="menu"><a class="item sinodos in-dev" href="#"><i class="radio icon"></i>Incluir
                                Reunião</a><a class="item sinodos in-dev" href="#"><i class="radio icon"></i>Consultar
                                Estatística</a></div>
                    </div>
                    <div class="ui simple dropdown item"><i class="big bar chart icon"></i>Consultas<i
                                class="dropdown icon"></i>
                        <div class="menu"><a class="item in-dev" href="#"><i class="radio icon"></i>Reuniões de
                                Presbitérios</a><a class="item in-dev" href="#"><i class="radio icon"></i>Reuniões de
                                Sínodos</a><a class="item in-dev" href="#"><i class="radio icon"></i>Consulta Geral de
                                Membros</a><a class="item in-dev" href="#"><i class="radio icon"></i>Consulta Geral
                                Financeira</a><a class="item in-dev" href="#"><i class="radio icon"></i>Estatísticas de
                                Membresia</a></div>
                    </div>
                    <div class="ui simple dropdown item"><i class="big settings icon"></i>Configurações<i
                                class="dropdown icon"></i>
                        <div class="menu"><a class="item" href="meu-usuario"><i class="user icon"></i>Meu Usuário</a><a
                                    class="item" href="administrar-usuarios"><i class="users icon"></i>Administrar
                                Usuários</a><a class="item in-dev" href="#"><i class="options icon"></i>Parâmetros do
                                Sistema</a><a class="item in-dev" href="#"><i class="talk icon"></i>Solicitar
                                Ajuda</a><a class="item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                        class="sign out icon"></i>{{ __('Desconectar') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">@csrf</form>
                        </div>
                    </div>
                    <span style="margin-top:15px;margin-left: 20px;"><i
                                class="big envelope green icon looping"></i></span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Sidebar menu-->
<div class="ui sidebar vertical accordion menu">
    <div class="item" style="background-color: #16ab39;height: 150px"><img class="ui tiny avatar image"
                                                                           src="https://www.w3schools.com/w3css/img_avatar3.png"
                                                                           style="padding-top: 25px;"><span
                style="color: white;font-size: large;padding-left: 10px;font-weight: bold;">João Calvino</span><span
                style="display: flex;margin-top: -40px;margin-left: 93px;font-weight: 400;color: white;">Presbítero Docente</span><span
                style="display: flex;margin-top: 6px;margin-left: 93px;font-weight: 400;color: white;">IPB Cacoal</span>
    </div>
    <a class="item" href="inicio">INÍCIO<i class="home icon"></i></a>
    <div class="item"><a class="title"><i class="dropdown icon"></i>CADASTROS</a>
        <div class="content"><a class="item" href="cadastros-sinodos">SÍNODOS</a><a class="item"
                                                                                    href="cadastros-presbiterios">PRESBITÉRIOS</a><a
                    class="item" href="cadastros-igrejas">IGREJAS</a><a class="item" href="cadastros-ministros">PRESBÍTEROS</a>
        </div>
    </div>
    <div class="item"><a class="title"><i class="dropdown icon"></i>RELATÓRIOS</a>
        <div class="content"><a class="item" href="relatorios-conselhos">CONSELHO</a><a class="item"
                                                                                        href="relatorios-ministeriais">MINSTÉRIAL</a><a
                    class="item" href="relatorios-estatisticas">ESTATÍSTICA</a></div>
    </div>
    <div class="item"><a class="title"><i class="dropdown icon"></i>PRESBITÉRIOS</a>
        <div class="content"><a class="item in-dev" href="presbiterio-reuniao">INCLUIR REUNIÃO</a><a class="item in-dev"
                                                                                                     href="presbiterio-estatistica">CONSULTAR
                ESTATÍSTICA</a></div>
    </div>
    <div class="item"><a class="title"><i class="dropdown icon"></i>SÍNODOS</a>
        <div class="content"><a class="item in-dev" href="sinodo-reuniao">INCLUIR REUNIÃO</a><a class="item in-dev"
                                                                                                href="sinodo-estatistica">CONSULTAR
                ESTATÍSTICA</a></div>
    </div>
    <div class="item"><a class="title"><i class="dropdown icon"></i>CONSULTAS ESTATÍSTICAS</a>
        <div class="content"><a class="item in-dev" href="consultas-ministerial">REUNIÕES DE PRESBITÉRIOS</a><a
                    class="item in-dev" href="consultas-ministerial">REUNIÕES DE SÍNODOS</a><a class="item in-dev"
                                                                                               href="consultas-ministerial">GERAL
                DE MEMBROS</a><a class="item in-dev" href="consultas-ministerial">GERAL FINANCEIRA</a><a
                    class="item in-dev" href="consultas-ministerial">CRESCIMENTO EBD</a></div>
    </div>
    <div class="item"><a class="title"><i class="dropdown icon"></i>CONFIGURAÇÕES</a>
        <div class="content"><a class="item in-dev" href="meu-usuario">MEU USUÁRIO</a><a class="item"
                                                                                         href="administrar-usuarios">ADMINISTRAR
                USUÁRIOS</a><a class="item in-dev" href="parametros-sistema">PARÂMETROS DO SISTEMA</a><a
                    class="item in-dev" href="ajuda">SOLICITAR AJUDA</a></div>
    </div>
    <a class="item" id="logout_m">SAIR<i class="sign out icon"></i></a>
</div>
<main class="pusher">
    <!-- Header Mobile-->
    <div class="ui column grid">
        <div class="tablet only mobile only column row">
            <div class="ui big green top three item fixed menu"><a class="toc item"><i
                            class="large sidebar icon"></i></a><a class="item button" href="inicio"><i
                            class="large home icon"></i></a><a class="item button" href="consulta-mobile.html"><i
                            class="large bar chart icon"></i></a></div>
        </div>
    </div>
    <div class="ui container" style="margin-top: 100px; margin-bottom: 20px; display:none;" id="windows">
        <div class="ui segment">
            <div style="position: absolute;right: 20px;">
                <div class="ui breadcrumb"><a class="section" href="inicio"><i class="home icon"></i></a>
                    <div class="divider">/</div>
                    <a class="section">Relatórios</a>
                    <div class="divider">/</div>
                    <div class="active section">Ministerial</div>
                </div>
            </div>
            <div class="ui clearing"></div>
            <h2 class="ui floated header">Relatório Ministerial
                <div class="sub header">Relatório Ministerial. -> breve explicação da tela</div>
            </h2>
            <div class="ui clearing divider"></div>
            <p></p>
            <div class="ui top attached tabular menu"><a class="item" data-tab="first">Relatórios</a><a
                        class="item active" data-tab="second">Responder</a></div>
            <div class="ui bottom attached tab segment" data-tab="first">
                <table class="ui compact selectable celled green table" id="tbl_relatorios_ministeriais">
                    <thead>
                    <tr>
                        <th class="one wide">Código</th>
                        <th class="ten wide">Tipo Relatório</th>
                        <th class="two wide center aligned">Data Inclusão</th>
                        <th class="two wide center aligned">Ultima Alteração</th>
                        <th class="two wide center aligned">Status</th>
                        <th class="two wide center aligned">Ano</th>
                    </tr>
                    </thead>
                    <tbody id="tbody_relatorios_ministeriais"></tbody>
                </table>
            </div>
            <form class="ui bottom attached tab segment active" data-tab="second" id="relatorios_ministeriais"
                  name="relatorios_ministeriais">@csrf
                <div class="ui segments">
                    <div class="ui green segment" style="text-align: center; background-color: #F9FAFB">
                        <p><strong>Relatório do Ministro Presbiteriano</strong></p>
                    </div>
                    <div class="ui form segment">
                        <div class="fields">
                            <div class="two wide field">
                                <label>Ano</label>
                                <input type="text" value="2018" name="ano" readonly="">
                            </div>
                            <div class="four wide field">
                                <label>Sínodo</label>
                                <input type="text" name="sinodo" value="" disabled="">
                                <!--select.ui.fluid.search.dropdown(name="id_sinodo")
                                option

                                -->
                            </div>
                            <div class="five wide field" id="div_presbiterio">
                                <label>Presbitério</label>
                                <input type="text" name="presbiterio" value="" disabled="">
                                <!--select.ui.fluid.search.dropdown(name="id_presbiterio", id="id_presbiterio")-->
                                <!--div.ui.active.inline.small.loader(style="display:none", id="loader_presbiterio")-->
                            </div>
                            <div class="one wide field">
                                <label>ID</label>
                                <input type="text" name="id_igreja" value="" readonly="">
                            </div>
                            <div class="five wide field">
                                <label>Igreja</label>
                                <input type="text" name="igreja" value="" disabled="">
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
                            <div class="ten wide field">
                                <label>Nome</label>
                                <input type="hidden" name="id_presbitero" value="">
                                <input type="text" name="nome" placeholder="Digite seu Nome" disabled="">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="eight wide field">
                                <label>Nome do Pai</label>
                                <input type="text" name="nome_pai" placeholder="Nome do Pai" disabled="">
                            </div>
                            <div class="eight wide field">
                                <label>Nome da Mãe</label>
                                <input type="text" name="nome_mae" placeholder="Nome da Mãe" disabled="">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="ui calendar bottom left three wide field">
                                <label>Data de Nascimento</label>
                                <input class="datepicker2" type="text" value="0" name="nascimento_data"
                                       placeholder="Data de Nascimento" disabled="">
                            </div>
                            <div class="five wide field">
                                <label>Estado Natal</label>
                                <input type="text" disabled="" name="nascimento_id_estado">
                            </div>
                            <div class="eight wide field">
                                <label>Cidade Natal</label>
                                <input type="text" disabled="" name="nascimento_id_cidade">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="four wide field">
                                <label>RG</label>
                                <input type="text" name="rg" placeholder="RG" disabled="">
                            </div>
                            <div class="four wide field">
                                <label>Orgão Emissor</label>
                                <input type="text" name="rg_emissor" placeholder="Orgão Emissor" disabled="">
                            </div>
                            <div class="four wide field">
                                <label>CPF</label>
                                <input type="text" name="cpf" placeholder="CPF" disabled="">
                            </div>
                            <div class="five wide field">
                                <label>Estado Civil</label>
                                <input type="text" disabled="" name="estado_civil">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="ten wide field">
                                <label>Cônjuge</label>
                                <input type="text" name="conjuge_nome" placeholder="Cônjuge" disabled="">
                            </div>
                            <div class="ui calendar bottom left four wide field">
                                <label>Data de Nascimento</label>
                                <input class="datepicker2" type="text" value="0" name="conjuge_nascimento"
                                       placeholder="Data de Nascimento do Cônjuge" disabled="">
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
                                       placeholder="Nome dos Dependentes. OSB. use ; para separar os nomes" disabled="">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="six wide field">
                                <label>Endereço</label>
                                <input type="text" value="0" name="endereco" placeholder="Endereço" disabled="">
                            </div>
                            <div class="two wide field">
                                <label>Número</label>
                                <input type="text" value="0" name="endereco_nr" placeholder="Número" disabled="">
                            </div>
                            <div class="four wide field">
                                <label>Complemento</label>
                                <input type="text" value="0" name="endereco_complemento" placeholder="Complemento"
                                       disabled="">
                            </div>
                            <div class="four wide field">
                                <label>Bairro</label>
                                <input type="text" value="0" name="endereco_bairro" placeholder="Bairro" disabled="">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="four wide field">
                                <label>Estado</label>
                                <input type="text" disabled="" name="endereco_id_estado">
                            </div>
                            <div class="five wide field">
                                <label>Cidade</label>
                                <input type="text" disabled="" name="endereco_id_cidade">
                            </div>
                            <div class="two wide field">
                                <label>CEP</label>
                                <input type="text" name="cep" placeholder="CEP" disabled="">
                            </div>
                            <div class="two wide field">
                                <label>Cx. Postal</label>
                                <input type="text" name="cx_postal" placeholder="Caixa Postal" disabled="">
                            </div>
                            <div class="three wide field">
                                <label>CEP Cx. Postal</label>
                                <input type="text" name="cx_postal_cep" placeholder="CEP Cx. Postal" disabled="">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="three wide field">
                                <label>Celular</label>
                                <input type="text" name="celular" placeholder="Celular" disabled="">
                            </div>
                            <div class="three wide field">
                                <label>Telefone Fixo</label>
                                <input type="text" name="telefone" placeholder="Telefone Fixo" disabled="">
                            </div>
                            <div class="three wide field">
                                <label>Telefone da Igreja</label>
                                <input type="text" name="telefone_igreja" placeholder="Telefone da Igreja" disabled="">
                            </div>
                            <div class="seven wide field">
                                <label>E-mail</label>
                                <input type="email" name="email" placeholder="E-Mail" disabled="">
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
                                <textarea rows="2" value="0" name="campos_igrejas"></textarea>
                            </div>
                            <div class="eight wide field">
                                <label>Congregação(ões):</label>
                                <textarea rows="2" value="0" name="campos_congregacoes"></textarea>
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
                                <input type="text" value="0" name="pregacoes">
                            </div>
                            <div class="four wide field">
                                <label>Aulas de Escola Dominical:</label>
                                <input type="text" value="0" name="ebd">
                            </div>
                            <div class="four wide field">
                                <label>Trabalhos de Evangelização:</label>
                                <input type="text" value="0" name="evangelizacao">
                            </div>
                            <div class="four wide field">
                                <label>Estudos Bíblicos:</label>
                                <input type="text" value="0" name="estudos_biblicos">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="four wide field">
                                <label>Palestras, preleções especiais:</label>
                                <input type="text" value="0" name="palestras_prelecoes">
                            </div>
                            <div class="four wide field">
                                <label>Mensagens - Rádio/TV:</label>
                                <input type="text" value="0" name="msg_radio">
                            </div>
                            <div class="four wide field">
                                <label>Artigos-jornais, boletins, revistas:</label>
                                <input type="text" value="0" name="artigos_boletins_revistas">
                            </div>
                            <div class="four wide field">
                                <label>Entrevistas:</label>
                                <input type="text" value="0" name="entrevistas">
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
                                <input type="text" value="0" name="santa_ceia">
                            </div>
                            <div class="six wide field">
                                <label>Bênçãos Nupciais (com ou sem efeito civil):</label>
                                <input type="text" value="0" name="bencaos_nupciais">
                            </div>
                            <div class="five wide field">
                                <label>Funerais:</label>
                                <input type="text" value="0" name="funerais">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="five wide field">
                                <label>Batismos Infantis:</label>
                                <input type="text" value="0" name="batismos">
                            </div>
                            <div class="six wide field">
                                <label>Profissões de Fé:</label>
                                <input type="text" value="0" name="profissoes_fe">
                            </div>
                            <div class="five wide field">
                                <label>Profissões de Fé & Batismos:</label>
                                <input type="text" value="0" name="profissoes_batismos">
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
                                <input type="text" value="0" name="aconselhamentos">
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
                                <input type="text" value="0" name="visitas_igrejas">
                            </div>
                            <div class="three wide field">
                                <label>Departamentos Internos</label>
                                <input type="text" value="0" name="departamentos_internos">
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
                                <textarea rows="5" value="0" name="descricao_atividades"></textarea>
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
                                <input type="text" value="0" name="reunioes_conselho">
                            </div>
                            <div class="four wide field">
                                <label>Assembleias Gerais da Igreja:</label>
                                <input type="text" value="0" name="assembleias">
                            </div>
                            <div class="four wide field">
                                <label>Diáconos Ordenados e/ou Investidos:</label>
                                <input type="text" value="0" name="diaconos_ordenados_investidos">
                            </div>
                            <div class="four wide field">
                                <label>Presbíteros Ordenados e/ou Investidos:</label>
                                <input type="text" value="0" name="presbiteros_ordenados_investidos">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="three wide field">
                                <label>Reuniões do Presbitério:</label>
                                <input type="text" value="0" name="reunioes_presbiterio">
                            </div>
                            <div class="three wide field">
                                <label>Reuniões do Sínodo:</label>
                                <input type="text" value="0" name="reunioes_sinodo">
                            </div>
                            <div class="four wide field">
                                <label>Reuniões do Supremo Concílio da IPB:</label>
                                <input type="text" value="0" name="reunioes_concilio">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="sixteen wide field">
                                <label>Comentários:</label>
                                <textarea rows="3" value="0" name="comentarios"></textarea>
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
                                <textarea rows="3" value="0" name="cargos_presbiterio"></textarea>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="sixteen wide field">
                                <label>No Sínodo:</label>
                                <textarea rows="3" value="0" name="cargos_sinodo"></textarea>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="sixteen wide field">
                                <label>No Supremo Concílio:</label>
                                <textarea rows="3" value="0" name="cargos_concilio"></textarea>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="sixteen wide field">
                                <label>Em Juntas, Comissões e Autarquias da IPB:</label>
                                <textarea rows="3" value="0" name="cargos_outros"></textarea>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="sixteen wide field">
                                <label>Texto complementar::</label>
                                <textarea rows="4" name="texto_complementar"></textarea>
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
                                <textarea rows="3" value="0" name="atualizacao_aperfeicoamento"></textarea>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="sixteen wide field">
                                <label>2. Atividades em entidades para-eclesiásticas:</label>
                                <textarea rows="3" value="0" name="atividades_para_eclesiasticas"></textarea>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="sixteen wide field">
                                <label>3. Atividades Extra Ministeriais:</label>
                                <textarea rows="3" value="0" name="atividades_extras_ministeriais"></textarea>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="sixteen wide field">
                                <label>Outras</label>
                                <textarea rows="3" value="0" name="atividades_outros"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui segments">
                    <div class="ui green segment" style="text-align: center; background-color: #F9FAFB">
                        <p><strong>INFORMAÇÕES SOBRE O PREENCHIMENTO</strong></p>
                    </div>
                    <div class="ui horizontal segments">
                        <div class="ui segment"><span><strong>Usuário inclusão:</strong></span><span>
                    &nbsp;
                    Kallew Pavão
                    &nbsp;</span><span style="float: right;"><strong>Data:</strong>&nbsp;
                    01/01/2018</span></div>
                        <div class="ui segment"><span><strong>Última alteração:</strong></span><span>
                    &nbsp;
                    Kallew Pavão
                    &nbsp;</span><span style="float: right;"><strong>Data:</strong>&nbsp;
                    01/01/2018</span></div>
                    </div>
                    <div class="ui segment">
                        <div class="ui toggle checkbox" data-tooltip="Deixe AZUL caso tenha FINALIZADO este relatório.">
                            <label>Relatório Finalizado</label>
                            <input type="checkbox" name="relatorio_finalizado">
                        </div>
                    </div>
                </div>
                <div class="ui clearing divider"></div>
                <div style="text-align: center">
                    <button class="ui green labeled icon button" type="submit"><i class="plus icon"></i>Gravar</button>
                    <button class="ui reset button" type="reset"><i class="minus icon"></i>Limpar</button>
                    <button class="ui red right labeled icon button" type="button"><i class="remove icon"></i>Excluir
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="ui small modal">
        <div class="header"><span>Painel de Alertas</span><span style="margin-left: 10px;position: absolute;"><i
                        class="big teal bullhorn icon"></i></span></div>
        <div class="scrolling content">
            <div class="segment">
                <div class="ui header">
                    Relatórios Finalizados
                </div>
                <table class="ui basic table">
                    <thead class="full-width">
                    <tr>
                        <th class="center aligned">Visualizado</th>
                        <th>Igreja</th>
                        <th>Relatório</th>
                        <th>Data Finalizado</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="collapsing"><span class="ui checkbox">
                      <input type="checkbox">
                      <label><i class="eye icon"></i></label></span></td>
                        <td>IGREJA PRESBITERIANA LUZ E VIDA</td>
                        <td>RELATÓRIO FINANCEIRO</td>
                        <td>21/03/2018</td>
                    </tr>
                    <tr>
                        <td class="collapsing"><span class="ui checkbox">
                      <input type="checkbox" checked="">
                      <label><i class="eye icon"></i></label></span></td>
                        <td>IGREJA PRESBITERIANA LUZ E VIDA</td>
                        <td>RELATÓRIO FINANCEIRO</td>
                        <td>21/03/2018</td>
                    </tr>
                    <tr>
                        <td class="collapsing"><span class="ui checkbox">
                      <input type="checkbox">
                      <label><i class="eye icon"></i></label></span></td>
                        <td>IGREJA PRESBITERIANA LUZ E VIDA</td>
                        <td>RELATÓRIO FINANCEIRO</td>
                        <td>21/03/2018</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <p></p>
            <div class="ui clearing divider"></div>
            <p></p>
            <div class="segment">
                <div class="ui header">Mensagens do sistema</div>
                <div class="ui info message">
                    <div class="header">Calendário de reuniões</div>
                    <ui class="list">
                        <li>A reunião do conselho da igreja acontecerá nos dias 16/05/2018 à 22/05/2018.</li>
                        <li>A reunião do presbitério acontecerá nos dias 16/05/2018 à 22/05/2018.</li>
                        <li>A reunião do sínodo acontecerá nos dias 22/10/2018 à 25/10/2018.</li>
                    </ui>
                </div>
            </div>
        </div>
        <div class="actions">
            <button class="ui primary labeled icon button approve"><i class="envelope open icon"></i>OK</button>
        </div>
    </div>
</main>
<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.2.1.min.js"></script>
<!--script(src='js/popper.min.js')-->
<script src="js/plugins/iziToast.min.js"></script>
<script src="js/semantic.min.js"></script>
<script src="js/plugins/select2.min.js"></script>
<script src="js/plugins/chart.js"></script>
<script src="js/app/main-app.js"></script>
<!-- Page specific javascripts-->
<script src="js/app/jquery-validate-app.js"></script>
<script src="js/plugins/bootstrap-datepicker.min.js"></script>
<script src="js/plugins/bootstrap-datepicker.pt-BR.min.js"></script>
<script src="js/plugins/dataTables.min.js"></script>
<script src="js/plugins/sweetalert.min.js"></script>
<script src="js/app/relatorios-ministeriais-app.js"></script>
<script>var usuario = {!!\App\User::with(['presbitero', 'presbitero.igreja', 'presbitero.igreja.presbiterio', 'presbitero.igreja.presbiterio.sinodo', 'presbitero.endereco_estado', 'presbitero.endereco_cidade', 'presbitero.nascimento_estado', 'presbitero.nascimento_cidade',])->where('id', 1)->get()!!}</script>
</body>
</html>
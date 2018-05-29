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
                    <div class="active section">Estatísticas</div>
                </div>
            </div>
            <div class="ui clearing"></div>
            <h2 class="ui floated header">Relatório de Estatísticas
                <div class="sub header">Relatório de Estatísticas. -> breve explicação da tela</div>
            </h2>
            <div class="ui clearing divider"></div>
            <p></p>
            <div class="ui top attached tabular menu"><a class="item active" data-tab="first">Relatórios</a><a
                        class="item" data-tab="second">Responder</a></div>
            <div class="ui bottom attached tab segment active" data-tab="first">
                <table class="ui compact selectable celled blue table" id="tbl_relatorios_estatisticas">
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
                    <tbody id="tbody_relatorios_estatisticas">
                    <tr>
                        <td>01</td>
                        <td>RELATÓRIO ESTATÍSTICAS</td>
                        <td>11/02/2017</td>
                        <td>20/02/2017</td>
                        <td>Em Edição</td>
                        <td>2018</td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>RELATÓRIO ESTATÍSTICAS</td>
                        <td>11/05/2016</td>
                        <td>20/08/2016</td>
                        <td>Importado</td>
                        <td>2017</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!--form.ui.bottom.attached.tab.segment.active(data-tab="second", id="relatorios_estatisticas", name="relatorios_estatisticas")-->
            <form class="ui bottom attached tab segment" data-tab="second" id="relatorios_estatisticas">@csrf
                <div class="ui segments">
                    <div class="ui blue segment" style="text-align: center; background-color: #F9FAFB">
                        <p><strong>INFORMAÇÕES CADASTRAIS E ESTATÍSTICAS DE COMUNIDADE PRESBITERIANA</strong></p>
                    </div>
                    <div class="ui form segment">
                        <div class="fields">
                            <div class="two wide field">
                                <label>Ano</label>
                                <input type="text" value="2018" name="ano">
                            </div>
                            <div class="seven wide field">
                                <label>Sínodo</label>
                                <input type="text" name="sinodo" value="" disabled="">
                                <!--select.ui.fluid.search.dropdown(name="id_sinodo")
                                option

                                -->
                            </div>
                            <div class="seven wide field" id="div_presbiterio">
                                <label>Presbitério</label>
                                <input type="text" name="presbiterio" value="" disabled="">
                                <!--select.ui.fluid.search.dropdown(name="id_presbiterio", id="id_presbiterio")-->
                                <!--div.ui.active.inline.small.loader(style="display:none", id="loader_presbiterio")-->
                            </div>
                            <!--div.six.wide.field
                            label Igreja
                            input(type="text", name="igreja", value="", disabled="")
                            //select.ui.fluid.search.dropdown(name="id_igreja")
                            //div.ui.active.inline.small.loader(style="display:none", id="loader_igreja")

                            -->
                        </div>
                    </div>
                    <!--div.ui.form.segment
                    div.fields
                        div.two.wide.field
                            label Ano
                            input(type="text", value="2018", name="ano")
                        div.four.wide.field
                            label Sínodo
                            select.ui.fluid.search.dropdown(name="id_sinodo")
                                option

                        div.six.wide.field(id="div_presbiterio")
                            label Presbitério
                            select.ui.fluid.search.dropdown(name="id_presbiterio", id="id_presbiterio")
                            div.ui.active.inline.small.loader(style="display:none", id="loader_presbiterio")

                        div.six.wide.field
                            label Igreja
                            select.ui.fluid.search.dropdown(name="id_igreja")
                            div.ui.active.inline.small.loader(style="display:none", id="loader_igreja")

                    -->
                </div>
                <div class="ui segments">
                    <div class="ui blue segment" style="text-align: center; background-color: #F9FAFB">
                        <p><strong>I - Identificação da Igreja / Congregação Presbiterial</strong></p>
                    </div>
                    <div class="ui form segment">
                        <div class="fields">
                            <div class="sixteen wide field">
                                <label>Nome (Igreja/Congregação)</label>
                                <input type="text" value="0" disabled="" name="nome">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="eight wide field">
                                <label>Endereço</label>
                                <input type="text" value="0" disabled="" name="endereco">
                            </div>
                            <div class="two wide field">
                                <label>Número</label>
                                <input type="text" value="0" disabled="" name="endereco_numero">
                            </div>
                            <div class="three wide field">
                                <label>Complemento</label>
                                <input type="text" value="0" disabled="" name="endereco_complemento">
                            </div>
                            <div class="three wide field">
                                <label>Bairro</label>
                                <input type="text" value="0" disabled="" name="endereco_bairro">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="four wide field">
                                <label>Estado</label>
                                <input type="text" disabled="" name="estado">
                            </div>
                            <div class="four wide field">
                                <label>Cidade</label>
                                <input type="text" disabled="" name="cidade">
                            </div>
                            <div class="three wide field">
                                <label>CEP</label>
                                <input type="text" value="0" disabled="" name="endereco_cep">
                            </div>
                            <div class="two wide field">
                                <label>Cx. P</label>
                                <input type="text" value="0" disabled="" name="endereco_cx_postal">
                            </div>
                            <div class="three wide field">
                                <label>CEP Cx. P</label>
                                <input type="text" value="0" disabled="" name="endereco_cx_cep">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="two wide field">
                                <label>Telefone</label>
                                <input type="text" value="0" disabled="" name="telefone">
                            </div>
                            <div class="four wide field">
                                <label>E-Mail</label>
                                <input type="text" value="0" disabled="" name="email">
                            </div>
                            <div class="four wide field">
                                <label>HomePage</label>
                                <input type="text" value="0" disabled="" name="homepage">
                            </div>
                            <div class="three wide field">
                                <label>CNPJ</label>
                                <input type="text" value="0" disabled="" name="cnpj">
                            </div>
                            <div class="three wide field">
                                <label>Data Organização</label>
                                <input type="text" value="0" disabled="" name="data_organizacao">
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
                                    <div class="four wide field">
                                        <input type="text" value="0" name="ec_pastores">
                                    </div>
                                </div>
                                <div class="inline fields">
                                    <div class="five wide field">
                                        <label>Licenciados</label>
                                    </div>
                                    <div class="four wide field">
                                        <input type="text" value="0" name="ecl_licenciados">
                                    </div>
                                </div>
                                <div class="inline fields">
                                    <div class="five wide field">
                                        <label>Presbíteros</label>
                                    </div>
                                    <div class="four wide field">
                                        <input type="text" value="0" name="ecl_presbiteros">
                                    </div>
                                </div>
                                <div class="inline fields">
                                    <div class="five wide field">
                                        <label>Diáconos</label>
                                    </div>
                                    <div class="four wide field">
                                        <input type="text" value="0" name="ecl_diaconos">
                                    </div>
                                </div>
                                <div class="inline fields">
                                    <div class="five wide field">
                                        <label>Evangelistas</label>
                                    </div>
                                    <div class="four wide field">
                                        <input type="text" value="0" name="ecl_evangelistas">
                                    </div>
                                </div>
                                <div class="inline fields">
                                    <div class="five wide field">
                                        <label>Missionários</label>
                                    </div>
                                    <div class="four wide field">
                                        <input type="text" value="0" name="ecl_missionarios">
                                    </div>
                                </div>
                                <div class="inline fields">
                                    <div class="five wide field">
                                        <label>Candidatos</label>
                                    </div>
                                    <div class="four wide field">
                                        <input type="text" value="0" name="ecl_candidatos">
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
                                        <input type="text" value="0" name="ect_congregacoes">
                                    </div>
                                </div>
                                <div class="inline fields">
                                    <div class="ten wide field">
                                        <label>Pontos de Pregação</label>
                                    </div>
                                    <div class="six wide field">
                                        <input type="text" value="0" name="ect_pontos_pregacao">
                                    </div>
                                </div>
                                <div class="inline fields">
                                    <div class="ten wide field">
                                        <label>Escolas Dominicais</label>
                                    </div>
                                    <div class="six wide field">
                                        <input type="text" value="0" name="ect_ebd">
                                    </div>
                                </div>
                                <div class="inline fields">
                                    <div class="ten wide field">
                                        <label>Professores da EBD</label>
                                    </div>
                                    <div class="six wide field">
                                        <input type="text" value="0" name="ect_professores">
                                    </div>
                                </div>
                                <div class="inline fields">
                                    <div class="ten wide field">
                                        <label>Alunos EBD (Ano Atual)</label>
                                    </div>
                                    <div class="six wide field">
                                        <input type="text" value="0" name="ect_alunos_ebd_atual">
                                    </div>
                                </div>
                                <div class="inline fields">
                                    <div class="ten wide field">
                                        <label>Alunos EBD (Ano Anterior)</label>
                                    </div>
                                    <div class="six wide field">
                                        <input type="text" value="0" name="ect_alunos_ebd_anterior">
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
                                            <input type="text" value="0" name="di_ucp_dep">
                                        </div>
                                    </div>
                                    <div class="six wide field">
                                        <div class="ui labeled input" data-tooltip="Nº de Membros">
                                            <div class="ui label">M.</div>
                                            <input type="text" value="0" name="di_ucp_membros">
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
                                            <input type="text" value="0" name="di_upa_dep">
                                        </div>
                                    </div>
                                    <div class="six wide field">
                                        <div class="ui labeled input" data-tooltip="Nº de Membros">
                                            <div class="ui label">M.</div>
                                            <input type="text" value="0" name="di_upa_membros">
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
                                            <input type="text" value="0" name="di_ump_dep">
                                        </div>
                                    </div>
                                    <div class="six wide field">
                                        <div class="ui labeled input" data-tooltip="Nº de Membros">
                                            <div class="ui label">M.</div>
                                            <input type="text" value="0" name="di_ump_membros">
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
                                            <input type="text" value="0" name="di_saf_dep">
                                        </div>
                                    </div>
                                    <div class="six wide field">
                                        <div class="ui labeled input" data-tooltip="Nº de Membros">
                                            <div class="ui label">M.</div>
                                            <input type="text" value="0" name="di_saf_membros">
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
                                            <input type="text" value="0" name="di_uph_dep">
                                        </div>
                                    </div>
                                    <div class="six wide field">
                                        <div class="ui labeled input" data-tooltip="Nº de Membros">
                                            <div class="ui label">M.</div>
                                            <input type="text" value="0" name="di_uph_membros">
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
                                            <input type="text" value="0" name="di_outras_dep">
                                        </div>
                                    </div>
                                    <div class="six wide field">
                                        <div class="ui labeled input" data-tooltip="Nº de Membros">
                                            <div class="ui label">M.</div>
                                            <input type="text" value="0" name="di_outras_membros">
                                        </div>
                                    </div>
                                </div>
                                <div class="inline fields">
                                    <div class="four wide field">
                                        <label>Total</label>
                                    </div>
                                    <div class="six wide field">
                                        <div class="ui labeled input" data-tooltip="Nº de Departamentos">
                                            <div class="ui label">D.</div>
                                            <label>TOTAL</label>
                                        </div>
                                    </div>
                                    <div class="six wide field">
                                        <div class="ui labeled input" data-tooltip="Nº de Membros">
                                            <div class="ui label">M.</div>
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rma_profissao_fe_masc" id="masc">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rma_profissao_fe_fem" id="fem">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rma_profissao_batismo_masc">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rma_profissao_batismo_fem">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rma_transf_masc">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rma_transf_fem">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rma_jurisdicao_masc">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rma_jurisdicao_fem">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rma_restauracao_masc">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rma_restauracao_fem">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rma_designacao_masc">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rma_designacao_fem">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rma_batismo_masc">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rma_batismo_fem">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rma_transferencia_masc">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rma_transferencia_fem">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rma_jurisdicao_ex_masc">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rma_jurisdicao_ex_fem">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rmd_transferencia_masc">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rmd_transferencia_fem">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rmd_falecimento_masc">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rmd_falecimento_fem">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rmd_exclucao_masc">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rmd_exclucao_fem">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rmd_ordenacao_masc">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rmd_ordenacao_fem">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rmd_profissao_masc">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rmd_profissao_fem">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rmd_transferencia_masc__ncomumg">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rmd_transferencia_fem__ncomumg">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rmd_falecimento_masc_ncomumg">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rmd_falecimento_fem_ncomumg">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rmd_exclusao_masc">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rmd_exclusao_fem">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui horizontal segments">
                            <div class="ui segment">
                                <div class="inline fields">
                                    <div class="five wide field">
                                        <label>Rol Separado</label>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">M</div>
                                            <input type="text" value="0" name="rmd_separado_masc">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rmd_separado_fem">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rmd_diferenca_masc">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rmd_diferenca_fem">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rmd_comung_anterior_masc">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rmd_comung_anterior_fem">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rmd_comung_atual_masc">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rmd_comung_atual_fem">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rmd_dif_comung_masc">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rmd_dif_comung_fem">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rmd_nao_comung_anterior_masc">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rmd_nao_comung_anterior_fem">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rmd_nao_comung_atual_masc">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rmd_nao_comung_atual_fem">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
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
                                            <input type="text" value="0" name="rmd_rol_atual_masc">
                                        </div>
                                    </div>
                                    <div class="four wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">F</div>
                                            <input type="text" value="0" name="rmd_rol_atual_fem">
                                        </div>
                                    </div>
                                    <div class="three wide field">
                                        <div class="ui labeled input disabled">
                                            <label>TOTAL</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <div class="inline fields">
                                    <div class="eight wide field">
                                        <label>Saldo - Ano Anterior</label>
                                    </div>
                                    <div class="six wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">R$</div>
                                            <input type="text" value="0" name="if_mf_saldo_anterior">
                                        </div>
                                    </div>
                                </div>
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
                                            <input type="text" value="0" name="fina_dizimos">
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
                                            <input type="text" value="0" name="fina_ofertas_especificas">
                                        </div>
                                    </div>
                                </div>
                                <div class="inline fields">
                                    <div class="eight wide field">
                                        <label>Total de Receita Anual</label>
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
                                        <label>Grande Total</label>
                                    </div>
                                    <div class="six wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">R$</div>
                                            <label>TOTAL</label>
                                        </div>
                                    </div>
                                </div>
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
                                            <input type="text" value="0" name="fina_patrimonio">
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
                                            <input type="text" value="0" name="fina_causas">
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
                                            <input type="text" value="0" name="fina_evangelismo">
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
                                            <input type="text" value="0" name="fina_missoes">
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
                                            <input type="text" value="0" name="fina_sustento_pastoral">
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
                                            <input type="text" value="0" name="fina_verba_presbiterial">
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
                                            <input type="text" value="0" name="fina_dizimo_supremo">
                                        </div>
                                    </div>
                                </div>
                                <div class="inline fields">
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
                                </div>
                                <div class="inline fields">
                                    <div class="eight wide field">
                                        <label>Grande Total</label>
                                    </div>
                                    <div class="six wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">R$</div>
                                            <label>TOTAL</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui segment">
                                <div class="ui top attached label blue" style="text-align: center;">PREVISÃO
                                    ORÇAMENTÁRIA - PRÓXIMO EXERCÍCIO
                                </div>
                                <div class="inline fields">
                                    <div class="eight wide field">
                                        <label>Saldo - Ano Anterior</label>
                                    </div>
                                    <div class="six wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">R$</div>
                                            <input type="text" value="0" name="if_po_saldo_anterior">
                                        </div>
                                    </div>
                                </div>
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
                                            <input type="text" value="0" name="finp_dizimos">
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
                                            <input type="text" value="0" name="finp_ofertas_especificas">
                                        </div>
                                    </div>
                                </div>
                                <div class="inline fields">
                                    <div class="eight wide field">
                                        <label>Total de Receita Anual</label>
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
                                        <label>Grande Total</label>
                                    </div>
                                    <div class="six wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">R$</div>
                                            <label>TOTAL</label>
                                        </div>
                                    </div>
                                </div>
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
                                            <input type="text" value="0" name="finp_patrimonio">
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
                                            <input type="text" value="0" name="finp_causas">
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
                                            <input type="text" value="0" name="finp_evangelismo">
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
                                            <input type="text" value="0" name="finp_missoes">
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
                                            <input type="text" value="0" name="finp_sustento_pastoral">
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
                                            <input type="text" value="0" name="finp_verba_presbiterial">
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
                                            <input type="text" value="0" name="finp_dizimo_supremo">
                                        </div>
                                    </div>
                                </div>
                                <div class="inline fields">
                                    <div class="eight wide field">
                                        <label>Total Despesa Anual</label>
                                    </div>
                                    <div class="six wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">R$</div>
                                            <input type="text" value="0" name="id_presbitero_conselho">
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
                                </div>
                                <div class="inline fields">
                                    <div class="eight wide field">
                                        <label>Grande Total</label>
                                    </div>
                                    <div class="six wide field">
                                        <div class="ui labeled input">
                                            <div class="ui label">R$</div>
                                            <label>TOTAL</label>
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
                            <div class="sixteen wide field">
                                <label>Secretário do Conselho</label>
                                <input type="text" value="0" disabled="">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="eight wide field">
                                <label>Endereço</label>
                                <input type="text" value="0" disabled="">
                            </div>
                            <div class="two wide field">
                                <label>Número</label>
                                <input type="text" value="0" disabled="">
                            </div>
                            <div class="three wide field">
                                <label>Complemento</label>
                                <input type="text" value="0" disabled="">
                            </div>
                            <div class="three wide field">
                                <label>Bairro</label>
                                <input type="text" value="0" disabled="">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="four wide field">
                                <label>Estado</label>
                                <select class="ui fluid search dropdown disabled"></select>
                            </div>
                            <div class="four wide field">
                                <label>Cidade</label>
                                <select class="ui fluid search dropdown disabled"></select>
                            </div>
                            <div class="three wide field">
                                <label>CEP</label>
                                <input type="text" value="0" disabled="">
                            </div>
                            <div class="two wide field">
                                <label>Cx. P</label>
                                <input type="text" value="0" disabled="">
                            </div>
                            <div class="three wide field">
                                <label>CEP Cx. P</label>
                                <input type="text" value="0" disabled="">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="three wide field">
                                <label>Telefone</label>
                                <input type="text" value="0" disabled="">
                            </div>
                            <div class="three wide field">
                                <label>Celular</label>
                                <input type="text" value="0" disabled="">
                            </div>
                            <div class="three wide field">
                                <label>Tel. Igreja</label>
                                <input type="text" value="0" disabled="">
                            </div>
                            <div class="seven wide field">
                                <label>E-mail</label>
                                <input type="text" value="0" disabled="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui segments">
                    <div class="ui blue segment" style="text-align: center; background-color: #F9FAFB">
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
<script src="js/app/relatorios-estatisticas-app.js"></script>
<script>var usuario = {!!\App\User::with(['presbitero', 'presbitero.igreja', 'presbitero.igreja.presbiterio', 'presbitero.igreja.presbiterio.sinodo', 'presbitero.endereco_estado', 'presbitero.endereco_cidade', 'presbitero.nascimento_estado', 'presbitero.nascimento_cidade',])->where('id', 1)->get()!!}</script>
</body>
</html>
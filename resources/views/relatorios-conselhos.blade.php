<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta name="description"
          content="InformativoIPB é um micro S.A.D. desenvolvido para Igreja Presbiteriana do Brasil">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@jksistemas">
    <meta property="twitter:creator" content="@jksistemas"><!-- Open Graph Meta-->
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
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" href="images/favicon.ico"><!-- The javascript plugin to display page loading on top-->
    <script src="js/app/pace-app.js"></script><!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.min.css">
    <title>InformativoIPB</title></head>
<body><!-- Navbar-->
<header>
    <div class="ui column grid">
        <div class="computer only column row">
            <div class="ui top fixed six item menu"><!--h2(style="position: absolute;") InformativoIPB-->
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
                                Ajuda</a><a class="item" id="logout" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                        class="sign out icon"></i>{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">@csrf</form>
                        </div>
                    </div>
                    <span style="margin-top:15px;margin-left: 20px;"><i
                                class="big envelope green icon looping"></i></span></div>
            </div>
        </div>
    </div>
</header><!-- Sidebar menu-->
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
    <a class="item" id="logout_m">SAIR<i class="sign out icon"></i></a></div>
<main class="pusher"><!-- Header Mobile-->
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
                    <div class="active section">Conselho</div>
                </div>
            </div>
            <div class="ui clearing"></div>
            <h2 class="ui floated header">Relatórios do Conselho
                <div class="sub header">Relatórios do conselho. -> breve explicação da tela</div>
            </h2>
            <div class="ui clearing divider"></div>
            <p></p>
            <div class="ui top attached tabular menu"><a class="item" data-tab="first">Relatórios</a><a
                        class="item active" data-tab="second">Responder</a></div>
            <div class="ui bottom attached tab segment" data-tab="first">
                <table class="ui compact selectable celled green table" id="tbl_reletorios_conselhos">
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
                    <tbody id="tbody_relatorios_conselhos">
                    <tr>
                        <td>01</td>
                        <td>RELATÓRIO DO CONSELHO</td>
                        <td>01/02/2017</td>
                        <td>20/02/2017</td>
                        <td>Em Edição</td>
                        <td>2018</td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>RELATÓRIO DO CONSELHO</td>
                        <td>01/05/2016</td>
                        <td>20/08/2016</td>
                        <td>Importado</td>
                        <td>2017</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <form class="ui bottom attached tab segment active" data-tab="second" name="relatorios_conselhos"
                  id="relatorios_conselhos">
                <div class="ui segments">
                    <div class="ui red segment" style="text-align: center; background-color: #F9FAFB"><p><strong>Relatório
                                do Conselho ou Mesa Administrativa</strong></p></div>
                    <div class="ui form segment">
                        <div class="fields">
                            <div class="two wide field"><label>Ano</label> <input type="text" value="2018" disabled="">
                            </div>
                            <div class="two wide field"><label>Sínodo</label> <input type="text" value="SCA"
                                                                                     disabled=""></div>
                            <div class="two wide field"><label>Presbitério</label> <input type="text" value="PRON"
                                                                                          disabled=""></div>
                            <div class="eight wide field"><label>Igreja</label> <input type="text"
                                                                                       value="IGREJA PRESBITERIANA LUZ E VIDA"
                                                                                       disabled=""></div>
                            <div class="two wide field"><label>Sigla</label> <input type="text" value="?????"
                                                                                    disabled=""></div>
                        </div>
                    </div>
                </div>
                <div class="ui segments">
                    <div class="ui red segment" style="text-align: center; background-color: #F9FAFB"><p><strong>I -
                                Identificação da Igreja / Congregação Presbiterial</strong></p></div>
                    <div class="ui form segment">
                        <div class="fields">
                            <div class="sixteen wide field"><label>Nome (Igreja/Congregação)</label> <input type="text"
                                                                                                            disabled=""
                                                                                                            name="">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="eight wide field"><label>Endereço</label> <input type="text" disabled=""
                                                                                         name="endereco"></div>
                            <div class="two wide field"><label>Número</label> <input type="text" disabled=""
                                                                                     name="endereco_numero"></div>
                            <div class="three wide field"><label>Complemento</label> <input type="text" disabled=""
                                                                                            name="endereco_complemento">
                            </div>
                            <div class="three wide field"><label>Bairro</label> <input type="text" disabled=""
                                                                                       name="endereco_bairro"></div>
                        </div>
                        <div class="fields">
                            <div class="four wide field"><label>Estado</label> <select
                                        class="ui fluid search dropdown disabled" name=""></select></div>
                            <div class="four wide field"><label>Cidade</label> <select
                                        class="ui fluid search dropdown disabled" name=""></select></div>
                            <div class="three wide field"><label>CEP</label> <input type="text" disabled=""
                                                                                    name="endereco_cep"></div>
                            <div class="two wide field"><label>Cx. P</label> <input type="text" disabled=""
                                                                                    name="endereco_cx_postal"></div>
                            <div class="three wide field"><label>CEP Cx. P</label> <input type="text" disabled=""
                                                                                          name="endereco_cx_cep"></div>
                        </div>
                        <div class="fields">
                            <div class="two wide field"><label>Telefone</label> <input type="text" disabled=""
                                                                                       name="telefone"></div>
                            <div class="four wide field"><label>E-Mail</label> <input type="text" disabled=""
                                                                                      name="email"></div>
                            <div class="four wide field"><label>HomePage</label> <input type="text" disabled=""
                                                                                        name="homepage"></div>
                            <div class="three wide field"><label>CNPJ</label> <input type="text" disabled=""
                                                                                     name="cnpj"></div>
                            <div class="three wide field"><label>Data Organização</label> <input type="text" disabled=""
                                                                                                 name="data_organizacao">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui segments">
                    <div class="ui red segment" style="text-align: center; background-color: #F9FAFB"><p><strong>II -
                                INFORMAÇÕES DO TRABALHO</strong></p></div>
                    <div class="ui form segment">
                        <div class="ui red ribbon label" style="font-size:0.92857143em;">1. ORGANIZAÇÃO</div>
                        <strong style="color:#FF695E;">1.1. ORGANIZAÇÃO</strong></div>
                    <div class="ui form segment">
                        <div class="inline fields">
                            <div class="eight wide field"
                                 data-tooltip="Os imóveis que pertencem a igreja estão devidamente documentados?">
                                <div class="ten wide field"><span class="ui label">1.1.1</span> <label>Imóveis
                                        Documentados</label></div>
                                <div class="six wide field">
                                    <div class="ui radio checkbox"><input name="or_imovel_documentado" type="radio">
                                        <label>Sim</label></div>
                                    <div class="ui radio checkbox"><input name="or_imovel_documentado" type="radio"
                                                                          checked="checked"> <label>Não</label></div>
                                </div>
                            </div>
                            <div class="eight wide field"
                                 data-tooltip="A igreja apresentou no ano passado quais declarações Fiscais?">
                                <div class="eight wide field"><span class="ui label">1.1.4</span> <label>Declarações
                                        Anteriores</label></div>
                                <div class="eight wide field">
                                    <div class="ui checkbox"><input name="or_declaracao_ano_anterior" type="checkbox">
                                        <label>IRenda</label></div>
                                    <div class="ui checkbox"><input name="or_declaracao_ano_anterior" type="checkbox">
                                        <label>RAIS</label></div>
                                    <div class="ui checkbox"><input name="or_declaracao_ano_anterior" type="checkbox">
                                        <label>DIRF</label></div>
                                </div>
                            </div>
                        </div>
                        <div class="inline fields">
                            <div class="eight wide field"
                                 data-tooltip="A igreja organizou o inventário dos imóveis e utensílios?">
                                <div class="ten wide field"><span class="ui label">1.1.2.</span> <label>Inventário
                                        patrimonial</label></div>
                                <div class="six wide field">
                                    <div class="ui radio checkbox"><input name="or_inventario_existe" type="radio">
                                        <label>Sim</label></div>
                                    <div class="ui radio checkbox"><input name="or_inventario_existe" type="radio"
                                                                          checked="checked"> <label>Não</label></div>
                                </div>
                            </div>
                            <div class="eight wide field"
                                 data-tooltip="Caso a igreja tenha inventário, ele esta devidamente atualizado?">
                                <div class="ten wide field"><span class="ui label">1.1.5.</span> <label>Inventário
                                        atualizado</label></div>
                                <div class="six wide field">
                                    <div class="ui radio checkbox"><input name="or_inventario_atualizado" type="radio">
                                        <label>Sim</label></div>
                                    <div class="ui radio checkbox"><input name="or_inventario_atualizado" type="radio"
                                                                          checked="checked"> <label>Não</label></div>
                                </div>
                            </div>
                        </div>
                        <div class="inline fields">
                            <div class="eight wide field" data-tooltip="A igreja conta com o rol de membro atualizado?">
                                <div class="ten wide field"><span class="ui label">1.1.3.</span> <label>Rol de membros
                                        Atualizado</label></div>
                                <div class="six wide field">
                                    <div class="ui radio checkbox"><input name="or_rol_membros_atualizado" type="radio">
                                        <label>Sim</label></div>
                                    <div class="ui radio checkbox"><input name="or_rol_membros_atualizado" type="radio"
                                                                          checked="checked"> <label>Não</label></div>
                                </div>
                            </div>
                            <div class="eight wide field"
                                 data-tooltip="Quantas congregações estão vinculadas a igreja?">
                                <div class="ten wide field"><span class="ui label">1.1.6.</span> <label>Quantidade
                                        congregações?</label></div>
                                <div class="six wide field"><input type="text" value="0" name="or_nr_congregacoes">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui segment">
                        <div class="ui red ribbon label" style="font-size:0.92857143em;">2. SUPERVISÃO ESPIRITUAL</div>
                        <strong style="color:#FF695E;">2.1. ADORAÇÃO E COMUNHÃO</strong></div>
                    <div class="ui form segment">
                        <div class="inline fields">
                            <div class="sixteen wide field" data-tooltip="Quantidade de cerimônias realizadas">
                                <div class="four wide field"><span class="ui label">2.1.1</span> <label>Santa Ceia -
                                        Grupos</label></div>
                                <div class="two wide field"><input type="text" value="0" name="se_santaceia_grupos">
                                </div>
                                <div class="four wide field"><label>Santa Ceia - Individual</label></div>
                                <div class="two wide field"><input type="text" value="0" name="se_santaceia_individual">
                                </div>
                                <div class="four wide field disabled">
                                    <div class="ui labeled input">
                                        <div class="ui label">Total</div>
                                        <input type="text" value="18"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui segment">
                        <div class="ui red ribbon label" style="font-size:0.92857143em;">2. SUPERVISÃO ESPIRITUAL</div>
                        <strong style="color:#FF695E;">2.2. EVANGELIZAÇÃO E MISSÕES</strong></div>
                    <div class="ui form segment">
                        <div class="inline fields">
                            <div class="five wide field"
                                 data-tooltip="Qual o número de atividades evangelísticas realizadas?"><label>2.2.1. Nº
                                    de atividades evangelísticas:*</label></div>
                            <div class="two wide field"><input type="text" value="0"
                                                               name="se_atividades_evangelisticas"></div>
                            <div class="ui tiny message"><label>* em templos e residências; recintos públicos ou ar
                                    livre; imprensa escrita, rádio e TV, etc.</label></div>
                        </div>
                        <div class="inline fields">
                            <div class="five wide field" data-tooltip="Quantas literaturas foram distribuídas?"><label>2.2.2.
                                    Textos distribuídos:</label></div>
                            <div class="one wide field"><label>Bíblias</label></div>
                            <div class="one wide field"><input type="text" value="0"
                                                               name="se_textos_distribuidos_biblia"></div>
                            <div class="one wide field" data-tooltip="Novo Testamento"><label>N.T.</label></div>
                            <div class="one wide field"><input type="text" value="0" name="se_textos_distribuidos_nt">
                            </div>
                            <div class="one wide field"><label>Folhetos</label></div>
                            <div class="one wide field"><input type="text" value="0"
                                                               name="se_textos_distribuidos_folhetos"></div>
                            <div class="one wide field"><label>Outros</label></div>
                            <div class="one wide field"><input type="text" value="0"
                                                               name="se_textos_distribuidos_outros"></div>
                            <div class="one wide field"><label>Total</label></div>
                            <div class="two wide field"><input type="text" value="0"></div>
                        </div>
                        <div class="inline fields">
                            <div class="five wide field" data-tooltip="Qual trabalho missionário realizado?"><label>2.2.3.
                                    Trabalho missionário com:</label></div>
                            <div class="two wide field ui checkbox"><label>JMN</label> <input
                                        name="se_trabalho_missionario" type="checkbox"></div>
                            <div class="two wide field ui checkbox"><label>APMT</label> <input
                                        name="se_trabalho_missionario" type="checkbox"></div>
                            <div class="three wide field ui checkbox"><label>Parceria com o PMC</label> <input
                                        name="se_trabalho_missionario" type="checkbox"></div>
                            <div class="three wide field ui checkbox"><label>Plantação de Igrejas</label> <input
                                        name="se_trabalho_missionario" type="checkbox"></div>
                        </div>
                        <div class="inline fields">
                            <div class="five wide field"><label>2.2.4.Outra participação missionária:</label></div>
                            <div class="eleven wide field"><input type="text" value="0"
                                                                  name="se_trabalho_misisonario_outros"></div>
                        </div>
                    </div>
                    <div class="ui segment">
                        <div class="ui red ribbon label" style="font-size:0.92857143em;">2. SUPERVISÃO ESPIRITUAL</div>
                        <strong style="color:#FF695E;">2.3 EDUCAÇÃO E APERFEIÇOAMENTO</strong></div>
                    <div class="ui form segment">
                        <div class="inline fields">
                            <div class="four wide field" data-tooltip="Houve aperfeiçoamento para Professores EBD?">
                                <label>2.3.1. Para professores de Escola Dominical:</label></div>
                            <div class="two wide field"><label>Sim</label> <input name="se_professores_ebd"
                                                                                  type="radio"> <label>Não</label>
                                <input name="se_professores_ebd" type="radio" checked="checked"></div>
                            <div class="three wide field"
                                 data-tooltip="Houve aperfeiçoamento para Liderança da Igreja?"><label>2.3.4. Para
                                    Liderança:</label></div>
                            <div class="two wide field"><label>Sim</label> <input name="se_lideranca" type="radio">
                                <label>Não</label> <input name="se_lideranca" type="radio" checked="checked"></div>
                        </div>
                        <div class="inline fields">
                            <div class="four wide field" data-tooltip="Houve aperfeiçoamento para Equipe Musical?">
                                <label>2.3.2. Para Equipe de Música:</label></div>
                            <div class="two wide field"><label>Sim</label> <input name="se_equipes_musicas"
                                                                                  type="radio"> <label>Não</label>
                                <input name="se_equipes_musicas" type="radio" checked="checked"></div>
                            <div class="three wide field" data-tooltip="Número de Corais na Igreja"><label>2.3.5. Nº de
                                    Grupos Corais:</label></div>
                            <div class="two wide field"><input type="text" value="0" name="se_grupos_corais"></div>
                        </div>
                        <div class="inline fields">
                            <div class="four wide field"
                                 data-tooltip="Houve aperfeiçoamento para Presbíteros e Diáconos?"><label>2.3.3. Para
                                    Oficiais (Presbíteros e Diáconos)</label></div>
                            <div class="two wide field"><label>Sim</label> <input name="se_oficiais" type="radio">
                                <label>Não</label> <input name="se_oficiais" type="radio" checked="checked"></div>
                            <div class="three wide field" data-tooltip="Quantas equipes musicais há na Igreja?"><label>2.3.6.
                                    Nº de Conjuntos Musicais:</label></div>
                            <div class="two wide field"><input type="text" value="0" name="se_conjuntos_musicas"></div>
                        </div>
                    </div>
                    <div class="ui segment">
                        <div class="ui red ribbon label" style="font-size:0.92857143em;">2. SUPERVISÃO ESPIRITUAL</div>
                        <strong style="color:#FF695E;">2.4 AÇÃO SOCIAL E VISITAÇÃO</strong></div>
                    <div class="ui form segment">
                        <div class="inline fields">
                            <div class="six wide field"
                                 data-tooltip="Nº de atos benificientes realizados pela Junta Diaconal."><label>2.4.1.Nº
                                    de atos beneficentes realizados pela Junta Diaconal:</label></div>
                            <div class="two wide field"><input type="text" value="0" name="se_beneficientes_jdiaconal">
                            </div>
                            <div class="three wide field"
                                 data-tooltip="Nº de atos benificientes realizados por outro Departamento."><label>Por
                                    outros departamentos:</label></div>
                            <div class="two wide field"><input type="text" value="0" name="se_beneficientes_outros">
                            </div>
                            <div class="one wide field"><label>Total</label></div>
                            <div class="two wide field"><input type="text" value="0"></div>
                        </div>
                        <div class="inline fields">
                            <div class="six wide field"
                                 data-tooltip="Nº de visitas realizadas por Presbíteros e Diáconos."><label>2.4.2.Nº de
                                    visitas feitas por presbíteros e diáconos:</label></div>
                            <div class="two wide field"><input type="text" value="0"
                                                               name="se_visitas_presbiteros_diaconos"></div>
                            <div class="three wide field"
                                 data-tooltip="Nº de visitas realizadas por outro Departamento."><label>Por outros
                                    departamentos:</label></div>
                            <div class="two wide field"><input type="text" value="0" name="e_visitas_outros"></div>
                            <div class="one wide field"><label>Total</label></div>
                            <div class="two wide field"><input type="text" value="0"></div>
                        </div>
                    </div>
                    <div class="ui segment">
                        <div class="ui red ribbon label" style="font-size:0.92857143em;">3. SUPERVISÃO ADMINISTRATIVA
                        </div>
                        <strong style="color:#FF695E;">3.1. SUPERVISÃO ADMINISTRATIVA</strong></div>
                    <div class="ui form segment">
                        <div class="inline fields">
                            <div class="eight wide field"><label>3.1. A Igreja enviou fielmente os Dízimos dos Dízimos à
                                    Tesouraria IPB:</label></div>
                            <div class="one wide field"><label>Sim</label> <input name="sa_dizimo_fidelidade"
                                                                                  type="radio"></div>
                            <div class="one wide field"><label>Não</label> <input name="sa_dizimo_fidelidade"
                                                                                  type="radio" checked="checked"></div>
                        </div>
                    </div>
                    <div class="ui form segment">
                        <div class="ui top left attached label">REUNIÕES</div>
                        <div class="inline fields">
                            <div class="four wide field"><label>3.2. Conselho:</label></div>
                            <div class="four wide field"><select class="ui fluid search dropdown"
                                                                 name="sa_reunioes_conselho">
                                    <option value="">Igreja</option>
                                    <option value="1">Congregação Presbiterial</option>
                                    <option value="2">Ambas</option>
                                </select></div>
                            <div class="four wide field"><label>3.5. Mesa Administrativa da Cong. Presbiterial:</label>
                            </div>
                            <div class="four wide field"><select class="ui fluid search dropdown"
                                                                 name="sa_reunioes_mesa_administrativa">
                                    <option value="">Igreja</option>
                                    <option value="1">Congregação Presbiterial</option>
                                    <option value="2">Ambas</option>
                                </select></div>
                        </div>
                        <div class="inline fields">
                            <div class="four wide field"><label>3.3. Junta Diaconal:</label></div>
                            <div class="four wide field"><select class="ui fluid search dropdown"
                                                                 name="sa_reunioes_jdiaconal">
                                    <option value="">Igreja</option>
                                    <option value="1">Congregação Presbiterial</option>
                                    <option value="2">Ambas</option>
                                </select></div>
                            <div class="four wide field"><label>3.6. Comissão de Exame de Contas da Tesouraria:</label>
                            </div>
                            <div class="four wide field"><select class="ui fluid search dropdown"
                                                                 name="sa_reunioes_tesouraria">
                                    <option value="">Igreja</option>
                                    <option value="1">Congregação Presbiterial</option>
                                    <option value="2">Ambas</option>
                                </select></div>
                        </div>
                        <div class="inline fields">
                            <div class="four wide field"><label>3.4. Assembléia Geral:</label></div>
                            <div class="four wide field"><select class="ui fluid search dropdown"
                                                                 name="sa_reunioes_assembleia">
                                    <option value="">Igreja</option>
                                    <option value="1">Congregação Presbiterial</option>
                                    <option value="2">Ambas</option>
                                </select></div>
                        </div>
                    </div>
                    <div class="ui form segment">
                        <div class="inline fields">
                            <div class="seven wide field"><label>3.7. Houve exame/aprovação balancetes da
                                    tesouraria?</label></div>
                            <div class="one wide field"><label>Sim</label> <input name="sa_balancete_tesouraria"
                                                                                  type="radio"></div>
                            <div class="one wide field"><label>Não</label> <input name="sa_balancete_tesouraria"
                                                                                  type="radio" checked="checked"></div>
                        </div>
                        <div class="inline fields">
                            <div class="seven wide field"><label>3.8. Há oficiais com mandato a vencer no ano a
                                    seguir?</label></div>
                            <div class="one wide field"><label>Sim</label> <input name="sa_officiais_venc" type="radio">
                            </div>
                            <div class="one wide field"><label>Não</label> <input name="sa_officiais_venc" type="radio"
                                                                                  checked="checked"></div>
                        </div>
                        <div class="inline fields">
                            <div class="two wide field"
                                 data-tooltip="Nº Presbíteros com mandato a vencer no próximo ano."><label>Nº
                                    Presbíteros:</label></div>
                            <div class="two wide field"><input type="text" value="0"
                                                               name="sa_officiais_venc_presbiteros"></div>
                            <div class="two wide field" data-tooltip="Nº Diáconos com mandato a vencer no próximo ano.">
                                <label>Nº Diáconos</label></div>
                            <div class="two wide field"><input type="text" value="0" name="sa_officiais_venc_diaconos">
                            </div>
                        </div>
                        <div class="inline fields">
                            <div class="three wide field"><label>Quais?</label></div>
                        </div>
                        <div class="inline fields">
                            <div class="sixteen wide field"><textarea rows="4" value="0"
                                                                      name="sa_id_oficiais_vencimento"
                                                                      placeholder="Escreva os nomes dos Presbíteros/Diáconos que estão com mandatos a vencer"></textarea>
                            </div>
                        </div>
                        <div class="inline fields">
                            <div class="one wide field"><label>FAP?</label></div>
                            <div class="one wide field"><label>Sim</label> <input name="sa_fap" type="radio"></div>
                            <div class="one wide field"><label>Não</label> <input name="sa_fap" type="radio"
                                                                                  checked="checked"></div>
                            <div class="one wide field"></div>
                            <div class="two wide field"><label>IPB-PREV?</label></div>
                            <div class="one wide field"><label>Sim</label> <input name="sa_ipb_prev" type="radio"></div>
                            <div class="one wide field"><label>Não</label> <input name="sa_ipb_prev" type="radio"
                                                                                  checked="checked"></div>
                        </div>
                        <div class="inline fields">
                            <div class="six wide field"><label>3.9. Idem, dos livros e relatórios das
                                    sociedades?</label></div>
                            <div class="one wide field"><label>Sim</label> <input name="sa_idem_livros_sociedades"
                                                                                  type="radio"></div>
                            <div class="one wide field"><label>Não</label> <input name="sa_idem_livros_sociedades"
                                                                                  type="radio" checked="checked"></div>
                            <div class="six wide field"><label>3.11. Houve contribuição para causas
                                    extra-locais?</label></div>
                            <div class="one wide field"><label>Sim</label> <input name="sa_contribuicao_extra"
                                                                                  type="radio"></div>
                            <div class="one wide field"><label>Não</label> <input name="sa_contribuicao_extra"
                                                                                  type="radio" checked="checked"></div>
                        </div>
                        <div class="inline fields">
                            <div class="six wide field"><label>3.10. Houve nomeação de conselheiros às
                                    Sociedades?</label></div>
                            <div class="one wide field"><label>Sim</label> <input name="sa_nomeacao" type="radio"></div>
                            <div class="one wide field"><label>Não</label> <input name="sa_nomeacao" type="radio"
                                                                                  checked="checked"></div>
                            <div class="six wide field"><label>3.12. Contribuiu com Previdência Social
                                    pastor(es)?</label></div>
                            <div class="one wide field"><label>Sim</label> <input name="sa_contribuicao_previdencia"
                                                                                  type="radio"></div>
                            <div class="one wide field"><label>Não</label> <input name="sa_contribuicao_previdencia"
                                                                                  type="radio" checked="checked"></div>
                        </div>
                        <div class="inline fields">
                            <div class="eight wide field"><label>3.13. Reforma e/ou Construção em projeto:</label></div>
                            <div class="eight wide field"><label>3.14. Reforma e/ou Construção em andamento:</label>
                            </div>
                        </div>
                        <div class="inline fields">
                            <div class="eight wide field"><textarea rows="4" value="0"
                                                                    name="sa_reforma_construcao_projeto"
                                                                    placeholder="Cite a(s) reforma(s) ou contrução(ões) que estão no projeto."></textarea>
                            </div>
                            <div class="eight wide field"><textarea rows="4" value="0"
                                                                    name="sa_reforma_construcao_andamento"
                                                                    placeholder="Cite a(s) reforma(s) ou contrução(ões) que estão em andamento."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="ui segment">
                        <div class="ui red ribbon label" style="font-size:0.92857143em;">4. PLANEJAMENTO ESTRATÉGICO
                        </div>
                        <strong style="color:#FF695E;">4.1. PLANEJAMENTO ESTRATÉGICO</strong></div>
                    <div class="ui form segment">
                        <div class="inline fields">
                            <div class="six wide field"><label>4.1 A Igreja tem Planejamento Estratégico?</label></div>
                            <div class="one wide field"><label>Sim</label> <input name="pe_exite_pe" type="radio"></div>
                            <div class="one wide field"><label>Não</label> <input name="pe_exite_pe" type="radio"
                                                                                  checked="checked"></div>
                        </div>
                        <div class="inline fields">
                            <div class="eight wide field"><label>4.2. Quais os objetivos propostos e alcançados?</label>
                            </div>
                            <div class="eight wide field"><label>4.3. Quais os objetivos propostos e NÃO alcançados?
                                    Identificar as dificuldades.</label></div>
                        </div>
                        <div class="inline fields">
                            <div class="eight wide field"><textarea rows="4" value="0" name="pe_objetivos_sucesso"
                                                                    placeholder="Cite os objetivos que foram propostos e alcançados."></textarea>
                            </div>
                            <div class="eight wide field"><textarea rows="4" value="0"
                                                                    name="pe_objetivos_falha_dificuldades"
                                                                    placeholder="Cite os objetivos que foram propostos mas NÃO foram alcançados."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="ui segment">
                        <div class="ui red ribbon label" style="font-size:0.92857143em;">5. PATRIMÔNIO</div>
                        <strong style="color:#FF695E;">5.1 PATRIMÔNIO</strong></div>
                    <div class="ui form segment">
                        <div class="inline fields">
                            <div class="six wide field"><label>5.1. A Igreja tem Seguro do bem patrimonial?</label>
                            </div>
                            <div class="one wide field"><label>Sim</label> <input name="pa_seguro_patrimonial"
                                                                                  type="radio"></div>
                            <div class="one wide field"><label>Não</label> <input name="pa_seguro_patrimonial"
                                                                                  type="radio" checked="checked"></div>
                            <div class="six wide field"><label>5.2. Tem Alvará de Funcionamento?</label></div>
                            <div class="one wide field"><label>Sim</label> <input name="pa_alvara" type="radio"></div>
                            <div class="one wide field"><label>Não</label> <input name="pa_alvara" type="radio"
                                                                                  checked="checked"></div>
                        </div>
                        <div class="inline fields">
                            <div class="six wide field"><label>5.3. Tem Licença do Corpo de Bombeiros em dia?</label>
                            </div>
                            <div class="one wide field"><label>Sim</label> <input name="pa_licenca_bombeiros"
                                                                                  type="radio"></div>
                            <div class="one wide field"><label>Não</label> <input name="pa_licenca_bombeiros"
                                                                                  type="radio" checked="checked"></div>
                            <div class="six wide field"><label>5.4. Tem Certificado Digital?</label></div>
                            <div class="one wide field"><label>Sim</label> <input name="pa_certificado_digital"
                                                                                  type="radio"></div>
                            <div class="one wide field"><label>Não</label> <input name="pa_certificado_digital"
                                                                                  type="radio" checked="checked"></div>
                        </div>
                    </div>
                </div>
                <div class="ui segments">
                    <div class="ui green segment" style="text-align: center; background-color: #F9FAFB"><p><strong>INFORMAÇÕES
                                SOBRE O PREENCHIMENTO</strong></p></div>
                    <div class="ui horizontal segments">
                        <div class="ui segment"><span><strong>Usuário inclusão:</strong></span><span> &nbsp; Kallew Pavão &nbsp;</span><span
                                    style="float: right;"><strong>Data:</strong>&nbsp; 01/01/2018</span></div>
                        <div class="ui segment"><span><strong>Última alteração:</strong></span><span> &nbsp; Kallew Pavão &nbsp;</span><span
                                    style="float: right;"><strong>Data:</strong>&nbsp; 01/01/2018</span></div>
                    </div>
                    <div class="ui segment">
                        <div class="ui toggle checkbox" data-tooltip="Deixe AZUL caso tenha FINALIZADO este relatório.">
                            <label>Relatório Finalizado</label> <input type="checkbox" name="relatorio_finalizado">
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
                <div class="ui header">Relatórios Finalizados</div>
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
                        <td class="collapsing"><span class="ui checkbox"><input type="checkbox"> <label><i
                                            class="eye icon"></i></label></span></td>
                        <td>IGREJA PRESBITERIANA LUZ E VIDA</td>
                        <td>RELATÓRIO FINANCEIRO</td>
                        <td>21/03/2018</td>
                    </tr>
                    <tr>
                        <td class="collapsing"><span class="ui checkbox"><input type="checkbox" checked=""> <label><i
                                            class="eye icon"></i></label></span></td>
                        <td>IGREJA PRESBITERIANA LUZ E VIDA</td>
                        <td>RELATÓRIO FINANCEIRO</td>
                        <td>21/03/2018</td>
                    </tr>
                    <tr>
                        <td class="collapsing"><span class="ui checkbox"><input type="checkbox"> <label><i
                                            class="eye icon"></i></label></span></td>
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
</main><!-- Essential javascripts for application to work-->
<script src="js/jquery-3.2.1.min.js"></script><!--script(src='js/popper.min.js')-->
<script src="js/plugins/iziToast.min.js"></script>
<script src="js/semantic.min.js"></script>
<script src="js/plugins/select2.min.js"></script>
<script src="js/plugins/chart.js"></script>
<script src="js/app/main-app.js"></script><!-- Page specific javascripts-->
<script src="js/app/jquery-validate-app.js"></script>
<script src="js/plugins/bootstrap-datepicker.min.js"></script>
<script src="js/plugins/bootstrap-datepicker.pt-BR.min.js"></script>
<script src="js/plugins/dataTables.min.js"></script>
<script src="js/plugins/sweetalert.min.js"></script>
<script src="js/app/relatorios-conselhos-app.js"></script>
</body>
</html>
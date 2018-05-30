<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta name="description" content="InformativoIPB é um micro S.A.D. desenvolvido para Igreja Presbiteriana do Brasil">
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
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <script src="js/app/login-validator-app.js"></script>
    <style>.envelope {cursor: pointer;}</style>
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
              <div class="ui simple dropdown item"><i class="big edit icon"></i>Cadastros<i class="dropdown icon"></i>
                <div class="menu"><a class="item" href="cadastros-sinodos"><i class="radio icon"></i>Sinodos</a><a class="item" href="cadastros-presbiterios"><i class="radio icon"></i>Presbitérios</a><a class="item" href="cadastros-igrejas"><i class="radio icon"></i>Igrejas</a><a class="item" href="cadastros-ministros"><i class="radio icon"></i>Ministros</a></div>
              </div>
              <div class="ui simple dropdown item"><i class="big browser icon"></i>Relatórios<i class="dropdown icon"></i>
                <div class="menu"><a class="item" href="relatorios-conselhos"><i class="radio icon"></i>Conselho</a><a class="item" href="relatorios-ministeriais"><i class="radio icon"></i>Ministerial</a><a class="item" href="relatorios-estatisticas"><i class="radio icon"></i>Estatistica</a></div>
              </div>
              <div class="ui simple dropdown item"><i class="big cubes icon"></i>Presbitérios<i class="dropdown icon"></i>
                <div class="menu"><a class="item in-dev" href="reuniao-presbiterio"><i class="radio icon"></i>Incluir Reunião</a><a class="item in-dev" href="consultar-estatisticas-presbiterio"><i class="radio icon"></i>Consultar Estatística</a></div>
              </div>
              <div class="ui simple dropdown item"><i class="big sitemap icon"></i>Sínodos<i class="dropdown icon"></i>
                <div class="menu"><a class="item sinodos in-dev" href="#"><i class="radio icon"></i>Incluir Reunião</a><a class="item sinodos in-dev" href="#"><i class="radio icon"></i>Consultar Estatística</a></div>
              </div>
              <div class="ui simple dropdown item"><i class="big bar chart icon"></i>Consultas<i class="dropdown icon"></i>
                <div class="menu"><a class="item in-dev" href="#"><i class="radio icon"></i>Reuniões de Presbitérios</a><a class="item in-dev" href="#"><i class="radio icon"></i>Reuniões de Sínodos</a><a class="item in-dev" href="#"><i class="radio icon"></i>Consulta Geral de Membros</a><a class="item in-dev" href="#"><i class="radio icon"></i>Consulta Geral Financeira</a><a class="item in-dev" href="#"><i class="radio icon"></i>Estatísticas de Membresia</a></div>
              </div>
              <div class="ui simple dropdown item"><i class="big settings icon"></i>Configurações<i class="dropdown icon"></i>
                <div class="menu"><a class="item" href="meu-usuario"><i class="user icon"></i>Meu Usuário</a><a class="item" href="administrar-usuarios"><i class="users icon"></i>Administrar Usuários</a><a class="item in-dev" href="#"><i class="options icon"></i>Parâmetros do Sistema</a><a class="item in-dev" href="#"><i class="talk icon"></i>Solicitar Ajuda</a><a class="item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="sign out icon"></i>{{ __('Desconectar') }}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                </div>
              </div><span style="margin-top:15px;margin-left: 20px;"><i class="big envelope green icon looping"></i></span>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Sidebar menu-->
    <div class="ui sidebar vertical accordion menu">
      <div class="item" style="background-color: #16ab39;height: 150px"><img class="ui tiny avatar image" src="https://www.w3schools.com/w3css/img_avatar3.png" style="padding-top: 25px;"><span style="color: white;font-size: large;padding-left: 10px;font-weight: bold;">João Calvino</span><span style="display: flex;margin-top: -40px;margin-left: 93px;font-weight: 400;color: white;">Presbítero Docente</span><span style="display: flex;margin-top: 6px;margin-left: 93px;font-weight: 400;color: white;">IPB Cacoal</span></div><a class="item" href="inicio">INÍCIO<i class="home icon"></i></a>
      <div class="item"><a class="title"><i class="dropdown icon"></i>CADASTROS</a>
        <div class="content"><a class="item" href="cadastros-sinodos">SÍNODOS</a><a class="item" href="cadastros-presbiterios">PRESBITÉRIOS</a><a class="item" href="cadastros-igrejas">IGREJAS</a><a class="item" href="cadastros-ministros">PRESBÍTEROS</a></div>
      </div>
      <div class="item"><a class="title"><i class="dropdown icon"></i>RELATÓRIOS</a>
        <div class="content"><a class="item" href="relatorios-conselhos">CONSELHO</a><a class="item" href="relatorios-ministeriais">MINSTÉRIAL</a><a class="item" href="relatorios-estatisticas">ESTATÍSTICA</a></div>
      </div>
      <div class="item"><a class="title"><i class="dropdown icon"></i>PRESBITÉRIOS</a>
        <div class="content"><a class="item in-dev" href="presbiterio-reuniao">INCLUIR REUNIÃO</a><a class="item in-dev" href="presbiterio-estatistica">CONSULTAR ESTATÍSTICA</a></div>
      </div>
      <div class="item"><a class="title"><i class="dropdown icon"></i>SÍNODOS</a>
        <div class="content"><a class="item in-dev" href="sinodo-reuniao">INCLUIR REUNIÃO</a><a class="item in-dev" href="sinodo-estatistica">CONSULTAR ESTATÍSTICA</a></div>
      </div>
      <div class="item"><a class="title"><i class="dropdown icon"></i>CONSULTAS ESTATÍSTICAS</a>
        <div class="content"><a class="item in-dev" href="consultas-ministerial">REUNIÕES DE PRESBITÉRIOS</a><a class="item in-dev" href="consultas-ministerial">REUNIÕES DE SÍNODOS</a><a class="item in-dev" href="consultas-ministerial">GERAL DE MEMBROS</a><a class="item in-dev" href="consultas-ministerial">GERAL FINANCEIRA</a><a class="item in-dev" href="consultas-ministerial">CRESCIMENTO EBD</a></div>
      </div>
      <div class="item"><a class="title"><i class="dropdown icon"></i>CONFIGURAÇÕES</a>
        <div class="content"><a class="item in-dev" href="meu-usuario">MEU USUÁRIO</a><a class="item" href="administrar-usuarios">ADMINISTRAR USUÁRIOS</a><a class="item in-dev" href="parametros-sistema">PARÂMETROS DO SISTEMA</a><a class="item in-dev" href="ajuda">SOLICITAR AJUDA</a></div>
      </div><a class="item" id="logout_m">SAIR<i class="sign out icon"></i></a>
    </div>
    <main class="pusher">
      <!-- Header Mobile-->
      <div class="ui column grid">
        <div class="tablet only mobile only column row">
          <div class="ui big green top three item fixed menu"><a class="toc item"><i class="large sidebar icon"></i></a><a class="item button" href="inicio"><i class="large home icon"></i></a><a class="item button" href="consulta-mobile.html"><i class="large bar chart icon"></i></a></div>
        </div>
      </div>
      <div class="ui container" style="margin-top: 100px; margin-bottom: 20px; display:none;" id="windows">
        <div class="ui segment">
          <!---->
          <div style="position: absolute;right: 20px;">
            <div class="ui breadcrumb"><a class="section" href="inicio"><i class="home icon"></i></a>
              <div class="divider">/</div><a class="section">Cadastros</a>
              <div class="divider">/</div>
              <div class="active section">Presbitérios</div>
            </div>
          </div>
          <div class="ui clearing"></div>
          <h2 class="ui floated header">Cadastro de Presbitérios
            <div class="sub header">Presbitérios são usados para agrupar igrejas. -> breve explicação da tela</div>
          </h2>
          <div class="ui clearing divider"></div>
          <p></p>
          <div class="ui top attached tabular menu"><a class="item active" data-tab="first">Presbitérios</a><a class="item" data-tab="second">Cadastrar</a></div>
          <div class="ui bottom attached tab segment active" data-tab="first">
            <table class="ui compact selectable celled green table" id="tbl_presbiterios">
              <thead>
                <tr>
                  <th class="one wide">Código</th>
                  <th class="eight wide center aligned">Nome</th>
                  <th class="two wide center aligned">Sigla</th>
                  <th class="two wide center aligned">Sínodo</th>
                  <th class="three wide center aligned">Região</th>
                </tr>
              </thead>
              <tbody id="tbody_presbiterios"></tbody>
            </table>
          </div>
          <div class="ui bottom attached tab segment" data-tab="second">
            <form id="cadastros_presbiterios" name="cadastros_presbiterios">@csrf
              <div class="ui form">
                <div class="fields">
                  <div class="sixteen wide required field">
                    <label>Sínodos</label>
                    <select class="ui search dropdown" name="id_sinodo">
                      <option></option>
                      <option value="">Selecione o Sínodo</option>
                    </select>
                  </div>
                </div>
                <div class="fields">
                  <div class="eight wide required field">
                    <label>Nome</label>
                    <input type="text" name="nome" placeholder="Digite o Nome">
                  </div>
                  <div class="three wide required field">
                    <label>Sigla</label>
                    <input type="text" name="sigla" placeholder="Digite a Sigla">
                  </div>
                  <div class="six wide required field">
                    <label>Região</label>
                    <select class="ui search dropdown" name="regiao">
                      <option value="">Região</option>
                      <option value="1">NORTE</option>
                      <option value="2">NORDESTE</option>
                      <option value="3">CENTRO-OESTE</option>
                      <option value="4">SUDESTE</option>
                      <option value="5">SUL</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="ui segments">
                <div class="ui horizontal segments">
                  <div class="ui segment"><span style="color: lightslategray;"><strong>Usuário inclusão:</strong></span><span style="color: lightslategray;">&nbsp;<span id="user_inc"></span>&nbsp;</span><span style="float: right;color: lightslategray;"><strong>Data:</strong>&nbsp;<span id="data_inc"></span></span></div>
                  <div class="ui segment"><span style="color: lightslategray;"><strong>Última alteração:</strong></span><span style="color: lightslategray;">&nbsp;<span id="user_alt"></span>&nbsp;</span><span style="float: right;color: lightslategray;"><strong>Data:</strong>&nbsp;<span id="data_alt"></span></span></div>
                </div>
              </div>
              <div class="ui clearing divider"></div>
              <div style="text-align: center">
                <button class="ui green labeled icon button" type="submit"><i class="plus icon"></i>Gravar</button>
                <button class="ui reset button" type="reset"><i class="minus icon"></i>Limpar</button>
                <button class="ui red right labeled icon button" type="button"><i class="remove icon"></i>Excluir</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="ui small modal">
        <div class="header"><span>Painel de Alertas</span><span style="margin-left: 10px;position: absolute;"><i class="big teal bullhorn icon"></i></span></div>
        <div class="scrolling content">
          <div class="segment">
            <div class="ui header">
               Relatórios Finalizados</div>
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
                  <td>21/03/2018				</td>
                </tr>
                <tr>
                  <td class="collapsing"><span class="ui checkbox">
                      <input type="checkbox" checked="">
                      <label><i class="eye icon"></i></label></span></td>
                  <td>IGREJA PRESBITERIANA LUZ E VIDA</td>
                  <td>RELATÓRIO FINANCEIRO</td>
                  <td>21/03/2018					</td>
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
    <script src="js/app/cadastros-presbiterios-app.js"></script>
  </body>
</html>
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
    <!--script(src="js/app/login-validator-app.js")-->
    <style>.envelope {
            cursor: pointer;
        }</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('images/favicon.ico')}}">
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('js/app/pace-app.js')}}"></script>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.min.css')}}">
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
                        <div class="menu"><a class="item" href="/cadastros/sinodos"><i
                                        class="radio icon"></i>Sinodos</a><a class="item"
                                                                             href="/cadastros/presbiterios"><i
                                        class="radio icon"></i>Presbitérios</a><a class="item"
                                                                                  href="/cadastros/igrejas"><i
                                        class="radio icon"></i>Igrejas</a><a class="item" href="/cadastros/ministros"><i
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
        <div class="content"><a class="item" href="sinodos">SÍNODOS</a><a class="item"
                                                                          href="presbiterios">PRESBITÉRIOS</a><a
                    class="item" href="igrejas">IGREJAS</a><a class="item" href="ministros">PRESBÍTEROS</a></div>
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
        <div class="ui clearing"></div>
        <!-- Mensagem caso o registro foi inserido-->@if(session('saved'))
            <div class="ui positive message"><i class="close icon"></i>
                <div class="header">Sucesso!</div>
                <p>Parabéns, o registro foi inserido com sucesso!</p>
            </div>
            <!-- Mensagem caso o registro foi atualizado-->@elseif(session('updated'))
            <div class="ui positive message"><i class="close icon"></i>
                <div class="header">Sucesso!</div>
                <p>Parabéns, o registro foi atualizado com sucesso!</p>
            </div>
            <!-- Mensagem caso o registro foi deletado-->@elseif(session('deleted'))
            <div class="ui positive message"><i class="close icon"></i>
                <div class="header">Sucesso!</div>
                <p>Parabéns, o registro foi apagado com sucesso!</p>
            </div>
            <!-- Mensagens de validação-->@elseif(session('needCompany'))
            <div class="ui warning message"><i class="close icon"></i>
                <div class="header">Atenção!</div>
                <p>Algumas informações estão incorretas, ajuste e tente novamente por favor!</p>
            </div>@endif
    <!-- Mensagens de Erro por FormRequest-->@if($errors->form->any())
            <div class="ui negative message"><i class="close icon"></i>
                <div class="header">Falha na validação dos campos!</div>
                <ul>@foreach($errors->form->all() as $error )
                        <li>{!! $error !!}</li>@endforeach
                </ul>
            </div>@endif
    <!-- Mensagens de Erro-->@if($errors->any())
            <div class="ui negative message"><i class="close icon"></i>
                <div class="header">Falhou!</div>
                <p>Houve algum problema com a solicitação efetuada, tente novamente ou procure o suporte!</p>
                <p>{{ $errors->first() }}</p>
            </div>@endif
        <div class="ui clearing"></div>
        <div class="ui segment"><a class="ui right floated green tiny button" href="/cadastros/sinodos/novo"><i
                        class="plus icon"></i>Novo</a>
            <h3 class="ui floated header" style="padding-top: 6px;padding-left: 10px;"><i class="edit outline icon"></i>
            </h3>
            <h1 class="ui floated header" style="margin-left: -10px;">Cadastro de Sínodos
                <div class="sub header" style="margin-left: -40px;">Visualize todos os sínodos que estão cadastrados.
                </div>
            </h1>
            <div class="ui clearing divider"></div>
            <p></p>
            <table class="ui celled unstackable sortable green table">
                <thead>
                <tr>
                    <th class="ten wide">Nome</th>
                    <th class="two wide center aligned">Sigla</th>
                    <th class="two wide center aligned">Região</th>
                    <th class="one wide"></th>
                </tr>
                </thead>
                <tbody>@forelse($resources as $sinodo)
                    <tr>
                        <td>{{ $sinodo->nome }}</td>
                        <td>{{ $sinodo->sigla }}</td>
                        <td>{{ $sinodo->nome_regiao()}}</td>
                        <td class="center aligned" title="Editar Sínodo"><a class="ui icon primary button"
                                                                            href="/cadastros/sinodos/{{$sinodo->id}}/editar"><i
                                        class="pencil alternate icon"></i></a></td>
                    </tr>@empty
                    <tr>
                        <td colspan="4">Nenhum registro encontrado.</td>
                    </tr>@endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="4">
                        <div class="ui right floated pagination menu">{{ $resources->links('pagination::semantic-ui') }}</div>
                    </th>
                </tr>
                </tfoot>
            </table>
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
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<!--script(src='js/popper.min.js')-->
<script src="{{asset('js/plugins/iziToast.min.js')}}"></script>
<script src="{{asset('js/semantic.min.js')}}"></script>
<script src="{{asset('js/plugins/select2.min.js')}}"></script>
<script src="{{asset('js/plugins/chart.js')}}"></script>
<script src="{{asset('js/app/main-app.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<!-- Page specific javascripts-->
<script type="text/javascript">$('table').tablesort();</script>
</body>
</html>
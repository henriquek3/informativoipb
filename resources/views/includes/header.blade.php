<header>
    <div class="ui column grid">
        <div class="computer only column row">
            <div class="ui top fixed six item menu">
                <div class="ui container">
                    <div class="ui simple dropdown item">
                        <i class="big edit icon"></i>
                        Cadastros
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <a class="item" href="/cadastros/sinodos">
                                <i class="radio icon"></i>
                                Sinodos
                            </a>
                            <a class="item" href="/cadastros/presbiterios">
                                <i class="radio icon"></i>
                                Presbitérios
                            </a>
                            <a class="item" href="/cadastros/igrejas">
                                <i class="radio icon"></i>
                                Igrejas
                            </a>
                            <a class="item" href="/cadastros/ministros">
                                <i class="radio icon"></i>
                                Ministros
                            </a>
                        </div>
                    </div>
                    <div class="ui simple dropdown item">
                        <i class="big browser icon"></i>
                        Relatórios
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <a class="item" href="/relatorios/conselho">
                                <i class="radio icon"></i>
                                Conselho
                            </a>
                            <a class="item" href="/relatorios/ministerial">
                                <i class="radio icon"></i>
                                Ministerial
                            </a>
                            <a class="item" href="/relatorios/estatistica">
                                <i class="radio icon"></i>
                                Estatistica
                            </a>
                        </div>
                    </div>
                    <div class="ui simple dropdown item">
                        <i class="big cubes icon"></i>
                        Presbitérios
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <a class="item" href="/reunioes/presbiterio">
                                <i class="radio icon"></i>
                                Incluir Reunião
                            </a>
                            <a class="item" href="#">
                                <i class="radio icon"></i>
                                Consultar Estatística
                            </a>
                        </div>
                    </div>
                    <div class="ui simple dropdown item">
                        <i class="big sitemap icon"></i>
                        Sínodos
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <a class="item sinodos" href="/reunioes/sinodo">
                                <i class="radio icon"></i>
                                Incluir Reunião
                            </a>
                            <a class="item sinodos" href="#">
                                <i class="radio icon"></i>
                                Consultar Estatística
                            </a>
                        </div>
                    </div>
                    <div class="ui simple dropdown item">
                        <i class="big bar chart icon"></i>
                        Consultas
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <a class="item" href="#">
                                <i class="radio icon"></i>
                                Reuniões de Presbitérios
                            </a>
                            <a class="item" href="#">
                                <i class="radio icon"></i>
                                Reuniões de Sínodos
                            </a>
                            <a class="item" href="#">
                                <i class="radio icon"></i>
                                Consulta Geral de Membros
                            </a>
                            <a class="item" href="#">
                                <i class="radio icon"></i>
                                Consulta Geral Financeira
                            </a>
                            <a class="item" href="#">
                                <i class="radio icon"></i>
                                Estatísticas de Membresia
                            </a>
                        </div>
                    </div>
                    <div class="ui simple dropdown item">
                        <i class="big settings icon"></i>
                        Configurações
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <a class="item" href="#">
                                <i class="user icon"></i>
                                Meu Usuário
                            </a>
                            <a class="item" href="/configuracoes/usuarios">
                                <i class="users icon"></i>
                                Administrar Usuários
                            </a>
                            <a class="item" href="#">
                                <i class="options icon"></i>
                                Parâmetros do Sistema
                            </a>
                            <a class="item" href="#">
                                <i class="talk icon"></i>
                                Solicitar Ajuda
                            </a>
                            <a class="item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="sign out icon"></i>
                                {{ __('Desconectar') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">@csrf</form>
                        </div>
                    </div>
                    <span style="margin-top:15px;margin-left: 20px;">
                        <i class="big envelope green icon looping"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
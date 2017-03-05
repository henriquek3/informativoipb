<?php
/**
 * Created by PhpStorm.
 * User: Jean Freitas
 * Date: 01/03/2017
 * Time: 18:28
 */
require_once "configs/diretorios.php";

class IndexController
{
    private $url;
    private $folder;
    private $file;
    private $path;

    function __construct()
    {
        # método construtor
    }

    public function getUrl()
    {
        # retorna a url
        return $this->url;
    }

    public function setUrl()
    {
        # método para captar o que foi digitado na barra de endereço
        if (empty($_SERVER['QUERY_STRING'])) {
            $this->url = "home/home";
            return;
        }
        $this->url = $_SERVER['QUERY_STRING'];

    }

    public function getFolder()
    {
        # retorna o diretório
        return $this->folder;
    }

    public function setFolder($url)
    {
        # capta o diretório do arquivo
        $explode = explode("/", $url);
        $this->folder = $explode['0'];
    }

    public function getFile()
    {
        # retorna o arquivo
        return $this->file;
    }

    public function setFile($url)
    {
        # capta o nome do arquivo
        $explode = explode("/", $url);
        $this->file = $explode['1'];
    }

    public function renderDesktop()
    {
        # renderiza o html desktop
        if (!empty($this->path[0])) {
            include $this->path[0];
        }
    }

    public function renderMobile()
    {
        # renderiza o html mobile
        if (!empty($this->path[1])) {
            include $this->path[1];
        }
    }

    public function renderModal()
    {
        # renderiza o html modal
        if (!empty($this->path[2])) {
            include $this->path[2];
        }
    }

    public function render($folder, $file)
    {
        # varifica o diretório e o arquivo digitado e redireciona
        # /?cadastros/sinodos -> caso $folder seja igual a cadastros,
        # ele compara a segunda palavra, $file ( sinodos).
        if ($folder == "cadastros") {
            if ($file == "sinodos") {
                $this->path = DiretoriosController::cadastroSinodos();
            } elseif ($file == "presbiterios") {
                $this->path = DiretoriosController::cadastroPresbiterios();
            } elseif ($file == "igrejas") {
                $this->path = DiretoriosController::cadastroIgrejas();
            } elseif ($file == "oficiais") {
                $this->path = DiretoriosController::cadastroOficiais();
            } elseif ($file == "secretarios") {
                $this->path = DiretoriosController::cadastroSecretarios();
            }
        } elseif ($folder == "consultas") {
            if ($file == "conselho") {
                $this->path = DiretoriosController::consultaConselho();
            } elseif ($file == "ministerial") {
                $this->path = DiretoriosController::consultaMinisterial();
            } elseif ($file == "estatistica") {
                $this->path = DiretoriosController::consultaEstatistica();
            } elseif ($file == "financeiro") {
                $this->path = DiretoriosController::consultaFinanceiro();
            }
        } elseif ($folder == "relatorios") {
            if ($file == "conselho") {
                $this->path = DiretoriosController::relatorioConselho();
            } elseif ($file == "ministerial") {
                $this->path = DiretoriosController::relatorioMinisterial();
            } elseif ($file == "estatistica") {
                $this->path = DiretoriosController::relatorioEstatistica();
            } elseif ($file == "financeiro") {
                $this->path = DiretoriosController::relatorioFinanceiro();
            }
            # incrementar aqui a comparação para saber se foi digitado /financeiro,
            # caso seja verdadeiro, o $this->path deve receber o array $diretorios pela função
            # DiretoriosController::relatoriosFinanceiro();
        } elseif ($folder == "configuracoes") {
            if ($file == "usuario") {
                $this->path = DiretoriosController::configuracoesUsuarios();
            } elseif ($file == "trocarsenha") {
                $this->path = DiretoriosController::configuracoesTrocarSenha();
            } elseif ($file == "solicitasuporte") {
                $this->path = DiretoriosController::configuracoesSolicitarSuporte();
            }
        } elseif ($folder == "login") {
            if ($file == "login") {
                $this->path = DiretoriosController::login();
            }
        } elseif ($folder == "home") {
            if ($file == "home") {
                $this->path = DiretoriosController::home();
            }
        }
    }
}

# instacia a classe Index
$index = new IndexController();

# capta o caminho da pagina
$index->setUrl();

# repassa o caminho da pasta
$index->setFolder($index->getUrl());

# repassa o caminho do arquivo
$index->setFile($index->getUrl());

# passa para o renderizador buscar o html das paginas conforme os caminhos repassados
$index->render($index->getFolder(), $index->getFile());

include "views/menu-nav.php";
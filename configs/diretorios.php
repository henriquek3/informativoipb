<?php

/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 02/03/17
 * Time: 14:37
 */
class Diretorios
{
    private $folder;
    private $files;
    private $tipo;

    public function cadastroSinodos()
    {
        $desktop = "../views/cadastros/sinodos/cadastro-sinodo-desktop.php";
        $mobile = "../views/cadastros/sinodos/cadastro-sinodo-mobile.php";
        $modal = "../views/cadastros/sinodos/cadastro-sinodo-modal.php";
    }

    public function cadastroPresbiterios()
    {
        $desktop = "../views/cadastros/presbiterios/cadastro-presbiterios-desktop.php";
        $mobile = "../views/cadastros/presbiterios/cadastro-presbiterios-mobile.php";
        $modal = "../views/cadastros/presbiterios/cadastro-presbiterios-modal.php";
    }

    public function cadastroIgrejas()
    {
        $desktop = "../views/cadastros/igrejas/cadastro-igrejas-desktop.php";
        $mobile = "../views/cadastros/igrejas/cadastro-igrejas-mobile.php";
        $modal = "../views/cadastros/igrejas/cadastro-igrejas-modal.php";
    }

    public function cadastroOficiais()
    {
        $desktop = "../views/cadastros/oficiais/cadastro-oficiais-desktop.php";
        $mobile = "../views/cadastros/oficiais/cadastro-oficiais-mobile.php";
        $modal = "../views/cadastros/oficiais/cadastro-oficiais-modal.php";
    }

    public function cadastroSecretarios()
    {
        $desktop = "../views/cadastros/secretarios/cadastro-secretarios-desktop.php";
        $mobile = "../views/cadastros/secretarios/cadastro-secretarios-mobile.php";
        $modal = "../views/cadastros/secretarios/cadastro-secretarios-modal.php";
    }

    public function relatorioConselho()
    {
        $desktop = "../views/relatorio/conselho/relatorio-conselho-desktop.php";
        $mobile = "../views/relatorio/conselho/relatorio-conselho-mobile.php";
        $modal = "../views/relatorio/conselho/relatorio-conselho-modal.php";
    }

    public function relatorioMinisterial()
    {
        $desktop = "../views/relatorio/ministerial/relatorio-ministerial-desktop.php";
        $mobile = "../views/relatorio/ministerial/relatorio-ministerial-mobile.php";
        $modal = "../views/relatorio/ministerial/relatorio-ministerial-modal.php";
    }

    public function relatorioEstatistica()
    {
        $desktop = "../views/relatorio/estatistica/relatorio-estatistica-desktop.php";
        $mobile = "../views/relatorio/estatistica/relatorio-estatistica-mobile.php";
        $modal = "../views/relatorio/estatistica/relatorio-estatistica-modal.php";
    }

    public function consultaConselho()
    {
        $desktop = "../views/consulta/conselho/consulta-conselho-desktop.php";
        $mobile = "../views/consulta/conselho/consulta-conselho-mobile.php";
        $modal = "../views/consulta/conselho/consulta-conselho-modal.php";
    }

    public function consultaMinisterial()
    {
        $desktop = "../views/consulta/ministerial/consulta-ministerial-desktop.php";
        $mobile = "../views/consulta/ministerial/consulta-ministerial-mobile.php";
        $modal = "../views/consulta/ministerial/consulta-ministerial-modal.php";
    }

    public function consultaEstatistica()
    {
        $desktop = "../views/consulta/estatistica/consulta-estatistica-desktop.php";
        $mobile = "../views/consulta/estatistica/consulta-estatistica-mobile.php";
        $modal = "../views/consulta/estatistica/consulta-estatistica-modal.php";
    }

    public function configuracoesUsuarios()
    {
        $desktop = "../views/configuracoes/usuarios/configuracoes-usuarios-desktop.php";
        $mobile = "../views/configuracoes/usuarios/configuracoes-usuarios-mobile.php";
        $modal = "../views/configuracoes/usuarios/configuracoes-usuarios-modal.php";
    }

    public function configuracoesTrocarSenha()
    {
        $desktop = "../views/configuracoes/trocarsenha/configuracoes-trocarsenha-desktop.php";
        $mobile = "../views/configuracoes/trocarsenha/configuracoes-trocarsenha-mobile.php";
        $modal = "../views/configuracoes/trocarsenha/configuracoes-trocarsenha-modal.php";
    }

    public function configuracoesSolicitarSuporte()
    {
        $desktop = "../views/configuracoes/solicitarsuporte/configuracoes-solicitarsuporte-desktop.php";
        $mobile = "../views/configuracoes/solicitarsuporte/configuracoes-solicitarsuporte-mobile.php";
        $modal = "../views/configuracoes/solicitarsuporte/configuracoes-solicitarsuporte-modal.php";
    }
}

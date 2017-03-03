<?php

/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 02/03/17
 * Time: 14:37
 */
class DiretoriosController
{

    public static function cadastroSinodos()
    {
        $diretorio[0] = "views/cadastros/sinodos/cadastro-sinodo-desktop.php";
        $diretorio[1] = "views/cadastros/sinodos/cadastro-sinodo-mobile.php";
        $diretorio[2] = "views/cadastros/sinodos/cadastro-sinodo-modal.php";
        return $diretorio;
    }

    public static function cadastroPresbiterios()
    {
        $diretorio[0] = "views/cadastros/presbiterios/cadastro-presbiterios-desktop.php";
        $diretorio[1] = "views/cadastros/presbiterios/cadastro-presbiterios-mobile.php";
        $diretorio[2] = "views/cadastros/presbiterios/cadastro-presbiterios-modal.php";
        return $diretorio;
    }

    public static function cadastroIgrejas()
    {
        $diretorio[0] = "views/cadastros/igrejas/cadastro-igrejas-desktop.php";
        $diretorio[1] = "views/cadastros/igrejas/cadastro-igrejas-mobile.php";
        $diretorio[2] = "views/cadastros/igrejas/cadastro-igrejas-modal.php";
        return $diretorio;
    }

    public static function cadastroOficiais()
    {
        $diretorio[0] = "views/cadastros/oficiais/cadastro-oficiais-desktop.php";
        $diretorio[1] = "views/cadastros/oficiais/cadastro-oficiais-mobile.php";
        $diretorio[2] = "views/cadastros/oficiais/cadastro-oficiais-modal.php";
        return $diretorio;
    }

    public static function cadastroSecretarios()
    {
        $diretorio[0] = "views/cadastros/secretarios/cadastro-secretarios-desktop.php";
        $diretorio[1] = "views/cadastros/secretarios/cadastro-secretarios-mobile.php";
        $diretorio[2] = "views/cadastros/secretarios/cadastro-secretarios-modal.php";
        return $diretorio;
    }

    public static function relatorioConselho()
    {
        $diretorio[0] = "views/relatorios/conselho/relatorio-conselho-desktop.php";
        $diretorio[1] = "views/relatorios/conselho/relatorio-conselho-mobile.php";
        $diretorio[2] = "views/relatorios/conselho/relatorio-conselho-modal.php";
        return $diretorio;
    }

    public static function relatorioMinisterial()
    {
        $diretorio[0] = "views/relatorios/ministerial/relatorio-ministerial-desktop.php";
        $diretorio[1] = "views/relatorios/ministerial/relatorio-ministerial-mobile.php";
        $diretorio[2] = "views/relatorios/ministerial/relatorio-ministerial-modal.php";
        return $diretorio;
    }

    public static function relatorioEstatistica()
    {
        $diretorio[0] = "views/relatorios/estatistica/relatorio-estatistica-desktop.php";
        $diretorio[1] = "views/relatorios/estatistica/relatorio-estatistica-mobile.php";
        $diretorio[2] = "views/relatorios/estatistica/relatorio-estatistica-modal.php";
        return $diretorio;
    }

    public static function consultaConselho()
    {
        $diretorio[0] = "views/consultas/conselho/consulta-conselho-desktop.php";
        $diretorio[1] = "views/consultas/conselho/consulta-conselho-mobile.php";
        $diretorio[2] = "views/consultas/conselho/consulta-conselho-modal.php";
        return $diretorio;
    }

    public static function consultaMinisterial()
    {
        $diretorio[0] = "views/consultas/ministerial/consulta-ministerial-desktop.php";
        $diretorio[1] = "views/consultas/ministerial/consulta-ministerial-mobile.php";
        $diretorio[2] = "views/consultas/ministerial/consulta-ministerial-modal.php";
        return $diretorio;
    }

    public static function consultaEstatistica()
    {
        $diretorio[0] = "views/consultas/estatistica/consulta-estatistica-desktop.php";
        $diretorio[1] = "views/consultas/estatistica/consulta-estatistica-mobile.php";
        $diretorio[2] = "views/consultas/estatistica/consulta-estatistica-modal.php";
        return $diretorio;
    }

    public static function configuracoesUsuarios()
    {
        $diretorio[0] = "views/configuracoes/usuarios/configuracoes-usuarios-desktop.php";
        $diretorio[1] = "views/configuracoes/usuarios/configuracoes-usuarios-mobile.php";
        $diretorio[2] = "views/configuracoes/usuarios/configuracoes-usuarios-modal.php";
        return $diretorio;
    }

    public static function configuracoesTrocarSenha()
    {
        $diretorio[0] = "views/configuracoes/trocarsenha/configuracoes-trocarsenha-desktop.php";
        $diretorio[1] = "views/configuracoes/trocarsenha/configuracoes-trocarsenha-mobile.php";
        $diretorio[2] = "views/configuracoes/trocarsenha/configuracoes-trocarsenha-modal.php";
        return $diretorio;
    }

    public static function configuracoesSolicitarSuporte()
    {
        $diretorio[0] = "views/configuracoes/solicitarsuporte/configuracoes-solicitarsuporte-desktop.php";
        $diretorio[1] = "views/configuracoes/solicitarsuporte/configuracoes-solicitarsuporte-mobile.php";
        $diretorio[2] = "views/configuracoes/solicitarsuporte/configuracoes-solicitarsuporte-modal.php";
        return $diretorio;
    }

    public static function home()
    {
        $diretorio[0] = "views/home/home-desktop.php";
        $diretorio[1] = "views/home/home-mobile.php";
        $diretorio[2] = "views/home/home-modal.php";
        return $diretorio;
    }

    public static function login()
    {
        $diretorio[0] = "";
        $diretorio[1] = "";
        $diretorio[2] = "";
        return $diretorio;
    }
}

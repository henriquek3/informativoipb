<?php

/**
 * Created by PhpStorm.
 * User: Jean Freitas
 * Date: 10/02/2017
 * Time: 13:16
 */
class Insert
{
    public static function sinodos($nome, $sigla)
    {
        $sql = "INSERT INTO sinodos (nome,sigla) VALUES ('$nome','$sigla')";
        return $sql;
    }

    public static function presbiterios($idSinodo, $nome, $sigla)
    {
        $sql = "INSERT INTO presbiterios (id_sinodo,nome,sigla) VALUES ('$idSinodo','$nome','$sigla')";
        return $sql;
    }

    public static function igrejas($idPresbiterio, $idCidade, $nome, $cnpj, $cep,
                                   $endereco, $enderecoComplemento, $enderecoNumero,
                                   $enderecoBairro, $cxPostal, $email, $fax, $telefone, $nroOrdem, $homepage, $dataOrganizacao)
    {
        $sql = "INSERT INTO igrejas (id_presbiterio, id_cidade, nome, cnpj, cep, endereco, endereco_complemento, endereco_numero, endereco_bairro,cxpostal,email, fax, telefone, nro_ordem, homepage, data_organizacao)
                VALUES ($idPresbiterio, $idCidade, '$nome', $cnpj,$cep,'$endereco', '$enderecoComplemento',$enderecoNumero,'$enderecoBairro',$cxPostal, '$email', $fax, $telefone,$nroOrdem, '$homepage', '$dataOrganizacao')";
        return $sql;
    }

    public static function presbiteros($idCidade, $igreja, $nome, $tipoPresbitero, $endereco, $enderecoBairro, $enderecoNumero, $enderecoComplemento, $telefone, $cep, $cxPostal, $email)
    {
        $sql = "INSERT INTO presbiteros (id_cidade,id_igreja,nome,tipo_presbitero,endereco,endereco_bairro,endereco_numero,endereco_complemento,telefone,cep,cxpostal,email)                                        
                VALUES ($idCidade,$igreja,'$nome',$tipoPresbitero,'$endereco','$enderecoBairro',$enderecoNumero,'$enderecoComplemento',$telefone,$cep,$cxPostal,'$email')";
        return $sql;
    }
}
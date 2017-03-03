<?php require_once "../models/Crud.php";
/**
 * Created by PhpStorm.
 * User: Jean Freitas
 * Date: 14/02/2017
 * Time: 00:16
 */

$igreja = $_POST['igreja'];
$nome = $_POST['nome'];
$tipoPresbitero = $_POST['tipoPresbitero'];
$endereco = $_POST['endereco'];
$enderecoNumero = $_POST['enderecoNumero'];
$enderecoComplemento = $_POST['enderecoComplemento'];
$enderecoBairro = $_POST['enderecoBairro'];
$idCidade = $_POST['idCidade'];
$cep = $_POST['cep'];
$cxPostal = $_POST['cxPostal'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

Crud::insert(Insert::presbiteros($idCidade, $igreja, $nome, $tipoPresbitero, $endereco, $enderecoBairro, $enderecoNumero, $enderecoComplemento, $telefone, $cep, $cxPostal, $email));


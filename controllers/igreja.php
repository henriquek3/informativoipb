<?php require_once "../models/Crud.php";
/**
 * Created by PhpStorm.
 * User: Jean Freitas
 * Date: 10/02/2017
 * Time: 00:11
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$idPresbiterio = $_POST['idPresbiterio'];
$idCidade = $_POST['idCidade'];
$nome = strtolower($_POST['nome']);
$cnpj = $_POST['cnpj'];
$cep = $_POST['cep'];
$endereco = strtolower($_POST['endereco']);
$enderecoComplemento = strtolower($_POST['enderecoComplemento']);
$enderecoNumero = $_POST['enderecoNumero'];
$enderecoBairro = strtolower($_POST['enderecoBairro']);
$cxPostal = $_POST['cxPostal'];
$email = strtolower($_POST['email']);
$fax = $_POST['fax'];
$telefone = $_POST['telefone'];
$nroOrdem = $_POST['nroOrdem'];
$homepage = strtolower($_POST['homepage']);
$dataOrganizacao = $_POST['dataOrganizacao'];

Crud::insert(Insert::igrejas($idPresbiterio, $idCidade, $nome, $cnpj, $cep, $endereco, $enderecoComplemento, $enderecoNumero, $enderecoBairro, $cxPostal, $email, $fax, $telefone, $nroOrdem, $homepage, $dataOrganizacao));


var_dump($_POST);

echo "<hr/></br></br></br>";


echo "</br>" . $idPresbiterio;;
echo "</br>" . $idCidade;
echo "</br>" . $nome;
echo "</br>" . $cnpj;
echo "</br>" . $cep;
echo "</br>" . $endereco;
echo "</br>" . $enderecoComplemento;
echo "</br>" . $enderecoNumero;
echo "</br>" . $enderecoBairro;
echo "</br>" . $cxPostal;
echo "</br>" . $email;
echo "</br>" . $fax;
echo "</br>" . $telefone;
echo "</br>" . $nroOrdem;
echo "</br>" . $homepage;
echo "</br>" . $dataOrganizacao;
<?php require_once "../models/Crud.php";
/**
 * Created by PhpStorm.
 * User: Jean Freitas
 * Date: 10/02/2017
 * Time: 00:11
 */
$idSinodo = "";
$nome = "";
$sigla = "";

if (isset($_POST['nome'])) {
    $nome = ucwords($_POST['nome']);
    $sigla = strtoupper($_POST['sigla']);
    $idSinodo = $_POST['sinodo'];
    echo "Sinodo nro: " . $idSinodo . "</br>";
    echo "Nome: " . $nome . "</br>";
    echo "Sigla: " . $sigla . "</br><hr/>";
    Crud::insert(Insert::presbiterios($idSinodo, $nome, $sigla));
    echo "Informações cadastradas com sucesso!</br>";
    echo "<input type=\"button\" value=\"Voltar\" onClick=\"history.back()\">";
}
<?php require_once "../models/Crud.php";

/**
 * Created by PhpStorm.
 * User: jean
 * Date: 12/02/17
 * Time: 00:43
 */

$id = $_REQUEST['id_sinodo']; //Recebe o idSinodo por request
foreach (Crud::select(Select::presbiteriosIdSinodos($id)) as $row) {
    $sinodos[] = array( //Transforma o $row em outro array pegando somente os campos necessarios
        'id' => $row['id_presbiterio'],
        'nome' => $row['nome'],
    );
}
echo(json_encode($sinodos)); //Exibe o resultado do _request para que possa ser capturado pela pagina que enviou

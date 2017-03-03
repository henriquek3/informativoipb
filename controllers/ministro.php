<?php require_once "../models/Crud.php";

/**
 * Created by PhpStorm.
 * User: jean
 * Date: 12/02/17
 * Time: 00:43
 */

$id_estado = $_REQUEST['id_estado']; //Recebe o idEstado por request
foreach (Crud::select(Select::cidadesIdEstado($id_estado)) as $row) {
    $selectCidades[] = array( //Transforma o $row em outro array pegando somente os campos necessarios
        'id' => $row['id_cidade'],
        'nome' => $row['nome'],
    );
}
echo(json_encode($selectCidades)); //Exibe o resultado do _request para que possa ser capturado pela pagina que enviou


/*var_dump($_POST);

echo "<hr/>";
var_dump($_POST);
echo "<br/>";
echo "<br/>";
echo "<br/>";
echo "<input type=\"button\" value=\"Voltar\" onClick=\"history.back()\">";
*/
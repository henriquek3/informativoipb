<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 22/02/17
 * Time: 15:23
 */

namespace Models;
require_once "../IModels/ISinodos.php";
require_once "Connect.php";
use IModels\ISinodos;

class Sinodos implements ISinodos
{
    private $pdo;

    function __construct()
    {
        $this->pdo = new \Connect();
    }

    public function insert($nome, $sigla)
    {
        // TODO: Implement insert() method.
        try {
            $query = "INSERT INTO sinodos (nome, sigla) VALUES ( :nome, :sigla )";
            $sql = $this->pdo->prepare($query);
            $sql->bindValue(":nome",$nome);
            $sql->bindValue(":sigla",$sigla);
            return $sql->execute();
        } catch (\Exception $exception){
            echo $exception->getMessage();
        }
    }
}
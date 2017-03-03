<?php
/**
 * Created by PhpStorm.
 * User: Jean Freitas
 * Date: 10/02/2017
 * Time: 13:11
 */
require_once "Connect.php";
require_once "Delete.php";
require_once "Insert.php";
require_once "Select.php";
require_once "Update.php";

class Crud
{
    public static function select($arg)
    {
        $pdo = new Connect();
        $result = $pdo->prepare($arg);
        $result->execute();
        $resultado = $result->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public static function insert($sql)
    {
        $pdo = new Connect();
        $result = $pdo->prepare($sql);
        $result->execute();
        return $result;
    }

    public static function delete($sql)
    {
        $pdo = new Connect();
        $result = $pdo->prepare($sql);
        $result->execute();
    }

    public static function update($sql)
    {
        $pdo = new Connect();
        $result = $pdo->prepare($sql);
        $result->execute();
        return $result;
    }
}
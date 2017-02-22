<?php
/**
 * Created by PhpStorm.
 * User: Jean Freitas
 * Date: 08/02/2017
 * Time: 21:12
 */

class Connect extends \PDO
{
    private $engine;
    private $host;
    private $port;
    private $dbname;
    private $user;
    private $pass;

    public function __construct()
    {
        $this->engine = 'pgsql';
        $this->host = '177.85.98.16';
        //$this->host = 'localhost';
        $this->port = '5432';
        $this->dbname = 'ipcacoal_teste';
        //$this->dbname = 'iarminius';
        $this->user = 'ipcacoal_ad';
        //$this->user = 'postgres';
        $this->pass = 'iarminius';
        //$this->pass = 'r5758222r';
        $dns = $this->engine.':dbname='.$this->dbname.';host='.$this->host;

        try{
            parent::__construct($dns,$this->user, $this->pass);
        }catch (PDOException $exception){
            echo $exception->getCode();
            echo "<br/>";
            echo $exception->getMessage();
        }
    }
}
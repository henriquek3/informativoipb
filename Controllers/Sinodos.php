<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 22/02/17
 * Time: 14:42
 */

namespace Controllers;
require_once "../Models/Sinodos.php";

use Models\Sinodos as mdlSinodos;

class Sinodos
{
    private $id;
    private $sigla;
    private $nome;

    public function getId()
    {
        // TODO: Implement getId() method.

        return $this->id;
    }

    public function setId($value)
    {
        // TODO: Implement setId() method.

        $this->id = $value;
    }

    public function getSigla()
    {
        // TODO: Implement getSigla() method.

        return $this->sigla;
    }

    public function setSigla($value)
    {
        // TODO: Implement setSigla() method.

        $this->sigla = $value;
    }

    public function getNome()
    {
        // TODO: Implement getNome() method.

        return $this->nome;
    }

    public function setNome($value)
    {
        // TODO: Implement setNome() method.

        $this->nome = $value;
    }

    public function getSinodo()
    {
    }
}

$mdlSinodos = new mdlSinodos();
$sinodos = new Sinodos();

if (isset($_POST['sigla']) && isset($_POST['nome']))
    {
        $sinodos->setSigla($_POST['sigla']);
        $sinodos->setNome($_POST['nome']);
    }
echo $sinodos->getNome();
echo "</br>";
echo $sinodos->getSigla();

$mdlSinodos->insert($sinodos->getNome(), $sinodos->getSigla());
<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 22/02/17
 * Time: 14:33
 */

namespace IControllers;


interface ISinodos
{

    public function setId($value);

    public function getId();

    public function setNome($value);

    public function getNome();

    public function setSigla($value);

    public function getSigla();

}
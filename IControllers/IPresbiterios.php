<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 22/02/17
 * Time: 14:36
 */

namespace IControllers;


interface IPresbiterios
{
    public function setId();

    public function getId();

    public function setNome();

    public function getNome();

    public function setSigla();

    public function getSigla();

    public function setIdSinodo();

    public function getIdSinodo();
}
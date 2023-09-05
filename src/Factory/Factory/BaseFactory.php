<?php

namespace Jonathan13779\DesignPaterns\Factory\Factory;

use Jonathan13779\DesignPaterns\Factory\Entity\Character;

abstract class BaseFactory
{
    abstract public function create(): Character;
}
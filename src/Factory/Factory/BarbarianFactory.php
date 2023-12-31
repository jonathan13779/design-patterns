<?php

namespace Jonathan13779\DesignPaterns\Factory\Factory;

use Jonathan13779\DesignPaterns\Factory\Entity\Barbarian;
use Jonathan13779\DesignPaterns\Factory\Entity\Character;

class BarbarianFactory extends BaseFactory{

    public function create(): Character
    {
        return new Barbarian();
    }
}
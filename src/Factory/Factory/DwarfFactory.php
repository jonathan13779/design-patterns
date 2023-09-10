<?php

namespace Jonathan13779\DesignPaterns\Factory\Factory;

use Jonathan13779\DesignPaterns\Factory\Entity\Character;
use Jonathan13779\DesignPaterns\Factory\Entity\Dwarf;

class DwarfFactory extends BaseFactory
{
    public function create(): Character
    {
        return new Dwarf();
    }
}
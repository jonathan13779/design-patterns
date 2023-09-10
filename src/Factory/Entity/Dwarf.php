<?php

namespace Jonathan13779\DesignPaterns\Factory\Entity;

use Jonathan13779\DesignPaterns\Factory\Entity\Character;

class Dwarf extends Character
{
    public function __construct()
    {
        parent::__construct(
            force: 30,
            vitality: 75,
            luck: 5,
            category: 'Dwarf'
        );
    }
}
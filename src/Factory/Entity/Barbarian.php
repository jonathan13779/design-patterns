<?php

namespace Jonathan13779\DesignPaterns\Factory\Entity;

use Jonathan13779\DesignPaterns\Factory\Entity\Character;

class Barbarian extends Character
{
    public function __construct() 
    {
        parent::__construct(
            force: 40,
            vitality: 80,
            luck: 3,
            category: 'Barbarian'
        );
    }
}
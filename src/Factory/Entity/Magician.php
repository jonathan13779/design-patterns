<?php

namespace Jonathan13779\DesignPaterns\Factory\Entity;

use Jonathan13779\DesignPaterns\Factory\Entity\Character;

class Magician extends Character
{
    public function __construct()
    {
        parent::__construct(
            force: 20,
            vitality: 60,
            luck: 9,
            category: 'Magician'
        );
    }
}
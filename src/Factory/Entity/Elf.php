<?php

namespace Jonathan13779\DesignPaterns\Factory\Entity;

use Jonathan13779\DesignPaterns\Factory\Entity\Character;

class Elf extends Character
{
    public function __construct()
    {
        parent::__construct(
            force: 25,
            vitality: 75,
            luck: 6,
            category: 'Elf'
        );
    }
}
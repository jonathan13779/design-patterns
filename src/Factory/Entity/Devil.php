<?php 

namespace Jonathan13779\DesignPaterns\Factory\Entity;

use Jonathan13779\DesignPaterns\Factory\Entity\Character;

class Devil extends Character
{
    public function __construct()
    {
        parent::__construct(
            force: 30,
            vitality: 95,
            luck: 7,
            category: 'Devil'
        );
    }
}
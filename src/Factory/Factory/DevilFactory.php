<?php

namespace Jonathan13779\DesignPaterns\Factory\Factory;

use Jonathan13779\DesignPaterns\Factory\Entity\Character;
use Jonathan13779\DesignPaterns\Factory\Entity\Devil;

class DevilFactory extends BaseFactory
{
    public function create(): Character
    {
        return new Devil();
    }
}
<?php

namespace Jonathan13779\DesignPaterns\Factory\Factory;

use Jonathan13779\DesignPaterns\Factory\Entity\Magician;

class MagicianFactory extends BaseFactory
{
    public function create(): Magician
    {
        return new Magician();
    }
}
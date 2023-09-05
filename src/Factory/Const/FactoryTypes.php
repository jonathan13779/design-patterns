<?php

namespace Jonathan13779\DesignPaterns\Factory\Const;

use Jonathan13779\DesignPaterns\Factory\Factory\BarbarianFactory;
use Jonathan13779\DesignPaterns\Factory\Factory\MagicianFactory;

class FactoryTypes
{
    public static  $types = [
        'barbarian' => BarbarianFactory::class,
        'magician' => MagicianFactory::class,
    ];   
}
<?php

namespace Jonathan13779\DesignPaterns\Factory\Factory;

use Jonathan13779\DesignPaterns\Factory\Entity\Character;
use Jonathan13779\DesignPaterns\Factory\Const\FactoryTypes;

class RandomFactory extends BaseFactory
{

    public function create(): Character
    {
        $types = FactoryTypes::$types;
        $typesRand = array_rand($types,2);
        $type = $types[$typesRand[array_rand($typesRand)]];
        $factory = new $type();
        
        return $factory->create();
    }

}
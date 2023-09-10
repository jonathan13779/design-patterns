<?php

namespace Jonathan13779\DesignPaterns\Factory\Const;

use Jonathan13779\DesignPaterns\Factory\Factory\BarbarianFactory;
use Jonathan13779\DesignPaterns\Factory\Factory\MagicianFactory;
use Jonathan13779\DesignPaterns\Factory\Factory\DevilFactory;
use Jonathan13779\DesignPaterns\Factory\Factory\DwarfFactory;
use Jonathan13779\DesignPaterns\Factory\Factory\ElfFactory;
use Jonathan13779\DesignPaterns\Factory\Factory\RandomFactory;

class FactoryTypes
{
    public static  $types = [
        'barbarian' => BarbarianFactory::class,
        'magician' => MagicianFactory::class,
        'devil' => DevilFactory::class,
        'dwarf' => DwarfFactory::class,
        'elf' => ElfFactory::class,
        'random' => RandomFactory::class,
    ];   
}
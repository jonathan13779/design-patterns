<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Jonathan13779\DesignPaterns\Factory\Const\FactoryTypes;
use Jonathan13779\DesignPaterns\Factory\Entity\FightingGame;

$factoryOneType = $argv[1] ?? 'barbarian';
$factoryTwoType = $argv[2] ?? 'magician';


$game = new FightingGame(
    new FactoryTypes::$types[$factoryOneType],
    new FactoryTypes::$types[$factoryTwoType],
);

$game->fight();
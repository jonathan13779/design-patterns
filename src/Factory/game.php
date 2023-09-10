
<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Jonathan13779\DesignPaterns\Factory\Const\FactoryTypes;
use Jonathan13779\DesignPaterns\Factory\Entity\FightingGame;

/**
 * Obtenemos los tipos de fábrica de personajes que queremos usar.
 * Si no se especifica ninguno, se usará uno aleatorio.
 */
$factoryOneType = $argv[1] ?? 'random';
$factoryTwoType = $argv[2] ?? 'random';


/**
 * Instanciamos nuestro juego de lucha con dos fábricas de personajes.
 * De esta forma desacoplamos la creación de los personajes de la lógica del juego,
 * permitiendonos crear nuevos tipos de personajes sin tener que modificar el juego.
 */
$game = new FightingGame(
    new FactoryTypes::$types[$factoryOneType],
    new FactoryTypes::$types[$factoryTwoType],
);

$game->fight();
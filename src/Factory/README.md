# Patrón Factory

El patron factory es un patron creacional que se utilizara para crear objetos sin especificar la clase exacta del
objetos que se creará. De esta forma desacoplamos la logica de la creacion de objetos del codigo de nuestro cliente.
En lugar de llamar directamente al constructor de una clase para crear un objeto, se utiliza un método de fábrica que se encarga de crear el objeto deseado. Esto proporciona una mayor flexibilidad y abstracción en la creación de objetos, lo que facilita el mantenimiento y la expansión del código.

## Ventajas del Patrón Factory

El patrón Factory proporciona varias ventajas, incluyendo:

* Desacoplamiento: Permite que el código cliente cree objetos sin conocer los detalles de implementación de las clases concretas.
* Flexibilidad: Facilita la adición de nuevas clases de productos sin modificar el código existente.
* Mantenimiento: Mejora la legibilidad y mantenibilidad del código al centralizar la lógica de creación de objetos en la fábrica.

## Código ejemplo

En nuestro ejemplo hemos creado un minijuego donde se van a efrentar 2 personajes entre ellos.

Unos de los objetivos era extraer de la logica del juego la creacion de los personajes. De esta 
forma nuestro juego es mas flexible a la hora de incorporar nuevos tipos combatientes.

Como nuestro juego va de enfrentar a 2 personajes, vamos a ir creando nuestra clase generica para definir cada personaje.

Puedes encontrar el código fuente completo en [este archivo PHP](./Entity/Character.php).

```php
<?php

namespace Jonathan13779\DesignPaterns\Factory\Entity;

abstract class Character{
    public readonly array $luckyRange;

    public function __construct(
        protected int $force,
        protected int $vitality,
        protected int $luck,
        protected string $category

    ){
    }

```

Una vez definida nuestra clase base para los personajes, vamos a continuar creando dos tipo de personajes 
el barbaro y el demonio, cada uno con sus estadisticas.

```php
<?php

namespace Jonathan13779\DesignPaterns\Factory\Entity;

use Jonathan13779\DesignPaterns\Factory\Entity\Character;

class Barbarian extends Character
{
    public function __construct() 
    {
        parent::__construct(
            force: 40,
            vitality: 80,
            luck: 3,
            category: 'Barbarian'
        );
    }
}
```

```php
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
```

a continuación definiremos lo que va a ser nuestra fabrica base para crear personajes.


```php
<?php

namespace Jonathan13779\DesignPaterns\Factory\Factory;

use Jonathan13779\DesignPaterns\Factory\Entity\Character;

abstract class BaseFactory
{
    abstract public function create(): Character;
}
```

... y acto seguido vamos a crear las correspondientes factorias para el barbaro y el demonio

```php
<?php

namespace Jonathan13779\DesignPaterns\Factory\Factory;

use Jonathan13779\DesignPaterns\Factory\Entity\Barbarian;
use Jonathan13779\DesignPaterns\Factory\Entity\Character;

class BarbarianFactory extends BaseFactory{

    public function create(): Character
    {
        return new Barbarian();
    }
}
```

```php
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
```

De esta forma ya tenemos todo lo necesario para poder ejecutar nuestro juego
pasandole las factorias de los personajes a los que queremos efrentar.

De esta manera en cualquier momento podemos incorporar mas personajes sin que el codigo de nuestro juego se vea afectado.

A continuacion os dejo el ejemplo de la ejecucion del juego

```php
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
```
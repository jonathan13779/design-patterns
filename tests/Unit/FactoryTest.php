<?php

namespace Jonathan13779\DesignPaterns\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Jonathan13779\DesignPaterns\Factory\Factory\BarbarianFactory;
use Jonathan13779\DesignPaterns\Factory\Factory\MagicianFactory;

class FactoryTest extends TestCase
{
    protected function setUp(): void
    {     
        parent::setUp();
    }    

    public function testFactoryBarbarian()
    {
        $barbarianFactory = new BarbarianFactory();
        $barbarian = $barbarianFactory->create();
        
        $this->assertInstanceOf(\Jonathan13779\DesignPaterns\Factory\Entity\Barbarian::class, $barbarian);
    }

    public function testFactoryMagician()
    {
        $magicianFactory = new MagicianFactory();
        $magician = $magicianFactory->create();
        $this->assertInstanceOf(\Jonathan13779\DesignPaterns\Factory\Entity\Magician::class, $magician);
    }
}
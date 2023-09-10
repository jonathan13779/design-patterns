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

    public function testFactoryDevil()
    {
        $devilFactory = new \Jonathan13779\DesignPaterns\Factory\Factory\DevilFactory();
        $devil = $devilFactory->create();
        $this->assertInstanceOf(\Jonathan13779\DesignPaterns\Factory\Entity\Devil::class, $devil);
    }

    public function testFactoryDwarf()
    {
        $dwarfFactory = new \Jonathan13779\DesignPaterns\Factory\Factory\DwarfFactory();
        $dwarf = $dwarfFactory->create();
        $this->assertInstanceOf(\Jonathan13779\DesignPaterns\Factory\Entity\Dwarf::class, $dwarf);
    }

    public function testFactoryElf()
    {
        $elfFactory = new \Jonathan13779\DesignPaterns\Factory\Factory\ElfFactory();
        $elf = $elfFactory->create();
        $this->assertInstanceOf(\Jonathan13779\DesignPaterns\Factory\Entity\Elf::class, $elf);

    }    
}
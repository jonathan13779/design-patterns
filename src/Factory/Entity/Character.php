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

    public function getForce(): int
    {
        return $this->force;
    }

    public function getVitality(): int
    {
        return $this->vitality;
    }

    public function getLuck(): int
    {
        return $this->luck;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setLuckyRange(int $min, int $max): void
    {
        $this->luckyRange = [$min, $max];
    }

    public function hasLucky(int $lucky): bool
    {
        return $lucky >= $this->luckyRange[0] && $lucky <= $this->luckyRange[1];
    }

    public function attack(Character $character, int $luck): void
    {
        $force = $this->calculateForce($luck);
        $character->setVitality($character->getVitality() - $force);
        echo "{$this->category} attack {$character->getCategory()} with {$force} force\n";
    }

    private function calculateForce(int $luck): int
    {
        
        $min = 0;
        $max = $this->luckyRange[1] - $this->luckyRange[0];
        $luck = $luck - $this->luckyRange[0];
        $percentage = $luck*100/$max;
        echo "Percentage: {$percentage}\n";
        $force = intval($this->force * $percentage/100);
        echo "Force: {$force}\n";
        return $force;
        
    }

    private function setVitality(int $vitality): void
    {
        $this->vitality = $vitality;
    }
}
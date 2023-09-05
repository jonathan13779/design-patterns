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

    public function attack(Character $character): void
    {
        $character->setVitality($character->getVitality() - $this->force);
        echo "{$this->category} attack {$character->getCategory()} with {$this->force} force\n";
    }

    private function setVitality(int $vitality): void
    {
        $this->vitality = $vitality;
    }
}
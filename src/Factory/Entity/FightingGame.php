<?php

namespace Jonathan13779\DesignPaterns\Factory\Entity;

use Jonathan13779\DesignPaterns\Factory\Entity\Character;
use Jonathan13779\DesignPaterns\Factory\Factory\BaseFactory;

class FightingGame
{
    private Character $characterOne;
    private Character $characterTwo;
    private $luckyMaxRange;

    public function __construct(
        private BaseFactory $characterOneFactory,
        private BaseFactory $characterTwoFactory,
    ) {
        $this->characterOne = $this->characterOneFactory->create();
        $this->characterTwo = $this->characterTwoFactory->create();
        
        $this->luckyMaxRange = $this->characterOne->getLuck() + $this->characterTwo->getLuck();

        $this->configureCharacters();
        $this->welcome();

    }

    private function welcome(): void
    {
        echo "Welcome to the fighting game!\n";
        echo "The first character is a {$this->characterOne->getCategory()} with {$this->characterOne->getVitality()} vitality and {$this->characterOne->getLuck()} luck\n";
        echo "The second character is a {$this->characterTwo->getCategory()} with {$this->characterTwo->getVitality()} vitality and {$this->characterTwo->getLuck()} luck\n";
        echo "Let's fight!\n\n";
    }

    private function configureCharacters(): void
    {
        if($this->characterOne->getLuck()<=$this->characterTwo->getLuck()){
            $this->characterOne->setLuckyRange(0, $this->characterOne->getLuck());
            $this->characterTwo->setLuckyRange($this->characterOne->getLuck(), $this->characterOne->getLuck()+$this->characterTwo->getLuck());
        }
        else{
            $this->characterTwo->setLuckyRange(0, $this->characterTwo->getLuck());
            $this->characterOne->setLuckyRange($this->characterTwo->getLuck(), $this->characterOne->getLuck()+$this->characterTwo->getLuck());
        }
    }

    public function fight(): void
    {
        sleep(1);
        $lucky = $this->getLucky();
        echo "The lucky number is {$lucky}\n";
        $this->attack($this->characterOne, $this->characterTwo, $lucky);
        if ($this->continueFight($this->characterOne, $this->characterTwo)) {
            $this->showStats();
            $this->fight();

        }
        else{
            $winner = $this->getWinner();
            echo "The winner is {$winner->getCategory()} with {$winner->getVitality()} vitality\n";
        }

    }

    private function getLucky(): int
    {
        return rand(1, $this->luckyMaxRange);
    }

    private function attack(Character $characterOne, Character $characterTwo , int $lucky){
        if($characterOne->hasLucky($lucky)){
            $characterOne->attack($characterTwo, $lucky);
        }
        else{
            $characterTwo->attack($characterOne, $lucky);
        }
    }
 
 
    private function continueFight(Character $characterOne, Character $characterTwo): bool
    {
        return $characterOne->getVitality() > 0 && $characterTwo->getVitality() > 0;
    }

    private function showStats(): void
    {
        echo "The {$this->characterOne->getCategory()} have {$this->characterOne->getVitality()} \n";
        echo "The {$this->characterTwo->getCategory()} have {$this->characterTwo->getVitality()} \n\n";
    }

    public function getWinner(): Character
    {
        if ($this->characterOne->getVitality() > $this->characterTwo->getVitality()) {
            return $this->characterOne;
        }

        return $this->characterTwo;
    }
}
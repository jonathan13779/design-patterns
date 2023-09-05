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
        $this->attack($this->characterOne, $this->characterTwo, $lucky);
        if ($this->continueFight($this->characterOne, $this->characterTwo)) {
            $this->fight();
        }
        else{
            $winner = $this->getWinner();
            echo "The winner is {$winner->getCategory()} with {$winner->getVitality()} vitality\n";
        }

    }

    private function getLucky(): int
    {
        return rand(0, $this->luckyMaxRange);
    }

    private function attack(Character $characterOne, Character $characterTwo , int $lucky){
        if($characterOne->hasLucky($lucky)){
            $characterOne->attack($characterTwo);
        }
        else{
            $characterTwo->attack($characterOne);
        }
    }
 
 
    private function continueFight(Character $characterOne, Character $characterTwo): bool
    {
        return $characterOne->getVitality() > 0 && $characterTwo->getVitality() > 0;
    }

    public function getWinner(): Character
    {
        if ($this->characterOne->getVitality() > $this->characterTwo->getVitality()) {
            return $this->characterOne;
        }

        return $this->characterTwo;
    }
}
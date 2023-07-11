<?php

namespace Spreadgroups\Game;

class Game
{
    public function __construct(private array $knights = [])
    {
        $this->knights = [];
    }

    public function addKnight(Knight $knight): void
    {
        $this->knights[] = $knight;
    }

    public function getAliveKnights(): array
    {
        return array_filter($this->knights, function (Knight $knight) {
            return $knight->isAlive();
        });
    }

    /**
     * This method simulates the game rounds.
     * It iterates over the knights and, for each alive knight, determines
     * the next knight in line to take damage by using the modulus operator.
     * It then rolls a random dice (1-6) and subtracts the rolled value
     * from the next knight's life points using the takeDamage() method.
     */
    public function playGame(): void
    {
        $knightsCount = count($this->knights);

        while ($knightsCount > 1) {
            for ($i = 0; $i < $knightsCount; $i++) {
                $currentKnight = $this->knights[$i];
                if (!$currentKnight->isAlive()) {
                    continue;
                }

                $nextIndex = ($i + 1) % $knightsCount;
                while (!$this->knights[$nextIndex]->isAlive()) {
                    $nextIndex = ($nextIndex + 1) % $knightsCount;
                }

                $nextKnight = $this->knights[$nextIndex];

                $diceRoll = random_int(1, 6);
                $nextKnight->takeDamage($diceRoll);
            }

            $this->knights = $this->getAliveKnights();
            $knightsCount = count($this->knights);
        }
    }



    public function getWinner(): ?Knight
    {
        return count($this->knights) === 1 ? $this->knights[0] : null;
    }
}

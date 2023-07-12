<?php

namespace App\Game;

class Game
{
    public function __construct(private array $knights = [])
    {
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
        while (count($this->knights) > 1) {
            $aliveKnights = $this->getAliveKnights();

            foreach ($aliveKnights as $index => $currentKnight) {

                // ensure that the index $nextIndex stays within the bounds of the $aliveKnights array.
                $nextIndex = ($index + 1) % count($aliveKnights);

                $nextKnight = $aliveKnights[$nextIndex];

                $diceRoll = random_int(1, 6);
                $nextKnight->takeDamage($diceRoll);

                if (!$nextKnight->isAlive()) {
                    unset($aliveKnights[$nextIndex]);
                    $aliveKnights = array_values($aliveKnights);
                }
            }

            $this->knights = $aliveKnights;
        }
    }



    public function getWinner(): ?Knight
    {
        return count($this->knights) === 1 ? $this->knights[0] : null;
    }
}

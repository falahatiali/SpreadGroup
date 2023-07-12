<?php

namespace App\Game;

use Exception;

class Game
{
    public function __construct(private array $knights = [])
    {
    }

    /**
     * @param Knight $knight
     */
    public function addKnight(Knight $knight): void
    {
        $this->knights[] = $knight;
    }

    /**
     * This method returns the list of alive knights.
     * @return array
     */
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
     * @throws Exception
     */
    public function playGame(): Knight
    {
        while ($this->isSingleAliveKnight() == false) {

            foreach ($this->knights as $index => $currentKnight) {
                // ensure that the index $nextIndex stays within the bounds of the $aliveKnights array.
                $nextIndex = ($index + 1) % count($this->knights);

                /** @var Knight $nextKnight */
                $nextKnight = $this->knights[$nextIndex];

                if ($nextKnight->isAlive()) {
                    $diceRoll = random_int(1, 6);
                    $nextKnight->takeDamage($diceRoll);
                }

                if ($this->isSingleAliveKnight()) {
                    break;
                }
            }
        }

        print_r($this->knights);
        return $this->getWinner();
    }

    /**
     * Check if there is only one knight alive.
     * @return bool
     */
    public function isSingleAliveKnight(): bool
    {
        $count = count(array_filter($this->knights, fn(Knight $knight) => $knight->isAlive()));

        if ($count == 1) {
            return true;
        }

        return false;
    }

    /**
     * @return Knight
     * @throws Exception
     */
    private function getWinner(): Knight
    {
        foreach ($this->knights as $knight) {
            if ($knight->isAlive()) {
                return $knight;
            }
        }

        throw new Exception('An exception occurred. server error');
    }
}

<?php

namespace App\Game;

/**
 * Represents a knight in the game.
 */
class Knight
{
    private string $status;

    public function __construct(private int $id, private int $lifePoints)
    {
        $this->status = 'alive';
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLifePoints(): int
    {
        return $this->lifePoints;
    }

    public function isAlive(): bool
    {
        return $this->status === 'alive';
    }

    /**
     * Apply damage to the knight's life points.
     *
     * @param int $damage The amount of damage to be applied.
     */
    public function takeDamage(int $damage): void
    {
        $this->lifePoints -= $damage;

        if ($this->lifePoints <= 0) {
            $this->status = 'dead';
            $this->lifePoints = 0;
        }
    }
}
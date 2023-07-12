<?php
namespace Tests;

use App\Game\Game;
use App\Game\Knight;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    /** @test */
    public function testPlayGame()
    {
        // Arrange
        $knight1 = new Knight(1, 100);
        $knight2 = new Knight(2, 100);
        $knight3 = new Knight(3, 100);

        $game = new Game([$knight1, $knight2, $knight3]);

        // Act
        $game->playGame();

        // Assert
        $aliveKnights = $game->getAliveKnights();
        $this->assertCount(1, $aliveKnights);
    }

    /** @test */
    public function testGameWithDifferentNumbersOfKnights()
    {
        // Test with different numbers of knights
        $game = new Game();

        // Scenario 1: 2 knights
        $knight1 = new Knight(1, 100);
        $knight2 = new Knight(2, 100);
        $game->addKnight($knight1);
        $game->addKnight($knight2);
        $game->playGame();
        $this->assertCount(1, $game->getAliveKnights());

        // Scenario 2: 5 knights
        $knight3 = new Knight(3, 100);
        $knight4 = new Knight(4, 100);
        $knight5 = new Knight(5, 100);
        $knight6 = new Knight(6, 100);
        $knight7 = new Knight(7, 100);
        $game->addKnight($knight3);
        $game->addKnight($knight4);
        $game->addKnight($knight5);
        $game->addKnight($knight6);
        $game->addKnight($knight7);
        $game->playGame();
        $this->assertCount(1, $game->getAliveKnights());

        // Scenario 3: 10 knights
        $knights = [];
        for ($i = 8; $i <= 17; $i++) {
            $knights[] = new Knight($i, 100);
        }
        foreach ($knights as $knight) {
            $game->addKnight($knight);
        }
        $game->playGame();
        $this->assertCount(1, $game->getAliveKnights());
    }

    /**
     * It's not necessary because in the question text asked us to examine just equal life points.
     * buts it's a useful test scenario if we want to have a comprehensive test.
     */
    /** @test */
    public function testGameWithDifferentInitialLifePoints()
    {
        // Test with knights having different initial life points
        $knight1 = new Knight(1, 50);
        $knight2 = new Knight(2, 150);
        $knight3 = new Knight(3, 100);

        $game = new Game();
        $game->addKnight($knight1);
        $game->addKnight($knight2);
        $game->addKnight($knight3);
        $game->playGame();

        $aliveKnights = $game->getAliveKnights();
        $this->assertCount(1, $aliveKnights);
        $this->assertInstanceOf(Knight::class, $aliveKnights[0]);

    }

    /** @test */
    public function testGameWithLargeNumberOfKnights()
    {
        // Test with a large number of knights (20 or more)
        $knights = [];

        for ($i = 1; $i <= 20; $i++) {
            $knights[] = new Knight($i, 100);
        }

        $game = new Game();
        foreach ($knights as $knight) {
            $game->addKnight($knight);
        }
        $game->playGame();

        $aliveKnights = $game->getAliveKnights();
        $this->assertCount(1, $aliveKnights);
        $this->assertInstanceOf(Knight::class, $aliveKnights[0]);
    }

}
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
    public function testGameWithDifferentNumberOfKnights()
    {
        // Test with 2 knights
        $knight1 = new Knight(1, 100);
        $knight2 = new Knight(2, 100);

        $game = new Game();
        $game->addKnight($knight1);
        $game->addKnight($knight2);
        $game->playGame();

        $aliveKnights = $game->getAliveKnights();
        $this->assertCount(1, $aliveKnights);
        $this->assertInstanceOf(Knight::class, $aliveKnights[0]);


        // Test with 5 knights
        $knight3 = new Knight(3, 100);
        $knight4 = new Knight(4, 100);
        $knight5 = new Knight(5, 100);
        $knight6 = new Knight(6, 100);

        $game->addKnight($knight3);
        $game->addKnight($knight4);
        $game->addKnight($knight5);
        $game->addKnight($knight6);
        $game->playGame();

        $aliveKnights = $game->getAliveKnights();
        $this->assertCount(1, $aliveKnights);
        $this->assertInstanceOf(Knight::class, $aliveKnights[0]);

    }
}
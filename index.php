<?php

require_once 'vendor/autoload.php';

use App\Game\Game;
use App\Game\Knight;

// Create a new game instance
$game = new Game();

// Add knights to the game
$game->addKnight(new Knight(1, 10));
$game->addKnight(new Knight(2, 10));
$game->addKnight(new Knight(3, 10));
$game->addKnight(new Knight(4, 10));
$game->addKnight(new Knight(5, 10));
$game->addKnight(new Knight(6, 10));
$game->addKnight(new Knight(7, 10));
$game->addKnight(new Knight(8, 10));
$game->addKnight(new Knight(9, 10));
$game->addKnight(new Knight(10, 10));

$winner = $game->playGame();

echo "The winner is Knight " . $winner->getId() . "!";

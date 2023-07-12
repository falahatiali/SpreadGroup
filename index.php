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
// Add more knights as needed

// Start the game simulation
$game->playGame();

// Get the winner of the game
$winner = $game->getWinner();

// Output the winner's identifier or information
if ($winner) {
    echo "The winner is Knight " . $winner->getId() . "!";
} else {
    echo "No winner found. It's a draw!";
}

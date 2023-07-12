# Spreadgroups Challenge Solution

This project is a solution for the Spreadgroups challenge, where I need to simulate a game played by knights in a circle. The objective of the game is to have only one knight remaining on the field by subtracting life points based on dice rolls.

## Approach

Our approach to solving the challenge is as follows:

1. I have designed the project using object-oriented principles.
2. I have implemented the core logic of the game using the Game and Knight classes.
3. The Game class manages the game rounds, rolls the dice, and applies damage to the next knight in the circle.
4. The Knight class represents an individual knight with an ID and life points, and it handles taking damage and determining if the knight is still alive.
5. I have utilized PHPUnit as the testing framework to ensure the correctness of our code and cover various scenarios.

## Running the Project

### With Docker

1. Ensure that you have Docker installed on your machine.
2. Clone this repository to your local machine.
3. Open a terminal and navigate to the project directory.
4. Run the following command to build the Docker image:
    
```bash
   docker build -t spreadgroups .
```
   5. Run the following command to run the Docker container:

```bash
  docker run --rm --name spreadgroups  -it spreadgroups
```
 
6. The game will start playing itself in the terminal, and you will see the winner displayed at the end.
### Without Docker

1. Clone this repository to your local machine.
2. Ensure that you have PHP installed (version 8.2 or the version specified by the challenge requirements).
3. Open a terminal and navigate to the project directory.
4. Install the required dependencies by running the following command:

```bash
   composer install
```
5. Run the following command to start the game:

```bash
   php index.php
```
6. The game will start playing itself in the terminal, and you will see the winner displayed at the end.
7. Run the following command to run the tests:

```bash
   ./vendor/bin/phpunit
```
## Assumptions

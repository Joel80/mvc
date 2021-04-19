<?php

declare(strict_types=1);

namespace Jolf20\Dice;

use PHPUnit\Framework\TestCase;
use Jolf20\Dice\Game;
use Jolf20\Dice\DiceHand;

/**
 * Test cases for the Game class
 */

class GameSetupTest extends TestCase
{
    /**
     * Try to execute the setup method of class Game
     * with textual dice
     *
     */
    public function testSetupTextDice()
    {
        $game = new Game();

        $handOne = new DiceHand();

        $handTwo = new DiceHand();

        $game->setup($handOne, $handTwo, 1, "text", 5, 6);

        $handOneDice = $handOne->getDices();

        $handOneFirstDie  = $handOneDice[0];

        $handTwoDice = $handTwo->getDices();

        $handTwoFirstDie  = $handTwoDice[0];

        $this->assertInstanceOf("\Jolf20\Dice\Dice", $handOneFirstDie);

        $this->assertInstanceOf("\Jolf20\Dice\Dice", $handTwoFirstDie);
    }

    /**
     * Try to execute the setup method of class Game
     * with graphical dice
     *
     */
    public function testSetupGraphicalDice()
    {
        $game = new Game();

        $handOne = new DiceHand();

        $handTwo = new DiceHand();

        $game->setup($handOne, $handTwo, 1, "graphical", 5, 6);

        $handOneDice = $handOne->getDices();

        $handOneFirstDie  = $handOneDice[0];

        $handTwoDice = $handTwo->getDices();

        $handTwoFirstDie  = $handTwoDice[0];

        $this->assertInstanceOf("\Jolf20\Dice\GraphicalDice", $handOneFirstDie);

        $this->assertInstanceOf("\Jolf20\Dice\GraphicalDice", $handTwoFirstDie);
    }
}

<?php

declare(strict_types=1);

namespace Jolf20\Dice;

use PHPUnit\Framework\TestCase;
use Jolf20\Dice\Game;
use Jolf20\Dice\DiceHand;

/**
 * Test cases for the Game class
 */

class GameComputerRollTest extends TestCase
{
    /**
     * Try to execute the computerRoll() method of class Game
     * with textual dice test that computerRollHistory is set.
     *
     */
    public function testComputerRollTextDiceSetsComputerRollHistory()
    {
        $game = new Game();

        $handOne = new DiceHand();

        $handTwo = new DiceHand();

        $game->setup($handOne, $handTwo, 1, "text", 5, 6);

        $game->playerRoll();

        $game->computerRoll();

        $data = $game->getData();

        $this->assertTrue(is_string($data["computerRollHistory"]));
    }

     /**
     * Try to execute the computerRoll() method of class Game
     * with textual dice test that computerTotal is set.
     *
     */
    public function testComputerRollTextDiceSetsComputerTotal()
    {
        $game = new Game();

        $handOne = new DiceHand();

        $handTwo = new DiceHand();

        $game->setup($handOne, $handTwo, 1, "text", 5, 6);

        $game->playerRoll();

        $game->computerRoll();

        $data = $game->getData();

        $this->assertTrue(is_int($data["computerTotal"]));
    }

    /**
     * Try to execute the computerRoll() method of class Game
     * with graphical dice test that computerRollHistory is set.
     *
     */
    public function testcomputerRollGraphicalDiceSetsComputerRollHistory()
    {
        $game = new Game();

        $handOne = new DiceHand();

        $handTwo = new DiceHand();

        $game->setup($handOne, $handTwo, 1, "graphical", 5, 6);

        $game->playerRoll();

        $game->computerRoll();

        $data = $game->getData();

        $this->assertTrue(is_string($data["computerRollHistory"]));
    }

    /**
     * Try to execute the computerRoll() method of class Game
     * with graphical dice test that computerRollTotal is set.
     *
     */
    public function testcomputerRollGraphicalDiceSetsComputerTotal()
    {
        $game = new Game();

        $handOne = new DiceHand();

        $handTwo = new DiceHand();

        $game->setup($handOne, $handTwo, 1, "graphical", 5, 6);

        $game->playerRoll();

        $game->computerRoll();

        $data = $game->getData();

        $this->assertTrue(is_int($data["computerTotal"]));
    }

    /**
     * Try to execute the computerRoll() method of class Game
     * with graphical dice test that computerRollGraphicRep is set.
     *
     */
    public function testcomputerRollGraphicalDiceSetsComputerRollGraphicRep()
    {
        $game = new Game();

        $handOne = new DiceHand();

        $handTwo = new DiceHand();

        $game->setup($handOne, $handTwo, 1, "graphical", 5, 6);

        $game->playerRoll();

        $game->computerRoll();

        $data = $game->getData();

        $this->assertTrue(is_array($data["computerRollGraphicRep"]));
    }

    /**
     * Try to execute the computerRoll() method of class Game
     * with graphical dice test that ccomputerRollGraphicHistory is set.
     *
     */
    public function testcomputerRollGraphicalDiceSetsComputerRollGraphicHistory()
    {
        $game = new Game();

        $handOne = new DiceHand();

        $handTwo = new DiceHand();

        $game->setup($handOne, $handTwo, 1, "graphical", 5, 6);

        $game->playerRoll();

        $game->computerRoll();

        $data = $game->getData();

        $this->assertTrue(is_array($data["computerRollGraphicHistory"]));
    }
}

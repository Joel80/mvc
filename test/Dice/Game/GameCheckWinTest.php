<?php

declare(strict_types=1);

namespace Jolf20\Dice;

use PHPUnit\Framework\TestCase;
use Jolf20\Dice\Game;

/**
 * Test cases for the Game class
 */

class GameCheckWinTest extends TestCase
{

    /**
     * Try to execute the checkWin method with
     * first score higher than second
     *
     */
    public function testCheckComputerWinFirstScoreHigher()
    {
        $game = new Game();

        $game->checkWin(20, 5);

        $data = $game->getData();

        $expResult = "Computer won!";

        $result = $data["result"];

        $this->assertEquals($expResult, $result);
    }

    /**
     * Try to execute the checkWin method with
     * second score higher than first
     *
     */
    public function testChecWinSecondScoreHigher()
    {
        $game = new Game();

        $game->checkWin(5, 20);

        $data = $game->getData();

        $expResult = "Player won!";

        $result = $data["result"];

        $this->assertEquals($expResult, $result);
    }

     /**
     * Try to execute the checkWin method with
     * equal scores
     *
     */
    public function testCheckWinEqualScores()
    {
        $game = new Game();

        $game->checkWin(5, 5);

        $data = $game->getData();

        $expResult = "Computer won!";

        $result = $data["result"];

        $this->assertEquals($expResult, $result);
    }
}

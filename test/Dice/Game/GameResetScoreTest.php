<?php

declare(strict_types=1);

namespace Jolf20\Dice;

use PHPUnit\Framework\TestCase;
use Jolf20\Dice\Game;

/**
 * Test cases for the Game class
 */

class GameResetScoreTest extends TestCase
{

    /**
     * Try to execute the resetScore method
     * test that it sets computerWins to zero
     */
    public function testresetScoreSetsComputerScore()
    {
        $game = new Game();

        $game->resetScore();

        $data = $game->getData();

        $this->assertEquals($data["computerWins"], 0);
    }

      /**
     * Try to execute the resetScore method
     * test that it sets playerWins to zero
     */
    public function testresetScoreSetsPlayerScore()
    {
        $game = new Game();

        $game->resetScore();

        $data = $game->getData();

        $this->assertEquals($data["playerWins"], 0);
    }
}

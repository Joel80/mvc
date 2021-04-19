<?php

declare(strict_types=1);

namespace Jolf20\Dice;

use PHPUnit\Framework\TestCase;
use Jolf20\Dice\Game;

/**
 * Test cases for the Game class
 */

class GameGetGameStateTest extends TestCase
{

    /**
     * Try to execute the method getGameState() test
     * that it returns a string.
     *
     */
    public function testGetGameState()
    {
        $game = new Game();

        $data = $game->getGameState();

        $this->assertTrue(is_string($data));
    }
}

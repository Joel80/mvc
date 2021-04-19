<?php

declare(strict_types=1);

namespace Jolf20\Dice;

use PHPUnit\Framework\TestCase;
use Jolf20\Dice\Game;

/**
 * Test cases for the Game class
 */

class GameGetDataTest extends TestCase
{

    /**
     * Test that getData method returns array.
     *
     */
    public function testGameGetData()
    {
        $game = new Game();

        $data = $game->getData();

        $this->assertTrue(is_array($data));
    }
}

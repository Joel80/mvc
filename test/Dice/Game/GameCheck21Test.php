<?php

declare(strict_types=1);

namespace Jolf20\Dice;

use PHPUnit\Framework\TestCase;
use Jolf20\Dice\Game;

/**
 * Test cases for the Game class
 */

class GameCheck21Test extends TestCase
{

    /**
     * Try to execute the check21 method with
     * the value 21.
     *
     */
    public function testCheck21With21()
    {
        $game = new Game();

        $game->check21(21);

        $data = $game->getData();

        $this->assertFalse(is_null($data["twentyOne"]));
    }

    /**
     * Try to execute the check21 method with
     * a value that is not 21
     *
     */
    public function testCheck21WithOterValue()
    {
        $game = new Game();

        $game = new Game();

        $handOne = new DiceHand();

        $handTwo = new DiceHand();

        $game->setup($handOne, $handTwo, 1, "text", 5, 6);

        $game->check21(20);

        $data = $game->getData();

        $this->assertTrue(is_null($data["twentyOne"]));
    }
}

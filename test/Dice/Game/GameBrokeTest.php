<?php

declare(strict_types=1);

namespace Jolf20\Dice;

use PHPUnit\Framework\TestCase;
use Jolf20\Dice\Game;

/**
 * Test cases for the Game class
 */

class GameBrokeTest extends TestCase
{

    /**
     * Try to execute the broke method
     * first bitcoin value = 0
     *
     */
    public function testBrokeFirstArgumentZero()
    {
        $game = new Game();

        $game->broke(0, 10);

        $data = $game->getData();

        $expBroke = "Computer broke - please reset bitcoins";

        $broke = $data["broke"];

        $this->assertEquals($expBroke, $broke);
    }

    /**
     * Try to execute the broke method
     * second bitcoin value = 0
     *
     */
    public function testBrokeSecondArgumentZero()
    {
        $game = new Game();

        $game->broke(10, 0);

        $data = $game->getData();

        $expBroke = "Player broke - please reset bitcoins";

        $broke = $data["broke"];

        $this->assertEquals($expBroke, $broke);
    }
}

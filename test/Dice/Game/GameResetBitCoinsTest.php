<?php

declare(strict_types=1);

namespace Jolf20\Dice;

use PHPUnit\Framework\TestCase;
use Jolf20\Dice\Game;

/**
 * Test cases for the Game class
 */

class GameResetBitCoinsTest extends TestCase
{

    /**
     * Try to execute the resetBitCoins method
     * test that it set ComputerBitCoins to initial value
     */
    public function testResetBitCoinsComputerBitCoinsToInitial()
    {
        $game = new Game();

        $game->resetBitCoins();

        $data = $game->getData();

        $this->assertEquals($data["computerBitCoin"], 100);
    }

    /**
     * Try to execute the resetBitCoins method
     * test that it set PlayerBitCoins to initial value
     */
    public function testResetBitCoinsPlayerBitCoinsToInitial()
    {
        $game = new Game();

        $game->resetBitCoins();

        $data = $game->getData();

        $this->assertEquals($data["playerBitCoin"], 10);
    }

    /**
     * Try to execute the resetBitCoins method
     * test that it sets broke to initial value
     */
    public function testResetBitCoinsSetsBrokeToInitial()
    {
        $game = new Game();

        $game->resetBitCoins();

        $data = $game->getData();

        $this->assertTrue(is_null($data["broke"]));
    }
}

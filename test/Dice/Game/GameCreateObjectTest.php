<?php

declare(strict_types=1);

namespace Jolf20\Dice;

use PHPUnit\Framework\TestCase;
use Jolf20\Dice\Game;

/**
 * Test cases for the Game class
 */

class GameCreateObjectTest extends TestCase
{
    /**
     * Try to create the object of the class without arguments.
     *
     */
    public function testCreateGameObjectNoArguments()
    {
        $game = new Game();

        $this->assertInstanceOf("\Jolf20\Dice\Game", $game);

        $expData = array("header" => "Dice", "message" => "The dice game!", "maxBet" => "5", "computerBitCoin" => "100", "playerBitCoin" => "10");

        $data = $game->getData();

        $this->assertEquals($expData, $data);
    }

    /**
     * Try to create the object of the class with one argument.
     * @runInSeparateProcess
     */
    public function testCreateGameObjectOneArgument()
    {
        $game = new Game(50);

        $this->assertInstanceOf("\Jolf20\Dice\Game", $game);

        $expData = array("header" => "Dice", "message" => "The dice game!", "maxBet" => "5", "computerBitCoin" => "50", "playerBitCoin" => "10");

        $data = $game->getData();

        $this->assertEquals($expData, $data);
    }

    /**
     * Try to create the object of the class with both arguments.
     * @runInSeparateProcess
     */
    public function testCreateGameObjectBothArguments()
    {
        $game = new Game(50, 5);

        $this->assertInstanceOf("\Jolf20\Dice\Game", $game);

        $expData = array("header" => "Dice", "message" => "The dice game!", "maxBet" => "2", "computerBitCoin" => "50", "playerBitCoin" => "5");

        $data = $game->getData();

        $this->assertEquals($expData, $data);
    }
}

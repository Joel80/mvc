<?php

declare(strict_types=1);

namespace Jolf20\Controller;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Jolf20\Dice\Game;
use Jolf20\Dice\DiceHand;

/**
 * Test cases for the controller Game21.
 */
class ControllerGame21Test extends TestCase
{
    /**
     * Try to create the controller class.
     */
    public function testCreateTheControllerGame21Class()
    {
        $controller = new Game21();
        $this->assertInstanceOf("\Jolf20\Controller\Game21", $controller);
    }

    /**
     * Check that the controller method playGame() returns a response.
     */
    public function testControllerMethodPlayGameReturnsResponse()
    {
        $controller = new Game21();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->playGame();
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check that the controller method setup() returns a response.
     */
    public function testControllerMethodSetupReturnsResponse()
    {
        $controller = new Game21();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->setup();

        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check that the controller method playerRoll() returns a response.
     * @runInSeparateProcess
     */
    public function testControllerMethodPlayerRollReturnsResponse()
    {
        $controller = new Game21();
        $game = new Game();

        $game->setup(new DiceHand, new DiceHand, 2, "text", 10, 6);

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->playerRoll();

        //Should this kind of test be here or in test for Game class?
        $data = $game->getData();
        $this->assertNotNull($data["playerRoll"]);

        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check that the controller method computerRoll() returns a response.
     * @runInSeparateProcess
     */
    public function testControllerMethodComputerRollReturnsResponse()
    {
        $controller = new Game21();
        $game = new Game();

        $game->setup(new DiceHand, new DiceHand, 2, "text", 10, 6);

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->computerRoll();

        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check that the controller method playAgain()) returns a response.
     * @runInSeparateProcess
     */
    public function testControllerMethodPlayAgainReturnsResponse()
    {
        $controller = new Game21();
        $game = new Game();

        $game->setup(new DiceHand, new DiceHand, 2, "text", 10, 6);

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->playAgain();

        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check that the controller method resetScore()) returns a response.
     * @runInSeparateProcess
     */
    public function testControllerMethodResetScoreReturnsResponse()
    {
        $controller = new Game21();
        $game = new Game();

        $game->setup(new DiceHand, new DiceHand, 2, "text", 10, 6);

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->resetScore();

        $this->assertInstanceOf($exp, $res);
    }

     /**
     * Check that the controller method resetScore()) returns a response.
     * @runInSeparateProcess
     */
    public function testControllerMethodResetBitcoinsReturnsResponse()
    {
        $controller = new Game21();
        $game = new Game();

        $game->setup(new DiceHand, new DiceHand, 2, "text", 10, 6);

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->resetBitCoins();

        $this->assertInstanceOf($exp, $res);
    }
}

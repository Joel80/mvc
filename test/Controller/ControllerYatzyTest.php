<?php

declare(strict_types=1);

namespace Jolf20\Controller;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Jolf20\Dice\Yatzy;
use Jolf20\Dice\YatzyHand;
use Jolf20\Dice\GraphicalDice;
use Jolf20\Dice\Scoreboard;
use Jolf20\Dice\Scorebox;

/**
 * Test cases for the controller YatzyController.
 */
class ControllerYatzyTest extends TestCase
{

    /**
     * Try to create the controller class.
     */
    public function testCreateTheYatzyControllerClass()
    {
        $controller = new YatzyController();
        $this->assertInstanceOf("\Jolf20\Controller\YatzyController", $controller);
    }

    /**
     * Check that the controller method playGame() returns a response.
     *
     */
    public function testControllerMethodPlayGameReturnsResponse()
    {
        $controller = new YatzyController();

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->playGame();
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check that the controller method playerRoll() returns a response.
     */
    public function testControllerMethodPlayerRollReturnsResponse()
    {
        $controller = new YatzyController();

        new Yatzy(new YatzyHand(), new Scoreboard());

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->playerRoll();
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check that the controller method lockDice() returns a response.
     *
     */
    public function testControllerMethodLockDiceReturnsResponse()
    {
        $_POST["lockedDice"] = ["1"];

        $controller = new YatzyController();

        $hand = new YatzyHand();

        $hand->addDice(new GraphicalDice());

        new Yatzy($hand, new Scoreboard());

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->lockDice();
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check that the controller method lockScore() returns a response.
     */
    public function testControllerMethodLockScoreReturnsResponse()
    {
        $controller = new YatzyController();

        $scoreboard = new Scoreboard();

        $scoreboard->addScorebox(new Scorebox("Ones"));

        new Yatzy(new YatzyHand(), $scoreboard);

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->lockScore();
        $this->assertInstanceOf($exp, $res);
    }

    /**
     * Check that the controller method newGame() returns a response.
     */
    public function testControllerMethodNewGameReturnsResponse()
    {
        $controller = new YatzyController();

        new Yatzy(new YatzyHand(), new Scoreboard());

        $exp = "\Psr\Http\Message\ResponseInterface";
        $res = $controller->newGame();
        $this->assertInstanceOf($exp, $res);
    }
}

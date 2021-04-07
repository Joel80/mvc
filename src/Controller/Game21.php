<?php

declare(strict_types=1);

namespace Jolf20\Controller;

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Jolf20\Dice\Game;

use function Mos\Functions\{
    renderView,
    url
};

/**
 * Controller for the game21 routes.
 */
class Game21
{
    /* public function index(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();

        $body = renderView("layout/session.php");

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }
 */


    public function playGame(): ResponseInterface
    {
        $psr17Factory = new Psr17Factory();

        $game = isset($_SESSION["game"]) ? $_SESSION["game"] : new Game();

        $data = $game->getData();

        $data["gameState"] = $game->getGameState();

        $body = renderView("layout/dice.php", $data);

        return $psr17Factory
            ->createResponse(200)
            ->withBody($psr17Factory->createStream($body));
    }

    public function setup(): ResponseInterface
    {
        $game = isset($_SESSION["game"]) ? $_SESSION["game"] : null;

        $nrOfDice = intval($_POST["dice"]);

        $typeOfDice = ($_POST["diceType"]);

        $bet = isset($_POST["bet"]) ? intval($_POST["bet"]) : 0;

        $sides = isset($_POST["sides"]) ? intval($_POST["sides"]) : null;

        $game->setup($nrOfDice, $typeOfDice, $bet, $sides);

        return (new Response())
            ->withStatus(301)
            ->withHeader("Location", url("/dice"));
    }

    public function playerRoll(): ResponseInterface
    {
        $game = isset($_SESSION["game"]) ? $_SESSION["game"] : null;

        $game->playerRoll();

        return (new Response())
            ->withStatus(301)
            ->withHeader("Location", url("/dice"));
    }

    public function computerRoll(): ResponseInterface
    {
        $game = isset($_SESSION["game"]) ? $_SESSION["game"] : null;

        $game->computerRoll();

        return (new Response())
            ->withStatus(301)
            ->withHeader("Location", url("/dice"));
    }

    public function playAgain(): ResponseInterface
    {
        $game = isset($_SESSION["game"]) ? $_SESSION["game"] : null;

        $game->playAgain();

        return (new Response())
            ->withStatus(301)
            ->withHeader("Location", url("/dice"));
    }

    public function resetScore(): ResponseInterface
    {
        $game = isset($_SESSION["game"]) ? $_SESSION["game"] : null;

        $game->resetScore();

        return (new Response())
            ->withStatus(301)
            ->withHeader("Location", url("/dice"));
    }

    public function resetBitcoins(): ResponseInterface
    {
        $game = isset($_SESSION["game"]) ? $_SESSION["game"] : null;

        $game->resetBitCoins();

        return (new Response())
            ->withStatus(301)
            ->withHeader("Location", url("/dice"));
    }
}

<?php

declare(strict_types=1);

namespace Jolf20\Controller;

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Jolf20\Dice\Game;
use Jolf20\Dice\DiceHand;
use Mos\Controller\ControllerTrait;

use function Mos\Functions\{
    renderView,
    url
};

/**
 * Controller for the game21 routes.
 */
class Game21
{
    use ControllerTrait;

    public function playGame(): ResponseInterface
    {

        $game = isset($_SESSION["game"]) ? $_SESSION["game"] : new Game();

        $data = $game->getData();

        $data["gameState"] = $game->getGameState();

        $body = renderView("layout/dice.php", $data);

        return $this->response($body);
    }

    public function setup(): ResponseInterface
    {
        $game = isset($_SESSION["game"]) ? $_SESSION["game"] : null;

        $playerHand = new DiceHand();

        $computerHand = new DiceHand();

        $nrOfDice = isset($_POST["dice"]) ? intval($_POST["dice"]) : 0;

        $typeOfDice = isset($_POST["diceType"]) ? $_POST["diceType"] : "text" ;

        $bet = isset($_POST["bet"]) ? intval($_POST["bet"]) : 0;

        $sides = isset($_POST["sides"]) ? intval($_POST["sides"]) : null;

        $game->setup($playerHand, $computerHand, $nrOfDice, $typeOfDice, $bet, $sides);

        return $this->redirect((url("/dice")));
    }

    public function playerRoll(): ResponseInterface
    {
        $game = isset($_SESSION["game"]) ? $_SESSION["game"] : null;

        $game->playerRoll();

        return $this->redirect((url("/dice")));
    }

    public function computerRoll(): ResponseInterface
    {
        $game = isset($_SESSION["game"]) ? $_SESSION["game"] : null;

        $game->computerRoll();

        return $this->redirect((url("/dice")));
    }

    public function playAgain(): ResponseInterface
    {
        $game = isset($_SESSION["game"]) ? $_SESSION["game"] : null;

        $game->playAgain();

        return $this->redirect((url("/dice")));
    }

    public function resetScore(): ResponseInterface
    {
        $game = isset($_SESSION["game"]) ? $_SESSION["game"] : null;

        $game->resetScore();

        return $this->redirect((url("/dice")));
    }

    public function resetBitcoins(): ResponseInterface
    {
        $game = isset($_SESSION["game"]) ? $_SESSION["game"] : null;

        $game->resetBitCoins();

        return $this->redirect((url("/dice")));
    }
}

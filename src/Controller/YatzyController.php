<?php

declare(strict_types=1);

namespace Jolf20\Controller;

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Jolf20\Dice\Yatzy as Yatzy;
use Jolf20\Dice\YatzyHand as YatzyHand;
use Jolf20\Dice\Scoreboard as Scoreboard;
use Jolf20\Dice\Scorebox as Scorebox;
use Jolf20\Dice\GraphicalDice as GraphicalDice;
use Mos\Controller\ControllerTrait;

use function Mos\Functions\{
    renderView,
    url
};

/**
 * Controller for the game21 routes.
 */
class YatzyController
{
    use ControllerTrait;

    public function playGame(): ResponseInterface
    {

        if (!isset($_SESSION["yatzy"])) {
            $playerHand = new YatzyHand();
            for ($i = 0; $i < 5; $i++) {
                $playerHand->addDice(new GraphicalDice());
            }

            $scoreboard = new Scoreboard();

            $scoreboard->addScorebox(new Scorebox("Ones"));
            $scoreboard->addScorebox(new Scorebox("Twos"));
            $scoreboard->addScorebox(new Scorebox("Threes"));
            $scoreboard->addScorebox(new Scorebox("Fours"));
            $scoreboard->addScorebox(new Scorebox("Fives"));
            $scoreboard->addScorebox(new Scorebox("Sixes"));

            $game = new Yatzy($playerHand, $scoreboard);
        }

        $game = $_SESSION["yatzy"];

        $data = $game->getData();

        $data["gameState"] = $game->getGameState();

        $body = renderView("layout/yatzy.php", $data);

        return $this->response($body);
    }

    public function playerRoll(): ResponseInterface
    {
        $game = isset($_SESSION["yatzy"]) ? $_SESSION["yatzy"] : null;

        $game->playerRoll();

        return $this->redirect((url("/yatzy")));
    }

    public function lockDice(): ResponseInterface
    {
        $lockedDice = $_POST["lockedDice"] ?? [];

        $positions = [];

        foreach ($lockedDice as $die) {
            $positions[] = intval($die);
        }

        $game = isset($_SESSION["yatzy"]) ? $_SESSION["yatzy"] : null;


        $game->lockDice($positions);

        return $this->redirect((url("/yatzy")));
    }

    public function lockScore(): ResponseInterface
    {
        $lockedScore = intval($_POST["lockScore"]);

        $game = isset($_SESSION["yatzy"]) ? $_SESSION["yatzy"] : null;

        $game->lockScore($lockedScore);

        return $this->redirect((url("/yatzy")));
    }

    public function newGame(): ResponseInterface
    {

        $game = isset($_SESSION["yatzy"]) ? $_SESSION["yatzy"] : null;

        $game->newGame();

        return $this->redirect((url("/yatzy")));
    }

 /*    public function computerRoll(): ResponseInterface
    {
        $game = isset($_SESSION["game"]) ? $_SESSION["game"] : null;

        $game->computerRoll();

        return $this->redirect((url("/dice")));
    } */

/*     public function playAgain(): ResponseInterface
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
    } */
}

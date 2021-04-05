<?php

declare(strict_types=1);

namespace Jolf20\Dice;

use Jolf20\Dice\Dice;
use Jolf20\Dice\GraphicalDice;
use Jolf20\Dice\DiceHand;
use Jolf20\Dice\GraphicalDiceHand;

use function Mos\Functions\{
    redirectTo,
    renderView,
    sendResponse,
    url
};

/**
 * Class Game (controller)
 */
class Game
{
    private string $gameState = "";
    private string $diceType = "";
    private $playerHand = null;
    private $computerHand = null;
    private int $playerTotal = 0;
    private int $computerTotal = 0;
    private int $playerWins = 0;
    private int $computerWins = 0;
    private int $computerBitCoin = 0;
    private int $playerBitCoin = 0;
    private int $bet =  0;
    private int $maxBet = 0;
    private array $data = [
        "header" => "Dice",
        "message" => "The dice game!",
    ];

    public function __construct(int $computerBitCoin = 100, int $playerBitCoin = 10)
    {
        $this->computerBitCoin = $computerBitCoin;
        $this->playerBitCoin = $playerBitCoin;
        $this->maxBet = intval($this->playerBitCoin / 2);
        $this->data["maxBet"] = $this->maxBet;
        $this->data["computerBitCoin"] = $this->computerBitCoin;
        $this->data["playerBitCoin"] = $this->playerBitCoin;
        $_SESSION["game"] = $this;
        $this->gameState = "setup";
    }

  /*   public function getGameState(): string
    {
        return $this->gameState;
    }

    public function setGameState(string $state): void
    {
        $this->gameState = $state;
    }
 */
    public function setup(int $nrOfDice, string $diceType, int $bet, int $sides = null): void
    {
        $this->diceType = $diceType;
        $this->bet = $bet;

        if ($this->diceType === "text") {
            $this->playerHand = new DiceHand($nrOfDice, $sides);
            $this->computerHand = new DiceHand($nrOfDice, $sides);
        } elseif ($this->diceType === "graphical") {
            $this->playerHand = new GraphicalDiceHand($nrOfDice);
            $this->computerHand = new GraphicalDiceHand($nrOfDice);
        }

        $this->data["playerRoll"] = null;
        $this->data["sumPlayerRoll"] = null;
        $this->data["playerTotal"] = null;
        $this->data["playerRollGraphicRep"] = null;
        $this->data["playerRollHistory"] = null;
        $this->data["playerRollGraphicHistory"] = null;

        $this->data["computerRoll"] = null;
        $this->data["sumComputerRoll"] = null;
        $this->data["computerTotal"] = null;
        $this->data["computerRollGraphicRep"] = null;
        $this->data["computerRollHistory"] = null;
        $this->data["computerRollGraphicHistory"] = null;
        $this->data["twentyOne"] = null;

        $this->gameState = "playerTurn";
    }

    public function playerRoll(): void
    {
        $this->playerHand->roll();

        $this->data["playerRoll"] = $this->playerHand->lastRollString();

        $this->data["playerRollHistory"] = $this->playerHand->getHistoryString();

        $this->playerHand->sumLastRoll();

        $this->data["sumPlayerRoll"] = $this->playerHand->getSum();

        $this->playerTotal += $this->playerHand->getSum();

        $this->data["playerTotal"] = $this->playerTotal;

        if ($this->diceType === "graphical") {
            $this->data["playerRollGraphicRep"] = $this->playerHand->getGraphRep();
            $this->data["playerRollGraphicHistory"] = $this->playerHand->getGraphRepHistory();
        } else {
            $this->data["playerRollGraphicRep"] = null;
            $this->data["playerRollGraphicHistory"] = null;
        }

        if ($this->playerTotal === 21) {
            //$this->gameState = "gameOver";
            $this->data["twentyOne"] = "Congratulations you got 21!";
            //$this->playerWins ++;
            //$this->playerBitCoin += $this->bet;
            //$this->computerBitCoin -= $this->bet;
            //$this->data["computerWins"] = $this->computerWins;
            //$this->data["playerWins"] = $this->playerWins;
            //$this->data["playerBitCoin"] = $this->playerBitCoin;
            //$this->data["computerBitCoin"] = $this->computerBitCoin;

            //$this->broke();
        }

        if ($this->playerTotal > 21) {
            $this->gameState = "gameOver";
            $this->data["result"] = "You bust - computer won!";
            $this->computerWins ++;
            $this->playerBitCoin -= $this->bet;
            $this->computerBitCoin += $this->bet;
            $this->data["computerWins"] = $this->computerWins;
            $this->data["playerWins"] = $this->playerWins;
            $this->data["playerBitCoin"] = $this->playerBitCoin;
            $this->data["computerBitCoin"] = $this->computerBitCoin;

            $this->broke();
        }
    }

    public function computerRoll(): void
    {
        while ($this->computerTotal < $this->playerTotal && $this->computerTotal <= 21) {
            $this->computerHand->roll();

            $this->data["computerRoll"] = $this->computerHand->lastRollString();

            $this->data["computerRollHistory"] = $this->computerHand->getHistoryString();

            $this->computerHand->sumLastRoll();

            $this->data["sumComputerRoll"] = $this->computerHand->getSum();

            $this->computerTotal += $this->computerHand->getSum();

            $this->data["computerTotal"] = $this->computerTotal;

            if ($this->diceType === "graphical") {
                $this->data["computerRollGraphicRep"] = $this->computerHand->getGraphRep();
                $this->data["computerRollGraphicHistory"] = $this->computerHand->getGraphRepHistory();
            } else {
                $this->data["computerRollGraphicRep"] = null;
            }

            $this->gameState = "computerTurn";
        }

        if ($this->computerTotal <= 21 && $this->computerTotal >= $this->playerTotal) {
            $this->data["result"] = "Computer won!";
            $this->computerWins ++;
            $this->playerBitCoin -= $this->bet;
            $this->computerBitCoin += $this->bet;
        } else {
            $this->data["result"] = "Player won!";
            $this->playerWins ++;
            $this->playerBitCoin += $this->bet;
            $this->computerBitCoin -= $this->bet;
        }

        $this->data["computerWins"] = $this->computerWins;
        $this->data["playerWins"] = $this->playerWins;
        $this->data["playerBitCoin"] = $this->playerBitCoin;
        $this->data["computerBitCoin"] = $this->computerBitCoin;
        $this->broke();
        $this->gameState = "gameOver";
    }

    public function playAgain(): void
    {
        $this->gameState = "setup";
        $this->diceType = "";
        $this->playerHand = null;
        $this->computerHand = null;
        $this->playerTotal = 0;
        $this->computerTotal = 0;
        $this->maxBet = intval($this->playerBitCoin / 2);
        $this->data = [
            "header" => "Dice",
            "message" => "The dice game!",
        ];

        $this->data["maxBet"] = $this->maxBet;
    }

    public function broke(): void
    {
        if ($this->computerBitCoin <= 0) {
            $this->data["broke"] = "Computer broke - please reset bitcoins";
        } elseif ($this->playerBitCoin <= 0) {
            $this->data["broke"] = "Player broke - please reset bitcoins";
        } else {
            $this->data["broke"] = null;
        }
    }

    public function resetScore(): void
    {
        $this->playerWins = 0;
        $this->computerWins = 0;
        $this->data["computerWins"] = $this->computerWins;
        $this->data["playerWins"] = $this->playerWins;
    }

    public function resetBitCoins(): void
    {
        $this->playerBitCoin = 10;
        $this->computerBitCoin = 100;
        $this->data["computerBitCoin"] = $this->computerBitCoin;
        $this->data["playerBitCoin"] = $this->playerBitCoin;
        $this->data["broke"] = null;
    }

    public function playGame(): void
    {
        $this->data["gameState"] = $this->gameState;

       //var_dump($this->data);

        $body = renderView("layout/dice.php", $this->data);
        sendResponse($body);
    }
}

<?php

declare(strict_types=1);

require __DIR__ . "/../../vendor/autoload.php";

use Jolf20\Dice\Dice;
use Jolf20\Dice\GraphicalDice;
use Jolf20\Dice\DiceHand;
use Jolf20\Dice\GraphicalDiceHand;

$die = new Dice();

for ($i = 0; $i < 9; $i++) {
    $die->roll();
    echo $die->getLastRoll() . ", ";
}


/* $diceHand = new DiceHand(5);

$diceHand->roll();

echo $diceHand->getLastRoll();

$graphicalDiceHand = new GraphicalDiceHand(2);

$graphicalDiceHand->roll();

echo $graphicalDiceHand->getLastRoll();

echo $graphicalDiceHand->getGraphRep();
 */

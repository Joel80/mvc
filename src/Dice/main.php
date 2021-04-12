<?php

declare(strict_types=1);

require __DIR__ . "/../../vendor/autoload.php";

use Jolf20\Dice\Dice2;
use Jolf20\Dice\GraphicalDice2;
use Jolf20\Dice\DiceHand2;
use Jolf20\Dice\YatzyHand;
use Jolf20\Dice\GraphicalDiceHand;
use Jolf20\Dice\Scorebox;
use Jolf20\Dice\Scoreboard;


/* $result = [];
$stringResult = [];
$hand = new YatzyHand();

$hand->addDice(new GraphicalDice2());
$hand->addDice(new GraphicalDice2());
$hand->addDice(new GraphicalDice2());
$hand->addDice(new GraphicalDice2());
$hand->addDice(new GraphicalDice2());

//$hand->addDice(new Dice2);

$scoreboard = new Scoreboard();

$scoreboard->addScorebox(new Scorebox("1"));
$scoreboard->addScorebox(new Scorebox("2"));
$scoreboard->addScorebox(new Scorebox("3"));
$scoreboard->addScorebox(new Scorebox("4"));
$scoreboard->addScorebox(new Scorebox("5"));
$scoreboard->addScorebox(new Scorebox("6"));

$scoreboard->getScoreboxes();

$scoreboard->setScore(0, 5);

$scoreboard->lockScorebox(0);

$scoreboard->setScore(0, 1);

$scoreboard->unlockScoreBox(0);

$scoreboard->setScore(0, 2);


for ($i = 0; $i < count($scoreboard->getScoreboxes()); $i++) {
    echo ($scoreboard->getScoreboxName($i) . " ");
    if ($scoreboard->getScoreboxScore($i)) {
        echo ($scoreboard->getScoreboxScore($i));
    } else {
        echo "NULL";
    }

    echo "\n";
}

echo $scoreboard->calculateTotalScore(); */



/* $hand->initLockedDice();

echo "First roll\n";
$result=$hand->roll();


foreach ($result as $value) {
    echo $value . "\n";
};

$stringResult = $hand->getLastRollAsStrings();


foreach ($stringResult as $string) {
    echo $string . "\n";
};


$hand->lockDice(0);


echo "Second roll\n";
$result=$hand->roll();


foreach ($result as $value) {
    echo $value . "\n";
};

$stringResult = $hand->getLastRollAsStrings();


foreach ($stringResult as $string) {
    echo $string . "\n";
};
 */



/* echo "Third roll\n";
$result=$hand->roll();


foreach ($result as $value) {
    echo $value . "\n";
};

$stringResult = $hand->getLastRollAsStrings();


foreach ($stringResult as $string) {
    echo $string . "\n";
};


echo "Fourth roll\n";
$result=$hand->roll();


foreach ($result as $value) {
    echo $value . "\n";
};

$stringResult = $hand->getLastRollAsStrings();


foreach ($stringResult as $string) {
    echo $string . "\n";
};

$result=$hand->roll();


foreach ($result as $value) {
    echo $value . "\n";
};

$stringResult = $hand->getLastRollAsStrings();


foreach ($stringResult as $string) {
    echo $string . "\n";
};

 */
/* $die2 = new GraphicalDice2();

$roll = $die2->roll();

echo $roll;

$string = $die2->rollAsString();

echo $string;
 */

/* $die = new Dice();

for ($i = 0; $i < 9; $i++) {
    $die->roll();
    echo $die->getLastRoll() . ", ";
}
 */

/* $diceHand = new DiceHand(5);

$diceHand->roll();

echo $diceHand->getLastRoll();

$graphicalDiceHand = new GraphicalDiceHand(2);

$graphicalDiceHand->roll();

echo $graphicalDiceHand->getLastRoll();

echo $graphicalDiceHand->getGraphRep();
 */

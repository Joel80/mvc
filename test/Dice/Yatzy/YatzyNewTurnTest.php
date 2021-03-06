<?php

declare(strict_types=1);

namespace Jolf20\Dice;

use PHPUnit\Framework\TestCase;
use Jolf20\Dice\Yatzy;
use Jolf20\Dice\YatzyHand;

/**
 * Test cases for the Yatzy class
 */

class YatzyNewTurnTest extends TestCase
{

    /**
     * Test that the newRound method resets rounds to 0.
     */
    public function testNewTurnRoundsToZero()
    {
        $hand = new YatzyHand();
        for ($i = 0; $i < 5; $i++) {
            $hand->addDice(new GraphicalDice());
        }

        $scoreboard = new Scoreboard();

        $scoreboard->addScorebox(new Scorebox("Ones"));
        $scoreboard->addScorebox(new Scorebox("Twos"));
        $scoreboard->addScorebox(new Scorebox("Threes"));
        $scoreboard->addScorebox(new Scorebox("Fours"));
        $scoreboard->addScorebox(new Scorebox("Fives"));
        $scoreboard->addScorebox(new Scorebox("Sixes"));

        $yatzy = new Yatzy($hand, $scoreboard);

        $yatzy->lockScore(0);

        $data = $yatzy->getData();

        $exp = 0;

        $actual = $data["rounds"];

        $this->assertEquals($exp, $actual);
    }
}

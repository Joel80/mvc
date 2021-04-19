<?php

declare(strict_types=1);

namespace Jolf20\Dice;

use PHPUnit\Framework\TestCase;
use Jolf20\Dice\Yatzy;
use Jolf20\Dice\YatzyHand;

/**
 * Test cases for the Yatzy class
 */

class YatzyLockScoreTest extends TestCase
{

    /**
     * Try to execute the newRound method, turn is not over.
     * Triggers new round.
     */
    public function testLockScore()
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

        $lockedScores = $data["lockedScores"];

        $exp = [true, false, false, false, false, false];

        $actual = $lockedScores;

        $this->assertEquals($exp, $actual);
    }

    /**
     * Try to execute the newRound method, turn is over.
     * Triggers end game.
     */
    public function testLockScoreLockAll()
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

        for ($i = 0; $i < 6; $i++) {
            $yatzy->playerRoll();
            $yatzy->playerRoll();
            $yatzy->playerRoll();
            $yatzy->lockScore($i);
        }
        /* $yatzy->lockScore(0);

        $yatzy->lockScore(1); */

        $data = $yatzy->getData();

        $lockedScores = $data["lockedScores"];

        $exp = [true, true, true, true, true, true];

        $actual = $lockedScores;

        //var_dump($data);
        $this->assertEquals($exp, $actual);
    }
}

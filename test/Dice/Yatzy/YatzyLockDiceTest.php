<?php

declare(strict_types=1);

namespace Jolf20\Dice;

use PHPUnit\Framework\TestCase;
use Jolf20\Dice\Yatzy;
use Jolf20\Dice\YatzyHand;

/**
 * Test cases for the Yatzy class
 */

class YatzyLockDiceTest extends TestCase
{

    /**
     * Try to execute the getGameState method.
     */
    public function testYatzyLockDice()
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

        $yatzy->lockDice(array(0));

        $data = $yatzy->getData();

        $lockedDice = $data["lockedDice"];

        $exp = true;

        $actual = $lockedDice[0];

        $this->assertEquals($exp, $actual);
    }

        /**
     * Try to execute the getGameState method.
     */
    public function testYatzyLockDiceAllLocked()
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

        $yatzy->playerRoll();

        //$hand->lockDice(0);

        $positions = array(0, 1, 2, 3, 4);

        $yatzy->lockDice($positions);

        $data = $yatzy->getData();

        $lockedDice = $data["lockedDice"];

        $exp = [true, true, true, true, true];

        $actual = $lockedDice;

        $this->assertEquals($exp, $actual);

        $this->assertEquals($data["gameState"], "scoring");
    }
}

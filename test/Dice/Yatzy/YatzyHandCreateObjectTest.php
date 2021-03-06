<?php

declare(strict_types=1);

namespace Jolf20\Dice;

use PHPUnit\Framework\TestCase;
use Jolf20\Dice\Dice;
use Jolf20\Dice\GraphicalDice;
use Jolf20\Dice\YatzyHand;

/**
 * Test cases for the YatzyHand class
 */

class YatzyHandCreateObjectTest extends TestCase
{

    /**
     * Try to create the object without arguments.
     */
    public function testCreateYatzyHandObject()
    {
        $hand = new YatzyHand();

        $this->assertInstanceOf("\Jolf20\Dice\YatzyHand", $hand);

        $nrOfDice = $hand->getNrOfDice();

        $expNrOfDice = 0;

        $this->assertEquals($nrOfDice, $expNrOfDice);

        $dices = $hand->getDices();

        $this->assertEmpty($dices);

        $sum = $hand->getSum();

        $expSum = 0;

        $this->assertEquals($sum, $expSum);

        $result = $hand->getLastRoll();

        $this->assertEmpty($result);

        $history = $hand->getHistory();

        $this->assertEmpty($history);

        $rollAsStrings = $hand->getLastRollAsStrings();

        $this->assertEmpty($rollAsStrings);

        $historyStrings = $hand->getHistoryStrings();

        $this->assertEmpty($historyStrings);

        $lockedDice = $hand->getLockedDice();

        $this->assertEmpty($lockedDice);
    }
}

<?php

declare(strict_types=1);

namespace Jolf20\Dice;

/* use function Mos\Functions\{
    destroySession,
    redirectTo,
    renderView,
    renderTwigView,
    sendResponse,
    url
};
 */
/**
 * Class Dice Hand
 */
class DiceHand
{
    /**
     * @var array $dices stores the dice
     * @var int $sum stores the sum of the roled dice
     */
    protected array $dices = [];
    protected ?int $sum = 0;
    protected array $result = [];
    protected array $history = [];

    /**
     * Constructor
     * @param int $size the size of the hand
     */
    public function __construct(int $size = 1, int $sides = 6)
    {
        for ($i = 0; $i < $size; $i++) {
            $this->dices[$i] = new Dice($sides);
        }
    }

    /**
     * Rolls the hand sums the values
     */
   /*  public function roll2(): void
    {
        $len = count($this->dices);

        $this->sum = 0;

        for($i = 0; $i < $len; $i++) {
           $this->sum += $this->dices[$i]->roll();
        }
    }
 */
    /**
     * Rolls the hand
     * @return array $result An array with the rolled results
     */
    public function roll(): array
    {
        $len = count($this->dices);

        for ($i = 0; $i < $len; $i++) {
            $this->dices[$i]->roll();
            $this->result [$i] = $this->dices[$i]->getLastRoll();
            $this->history [] = $this->dices[$i]->getLastRoll();
        }

        return $this->result;
    }

    /**
     * Sums the last roll of the hand
     */
    public function sumLastRoll(): void
    {
        $len = count($this->dices);
        $this->sum = 0;

        for ($i = 0; $i < $len; $i++) {
            $this->sum += $this->dices[$i]->getLastRoll();
        }
    }

     /**
     * Returns an array with last roll of the hand
     * @return array $result The result of the last roll
     */
    public function getLastRoll(): array
    {
        return $this->result;
    }

     /**
     * Returns an int holding the sum of the last roll of the hand
     * @return int $sum The sum of the last roll
     */
    public function getSum(): int
    {
        return $this->sum;
    }

    /**
     * Returns the  result of the last rolled hand
     * as a comma separated string
     * @return string A comma separated string with last
     * roll of the hand
     */
    public function lastRollString(): string
    {
        $string = implode(",", $this->result);

        return $string;
    }

    /**
     * Returns the  result of all rolled hands
     * as a comma separated string
     * @return string A comma separated string with last
     * roll of the hand
     */
    public function getHistoryString(): string
    {
        $string = implode(", ", $this->history);

        return $string;
    }
}

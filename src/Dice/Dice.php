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
 * Class Dice
 */
class Dice
{
    /**
     * @var ?int $roll Stores the last roll of the die
     * @var int $sides Stores the number of sides of the die
     */
    protected ?int $roll = null;
    private int $sides;
    /**
     * Constructor
     *
     * @param int $sides The number of sides of the die
     */
    public function __construct(int $sides = 6)
    {
        $this->sides = $sides;
    }

    /**
     * Rolls the die
     *
     * @return int $this->roll (the value of $roll)
     */

    public function roll(): int
    {
        $this->roll = rand(1, $this->sides);

        return $this->roll;
    }

    /**
     * Returns the value of $roll (last roll)
     * @return int $this->roll (the value of roll)
     */
    public function getLastRoll(): int
    {

        return $this->roll;
    }
}

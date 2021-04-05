<?php

namespace Jolf20\Dice;

/**
 * A class for a graphicaldice
 */
class GraphicalDice extends Dice
{
    /**
     * Constant to hold the number of sides of the dice
     */
    const SIDES = 6;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(self::SIDES);
    }

    /**
     * graphicDice
     * @return string  represents a "graphic die roll"
     */
    public function graphicDice()
    {
        return "dice-" . $this->roll;
    }
}

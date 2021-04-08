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
     * Returns a die in the form of a string
     * which can be used as e.g. a CSS-classname
     * @return string
     */
    public function graphicDice()
    {
        return "dice-" . $this->roll;
    }
}

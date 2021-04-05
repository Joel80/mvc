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
 * Class GrahicalDiceHand
 */
class GraphicalDiceHand extends DiceHand
{
    private array $graphicDice;
    private array $graphicDiceHistory;

    /**
     * Constructor
     * @param int $size the size of the hand
     */
    public function __construct(int $size = 1)
    {
        for ($i = 0; $i < $size; $i++) {
            $this->dices[$i] = new GraphicalDice();
        }
    }

    /**
     * Returns an array of strings with last roll of the hand
     * also stores this roll in $this->grapicDiceHistory
     * @return array graphicDice array of strings representing last roll
     */
    public function getGraphRep(): array
    {
        $len = count($this->dices);

        for ($i = 0; $i < $len; $i++) {
            $this->graphicDice [$i] = $this->dices[$i]->graphicDice();
            $this->graphicDiceHistory [] = $this->dices[$i]->graphicDice();
        }
        return $this->graphicDice;
    }

    /**
     *
     * @return array graphicDice array of strings representing all rolls
     */
    public function getGraphRepHistory(): array
    {
        return $this->graphicDiceHistory;
    }
}

<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

use function Mos\Functions\url;

$header = $header ?? null;
$message = $message ?? null;

//var_dump($_SESSION)


?><h1><?= $header ?></h1>

<p><?= $message ?></p>

<?php if ($gameState === "setup") : ?>
    <form method ="post" action="<?= url("/dice-setup")?>">
    <p>Do you want to play with one or two dice?</p>
    <input type="radio" id="oneDie" name="dice" value="1">
    <label for="onedie">One die</label><br>
    <input type="radio" id="twoDice" name="dice" value="2" checked>
    <label for="twoDice">Two dice</label><br>

    <p>Do you want to play with text or graphical dice?</p>
    <input type="radio" id="textDice" name="diceType" value="text" onclick = "enableSides()">
    <label for="textDice">Text dice</label><br>
    <input type = "number" min = "1" max = "2000" id = "sides" value = 6 name = "sides" disabled>
    <label for="sides">Sides</label><br>
    <input type="radio" id="graphicalDice" name="diceType" value="graphical" checked>
    <label for="graphicalDice">Graphical dice</label><br>
    <input type = "number" min = "0" max = <?=$maxBet ?> id = "bet" name = "bet">
    <label for="bet">Place your bet</label><br>
    <input type = "submit" id="submit" name="doit" value = "Start game">
    </form>
<?php endif;?>

<?php if ($gameState === "playerTurn") : ?>
    <?php if ($twentyOne) : ?>
        <h2><?= $twentyOne ?></h2>
    <?php endif;?>
    <form method ="post" action="<?= url("/dice-player-roll")?>">
    <input type = "submit" id="submit" name="doit" value = "Roll">
    </form>
    
    <form method ="post" action="<?= url("/dice-player-stop")?>">
    <input type = "submit" id="submit" name="doit" value = "Stop">
    </form>

    <?php if ($playerRoll) : ?>
    <p>Player-roll:</p>
    <p><?= $playerRoll?> = <?=$sumPlayerRoll ?></p>
    <?php endif;?>

    <?php if ($playerRollGraphicRep) : ?>
        <p>
        <?php foreach ($playerRollGraphicRep as $value) : ?>
            <i class="dice-sprite <?= $value ?>"></i>
        <?php endforeach; ?>
        </p>
    <?php endif;?>
    
    <?php if ($playerRoll) : ?>
    <p>Player total:</p>
    <p><?=$playerRollHistory?> = <?= $playerTotal?></p>
    <?php endif;?>

    <?php if ($playerRollGraphicHistory) : ?>
        <p>
        <?php foreach ($playerRollGraphicHistory as $value) : ?>
            <i class="dice-sprite <?= $value ?>"></i>
        <?php endforeach; ?>
        </p>
    <?php endif;?>
    

<?php endif;?>

<?php if ($gameState === "computerTurn") : ?>
    <p>Player total:</p>
    <p><?=$playerRollHistory?> = <?= $playerTotal?></p>

    <?php if ($playerRollGraphicHistory) : ?>
        <p>
        <?php foreach ($playerRollGraphicHistory as $value) : ?>
            <i class="dice-sprite <?= $value ?>"></i>
        <?php endforeach; ?>
        </p>
    <?php endif;?>

    <p>Computer total:</p>
    <p><?=$computerRollHistory?> = <?= $computerTotal?></p>

    <?php if ($computerRollGraphicHistory) : ?>
        <p>
        <?php foreach ($computerRollGraphicHistory as $value) : ?>
            <i class="dice-sprite <?= $value ?>"></i>
        <?php endforeach; ?>
        </p>
    <?php endif;?>
<?php endif;?>

<?php if ($gameState === "gameOver") : ?>
    <h2><?=$result?></h2>
    <p>Player total:</p>
    <p><?=$playerRollHistory?> = <?= $playerTotal?></p>

    <?php if ($playerRollGraphicHistory) : ?>
        <p>
        <?php foreach ($playerRollGraphicHistory as $value) : ?>
            <i class="dice-sprite <?= $value ?>"></i>
        <?php endforeach; ?>
        </p>
    <?php endif;?>
    
    <?php if ($computerRollHistory) : ?>
    <p>Computer total:</p>
    
        <p><?=$computerRollHistory?> = <?= $computerTotal?></p>
    <?php endif;?>
    <?php if ($computerRollGraphicHistory) : ?>
        <p>
        <?php foreach ($computerRollGraphicHistory as $value) : ?>
            <i class="dice-sprite <?= $value ?>"></i>
        <?php endforeach; ?>
        </p>
    <?php endif;?>

    <p>Computer has won: <?=$computerWins?> times<p>
    <p>Player has won: <?=$playerWins?> times<p>

    <p>Player bitcoin = <?=$playerBitCoin ?>

    <p>Computer bitcoin = <?=$computerBitCoin ?>

    <?php if ($broke) : ?>
        <p><?=$broke ?>
    <?php endif; ?>
    
    <?php if (!$broke) : ?>
    <form method ="post" action="<?= url("/dice-play-again")?>">
    <input type = "submit" id="submit" name="doit" value = "Play again">
    </form>
    <?php endif; ?>

    <form method ="post" action="<?= url("/dice-reset-score")?>">
    <input type = "submit" id="submit" name="doit" value = "Reset score">
    </form>

    <form method ="post" action="<?= url("/dice-reset-bitcoins")?>">
    <input type = "submit" id="submit" name="doit" value = "Reset bitcoins">
    </form>
<?php endif;?>   


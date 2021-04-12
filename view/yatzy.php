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

<?php if ($gameState === "playerTurn") : ?>
    <p>Click roll to roll the dice. If you want to save a die or several dice, check the box beneath it and click Lock dice. If you lock all dice you will go to scoring.
        Otherwise you will go to scoring after three rounds.
    </p>
    <p>Rounds: <?=$rounds?> / 3</p>
    <form method ="post" action="<?= url("/yatzy/player-roll")?>">
    <input type = "submit" id="submit" name="doit" value = "Roll">
    </form>

    <?php if ($playerRoll) : ?>
        <p>
        <?php foreach ($playerRoll as $value) : ?>
            <i class="dice-sprite <?= $value ?>"></i>
        <?php endforeach; ?>
        </p>
    <?php endif;?>

    <?php if ($rounds > 0) : ?>
        <form class="lock-dice" method ="post" action="<?= url("/yatzy/lock-dice")?>">
        <?php for ($i = 0; $i < $handSize; $i++) : ?>
            <input type="checkbox" name="lockedDice[]" value= "<?= $i ?>" <?= $lockedDice[$i] ? "checked" : "" ?>>
        <?php endfor ?>
        <br>
        <input type = "submit" id="submit" name="doit" value = "Lock dice">
        </form>
        
    <?php endif;?>
    
    <h3>Scoreboard</h3>
    <?php for ($i = 0; $i < count($scoreboxNames); $i++) : ?>
        <p><?= $scoreboxNames[$i] . " = " . $scoreboxScores[$i] ?></p>
    <?php endfor ?>
<?php endif ?>

<?php if ($gameState === "scoring") : ?>
    <h2>Time to score!</h2>
    <?php if ($playerRoll) : ?>
        <p>
        <?php foreach ($playerRoll as $value) : ?>
            <i class="dice-sprite <?= $value ?>"></i>
        <?php endforeach; ?>
        </p>
    <?php endif;?>
    <h2>Scoreboard</h2>
    <?php for ($i = 0; $i < count($scoreboxNames); $i++) : ?>
        <form method ="post" action="<?= url("/yatzy/lock-score")?>">
        <p><?= $scoreboxNames[$i] . " = " . $scoreboxScores[$i] ?></p>
        <?php if (!$lockedScores[$i]) : ?>
        <input type="hidden" name="lockScore" value= "<?=$i ?>">
        <input type = "submit" id="submit" name="doit" value = "Lock score">
        <?php endif ?>
        </form>
    <?php endfor ?>
<?php endif;?>

<?php if ($gameState === "gameOver") : ?>
    <h2>Game over!</h2>
    <?php for ($i = 0; $i < count($scoreboxNames); $i++) : ?>
        <form method ="post" action="<?= url("/yatzy/lock-score")?>">
        <p><?= $scoreboxNames[$i] . " = " . $scoreboxScores[$i] ?></p>
        </form>
    <?php endfor ?>
    <h3>Bonus: <?= $bonus ?>
    <h3>Total score: <?= $totalScore ?></h3>
<?php endif;?>

<hr>
<form method ="post" action="<?= url("/yatzy/new-game")?>">
        <br>
        <input type = "submit" id="submit" name="doit" value = "New game">
</form>


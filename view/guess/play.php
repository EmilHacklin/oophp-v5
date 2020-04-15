<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?>
<h1>Guess my number (session)</h1>

<p>
    Guess a number between 1 and 100, you have <?= $tries ?> tries left.
</p>

<form action="<?= dirname($_SERVER['REQUEST_URI']) . "/make-guess" ?>" method="post">
    <fieldset>
        <input type="text" name="guess" pattern="[0-9]{1,3}" title="A number between 1-100" autofocus required />
        <input type="submit" name="doGuess" value="Make a guess" />
        <input type="submit" formaction="<?= dirname($_SERVER['REQUEST_URI']) . "/do-reset" ?>" name="doReset" value="Reset game" formnovalidate />
        <input type="submit" formaction="<?= dirname($_SERVER['REQUEST_URI']) . "/do-cheat" ?>" name="doCheat" value="Cheat" formnovalidate />
    </fieldset>
</form>

<?php if ($res) : ?>
    <p>
        Your guess <?= $guess ?> is <b><?= $res ?></b>
    </p>
<?php endif; ?>

<?php if ($doCheat) : ?>
    <p>
        CHEAT: Current number is <?= $number ?>.
    </p>
<?php endif; ?>

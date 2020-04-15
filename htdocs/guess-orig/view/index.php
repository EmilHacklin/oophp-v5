<!doctype html> <!--Informing what kind of a document this is-->
<html lang="sv"> <!--Setting the language of the website to swedish-->
    <head>
        <meta charset="utf-8"> <!--Setting the charset to utf-8-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0">
        <title>Guess_my_number</title> <!--The tile of the page-->
    </head>
    <body>
        <h1>Guess my number (session)</h1>

        <p>
            Guess a number between 1 and 100, you have <?= $game->tries(); ?> tries left.
        </p>

        <?php
        if (basename($_SERVER['REQUEST_URI']) !== basename(dirname(__DIR__))) {
            $uri = dirname($_SERVER['REQUEST_URI']);
        } else {
            $uri = dirname($_SERVER['REQUEST_URI']) . "/guess";
        }
        ?>

        <form action="<?= $uri . "/post_process.php" ?>"  method="post">
            <fieldset>
                <input type="text" name="guess" pattern="[0-9]{1,3}" title="A number between 1-100" autofocus required />
                <input type="submit" name="doGuess" value="Make a guess" />
                <input type="submit" name="doInit" value="Reset game" formnovalidate />
                <input type="submit" name="doCheat" value="Cheat" formnovalidate />
                <input type="hidden" name="csrfk" value="guessgame" />
            </fieldset>
        </form>

        <?php if ($doGuess) : ?>
            <p>
                Your guess <?= $guess ?> is <b><?= $res ?></b>
            </p>
        <?php endif; ?>

        <?php if ($doCheat) : ?>
            <p>
                CHEAT: Current number is <?= $game->number() ?>.
            </p>
        <?php endif; ?>

        <!-- Debugging tool -->
        <?php //require_once(__DIR__ . "/debug.php") ?>
    </body>
</html>

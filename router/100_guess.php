<?php
/**
* Create routes using $app programming style.
*/
//var_dump(array_keys(get_defined_vars()));



/**
* Init the guessing game and redirect to play the game
*/
$app->router->get("guess/init", function () use ($app) {
    // Init the session for the gamestart.
    $game = new EMHD13\Guess\Guess();
    $_SESSION["number"] = $game->number();
    $_SESSION["tries"] = $game->tries();
    // Redirect to play the game.
    return $app->response->redirect("guess/play");
});



/**
* Play the game - show game status
*/
$app->router->get("guess/play", function () use ($app) {
    //
    $title = "Play the game";

    // Get current settings from the session
    $guess = $_SESSION["guess"] ?? null;
    $doCheat = $_SESSION["doCheat"] ?? null;
    $number = $_SESSION["number"] ?? null;
    $tries = $_SESSION["tries"] ?? null;
    $res = $_SESSION["res"] ?? null;

    // Reset the sesion settings
    $_SESSION["doCheat"] = null;
    $_SESSION["res"] = null;

    // If number is false because a session timeout
    if (!$number) {
        // Reset the game
        return $app->response->redirect("guess/init");
    }

    // Send data to page
    $data = [
        "guess" => $guess,
        "doCheat" => $doCheat,
        "number" => $number,
        "tries" => $tries,
        "res" => $res,
    ];

    $app->page->add("guess/play", $data);

    // Debug code
    //$app->page->add("guess/debug");

    return $app->page->render([
        "title" => $title,
    ]);
});

/**
* Play the game - make a guess
*/
$app->router->post("guess/make-guess", function () use ($app) {
    // Get incoming variables from post
    $guess = $_POST["guess"] ?? null;
    $doGuess = $_POST["doGuess"] ?? null;

    // Get current settings from the session
    $number = $_SESSION["number"] ?? null;
    $tries = $_SESSION["tries"] ?? null;

    // If number is false because a session timeout
    if (!$number) {
        // Reset the game
        return $app->response->redirect("guess/init");
    }

    // If guess is made
    if ($doGuess) {
        // Do a guess
        $game = new EMHD13\Guess\Guess($number, $tries);
        $_SESSION["guess"] = $guess;
        $_SESSION["res"] = $game->makeGuess($guess);
        $_SESSION["tries"] = $game->tries();
    }

    return $app->response->redirect("guess/play");
});

/**
* Play the game - reset the game
*/
$app->router->post("guess/do-reset", function () use ($app) {
    // Reset the game
    return $app->response->redirect("guess/init");
});

/**
* Play the game - cheat
*/
$app->router->post("guess/do-cheat", function () use ($app) {
    // Show the secret number
    $_SESSION["doCheat"] = true;

    return $app->response->redirect("guess/play");
});

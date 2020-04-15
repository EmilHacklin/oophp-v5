<?php
/**
*
* Create a guessing game
* By Emil Hacklin for course oophp
* 2020-03-30
*
*/

require_once(__DIR__ . "/config.php");
require_once(__DIR__ . "/autoload.php");

/**
* Start an named session
*/
session_name("guessGame");
session_start();

// Deal with incoming variables
$guess = $_SESSION["guess"] ?? null;
$doInit = $_SESSION["doInit"] ?? null;
$doGuess = $_SESSION["doGuess"] ?? null;
$doCheat = $_SESSION["doCheat"] ?? null;

if ($doInit || !isset($_SESSION["game"])) {
    // Init the game
    $game = $_SESSION["game"] = new Guess();
} else {
    // Get game from session
    $game = $_SESSION["game"];
}

if ($doGuess) {
    // Do a guess
    $res = $game->makeGuess($guess);
    $_SESSION["game"] = $game;
}

// Render the page
require_once(__DIR__ . "/view/index.php");

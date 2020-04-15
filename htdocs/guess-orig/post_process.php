<?php
/**
*
* Process POST data
* By Emil Hacklin for course oophp
* 2020-03-30
*
*/

require_once(__DIR__ . "/config.php");

session_name("guessGame");
session_start();



if (array_key_exists("csrfk", $_POST)) {
    if ("guessgame" === $_POST["csrfk"]) {
        $_SESSION["guess"] = $_POST["guess"] ?? null;
        $_SESSION["doInit"] = $_POST["doInit"] ?? null;
        $_SESSION["doGuess"] = $_POST["doGuess"] ?? null;
        $_SESSION["doCheat"] = $_POST["doCheat"] ?? null;
        header("Location: index.php");
    }
}

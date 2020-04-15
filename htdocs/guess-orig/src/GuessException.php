<?php
/**
*
* Create GuessException for the Guess class
* By Emil Hacklin for course oophp
* 2020-03-30
*
*/



/**
* Exception class for GuessException
*/
class GuessException extends Exception
{
    /**
    * Constructor to create my custom exception
    */
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        session_name("guessGame");
        session_start();
        session_unset();
        session_destroy();
        parent::__construct($message, $code, $previous);
    }
}

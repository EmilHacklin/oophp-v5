<?php
/**
*
* Create GuessException for the Guess class
* @author Emil Hacklin <emil.hacklin@gmail.com>
* 2020-04-07
*
*/

namespace EMHD13\Guess;

/**
* Exception class for GuessException
*/
class GuessException extends Exception
{
    /**
    * Constructor to create my custom exception
    *
    * @param string $message    Error message
    * @param int $code    Error code
    * @param Exception $previous    Previous exception
    */
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        // Nullify all session values used by the guessing game
        $_SESSION["guess"] = null;
        $_SESSION["doCheat"] = null;
        $_SESSION["number"] = null;
        $_SESSION["tries"] = null;
        $_SESSION["res"] = null;
        parent::__construct($message, $code, $previous);
    }
}

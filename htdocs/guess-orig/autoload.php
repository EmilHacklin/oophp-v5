<?php
/**
*
* Create an autoloader to load files as needed
* By Emil Hacklin for course oophp
* 2020-03-30
*
*/

/**
 * Autoloader for classes.
 *
 * @param string $class the name of the class.
 */
spl_autoload_register(function ($class) {
    //echo "$class<br>";
    $path = "src/{$class}.php";
    if (is_file($path)) {
        include($path);
    }
});

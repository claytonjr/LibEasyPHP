<?php

/**
 * LibString - A library of functions for working with strings. 
 * @author James Clayton <james.r.clayton@gmail.com>
 * @version 0.0.2
 * @copyright (c) 2013, James Clayton
 * @package LibString
 * @license http://opensource.org/licenses/ISC ISC License (ISC)
 */

class String {

    public function InStr($String, $Match, $Start = 1, $Direction = 'Forward') {
        $InStr = strpos($String, $Match, $Start);
        return $InStr;
    } 

    /**
     * LTrim() returns a string containing a copy of a specified string without leading spaces (LTrim()), trailing spaces (RTrim()), or both leading and trailing spaces (Trim()).
     * @param string $String Required. No default. String expression from which the characters are returned. If string contains null, null is returned.
     * @return string $Trim
     */

    public function LTrim($String) {
        $LTrim = ltrim($String);
        return $LTrim;
    }

    /**
     * RTrim() returns a string containing a copy of a specified string without leading spaces (LTrim()), trailing spaces (RTrim()), or both leading and trailing spaces (Trim()).
     * @param string $String Required. No default. String expression from which the characters are returned. If string contains null, null is returned.
     * @return string $Trim
     */

    public function RTrim($String) {
        $RTrim = rtrim($String);
        return $RTrim;
    }

    /**
     * Trim() returns a string containing a copy of a specified string without leading spaces (LTrim()), trailing spaces (RTrim()), or both leading and trailing spaces (Trim()).
     * @param string $String Required. No default. String expression from which the characters are returned. If string contains null, null is returned.
     * @return string $Trim
     */

    public function Trim($String) {
        $Trim = trim($String);
        return $Trim;
    }

    /**
     * Mid() will return a string containing a specified number of characters from the of a string.
     * @param string $String Required. No default. String expression from which the characters are returned. If string contains null, null is returned.
     * @param string $Length Required. Character position in string at which the part to be taken begins. If start is greater than the number of characters in string, Mid() returns a zero-length string ("").
     * @return string $Mid
     */

    public function Mid($String, $Start, $Length) {
        $Mid = substr($String, $Start, $Length); 
        return $Mid;
    }

    /**
     * Left() will return a string containing a specified number of characters from the left side of a string.
     * @param string $String Required. No default. String expression from which the leftmost characters are returned. If string contains null, null is returned.
     * @param string $Length Required. Numeric expression indicating how many characters to return. If 0, a zero-length string ("") is returned. If greater than or equal to the number of characters in string, the entire string is returned.
     * @return string $Left
     */

    public function Left($String, $Length) {
        $Left = substr($String, 0, $Length);
        return $Left;
    }

    /**
     * Right() will return a string containing a specified number of characters from the right side of a string.
     * @param string $String Required. No default. String expression from which the rightmost characters are returned. If string contains null, null is returned.
     * @param string $Length Required. Numeric expression indicating how many characters to return. If 0, a zero-length string ("") is returned. If greater than or equal to the number of characters in string, the entire string is returned.
     * @return string $Right
     */

    public function Right($String, $Length) {
        $Right = substr($String, -$Length);
        return $Right;
    }

    public function Len($String) {
        $Len = strlen($String);
        return $Len;
    }

    public function StringLength($String) {
        $StringLength = strlen($String);
        return $StringLength; 
    }

    /**
     * FormatString() will take a string and return the string in a few formats. 
     * @param string $String Required. No default. String displayed 
     * @param string $Format Optional. Default is PCase. Options are UCase, LCase, or PCase. Please see LCase(), UCase(), and PCase() for more details.  
     * @return string
     * 
     * <code>
     *  echo(FormatString('Hello, World!', 'LCase')); 
     *  Will return 'hello, world!'
     * </code>
     */

    public function FormatString($String, $Format = 'PCase') {
        if($Format == 'UCase') {
           $String = UCase($String);
        } elseif($Format == 'LCase') {
           $String = LCase($String);
        } elseif($Format == 'PCase') {
           $String = PCase($String);
        } else {
           $String = PCase($String);
        } 

        return $String;
    }

    /**
     * LCase() will take a string and return a lower cased string. 
     * @param string $String Required. No default. 
     * @return string
     * 
     * <code>
     *  echo(LCase('Hello, world!'));
     *  Will return 'hello, world!'
     * </code>
     */

    public function LCase($String) {    
        $String = strtolower($String);
        return $String;
    }

    /**
     * PCase() will take a string and return a propper cased string. 
     * @param string $String Requird. No default. 
     * @return string
     *  
     * <code>
     *  echo(PCase('Hello, world!'));
     *  Will return 'Hello, World!'
     * </code>
     */

    public function PCase($String) {
        $String = ucwords($String);
        return $String;
    }

    /**
     * UCase will take a string and return a upper cased string. 
     * @param string $String Required. No default. 
     * @return string
     * 
     * <code>
     *  echo(UCase('Hello, world!'));
     *  Will return 'HELLO, WORLD'
     * </code>
     */

    public function UCase($String) {
        $String = strtoupper($String);
        return $String;
    }

    public function Money($Number, $Format) {
        $Money = money_format($Format, $Number);
        return $Money;
    }

}

?>

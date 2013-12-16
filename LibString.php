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
    /**
     * InStr() returns a number specifying the position of the first occurrence of one string within another. 
     * @param string $String Required. No default. String expression from which the characters are returned. If string contains null, null is returned.
     * @param string $Match Required. No default. String expression sought.
     * @param number $Start Optional. Default is 0. Starting position of the search. 
     * @param string $Direction Optional. Default is 'Forward'. Direction which search is performed. Options are 'Forward', or 'Reverse'.
     * @param boolean $Case Optional. Default is False. Options are False, or True
     * @return number $InStr
     */

    public function InStr($String, $Match, $Start = 0, $Direction = 'Forward', $Case = False) {
        if($Direction == 'Forward') {
            if($Case == False) {
                $InStr = stripos($String, $Match, $Start);
            } elseif($Case == True) {
                $InStr = strpos($String, $Match, $Start);
            } 
        } elseif($Direction == 'Reverse') {
            if($Case == False) {
                $InStr = strripos($String, $Match, $Start);
            } elseif($Case == True) {
                $InStr = strrpos($String, $Match, $Start);
            }
        }

        return $InStr;
    } 

    public function InStrFwd($String, $Match, $Start = 0, $Case = False) {
        if($Case == False) {
            $InStrFwd = stripos($String, $Match, $Start);
            $Success = True;
        } elseif($Case == True) {
            $InStrFwd = strpos($String, $Match, $Start);
            $Success = True;
        } else {
            $InStrFwd = Null;
            $Success = False;
        }

        return array(
            'Output' => $InStrFwd, 
            'Success' => $Success
        );
    }

    public function InStrRev($String, $Match, $Start = -1, $Case = False) {
        if($Case == False) {
            $InStrRev = strripos($String, $Match, $Start);
            $Success = True; 
        } elseif($Case == True) {
            $InStrRev = strrpos($String, $Match, $Start);
            $Success = True;
        } else {
            $InStrRev = Null;
            $Success = False;
        }

        return array(
            'Output' => $InStrRev,
            'Success' => $Success
        );
    }

    /**
     * LTrim() returns a string containing a copy of a specified string without leading spaces (LTrim()), trailing spaces (RTrim()), or both leading and trailing spaces (Trim()).
     * @param string $String Required. No default. String expression from which the characters are returned. If string contains null, null is returned.
     * @return string $LTrim
     */

    public function LTrim($String) {
        $LTrim = ltrim($String);
        return $LTrim;
    }

    /**
     * RTrim() returns a string containing a copy of a specified string without leading spaces (LTrim()), trailing spaces (RTrim()), or both leading and trailing spaces (Trim()).
     * @param string $String Required. No default. String expression from which the characters are returned. If string contains null, null is returned.
     * @return string $RTrim
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
     * @param number $Start Optional. Default is 0. The starting position for the search. 
     * @param number $Length Required. Character position in string at which the part to be taken begins. If start is greater than the number of characters in string, Mid() returns a zero-length string ("").
     * @return string $Mid
     */

    public function Mid($String, $Start = 0, $Length) {
        $Mid = substr($String, $Start, $Length); 
        return $Mid;
    }

    /**
     * Left() will return a string containing a specified number of characters from the left side of a string.
     * @param string $String Required. No default. String expression from which the leftmost characters are returned. If string contains null, null is returned.
     * @param number $Length Required. Numeric expression indicating how many characters to return. If 0, a zero-length string ("") is returned. If greater than or equal to the number of characters in string, the entire string is returned.
     * @return string $Left
     */

    public function Left($String, $Length) {
        $Left = substr($String, 0, $Length);
        return $Left;
    }

    /**
     * Right() will return a string containing a specified number of characters from the right side of a string.
     * @param string $String Required. No default. String expression from which the rightmost characters are returned. If string contains null, null is returned.
     * @param number $Length Required. Numeric expression indicating how many characters to return. If 0, a zero-length string ("") is returned. If greater than or equal to the number of characters in string, the entire string is returned.
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
     */

    public function LCase($String) {    
        $String = strtolower($String);
        return $String;
    }

    /**
     * PCase() will take a string and return a propper cased string. 
     * @param string $String Requird. No default. 
     * @return string
     */

    public function PCase($String) {
        $String = ucwords($String);
        return $String;
    }

    /**
     * UCase will take a string and return a upper cased string. 
     * @param string $String Required. No default. 
     * @return string
     */

    public function UCase($String) {
        $String = strtoupper($String);
        return $String;
    }

    public function Money($Number, $Format) {
        $Money = money_format($Format, $Number);
        return $Money;
    }

    public function CharacterCount($String) {
        $CharacterCount = strlen($String);
        return $CharacterCount;
    }

    public function WordCount($String) {
        $WordCount = str_word_count($String);
        return $WordCount;
    }

    public function Rot13($String) {
        $Rot13 = str_rot13($String);
        return $Rot13;
    }

    public function Replace($SearchFor, $ReplaceWith, $String) {
        $Replace = str_replace($SearchFor, $ReplaceWith, $String);
        return $Replace;
    }

    public function StringShuffle($String) {
        $StringShuffle = str_shuffle($String);
        return $StringShuffle;
    }

    public function Shuffle($String) {
        $StringShuffle = str_shuffle($String);
        return $StringShuffle;
    }
}

?>

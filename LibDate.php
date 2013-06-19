<?php

/**
 * LibDate - A library of functions for working with dates and times. 
 * @author James Clayton <james.r.clayton@gmail.com>
 * @version 0.0.1
 * @copyright (c) 2013, James Clayton
 * @package LibDate
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 */

class Date {
    
    /**
     * DateDiff() will return the difference between two dates in days. 
     * @param date $StartDate Required. No default. 
     * @param date $EndDate Required. No default. 
     * @param string $DateFormat Optional. Default is Days. Acceptable input is Days, Months, and Years. 
     * @return number
     * 
     * <code>
     *  echo(DateDiff('2013-05-31', '2013-06-01'));
     *  Will return 1
     * </code>
     */

    public function DateDiff($StartDate, $EndDate, $DateFormat = 'Days') {
        $StartDateTS = strtotime($StartDate);
        $EndDateTS = strtotime($EndDate);
        $DateDiffTS = $EndDateTS - $StartDateTS;
        
        if($DateFormat == 'Days') {
            $DateDiff = round($DateDiffTS / 86400);
        } elseif($DateFormat == 'Months') {
            $DateDiff = round(($DateDiffTS / 86400) / 30);
        } elseif($DateFormat == 'Years') {
            $DateDiff = round(($DateDiffTS / 86400) / 365);
        } else {
            $DateDiff = round($DateDiffTS / 86400);
        }

        return $DateDiff;
    }

    /**
     * Today() will print the current date, in a few formats. 
     * @param date $DateFormat Optional. Default is Short. Acceptable input is Long, Short, and Now. 
     * @return date
     * 
     * <code>
     *  echo(Today('Short'));
     *  Will return 2013-06-03. 
     * </code>
     */

    public function Today($DateFormat = 'Short') {
        if($DateFormat == 'Long') {
            $Today = date("Y-m-d H:i:s");
        } elseif($DateFormat == 'Short') {
            $Today = date("Y-m-d");
        } elseif($DateFormat == 'Now') {
            $Today = date("Y-m-d H:i:s");
        }

        return $Today;
    }

    /**
     * Now() will print the current date and time. It is tne same as Today('Now');
     * @return date $Now 
     * 
     * <code>
     *  echo(Now());
     *  Will return 2013-06-04 01:08:15. 
     * </code>
     */

    public function Now() {
        $Now = date("Y-m-d H:i:s");
        return $Now;
    }

}

?>

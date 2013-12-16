<?php

/**
 * LibDate - A library of functions for working with dates and times. 
 * @author James Clayton <james.r.clayton@gmail.com>
 * @version 0.0.1
 * @copyright (c) 2013, James Clayton
 * @package LibDate
 * @license http://opensource.org/licenses/ISC ISC License (ISC)
 */

class Date {
    
    public function Format($Date, $DateFormat = 'yyyy-mm-dd') {
        if($DateFormat == 'yyyy-mm-dd') {
            $Format = date('Y-m-d', strtotime($Date));
        } else {
            $Format = date('Y-m-d', strtotime($Date));
        } 

        return $Format;
    }

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
            $DateDiff = round($DateDiffTS / 86400, 5);
        } elseif($DateFormat == 'Months') {
            $DateDiff = round(($DateDiffTS / 86400) / 30, 5);
        } elseif($DateFormat == 'Years') {
            $DateDiff = round(($DateDiffTS / 86400) / 365, 5);
        } elseif($DateFormat == 'Hours') {
            $DateDiff = round(($DateDiffTS / 3600), 5);
        } elseif($DateFormat == 'Minutes') {
            $DateDiff = round(($DateDiffTS / 60), 5);
        } elseif($DateFormat == 'Seconds') {
            $DateDiff = $DateDiffTS;
        } else {
            $DateDiff = round($DateDiffTS / 86400, 5);
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

    public function DateFormat($Date, $DateFormat = 'Long') {
        if($DateFormat == 'Short') {
            $DateFormatOut = date("Y-m-d", $Date);
        } elseif($DateFormat =
             'Long') {
            $DateFormatOut = date("Y-m-d H:i:s", $Date);
        } else {
            $DateFormatOut = date("Y-m-d H:i:s", $Date);
        }
        return $DateFormatOut;
    }

}

?>

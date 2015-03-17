<?php

/**
 * LibDate - A library of functions for working with dates and times. 
 * @author James Clayton <james.r.clayton@gmail.com>
 * @version 0.0.1
 * @copyright (c) 2013, James Clayton
 * @package LibDate
 * @license http://opensource.org/licenses/ISC ISC License (ISC)
 */

/**
 * 2013-06-01 Initial file creation. -JRC
 * 2014-01-27 Added extra documentation. -JRC
 * 2014-01-30 Clean up the file, et al. -JRC
 * 2014-01-31 Added DatePart. -JRC
 */

class Date {

    /**
     * The DatePart() function returns a portion of the date, based upon the request of the $Mask.   
     * @param Date $Date Required. The date to be filtered. 
     * @param String $Mask Required. The options are Year, Month, Day, Hour, Minute, Second. 
     * @return Date $DatePart Returns a portion of the date, based upon the request of the $Mask.
     */
    
    public function DatePart($Date, $Mask) {
        if(strtolower($Mask) == 'year') {
            $DatePart = date('Y', strtotime($Date));
        } elseif(strtolower($Mask) == 'month') {
            $DatePart = date('m', strtotime($Date));
        } elseif(strtolower($Mask) == 'day') {
            $DatePart = date('d', strtotime($Date));
        } elseif(strtolower($Mask) == 'hour') {
            $DatePart = date('H', strtotime($Date));
        } elseif(strtolower($Mask) == 'minute') {
            $DatePart = date('i', strtotime($Date));
        } elseif(strtolower($Mask) == 'second') {
            $DatePart = date('s', strtotime($Date));
        } else {
            die('Error: Cound not determine the value of $Mask');
        }
        return $DatePart;
    }

    public function Format($Date, $DateFormat = 'yyyy-mm-dd') {
        if($DateFormat == 'yyyy-mm-dd') {
            $Format = date('Y-m-d', strtotime($Date));
        } elseif($DateFormat == 'Short') {
            $Format = date("Y-m-d");
        } elseif($DateFormat == 'Now') {
            $Format = date("Y-m-d H:i:s");
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
     */

    public function Now() {
        $Now = date("Y-m-d H:i:s");
        return $Now;
    }

    public function DateFormat($Date, $DateFormat = 'Long') {
        if($DateFormat == 'Short') {
            $DateFormatOut = date("Y-m-d", $Date);
        } elseif($DateFormat == 'Long') {
            $DateFormatOut = date("Y-m-d H:i:s", $Date);
        } else {
            $DateFormatOut = date("Y-m-d H:i:s", $Date);
        }
        return $DateFormatOut;
    }

}

?>

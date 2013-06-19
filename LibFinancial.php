<?php

/**
 * LibFinancial - A library of functions for working with financial. 
 * @author James Clayton <james.r.clayton@gmail.com>
 * @version 0.0.1
 * @copyright (c) 2013, James Clayton
 * @package LibFinancial
 * @license http://opensource.org/licenses/ISC ISC License (ISC)
 */

class Financial {
  
	/**
     * Mortgage() returns a number, how much a mortgage will cost. 
     * @param number $Apr Required. No default. The annual percentage rate of the loan. 
     * @param number $Payments Required. No default. The number of monthly payments. 360 for 30 year loan. 
     * @param number $PresentValue Required. No default. Present value, or principle of the loan. 
     * @param number $FutureValue Required. No default. Future value of the loan. 
     * @param number $Precision Required. No default. Precision you with to round to. 
     * @return string $Mortgage
     */

	public function Mortgage($Apr, $Payments, $PresentValue, $FutureValue, $Precision) {
		if($Apr != 0) {
			$Alpha = 1 / (1 + $Apr / 12);
			$RetVal = round($PresentValue * (1 - $Alpha) / $Alpha / (1 - pow($Alpha, $Payments)), $Precision);
		} else {
			$RetVal = round($PresentValue / $Payments, $Precision);	
		}
		return $RetVal;
	}

	public function FutureValue($Rate, $Periods, $PresentValue) {
		$FutureValue = $PresentValue * (pow((1 + $Rate), $Periods));
		return $FutureValue;
	}

	public function Fv($Rate, $Periods, $PresentValue) {
		$FutureValue = $PresentValue * (pow((1 + $Rate), $Periods));
		return $FutureValue;
	}

	public function PresentValue($Rate, $Periods, $FutureValue) {
		$PresentValue = $FutureValue / (pow((1 + $Rate), $Periods));
		return $PresentValue;
	}

	public function Pv($Rate, $Periods, $FutureValue) {
		$PresentValue = $FutureValue / (pow((1 + $Rate), $Periods));
		return $PresentValue;
	}

	public function CompoundInterest($Principle, $Rate, $Periods) {
		$CompoundInterest = $Principle * (pow((1 + $Rate), $Periods) - 1);
		return $CompoundInterest;
	}

	public function CInterest($Principle, $Rate, $Periods) {
		$CompoundInterest = $Principle * (pow((1 + $Rate), $Periods) - 1);
		return $CompoundInterest;
	}

	public function SimpleInterest($Principle, $Rate, $Periods) {
		$SimpleInterest = ($Principle * $Rate * $Periods);
		return $SimpleInterest;
	}

	public function SInterest($Principle, $Rate, $Periods) {
		$SimpleInterest = ($Principle * $Rate * $Periods);
		return $SimpleInterest;
	}

	public function Apy($Rate, $Periods) {
		$Apy = (pow((1 + $Rate / $Periods), $Periods) - 1);
		return $Apy;
	}
}

?>

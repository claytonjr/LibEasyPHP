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

	/**
	 * FutureValue() returns the future value of an investment based on periodic, constant payments and a constant interest rate. Alias for Fv(). 
	 * @param number $Rate Required. Rate is the interest rate per period. For example, if you obtain an automobile loan at a 10 percent annual interest rate and make monthly payments, your interest rate per month is 10%/12, or 0.83%. You would enter 10%/12, or 0.83%, or 0.0083, into the formula as the rate. 
	 * @param number $Periods Required. Periods is the total number of payment periods in an annuity. For example, if you get a four-year car loan and make monthly payments, your loan has 4*12 (or 48) periods. You would enter 48 into the formula for periods. 
	 * @param number $PresentValue Optional. Default is 0. Pv is the present value, or the lump-sum amount that a series of future payments is worth right now. If pv is omitted, it is assumed to be 0 (zero), and you must include the pmt argument.
	 * @return number $FutureValue Returns the future value of an investment based on periodic, constant payments and a constant interest rate.
	 */

	public function FutureValue($Rate, $Periods, $PresentValue = 0) {
		$FutureValue = $PresentValue * (pow((1 + $Rate), $Periods));
		return $FutureValue;
	}

	/**
	 * Fv() returns the future value of an investment based on periodic, constant payments and a constant interest rate. Alias for FutureValue(). 
	 * @param number $Rate Required. Rate is the interest rate per period. For example, if you obtain an automobile loan at a 10 percent annual interest rate and make monthly payments, your interest rate per month is 10%/12, or 0.83%. You would enter 10%/12, or 0.83%, or 0.0083, into the formula as the rate. 
	 * @param number $Periods Required. Periods is the total number of payment periods in an annuity. For example, if you get a four-year car loan and make monthly payments, your loan has 4*12 (or 48) periods. You would enter 48 into the formula for periods. 
	 * @param number $PresentValue Optional. Default is 0. Pv is the present value, or the lump-sum amount that a series of future payments is worth right now. If pv is omitted, it is assumed to be 0 (zero), and you must include the pmt argument.
	 * @return number $FutureValue Returns the future value of an investment based on periodic, constant payments and a constant interest rate.
	 */

	public function Fv($Rate, $Periods, $PresentValue) {
		$FutureValue = $PresentValue * (pow((1 + $Rate), $Periods));
		return $FutureValue;
	}

	/**
	 * PresentValue() returns the present value of an investment. The present value is the total amount that a series of future payments is worth now. For example, when you borrow money, the loan amount is the present value to the lender. Alias for Pv(). 
	 * @param number $Rate Required. Rate is the interest rate per period. For example, if you obtain an automobile loan at a 10 percent annual interest rate and make monthly payments, your interest rate per month is 10%/12, or 0.83%. You would enter 10%/12, or 0.83%, or 0.0083, into the formula as the rate. 
	 * @param number $Periods Required. Periods is the total number of payment periods in an annuity. For example, if you get a four-year car loan and make monthly payments, your loan has 4*12 (or 48) periods. You would enter 48 into the formula for periods. 
	 * @param number $FutureValue Required. Future Value is the future value, or a cash balance you want to attain after the last payment is made. If fv is omitted, it is assumed to be 0 (the future value of a loan, for example, is 0). For example, if you want to save $50,000 to pay for a special project in 18 years, then $50,000 is the future value. You could then make a conservative guess at an interest rate and determine how much you must save each month. If fv is omitted, you must include the pmt argument.
	 * @return number $PresentValue Returns the present value of an investment. The present value is the total amount that a series of future payments is worth now. For example, when you borrow money, the loan amount is the present value to the lender.
	 */

	public function PresentValue($Rate, $Periods, $FutureValue) {
		$PresentValue = $FutureValue / (pow((1 + $Rate), $Periods));
		return $PresentValue;
	}

	/**
	 * Pv() Returns the present value of an investment. The present value is the total amount that a series of future payments is worth now. For example, when you borrow money, the loan amount is the present value to the lender. Alias for PresentValue(). 
	 * @param number $Rate Required. Rate is the interest rate per period. For example, if you obtain an automobile loan at a 10 percent annual interest rate and make monthly payments, your interest rate per month is 10%/12, or 0.83%. You would enter 10%/12, or 0.83%, or 0.0083, into the formula as the rate. 
	 * @param number $Periods Required. Periods is the total number of payment periods in an annuity. For example, if you get a four-year car loan and make monthly payments, your loan has 4*12 (or 48) periods. You would enter 48 into the formula for periods. 
	 * @param number $FutureValue Required. Future Value is the future value, or a cash balance you want to attain after the last payment is made. If fv is omitted, it is assumed to be 0 (the future value of a loan, for example, is 0). For example, if you want to save $50,000 to pay for a special project in 18 years, then $50,000 is the future value. You could then make a conservative guess at an interest rate and determine how much you must save each month. If fv is omitted, you must include the pmt argument.
	 * @return number $PresentValue Returns the present value of an investment. The present value is the total amount that a series of future payments is worth now. For example, when you borrow money, the loan amount is the present value to the lender.
	 */

	public function Pv($Rate, $Periods, $FutureValue) {
		$PresentValue = $FutureValue / (pow((1 + $Rate), $Periods));
		return $PresentValue;
	}

	/**
	 * The CompoundInterest() formula calculates the amount of interest earned on an account or investment where the amount earned is reinvested. By reinvesting the amount earned, an investment will earn money based on the effect of compounding. Compounding is the concept that any amount earned on an investment can be reinvested to create additional earnings that would not be realized based on the original principal, or original balance, alone. The interest on the original balance alone would be called simple interest. The additional earnings plus simple interest would equal the total amount earned from compound interest.
	 * @param number $Principle Required. No default. The principle, or original balance. 
	 * @param number $Rate Required. No default. The interest rate per period. 
	 * @param number $Period. Required. No default. Number of periods. For example, if an account is compounded monthly, then one month would be one period. Likewise, if the account is compounded daily, then one day would be one period and the rate and number of periods would accommodate this.
	 * @return number $PresentValue Returns the present value of an investment. The present value is the total amount that a series of future payments is worth now. For example, when you borrow money, the loan amount is the present value to the lender.
	 */

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

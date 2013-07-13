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
	 * FutureValue() returns the future value of an investment based on periodic, constant payments and a constant interest rate. 
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
	 * FutureValueOfAnnuity() The future value of an annuity formula is used to calculate what the value at a future date would be for a series of periodic payments.
	 *
	 * The future value of an annuity formula assumes that:
	 * 1. The rate does not change
	 * 2. The first payment is one period away
	 * 3. The periodic payment does not change
	 *
	 * If the rate or periodic payment does change, then the sum of the future value of each individual cash flow would need to be calculated to determine the future value of the annuity. If the first cash flow, or payment, is made immediately, the future value of annuity due formula would be used.
	 *
	 * Example of Future Value of an Annuity Formula:
	 *An example of the future value of an annuity formula would be an individual who decides to save by depositing $1000 into an account per year for 5 years. The first deposit would occur at the end of the first year. If a deposit was made immediately, then the future value of annuity due formula would be used. The effective annual rate on the account is 2%. If she would like to determine the balance after 5 years, she would apply the future value of an annuity formula to get the following equation
	 *
	 * $1000.00 ((1 + 0.02) ^ 5) - 1 / 0.02)
	 *
	 * The balance after the 5th year would be $5204.04.
	 * @param number $Rate Required. Rate is the interest rate per period.
	 * @param number $Periods Required. Periods is the total number of payment periods in an annuity. 
	 * @param number $Payments Required. Payment for the period. 
	 * @return number $FutureValueOfAnnuity The future value of an annuity formula is used to calculate what the value at a future date would be for a series of periodic payments.
	 */

	public function FutureValueOfAnnuity($Rate, $Periods, $Payments) {
		$FutureValueOfAnnuity = $Payments * ((pow((1 + $Rate), $Periods ) - 1) / $Rate);
		return $FutureValueOfAnnuity;
	}

	/**
	 * PresentValue() returns the present value of an investment. The present value is the total amount that a series of future payments is worth now. For example, when you borrow money, the loan amount is the present value to the lender. 
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
	 * The CompoundInterest() formula calculates the amount of interest earned on an account or investment where the amount earned is reinvested. By reinvesting the amount earned, an investment will earn money based on the effect of compounding. Compounding is the concept that any amount earned on an investment can be reinvested to create additional earnings that would not be realized based on the original principal, or original balance, alone. The interest on the original balance alone would be called simple interest. The additional earnings plus simple interest would equal the total amount earned from compound interest. 
	 * @param number $Rate Required. No default. The interest rate per period. 
	 * @param number $Periods. Required. No default. Number of periods. For example, if an account is compounded monthly, then one month would be one period. Likewise, if the account is compounded daily, then one day would be one period and the rate and number of periods would accommodate this.
	 * @param number $Principle Required. No default. The principle, or original balance. 
	 * @return number $CompoundInterest
	 */

	public function CompoundInterest($Rate, $Periods, $Principle) {
		$CompoundInterest = $Principle * (pow((1 + $Rate), $Periods) - 1);
		return $CompoundInterest;
	}

	/**
	 * SimpleInterest(): The simple interest formula is used to calculate the interest accrued on a loan or savings account that has simple interest. The simple interest formula is fairly simple to compute and to remember as principal times rate times time. An example of a simple interest calculation would be a 3 year saving account at a 10% rate with an original balance of $1000. By inputting these variables into the formula, $1000 times 10% times 3 years would be $300. Simple interest is money earned or paid that does not have compounding. Compounding is the effect of earning interest on the interest that was previously earned. As shown in the previous example, no amount was earned on the interest that was earned in prior years. As with any financial formula, it is important that rate and time are appropriately measured in relation to one another. If the time is in months, then the rate would need to be the monthly rate and not the annual rate. Alias of SInterest()
	 * @param number $Rate Required. No default. The interest rate per period. 
	 * @param number $Periods. Required. No default. Number of periods. For example, if an account is compounded monthly, then one month would be one period. Likewise, if the account is compounded daily, then one day would be one period and the rate and number of periods would accommodate this.
	 * @param number $Principle Required. No default. The principle, or original balance. 
	 * @return number $SimpleInterest 
	 */

	public function SimpleInterest($Rate, $Periods, $Principle) {
		$SimpleInterest = ($Principle * $Rate * $Periods);
		return $SimpleInterest;
	}

	/**
	 * SimpleInterestEndingBalance() The ending balance, or future value, of an account with simple interest can be calculated using the following formula: $SimpleInterestEndingBalance = $Principle * (1 + ($Rate * $Periods)); Using the prior example of a $1000 account with a 10% rate, after 3 years the balance would be $1300. This can be determined by multiplying the $1000 original balance times [1+(10%)(3)], or times 1.30. Instead of using this alternative formula, the amount earned could be simply added to the original balance to find the ending balance. Still using the prior example, the calculation of the formula that is on the top of the page showed $300 of interest. By adding $300 to the original amount of $1000, the result would be $1300. Alias of Sieb().
	 * @param number $Rate Required. No default. The interest rate per period. 
	 * @param number $Periods. Required. No default. Number of periods. For example, if an account is compounded monthly, then one month would be one period. Likewise, if the account is compounded daily, then one day would be one period and the rate and number of periods would accommodate this.
	 * @param number $Principle Required. No default. The principle, or original balance. 
	 * @return number $SimpleInterestEndingBalance 
	 */

	public function SimpleInterestEndingBalance($Rate, $Periods, $Principle) {
		$SimpleInterestEndingBalance = $Principle * (1 + ($Rate * $Periods));
		return $SimpleInterestEndingBalance;
	}

	/**
	 * The Annual Percentage Yield (APY), referenced as the effective annual rate in Finance, is the rate of interest that is earned when taking into consideration the effect of compounding.
	 *
	 * There are various terms used when compounding is not considered including nominal interest rate, stated annual interest rate, and annual percentage rate(APR).
	 *
	 * In the formula, the stated interest rate is shown as r. A bank may show this as simply "interest rate". The annual percentage yield formula would be applied to determine what the effective yield would be if the account was compounded given the stated rate. The n in the annual percentage yield formula would be the number of times that the financial institution compounds. For example, if a financial institution compounds the account monthly, n would equal 12. 
	 *
	 * Example of Annual Percentage Yield: An account states that its rate is 6% compounded monthly. The rate, or r, would be .06, and the number of times compounded would be 12 as there are 12 months in a year. After simplifying, the annual percentage yield is shown as 6.168%.
	 * @param number $Rate Required. No default. The interest rate per period. 
	 * @param number $Periods. Required. No default. Number of periods. For example, if an account is compounded monthly, then one month would be one period. Likewise, if the account is compounded daily, then one day would be one period and the rate and number of periods would accommodate this.
	 * @return number $Apy 
	 */

	public function Apy($Rate, $Periods) {
		$Apy = (pow((1 + $Rate / $Periods), $Periods) - 1);
		return $Apy;
	}
}

?>

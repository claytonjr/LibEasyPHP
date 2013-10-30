<?php

/**
 * LibMath - A library of functions for working with math. 
 * @author James Clayton <james.r.clayton@gmail.com>
 * @version 0.0.1
 * @copyright (c) 2013, James Clayton
 * @package LibMath
 * @license http://opensource.org/licenses/ISC ISC License (ISC)
 */

class Math {
  
	/**
	 * The Count() function will count all elements in an array, or something in an object.
	 * @param array $Array Required. No default. 
	 * @return number $Count 
	 */

	public function Count($Array) {
		if(isset($Array)) {
			$Count = count($Array);
			return $Count;
		}	
	}

	/**
	 * The EuclideanDistance() function will give the distance between two x,y cords. Alias for Ed().
	 * @param number $Cord_X_1 Required. No default. 
	 * @param number $Cord_Y_1 Required. No default. 
	 * @param number $Cord_X_2 Required. No default. 
	 * @param number $Cord_Y_2 Required. No default. 
	 * @return number $EuclideanDistance 
	 */

	public function EuclideanDistance($Cord_X_1, $Cord_Y_1, $Cord_X_2, $Cord_Y_2) {
		$EuclideanDistance = $this->SqRt($this->Square($Cord_X_1 - $Cord_X_2) + $this->Square($Cord_Y_1 - $Cord_Y_2));
		return $EuclideanDistance;
	}

	/**
	 * The Ed() function will give the distance between two x,y cords. Alias for EuclideanDistance().
	 * @param number $Cord_X_1 Required. No default. 
	 * @param number $Cord_Y_1 Required. No default. 
	 * @param number $Cord_X_2 Required. No default. 
	 * @param number $Cord_Y_2 Required. No default. 
	 * @return number $EuclideanDistance 
	 */

	public function Ed($Cord_X_1, $Cord_Y_1, $Cord_X_2, $Cord_Y_2) {
		$EuclideanDistance = $this->SqRt($this->Square($Cord_X_1 - $Cord_X_2) + $this->Square($Cord_Y_1 - $Cord_Y_2));
		return $EuclideanDistance;
	}

	/**
	 * The Square() function will square a given number. Alias of Sqr()
	 * @param number $Number Required. No default. 
	 * @return number $Square 
	 */

	public function Square($Number) {
		$Square = $Number * $Number;
		return $Square;
	}

	/**
	 * The Sqr() function will square a given number. Alias of Square().
	 * @param number $Number Required. No default. 
	 * @return number $Square 
	 */

	public function Sqr($Number) {
		$Square = $Number * $Number;
		return $Square;
	}

	/**
	 * The Absolute() function returns the absolute value of a number. Alias of Abs().
	 * @param number $Number Required. No default. If the number is of type float, the return type is also float, otherwise it is integer.
	 * @return number $Abs If the number is of type float, the return type is also float, otherwise it is integer.
	 */


	public function Absolute($Number) {
		$Absolute = abs($Number);
		return $Absolute;
	}

	/**
	 * The Abs() function returns the absolute value of a number. Alias of Absolute().
	 * @param number $Number Required. No default. If the number is of type float, the return type is also float, otherwise it is integer.
	 * @return number $Abs If the number is of type float, the return type is also float, otherwise it is integer.
	 */


	public function Abs($Number) {
		$Abs = abs($Number);
		return $Abs;
	}


	/**
	 * The Ceil() function returns the value of a number rounded up to the nearest integer. Alias of RoundUp().
	 * @param number $Number Required. No default. 
	 * @return number $Ceiling 
	 */

	public function Ceil($Number) {
		$Ceil = ceil($Number);
		return $Ceil;
	}

	/**
	 * The RoundUp() function returns the value of a number rounded up to the nearest integer. Alias of Ceil().
	 * @param number $Number Required. No default. 
	 * @return number $RoundUp 
	 */

	public function RoundUp($Number) {
		$RoundUp = ceil($Number);
		return $RoundUp;
	}

	/**
	 * The Cos() function returns a numeric value between -1 and 1, which represents the cosine of the angle.
	 * @param number $Number Required. No default. 
	 * @return number $Cos 
	 */

	public function Cos($Number) {
		$Cos = cos($Number);
		return $Cos;
	}

	/**
	 * The Floor() function returns the value of a number rounded down to the nearest integer. Alias of RoundDown().
	 * @param number $Number Required. No default. 
	 * @return number $Floor 
	 */

	public function Floor($Number) {
		$Floor = floor($Number);
		return $Floor;
	}

	/**
	 * The RoundDown() function returns the value of a number rounded down to the nearest integer. Alias of Floor().
	 * @param number $Number Required. No default. 
	 * @return number $RoundDown 
	 */

	public function RoundDown($Number) {
		$RoundDown = floor($Number);
		return $RoundDown;
	}

	/**
	 * The IsFinite() function returns true if the specified value is a finite number, otherwise it returns false. The value is finite if it is within the allowed range for a PHP float on this platform.
	 * @param number $Number Required. No default. 
	 * @return boolean  
	 */

	public function IsFinite($Number) {
		$IsFinite = is_finite($Number);
		
		if($IsFinite == 1) {
			return True;
		} else {
			return False;
		}
	}

	/**
	 * The IsInfinite() function returns true if the specified value is an infinite number, otherwise it returns false. The value is infinite if it is too big to fit into a PHP float on this platform.
	 * @param number $Number Required. No default. 
	 * @return boolean 
	 */

	public function IsInfinite($Number) {
		$IsInfinite = is_infinite($Number);

		if($IsInfinite == 1) {
			return True;
		} else {
			return False;
		}
	}

	/**
	 * The IsNaN() function returns true if the specified value is not a number, otherwise it returns false.
	 * @param number $Number Required. No default. 
	 * @return boolean 
	 */

	public function IsNaN($Number) {
		$IsNaN = is_nan($Number);

		if($IsNaN == 1) {
			return True;
		} else {
			return False;
		}
	}

	/**
	 * The Log() function returns the natural logarithm (base E) of a number.
	 * @param number $Number Required. No default. If the parameter is negative, -1.#IND is returned. If the parameter is negative, 0.#INF is returned.
	 * @param number $Base Optional. No default. If the base parameter is specified, Log() returns log base x.
	 * @return number $Log 
	 */

	public function Log($Number, $Base) {
		$Log = log($Number, $Base);
		return $Log; 
	}

	/**
	 * The Max() function returns the number with the highest value of two specified numbers.
	 * @param number $Number_1 Required. No default. 
	 * @param number $Number_2 Required. No default. 
	 * @return number $Max 
	 */

	public function Max($Number_1, $Number_2) {
		$Max = max($Number_1, $Number_2);
		return $Max;
	}

	/**
	 * The Min() function returns the number with the lowest value of two specified numbers.
	 * @param number $Number_1 Required. No default. 
	 * @param number $Number_2 Required. No default. 
	 * @return number $Min 
	 */

	public function Min($Number_1, $Number_2) {
		$Min = min($Number_1, $Number_2);
		return $Min;
	}

	/**
	 * The Pi() function returns the value of PI.
	 * @return number $Pi 
	 */

	public function Pi() {
		$Pi = pi();
		return $Pi;
	}

	/**
	 * The Power() function raises the first argument to the power of the second argument, and returns the result. See Pow() also. 
	 * @param number $Number_1 Required. No default. Specifies the number to be raised. 
	 * @param number $Number_2 Required. No default. The power to which to raise the number. 
	 * @return number $Power 
	 */

	public function Power($Number_1, $Number_2) {
		$Power = pow($Number_1, $Number_2);
		return $Power;
	}

	/**
	 * The Pow() function raises the first argument to the power of the second argument, and returns the result. See Power() also. 
	 * @param number $Number_1 Required. No default. Specifies the number to be raised. 
	 * @param number $Number_2 Required. No default. The power to which to raise the number. 
	 * @return number $Power 
	 */

	public function Pow($Number_1, $Number_2) {
		$Pow = pow($Number_1, $Number_2);
		return $Pow;
	}

	/**
	 * The Random() function generates a random integer. If this function is called without parameters, it returns a random integer between 0 and RAND_MAX. If you want a random number between 10 and 100 (inclusive), use Random(10,100). On some platforms (such as Windows) RAND_MAX is only 32768. 
	 * @param number $Minimum Required. No default. 
	 * @param number $Maximum Required. No default. 
	 * @return number $Random 
	 */

	public function Random($Minimum, $Maximum) {
		$Random = mt_rand($Minimum, $Maximum);
		return $Random;
	}

	/**
	 * The Round() function rounds a number to the nearest integer.
	 * @param number $Number Required. No default. The number to be rounded. 
	 * @param number $Precision Optional. Default is 2. The number of digits after the decimal point. 
	 * @return number $Round 
	 */

	public function Round($Number, $Precision = 2) {
		$Round = round($Number, $Precision);
		return $Round;
	}

	/**
	 * The Sin() function returns the sine of a number. The Sin() function returns a numeric value between -1 and 1, which represents the sine of the parameter.
	 * @param number $Number Required. No default. 
	 * @return number $Sin 
	 */

	public function Sin($Number) {
		$Sin = sin($Number); 
		return $Sin;
	}

	/**
	 * The SqRt() function returns the square root of a number. Alias of SquareRoot().
	 * @param number $Number Required. No default. 
	 * @return number $SqRt 
	 */

	public function SqRt($Number) {
		$SqRt = sqrt($Number);
		return $SqRt;
	}

	/**
	 * The SquareRoot() function returns the square root of a number. Alias if SqRt().
	 * @param number $Number Required. No default. 
	 * @return number $SquareRoot 
	 */

	public function SquareRoot($Number) {
		$SquareRoot = sqrt($Number);
		return $SquareRoot;
	}

	/**
	 * The Tan() function returns a number that represents the tangent of an angle.
	 * @param number $Number Required. No default. 
	 * @return number $Tan 
	 */

	public function Tan($Number) {
		$Tan = tan($Number);
		return $Tan;
	}
}

?>

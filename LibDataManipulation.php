<?php

/**
 * LibDataManipulation - A library of functions for working with data. 
 * @author James Clayton <james.r.clayton@gmail.com>
 * @version 0.0.1
 * @copyright (c) 2013, James Clayton
 * @package LibDataManipulation
 * @license http://opensource.org/licenses/ISC ISC License (ISC)
 */

class DataManipulation {
	
	public function IsNumeric($Variable) {
		$IsNumeric = is_numeric($Variable);
		return $IsNumeric;
	}

	public function JsonDecode($Variable, $Array = True) {
		if($Array == True) {
			$JsonDecode = json_decode($Variable, True);
		} else {
			$JsonDecode = json_decode($Variable);
		}				
		return $JsonDecode;
	}

	public function JsonEncode($Variable, $PrettyPrint = False) {
		if($PrettyPrint == True) {
			$JsonEncode = json_encode($Variable, JSON_PRETTY_PRINT);
		} else {
			$JsonEncode = json_encode($Variable);
		}
		
		return $JsonEncode;
	}

	/**
	 * TypeCast() will take various forms of a variable, and type cast to another type. 
	 * @param various $Variable Required. No default. Variable to typecast. 
	 * @param string $DataType Optional. Default is String. Options are String, Integer, Boolean, Float, Object, Array, Binary, and Unset.  
	 * @return various $TypeCast
	 */

	public function TypeCast($Variable, $DataType = 'String') {
		if($DataType == 'String') {
			$TypeCast = (string) $Variable;
		} elseif($DataType == 'Integer') {
			$TypeCast = (int) $Variable;
		} elseif($DataType == 'Boolean') {
			$TypeCast = (bool) $Variable;
		} elseif($DataType == 'Float') {
			$TypeCast = (float) $Variable;
		} elseif($DataType == 'Double') {
			$TypeCast = (float) $Variable; 
		} elseif($DataType == 'Real') {
			$TypeCast = (float) $Variable;
		} elseif($DataType == 'Object') {
			$TypeCast = (object) $Variable;
		} elseif($DataType == 'Array') {
			$TypeCast = (array) $Variable;
		} else {
			$TypeCast = (string) $Variable;
		}

		return $TypeCast;
	}

	/**
	 * IsEmpty() will test if a variable is set, empty string, or null. Will return true if variable is not set, is empty string, or null. Will return false if variable is set, non-empty string, or is not null. 
	 * @param various $Variable Required. No default. Variable to test if set or not. 
	 * @return boolean $IsEmpty. Will return true if variable is not set, is empty string, or null. Will return false if variable is set, non-empty string, or is not null. 
	 */
	
	public function IsEmpty($Variable) {
		if(empty($Variable)) {
			$IsEmpty = True;
		} elseif(!isset($Variable)) {
			$IsEmpty = True;
		} elseif(is_null($Variable)) {
			$IsEmpty = True;
		} else {
			$IsEmpty = False;
		}

		return $IsEmpty;
	}

	public function MakeEmpty($Variable) {
		$MakeEmpty = '';
		return $MakeEmpty;
	}

	public function MakeNull($Variable) {
		$MakeNull = Null;
		return $MakeNull;
	}

	public function MakeUnset($Variable) {
		//$MakeUnset = unset($Variable);
		unset($Variable);
		//return $MakeUnset;
	}

	/**
	 * CBoolean() will type cast a given variable to a boolean state. 
	 * @param various $Variable Required. No default. Variable to be to be type cast to a boolean state. 
	 * @return boolean $CBoolean. Will return variable to an boolean state. 
	 */

	public function CBoolean($Variable) {
		$CBoolean = (bool) $Variable;
		return $CBoolean;
	}

	/**
	 * CString() will type cast a given variable to a string state. 
	 * @param various $Variable Required. No default. Variable to be to be type cast to a string state. 
	 * @return string $CString. Will return variable to an string state. 
	 */

	public function CString($Variable) {
		$CString = (string) $Variable;
		return $CString;
	}

	/**
	 * CInteger() will type cast a given variable to a integer state. Alias of CInt().
	 * @param various $Variable Required. No default. Variable to be to be type cast to a integer state. 
	 * @return integer $CInteger. Will return variable to an integer state. 
	 */

	public function CInteger($Variable) {
		$CInteger = (int) $Variable;
		return $CInteger;
	}

	/**
	 * CInt() will type cast a given variable to a integer state. Alias of CInteger().
	 * @param various $Variable Required. No default. Variable to be to be type cast to a integer state. 
	 * @return integer $CInteger. Will return variable to an integer state. 
	 */

	public function CInt($Variable) {
		$CInteger = (int) $Variable;
		return $CInteger;
	}

	/**
	 * CFloat() will type cast a given variable to a float state. 
	 * @param various $Variable Required. No default. Variable to be to be type cast to a float state. 
	 * @return float $CFloat. Will return variable to an float state. 
	 */

	public function CFloat($Variable) {
		$CFloat = (float) $Variable;
		return $CFloat;
	}

	/**
	 * CObject() will type cast a given variable to a object state. 
	 * @param various $Variable Required. No default. Variable to be to be type cast to a object state. 
	 * @return object $CObject. Will return variable to an object state. 
	 */

	public function CObject($Variable) {
		$CObject = (object) $Variable;
		return $CObject;
	}

	/**
	 * CArray() will type cast a given variable to a array state. 
	 * @param various $Variable Required. No default. Variable to be to be type cast to a array state. 
	 * @return array $CArray. Will return variable to an array state. 
	 */

	public function CArray($Variable) {
		$CArray = (array) $Variable;
		return $CArray;
	}

	/**
	 * SortArray() will sort a given array. Will reorder array and return True upon success, and False upon failure. 
	 * @param array $Array Required. No default. The array to sort. 
	 * @param text $Column Optional. Default is 'Key'. Acceptable options are 'Key', and 'Value'. Sort by value or key.
	 * @param text $Order Optional. Default is 'Ascending'. Acceptable options are 'Ascending', and 'Descending'. Sort the array either ascending or descending. 
	 * @param text $SortType Optional. Default is 'Regular'. Acceptable options are:
	 * 'Regular' - Default. Compare items normally. Does not change types. Value is 0. 
	 * 'Numeric' - Compare line items numerically. Value is 1.
	 * 'String' - Compare items as strings. Value is 2. 
	 * 'Natural' - Compare items as string, using natural ordering. Value is 3. 
	 * @return array $SortArray. Will reorder array and return True upon success, and False upon failure.
	 */

	public function SortArray($Array, $Column = 'Key', $Order = 'Ascending', $SortType = 'Regular') {
		if($SortType == 'Regular') {
			$SortType = SORT_REGULAR;
		} elseif($SortType == 'Numeric') {
			$SortType = SORT_NUMERIC;
		} elseif($SortType == 'String') {
			$SortType = SORT_STRING;
		} elseif($SortType == 'Natural') {
			$SortType = SORT_NATURAL;
		} else {
			$SortType = SORT_REGULAR; /* Defaults to 'Regular' if can not determine $SortType. */
		}

		if($Column == 'Key' && $Order == 'Ascending') {
			$SortArray = ksort($Array, $SortType);
		} elseif($Column == 'Key' && $Order == 'Descending') {
			$SortArray = krsort($Array, $SortType);
		} elseif($Column == 'Value' && $Order == 'Ascending') {
			$SortArray = asort($Array, $SortType);
		} elseif($Column == 'Value' && $Order == 'Descending') {
			$SortArray = arsort($Array, $SortType);
		}
		return $SortArray;
	}

	/**
	 * IsNull() will check to see if the given variable is null. Will return True if null, False if not null. 
	 * @param various $Variable Required. No default. Variable to be checked. 
	 * @return boolean Will return True if null, False if not null.
	 */

	public function IsNull($Variable) {
		if($this->IsEmpty($Variable) == True) {
			return True;
		} else {
			return False;
		}
	}

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
	 * IsUnset() will check to see if the given variable is unset. Will return True if unset, False if not unset. 
	 * @param various $Variable Required. No default. Variable to be checked. 
	 * @return boolean Will return True if unset, False if not unset.
	 */

	public function IsUnset($Variable) {
		if($this->IsEmpty($Variable)) {
			return True;
		} else {
			return False;
		}
	}

	public function SortArrayByKey($Array, $Order = 'Ascending') {
		if($Order == 'Ascending') {
			return ksort($Array);
		} elseif($Order == 'Descending') {
			return krsort($Array);
		} else {
			return ksort($Array);
		}
	}

	public function SortArrayByValue($Array, $Order = 'Ascending') {
		if($Order == 'Ascending') {
			$SortArrayByValue = asort($Array);
		} elseif($Order == 'Descending') {
			$SortArrayByValue = arsort($Array);
		} else {
			$SortArrayByValue = asort($Array);
		}
		return $SortArrayByValue;
	}

	public function StringToArray($String, $Delimiter = ', ') {
		$StringToArray = explode($Delimiter, $String);
		return $StringToArray;
	}

	public function ArrayToString($Array, $Delimiter = ', ') {
		$ArrayToString = implode($Delimiter, $Array);
		return $ArrayToString;
	}
}

?>

<?php

/**
 * LibDataManipulation - A library of functions for working with data and data structures. 
 * @author James Clayton <james.r.clayton@gmail.com>
 * @version 0.0.1
 * @copyright (c) 2013, James Clayton
 * @package LibDataManipulation
 * @license http://opensource.org/licenses/ISC ISC License (ISC)
 */

/**
 * 2013-06-01 Initial file creation. -JRC
 * 2014-01-27 Added extra documentation. -JRC
 * 2014-01-28 Clean up the file, et al. -JRC
 */

class DataManipulation {

	/**
	 * SortArray() will sort a given array. 
	 * @param array $Array Required. No default. The array to sort. 
	 * @param text $Column Optional. Default is 'Key'. Acceptable options are 'Key', and 'Value'. Sort by value or key.
	 * @param text $Order Optional. Default is 'Ascending'. Acceptable options are 'Ascending', and 'Descending'. Sort the array either ascending or descending. 
	 * @return array $SortArray. Will reorder array and return upon success, and False upon failure.
	 */

	public function SortArray($Array, $Column = 'Key', $Order = 'Ascending') {
		if(strtolower($Column) == 'key' && strtolower($Order) == 'ascending') {
			$SortArray = ksort($Array);
		} elseif(strtolower($Column) == 'key' && strtolower($Order) == 'descending') {
			$SortArray = krsort($Array);
		} elseif(strtolower($Column) == 'value' && strtolower($Order) == 'ascending') {
			$SortArray = asort($Array);
		} elseif(strtolower($Column) == 'value' && strtolower($Order) == 'descending') {
			$SortArray = arsort($Array);
		} else {
			die('SortArray can not determine the value of input. Exiting...');
		}
		return $SortArray;
	}

	// public function SortArray(&$Array, $Key) {
	// 	$Sort = array();
	// 	$Return = array();
	// 	reset($Array);
		
	// 	foreach ($Array as $i => $v) {
 //        	$Sort[$i] = $v[$key];
 //    	}
	    
	//     asort($Sort);
	    
	//     foreach ($Sort as $i => $v) {
	//         $Return[$i] = $Array[$i];
	//     }
	    
	//     $Array = $Return;

	//     return 
	// }
	
	/**
	 * The IsNumeric() finds whether the given variable is numeric. Numeric strings consist of optional sign, any number of digits, optional decimal part and optional exponential part. Thus +0123.45e6 is a valid numeric value. Hexadecimal notation (0xFF) is allowed too but only without sign, decimal and exponential part. 
	 * @param various $Variable Required. No default. The variable being evaluated. 
	 * @return boolean $IsNumeric Returns TRUE if $Variable is a number or a numeric string, FALSE otherwise. 
	 */

	public function IsNumeric($Variable) {
		$IsNumeric = is_numeric($Variable);
		return $IsNumeric;
	}

	/**
	 * The JsonDecode() will takes a JSON encoded string and converts it into a PHP variable. 
	 * @param various $Variable Required. No default. The JSON string to be decoded. This function only works with UTF-8 encoded data. 
	 * @param boolean $Array Optional. Default is True. Options are True or False. When true, returned objects will be converted into associative arrays.
	 * @return various $JsonDecode Returns the value encoded in json in appropriate PHP type. Values true, false and null (case-insensitive) are returned as TRUE, FALSE and NULL respectively. NULL is returned if the json cannot be decoded or if the encoded data is deeper than the recursion limit. 
	 */

	public function JsonDecode($Variable, $Array = True) {
		if($Array == True) {
			$JsonDecode = json_decode($Variable, True);
		} else {
			$JsonDecode = json_decode($Variable);
		}				
		return $JsonDecode;
	}

	/**
	 * The JsonEncode will returns a string containing the JSON representation of value. 
	 * @param various $Variable Required. No default. The value being encoded. This can be any type except a resource. This function only works with UTF-8 encoded data. 
	 * @param boolean $PrettyPrint Optional. Default is False. Options are True or False. This option will require PHP core 5.4.0. If parameter is true, and PHP version is lower than 5.4.0, an error is thrown. 
	 * @return various $JsonEncode Returns a JSON encoded string on success or FALSE on failure. 
	 */

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
		unset($Variable);
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
	 * The Count() function will count all line items in an array.
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

	/**
	 * The SortArrayByKey() will sort a given array by key. See also SortArrayByValue(). 
	 * @param array $Array Required. No default. Array to be sorted. 
	 * @param string $Order Optional. Default is Ascending. Options are Ascending and Descending. 
	 * @return array Will return array if the given array is successfully sorted. Will return false if the given array failed to be sorted. 
	 */

	public function SortArrayByKey($Array, $Order = 'Ascending') {
		if(strtolower($Order) == 'ascending') {
			$SortArrayByKey = ksort($Array);
		} elseif(strtolower($Order) == 'descending') {
			$SortArrayByKey = krsort($Array);
		} else {
			// return ksort($Array);
			die('Error: The given array could not be sorted. Exiting...');
		}
		return $SortArrayByKey;
	}

	/**
	 * The SortArrayByValue() will sort a given array by value. See also SortArrayByKey(). 
	 * @param array $Array Required. No default. Array to be sorted. 
	 * @param string $Order Optional. Default is Ascending. Options are Ascending and Descending. 
	 * @return array Will return array if the given array is successfully sorted. Will return false if the given array failed to be sorted. 
	 */

	public function SortArrayByValue($Array, $Order = 'Ascending') {
		if(strtolower($Order) == 'ascending') {
			$SortArrayByValue = asort($Array);
		} elseif(strtolower($Order) == 'descending') {
			$SortArrayByValue = arsort($Array);
		} else {
			die('Error: The given array could not be sorted. Exiting...');
		}
		return $SortArrayByValue;
	}

	public function StringToArray($String, $Delimiter = ',') {
		$StringToArray = explode($Delimiter, $String);
		return $StringToArray;
	}

	public function ArrayToString($Array, $Delimiter = ',') {
		$ArrayToString = implode($Delimiter, $Array);
		return $ArrayToString;
	}
}

?>

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

  /**
	 * TypeCast() will take various forms of a variable, and type cast to another type. 
	 * @param various $Variable Required. No default. Variable to typecast. 
	 * @param string $DataType Optional. Default is String. Options are String, Integer, Boolean, Float, Object, Array, Binary, and Unset.  
	 * @return various $TypeCast
	 * 
	 * <code>
	 *  
	 * </code>
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
	 * IsEmpty() will test if a variable is set. Will return true if variable is not set. Will return false if variable is set. 
	 * @param various $Variable Required. No default. Variable to test if set or not. 
	 * @return boolean $IsEmpty. Will return true if variable is not set. Will return false if variable is set. 
	 * 
	 * <code>
	 *  
	 * </code>
	 */

	public function IsEmpty($Variable) {
		if(!isset($Variable)) {
			$IsEmpty = True;
		} else{
			$IsEmpty = False;
		}

		return $IsEmpty;
	}

	/**
	 * CBoolean() will type cast a given variable to a boolean state. 
	 * @param various $Variable Required. No default. Variable to be to be type cast to a boolean state. 
	 * @return boolean $CBoolean. Will return variable to an boolean state. 
	 * 
	 * <code>
	 *  
	 * </code>
	 */

	public function CBoolean($Variable) {
		$CBoolean = (bool) $Variable;
		return $CBoolean;
	}

	/**
	 * CString() will type cast a given variable to a string state. 
	 * @param various $Variable Required. No default. Variable to be to be type cast to a string state. 
	 * @return string $CString. Will return variable to an string state. 
	 * 
	 * <code>
	 *  
	 * </code>
	 */

	public function CString($Variable) {
		$CString = (string) $Variable;
		return $CString;
	}

	/**
	 * CInteger() will type cast a given variable to a integer state. Alias of CInt().
	 * @param various $Variable Required. No default. Variable to be to be type cast to a integer state. 
	 * @return integer $CInteger. Will return variable to an integer state. 
	 * 
	 * <code>
	 *  
	 * </code>
	 */

	public function CInteger($Variable) {
		$CInteger = (int) $Variable;
		return $CInteger;
	}

	/**
	 * CInt() will type cast a given variable to a integer state. Alias of CInteger().
	 * @param various $Variable Required. No default. Variable to be to be type cast to a integer state. 
	 * @return integer $CInteger. Will return variable to an integer state. 
	 * 
	 * <code>
	 *  
	 * </code>
	 */

	public function CInt($Variable) {
		$CInteger = (int) $Variable;
		return $CInteger;
	}

	/**
	 * CFloat() will type cast a given variable to a float state. 
	 * @param various $Variable Required. No default. Variable to be to be type cast to a float state. 
	 * @return float $CFloat. Will return variable to an float state. 
	 * 
	 * <code>
	 *  
	 * </code>
	 */

	public function CFloat($Variable) {
		$CFloat = (float) $Variable;
		return $CFloat;
	}

	/**
	 * CObject() will type cast a given variable to a object state. 
	 * @param various $Variable Required. No default. Variable to be to be type cast to a object state. 
	 * @return object $CObject. Will return variable to an object state. 
	 * 
	 * <code>
	 *  
	 * </code>
	 */

	public function CObject($Variable) {
		$CObject = (object) $Variable;
		return $CObject;
	}

	/**
	 * CArray() will type cast a given variable to a array state. 
	 * @param various $Variable Required. No default. Variable to be to be type cast to a array state. 
	 * @return array $CArray. Will return variable to an array state. 
	 * 
	 * <code>
	 *  
	 * </code>
	 */

	public function CArray($Variable) {
		$CArray = (array) $Variable;
		return $CArray;
	}
}

?>

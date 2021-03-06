<?php

/**
 * LibSystem - A library of functions for working with system tasks. 
 * @author James Clayton <james.r.clayton@gmail.com>
 * @version 0.0.1
 * @copyright (c) 2013, James Clayton
 * @package LibSystem
 * @license http://opensource.org/licenses/ISC ISC License (ISC)
 */

class System {

 	/**
	 * The Kill() will output an optional message and terminate the current script
	 * @param String $Message Optional. Default is Null. 
	 * @return None Will only return an 404 error to the client. 
	 */

  	public function Kill($Message = Null) {
  		if($Message == Null) {
  			$Kill = exit();
  		} elseif(!$Message == Null) {
  			$Kill = exit($Message);
  		} else {
  			$Kill = exit();
  		}
  		return $Kill;
  	}

  	/**
	 * The Execute() function will execute an external command, and display the raw output. 
	 * @param string $Command Required. No default. The external command to execute. 
	 * @param boolean $GenOutput Optional. Default is 'False'. Options are 'True', or 'False'. When true, the output generated by the program execution will be displayed. 
	 * @return array $Execute Execute() will return three items: Output, Status, and Note in an array format. The array is returned for debugging purposes. 
	 */

  	public function Execute($Command, $GenOutput = False) {
  		if($GenOutput == True) {
  			$Output = passthru($Command, $CommandOutput);
  			$Status = True;
  			$Note = 'Success';
  		} elseif($GenOutput == False) {
  			$Output = exec($Command);
  			$Status = True;
  			$Note = 'Success';
  		} else {
  			$Output = False;
  			$Status = False;
  			$Note = 'Execute does not have proper parameters: True or False.';
  		}

  		$Execute = array(
  			'Output' => $Output,
  			'Status' => $Status,
  			'Note' => $Note
  		);

  		return $Execute;
  	}
}

?>
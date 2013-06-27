<?php

/**
 * LibUtility - A library of functions for working with misc tasks. 
 * @author James Clayton <james.r.clayton@gmail.com>
 * @version 0.0.1
 * @copyright (c) 2013, James Clayton
 * @package LibUtility
 * @license http://opensource.org/licenses/ISC ISC License (ISC)
 */

class Utility {

  	public function Import($File) {
  		$Import = include_once($File);
  		return $Import;
  	}

  	/**
	 * Execute will execute an external command, and display the raw output. 
	 * @param string $Command Required. No default. The external command to execute. 
	 * @param boolean $GenOutput Optional. Default is 'False'. Options are 'True', or 'False'. 
	 * @return array $Execute Execute() will return three items: Output, Status, and Note in an array format. 
	 */

  	public function Execute($Command, $GenOutput = 'False') {
  		if($GenOutput == 'True') {
  			$Execute = passthru($Command, $CommandOutput);
  			$Status = 'True';
  			$Note = 'Success';
  			//return $CommandOutput;
  		} elseif($GenOutput == 'False') {
  			$Execute = passthru($Command);
  			$Status = 'True';
  			$Note = 'Success';
  		} else {
  			$Execute = 'False';
  			$Status = 'False';
  			$Note = 'Execute does not have proper parameters: True or False.';
  		}

  		$Execute = array(
  			'Output' => $Execute,
  			'Status' => $Status,
  			'Note' => $Note
  		);

  		return $Execute;
  	}

  	/**
	 * PrintLine() will print a line in HTML. Depending on $Mode, will wrap in P or end with BR.
	 * @param string $Variable Required. No default. The string to be displayed on output. 
	 * @param string $Mode Optional. Default is 'br'. Options are 'br', 'p', 'pre', or 'nl'. 
	 * @return string $PrintLine Returns newly formated string for HTML markup. 
	 */

	public function PrintLine($Variable, $Mode = 'br') {
		if($Mode == 'Break') {
			$PrintLine = print($Variable . '<br />' . "\n");
		} elseif($Mode == 'Paragraph') {
			$PrintLine = print('<p>' . $Variable . '</p>' . "\n");
		} elseif($Mode == 'br') {
			$PrintLine = print($Variable . '<br />' . "\n");
		} elseif($Mode == 'p') {
			$PrintLine = print('<p>' . $Variable . '</p>' . "\n");
		} elseif($Mode == 'NewLine') {
			$PrintLine = print($Variable . "\n");
		} elseif($Mode == 'nl') {
			$PrintLine = print($Variable . "\n");
		} elseif($Mode == 'pre') {
			$PrintLine = print('<pre>' . $Variable . '</pre>' . "\n");
		} else {
			$PrintLine = print($Variable . '<br />' . "\n");
		}

		return $PrintLine;
	}

	/**
	 * Error() will throw a warning message, and exit the program. 
	 * @param string $String Required. No default. The message displayed when warning is thrown. 
	 */

	public function Error($String) {
	    echo($String);
	    exit();
	}

	/**
	 * Warning() will throw a warning message. 
	 * @param string $String Required. No default. The message displayed when warning is thrown. 
	 * @param boolean $Exit Optional. Default is False. If True, the program will exit, when warning is shown. 
	 */

	public function Warning($String, $Exit = 'False') {
	    echo($String);
	    if($Exit == 'True') {
			exit();
	    }
	}

	public function PHPVersion() {
		$PHPVersion = phpversion();
		return $PHPVersion;
	}

	public function GetIni($Variable) {
		$GetIni = ini_get($Variable);
		return $GetIni;
	}

	public function SetIni($Variable, $Value) {
		$SetIni = ini_set($Variable, $Value);
		return $SetIni;
	}

	/**
	 * DisplayErrors() will tell the library to either display errors or not.  
	 * @param boolean $Boolean Optional. Deault is False. 
	 */

	public function DisplayErrors($Boolean = 'False') {
		if($Boolean == 'True') {
			$this -> SetIni('display_errors', '1');
		} elseif($Boolean == 'False') {
			$this -> SetIni('display_errors', '0');
		} else {
			$this -> SetIni('display_errors', '1');
		}
	}
}

?>

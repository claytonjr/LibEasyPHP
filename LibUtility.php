<?php

/**
 * LibUtility - A library of functions for working with misc tasks. 
 * @author James Clayton <james.r.clayton@gmail.com>
 * @version 0.0.1
 * @copyright (c) 2013, James Clayton
 * @package LibUtility
 * @license http://opensource.org/licenses/ISC ISC License (ISC)
 */

include_once('LibConfig.php');

class Utility {

  	/**
	 * Execute will execute an external command, and display the raw output. 
	 * @param string $Command Required. No default. The external command to execute. 
	 * @param boolean $Output Optional. Default is 'True'. Options are 'True', 'T', 'False', or 'F'. 
	 * @return various $Execute Returns the raw output, text or binary, from the external command executed. 
	 */

  	public function Execute($Command, $Output = 'True') {
  		if($Output == 'True' or $Output == 'T') {
  			$Execute = passthru($Command, $CommandOutput);
  			$Success = True;
  			return $CommandOutput;
  		} elseif($Output == 'False' or $Output == 'F') {
  			$Execute = passthru($Command);
  			$Success = True;
  		} else {
  			$Execute = Null;
  			$Success = False;
  		}

  		return array(
  			'Output' => $Execute,
  			'Success' => $Success
  		);
  	}

  	/**
	 * PrintLine() will print a line in HTML. Depending on $Mode, will wrap in P or end with BR. 
	 * @param string $Variable Required. No default. The string to be displayed on output. 
	 * @param string $Mode Optional. Default is 'Break'. Options are 'Break', 'Paragraph', 'br', 'p', or 'nl'. 
	 * @return string $PrintLine Returns newly formated string for HTML markup. 
	 */

	public function PrintLine($Variable, $Mode = 'Break') {
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
		} else {
			$PrintLine = print($Variable . '<br />' . "\n");
		}

		return $PrintLine;
	}

	/**
	 * Error() will throw a warning message, and exit the program. 
	 * @param string $String Required. No default. The message displayed when warning is thrown. 
	 * 
	 * <code>
	 *  Error('Input not defined! Exiting!'); 
	 *  Will return 'Input not defined! Exiting!', and exit the program. 
	 * </code>
	 */

	public function Error($String) {
	    echo($String);
	    exit();
	}

	/**
	 * Warning() will throw a warning message. 
	 * @param string $String Required. No default. The message displayed when warning is thrown. 
	 * @param boolean $Exit Optional. Default is False. If True, the program will exit, when warning is shown. 
	 * 
	 * <code>
	 *  Warning('Input not defined! Exiting!', True); 
	 *  Will return 'Input not defined! Exiting!', and exit the program. 
	 * </code>
	 */

	public function Warning($String, $Exit = False) {
	    echo($String);
	    if($Exit == True) {
			exit();
	    }
	}

	public function PHPVersion() {
		$PHPVersion = phpversion();
		return $PHPVersion;
	}

	public function IniGet($Variable) {
		$IniGet = ini_get($Variable);
		return $IniGet;
	}

	public function IniSet($Variable, $Value) {
		$IniSet = ini_set($Variable, $Value);
		return $IniSet;
	}

	public function DisplayErrors($Boolean) {
		if($Boolean == True) {
			$this -> IniSet('display_errors', '1');
		} elseif($Boolean == False) {
			$this -> IniSet('display_errors', '0');
		} else {
			$this -> IniSet('display_errors', '1');
		}
	}
}

?>

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

  public function PrintLine($Variable, $Mode = 'Break') {
		if($Mode == 'Break') {
			$PrintLine = print($Variable . '<br />' . "\n");
		} elseif($Mode == 'Paragraph') {
			$PrintLine = print('<p>' . $Variable . '</p>' . "\n");
		} elseif($Mode == 'b') {
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

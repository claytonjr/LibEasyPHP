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

	public function UrlEncode($Url) {
		$UrlEncode = urlencode($Url);
		return $UrlEncode;
	}

	public function UrlDecode($Url) {
		$UrlDecode = urldecode($Url);
		return $UrlDecode;
	}

  	/**
	 * The Kill() will output an optional message and terminate the current script
	 * @param String $Message Optional. Default is Null. 
	 * @return None Will only return an 404 error to the client. 
	 */


  	public function Kill($Message = Null) {
  		if($Message == Null) {
  			$Kill = exit();
  		} elseif(!$Message == Null) {
  			$Kill = exit($Message . "\n");
  		} else {
  			$Kill = exit();
  		}
  		return $Kill;
  	}

  	/**
	 * The NotFound() will return a 404 error. This function will only send the header. It will not display a 404 page, or like message.
	 * @return None Will only return an 404 error to the client. 
	 */

  	public function NotFound() {
  		header('HTTP/1.1 404 Not Found');
  	}

  	/**
	 * The Redirect() function will redirect the client to a specified URL. 
	 * @param string $Url Required. No default. URL for client to be directed to. 
	 * @return None Will redirect client to a specified URL. 
	 */

  	public function Redirect($Url = Null) {
  		$Redirect = header("Location: $Url"); 
  		return $Redirect;
  	}

  	public function Header($Mode = Null) {
  		$Header = header($Mode);
  		return $Header;
  	}

  	public function HttpResponse($HttpStatusCode = Null) {
  		// $HttpResponse = header('X-PHP-Response-Code: '.$HttpStatusCode, true, $HttpStatusCode);
  		// return $HttpResponse;

  		switch ($HttpStatusCode) {
	        case 100: $HttpText = 'Continue'; break;
	        case 101: $HttpText = 'Switching Protocols'; break;
	        case 200: $HttpText = 'OK'; break;
	        case 201: $HttpText = 'Created'; break;
	        case 202: $HttpText = 'Accepted'; break;
	        case 203: $HttpText = 'Non-Authoritative Information'; break;
	        case 204: $HttpText = 'No Content'; break;
	        case 205: $HttpText = 'Reset Content'; break;
	        case 206: $HttpText = 'Partial Content'; break;
	        case 300: $HttpText = 'Multiple Choices'; break;
	        case 301: $HttpText = 'Moved Permanently'; break;
	        case 302: $HttpText = 'Moved Temporarily'; break;
	        case 303: $HttpText = 'See Other'; break;
	        case 304: $HttpText = 'Not Modified'; break;
	        case 305: $HttpText = 'Use Proxy'; break;
	        case 400: $HttpText = 'Bad Request'; break;
	        case 401: $HttpText = 'Unauthorized'; break;
	        case 402: $HttpText = 'Payment Required'; break;
	        case 403: $HttpText = 'Forbidden'; break;
	        case 404: $HttpText = 'Not Found'; break;
	        case 405: $HttpText = 'Method Not Allowed'; break;
	        case 406: $HttpText = 'Not Acceptable'; break;
	        case 407: $HttpText = 'Proxy Authentication Required'; break;
	        case 408: $HttpText = 'Request Time-out'; break;
	        case 409: $HttpText = 'Conflict'; break;
	        case 410: $HttpText = 'Gone'; break;
	        case 411: $HttpText = 'Length Required'; break;
	        case 412: $HttpText = 'Precondition Failed'; break;
	        case 413: $HttpText = 'Request Entity Too Large'; break;
	        case 414: $HttpText = 'Request-URI Too Large'; break;
	        case 415: $HttpText = 'Unsupported Media Type'; break;
	        case 500: $HttpText = 'Internal Server Error'; break;
	        case 501: $HttpText = 'Not Implemented'; break;
	        case 502: $HttpText = 'Bad Gateway'; break;
	        case 503: $HttpText = 'Service Unavailable'; break;
	        case 504: $HttpText = 'Gateway Time-out'; break;
	        case 505: $HttpText = 'HTTP Version not supported'; break;
	        default:
	            exit('Unknown http status code: ' . $HttpStatusCode);
	        break;
	    }

	    $HttpProtocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');
	    $HttpResponse = header($HttpProtocol . ' ' . $HttpStatusCode . ' ' . $HttpText);
        // $HttpResponse = header('X-PHP-Response-Code: '.$HttpStatusCode, true, $HttpStatusCode);
        return $HttpResponse;
    }

  	public function Import($File) {
  		$Import = include_once($File);
  		return $Import;
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

	public function PhpVersion() {
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

	public function PutIni($Variable, $Value) {
		$PutIni = ini_set($Variable, $Value);
		return $PutIni;
	}

	/**
	 * DisplayErrors() will tell the library to either display errors or not. Option is set in LibConfig file. 
	 * @param boolean $Boolean Optional. Deault is False. 
	 */

	public function DisplayErrors($Boolean = False) {
		if($Boolean == True) {
			$this->SetIni('display_errors', '1');
			$this->SetIni('xdebug.default_enable', '1');
			$this->SetIni('xdebug.default_enable', 'on');
			// xdebug_enable();
		} elseif($Boolean == False) {
			$this->SetIni('display_errors', '0');
			$this->SetIni('xdebug.default_enable', '0');
			$this->SetIni('xdebug.default_enable', 'off');
			// xdebug_disable();
		} else {
			$this -> SetIni('display_errors', '0');
			// xdebug_disable();
			$this->SetIni('xdebug.default_enable', '0');
			$this->SetIni('xdebug.default_enable', 'off');
		}
	}

	public function Sleep($Seconds) {
		$Sleep = sleep($Seconds);
		return $Sleep;
	}
}

?>

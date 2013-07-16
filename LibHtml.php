<?php

/**
 * LibHtml - A library of functions for working with HTML. 
 * @author James Clayton <james.r.clayton@gmail.com>
 * @version 0.0.1
 * @copyright (c) 2013, James Clayton
 * @package LibHtml
 * @license http://opensource.org/licenses/ISC ISC License (ISC)
 */

class Html {

	/**
	 * PrintLine() will print a line in HTML. Depending on $Mode, will wrap in P or end with BR.
	 * @param string $Variable Required. No default. The string to be displayed on output. 
	 * @param string $Mode Optional. Default is 'br'. Options are 'br', 'p', 'pre', or 'nl'. 
	 * @return string $PrintLine Returns newly formated string for HTML markup. 
	 */

	public function PrintLine($Variable, $Mode = 'br') {
		if(is_array($Variable)) {
			foreach($Variable As $Key => $Value) {
				if($Mode == 'br') {
					$PrintLine = print($Key . ' = ' . $Value . '<br />' . "\n");
				} elseif($Mode == 'p') {
					$PrintLine = print('<p>' . $Key . ' = ' . $Value . '</p>' . "\n");
				} elseif($Mode == 'nl') {
					$PrintLine = print($Key . ' = ' . $Value . "\n");
				} elseif($Mode == 'pre') {
					$PrintLine = print('<pre>' . $Key . ' = ' . $Value . '</pre>' . "\n");
				} else {
					$PrintLine = print($Key . ' = ' . $Value . '<br />' . "\n");
				}
			}
		} else {
			if($Mode == 'br') {
				$PrintLine = print($Variable . '<br />' . "\n");
			} elseif($Mode == 'p') {
				$PrintLine = print('<p>' . $Variable . '</p>' . "\n");
			} elseif($Mode == 'nl') {
				$PrintLine = print($Variable . "\n");
			} elseif($Mode == 'pre') {
				$PrintLine = print('<pre>' . $Variable . '</pre>' . "\n");
			} else {
				$PrintLine = print($Variable . '<br />' . "\n");
			}
		}
		return $PrintLine;
	}

	public function Pre($Text) {
		if(is_array($Text)) {
			$Pre = print('<pre>');
			$Pre .= print_r($Text);
			$Pre .= print('</pre>');
		} else {
			$Pre = print('<pre>' . $Text . '</pre>' . "\n");
		}		
		return $Pre;
	}
}

?>
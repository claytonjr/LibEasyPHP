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
}

?>
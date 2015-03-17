<?php

/**
 * LibGraphics - A library of functions for working with graphics. 
 * @author James Clayton <james.r.clayton@gmail.com>
 * @version 0.0.2
 * @copyright (c) 2013, James Clayton
 * @package LibGraphics
 * @license http://opensource.org/licenses/ISC ISC License (ISC)
 */

/**
 * 2013-06-01 Initial file creation. -JRC
 * 2014-02-01 Added all of the graphing functions in the graphics lib. Seems legit. -JRC
 */

class Graphics {
	
	public function GetInformation() {
		$GetInformation = gd_info();
		return $GetInformation;
	}

	public function GetSize($File) {
		$GetSize = getimagesize($File);
		return $GetSize;
	}
}

?>
<?php

/**
 * LibGraphics - A library of functions for working with graphics. 
 * @author James Clayton <james.r.clayton@gmail.com>
 * @version 0.0.1
 * @copyright (c) 2013, James Clayton
 * @package LibGraphics
 * @license http://opensource.org/licenses/ISC ISC License (ISC)
 */

class Graphics {
	public function GetInformation() {
		$GetInformation = gd_info();
		return $GetInformation;
	}

	public function GetSize($File) {
		$GetGraphicSize = getimagesize($File);
	}

	public function AddWatermark($Watermark, $Image, $) {

	}
}

?>
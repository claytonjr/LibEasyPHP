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

	public function GetGdiInformation() {
		$GetInformation = gd_info();
		return $GetInformation;
	}

	public function GetSize($File) {
		$GetGraphicSize = getimagesize($File);
		return $GetGraphicSize;
	}

	public function LineChart($Data, $Title, $Height = 240, $Width = 320) {
		header("Content-type: image/png");
		$arrval = array(12,123,21,32,77,85,166,176,163,121);
		//$Height = 260;
		//$Width = 330;
		$Image = imagecreate($Width, $Height);
		$White = imagecolorallocate($Image,255,255,255);
		$Gray = imagecolorallocate($Image,200,200,200);
		$Black = imagecolorallocate($Image,0,0,0);
		$Red = imagecolorallocate($Image,255,0,0);
		$x = 21;
		$y = 11;
		$Number = 0;
		
		while($x <= $Width && $y <= $Height) {
			$Percent = ((($Height - 50) - ($y - 1)) / ($Height - 60)) * 100;
			imageline($Image, 21, $y, $Width - 10, $y, $Gray);
			imageline($Image, $x, 11, $x, $Height - 50, $Gray);
			imagestring($Image,2, 1, $y - 10, $Percent .'%', $Red);
			imagestring($Image, 2, $x - 3, $Height - 40, $Number, $Red);
			$x += 30;
			$y += 20;
			$Number++;
		}

		$tx = 20;
		$ty = 210;
		
		foreach($arrval as $values) {
			$cx = $tx + 30;
			$cy = 200 - $values;
			imageline($Image , $tx, $ty, $cx, $cy, $Red);
			imagestring($Image, 5, $cx - 3, $cy - 13, '.', $Red);
			$ty = $cy;
			$tx = $cx;
		}

		imageline($Image, 20, 11, 20, $Height - 50, $Black);
		imageline($Image, 20, $Height - 49, $Width - 10, $Height - 49, $Black);
		imagestring($Image, 3, 10, $Height - 20, $Title, $Red);
		imagepng($Image);
	}

	public function PieChart() {

	}

	public function BarChart() {

	}
}

?>
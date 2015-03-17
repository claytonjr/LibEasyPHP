<?php

/**
 * LibGraphing - A library of functions for working with graphing. This program was inspired by FusionCharts by InfoSoft Global. 
 * @author James Clayton <james.r.clayton@gmail.com>
 * @version 0.0.1
 * @copyright (c) 2014, James Clayton
 * @package LibGraphing
 * @license http://opensource.org/licenses/ISC ISC License (ISC)
 */

/**
 * 2014-01-30 Initial file creation. -JRC
 * 2014-01-31 Ported EncodeDataURL, datePart and refactored, and added formated documentation.
 */

class Graphing {

	include('LibConfig.php');

	/**
	 * The EncodeDataURL() function encodes the $DataUrl before it's served to FusionCharts. Previously known as encodeDataURL. 
	 * @param String $DataUrl Required. The data url to be fed to chart.
	 * @param Boolean $NoCache Optional. Default is False. Options are True or False. Whether to add aditional string to URL to disable caching of data. 
	 * @return String $EncodeDataURL 
	 */

	public function EncodeDataURL($DataUrl, $NoCache = False) {
	    if($NoCache == True) {
	       
	       /** 
	        * We add ?FCCurrTime=xxyyzz if the dataURL already contains a ?, we add &FCCurrTime=xxyyzz
	        * replace : with _, as FusionCharts cannot handle : in URLs
	        */
			
			if(strpos($DataUrl, "?") <> 0) {
				$EncodeDataURL = $DataUrl .= "&FCCurrTime=" . Date("H_i_s");
			} else {
				$EncodeDataURL = $DataUrl .= "?FCCurrTime=" . Date("H_i_s");
			}				
	    }
		return urlencode($EncodeDataURL);
	}

	/**
	 * The RenderGraph() renders the JavaScript + HTML code required to embed a graph. First we create a new DIV for each chart. We specify the name of DIV as "chartId"Div. Note: DIV names are case-sensitive.
	 * 
	 * The Steps in the script block below are:
	 * 1 - In the DIV the text "Chart" is shown to users before the chart has started loading (if there is a lag in relaying SWF from server). This text is also shown to users who do not have Flash Player installed. You can configure it as per your needs.
	 * 2 - The chart is rendered using FusionCharts Class. Each chart's instance (JavaScript) Id is named as chart_"chartId". 
	 * 3 - Check whether we've to provide data using dataXML method or dataURL method save the data for usage below 
	 * 
	 * @param String $Data Required. Must be in Xml formate. 
	 * @param String $GraphId Optional. Default is 'FusionChart_'. The Id must NOT have any spaces. Id for the graph, using which it will be recognized in the HTML page. Each graph on the page needs to have a unique Id. Please note that for documents using multiple charts, will be required to use unique graph id. 
	 * @param Number $Width Optional. Default is 640. Width of the graph.
	 * @param Number $Heigh Optional. Default is 480. Height of the graph.
	 * @param Boolean $Debug Optional. Default is False. Options are True or False. To debug or to not debug. That is the question. 
	 * @param Boolean $RegisterWithJs Optional. Default is False. Options are True or False. Register the graph with JavaScript.
	 * @return String $GraphCode Returns a string in Html, for the graph. 
	 */

	public function RenderGraph($Data, $GraphId = 'FusionChart_', $Width = 640, $Height = 480, $Debug = False, $RegisterWithJs = False, $SwfFile = '') {
		
		/**
		 * First we create a new DIV for each chart. We specify the name of DIV as "chartId"Div.
		 * Note: DIV names are case-sensitive.
		 * 
		 * The Steps in the script block below are:
		 * 1 - In the DIV the text "Chart" is shown to users before the chart has started loading (if there is a lag in relaying SWF from server). This text is also shown to users who do not have Flash Player installed. You can configure it as per your needs.
		 * 2 - The chart is rendered using FusionCharts Class. Each chart's instance (JavaScript) Id is named as chart_"chartId". 
		 * 3 - Check whether we've to provide data using dataXML method or dataURL method save the data for usage below 
		 */

		if(strtolower($Mode) == 'xml') {
			$SetData = "chart_$GraphId.setDataXML(\"$Data\")";
		} elseif(strtolower($Mode) == 'url') {
			$SetData = "chart_$GraphId.setDataURL(\"$Data\")";
		} else {
			$SetData = "chart_$GraphId.setDataXML(\"$Data\")";
		}

		$GraphIdDiv = $GraphId . "_Div";

		if($Debug == True) {
			$Debug = 1;
		} elseif($Debug == False) {
			$Debug = 0;
		} else {
			$Debug = 0;
		}

		if($RegisterWithJs == True) {
			$RegisterWithJs = 1;
		} elseif($RegisterWithJs == False) {
			$RegisterWithJs = 0;
		} else {
			$RegisterWithJs = 0;
		}

/* GraphCode heredoc is tabbed to the first column for text editor purposes. Do not muve this. It will not affect the script. -JRC */

$GraphCode = <<< GRAPHCODE
	<!-- START Script Block for Chart $GraphId -->
	<div id="$GraphIdDiv" align="center">
		Chart.
	</div>
	<script type="text/javascript">	
		var GraphId = new FusionCharts("$SwfFile", "$GraphId", "$Width", "$Height", "$Debug", "$RegisterWithJs");
		chart_$GraphId.setTransparent("$Transparency");
		$SetData
		GraphId.render("$GraphIdDiv");
	</script>	
	<!-- END Script Block for Chart $GraphId -->
GRAPHCODE;

		return $GraphCode;
	}

	/**
	 * The RenderChartHTML() function renders the HTML code for the JavaScript. This method does NOT embed the chart using JavaScript class. Instead, it uses direct HTML embedding. So, if you see the charts on IE 6 (or above), you'll see the "Click to activate..." message on the chart. 
	 * @param String $Data Required. Must be in Xml formate. 
	 * @param String $GraphId Optional. Default is 'FusionChart_'. The Id must NOT have any spaces. Id for the graph, using which it will be recognized in the HTML page. Each graph on the page needs to have a unique Id. Please note that for documents using multiple charts, will be required to use unique graph id. 
	 * @param Number $Width Optional. Default is 640. Width of the graph.
	 * @param Number $Heigh Optional. Default is 480. Height of the graph.
	 * @param Boolean $Debug Optional. Default is False. Options are True or False. To debug or to not debug. That is the question. 
	 * @param Boolean $RegisterWithJs Optional. Default is False. Options are True or False. Register the graph with JavaScript.
	 * @return String $GraphCode Returns a string in Html, for the graph. 
	 */

	public function RenderGraphHTML($Data, $GraphId = 'FusionChart_', $Width = 640, $Height = 480, $Debug = False, $RegisterWithJs = False, $SwfFile = '') {
		if(strtolower($Mode) == 'xml') {
			$SetData = "&dataXML=" . $Data;
		} elseif(strtolower($Mode) == 'url') {
			$SetData = "&dataURL=" . $Data;
		} else {
			$SetData = "&dataXML=" . $Data;
		}

		$GraphIdDiv = $GraphId . "_Div";

		if($Debug == True) {
			$Debug = 1;
		} elseif($Debug == False) {
			$Debug = 0;
		} else {
			$Debug = 0;
		}

		if($RegisterWithJs == True) {
			$RegisterWithJs = 1;
		} elseif($RegisterWithJs == False) {
			$RegisterWithJs = 0;
		} else {
			$RegisterWithJs = 0;
		}

		$FlashVars = "&chartWidth=" . $Width . "&chartHeight=" . $Height . "&debugMode=" . $Debug . "&dataXML=" . $Data;

/* GraphCode heredoc is tabbed to the first column for text editor purposes. Do not muve this. It will not affect the script. -JRC */

$GraphCode = <<< GRAPHCODE
	<!-- START Code Block for Chart $GraphId -->
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="$Width" height="$Height" id="$GraphId">
		<param name="allowScriptAccess" value="always" />
		<param name="movie" value="$SwfFile"/>		
		<param name="FlashVars" value="$FlashVars&registerWithJS=$RegisterWithJs" />
		<param name="quality" value="high" />
		<embed src="$SwfFile" FlashVars="$FlashVars&registerWithJS=$RegisterWithJs" quality="high" width="$Width" height="$Height" name="$GraphId" allowScriptAccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" wmode="window" />
	</object>
	<!-- END Code Block for Chart $GraphId -->
GRAPHCODE;
	}

	/**
	 * GetColor() function helps return a color from $GraphColors array. It uses cyclic iteration to return a color from a given index. The index value is maintained in $ColorCounter.
	 * @return String $GraphCode Returns a 
	 */

	$ColorCounter = 0;

	$GraphColors[0] = "1941A5"; // Dark Blue
	$GraphColors[1] = "AFD8F8";
	$GraphColors[2] = "F6BD0F";
	$GraphColors[3] = "8BBA00";
	$GraphColors[4] = "A66EDD";
	$GraphColors[5] = "F984A1";
	$GraphColors[6] = "CCCC00"; // Chrome Yellow+Green
	$GraphColors[7] = "999999"; // Grey
	$GraphColors[8] = "0099CC"; // Blue Shade
	$GraphColors[9] = "FF0000"; // Bright Red 
	$GraphColors[10] = "006F00"; // Dark Green
	$GraphColors[11] = "0099FF"; // Blue (Light)
	$GraphColors[12] = "FF66CC"; // Dark Pink
	$GraphColors[13] = "669966"; // Dirty green
	$GraphColors[14] = "7C7CB4"; // Violet shade of blue
	$GraphColors[15] = "FF9933"; // Orange
	$GraphColors[16] = "9900FF"; // Violet
	$GraphColors[17] = "99FFCC"; // Blue+Green Light
	$GraphColors[18] = "CCCCFF"; // Light violet
	$GraphColors[19] = "669900"; // Shade of green

	public function GetColor() {
		global $ColorCounter;
		global $GraphColors;
		
		$ColorCounter++;

		return($GraphColors[$ColorCounter % count($GraphColors)]);
	}
}

?>
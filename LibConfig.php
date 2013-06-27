<?php

/**
 * LibConfig - Config file for LibraryPHP 
 * @author James Clayton <james.r.clayton@gmail.com>
 * @version 0.0.1
 * @copyright (c) 2013, James Clayton
 * @package LibConfig
 * @license http://opensource.org/licenses/ISC ISC License (ISC)
 */

include_once('LibDatabase.php');
include_once('LibDataManipulation.php');
include_once('LibDate.php');
include_once('LibFileSystem.php');
include_once('LibFinancial.php');
include_once('LibGraphics.php');
include_once('LibHtml.php');
include_once('LibMath.php');
include_once('LibNetwork.php');
include_once('LibScience.php');
include_once('LibSecurity.php');
include_once('LibStats.php');
include_once('LibString.php');
include_once('LibUtility.php');

$db = new Database();
$dm = new DataManipulation();
$date = new Date();
$fs = new FileSystem();
$fin = new Financial();
$gr = new Graphics();
$html = new Html();
$math = new Math();
$net = new Network();
$sci = new Science();
$sec = new Security();
$stat = new Stats();
$str = new String();
$util = new Utility();

/**
 * DisplayErrors() True or False. Optional. Default is True. Will display errors when called. 
 */

$util -> DisplayErrors('True');

?>

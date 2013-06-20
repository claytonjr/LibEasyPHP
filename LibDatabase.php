<?php

/**
 * LibDatabase - A library containing database specific funtions. 
 * @author James Clayton <james.r.clayton@gmail.com>
 * @version 0.0.1
 * @copyright (c) 2013, James Clayton
 * @package LibDatabase
 * @license http://opensource.org/licenses/ISC ISC License (ISC)
 */

class Database {
	/**
	 * MySqlSelectDB() is a pretty replacement for mysql_select_db().  
	 * @param string $Database Required. No Default. Name of MySQL database to connect to. 
	 * @param string $DatabaseLink Required. No Default. 
	 * @return none
	 * 
	 * <code>
	 *  MySqlSelectDB('db_users', $DatabaseLink); 
	 * </code>
	 */

	function MySqlSelectDB($Database, $DatabaseLink) {
	  include('LibConfig.php');

		$MySqlSelectDB = mysql_select_db($Database, $DatabaseLink);
		return $MySqlSelectDB;
	}

	function OpenMySqlConnection() {
		$OpenMySqlConnection = mysql_connect($DatabaseServer, $DatabaseUser, $DatabaseUserPassword);
		MySqlSelectDB($Database);
		return $OpenMySqlConnection;
	}

	function CloseMySqlConnection($DatabaseLink) {
		mysql_close($DatabaseLink);
	}

	/**
	 * MySqlQuery() will open a connection to the database and execute a query against it. 
	 * @param string $DatabaseQuery Required. No default. Enter the desired query here.   
	 * @return array 
	 * 
	 * <code>
	 *	MySqlQuery('Select * From tbl_users;');
	 * </code>
	 */

	function MySqlQuery($DatabaseQuery) {

	}

	/**
	 * ConnectToDatabase() will open a connection to the database. See OpenDatabaseConnection(). 
	 * @param none  
	 * @return none
	 * 
	 * <code>
	 *  $DatabaseLink = OpenDatabaseConnection();
	 * </code>
	 */

	function ConnectToDatabase() {
		$DatabaseLink = mysql_connect('localhost', 'user_account', 'user_password');
		MySqlSelectDB('database_name', $DatabaseLink); 
		return $DatabaseLink;
	}

	/**
	 * DatabaseQuery() will execute a query against the database. 
	 * @param string $SQLQuery Required. No default. 
	 * @return array 
	 * 
	 * <code>
	 *  DatabaseQuery("Select * From tbl_users;");
	 * </code>
	 */

	function DatabaseQuery($SQLQuery) {

	}

	/**
	 * DisconnectFromDatabase() will close the open connection to the database. See CloseDatabaseConnection().  
	 * @param string $DatabaseConnection Required. No default. 
	 * @return none
	 * 
	 * <code>
	 *  DisconnectFromDatabase($DatabaseConnection)
	 * </code>
	 */

	function DisconnectFromDatabase() {

	}

	/**
	 * ExportDatabaseTable() will export the database table to a desired format. 
	 * @param string $TableName Required. No default. Desired table name to export.
	 * @param string $ExportDestination Required. No default. Desired export location. Can be full or relative path. 
	 * @param string $ExportFormat Optional. Default is CSV. Acceptable formats are CSV, TSV, SQL, and Excel. 
	 * @return none
	 * 
	 * <code>
	 *  ExportDatabaseTable('tbl_users', '/home/claytonjr/', 'CSV');
	 *  Will export database to /home/claytonjr/tbl_users.csv
	 * </code>
	 */

	function ExportDatabaseTable($TableName, $ExportDestination, $ExportFormat = 'CSV') {

	}

	/**
	 * OpenDatabaseConnection() will open a connection to the database. 
	 * @param none  
	 * @return none
	 * 
	 * <code>
	 *  $DatabaseLink = OpenDatabaseConnection();
	 * </code>
	 */

	function OpenDatabaseConnection() {

	}

	/**
	 * CloseDatabaseConnection() will close the open connection to the database. 
	 * @param string $DatabaseConnection Required. No default. 
	 * @return none
	 * 
	 * <code>
	 *  CloseDatabaseConnection($DatabaseConnection)
	 * </code>
	 */

	function CloseDatabaseConnection($DatabaseConnection) {
		
	}
}

?>

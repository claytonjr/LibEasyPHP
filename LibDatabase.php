<?php

/**
 * LibDatabase - A library containing database specific funtions. 
 * @author James Clayton <james.r.clayton@gmail.com>
 * @version 0.0.2
 * @copyright (c) 2013, James Clayton
 * @package LibDatabase
 * @license http://opensource.org/licenses/ISC ISC License (ISC)
 */

/**
 * 2013-06-01 Initial file creation. -JRC
 * 2013-06-05 Added Query public function. -JRC
 * 2014-01-27 Added extra documentation. -JRC
 * 2014-01-28 Clean and format source, et al. -JRC
 */


class Database {

	/**
	 * The Query() will take a query string, and execute against the database. 
	 * @param String $QueryString Required. 
	 * @return Array $QueryResultSet Returns an associative array with the query results on successful query. Will return false if the array is empty, thus an empty record set. 
	 */
	
	public function Query($QueryString) {

		include('LibConfig.php');

		if($DbType == 'PgSQL') {
			$DatabaseConnectionString = "host=$DbHost port=$DbPort dbname=$DbName user=$DbUser password=$DbPassword";
			$DatabaseConnection = pg_connect($DatabaseConnectionString);

			if(!$DatabaseConnection) {
				print('Error: Could not connect to database.');
				exit();
			}

			$QueryResult = pg_query($DatabaseConnection, $QueryString);

			if(!$QueryResult) {
				print('Error: Could not create query result.');
				exit();
			}

			$QueryResultSet = pg_fetch_all($QueryResult);
			
		} elseif($DbType == 'MySQL') {
			$DatabaseConnection = Null;
			$DatabaseConnection = mysql_connect($DbHost, $DbUser, $DbPassword);

			if(!$DatabaseConnection) {
				print('Error: Could not connect to database.');
				exit();
			}
			
			mysql_select_db($DbName, $DatabaseConnection);
			
			$QueryResult = mysql_query($QueryString);
			$QueryResultSet = mysql_fetch_assoc($QueryResult);

		} elseif($DbType == 'MsSQL') {

		} elseif($DbType == 'Oracle') {

		}
		return $QueryResultSet;
	}
}

?>

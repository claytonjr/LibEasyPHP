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
			
			//return $RowItem;
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

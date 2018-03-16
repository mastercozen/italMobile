<?php
	$db_server = 'localhost';
	$db_username = 'limitado_admin';
	$db_password = '1234qwer';
	$db_database = 'limitado_db';

	try {
		$con = new PDO("mysql:host={$db_server};dbname={$db_database}", $db_username, $db_password);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		echo "ERROR : ".$e->getMessage();
	}
?>
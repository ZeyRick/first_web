<?php
		//connecting to db
		$dsn = 'mysql:dbname=db_stock;host=localhost';
		$user = 'root';
		$pass = '';
		$pdo = new PDO($dsn,$user,$pass);

		$imgfolder= 'images/';
		$pfpfolder = 'images/pfp/';
		$default_pfp = 'avatar.png';

?>
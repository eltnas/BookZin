<?php
	// definições do banco de dados
	define('dbHost', 'localhost');
	define('dbUser', 'bookzin');
	define('dbPass', '1234');
	define('dbName', 'bookzin');

	try{
		$pdo = new PDO("mysql:host=".dbHost.";dbname=".dbName, dbUser, dbPass);
		// Definie o modo de erro
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT id_user, usr_user, nome_user, senha_user FROM bkz_user WHERE usr_user = :usr";
	} catch(PDOException $e){
		die("Erro, não foi possivel conectar! Verifique: ".$e->getMessage());
	}
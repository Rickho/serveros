<?php
//phpinfo();

$usuarioPostgreSQL = "postgres";
$senhaPostgreSQL = "123456";
$id = 1;

try {
	$con = new     PDO("pgsql:host=localhost;dbname=serveros", "postgres", "123456" );
} catch(PDOException $erro) {
	echo 'Erro: ' . $erro->getMessage();
}

 ?>
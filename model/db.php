<?php 
$password = "";
$user = "root";
$name_bd = "crud";

try {
	// Create connection
	$bd = new PDO ( // PDO es una clase de PHP que nos permite conectarnos a una base de datos
		'mysql:host=localhost;
		dbname='.$name_bd,
		$user,
		$password,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") // Esto es para que los caracteres especiales se muestren correctamente
	);
} catch (Exception $e) {
	echo 'Error: '.$e->getMessage();
}
?>
<?php
	$dsn= 'mysql:dbname=solicitudes;host=localhost';
	$user= 'sistema';
	$password= 'puchis2126';
try{
	$pdo= new PDO($dsn,
		      $user,
		      $password);
}catch( PDOException $e){
	echo 'Error al conectarnos: '.$e->getMessage();
}
?>

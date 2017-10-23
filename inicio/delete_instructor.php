<?php
require_once('../conexion/conexion.php');


$sql ='DELETE FROM instructor WHERE rfc=?';
		$rfc = isset( $_GET['rfc']) ? $_GET['rfc'] : 0;

$statement = $pdo->prepare($sql);
$statement->execute(array($rfc));

$results = $statement->fetchAll();
header('Location: modificar_instructor.php')
?>

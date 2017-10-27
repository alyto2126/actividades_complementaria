<?php
require_once('../conexion/conexion.php');

$clave_carrera = isset( $_GET['clave_carrera']) ? $_GET['clave_carrera'] : '0';

$sql ='DELETE FROM carrera WHERE clave_carrera=?';


$statement = $pdo->prepare($sql);
$statement->execute(array($clave_carrera));

$results = $statement->fetchAll();
header('Location: modificar_carrera.php')
?>

<?php
require_once('../conexion/conexion.php');

$clave_act = isset( $_GET['clave_act']) ? $_GET['clave_act'] : '0';

$sql ='DELETE FROM act_complementaria WHERE clave_act=?';


$statement = $pdo->prepare($sql);
$statement->execute(array($clave_act));

$results = $statement->fetchAll();
header('Location: modificar_actividad.php')
?>

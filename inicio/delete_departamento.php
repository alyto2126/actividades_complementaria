
<?php
require_once('../conexion/conexion.php');

$clave_depa = isset( $_GET['clave_depa']) ? $_GET['clave_depa'] : '0';

$sql ='DELETE FROM departamento WHERE clave_depa=?';


$statement = $pdo->prepare($sql);
$statement->execute(array($clave_depa));

$results = $statement->fetchAll();
header('Location: modificar_departamento.php')
?>

<?php
require_once('../conexion/conexion.php');

$rfc = isset( $_GET['rfc']) ? $_GET['rfc'] : '0';

$sql ='DELETE FROM instructor WHERE rfc=?';


$statement = $pdo->prepare($sql);
$statement->execute(array($rfc));

$results = $statement->fetchAll();
header('Location: modificar_instructor.php')
?>

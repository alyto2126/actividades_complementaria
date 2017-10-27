
<?php
require_once('../conexion/conexion.php');

$folio = isset( $_GET['folio']) ? $_GET['folio'] : '0';

$sql ='DELETE FROM solicitud WHERE folio=?';


$statement = $pdo->prepare($sql);
$statement->execute(array($folio));

$results = $statement->fetchAll();
header('Location: modificar_solicitud.php')
?>

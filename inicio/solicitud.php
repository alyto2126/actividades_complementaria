<?php
	require_once('../conexion/conexion.php');
?>
<?php

	$sql_solicitud = 'SELECT * FROM solicitud';
	$statement_solicitud= $pdo->prepare($sql_solicitud);
	$statement_solicitud->execute(array());
	$results_solicitud=$statement_solicitud->fetchAll();

	$sql_status = 'SELECT solicitud.*, instituto.Nombre, instructor.Nombre, estudiante.Nombre FROM solicitud
	INNER JOIN instituto ON instituto.clave = solicitud.instituto_clave INNER JOIN instructor ON instructor.rfc = solicitud.instructor_rfc
	INNER JOIN estudiante ON estudiante.No_control = solicitud.estudiante_No_contro';
	$statement_status = $pdo->prepare($sql_status);
	$statement_status->execute();
	$results_status = $statement_status->fetchAll();

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title>PHP & SQL</title>
		<link rel="stylesheet" href="../css/materialize.min.css">
		</head>

	<body>
		<!--Import jQuery before materialize.js-->
    	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    	<script type="text/javascript" src="js/materialize.min.js"></script>
    	<div class="navbar-fixed">
        <nav class="teal lighten-2">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo right">Solicitud</a>
                <ul id="nav-mobile" class="left side-nav">
                    <li><a href="index.php">Inicio</a></li>
                </ul>
            </div>
        </nav>
    </div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h3>Instituto</h3>
					<hr>
					<table class="striped">
				        <thead>
				          <tr>
				              <th>Folio</th>
				              <th>Asunto</th>
											<th>Fecha</th>
											<th>Lugar</th>
											<th>Instituto Clave</th>
											<th>Instructor Rfc</th>
											<th>No ControlEstudiante</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php
				        		foreach($results_solicitud as $rs) {
				        	?>
				          <tr>
							<td><?php echo $rs['folio']?></td>
							<td><?php echo $rs['asunto']?></td>
							<td><?php echo $rs['fecha']?></td>
							<td><?php echo $rs['lugar']?></td>
							<td><?php echo $rs['instituto_clave']?></td>
							<td><?php echo $rs['instructor_rfc']?></td>
							<td><?php echo $rs['estudiante_No_contro']?></td>
				          </tr>
				          <?php
				          	}
				          ?>
				        </tbody>
				    </table>
				</div>
			</div>
			<div class="col s12">
                <footer class="page-footer teal lighten-2">
                    <div class="footer-copyright">
                        <div class="container">
                        </div>
                    </div>
                </footer>
            </div>
		</div>
	</body>
</html>

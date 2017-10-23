<?php
	require_once('../conexion/conexion.php');
?>
<?php

	$sql_carrera = 'SELECT * FROM carrera';
	$statement_carrera= $pdo->prepare($sql_carrera);
	$statement_carrera->execute(array());
	$results_carrera=$statement_carrera->fetchAll();

	$sql_status = 'SELECT carrera.*, estudiante.nombre FROM carrera INNER JOIN estudiante
	ON estudiante.clave_carrera = carrera.clave_carrera';
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
                <a href="#" class="brand-logo right">Carrera</a>
                <ul id="nav-mobile" class="left side-nav">
                    <li><a href="index.php">Inicio</a></li>
                </ul>
            </div>
        </nav>
    </div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h3>Carrera</h3>
					<hr>
					<table class="striped">
				        <thead>
				          <tr>
				              <th>Clave Carrera</th>
				              <th>Nombre</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php
				        		foreach($results_carrera as $rs) {
				        	?>
				          <tr>
							<td><?php echo $rs['clave_carrera']?></td>
							<td><?php echo $rs['nombre_carrera']?></td>
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

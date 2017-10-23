<?php
	require_once('../conexion/conexion.php');
?>
<?php

	$sql_instructor = 'SELECT * FROM instructor ORDER BY nombre_instructor';
	$statement_instructor= $pdo->prepare($sql_instructor);
	$statement_instructor->execute(array());
	$results=$statement_instructor->fetchAll();

	$sql_status = 'SELECT instructor.*, act_complementaria.* FROM instructor INNER JOIN act_complementaria
	ON act_complementaria.clave_act = instructor.act_complementaria_clave_act';
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
                <a href="#" class="brand-logo right">Instructor</a>
                <ul id="nav-mobile" class="left side-nav">
                    <li><a href="index.php">Inicio</a></li>
                </ul>
            </div>
        </nav>
    </div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h3>Instructor</h3>
					<hr>
					<table class="striped">
				        <thead>
				          <tr>
				              <th>RFC</th>
				              <th>Nombre</th>
											<th>Apellido Paterno</th>
											<th>Apellidio Materno</th>
											<th>Clave actividad complementaria</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php
				        		foreach($results_status as $rs) {
				        	?>
				          <tr>
							<td><?php echo $rs['rfc']?></td>
							<td><?php echo $rs['nombre_instructor']?></td>
							<td><?php echo $rs['apellido_p_instructor']?></td>
							<td><?php echo $rs['apellido_m_instructor']?></td>
							<td><?php echo $rs['act_complementaria_clave_act']?></td>
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

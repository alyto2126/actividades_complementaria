<?php
	require_once('../conexion/conexion.php');
?>
<?php

	$sql_act = 'SELECT * FROM act_complementaria ORDER BY nombre_act';
	$statement_act= $pdo->prepare($sql_act);
	$statement_act->execute(array());
	$results_status=$statement_act->fetchAll();

	$sql_act = 'SELECT act_complementaria.*, instructor.* FROM act_complementaria INNER JOIN instructor
	ON instructor.act_complementaria_clave_act = act_complementaria.clave_act';
	$statement_act = $pdo->prepare($sql_act);
	$statement_act->execute();
	$results_act = $statement_act->fetchAll();

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
                <a href="#" class="brand-logo right">Actividades Complementarias</a>
                <ul id="nav-mobile" class="left side-nav">
                    <li><a href="index.php">Inicio</a></li>
                </ul>
            </div>
        </nav>
    </div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h3>Actividades Complementarias</h3>
					<hr>
					<table class="striped">
				        <thead>
				          <tr>
				              <th>Clave Actividad</th>
				              <th>Nombre Actividad</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php
				        		foreach($results_status as $rs) {
				        	?>
				          <tr>
							<td><?php echo $rs['clave_act']?></td>
							<td><?php echo $rs['nombre_act']?></td>
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

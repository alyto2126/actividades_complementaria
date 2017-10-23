<?php
	require_once('../conexion/conexion.php');
?>
<?php
	$sql_actividad = 'SELECT * FROM act_complementaria WHERE nombre_act LIKE :search';
	$search_terms = isset($_GET['nombre_act'])? $_GET["nombre_act"]: '';
	$arr_sql_terms[':search'] = '%' . $search_terms .'%';
	$statement_actividad = $pdo->prepare($sql_actividad);
	$statement_actividad->execute($arr_sql_terms);
	$results_actividad = $statement_actividad->fetchAll();

	?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title>Buscador</title>
		<link rel="stylesheet" href="../css/materialize.min.css">
		</head>

	<body>
		<!--Import jQuery before materialize.js-->
    	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    	<script type="text/javascript" src="js/materialize.min.js"></script>
    	<div class="navbar-fixed">
        <nav class="teal lighten-2">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo right">Actividades</a>
                <ul id="nav-mobile" class="left side-nav">
                    <li><a href="index.php">Inicio</a></li>
                </ul>
            </div>
        </nav>
    </div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2>Buscador sencillo con like</h2>
					<hr>
					<form method="get">
							<div class="row">
								<div class="col s12">
									<label>Ingrese el nombre de la actividad
										<input type="text" name="nombre_act" value="ej. Ajedrez">
											<input class="button" type="submit" value="Buscar"/>
										</label>
									</div>
								</div>
							</form>
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
    				        		foreach($results_actividad as $rs) {
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

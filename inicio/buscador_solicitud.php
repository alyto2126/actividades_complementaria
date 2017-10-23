<?php
	require_once('../conexion/conexion.php');
?>
<?php
	$sql_asunto = 'SELECT * FROM solicitud WHERE asunto LIKE :search';
	$search_terms = isset($_GET['asunto'])? $_GET["asunto"]: '';
	$arr_sql_terms[':search'] = '%' . $search_terms .'%';
	$statement_asunto = $pdo->prepare($sql_asunto);
	$statement_asunto->execute($arr_sql_terms);
	$results_solicitud = $statement_asunto->fetchAll();

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
                <a href="#" class="brand-logo right">Solicitudes</a>
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
									<label>Ingrese el asunto de la solicitud
										<input type="text" name="asunto" placeholder="ej. reinscripcion">
											<input class="button" type="submit" value="Buscar"/>
										</label>
									</div>
								</div>
							</form>
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

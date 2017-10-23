<?php
	require_once('../conexion/conexion.php');
	$title = 'Agregar un nuevo registro';
	$sql_carrera = 'SELECT * FROM carrera';
	$statement = $pdo->prepare($sql_carrera);
	$statement->execute();
	$results = $statement->fetchAll();

	$sql_estudiante = 'SELECT * FROM estudiante ORDER BY nombre_estudiante';
	$statement_estudiante = $pdo->prepare($sql_estudiante);
	$statement_estudiante->execute(array());
	$results_estudiante = $statement_estudiante->fetchAll();

	if( $_POST )
	{
  		$sql_insert = 'INSERT INTO estudiante ( No_control, nombre_estudiante,
			apellido_p_estudiante, apellido_m_estudiante, semestre, clave_carrera ) VALUES( ?, ?, ?, ?, ?, ? )';
  		$No_control = isset($_POST['No_control']) ? $_POST['No_control']: '';
  		$nombre_estudiante = isset($_POST['nombre_estudiante']) ? $_POST['nombre_estudiante']: '';
  		$apellido_p_estudiante = isset($_POST['apellido_p_estudiante']) ? $_POST['apellido_p_estudiante']: '';
  		$apellido_m_estudiante = isset($_POST['apellido_m_estudiante']) ? $_POST['apellido_m_estudiante']: '';
  		$semestre = isset($_POST['semestre']) ? $_POST['semestre']: '';
  		$clave_carrera = isset($_POST['clave_carrera']) ? $_POST['clave_carrera']: '';
  		$statement_insert = $pdo->prepare($sql_insert);
  		$statement_insert->execute(array($No_control,$nombre_estudiante,$apellido_p_estudiante,
			$apellido_m_estudiante,$semestre,$clave_carrera));
	}

	$sql_status = 'SELECT estudiante.*, carrera.carreraNombre FROM estudiante INNER JOIN carrera
	ON carrera.clave = estudiante.carrera_clave';
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
		<title><?php echo $title?></title>
		<link rel="stylesheet" href="../css/materialize.css">
		</head>

	<body>
		<!--Import jQuery before materialize.js-->
    	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    	<script type="text/javascript" src="js/materialize.min.js"></script>
    	<div class="navbar-fixed">
        <nav class="teal lighten-2">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo right">Estudiantes</a>
                <ul id="nav-mobile" class="left side-nav">
                    <li><a href="index.php">Inicio</a></li>
                </ul>
            </div>
        </nav>
    </div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2>Agregar un nuevo estudiante</h2>
					<hr>
				</div>
			</div>
			<div class="row">
				<form method="post" class="col s12">
					<div class="row">
						<div class="input-field col s12">
          				<input placeholder="Número de control" name="No_control" type="text">
        				</div>
					</div>
					<div class="row">
        				<div class="input-field col s4">
          				<input placeholder="Nombre" name="nombre_estudiante" type="text">
        				</div>
        				<div class="input-field col s4">
          				<input placeholder="Apellido Paterno" name="apellido_p_estudiante" type="text">
        				</div>
        				<div class="input-field col s4">
          				<input placeholder="Apellido Materno" name="apellido_m_estudiante" type="text">
        				</div>
        			</div>
        			<div class="row">
        				<div class="input-field col s12">
    						<select name="semestre">
	      						<option value="" disabled selected>Elige el semestre</option>
	      						<option value="I">I</option>
	  							<option value="II">II</option>
	  							<option value="III">III</option>
	  							<option value="IV">IV</option>
	  							<option value="V">V</option>
	  							<option value="VI">VI</option>
	  							<option value="VII">VII</option>
	  							<option value="VIII">VIII</option>
    						</select>
    						<label>Semestre</label>
  						</div>
        			</div>
        			<div class="row">
        				<div class="input-field col s12">
                  		<select name="clave_carrera">
                  			<option value="" disabled selected>Elige la carrera</option>
                  			<?php
				        	foreach($results as $rs) {
				        	?>
  							<option value="<?php echo $rs['clave_carrera']?>"><?php echo $rs['nombre_carrera']?></option>
  							<?php
				          	}
				        ?>
						</select>
						<label>Carrera</label>
						</div>
        			</div>
        			<input class="btn waves-effect waves-light" type="submit" value="Agregar" />
        		</form>
      		</div>
			<div class="row">
				<div class="col s12">
					<h3>Estudiantes</h3>
					<hr>
					<table class="striped">
								<thead>
									<tr>
											<th>Numero Control</th>
											<th>Nombre Estudiante</th>
											<th>Apellido Paterno Estudiante</th>
											<th>Apellido Materno Estudiante</th>
											<th>Semestre</th>
											<th>carrera_clave</th>
									</tr>
								</thead>
								<tbody>
									<?php
										foreach($results_estudiante as $rs) {
									?>
									<tr>
							<td><?php echo $rs['No_control']?></td>
							<td><?php echo $rs['nombre_estudiante']?></td>
							<td><?php echo $rs['apellido_p_estudiante']?></td>
							<td><?php echo $rs['apellido_m_estudiante']?></td>
							<td><?php echo $rs['semestre']?></td>
							<td><?php echo $rs['clave_carrera']?></td>
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
                            &copy; 2017 JAIMES GUTIERREZ ALONDRA
                        </div>
                    </div>
                </footer>
            </div>
		</div>
		<!--  Scripts-->
    	<!--Import jQuery before materialize.js-->
      	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      	<script type="text/javascript" src="../js/materialize.min.js"></script>
      	<script>
      		$(document).ready(function() {
    		$('select').material_select();
  			});
      	</script>
	</body>
</html>

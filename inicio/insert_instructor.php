<?php
	require_once('../conexion/conexion.php');
	$title = 'Agregar un nuevo registro';
	$sql_act = 'SELECT * FROM act_complementaria ORDER BY nombre_act';
	$statement_act= $pdo->prepare($sql_act);
	$statement_act->execute(array());
	$results_status=$statement_act->fetchAll();

	if( $_POST )
	{
  		$sql_insert = 'INSERT INTO instructor (rfc, nombre_instructor, apellido_p_instructor,
			apellido_m_instructor,act_complementaria_clave_act  ) VALUES( ?, ?, ?, ?, ? )';
  		$No_rfc = isset($_POST['rfc']) ? $_POST['rfc']: '';
  		$nombre_instructor = isset($_POST['nombre_instructor']) ? $_POST['nombre_instructor']: '';
  		$apellido_p_instructor = isset($_POST['apellido_p_instructor']) ? $_POST['apellido_p_instructor']: '';
  		$apellido_m_instructor = isset($_POST['apellido_m_instructor']) ? $_POST['apellido_m_instructor']: '';
  		$act_complementaria_clave_act = isset($_POST['act_complementaria_clave_act']) ? $_POST['act_complementaria_clave_act']: '';
  		$statement_insert = $pdo->prepare($sql_insert);
  		$statement_insert->execute(array($No_rfc, $nombre_instructor, $apellido_p_instructor, $apellido_m_instructor, $act_complementaria_clave_act));
	}

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
                <a href="#" class="brand-logo right">instructor</a>
                <ul id="nav-mobile" class="left side-nav">
                    <li><a href="index.php">Inicio</a></li>
                </ul>
            </div>
        </nav>
    </div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2>Agregar un nuevo instructor</h2>
					<hr>
				</div>
			</div>
			<div class="row">
				<form method="post" class="col s12">
					<div class="row">
						<div class="input-field col s12">
          				<input placeholder="RFC" name="rfc" type="text">
        				</div>
					</div>
					<div class="row">
        				<div class="input-field col s12">
          				<input placeholder="Nombre" name="nombre_instructor" type="text">
        				</div>
        				<div class="input-field col s12">
          				<input placeholder="Apellido Paterno" name="apellido_p_instructor" type="text">
        				</div>
        				<div class="input-field col s12">
          				<input placeholder="Apellido Materno" name="apellido_m_instructor" type="text">
        				</div>
        			</div>
							<div class="row">
        				<div class="input-field col s12">
									<select name="act_complementaria_clave_act">
											<option value="" disabled selected>Elige el nombre de la actividad</option>
                  			<?php
				        	foreach($results_status as $rs) {
				        	?>
  							<option value="<?php echo $rs['clave_act']?>"><?php echo $rs['nombre_act']?> </option>
  							<?php
				          	}
				        ?>
						</select>
        			<input class="btn waves-effect waves-light" type="submit" value="Agregar" />
        		</form>
      		</div>
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
										foreach($results_act as $rs) {
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

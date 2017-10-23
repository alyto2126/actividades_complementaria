<?php
	require_once('../conexion/conexion.php');
	$title = 'Agregar un nuevo registro';
  $sql_instituto = 'SELECT * FROM instituto';
	$statement_instituto= $pdo->prepare($sql_instituto);
	$statement_instituto->execute(array());
	$results_instituto=$statement_instituto->fetchAll();

  $sql_instructor = 'SELECT * FROM instructor';
	$statement_instructor= $pdo->prepare($sql_instructor);
	$statement_instructor->execute(array());
	$results_instructor=$statement_instructor->fetchAll();

  $sql_estudiante = 'SELECT * FROM estudiante';
  $statement_estudiante= $pdo->prepare($sql_estudiante);
  $statement_estudiante->execute(array());
  $results_estudiante=$statement_estudiante->fetchAll();

	if( $_POST )
	{
  		$sql_insert = 'INSERT INTO solicitud (folio, asunto, fecha,lugar,
			instituto_clave,instructor_rfc,estudiante_No_contro ) VALUES( ?, ?, ?, ?, ?,?, ? )';
  		$folio = isset($_POST['folio']) ? $_POST['folio']: '';
  		$asunto = isset($_POST['asunto']) ? $_POST['asunto']: '';
  		$fecha = isset($_POST['fecha']) ? $_POST['fecha']: '';
  		$lugar = isset($_POST['lugar']) ? $_POST['lugar']: '';
  		$instituto_clave= isset($_POST['instituto_clave']) ? $_POST['instituto_clave']: '';
      $instructor_rfc= isset($_POST['instructor_rfc']) ? $_POST['instructor_rfc']: '';
      $estudiante_No_contro= isset($_POST['estudiante_No_contro']) ? $_POST['estudiante_No_contro']: '';
  		$statement_insert = $pdo->prepare($sql_insert);
  		$statement_insert->execute(array($folio, $asunto, $fecha, $lugar, $instituto_clave, $instructor_rfc, $estudiante_No_contro));
	}

  $sql_status = 'SELECT solicitud.*, instituto.nombre_instituto, instructor.nombre_instructor, estudiante.nombre_estudiante FROM solicitud
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
                <a href="#" class="brand-logo right">solicitud</a>
                <ul id="nav-mobile" class="left side-nav">
                    <li><a href="index.php">Inicio</a></li>
                </ul>
            </div>
        </nav>
    </div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2>Agregar una nueva solicitud</h2>
					<hr>
				</div>
			</div>
			<div class="row">
				<form method="post" class="col s12">
					<div class="row">
						<div class="input-field col s12">
          				<input placeholder="FOLIO" name="folio" type="text">
        				</div>
					</div>
					<div class="row">
        				<div class="input-field col s12">
          				<input placeholder="Asunto" name="asunto" type="text">
        				</div>
        				<div class="input-field col s12">
          				<input placeholder="Fecha" name="fecha" type="text">
        				</div>
        				<div class="input-field col s12">
          				<input placeholder="Lugar" name="lugar" type="text">
        				</div>
              </div>
							<div class="row">
        				<div class="input-field col s12">
									<select name="instituto_clave">
											<option value="" disabled selected>Elige el nombre del instituto</option>
                  			<?php
				        	foreach($results_instituto as $rs) {
				        	?>
  							<option value="<?php echo $rs['clave']?>"><?php echo $rs['nombre_instituto']?> </option>
  							<?php
				          	}
				        ?>
						</select>
            </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <select name="instructor_rfc">
                    <option value="" disabled selected>Elige el nombre del instructor</option>
                      <?php
                foreach($results_instructor as $rs) {
                ?>
              <option value="<?php echo $rs['rfc']?>"><?php echo $rs['nombre_instructor']?> </option>
              <?php
                  }
              ?>
          </select>
          </div>
          </div>
          <div class="row">
          <div class="input-field col s12">
            <select name="estudiante_No_contro">
                <option value="" disabled selected>Elige el nombre del estudiante</option>
                  <?php
            foreach($results_estudiante as $rs) {
            ?>
          <option value="<?php echo $rs['No_control']?>"><?php echo $rs['nombre_estudiante']?> </option>
          <?php
              }
          ?>
      </select>
      </div>

      </div>
      <div class="row">
        <div class="input-field col s12">
          <input class="btn waves-effect waves-light" type="submit" value="Agregar" />
        </div>
      </div>
        		</form>
            <h3>Solicitud</h3>
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
  				        		foreach($results_status as $rs) {
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
			<div class="col s12">
                <footer class="page-footer teal lighten-2">
                    <div class="footer-copyright">
                        <div class="container">
                            &copy; 2017 JAIMES GUTIERREZ ALONDRA
                        </div>
                    </div>
                </footer>
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

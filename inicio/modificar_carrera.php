<?php
	require_once('../conexion/conexion.php');
	$title = 'Carreras';
	$title_menu = 'Carreras';

	// Consulta para mostrar los datos de la tabla "Carrera"
  $sql_carrera = 'SELECT * FROM carrera';
	$statement_carrera= $pdo->prepare($sql_carrera);
	$statement_carrera->execute(array());
	$results_carrera=$statement_carrera->fetchAll();
	$show_form = FALSE;

	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE carrera SET clave_carrera = ?, nombre_carrera = ?
			WHERE clave_carrera = ?';

		  $clave_carrera = isset($_GET['clave_carrera']) ? $_GET['clave_carrera']: '';
		  $clave_carrera_2 = isset($_POST['clave_carrera_2']) ? $_POST['clave_carrera_2']: '';
  		$nombreCarrera = isset($_POST['nombre_carrera']) ? $_POST['nombre_carrera']: '';

	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($clave_carrera_2,$nombreCarrera, $clave_carrera));
	  	header('Location: modificar_carrera.php');
	}

	if(isset( $_GET['clave_carrera'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;
		$sql_update = 'SELECT carrera.*, estudiante.* FROM carrera INNER JOIN estudiante
  	ON estudiante.clave_carrera = carrera.clave_carrera WHERE clave_carrera = ?';
		$clave_carrera = isset( $_GET['clave_carrera']) ? $_GET['clave_carrera'] : 0;

		$statement_update = $pdo->prepare($sql_update);
		$statement_update->execute(array($clave_carrera));
		$result_details = $statement_update->fetchAll();
		$rs_details = $results_carrera [0];

	}

	$sql_status = 'SELECT carrera.*, estudiante.* FROM carrera INNER JOIN estudiante
	ON estudiante.clave_carrera = carrera.clave_carrera';
	$statement_status = $pdo->prepare($sql_status);
	$statement_status->execute();
	$results_status = $statement_status->fetchAll();
?>
<?php
	include('../extend/header.php');
?>

		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2>Proyecto de actividades complementarias</h2>
					<hr>
					<?php
						if( $show_form )
						{
						?>
						<form method="post">
							<div class="row">
								<div class="input-field col s12">
          							<input value='<?php echo $rs_details['clave_carrera'] ?>' name='clave_carrera_2' type="text">
        						</div>
							</div>
							<div class="row">
        						<div class="input-field col s4">
        							<!--<i class="material-icons prefix">account_circle</i>-->
          							<input value='<?php echo $rs_details['nombre_carrera'] ?>' name='nombre_carrera' type="text">
        						</div>
        					</div>
        				<input class="btn waves-effect waves-light" type="submit" value="Modificar" />
						</form>
					<?php }
					?>
          <h3>Carrera</h3>
          <hr>
          <table class="striped">
                <thead>
                  <tr>
                      <th>Clave Carrera</th>
                      <th>Nombre</th>
				                  <th colspan="2">Acción</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
				        	foreach($results_carrera as $rs2) {
				        ?>
					    <tr>
					    	<td><?php echo $rs2['clave_carrera']?></td>
							<td><?php echo $rs2['nombre_carrera']?></td>
							<td><a class="btn waves-effect waves-light" href="modificar_carrera.php?clave_carrera=<?php
							echo $rs2['clave_carrera']; ?>">Ver detalles</a></td>
							<td><a class="btn waves-effect waves-light red" onclick="delete_carrera('<?php echo $rs2["clave_carrera"]; ?>')" href="#">ELIMINAR</a>
					    </tr>
					    <?php
				          	}
				        ?>
					</tbody>
					</table>
				</div>
			</div>
			<?php
				include('../extend/footer.php');
			?>

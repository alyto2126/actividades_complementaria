<?php
	require_once('../conexion/conexion.php');
	$title = 'Estudiantes';
	$title_menu = 'Estudiantes';

	// Consulta para mostrar los datos de la tabla "Carrera"
	$sql_carrera = 'SELECT * FROM carrera';
	$statement = $pdo->prepare($sql_carrera);
	$statement->execute();
	$results = $statement->fetchAll();

	$show_form = FALSE;

	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE estudiante SET No_control = ?, nombre_estudiante = ?,
			apellido_p_estudiante = ?, apellido_m_estudiante = ?, semestre = ?, clave_carrera = ?
			WHERE No_control = ?';

		$noControl = isset($_GET['No_control']) ? $_GET['No_control']: '';
		$noControl_2 = isset($_POST['No_control_2']) ? $_POST['No_control_2']: '';
  		$nombreEstudiante = isset($_POST['nombre_estudiante']) ? $_POST['nombre_estudiante']: '';
  		$apellido_p_Estudiante = isset($_POST['apellido_p_estudiante']) ? $_POST['apellido_p_estudiante']: '';
  		$apellido_m_Estudiante = isset($_POST['apellido_m_estudiante']) ? $_POST['apellido_m_estudiante']: '';
  		$semestre = isset($_POST['semestre']) ? $_POST['semestre']: '';
  		$carrera_clave = isset($_POST['clave_carrera']) ? $_POST['clave_carrera']: '';

	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($noControl_2,$nombreEstudiante,
			$apellido_p_Estudiante,$apellido_m_Estudiante,$semestre,$carrera_clave, $noControl));
	  	header('Location: modificar_estudiante.php');
	}

	if(isset( $_GET['No_control'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;
		$sql_update = 'SELECT estudiante.*, carrera.nombre_carrera FROM estudiante INNER JOIN carrera
		ON carrera.clave_carrera = estudiante.clave_carrera WHERE No_control = ?';
		$noControl = isset( $_GET['No_control']) ? $_GET['No_control'] : 0;

		$statement_update = $pdo->prepare($sql_update);
		$statement_update->execute(array($noControl));
		$result_details = $statement_update->fetchAll();
		$rs_details = $result_details[0];

	}

	$sql_status = 'SELECT estudiante.*, carrera.nombre_carrera FROM estudiante INNER JOIN carrera
	ON carrera.clave_carrera = estudiante.clave_carrera';
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
          							<input value='<?php echo $rs_details['No_control'] ?>' name='No_control_2' type="text">
        						</div>
							</div>
							<div class="row">
        						<div class="input-field col s4">
        							<!--<i class="material-icons prefix">account_circle</i>-->
          							<input value='<?php echo $rs_details['nombre_estudiante'] ?>' name='nombre_estudiante' type="text">
        						</div>
        						<div class="input-field col s4">
        							<!--<i class="material-icons prefix">account_circle</i>-->
          							<input value="<?php echo $rs_details['apellido_p_estudiante'] ?>" name="apellido_p_estudiante" type="text">
        						</div>
        						<div class="input-field col s4">
        							<!--<i class="material-icons prefix">account_circle</i>-->
          						<input value="<?php echo $rs_details['apellido_m_estudiante'] ?>" name="apellido_m_estudiante" type="text">
        						</div>
        					</div>
        					<div class="row">
        						<div class="input-field col s12">
    								<select name="semestre">
			      						<option value="" disabled selected>Elige el semestre</option>
			      						<option value="I"<?php $selected =($rs_details['semestre']=='I')? "SELECTED": ""; echo $selected ?>>I</option>
			  							<option value="II"<?php $selected =($rs_details['semestre']=='II')? "SELECTED": ""; echo $selected ?>>II</option>
			  							<option value="III"<?php $selected =($rs_details['semestre']=='III')? "SELECTED": ""; echo $selected ?>>III</option>
			  							<option value="IV"<?php $selected =($rs_details['semestre']=='IV')? "SELECTED": ""; echo $selected ?>>IV</option>
			  							<option value="V"<?php $selected =($rs_details['semestre']=='V')? "SELECTED": ""; echo $selected ?>>V</option>
			  							<option value="VI"<?php $selected =($rs_details['semestre']=='VI')? "SELECTED": ""; echo $selected ?>>VI</option>
			  							<option value="VII"<?php $selected =($rs_details['semestre']=='VII')? "SELECTED": ""; echo $selected ?>>VII</option>
			  							<option value="VIII"<?php $selected =($rs_details['semestre']=='VIII')? "SELECTED": ""; echo $selected ?>>VIII</option>
			  							<option value="IX"<?php $selected =($rs_details['semestre']=='IX')? "SELECTED": ""; echo $selected ?>>IX</option>
			  							<option value="X"<?php $selected =($rs_details['semestre']=='X')? "SELECTED": ""; echo $selected ?>>X</option>
			  							<option value="XI"<?php $selected =($rs_details['semestre']=='XI')? "SELECTED": ""; echo $selected ?>>XI</option>
			  							<option value="XII"<?php $selected =($rs_details['semestre']=='XII')? "SELECTED": ""; echo $selected ?>>XII</option>
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
        				<input class="btn waves-effect waves-light" type="submit" value="Modificar" />
						</form>
					<?php }
					?>
				    <h3>Estudiantes</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>No Control</th>
				          	<th>Nombre</th>
				            <th>Apellido Paterno</th>
				            <th>Apellido Materno</th>
				            <th>Semestre</th>
				            <th>Carrera</th>
				            <th colspan="2">Acción</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
				        	foreach($results_status as $rs2) {
				        ?>
					    <tr>
					    	<td><?php echo $rs2['No_control']?></td>
							<td><?php echo $rs2['nombre_estudiante']?></td>
							<td><?php echo $rs2['apellido_p_estudiante']?></td>
							<td><?php echo $rs2['apellido_m_estudiante']?></td>
							<td><?php echo $rs2['semestre']?></td>
							<td><?php echo $rs2['nombre_carrera']?></td>
							<td><a class="btn waves-effect waves-light" href="modificar_estudiante.php?No_control=<?php
							echo $rs2['No_control']; ?>">Ver detalles</a></td>
							<td><a class="btn waves-effect waves-light red" onclick="delete_estudiante(<?php echo $rs2['No_control']; ?>)" href="#">ELIMINAR</a>
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

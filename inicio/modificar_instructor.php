<?php
	require_once('../conexion/conexion.php');
	$title = 'Instructores';
	$title_menu = 'Instructores';

	// Consulta para mostrar los datos de la tabla "act_complementaria"
	$sql_act = 'SELECT * FROM act_complementaria';
	$statement = $pdo->prepare($sql_act);
	$statement->execute();
	$results = $statement->fetchAll();

	$show_form = FALSE;

	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE instructor SET rfc = ?, nombre_instructor = ?,
			apellido_p_instructor = ?, apellido_m_instructor = ?, act_complementaria_clave_act= ?
			WHERE rfc = ?';

			$rfc = isset($_GET['rfc']) ? $_GET['rfc']: '';
			$rfc_2 = isset($_POST['rfc_2']) ? $_POST['rfc_2']: '';
  		$nombre_instructor = isset($_POST['nombre_instructor']) ? $_POST['nombre_instructor']: '';
  		$apellido_p_instructor = isset($_POST['apellido_p_instructor']) ? $_POST['apellido_p_instructor']: '';
  		$apellido_m_instructor = isset($_POST['apellido_m_instructor']) ? $_POST['apellido_m_instructor']: '';
  		$act_complementaria_clave_act = isset($_POST['act_complementaria_clave_act']) ? $_POST['act_complementaria_clave_act']: '';

	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($rfc_2,$nombre_instructor,
			$apellido_p_instructor,$apellido_m_instructor,$act_complementaria_clave_act, $rfc));
	  	header('Location: modificar_instructor.php');
	}

	if(isset( $_GET['rfc'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;
		$sql_update = 'SELECT instructor.*, act_complementaria.nombre_act FROM instructor INNER JOIN act_complementaria
		ON act_complementaria.clave_act = instructor.act_complementaria_clave_act WHERE rfc = ?';
		$rfc = isset( $_GET['rfc']) ? $_GET['rfc'] : 0;

		$statement_update = $pdo->prepare($sql_update);
		$statement_update->execute(array($rfc));
		$result_details = $statement_update->fetchAll();
		$rs_details = $result_details[0];

	}

  $sql_status = 'SELECT instructor.*, act_complementaria.nombre_act FROM instructor INNER JOIN act_complementaria
  ON act_complementaria.clave_act = instructor.act_complementaria_clave_act';
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
          							<input placeholder='<?php echo $rs_details['rfc'] ?>' name='rfc_2' type="text">
        						</div>
							</div>
						   <div class="row">
        				<div class="input-field col s12">
        							<!--<i class="material-icons prefix">account_circle</i>-->
          							<input placeholder='<?php echo $rs_details['nombre_instructor'] ?>' name='nombre_instructor' type="text">
        						</div>
                  </div>
                    <div class="row">
        						<div class="input-field col s12">
        							<!--<i class="material-icons prefix">account_circle</i>-->
          							<input placeholder="<?php echo $rs_details['apellido_p_instructor'] ?>" name="apellido_p_instructor" type="text">
        						</div>
                  </div>
                    <div class="row">
        						<div class="input-field col s12">
        							<!--<i class="material-icons prefix">account_circle</i>-->
          						<input placeholder="<?php echo $rs_details['apellido_m_instructor'] ?>" name="apellido_m_instructor" type="text">
        						</div>
                  </div>
        					  <div class="row">
            				<div class="input-field col s12">
    									<select name="act_complementaria_clave_act">
    											<option value="" disabled selected>Elige el nombre de la actividad</option>
                      			<?php
    				        	foreach($results as $rs) {
    				        	?>
      							<option value="<?php echo $rs['clave_act']?>"><?php echo $rs['nombre_act']?> </option>
      							<?php
    				          	}
    				        ?>
    						</select>
              </div>
            </div>
        				<input class="btn waves-effect waves-light" type="submit" value="Modificar" />
						</form>
					<?php }
          ?>
          <h3>Instructor</h3>
        <hr>
        <table class="striped">
              <thead>
              <tr>
                  <th>RFC</th>
                      <th>Nombre</th>
                      <th>Apellido Paterno</th>
                      <th>Apellido Materno</th>
                      <th>Actividad complementaria</th>
                        <th colspan="2">Acción</th>
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
            <td><a class="btn waves-effect waves-light" href="modificar_instructor.php?rfc=<?php
            echo $rs['rfc']; ?>">Ver detalles</a></td>
						<td><a class="btn waves-effect waves-light red" onclick="delete_instructor(<?php echo $rs['rfc']; ?>)" href="#">ELIMINAR</a>
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

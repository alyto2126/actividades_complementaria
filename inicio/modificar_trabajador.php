<?php
	require_once('../conexion/conexion.php');
	$title = 'Trabajadores';
	$title_menu = 'Trabajadores';

	// Consulta para mostrar los datos de la tabla "act_complementaria"
  $sql_trabajador = 'SELECT * FROM trabajador';
	$statement_trabajador= $pdo->prepare($sql_trabajador);
	$statement_trabajador->execute(array());
	$results_trabajador=$statement_trabajador->fetchAll();

	$show_form = FALSE;

	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE trabajador SET rfc = ?, nombre_trabajador = ?,
			apellido_p_trabajador = ?, apellido_m_trabajador = ?, clave_presupuestal= ?
			WHERE rfc = ?';

			$rfc = isset($_GET['rfc']) ? $_GET['rfc']: '';
			$rfc_2 = isset($_POST['rfc_2']) ? $_POST['rfc_2']: '';
  		$nombre_trabajador = isset($_POST['nombre_trabajador']) ? $_POST['nombre_trabajador']: '';
  		$apellido_p_trabajador = isset($_POST['apellido_p_trabajador']) ? $_POST['apellido_p_trabajador']: '';
  		$apellido_m_trabajador = isset($_POST['apellido_m_trabajador']) ? $_POST['apellido_m_trabajador']: '';
  		$clave_presupuestal = isset($_POST['clave_presupuestal']) ? $_POST['clave_presupuestal']: '';

	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($rfc_2,$nombre_trabajador,
			$apellido_p_trabajador,$apellido_m_trabajador,$clave_presupuestal, $rfc));
	  	header('Location: modificar_trabajador.php');
	}

	if(isset( $_GET['rfc'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;
		$sql_update = 'SELECT trabajador.*, departamento.* FROM trabajador INNER JOIN departamento
    ON trabajador.rfc = departamento.trabajador_rfc WHERE rfc = ?';
		$rfc = isset( $_GET['rfc']) ? $_GET['rfc'] : 0;

    $statement_trabajador = $pdo->prepare($sql_trabajador);
    $statement_trabajador->execute();
    $results_status = $statement_trabajador->fetchAll();
		$rs_details = $results_trabajador[0];

	}

  $sql_status = 'SELECT trabajador.*, departamento.* FROM trabajador INNER JOIN departamento
  ON trabajador.rfc = departamento.trabajador_rfc';
  $statement_status = $pdo->prepare($sql_status);
  $statement_status->execute();
  $results = $statement_status->fetchAll();
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
          							<input placeholder='<?php echo $rs_details['nombre_trabajador'] ?>' name='nombre_trabajador' type="text">
        						</div>
                  </div>
                    <div class="row">
        						<div class="input-field col s12">
        							<!--<i class="material-icons prefix">account_circle</i>-->
          							<input placeholder="<?php echo $rs_details['apellido_p_trabajador'] ?>" name="apellido_p_trabajador" type="text">
        						</div>
                  </div>
                    <div class="row">
        						<div class="input-field col s12">
        							<!--<i class="material-icons prefix">account_circle</i>-->
          						<input placeholder="<?php echo $rs_details['apellido_m_trabajador'] ?>" name="apellido_m_trabajador" type="text">
        						</div>
                  </div>
                  <div class="row">
                  <div class="input-field col s12">
                    <!--<i class="material-icons prefix">account_circle</i>-->
                    <input placeholder="<?php echo $rs_details['clave_presupuestal'] ?>" name="clave_presupuestal" type="text">
                  </div>
                </div>
        				<input class="btn waves-effect waves-light" type="submit" value="Modificar" />
						</form>
					<?php }
          ?>
          <h3>Trabajador</h3>
        <hr>
        <table class="striped">
              <thead>
              <tr>
                  <th>RFC</th>
                      <th>Nombre</th>
                      <th>Apellido Paterno</th>
                      <th>Apellido Materno</th>
                      <th>clave Presupuestal</th>
                      <th>Acción</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach($results_trabajador as $rs) {
                ?>
                <tr>
            <td><?php echo $rs['rfc']?></td>
            <td><?php echo $rs['nombre_trabajador']?></td>
            <td><?php echo $rs['apellido_p_trabajador']?></td>
            <td><?php echo $rs['apellido_m_trabajador']?></td>
            <td><?php echo $rs['clave_presupuestal']?></td>
            <td><a class="btn waves-effect waves-light" href="modificar_trabajador.php?rfc=<?php
            echo $rs['rfc']; ?>">Ver detalles</a></td>
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

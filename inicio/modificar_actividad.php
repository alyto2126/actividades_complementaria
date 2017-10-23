<?php
	require_once('../conexion/conexion.php');
	$title = 'Actividades';
	$title_menu = 'Actividades';

	// Consulta para mostrar los datos de la tabla "act_complementaria"

	$show_form = FALSE;

	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE act_complementaria SET clave_act = ?, nombre_act = ?
			WHERE clave_act = ?';

			$clave_act = isset($_GET['clave_act']) ? $_GET['clave_act']: '';
			$clave_act_2 = isset($_POST['clave_act_2']) ? $_POST['clave_act_2']: '';
  		$nombre_act = isset($_POST['nombre_act']) ? $_POST['nombre_act']: '';
	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($clave_act_2,$nombre_act, $clave_act));
	  	header('Location: modificar_actividad.php');
	}

	if(isset( $_GET['clave_act'] ) )
	{
		$show_form = TRUE;
		$sql_update = 'SELECT * FROM act_complementaria WHERE clave_act = ?';
		$clave_act = isset( $_GET['clave_act']) ? $_GET['clave_act'] : 0;

    $statement_status = $pdo->prepare($sql_update);
    $statement_status->execute(array($clave_act));
    $results_status = $statement_status->fetchAll();
		$rs_details = $results_status[0];

	}

  $sql_act = 'SELECT * FROM act_complementaria';
  $statement_act = $pdo->prepare($sql_act);
  $statement_act->execute();
  $results_act = $statement_act->fetchAll();
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
          							<input value='<?php echo $rs_details['clave_act'] ?>' name='clave_act_2' type="text">
        						</div>
							</div>
						   <div class="row">
        				<div class="input-field col s12">
        							<!--<i class="material-icons prefix">account_circle</i>-->
          							<input value='<?php echo $rs_details['nombre_act'] ?>' name='nombre_act' type="text">
        						</div>
                  </div>
              <input class="btn waves-effect waves-light" type="submit" value="Modificar" />
						</form>
					<?php }
          ?>
          <h3>Actividad</h3>
        <table class="striped">
					<hr>
              <thead>
              <tr>
                  <th>Clave Actividad</th>
                      <th>Nombre Actividad</th>
                      <th>Acción</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach($results_act as $rs) {
                ?>
                <tr>
            <td><?php echo $rs['clave_act']?></td>
            <td><?php echo $rs['nombre_act']?></td>
            <td><a class="btn waves-effect waves-light" href="modificar_actividad.php?clave_act=<?php
            echo $rs['clave_act']; ?>">Ver detalles</a></td>
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

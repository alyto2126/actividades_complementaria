<?php
	require_once('../conexion/conexion.php');
	$title = 'Instituto';
	$title_menu = 'Instituto';

	// Consulta para mostrar los datos de la tabla "instituto"
  $sql_instituto = 'SELECT * FROM instituto';
	$statement_instituto= $pdo->prepare($sql_instituto);
	$statement_instituto->execute(array());
	$results_instituto=$statement_instituto->fetchAll();

	$show_form = FALSE;

	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE instituto SET clave = ?, nombre_instituto = ?
			WHERE clave = ?';

			$clave = isset($_GET['clave']) ? $_GET['clave']: '';
			$clave_2 = isset($_POST['clave_2']) ? $_POST['clave_2']: '';
  		$nombre_instituto = isset($_POST['nombre_instituto']) ? $_POST['nombre_instituto']: '';
	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($clave_2,$nombre_instituto, $clave));
	  	header('Location: modificar_instituto.php');
	}

	if(isset( $_GET['clave'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;
		$sql_update = 'SELECT * FROM act_complementaria WHERE clave = ?';
		$clave = isset( $_GET['clave']) ? $_GET['clave'] : 0;
    $statement_Instituto = $pdo->prepare($sql_update);
    $statement_Instituto->execute(array($clave));
    $results_status = $statement_Instituto->fetchAll();
		$rs_details = $results_instituto[0];

	}

  $sql_instituto = 'SELECT * FROM act_complementaria';
  $statement_update = $pdo->prepare($sql_instituto);
  $statement_update->execute();
  $results_ins = $statement_update->fetchAll();
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
          							<input value='<?php echo $rs_details['clave'] ?>' name='clave_2' type="text">
        						</div>
							</div>
						   <div class="row">
        				<div class="input-field col s12">
        							<!--<i class="material-icons prefix">account_circle</i>-->
          							<input value='<?php echo $rs_details['nombre_instituto'] ?>' name='nombre_instituto' type="text">
        						</div>
                  </div>
              <input class="btn waves-effect waves-light" type="submit" value="Modificar" />
						</form>
					<?php }
          ?>
          <h3>Instituto</h3>
          <hr>
          <table class="striped">
                <thead>
                  <tr>
                      <th>Clave Instituto</th>
                      <th>Nombre Instituto</th>
                      <th>Accion</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($results_instituto as $rs) {
                  ?>
                  <tr>
              <td><?php echo $rs['clave']?></td>
              <td><?php echo $rs['nombre_instituto']?></td>
            <td><a class="btn waves-effect waves-light" href="modificar_instituto.php?clave=<?php
            echo $rs['clave']; ?>">Ver detalles</a></td>
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

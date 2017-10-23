<?php
 require_once('../conexion/conexion.php');
 ?>
 <?php
 	$sql = 'SELECT * FROM user';

 	$statement = $pdo->prepare($sql);
 	$statement->execute(array());
 	$results = $statement->fetchAll();

 	$sql_status = 'SELECT user.*, status.name FROM user INNER JOIN status ON status.id = user.status_id';
 	$statement_status = $pdo->prepare($sql_status);
 	$statement_status->execute();	$results_status = $statement_status->fetchAll();
 ?>
 <!DOCTYPE html>
 <html class="no-js" lang="es">
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
                 <a href="#" class="brand-logo right">Usuarios</a>
                 <ul id="nav-mobile" class="left side-nav">
                     <li><a href="index.php">Inicio</a></li>
                 </ul>
             </div>
         </nav>
     </div>
 		<div class="container">
 			<div class="row">
 				<div class="col s12">
 					<h2>Ejecuci&oacute;n de una sentencia SQL</h2>
 					<hr>
 					<h3>Datos SQL</h3>
 					<pre>
 						<?php
 						foreach( $pdo->query( $sql ) as $rs )
 						{
 							var_dump($rs);
 						}
 						?>
 					<h3>Usuarios</h3>
 					<hr>
 					<table class="striped">
 				        <thead>
 				          <tr>
 				              <th>ID</th>
 				              <th>Email</th>
 				              <th>Status</th>
 				          </tr>
 				        </thead>

 				        <tbody>
 				        	<?php
 				        		foreach($results as $rs) {
 				        	?>
 				          <tr>
 				            <td><?php echo $rs['id']?></td>
 				            <td><?php echo $rs['email']?></td>
 				            <td><?php echo $rs['status_id']?></td>
 				          </tr>
 				          <?php
 				          	}
 				          ?>
 				        </tbody>
 				    </table>

 				    <h3>Usuarios</h3>
 				    <table class="striped">
 					  <thead>
 					    <tr>
 					      <th>ID</th>
 					      <th>Email</th>
 					      <th width="150">Status</th>
 					    </tr>
 					  </thead>
 					  <tbody>
 					  	<?php
 				        	foreach($results_status as $rs) {
 				        ?>
 					    <tr>
 					    	<td><?php echo $rs['id']?></td>
 				        	<td><?php echo $rs['email']?></td>
 				            <td><?php echo $rs['name']?></td>
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

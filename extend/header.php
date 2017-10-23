<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" href="../css/materialize.min.css">

		<script>
            function delete_estudiante(id_to_delete)
            {
                var confirmation = confirm('¿Está seguro de que desea eliminar el estudiante con el número de control '+ id_to_delete);

                if(confirmation)
                {
                    window.location = "delete_estudiante.php?No_control="+id_to_delete;
                }
            }
        </script>
				<script>
								function delete_instructor(id_to_delete)
								{
										var confirmation = confirm('¿Está seguro de que desea eliminar el instructor con el rfc '+ id_to_delete);

										if(confirmation)
										{
												window.location = "delete_instructor.php?rfc="+id_to_delete;
										}
								}
						</script>
		</head>

	<body>
		<!--Import jQuery before materialize.js-->
    	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    	<script type="text/javascript" src="../js/materialize.min.js"></script>
    	<div class="navbar-fixed">
            <nav class="teal lighten-2">
                <div class="nav-wrapper">
                    <a href="#" class="brand-logo right"><?php echo $title_menu; ?></a>
                    <ul id="nav-mobile" class="left side-nav">
                        <li><a href="index.php">Inicio</a></li>
                    </ul>
                </div>
            </nav>
        </div>

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
								function delete_instructor(delete_instructor)
								{
										var confirmation = confirm('¿Está seguro de que desea eliminar el instructor con el rfc '+ delete_instructor);

										if(confirmation)
										{
												window.location = "delete_instructor.php?rfc="+delete_instructor;
										}
								}
						</script>

						<script>
										function delete_carrera(delete_carrera)
										{
												var confirmation = confirm('¿Está seguro de que desea eliminar la carrera con la clave '+ delete_carrera);

												if(confirmation)
												{
														window.location = "delete_carrera.php?clave_carrera="+delete_carrera;
												}
										}
								</script>


								<script>
												function delete_instituto(delete_instituto)
												{
														var confirmation = confirm('¿Está seguro de que desea eliminar el instituto con la clave '+ delete_instituto);

														if(confirmation)
														{
																window.location = "delete_instituto.php?clave="+delete_instituto;
														}
												}
										</script>

										<script>
														function delete_solicitud(delete_solicitud)
														{
																var confirmation = confirm('¿Está seguro de que desea eliminar la solicitud con el folio '+ delete_solicitud);

																if(confirmation)
																{
																		window.location = "delete_solicitud.php?folio="+delete_solicitud;
																}
														}
												</script>

												<script>
																function delete_trabajador(delete_trabajador)
																{
																		var confirmation = confirm('¿Está seguro de que desea eliminar el trabajador con el rfc '+ delete_trabajador);

																		if(confirmation)
																		{
																				window.location = "delete_trabajador.php?rfc="+delete_trabajador;
																		}
																}
														</script>

														<script>
																		function delete_departamento(delete_departamento)
																		{
																				var confirmation = confirm('¿Está seguro de que desea eliminar el departamento con la clave '+ delete_departamento);

																				if(confirmation)
																				{
																						window.location = "delete_departamento.php?rfc="+delete_departamento;
																				}
																		}
																</script>

																<script>
																				function delete_act_complementaria(delete_act_complementaria)
																				{
																						var confirmation = confirm('¿Está seguro de que desea eliminar la actividad complementaria con la clave '+ delete_act_complementaria);

																						if(confirmation)
																						{
																								window.location = "delete_act_complementaria.php?clave_act="+delete_act_complementaria;
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

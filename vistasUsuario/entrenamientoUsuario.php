<?php
	require_once __DIR__.'/../includes/config.php';
	require_once __DIR__.'/../includes/entrenadores.php';
?>
<!DOCTYPE html>
<html>
    <head>
		<title>Entrenamientos</title>
		<link rel="stylesheet" href="http://localhost/cornersports/estilos/estiloEntrenamiento.css?v=<?php echo(rand()); ?>" />
        <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
		
    </head>
    <body>
        <div id="contenedor">
		<?php
			include __DIR__."/../includes/estructura/cabecera.php";
		?>
		<div id="contenido2">
		<center>
			<?php
				$app = aplicacion::getSingleton();
                $conexion = $app->conexionBd();
				$tbl_name = "entrenamientos";
                if ($conexion->connect_error) {
                    die("La conexion falló: " . $conexion->connect_error);
                }
				else{
					$usuario=$_SESSION['username'];
					//Comprobar que el usuario no tiene un entrenamiento asignado
					$query = "SELECT entrenamiento_activo FROM usuarios WHERE username = '$usuario'";
					$result = $conexion->query($query);
					$row = mysqli_fetch_assoc($result);
					if($row['entrenamiento_activo'] == NULL){
						echo "<center/>No es posible ver la lista de entrenamientos contratados ya que no tiene ninguno. Por favor dirijase al listado de <a href=\"http://localhost/cornersports/entrenamiento.php\">entrenamientos disponibles</a>.<br/>";
					}else{
						echo "<p class=\"usuario_entr\">ENTRENAMIENTO CONTRATADO</p>";
						//Busca el entrenamiento seleccionado
						$id_entrenamiento=$row['entrenamiento_activo'];
						$entr=new entrenadores();
                        $entrenamientos=$entr->getEntrenamientos($id_entrenamiento);
						$imagen = $entrenamientos[0]['imagen'];
						$nombre = $entrenamientos[0]['nombre'];
						$descripcion = $entrenamientos[0]['descripcion'];
						$dias = $entrenamientos[0]['dias'];
						$precio = $entrenamientos[0]['precio'];
						$entrenador = $entrenamientos[0]['entrenador'];
						$dificultad = $entrenamientos[0]['dificultad'];
						$datos_entrenador = $entr->getEntrenadores($entrenador);
						$imagen_entrenador = $datos_entrenador[0]['imagen'];
						$dificultad_icon="http://localhost/cornersports/img/dificil.png";
						if($dificultad=="BAJA"){
							$dificultad_icon="http://localhost/cornersports/img/facil.png";
						}
						else if($dificultad=="MEDIA")
						{
							$dificultad_icon="http://localhost/cornersports/img/medio.png";
						}
						$html = <<<EOF
						<div class="entrenamiento">
							<div class="nombre_entrenamiento"><p>$nombre</p></div>
							<img class="imagen_entrenamiento" src="$imagen">
							<div class="base">
								<div class="info">
									<div class="info_interior">
										<div class="dificultad_int">
											<p class="dificultad">Dificultad: </p>
											<img class="dificultad_icon" src="$dificultad_icon">
										</div>
										<p class="dificultad">Días: $dias</p>
										<p class="dificultad">Precio: $precio €</p>
										<form action="http://localhost/cornersports/procesos/bajaEntrenamiento.php" id="form_session" method="post">
											<input type="submit" class="b_entrenamiento" value="DAR DE BAJA">
										</form>
									</div>
									<div class="descripcion_entrenamiento">
										<p>$descripcion</p>
									</div>
								</div>
								<div class="entrenador_info">
									<p> Entrenador </p>
									<img class="entrenamiento_entrenador" src="$imagen_entrenador">
								</div>
							</div>
							
						</div>
						EOF;
						echo"$html";
					}
				}  
			?>
		</center>
		</div>
		<?php
			include __DIR__.'/../includes/estructura/pie.php';
		?>
		</div>
    </body>
</html>
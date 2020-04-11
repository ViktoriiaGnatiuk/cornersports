<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__ . '/../includes/aplicacion.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Entrenamientos</title>
        <meta charset="UTF-8"/>
		
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
						echo "<center/><br/><strong>ENTRENAMIENTOS CONTRATADOS POR EL USUARIO '$usuario'</strong><br/><br/>";
						//Busca el entrenamiento seleccionado
						$entrenamiento=$row['entrenamiento_activo'];
						$tabla="entrenamientos";
						$query = "SELECT * FROM $tabla WHERE id = '$entrenamiento'";
						$result = $conexion->query($query);
						$count = mysqli_num_rows($result); 
						if ($count == 1) 
						{
							echo "<table border=2><tr><th>Nombre</th> <th>Precio</th> <th>Entrenador</th> <th>ID</th> <th>Dias</th> <th>Dificultad</th> <th>Día Actual</th> <th>Comienzo</th></tr>";
							//fetch_assoc los devuelve de uno en uno (en cada llamada) como array asociativo
							while ($registro = $result->fetch_assoc()) {
								echo "<tr>";
								foreach ($registro as $campo) 
									echo "<th>",$campo, "</th>";
								echo "</tr>";
							}
							echo "</table>";
						}
						echo "<center/><br/>Si lo desea, puede dar de baja el entrenamiento ya contratado dirigiéndose a este enlace: <a href=\"bajaEntrenamiento.php\">Dar de baja entrenamiento</a><br/>";
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
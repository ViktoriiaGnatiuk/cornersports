<?php
    require_once __DIR__.' /config.php';
    require_once __DIR__ . '/aplicacion.php';

    class entrenadores
    {
        public function __construct(){}
		
        public function getSize($tbl) {
            $app = aplicacion::getSingleton();
            $conexion = $app->conexionBd();
            $tbl_name = "entrenadores";
            if ($conexion->connect_error) {
                die("La conexion falló: " . $conexion->connect_error);
            }
            else{
                if($tbl_name!=""){
                    $tbl_name=$tbl;
                }
                $query = "SELECT * FROM $tbl_name ";
                $result = $conexion->query($query);
                return $result->num_rows;
            }
            return 0;
        }

        public function getSizeByEntrenador($id){
            $app = aplicacion::getSingleton();
            $conexion = $app->conexionBd();
            $tbl_name = "entrenamientos_disponibles";
            if ($conexion->connect_error) {
                die("La conexion falló: " . $conexion->connect_error);
            }
            else{
                $query = "SELECT * FROM $tbl_name WHERE entrenador='$id'";
                $result = $conexion->query($query);
                return $result->num_rows;
            }
            return 0;
        }

        public function getEntrenadores($id){
            $app = aplicacion::getSingleton();
            $conexion = $app->conexionBd();
            $tbl_name = "entrenadores";
            if ($conexion->connect_error) {
                die("La conexion falló: " . $conexion->connect_error);
            }
            else{
                $query = "SELECT * FROM $tbl_name";
                if($id!=""){
                    $query = "SELECT * FROM $tbl_name WHERE id='$id'";
                }
                $result = $conexion->query($query);
                $items=[];
                while($row= $result->fetch_assoc()){
                    $item= [
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'imagen' => $row['imagen'],
                        'descripcion' => $row['descripcion'],
                        'especialidad' => $row['especialidad'],
                        'puntuacion' => $row['puntuacion'],
                        'imagen_grande' => $row['imagen_grande'],
                    ];
                    array_push($items, $item);
                }
            }
            return $items;
        }

        public function getEntrenamientos($id, $disponible){
            $app = aplicacion::getSingleton();
            $conexion = $app->conexionBd();
            $tbl_name = "entrenamientos_disponibles";
            if ($conexion->connect_error) {
                die("La conexion falló: " . $conexion->connect_error);
            }
            else{
                $query = "SELECT * FROM $tbl_name";
                if($disponible){
                    $tbl_name = "entrenamientos";
                    $query = "SELECT * FROM $tbl_name WHERE id='$id'";
                }else if($id != ""){
                    $query = "SELECT * FROM $tbl_name WHERE id='$id'";
                }
                $result = $conexion->query($query);
                $items=[];
                while($row= $result->fetch_assoc()){
                    $item= [
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'imagen' => $row['imagen'],
                        'descripcion' => $row['descripcion'],
                        'dias' => $row['dias'],
                        'precio' => $row['precio'],
                        'entrenador' => $row['entrenador'],
                        'dificultad' => $row['dificultad'],
                    ];
                    array_push($items, $item);
                }
            }
            return $items;
        }

        public function getEntrenamientosByEntrenador($id){
            $app = aplicacion::getSingleton();
            $conexion = $app->conexionBd();
            $tbl_name = "entrenamientos_disponibles";
            if ($conexion->connect_error) {
                die("La conexion falló: " . $conexion->connect_error);
            }
            else{
                $query = "SELECT * FROM $tbl_name WHERE entrenador='$id'";
                $result = $conexion->query($query);
                $items=[];
                while($row= $result->fetch_assoc()){
                    $item= [
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'imagen' => $row['imagen'],
                        'descripcion' => $row['descripcion'],
                        'dias' => $row['dias'],
                        'precio' => $row['precio'],
                        'entrenador' => $row['entrenador'],
                        'dificultad' => $row['dificultad'],
                    ];
                    array_push($items, $item);
                }
            }
            return $items;
        }
		
		public function procesarEntreno($id){
			$app = aplicacion::getSingleton();
			$conexion = $app->conexionBd();
			$tbl_name = "entrenamientos";
			if ($conexion->connect_error) {
				die("La conexion falló: " . $conexion->connect_error);
			}
			else{
				if(isset($_SESSION['loged'])){
					//Copia el nombre del usuario
					$usuario=$_SESSION['username'];
					//Comprobar que el usuario no tiene un entrenamiento asignado
					$query = "SELECT entrenamiento_activo FROM usuarios WHERE username = '$usuario'";
					$result = $conexion->query($query);
					$row = mysqli_fetch_assoc($result);
					$entr=$row['entrenamiento_activo'];
					if($row['entrenamiento_activo'] != NULL){
$html = <<<EOF
<center/>
<h2>Lo sentimos, ya tiene un entrenamiento contratado.</h2><br/>
<h2>Si desea contratar este entrenamiento primero debe dar de baja el entrenamiento que ya tiene contratado</h2><br/>
<center/><a class="baja_entr" href="../procesos/bajaEntrenamiento.php">Dar de baja entrenamiento</a>
EOF;
                        return "$html";
					}else{
						//Busca el entrenamiento seleccionado
						$entrenamiento=$conexion->real_escape_string($id);
						$tabla="entrenamientos_disponibles";
						$query = "SELECT * FROM $tabla WHERE id = '$entrenamiento'";
						$result = $conexion->query($query);
						$count = mysqli_num_rows($result); 
						if ($count == 1) 
						{
							//Copia los datos del entrenamiento
							$row = mysqli_fetch_assoc($result);
							$nombre=$row['nombre'];
							$dias=$row['dias'];
							$dificultad=$row['dificultad'];
							$precio=$row['precio'];
							$entrenador=$row['entrenador'];
							$image=$row['imagen'];
							$descripcion=$row['descripcion'];
							//Asignar día actual =0
							$query="INSERT INTO entrenamientos (nombre, precio, entrenador, dias, dificultad, dia_actual, imagen, descripcion) VALUES 
							('$nombre', '$precio', '$entrenador', '$dias', '$dificultad', '0', '$image', '$descripcion')";
							$result = $conexion->query($query);
							if ($result == TRUE) {
								//Obtener el id del entrenamiento y asignarselo al usuario
								$id=$conexion->insert_id;
								$query="UPDATE usuarios SET entrenamiento_activo = '$id' WHERE username = '$usuario'";
								$result = $conexion->query($query);
								return $id;
								if ($result == TRUE) {
									echo "<h2>" . "Entrenamiento registrado correctamente" . "</h2>";
									
								}
								else {
									echo "Error al registrar el entrenamiento." . $query . "<br>" . $conexion->error;
								}
							}
							else {
								echo "Error al registrar el entrenamiento." . $query . "<br>" . $conexion->error;
							}
						}
						else{
							echo "Se ha producido un error, no existe el entrenamiento seleccionado en la base de datos<br/>";
                        }
					}
				}
			}
		}
	}
?>

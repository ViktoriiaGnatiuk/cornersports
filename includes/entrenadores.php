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

        public function getEntrenamientos($id){
            $app = aplicacion::getSingleton();
            $conexion = $app->conexionBd();
            $tbl_name = "entrenamientos_disponibles";
            if ($conexion->connect_error) {
                die("La conexion falló: " . $conexion->connect_error);
            }
            else{
                $query = "SELECT * FROM $tbl_name";
                if($id!=""){
                    $tbl_name = "entrenamientos";
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
    }
?>
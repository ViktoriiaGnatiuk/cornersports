<?php
    require_once __DIR__.' /config.php';
    require_once __DIR__ . '/aplicacion.php';

    class entrenadores
    {
        public function __construct(){}

        public function getSize($tbl_name) {
            $app = aplicacion::getSingleton();
            $conexion = $app->conexionBd();
            $tbl_name = "entrenadores";
            if ($conexion->connect_error) {
                die("La conexion falló: " . $conexion->connect_error);
            }
            else{
                $query = "SELECT * FROM $tbl_name ";
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
    }
?>
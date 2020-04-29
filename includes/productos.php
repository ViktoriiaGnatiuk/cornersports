<?php
    require_once __DIR__.' /config.php';
    require_once __DIR__ . '/aplicacion.php';

    class productos
    {
        public function __construct(){}

        public function getSize($tipo) {
            $app = aplicacion::getSingleton();
            $conexion = $app->conexionBd();
            $tbl_name = "productos_disponibles";
            if ($conexion->connect_error) {
                die("La conexion falló: " . $conexion->connect_error);
            }
            else{
                $query = "SELECT * FROM $tbl_name WHERE tipo = '$tipo'";
                $result = $conexion->query($query);
                return $result->num_rows;
            }
            return 0;
        }

        public function getSizeByUser() {
            $user=$_SESSION['username'];
            $app = aplicacion::getSingleton();
            $conexion = $app->conexionBd();
            $tbl_name = "productos";
            if ($conexion->connect_error) {
                die("La conexion falló: " . $conexion->connect_error);
            }
            else{
                $query = "SELECT * FROM $tbl_name WHERE usuario = '$user'";
                $result = $conexion->query($query);
                return $result->num_rows;
            }
            return 0;
        }

        public function getItems($tipo){
            $app = aplicacion::getSingleton();
            $conexion = $app->conexionBd();
            $tbl_name = "productos_disponibles";
            if ($conexion->connect_error) {
                die("La conexion falló: " . $conexion->connect_error);
            }
            else{
                $query = "SELECT * FROM $tbl_name WHERE tipo = '$tipo'";
                $result = $conexion->query($query);
                $items=[];
                while($row= $result->fetch_assoc()){
                    $item= [
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'imagen' => $row['imagen'],
                        'descripcion' => $row['descripcion'],
                        'precio' => $row['precio'],
                        'precio_alquiler' => $row['precio_alquiler'],
                    ];
                    array_push($items, $item);
                }
            }
            return $items;
        }

        public function getItemsByUser(){
            $user=$_SESSION['username'];
            $app = aplicacion::getSingleton();
            $conexion = $app->conexionBd();
            $tbl_name = "productos";
            if ($conexion->connect_error) {
                die("La conexion falló: " . $conexion->connect_error);
            }
            else{
                $query = "SELECT * FROM $tbl_name WHERE usuario = '$user'";
                $result = $conexion->query($query);
                $items=[];
                while($row= $result->fetch_assoc()){
                    $item= [
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'imagen' => $row['imagen'],
                        'descripcion' => $row['descripcion'],
                        'precio' => $row['precio'],
                        'precio_alquiler' => $row['precio_alquiler'],
                        'estado' => $row['estado'],
                        'pedido' => $row['pedido'],
                    ];
                    array_push($items, $item);
                }
            }
            return $items;
        }
    }

?>
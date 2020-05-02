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

        public function getSizeOfertas($tipo, $precio, $descuento, $palabra){
            $app = aplicacion::getSingleton();
            $conexion = $app->conexionBd();
            $tbl_name = "productos_disponibles";
            if ($conexion->connect_error) {
                die("La conexion falló: " . $conexion->connect_error);
            }
            else{
                $query = "SELECT * FROM $tbl_name WHERE descuento != 'NULL'";
                if($palabra!=""){
                    $query = "SELECT * FROM $tbl_name WHERE descuento != 'NULL' AND nombre LIKE '%$palabra%'";
                }else{
                    if(count($tipo)>0 && $precio!="" && $descuento!=""){
                        $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND tipo='%s' AND precio <= $precio AND descuento >= $descuento",
                            $conexion->real_escape_string($tipo[0]));
                        if(isset($tipo[3])){
                            $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND (tipo='%s' OR tipo='%s' OR tipo='%s' OR tipo='%s')
                            AND precio <= $precio AND descuento >= $descuento", $conexion->real_escape_string($tipo[0]),
                            $conexion->real_escape_string($tipo[1]),
                            $conexion->real_escape_string($tipo[2]),
                            $conexion->real_escape_string($tipo[3]));
                        }else if(isset($tipo[2])){
                            $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND (tipo='%s' OR tipo='%s' OR tipo='%s')
                            AND precio <= $precio AND descuento >= $descuento", $conexion->real_escape_string($tipo[0]),
                            $conexion->real_escape_string($tipo[1]),
                            $conexion->real_escape_string($tipo[2]));
                        }
                        else if(isset($tipo[1])){
                            $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND (tipo='%s' OR tipo='%s')
                            AND precio <= $precio AND descuento >= $descuento", $conexion->real_escape_string($tipo[0]),
                            $conexion->real_escape_string($tipo[1]));
                        }
                    }
                    else if (count($tipo)>0 && $precio!=""){
                        $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND tipo='%s' AND precio <= $precio", $conexion->real_escape_string($tipo[0]));
                        if(isset($tipo[3])){
                            $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND (tipo='%s' OR tipo='%s' OR tipo='%s' OR tipo='%s')
                            AND precio <= $precio", $conexion->real_escape_string($tipo[0]),
                            $conexion->real_escape_string($tipo[1]),
                            $conexion->real_escape_string($tipo[2]),
                            $conexion->real_escape_string($tipo[3]));
                        }else if(isset($tipo[2])){
                            $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND (tipo='%s' OR tipo='%s' OR tipo='%s')
                            AND precio <= $precio", $conexion->real_escape_string($tipo[0]),
                            $conexion->real_escape_string($tipo[1]),
                            $conexion->real_escape_string($tipo[2]));
                        }
                        else if(isset($tipo[1])){
                            $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND (tipo='%s' OR tipo='%s')
                            AND precio <= $precio", $conexion->real_escape_string($tipo[0]),
                            $conexion->real_escape_string($tipo[1]));
                        }
                    }
                    else if($precio!="" && $descuento!=""){
                        $query = "SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND precio <= $precio AND descuento >= $descuento";
                    }
                    else if(count($tipo)>0 && $descuento!="")
                    {
                        $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND tipo='%s' AND descuento >= $descuento", $conexion->real_escape_string($tipo[0]));
                            if(isset($tipo[3])){
                                $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                                AND (tipo='%s' OR tipo='%s' OR tipo='%s' OR tipo='%s')
                                AND descuento >= $descuento", $conexion->real_escape_string($tipo[0]),
                                $conexion->real_escape_string($tipo[1]),
                                $conexion->real_escape_string($tipo[2]),
                                $conexion->real_escape_string($tipo[3]));
                            }else if(isset($tipo[2])){
                                $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                                AND (tipo='%s' OR tipo='%s' OR tipo='%s')
                                AND descuento >= $descuento", $conexion->real_escape_string($tipo[0]),
                                $conexion->real_escape_string($tipo[1]),
                                $conexion->real_escape_string($tipo[2]));
                            }
                            else if(isset($tipo[1])){
                                $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                                AND (tipo='%s' OR tipo='%s')
                                AND descuento >= $descuento", $conexion->real_escape_string($tipo[0]),
                                $conexion->real_escape_string($tipo[1]));
                            }
                    }
                    else if(count($tipo)>0)
                    {
                        $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND tipo='%s'", $conexion->real_escape_string($tipo[0]));
                            if(count($tipo)==4){
                                $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                                AND (tipo='%s' OR tipo='%s' OR tipo='%s' OR tipo='%s')", 
                                $conexion->real_escape_string($tipo[0]),
                                $conexion->real_escape_string($tipo[1]),
                                $conexion->real_escape_string($tipo[2]),
                                $conexion->real_escape_string($tipo[3]));
                            }else if(count($tipo)==3){
                                $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                                AND (tipo='%s' OR tipo='%s' OR tipo='%s')",
                                $conexion->real_escape_string($tipo[0]),
                                $conexion->real_escape_string($tipo[1]),
                                $conexion->real_escape_string($tipo[2]));
                            }
                            else if(count($tipo)==2){
                                $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                                AND (tipo='%s' OR tipo='%s')",
                                $conexion->real_escape_string($tipo[0]),
                                $conexion->real_escape_string($tipo[1]));
                            }
                    }
                    else if($descuento!="")
                    {
                        $query = "SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND descuento >= $descuento";
                    }
                    else if($precio!="")
                    {
                        $query = "SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND precio <= $precio";
                    }
                }
                $result = $conexion->query($query);
                if(!$result){
                    echo "Error al consultar en la BD Linea 167: (" . $conexion->errno . ") " . utf8_encode($conexion->error);
                    exit();
                }
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

        public function getItemsOfertas($tipo, $precio, $descuento, $palabra){
            $app = aplicacion::getSingleton();
            $conexion = $app->conexionBd();
            $tbl_name = "productos_disponibles";
            if ($conexion->connect_error) {
                die("La conexion falló: " . $conexion->connect_error);
            }
            else{
                $query = "SELECT * FROM $tbl_name WHERE descuento != 'NULL'";
                if($palabra!=""){
                    $query = "SELECT * FROM $tbl_name WHERE descuento != 'NULL' AND nombre LIKE '%$palabra%'";
                }else{
                    if(count($tipo)>0 && $precio!="" && $descuento!=""){
                        $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND tipo='%s' AND precio <= $precio AND descuento >= $descuento",
                            $conexion->real_escape_string($tipo[0]));
                        if(isset($tipo[3])){
                            $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND (tipo='%s' OR tipo='%s' OR tipo='%s' OR tipo='%s')
                                AND precio <= $precio AND descuento >= $descuento", $conexion->real_escape_string($tipo[0]),
                                $conexion->real_escape_string($tipo[1]),
                                $conexion->real_escape_string($tipo[2]),
                                $conexion->real_escape_string($tipo[3]));
                        }else if(isset($tipo[2])){
                            $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND (tipo='%s' OR tipo='%s' OR tipo='%s')
                                AND precio <= $precio AND descuento >= $descuento", $conexion->real_escape_string($tipo[0]),
                                $conexion->real_escape_string($tipo[1]),
                                $conexion->real_escape_string($tipo[2]));
                        }
                        else if(isset($tipo[1])){
                            $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND (tipo='%s' OR tipo='%s')
                                AND precio <= $precio AND descuento >= $descuento", $conexion->real_escape_string($tipo[0]),
                                $conexion->real_escape_string($tipo[1]));
                        }
                    }
                    else if (count($tipo)>0 && $precio!=""){
                        $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND tipo='%s' AND precio <= $precio", $conexion->real_escape_string($tipo[0]));
                        if(isset($tipo[3])){
                            $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND (tipo='%s' OR tipo='%s' OR tipo='%s' OR tipo='%s')
                            AND precio <= $precio", $conexion->real_escape_string($tipo[0]),
                            $conexion->real_escape_string($tipo[1]),
                            $conexion->real_escape_string($tipo[2]),
                            $conexion->real_escape_string($tipo[3]));
                        }else if(isset($tipo[2])){
                            $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND (tipo='%s' OR tipo='%s' OR tipo='%s')
                            AND precio <= $precio", $conexion->real_escape_string($tipo[0]),
                            $conexion->real_escape_string($tipo[1]),
                            $conexion->real_escape_string($tipo[2]));
                        }
                        else if(isset($tipo[1])){
                            $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND (tipo='%s' OR tipo='%s')
                            AND precio < $precio", $conexion->real_escape_string($tipo[0]),
                            $conexion->real_escape_string($tipo[1]));
                        }
                        
                    }
                    else if($precio!="" && $descuento!=""){
                        $query = "SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND precio <= $precio AND descuento >= $descuento";
                    }
                    else if(count($tipo)>0 && $descuento!="")
                    {
                        $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND tipo='%s' AND descuento >= $descuento", $conexion->real_escape_string($tipo[0]));
                            if(isset($tipo[3])){
                                $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                                AND (tipo='%s' OR tipo='%s' OR tipo='%s' OR tipo='%s')
                                AND descuento >= $descuento", $conexion->real_escape_string($tipo[0]),
                                $conexion->real_escape_string($tipo[1]),
                                $conexion->real_escape_string($tipo[2]),
                                $conexion->real_escape_string($tipo[3]));
                            }else if(isset($tipo[2])){
                                $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                                AND (tipo='%s' OR tipo='%s' OR tipo='%s')
                                AND descuento >= $descuento", $conexion->real_escape_string($tipo[0]),
                                $conexion->real_escape_string($tipo[1]),
                                $conexion->real_escape_string($tipo[2]));
                            }
                            else if(isset($tipo[1])){
                                $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                                AND (tipo='%s' OR tipo='%s')
                                AND descuento >= $descuento", $conexion->real_escape_string($tipo[0]),
                                $conexion->real_escape_string($tipo[1]));
                            }
                    }
                    else if(count($tipo)>0)
                    {
                        $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND tipo='%s'", $conexion->real_escape_string($tipo[0]));
                            if(count($tipo)==4){
                                $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                                AND (tipo='%s' OR tipo='%s' OR tipo='%s' OR tipo='%s')", 
                                $conexion->real_escape_string($tipo[0]),
                                $conexion->real_escape_string($tipo[1]),
                                $conexion->real_escape_string($tipo[2]),
                                $conexion->real_escape_string($tipo[3]));
                            }else if(count($tipo)==3){
                                $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                                AND (tipo='%s' OR tipo='%s' OR tipo='%s')",
                                $conexion->real_escape_string($tipo[0]),
                                $conexion->real_escape_string($tipo[1]),
                                $conexion->real_escape_string($tipo[2]));
                            }
                            else if(count($tipo)==2){
                                $query = sprintf("SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                                AND (tipo='%s' OR tipo='%s')",
                                $conexion->real_escape_string($tipo[0]),
                                $conexion->real_escape_string($tipo[1]));
                            }
                    }
                    else if($descuento!="")
                    {
                        $query = "SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND descuento >= $descuento";
                    }
                    else if($precio!="")
                    {
                        $query = "SELECT * FROM $tbl_name WHERE descuento != 'NULL' 
                            AND precio <= $precio";
                    }
                }
                $result = $conexion->query($query);
                if(!$result){
                    echo "Error al consultar en la BD Linea 51: (" . $conexion->errno . ") " . utf8_encode($conexion->error);
                    exit();
                }
                $items=[];
                while($row= $result->fetch_assoc()){
                    $item= [
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'imagen' => $row['imagen'],
                        'precio' => $row['precio'],
                        'descuento' => $row['descuento'],
                    ];
                    array_push($items, $item);
                }
            }
            return $items;
        }
    }

?>
<?php
    require_once __DIR__.' /config.php';
    require_once __DIR__ . '/aplicacion.php';
    
    class carrito
    {
        public function addItem($id, $usuario, $precio_descuentado){
            $app = aplicacion::getSingleton();
            $conexion = $app->conexionBd();
            if ($conexion->connect_error) {
                die("La conexion falló: " . $conexion->connect_error);
            }
            else{
                $idPedido=0;
                $query = sprintf("SELECT pedido_activo FROM usuarios WHERE username = '%s'", $conexion->real_escape_string($usuario));
                $result = $conexion->query($query);
                if ($result) {
                    $row = $result->fetch_assoc();
                    $idPedido=$row['pedido_activo'];
            
                    //Creamos un pedido
                    if($idPedido==NULL){
                        $query=sprintf("INSERT INTO pedidos (usuario) VALUES ('%s')", $conexion->real_escape_string($usuario));
                        $result = $conexion->query($query);
                        if ($result == TRUE) {
                            //Obtener el id del pedido
                            $idPedido=$conexion->insert_id;
                            //Asignamos el id del pedido al usuario
                            $query=sprintf("UPDATE usuarios SET pedido_activo='%s' WHERE username='%s'"
                            , $conexion->real_escape_string($idPedido)
                            , $conexion->real_escape_string($usuario));
                            $result = $conexion->query($query);
                            if($result==FALSE){
                                echo "Error al consultar en la BD Linea 34: (" . $conexion->errno . ") " . utf8_encode($conexion->error);
                                exit();
                            }
                        }
                        else{
                            echo "Error al consultar en la BD Linea 30: (" . $conexion->errno . ") " . utf8_encode($conexion->error);
                            exit();
                        }
                    }

                    //Extraemos la información de los productos ofertados
                    $query = sprintf("SELECT * FROM productos_disponibles WHERE id= '%s'", $conexion->real_escape_string($id));
                    $result = $conexion->query($query);
                    if($result){
                        $row = $result->fetch_assoc();
                        $nombre = $row['nombre'];
                        $tipo = $row['tipo'];
                        $imagen = $row['imagen'];
                        $descripcion = $row['descripcion'];
                        $precio = $row['precio'];
                        if($precio_descuentado > 0){
                            $precio=$precio_descuentado;
                        }
                        $precio_alquiler = $row['precio_alquiler'];

                        //Vemos si el pedido tiene un producto con ese id
                        $query = sprintf("SELECT * FROM productos WHERE pedido='%s' AND nombre='%s'",
                         $conexion->real_escape_string($idPedido), $conexion->real_escape_string($nombre));
                        $result = $conexion->query($query);
                        if($result->num_rows > 0){
                            $row = $result->fetch_assoc();
                            $idProducto=$row['id'];
                            $cantidad=$row['cantidad']+1;
                            $query="UPDATE productos SET cantidad = '$cantidad' WHERE id = '$idProducto'";
                            $result = $conexion->query($query);
                            if ($result == FALSE) {
                                echo "Error al consultar en la BD Linea 58: (" . $conexion->errno . ") " . utf8_encode($conexion->error);
                                exit();
                            }
                        }
                        else{
                            //Creamos un nuevo producto y lo asociamos al pedido
                            $query=sprintf("INSERT INTO productos (nombre, precio, tipo, precio_alquiler, descripcion, 
                                imagen, pedido, usuario) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
                                $conexion->real_escape_string($nombre),
                                $conexion->real_escape_string($precio),
                                $conexion->real_escape_string($tipo),
                                $conexion->real_escape_string($precio_alquiler),
                                $conexion->real_escape_string($descripcion),
                                $conexion->real_escape_string($imagen),
                                $conexion->real_escape_string($idPedido),
                                $conexion->real_escape_string($usuario));
                                $result = $conexion->query($query);
                            if ($result == FALSE) {
                                echo "Error al consultar en la BD Linea75: (" . $conexion->errno . ") " . utf8_encode($conexion->error);
                                exit();
                            }
                        }
                    } else {
                        echo "Error al consultar en la BD Linea 81: (" . $conexion->errno . ") " . utf8_encode($conexion->error);
                        exit();
                    }
                } else {
                    echo "Error al consultar en la BD Linea 85: (" . $conexion->errno . ") " . utf8_encode($conexion->error);
                    exit();
                }
            }
        }

        public function removeItem($id){
            $usuario=$_SESSION['username'];
            $app = aplicacion::getSingleton();
            $conexion = $app->conexionBd();
            if ($conexion->connect_error) {
                die("La conexion falló: " . $conexion->connect_error);
            }
            else{
                $query="DELETE FROM productos WHERE id='$id'";
                $result = $conexion->query($query);
                if ($result == FALSE) {
                    echo "Error al consultar en la BD Linea 85: (" . $conexion->errno . ") " . utf8_encode($conexion->error);
                    exit();
                }
            }
        }

        public function getSize(){
            if(isset($_SESSION['loged'])){
                $usuario=$_SESSION['username'];
                $idPedido=0;
                $app = aplicacion::getSingleton();
                $conexion = $app->conexionBd();
                if ($conexion->connect_error) {
                    die("La conexion falló: " . $conexion->connect_error);
                }
                else{
                    $idPedido=0;
                    $query = sprintf("SELECT pedido_activo FROM usuarios WHERE username='%s'",  $conexion->real_escape_string($usuario));
                    $result = $conexion->query($query);
                    $row = $result->fetch_assoc();
                    if($row['pedido_activo']==NULL){
                        return 0;
                    }
                    $idPedido=$row['pedido_activo'];

                    //Buscar todos los productos que esten asociados con el numero de pedido
                    $query = sprintf("SELECT * FROM productos WHERE pedido='%s'",  $conexion->real_escape_string($idPedido));
                    $result = $conexion->query($query);
                    return $result->num_rows;
                }
            }else{
                return 0;
            }
        }

        public function getSizeReal(){
            if(isset($_SESSION['loged'])){
                $usuario=$_SESSION['username'];
                $idPedido=0;
                $app = aplicacion::getSingleton();
                $conexion = $app->conexionBd();
                if ($conexion->connect_error) {
                    die("La conexion falló: " . $conexion->connect_error);
                }
                else{
                    $idPedido=0;
                    $query = sprintf("SELECT pedido_activo FROM usuarios WHERE username='%s'",  $conexion->real_escape_string($usuario));
                    $result = $conexion->query($query);
                    $row = $result->fetch_assoc();
                    if($row['pedido_activo']==NULL){
                        return 0;
                    }
                    $idPedido=$row['pedido_activo'];

                    //Buscar todos los productos que esten asociados con el numero de pedido
                    $query = sprintf("SELECT * FROM productos WHERE pedido='%s'",  $conexion->real_escape_string($idPedido));
                    $result = $conexion->query($query);
                    $size=0;
                    while($row= $result->fetch_assoc()){
                        $size+=$row['cantidad'];
                    }
                    return $size;
                }
            }else{
                return 0;
            }
        }

        public function getCarrito(){
            $usuario=$_SESSION['username'];
            $idPedido=0;
            $app = aplicacion::getSingleton();
            $conexion = $app->conexionBd();
            if ($conexion->connect_error) {
                die("La conexion falló: " . $conexion->connect_error);
            }
            else{
                $idPedido=0;
                $query = sprintf("SELECT pedido_activo FROM usuarios WHERE username='%s'",  $conexion->real_escape_string($usuario));
                $result = $conexion->query($query);
                $row = $result->fetch_assoc();
                $idPedido=$row['pedido_activo'];

                //Creamos un pedido
                if($idPedido==NULL){
                    $query=sprintf("INSERT INTO pedidos (usuario) VALUES ('%s')",  $conexion->real_escape_string($usuario));
                    $result = $conexion->query($query);
                    if ($result == TRUE) {
                        //Obtener el id del pedido
                        $idPedido=$conexion->insert_id;
                        //Asignamos el id del pedido al usuario
                        $query=sprintf("UPDATE usuarios SET pedido_activo='%s' WHERE username='%s'"
                        , $conexion->real_escape_string($idPedido)
                        , $conexion->real_escape_string($usuario));
                        $result = $conexion->query($query);
                        if($result==FALSE){
                            echo "Error al consultar en la BD Linea 34: (" . $conexion->errno . ") " . utf8_encode($conexion->error);
                            exit();
                        }
                    }
                }

                //Buscar todos los productos que esten asociados con el numero de pedido
                $query = sprintf("SELECT * FROM productos WHERE pedido='%s'",  $conexion->real_escape_string($idPedido));
                $result = $conexion->query($query);

                $pedido=[];
                while($row= $result->fetch_assoc()){
                    $item= [
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'precio' => $row['precio'],
                        'precio_alquiler' => $row['precio_alquiler'],
                        'descripcion' => $row['descripcion'],
                        'imagen' => $row['imagen'],
                        'cantidad' => $row['cantidad']
                    ];
                    array_push($pedido, $item);
                }
                return $pedido;
            }

        }

        public function sumarItem($id){
            $usuario=$_SESSION['username'];
            $app = aplicacion::getSingleton();
            $conexion = $app->conexionBd();
            if ($conexion->connect_error) {
                die("La conexion falló: " . $conexion->connect_error);
            }
            else{
                //Obtenemos la cantidad actual de la base de datos
                $query = sprintf("SELECT cantidad FROM productos WHERE id='%s'",
                    $conexion->real_escape_string($id));
                $result = $conexion->query($query);
                if($result){
                    $row= $result->fetch_assoc();
                    $cantidad=$row['cantidad'];
                    //Aumentamos la cantidad y la almacenamos
                    $cantidad++;
                    $query=sprintf("UPDATE productos SET cantidad = '$cantidad' WHERE id ='%s'",
                        $conexion->real_escape_string($id));
                    $result = $conexion->query($query);
                    if ($result == FALSE) {
                        echo "Error al consultar en la BD Linea 58: (" . $conexion->errno . ") " . utf8_encode($conexion->error);
                        exit();
                    }
                }
                else{
                    echo "Error al consultar en la BD Linea 85: (" . $conexion->errno . ") " . utf8_encode($conexion->error);
                    exit();
                }
            }
        }

        public function restarItem($id){
            $usuario=$_SESSION['username'];
            $app = aplicacion::getSingleton();
            $conexion = $app->conexionBd();
            if ($conexion->connect_error) {
                die("La conexion falló: " . $conexion->connect_error);
            }
            else{
                $query = sprintf("SELECT cantidad FROM productos WHERE id='%s'",
                    $conexion->real_escape_string($id));
                $result = $conexion->query($query);
                if($result){
                    $row= $result->fetch_assoc();
                    $cantidad=$row['cantidad'];
                    if($cantidad > 1){
                        $cantidad--;
                        $query=sprintf("UPDATE productos SET cantidad = '$cantidad' WHERE id ='%s'",
                            $conexion->real_escape_string($id));
                        $result = $conexion->query($query);
                        if ($result == FALSE) {
                            echo "Error al consultar en la BD Linea 58: (" . $conexion->errno . ") " . utf8_encode($conexion->error);
                            exit();
                        }
                    }
                }
                else{
                    echo "Error al consultar en la BD Linea 85: (" . $conexion->errno . ") " . utf8_encode($conexion->error);
                    exit();
                }
            }
        }

        public function tramitar(){
            $usuario=$_SESSION['username'];
            //Cambiar el estado de los productos a comprados
            $app = aplicacion::getSingleton();
            $conexion = $app->conexionBd();
            if ($conexion->connect_error) {
                die("La conexion falló: " . $conexion->connect_error);
            }
            else{
            $query=sprintf("UPDATE productos SET estado='%s' WHERE usuario='%s'"
                , $conexion->real_escape_string("pagado")
                , $conexion->real_escape_string($usuario));
                $result = $conexion->query($query);
                if($result){
                    //Cambiar la fecha_entrega y estado en la tabla pedidos.
                    $query=sprintf("UPDATE pedidos SET estado='%s' WHERE usuario='%s'"
                        , $conexion->real_escape_string("PAGADO")
                        , $conexion->real_escape_string($usuario));
                    $result = $conexion->query($query);
                    if($result){
                        //Eliminar valor del campo pedido_activo en la tabla usuarios.
                        $query=sprintf("UPDATE usuarios SET pedido_activo=NULL WHERE username='%s'"
                            , $conexion->real_escape_string($usuario));
                         $result = $conexion->query($query);
                         if(!$result){
                            echo "Error al consultar en la BD Linea 202: (" . $conexion->errno . ") " . utf8_encode($conexion->error);
                            exit();
                         }
                    }else{
                        echo "Error al consultar en la BD Linea 206: (" . $conexion->errno . ") " . utf8_encode($conexion->error);
                        exit();
                    }
                }
                else{
                    echo "Error al consultar en la BD Linea 211: (" . $conexion->errno . ") " . utf8_encode($conexion->error);
                    exit();
                }
            }
        }
    }

?>
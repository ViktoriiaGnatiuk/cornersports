<?php
    require_once __DIR__.' /config.php';
    require_once __DIR__ . '/aplicacion.php';
    
    class carrito
    {
        public function addItem($id, $usuario){
            $app = aplicacion::getSingleton();
            $conexion = $app->conexionBd();
            if ($conexion->connect_error) {
                die("La conexion falló: " . $conexion->connect_error);
            }
            else{
                $idPedido=0;
                $query = "SELECT pedido_activo FROM usuarios WHERE username=$usuario";
                $result = $conexion->query($query);
                $row = mysqli_fetch_assoc($result);
                $idPedido=$row['pedido_actual'];
        
                //Creamos un pedido
                if($idPedido==NULL){
                    $query="INSERT INTO pedidos (usuario) VALUES ($usuario)";
                    $result = $conexion->query($query);
                    if ($result == TRUE) {
                        //Obtener el id del pedido
                        $idPedido=$conexion->insert_id;
                    }
                    else{
                        die("La inserción fallo: " . $conexion->connect_error);
                    }
                }

                //Extraemos la información de los productos ofertados
                $query = "SELECT * FROM productos_disponibles WHERE id=$id";
                $result = $conexion->query($query);
                $row = mysqli_fetch_assoc($result);
                $nombre = $row['nombre'];
                $tipo = $row['tipo'];
                $imagen = $row['imagen'];
                $descripcion = $row['descripcion'];
                $precio = $row['precio'];
                $precio_alquiler = $row['precio_alquiler'];

                //Vemos si el pedido tiene un producto con ese id
                $query = "SELECT * FROM productos WHERE pedido=$idPedido AND nombre=$nombre";
                $result = $conexion->query($query);
                if($result->num_rows > 0){
                    $row = mysqli_fetch_assoc($result);
                    $idProducto=$row['id'];
                    $cantidad=$row['cantidad']+1;
                    $query="UPDATE productos SET cantidad = '$cantidad' WHERE id = '$idProducto'";
                    $result = $conexion->query($query);
                    if ($result == FALSE) {
                        die("La actualización falló: " . $conexion->connect_error);
                    }
                }
                else{
                    //Creamos un nuevo producto y lo asociamos al pedido
                    $query="INSERT INTO productos (nombre, precio, tipo, precio_alquiler, descripcion, 
                        imagen, pedido) VALUES ($nombre, $precio, $tipo, $precio_alquiler, $descripcion,
                        $imagen, $idPedido)";
                    $result = $conexion->query($query);
                    if ($result == FALSE) {
                        die("La inserción falló: " . $conexion->connect_error);
                    }
                }
            }
        }

        public function removeItem($usuario, $nombre){

        }
        public function getSize(){
            $usuario=$_SESSION['username'];
            $idPedido=0;
            $app = aplicacion::getSingleton();
            $conexion = $app->conexionBd();
            if ($conexion->connect_error) {
                die("La conexion falló: " . $conexion->connect_error);
            }
            else{
                $idPedido=0;
                $query = "SELECT pedido_activo FROM usuarios WHERE username=$usuario";
                $result = $conexion->query($query);
                $row = mysqli_fetch_assoc($result);
                if($row['pedido_activo'==NULL]){
                    return 0;
                }
                $idPedido=$row['pedido_activo'];

                //Buscar todos los productos que esten asociados con el numero de pedido
                $query = "SELECT * FROM productos WHERE pedido=$idPedido";
                $result = $conexion->query($query);
                return $result->num_rows;
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
                $query = "SELECT pedido_activo FROM usuarios WHERE username=$usuario";
                $result = $conexion->query($query);
                $row = mysqli_fetch_assoc($result);
                $idPedido=$row['pedido_activo'];

                //Creamos un pedido
                if($idPedido==NULL){
                    $query="INSERT INTO pedidos (usuario) VALUES ($usuario)";
                    $result = $conexion->query($query);
                    if ($result == TRUE) {
                        //Obtener el id del pedido
                        $idPedido=$conexion->insert_id;
                    }
                    else{
                        die("La inserción fallo: " . $conexion->connect_error);
                    }
                }

                //Buscar todos los productos que esten asociados con el numero de pedido
                $query = "SELECT * FROM productos WHERE pedido=$idPedido";
                $result = $conexion->query($query);

                $pedido=[];
                while($row= $result->fetch(PDO::FETCH_ASSOC)){
                    $item= [
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
        public function tramitarPedido(){
            //Cambiar el estado de los productos a comprados
            //Cambiar la fecha_entrega y estado en la tabla pedidos.
            //Eliminar valor del campo pedido_actual en la tabla usuarios.
        }
    }

?>
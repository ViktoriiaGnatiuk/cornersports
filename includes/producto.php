<?php
    require_once __DIR__.' /config.php';
    require_once __DIR__ . '/aplicacion.php';

    class producto
    {
        private $id;
        private $nombre;
        private $precio;
        private $imagen;
        private $cantidad=1;

        public function __construct($id){
            $this->id=$id;
            $app = aplicacion::getSingleton();
            $conexion = $app->conexionBd();
            $tbl_name = "productos_disponibles";
            if ($conexion->connect_error) {
                die("La conexion falló: " . $conexion->connect_error);
            }
            else{
                $query = "SELECT * FROM $tbl_name WHERE id = '$id'";
                $result = $conexion->query($query);
                $row = mysqli_fetch_assoc($result);
                $this->nombre=$row['nombre'];
                $this->precio=$row['precio'];
                $this->imagen=$row['imagen'];
            }
        }

        public function getId(){
            return $this->id;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function getPrecio(){
            return $this->precio;
        }
        
        public function getImagen(){
            return $this->imagen;
        }

        public function getCantidad(){
            return $this->cantidad;
        }

        public function aumentarCantidad(){
            $this->cantidad++;
        }

        public function disminuirCantidad(){
            if($this->cantidad > 0){
                $this->cantidad--;
            }
        }

    }
?>
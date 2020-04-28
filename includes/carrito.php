<?php
    require_once __DIR__.' /config.php';
    require_once __DIR__ . '/aplicacion.php';
    require_once __DIR__ . '/producto.php';
    
    class carrito
    {
        private static $instancia;
        public $total=0;
        public  $numeroElementos=0;
        public  $items=array();

        private function __construct() {
        }
        
        public static function getSingleton() {
            global $instancia;
            if (  !self::$instancia instanceof self) {
                self::$instancia = new self;
    
            }
            return self::$instancia;
        }

        /**Añade un elemento al carrito, si el elemento ya estaba añadido aumenta la cantidad
         * Devuelve la posición en el array de items en la que se almacenara el producto.
         */
        public  function addItem($id){
            $pos=-1;
            $existe=false;
            $indice=0;
            $pos=$this->numeroElementos;
            foreach ($this->items as $i => $value) {
                if($this->items[$i]->getId() == $id){
                    $existe=true;
                    $indice=$i;
                }
            }
            if($existe){
                $pos=$indice;
                $this->items[$indice]->aumentarCantidad();
                $this->total=$this->total + $this->items[$indice]->getPrecio();
            }
            else{
                $pos=$this->numeroElementos;
                $this->items[$this->numeroElementos]= new producto($id);
                $this->total=$this->total + $this->items[$this->numeroElementos]->getPrecio();
                $this->numeroElementos++;
            }
            return $pos;
        }

        public function removeItem($id){
            $existe=false;
            $indice=0;
            foreach ($this->items as $i => $value) {
                if($this->items[$i]->getId() == $id){
                    $existe=true;
                    $indice=$i;
                }
            }
            if($existe){
                $this->items[$indice]->disminuirCantidad();
                $this->total=$this->total - $items[$indice]->getPrecio();
                if($this->items[$indice]->getCantidad() == 0){
                    unset($this->items[$indice]); 
                    $this->numeroElementos--;
                }
            }
        }

        public function getNombre($pos){
            return $this->items[$pos]->getNombre();
        }

        public function getPrecio($pos){
            return $this->items[$pos]->getPrecio();
        }
        
        public function getImagen($pos){
            return $this->items[$pos]->getImagen();
        }

        public function getCantidad($pos){
           return $this->items[$pos]->getCantidad();
        }

        public function getSize(){
            return $this->numeroElementos;
        }

        public function getTotal(){
            return $this->total;
        }
        public function tramitarCarrito(){
            //crear pedido
            //añadir todos los elementos a pedido
            //eliminar todos los elementos del carrito
            foreach ($this->items as $i => $value) {
                unset($this->items[$i]); 
            }
            $this->numeroElementos=0;
        }

    }
?>
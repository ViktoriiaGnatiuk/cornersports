<?php
require_once __DIR__ .'/carrito.php';
?>
<!DOCTYPE html>
<html>
    <head>
         <link rel="stylesheet" href="http://localhost/cornersports/estilos/pushbar.css"/>
         <link rel="stylesheet" href="http://localhost/cornersports/estilos/estiloCarroSofisticado.css"/>
        <script src="http://localhost/cornersports/js/jquery-3.5.0.js"></script>
    </head>
    <body>
        <button class="btn-menu" data-pushbar-target="pushbar"><img src="http://localhost/cornersports/img/carro24.png" width="30" height="30"></i></button>
        <div data-pushbar-id="pushbar" class="push" data-pushbar-direction="right">
        <div class="btn-cerrar_sof">
        <button data-pushbar-close class="botonCerrar_sof"><img src="img/cerrar.png"></button>
        </div>
        <div class="carro_sof">
        <p class="tituloCarro_sof">Carrito</p>
        <?php
            if(isset($_SESSION['loged'])){
                //Cargar todos los productos del carro
                $carrito = new carrito();
                $items=$carrito->getCarrito();
                $i=0;
                $size=$carrito->getSize();
                $total=0;
                while($i < $size){
                    $id=$items[$i]['id'];
                    $nombre = $items[$i]['nombre'];
                    $precio = $items[$i]['precio'];
                    $imagen = $items[$i]['imagen'];
                    $cantidad = $items[$i]['cantidad'];
                    $precio = $precio*$cantidad;
                    $total+=$precio;
                    $html = <<<EOF
                    <div class="item_sof" id="$i">
                    <div class="item_sup">
                        <img src="$imagen" width="60" height="60">
                        <p class="nombreItem_sof">$nombre</p>
                    </div>
                        <div class="datosItem_sof">
                            <p class="precioItem_sof">$precio €</p>
                            <div class="botonesCarro_sof">
                                <button class="restarItem_sof">-</button>
                                <p class="cantidadItem_sof">$cantidad</p>
                                <button class="sumaItem_sof">+</button>
                            </div>
                        </div> 
                    </div>
                    EOF;
                    echo "$html";
                    ++$i;
                }
            }
        ?>
        </div>
            <div class="inferior_sof">
            <div class="total_sof"><p>Total:</p><p>35,99 $</p></div>
            <button class="tramitar_sof">Tramitar pedido</button>
            </div>
        </div>
        <script src="http://localhost/cornersports/js/pushbar.js"></script>
        <script>
            var pushbar=new Pushbar({
                blur: true,
                overlay: true
            });
        </script>
    </body>
</html>
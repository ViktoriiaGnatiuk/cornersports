<?php
    require_once __DIR__.'/config.php';
    require_once __DIR__ . '/carrito.php';
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="http://localhost/cornersports/estilos/estiloCarro.css?v=<?php echo(rand()); ?>" />
    <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
    </head>
    <body>
        <div id="contenedor">
        <?php
            if(!$_SESSION['loged']){
                $_SESSION['error']="Debes iniciar sesión para continuar";
                header('Location: http://localhost/cornersports/login.php');
            }
            include __DIR__.'/estructura/cabecera.php';
        ?>
        <div id="contenido2">
            <div class="carro">
                <p class="tituloCarro"> Carro de la compra</p>
                <?php
                
                    $carrito = new carrito();
                    $items=$carrito->getCarrito();
                    $i=0;
                    $size=$carrito->getSize();
                    $total=0;
                    while($i < $size){
                        $id=$items[$i]['id'];
                        $nombre = $items[$i]['nombre'];
                        $precio = $items[$i]['precio'];
                        $precio_alquiler = $items[$i]['precio_alquiler'];
                        $descripcion = $items[$i]['descripcion'];
                        $imagen = $items[$i]['imagen'];
                        $cantidad = $items[$i]['cantidad'];
                        $total+=$precio*$cantidad;
                        $html = <<<EOF
                        <div class="item" id="$i">
                            <img class="imagenCarro" src="$imagen">
                            <div class="datosItem">
                                <div class="nombreItem"><p>$nombre</p> </div>
                                <div class="descripcionItem"><p>$descripcion</p></div>
                                <div class="precioItem"><p>$precio €</p></div>
                            </div> 
                            <div class="botonesCarro">
                                <button class="restarItem" onclick='
                                if(document.getElementById("cantidad$id").innerHTML > 0){
                                    document.getElementById("cantidad$id").innerHTML--
                                }'>-</button>
                                <p  class="cantidadItem" id="cantidad$id">$cantidad</p>
                                <button class="sumaItem " onclick='document.getElementById("cantidad$id").innerHTML++'>+</button>
                                <form action="http://localhost/cornersports/procesos/eliminarItem.php?$id" method="post">
                                <input type="submit" class="eliminaItem" value="Eliminar">
                                </form>
                            </div>
                        </div>
                        EOF;
                        echo "$html";
                        ++$i;
                    }
                    $html = <<<EOF
                    </div>
                        <div class="inferior">
                        <div class="total"> <p>Total:</p> <p>$total €</p></div>
                        <form action="http://localhost/cornersports/procesos/tramitarPedido.php" id="form_session" method="post">
                        <input type="submit" class="tramitar" value="Tramitar pedido">
                        </form>
                    EOF;
                    echo"$html";
                   
                ?>
            </div>
        </div>
        <?php
            include __DIR__.'/estructura/pie.php';
        ?>
        </div>
    </body>
</html>
<?php
    require_once __DIR__.'/config.php';
    require_once __DIR__ . '/carrito.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CARRITO</title>
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
                        if(isset($_SESSION['errorCarrito'])){
                            $mensaje=$_SESSION['errorCarrito'];
                            unset($_SESSION['errorCarrito']);
                            $html = <<<EOF
                                <p class="errorCarro">$mensaje</p>
                            EOF;
                            echo $mensaje;
                        }
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
                            $precio = $precio*$cantidad;
                            $total+=$precio;
                            $html = <<<EOF
                            <div class="item" id="$i">
                                <img class="imagenCarro" src="$imagen">
                                <div class="datosItem">
                                    <div class="nombreItem"><p>$nombre</p> </div>
                                    <div class="descripcionItem"><p>$descripcion</p></div>
                                    <div class="precioItem"><p>$precio €</p></div>
                                </div> 
                                <div class="botonesCarro">
                                    <form action="http://localhost/cornersports/procesos/restarItem.php?id=$id" method="post">
                                        <input type="submit" class="restarItem" value="-">
                                    </form>
                                    <p  class="cantidadItem" id="cantidad">$cantidad</p>
                                    <form action="http://localhost/cornersports/procesos/sumarItem.php?id=$id" method="post">
                                        <input type="submit" class="sumaItem" value="+">
                                    </form>
                                    <form action="http://localhost/cornersports/procesos/eliminarItem.php?id=$id" method="post">
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
        </div>
    </body>
</html>
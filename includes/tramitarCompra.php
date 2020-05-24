<?php
require_once __DIR__.'/config.php';
require_once __DIR__ .'/carrito.php';
require_once __DIR__.'/usuario.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tramitar pedido</title>
        <link rel="stylesheet" href="http://localhost/cornersports/estilos/estilo_tramitar_pedido.css?v=<?php echo(rand()); ?>" />
        <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
        <script src="http://localhost/cornersports/js/jquery-3.5.0.js"></script>
        <script>

        </script>
    </head>
    <body>
        <div id="contenedor">
        <?php
            include __DIR__.'/estructura/cabecera.php';
        ?>
            <div id="tramitar_pedido">
                <div class="contender_tramitar">
                    
                    <?php
                        $carrito = new carrito();
                        $items=$carrito->getCarrito();
                        $i=0;
                        $size=$carrito->getSize();
                        $real_size =  $carrito->getSizeReal();
                        echo"<p class=\"titulo_tramitar\">$real_size Productos</p>";
                        $total=0;
                        while($i < $size){
                            $id=$items[$i]['id'];
                            $nombre = $items[$i]['nombre'];
                            $precio = $items[$i]['precio'];
                            $imagen = $items[$i]['imagen'];
                            $cantidad = $items[$i]['cantidad'];
                            $precio = $precio*$cantidad;
                            $ud = "Ud";
                            if($cantidad > 1){
                                $ud = "Uds";
                            }
                            $total+=$precio;
                            $html = <<<EOF
                                <div class="item_tramitar">
                                    <img class="imagen_tramitar" src="$imagen">
                                    <div class="txt_item_nombre"><p>$nombre</p> </div>
                                    <div class="txt_item_unidad"><p>$cantidad $ud</p></div>
                                    <div class="txt_item_precio"><p>$precio €</p></div>
                                </div>
                            EOF;
                            echo "$html";
                            ++$i;
                        }
                        $html = <<<EOF
                            <div class="inf_productos_tramitar">
                                <form action="http://localhost/cornersports/procesos/aplicarDescuento.php" id="codigo_descuento" method="post">
                                    <input id="cod_desc" name="cod_desc" class="field" placeholder="Código descuento">
                                    <input type="submit" class="aplicar" value="Aplicar">
                                </form>
                                <div class="total"> <p>Total:</p> <p>$total €</p></div>
                            </div>
                        EOF;
                        echo"$html";
                    ?>
                </div>
                <div class="contender_tramitar2">
                <div class="contender_tramitar">
                    <p class="titulo_tramitar">Tipo de entrega</p>
                    <div class="tipo_entrega">
                        <div class="estandar">
                            <input id="estandar" type="radio" name="option" value="estandar">Estandar: &nbsp5 días habiles &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp0 €
                        </div>
                        <div class="premium">
                            <input id="premium" type="radio" name="option" value="premium" >Premium:  &nbsp3 días habiles &nbsp2,99 €
                        </div>
                        <div class="express">
                            <input id="express" type="radio" name="option" value="express" >Express:  &nbsp&nbsp&nbsp&nbsp1 día habil &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp4,99 €
                        </div>
                    </div>
                </div>
                <div class="contender_tramitar">
                    <p class="titulo_tramitar">Dirección de envío</p>
                    <?php
                        $nombreUsuario = $_SESSION['username'];
                        $usuario=Usuario::buscaUsuario($nombreUsuario);
                        $nombre = $usuario->nombre();
                        $apellidos = $usuario->apellidos();
                        $provincia = $usuario->provincia();
                        $localidad = $usuario->localidad();
                        $codPostal = $usuario->codPostal();
                        $calle = $usuario->calle();
                        $portal=$usuario->portal();
                        $html = <<<EOF
                            <p> $nombre $apellidos</p>
                            <p>$localidad $provincia $codPostal</p>
                            <p>$calle $portal</p>
                        EOF;
                        echo"$html";
                    ?>
                </div>
                </div>
                <div class="contenedor_pago">
                    <p class="titulo_tramitar">Metodo de pago</p>
                    <div class="tarjetas">
                        <img class="imagen_tarjeta" src="http://localhost/cornersports/img/visa.png">
                        <img class="imagen_tarjeta" src="http://localhost/cornersports/img/mastercard.png">
                        <img class="imagen_tarjeta" src="http://localhost/cornersports/img/6000.jpg">
                        <img class="imagen_tarjeta" src="http://localhost/cornersports/img/america.png">
                    </div>
                    <form action="http://localhost/cornersports/procesos/tramitarPedido.php" method="POST">
                        <div class="metodo_pago">
                            <div class="celda">
                                <p>Número de tarjeta&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p><input name="num" class="field">
                            </div>
                            <div class="celda">
                                <p>Nombre del titular&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p><input name="titular" class="field">
                            </div>
                            <div class="celda">
                                <p>Fecha de vencimiento&nbsp</p>
                                <input type="date" id="start" name="caducidad"
                                    value="2020-01-01">
                            </div>
                        </div>
                        <input type="submit" class="tramitar" value="Tramitar pedido">
                    </form>
                </div>
            </div>
        <?php
            include __DIR__.'/estructura/pie.php';
        ?>
        </div>
    </body>
</html>
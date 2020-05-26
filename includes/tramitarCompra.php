<?php
require_once __DIR__.'/config.php';
if(!isset($_SESSION['loged'])){
    header('Location: ../index.php');
}
require_once __DIR__ .'/carrito.php';
require_once __DIR__.'/usuario.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tramitar pedido</title>
        <link rel="stylesheet" href="../estilos/estilo_tramitar_pedido.css"/>
        <script src="../js/jquery-3.5.0.js"></script>
	    <script type="text/javascript" src="../js/tramitarPedido.js"></script>
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
                                <div id="codigo_descuento">
                                    <input id="cod_desc" name="cod_desc" class="field" placeholder="Código descuento">
                                    <input type="submit" class="aplicar" value="Aplicar">
                                </div>
                                <p id="total_real" hidden>$total</p>
                                <div class="total_tr"> <p>Total:&nbsp&nbsp</p><p id="tr_t">$total</p><p>€</p></div>
                            </div>
                        EOF;
                        echo"$html";
                    ?>
                </div>
                <div class="contender_tramitar2">
                <div class="contender_tramitar">
                    <p class="titulo_tramitar">Tipo de entrega</p>
                    <div class="tipo_entrega">
                        <form action="../procesos/tramitarPedido.php" id="form_tr" method="post">
                        <div class="estandar">
                            <input class="r" id="estandar" type="radio" name="option" value="estandar" checked>Estandar: &nbsp5 días habiles &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp0 €
                        </div>
                        <div class="premium">
                            <input class="r" id="premium" type="radio" name="option" value="premium" >Premium:  &nbsp3 días habiles &nbsp2,99 €
                        </div>
                        <div class="express">
                            <input class="r" id="express" type="radio" name="option" value="express" >Express:  &nbsp&nbsp&nbsp&nbsp1 día habil &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp4,99 €
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
                        <img class="imagen_tarjeta" src="../img/visa.png">
                        <img class="imagen_tarjeta" src="../img/mastercard.png">
                        <img class="imagen_tarjeta" src="../img/6000.jpg">
                        <img class="imagen_tarjeta" src="../img/america.png">
                    </div>
                        <div class="metodo_pago">
                            <div class="celda">
                                <p>Número de tarjeta&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p><input id="num_tarj" name="num" class="field" maxlength=16>
                            </div>
                            <div class="celda">
                                <p>Nombre del titular&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p><input id="titular_tr" name="titular" class="field" required>
                            </div>
                            <div class="celda">
                                <p>Fecha de vencimiento&nbsp</p>
                                <input type="date" id="fecha_venc" name="caducidad"
                                    value="2020-01-01">
                            </div>
                        </div>
                        <input type="button" id="tr_tramitar_pedido" value="Tramitar pedido">
                        </form>
                </div>
            </div>
        <?php
            include __DIR__.'/estructura/pie.php';
        ?>
        </div>
    </body>
</html>
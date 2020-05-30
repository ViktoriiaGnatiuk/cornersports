<?php
require_once __DIR__.'/config.php';
if(!isset($_SESSION['loged'])){
    header('Location: ../index.php');
}
require_once __DIR__ .'/entrenadores.php';
require_once __DIR__.'/usuario.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tramitar entrenamiento</title>
        <link rel="stylesheet" href="../estilos/estilo_tramitar_pedido.css"/>
        <script src="../js/jquery-3.5.0.js"></script>
	    <script type="text/javascript" src="../js/tramitarEntrenamiento.js"></script>
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
                        $entrenadores = new entrenadores();
                        $i=0;
                        $size=$entrenadores->getSize("entrenamientos_disponibles");
						$items=$entrenadores->getEntrenadores($id);
                        echo"<p class=\"titulo_tramitar\">Entrenamientos</p>";
                        $total=0;
                        while($i < $size){
							$imagen = $items[$i]['imagen'];
							$nombre = $items[$i]['nombre'];
							$precio = $items[$i]['precio'];
							$dificultad = $items[$i]['dificultad'];
                            $total+=$precio;
                            $html = <<<EOF
                                <div class="item_tramitar">
                                    <img class="imagen_tramitar" src="$imagen">
                                    <div class="txt_item_nombre"><p>$nombre</p> </div>
                                    <div class="txt_item_unidad"><p>$dificultad</p></div>
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
                        <input type="button" id="$id" class="b_entrenamiento" value="Tramitar pedido">
                        </form>
                </div>
            </div>
        <?php
            include __DIR__.'/estructura/pie.php';
        ?>
        </div>
    </body>
</html>
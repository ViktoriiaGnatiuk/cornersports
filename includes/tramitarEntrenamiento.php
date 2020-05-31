<?php
require_once __DIR__.'/config.php';
if(!isset($_SESSION['loged'])){
    $_SESSION['error']="<p class=\"error\">Debes iniciar sesión para continuar.</p>";
    header('Location: ../login.php');
}
require_once __DIR__ .'/entrenadores.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tramitar entrenamiento</title>
        <link rel="stylesheet" href="../estilos/estilo_tramitar_pedido.css"/>
        <script src="../js/jquery-3.5.0.js"></script>
	    <script type="text/javascript" src="../js/tramitarEntrenamiento.js"></script>
        <link rel="stylesheet" href="../estilos/estilo_tramitar_entrenamiento.css"/>
    </head>
    <body>
        <div id="contenedor">
        <?php
            include __DIR__.'/estructura/cabecera.php';
        ?>
            <div id="tramitar_pedido">
            <center/><h2 class="mensaje_tramitado" hidden>Se ha contratado el entrenamiento con exito</h2>
                <div class="contender_tramitar">
                    <?php
						$id=$_GET["id"];
						$entr=new entrenadores();
                        $entrenamientos=$entr->getEntrenamientos($id, false);
						$imagen = $entrenamientos[0]['imagen'];
						$nombre = $entrenamientos[0]['nombre'];
						$descripcion = $entrenamientos[0]['descripcion'];
						$dias = $entrenamientos[0]['dias'];
						$precio = $entrenamientos[0]['precio'];
						$entrenador = $entrenamientos[0]['entrenador'];
						$dificultad = $entrenamientos[0]['dificultad'];
						$datos_entrenador = $entr->getEntrenadores($entrenador);
						$imagen_entrenador = $datos_entrenador[0]['imagen'];
						$dificultad_icon="../img/dificil.png";
						if($dificultad=="BAJA"){
							$dificultad_icon="../img/facil.png";
						}
						else if($dificultad=="MEDIA")
						{
							$dificultad_icon="../img/medio.png";
						}
$html = <<<EOF
<div class="entrenamiento" identificador="$id">
<div class="nombre_entrenamiento"><p>$nombre</p></div>
<img class="imagen_entrenamiento" src="$imagen">
<div class="base">
<div class="info">
<div class="descripcion_entrenamiento">
<p>$descripcion</p>
</div>
<div class="info_interior">
<div class="dificultad_int">
<p class="dificultad">Dificultad: </p>
<img class="dificultad_icon" src="$dificultad_icon">
</div>
<p class="dificultad">Días: $dias</p>
<p class="precio">Precio: $precio €</p>
</div>
</div>
<div class="entrenador_info">
<p> Entrenador </p>
<img class="entrenamiento_entrenador" src="$imagen_entrenador">
</div>
</div>
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
                        <input type="button" id="contratar_tr" value="Contratar">
                </div>
            </div>
        <?php
            include __DIR__.'/estructura/pie.php';
        ?>
        </div>
    </body>
</html>

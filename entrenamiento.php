<?php
    require_once __DIR__.'/includes/config.php';
    require_once __DIR__.'/includes/entrenadores.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ENTRENAMIENTOS</title>
        <link rel="stylesheet" href="estilos/estiloEntrenamiento.css?v=<?php echo(rand()); ?>" />
        <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
    </head>
    <body>
        <div id="contenedor">
            <?php
                include __DIR__.'/includes/estructura/cabecera.php';
            ?>
            <div id="contenido">
                <div class="main_entrenamientos">
                    <?php
                        $entr=new entrenadores();
                        $i=0;
                        $size=0;
                        $size=$entr->getSize("entrenamientos_disponibles");
                        $entrenamientos=$entr->getEntrenamientos("");

                        while($i < $size){
                            $id = $entrenamientos[$i]['id'];	
                            $imagen = $entrenamientos[$i]['imagen'];
                            $nombre = $entrenamientos[$i]['nombre'];
                            $descripcion = $entrenamientos[$i]['descripcion'];
                            $dias = $entrenamientos[$i]['dias'];
                            $precio = $entrenamientos[$i]['precio'];
                            $entrenador = $entrenamientos[$i]['entrenador'];
                            $dificultad = $entrenamientos[$i]['dificultad'];
                            $datos_entrenador = $entr->getEntrenadores($entrenador);
                            $imagen_entrenador = $datos_entrenador[0]['imagen'];
                            $dificultad_icon="http://localhost/cornersports/img/dificil.png";
                            if($dificultad=="BAJA"){
                                $dificultad_icon="http://localhost/cornersports/img/facil.png";
                            }
                            else if($dificultad=="MEDIA")
                            {
                                $dificultad_icon="http://localhost/cornersports/img/medio.png";
                            }
                            $html = <<<EOF
                            <div class="entrenamiento">
                                <div class="nombre_entrenamiento"><p>$nombre</p></div>
                                <img class="imagen_entrenamiento" src="$imagen">
                                <div class="base">
                                    <div class="info">
                                        <div class="info_interior">
                                            <div class="dificultad_int">
                                                <p class="dificultad">Dificultad: </p>
                                                <img class="dificultad_icon" src="$dificultad_icon">
                                            </div>
                                            <p class="dificultad">Días: $dias</p>
                                            <p class="dificultad">Precio: $precio €</p>
                                            <form action="procesos/procesarEntreno.php?id=$id" id="form_session" method="post">
                                                <input type="submit" class="b_entrenamiento" value="CONTRATAR">
                                            </form>
                                        </div>
                                        <div class="descripcion_entrenamiento">
                                            <p>$descripcion</p>
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
    
                            ++$i;
                        }
                    ?>
                </div>
            </div>
            <?php
                include __DIR__.'/includes/estructura/sidebarTrain.php';
                //include __DIR__.'/includes/estructura/pie.php';
            ?>
        </div>
    </body>
</html>

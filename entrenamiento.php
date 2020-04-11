<?php
require_once __DIR__.'/includes/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Entrenamientos</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
        <div id="contenedor">
        <?php
            include __DIR__.'/includes/estructura/cabecera.php';
        ?>
        <div id="contenido">
            <div id="interior">
                <div id="entreno_1">
                    <img src="https://www.elnuevoherald.com/vivir-mejor/salud/wnhptb/picture85493327/alternates/FREE_1140/WQD00%20Women%20News%20rk" width="500" height="330">
                    <div id="texto-encima">Entrenamiento personal en gimnasio</div>
                    <div id="entrenador">Entrenador: Sergio Crespillo Campos
                        <button><a href="procesarEntreno.php?id=1">CONTRATAR</a></button>
                    </div>
                </div>
                
                <div id="entreno_2">
                    <img src="https://uecluster.blob.core.windows.net/images/1506064164_shutterstock-314336384-b-jpg.jpg" width="500" height="330">
                    <div id="texto-encima">Entrenamiento Definición </div>
                    <div id="entrenador">Entrenador: Antonio Garcia Pinedo
                        <button><a href="procesarEntreno.php?id=2">CONTRATAR</a></button>
                    </div>
                </div>
            </div>
        </div>
        <?php
            include __DIR__.'/includes/estructura/sidebarTrain.php';
            include __DIR__.'/includes/estructura/pie.php';
        ?>
        </div>
    </body>
</html>
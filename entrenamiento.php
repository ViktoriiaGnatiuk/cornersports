<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Entrenamientos</title>
        <meta charset="UTF-8"/>
		<style type="text/css">
			.entreno_1 {
				position: relative;
				display: inline-block;
			}
			.entreno_2 {
				position: relative;
				display: inline-block;
			}
			.texto-encima{
				position: absolute;
				top: 10px;
				left: 10px;
				color:#FFFFFF;
				background-color:#A81010;
				padding:2px 10px;
				font-weight:bold;
			}
			.entrenador
			{
				position: relative;
				bottom:25px;
				color:#FFFFFF;
				background-color:#EB4D1D;
				padding:2px 10px;
				font-weight:bold;
			}
		</style>
    </head>
    <body>
        <div id="contenedor">
        <?php
            include"cabecera.php";
            include"sidebarleft.php";
        ?>
        <div id="contenido">
			<div class="entreno_1">
				<img src="https://www.elnuevoherald.com/vivir-mejor/salud/wnhptb/picture85493327/alternates/FREE_1140/WQD00%20Women%20News%20rk" width="500" height="330">
				<div class="texto-encima">Entrenamiento personal en gimnasio</div>
				<div class="entrenador">Entrenador: Sergio Crespillo Campos
					<button><a href="procesarEntreno.php?id=1">CONTRATAR</a></button>
				</div>
			</div>
			
			<div class="entreno_2">
				<img src="https://uecluster.blob.core.windows.net/images/1506064164_shutterstock-314336384-b-jpg.jpg" width="500" height="330">
				<div class="texto-encima">Entrenamiento Definición </div>
				<div class="entrenador">Entrenador: Antonio Garcia Pinedo
					<button><a href="procesarEntreno.php?id=2">CONTRATAR</a></button>
				</div>
			</div>
        </div>
        <?php
            include"sidebarTrain.php";
            include"pie.php";
        ?>
        </div>
    </body>
</html>
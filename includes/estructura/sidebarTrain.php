<?php
	require_once __DIR__.' /../config.php';
	require_once __DIR__.' /../entrenadores.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" href="estilos/estiloEntrenamiento.css?v=<?php echo(rand()); ?>" />
    <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
</head>
	<body>
		<div class="main_barra_entrenadores">
			<div class ="barra_entrenadores">
				<?php
					$entr=new entrenadores();
					$i=0;
					$size=0;
					$size=$entr->getSize("entrenadores");
					$entrenadores=$entr->getEntrenadores("");
					echo "<p class=\"titulo_entrenadores\">-ENTRENADORES-</p>";
					while($i < $size){
						$id = $entrenadores[$i]['id'];	
						$imagen = $entrenadores[$i]['imagen'];
						$especialidad = $entrenadores[$i]['especialidad'];
						$puntuacion = $entrenadores[$i]['puntuacion'];
						$estrellas;
						if($puntuacion==5){
							$estrellas="http://localhost/cornersports/img/5estrellas.png";
						}
						else if($puntuacion==4){
							$estrellas="http://localhost/cornersports/img/4estrellas.png";
						}
						else{
							$estrellas="http://localhost/cornersports/img/3estrellas.png";
						}

						$html = <<<EOF
						<div class="entrenador">
							<img class="puntuacion" src="$estrellas">
							<a href="http://localhost/cornersports/entrenador.php?id=$id"><img class="imagen_entrenador" src="$imagen"></a>
							<div class="especialidad"><p>ESPECIALIDAD: $especialidad</p></div>
						</div>
						EOF;
						echo"$html";

						++$i;
					}

				?>
			</div>
		</div>
	</body>

</html>

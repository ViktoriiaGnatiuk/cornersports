<?php
require_once __DIR__.'/../config.php';
?>
<!DOCTYPE html>
<html>
	<head>	
		<meta charset="utf-8">
	</head>
	<body>
		<div id="barra">
			<div id ="contenido-lateral">
				<center/><h2>OFERTAS</h2>
				<?php 
					$_SESSION['producto']=5;
					include __DIR__.'/../scripts/script_oferta_lateral.php';
					$_SESSION['producto']=6;
					include __DIR__.'/../scripts/script_oferta_lateral.php';
					$_SESSION['producto']=7;
					include __DIR__.'/../scripts/script_oferta_lateral.php';
				?>
			</div>
		</div>
	</body>

</html>
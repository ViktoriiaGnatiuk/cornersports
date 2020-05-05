
<?php
require_once __DIR__.'/../config.php';
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
	<head>
		<link rel="stylesheet" href="estilos/estiloOfertas.css?v=<?php echo(rand()); ?>" />
        <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
	</head>
	
	<body>
		<div id="barra">
			<div id ="contenido-lateral">
				<div class="oferta_1">
					<center>
					<div class="oferta">OFERTA</br><div>
					<img src="https://cdn4.elektronik-star.de/out/pictures/generated/product/6/700_700_75/10030281_05_title_Klarfit_AB-Superstar_AB_Cruncher.jpg" width="150" height="160">
					<div class="entrenador">Máquina Abdominales</br>
						<fieldset class="val-fieldset"><legend>Descuento: 25%</legend></fieldset>
					</div>
					</center>
				</div>
				
				<div class="oferta_2">
					<center>
						<div class="oferta">OFERTA</br><div>
						<img src="https://images-na.ssl-images-amazon.com/images/I/81XUJBXL7xL._SY355_.jpg" width="150" height="130">
						<div class="entrenador">Máquina Stepper</br>
							<fieldset class="val-fieldset"><legend>Descuento: 15%</legend></fieldset>
						</div>
					</center>
				</div>
			</div>
		</div>
	</body>
</html>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
	<head>
		<link rel="stylesheet" type="text/css" href="estilos/estilo.css" />
		<style>
			.val-fieldset {
			width:100px;
			border:none;
			font-weight:bold;
			font-size:12px;
			}
			.valoracion {
			width: 100px;
			height: 21px;
			display: block;
			background:url(http://lh5.googleusercontent.com/-Sp-iHFztZdc/UVD89O9oM1I/AAAAAAAAEU0/Xh-FBDaWyJY/s000/estrellas.png) 0 0 no-repeat;
			}
			.val-0 {background-position: -100px -0;}
			.val-5 {background-position: -81px -21px;}
			.val-10 {background-position: -81px 0;}
			.val-15 {background-position: -61px -21px;}
			.val-20 {background-position: -60px 0;}
			.val-25 {background-position: -40px -21px;}
			.val-30 {background-position: -40px 0;}
			.val-35 {background-position: -21px -21px;}
			.val-40 {background-position: -21px 0;} 
			.val-45 {background-position: 0 -21px;}
			.val-50 {background-position: 0 0;}
		</style>
	</head>
	
	<body>
		<div id="sidebar-right">
			 <div class="entrenador_1">
				<center>
					<img src="img/sergio.jpeg" width="150" height="150">
					<div class="entrenador">Entrenador: Sergio Crespillo Campos</br>
						<fieldset class="val-fieldset"><legend>Calificación:</legend><span class="valoracion val-40"></span></fieldset>
					</div>
				</center>
			</div>
			
			<div class="entrenador_2">
				<center>
					<img src="img/antonio.jpeg" width="150" height="130">
					<div class="entrenador">Entrenador: Antonio Garcia Pinedo</br>
						<fieldset class="val-fieldset"><legend>Calificación:</legend><span class="valoracion val-45"></span></fieldset>
					</div>
				</center>
			</div>
		
		</div>
	</body>

</html>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registro</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="boton.css">
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<style>
		body{font-family: Arial; background-color: #256999; box-sizing: border-box; padding: 100px;}

		form{
			background-color: white;
			border-radius: 0 0 3px 3px;
			color: #999;
			font-size: 0.8em;
			padding: 20px;
			margin: 0 auto;
			width: 300px;
		}

		input, textarea{
			border: 0;
			outline: none;

			width: 280px;
		}

		.field{
			border: solid 1px #ccc;
			border-radius: 0 4px 4px 0; 
			padding: 10px;
			width: 240px;
		}

		.field:focus{
			border-color: #18A383;
		}

		.center-content{
			text-align: center;
		}

		.field-container div{
			display: inline-block;
			vertical-align: top;
		}

		.field-container i{
			background-color: #eee;
			border-radius: 4px 0 0 4px; 
			color: #888;
			padding: 10px 10px 11px 10px;
			border: solid 1px #ccc;
			max-height: 35px;
			margin-right: -5px;
			vertical-align: top;
		}

		#menu ul{
			list-style: none;
			margin: 0;
			padding: 0;
		}

		#menu ul li{
			display: inline-block;
			width: 50%;
			margin-right: -4px;
		}

		#menu ul li a{
			background-color: #ccc;
			color: #222;
			display: block;
			padding: 20px 20px;
			text-decoration: none;
		}
		#menu ul li a:hover{
			background-color: #eee;
		}

		#formularios, #menu{
			margin: 0 auto;
			width: 340px;
		}

		.active{
			background-color: white !important;
		}

		.columns >div{
			width: 50%;
			display: inline-block;
			vertical-align: top;
			margin-right: -4px;
		}
		.columns .field{
			width: 80px;
		}

		#form_register{
			display: none;
		}
        .error{
			color: #FF9185;
			font-size: 12px;
			padding: 10px;
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
            <div id="formularios">
				<form action="procesarRegistro.php" id="form_session" method="post">
					<?php
						if(isset($_SESSION['loged'])){
							header('Location: index.php');
						}
						if(isset($_SESSION['errorRegistro'])){
							echo "<div class='error'>";
							echo $_SESSION['errorRegistro'];
							unset($_SESSION['errorRegistro']);
							echo "</div>";
						}
					?>
                    <br/><h1>Datos personales</h1>
					<p>Nombre:</p>
					<div class="">	
						<input name="nombre" type="text" class="field" value="<?php if(isset($_SESSION['nombre'])){echo $_SESSION['nombre'];}?>"> <br/>
					</div>
                    <p>Apellidos:</p>
					<div class="">	
						<input name="apellidos" type="text" class="field" value="<?php if(isset($_SESSION['apellidos'])){echo $_SESSION['apellidos'];}?>"> <br/>
                    </div>
                    <p>Correo electrónico:</p>
					<div class="">	
						<input name="email" type="text" class="field" placeholder="nombre@ejemplo.com" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}?>" <br/>
                    </div>
                    <br/><h1>Dirección</h1>
                    <p>Provincia:</p>
					<div class="">	
						<input name="provincia" type="text" class="field" placeholder="Madrid" value="<?php if(isset($_SESSION['provincia'])){echo $_SESSION['provincia'];}?>" <br/>
                    </div>
                    <p>Localidad:</p>
                    <div class="">	
						<input name="localidad" type="text" class="field" placeholder="Alcalá de Henares" value="<?php if(isset($_SESSION['localidad'])){echo $_SESSION['localidad'];}?>"> <br/>
                    </div>
                    <p>Codigo postal:</p>
                    <div class="">	
						<input name="codPostal" type="text" class="field" placeholder="28801" value="<?php if(isset($_SESSION['codPostal'])){echo $_SESSION['codPostal'];}?>"> <br/>
                    </div>
                    <p>Calle:</p>
                    <div class="">	
						<input name="calle" type="text" class="field" value="<?php if(isset($_SESSION['calle'])){echo $_SESSION['calle'];}?>"> <br/>
                    </div>
                    <p>Portal, puerta, escalera...:</p>
                    <div class="">	
						<input name="portal" type="text" class="field" placeholder="17, 3ºB" value="<?php if(isset($_SESSION['portal'])){echo $_SESSION['portal'];}?>"> <br/>
                    </div>

                    <br/><h1>Datos de usuario</h1>
					<p>Nombre de usuario:</p>
					<div class="">
						<input name="usuario" type="text" class="field" > <br/>
					</div>
					<p>Contraseña:</p>
					<div class="">
						<input name="password" type="password" class="field" placeholder="*******"> <br/>
					</div>
					<p>Confirmar contraseña:</p>
					<div class="">
						<input name="passwordConf" type="password" class="field" placeholder="*******"> <br/>
					</div></br>
					<p class="">
						<input type="submit" class="btn btn-green" value="Registrarse"> <br/><br/>
					</p>
					<p>
					<a href="condiciones.html">Condiciones de uso</a>
					<input type="checkbox" name="condAcept" value="true" >Acepto las condiciones de uso<br>
					</p>
				</form>	
			</div>
        </div>
        <?php
            include"sidebarright.php";
            include"pie.php";
        ?>
        </div>
    </body>
</html>
<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__.'/../includes/aplicacion.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Editar - Perfil</title>
        <meta charset="UTF-8"/>
		<script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
    </head>
    <body>
        <div id="contenedor">
            <?php
                include __DIR__.'/../includes/estructura/cabecera.php';
            ?>
			<center>
			<div id="formularios">
				<br><h2>FORMULARIO - EDITAR PERFIL</h2><br>
				<img alt="Inicio de sesión y seguridad" src="https://images-na.ssl-images-amazon.com/images/G/30/x-locale/cs/ya/images/sign-in-lock._CB485931467_.png">
				<img alt="Direcciones" src="https://images-na.ssl-images-amazon.com/images/G/30/x-locale/cs/ya/images/address-map-pin._CB485934191_.png">
				<img alt="Métodos de pago" src="https://images-na.ssl-images-amazon.com/images/G/30/x-locale/cs/ya/images/Payments._CB485926314_.png">
				<form action="includes/usuarios.php" id="form_session" method="post">
					<?php
						if(isset($_SESSION['loged']) && !($_SESSION['perfil']=="admin")){
							header('Location: http://localhost/cornersports/index.php');
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
					<p>
					<input type="submit" class="btn btn-green" value="Guardar cambios"> <br/><br/>
				</form>	
			</div>
			</center>
            <?php
                include __DIR__.'/../includes/estructura/pie.php';
            ?>
        </div>
    </body>
</html>
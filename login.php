<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/formularioLogin.php';
if(isset($_SESSION['loged'])){
header('Location: index.php');
}
if(isset($_SESSION['error'])){
$error=$_SESSION['error'];
unset($_SESSION['error']);
echo "$error";
}
$form = new FormularioLogin();
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="estilos/boton.css"/>
<link rel="stylesheet" href="estilos/estiloLogin.css"/>
</head>
<body>
<div id="contenedor">
<?php
require __DIR__.'/includes/estructura/cabecera.php';
?>
<div id="contenido2">
<div id="formularios">
<?php
$form->gestiona();
?>
</div>
</div>
<?php
require __DIR__.'/includes/estructura/pie.php';
?>
</div>
</body>
</html>
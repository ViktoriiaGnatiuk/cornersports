<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/formularioLogin.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
include __DIR__.'/includes/estructura/cabecera.php';
?>
<div id="contenido2">
<div id="formularios">
<center/>
<?php 
if(isset($_SESSION['loged'])){
header('Location: index.php');
}
if(isset($_SESSION['error'])){
$error=$_SESSION['error'];
unset($_SESSION['error']);
echo "$error";
}
$form = new FormularioLogin(); 
$form->gestiona();
?>
</div>
</div>
<?php
include __DIR__.'/includes/estructura/pie.php';
?>
</div>
</body>
</html>
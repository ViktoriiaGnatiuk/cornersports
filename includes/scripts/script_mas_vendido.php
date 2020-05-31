<?php
require_once __DIR__.'/../config.php';
require_once __DIR__.'/../aplicacion.php';
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div id="top_ventas">
<center><p class="tit_nov">NUESTRO PRODUCTO ESTRELLA</p></center>
<div id="imagen-mas-vendido">
<?php
$app = aplicacion::getSingleton();
$conexion = $app->conexionBd();
$tabla = "productos_disponibles";
if ($conexion->connect_error) {
die("La conexion falló: " . $conexion->connect_error);
}
else{
//Realizar el calculo para determinar el más vendido, para eso habría que ir a la tabla
//de productos y contabilizarlos todos para saber cual es el que mas se repite
$query = "SELECT * FROM $tabla WHERE id = '6'";
$result = $conexion->query($query);
$row = mysqli_fetch_assoc($result);
$_SESSION['nombre_producto']=$row['nombre'];
$img=$row['imagen'];
echo "<img class=\"img_top_ventas\" src=\"$img\">";
}
?>
</div>
<div id="titulo-mas-vendido">
<?php
$nombre=$_SESSION['nombre_producto'];
$id=$_SESSION['producto'];
echo "<center/><div identificador=\"$id\" class=\"button\">$nombre</div>";
?>
</div>
</div>
</body>
</html>
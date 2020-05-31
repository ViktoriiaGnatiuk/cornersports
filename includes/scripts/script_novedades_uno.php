<?php
require_once __DIR__.'/../config.php';
require_once __DIR__.'/../aplicacion.php';
?>        
<?php
$app = aplicacion::getSingleton();
$conexion = $app->conexionBd();
$tabla = "productos_disponibles";
if ($conexion->connect_error) {
die("La conexion falló: " . $conexion->connect_error);
}
else{
$id=$_SESSION['producto'];
$query = "SELECT * FROM $tabla WHERE id = '$id'";
$result = $conexion->query($query);
$row = mysqli_fetch_assoc($result);
$_SESSION['nombre_producto']=$row['nombre'];
$img=$row['imagen'];
echo "<img width='200' heigth='120' src=\"$img\">";
}
?>
<?php
$nombre=$_SESSION['nombre_producto'];
$id=$_SESSION['producto'];
echo"<div class='carousel-caption'><center/><a href=\"procesos/addItem.php?id=$id\" class=\"boton\"><h2 style='color:#A08330'>$nombre</h2></a> </div>";
?>
           
            
                
  
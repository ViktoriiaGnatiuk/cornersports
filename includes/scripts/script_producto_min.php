<?php
require_once __DIR__.'/../config.php';
require_once __DIR__.'/../aplicacion.php';
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="estilos/estilo_novedades.css"/>
</head>
<body>
<?php
$app = aplicacion::getSingleton();
$conexion = $app->conexionBd();
$tabla = "productos_disponibles";
if ($conexion->connect_error) {
die("La conexion falló: " . $conexion->connect_error);
}
else{
    $id=$_SESSION['producto'];
    $query = "SELECT * FROM $tabla";
    $result = $conexion->query($query);
    $size = $result->num_rows;
    $items=[];
    $i=0;
    while($row= $result->fetch_assoc()){
        $imagen = $row['imagen'];
        $nombre = $row['nombre'];
        $id = $row['id'];
        $html = <<<EOF
        <div class="mySlides fade">
        <img class="img_nov" src="$imagen">
        <div identificador="$id" class="botonProdMin text">$nombre</div>
        </div>
        EOF;
        echo "$html";
    }
}
?>
</body>
</html>
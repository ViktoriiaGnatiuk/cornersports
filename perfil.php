<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/aplicacion.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Perfil</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
        <div id="contenedor">
            <?php
                include __DIR__.'/includes/estructura/cabecera.php';
            ?>
            <div id="contenido">
                <div id="interior">
                    <?php 
                        $app = aplicacion::getSingleton();
                        $conexion = $app->conexionBd();
                        $tabla="usuarios";
                        if ($conexion->connect_error) {
                            die("La conexion falló: " . $conexion->connect_error);
                        }
                        else{
                            $user=$_SESSION['username'];
                            $query = "SELECT * FROM usuarios WHERE username = '$user'";
                            $result = $conexion->query($query);
                            $row = mysqli_fetch_assoc($result);
                            $nombre=$row['nombre'];
                            $apellidos=$row['apellidos'];
                            $email=$row['email'];
                            $provincia=$row['provincia'];
                            $localidad=$row['localidad'];
                            $calle=$row['calle'];
                            $codPostal=$row['codPostal'];
                            $portal=$row['portal'];
                            $perfil=$row['perfil'];
                            echo "<h2>Nombre de usuario:</h2>$user<br/>";
                            echo "<h2>Nombre:</h2>$nombre<br/>";
                            echo "<h2>Apellidos:</h2>$apellidos<br/>";
                            echo "<h2>Correo electrónico:</h2>$email<br/>";
                            echo "<h2>Provincia:</h2>$provincia";
                            echo "<h2>Localidad:</h2>$localidad";
                            echo "<h2>Código postal:</h2>$codPostal<br/>";
                            echo "<h2>Calle:</h2>$calle";
                            echo "<h2>Portal:</h2>$portal<br/>";
                            echo "<h2>Perfil:</h2>$perfil<br/>";
                        }
                    ?>
                    <input type="submit" class="btn" value="Editar">
                    <a href="registro.php"></a>
                </div>
            </div>
            <?php
                include __DIR__.'/includes/estructura/pie.php';
            ?>
        </div>
    </body>
</html>
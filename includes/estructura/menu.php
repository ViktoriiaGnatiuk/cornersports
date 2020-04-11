<!DOCTYPE html>
<html>
    <head>
        <title>HOME</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="estilos/menuStyle.css?v=<?php echo(rand()); ?>" />
        <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
    </head>
    <body>
        <nav>
            <label class="logo" ><img src="img/logo.png" width="320" height="30"></label>
            <ul>
                <li><a class ="activar" href="index.php">HOME</a></li>
                <li><a href="ofertas.php">OFERTAS</a></li>
                <li><a href="maquinaria.php">EQUIPO</a>
                    <ul>
                        <li><a href="maquinaria.php">MÁQUINAS</a></li>
                        <li><a href="materiales.php">MATERIAL</a></li>
                        <li><a href="">MUJER</a></li>
                        <li><a href="">HOMBRE</a></li>
                    </ul>
                </li>
                <li><a href="entrenamiento.php">ENTRENAR</a></li>
                <li><a href="contacto.php">CONTACTO</a></li>
                <li><a href="perfil.php">USUARIO</a>
                    <ul>
                        <?php
                            if(isset($_SESSION['nombre'])){
                                echo "<li><a href=\"perfil.php\">PERFIL</a></li>";
                                echo "<li><a href=\"pedidos.php\">PEDIDOS</a></li>";
                                echo "<li><a href=\"entrenamientoUsuario.php\">TRAIN</a></li>";
                                echo "<li><a href=\"includes/logout.php\">SALIR</a></li>";
                            }
                            else
                            {
                                echo "<li><a href=\"login.php\">LOGIN</a></li>";
                                echo "<li><a href=\"registro.php\">REGISTRAR</a></li>";
                            }
                        ?>
                    </ul>
                </li>
            </ul>
        </nav>
    </body>
</html>
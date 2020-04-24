<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="http://localhost/cornersports/estilos/menuStyle.css?v=<?php echo(rand()); ?>" />
        <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
    </head>
    <body>
        <nav>
            <label class="logo" ><img src="http://localhost/cornersports/img/logo.png" width="320" height="30"></label>
            <?php
                if(isset($_SESSION['loged'])){
                    echo "Bienvenid@ ".$_SESSION['nombre'];
                }
            ?>
            <ul>
                <li><a class ="activar" href="http://localhost/cornersports/index.php">HOME</a></li>
                <li><a href="http://localhost/cornersports/ofertas.php">OFERTAS</a></li>
                <li><a href="http://localhost/cornersports/maquinaria.php">EQUIPO</a>
                    <ul>
                        <li><a href="http://localhost/cornersports/maquinaria.php">MÁQUINAS</a></li>
                        <li><a href="http://localhost/cornersports/materiales.php">MATERIAL</a></li>
                        <li><a href="">MUJER</a></li>
                        <li><a href="">HOMBRE</a></li>
                    </ul>
                </li>
                <li><a href="http://localhost/cornersports/entrenamiento.php">ENTRENAR</a></li>
                <li><a href="http://localhost/cornersports/contacto.php">CONTACTO</a></li>
                        <?php
                            if(isset($_SESSION['loged'])){
                                echo"<li><a href=\"http://localhost/cornersports/vistasUsuario/perfil.php\">USUARIO</a>";
                                echo"<ul>";
                                echo "<li><a href=\"http://localhost/cornersports/vistasUsuario/perfil.php\">PERFIL</a></li>";
                                echo "<li><a href=\"http://localhost/cornersports/vistasUsuario/pedidos.php\">PEDIDOS</a></li>";
                                echo "<li><a href=\"http://localhost/cornersports/vistasUsuario/entrenamientoUsuario.php\">TRAIN</a></li>";
                                echo "<li><a href=\"http://localhost/cornersports/includes/logout.php\">SALIR</a></li>";
                            }
                            else
                            {
                                echo"<li><a href=\"http://localhost/cornersports/login.php\">USUARIO</a>";
                                echo"<ul>";
                                echo "<li><a href=\"http://localhost/cornersports/login.php\">LOGIN</a></li>";
                                echo "<li><a href=\"http://localhost/cornersports/registro.php\">REGISTRAR</a></li>";
                            }
                        ?>
                    </ul>
                </li>
                <?php
                    include __DIR__.'/carroCompra.php';
                ?>
             </ul>
        </nav>
    </body>
</html>
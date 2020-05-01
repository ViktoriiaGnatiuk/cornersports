<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="http://localhost/cornersports/estilos/menuStyle.css?v=<?php echo(rand()); ?>" />
        <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
        <link rel="stylesheet" href="http://localhost/cornersports/estilos/estiloCarro.css?v=<?php echo(rand()); ?>" />
        <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
    </head>
    <body>
        <nav>
            <label class="logo" ><img src="http://localhost/cornersports/img/logo.png" width="320" height="30"></label>
            <ul>
                <li><a href="http://localhost/cornersports/index.php">HOME</a></li>
                <li><a href="http://localhost/cornersports/ofertas.php">OFERTAS</a></li>
                <li><a href="http://localhost/cornersports/productos.php?tipo=maquina">EQUIPO</a>
                    <ul>
                        <li><a href="http://localhost/cornersports/productos.php?tipo=maquina">MÁQUINAS</a></li>
                        <li><a href="http://localhost/cornersports/productos.php?tipo=deporte">DEPORTE</a></li>
                        <li><a href="http://localhost/cornersports/productos.php?tipo=prendaMujer">MUJER</a></li>
                        <li><a href="http://localhost/cornersports/productos.php?tipo=prendaHombre">HOMBRE</a></li>
                    </ul>
                </li>
                <li><a href="http://localhost/cornersports/entrenamiento.php">ENTRENAR</a></li>
                <li><a href="http://localhost/cornersports/contacto.php">CONTACTO</a></li>
                        <?php
                            if(isset($_SESSION['loged'])){
                                    echo"<li><a class=\"logo_usuario\" href=\"http://localhost/cornersports/vistasUsuario/perfil.php\"><img src=\"http://localhost/cornersports/img/usuarioOn.png\"></a>";
                                    echo"<ul>";
                                    echo "<li><a href=\"http://localhost/cornersports/vistasUsuario/perfil.php\">PERFIL</a></li>";
                                    echo "<li><a href=\"http://localhost/cornersports/vistasUsuario/pedidos.php\">PEDIDOS</a></li>";
                                    echo "<li><a href=\"http://localhost/cornersports/vistasUsuario/entrenamientoUsuario.php\">TRAIN</a></li>";
                                    echo "<li><a href=\"http://localhost/cornersports/includes/logout.php\">SALIR</a></li>";
                                }
                            else
                            {
                                echo"<li><a class=\"logo_usuario\" href=\"http://localhost/cornersports/login.php\"><img src=\"http://localhost/cornersports/img/usuarioOff.png\"></a>";
                                echo"<ul>";
                                echo "<li><a href=\"http://localhost/cornersports/login.php\">LOGIN</a></li>";
                                echo "<li><a href=\"http://localhost/cornersports/registro.php\">REGISTRAR</a></li>";
                            }
                        ?>
                    </ul>
                </li>
                <li><a id="boton-carro" href="http://localhost/cornersports/includes/carroCompra.php"><img src="http://localhost/cornersports/img/carro24.png" width="30" height="30"></a></li>
             </ul>
        </nav>
    </body>
</html>
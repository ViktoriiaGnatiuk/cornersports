<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="estilos/estiloMenu.css" />
    </head>
    <body>
        <div id="header">
                <ul class="nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="">Ofertas</a></li>
                    <li><a href="">Equipo</a>
                        <ul>
                            <li><a href="">Máquinas</a></li>
                            <li><a href="">Deportes</a></li>
                            <li><a href="">Mujer</a></li>
                            <li><a href="">Hombre</a></li>
                        </ul>
                    </li>
                    <li><a href="">Entrenar</a></li>
                    <li><a href="">Contacto</a></li>
                    <li><a href="">Usuario</a>
                        <ul>
                            <?php
                                if(isset($_SESSION['nombre'])){
                                    echo "<li><a href=\"perfil.php\">Perfil</a></li>";
                                    echo "<li><a href=\"pedidos.php\">Pedidos</a></li>";
                                    echo "<li><a href=\"entrenamientos.php\">Entrenamientos</a></li>";
                                    echo "<li><a href=\"logout.php\">Salir</a></li>";
                                }
                                else
                                {
                                    echo "<li><a href=\"login.php\">Login</a></li>";
                                    echo "<li><a href=\"registro.php\">Registrarse</a></li>";
                                }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
    </body>
</html>
<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__.'/../includes/usuario.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Procesa Login</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="estilos/estilo.css" />
    </head>
    <body>
    <?php

        $nombreUsuario = isset($_POST['username']) ? $_POST['username'] : null;
        
        if ( empty($nombreUsuario) ) {
            $_SESSION['errorLogin'] = "El nombre de usuario no puede estar vacío";
            header('Location: ../login.php');
        }
        
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        if ( empty($password) ) {
            $_SESSION['errorLogin'] = "El password no puede estar vacío.";
        }
        
        if (count($erroresFormulario) === 0) {
            $usuario = Usuario::buscaUsuario($nombreUsuario);
        
            if (!$usuario) {
                $_SESSION['errorLogin'] = "El usuario o el password no coinciden";
            } else {
                if ( $usuario->compruebaPassword($password) ) {
                    $_SESSION['loged'] = true;
                    $_SESSION['username']=$nombreUsuario;
                    $_SESSION['nombre'] = $usuario->nombre();
                    $_SESSION['perfil'] = $usuario->perfil();
                    header('Location: ../index.php');
                    exit();
                } else {
                    $_SESSION['errorLogin'] = "El usuario o el password no coinciden";
                }
            }
        }
    ?>
        
    </body>
</html>
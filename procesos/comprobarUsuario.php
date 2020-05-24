<?php
    require_once __DIR__.'/../includes/usuario.php';
    require_once __DIR__.'/../includes/config.php';
    $nombreUsuario=$_REQUEST["user"];
	$user = Usuario::buscaUsuario($nombreUsuario);
    if ($user) {
        echo "existe";
    }
    else{
        echo "disponible";
    }
?>
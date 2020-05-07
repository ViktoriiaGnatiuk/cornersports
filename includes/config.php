<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://localhost/cornersports/estilos/style.css?v=<?php echo(rand()); ?>" />
        <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
        <meta charset="UTF-8"/>
        <link href="http://localhost/cornersports/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    </head>
    <body>
    </body>
</html>
<?php

require_once __DIR__.'/aplicacion.php';

/**
 * Parámetros de conexión a la BD
 */
define('BD_HOST', 'localhost');
define('BD_NAME', 'cornersports');
define('BD_USER', 'root');
define('BD_PASS', '');

/**
 * Configuración del soporte de UTF-8, localización (idioma y país) y zona horaria
 */
ini_set('default_charset', 'UTF-8');
setLocale(LC_ALL, 'es_ES.UTF.8');
date_default_timezone_set('Europe/Madrid');

// Inicializa la aplicación
$app = aplicacion::getSingleton();
$app->init(array('host'=>BD_HOST, 'bd'=>BD_NAME, 'user'=>BD_USER, 'pass'=>BD_PASS));

/**
 * @see http://php.net/manual/en/function.register-shutdown-function.php
 * @see http://php.net/manual/en/language.types.callable.php
 */
register_shutdown_function(array($app, 'shutdown'));
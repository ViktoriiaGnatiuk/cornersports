<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/aplicacion.php';
require_once __DIR__ . '/includes/productos.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <script>
            function prueba(variable){
                return document.getElementById(variable).innerHTML ;
            }
        </script>
    </head>
    <body>
           <?php
                $variable=5;
                $html = <<<EOF
                    <p id='$variable'>5</p>
                EOF;
                $resultado=0;
                echo "<script type=\"text/javascript\">prueba($variable);</script>";
                echo "$resultado";
           ?>
    </body>
</html>
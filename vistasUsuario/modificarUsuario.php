<?php
    require_once __DIR__.'/../includes/config.php';
    require_once __DIR__.'/../includes/aplicacion.php';
    require_once __DIR__.'/../includes/formularioPerfil.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Modificar Usuario administrador</title>
        <link rel="stylesheet" href="http://localhost/cornersports/estilos/boton.css">
		<link rel="stylesheet" href="http://localhost/cornersports/estilos/estiloRegistro.css?v=<?php echo(rand()); ?>" />
        <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
    </head>
    <body>
        <div id="contenedor">
        <?php
            include __DIR__.'/../includes/estructura/cabecera.php';
        ?>
        <div id="formularios">
            <?php
                if( isset($_SESSION['perfil']) &&  $_SESSION['perfil']== 'admin'){
                    if(isset($_POST['user'])){
                        $_SESSION['user_mod'] = $_POST['user'];
                    }
                    $form = new FormularioPerfil(); 
                    $form->gestiona();
                }               
            ?>
        </div>
        </div>
        
    </body>
</html>
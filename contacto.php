<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/formularioContacto.php';
?>
<!DOCTYPE html>
<html>
  <head></head>
  <body>
     <div id="contenedor">
       <?php
         include __DIR__.'/includes/estructura/cabecera.php';
       ?>
       <div id="contenido2">
        <center>
        <?
          $form=new formularioContacto();
          $form->gestiona();
        ?>
          </center>
    </div>
    <?php
      include __DIR__.'/includes/estructura/pie.php';
    ?>
    </div>
  </body>
</html>
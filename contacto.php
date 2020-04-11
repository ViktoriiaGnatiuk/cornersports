<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/aplicacion.php';
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
  <div id="contenedor">
    <?php
    include __DIR__.'/includes/estructura/cabecera.php';
    ?>
      <div id="contenido">
        <div id="interior">
        <center>
        <h1>
        <p style="color:#FF0000";>CONTACTO</p>
        </h1>
          <p> 
          <form method="post" action="mailto:depor@ucm.es">
          <b>Nombre:</b><br/>
          <input type="text" name="nombre" value=""/><br/>
          <br/>
          <b>Direccion de email de contacto:</b><br/>
          <input type="text" name="email" value=""/><br/>
          <br/>
          <b>Consulta:</b> <br/>
          <input type="radio" name="consulta" value="Evaluacion"/>Evaluacion
          <input type="radio" name="consulta" value="Sugerencias" />Sugerencias
          <input type="radio" name="consulta" value="Criticas" />Criticas<br/>
          <br/>
          <b>Terminos y Condiciones:</b><br/>
          <input type="checkbox" name="condiciones" value="Evaluacion"/>“Marque esta casilla para verificar
            que ha leído nuestros términos y condiciones del servicio”<br/>
            <br/>
          <b>Motivo de la consulta:</b><br/>
          <input type="text" name="motivo" value=""/><br/>
          <button type="submit">Enviar</button>
          </form>
          
          </p>
          </center>
        </div>
      </div>
    <?php
    include __DIR__.'/includes/estructura/pie.php';
    ?>
  </div>
</body>
</html>
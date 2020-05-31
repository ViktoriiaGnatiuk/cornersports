<?php
require_once __DIR__.'/../config.php';
require_once __DIR__.'/../aplicacion.php';
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
<link rel="stylesheet" type="text/css" href="http://localhost/cornersports\estilos\novedades.css">
<script type="text/javascript">href="../../js/novedades.js"</script>
</head>
 <body>
 <section class="awSlider">
  <div  class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target=".carousel" data-slide-to="0" class="active"></li>
      <li data-target=".carousel" data-slide-to="1"></li>
      <li data-target=".carousel" data-slide-to="2"></li>
      <li data-target=".carousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" style="height:240px">
      <div class="item active">
      
      <?php
            $_SESSION['producto']=6;
            include __DIR__.'\script_novedades_uno.php';  
        ?>
        
      </div>
      <div class="item">
      <?php
            $_SESSION['producto']=13;
            include __DIR__.'\script_novedades_uno.php';  
        ?>
      </div>
      <div class="item">
      <?php
            $_SESSION['producto']=10;
            include __DIR__.'\script_novedades_uno.php';  
        ?>
      </div>
      <div class="item">
      <?php
            $_SESSION['producto']=8;
            include __DIR__.'\script_novedades_uno.php';  
        ?>
      </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href=".carousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Geri</span>
    </a>
    <a class="right carousel-control" href=".carousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">İleri</span>
    </a>
  </div>
</section>
</body>
</html>
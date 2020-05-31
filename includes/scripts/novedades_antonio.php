<?php
require_once __DIR__.'/../config.php';
require_once __DIR__.'/../aplicacion.php';
?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 

<script type="text/javascript" src="C:\xampp\htdocs\cornersports\js\novedades.js"></script> 
<link rel="stylesheet" type="text/css" href="C:\xampp\htdocs\cornersports\estilos\novedades.css">



</head>
 <body>
 <section class="awSlider" >
  <div  class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target=".carousel" data-slide-to="0" class="active"></li>
      <li data-target=".carousel" data-slide-to="1"></li>
      <li data-target=".carousel" data-slide-to="2"></li>
      <li data-target=".carousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" style="height:270px">
      <div class="item active" height="600">
      <?php
            $_SESSION['producto']=7;
            include 'C:\xampp\htdocs\cornersports\includes\scripts\script_novedades_uno.php';  
        ?>
        
      </div>
      <div class="item">
      <?php
            $_SESSION['producto']=11;
            include 'C:\xampp\htdocs\cornersports\includes\scripts\script_novedades_uno.php';  
        ?>
      </div>
      <div class="item">
      <?php
            $_SESSION['producto']=5;
            include 'C:\xampp\htdocs\cornersports\includes\scripts\script_novedades_uno.php';  
        ?>
      </div>
      <div class="item">
      <?php
            $_SESSION['producto']=9;
            include 'C:\xampp\htdocs\cornersports\includes\scripts\script_novedades_uno.php';  
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
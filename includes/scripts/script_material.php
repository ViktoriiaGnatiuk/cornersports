<?php
require_once __DIR__.'/../config.php';
?>
<!DOCTYPE html>
<html>
 <head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="estilos/estiloOfertas.css?v=<?php echo(rand()); ?>" />
    <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
 </head>

 <body>
    <div id="barra">
	   <div class="oferta1">
	        <div class="oferta">OFERTA</div>
	        <img src="img/productos/esquis2.jpg"width="200" height="150"><br></br>
			<table>
			<td>
		        <div class="contenido">ESQUÌS</div>
            </td>
			<td>
		       <div class="contenido">DESCUENTO:20%</div>
			</td>
           </table>
	   </div><br></br>
	   <div class="oferta2">
	       <div class="oferta">OFERTA</div>
	       <img src="img/productos/patines2.jpg"width="200" height="150"><br></br>
		   <table>
		      <td>
		         <div class="contenido">PATINES</div>
		       </td>
			   <td>
			    <div class="contenido">DESCUENTO:15%</div>
		     </td>
           </table>
	   </div><br></br>
	   <div class="oferta3">
	       <div class="oferta">OFERTA</div>
	       <img src="img/productos/bate2.jpg"width="200" height="150"><br></br>
		   <table>
		      <td>
		         <div class="contenido">BATES</div>
		       </td>
			   <td>
			    <div class="contenido">DESCUENTO:30%</div>
		     </td>
           </table>
	    </div>
    </div> 
 </body>
</html>
<?php
    require_once __DIR__ . '/../carrito.php';
?>
<!DOCTYPE html>
<html>
    <head>
         <link rel="stylesheet" href="http://localhost/cornersports/estilos/pushbar.css">
         <link rel="stylesheet" href="http://localhost/cornersports/estilos/estiloCarroSofisticado.css?v=<?php echo(rand()); ?>" />
        <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
        <script src="http://localhost/cornersports/js/jquery-3.5.0.js"></script>
        <script src="http://localhost/cornersports/includes/esctructura/js/gestionCarro.js"></script>
    </head>
    <body>
        <button class="btn-menu" data-pushbar-target="pushbar-menu"><img src="http://localhost/cornersports/img/carro24.png" width="30" height="30"></i></button>
        <div data-pushbar-id="pushbar-menu" data-pushbar-direction="right" class="pushbar-menu">
            
            <div class="btn-cerrar">
                <button data-pushbar-close class="botonCerrar"><img src="img/cerrar.png"></button>
            </div>

            <div class="carro">
                <p class="tituloCarro"> Carro de la compra</p>
                <div class="item">
                        <img src="img/productos/guantes_boxeo1.jpg" width="60" height="60">

                        <div class="datosItem">

                        <p class="nombreItem"> Nombre </p>
                        <p class="precioItem"> 20$</p>

                        <div class="botonesCarro">
                            <button class="restarItem">-</button>
                            <p class="cantidadItem">4</p>
                            <button class="sumaItem">+</button>
                        </div>

                        </div> 
                     
                </div>
            </div>
            <div class="inferior">
                <div class="total"> <p>Total:</p> <p>35,99$</p></div>
                <button class="tramitar"> Tramitar pedido</button>
            </div>
        </div>
        <script src="http://localhost/cornersports/includes/estructura/js/pushbar.js"></script>
        <script>
            var pushbar=new Pushbar({
                blur: true,
                overlay: true
            });
        </script>
    </body>
</html>
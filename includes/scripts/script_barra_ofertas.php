<?php
require_once __DIR__.'/../config.php';
require_once __DIR__.'/../productos.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="http://localhost/cornersports/estilos/estilo_barra_ofertas.css?v=<?php echo(rand()); ?>" />
        <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
    </head>
    <body>
        <div class="barra_ofertas">
            <div class="int_b_ofertas">
                <p class="titulo_b_ofertas">OFERTAS</p>
                <?php
                    $prd=new productos();
                    $i=0;
                    $size=0;
                    $num=3;
                    $size=$prd->getSizeOfertas([], "", "", "");
                    $items=$prd->getItemsOfertas([], "","", "");
                    $size = $size > $num ? $num:$size;
                    while( $i < $size){
                        $id = $items[$i]['id'];	
                        $nombre = $items[$i]['nombre'];
                        $imagen = $items[$i]['imagen'];
                        $precio = $items[$i]['precio'];
                        $descuento = $items[$i]['descuento'];
                        $descuento_cantidad=round($precio*$descuento)/100;
                        $precio=$precio-$descuento_cantidad;
                        
                        $html = <<<EOF
                        <div class="b_oferta">
                            <div class="ol-barra-superir">
                                <div class="ol-bs-izq">
                                    <p>$precio €</p>
                                </div>
                                <div class="ol-bs-dr">
                                    <p>$descuento%</p>
                                </div>
                            </div>
                            <img class="ol-centro" src="$imagen">
                            <div class="ol-titulo">
                                <form action="procesos/addItem.php?id=$id&precio=$precio" id="form_session" method="post">
                                <input type="submit" class="b_b_oferta" value="$nombre">
                                </form>
                            </div>
                        </div>
                        EOF;
                        echo"$html";
                        ++$i;
                    }
                ?>
            </div>
        </div>
    </body>
</html>
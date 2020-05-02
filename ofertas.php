<?php
    require_once __DIR__.'/includes/config.php';
    require_once __DIR__.'/includes/productos.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>OFERTAS</title>
        <link rel="stylesheet" href="http://localhost/cornersports/estilos/estiloOfertas.css?v=<?php echo(rand()); ?>" />
        <script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
    </head>
    <body>
        <div id="contenedor">
            <?php
                include __DIR__.'/includes/estructura/cabecera.php';
            ?>
            <div id="contenido">
                <div class="interior_ofertas">
                    <?php
                        $prd=new productos();
                        $i=0;
                        $tipo=[];
                        $precio="";
                        $descuento="";
                        if(isset($_POST['deportes'])){
                            array_push($tipo, $_POST['deportes']);
                        }
                        if(isset($_POST['maquinas'])){
                            array_push($tipo, $_POST['maquinas']);
                        }
                        if(isset($_POST['mujer'])){
                            array_push($tipo, $_POST['mujer']);
                        }
                        if(isset($_POST['hombre'])){
                            array_push($tipo, $_POST['hombre']);
                        }
                        if(isset($_POST['precio'])){
                            if($_POST['precio']!="todos"){
                                $precio=$_POST['precio'];
                            }
                        }
                        if(isset($_POST['descuento'])){
                            if($_POST['descuento']!="todos"){
                                $descuento=$_POST['descuento'];
                            }
                        }
                        $size=$prd->getSizeOfertas($tipo, $precio, $descuento);
                        $items=$prd->getItemsOfertas($tipo, $precio, $descuento);
                        $size1=$size/2;
                        $size2=$size;
                        while( $i < $size){
                            if($i==0 || $i==$size1){
                                echo "<div class=\"columna\">";
                            }
                            $id = $items[$i]['id'];	
                            $nombre = $items[$i]['nombre'];
                            $imagen = $items[$i]['imagen'];
                            $precio = $items[$i]['precio'];
                            $descuento = $items[$i]['descuento'];
                            $descuento_cantidad=($precio*$descuento)/100;
                            $precio=$precio-$descuento_cantidad;
                            $html = <<<EOF
                            <div class="producto_oferta">
                                <div class="inf">
                                    <div class="precio_oferta"><p>$precio €</p></div>
                                    <div class="descuento"><p>$descuento% -</p></div>
                                </div>
                                <div class="izq">
                                    <img class="imagen_oferta" src="$imagen">
                                    <div class="nombreOferta"><p>$nombre</p></div>
                                </div>
                                <form action="procesos/addItem.php?id=$id&precio=$precio" id="form_session" method="post">
                                <input type="submit" class="comprarOferta" value="Añadir al carrito">
                                </form>
                            </div>
                            EOF;
                            echo"$html";
                            ++$i;
                            if($i==$size1 || $i==$size2){
                                echo"</div>";
                            }
                        }
                    ?>
                </div>
            </div>
            <?php
                include __DIR__.'/includes/estructura/menuOfertas.php"';
                //include __DIR__.'/includes/estructura/pie.php';
            ?>
        </div>
    </body>
</html>
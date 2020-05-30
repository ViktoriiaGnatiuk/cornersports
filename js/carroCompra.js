//Añade un producto nuevo al carrito o aumenta la cantidad de uno ya existente
function addProduct(data, status){
    if(data==="no_logeado"){
        location.href ="http://localhost/cornersports/login.php";
    }else if(data.length < 10){
        var cantidad = parseInt($("#"+data).text());
        $("#"+data).text(cantidad+1);
        $('.btn-menu').click();
    }else{
        $(".carro_sof").append(data);
        $('.btn-menu').click();
    }
}

function sumarItem(data, status){
    var cantidad = parseInt($("#"+data).text());
    $("#"+data).text(cantidad+1);
}

function restarItem(data, status){
    var cantidad = parseInt($("#"+data).text());
    if(cantidad == 1){
        eliminarProducto(data);
    }else{
        $("#"+data).text(cantidad-1);
    }
}
function eliminarProducto(id){
    var url="http://localhost/cornersports/procesos/eliminarItem.php?id=" + id;
    $.get(url,eliminarItem);
    
}
function eliminarItem(data, status){
    $("[producto="+data+"]").remove();
}

$(document).ready(function(){
    
    //Añade un item al carrito desde la página de productos
    $(".comprar").click(function(){
        var id = $(this).attr('identificador');
        var url="http://localhost/cornersports/procesos/addProducto.php?id=" + id;
        $.get(url,addProduct);
    });

    //Añade un item al carrito desde la pagina de ofertas
    $(".comprarOferta").click(function(){
        var id = $(this).attr('identificador');
        var precio=$("."+id).val();
        var url="http://localhost/cornersports/procesos/addProducto.php?id=" + id+"&precio="+precio;
        $.get(url,addProduct);
    });

    //Añade un item al carrito desde la barra de ofertas
    $(".b_b_oferta").click(function(){
        var id = $(this).attr('identificador');
        var precio=$("."+id).val();
        var url="http://localhost/cornersports/procesos/addProducto.php?id=" + id+"&precio="+precio;
        $.get(url,addProduct);
    });

    //Añade un producto de la página home
    $(".button").click(function(){
        var id = $(this).attr('identificador');
        var url="http://localhost/cornersports/procesos/addProducto.php?id=" + id;
        $.get(url,addProduct);
    });
    
    //Añade un item de las novedades del home
    $(".botonProdMin").click(function(){
        var id = $(this).attr('identificador');
        var url="http://localhost/cornersports/procesos/addProducto.php?id=" + id;
        $.get(url,addProduct);
    });
    
    //$('.carro_sof').on('click','.sumaItem_sof' hace que los elementos creados dinamicamente les afecte el evento click
    //Aumenta la cantidad de los productos
    $('.carro_sof').on('click','.sumaItem_sof', function(){ 
        var id = $(this).val();
        var url="http://localhost/cornersports/procesos/sumarItem.php?id=" + id;
        $.get(url,sumarItem);
    });

    //Disminuye la cantidad de los productos
    $('.carro_sof').on('click','.restarItem_sof', function(){ 
        var id = $(this).val();
        var url="http://localhost/cornersports/procesos/restarItem.php?id=" + id;
        $.get(url,restarItem);
    });

    //Elimina un producto del carrito
    $('.carro_sof').on('click','.eliminar_item_sof', function(){ 
        var id = $(this).attr('data-value');
        eliminarProducto(id);
    });
});
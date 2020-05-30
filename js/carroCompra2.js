function sumarItemN(data, status){
    var cantidad = parseInt($("#"+data).text());
    $("#"+data).text(cantidad+1);
    var cantidad = parseInt($("[cant_id="+data+"]").text());
    $("[cant_id="+data+"]").text(cantidad+1);
    actualizarPrecioItemN(data);
    obtenerTotalN();
}

function restarItemN(data, status){
    var cantidad = parseInt($("[cant_id="+data+"]").text());
    if(cantidad == 1){
        eliminarProductoN(data);
    }else{
        $("[cant_id="+data+"]").text(cantidad-1);
        var cantidad = parseInt($("#"+data).text());
        $("#"+data).text(cantidad-1);
        actualizarPrecioItemN(data);
    }
    obtenerTotalN();
}
function eliminarProductoN(id){
    var url="http://localhost/cornersports/procesos/eliminarItem.php?id=" + id;
    $.get(url,eliminarItemN);
}
function eliminarItemN(data, status){
    $("[producto="+data+"]").remove();
    $("[producto_n="+data+"]").remove();
    obtenerTotalN();
}

function cambiarTotalN(data, status){
    $(".total_carro_sof").text(data+" €");
    $(".total_n").text(data+" €");
}
function obtenerTotalN(){
    var url="http://localhost/cornersports/procesos/obtenerTotal.php";
    $.get(url,cambiarTotalN);
}

function cambiarPrecioItemN(data, status){
    var data_s=data.split('_');
    $("[precio_item_sof="+data_s[0]+"]").text(data_s[1]+ " €");
    $("[precio_id="+data_s[0]+"]").text(data_s[1]+ " €");
}
function actualizarPrecioItemN(id){
    var url="http://localhost/cornersports/procesos/obtenerPrecioItem.php?id="+id;
    $.get(url,cambiarPrecioItemN);
}

function vaciarCarro(data, status){
    if(data==="vacio"){
        $(".item").remove();
        $(".item_sof").remove();
        obtenerTotalN();
    }
}
$(document).ready(function(){
    
    //$('.carro_sof').on('click','.sumaItem_sof' hace que los elementos creados dinamicamente les afecte el evento click
    //Aumenta la cantidad de los productos
    $('.sumaItem').click(function(){ 
        var id = $(this).attr("suma_id");
        var url="http://localhost/cornersports/procesos/sumarItem.php?id=" + id;
        $.get(url,sumarItemN);
    });

    //Disminuye la cantidad de los productos
    $('.restarItem').click(function(){ 
        var id = $(this).attr("resta_id");
        var url="http://localhost/cornersports/procesos/restarItem.php?id=" + id;
        $.get(url,restarItemN);
    });

    //Elimina un producto del carrito
    $('.eliminaItem').click(function(){ 
        var id = $(this).attr('data-value_n');
        eliminarProductoN(id);
    });

    $(".tramitar_sof").click(function(){
        location.href ="http://localhost/cornersports/includes/carroCompra.php";
    });

    $(".vaciar_carro").click(function(){
        var url="http://localhost/cornersports/procesos/vaciarCarro.php";
        $.get(url,vaciarCarro);
    });
});
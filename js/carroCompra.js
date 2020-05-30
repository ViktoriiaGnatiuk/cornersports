$(document).ready(function(){
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

    $(".comprar").click(function(){
        var id = $(this).attr('identificador');
        var url="http://localhost/cornersports/procesos/addProducto.php?id=" + id;
        $.get(url,addProduct);
    });

    $(".comprarOferta").click(function(){
        var id = $(this).attr('identificador');
        var precio=$("."+id).val();
        var url="http://localhost/cornersports/procesos/addProducto.php?id=" + id+"&precio="+precio;
        $.get(url,addProduct);
    });

    $(".b_b_oferta").click(function(){
        var id = $(this).attr('identificador');
        var precio=$("."+id).val();
        var url="http://localhost/cornersports/procesos/addProducto.php?id=" + id+"&precio="+precio;
        $.get(url,addProduct);
    });
});
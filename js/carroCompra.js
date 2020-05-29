$(document).ready(function(){

    function addProduct(data, status){
        if(data==="no_logeado"){
            location.href ="http://localhost/cornersports/login.php";
        }else{
            $(".carro_sof").append(data);
            $('.btn-menu').click();
        }
    }

    $(".comprar").click(function(){
        var id = $(this).attr('id');
        var url="http://localhost/cornersports/procesos/addProducto.php?id=" + id;
        $.get(url,addProduct);
    });

    $(".comprarOferta").click(function(){
        var id = $(this).attr('id');
        var precio=$("."+id).val();
        var url="http://localhost/cornersports/procesos/addProducto.php?id=" + id+"&precio="+precio;
        $.get(url,addProduct);
    });

    $(".b_b_oferta").click(function(){
        var id = $(this).attr('id');
        var precio=$("."+id).val();
        var url="http://localhost/cornersports/procesos/addProducto.php?id=" + id+"&precio="+precio;
        $.get(url,addProduct);
    });
});
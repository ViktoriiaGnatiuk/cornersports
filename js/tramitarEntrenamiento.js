var codigo_usado = false;
var fecha_correcta = false;
//Trunca los decimales de un número decimal
truncateDecimals = function (number, digits) {
    var multiplier = Math.pow(10, digits),
        adjustedNum = number * multiplier,
        truncatedNum = Math[adjustedNum < 0 ? 'ceil' : 'floor'](adjustedNum);

    return truncatedNum / multiplier;
};
function fecha_actual(){
    var d = new Date();

    var month = d.getMonth()+1;
    var day = d.getDate();

    var output = d.getFullYear() + '/' +
    (month<10 ? '0' : '') + month + '/' +
    (day<10 ? '0' : '') + day;
    return output;
}

//Contrata un entrenamiento
$(document).ready(function(){
	
	//Comprueba que la fecha de caducidad de la tarjeta de crédito sea correcta
    $("#fecha_venc").change(function () {
        var fecha_act = fecha_actual();
        var fecha_caducidad = $(this).val();
        if(new Date(fecha_caducidad).getTime() < new Date(fecha_act).getTime()){
            alert("La fecha de caducidad de la tarjeta no es correcta.");
        }else{
            fecha_correcta=true;
        }
    });

    //Comprueba que todo este correcto y tramita el pedido
    function tramitado(data, status){
        if(data==="correcto"){
            $(".contender_tramitar").hide();
            $(".contenedor_pago").hide();
           $(".mensaje_tramitado").show();
        }else{
            $(".contender_tramitar").hide();
            $(".contenedor_pago").hide();
            $("#tramitar_pedido").append(data);
        }
    }
	function cambiarFondo(id, valor, mensaje){
        if (valor==true) {
            $(id).css("background-color", "rgb(241, 255, 162)");
            return true;
        } else {
            $(id).css("background-color", "rgb(255, 182, 182)");
            alert(mensaje);
            return false;
        }
    }
	
	function comprobarTarjeta(){
        var mensaje = "Introduzca un número de tarjeta válido";
        return cambiarFondo("#num_tarj", $("#num_tarj").val().length == 16 && !isNaN($("#num_tarj").val()), mensaje);
    }
    function comprobarTitular(){
        var mensaje = "Introduzca el nombre del titular de la tarjeta";
        return cambiarFondo("#titular_tr", $("#titular_tr").val() != "", mensaje);
    }
	
	//AJAX
	$("#contratar_tr").click(function(){
        if(comprobarTarjeta() && comprobarTitular()){
            if(fecha_correcta){
                var id = $(".entrenamiento").attr('identificador');
				var url="../procesos/procesarEntreno.php?id=" + id;
                $.get(url,tramitado);
            }else{
                alert("La fecha de caducidad de la tarjeta no es correcta.");
            }
        }     
    });   	
});

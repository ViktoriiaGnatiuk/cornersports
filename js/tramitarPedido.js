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

//Selecciona un método de pago
$(document).ready(function(){
    $(".r").click(function () {	 
        if( $(this).is(':checked')) {
            var sumar=0;
            if($(this).val()=="premium"){
                sumar=2.99;
            }else if($(this).val()=="express"){
                sumar=4.99;
            }
            var total = parseFloat(($("#total_real").text()));
            var real = truncateDecimals((total + sumar),2);
            $("#tr_t").text(real);
            alert("Se ha añadido "+sumar+"€ al precio final de su pedido");
        }
    });

    //Aplica un código de descuento
    $(".aplicar").click(function(){
        var valor = $("#cod_desc").val();
        if(valor == "UCM2605" && !codigo_usado){
            var total = parseFloat(($("#total_real").text()));
            var descuento = total*20/100;
            var real = truncateDecimals((total - descuento),2);
            $("#total_real").text(real);
            var entrega = truncateDecimals(parseFloat($("#tr_t").text()) - total, 2);
            $("#tr_t").text(real+entrega);
            codigo_usado = true;
            alert("Se ha aplicado un descuento de un 20% a su pedido.");
        }else if (valor == "UCM2605" && codigo_usado){
            alert("Este código ya ha sido usado.");
        }else{
            alert("El código no es valido.");
        }
    });

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
            $("#form_tr").submit();
        }else{
            alert("No se ha podido tramitar el pedido");
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
    $("#tr_tramitar_pedido").click(function(){
        if(comprobarTarjeta() && comprobarTitular()){
            if(fecha_correcta){
                var url="../procesos/cambiarPrecioPedido.php?precio=" + parseFloat($("#tr_t").text());
                $.get(url,tramitado);
            }else{
                alert("La fecha de caducidad de la tarjeta no es correcta.");
            }
        }     
    });   
});
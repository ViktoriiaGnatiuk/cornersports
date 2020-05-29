
//Contrata un entrenamiento
$(document).ready(function(){
	
    //Comprueba que todo este correcto y tramita el entrenamiento
    function addEntrenamiento(data, status){
        if(data==="no_logeado"){
            location.href ="http://localhost/cornersports/login.php";
        }
		else{
			 alert("Se ha añadido el entrenamiento a su perfil");
		}
    }
  
    $(".b_entrenamiento").click(function(){
		var id = $(this).attr('id');
		var url="http://localhost/cornersports/procesos/procesarEntreno.php?id=" + id;
		$.get(url,addEntrenamiento);
    });   
});
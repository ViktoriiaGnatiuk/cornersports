$(document).ready(function(){
    $("#reg_boton").click(function(){
        var namePattern = "^[a-z A-Z]{4,30}$";
        var emailPattern = "^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$";
        function checkInput(idInput, pattern) {
            return $(idInput).val().match(pattern) ? true : false;
        }
        function checkTextarea(idText) {
            return $(idText).val().length > 12 ? true : false;	
        }
        function checkRadioBox(nameRadioBox) {
            return $(nameRadioBox).is(":checked") ? true : false;
        }
        function checkForm (idForm) {
            $(idForm + " *").on("change keydown", function() {
                if (checkInput("#nombre", namePattern) && 
                checkInput("#apellidos", namePattern) && 
                checkInput("#email", emailPattern) && 
                checkSelect("#edad") && 
                checkTextarea("#comentario") && 
                checkRadioBox("#legal") &&
                checkRadioBox("[name=boletin]"))
                {
                    enableSubmit(idForm);
                } else {
                    disableSubmit(idForm);
                }
            });
        }
        if( $("#nombre_reg").val()=='') {
            alert("El nombre de usuario no puede estar vacio.");
        }
        else if( $("#apell_reg").val()==''){
            alert("El password no puede estar vacio.");
        }
        else if( $("#email_reg").val()==''){
            alert("El password no puede estar vacio.");
        }
        else if( $("#prov_reg").val()==''){
            alert("El password no puede estar vacio.");
        }
        else if( $("#local_reg").val()==''){
            alert("El password no puede estar vacio.");
        }
        else if( $("#codPos_reg").val()==''){
            alert("El password no puede estar vacio.");
        }
        else if( $("#calle_reg").val()==''){
            alert("El password no puede estar vacio.");
        }
        else if( $("#portal_reg").val()==''){
            alert("El password no puede estar vacio.");
        }
        else if( $("#username_reg").val()==''){
            alert("El password no puede estar vacio.");
        }
        else if( $("#pass_reg").val()==''){
            alert("El password no puede estar vacio.");
        }
        else if( $("#pass_reg2").val()==''){
            alert("El password no puede estar vacio.");
        }
        else if( $("#cond_reg").val()==''){
            alert("El password no puede estar vacio.");
        }
        else{
            $(idForm + "reg_boton").removeAttr("disabled");
        }
    });
});
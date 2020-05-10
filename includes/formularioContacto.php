<?php
require_once __DIR__.'/form.php';
//require_once __DIR__.'/usuario.php';

class FormularioContacto extends Form
{
    public function __construct() {
        parent::__construct('formContacto');
    }
    
    protected function generaCamposFormulario($datos)
    {
        $html = <<<EOF
        <fieldset>
            <h2>CONTACTO</h2><br/>
            <p>Nombre:</p>
            <div class="center-content">	
                <input name="name" type="text" class="field" requiered> <br/>
            </div>
            <p>Correo Electronico de Contacto:</p>
            <div class="center-content">
                <input name="email" type="email" class="field" requiered> <br/>
            </div>
            <p>Tipo de Mensaje</p>
            <div class="center-content">
              <select  name="consulta" required>
                <option value=""/> Por favor selecciona una opcion</option>
                <option value="Evaluacion"/> Evaluacion</option>
                <option value="Sugerencia"/> Sugerencia</option>
                <option value="Criticas"/> Criticas</option>
              </select>
            <br/>  
            </div>
            <p>Terminos y Condiciones:</p>
            <div class="center-content">
               <input type="checkbox" name="condiciones" value="Evaluacion"/>“Marque esta casilla para verificar
                 que ha leído nuestros términos 
                  y condiciones del servicio”<br/>
            </div>
            <br/>
            <p>Motivo de la consulta:</p>
            <div class="center-content">
                <input type="text" name="motivo" class="field" requiered><br/>
            </div>
            </br>
            <p class="center-content">
                <input type="submit" class="btn btn-green" value="Enviar Mensaje"> <br/><br/>
            </p>
        </fieldset>
        EOF;
        return $html;
    }
    

    protected function procesaFormulario($datos)
    {
        $result = array();
    
        $nombre = isset($datos['name']) ? $datos['name'] : '';
                
        if ( empty($nombre) ) {
            $result[] = "Necesitas ingresar tu nombre";
        }
        
        $email = isset($datos['email']) ? $datos['email'] : '';
        if ( empty($email) || strpos($email, "@") === false) {
            $result[] = "Ingresa un correo electrónico válido.";
        }
        
        $condiciones=isset($datos['condiciones']) ? $datos['condiciones'] : '';
        if ( empty($condiciones)) {
            $result[] = "Debes aceptar las condiciones de uso para continuar";
        }

        $consulta=isset($datos['consulta']) ? $datos['consulta'] : '';
        if ( empty($consç) ) {
            $result[] = "";
        }

        $motivo=isset($datos['motivo']) ? $datos['motivo'] : '';
        if ( empty($motivo) ) {
            $result[] = "Explique su motivo";
        }
        

        $headers  = 'From: ' . $email ;
        //"From:" . $email;
        $emailPrincipal= 'cornersports091@gmail.com';
        //mirar consulta y motivo
        if (count($result) === 0) {
            if(mail($emailPrincipal, $consulta,$motivo,$headers)){
                echo "Mensaje enviado";   
            }
           else{
               $result = "ha habido un problema";
           }
            
        }
        //me sale error aqui
        return $result;
    }
   
}
<?php
require_once __DIR__.'/form.php';
require_once __DIR__.'/usuario.php';

class FormularioRegistro extends Form
{
    public function __construct() {
        parent::__construct('formRegistro');
    }
    
    protected function generaCamposFormulario($datos)
    {
        $nombreUsuario = '';
        $nombre = '';
        $apellidos = '';
        $email = '';
        $provincia ='';
        $localidad = '';
        $codPostal = '';
        $calle = '';
        $portal='';
        if ($datos) {
            $nombreUsuario = isset($datos['username']) ? $datos['username'] : $nombreUsuario;
            $nombre = isset($datos['nombre']) ? $datos['nombre'] : $nombre;
            $apellidos = isset($datos['apellidos']) ? $datos['apellidos'] : $apellidos;
            $email = isset($datos['email']) ? $datos['email'] : $email;
            $provincia = isset($datos['provincia']) ? $datos['provincia'] : $provincia;
            $localidad = isset($datos['localidad']) ? $datos['localidad'] : $localidad;
            $codPostal = isset($datos['codPostal']) ? $datos['codPostal'] : $codPostal;
            $calle = isset($datos['calle']) ? $datos['calle'] : $calle;
            $portal = isset($datos['portal']) ? $datos['portal'] : $portal;
        }
        $html = <<<EOF
        <fieldset>
            <h2>FORMULARIO DE REGISTRO</h2>
            <br/><h1>Datos personales</h1>
            <p>Nombre:</p>
            <div class="">	
            <input name="nombre" type="text" class="field" value="$nombre"> <br/>
            </div>
            <p>Apellidos:</p>
            <div class="">	
            <input name="apellidos" type="text" class="field" value="$apellidos"> <br/>
            </div>
            <p>Correo electrónico:</p>
            <div class="">	
            <input name="email" type="text" class="field" placeholder="nombre@ejemplo.com" value="$email" <br/>
            </div>
            <br/><h1>Dirección</h1>
            <p>Provincia:</p>
            <div class="">	
            <input name="provincia" type="text" class="field" placeholder="Madrid" value="$provincia" <br/>
            </div>
            <p>Localidad:</p>
            <div class="">	
            <input name="localidad" type="text" class="field" placeholder="Alcalá de Henares" value="$localidad"> <br/>
            </div>
            <p>Codigo postal:</p>
            <div class="">	
            <input name="codPostal" type="text" class="field" placeholder="28801" value="$codPostal"> <br/>
            </div>
            <p>Calle:</p>
            <div class="">	
            <input name="calle" type="text" class="field" value="$calle"> <br/>
            </div>
            <p>Portal, puerta, escalera...:</p>
            <div class="">	
            <input name="portal" type="text" class="field" placeholder="17, 3ºB" value="$portal"> <br/>
            </div>
            <br/><h1>Datos de usuario</h1>
            <p>Nombre de usuario:</p>
            <div class="">
            <input name="usuario" type="text" class="field" > <br/>
            </div>
            <p>Contraseña:</p>
            <div class="">
            <input name="password" type="password" class="field" placeholder="*******"> <br/>
            </div>
            <p>Confirmar contraseña:</p>
            <div class="">
            <input name="password2" type="password" class="field" placeholder="*******"> <br/>
            </div></br>
            <a href="condiciones.html">Condiciones de uso</a><br/>
            <input type="checkbox" name="condAcept" value="true" />Acepto las condiciones de uso<br/><br/>
            <input type="submit" class="btn btn-green" value="Registrarse"> <br/><br/>
        </fieldset>
        EOF;
        return $html;
    }
    

    protected function procesaFormulario($datos)
    {
        $result = array();
        
        $nombreUsuario = isset($datos['usuario']) ? $datos['usuario'] : '';
        if ( empty($nombreUsuario)) {
            $result[] = "El campo usuario no pude estar vacío.";
        }

        $nombre = isset($datos['nombre']) ? $datos['nombre'] : '';
        if ( empty($nombre)) {
            $result[] = "El campo nombre no pude estar vacío.";
        }

        $apellidos = isset($datos['apellidos']) ? $datos['apellidos'] : '';
        if ( empty($apellidos)) {
            $result[] = "El campo apellidos no pude estar vacío.";
        }

        $email = isset($datos['email']) ? $datos['email'] : '';
        if ( empty($email) || strpos($email, "@") === false) {
            $result[] = "Ingresa un correo electrónico válido.";
        }

        $provincia = isset($datos['provincia']) ? $datos['provincia'] : '';
        if ( empty($provincia)) {
            $result[] = "El campo provincia no pude estar vacío.";
        }

        $localidad = isset($datos['localidad']) ? $datos['localidad'] : '';
        if ( empty($localidad)) {
            $result[] = "El campo localidad no pude estar vacío.";
        }

        $codPostal = isset($datos['codPostal']) ? $datos['codPostal'] : '';
        if ( empty($codPostal)) {
            $result[] = "El campo código postal no pude estar vacío.";
        }

        $calle = isset($datos['calle']) ? $datos['calle'] : '';
        if ( empty($calle)) {
            $result[] = "El campo calle no pude estar vacío.";
        }

        $portal = isset($datos['portal']) ? $datos['portal'] : '';
        if ( empty($portal)) {
            $result[] = "El campo portal no pude estar vacío.";
        }   
        
        $password = isset($datos['password']) ? $datos['password'] : null;
        if ( empty($password) || mb_strlen($password) < 6 ) {
            $result[] = "El password tiene que tener una longitud de al menos 6 caracteres.";
        }

        $password2 = isset($datos['password2']) ? $datos['password2'] : null;
        if ( empty($password2) || strcmp($password, $password2) !== 0 ) {
            $result[] = "Los passwords deben coincidir";
        }
        
        $condAcept=isset($datos['condAcept']) ? $datos['condAcept'] : null;
        if ( empty($condAcept)) {
            $result[] = "Debes aceptar las condiciones de uso para continuar";
        }

        $perfil='usuario';

        if (count($result) === 0) {
            $user = Usuario::crea($nombreUsuario, $password, $nombre, $apellidos,
            $email, $provincia, $localidad, $calle, $codPostal, $portal, $perfil);
            if ( ! $user ) {
                $result[] = "El usuario ya existe";
            } else {
                $result = 'index.php';
            }
        }
        return $result;
    }
}
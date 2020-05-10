<?php
require_once __DIR__.'/form.php';
require_once __DIR__.'/usuario.php';

class FormularioPerfil extends Form
{
    public function __construct() {
        parent::__construct('formPerfil');
    }
    
    protected function generaCamposFormulario($datos)
    {
        $nombreUsuario = $_SESSION['user_mod'];
        $usuario=Usuario::buscaUsuario($nombreUsuario);
        $nombre = $usuario->nombre();
        $apellidos = $usuario->apellidos();
        $email = $usuario->email();
        $provincia = $usuario->provincia();
        $localidad = $usuario->localidad();
        $codPostal = $usuario->codPostal();
        $calle = $usuario->calle();
        $portal=$usuario->portal();
        $perfil=$usuario->perfil();

        $html = <<<EOF
        <fieldset>
            <p class="titulo_reg" >Usuario: $nombreUsuario</p>
            <div class="form_reg"> 
                <div class="bloque_reg">
                    <p class="titulo2_reg">Datos personales</p>	
                    <p>Nombre:</p>
                    <input id="nombre_reg" name="nombre" type="text" class="field" value="$nombre" required>
                    <p>Apellidos:</p>
                    <input id="apell_reg" name="apellidos" type="text" class="field" value="$apellidos" required>
                    <p>Correo electrónico:</p>
                    <input id="email_reg" name="email" type="text" class="field" placeholder="nombre@ejemplo.com" value="$email" pattern=".+@.+." required>
                </div>
                <div class="bloque_reg">
                    <p class="titulo2_reg">Dirección</p>
                    <p>Provincia:</p>
                    <input id="prov_reg" name="provincia" type="text" class="field" placeholder="Madrid" value="$provincia" required>
                    <p>Localidad:</p>
                    <input id="local_reg" name="localidad" type="text" class="field" placeholder="Alcalá de Henares" value="$localidad" required>
                    <p>Codigo postal:</p>
                    <input id="codPos_reg" name="codPostal" type="text" class="field" placeholder="28801" value="$codPostal" required  minlength="5" maxlength="5">
                    <p>Calle:</p>
                    <input id="calle_reg" name="calle" type="text" class="field" placeholder="C/Alcalá" value="$calle" required>
                    <p>Portal, puerta, escalera...:</p>
                    <input id="portal_reg" name="portal" type="text" class="field" placeholder="17, 3ºB" value="$portal" required>
                </div>
                <div class="bloque_reg">
                    <p class="titulo2_reg" >Datos de usuario</p>
                    <input name="perfil" type="hidden" value="$perfil">
                     <p>Contraseña:</p>
                    <input id="pass_reg" name="password" type="password" class="field" placeholder="*******" required minlength="6">
                    <p>Confirmar contraseña:</p>
                    <input id="pass_reg2" name="password2" type="password" class="field" placeholder="*******" required minlength="6">
                </div>
            </div>
            <div class="botones_reg">
                <input id="reg_boton" type="submit" class="boton_reg" value="Aceptar">
            </div>
        </fieldset>
        EOF;
        return $html;
    }
    

    protected function procesaFormulario($datos)
    {
        $result = array();
        
        $nombreUsuario = $_SESSION['user_mod'];

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
        $perfil=$datos['perfil'];
        if (count($result) === 0) {
            $user = new Usuario($nombreUsuario, $password, $nombre, $apellidos,
            $email, $provincia, $localidad, $calle, $codPostal, $portal, $perfil);
            $user->cambiaPassword($password);
            Usuario::actualiza($user);
            echo"<center/><h1> Tu datos han sido actualizados correctamente </h1>";
        }
        return $result;
    }
}
?>
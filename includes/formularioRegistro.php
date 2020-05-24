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
            <p class="titulo_reg" >Formulario de registro</p>
            <div class="form_reg"> 
                <div class="bloque_reg">
                    <p class="titulo2_reg">Datos personales</p>	
                    <p>Nombre:</p>
                    <input id="nombre_reg" name="nombre" type="text" class="field" value="$nombre" required>
                    <p>Apellidos:</p>
                    <input id="apell_reg" name="apellidos" type="text" class="field" value="$apellidos" required>
                    <p>Correo electrónico:</p>
                    <input id="email_reg" name="email" type="text" class="field" placeholder="nombre@ejemplo.com" value="$email" required>
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
                    <p>Nombre de usuario:</p>
                    <input id="username_reg" name="usuario" type="text" class="field" required>
                    <p>Contraseña:</p>
                    <input id="pass_reg" name="password" type="password" class="field" placeholder="*******" required minlength="6">
                    <p>Confirmar contraseña:</p>
                    <input id="pass_reg2" name="password2" type="password" class="field" placeholder="*******" required minlength="6">
        
        EOF;
        $html2="";
        if(isset($_SESSION['loged']) && $_SESSION['perfil'] == "admin"){
            $html2 = <<<EOF
                <p>Perfil</p>
                <center/>
                <select class="field" name="perfil">
                <option class="field" value="usuario">Usuario</option>
                <option class="field" value="admin">Administrador</option>
                <option class="field" value="entrenador">Entrenador</option>
                <option class="field" value="colaborador">Colaborador</option>
                </select>
            EOF;
        }
        $html3 = <<<EOF
                </div>
            </div>
            <div class="botones_reg">
                <a class="registrar" href="condiciones.html">Condiciones de uso</a>
                <div class="cond_uso">
                    <input id="cond_reg" type="checkbox" name="condAcept" value="true" required>
                    <p class="txt_cond" >Acepto las condiciones de uso</p>
                </div>
                <input id="reg_boton" type="submit" class="boton_reg" value="Registrarse">
            </div>
        </fieldset>
        EOF;
        $html = $html.$html2.$html3;
        return $html;
    }
    

    protected function procesaFormulario($datos)
    {
        $result = array();
        $nombreUsuario = $datos['usuario'];
        $nombre = $datos['nombre'];
        $apellidos = $datos['apellidos'];
        $email =  $datos['email'];
        $provincia = $datos['provincia'] ;
        $localidad = $datos['localidad'] ;
        $codPostal = $datos['codPostal'] ;
        $calle = $datos['calle'] ;
        $portal = $datos['portal'];
        $password = $datos['password'];
        $password2 = $datos['password2'] ;
        if (strcmp($password, $password2) !== 0 ) {
            $result[] = "Los passwords deben coincidir";
        }
        $condAcept=$datos['condAcept'];

        $perfil='usuario';
        if(isset($_SESSION['loged']) && $_SESSION['perfil'] == "admin"){
            $perfil = $datos['perfil'] ;
        }
        

        if (count($result) === 0) {
            $user = Usuario::crea($nombreUsuario, $password, $nombre, $apellidos,
            $email, $provincia, $localidad, $calle, $codPostal, $portal, $perfil);
            if ( !$user ) {
                $result[] = "El usuario ya existe";
            } else {
                $_SESSION['error'] = "<h3>Su cuenta se ha registrado correctamente</h3>";
                $result = 'login.php';
            }
        }
        return $result;
    }
}
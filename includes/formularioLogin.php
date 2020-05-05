<?php
require_once __DIR__.'/form.php';
require_once __DIR__.'/usuario.php';

class FormularioLogin extends Form
{
    public function __construct() {
        parent::__construct('formLogin');
    }
    
    protected function generaCamposFormulario($datos)
    {
        $html = <<<EOF
        <fieldset>
            <h2>Login</h2><br/>
            <p>Nombre o correo:</p>
            <div class="center-content">	
                <input name="username" type="text" class="field" placeholder="user@example.com"> <br/>
            </div>
            <p>Contraseña:</p>
            <div class="center-content">
                <input name="password" type="password" class="field" placeholder="*******"> <br/>
            </div>
            </br>
            <p class="center-content">
                <input type="submit" class="btn btn-green" value="Iniciar sesión"> <br/><br/>
                <a href="registro.php" id="registrar">Registra cuenta</a>
            </p>
        </fieldset>
        EOF;
        return $html;
    }
    

    protected function procesaFormulario($datos)
    {
        $result = array();
        
        $nombreUsuario = isset($datos['username']) ? $datos['username'] : null;
                
        if ( empty($nombreUsuario) ) {
            $result[] = "El nombre de usuario no puede estar vacío";
        }
        
        $password = isset($datos['password']) ? $datos['password'] : null;
        if ( empty($password) ) {
            $result[] = "El password no puede estar vacío.";
        }
        
        if (count($result) === 0) {
            $usuario = Usuario::login($nombreUsuario, $password);
            if ( ! $usuario ) {
                // No se da pistas a un posible atacante
                $result[] = "El usuario o el password no coinciden";
            } else {
                $_SESSION['loged'] = true;
                $_SESSION['username']=$nombreUsuario;
                $_SESSION['nombre'] = $usuario->nombre();
                $_SESSION['perfil'] = $usuario->perfil();
                $result = 'index.php';
            }
        }
        return $result;
    }
}
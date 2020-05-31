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
<center/>
<h2>Login</h2><br/>
<p>Nombre de usuario:</p>
<div class="center-content">	
<input id="username_login" name="username" type="text" class="field" placeholder="user@example.com" required><br/>
</div>
<p>Contraseña:</p>
<div class="center-content">
<input id="pass_login" name="password" type="password" class="field" placeholder="*******" required><br/>
</div>
</br>
<p class="center-content">
<input type="submit" id="login_boton" class="btn btn-green" value="Iniciar sesión"><br/><br/>
<a href="registro.php" class="registrar">Registrar cuenta</a>
</p>
</fieldset>
EOF;
return $html;
}

protected function procesaFormulario($datos)
{
$nombreUsuario =$datos['username'];
$password = $datos['password'];
$usuario = Usuario::login($nombreUsuario, $password);
if ( ! $usuario ) {
$result[] = "<p class=\"error\">El usuario o el password no coinciden</p>";
} else {
$_SESSION['loged'] = true;
$_SESSION['username']=$nombreUsuario;
$_SESSION['nombre'] = $usuario->nombre();
$_SESSION['perfil'] = $usuario->perfil();
$result = 'index.php';
}
return $result;
}
}
?>
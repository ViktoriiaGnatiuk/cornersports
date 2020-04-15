<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__.'/../includes/usuario.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Procesar registro</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="http://localhost/cornersports/estilos/boton.css">
		<link rel="stylesheet" href="http://localhost/cornersports/estilos/estiloRegistro.css?v=<?php echo(rand()); ?>" />
    	<script src="/js/mi_script.js?v=<?php echo(rand()); ?>"></script>
    </head>
    <body>
        <div id="contenedor">
        <?php
           include __DIR__.'/../includes/estructura/cabecera.php';
        ?>
        <div id="contenido2">
            <?php
                $nombre=$_SESSION['nombre']=$_POST['nombre'];
                $apellidos=$_SESSION['apellidos']=$_POST['apellidos'];
                $email=$_SESSION['email']=$_POST['email'];
                $provincia=$_SESSION['provincia']=$_POST['provincia'];
                $localidad=$_SESSION['localidad']=$_POST['localidad'];
                $codPostal=$_SESSION['codPostal']=$_POST['codPostal'];
                $calle=$_SESSION['calle']=$_POST['calle'];
                $portal=$_SESSION['portal']=$_POST['portal'];
                $username=$_POST['usuario'];
                $password=$_POST['password'];
                $perfil="usuario";
                $entrenamiento_activo=NULL;

                if($_POST['nombre'] == ""){
                    $_SESSION['errorRegistro']="El campo Nombre no pude estar vacío";

                    header('Location: ../registro.php');
                }
                elseif($_POST['apellidos'] == "" ){
                    $_SESSION['errorRegistro']="El campo Apellidos no pude estar vacío";
                    header('Location: ../registro.php');
                }
                elseif($_POST['email'] == "" || strpos($_POST['email'], "@") === false){
                    $_SESSION['errorRegistro']="Ingresa un correo electrónico válido.";
                    unset($_SESSION['email']);
                    header('Location: ../registro.php');
                }
                elseif($_POST['provincia'] == "" ){
                    $_SESSION['errorRegistro']="El campo Provincia no pude estar vacío";
                    header('Location: ../registro.php');
                }
                elseif($_POST['localidad'] == "" ){
                    $_SESSION['errorRegistro']="El campo Localidad no pude estar vacío";
                    header('Location: ../registro.php');
                }
                elseif($_POST['codPostal'] == "" ){
                    $_SESSION['errorRegistro']="El campo Código postal no pude estar vacío";
                    header('Location: ../registro.php');
                }
                elseif($_POST['calle'] == "" ){
                    $_SESSION['errorRegistro']="El campo Calle no pude estar vacío";
                    header('Location: ../registro.php');
                }
                elseif($_POST['portal'] == "" ){
                    $_SESSION['errorRegistro']="El campo Portal no pude estar vacío";
                    header('Location: ../registro.php');
                }
                elseif($_POST['usuario'] == ""){
                    $_SESSION['errorRegistro']="El campo Usuario no pude estar vacío";
                    header('Location: ../registro.php');
                }
                elseif($_POST['password'] == "" || strlen($_POST['password']) < 6){
                    $_SESSION['errorRegistro']="El campo Password no puede estar vacío, ni tener menos de 6 caracteres.";
                    header('Location: ../registro.php');
                }
                elseif($_POST['passwordConf'] != $_POST['password']){
                    $_SESSION['errorRegistro']="Las contraseñas no coinciden";
                    header('Location: ../registro.php');
                }
                elseif(!isset($_POST['condAcept'])){
                    $_SESSION['errorRegistro']="No se han aceptado las condiciones de uso";
                    header('Location: ../registro.php');
                }
                else{
                        $usuario = Usuario::crea($username, $password, $nombre, $apellidos,
                            $email, $provincia, $localidad, $calle, $codPostal, $portal, $perfil);
                        if (! $usuario ) {
                            $_SESSION['errorRegistro']="El nombre de usuario ya existe";
                            header('Location: ../registro.php');
                        } else {
                            echo "<center/>";
                            echo "La cuenta ha sido registrado correctamente.</br> Le llegara un correo
                            de confirmación </br></br>";
                            echo "<center/><a href=\"../login.php\" class=\"btn btn-green\">Iniciar sesión</a>";
                        }
                    }     
            ?>
        </div>
        <?php
            include __DIR__.'/../includes/estructura/pie.php';
        ?>
        </div>
    </body>
</html>
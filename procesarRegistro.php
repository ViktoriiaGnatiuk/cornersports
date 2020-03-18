<!DOCTYPE html>
<html>
    <head>
        <title>TITULO</title>
        <meta charset="UTF-8"/>
    
    </head>
    <body>
        <?php
            session_start();
             $host_db = "localhost";
             $user_db = "root";
             $pass_db = "";
             $db_name = "cornersports";
             $tbl_name = "usuarios";
             $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
            
             if ($conexion->connect_error) {
             die("La conexion falló: " . $conexion->connect_error);
            }
                $_SESSION['nombre']=$_POST['nombre'];
                $_SESSION['apellidos']=$_POST['apellidos'];
                $_SESSION['email']=$_POST['email'];
                $_SESSION['provincia']=$_POST['provincia'];
                $_SESSION['localidad']=$_POST['localidad'];
                $_SESSION['codPostal']=$_POST['codPostal'];
                $_SESSION['calle']=$_POST['calle'];
                $_SESSION['portal']=$_POST['portal'];
                if($_POST['nombre'] == ""){
                    $_SESSION['errorRegistro']="El campo Nombre no pude estar vacío";

                    header('Location: registro.php');
                }
                elseif($_POST['apellidos'] == "" ){
                    $_SESSION['errorRegistro']="El campo Apellidos no pude estar vacío";
                    header('Location: registro.php');
                }
                elseif($_POST['email'] == "" || strpos($_POST['email'], "@") === false){
                    $_SESSION['errorRegistro']="Ingresa un correo electrónico válido.";
                    unset($_SESSION['email']);
                    header('Location: registro.php');
                }
                elseif($_POST['provincia'] == "" ){
                    $_SESSION['errorRegistro']="El campo Provincia no pude estar vacío";
                    header('Location: registro.php');
                }
                elseif($_POST['localidad'] == "" ){
                    $_SESSION['errorRegistro']="El campo Localidad no pude estar vacío";
                    header('Location: registro.php');
                }
                elseif($_POST['codPostal'] == "" ){
                    $_SESSION['errorRegistro']="El campo Código postal no pude estar vacío";
                    header('Location: registro.php');
                }
                elseif($_POST['calle'] == "" ){
                    $_SESSION['errorRegistro']="El campo Calle no pude estar vacío";
                    header('Location: registro.php');
                }
                elseif($_POST['portal'] == "" ){
                    $_SESSION['errorRegistro']="El campo Portal no pude estar vacío";
                    header('Location: registro.php');
                }
                elseif($_POST['usuario'] == ""){
                    $_SESSION['errorRegistro']="El campo Usuario no pude estar vacío";
                    header('Location: registro.php');
                }
                elseif($_POST['password'] == "" || strlen($_POST['password']) < 6){
                    $_SESSION['errorRegistro']="El campo Password no puede estar vacío, ni tener menos de 6 caracteres.";
                    header('Location: registro.php');
                }
                elseif($_POST['passwordConf'] != $_POST['password']){
                    $_SESSION['errorRegistro']="Las contraseñas no coinciden";
                    header('Location: registro.php');
                }
                elseif(!isset($_POST['condAcept'])){
                    $_SESSION['errorRegistro']="No se han aceptado las condiciones de uso";
                    header('Location: registro.php');
                }
                else{
                        $buscarUsuario = "SELECT * FROM $tbl_name
                        WHERE username = '$_POST[usuario]' ";
                        $result = $conexion->query($buscarUsuario);
                        $count = mysqli_num_rows($result);
                        
                        if ($count == 1) {
                            $_SESSION['errorRegistro']="El nombre de usuario ya existe";
                            header('Location: registro.php');
                        }
                        else{
                            $form_pass = $_POST['password'];
                            $hash = password_hash($form_pass, PASSWORD_BCRYPT);

                            $query="INSERT INTO usuarios (username, password, nombre, apellidos, 
                            email, provincia, localidad, calle, codPostal, portal) VALUES 
                            ('$_POST[usuario]', '$hash', '$_POST[nombre]', '$_POST[apellidos]', '$_POST[email]', 
                            '$_POST[provincia]', '$_POST[localidad]', '$_POST[calle]', '$_POST[codPostal]', '$_POST[portal]')";

                            if ($conexion->query($query) === TRUE) {
                                echo "<h2>" . "Usuario Creado" . "</h2>";
                                echo "<h4>" . "Bienvenido: " . $_POST['usuario'] . "</h4>" . "\n\n";
                                echo "<h5>" . "Hacer Login: " . "<a href='login.html'>Login</a>" . "</h5>";
                            }
                            else {
                                echo "Error al crear el usuario." . $query . "<br>" . $conexion->error;
                            }
                        }
                        mysqli_close($conexion);
            }            
        ?>
    </body>
</html>
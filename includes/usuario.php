<?php
require_once __DIR__ . '/aplicacion.php';

class Usuario
{

    public static function login($nombreUsuario, $password)
    {
        $user = self::buscaUsuario($nombreUsuario);
        if ($user && $user->compruebaPassword($password)) {
            return $user;
        }
        return false;
    }

    public static function buscaUsuario($nombreUsuario)
    {
        $app = aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM usuarios WHERE username = '%s'", $conn->real_escape_string($nombreUsuario));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $user = new Usuario(
                    $fila['username'],
                    $fila['password'],
                    $fila['nombre'],
                    $fila['apellidos'],
                    $fila['email'],
                    $fila['provincia'],
                    $fila['localidad'],
                    $fila['calle'],
                    $fila['codPostal'],
                    $fila['portal'],
                    $fila['perfil']);
                $result = $user;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }
    
    public static function crea(
        $username,
        $password,
        $nombre,
        $apellidos,
        $email,
        $provincia,
        $localidad,
        $calle,
        $codPostal,
        $portal,
        $perfil)
    {
        $user = self::buscaUsuario($username);
        if ($user) {
            return false;
        }
            $user = new Usuario(
                $username,
                self::hashPassword($password),
                $nombre,
                $apellidos,
                $email,
                $provincia,
                $localidad,
                $calle,
                $codPostal,
                $portal,
                $perfil);
        return self::guarda($user);
    }
    
    private static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
    
    public static function guarda($usuario)
    {
        if ($usuario->id !== null) {
            return self::actualiza($usuario);
        }
        return self::inserta($usuario);
    }
    
    private static function inserta($usuario)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO usuarios(username, password, nombre, apellidos, email, provincia, localidad, 
        calle, codPostal, portal, perfil) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')"
            , $conn->real_escape_string($usuario->username)
            , $conn->real_escape_string($usuario->password)
            , $conn->real_escape_string($usuario->nombre)
            , $conn->real_escape_string($usuario->apellidos)
            , $conn->real_escape_string($usuario->email)
            , $conn->real_escape_string($usuario->provincia)
            , $conn->real_escape_string($usuario->localidad)
            , $conn->real_escape_string($usuario->calle)
            , $conn->real_escape_string($usuario->codPostal)
            , $conn->real_escape_string($usuario->portal)
            , $conn->real_escape_string($usuario->perfil));
        if ( $conn->query($query) ) {
            $usuario->id = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $usuario;
    }
    
    public static function actualiza($usuario)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("UPDATE usuarios SET username = '%s', password='%s', nombre='%s', apellidos='%s'
        , email='%s', provincia='%s', localidad='%s', calle='%s', codPostal='%s', portal='%s'
        , perfil='%s' WHERE username= '%s'"
            , $conn->real_escape_string($usuario->username)
            , $conn->real_escape_string($usuario->password)
            , $conn->real_escape_string($usuario->nombre)
            , $conn->real_escape_string($usuario->apellidos)
            , $conn->real_escape_string($usuario->email)
            , $conn->real_escape_string($usuario->provincia)
            , $conn->real_escape_string($usuario->localidad)
            , $conn->real_escape_string($usuario->calle)
            , $conn->real_escape_string($usuario->codPostal)
            , $conn->real_escape_string($usuario->portal)
            , $conn->real_escape_string($usuario->perfil)
            , $conn->real_escape_string($usuario->username));
        if ( $conn->query($query) ) {
            if ( $conn->affected_rows != 1) {
                echo "No se ha podido actualizar el usuario: " . $usuario->username;
                exit();
            }
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        
        return $usuario;
    }
    
    private $id;
    private $username;
    private $password;
    private $nombre;
    private $apellidos;
    private $email;
    private $provincia;
    private $localidad;
    private $calle;
    private $codPostal;
    private $portal;
    private $perfil;
    private $entrenamiento_activo=NULL;
    

    public function __construct(
        $username,
        $password,
        $nombre,
        $apellidos,
        $email,
        $provincia,
        $localidad,
        $calle,
        $codPostal,
        $portal,
        $perfil)
    {
        $this->username= $username;
        $this->password= $password;
        $this->nombre= $nombre;
        $this->apellidos= $apellidos;
        $this->email= $email;
        $this->provincia= $provincia;
        $this->localidad= $localidad;
        $this->calle= $calle;
        $this->codPostal= $codPostal;
        $this->portal= $portal;
        $this->perfil= $perfil;
    }

    public function id()
    {
        return $this->id;
    }

    public function username()
    {
        return $this->username;
    }

    public function password()
    {
        return $this->password;
    }

    public function nombre()
    {
        return $this->nombre;
    }

    public function apellidos()
    {
        return $this->apellidos;
    }

    public function email()
    {
        return $this->email;
    }

    public function provincia()
    {
        return $this->provincia;
    }

    public function localidad()
    {
        return $this->localidad;
    }

    public function calle()
    {
        return $this->calle;
    }

    public function codPostal()
    {
        return $this->codPostal;
    }

    public function portal()
    {
        return $this->portal;
    }

    public function perfil()
    {
        return $this->perfil;
    }

    public function entrenamiento_activo()
    {
        return $this->entrenamiento_activo;
    }

    public function compruebaPassword($password)
    {
        return password_verify($password, $this->password);
    }

    public function cambiaPassword($nuevoPassword)
    {
        $this->password = self::hashPassword($nuevoPassword);
    }
}

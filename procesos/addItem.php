<?php   
    require_once __DIR__.'/../includes/config.php';
    require_once __DIR__ . '/../includes/carrito.php';

    if(!isset($_SESSION['loged'])){
        $_SESSION['error']="Debes iniciar sesión para continuar.";
        header('Location: http://localhost/cornersports/login.php');
    }
        $carrito=new carrito();
        $id=$_GET['id'];
        $usuario=$_SESSION['username'];
        $carrito->addItem($id, $usuario);
    //header('Location: http://localhost/cornersports/index.php');
?>
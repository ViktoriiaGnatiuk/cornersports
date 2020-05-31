<?php
require_once __DIR__.'/../includes/config.php';
require_once __DIR__ .'/../includes/entrenadores.php';
if(!isset($_SESSION['loged'])){
header('Location: ../login.php');
}
$id =$_REQUEST['id'];
$entrenador = new entrenadores();
$resultado = $entrenador->procesarEntreno($id);
if(strlen($resultado) < 4)
    echo "correcto";
else{
    echo "$resultado";
}
?>
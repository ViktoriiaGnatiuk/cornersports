<?php
require_once __DIR__.'/form.php';
require_once __DIR__.'/usuario.php';

class FormularioDireccion extends Form
{
    public function __construct() {
        parent::__construct('formDireccion');
    }
    
    protected function generaCamposFormulario($datos)
    {
        $nombreUsuario = $_SESSION['username'];
        $usuario=Usuario::buscaUsuario($nombreUsuario);
        $nombre = $usuario->nombre();
        $apellidos = $usuario->apellidos();
        $provincia = $usuario->provincia();
        $localidad = $usuario->localidad();
        $codPostal = $usuario->codPostal();
        $calle = $usuario->calle();
        $portal=$usuario->portal();

        $html = <<<EOF
        <fieldset>
            <div class="form_reg"> 
                <div class="bloque_reg">
                    <p>Nombre:</p>
                    <input id="nombre_reg" name="nombre" type="text" class="field" value="$nombre" required>
                    <p>Apellidos:</p>
                    <input id="apell_reg" name="apellidos" type="text" class="field" value="$apellidos" required>
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
            </div>
        </fieldset>
        EOF;
        return $html;
    }
    

    protected function procesaFormulario($datos)
    {
        $result = array();
        
        $nombreUsuario = $_SESSION['username'];

        $nombre = isset($datos['nombre']) ? $datos['nombre'] : '';
        if ( empty($nombre)) {
            $result[] = "El campo nombre no pude estar vacío.";
        }

        $apellidos = isset($datos['apellidos']) ? $datos['apellidos'] : '';
        if ( empty($apellidos)) {
            $result[] = "El campo apellidos no pude estar vacío.";
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
        
        return $result;
    }
}
?>
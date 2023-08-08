<?php
    if(isset($_GET)){
        extract($_GET);
        require ($_SERVER["DOCUMENT_ROOT"] . "/conexion.php");


        $consulta = "UPDATE usuarios SET id_rol = $rol, estado = $activo  WHERE id = $id";
        
        $resultado = $mysqli -> query($consulta);
        session_start();
        if($resultado){
            $_SESSION["mensaje_permiso_actualizado"] = "Se actualizó correctamente";
            $mysqli -> close();
            header("Location: ../view/permisos.php");
        }else{
            $_SESSION["error_permiso_actualizado"] = "ERROR! no se ha podido actualizar";
            $mysqli -> close();
            header("Location: ../view/permisos.php");
        }
    }
?>
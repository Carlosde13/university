<?php
    if(isset($_GET["id"])){
        extract($_GET);
        require ($_SERVER["DOCUMENT_ROOT"] . "/conexion.php");


        $consulta = "DELETE FROM usuarios WHERE id = $id";

        $resultado = $mysqli -> query($consulta);

        if($resultado){
            session_start();
            $_SESSION["error_agregar_usuario"] = "Se eliminó correctamente";
            $mysqli -> close();
            
            if($rol == 2 ){
                header("Location: ../view/maestros.php");
            }
            if($rol == 3 ){
                header("Location: ../view/alumnos.php");
            }
        }else{
            $_SESSION["error_agregar_usuario"] = "ERROR! no se ha podido eliminar";
            $mysqli -> close();
            if($rol == 2 ){
                header("Location: ../view/maestros.php");
            }
            if($rol == 3 ){
                header("Location: ../view/alumnos.php");
            }
        }
    }
?>
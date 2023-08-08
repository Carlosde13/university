<?php
    if(isset($_GET)){
        extract($_GET);
        require ($_SERVER["DOCUMENT_ROOT"] . "/conexion.php");

        $consulta = "UPDATE usuarios SET dni = '$dni', nombre = '$nombre', apellido = '$apellido', direccion = '$direccion', fecha_nac = '$fecha' WHERE id = $id";

        $resultado = $mysqli -> query($consulta);

        if($resultado){
            $mysqli -> close();
            if($rol==3){
                
                header("Location: ../view/alumnos.php");
            }
            if($rol==2){
                
                header("Location: ../view/maestros.php");
            }
        }else{
            if($rol==3){
                $mysqli -> close();
                header("Location: ../view/alumnos.php");
            }
            if($rol==2){
                
                header("Location: ../view/maestros.php");
            }
        }
    }
?>
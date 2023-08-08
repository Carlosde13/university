<?php
    if(isset($_GET)){
        extract($_GET);
        require ($_SERVER["DOCUMENT_ROOT"] . "/conexion.php");


        $consulta = "DELETE FROM alumno_clase WHERE id_alumno = $alumno AND id_clase =  $clase";

        $resultado = $mysqli -> query($consulta);

        if($resultado){
            $mysqli -> close();
            session_start();
            $_SESSION['error_asignar_clase'] = "Se ha dado de baja correctamente.";
            header("Location: ../view/mis-clases.php");

        }
    }
?>
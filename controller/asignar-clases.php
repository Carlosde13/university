<?php
     if($_SERVER["REQUEST_METHOD"] === "POST"){
        session_start();
        extract($_POST);
        var_dump($_POST);
        require ($_SERVER["DOCUMENT_ROOT"] . "/conexion.php");

        $consulta = "SELECT * FROM alumno_clase WHERE id_alumno = '$id_usuario' AND id_clase = $clase ";

        $consultaEjecutada = $mysqli -> query($consulta);

        $numCoincidencias = $consultaEjecutada -> num_rows;

        if($numCoincidencias > 0){
            $_SESSION["error_asignar_clase"] = "ERROR! ya te has asignado a esta clase. No se realizo una reasignacion, registro no guardado";
            $mysqli -> close();

            header("Location: ../view/mis-clases.php");
            die();

        }else{

            $query = "INSERT INTO alumno_clase (id_alumno, id_clase) VALUES ($id_usuario, $clase) ";

            $resultado = $mysqli -> query($query);


            if($resultado){
                $_SESSION["mensaje_clase_asignada"] = "Se asignó correctamente";
                $mysqli -> close();
                
                header("Location: ../view/mis-clases.php");
            }
        }
    }

<?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        session_start();
        extract($_POST);
        
        require ($_SERVER["DOCUMENT_ROOT"] . "/conexion.php");

        $consulta = "SELECT * FROM clases WHERE nombre = '$nombre' AND id_maestro = $maestro ";

        $consultaEjecutada = $mysqli -> query($consulta);

        $numCoincidencias = $consultaEjecutada -> num_rows;

        if($numCoincidencias > 0){
            $_SESSION["error_agregar_clase"] = "ERROR! ya existe una clase con este nombre y asignada al mismo maestro, registro no agregado";
            $mysqli -> close();

            header("Location: ../view/clases.php");
            die();

        }else{

            $query = "INSERT INTO clases(nombre, id_maestro) VALUES ('$nombre', $maestro)";

            $resultado = $mysqli -> query($query);


            if($resultado){
                $_SESSION["mensaje_clase_agregada"] = "Se agregó correctamente";
                $mysqli -> close();
                
                header("Location: ../view/clases.php");
            }
        }
    }
?>
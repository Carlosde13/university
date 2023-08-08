<?php
    if(isset($_GET["id"])){
        extract($_GET);
        require ($_SERVER["DOCUMENT_ROOT"] . "/conexion.php");


        $consulta = "DELETE FROM clases WHERE id = $id";

        $resultado = $mysqli -> query($consulta);

        if($resultado){
            $mysqli -> close();
            
            header("Location: ../view/clases.php");

        }
    }
?>
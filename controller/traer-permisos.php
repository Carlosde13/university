<?php
    if(isset($_GET["id"])){
        extract($_GET);
        require ($_SERVER["DOCUMENT_ROOT"] . "/conexion.php");


        $consulta = "SELECT correo, id_rol, estado FROM usuarios WHERE id = $id";

        $resultado = $mysqli -> query($consulta);

        $numCoincidencias = $resultado -> num_rows;

        $permisos = [];

        if($numCoincidencias == 1){
            $permisos = $resultado->fetch_assoc();
            $mysqli -> close();
        }

    }
?>
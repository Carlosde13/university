<?php
    if(isset($_GET["idE"])){
        extract($_GET);
        require ($_SERVER["DOCUMENT_ROOT"] . "/conexion.php");


        $consulta = "SELECT * FROM usuarios WHERE id = $idE";

        $resultado = $mysqli -> query($consulta);

        $numCoincidencias = $resultado -> num_rows;

        $user = [];

        if($numCoincidencias == 1){
            $user = $resultado->fetch_assoc();
            $mysqli -> close();
        }

    }
?>
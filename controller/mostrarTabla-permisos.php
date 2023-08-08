<?php
        
        require ($_SERVER["DOCUMENT_ROOT"] . "/conexion.php");

        $consulta = "SELECT id, correo, estado, id_rol FROM usuarios";

        $consultaEjecutada = $mysqli -> query($consulta);

        $todosUsuarios = [];

        while($fila = $consultaEjecutada->fetch_assoc()){
            $todosUsuarios[] = $fila;
        }

?>
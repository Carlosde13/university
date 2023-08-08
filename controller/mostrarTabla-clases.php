<?php
        
        require ($_SERVER["DOCUMENT_ROOT"] . "/conexion.php");

        $consulta = "SELECT clases.id, clases.nombre, usuarios.nombre AS nombre_maestro , usuarios.apellido AS apellido_maestro FROM clases LEFT JOIN usuarios ON clases.id_maestro = usuarios.id";

        $consultaEjecutada = $mysqli -> query($consulta);

        $listaClases = [];

        while($fila = $consultaEjecutada->fetch_assoc()){
            $listaClases[] = $fila;
        }

?>
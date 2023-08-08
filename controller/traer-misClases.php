<?php
        
        require ($_SERVER["DOCUMENT_ROOT"] . "/conexion.php");

        $consulta = "SELECT clases.id, clases.nombre, alumno_clase.id_alumno, alumno_clase.nota FROM clases INNER JOIN alumno_clase ON clases.id = alumno_clase.id_clase AND alumno_clase.id_alumno = $id";

        $consultaEjecutada = $mysqli -> query($consulta);

        $listaMisClases = [];

        while($fila = $consultaEjecutada->fetch_assoc()){
            $listaMisClases[] = $fila;
        }

?>
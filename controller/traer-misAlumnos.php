<?php
        
        require ($_SERVER["DOCUMENT_ROOT"] . "/conexion.php");

        $consulta = "SELECT usuarios.id, usuarios.nombre, usuarios.apellido, clases.nombre as nombre_clase , alumno_clase.nota FROM  clases INNER JOIN alumno_clase ON clases.id_maestro = $id INNER JOIN usuarios ON usuarios.id = alumno_clase.id_alumno GROUP BY usuarios.id;";

        $consultaEjecutada = $mysqli -> query($consulta);

        $listaMisAlumnos = [];

        while($fila = $consultaEjecutada->fetch_assoc()){
            $listaMisAlumnos[] = $fila;
        }
?>
<?php
        
        require ($_SERVER["DOCUMENT_ROOT"] . "/conexion.php");

        $consulta = "SELECT id, dni, nombre, apellido, correo, direccion, fecha_nac FROM usuarios WHERE id_rol = 3 ";

        $consultaEjecutada = $mysqli -> query($consulta);

        $arrayResultado = [];

        while($fila = $consultaEjecutada->fetch_assoc()){
            $arrayResultado[] = $fila;
        }

?>
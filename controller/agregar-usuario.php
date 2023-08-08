<?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        session_start();
        extract($_POST);
        
        require ($_SERVER["DOCUMENT_ROOT"] . "/conexion.php");

        $consulta = "SELECT * FROM usuarios WHERE correo = '$correo' ";

        $consultaEjecutada = $mysqli -> query($consulta);

        $numCoincidencias = $consultaEjecutada -> num_rows;

        if($numCoincidencias > 0){
            $_SESSION["error_agregar_usuario"] = "EROR! este correo ya se ha usado para otra cuenta, usuario no agregado";
            $mysqli -> close();

            if($rol == "3"){
                header("Location: ../view/alumnos.php");
                die();
            }
            if($rol == "2"){
                header("Location: ../view/maestros.php");
                die();
            } 
        }else{
            $contrasenaEncriptada = password_hash("universidad", PASSWORD_DEFAULT);

            $query = "INSERT INTO usuarios(nombre, apellido, correo, contrasena, direccion, fecha_nac, estado, id_rol, dni) VALUES ('$nombre', '$apellido', '$correo', '$contrasenaEncriptada', '$direccion', '$fecha', 1, $rol, '$dni')";

            $resultado = $mysqli -> query($query);


            if($resultado){
                $_SESSION["mensaje_usuario_agregado"] = "Se agregó correctamente";
                $mysqli -> close();
                
                if($rol == "3"){
                    header("Location: ../view/alumnos.php");
                }
                if($rol == "2"){
                    header("Location: ../view/maestros.php");
                } 
            }
            

        }
    }
?>
<?php 
    session_start();
    require ($_SERVER["DOCUMENT_ROOT"] . "/conexion.php");

    $idDB = $_SESSION['usuario']['id'];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        extract($_POST);

        $stmt = "SELECT * FROM usuarios WHERE correo = '$email'";
        $respuesta = $mysqli -> query($stmt);
        $numCoincidencias = $respuesta -> num_rows;
        $fila = $respuesta->fetch_assoc();

        if( ($numCoincidencias > 0) && ($fila['id'] != $idDB)){
            $_SESSION['error_email_duplicado'] = "ERROR! este email ya esta asociado con otra cuenta, registro no actualizado.";
            header("Location: ../view/editar-perfil.php");
        }else{
            if($password != null){
                $contrasenaEncriptada = password_hash($password, PASSWORD_DEFAULT);
    
                $query = "UPDATE usuarios SET contrasena = '$contrasenaEncriptada' WHERE id = $idDB ";
                $resultado = $mysqli -> query($query);
            }
            
    
            $sentencia = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', fecha_nac = '$fecha', correo = '$email'  WHERE id = $idDB";

            $usuarioBD = $mysqli->query($sentencia);

            $qry = "SELECT * FROM usuarios WHERE id = $idDB";
            $usr = $mysqli->query($qry);

            $_SESSION["usuario"] = $usr->fetch_assoc();
            $mysqli -> close();
            header("Location: ../view/dashboard.php");
        }      
    }
?>
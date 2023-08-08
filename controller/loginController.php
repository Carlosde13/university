<?php 
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        extract($_POST);

        require ($_SERVER["DOCUMENT_ROOT"] . "/conexion.php");

        $query = "SELECT * FROM usuarios WHERE correo = '$correo' ";

        $resultado = $mysqli -> query($query);

        $numFilas = $resultado -> num_rows;

        session_start();

        if($numFilas === 1){
            $datos = $resultado -> fetch_assoc();

            
            $comparacionPass = password_verify($pw, $datos["contrasena"]);
            
            if($comparacionPass===true){
            
                $_SESSION["usuario"]= $datos;
                $mysqli -> close();
                header("Location: ../view/dashboard.php");
            }else{
                $_SESSION["error_login"] = "Credenciales invalidas. Intentelo de nuevo.";
                $mysqli -> close();
                header("Location: ../view/login.php");
            }

            
        }else{
            $_SESSION["error_login"] = "Credenciales invalidas. Intentelo de nuevo.";
            $mysqli -> close();
            header("Location: ../view/login.php");
        }
        
    }
?>
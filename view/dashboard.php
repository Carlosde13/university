<?php
    session_start();

    //coborrorar la sesion iniciada por el usuario
    if(!isset($_SESSION["usuario"])){
        header("Location: ../index.php");
        die();
    }
    extract($_SESSION["usuario"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link rel="stylesheet" href="./estilos/estilos.css">
    <script src="./main.js" defer></script>

    <link href="/dist/output.css" rel="stylesheet">
    <title>Dashboard</title>
</head>

<body>
    <main class="w-full h-screen flex justify-start">
        <?php include("./components/side-bar.php"); ?>

        <div class="w-10/12 h-screen bg-[#f5f6fa]">
            <?php include("./components/nav.php"); ?>
            <h1 class="text-[28px] font-semibold p-[10px]">Dashboard</h1>
            <div class="w-1/2 h-[100px] bg-white m-[10px]">
                <p class="text-[#797778] p-[5 px]">Bienvenido</p>
                <p class="text-[#797778] p-[5 px]">Selecciona la accion que deseas realizar en las pestañas del menú de la izquierda.</p>
            </div>
        </div>

        <!-- menu desplegable -->

        <div class="w-[150px] h-auto bg-[white] menu rounded-md hidden" id="desp_menu">

            <div class="w-[150px] h-auto flex flex-col justify-start items-center p-[8px] gap-[10px]">
                <div class="w-11/12 p-[8px] pb-[10px] border-b border-[#b5babd] rounded-md hover:bg-[#F2F2F2] hover:cursor-pointer">
                    <a class="flex flex-row justify-start items-center gap-[10px] w-full" href="./editar-perfil.php">
                        <span class="material-symbols-outlined">
                            account_circle
                        </span>
                        <p >Perfil</p>
                    </a>
                </div>
                <div class="w-11/12 p-[8px] hover:bg-[#F2F2F2] rounded-md hover:cursor-pointer" >
                    <a class="flex flex-row justify-start items-center gap-[10px] w-full" href="../controller/logout.php">
                        <span class="material-symbols-outlined text-[#c4505a]">
                            logout
                        </span>
                        <p class="text-[#c4505a]">Salir</p>
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
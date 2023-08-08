<?php
    session_start();

    //coborrorar la sesion iniciada por el usuario
    if(!isset($_SESSION["usuario"])){
        header("Location: ../view/login.php");
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
    <title>Clases</title>
</head>

<body>
    <main class="">
        <div class="w-full h-screen flex justify-start">
            <?php include("./components/side-bar.php"); ?>

            <div class="w-10/12 h-screen bg-[#f5f6fa] parte-blanca-login">

                <?php include("./components/nav.php"); ?>

                <h1 class="text-[28px] font-semibold p-[10px]">Editar datos de perfil</h1>
                <div class="w-11/12 h-auto bg-white m-[10px]">

                    <div class="w-full h-[50px] flex flex-row justify-start items-center p-[10px] border-solid  border-b border-[#b5babd]">
                        <div class="w-1/2 flex justify-start items start ">
                            <p>Información de usuario</p>
                        </div>

                    </div>

                    <div class="overflow-x-auto ">
                        <form class="flex flex-col justify-start items-start p-[10px] w-full gap-[10px]">
                            <label class="font-bold" for="matricula">Matricula</label>
                            <input class="w-full border border-slate-600 rounded p-[5px]" id="matricula" name="matricula" value="<?php echo $id ?>"/>

                            <label class="font-bold" for="email">Correo Electronico</label>
                            <input class="w-full border border-slate-600 rounded p-[5px]" id="email" type="email" name="email" value="<?php echo $correo ?>"/>

                            <label class="font-bold" for="password">Contraseña, ingresa para cambiar contraseña</label>
                            <input class="w-full border border-slate-600 rounded p-[5px]" id="password" type="password" name="password"/>

                            <label class="font-bold" for="nombre">Nombre(s) </label>
                            <input class="w-full border border-slate-600 rounded p-[5px]" id="nombre" type="text" name="nombre" value="<?php echo $nombre ?>"/>

                            <label class="font-bold" for="apellido">Apellido(s) </label>
                            <input class="w-full border border-slate-600 rounded p-[5px]" id="apellido" type="text" name="apellido" value="<?php echo $apellido ?>"/>

                            <label class="font-bold" for="fecha">Fecha de nacimiento</label>
                            <input class="w-full border border-slate-600 rounded p-[5px]" id="fecha" type="date" name="fecha" value="<?php echo $fecha_nac ?>"/>

                            <button class="w-auto  bg-[#007aff] rounded-lg text-[white] p-[5px] mt-[20px]" type="submit ">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed top-0 left-0 right-0 bottom-0 bg-gray-500 bg-opacity-50 z-10 hidden" id="grisSq"></div> <!-- quitar/poner la clase hidden para poder agregar una clase -->

        <!-- menu desplegable -->

        <div class="w-[150px] h-auto bg-[white] menu rounded-md hidden" id="desp_menu">

            <div class="w-[150px] h-auto flex flex-col justify-start items-center p-[8px] gap-[10px]">
                <div class="w-11/12 p-[8px] pb-[10px] border-b border-[#b5babd] rounded-md hover:bg-[#F2F2F2] hover:cursor-pointer">
                    <a class="flex flex-row justify-start items-center gap-[10px] w-full">
                        <span class="material-symbols-outlined">
                            account_circle
                        </span>
                        <p>Perfil</p>
                    </a>
                </div>
                <div class="w-11/12 p-[8px] hover:bg-[#F2F2F2] rounded-md hover:cursor-pointer">
                    <a class="flex flex-row justify-start items-center gap-[10px] w-full">
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
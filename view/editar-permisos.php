<?php
session_start();

extract($_SESSION["usuario"]);

include("../controller/traer-permisos.php");

$correoEditar = $permisos['correo'];
$rolEditar = $permisos['id_rol'];
$estadoEditar = $permisos['estado'];
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
    <title>Permisos</title>
</head>

<body>
    <main class="">
        <div class="w-full h-screen flex justify-start">
            <?php include("./components/side-bar.php"); ?>

            <div class="w-10/12 h-screen bg-[#f5f6fa] parte-blanca-login">

                <?php include("./components/nav.php"); ?>

                <h1 class="text-[28px] font-semibold p-[10px]">Editar Permisos</h1>
                <div class="w-11/12 h-auto m-[10px]">

                    <div class="overflow-x-auto flex justify-center items-center w-full">

                        <div class="w-1/2 h-auto bg-[white] rounded-lg  " id="aggSq"> <!--  -->
                            <div class="h-auto border-b border-[#b5babd] flex flex-row justify-between items-center  p-[15px] gap-[8px]">

                                <p class="text-[26px] font-semibold p-[10px]">Editar Permiso</p>
                            </div>
                            <form action="../controller/editar-permisosController.php" method="GET">
                                <div class=" border-b border-[#b5babd] flex flex-col justify-center items-start  p-[15px] gap-[8px]">

                                    <label for="correo" class="font-bold">Email del Usuario</label>
                                    <input type="text" id="correo" class="border border-slate-600 rounded w-11/12 p-[5px]" value="<?php echo $correoEditar ?>" disabled/>

                                    <label for="rol" class="font-bold">Rol de Usuario</label>
                                    <select id="rol" class="border border-slate-600 rounded w-11/12  p-[5px] hover:cursor-pointer" name="rol">

                                        <?php
                                            if($rolEditar==2){
                                        ?>
                                                <option value="2" selected>Maestro</option>
                                                <option value="3">Alumno</option>
                                        <?php
                                            }
                                        ?>
                                        <?php
                                            if($rolEditar==3){
                                        ?>
                                                <option value="2">Maestro</option>
                                                <option value="3" selected>Alumno</option>
                                        <?php
                                            }
                                        ?>
                                    </select>

                                    <label class="font-bold">Activo</label>
                                    <div class="flex justify-start items-center gap-[10px]">
                                        <label for="si">Si</label>
                                        <input type="radio" id="si" name="activo" value="1" required>
                                    </div>
                                    <div class="flex justify-start items-center gap-[10px]">
                                        <label for="no">No</label>
                                        <input type="radio" id="no" name="activo" value="2" required>
                                    </div>
                                    <input class="hidden" value="<?php echo $id ?>" name="id"/>
                                </div>
                                <div class="h-auto border-b border-[#b5babd] flex flex-row justify-end items-center  p-[15px] gap-[8px]">
                                    <a class="w-auto h-[40px] bg-slate-400 rounded-lg text-[white] p-[5px] hover:cursor-pointer" href="./permisos.php">Cerrar</a>
                                    <button class="w-auto h-[40px] bg-[#007aff] rounded-lg text-[white] p-[5px] hover:cursor-pointer" type="submit ">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



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
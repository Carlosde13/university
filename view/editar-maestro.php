<?php
session_start();

extract($_SESSION["usuario"]);

include("../controller/traer-usuario.php");

$idEditar= $user ['id'];
$dniEditar= $user ['dni'];
$correoEditar= $user ['correo'];
$nombreEditar= $user ['nombre'];
$apellidoEditar= $user ['apellido'];
$direccionEditar= $user ['direccion'];


$fechaObjeto = strtotime($user ['fecha_nac']);
$fechaConvertida = date('Y-m-d', $fechaObjeto);
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
    <title>Maestro</title>
</head>

<body>
    <main class="">
        <div class="w-full h-screen flex justify-start">
            <?php include("./components/side-bar.php"); ?>

            <div class="w-10/12 h-screen bg-[#f5f6fa] parte-blanca-login">

                <?php include("./components/nav.php"); ?>

                <h1 class="text-[28px] font-semibold p-[10px]">Editar Maestro</h1>
                <div class="w-11/12 h-auto m-[10px]">

                    <div class="overflow-x-auto flex justify-center items-center w-full">

                        <div class="w-1/2 h-auto bg-[white] rounded-lg  " id="aggSq"> <!--  -->
                            <div class="h-auto border-b border-[#b5babd] flex flex-row justify-between items-center  p-[15px] gap-[8px]">

                                <p class="text-[26px] font-semibold p-[10px]">Editar Maestro</p>
                            </div>
                            <form action="../controller/editar-usuariosController.php" method="GET">
                                <div class=" border-b border-[#b5babd] flex flex-col justify-center items-start  p-[15px] gap-[8px]">

                                    <label for="dni" class="hidden">DNI</label>
                                    <input type="text" id="dni" class="border border-slate-600 rounded w-11/12 p-[5px] hidden" name="dni" value="<?php echo $dniEditar ?>" require/>

                                    <label for="correo">Correo Electronico</label>
                                    <input type="email" id="correo" class="border border-slate-600 rounded w-11/12 p-[5px]" name="correo" value="<?php echo $correoEditar ?>" disabled/>

                                    <label for="nombre">Nombre(s)</label>
                                    <input type="text" id="nombre" class="border border-slate-600 rounded w-11/12 p-[5px]" name="nombre" value="<?php echo $nombreEditar ?>"/>

                                    <label for="apellido">Apellido(s)</label>
                                    <input type="text" id="apellido" class="border border-slate-600 rounded w-11/12 p-[5px]" name="apellido" value="<?php echo $apellidoEditar ?>"/>

                                    <label for="direccion">Direccion</label>
                                    <input type="text" id="direccion" class="border border-slate-600 rounded w-11/12 p-[5px]" name="direccion" value="<?php echo $direccionEditar ?>"/>

                                    <label for="fecha">Fecha de Nacimiento</label>
                                    <input type="date" id="fecha" class="border border-slate-600 rounded w-11/12 p-[5px]" name="fecha" value="<?php echo $fechaConvertida ?>"/>

                                    <input class="hidden" value="<?php echo $idE ?>" name="id"/>
                                    <input class="hidden" value="2" name="rol"/>

                                </div>
                                <div class="h-auto  border-[#b5babd] flex flex-row justify-end items-center  p-[15px] gap-[8px]">
                                    <a class="w-auto h-[40px] bg-slate-400 rounded-lg text-[white] p-[5px] hover:cursor-pointer" href="./alumnos.php">Cerrar</a>
                                    <button class="w-auto h-[40px] bg-[#007aff] rounded-lg text-[white] p-[5px]" type="submit ">Guardar</button>
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
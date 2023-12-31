<?php
session_start();

include("../controller/mostrarTabla-clases.php");


if (!isset($_SESSION["usuario"])) {
    header("Location: ../index.php");
    die();
}
if ($_SESSION["usuario"]["id_rol"] != 3) {
    header("Location: ./dashboard.php");
    die();
}
extract($_SESSION["usuario"]);
include("../controller/traer-misClases.php");
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

                <h1 class="text-[28px] font-semibold p-[10px]">Mis Clases</h1>
                <div class="w-11/12 h-auto bg-white m-[10px]">

                    <div class="w-full h-[50px] flex flex-row justify-evenly items-center p-[10px] border-solid border-gray-400">
                        <div class="w-1/2 flex justify-start items center">
                            <p>Informacion de Clases</p>
                        </div>
                        <div class="w-1/2 flex justify-end items center">
                            <button class="w-auto h-[40px] bg-[#007aff] rounded-lg text-[white] p-[5px]" onclick="mostrar()">Asignar Clase</button>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <small class="text-[12px] text-teal-500">
                            <?php
                            if (isset($_SESSION["mensaje_clase_asignada"])) {
                                echo "" . $_SESSION['mensaje_clase_asignada'] . "";
                            }
                            unset($_SESSION['mensaje_clase_asignada']);
                            ?>
                        </small>
                        <small class="text-[12px] text-rose-500">
                            <?php
                            if (isset($_SESSION["error_asignar_clase"])) {
                                echo "" . $_SESSION['error_asignar_clase'] . "";
                            }
                            unset($_SESSION['error_asignar_clase']);
                            ?>
                        </small>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 ">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider ">#</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Materia</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Darse de Baja</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php
                                foreach ($listaMisClases as $e) {
                                ?>
                                    <tr>
                                        <td class='px-6 py-4 whitespace-nowrap'><?php echo $e['id']; ?></td>
                                        <td class='px-6 py-4 whitespace-nowrap'><?php echo $e['nombre']; ?></td>
                                        <td class="px-6 py-4 whitespace-nowrap flex items-center gap-[8px]">
                                            <a class="hover:cursor-pointer" href="../controller/darse-debaja.php?clase=<?php echo $e['id'] ?>&alumno=<?php echo $e['id_alumno'] ?>">
                                                <span class="material-symbols-outlined text-rose-500">
                                                    remove_selection
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-1/4 h-auto bg-[white] rounded-lg  agregar hidden" id="aggSq"> <!-- quitar la clase hidden para poder agregar una clase -->
            <div class="h-auto border-b border-[#b5babd] flex flex-row justify-between items-center  p-[15px] gap-[8px]">

                <p class="text-[26px] font-semibold p-[10px]">Agregar Clase</p>

                <span class="material-symbols-outlined text-slate-400 hover:cursor-pointer" id="xBtn">
                    close
                </span>

            </div>
            <form action="../controller/asignar-clases.php" method="POST">
                <div class=" border-b border-[#b5babd] flex flex-col justify-center items-start  p-[15px] gap-[8px]">


                    <label for="clases">Seleccione la clase que desea tomar</label>
                    <select id="clases" class="border border-slate-600 rounded w-11/12  p-[5px] hover:cursor-pointer" name="clase">
                        <?php
                        foreach ($listaClases as $e) {
                        ?>
                            <option value="<?php echo $e['id']; ?>"> <?php echo $e['nombre'] . ", " .  $e['nombre_maestro'] . " " . $e['apellido_maestro'] ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                    <input class="hidden" value="<?php echo $id ?>" name="id_usuario" />
                </div>
                <div class="h-auto border-b border-[#b5babd] flex flex-row justify-end items-center  p-[15px] gap-[8px]">
                    <div class="w-auto h-[40px] bg-slate-400 rounded-lg text-[white] p-[5px] hover:cursor-pointer" onclick="mostrar()">Cerrar</div>
                    <button class="w-auto h-[40px] bg-[#007aff] rounded-lg text-[white] p-[5px]" type="submit ">Crear</button>
                </div>
            </form>
        </div>

        <div class="fixed top-0 left-0 right-0 bottom-0 bg-gray-500 bg-opacity-50 z-10 hidden" id="grisSq"></div> <!-- quitar/poner la clase hidden para poder agregar una clase -->

        <!-- menu desplegable -->

        <div class="w-[150px] h-auto bg-[white] menu rounded-md hidden" id="desp_menu">

            <div class="w-[150px] h-auto flex flex-col justify-start items-center p-[8px] gap-[10px]">
                <div class="w-11/12 p-[8px] pb-[10px] border-b border-[#b5babd] rounded-md hover:bg-[#F2F2F2] hover:cursor-pointer">
                    <a class="flex flex-row justify-start items-center gap-[10px] w-full" href="./editar-perfil.php">
                        <span class="material-symbols-outlined">
                            account_circle
                        </span>
                        <p>Perfil</p>
                    </a>
                </div>
                <div class="w-11/12 p-[8px] hover:bg-[#F2F2F2] rounded-md hover:cursor-pointer">
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
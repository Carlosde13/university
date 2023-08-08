<?php
session_start();
if(!isset($_SESSION["usuario"])){
  header("Location: ../index.php");
  die();
}

include("../controller/mostrarTabla-maestros.php");
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
  <title>Maestros</title>
</head>

<body>
  <main class="">
    <div class="w-full h-screen flex justify-start">
      <?php include("./components/side-bar.php"); ?>

      <div class="w-10/12 h-screen bg-[#f5f6fa] parte-blanca-login">

        <?php include("./components/nav.php"); ?>

        <h1 class="text-[28px] font-semibold p-[10px]">Lista de Maestros</h1>
        <div class="w-11/12 h-auto bg-white m-[10px]">

          <div class="w-full h-[50px] flex flex-row justify-evenly items-center p-[10px] border-solid border-gray-400">
            <div class="w-1/2 flex justify-start items center">
              <p>Informacion de Maestros</p>
            </div>
            <div class="w-1/2 flex justify-end items center">
              <button class="w-auto h-[40px] bg-[#007aff] rounded-lg text-[white] p-[5px]" onclick="mostrar()">Agregar Maestro</button>
            </div>
          </div>

          <div class="overflow-x-auto">
            <small class="text-[12px] text-teal-500">
              <?php
              if (isset($_SESSION["mensaje_usuario_agregado"])) {
                echo "" . $_SESSION['mensaje_usuario_agregado'] . "";
              }
              unset($_SESSION['mensaje_usuario_agregado']);
              ?>
            </small>
            <small class="text-[12px] text-rose-500">
              <?php
              if (isset($_SESSION["error_agregar_usuario"])) {
                echo "" . $_SESSION['error_agregar_usuario'] . "";
              }
              unset($_SESSION['error_agregar_usuario']);
              ?>
            </small>
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50 ">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider ">Nombre</th>
                  <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Email</th>
                  <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Direccion</th>
                  <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Fec. de Nacimiento</th>
                  <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
              <?php
                foreach ($arrayResultado as $e) {
                ?>
                  <tr>
                    <td class='px-6 py-4 whitespace-nowrap'><?php echo $e['nombre'] . " " . $e['apellido']; ?></td>
                    <td class='px-6 py-4 whitespace-nowrap'><?php echo $e['correo']; ?></td>
                    <td class='px-6 py-4 whitespace-nowrap'><?php echo $e['direccion']; ?></td>
                    <td class='px-6 py-4 whitespace-nowrap'><?php echo $e['fecha_nac']; ?></td>
                    <td class="px-6 py-4 whitespace-nowrap flex items-center gap-[8px]">
                      <a class="hover:cursor-pointer" href="./editar-maestro.php?idE=<?php echo $e['id'] ?>">
                        <?php include("./components/edit-symbol.php"); ?>
                      </a>
                      <a class="hover:cursor-pointer" href="../controller/eliminar-usuario.php?id=<?php echo $e['id'] ."&rol=2"?>">
                        <?php include("./components/delete-symbol.php"); ?>
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

        <p class="text-[26px] font-semibold p-[10px]">Agregar Maestro </p>

        <span class="material-symbols-outlined text-slate-400 hover:cursor-pointer" id="xBtn">
          close
        </span>

      </div>
      <form action="../controller/agregar-usuario.php" method="POST">
        <div class=" border-b border-[#b5babd] flex flex-col justify-center items-start  p-[15px] gap-[8px]">

          <label for="dni">DNI</label>
          <input type="text" id="dni" class="border border-slate-600 rounded w-11/12 p-[5px]" name="dni" />

          <label for="correo">Correo Electronico</label>
          <input type="text" id="correo" class="border border-slate-600 rounded w-11/12 p-[5px]" name="correo" />

          <label for="nombre">Nombre(s)</label>
          <input type="text" id="nombre" class="border border-slate-600 rounded w-11/12 p-[5px]" name="nombre" />

          <label for="apellido">Apellido(s)</label>
          <input type="text" id="apellido" class="border border-slate-600 rounded w-11/12 p-[5px]" name="apellido" />

          <label for="direccion">Direccion</label>
          <input type="text" id="direccion" class="border border-slate-600 rounded w-11/12 p-[5px]" name="direccion" />

          <label for="fecha">Fecha de Nacimiento</label>
          <input type="date" id="fecha" class="border border-slate-600 rounded w-11/12 p-[5px]" name="fecha" />

          <input type="text" id="rol" class="hidden" value="2" name="rol" />

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
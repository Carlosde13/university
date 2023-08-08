<?php
if ($id_rol == 1) {
    $nombre_rol = "Administrador";
    $tipo_menu = "MENÚ DE ADMINISTRACIÓN";
}
if ($id_rol == 2) {
    $nombre_rol = "Maestro";
    $tipo_menu = "MENÚ DE MAESTROS";
}
if ($id_rol == 3) {
    $nombre_rol = "Alumno";
    $tipo_menu = "MENÚ DE ALUMNOS";
}
?>

<div class="w-1/6 h-screen ">

    <section class="w-1/6 h-screen bg-[#353a40] flex flex-col fixed">

        <div class="h-auto border-b border-[#b5babd] flex flex-row justify-start items-center  p-[15px] gap-[8px]">

            <div class="rounded-full overflow-hidden w-[45px] h-[45px]">
                <img src="../img/loguito.jpg" />
            </div>
            <p class="text-[#98a0ab] font-semibold">Universidad</p>
        </div>

        <div class="h-auto border-b border-[#b5babd] flex flex-col justify-center items-start  p-[15px] gap-[8px]">

            <p class="text-[#98a0ab] text-[14px] font-semibold"><?php echo $nombre_rol ?></p>
            <p class="text-[#98a0ab] text-[14px] font-normal"><?php echo $nombre ?></p>
        </div>

        <div class="h-auto flex flex-col justify-center items-center p-[8px] ">

            <p class="text-[#98a0ab] text-[12px] font-semibold"><?php echo $tipo_menu ?></p>
        </div>
        <div class="h-auto flex flex-col justify-center items-start p-[8px]">
            <?php
            if ($id_rol == 1) {
            ?>
                <a href="./permisos.php" class="flex flex-row justify-center items-center gap-[8px]">
                    <span class="material-symbols-outlined text-[#98a0ab]">
                        manage_accounts
                    </span>
                    <p class="text-[#98a0ab] text-[12px] font-semibold">Permisos</p>
                </a>
            <?php
            }
            ?>
            <?php
            if ($id_rol == 3) {
            ?>
                <a href="#" class="flex flex-row justify-center items-center gap-[8px]">
                    <span class="material-symbols-outlined text-[#98a0ab]">
                        new_releases
                    </span>
                    <p class="text-[#98a0ab] text-[12px] font-semibold">Ver Calificaciones</p>
                </a>
            <?php
            }
            ?>
            <?php
            if ($id_rol == 2) {
            ?>
                <a href="#" class="flex flex-row justify-center items-center gap-[8px]">
                    <span class="material-symbols-outlined text-[#98a0ab]">
                        school
                    </span>
                    <p class="text-[#98a0ab] text-[12px] font-semibold">Alumnos</p>
                </a>
            <?php
            }
            ?>
        </div>
        <div class="h-auto flex flex-col justify-center items-start p-[8px]">
            <?php
            if ($id_rol == 1) {
            ?>
                <a href="#" class="flex flex-row justify-center items-center gap-[8px]">
                    <span class="material-symbols-outlined text-[#98a0ab]">
                        groups
                    </span>
                    <p class="text-[#98a0ab] text-[12px] font-semibold">Maestros</p>
                </a>
            <?php
            }
            ?>
            <?php
            if ($id_rol == 3) {
            ?>
                <a href="#" class="flex flex-row justify-center items-center gap-[8px]">
                    <span class="material-symbols-outlined text-[#98a0ab]">
                        push_pin
                    </span>
                    <p class="text-[#98a0ab] text-[12px] font-semibold">Administrar Tus Clases</p>
                </a>
            <?php
            }
            ?>
        </div>
        <div class="h-auto flex flex-col justify-center items-start p-[8px]">
            <?php
            if ($id_rol == 1) {
            ?>
                <a href="#" class="flex flex-row justify-center items-center gap-[8px]">
                    <span class="material-symbols-outlined text-[#98a0ab]">
                        school
                    </span>
                    <p class="text-[#98a0ab] text-[12px] font-semibold">Alumnos</p>
                </a>
            <?php
            }
            ?>
        </div>

        <div class="h-auto flex flex-col justify-center items-start p-[8px]">
            <?php
            if ($id_rol == 1) {
            ?>
                <a href="#" class="flex flex-row justify-center items-center gap-[8px]">
                    <span class="material-symbols-outlined text-[#98a0ab]">
                        local_library
                    </span>
                    <p class="text-[#98a0ab] text-[12px] font-semibold">Clases</p>
                </a>
            <?php
            }
            ?>
        </div>
    </section>
</div>
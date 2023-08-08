<?php
    $display_name = "";
    if ($id_rol == 1) {
        $display_name = $nombre;
    }else{
        $display_name = "$nombre $apellido";
    }
?>
<div class="w-full h-[50px] flex flex-row justify-evenly items-center p-[10px] border-solid border-gray-400 bg-white">
    <div class="w-1/2 flex justify-start items center">
        <a class="flex flex-row justify-start items-center gap-[10px] hover:cursor-pointer">
            <span class="material-symbols-outlined text-[#98a0ab] ">
                menu
            </span>
            <a class="text-[#98a0ab]" href="./dashboard.php"> HOME</a>
        </a>
    </div>
    <div class="w-1/2 flex justify-end items center">
        <div class="flex flex-row justify-start items-center gap-[10px] hover:cursor-pointer" id="desplegable">
            <p class="text-[#98a0ab]"><?php echo $display_name; ?></p>
            <span class="material-symbols-outlined text-[#98a0ab]" id="flecha">
                expand_more
            </span>
        </div>
    </div>
</div>
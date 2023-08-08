<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="./estilos/estilos.css">

    <title>Login</title>
</head>

<body>
    <main class="w-full h-screen bg-[#fff5d2] flex flex-col justify-evenly items-center">
        <div class="w-[500px] h-screen flex flex-col justify-start items-center">
            <img src="../img/logo.jpg" class="w-[300px] h-[300px]" />
            <div class="bg-[white] w-full h-[250px] parte-blanca-login rounded-lg">

                <form class="flex flex-col justify-center items-center gap-[10px]  mt-[20px]" action="../controller/loginController.php" method="POST">
                    <label class="text-[#797778]">
                        Bienvenido, Ingresa con tu cuenta
                    </label>
                    <div class="input-div">
                        <input type="email" placeholder="Email" class="border-none outline-none w-11/12 ml-[5px]" name="correo">
                        <div class="w-[48px] h-[48px] flex justify-center items-center">
                            <span class="material-symbols-outlined text-[#797778]">
                                mail
                            </span>
                        </div>
                    </div>
                    <div class="input-div">
                        <input type="password" placeholder="Password" class="border-none outline-none w-11/12 ml-[5px]" name="pw">
                        <div class="w-[48px] h-[48px] flex justify-center items-center">
                            <span class="material-symbols-outlined text-[#797778]">
                                lock
                            </span>
                        </div>
                    </div>
                    <small class="text-[12px] text-rose-500">
                            <?php
                            session_start();
                            if (isset($_SESSION["error_login"])) {
                                echo "" . $_SESSION['error_login'] . "";
                            }
                            unset($_SESSION['error_login']);
                            ?>
                        </small>
                    <div class="w-4/5 flex justify-end items-center">
                        <button class="w-1/4 h-[40px] bg-[#007aff] rounded-lg text-[white]">Ingresar</button>
                    </div>
                </form>

            </div>
        </div>
    </main>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>McPos web</title>
    <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon">
    <link href="https://db.onlinewebfonts.com/c/827d075b1538829cc0db75696e4d5fa2?family=Speedee+Bold" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css"
    >

    <link
    rel="stylesheet"
    href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-thin.css"
    >

    <link
    rel="stylesheet"
    href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css"
    >

    <link
    rel="stylesheet"
    href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-regular.css"
    >

    <link
    rel="stylesheet"
    href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-light.css"
    >
    <style>
        body {
            font-family: "Speedee Bold", sans-serif;
        }
        .bg-gray {
            background-color: rgba(217, 217, 217, 0.52);
        }
        .yellow-arch{
            color:#F6B400;
        }
        .h-screen-64{
            height: calc(100vh - 64px);
        }
        
    </style>
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION['id'])){
        ?>
        <div class="bg-green-900 text-white py-2 sticky top-0">
            <div class="container mx-auto flex justify-between items-center">
                <div class="flex-shrink-0">
                    <img class="h-12" src="img/logo.png" alt="Logo">
                </div>
                <div class="flex-shrink-0 ml-auto">
                    <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded flex items-center" onclick="window.location.href = 'index.php?target=log-off/log-off.c.php';">
                        <i class="fas fa-sign-out-alt mr-2"></i> Se déconnecter
                    </button>
                </div>
            </div>
        </div>
        <?php
    }
    
    if (empty($_GET['target'])) {
        include 'auth/auth.c.php';
    } else { 
        $target = $_GET['target'];
        if (file_exists($target)) { ?>
            <div class="flex">
                <?php include $target; ?>
            </div>
        <?php } else {
            include 'nav/nav.v.php';?>
            <div class="flex">
                <?php
                DisplayNavBar();
                ?>
                <div class="container mx-auto py-8 flex flex-col justify-center items-center">
                    <i class="fa-solid fa-burger-cheese fa-10x"></i>
                    <h1 class="text-7xl">Erreur 404</h1>
                </div>
            </div>
            <?php
        }
    }
    ?>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>
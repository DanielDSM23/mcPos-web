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
        
    </style>
</head>
<body>
    <div class="bg-green-900 text-white py-2 sticky top-0">
        <div class="container mx-auto flex justify-center items-center">
            <div class="flex-shrink-0">
                <img class="h-12" src="img/logo.png" alt="Logo">
            </div>
        </div>
    </div>
    <?php
        session_start();
        if (empty($_GET['target'])) {
            include 'auth/auth.c.php';
        }
        else{ ?>
        <div class="flex">
            <?php
            include $_GET['target']; ?>
        </div>
            <?php
        }
    ?>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>
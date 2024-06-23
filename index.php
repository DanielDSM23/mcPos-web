<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>McPos web</title>
    <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon">
    <link href="https://db.onlinewebfonts.com/c/827d075b1538829cc0db75696e4d5fa2?family=Speedee+Bold" rel="stylesheet">
    <style>
        body {
            font-family: "Speedee Bold", sans-serif;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        if (empty($_GET['target'])) {
            include 'auth/auth.c.php';
        }
        else{
            include $_GET['target'];
        }
    ?>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>
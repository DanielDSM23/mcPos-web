<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>McPos Login</title>
    <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon">

</head>
<body>
    <?php
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